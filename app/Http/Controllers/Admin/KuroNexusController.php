<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\AI\AIManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

/**
 * KuroNexusController — Kuro Nexus AI Hub
 *
 * Dashboard utama untuk semua fitur AI canggih di KVT Hub.
 * Multi-provider (OpenAI, Claude, n8n, Ollama), pipeline system,
 * dan fitur: Chat, Code Gen, Translate, Summarize, Sentiment, Tutor.
 */
class KuroNexusController extends Controller
{
    private AIManager $ai;

    public function __construct(AIManager $ai)
    {
        $this->ai = $ai;
    }

    // =================== PAGES ===================

    public function index()
    {
        $providers = $this->ai->getProviderStatus();
        $features = config('ai.features', []);
        $stats = $this->getUsageStats();

        return view('akun.admin.kuro-nexus', compact('providers', 'features', 'stats'));
    }

    // =================== AI CHAT (Multi-Provider) ===================

    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:5000',
            'provider' => 'nullable|string|in:openai,claude,n8n,ollama',
            'system_prompt' => 'nullable|string|max:3000',
            'context' => 'nullable|string',
        ]);

        $provider = $request->input('provider', config('ai.default'));
        $message = $request->input('message');
        $systemPrompt = $request->input('system_prompt', $this->getKuroSystemPrompt());
        $context = $request->input('context', 'general');

        // Build messages
        $messages = [
            ['role' => 'system', 'content' => $this->enrichSystemPrompt($systemPrompt, $context)],
        ];

        // Add conversation history from session
        $history = session('nexus_chat_history', []);
        foreach (array_slice($history, -10) as $msg) {
            $messages[] = $msg;
        }
        $messages[] = ['role' => 'user', 'content' => $message];

        try {
            $result = $this->ai->chat($messages, [
                'provider' => $provider,
                'no_cache' => true,
            ]);

            // Save to session history
            $history[] = ['role' => 'user', 'content' => $message];
            $history[] = ['role' => 'assistant', 'content' => $result['content']];
            session(['nexus_chat_history' => array_slice($history, -20)]);

            // Track usage
            $this->trackUsage('chat', $result);

            return response()->json([
                'success' => true,
                'message' => [
                    'role' => 'assistant',
                    'content' => $result['content'],
                    'provider' => $result['provider'] ?? $provider,
                    'model' => $result['model'] ?? '',
                    'tokens' => $result['tokens'] ?? 0,
                    'cost' => $result['metadata']['cost'] ?? 0,
                    'cached' => $result['cached'] ?? false,
                    'time' => now()->format('H:i'),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Nexus chat error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'AI tidak merespons. ' . $e->getMessage(),
            ], 500);
        }
    }

    public function resetChat()
    {
        session()->forget('nexus_chat_history');
        return response()->json(['success' => true]);
    }

    // =================== CODE GENERATOR ===================

    public function generateCode(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:3000',
            'language' => 'required|string|max:30',
            'framework' => 'nullable|string|max:50',
            'provider' => 'nullable|string',
        ]);

        try {
            $code = $this->ai->generateCode(
                $request->input('description'),
                $request->input('language', 'PHP'),
                $request->input('framework', 'Laravel'),
                $request->input('provider')
            );

            return response()->json([
                'success' => true,
                'code' => $code,
                'language' => $request->input('language'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== TRANSLATOR ===================

    public function translate(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:10000',
            'to' => 'required|string|max:30',
            'from' => 'nullable|string|max:30',
            'provider' => 'nullable|string',
        ]);

        try {
            $translated = $this->ai->translate(
                $request->input('text'),
                $request->input('to', 'English'),
                $request->input('from', 'auto'),
                $request->input('provider')
            );

            return response()->json([
                'success' => true,
                'translated' => $translated,
                'from' => $request->input('from', 'auto'),
                'to' => $request->input('to'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== SUMMARIZER ===================

    public function summarize(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:20000',
            'max_words' => 'nullable|integer|min:50|max:1000',
            'provider' => 'nullable|string',
        ]);

        try {
            $summary = $this->ai->summarize(
                $request->input('text'),
                $request->input('max_words', 200),
                $request->input('provider')
            );

            return response()->json([
                'success' => true,
                'summary' => $summary,
                'original_length' => strlen($request->input('text')),
                'summary_length' => strlen($summary),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== SENTIMENT ANALYSIS ===================

    public function sentiment(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:5000',
            'provider' => 'nullable|string',
        ]);

        try {
            $result = $this->ai->sentiment(
                $request->input('text'),
                $request->input('provider')
            );

            return response()->json([
                'success' => true,
                'analysis' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== AI TUTOR ===================

    public function tutor(Request $request)
    {
        $request->validate([
            'topic' => 'required|string|max:2000',
            'level' => 'nullable|string|in:beginner,intermediate,advanced',
            'provider' => 'nullable|string',
        ]);

        try {
            $explanation = $this->ai->explain(
                $request->input('topic'),
                $request->input('level', 'beginner'),
                $request->input('provider')
            );

            return response()->json([
                'success' => true,
                'explanation' => $explanation,
                'level' => $request->input('level', 'beginner'),
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== PIPELINE ===================

    public function runPipeline(Request $request)
    {
        $request->validate([
            'input' => 'required|string|max:10000',
            'steps' => 'required|array|min:1|max:5',
            'steps.*.action' => 'required|string',
            'steps.*.params' => 'nullable|array',
            'steps.*.provider' => 'nullable|string',
        ]);

        try {
            $pipeline = $this->ai->pipeline();
            foreach ($request->input('steps') as $step) {
                $pipeline->step(
                    $step['action'],
                    $step['params'] ?? [],
                    $step['provider'] ?? null
                );
            }

            $result = $pipeline->run($request->input('input'));
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    // =================== N8N INTEGRATION ===================

    public function n8nTrigger(Request $request)
    {
        $request->validate([
            'workflow' => 'required|string',
            'payload' => 'nullable|array',
        ]);

        try {
            $n8n = $this->ai->n8n();
            $result = $n8n->triggerWorkflow(
                $request->input('workflow'),
                $request->input('payload', [])
            );

            return response()->json([
                'success' => true,
                'result' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function n8nWebhook(Request $request)
    {
        // Verify webhook secret
        $secret = config('ai.providers.n8n.webhook_secret');
        if ($secret && $request->header('X-Webhook-Secret') !== $secret) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Log::info('n8n webhook received', $request->all());

        // Process incoming n8n webhook data
        $action = $request->input('action', 'log');
        $data = $request->input('data', []);

        $processed = match ($action) {
            'notify' => $this->processN8nNotification($data),
            'update' => $this->processN8nUpdate($data),
            'trigger' => $this->processN8nTrigger($data),
            default => ['status' => 'received', 'action' => $action],
        };

        return response()->json(['success' => true, 'processed' => $processed]);
    }

    // =================== PROVIDER STATUS API ===================

    public function providerStatus()
    {
        $providers = $this->ai->getProviderStatus();

        // Check n8n workflows separately
        try {
            $n8n = $this->ai->n8n();
            $providers['n8n']['workflows'] = $n8n->listWorkflows();
        } catch (\Exception $e) {
            // n8n not configured
        }

        return response()->json([
            'success' => true,
            'providers' => $providers,
            'default' => config('ai.default'),
            'features' => config('ai.features'),
        ]);
    }

    // =================== USAGE STATS API ===================

    public function usageStats()
    {
        return response()->json([
            'success' => true,
            'stats' => $this->getUsageStats(),
        ]);
    }

    // =================== HELPERS ===================

    private function getKuroSystemPrompt(): string
    {
        return <<<PROMPT
Kamu adalah **Kuro Nexus** 🐱⚡, AI super canggih dari KVT Hub — platform pendidikan digital global.
Kamu bisa:
- Menjawab pertanyaan tentang programming, pendidikan, dan teknologi
- Menghasilkan kode dalam berbagai bahasa
- Menganalisis dan me-review kode
- Menerjemahkan teks multi-bahasa
- Merangkum dokumen panjang
- Menjadi tutor AI personal

Kepribadian:
- Bahasa Indonesia santai tapi profesional
- Gunakan emoji secukupnya
- Format jawaban dengan Markdown (bold, code, list)
- Akurat dan jujur — jangan mengarang data
PROMPT;
    }

    private function enrichSystemPrompt(string $base, string $context): string
    {
        $extras = match ($context) {
            'code' => "\n\nFokus pada coding, programming, dan development. Berikan code snippet jika relevan.",
            'education' => "\n\nFokus pada pendidikan, pembelajaran, dan tutorial. Jelaskan secara pedagogis.",
            'github' => "\n\nFokus pada GitHub, version control, CI/CD, dan kolaborasi developer.",
            'career' => "\n\nFokus pada karir di bidang teknologi, interview prep, dan skill development.",
            default => '',
        };
        return $base . $extras;
    }

    private function trackUsage(string $feature, array $result): void
    {
        $key = 'nexus_usage_' . date('Y-m-d');
        $usage = Cache::get($key, [
            'total_requests' => 0,
            'total_tokens' => 0,
            'total_cost' => 0,
            'by_feature' => [],
            'by_provider' => [],
        ]);

        $usage['total_requests']++;
        $usage['total_tokens'] += $result['tokens'] ?? 0;
        $usage['total_cost'] += $result['metadata']['cost'] ?? 0;

        $provider = $result['provider'] ?? 'unknown';
        $usage['by_feature'][$feature] = ($usage['by_feature'][$feature] ?? 0) + 1;
        $usage['by_provider'][$provider] = ($usage['by_provider'][$provider] ?? 0) + 1;

        Cache::put($key, $usage, 86400);
    }

    private function getUsageStats(): array
    {
        $today = Cache::get('nexus_usage_' . date('Y-m-d'), [
            'total_requests' => 0,
            'total_tokens' => 0,
            'total_cost' => 0,
            'by_feature' => [],
            'by_provider' => [],
        ]);

        // Get last 7 days
        $weekly = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('Y-m-d', strtotime("-{$i} days"));
            $day = Cache::get('nexus_usage_' . $date, ['total_requests' => 0, 'total_tokens' => 0, 'total_cost' => 0]);
            $weekly[$date] = $day;
        }

        return [
            'today' => $today,
            'weekly' => $weekly,
        ];
    }

    private function processN8nNotification(array $data): array
    {
        Log::info('n8n notification', $data);
        return ['status' => 'notified', 'data' => $data];
    }

    private function processN8nUpdate(array $data): array
    {
        Log::info('n8n update', $data);
        return ['status' => 'updated', 'data' => $data];
    }

    private function processN8nTrigger(array $data): array
    {
        Log::info('n8n trigger', $data);
        return ['status' => 'triggered', 'data' => $data];
    }
}
