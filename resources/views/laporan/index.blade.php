@extends('tata-letak.utama')
@section('judul', 'Laporan & Diagram - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-right">
            <div>
                <h1 class="text-2xl font-black text-white"><i class="fas fa-chart-bar mr-3 text-kvt-400"></i>Laporan & Diagram</h1>
                <p class="text-gray-400 text-sm mt-1">Visualisasi data pembelajaran dengan 30 jenis diagram</p>
            </div>
            @if(auth()->user()->peran !== 'siswa')
                <a href="{{ route('laporan.buat') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-5 py-2.5 rounded-xl font-bold transition shadow-lg text-sm">
                    <i class="fas fa-plus mr-2"></i>Buat Laporan
                </a>
            @endif
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-chart-pie mr-2 text-kvt-400"></i>30 Jenis Diagram Tersedia</h2>
            <div class="flex flex-wrap gap-2">
                @php
                    $tipeDiagram = \App\Models\Laporan::tipeDiagram();
                @endphp
                @foreach($tipeDiagram as $tipe)
                    <span class="bg-kvt-800/50 text-gray-400 text-xs px-3 py-1.5 rounded-lg border border-kvt-700/20">{{ $tipe }}</span>
                @endforeach
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @forelse($laporanList as $laporan)
                <a href="{{ route('laporan.tampilkan', $laporan) }}" class="bg-kvt-900/80 border border-kvt-700/30 hover:border-kvt-500/30 rounded-2xl p-6 transition group" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-kvt-500/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-chart-line text-kvt-400"></i>
                        </div>
                        <span class="text-xs bg-kvt-800/50 text-gray-400 px-2 py-1 rounded-lg">{{ $laporan->tipe_diagram }}</span>
                    </div>
                    <h3 class="text-white font-bold group-hover:text-kvt-400 transition">{{ $laporan->judul }}</h3>
                    @if($laporan->deskripsi)
                        <p class="text-gray-500 text-sm mt-2">{{ Str::limit($laporan->deskripsi, 80) }}</p>
                    @endif
                    <div class="flex items-center gap-2 mt-3 text-gray-600 text-xs">
                        <span>{{ $laporan->pembuat->name }}</span>
                        <span>•</span>
                        <span>{{ $laporan->created_at->diffForHumans() }}</span>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-chart-bar text-gray-700 text-5xl mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada laporan.</p>
                    <p class="text-gray-600 text-sm mt-1">Buat laporan pertama untuk mulai memvisualisasi data.</p>
                </div>
            @endforelse
        </div>

        @if($laporanList->hasPages())
            <div class="mt-8">
                {{ $laporanList->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
