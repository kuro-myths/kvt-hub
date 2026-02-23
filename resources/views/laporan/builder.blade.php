@extends('tata-letak.dasbor')

@section('judul', 'Diagram Builder — KVT Hub')
@section('judul-halaman', 'Diagram Builder')

@push('styles')
<style>
    .tipe-card { cursor: pointer; transition: all 0.2s; border: 2px solid transparent; }
    .tipe-card:hover { border-color: rgba(99,102,241,0.4); transform: translateY(-2px); }
    .tipe-card.aktif { border-color: #6366f1; background: rgba(99,102,241,0.1); }
    .tipe-card .tipe-ikon { font-size: 24px; transition: transform 0.2s; }
    .tipe-card:hover .tipe-ikon { transform: scale(1.15); }
    .color-dot { width: 24px; height: 24px; border-radius: 50%; cursor: pointer; border: 2px solid transparent; transition: all 0.15s; }
    .color-dot:hover, .color-dot.aktif { border-color: white; transform: scale(1.2); }
    .data-row { display: grid; grid-template-columns: 1fr 120px 40px; gap: 8px; align-items: center; }
    .dataset-block { border-left: 3px solid; padding-left: 12px; margin-bottom: 16px; }
    .builder-panel { scrollbar-width: thin; scrollbar-color: rgba(99,102,241,0.3) transparent; }
    .builder-panel::-webkit-scrollbar { width: 5px; }
    .builder-panel::-webkit-scrollbar-track { background: transparent; }
    .builder-panel::-webkit-scrollbar-thumb { background: rgba(99,102,241,0.3); border-radius: 99px; }
    .preview-canvas { background: rgba(15,23,42,0.6); border-radius: 16px; }
    .tab-btn { padding: 8px 16px; font-size: 12px; font-weight: 600; border-radius: 8px; transition: all 0.15s; }
    .tab-btn.aktif { background: rgba(99,102,241,0.2); color: #a5b4fc; }
    .tab-btn:not(.aktif) { color: #6b7280; }
    .tab-btn:not(.aktif):hover { color: #9ca3af; background: rgba(30,41,59,0.5); }
    .kategori-header { font-size: 10px; text-transform: uppercase; letter-spacing: 0.1em; color: #6b7280; font-weight: 700; padding: 4px 0; margin-top: 8px; }
    @keyframes chart-in { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
    .chart-animated { animation: chart-in 0.3s ease; }
    .input-sm { background: rgba(30,41,59,0.5); border: 1px solid rgba(71,85,105,0.3); color: white; border-radius: 8px; padding: 6px 10px; font-size: 12px; width: 100%; }
    .input-sm:focus { outline: none; border-color: rgba(99,102,241,0.5); }
    .input-sm::placeholder { color: #4b5563; }
</style>
@endpush

@section('konten')
<section class="py-6 px-4">
    <div class="max-w-full mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-5" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-violet-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chart-pie text-white text-sm"></i>
                    </div>
                    Diagram Builder
                </h1>
                <p class="text-gray-400 text-sm mt-1">50 jenis diagram — pilih, isi data, kustomisasi, simpan</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('laporan.index') }}" class="bg-kvt-800/50 border border-kvt-700/30 text-gray-300 hover:text-white px-4 py-2.5 rounded-xl text-sm transition">
                    <i class="fas fa-list mr-1"></i>Semua Diagram
                </a>
                <button onclick="simpanDiagram()" class="bg-gradient-to-r from-indigo-500 to-violet-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-indigo-400 hover:to-violet-500 transition shadow-lg text-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Diagram
                </button>
            </div>
        </div>

        {{-- Main Builder Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-5">
            {{-- LEFT PANEL: Type Selector + Data Input --}}
            <div class="lg:col-span-5 xl:col-span-4 space-y-4">

                {{-- Tabs --}}
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-2 flex gap-1">
                    <button onclick="gantiTab('tipe')" class="tab-btn aktif flex-1" id="tabTipe"><i class="fas fa-shapes mr-1"></i>Tipe</button>
                    <button onclick="gantiTab('data')" class="tab-btn flex-1" id="tabData"><i class="fas fa-database mr-1"></i>Data</button>
                    <button onclick="gantiTab('gaya')" class="tab-btn flex-1" id="tabGaya"><i class="fas fa-palette mr-1"></i>Gaya</button>
                    <button onclick="gantiTab('opsi')" class="tab-btn flex-1" id="tabOpsi"><i class="fas fa-cog mr-1"></i>Opsi</button>
                </div>

                {{-- =============== TAB: TIPE DIAGRAM =============== --}}
                <div id="panelTipe" class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-4 builder-panel" style="max-height: 65vh; overflow-y: auto;">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-white text-sm font-bold">Pilih Jenis Diagram</span>
                        <span class="text-gray-500 text-xs" id="hitungTipe">50 jenis</span>
                    </div>
                    <input type="text" id="cariTipe" oninput="filterTipe()" placeholder="Cari diagram..." class="input-sm mb-3 w-full">

                    @php
                        $semua = \App\Models\Laporan::tipeDiagram();
                        $kategoriDiagram = [
                            'Batang / Bar' => ['fa-chart-bar', 'indigo', array_slice($semua, 0, 8)],
                            'Garis / Line' => ['fa-chart-line', 'emerald', array_slice($semua, 8, 8)],
                            'Lingkaran' => ['fa-chart-pie', 'pink', array_slice($semua, 16, 6)],
                            'Radar & Scatter' => ['fa-bullseye', 'cyan', array_slice($semua, 22, 6)],
                            'Kombinasi' => ['fa-layer-group', 'amber', array_slice($semua, 28, 4)],
                            'Statistik' => ['fa-calculator', 'violet', array_slice($semua, 32, 6)],
                            'Flow & Relasi' => ['fa-project-diagram', 'rose', array_slice($semua, 38, 4)],
                            'Indikator' => ['fa-tachometer-alt', 'lime', array_slice($semua, 42, 4)],
                            'Khusus' => ['fa-star', 'orange', array_slice($semua, 46, 4)],
                        ];
                        $ikonMap = [
                            'Bar Chart' => 'fa-chart-bar', 'Horizontal Bar' => 'fa-grip-lines', 'Stacked Bar' => 'fa-layer-group',
                            'Grouped Bar' => 'fa-align-left', 'Rounded Bar' => 'fa-chart-bar', 'Gradient Bar' => 'fa-fill-drip',
                            'Negative Bar' => 'fa-exchange-alt', 'Floating Bar' => 'fa-arrows-alt-v',
                            'Line Chart' => 'fa-chart-line', 'Area Chart' => 'fa-mountain', 'Multi-Line' => 'fa-wave-square',
                            'Stepped Line' => 'fa-signal', 'Curved Line' => 'fa-bezier-curve', 'Dashed Line' => 'fa-ellipsis-h',
                            'Point Line' => 'fa-dot-circle', 'Multi-Axis Line' => 'fa-arrows-alt',
                            'Pie Chart' => 'fa-chart-pie', 'Doughnut Chart' => 'fa-circle-notch', 'Semi Doughnut' => 'fa-adjust',
                            'Nested Doughnut' => 'fa-bullseye', 'Polar Area' => 'fa-compass', 'Rose Chart' => 'fa-fan',
                            'Radar Chart' => 'fa-broadcast-tower', 'Filled Radar' => 'fa-shield-alt', 'Scatter Plot' => 'fa-braille',
                            'Bubble Chart' => 'fa-bowling-ball', 'XY Scatter' => 'fa-crosshairs', 'Cluster Scatter' => 'fa-th',
                            'Mixed Chart' => 'fa-blender', 'Combo Chart' => 'fa-object-group', 'Bar-Line Combo' => 'fa-columns',
                            'Dual Axis' => 'fa-ruler-combined',
                            'Histogram' => 'fa-chart-area', 'Box Plot' => 'fa-box', 'Waterfall Chart' => 'fa-water',
                            'Pareto Chart' => 'fa-sort-amount-down', 'Bell Curve' => 'fa-bell', 'Error Bar' => 'fa-exclamation-circle',
                            'Funnel Chart' => 'fa-filter', 'Pyramid Chart' => 'fa-caret-up', 'Sankey Diagram' => 'fa-random',
                            'Sunburst' => 'fa-sun',
                            'Gauge Chart' => 'fa-tachometer-alt', 'Progress Bar' => 'fa-tasks', 'KPI Card' => 'fa-digital-tachograph',
                            'Speedometer' => 'fa-stopwatch',
                            'Heatmap' => 'fa-fire', 'Treemap' => 'fa-th-large', 'Candlestick' => 'fa-candle-holder',
                            'Timeline' => 'fa-stream',
                        ];
                    @endphp

                    @foreach($kategoriDiagram as $kategori => [$katIkon, $katWarna, $items])
                        <div class="kategori-group" data-kategori="{{ $kategori }}">
                            <div class="kategori-header flex items-center gap-2">
                                <i class="fas {{ $katIkon }} text-{{ $katWarna }}-400"></i>
                                <span>{{ $kategori }} ({{ count($items) }})</span>
                            </div>
                            <div class="grid grid-cols-2 gap-2 mb-2">
                                @foreach($items as $tipe)
                                    <div class="tipe-card bg-kvt-800/30 rounded-xl p-3 text-center" data-tipe="{{ $tipe }}" onclick="pilihTipe('{{ $tipe }}')">
                                        <i class="fas {{ $ikonMap[$tipe] ?? 'fa-chart-bar' }} tipe-ikon text-{{ $katWarna }}-400 mb-1"></i>
                                        <div class="text-[10px] text-gray-400 leading-tight">{{ $tipe }}</div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- =============== TAB: DATA INPUT =============== --}}
                <div id="panelData" class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-4 builder-panel hidden" style="max-height: 65vh; overflow-y: auto;">
                    <div class="space-y-4">
                        {{-- Judul --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Judul Diagram</label>
                            <input type="text" id="judulDiagram" class="input-sm" placeholder="Statistik Pembelajaran..." value="{{ $laporan->judul ?? '' }}">
                        </div>
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Deskripsi</label>
                            <textarea id="deskripsiDiagram" class="input-sm" rows="2" placeholder="Penjelasan singkat...">{{ $laporan->deskripsi ?? '' }}</textarea>
                        </div>

                        {{-- Labels --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Label (pisahkan koma)</label>
                            <input type="text" id="labelInput" class="input-sm" placeholder="Jan, Feb, Mar, Apr, Mei..." oninput="perbaruiGrafik()">
                        </div>

                        {{-- Datasets --}}
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label class="text-gray-400 text-xs font-semibold">Dataset</label>
                                <button onclick="tambahDataset()" class="text-indigo-400 hover:text-indigo-300 text-xs"><i class="fas fa-plus mr-1"></i>Tambah Dataset</button>
                            </div>
                            <div id="datasetContainer" class="space-y-3">
                                {{-- Dynamic datasets rendered here --}}
                            </div>
                        </div>

                        {{-- Quick Templates --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-2 block">Template Cepat</label>
                            <div class="grid grid-cols-2 gap-2">
                                <button onclick="pakaiTemplate('siswa')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-indigo-500/30 transition">
                                    <i class="fas fa-users text-blue-400 mr-1"></i>Data Siswa
                                </button>
                                <button onclick="pakaiTemplate('nilai')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-indigo-500/30 transition">
                                    <i class="fas fa-star text-amber-400 mr-1"></i>Distribusi Nilai
                                </button>
                                <button onclick="pakaiTemplate('kehadiran')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-indigo-500/30 transition">
                                    <i class="fas fa-calendar-check text-green-400 mr-1"></i>Kehadiran
                                </button>
                                <button onclick="pakaiTemplate('bulanan')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-indigo-500/30 transition">
                                    <i class="fas fa-chart-line text-violet-400 mr-1"></i>Tren Bulanan
                                </button>
                                <button onclick="pakaiTemplate('perbandingan')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-indigo-500/30 transition">
                                    <i class="fas fa-balance-scale text-cyan-400 mr-1"></i>Perbandingan
                                </button>
                                <button onclick="pakaiTemplate('kosong')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white hover:border-red-500/30 transition">
                                    <i class="fas fa-eraser text-red-400 mr-1"></i>Kosongkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- =============== TAB: GAYA / STYLE =============== --}}
                <div id="panelGaya" class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-4 builder-panel hidden" style="max-height: 65vh; overflow-y: auto;">
                    <div class="space-y-4">
                        {{-- Color Palette --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-2 block">Palet Warna</label>
                            <div class="grid grid-cols-5 gap-2 mb-3" id="paletContainer">
                                @php
                                    $palets = [
                                        'Default' => ['#6366f1','#8b5cf6','#a855f7','#c084fc','#d8b4fe','#818cf8','#a5b4fc','#c7d2fe'],
                                        'Ocean' => ['#0ea5e9','#06b6d4','#14b8a6','#22d3ee','#67e8f9','#2563eb','#3b82f6','#60a5fa'],
                                        'Sunset' => ['#f43f5e','#f97316','#eab308','#fb923c','#fbbf24','#ef4444','#f59e0b','#fde047'],
                                        'Forest' => ['#22c55e','#16a34a','#15803d','#4ade80','#86efac','#10b981','#34d399','#6ee7b7'],
                                        'Neon' => ['#e879f9','#c084fc','#a78bfa','#f472b6','#fb7185','#818cf8','#67e8f9','#34d399'],
                                        'Monochrome' => ['#f8fafc','#e2e8f0','#94a3b8','#64748b','#475569','#334155','#1e293b','#0f172a'],
                                    ];
                                @endphp
                            </div>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach($palets as $nama => $warna)
                                    <button onclick="pakaiPalet('{{ $nama }}')" class="flex items-center gap-1 bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-2.5 py-1.5 text-[10px] text-gray-400 hover:text-white hover:border-indigo-500/30 transition palet-btn" data-palet="{{ $nama }}" data-warna="{{ implode(',', $warna) }}">
                                        @foreach(array_slice($warna, 0, 4) as $w)
                                            <span class="w-2.5 h-2.5 rounded-full" style="background: {{ $w }}"></span>
                                        @endforeach
                                        <span class="ml-1">{{ $nama }}</span>
                                    </button>
                                @endforeach
                            </div>
                        </div>

                        {{-- Border & Fill --}}
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-gray-400 text-xs font-semibold mb-1 block">Border Width</label>
                                <input type="range" id="borderWidth" min="0" max="8" value="2" oninput="perbaruiGrafik()" class="w-full accent-indigo-500">
                                <span class="text-gray-500 text-[10px]" id="borderWidthVal">2px</span>
                            </div>
                            <div>
                                <label class="text-gray-400 text-xs font-semibold mb-1 block">Border Radius</label>
                                <input type="range" id="borderRadius" min="0" max="20" value="4" oninput="perbaruiGrafik()" class="w-full accent-indigo-500">
                                <span class="text-gray-500 text-[10px]" id="borderRadiusVal">4px</span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-gray-400 text-xs font-semibold mb-1 block">Opacity Fill</label>
                                <input type="range" id="fillOpacity" min="0" max="100" value="80" oninput="perbaruiGrafik()" class="w-full accent-indigo-500">
                                <span class="text-gray-500 text-[10px]" id="fillOpacityVal">80%</span>
                            </div>
                            <div>
                                <label class="text-gray-400 text-xs font-semibold mb-1 block">Tension (Curve)</label>
                                <input type="range" id="lineTension" min="0" max="100" value="40" oninput="perbaruiGrafik()" class="w-full accent-indigo-500">
                                <span class="text-gray-500 text-[10px]" id="lineTensionVal">0.4</span>
                            </div>
                        </div>

                        {{-- Fonts --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Font Keluarga</label>
                            <select id="fontFamily" onchange="perbaruiGrafik()" class="input-sm">
                                <option value="Inter">Inter</option>
                                <option value="Consolas">Consolas</option>
                                <option value="Arial">Arial</option>
                                <option value="Courier New">Courier New</option>
                                <option value="Georgia">Georgia</option>
                            </select>
                        </div>
                    </div>
                </div>

                {{-- =============== TAB: OPSI / OPTIONS =============== --}}
                <div id="panelOpsi" class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-4 builder-panel hidden" style="max-height: 65vh; overflow-y: auto;">
                    <div class="space-y-4">
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-2 block">Tampilan</label>
                            <div class="space-y-2">
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiLegend" checked onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Tampilkan Legend
                                </label>
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiTitle" onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Tampilkan Judul di Chart
                                </label>
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiGrid" checked onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Tampilkan Grid
                                </label>
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiAnimasi" checked onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Animasi
                                </label>
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiFill" onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Fill Area
                                </label>
                                <label class="flex items-center gap-2 text-gray-400 text-xs cursor-pointer">
                                    <input type="checkbox" id="opsiStacked" onchange="perbaruiGrafik()" class="rounded accent-indigo-500"> Stacked
                                </label>
                            </div>
                        </div>

                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Legend Position</label>
                            <select id="legendPos" onchange="perbaruiGrafik()" class="input-sm">
                                <option value="top">Atas</option>
                                <option value="bottom">Bawah</option>
                                <option value="left">Kiri</option>
                                <option value="right">Kanan</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Aspek Rasio</label>
                            <select id="aspectRatio" onchange="perbaruiGrafik()" class="input-sm">
                                <option value="0">Responsif (auto)</option>
                                <option value="1">1:1 Kotak</option>
                                <option value="1.5">3:2</option>
                                <option value="1.77">16:9</option>
                                <option value="2">2:1 Lebar</option>
                            </select>
                        </div>

                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Skala Y Min</label>
                            <input type="number" id="yMin" class="input-sm" placeholder="Auto" oninput="perbaruiGrafik()">
                        </div>
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-1 block">Skala Y Max</label>
                            <input type="number" id="yMax" class="input-sm" placeholder="Auto" oninput="perbaruiGrafik()">
                        </div>

                        {{-- Export --}}
                        <div>
                            <label class="text-gray-400 text-xs font-semibold mb-2 block">Ekspor Gambar</label>
                            <div class="grid grid-cols-2 gap-2">
                                <button onclick="eksporGambar('png')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white transition"><i class="fas fa-file-image text-blue-400 mr-1"></i>PNG</button>
                                <button onclick="eksporGambar('jpg')" class="bg-kvt-800/30 border border-kvt-700/20 rounded-lg px-3 py-2 text-xs text-gray-400 hover:text-white transition"><i class="fas fa-file-image text-green-400 mr-1"></i>JPG</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- RIGHT PANEL: Live Preview --}}
            <div class="lg:col-span-7 xl:col-span-8 space-y-4">
                {{-- Preview Header --}}
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-3 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <span class="text-white text-sm font-bold"><i class="fas fa-eye text-indigo-400 mr-2"></i>Preview Langsung</span>
                        <span class="bg-indigo-500/20 text-indigo-400 text-[10px] px-2 py-0.5 rounded-full font-semibold" id="tipeAktifBadge">Bar Chart</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="perbaruiGrafik()" class="text-gray-500 hover:text-white text-xs transition"><i class="fas fa-sync-alt mr-1"></i>Refresh</button>
                        <button onclick="toggleFullscreen()" class="text-gray-500 hover:text-white text-xs transition"><i class="fas fa-expand mr-1"></i>Fullscreen</button>
                    </div>
                </div>

                {{-- Canvas --}}
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 preview-canvas" id="previewContainer" data-aos="fade-up">
                    <div class="relative" style="min-height: 400px;" id="canvasWrapper">
                        <canvas id="diagramCanvas"></canvas>
                    </div>
                </div>

                {{-- JSON Editor (collapsible) --}}
                <details class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden">
                    <summary class="p-4 text-sm text-gray-400 font-semibold cursor-pointer hover:text-white transition">
                        <i class="fas fa-code mr-2 text-indigo-400"></i>JSON Data (Advanced)
                    </summary>
                    <div class="p-4 pt-0">
                        <textarea id="jsonEditor" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-gray-300 rounded-xl p-4 font-mono text-xs resize-none focus:outline-none focus:border-indigo-500/50" rows="10" oninput="jsonKeGrafik()"></textarea>
                        <div class="flex items-center justify-between mt-2">
                            <span class="text-gray-600 text-[10px]" id="jsonStatus">Valid JSON</span>
                            <button onclick="formatJson()" class="text-indigo-400 hover:text-indigo-300 text-xs"><i class="fas fa-magic mr-1"></i>Format</button>
                        </div>
                    </div>
                </details>

                {{-- Saved Charts Grid --}}
                @if(isset($laporanList) && $laporanList->count() > 0)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-white text-sm font-bold"><i class="fas fa-folder-open text-amber-400 mr-2"></i>Diagram Tersimpan</span>
                        <a href="{{ route('laporan.index') }}" class="text-indigo-400 text-xs hover:text-indigo-300">Lihat Semua →</a>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                        @foreach($laporanList->take(6) as $lp)
                            <div class="bg-kvt-800/30 border border-kvt-700/20 rounded-xl p-3 hover:border-indigo-500/30 transition group">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-[10px] bg-kvt-700/30 text-gray-500 px-2 py-0.5 rounded">{{ $lp->tipe_diagram }}</span>
                                    <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition">
                                        <button onclick="muatDiagram({{ $lp->id }})" class="text-indigo-400 hover:text-indigo-300 text-[10px]"><i class="fas fa-pen"></i></button>
                                        <button onclick="duplikatDiagram({{ $lp->id }})" class="text-green-400 hover:text-green-300 text-[10px]"><i class="fas fa-copy"></i></button>
                                        <button onclick="hapusDiagram({{ $lp->id }})" class="text-red-400 hover:text-red-300 text-[10px]"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                                <a href="{{ route('laporan.tampilkan', $lp) }}" class="text-white text-xs font-semibold hover:text-indigo-400 transition block truncate">{{ $lp->judul }}</a>
                                <span class="text-gray-600 text-[10px]">{{ $lp->created_at->diffForHumans() }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // ==================== STATE ====================
    let tipeAktif = 'Bar Chart';
    let chartInstance = null;
    let editId = {{ $laporan->id ?? 'null' }};
    let datasets = [];
    let paletAktif = ['#6366f1','#8b5cf6','#a855f7','#c084fc','#d8b4fe','#818cf8','#a5b4fc','#c7d2fe'];

    const chartTypeMap = {
        'Bar Chart': 'bar', 'Horizontal Bar': 'bar', 'Stacked Bar': 'bar', 'Grouped Bar': 'bar',
        'Rounded Bar': 'bar', 'Gradient Bar': 'bar', 'Negative Bar': 'bar', 'Floating Bar': 'bar',
        'Line Chart': 'line', 'Area Chart': 'line', 'Multi-Line': 'line', 'Stepped Line': 'line',
        'Curved Line': 'line', 'Dashed Line': 'line', 'Point Line': 'line', 'Multi-Axis Line': 'line',
        'Pie Chart': 'pie', 'Doughnut Chart': 'doughnut', 'Semi Doughnut': 'doughnut',
        'Nested Doughnut': 'doughnut', 'Polar Area': 'polarArea', 'Rose Chart': 'polarArea',
        'Radar Chart': 'radar', 'Filled Radar': 'radar', 'Scatter Plot': 'scatter',
        'Bubble Chart': 'bubble', 'XY Scatter': 'scatter', 'Cluster Scatter': 'scatter',
        'Mixed Chart': 'bar', 'Combo Chart': 'bar', 'Bar-Line Combo': 'bar', 'Dual Axis': 'line',
        'Histogram': 'bar', 'Box Plot': 'bar', 'Waterfall Chart': 'bar', 'Pareto Chart': 'bar',
        'Bell Curve': 'line', 'Error Bar': 'bar',
        'Funnel Chart': 'bar', 'Pyramid Chart': 'bar', 'Sankey Diagram': 'bar', 'Sunburst': 'doughnut',
        'Gauge Chart': 'doughnut', 'Progress Bar': 'bar', 'KPI Card': 'bar', 'Speedometer': 'doughnut',
        'Heatmap': 'bar', 'Treemap': 'bar', 'Candlestick': 'bar', 'Timeline': 'bar',
    };

    // ==================== TABS ====================
    function gantiTab(tab) {
        ['tipe','data','gaya','opsi'].forEach(t => {
            document.getElementById('panel' + t.charAt(0).toUpperCase() + t.slice(1)).classList.toggle('hidden', t !== tab);
            document.getElementById('tab' + t.charAt(0).toUpperCase() + t.slice(1)).classList.toggle('aktif', t === tab);
        });
    }

    // ==================== TYPE SELECTOR ====================
    function pilihTipe(tipe) {
        tipeAktif = tipe;
        document.querySelectorAll('.tipe-card').forEach(c => c.classList.toggle('aktif', c.dataset.tipe === tipe));
        document.getElementById('tipeAktifBadge').textContent = tipe;
        perbaruiGrafik();
    }

    function filterTipe() {
        const q = document.getElementById('cariTipe').value.toLowerCase();
        let count = 0;
        document.querySelectorAll('.tipe-card').forEach(c => {
            const match = c.dataset.tipe.toLowerCase().includes(q);
            c.style.display = match ? '' : 'none';
            if (match) count++;
        });
        document.querySelectorAll('.kategori-group').forEach(g => {
            const visible = g.querySelectorAll('.tipe-card:not([style*="display: none"])').length;
            g.style.display = visible > 0 ? '' : 'none';
        });
        document.getElementById('hitungTipe').textContent = count + ' jenis';
    }

    // ==================== DATASETS ====================
    function tambahDataset() {
        const idx = datasets.length;
        const warna = paletAktif[idx % paletAktif.length];
        datasets.push({ label: 'Dataset ' + (idx + 1), data: '', warna: warna });
        renderDatasets();
    }

    function hapusDataset(idx) {
        datasets.splice(idx, 1);
        renderDatasets();
        perbaruiGrafik();
    }

    function renderDatasets() {
        const container = document.getElementById('datasetContainer');
        container.innerHTML = datasets.map((ds, i) => `
            <div class="dataset-block" style="border-color: ${ds.warna}">
                <div class="flex items-center justify-between mb-1">
                    <input type="text" value="${ds.label}" onchange="datasets[${i}].label=this.value; perbaruiGrafik()" class="input-sm text-xs flex-1 mr-2" placeholder="Nama dataset">
                    <input type="color" value="${ds.warna}" onchange="datasets[${i}].warna=this.value; this.closest('.dataset-block').style.borderColor=this.value; perbaruiGrafik()" class="w-6 h-6 rounded cursor-pointer bg-transparent border-0">
                    <button onclick="hapusDataset(${i})" class="text-red-400/50 hover:text-red-400 ml-2 text-xs"><i class="fas fa-times"></i></button>
                </div>
                <input type="text" value="${ds.data}" onchange="datasets[${i}].data=this.value; perbaruiGrafik()" class="input-sm text-xs" placeholder="10, 20, 30, 40, 50...">
            </div>
        `).join('');
    }

    // ==================== TEMPLATES ====================
    function pakaiTemplate(nama) {
        const templates = {
            siswa: {
                judul: 'Statistik Siswa per Kelas',
                labels: 'Kelas VII-A, Kelas VII-B, Kelas VIII-A, Kelas VIII-B, Kelas IX-A',
                datasets: [
                    { label: 'Laki-laki', data: '18, 15, 20, 17, 22', warna: '#3b82f6' },
                    { label: 'Perempuan', data: '16, 19, 14, 18, 13', warna: '#ec4899' },
                ]
            },
            nilai: {
                judul: 'Distribusi Nilai Semester',
                labels: 'A, B, C, D, E',
                datasets: [
                    { label: 'Jumlah Siswa', data: '12, 28, 35, 15, 5', warna: '#6366f1' },
                ]
            },
            kehadiran: {
                judul: 'Rekap Kehadiran Bulanan',
                labels: 'Jan, Feb, Mar, Apr, Mei, Jun',
                datasets: [
                    { label: 'Hadir', data: '92, 88, 95, 90, 87, 93', warna: '#22c55e' },
                    { label: 'Izin', data: '3, 5, 2, 4, 6, 3', warna: '#eab308' },
                    { label: 'Alpha', data: '5, 7, 3, 6, 7, 4', warna: '#ef4444' },
                ]
            },
            bulanan: {
                judul: 'Tren Pembelajaran Bulanan',
                labels: 'Jul, Agu, Sep, Okt, Nov, Des, Jan, Feb',
                datasets: [
                    { label: 'Materi Selesai', data: '5, 12, 18, 24, 30, 28, 35, 42', warna: '#8b5cf6' },
                    { label: 'Kuis Selesai', data: '3, 8, 14, 20, 25, 22, 30, 38', warna: '#06b6d4' },
                ]
            },
            perbandingan: {
                judul: 'Perbandingan Nilai Antar Mata Pelajaran',
                labels: 'Matematika, B.Indonesia, IPA, IPS, B.Inggris, Seni',
                datasets: [
                    { label: 'Rata-rata Kelas A', data: '85, 78, 82, 76, 80, 88', warna: '#6366f1' },
                    { label: 'Rata-rata Kelas B', data: '78, 82, 75, 80, 77, 85', warna: '#f97316' },
                ]
            },
            kosong: {
                judul: '',
                labels: '',
                datasets: []
            }
        };

        const t = templates[nama];
        document.getElementById('judulDiagram').value = t.judul;
        document.getElementById('labelInput').value = t.labels;
        datasets = t.datasets.map(d => ({...d}));
        renderDatasets();
        gantiTab('data');
        perbaruiGrafik();
    }

    // ==================== PALETTE ====================
    function pakaiPalet(nama) {
        const btn = document.querySelector(`.palet-btn[data-palet="${nama}"]`);
        if (btn) {
            paletAktif = btn.dataset.warna.split(',');
            datasets.forEach((ds, i) => { ds.warna = paletAktif[i % paletAktif.length]; });
            renderDatasets();
            perbaruiGrafik();
        }
    }

    // ==================== CHART RENDERING ====================
    function perbaruiGrafik() {
        const labels = (document.getElementById('labelInput').value || '').split(',').map(s => s.trim()).filter(Boolean);
        const chartType = chartTypeMap[tipeAktif] || 'bar';
        const opacity = parseInt(document.getElementById('fillOpacity').value) / 100;
        const borderW = parseInt(document.getElementById('borderWidth').value);
        const borderR = parseInt(document.getElementById('borderRadius').value);
        const tension = parseInt(document.getElementById('lineTension').value) / 100;
        const font = document.getElementById('fontFamily').value;

        // Update range labels
        document.getElementById('borderWidthVal').textContent = borderW + 'px';
        document.getElementById('borderRadiusVal').textContent = borderR + 'px';
        document.getElementById('fillOpacityVal').textContent = Math.round(opacity * 100) + '%';
        document.getElementById('lineTensionVal').textContent = tension.toFixed(2);

        const chartDatasets = datasets.map((ds, i) => {
            const values = (ds.data || '').split(',').map(s => parseFloat(s.trim())).filter(v => !isNaN(v));
            const baseColor = ds.warna || paletAktif[i % paletAktif.length];
            const rgba = hexToRgba(baseColor, opacity);
            const rgbaFull = hexToRgba(baseColor, 1);

            let dsObj = {
                label: ds.label || ('Dataset ' + (i + 1)),
                data: values,
                backgroundColor: ['pie','doughnut','polarArea'].includes(chartType) ? values.map((_, j) => hexToRgba(paletAktif[j % paletAktif.length], opacity)) : rgba,
                borderColor: ['pie','doughnut','polarArea'].includes(chartType) ? values.map((_, j) => hexToRgba(paletAktif[j % paletAktif.length], 1)) : rgbaFull,
                borderWidth: borderW,
                borderRadius: borderR,
                tension: tension,
                fill: document.getElementById('opsiFill').checked || tipeAktif === 'Area Chart',
                pointRadius: tipeAktif === 'Point Line' ? 6 : 3,
                pointHoverRadius: 7,
            };

            // Type-specific modifications
            if (tipeAktif === 'Stepped Line') dsObj.stepped = true;
            if (tipeAktif === 'Dashed Line') dsObj.borderDash = [8, 4];
            if (tipeAktif === 'Curved Line') dsObj.tension = 0.6;
            if (tipeAktif === 'Filled Radar') dsObj.fill = true;
            if (tipeAktif === 'Bell Curve') dsObj.tension = 0.5;

            // Bar-Line Combo: make second dataset a line
            if ((tipeAktif === 'Bar-Line Combo' || tipeAktif === 'Combo Chart' || tipeAktif === 'Pareto Chart') && i > 0) {
                dsObj.type = 'line';
                dsObj.fill = false;
                dsObj.borderWidth = 3;
            }

            return dsObj;
        });

        // Options
        const opsiLegend = document.getElementById('opsiLegend').checked;
        const opsiTitle = document.getElementById('opsiTitle').checked;
        const opsiGrid = document.getElementById('opsiGrid').checked;
        const opsiAnimasi = document.getElementById('opsiAnimasi').checked;
        const opsiStacked = document.getElementById('opsiStacked').checked || ['Stacked Bar'].includes(tipeAktif);
        const legendPos = document.getElementById('legendPos').value;
        const ar = parseFloat(document.getElementById('aspectRatio').value);
        const yMin = document.getElementById('yMin').value;
        const yMax = document.getElementById('yMax').value;
        const judul = document.getElementById('judulDiagram').value;

        const options = {
            responsive: true,
            maintainAspectRatio: ar > 0,
            aspectRatio: ar > 0 ? ar : undefined,
            animation: opsiAnimasi ? { duration: 800 } : false,
            plugins: {
                legend: {
                    display: opsiLegend,
                    position: legendPos,
                    labels: { color: '#9ca3af', font: { family: font, size: 12 }, padding: 16, usePointStyle: true }
                },
                title: {
                    display: opsiTitle && judul,
                    text: judul,
                    color: '#e2e8f0',
                    font: { family: font, size: 16, weight: 'bold' },
                    padding: { bottom: 16 }
                },
                tooltip: {
                    backgroundColor: 'rgba(15,23,42,0.95)',
                    titleColor: '#e2e8f0',
                    bodyColor: '#94a3b8',
                    borderColor: 'rgba(99,102,241,0.3)',
                    borderWidth: 1,
                    cornerRadius: 8,
                    padding: 12,
                    titleFont: { family: font },
                    bodyFont: { family: font },
                }
            },
            scales: {}
        };

        // Scales for cartesian charts
        if (!['pie','doughnut','polarArea','radar'].includes(chartType)) {
            options.scales = {
                x: {
                    display: true,
                    stacked: opsiStacked,
                    ticks: { color: '#6b7280', font: { family: font } },
                    grid: { color: opsiGrid ? 'rgba(107,114,128,0.1)' : 'transparent' }
                },
                y: {
                    display: true,
                    stacked: opsiStacked,
                    min: yMin ? parseFloat(yMin) : undefined,
                    max: yMax ? parseFloat(yMax) : undefined,
                    ticks: { color: '#6b7280', font: { family: font } },
                    grid: { color: opsiGrid ? 'rgba(107,114,128,0.1)' : 'transparent' }
                }
            };
        }

        // Type-specific options
        if (tipeAktif === 'Horizontal Bar') options.indexAxis = 'y';
        if (tipeAktif === 'Funnel Chart' || tipeAktif === 'Pyramid Chart') options.indexAxis = 'y';

        if (tipeAktif === 'Semi Doughnut') {
            options.circumference = 180;
            options.rotation = -90;
        }
        if (tipeAktif === 'Gauge Chart' || tipeAktif === 'Speedometer') {
            options.circumference = 270;
            options.rotation = -135;
            options.cutout = '70%';
        }

        // Destroy & recreate
        if (chartInstance) chartInstance.destroy();

        const ctx = document.getElementById('diagramCanvas').getContext('2d');
        chartInstance = new Chart(ctx, {
            type: chartType,
            data: { labels: labels, datasets: chartDatasets },
            options: options
        });

        // Update JSON editor
        const jsonData = { labels, datasets: datasets.map(ds => ({
            label: ds.label,
            data: (ds.data || '').split(',').map(s => parseFloat(s.trim())).filter(v => !isNaN(v)),
        }))};
        document.getElementById('jsonEditor').value = JSON.stringify(jsonData, null, 2);
        document.getElementById('jsonStatus').textContent = '✓ Valid JSON';
        document.getElementById('jsonStatus').className = 'text-green-500 text-[10px]';
    }

    // ==================== JSON EDITOR ====================
    function jsonKeGrafik() {
        try {
            const data = JSON.parse(document.getElementById('jsonEditor').value);
            document.getElementById('labelInput').value = (data.labels || []).join(', ');
            datasets = (data.datasets || []).map((ds, i) => ({
                label: ds.label || 'Dataset ' + (i + 1),
                data: (ds.data || []).join(', '),
                warna: paletAktif[i % paletAktif.length],
            }));
            renderDatasets();
            perbaruiGrafik();
            document.getElementById('jsonStatus').textContent = '✓ Valid JSON';
            document.getElementById('jsonStatus').className = 'text-green-500 text-[10px]';
        } catch (e) {
            document.getElementById('jsonStatus').textContent = '✗ Invalid JSON';
            document.getElementById('jsonStatus').className = 'text-red-400 text-[10px]';
        }
    }

    function formatJson() {
        try {
            const el = document.getElementById('jsonEditor');
            el.value = JSON.stringify(JSON.parse(el.value), null, 2);
        } catch (e) {}
    }

    // ==================== SAVE ====================
    function simpanDiagram() {
        const judul = document.getElementById('judulDiagram').value;
        if (!judul) { alert('Judul diagram harus diisi!'); gantiTab('data'); document.getElementById('judulDiagram').focus(); return; }

        const labels = document.getElementById('labelInput').value.split(',').map(s => s.trim()).filter(Boolean);
        const dataJson = JSON.stringify({
            labels,
            datasets: datasets.map(ds => ({
                label: ds.label,
                data: (ds.data || '').split(',').map(s => parseFloat(s.trim())).filter(v => !isNaN(v)),
            }))
        });

        const fd = new FormData();
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('judul', judul);
        fd.append('deskripsi', document.getElementById('deskripsiDiagram').value);
        fd.append('tipe_diagram', tipeAktif);
        fd.append('data_json', dataJson);
        if (editId) fd.append('id', editId);

        fetch("{{ route('laporan.simpan-builder') }}", { method: 'POST', body: fd })
            .then(r => r.json()).then(d => {
                if (d.sukses) {
                    editId = d.id;
                    alert(d.pesan || 'Diagram berhasil disimpan!');
                    if (d.redirect) window.location.href = d.redirect;
                } else {
                    alert(d.pesan || 'Gagal menyimpan.');
                }
            }).catch(() => alert('Gagal menyimpan diagram.'));
    }

    // ==================== LOAD / DUPLICATE / DELETE ====================
    function muatDiagram(id) {
        fetch(`/laporan/${id}/json`).then(r => r.json()).then(d => {
            editId = d.id;
            document.getElementById('judulDiagram').value = d.judul;
            document.getElementById('deskripsiDiagram').value = d.deskripsi || '';
            pilihTipe(d.tipe_diagram);
            const data = JSON.parse(d.data_json || '{}');
            document.getElementById('labelInput').value = (data.labels || []).join(', ');
            datasets = (data.datasets || []).map((ds, i) => ({
                label: ds.label || 'Dataset ' + (i + 1),
                data: (ds.data || []).join(', '),
                warna: paletAktif[i % paletAktif.length],
            }));
            renderDatasets();
            gantiTab('data');
            perbaruiGrafik();
        });
    }

    function duplikatDiagram(id) {
        muatDiagram(id);
        editId = null;
        setTimeout(() => {
            document.getElementById('judulDiagram').value += ' (Salinan)';
        }, 500);
    }

    function hapusDiagram(id) {
        if (!confirm('Hapus diagram ini?')) return;
        fetch(`/laporan/${id}`, {
            method: 'DELETE',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' }
        }).then(r => r.json()).then(d => {
            alert(d.pesan || 'Dihapus!');
            location.reload();
        });
    }

    // ==================== EXPORT IMAGE ====================
    function eksporGambar(format) {
        const canvas = document.getElementById('diagramCanvas');
        const link = document.createElement('a');
        link.download = (document.getElementById('judulDiagram').value || 'diagram') + '.' + format;
        if (format === 'jpg') {
            // Need white background for JPEG
            const tempCanvas = document.createElement('canvas');
            tempCanvas.width = canvas.width;
            tempCanvas.height = canvas.height;
            const ctx = tempCanvas.getContext('2d');
            ctx.fillStyle = '#0f172a';
            ctx.fillRect(0, 0, tempCanvas.width, tempCanvas.height);
            ctx.drawImage(canvas, 0, 0);
            link.href = tempCanvas.toDataURL('image/jpeg', 0.95);
        } else {
            link.href = canvas.toDataURL('image/png');
        }
        link.click();
    }

    // ==================== FULLSCREEN ====================
    function toggleFullscreen() {
        const el = document.getElementById('previewContainer');
        if (!document.fullscreenElement) {
            el.requestFullscreen().catch(() => {});
        } else {
            document.exitFullscreen();
        }
    }

    // ==================== UTILITY ====================
    function hexToRgba(hex, alpha) {
        hex = hex.replace('#', '');
        if (hex.length === 3) hex = hex.split('').map(c => c + c).join('');
        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);
        return `rgba(${r},${g},${b},${alpha})`;
    }

    // ==================== INIT ====================
    document.addEventListener('DOMContentLoaded', function() {
        @if(isset($laporan) && $laporan->id)
            // Load existing diagram for editing
            editId = {{ $laporan->id }};
            document.getElementById('judulDiagram').value = @json($laporan->judul);
            document.getElementById('deskripsiDiagram').value = @json($laporan->deskripsi ?? '');
            pilihTipe(@json($laporan->tipe_diagram));
            const existingData = @json(json_decode($laporan->data_json, true) ?? []);
            document.getElementById('labelInput').value = (existingData.labels || []).join(', ');
            datasets = (existingData.datasets || []).map((ds, i) => ({
                label: ds.label || 'Dataset ' + (i + 1),
                data: (ds.data || []).join(', '),
                warna: paletAktif[i % paletAktif.length],
            }));
            renderDatasets();
            gantiTab('data');
        @else
            // Default template
            pakaiTemplate('siswa');
            pilihTipe('Bar Chart');
        @endif
        perbaruiGrafik();
    });
</script>
@endpush
