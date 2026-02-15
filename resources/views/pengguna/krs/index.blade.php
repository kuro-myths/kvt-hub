@extends('tata-letak.utama')
@section('judul', 'KRS Saya - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white"><i class="fas fa-book-open text-kvt-400 mr-2"></i>KRS Saya</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola Kartu Rencana Studi untuk setiap jenjang pendidikan</p>
            </div>
            <div class="flex gap-2 mt-4 md:mt-0">
                <a href="{{ route('pengguna.krs.pilih-jenjang') }}" class="bg-kvt-800/50 text-gray-300 px-4 py-2 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">
                    <i class="fas fa-plus mr-1"></i>Daftar Jenjang Baru
                </a>
            </div>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        {{-- Jenjang Aktif --}}
        <div class="mb-8">
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-graduation-cap text-green-400 mr-2"></i>Jenjang Pendidikan Aktif</h2>
            @if($jenjangAktif->isEmpty())
                <div class="kaca rounded-xl p-8 text-center border border-kvt-700/20">
                    <i class="fas fa-graduation-cap text-4xl text-gray-600 mb-3"></i>
                    <p class="text-gray-400 mb-4">Belum terdaftar di jenjang pendidikan manapun.</p>
                    <a href="{{ route('pengguna.krs.pilih-jenjang') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition">
                        <i class="fas fa-plus mr-1"></i>Pilih Jenjang Pendidikan
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($jenjangAktif as $jp)
                    <div class="kaca rounded-xl p-5 border border-kvt-700/20 card-hover">
                        <div class="flex justify-between items-start mb-3">
                            <div class="bg-kvt-500/10 text-kvt-400 text-xs font-semibold px-3 py-1 rounded-full uppercase">
                                {{ str_replace('_', ' ', $jp->kurikulum->jenjang ?? '-') }}
                            </div>
                            <span class="text-xs text-gray-500">Semester {{ $jp->semester_aktif }}</span>
                        </div>
                        <h3 class="text-white font-semibold text-sm mb-1">{{ $jp->kurikulum->nama ?? '-' }}</h3>
                        @if($jp->jurusan)
                        <p class="text-xs text-gray-500">Jurusan: {{ $jp->jurusan }}</p>
                        @endif
                        <a href="{{ route('pengguna.krs.buat', ['jenjang_id' => $jp->id]) }}" class="mt-3 inline-block text-sm text-kvt-400 hover:text-kvt-300 font-semibold">
                            <i class="fas fa-edit mr-1"></i>Buat KRS Semester Ini →
                        </a>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Daftar KRS --}}
        <div>
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-list text-purple-400 mr-2"></i>Riwayat KRS</h2>
            @if($krsAktif->isEmpty())
                <div class="kaca rounded-xl p-8 text-center border border-kvt-700/20">
                    <p class="text-gray-400">Belum ada KRS yang diajukan.</p>
                </div>
            @else
                <div class="space-y-3">
                    @foreach($krsAktif as $krs)
                    <div class="kaca rounded-xl p-5 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                            <div>
                                <h3 class="text-white font-semibold text-sm">{{ $krs->kurikulum->nama ?? '-' }}</h3>
                                <p class="text-xs text-gray-500 mt-1">
                                    Semester {{ $krs->semester }} • {{ $krs->tahun_ajaran }} •
                                    {{ $krs->total_sks ?? 0 }} SKS • {{ $krs->detail->count() }} Mata Pelajaran
                                </p>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-xs font-semibold px-3 py-1 rounded-full
                                    {{ $krs->status === 'disetujui' ? 'bg-green-500/10 text-green-400' : '' }}
                                    {{ $krs->status === 'diajukan' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                                    {{ $krs->status === 'ditolak' ? 'bg-red-500/10 text-red-400' : '' }}
                                    {{ $krs->status === 'revisi' ? 'bg-orange-500/10 text-orange-400' : '' }}
                                ">
                                    {{ ucfirst($krs->status) }}
                                </span>
                                <a href="{{ route('pengguna.krs.tampilkan', $krs) }}" class="text-kvt-400 text-xs hover:underline">Detail →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
