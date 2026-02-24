@extends('tata-letak.dasbor')
@section('judul', 'Repositori Proyek - Admin KVT Hub')
@section('judul-halaman', 'Repositori Proyek')

@section('konten')
@php
    use App\Http\Controllers\Admin\RepositoriController;

    $ikonEkstensi = [
        'php' => ['fas fa-code', 'purple'],
        'blade.php' => ['fas fa-file-code', 'kvt'],
        'js' => ['fab fa-js-square', 'yellow'],
        'ts' => ['fas fa-code', 'blue'],
        'vue' => ['fab fa-vuejs', 'green'],
        'css' => ['fab fa-css3-alt', 'sky'],
        'scss' => ['fab fa-sass', 'pink'],
        'html' => ['fab fa-html5', 'orange'],
        'json' => ['fas fa-brackets-curly', 'amber'],
        'md' => ['fas fa-file-alt', 'gray'],
        'xml' => ['fas fa-file-code', 'teal'],
        'yaml' => ['fas fa-file-alt', 'indigo'],
        'yml' => ['fas fa-file-alt', 'indigo'],
        'sql' => ['fas fa-database', 'emerald'],
        'env' => ['fas fa-lock', 'red'],
        'sh' => ['fas fa-terminal', 'lime'],
        'ps1' => ['fas fa-terminal', 'cyan'],
        'txt' => ['fas fa-file', 'gray'],
        'lock' => ['fas fa-lock', 'gray'],
        'svg' => ['fas fa-image', 'pink'],
        'png' => ['fas fa-image', 'green'],
        'jpg' => ['fas fa-image', 'amber'],
    ];
@endphp

<div class="max-w-7xl mx-auto px-4 py-8 space-y-8">

    {{-- ===== HEADER BAR ===== --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-down">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 bg-gradient-to-br from-kvt-500 to-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fab fa-github text-2xl text-white"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">kvt-hub</h1>
                    <div class="flex items-center gap-3 text-sm text-gray-400 mt-1">
                        <span class="flex items-center gap-1"><i class="fas fa-code-branch text-kvt-400"></i> {{ $gitBranch }}</span>
                        <span class="flex items-center gap-1"><i class="fas fa-clock"></i> {{ count($gitLog) }} commit terbaru</span>
                        @if($gitRemote !== '-')
                            <a href="{{ $gitRemote }}" target="_blank" class="flex items-center gap-1 hover:text-kvt-400 transition">
                                <i class="fas fa-external-link-alt"></i> Remote
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-3">
                <span class="px-3 py-1.5 bg-green-500/20 text-green-400 rounded-lg text-sm font-semibold">
                    <i class="fas fa-circle text-xs mr-1"></i> Active
                </span>
                <span class="px-3 py-1.5 bg-kvt-800 text-kvt-300 rounded-lg text-sm">
                    Laravel 11
                </span>
                <span class="px-3 py-1.5 bg-kvt-800 text-kvt-300 rounded-lg text-sm">
                    PHP 8.3
                </span>
            </div>
        </div>
    </div>

    {{-- ===== STATISTIK CARDS ===== --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-file-code text-blue-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-white">{{ number_format($stats['totalFiles']) }}</div>
            <div class="text-sm text-gray-400 mt-1">Total File</div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-10 h-10 bg-amber-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-folder text-amber-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-white">{{ number_format($stats['totalFolders']) }}</div>
            <div class="text-sm text-gray-400 mt-1">Total Folder</div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-10 h-10 bg-green-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-align-left text-green-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-white">{{ number_format($stats['totalLines']) }}</div>
            <div class="text-sm text-gray-400 mt-1">Total Baris Kode</div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 text-center">
            <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center mx-auto mb-3">
                <i class="fas fa-hdd text-purple-400 text-xl"></i>
            </div>
            <div class="text-2xl font-bold text-white">{{ RepositoriController::formatSize($stats['totalSize']) }}</div>
            <div class="text-sm text-gray-400 mt-1">Ukuran Total</div>
        </div>
    </div>

    {{-- ===== TAB NAVIGATION ===== --}}
    <div class="flex items-center gap-1 border-b border-kvt-700/30 pb-0">
        <button onclick="gantiTab('browser')" id="tab-browser" class="tab-btn px-5 py-3 text-sm font-semibold rounded-t-lg border-b-2 border-kvt-500 text-kvt-400 bg-kvt-900/40">
            <i class="fas fa-folder-open mr-2"></i>File Browser
        </button>
        <button onclick="gantiTab('commits')" id="tab-commits" class="tab-btn px-5 py-3 text-sm font-semibold rounded-t-lg border-b-2 border-transparent text-gray-400 hover:text-white transition">
            <i class="fas fa-history mr-2"></i>Commits ({{ count($gitLog) }})
        </button>
        <button onclick="gantiTab('stats')" id="tab-stats" class="tab-btn px-5 py-3 text-sm font-semibold rounded-t-lg border-b-2 border-transparent text-gray-400 hover:text-white transition">
            <i class="fas fa-chart-pie mr-2"></i>Statistik Kode
        </button>
        <button onclick="gantiTab('recent')" id="tab-recent" class="tab-btn px-5 py-3 text-sm font-semibold rounded-t-lg border-b-2 border-transparent text-gray-400 hover:text-white transition">
            <i class="fas fa-clock mr-2"></i>File Terbaru
        </button>
    </div>

    {{-- ===== TAB: FILE BROWSER ===== --}}
    <div id="panel-browser" class="tab-panel">
        {{-- Breadcrumb --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 mb-4 flex items-center gap-2 flex-wrap text-sm">
            <a href="{{ route('admin.repositori') }}" class="text-kvt-400 hover:text-white transition font-semibold flex items-center gap-1">
                <i class="fas fa-home"></i> root
            </a>
            @foreach($breadcrumbs as $crumb)
                <span class="text-gray-600">/</span>
                @if($loop->last)
                    <span class="text-white font-semibold">{{ $crumb['name'] }}</span>
                @else
                    <a href="{{ route('admin.repositori', ['path' => $crumb['path']]) }}" class="text-kvt-400 hover:text-white transition">{{ $crumb['name'] }}</a>
                @endif
            @endforeach
        </div>

        {{-- Search --}}
        <div class="mb-4">
            <div class="relative">
                <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
                <input type="text" id="cariFile" oninput="filterFile()" placeholder="Cari file atau folder…" class="w-full pl-11 pr-4 py-3 bg-kvt-900/60 border border-kvt-700/30 rounded-xl text-white placeholder-gray-500 focus:border-kvt-500 focus:outline-none transition">
            </div>
        </div>

        {{-- File table --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
            @if(count($gitLog) > 0)
            <div class="px-5 py-3 bg-kvt-800/50 border-b border-kvt-700/30 flex items-center gap-3 text-sm">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($gitLog[0]['author']) }}&background=3399FF&color=fff&size=28" class="w-7 h-7 rounded-full" alt="">
                <span class="font-semibold text-white">{{ $gitLog[0]['author'] }}</span>
                <span class="text-gray-400 truncate max-w-md">{{ $gitLog[0]['message'] }}</span>
                <span class="text-gray-500 ml-auto whitespace-nowrap">{{ $gitLog[0]['relative'] }}</span>
                <code class="text-kvt-400 text-xs bg-kvt-900 px-2 py-1 rounded font-mono">{{ $gitLog[0]['short'] }}</code>
            </div>
            @endif

            <table class="w-full text-sm" id="tabelFile">
                <thead>
                    <tr class="border-b border-kvt-700/20 text-gray-500 text-xs uppercase">
                        <th class="text-left px-5 py-3 font-medium">Nama</th>
                        <th class="text-left px-5 py-3 font-medium hidden md:table-cell">Terakhir Diubah</th>
                        <th class="text-right px-5 py-3 font-medium">Ukuran / Item</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- Tombol parent folder --}}
                    @if(!empty($sanitized))
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition cursor-pointer" onclick="window.location='{{ route('admin.repositori', ['path' => dirname($sanitized) === '.' ? '' : dirname($sanitized)]) }}'">
                        <td class="px-5 py-3">
                            <span class="flex items-center gap-3 text-gray-400">
                                <i class="fas fa-level-up-alt text-kvt-500"></i>
                                <span>..</span>
                            </span>
                        </td>
                        <td class="px-5 py-3 hidden md:table-cell"></td>
                        <td class="px-5 py-3 text-right"></td>
                    </tr>
                    @endif

                    @forelse($items as $item)
                    <tr class="file-row border-b border-kvt-700/10 hover:bg-kvt-800/30 transition cursor-pointer"
                        onclick="window.location='{{ $item['type'] === 'folder' ? route('admin.repositori', ['path' => $item['path']]) : route('admin.repositori.file', ['path' => $item['path']]) }}'">
                        <td class="px-5 py-3">
                            <span class="flex items-center gap-3">
                                @if($item['type'] === 'folder')
                                    <i class="fas fa-folder text-amber-400"></i>
                                @else
                                    @php
                                        $ext = $item['extension'];
                                        if (str_ends_with($item['name'], '.blade.php')) $ext = 'blade.php';
                                        $iconInfo = $ikonEkstensi[$ext] ?? ['fas fa-file', 'gray'];
                                    @endphp
                                    <i class="{{ $iconInfo[0] }} text-{{ $iconInfo[1] }}-400"></i>
                                @endif
                                <span class="text-white font-medium file-name">{{ $item['name'] }}</span>
                            </span>
                        </td>
                        <td class="px-5 py-3 text-gray-500 hidden md:table-cell">{{ $item['modified'] }}</td>
                        <td class="px-5 py-3 text-right text-gray-400">
                            @if($item['type'] === 'folder')
                                <span class="text-xs bg-kvt-800 px-2 py-1 rounded">{{ number_format($item['items']) }} files</span>
                            @else
                                {{ RepositoriController::formatSize($item['size']) }}
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-5 py-12 text-center text-gray-500">
                            <i class="fas fa-folder-open text-4xl mb-3 block"></i>
                            Direktori kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- README Preview --}}
        @if(!empty($readme))
        <div class="mt-6 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="px-5 py-3 bg-kvt-800/50 border-b border-kvt-700/30 flex items-center gap-2 text-sm font-semibold text-white">
                <i class="fas fa-book text-kvt-400"></i> README.md
            </div>
            <div class="p-6 text-gray-300 leading-relaxed readme-content whitespace-pre-wrap font-mono text-sm max-h-[600px] overflow-y-auto">{{ $readme }}</div>
        </div>
        @endif
    </div>

    {{-- ===== TAB: COMMITS ===== --}}
    <div id="panel-commits" class="tab-panel hidden">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
            <div class="px-5 py-4 bg-kvt-800/50 border-b border-kvt-700/30 flex items-center justify-between">
                <h3 class="font-bold text-white text-lg flex items-center gap-2">
                    <i class="fas fa-history text-kvt-400"></i> Riwayat Commit
                </h3>
                <span class="text-sm text-gray-400">Branch: <code class="text-kvt-400 font-mono">{{ $gitBranch }}</code></span>
            </div>

            <div class="divide-y divide-kvt-700/20">
                @forelse($gitLog as $i => $commit)
                <div class="px-5 py-4 hover:bg-kvt-800/20 transition flex items-start gap-4">
                    {{-- Timeline dot --}}
                    <div class="flex flex-col items-center pt-1">
                        <div class="w-3 h-3 rounded-full {{ $i === 0 ? 'bg-green-500 ring-4 ring-green-500/20' : 'bg-kvt-600' }}"></div>
                        @if(!$loop->last)
                        <div class="w-0.5 flex-1 bg-kvt-700/30 mt-1 min-h-[24px]"></div>
                        @endif
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-4">
                            <div class="min-w-0">
                                <p class="text-white font-medium truncate">{{ $commit['message'] }}</p>
                                <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                                    <span class="flex items-center gap-1">
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($commit['author']) }}&background=3399FF&color=fff&size=20" class="w-5 h-5 rounded-full" alt="">
                                        {{ $commit['author'] }}
                                    </span>
                                    <span>{{ $commit['relative'] }}</span>
                                </div>
                            </div>
                            <code class="text-kvt-400 text-xs bg-kvt-900 px-3 py-1 rounded-lg font-mono shrink-0 hover:bg-kvt-800 transition cursor-pointer" title="{{ $commit['hash'] }}">{{ $commit['short'] }}</code>
                        </div>
                    </div>
                </div>
                @empty
                <div class="px-5 py-12 text-center text-gray-500">
                    <i class="fas fa-code-branch text-4xl mb-3 block"></i>
                    Tidak ada riwayat commit ditemukan.
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- ===== TAB: STATISTIK KODE ===== --}}
    <div id="panel-stats" class="tab-panel hidden">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Chart: Distribusi Tipe File --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="font-bold text-white text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-chart-pie text-kvt-400"></i> Distribusi Tipe File
                </h3>
                <div class="relative" style="height:300px">
                    <canvas id="chartTipeFile"></canvas>
                </div>
            </div>

            {{-- Chart: Baris Kode per Bahasa --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
                <h3 class="font-bold text-white text-lg mb-4 flex items-center gap-2">
                    <i class="fas fa-code text-green-400"></i> Baris Kode per Bahasa
                </h3>
                <div class="relative" style="height:300px">
                    <canvas id="chartBarisKode"></canvas>
                </div>
            </div>

            {{-- Tabel Ekstensi Detail --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden lg:col-span-2">
                <div class="px-5 py-4 bg-kvt-800/50 border-b border-kvt-700/30">
                    <h3 class="font-bold text-white text-lg flex items-center gap-2">
                        <i class="fas fa-list-alt text-amber-400"></i> Detail per Ekstensi File
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-kvt-700/20 text-gray-500 text-xs uppercase">
                                <th class="text-left px-5 py-3">Ekstensi</th>
                                <th class="text-right px-5 py-3">Jumlah File</th>
                                <th class="text-right px-5 py-3">Ukuran</th>
                                <th class="text-right px-5 py-3">Baris Kode</th>
                                <th class="text-left px-5 py-3">Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $topExts = array_slice($stats['extensions'], 0, 20, true); @endphp
                            @foreach($topExts as $ext => $info)
                            <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                                <td class="px-5 py-3">
                                    <span class="flex items-center gap-2">
                                        @php $iconInfo = $ikonEkstensi[$ext] ?? ['fas fa-file', 'gray']; @endphp
                                        <i class="{{ $iconInfo[0] }} text-{{ $iconInfo[1] }}-400"></i>
                                        <code class="text-white font-mono">.{{ $ext }}</code>
                                    </span>
                                </td>
                                <td class="px-5 py-3 text-right text-white font-semibold">{{ number_format($info['count']) }}</td>
                                <td class="px-5 py-3 text-right text-gray-400">{{ RepositoriController::formatSize($info['size']) }}</td>
                                <td class="px-5 py-3 text-right text-gray-400">
                                    {{ isset($stats['linesByType'][$ext]) ? number_format($stats['linesByType'][$ext]) : '-' }}
                                </td>
                                <td class="px-5 py-3">
                                    @php $pct = $stats['totalFiles'] > 0 ? round($info['count'] / $stats['totalFiles'] * 100, 1) : 0; @endphp
                                    <div class="flex items-center gap-2">
                                        <div class="flex-1 bg-kvt-800 rounded-full h-2 max-w-[120px]">
                                            <div class="bg-gradient-to-r from-kvt-500 to-purple-500 h-2 rounded-full" style="width:{{ min($pct * 3, 100) }}%"></div>
                                        </div>
                                        <span class="text-gray-400 text-xs">{{ $pct }}%</span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Top 10 File Terbesar --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden lg:col-span-2">
                <div class="px-5 py-4 bg-kvt-800/50 border-b border-kvt-700/30">
                    <h3 class="font-bold text-white text-lg flex items-center gap-2">
                        <i class="fas fa-weight-hanging text-red-400"></i> Top 10 File Terbesar
                    </h3>
                </div>
                <div class="divide-y divide-kvt-700/10">
                    @foreach($stats['largestFiles'] as $i => $file)
                    <div class="px-5 py-3 hover:bg-kvt-800/20 transition flex items-center gap-4 cursor-pointer" onclick="window.location='{{ route('admin.repositori.file', ['path' => $file['path']]) }}'">
                        <span class="text-gray-500 font-mono text-xs w-6 text-center">#{{ $i + 1 }}</span>
                        <div class="flex-1 min-w-0">
                            <p class="text-kvt-400 font-mono text-sm truncate">{{ $file['path'] }}</p>
                        </div>
                        <span class="text-white font-semibold text-sm">{{ RepositoriController::formatSize($file['size']) }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- ===== TAB: FILE TERBARU ===== --}}
    <div id="panel-recent" class="tab-panel hidden">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
            <div class="px-5 py-4 bg-kvt-800/50 border-b border-kvt-700/30">
                <h3 class="font-bold text-white text-lg flex items-center gap-2">
                    <i class="fas fa-clock text-emerald-400"></i> File Diubah 7 Hari Terakhir
                </h3>
            </div>

            @if(count($stats['recentFiles']) > 0)
            <div class="divide-y divide-kvt-700/10">
                @foreach($stats['recentFiles'] as $file)
                <div class="px-5 py-3 hover:bg-kvt-800/20 transition flex items-center gap-4 cursor-pointer" onclick="window.location='{{ route('admin.repositori.file', ['path' => $file['path']]) }}'">
                    <div class="w-8 h-8 bg-emerald-500/20 rounded-lg flex items-center justify-center shrink-0">
                        <i class="fas fa-file-code text-emerald-400 text-sm"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-mono text-sm truncate">{{ $file['path'] }}</p>
                    </div>
                    <span class="text-gray-500 text-xs whitespace-nowrap">{{ $file['modified'] }}</span>
                    <span class="text-gray-400 text-xs">{{ RepositoriController::formatSize($file['size']) }}</span>
                </div>
                @endforeach
            </div>
            @else
            <div class="px-5 py-12 text-center text-gray-500">
                <i class="fas fa-check-circle text-4xl mb-3 block text-green-500/30"></i>
                Tidak ada file yang diubah dalam 7 hari terakhir.
            </div>
            @endif
        </div>
    </div>

</div>

@push('scripts')
<script>
// ===== TAB SWITCHING =====
function gantiTab(tab) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(b => {
        b.classList.remove('border-kvt-500', 'text-kvt-400', 'bg-kvt-900/40');
        b.classList.add('border-transparent', 'text-gray-400');
    });
    document.getElementById('panel-' + tab).classList.remove('hidden');
    const btn = document.getElementById('tab-' + tab);
    btn.classList.add('border-kvt-500', 'text-kvt-400', 'bg-kvt-900/40');
    btn.classList.remove('border-transparent', 'text-gray-400');

    // Init charts if stats tab
    if (tab === 'stats' && !window._chartsInit) {
        initCharts();
        window._chartsInit = true;
    }
}

// ===== FILE SEARCH =====
function filterFile() {
    const q = document.getElementById('cariFile').value.toLowerCase();
    document.querySelectorAll('#tabelFile .file-row').forEach(row => {
        const name = row.querySelector('.file-name')?.textContent.toLowerCase() || '';
        row.style.display = name.includes(q) ? '' : 'none';
    });
}

// ===== CHART.JS =====
function initCharts() {
    // Data dari PHP
    @php
        $topExtensions = array_slice($stats['extensions'], 0, 10, true);
        $topLinesByType = array_slice($stats['linesByType'], 0, 8, true);
    @endphp
    const extensions = @json($topExtensions);
    const linesByType = @json($topLinesByType);

    const colors = [
        '#3399FF', '#8B5CF6', '#10B981', '#F59E0B', '#EF4444',
        '#EC4899', '#06B6D4', '#84CC16', '#F97316', '#6366F1'
    ];

    // Doughnut — Tipe File
    const extLabels = Object.keys(extensions).map(e => '.' + e);
    const extData = Object.values(extensions).map(e => e.count);

    new Chart(document.getElementById('chartTipeFile'), {
        type: 'doughnut',
        data: {
            labels: extLabels,
            datasets: [{
                data: extData,
                backgroundColor: colors,
                borderWidth: 0,
                hoverOffset: 8,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'right', labels: { color: '#9CA3AF', font: { size: 11 }, padding: 12 } }
            }
        }
    });

    // Bar — Baris Kode
    const lineLabels = Object.keys(linesByType).map(e => '.' + e);
    const lineData = Object.values(linesByType);

    new Chart(document.getElementById('chartBarisKode'), {
        type: 'bar',
        data: {
            labels: lineLabels,
            datasets: [{
                label: 'Baris Kode',
                data: lineData,
                backgroundColor: colors.slice(0, lineLabels.length),
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    ticks: { color: '#9CA3AF', callback: v => v.toLocaleString() },
                    grid: { color: 'rgba(255,255,255,0.05)' }
                },
                y: {
                    ticks: { color: '#9CA3AF', font: { family: 'monospace' } },
                    grid: { display: false }
                }
            }
        }
    });
}

// Init AOS
document.addEventListener('DOMContentLoaded', () => {
    if (typeof AOS !== 'undefined') AOS.init({ duration: 600, once: true });
});
</script>
@endpush

@push('styles')
<style>
.readme-content { word-break: break-word; }
#tabelFile tbody tr { transition: background 0.15s; }
code { font-family: 'JetBrains Mono', 'Fira Code', monospace; }
</style>
@endpush
@endsection
