@extends('tata-letak.dasbor')
@section('judul', 'K-Arma AI Monitor - Admin KVT Hub')
@section('judul-halaman', 'K-Arma AI Monitor')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8 space-y-8">

    {{-- ===== HEADER K-ARMA ===== --}}
    <div class="bg-gradient-to-r from-red-900/60 via-kvt-900/80 to-purple-900/60 border border-red-500/30 rounded-2xl p-6" data-aos="fade-down">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="relative">
                    <img src="https://raw.githubusercontent.com/kuro-myths/kvt-hub/main/.github/bot-avatar.png"
                         alt="K-Arma" class="w-16 h-16 rounded-xl shadow-lg shadow-red-500/30 border-2 border-red-500/50">
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-green-500 rounded-full border-2 border-kvt-900 animate-pulse" id="statusDot"></div>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white flex items-center gap-2">
                        K-Arma AI
                        <span class="px-2 py-0.5 bg-green-500/20 text-green-400 text-xs rounded-full font-mono" id="statusBadge">ONLINE</span>
                    </h1>
                    <p class="text-gray-400 text-sm mt-1">
                        Autonomous AI Assistant • KVT Hub Guardian
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-3 flex-wrap">
                <button onclick="refreshData()" class="px-4 py-2 bg-kvt-600 hover:bg-kvt-500 text-white rounded-lg text-sm transition flex items-center gap-2">
                    <i class="fas fa-sync-alt" id="refreshIcon"></i> Refresh
                </button>
                <a href="https://github.com/kuro-myths/kvt-hub/actions" target="_blank"
                   class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-sm transition flex items-center gap-2">
                    <i class="fab fa-github"></i> Actions
                </a>
                <a href="https://github.com/kuro-myths/kvt-hub/issues" target="_blank"
                   class="px-4 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg text-sm transition flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i> Issues
                </a>
            </div>
        </div>
    </div>

    {{-- ===== STATS CARDS ===== --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up">
        {{-- Workflow Runs --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-cogs text-blue-400 text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-white">{{ count($workflowRuns) }}</p>
            <p class="text-gray-400 text-sm">Workflow Runs</p>
        </div>

        {{-- K-Arma Issues --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-12 h-12 bg-red-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-brain text-red-400 text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-white">{{ count($karmaIssues) }}</p>
            <p class="text-gray-400 text-sm">K-Arma Issues</p>
        </div>

        {{-- Open Issues --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-12 h-12 bg-amber-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-exclamation-triangle text-amber-400 text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-white">{{ $repoInfo['open_issues'] }}</p>
            <p class="text-gray-400 text-sm">Open Issues</p>
        </div>

        {{-- Health --}}
        @php
            $healthRuns = array_slice($workflowRuns, 0, 5);
            $successCount = collect($healthRuns)->where('conclusion', 'success')->count();
            $healthPct = count($healthRuns) > 0 ? round($successCount / count($healthRuns) * 100) : 0;
            $healthColor = $healthPct >= 80 ? 'green' : ($healthPct >= 60 ? 'yellow' : ($healthPct >= 40 ? 'amber' : 'red'));
        @endphp
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-12 h-12 bg-{{ $healthColor }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-heartbeat text-{{ $healthColor }}-400 text-xl"></i>
            </div>
            <p class="text-2xl font-bold text-white">{{ $healthPct }}%</p>
            <p class="text-gray-400 text-sm">Health Score</p>
        </div>
    </div>

    {{-- ===== MAIN GRID ===== --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- LEFT: Workflow Runs --}}
        <div class="lg:col-span-2 space-y-6">

            {{-- Workflow Runs Table --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
                <div class="px-6 py-4 border-b border-kvt-700/30 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-play-circle text-blue-400"></i> Workflow Runs Terbaru
                    </h3>
                    <span class="text-xs text-gray-500">{{ count($workflowRuns) }} runs</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-kvt-800/50 text-gray-400 text-xs uppercase">
                            <tr>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Workflow</th>
                                <th class="px-4 py-3 text-left">Event</th>
                                <th class="px-4 py-3 text-left">Branch</th>
                                <th class="px-4 py-3 text-left">Waktu</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-kvt-700/20">
                            @forelse($workflowRuns as $run)
                            @php
                                $statusIcon = match($run['conclusion'] ?? $run['status']) {
                                    'success' => ['fas fa-check-circle text-green-400', 'bg-green-500/10'],
                                    'failure' => ['fas fa-times-circle text-red-400', 'bg-red-500/10'],
                                    'cancelled' => ['fas fa-ban text-gray-400', 'bg-gray-500/10'],
                                    'in_progress' => ['fas fa-spinner fa-spin text-yellow-400', 'bg-yellow-500/10'],
                                    'queued' => ['fas fa-clock text-blue-400', 'bg-blue-500/10'],
                                    default => ['fas fa-question-circle text-gray-400', 'bg-gray-500/10'],
                                };
                            @endphp
                            <tr class="hover:bg-kvt-800/30 transition">
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center gap-1.5 px-2 py-1 {{ $statusIcon[1] }} rounded-lg text-xs">
                                        <i class="{{ $statusIcon[0] }}"></i>
                                        {{ ucfirst($run['conclusion'] ?? $run['status']) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-white font-medium">{{ Str::limit($run['name'], 30) }}</td>
                                <td class="px-4 py-3 text-gray-400">
                                    <span class="px-2 py-0.5 bg-kvt-800 rounded text-xs">{{ $run['event'] }}</span>
                                </td>
                                <td class="px-4 py-3 text-gray-400">
                                    <span class="text-kvt-400">{{ $run['branch'] }}</span>
                                </td>
                                <td class="px-4 py-3 text-gray-500 text-xs">
                                    {{ \Carbon\Carbon::parse($run['created_at'])->diffForHumans() }}
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <a href="{{ $run['html_url'] }}" target="_blank" class="text-kvt-400 hover:text-kvt-300 transition">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-3xl mb-2 block"></i>
                                    Belum ada workflow run
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Open Issues --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                <div class="px-6 py-4 border-b border-kvt-700/30">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-exclamation-circle text-amber-400"></i> Open Issues
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/20">
                    @forelse($recentIssues as $issue)
                    <div class="px-6 py-3 flex items-center justify-between hover:bg-kvt-800/30 transition">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="text-green-400 font-mono text-sm">#{{ $issue['number'] }}</span>
                            <div class="min-w-0">
                                <a href="{{ $issue['html_url'] }}" target="_blank" class="text-white hover:text-kvt-400 transition font-medium text-sm truncate block">
                                    {{ Str::limit($issue['title'], 50) }}
                                </a>
                                <div class="flex items-center gap-2 mt-0.5">
                                    @foreach(array_slice($issue['labels'], 0, 3) as $label)
                                    <span class="text-xs px-1.5 py-0.5 bg-kvt-800 text-kvt-400 rounded">{{ $label }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap ml-2">
                            {{ \Carbon\Carbon::parse($issue['created_at'])->diffForHumans() }}
                        </span>
                    </div>
                    @empty
                    <div class="px-6 py-6 text-center text-gray-500 text-sm">
                        <i class="fas fa-check-circle text-green-400 text-xl mb-2 block"></i>
                        Tidak ada open issue!
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Open PRs --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                <div class="px-6 py-4 border-b border-kvt-700/30">
                    <h3 class="text-lg font-bold text-white flex items-center gap-2">
                        <i class="fas fa-code-branch text-purple-400"></i> Open Pull Requests
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/20">
                    @forelse($recentPRs as $pr)
                    <div class="px-6 py-3 flex items-center justify-between hover:bg-kvt-800/30 transition">
                        <div class="flex items-center gap-3 min-w-0">
                            <span class="text-purple-400 font-mono text-sm">#{{ $pr['number'] }}</span>
                            <div class="min-w-0">
                                <a href="{{ $pr['html_url'] }}" target="_blank" class="text-white hover:text-kvt-400 transition font-medium text-sm truncate block">
                                    {{ Str::limit($pr['title'], 50) }}
                                    @if($pr['draft']) <span class="text-gray-500 text-xs">(Draft)</span> @endif
                                </a>
                                <span class="text-xs text-gray-500">by {{ $pr['user'] }}</span>
                            </div>
                        </div>
                        <span class="text-xs text-gray-500 whitespace-nowrap ml-2">
                            {{ \Carbon\Carbon::parse($pr['created_at'])->diffForHumans() }}
                        </span>
                    </div>
                    @empty
                    <div class="px-6 py-6 text-center text-gray-500 text-sm">
                        <i class="fas fa-check-circle text-green-400 text-xl mb-2 block"></i>
                        Tidak ada open PR!
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- RIGHT SIDEBAR --}}
        <div class="space-y-6">

            {{-- K-Arma Info Card --}}
            <div class="bg-gradient-to-b from-red-900/40 to-kvt-900/80 border border-red-500/20 rounded-2xl p-6" data-aos="fade-left">
                <div class="text-center mb-4">
                    <img src="https://raw.githubusercontent.com/kuro-myths/kvt-hub/main/.github/bot-avatar.png"
                         alt="K-Arma" class="w-20 h-20 rounded-2xl mx-auto shadow-lg shadow-red-500/20 mb-3">
                    <h3 class="text-lg font-bold text-white">K-Arma</h3>
                    <p class="text-gray-400 text-sm">KVT Hub AI Guardian</p>
                </div>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between text-gray-400">
                        <span>Status</span>
                        <span class="text-green-400 font-medium flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Active
                        </span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Version</span>
                        <span class="text-white font-mono">v2.0</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Workflows</span>
                        <span class="text-white">{{ count($workflows) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-400">
                        <span>Issues Dibuat</span>
                        <span class="text-white">{{ count($karmaIssues) }}</span>
                    </div>
                </div>
            </div>

            {{-- Workflows List --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-left" data-aos-delay="100">
                <div class="px-5 py-4 border-b border-kvt-700/30">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i class="fas fa-robot text-red-400"></i> K-Arma Workflows
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/20">
                    @forelse($workflows as $wf)
                    <div class="px-5 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-2 min-w-0">
                            @if($wf['state'] === 'active')
                                <i class="fas fa-circle text-green-400 text-xs"></i>
                            @else
                                <i class="fas fa-circle text-gray-500 text-xs"></i>
                            @endif
                            <span class="text-white text-sm truncate">{{ $wf['name'] }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="px-5 py-4 text-center text-gray-500 text-sm">
                        Belum ada workflow
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Milestones --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-left" data-aos-delay="200">
                <div class="px-5 py-4 border-b border-kvt-700/30">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i class="fas fa-flag text-amber-400"></i> Active Milestones
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/20">
                    @forelse($milestones as $ms)
                    @php
                        $total = $ms['open_issues'] + $ms['closed_issues'];
                        $pct = $total > 0 ? round($ms['closed_issues'] / $total * 100) : 0;
                    @endphp
                    <div class="px-5 py-3">
                        <div class="flex items-center justify-between mb-1">
                            <a href="{{ $ms['html_url'] }}" target="_blank" class="text-white text-sm font-medium hover:text-kvt-400 transition">
                                {{ $ms['title'] }}
                            </a>
                            <span class="text-xs text-gray-500">{{ $pct }}%</span>
                        </div>
                        <div class="w-full h-1.5 bg-kvt-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-kvt-500 to-green-500 rounded-full transition-all" style="width: {{ $pct }}%"></div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 mt-1">
                            <span>{{ $ms['closed_issues'] }}/{{ $total }} selesai</span>
                            @if($ms['due_on'])
                            <span>{{ \Carbon\Carbon::parse($ms['due_on'])->format('d M Y') }}</span>
                            @endif
                        </div>
                    </div>
                    @empty
                    <div class="px-5 py-4 text-center text-gray-500 text-sm">
                        Belum ada milestone aktif
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- K-Arma Issues --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-left" data-aos-delay="300">
                <div class="px-5 py-4 border-b border-kvt-700/30">
                    <h3 class="text-base font-bold text-white flex items-center gap-2">
                        <i class="fas fa-brain text-red-400"></i> K-Arma Suggestions
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/20">
                    @forelse(array_slice($karmaIssues, 0, 5) as $ki)
                    <div class="px-5 py-3">
                        <a href="{{ $ki['html_url'] }}" target="_blank" class="text-white text-sm hover:text-kvt-400 transition block truncate">
                            {{ $ki['title'] }}
                        </a>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-xs {{ $ki['state'] === 'open' ? 'text-green-400' : 'text-gray-500' }}">
                                {{ $ki['state'] === 'open' ? '🟢 Open' : '⚫ Closed' }}
                            </span>
                            <span class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($ki['created_at'])->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <div class="px-5 py-4 text-center text-gray-500 text-sm">
                        <i class="fas fa-robot text-xl mb-2 block text-gray-600"></i>
                        K-Arma belum membuat suggestions.<br>
                        <span class="text-xs">Brain workflow berjalan setiap hari pukul 00:00 WIB</span>
                    </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    {{-- ===== K-ARMA CAPABILITIES INFO ===== --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="300">
        <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
            <i class="fas fa-bolt text-yellow-400"></i> K-Arma Capabilities
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-kvt-800/50 rounded-xl p-4 border border-kvt-700/20">
                <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center mb-3">
                    <i class="fas fa-comment-dots text-blue-400"></i>
                </div>
                <h4 class="text-white font-medium text-sm mb-1">Issue Response</h4>
                <p class="text-gray-500 text-xs">Auto-detect 14+ kategori, smart labeling, knowledge-based response</p>
            </div>
            <div class="bg-kvt-800/50 rounded-xl p-4 border border-kvt-700/20">
                <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center mb-3">
                    <i class="fas fa-code-branch text-purple-400"></i>
                </div>
                <h4 class="text-white font-medium text-sm mb-1">PR Guardian</h4>
                <p class="text-gray-500 text-xs">Deep analysis, risk assessment, dependabot explanation, file review</p>
            </div>
            <div class="bg-kvt-800/50 rounded-xl p-4 border border-kvt-700/20">
                <div class="w-10 h-10 bg-red-500/20 rounded-lg flex items-center justify-center mb-3">
                    <i class="fas fa-brain text-red-400"></i>
                </div>
                <h4 class="text-white font-medium text-sm mb-1">Daily Brain</h4>
                <p class="text-gray-500 text-xs">Project health scan, auto-create improvement issues, daily report</p>
            </div>
            <div class="bg-kvt-800/50 rounded-xl p-4 border border-kvt-700/20">
                <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center mb-3">
                    <i class="fas fa-book text-green-400"></i>
                </div>
                <h4 class="text-white font-medium text-sm mb-1">Wiki & Projects</h4>
                <p class="text-gray-500 text-xs">Auto-sync docs ke Wiki, milestone management, weekly reports</p>
            </div>
        </div>
    </div>

</div>

@push('scripts')
<script>
function refreshData() {
    const icon = document.getElementById('refreshIcon');
    icon.classList.add('fa-spin');

    fetch('{{ route("admin.k-arma.refresh") }}')
        .then(r => r.json())
        .then(data => {
            icon.classList.remove('fa-spin');
            location.reload();
        })
        .catch(() => {
            icon.classList.remove('fa-spin');
            location.reload();
        });
}
</script>
@endpush
@endsection
