<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ChatbotService;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GitHubAIController extends Controller
{
    protected string $githubOwner = 'kuro-myths';
    protected string $githubRepo  = 'kvt-hub';
    protected ChatbotService $chatbotService;

    public function __construct(ChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    // ========================================================================
    //  MAIN PAGE — GitHub AI Hub
    // ========================================================================

    /**
     * Halaman utama GitHub AI Hub — semua fitur dalam satu dashboard.
     */
    public function index()
    {
        $ghRepo         = $this->getRepoInfo();
        $ghLanguages    = $this->getLanguages();
        $ghContributors = $this->getContributors();
        $ghCommits      = $this->getCommits(10);
        $ghBranches     = $this->getBranches();
        $ghReleases     = $this->getReleases();
        $ghPackages     = $this->getPackages();
        $ghIssues       = $this->getIssues(10);
        $ghPulls        = $this->getPullRequests(10);
        $ghTopics       = $ghRepo['topics'] ?? [];
        $ghWorkflows    = $this->getWorkflows();

        // Language showcase data (live running)
        $languageShowcase = $this->getLanguageShowcaseData();

        // Platform knowledge for AI (preloaded summary)
        $platformSummary = $this->getPlatformKnowledge();

        return view('akun.admin.github-ai', compact(
            'ghRepo', 'ghLanguages', 'ghContributors', 'ghCommits',
            'ghBranches', 'ghReleases', 'ghPackages', 'ghIssues',
            'ghPulls', 'ghTopics', 'ghWorkflows',
            'languageShowcase', 'platformSummary'
        ));
    }

    // ========================================================================
    //  AI CHAT — Interactive discussion about KVT-Hub
    // ========================================================================

    /**
     * Kirim pesan ke AI tentang GitHub / KVT-Hub.
     */
    public function chat(Request $request): JsonResponse
    {
        $request->validate([
            'message' => 'required|string|max:2000',
            'context' => 'nullable|string|in:general,architecture,github,packages,languages,issues,deployment',
        ]);

        $userId  = auth()->id();
        $context = $request->input('context', 'general');
        $message = $request->input('message');

        // Get or create session for GitHub AI
        $session = ChatSession::firstOrCreate(
            [
                'user_id' => $userId,
                'context' => 'github-ai',
                'status'  => 'active',
            ],
            [
                'title'            => 'GitHub AI Assistant',
                'message_count'    => 0,
                'total_tokens_used' => 0,
                'api_cost'         => 0,
            ]
        );

        // Inject context-aware system knowledge
        $enrichedMessage = $this->enrichMessageWithContext($message, $context);

        try {
            // Use chatbot service
            $response = $this->chatbotService->sendMessage($session, $enrichedMessage);

            return response()->json([
                'success' => true,
                'message' => [
                    'id'      => $response->id,
                    'content' => $response->content,
                    'role'    => 'assistant',
                    'time'    => $response->created_at->format('H:i'),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('GitHub AI Chat Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error'   => 'Gagal memproses pertanyaan. Coba lagi.',
            ], 500);
        }
    }

    /**
     * Reset / Hapus riwayat chat GitHub AI.
     */
    public function resetChat(): JsonResponse
    {
        $session = ChatSession::where('user_id', auth()->id())
            ->where('context', 'github-ai')
            ->where('status', 'active')
            ->first();

        if ($session) {
            $session->messages()->delete();
            $session->update(['message_count' => 0]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Ambil riwayat chat.
     */
    public function chatHistory(): JsonResponse
    {
        $session = ChatSession::where('user_id', auth()->id())
            ->where('context', 'github-ai')
            ->where('status', 'active')
            ->first();

        if (!$session) {
            return response()->json(['messages' => []]);
        }

        $messages = $session->messages()
            ->whereIn('role', ['user', 'assistant'])
            ->orderBy('created_at')
            ->limit(50)
            ->get()
            ->map(fn($m) => [
                'id'      => $m->id,
                'role'    => $m->role,
                'content' => $m->content,
                'time'    => $m->created_at->format('H:i'),
            ]);

        return response()->json(['messages' => $messages]);
    }

    // ========================================================================
    //  MULTI-LANGUAGE CODE RUNNER (browser-based)
    // ========================================================================

    /**
     * Jalankan kode di browser (untuk bahasa yang bisa dijalankan client-side).
     * Server-side fallback untuk PHP.
     */
    public function runCode(Request $request): JsonResponse
    {
        $request->validate([
            'code'     => 'required|string|max:10000',
            'language' => 'required|string',
        ]);

        $language = strtolower($request->input('language'));
        $code     = $request->input('code');

        // Server-side execution hanya untuk PHP (sandboxed)
        if ($language === 'php') {
            return $this->executePhpSandbox($code);
        }

        // Untuk JS/Python/dll — jalankan di browser (client-side)
        return response()->json([
            'success' => true,
            'mode'    => 'client',
            'message' => 'Kode akan dijalankan di browser.',
        ]);
    }

    /**
     * PHP Sandbox — jalankan kode PHP dengan aman.
     */
    protected function executePhpSandbox(string $code): JsonResponse
    {
        // Hapus tag PHP pembuka/penutup
        $code = preg_replace('/^<\?php\s*/i', '', $code);
        $code = preg_replace('/\s*\?>$/', '', $code);

        // Blacklist fungsi berbahaya
        $blacklist = [
            'exec', 'shell_exec', 'system', 'passthru', 'popen', 'proc_open',
            'eval', 'file_put_contents', 'file_get_contents', 'fopen', 'fwrite',
            'unlink', 'rmdir', 'mkdir', 'rename', 'copy', 'move_uploaded_file',
            'curl_init', 'curl_exec', 'header', 'setcookie', 'session_start',
            'mail', 'fsockopen', 'stream_socket_client', 'pcntl_exec',
        ];

        foreach ($blacklist as $fn) {
            if (preg_match('/\b' . preg_quote($fn) . '\s*\(/i', $code)) {
                return response()->json([
                    'success' => false,
                    'output'  => '',
                    'error'   => "Fungsi '{$fn}()' tidak diizinkan demi keamanan.",
                    'time_ms' => 0,
                ]);
            }
        }

        $start = microtime(true);

        try {
            ob_start();
            $result = eval($code);
            $output = ob_get_clean();

            if ($result !== null && $result !== false && empty($output)) {
                $output = print_r($result, true);
            }

            $timeMs = round((microtime(true) - $start) * 1000, 2);

            return response()->json([
                'success' => true,
                'output'  => $output ?: '(tidak ada output)',
                'error'   => '',
                'time_ms' => $timeMs,
            ]);
        } catch (\Throwable $e) {
            ob_end_clean();
            $timeMs = round((microtime(true) - $start) * 1000, 2);

            return response()->json([
                'success' => false,
                'output'  => '',
                'error'   => $e->getMessage() . ' on line ' . $e->getLine(),
                'time_ms' => $timeMs,
            ]);
        }
    }

    // ========================================================================
    //  GITHUB API — Packages, Issues, PRs, Workflows
    // ========================================================================

    protected function githubGet(string $endpoint, int $ttl = 600): ?array
    {
        $cacheKey = 'ghub_ai_' . md5($endpoint);

        return Cache::remember($cacheKey, $ttl, function () use ($endpoint) {
            try {
                $token = config('services.github.token');
                $headers = [
                    'Accept'     => 'application/vnd.github.v3+json',
                    'User-Agent' => 'KVT-Hub-App',
                ];
                if ($token) {
                    $headers['Authorization'] = "Bearer {$token}";
                }

                $url = str_starts_with($endpoint, 'https://')
                    ? $endpoint
                    : "https://api.github.com/repos/{$this->githubOwner}/{$this->githubRepo}{$endpoint}";

                $response = Http::withHeaders($headers)->timeout(8)->get($url);

                if ($response->successful()) {
                    return $response->json();
                }
            } catch (\Exception $e) {
                Log::warning('GitHub API error: ' . $e->getMessage());
            }
            return null;
        });
    }

    public function getRepoInfo(): array
    {
        $data = $this->githubGet('');
        if (!$data) return $this->fallbackRepo();

        return [
            'full_name'      => $data['full_name'] ?? "{$this->githubOwner}/{$this->githubRepo}",
            'description'    => $data['description'] ?? 'Platform Edukasi Digital Global',
            'html_url'       => $data['html_url'] ?? "https://github.com/{$this->githubOwner}/{$this->githubRepo}",
            'stars'          => $data['stargazers_count'] ?? 0,
            'forks'          => $data['forks_count'] ?? 0,
            'watchers'       => $data['subscribers_count'] ?? 0,
            'open_issues'    => $data['open_issues_count'] ?? 0,
            'default_branch' => $data['default_branch'] ?? 'main',
            'language'       => $data['language'] ?? 'PHP',
            'size_kb'        => $data['size'] ?? 0,
            'topics'         => $data['topics'] ?? [],
            'created_at'     => $data['created_at'] ?? null,
            'updated_at'     => $data['updated_at'] ?? null,
            'pushed_at'      => $data['pushed_at'] ?? null,
            'license'        => $data['license']['spdx_id'] ?? 'MIT',
            'visibility'     => $data['visibility'] ?? 'public',
            'has_wiki'       => $data['has_wiki'] ?? false,
            'has_discussions' => $data['has_discussions'] ?? false,
            'has_projects'   => $data['has_projects'] ?? false,
        ];
    }

    protected function fallbackRepo(): array
    {
        return [
            'full_name' => "{$this->githubOwner}/{$this->githubRepo}",
            'description' => 'Platform Edukasi Digital Global',
            'html_url' => "https://github.com/{$this->githubOwner}/{$this->githubRepo}",
            'stars' => 0, 'forks' => 0, 'watchers' => 0, 'open_issues' => 0,
            'default_branch' => 'main', 'language' => 'PHP', 'size_kb' => 0,
            'topics' => [], 'created_at' => null, 'updated_at' => null,
            'pushed_at' => null, 'license' => 'MIT', 'visibility' => 'public',
            'has_wiki' => false, 'has_discussions' => false, 'has_projects' => false,
        ];
    }

    public function getLanguages(): array
    {
        return $this->githubGet('/languages', 600) ?? [];
    }

    public function getContributors(): array
    {
        $data = $this->githubGet('/contributors?per_page=30', 600);
        if (!$data) return [];
        return collect($data)->map(fn($c) => [
            'login'         => $c['login'] ?? 'Unknown',
            'avatar'        => $c['avatar_url'] ?? '',
            'html_url'      => $c['html_url'] ?? '#',
            'contributions' => $c['contributions'] ?? 0,
        ])->toArray();
    }

    public function getCommits(int $limit = 10): array
    {
        $data = $this->githubGet("/commits?per_page={$limit}", 300);
        if (!$data) return [];
        return collect($data)->map(fn($c) => [
            'sha'      => substr($c['sha'] ?? '', 0, 7),
            'message'  => $c['commit']['message'] ?? '',
            'author'   => $c['commit']['author']['name'] ?? 'Unknown',
            'login'    => $c['author']['login'] ?? null,
            'avatar'   => $c['author']['avatar_url'] ?? null,
            'date'     => $c['commit']['author']['date'] ?? '',
            'html_url' => $c['html_url'] ?? '#',
        ])->toArray();
    }

    public function getBranches(): array
    {
        $data = $this->githubGet('/branches?per_page=30', 600);
        if (!$data) return [];
        return collect($data)->map(fn($b) => [
            'name'      => $b['name'] ?? '',
            'sha'       => substr($b['commit']['sha'] ?? '', 0, 7),
            'protected' => $b['protected'] ?? false,
        ])->toArray();
    }

    public function getReleases(): array
    {
        $data = $this->githubGet('/releases?per_page=10', 600);
        if (!$data || !is_array($data)) return [];
        return collect($data)->map(fn($r) => [
            'tag_name'    => $r['tag_name'] ?? '',
            'name'        => $r['name'] ?? $r['tag_name'] ?? '',
            'body'        => $r['body'] ?? '',
            'published_at' => $r['published_at'] ?? '',
            'html_url'    => $r['html_url'] ?? '#',
            'draft'       => $r['draft'] ?? false,
            'prerelease'  => $r['prerelease'] ?? false,
            'author'      => $r['author']['login'] ?? 'Unknown',
        ])->toArray();
    }

    /**
     * GitHub Packages — ambil daftar packages dari user/org.
     */
    public function getPackages(): array
    {
        // GitHub Packages API - coba dari user
        $types = ['npm', 'maven', 'docker', 'nuget', 'rubygems', 'container'];
        $packages = [];

        foreach ($types as $type) {
            $data = $this->githubGet(
                "https://api.github.com/users/{$this->githubOwner}/packages?package_type={$type}",
                600
            );
            if ($data && is_array($data)) {
                foreach ($data as $pkg) {
                    $packages[] = [
                        'name'         => $pkg['name'] ?? '',
                        'package_type' => $pkg['package_type'] ?? $type,
                        'visibility'   => $pkg['visibility'] ?? 'public',
                        'html_url'     => $pkg['html_url'] ?? '#',
                        'created_at'   => $pkg['created_at'] ?? '',
                        'updated_at'   => $pkg['updated_at'] ?? '',
                        'description'  => $pkg['description'] ?? '',
                    ];
                }
            }
        }

        return $packages;
    }

    public function getIssues(int $limit = 10): array
    {
        $data = $this->githubGet("/issues?per_page={$limit}&state=all&sort=updated", 300);
        if (!$data) return [];
        return collect($data)->filter(fn($i) => !isset($i['pull_request']))->map(fn($i) => [
            'number'    => $i['number'] ?? 0,
            'title'     => $i['title'] ?? '',
            'state'     => $i['state'] ?? 'open',
            'labels'    => collect($i['labels'] ?? [])->pluck('name')->toArray(),
            'author'    => $i['user']['login'] ?? 'Unknown',
            'avatar'    => $i['user']['avatar_url'] ?? '',
            'created_at' => $i['created_at'] ?? '',
            'html_url'  => $i['html_url'] ?? '#',
            'comments'  => $i['comments'] ?? 0,
        ])->values()->toArray();
    }

    public function getPullRequests(int $limit = 10): array
    {
        $data = $this->githubGet("/pulls?per_page={$limit}&state=all&sort=updated", 300);
        if (!$data) return [];
        return collect($data)->map(fn($p) => [
            'number'    => $p['number'] ?? 0,
            'title'     => $p['title'] ?? '',
            'state'     => $p['state'] ?? 'open',
            'draft'     => $p['draft'] ?? false,
            'merged_at' => $p['merged_at'] ?? null,
            'author'    => $p['user']['login'] ?? 'Unknown',
            'avatar'    => $p['user']['avatar_url'] ?? '',
            'created_at' => $p['created_at'] ?? '',
            'html_url'  => $p['html_url'] ?? '#',
        ])->toArray();
    }

    public function getWorkflows(): array
    {
        $data = $this->githubGet('/actions/workflows', 600);
        if (!$data || !isset($data['workflows'])) return [];
        return collect($data['workflows'])->map(fn($w) => [
            'name'  => $w['name'] ?? '',
            'state' => $w['state'] ?? 'unknown',
            'path'  => $w['path'] ?? '',
            'badge' => $w['badge_url'] ?? '',
        ])->toArray();
    }

    // ========================================================================
    //  API ENDPOINTS (AJAX)
    // ========================================================================

    public function apiPackages(): JsonResponse
    {
        return response()->json(['packages' => $this->getPackages()]);
    }

    public function apiIssues(): JsonResponse
    {
        return response()->json(['issues' => $this->getIssues(20)]);
    }

    public function apiPulls(): JsonResponse
    {
        return response()->json(['pulls' => $this->getPullRequests(20)]);
    }

    public function apiLanguages(): JsonResponse
    {
        return response()->json(['languages' => $this->getLanguages()]);
    }

    public function apiRepoInfo(): JsonResponse
    {
        return response()->json([
            'repo'   => $this->getRepoInfo(),
            'stats'  => [
                'languages'    => $this->getLanguages(),
                'contributors' => count($this->getContributors()),
                'commits'      => count($this->getCommits(50)),
                'branches'     => count($this->getBranches()),
            ],
        ]);
    }

    // ========================================================================
    //  LANGUAGE SHOWCASE — Data untuk demo kode multi-bahasa
    // ========================================================================

    protected function getLanguageShowcaseData(): array
    {
        return [
            [
                'name'        => 'JavaScript',
                'slug'        => 'javascript',
                'icon'        => 'fab fa-js-square',
                'color'       => '#F7DF1E',
                'bg'          => 'from-yellow-500/20 to-yellow-600/10',
                'description' => 'Bahasa pemrograman utama untuk web. Bisa frontend & backend (Node.js).',
                'runnable'    => true,
                'mode'        => 'client',
                'example'     => "// JavaScript — Array & Arrow Functions\nconst angka = [1, 2, 3, 4, 5];\nconst kuadrat = angka.map(n => n ** 2);\nconsole.log('Angka:', angka);\nconsole.log('Kuadrat:', kuadrat);\nconsole.log('Total:', kuadrat.reduce((a, b) => a + b, 0));",
            ],
            [
                'name'        => 'Python',
                'slug'        => 'python',
                'icon'        => 'fab fa-python',
                'color'       => '#3776AB',
                'bg'          => 'from-blue-500/20 to-blue-600/10',
                'description' => 'Bahasa populer untuk AI, Data Science, automation, dan web (Django/Flask).',
                'runnable'    => true,
                'mode'        => 'client', // via Pyodide
                'example'     => "# Python — List Comprehension & F-Strings\nangka = [1, 2, 3, 4, 5]\nkuadrat = [n ** 2 for n in angka]\nprint(f'Angka: {angka}')\nprint(f'Kuadrat: {kuadrat}')\nprint(f'Total: {sum(kuadrat)}')\n\n# Dictionary\nmahasiswa = {'nama': 'Kuro', 'nilai': 95}\nfor key, val in mahasiswa.items():\n    print(f'{key}: {val}')",
            ],
            [
                'name'        => 'PHP',
                'slug'        => 'php',
                'icon'        => 'fab fa-php',
                'color'       => '#777BB4',
                'bg'          => 'from-purple-500/20 to-purple-600/10',
                'description' => 'Backend language utama KVT Hub. Framework Laravel 12.',
                'runnable'    => true,
                'mode'        => 'server',
                'example'     => "<?php\n// PHP — Array & Foreach\n\$angka = [1, 2, 3, 4, 5];\n\$kuadrat = array_map(fn(\$n) => \$n ** 2, \$angka);\n\necho 'Angka: ' . implode(', ', \$angka) . \"\\n\";\necho 'Kuadrat: ' . implode(', ', \$kuadrat) . \"\\n\";\necho 'Total: ' . array_sum(\$kuadrat) . \"\\n\";\n\n// Associative Array\n\$mahasiswa = ['nama' => 'Kuro', 'nilai' => 95];\nforeach (\$mahasiswa as \$key => \$val) {\n    echo \"\$key: \$val\\n\";\n}",
            ],
            [
                'name'        => 'TypeScript',
                'slug'        => 'typescript',
                'icon'        => 'fas fa-code',
                'color'       => '#3178C6',
                'bg'          => 'from-blue-600/20 to-blue-700/10',
                'description' => 'Superset JavaScript dengan static typing. Populer untuk project besar.',
                'runnable'    => true,
                'mode'        => 'client',
                'example'     => "// TypeScript — Interface & Generics\ninterface Mahasiswa {\n  nama: string;\n  nilai: number;\n  aktif: boolean;\n}\n\nconst siswa: Mahasiswa = {\n  nama: 'Kuro Akira',\n  nilai: 95,\n  aktif: true\n};\n\nfunction sapa<T extends { nama: string }>(obj: T): string {\n  return `Halo, ${obj.nama}!`;\n}\n\nconsole.log(sapa(siswa));\nconsole.log(`Nilai: ${siswa.nilai}`);",
            ],
            [
                'name'        => 'HTML/CSS',
                'slug'        => 'html',
                'icon'        => 'fab fa-html5',
                'color'       => '#E34F26',
                'bg'          => 'from-orange-500/20 to-orange-600/10',
                'description' => 'Markup & styling dasar untuk semua halaman web.',
                'runnable'    => true,
                'mode'        => 'preview',
                'example'     => "<!DOCTYPE html>\n<html>\n<head>\n  <style>\n    body { font-family: sans-serif; text-align: center; padding: 40px; background: linear-gradient(135deg, #041F4D, #0A7AE6); color: white; min-height: 80vh; }\n    .card { background: rgba(255,255,255,0.1); backdrop-filter: blur(10px); border-radius: 16px; padding: 30px; max-width: 400px; margin: auto; }\n    h1 { font-size: 2em; margin-bottom: 10px; }\n    .badge { display: inline-block; padding: 6px 16px; background: #3399FF; border-radius: 20px; font-size: 14px; margin-top: 10px; }\n  </style>\n</head>\n<body>\n  <div class=\"card\">\n    <h1>🎓 KVT Hub</h1>\n    <p>Platform Edukasi Digital Global</p>\n    <span class=\"badge\">Laravel 12 + Tailwind CSS</span>\n  </div>\n</body>\n</html>",
            ],
            [
                'name'        => 'SQL',
                'slug'        => 'sql',
                'icon'        => 'fas fa-database',
                'color'       => '#F29111',
                'bg'          => 'from-amber-500/20 to-amber-600/10',
                'description' => 'Bahasa query database. KVT Hub menggunakan PostgreSQL.',
                'runnable'    => true,
                'mode'        => 'client', // via sql.js (SQLite in browser)
                'example'     => "-- SQL — Buat & Query Tabel\nCREATE TABLE mahasiswa (\n  id INTEGER PRIMARY KEY,\n  nama TEXT NOT NULL,\n  jurusan TEXT,\n  ipk REAL\n);\n\nINSERT INTO mahasiswa VALUES (1, 'Kuro Akira', 'Informatika', 3.95);\nINSERT INTO mahasiswa VALUES (2, 'Sakura Hana', 'Desain', 3.80);\nINSERT INTO mahasiswa VALUES (3, 'Ryu Tanaka', 'Teknik', 3.70);\n\nSELECT * FROM mahasiswa WHERE ipk > 3.75 ORDER BY ipk DESC;",
            ],
            [
                'name'        => 'Bash / Shell',
                'slug'        => 'bash',
                'icon'        => 'fas fa-terminal',
                'color'       => '#4EAA25',
                'bg'          => 'from-green-500/20 to-green-600/10',
                'description' => 'Shell scripting untuk automation, deployment, DevOps.',
                'runnable'    => false,
                'mode'        => 'display',
                'example'     => "#!/bin/bash\n# Bash — Deploy Script KVT Hub\n\necho \"🚀 Memulai deployment KVT Hub...\"\necho \"============================\"\n\n# Pull latest code\ngit pull origin main\n\n# Install dependencies\ncomposer install --no-dev --optimize-autoloader\nnpm ci && npm run build\n\n# Run migrations\nphp artisan migrate --force\n\n# Clear & optimize cache\nphp artisan optimize:clear\nphp artisan optimize\n\necho \"✅ Deployment selesai!\"",
            ],
            [
                'name'        => 'JSON',
                'slug'        => 'json',
                'icon'        => 'fas fa-brackets-curly',
                'color'       => '#FF6600',
                'bg'          => 'from-orange-600/20 to-orange-700/10',
                'description' => 'Format data pertukaran. Digunakan di API, config, package.json.',
                'runnable'    => true,
                'mode'        => 'client',
                'example'     => "{\n  \"platform\": \"KVT Hub\",\n  \"versi\": \"8.0\",\n  \"framework\": \"Laravel 12\",\n  \"fitur\": [\n    \"AI Chatbot\",\n    \"Code Executor\",\n    \"GitHub Integration\",\n    \"Gamifikasi RPG\",\n    \"Music Streaming\"\n  ],\n  \"bahasa\": [\"PHP\", \"JavaScript\", \"Python\", \"SQL\"],\n  \"statistik\": {\n    \"halaman\": 174,\n    \"jenjang\": 13,\n    \"peran\": 7\n  }\n}",
            ],
        ];
    }

    // ========================================================================
    //  CONTEXT ENRICHMENT (for AI)
    // ========================================================================

    protected function enrichMessageWithContext(string $message, string $context): string
    {
        $contextData = match ($context) {
            'architecture' => $this->getArchitectureContext(),
            'github'       => $this->getGitHubContext(),
            'packages'     => $this->getPackagesContext(),
            'languages'    => $this->getLanguagesContext(),
            'issues'       => $this->getIssuesContext(),
            'deployment'   => $this->getDeploymentContext(),
            default        => $this->getGeneralContext(),
        };

        return "[KONTEKS: {$context}]\n{$contextData}\n\n[PERTANYAAN USER]:\n{$message}";
    }

    protected function getGeneralContext(): string
    {
        return <<<CTX
Pengguna sedang di halaman GitHub AI Hub dari KVT Hub.
KVT Hub adalah platform ekosistem pendidikan digital global yang dibangun dengan Laravel 12, Tailwind CSS 4, dan Alpine.js.
Repository: github.com/kuro-myths/kvt-hub
Fitur utama: 174+ halaman, 13 jenjang pendidikan, 7 peran pengguna, AI chatbot, Code Executor, gamifikasi RPG.
Jawab pertanyaan apapun seputar KVT Hub, arsitektur, fitur, alur kerja, atau GitHub dengan sangat detail.
CTX;
    }

    protected function getArchitectureContext(): string
    {
        return <<<CTX
Arsitektur KVT Hub:
- **Backend**: Laravel 12 (PHP 8.2+), menggunakan MVC pattern
- **Database**: PostgreSQL dengan Eloquent ORM
- **Frontend**: Blade templating + Tailwind CSS 4 + Alpine.js
- **API**: RESTful JSON API + OpenAI GPT-4o-mini
- **Queue**: Laravel Queue untuk background jobs (code execution, email)
- **Cache**: File-based / Redis caching
- **Struktur Folder**: app/ (Models, Controllers, Services, Jobs), resources/views/, routes/, database/migrations/
- **Controllers**: Terorganisir per role (Admin/, Pengajar/, Pengguna/, Staff/)
- **Services**: ChatbotService, CodeExecutionService, CodeAssistantService
- **Models**: 40+ Eloquent models (User, Kelas, Materi, Kuis, KRS, Nilai, dll)
Jelaskan arsitektur, pola desain, dan best practice yang digunakan.
CTX;
    }

    protected function getGitHubContext(): string
    {
        $repo = $this->getRepoInfo();
        $langs = $this->getLanguages();
        $langStr = collect($langs)->map(fn($bytes, $lang) => "$lang: " . number_format($bytes) . " bytes")->implode(', ');

        return <<<CTX
Informasi GitHub Repository:
- Repo: {$repo['full_name']} ({$repo['visibility']})
- Stars: {$repo['stars']}, Forks: {$repo['forks']}, Watchers: {$repo['watchers']}
- Issues: {$repo['open_issues']}, License: {$repo['license']}
- Default Branch: {$repo['default_branch']}
- Bahasa: {$langStr}
- Topics: {$this->implodeTopics($repo['topics'])}
Jelaskan tentang repository ini, statistik, atau cara berkontribusi.
CTX;
    }

    protected function getPackagesContext(): string
    {
        return <<<CTX
GitHub Packages adalah layanan hosting paket dari GitHub yang memungkinkan developer mempublikasikan dan menggunakan paket secara langsung dari GitHub.
Tipe paket yang didukung: npm, Maven, Docker, NuGet, RubyGems, Container images.
Untuk KVT Hub, GitHub Packages bisa digunakan untuk:
1. Mempublikasikan komponen frontend sebagai npm packages
2. Membuat Docker image untuk deployment
3. Membuat package Composer (PHP) untuk reusable modules
4. Container images untuk CI/CD
Saat ini repo kuro-myths/kvt-hub belum memiliki published packages.
Jelaskan apa itu GitHub Packages, cara membuat, dan bagaimana KVT Hub bisa memanfaatkannya.
CTX;
    }

    protected function getLanguagesContext(): string
    {
        $langs = $this->getLanguages();
        $total = array_sum($langs);
        $langStr = collect($langs)->map(function ($bytes, $lang) use ($total) {
            $pct = $total > 0 ? round(($bytes / $total) * 100, 1) : 0;
            return "- {$lang}: {$pct}% ({$this->formatBytes($bytes)})";
        })->implode("\n");

        return <<<CTX
Bahasa Pemrograman di KVT Hub:
{$langStr}

Penjelasan peran masing-masing:
- Blade: Template engine Laravel untuk views (HTML + PHP directives)
- PHP: Backend logic, controllers, models, services, migrations
- JavaScript: Interaksi frontend, Alpine.js, Chart.js
- CSS: Styling dengan Tailwind CSS 4
- Shell/PowerShell: Scripts deployment & automation
Jelaskan peran dan cara kerja masing-masing bahasa dalam proyek ini.
CTX;
    }

    protected function getIssuesContext(): string
    {
        $issues = $this->getIssues(10);
        $issueStr = collect($issues)->map(fn($i) => "- #{$i['number']} [{$i['state']}] {$i['title']}")->implode("\n");

        return <<<CTX
Issues & Pull Requests di KVT Hub:
{$issueStr}
Jelaskan tentang issues ini, cara menyelesaikannya, atau alur kontribusi.
CTX;
    }

    protected function getDeploymentContext(): string
    {
        return <<<CTX
Deployment KVT Hub:
- **Hosting**: Cloud-based (Railway, Vercel, atau VPS)
- **Procfile**: Mendukung deployment ke Railway/Heroku
- **Requirements**: PHP 8.2+, PostgreSQL, Node.js 18+
- **Steps**: git pull → composer install → npm build → migrate → optimize
- **CI/CD**: GitHub Actions bisa digunakan untuk automated testing & deployment
- **Environment**: .env configuration untuk database, API keys, mail, queue
Jelaskan cara deployment, CI/CD, atau konfigurasi server.
CTX;
    }

    protected function getPlatformKnowledge(): array
    {
        return [
            'nama'       => 'KVT Hub (Kuro Virtual Technology Hub)',
            'versi'      => 'v8.0',
            'framework'  => 'Laravel 12 + Tailwind CSS 4 + Alpine.js',
            'database'   => 'PostgreSQL',
            'halaman'    => '174+',
            'jenjang'    => '13 jenjang pendidikan',
            'peran'      => '7 peran pengguna',
            'fitur_utama' => [
                'AI Chatbot (Kuro)',
                'Code Executor Multi-Language',
                'GitHub API Integration',
                'Gamifikasi RPG (100 Level)',
                'Music Streaming (5 Stasiun)',
                'Kuis Interaktif',
                'KRS Digital',
                'Diagram Builder',
                'LED Dot Matrix Panel',
            ],
        ];
    }

    // ========================================================================
    //  UTILITY HELPERS
    // ========================================================================

    protected function implodeTopics(array $topics): string
    {
        return empty($topics) ? '(belum ada)' : implode(', ', $topics);
    }

    protected function formatBytes(int $bytes): string
    {
        if ($bytes >= 1048576) return round($bytes / 1048576, 1) . ' MB';
        if ($bytes >= 1024) return round($bytes / 1024, 1) . ' KB';
        return $bytes . ' B';
    }
}
