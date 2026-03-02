<?php

namespace App\Services\AI\Providers;

use App\Services\AI\Contracts\AIProviderInterface;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * n8n Provider — Workflow Automation AI Integration
 *
 * Mengirim request ke n8n webhook endpoint.
 * n8n bisa mengorkestrasi multi-langkah: call AI → proses data → simpan → kirim notif.
 *
 * Setup n8n:
 * 1. Install n8n (Docker / npx n8n)
 * 2. Buat workflow dengan Webhook trigger
 * 3. Tambah node: AI (OpenAI/Claude), IF, Function, HTTP, dll
 * 4. Copy webhook URL ke .env N8N_WORKFLOW_*
 */
class N8nProvider implements AIProviderInterface
{
    private array $config;
    private float $lastCost = 0;

    public function __construct(array $config = [])
    {
        $this->config = $config ?: config('ai.providers.n8n', []);
    }

    public function chat(array $messages, array $options = []): array
    {
        $webhookUrl = $options['webhook'] ?? $this->config['workflows']['chat'] ?? null;
        return $this->callWebhook($webhookUrl, [
            'action' => 'chat',
            'messages' => $messages,
            'options' => $options,
        ]);
    }

    public function complete(string $prompt, array $options = []): array
    {
        $webhookUrl = $options['webhook'] ?? $this->config['workflows']['custom'] ?? null;
        return $this->callWebhook($webhookUrl, [
            'action' => 'complete',
            'prompt' => $prompt,
            'options' => $options,
        ]);
    }

    /**
     * Trigger n8n workflow tertentu via webhook.
     */
    public function triggerWorkflow(string $workflowKey, array $payload = []): array
    {
        $webhookUrl = $this->config['workflows'][$workflowKey] ?? null;
        return $this->callWebhook($webhookUrl, $payload);
    }

    /**
     * Kirim data ke n8n webhook.
     */
    private function callWebhook(?string $webhookUrl, array $payload): array
    {
        if (!$webhookUrl) {
            return [
                'content' => 'n8n workflow belum dikonfigurasi. Set N8N_WORKFLOW_* di .env file.',
                'tokens' => 0,
                'model' => 'n8n-workflow',
                'provider' => 'n8n',
                'metadata' => ['error' => 'no_webhook_url'],
            ];
        }

        try {
            $headers = ['Content-Type' => 'application/json'];
            if (!empty($this->config['webhook_secret'])) {
                $headers['X-Webhook-Secret'] = $this->config['webhook_secret'];
            }

            $response = Http::withHeaders($headers)
                ->timeout(30)
                ->post($webhookUrl, $payload);

            if (!$response->successful()) {
                throw new \Exception('n8n webhook error: ' . $response->status() . ' - ' . $response->body());
            }

            $data = $response->json();

            return [
                'content' => $data['content'] ?? $data['response'] ?? $data['output'] ?? json_encode($data),
                'tokens' => $data['tokens'] ?? 0,
                'model' => 'n8n-workflow',
                'provider' => 'n8n',
                'metadata' => [
                    'workflow' => $webhookUrl,
                    'execution_id' => $data['executionId'] ?? null,
                    'status' => $data['status'] ?? 'completed',
                    'cost' => 0,
                ],
            ];
        } catch (\Exception $e) {
            Log::error('n8n Provider Error: ' . $e->getMessage());
            return [
                'content' => 'n8n error: ' . $e->getMessage(),
                'tokens' => 0,
                'model' => 'n8n-workflow',
                'provider' => 'n8n',
                'metadata' => ['error' => $e->getMessage()],
            ];
        }
    }

    /**
     * List semua workflow yang dikonfigurasi.
     */
    public function listWorkflows(): array
    {
        $workflows = [];
        foreach ($this->config['workflows'] ?? [] as $key => $url) {
            $workflows[] = [
                'key' => $key,
                'url' => $url ? '✅ Configured' : '❌ Not set',
                'available' => !empty($url),
            ];
        }
        return $workflows;
    }

    public function isAvailable(): bool
    {
        // n8n is available if at least one workflow is configured
        foreach ($this->config['workflows'] ?? [] as $url) {
            if (!empty($url)) return true;
        }
        return false;
    }

    public function getName(): string
    {
        return 'n8n Workflow';
    }

    public function getModel(): string
    {
        return 'n8n-workflow-automation';
    }

    public function getLastCost(): float
    {
        return $this->lastCost;
    }
}
