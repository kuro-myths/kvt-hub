<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * GitHub Models Provider — Free AI models via GitHub Models marketplace
 *
 * GitHub menyediakan akses GRATIS ke model AI (GPT-4o, GPT-4o-mini,
 * Llama, Mistral, dll) melalui GitHub Models API.
 * Hanya perlu GitHub Personal Access Token (PAT).
 *
 * Endpoint: https://models.inference.ai.azure.com
 * Auth: GitHub PAT (scopes: tidak perlu scope khusus)
 *
 * Available models:
 * - gpt-4o, gpt-4o-mini (OpenAI via GitHub)
 * - meta-llama-3.1-405b-instruct, meta-llama-3.1-70b-instruct
 * - mistral-large-2411, mistral-small
 * - phi-4, phi-3.5-mini-instruct
 * - deepseek-r1, cohere-command-r-plus
 *
 * @see https://github.com/marketplace/models
 */
class GitHubModelsProvider implements AIProviderInterface
{
    private array $config;
    private float $lastCost = 0;

    public function __construct(array $config = [])
    {
        $this->config = $config ?: config('ai.providers.github', []);
    }

    public function chat(array $messages, array $options = []): array
    {
        $model = $options['model'] ?? $this->config['model'] ?? 'gpt-4o-mini';
        $maxTokens = $options['max_tokens'] ?? $this->config['max_tokens'] ?? 4096;
        $temperature = $options['temperature'] ?? $this->config['temperature'] ?? 0.7;
        $baseUrl = $this->config['base_url'] ?? 'https://models.inference.ai.azure.com';

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->config['token'],
                'Content-Type' => 'application/json',
            ])->timeout(60)->post($baseUrl . '/chat/completions', [
                'model' => $model,
                'messages' => $messages,
                'max_tokens' => $maxTokens,
                'temperature' => $temperature,
            ]);

            if (!$response->successful()) {
                throw new \Exception('GitHub Models API error: ' . $response->status() . ' ' . $response->body());
            }

            $data = $response->json();
            $inputTokens = $data['usage']['prompt_tokens'] ?? 0;
            $outputTokens = $data['usage']['completion_tokens'] ?? 0;

            // GitHub Models = FREE for public models (rate-limited)
            $this->lastCost = 0;

            return [
                'content' => $data['choices'][0]['message']['content'] ?? '',
                'tokens' => $data['usage']['total_tokens'] ?? 0,
                'model' => $model,
                'provider' => 'github',
                'metadata' => [
                    'input_tokens' => $inputTokens,
                    'output_tokens' => $outputTokens,
                    'finish_reason' => $data['choices'][0]['finish_reason'] ?? null,
                    'cost' => 0,
                ],
            ];
        } catch (\Exception $e) {
            Log::error('GitHub Models Provider Error: ' . $e->getMessage());
            throw $e;
        }
    }

    public function complete(string $prompt, array $options = []): array
    {
        return $this->chat([
            ['role' => 'user', 'content' => $prompt],
        ], $options);
    }

    /**
     * List available models on GitHub Models.
     */
    public function listAvailableModels(): array
    {
        return [
            // OpenAI models
            ['id' => 'gpt-4o', 'name' => 'GPT-4o', 'provider' => 'OpenAI', 'free' => true],
            ['id' => 'gpt-4o-mini', 'name' => 'GPT-4o Mini', 'provider' => 'OpenAI', 'free' => true],
            // Meta Llama
            ['id' => 'meta-llama-3.1-405b-instruct', 'name' => 'Llama 3.1 405B', 'provider' => 'Meta', 'free' => true],
            ['id' => 'meta-llama-3.1-70b-instruct', 'name' => 'Llama 3.1 70B', 'provider' => 'Meta', 'free' => true],
            ['id' => 'meta-llama-3.1-8b-instruct', 'name' => 'Llama 3.1 8B', 'provider' => 'Meta', 'free' => true],
            // Mistral
            ['id' => 'mistral-large-2411', 'name' => 'Mistral Large', 'provider' => 'Mistral AI', 'free' => true],
            ['id' => 'mistral-small', 'name' => 'Mistral Small', 'provider' => 'Mistral AI', 'free' => true],
            // Microsoft
            ['id' => 'phi-4', 'name' => 'Phi-4', 'provider' => 'Microsoft', 'free' => true],
            ['id' => 'phi-3.5-mini-instruct', 'name' => 'Phi-3.5 Mini', 'provider' => 'Microsoft', 'free' => true],
            // Others
            ['id' => 'deepseek-r1', 'name' => 'DeepSeek R1', 'provider' => 'DeepSeek', 'free' => true],
            ['id' => 'cohere-command-r-plus', 'name' => 'Cohere Command R+', 'provider' => 'Cohere', 'free' => true],
        ];
    }

    public function isAvailable(): bool
    {
        return !empty($this->config['token']);
    }

    public function getName(): string
    {
        return 'GitHub Models';
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
