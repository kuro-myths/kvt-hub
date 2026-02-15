@extends('tata-letak.utama')
@section('judul', 'Laporan Akademik - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-file-alt text-orange-400 mr-2"></i>Laporan Akademik</h1>
            <a href="{{ route('admin.laporan-akademik.buat') }}" class="mt-3 md:mt-0 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg inline-block">
                <i class="fas fa-plus mr-1"></i>Generate Laporan Baru
            </a>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="space-y-3">
            @forelse($laporan as $lap)
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                    <div>
                        <h3 class="text-white font-semibold">{{ $lap->judul }}</h3>
                        <p class="text-xs text-gray-500 mt-1">
                            {{ ucfirst(str_replace('_', ' ', $lap->tipe)) }} •
                            {{ $lap->kurikulum->nama ?? 'Semua' }} •
                            Oleh {{ $lap->pembuat->name ?? '-' }} •
                            {{ $lap->created_at->format('d M Y H:i') }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.laporan-akademik.tampilkan', $lap) }}" class="bg-kvt-800/50 text-gray-300 px-4 py-2 rounded-lg text-xs font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">
                            <i class="fas fa-eye mr-1"></i>Lihat
                        </a>
                        <a href="{{ route('admin.laporan-akademik.export', $lap) }}" class="bg-green-500/10 text-green-400 px-4 py-2 rounded-lg text-xs font-semibold hover:bg-green-500/20 transition">
                            <i class="fas fa-download mr-1"></i>Export CSV
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="kaca rounded-xl p-12 text-center border border-kvt-700/20">
                <i class="fas fa-file-alt text-5xl text-gray-600 mb-4"></i>
                <p class="text-gray-500 mb-4">Belum ada laporan. Generate laporan pertama Anda.</p>
                <a href="{{ route('admin.laporan-akademik.buat') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2 rounded-xl text-sm font-semibold">
                    <i class="fas fa-plus mr-1"></i>Generate Laporan
                </a>
            </div>
            @endforelse
        </div>

        <div class="mt-6">{{ $laporan->links() }}</div>
    </div>
</div>
@endsection
