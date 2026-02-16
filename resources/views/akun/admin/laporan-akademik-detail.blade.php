@extends('tata-letak.dasbor')
@section('judul', $laporan->judul . ' - Admin KVT Hub')
@section('judul-halaman', 'Detail Laporan')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
        <div>
            <a href="{{ route('admin.laporan-akademik.index') }}" class="text-kvt-400 hover:text-white text-sm transition mb-2 inline-block"><i class="fas fa-arrow-left mr-1"></i> Kembali ke Daftar</a>
            <h2 class="text-xl font-bold text-white">{{ $laporan->judul }}</h2>
            @if($laporan->deskripsi)<p class="text-gray-400 text-sm mt-1">{{ $laporan->deskripsi }}</p>@endif
        </div>
        <div class="flex items-center gap-2">
            @php $tipeBadge = match($laporan->tipe) {
                'rekap_nilai'=>['blue','Rekap Nilai','fas fa-star'],
                'statistik_krs'=>['purple','Statistik KRS','fas fa-clipboard-list'],
                'performa_mahasiswa'=>['yellow','Performa','fas fa-user-graduate'],
                'distribusi_ipk'=>['green','Distribusi IPK','fas fa-chart-pie'],
                default=>['gray',$laporan->tipe,'fas fa-file']
            }; @endphp
            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-{{ $tipeBadge[0] }}-500/20 text-{{ $tipeBadge[0] }}-400">
                <i class="{{ $tipeBadge[2] }}"></i>{{ $tipeBadge[1] }}
            </span>
            <span class="px-3 py-1 rounded-full text-sm font-medium {{ $laporan->status === 'selesai' ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }}">{{ ucfirst($laporan->status) }}</span>
        </div>
    </div>

    {{-- Info Meta --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <p class="text-xs text-gray-500 mb-1">Kurikulum</p>
            <p class="text-white font-semibold text-sm">{{ $laporan->kurikulum?->nama ?? 'Semua' }}</p>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <p class="text-xs text-gray-500 mb-1">Dibuat Oleh</p>
            <p class="text-white font-semibold text-sm">{{ $laporan->pembuat?->name ?? '-' }}</p>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <p class="text-xs text-gray-500 mb-1">Tanggal Generate</p>
            <p class="text-white font-semibold text-sm">{{ $laporan->created_at->format('d M Y H:i') }}</p>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <p class="text-xs text-gray-500 mb-1">Format</p>
            <p class="text-white font-semibold text-sm">{{ strtoupper($laporan->format ?? 'JSON') }}</p>
        </div>
    </div>

    @php $data = $laporan->data ?? []; @endphp

    {{-- Content based on tipe --}}
    @if($laporan->tipe === 'rekap_nilai')
        {{-- Stats cards --}}
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 mb-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-kvt-400">{{ $data['total_data'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Data</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-blue-400">{{ $data['rata_rata'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Rata-rata</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-400">{{ $data['tertinggi'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Tertinggi</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-red-400">{{ $data['terendah'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Terendah</p>
            </div>
        </div>

        {{-- Distribution chart --}}
        @if(!empty($data['distribusi']))
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                <h4 class="text-sm font-semibold text-white mb-4"><i class="fas fa-chart-bar mr-2 text-kvt-400"></i>Distribusi Nilai</h4>
                <div class="space-y-2">
                    @php $maxDist = max(array_values($data['distribusi'])) ?: 1; @endphp
                    @foreach($data['distribusi'] as $huruf => $jumlah)
                    <div class="flex items-center gap-3">
                        <span class="w-8 text-right text-sm font-bold text-gray-300">{{ $huruf }}</span>
                        <div class="flex-1 bg-kvt-800/50 rounded-full h-6 overflow-hidden">
                            <div class="h-full bg-kvt-500/50 rounded-full flex items-center pl-2 text-xs text-white font-medium" style="width: {{ ($jumlah/$maxDist)*100 }}%; min-width: 2rem;">{{ $jumlah }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Detail table --}}
            @if(!empty($data['detail']))
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
                <div class="p-4 border-b border-kvt-700/30">
                    <h4 class="text-sm font-semibold text-white"><i class="fas fa-list mr-2 text-kvt-400"></i>Detail Nilai ({{ count($data['detail']) }} record)</h4>
                </div>
                <div class="overflow-y-auto max-h-80">
                    <table class="w-full text-xs">
                        <thead class="sticky top-0 bg-kvt-900"><tr class="border-b border-kvt-700/30">
                            <th class="text-left text-gray-400 px-3 py-2">Mahasiswa</th>
                            <th class="text-left text-gray-400 px-3 py-2">Mata Pelajaran</th>
                            <th class="text-center text-gray-400 px-3 py-2">Nilai</th>
                            <th class="text-center text-gray-400 px-3 py-2">Huruf</th>
                        </tr></thead>
                        <tbody>
                        @foreach($data['detail'] as $d)
                        <tr class="border-b border-kvt-700/10"><td class="px-3 py-2 text-gray-300">{{ $d['mahasiswa'] }}</td><td class="px-3 py-2 text-gray-400">{{ $d['mata_pelajaran'] }}</td><td class="px-3 py-2 text-center text-white font-medium">{{ $d['nilai_akhir'] }}</td><td class="px-3 py-2 text-center text-gray-300">{{ $d['huruf'] }}</td></tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @endif

    @elseif($laporan->tipe === 'statistik_krs')
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-kvt-400">{{ $data['total_krs'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total KRS</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-blue-400">{{ $data['rata_sks'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Rata-rata SKS</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-green-400">{{ count($data['per_semester'] ?? []) }}</p>
                <p class="text-xs text-gray-500 mt-1">Semester Aktif</p>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-6">
            @if(!empty($data['per_status']))
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                <h4 class="text-sm font-semibold text-white mb-4"><i class="fas fa-chart-pie mr-2 text-kvt-400"></i>Per Status</h4>
                <div class="space-y-3">
                    @foreach($data['per_status'] as $status => $count)
                    @php $sc = match($status) { 'disetujui'=>'green','menunggu'=>'yellow','ditolak'=>'red', default=>'gray'}; @endphp
                    <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3">
                        <span class="text-sm text-{{ $sc }}-400 font-medium capitalize">{{ $status }}</span>
                        <span class="text-lg font-bold text-white">{{ $count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if(!empty($data['per_semester']))
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5">
                <h4 class="text-sm font-semibold text-white mb-4"><i class="fas fa-calendar mr-2 text-kvt-400"></i>Per Semester</h4>
                <div class="space-y-2">
                    @php $maxSem = max(array_values($data['per_semester'])) ?: 1; @endphp
                    @foreach($data['per_semester'] as $sem => $count)
                    <div class="flex items-center gap-3">
                        <span class="w-20 text-sm text-gray-400">Sem {{ $sem }}</span>
                        <div class="flex-1 bg-kvt-800/50 rounded-full h-5 overflow-hidden">
                            <div class="h-full bg-purple-500/50 rounded-full flex items-center pl-2 text-xs text-white" style="width: {{ ($count/$maxSem)*100 }}%; min-width: 2rem;">{{ $count }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

    @elseif($laporan->tipe === 'performa_mahasiswa')
        <div class="grid grid-cols-1 gap-3 mb-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-kvt-400">{{ $data['total_mahasiswa'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Mahasiswa</p>
            </div>
        </div>
        @if(!empty($data['detail']))
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden mb-6">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead><tr class="border-b border-kvt-700/30">
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Nama</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Level</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">KRS</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">IPK</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Rata Nilai</th>
                    </tr></thead>
                    <tbody>
                    @foreach($data['detail'] as $i => $d)
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30">
                        <td class="px-4 py-2 text-gray-500">{{ $i+1 }}</td>
                        <td class="px-4 py-2 text-white font-medium">{{ $d['nama'] }}</td>
                        <td class="px-4 py-2 text-center text-kvt-400 font-semibold">{{ $d['level'] ?? 0 }}</td>
                        <td class="px-4 py-2 text-center text-gray-300">{{ $d['total_krs'] }}</td>
                        <td class="px-4 py-2 text-center"><span class="font-bold {{ ($d['ipk'] ?? 0) >= 3.5 ? 'text-green-400' : (($d['ipk'] ?? 0) >= 2.5 ? 'text-blue-400' : 'text-red-400') }}">{{ $d['ipk'] }}</span></td>
                        <td class="px-4 py-2 text-center text-gray-300">{{ $d['rata_nilai'] }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    @elseif($laporan->tipe === 'distribusi_ipk')
        <div class="grid grid-cols-2 gap-3 mb-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-kvt-400">{{ $data['total'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Total Mahasiswa</p>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
                <p class="text-2xl font-bold text-blue-400">{{ $data['rata_ipk'] ?? 0 }}</p>
                <p class="text-xs text-gray-500 mt-1">Rata-rata IPK</p>
            </div>
        </div>
        @if(!empty($data['distribusi']))
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5 mb-6">
            <h4 class="text-sm font-semibold text-white mb-4"><i class="fas fa-chart-bar mr-2 text-kvt-400"></i>Distribusi Predikat</h4>
            <div class="grid grid-cols-1 sm:grid-cols-5 gap-3">
                @php
                $predikat = [
                    'cumlaude' => ['Cum Laude','≥ 3.50','green','fas fa-trophy'],
                    'sangat_memuaskan' => ['Sangat Memuaskan','3.00–3.49','blue','fas fa-medal'],
                    'memuaskan' => ['Memuaskan','2.50–2.99','yellow','fas fa-thumbs-up'],
                    'cukup' => ['Cukup','2.00–2.49','orange','fas fa-minus-circle'],
                    'kurang' => ['Kurang','< 2.00','red','fas fa-exclamation-circle'],
                ];
                @endphp
                @foreach($predikat as $key => [$label, $range, $color, $icon])
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center border border-{{ $color }}-500/20">
                    <i class="{{ $icon }} text-{{ $color }}-400 text-xl mb-2"></i>
                    <p class="text-2xl font-bold text-{{ $color }}-400">{{ $data['distribusi'][$key] ?? 0 }}</p>
                    <p class="text-xs text-white font-medium mt-1">{{ $label }}</p>
                    <p class="text-xs text-gray-500">{{ $range }}</p>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @endif

    {{-- Raw data fallback --}}
    @if(empty($data))
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 text-center">
        <i class="fas fa-database text-3xl text-gray-600 mb-3"></i>
        <p class="text-gray-400">Data laporan kosong atau belum tersedia.</p>
    </div>
    @endif
</div>
@endsection
