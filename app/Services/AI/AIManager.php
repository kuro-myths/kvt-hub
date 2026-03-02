<?php

namespace App\Services\AI;

use App\Services\AI\Contracts\AIProviderInterface;
use App\Services\AI\Providers\OpenAIProvider;
use App\Services\AI\Providers\ClaudeProvider;
use App\Services\AI\Providers\N8nProvider;
use App\Services\AI\Providers\OllamaProvider;
use App\Services\AI\Pipeline\AIPipeline;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * AIManager — Multi-Provider AI Orchestrator
 *
 * Facade utama untuk semua AI operations di Kuro Nexus.
 * Mendukung multi-provider, fallback, caching, dan pipeline.
 *
 * Usage:
 *   $ai = app(AIManager::class);
 *   $ai->chat([...]);                     // Use default provider
 *   $ai->provider('claude')->chat([...]); // Use specific provider
 *   $ai->pipeline()->step('translate')->step('summarize')->run($text);
 */
class AIManager
{
    private array $providers = [];
    private string $defaultProvider;

    public function __construct()
    {
        $this->defaultProvider = config('ai.default', 'openai');
    }

    /**
     * Get or create a provider instance.
     */
    public function provider(string $name): AIProviderInterface
    {
        if (!isset($this->providers[$name])) {
            $this->providers[$name] = $this->createProvider($name);
        }
        return $this->providers[$name];
    }

    /**
     * Create provider instance by driver name.
     */
    private function createProvider(string $name): AIProviderInterface
    {
        $config = config("ai.providers.{$name}", []);
        $driver = $config['driver'] ?? $name;

        return match ($driver) {
            'openai' => new OpenAIProvider($config),
            'claude' => new ClaudeProvider($config),
            'n8n' => new N8nProvider($config),
            'ollama' => new OllamaProvider($config),
            default => throw new \InvalidArgumentException("Unknown AI provider: {$name}"),
        };
    }

    /**
     * Chat using default provider (with fallback).
     */
    public function chat(array $messages, array $options = []): array
    {
        $providerName = $options['provider'] ?? $this->defaultProvider;
        $cacheKey = $this->getCacheKey('chat', $messages, $options);

        if ($this->shouldCache($options)) {
            $cached = Cache::get($cacheKey);
            if ($cached) {
                return array_merge($cached, ['cached' => true]);
            }
        }

        try {
            $result = $this->provider($providerName)->chat($messages, $options);

            if ($this->shouldCache($options)) {
                Cache::put($cacheKey, $result, config('ai.cache.ttl', 3600));
            }

            return $result;
        } catch (\Exception $e) {
            // Fallback to other providers
            return $this->fallbackChat($messages, $options, $providerName, $e);
        }
    }

    /**
     * Simple complete using default provider.
     */
    public function complete(string $prompt, array $options = []): array
    {
        return $this->chat([
            ['role' => 'user', 'content' => $prompt],
        ], $options);
    }

    /**
     * Fallback to next available provider.
     */
    private function fallbackChat(array $messages, array $options, string $failedProvider, \Exception $originalError): array
    {
        $providers = array_keys(config('ai.providers', []));
        $fallbackProviders = array_diff($providers, [$failedProvider]);

        foreach ($fallbackProviders as $providerName) {
            try {
                $provider = $this->provider($providerName);
                if ($provider->isAvailable()) {
                    Log::info("AI fallback: {$failedProvider} → {$providerName}");
                    $result = $provider->chat($messages, $options);
                    $result['fallback'] = true;
                    $result['original_provider'] = $failedProvider;
                    return $result;
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        // All providers failed
        Log::error('All AI providers failed', ['error' => $originalError->getMessage()]);
        throw $originalError;
    }

    /**
     * Create a new pipeline instance.
     */
    public function pipeline(): AIPipeline
    {
        return new AIPipeline($this);
    }

    /**
     * Get status of all configured providers.
     */
    public function getProviderStatus(): array
    {
        $providers = config('ai.providers', []);
        $status = [];

        foreach ($providers as $name => $config) {
            try {
                $provider = $this->provider($name);
                $status[$name] = [
                    'name' => $provider->getName(),
                    'model' => $provider->getModel(),
                    'available' => $provider->isAvailable(),
                    'driver' => $config['driver'] ?? $name,
                ];
            } catch (\Exception $e) {
                $status[$name] = [
                    'name' => ucfirst($name),
                    'model' => $config['model'] ?? 'unknown',
                    'available' => false,
                    'error' => $e->getMessage(),
                ];
            }
        }

        return $status;
    }

    /**
     * Get n8n provider directly (for workflow-specific operations).
     */
    public function n8n(): N8nProvider
    {
        return $this->provider('n8n');
    }

    // =================== AI FEATURE SHORTCUTS ===================

    /**
     * Translate text.
     */
    public function translate(string $text, string $to = 'English', string $from = 'auto', ?string $provider = null): string
    {
        $prompt = "Translate from {$from} to {$to}. Return ONLY the translated text:\n\n{$text}";
        $options = $provider ? ['provider' => $provider] : [];
        $result = $this->complete($prompt, $options);
        return $result['content'];
    }

    /**
     * Summarize text.
     */
    public function summarize(string $text, int $maxWords = 200, ?string $provider = null): string
    {
        $prompt = "Summarize in max {$maxWords} words. Return only the summary:\n\n{$text}";
        $options = $provider ? ['provider' => $provider] : [];
        $result = $this->complete($prompt, $options);
        return $result['content'];
    }

    /**
     * Analyze sentiment.
     */
    public function sentiment(string $text, ?string $provider = null): array
    {
        $prompt = "Analyze sentiment. Return JSON only: {\"sentiment\":\"positive|negative|neutral\",\"score\":0.0-1.0,\"emotions\":[],\"summary\":\"\"}\n\nText: {$text}";
        $options = $provider ? ['provider' => $provider] : [];
        $result = $this->complete($prompt, $options);

        try {
            $json = json_decode($result['content'], true);
            return is_array($json) ? $json : ['sentiment' => 'neutral', 'score' => 0.5, 'raw' => $result['content']];
        } catch (\Exception $e) {
            return ['sentiment' => 'neutral', 'score' => 0.5, 'raw' => $result['content']];
        }
    }

    /**
     * Generate code.
     */
    public function generateCode(string $description, string $language = 'PHP', string $framework = 'Laravel', ?string $provider = null): string
    {
        $prompt = "Generate {$language} code using {$framework}. Include comments and best practices.\n\nRequirements:\n{$description}";
        $options = $provider ? ['provider' => $provider] : [];
        $result = $this->complete($prompt, $options);
        return $result['content'];
    }

    /**
     * AI Tutoring — explain a concept.
     */
    public function explain(string $topic, string $level = 'beginner', ?string $provider = null): string
    {
        $prompt = "Kamu adalah tutor ahli. Jelaskan topik berikut dalam Bahasa Indonesia, level {$level}.\nGunakan analogi, contoh kode, dan format Markdown.\n\nTopik: {$topic}";
        $options = $provider ? ['provider' => $provider] : [];
        $result = $this->complete($prompt, $options);
        return $result['content'];
    }

    // =================== HELPERS ===================

    private function shouldCache(array $options): bool
    {
        if (isset($options['no_cache']) && $options['no_cache']) return false;
        return config('ai.cache.enabled', true);
    }

    private function getCacheKey(string $action, $data, array $options): string
    {
        $prefix = config('ai.cache.prefix', 'kuro_ai_');
        $hash = md5(json_encode([$action, $data, $options]));
        return $prefix . $action . '_' . $hash;
    }
}
