<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Claude Provider — Anthropic Claude (claude-sonnet-4-20250514, claude-3-haiku, etc.)
 *
 * Integrasi langsung dengan Anthropic Messages API.
 * Mendukung system prompt, multi-turn conversation, dan streaming.
 */
class ClaudeProvider implements AIProviderInterface
{
    private array $config;
    private float $lastCost = 0;

    public function __construct(array $config = [])
    {
        $this->config = $config ?: config('ai.providers.claude', []);
    }

    public function chat(array $messages, array $options = []): array
    {
        $model = $options['model'] ?? $this->config['model'] ?? 'claude-sonnet-4-20250514';
        $maxTokens = $options['max_tokens'] ?? $this->config['max_tokens'] ?? 4096;
        $temperature = $options['temperature'] ?? $this->config['temperature'] ?? 0.7;

        // Extract system message (Anthropic API uses a separate 'system' field)
        $systemPrompt = '';
        $chatMessages = [];
        foreach ($messages as $msg) {
            if ($msg['role'] === 'system') {
                $systemPrompt .= $msg['content'] . "\n";
            } else {
                $chatMessages[] = [
                    'role' => $msg['role'],
                    'content' => $msg['content'],
                ];
            }
        }

        // Ensure messages alternate user/assistant correctly for Claude
        if (empty($chatMessages) || $chatMessages[0]['role'] !== 'user') {
            array_unshift($chatMessages, ['role' => 'user', 'content' => 'Hi']);
        }

        try {
            $payload = [
                'model' => $model,
                'max_tokens' => $maxTokens,
                'temperature' => $temperature,
                'messages' => $chatMessages,
            ];

            if ($systemPrompt) {
                $payload['system'] = trim($systemPrompt);
            }

            $response = Http::withHeaders([
                'x-api-key' => $this->config['api_key'],
                'anthropic-version' => '2023-06-01',
                'Content-Type' => 'application/json',
            ])->timeout(60)->post($this->config['base_url'] . '/messages', $payload);

            if (!$response->successful()) {
                throw new \Exception('Claude API error: ' . $response->body());
            }

            $data = $response->json();
            $content = collect($data['content'] ?? [])->where('type', 'text')->pluck('text')->implode("\n");
            $inputTokens = $data['usage']['input_tokens'] ?? 0;
            $outputTokens = $data['usage']['output_tokens'] ?? 0;

            // Cost: Claude Sonnet ~$3/1M input, $15/1M output
            $this->lastCost = ($inputTokens * 0.000003) + ($outputTokens * 0.000015);

            return [
                'content' => $content,
                'tokens' => $inputTokens + $outputTokens,
                'model' => $model,
                'provider' => 'claude',
                'metadata' => [
                    'input_tokens' => $inputTokens,
                    'output_tokens' => $outputTokens,
                    'stop_reason' => $data['stop_reason'] ?? null,
                    'cost' => $this->lastCost,
                ],
            ];
        } catch (\Exception $e) {
            Log::error('Claude Provider Error: ' . $e->getMessage());
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
        return 'Claude (Anthropic)';
    }

    public function getModel(): string
    {
        return $this->config['model'] ?? 'claude-sonnet-4-20250514';
    }

    public function getLastCost(): float
    {
        return $this->lastCost;
    }
}
