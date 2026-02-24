<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RepositoriController extends Controller
{
    protected string $basePath;

    /**
     * GitHub repository info.
     */
    protected string $githubOwner = 'kuro-myths';
    protected string $githubRepo  = 'kvt-hub';

    protected array $ignoredDirs = [
        'vendor', 'node_modules', '.git', 'storage/framework',
        'storage/logs', 'bootstrap/cache', '.idea', '.vscode',
    ];

    protected array $ignoredFiles = [
        '.env', '.env.backup', '.DS_Store', 'Thumbs.db',
    ];

    public function __construct()
    {
        $this->basePath = base_path();
    }

    // ========================================================================
    //  GITHUB API HELPERS (cached)
    // ========================================================================

    /**
     * Generic GitHub API GET with file-cache (10 min default).
     */
    protected function githubGet(string $endpoint, int $ttl = 600): ?array
    {
        $cacheKey = 'github_' . md5($endpoint);

        return Cache::remember($cacheKey, $ttl, function () use ($endpoint) {
            try {
                $url = "https://api.github.com/repos/{$this->githubOwner}/{$this->githubRepo}{$endpoint}";
                $response = Http::withHeaders([
                    'Accept'     => 'application/vnd.github.v3+json',
                    'User-Agent' => 'KVT-Hub-App',
                ])->timeout(8)->get($url);

                if ($response->successful()) {
                    return $response->json();
                }
            } catch (\Exception $e) {
                // API unreachable — return null so cache won't persist a failure
            }
            return null;
        });
    }

    /**
     * Repo metadata (stars, forks, watchers, description, etc.).
     */
    public function getGithubRepoInfo(): array
    {
        $data = $this->githubGet('', 600);
        if (!$data) return $this->fallbackRepoInfo();

        return [
            'full_name'      => $data['full_name'] ?? "{$this->githubOwner}/{$this->githubRepo}",
            'description'    => $data['description'] ?? '',
            'html_url'       => $data['html_url'] ?? "https://github.com/{$this->githubOwner}/{$this->githubRepo}",
            'stars'          => $data['stargazers_count'] ?? 0,
            'forks'          => $data['forks_count'] ?? 0,
            'watchers'       => $data['subscribers_count'] ?? 0,
            'open_issues'    => $data['open_issues_count'] ?? 0,
            'default_branch' => $data['default_branch'] ?? 'main',
            'language'       => $data['language'] ?? 'PHP',
            'size'           => ($data['size'] ?? 0) * 1024, // KB → bytes
            'topics'         => $data['topics'] ?? [],
            'created_at'     => $data['created_at'] ?? null,
            'updated_at'     => $data['updated_at'] ?? null,
            'pushed_at'      => $data['pushed_at'] ?? null,
            'license'        => $data['license']['spdx_id'] ?? 'MIT',
            'visibility'     => $data['visibility'] ?? 'public',
        ];
    }

    protected function fallbackRepoInfo(): array
    {
        return [
            'full_name' => "{$this->githubOwner}/{$this->githubRepo}",
            'description' => 'Global Education & Research Ecosystem',
            'html_url' => "https://github.com/{$this->githubOwner}/{$this->githubRepo}",
            'stars' => 0, 'forks' => 0, 'watchers' => 0, 'open_issues' => 0,
            'default_branch' => 'main', 'language' => 'PHP', 'size' => 0,
            'topics' => [], 'created_at' => null, 'updated_at' => null,
            'pushed_at' => null, 'license' => 'MIT', 'visibility' => 'public',
        ];
    }

    /**
     * Recent commits from GitHub (25 latest).
     */
    public function getGithubCommits(int $limit = 25): array
    {
        $data = $this->githubGet("/commits?per_page={$limit}", 300);
        if (!$data) return [];

        return collect($data)->map(fn($c) => [
            'sha'        => $c['sha'] ?? '',
            'short'      => substr($c['sha'] ?? '', 0, 7),
            'message'    => $c['commit']['message'] ?? '',
            'author'     => $c['commit']['author']['name'] ?? 'Unknown',
            'login'      => $c['author']['login'] ?? null,
            'avatar'     => $c['author']['avatar_url'] ?? null,
            'date'       => $c['commit']['author']['date'] ?? '',
            'html_url'   => $c['html_url'] ?? '#',
        ])->toArray();
    }

    /**
     * All branches.
     */
    public function getGithubBranches(): array
    {
        $data = $this->githubGet('/branches?per_page=30', 600);
        if (!$data) return [];

        return collect($data)->map(fn($b) => [
            'name'   => $b['name'] ?? '',
            'sha'    => substr($b['commit']['sha'] ?? '', 0, 7),
            'protected' => $b['protected'] ?? false,
        ])->toArray();
    }

    /**
     * Contributors with commit counts & avatars.
     */
    public function getGithubContributors(): array
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

    /**
     * Languages breakdown (bytes per language).
     */
    public function getGithubLanguages(): array
    {
        $data = $this->githubGet('/languages', 600);
        return $data ?? [];
    }

    /**
     * Recent releases / tags.
     */
    public function getGithubReleases(int $limit = 10): array
    {
        $data = $this->githubGet("/tags?per_page={$limit}", 600);
        if (!$data) return [];

        return collect($data)->map(fn($t) => [
            'name' => $t['name'] ?? '',
            'sha'  => substr($t['commit']['sha'] ?? '', 0, 7),
        ])->toArray();
    }

    /**
     * Commit activity (last 52 weeks = 1 year).
     */
    public function getGithubCommitActivity(): array
    {
        $data = $this->githubGet('/stats/commit_activity', 1800);
        return $data ?? [];
    }

    // ========================================================================
    //  MAIN PAGE ACTIONS
    // ========================================================================

    /**
     * Halaman utama repositori — statistik umum & file browser.
     */
    public function index(Request $request)
    {
        $path = $request->get('path', '');
        $sanitized = $this->sanitizePath($path);
        $fullPath = $this->basePath . ($sanitized ? DIRECTORY_SEPARATOR . $sanitized : '');

        if (!File::isDirectory($fullPath)) {
            abort(404, 'Direktori tidak ditemukan.');
        }

        // Scan keseluruhan proyek untuk statistik
        $stats = $this->scanProject();

        // Ambil isi direktori saat ini
        $items = $this->getDirectoryContents($fullPath, $sanitized);

        // Breadcrumb
        $breadcrumbs = $this->buildBreadcrumbs($sanitized);

        // Git: local fallback + GitHub API (real-time)
        $gitLog = $this->getGitLog(20);
        $gitBranch = $this->getGitBranch();
        $gitRemote = $this->getGitRemote();

        // GitHub API data (cached)
        $ghRepo         = $this->getGithubRepoInfo();
        $ghCommits      = $this->getGithubCommits(25);
        $ghBranches     = $this->getGithubBranches();
        $ghContributors = $this->getGithubContributors();
        $ghLanguages    = $this->getGithubLanguages();

        // Baca README jika di root
        $readme = '';
        if (empty($sanitized) && File::exists($this->basePath . '/README.md')) {
            $readme = File::get($this->basePath . '/README.md');
        }

        return view('akun.admin.repositori', compact(
            'stats', 'items', 'breadcrumbs', 'path', 'sanitized',
            'gitLog', 'gitBranch', 'gitRemote', 'readme',
            'ghRepo', 'ghCommits', 'ghBranches', 'ghContributors', 'ghLanguages'
        ));
    }

    /**
     * Lihat isi sebuah file.
     */
    public function lihatFile(Request $request)
    {
        $path = $request->get('path', '');
        $sanitized = $this->sanitizePath($path);
        $fullPath = $this->basePath . DIRECTORY_SEPARATOR . $sanitized;

        if (!File::isFile($fullPath)) {
            abort(404, 'File tidak ditemukan.');
        }

        $extension = pathinfo($fullPath, PATHINFO_EXTENSION);
        $size = File::size($fullPath);
        $lastModified = date('Y-m-d H:i:s', File::lastModified($fullPath));
        $lines = 0;
        $content = '';

        // Hanya baca file teks dan di bawah 2MB
        $textExtensions = [
            'php', 'js', 'ts', 'jsx', 'tsx', 'vue', 'css', 'scss', 'less',
            'html', 'blade.php', 'json', 'xml', 'yaml', 'yml', 'md', 'txt',
            'env', 'gitignore', 'htaccess', 'sql', 'sh', 'bat', 'ps1',
            'py', 'rb', 'java', 'c', 'cpp', 'h', 'go', 'rs', 'swift',
            'config', 'lock', 'log', 'csv', 'ini', 'conf', 'toml',
        ];

        $isBinary = false;
        if ($size > 2 * 1024 * 1024) {
            $isBinary = true;
            $content = '// File terlalu besar untuk ditampilkan (> 2MB)';
        } elseif (!in_array(strtolower($extension), $textExtensions) && !Str::endsWith($fullPath, '.blade.php')) {
            $isBinary = true;
            $content = '// File biner — tidak dapat ditampilkan';
        } else {
            $content = File::get($fullPath);
            $lines = substr_count($content, "\n") + 1;
        }

        $breadcrumbs = $this->buildBreadcrumbs($sanitized);
        $language = $this->detectLanguage($extension);

        return view('akun.admin.repositori-file', compact(
            'content', 'sanitized', 'extension', 'size', 'lastModified',
            'lines', 'breadcrumbs', 'isBinary', 'language'
        ));
    }

    /**
     * API: Data untuk chart statistik.
     */
    public function apiStats()
    {
        $stats = $this->scanProject();
        return response()->json($stats);
    }

    /**
     * API: Data GitHub real-time (public, cached).
     */
    public function apiGithub()
    {
        return response()->json([
            'repo'         => $this->getGithubRepoInfo(),
            'commits'      => $this->getGithubCommits(10),
            'branches'     => $this->getGithubBranches(),
            'contributors' => $this->getGithubContributors(),
            'languages'    => $this->getGithubLanguages(),
        ]);
    }

    // ========================================================================
    // HELPER METHODS
    // ========================================================================

    /**
     * Sanitize path agar tidak keluar dari basePath.
     */
    protected function sanitizePath(string $path): string
    {
        $path = str_replace(['\\', '..'], ['/', ''], $path);
        $path = trim($path, '/');
        return $path;
    }

    /**
     * Scan keseluruhan proyek — hitung file, folder, ukuran, tipe.
     */
    protected function scanProject(): array
    {
        $totalFiles = 0;
        $totalFolders = 0;
        $totalSize = 0;
        $extensions = [];
        $largestFiles = [];
        $recentFiles = [];
        $linesByType = [];

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->basePath, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $item) {
            $relativePath = str_replace($this->basePath . DIRECTORY_SEPARATOR, '', $item->getPathname());
            $relativePath = str_replace('\\', '/', $relativePath);

            // Skip ignored
            $skip = false;
            foreach ($this->ignoredDirs as $ignored) {
                if (Str::startsWith($relativePath, $ignored . '/') || $relativePath === $ignored) {
                    $skip = true;
                    break;
                }
            }
            if ($skip) continue;

            if ($item->isDir()) {
                $totalFolders++;
            } else {
                $totalFiles++;
                $size = $item->getSize();
                $totalSize += $size;
                $ext = strtolower($item->getExtension());

                // Deteksi blade.php
                if (Str::endsWith($relativePath, '.blade.php')) {
                    $ext = 'blade.php';
                }

                if (!isset($extensions[$ext])) {
                    $extensions[$ext] = ['count' => 0, 'size' => 0];
                }
                $extensions[$ext]['count']++;
                $extensions[$ext]['size'] += $size;

                // Hitung baris untuk file teks
                $textExts = ['php', 'blade.php', 'js', 'ts', 'css', 'json', 'md', 'vue', 'html', 'xml', 'yaml', 'yml', 'txt', 'sql', 'py', 'sh'];
                if (in_array($ext, $textExts) && $size < 5 * 1024 * 1024) {
                    $lineCount = substr_count(file_get_contents($item->getPathname()), "\n") + 1;
                    if (!isset($linesByType[$ext])) $linesByType[$ext] = 0;
                    $linesByType[$ext] += $lineCount;
                }

                // Top 10 terbesar
                $largestFiles[] = [
                    'path' => $relativePath,
                    'size' => $size,
                ];

                // Recent files (modified in last 7 days)
                if ($item->getMTime() > time() - (7 * 86400)) {
                    $recentFiles[] = [
                        'path' => $relativePath,
                        'modified' => date('Y-m-d H:i', $item->getMTime()),
                        'size' => $size,
                    ];
                }
            }
        }

        // Sort ekstension by count desc
        arsort($extensions);

        // Top 10 file terbesar
        usort($largestFiles, fn($a, $b) => $b['size'] <=> $a['size']);
        $largestFiles = array_slice($largestFiles, 0, 10);

        // Recent files: top 15 yang paling baru
        usort($recentFiles, fn($a, $b) => strcmp($b['modified'], $a['modified']));
        $recentFiles = array_slice($recentFiles, 0, 15);

        // Sort linesByType desc
        arsort($linesByType);

        $totalLines = array_sum($linesByType);

        return [
            'totalFiles' => $totalFiles,
            'totalFolders' => $totalFolders,
            'totalSize' => $totalSize,
            'totalLines' => $totalLines,
            'extensions' => $extensions,
            'largestFiles' => $largestFiles,
            'recentFiles' => $recentFiles,
            'linesByType' => $linesByType,
        ];
    }

    /**
     * Ambil isi dari satu direktori.
     */
    protected function getDirectoryContents(string $fullPath, string $relativePath): array
    {
        $directories = [];
        $files = [];

        foreach (File::directories($fullPath) as $dir) {
            $name = basename($dir);
            $relPath = $relativePath ? $relativePath . '/' . $name : $name;

            // Skip ignored
            $skip = false;
            foreach ($this->ignoredDirs as $ignored) {
                if (Str::startsWith($relPath, $ignored) || $relPath === $ignored) {
                    $skip = true;
                    break;
                }
            }
            if ($skip) continue;

            $itemCount = count(File::allFiles($dir));
            $directories[] = [
                'name' => $name,
                'path' => $relPath,
                'type' => 'folder',
                'items' => $itemCount,
                'modified' => date('Y-m-d H:i', File::lastModified($dir)),
            ];
        }

        foreach (File::files($fullPath) as $file) {
            $name = $file->getFilename();
            $relPath = $relativePath ? $relativePath . '/' . $name : $name;

            if (in_array($name, $this->ignoredFiles)) continue;

            $files[] = [
                'name' => $name,
                'path' => $relPath,
                'type' => 'file',
                'size' => $file->getSize(),
                'extension' => strtolower($file->getExtension()),
                'modified' => date('Y-m-d H:i', $file->getMTime()),
            ];
        }

        // Sort: folders first, then files alphabetically
        usort($directories, fn($a, $b) => strcmp($a['name'], $b['name']));
        usort($files, fn($a, $b) => strcmp($a['name'], $b['name']));

        return array_merge($directories, $files);
    }

    /**
     * Build breadcrumb dari path.
     */
    protected function buildBreadcrumbs(string $path): array
    {
        if (empty($path)) return [];

        $parts = explode('/', $path);
        $crumbs = [];
        $accumulated = '';

        foreach ($parts as $part) {
            $accumulated .= ($accumulated ? '/' : '') . $part;
            $crumbs[] = [
                'name' => $part,
                'path' => $accumulated,
            ];
        }

        return $crumbs;
    }

    /**
     * Ambil git log (commit history).
     */
    protected function getGitLog(int $limit = 20): array
    {
        $log = [];
        $gitDir = $this->basePath . DIRECTORY_SEPARATOR . '.git';

        if (!File::isDirectory($gitDir)) return $log;

        try {
            $output = shell_exec("cd \"{$this->basePath}\" && git log --oneline --format=\"%H||%h||%s||%an||%ar||%ai\" -n {$limit} 2>&1");
            if ($output) {
                foreach (explode("\n", trim($output)) as $line) {
                    $parts = explode('||', $line);
                    if (count($parts) >= 6) {
                        $log[] = [
                            'hash' => $parts[0],
                            'short' => $parts[1],
                            'message' => $parts[2],
                            'author' => $parts[3],
                            'relative' => $parts[4],
                            'date' => $parts[5],
                        ];
                    }
                }
            }
        } catch (\Exception $e) {
            // Git not available
        }

        return $log;
    }

    /**
     * Ambil branch aktif.
     */
    protected function getGitBranch(): string
    {
        try {
            $branch = trim(shell_exec("cd \"{$this->basePath}\" && git branch --show-current 2>&1") ?? '');
            return $branch ?: 'unknown';
        } catch (\Exception $e) {
            return 'unknown';
        }
    }

    /**
     * Ambil remote URL.
     */
    protected function getGitRemote(): string
    {
        try {
            $remote = trim(shell_exec("cd \"{$this->basePath}\" && git remote get-url origin 2>&1") ?? '');
            return $remote ?: '-';
        } catch (\Exception $e) {
            return '-';
        }
    }

    /**
     * Deteksi bahasa pemrograman dari ekstensi.
     */
    protected function detectLanguage(string $ext): string
    {
        return match(strtolower($ext)) {
            'php' => 'php',
            'js', 'mjs', 'cjs' => 'javascript',
            'ts', 'tsx' => 'typescript',
            'vue' => 'vue',
            'css', 'scss', 'less' => 'css',
            'html', 'htm' => 'html',
            'json' => 'json',
            'xml' => 'xml',
            'yaml', 'yml' => 'yaml',
            'md' => 'markdown',
            'sql' => 'sql',
            'sh', 'bash' => 'bash',
            'ps1' => 'powershell',
            'py' => 'python',
            'rb' => 'ruby',
            'java' => 'java',
            'go' => 'go',
            'rs' => 'rust',
            'swift' => 'swift',
            'c', 'h' => 'c',
            'cpp' => 'cpp',
            'env', 'ini', 'conf' => 'ini',
            'txt', 'log' => 'plaintext',
            default => 'plaintext',
        };
    }

    /**
     * Format ukuran file ke human-readable.
     */
    public static function formatSize(int $bytes): string
    {
        if ($bytes >= 1073741824) return number_format($bytes / 1073741824, 2) . ' GB';
        if ($bytes >= 1048576) return number_format($bytes / 1048576, 2) . ' MB';
        if ($bytes >= 1024) return number_format($bytes / 1024, 1) . ' KB';
        return $bytes . ' B';
    }
}
