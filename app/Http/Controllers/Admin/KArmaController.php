<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class KArmaController extends Controller
{
    protected string $githubOwner = 'kuro-myths';
    protected string $githubRepo  = 'kvt-hub';

    // ========================================================================
    //  GITHUB API HELPERS
    // ========================================================================

    protected function githubGet(string $endpoint, int $ttl = 300): ?array
    {
        $cacheKey = 'karma_' . md5($endpoint);

        return Cache::remember($cacheKey, $ttl, function () use ($endpoint) {
            try {
                $url = "https://api.github.com/repos/{$this->githubOwner}/{$this->githubRepo}{$endpoint}";
                $response = Http::withHeaders([
                    'Accept'     => 'application/vnd.github.v3+json',
                    'User-Agent' => 'KVT-Hub-KArma',
                ])->timeout(8)->get($url);

                if ($response->successful()) {
                    return $response->json();
                }
            } catch (\Exception $e) {
                // Fail silently
            }
            return null;
        });
    }

    // ========================================================================
    //  MAIN PAGE
    // ========================================================================

    public function index()
    {
        // Workflow runs (GitHub Actions)
        $workflowRuns = $this->getWorkflowRuns();

        // Issues created by K-Arma (bot)
        $karmaIssues = $this->getKarmaIssues();

        // Recent issues & PRs
        $recentIssues = $this->getRecentIssues();
        $recentPRs    = $this->getRecentPRs();

        // Repo stats
        $repoInfo = $this->getRepoInfo();

        // Milestones
        $milestones = $this->getMilestones();

        // Workflows list
        $workflows = $this->getWorkflows();

        return view('akun.admin.k-arma', compact(
            'workflowRuns', 'karmaIssues', 'recentIssues', 'recentPRs',
            'repoInfo', 'milestones', 'workflows'
        ));
    }

    // ========================================================================
    //  API ENDPOINTS for AJAX
    // ========================================================================

    public function apiStatus()
    {
        $runs = $this->getWorkflowRuns(10);
        $issues = $this->getKarmaIssues();

        return response()->json([
            'status' => 'online',
            'last_run' => $runs[0]['created_at'] ?? null,
            'total_runs' => count($runs),
            'karma_issues' => count($issues),
            'health' => $this->calculateHealth($runs),
        ]);
    }

    public function apiRefresh()
    {
        // Clear K-Arma related cache
        $keys = ['karma_workflow_runs', 'karma_issues', 'karma_recent_issues', 'karma_recent_prs', 'karma_repo', 'karma_milestones', 'karma_workflows'];
        foreach ($keys as $key) {
            Cache::forget($key);
        }

        return response()->json(['message' => 'Cache berhasil di-refresh!', 'status' => 'ok']);
    }

    // ========================================================================
    //  DATA FETCHERS
    // ========================================================================

    protected function getWorkflowRuns(int $limit = 20): array
    {
        $data = Cache::remember('karma_workflow_runs', 180, function () use ($limit) {
            return $this->githubGet("/actions/runs?per_page={$limit}", 180);
        });

        if (!$data || !isset($data['workflow_runs'])) return [];

        return collect($data['workflow_runs'])->map(fn($r) => [
            'id'         => $r['id'] ?? 0,
            'name'       => $r['name'] ?? 'Unknown',
            'status'     => $r['status'] ?? 'unknown',
            'conclusion' => $r['conclusion'] ?? null,
            'branch'     => $r['head_branch'] ?? 'main',
            'event'      => $r['event'] ?? '',
            'created_at' => $r['created_at'] ?? '',
            'updated_at' => $r['updated_at'] ?? '',
            'html_url'   => $r['html_url'] ?? '#',
            'run_number' => $r['run_number'] ?? 0,
        ])->toArray();
    }

    protected function getKarmaIssues(): array
    {
        $data = Cache::remember('karma_issues', 300, function () {
            return $this->githubGet('/issues?labels=k-arma&state=all&per_page=20', 300);
        });

        if (!$data) return [];

        return collect($data)->map(fn($i) => [
            'number'     => $i['number'] ?? 0,
            'title'      => $i['title'] ?? '',
            'state'      => $i['state'] ?? 'open',
            'labels'     => collect($i['labels'] ?? [])->pluck('name')->toArray(),
            'created_at' => $i['created_at'] ?? '',
            'html_url'   => $i['html_url'] ?? '#',
        ])->toArray();
    }

    protected function getRecentIssues(): array
    {
        $data = Cache::remember('karma_recent_issues', 300, function () {
            return $this->githubGet('/issues?state=open&per_page=10&sort=created&direction=desc', 300);
        });

        if (!$data) return [];

        return collect($data)->filter(fn($i) => !isset($i['pull_request']))->map(fn($i) => [
            'number'     => $i['number'] ?? 0,
            'title'      => $i['title'] ?? '',
            'state'      => $i['state'] ?? 'open',
            'labels'     => collect($i['labels'] ?? [])->pluck('name')->toArray(),
            'assignee'   => $i['assignee']['login'] ?? null,
            'created_at' => $i['created_at'] ?? '',
            'html_url'   => $i['html_url'] ?? '#',
        ])->values()->toArray();
    }

    protected function getRecentPRs(): array
    {
        $data = Cache::remember('karma_recent_prs', 300, function () {
            return $this->githubGet('/pulls?state=open&per_page=10&sort=created&direction=desc', 300);
        });

        if (!$data) return [];

        return collect($data)->map(fn($p) => [
            'number'     => $p['number'] ?? 0,
            'title'      => $p['title'] ?? '',
            'state'      => $p['state'] ?? 'open',
            'user'       => $p['user']['login'] ?? 'Unknown',
            'created_at' => $p['created_at'] ?? '',
            'html_url'   => $p['html_url'] ?? '#',
            'draft'      => $p['draft'] ?? false,
        ])->toArray();
    }

    protected function getRepoInfo(): array
    {
        $data = Cache::remember('karma_repo', 600, function () {
            return $this->githubGet('', 600);
        });

        if (!$data) {
            return [
                'stars' => 0, 'forks' => 0, 'watchers' => 0,
                'open_issues' => 0, 'size' => 0, 'language' => 'PHP',
            ];
        }

        return [
            'stars'       => $data['stargazers_count'] ?? 0,
            'forks'       => $data['forks_count'] ?? 0,
            'watchers'    => $data['subscribers_count'] ?? 0,
            'open_issues' => $data['open_issues_count'] ?? 0,
            'size'        => $data['size'] ?? 0,
            'language'    => $data['language'] ?? 'PHP',
            'pushed_at'   => $data['pushed_at'] ?? null,
        ];
    }

    protected function getMilestones(): array
    {
        $data = Cache::remember('karma_milestones', 600, function () {
            return $this->githubGet('/milestones?state=open&per_page=10', 600);
        });

        if (!$data) return [];

        return collect($data)->map(fn($m) => [
            'title'        => $m['title'] ?? '',
            'description'  => $m['description'] ?? '',
            'open_issues'  => $m['open_issues'] ?? 0,
            'closed_issues'=> $m['closed_issues'] ?? 0,
            'due_on'       => $m['due_on'] ?? null,
            'html_url'     => $m['html_url'] ?? '#',
        ])->toArray();
    }

    protected function getWorkflows(): array
    {
        $data = Cache::remember('karma_workflows', 600, function () {
            return $this->githubGet('/actions/workflows?per_page=20', 600);
        });

        if (!$data || !isset($data['workflows'])) return [];

        return collect($data['workflows'])->map(fn($w) => [
            'id'    => $w['id'] ?? 0,
            'name'  => $w['name'] ?? '',
            'state' => $w['state'] ?? 'unknown',
            'path'  => $w['path'] ?? '',
        ])->toArray();
    }

    // ========================================================================
    //  HEALTH CALCULATOR
    // ========================================================================

    protected function calculateHealth(array $runs): string
    {
        if (empty($runs)) return 'unknown';

        $recent = array_slice($runs, 0, 5);
        $success = collect($recent)->where('conclusion', 'success')->count();
        $total = count($recent);

        $ratio = $total > 0 ? $success / $total : 0;

        if ($ratio >= 0.8) return 'excellent';
        if ($ratio >= 0.6) return 'good';
        if ($ratio >= 0.4) return 'warning';
        return 'critical';
    }
}
