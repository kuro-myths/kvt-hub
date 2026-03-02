<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * OpenAI Provider — GPT-4o, GPT-4o-mini, etc.
 */
class OpenAIProvider implements AIProviderInterface
{
    private array $config;
    private float $lastCost = 0;

    public function __construct(array $config = [])
    {
        $this->config = $config ?: config('ai.providers.openai', []);
    }

    public function chat(array $messages, array $options = []): array
    {
        $model = $options['model'] ?? $this->config['model'] ?? 'gpt-4o-mini';
        $maxTokens = $options['max_tokens'] ?? $this->config['max_tokens'] ?? 4096;
        $temperature = $options['temperature'] ?? $this->config['temperature'] ?? 0.7;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->config['api_key'],
                'Content-Type' => 'application/json',
            ])->timeout(60)->post($this->config['base_url'] . '/chat/completions', [
                'model' => $model,
                'messages' => $messages,
                'max_tokens' => $maxTokens,
                'temperature' => $temperature,
            ]);

            if (!$response->successful()) {
                throw new \Exception('OpenAI API error: ' . $response->body());
            }

            $data = $response->json();
            $inputTokens = $data['usage']['prompt_tokens'] ?? 0;
            $outputTokens = $data['usage']['completion_tokens'] ?? 0;

            // Cost estimation (GPT-4o-mini pricing)
            $this->lastCost = ($inputTokens * 0.00000015) + ($outputTokens * 0.0000006);

            return [
                'content' => $data['choices'][0]['message']['content'] ?? '',
                'tokens' => $data['usage']['total_tokens'] ?? 0,
                'model' => $model,
                'provider' => 'openai',
                'metadata' => [
                    'input_tokens' => $inputTokens,
                    'output_tokens' => $outputTokens,
                    'finish_reason' => $data['choices'][0]['finish_reason'] ?? null,
                    'cost' => $this->lastCost,
                ],
            ];
        } catch (\Exception $e) {
            Log::error('OpenAI Provider Error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function complete(string $prompt, array $options = []): array
    {
        return $this->chat([
            ['role' => 'user', 'content' => $prompt],
        ], $options);
    }

    public function isAvailable(): bool
    {
        return !empty($this->config['api_key']);
    }

    public function getName(): string
    {
        return 'OpenAI';
    }

    public function getModel(): string
    {
        return $this->config['model'] ?? 'gpt-4o-mini';
    }

    public function getLastCost(): float
    {
        return $this->lastCost;
    }
}
