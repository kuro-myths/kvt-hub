<?php

namespace App\Services\AI\Pipeline;

use App\Services\AI\AIManager;
use Illuminate\Support\Facades\Log;

/**
 * AIPipeline — Chain multiple AI operations
 *
 * Mirip LangChain untuk PHP. Bisa chain: translate → summarize → review → format.
 * Setiap step bisa pakai provider berbeda (step 1 OpenAI, step 2 Claude).
 *
 * Usage:
 *   $pipeline = new AIPipeline($aiManager);
 *   $result = $pipeline
 *       ->step('translate', ['to' => 'en'], 'openai')
 *       ->step('summarize', ['max_length' => 200], 'claude')
 *       ->step('sentiment')
 *       ->run($inputText);
 */
class AIPipeline
{
    private AIManager $manager;
    private array $steps = [];
    private array $executionLog = [];
    private float $totalCost = 0;
    private int $totalTokens = 0;

    public function __construct(AIManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Tambahkan step ke pipeline.
     *
     * @param string $action  Action: translate, summarize, review, sentiment, extract, custom
     * @param array $params   Parameters untuk action
     * @param string|null $provider Provider override (null = use default)
     */
    public function step(string $action, array $params = [], ?string $provider = null): self
    {
        $this->steps[] = [
            'action' => $action,
            'params' => $params,
            'provider' => $provider,
        ];
        return $this;
    }

    /**
     * Jalankan pipeline dengan input awal.
     */
    public function run(string $input): array
    {
        $currentData = $input;
        $this->executionLog = [];
        $this->totalCost = 0;
        $this->totalTokens = 0;

        $maxSteps = config('ai.pipeline.max_steps', 10);

        foreach (array_slice($this->steps, 0, $maxSteps) as $i => $step) {
            $stepStart = microtime(true);

            try {
                $prompt = $this->buildStepPrompt($step['action'], $currentData, $step['params']);
                $provider = $step['provider'];

                $result = $provider
                    ? $this->manager->provider($provider)->complete($prompt)
                    : $this->manager->complete($prompt);

                $currentData = $result['content'];
                $this->totalCost += $result['metadata']['cost'] ?? 0;
                $this->totalTokens += $result['tokens'] ?? 0;

                $this->executionLog[] = [
                    'step' => $i + 1,
                    'action' => $step['action'],
                    'provider' => $result['provider'] ?? $provider ?? config('ai.default'),
                    'tokens' => $result['tokens'] ?? 0,
                    'cost' => $result['metadata']['cost'] ?? 0,
                    'duration_ms' => round((microtime(true) - $stepStart) * 1000),
                    'status' => 'success',
                    'output_preview' => mb_substr($currentData, 0, 200),
                ];
            } catch (\Exception $e) {
                Log::error("Pipeline step {$i} failed: " . $e->getMessage());
                $this->executionLog[] = [
                    'step' => $i + 1,
                    'action' => $step['action'],
                    'provider' => $step['provider'] ?? config('ai.default'),
                    'status' => 'error',
                    'error' => $e->getMessage(),
                    'duration_ms' => round((microtime(true) - $stepStart) * 1000),
                ];

                // Retry once
                $retryAttempts = config('ai.pipeline.retry_attempts', 2);
                $retried = false;
                for ($r = 0; $r < $retryAttempts; $r++) {
                    try {
                        $prompt = $this->buildStepPrompt($step['action'], $currentData, $step['params']);
                        $result = $this->manager->complete($prompt);
                        $currentData = $result['content'];
                        $retried = true;
                        break;
                    } catch (\Exception $retryE) {
                        continue;
                    }
                }

                if (!$retried) {
                    return [
                        'success' => false,
                        'output' => $currentData,
                        'error' => 'Pipeline failed at step ' . ($i + 1) . ': ' . $e->getMessage(),
                        'log' => $this->executionLog,
                        'total_cost' => $this->totalCost,
                        'total_tokens' => $this->totalTokens,
                    ];
                }
            }
        }

        // Reset steps for next run
        $this->steps = [];

        return [
            'success' => true,
            'output' => $currentData,
            'log' => $this->executionLog,
            'total_cost' => $this->totalCost,
            'total_tokens' => $this->totalTokens,
            'steps_executed' => count($this->executionLog),
        ];
    }

    /**
     * Build prompt berdasarkan action type.
     */
    private function buildStepPrompt(string $action, string $data, array $params): string
    {
        return match ($action) {
            'translate' => $this->buildTranslatePrompt($data, $params),
            'summarize' => $this->buildSummarizePrompt($data, $params),
            'review' => $this->buildReviewPrompt($data, $params),
            'sentiment' => $this->buildSentimentPrompt($data, $params),
            'extract' => $this->buildExtractPrompt($data, $params),
            'rewrite' => $this->buildRewritePrompt($data, $params),
            'code_generate' => $this->buildCodeGenPrompt($data, $params),
            'explain' => $this->buildExplainPrompt($data, $params),
            'custom' => $params['prompt'] ?? "Process this data:\n\n{$data}",
            default => "Process the following:\n\n{$data}",
        };
    }

    private function buildTranslatePrompt(string $data, array $params): string
    {
        $to = $params['to'] ?? 'English';
        $from = $params['from'] ?? 'auto-detect';
        return "Translate the following text from {$from} to {$to}. Only return the translated text without explanation.\n\nText:\n{$data}";
    }

    private function buildSummarizePrompt(string $data, array $params): string
    {
        $maxLen = $params['max_length'] ?? 300;
        $style = $params['style'] ?? 'concise';
        return "Summarize the following text in a {$style} style. Maximum {$maxLen} words. Return only the summary.\n\nText:\n{$data}";
    }

    private function buildReviewPrompt(string $data, array $params): string
    {
        $lang = $params['language'] ?? 'auto-detect';
        return "You are a senior code reviewer. Review the following {$lang} code for:\n1. Bugs & errors\n2. Security vulnerabilities\n3. Performance issues\n4. Best practices\n5. Improvement suggestions\n\nFormat with Markdown.\n\nCode:\n```\n{$data}\n```";
    }

    private function buildSentimentPrompt(string $data, array $params): string
    {
        return "Analyze the sentiment of the following text. Return JSON: {\"sentiment\": \"positive|negative|neutral|mixed\", \"score\": 0.0-1.0, \"emotions\": [\"joy\",\"anger\",...], \"summary\": \"brief analysis\"}\n\nText:\n{$data}";
    }

    private function buildExtractPrompt(string $data, array $params): string
    {
        $fields = implode(', ', $params['fields'] ?? ['entities', 'topics', 'keywords']);
        return "Extract the following from this text: {$fields}. Return as structured JSON.\n\nText:\n{$data}";
    }

    private function buildRewritePrompt(string $data, array $params): string
    {
        $tone = $params['tone'] ?? 'professional';
        return "Rewrite the following text in a {$tone} tone. Keep the meaning but improve clarity.\n\nText:\n{$data}";
    }

    private function buildCodeGenPrompt(string $data, array $params): string
    {
        $lang = $params['language'] ?? 'PHP';
        $framework = $params['framework'] ?? '';
        $extra = $framework ? " using {$framework} framework" : '';
        return "Generate {$lang} code{$extra} based on the following requirements. Include comments.\n\nRequirements:\n{$data}";
    }

    private function buildExplainPrompt(string $data, array $params): string
    {
        $level = $params['level'] ?? 'intermediate';
        return "Explain the following code/concept at a {$level} level. Use Bahasa Indonesia.\n\n{$data}";
    }
}
