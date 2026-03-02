<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * Ollama Provider — Local AI Models
 *
 * Jalankan model AI lokal (Llama 3.1, Mistral, CodeLlama, Phi-3, dll)
 * tanpa biaya API. Cocok untuk development & privasi data.
 *
 * Setup: docker run -d -p 11434:11434 ollama/ollama
 *        ollama pull llama3.1
 */
class OllamaProvider implements AIProviderInterface
{
    private array $config;
    private float $lastCost = 0;

    public function __construct(array $config = [])
    {
        $this->config = $config ?: config('ai.providers.ollama', []);
    }

    public function chat(array $messages, array $options = []): array
    {
        $model = $options['model'] ?? $this->config['model'] ?? 'llama3.1';
        $maxTokens = $options['max_tokens'] ?? $this->config['max_tokens'] ?? 4096;

        try {
            $response = Http::timeout(120)->post($this->config['base_url'] . '/api/chat', [
                'model' => $model,
                'messages' => $messages,
                'options' => [
                    'num_predict' => $maxTokens,
                    'temperature' => $options['temperature'] ?? $this->config['temperature'] ?? 0.7,
                ],
                'stream' => false,
            ]);

            if (!$response->successful()) {
                throw new \Exception('Ollama error: ' . $response->body());
            }

            $data = $response->json();

            return [
                'content' => $data['message']['content'] ?? '',
                'tokens' => ($data['eval_count'] ?? 0) + ($data['prompt_eval_count'] ?? 0),
                'model' => $model,
                'provider' => 'ollama',
                'metadata' => [
                    'eval_count' => $data['eval_count'] ?? 0,
                    'eval_duration' => $data['eval_duration'] ?? 0,
                    'total_duration' => $data['total_duration'] ?? 0,
                    'cost' => 0, // Local = free
                ],
            ];
        } catch (\Exception $e) {
            Log::error('Ollama Provider Error: ' . $e->getMessage());
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
     * List model yang tersedia di Ollama lokal.
     */
    public function listModels(): array
    {
        try {
            $response = Http::timeout(5)->get($this->config['base_url'] . '/api/tags');
            return $response->successful() ? ($response->json()['models'] ?? []) : [];
        } catch (\Exception $e) {
            return [];
        }
    }

    public function isAvailable(): bool
    {
        try {
            $response = Http::timeout(3)->get($this->config['base_url'] . '/api/tags');
            return $response->successful();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getName(): string
    {
        return 'Ollama (Local)';
    }

    public function getModel(): string
    {
        return $this->config['model'] ?? 'llama3.1';
    }

    public function getLastCost(): float
    {
        return 0; // Always free
    }
}
