@extends('tata-letak.utama')
@section('judul', $kelas->nama . ' - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-5xl mx-auto">
        {{-- Header Kelas --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden mb-8" data-aos="fade-up">
            <div class="h-48 bg-gradient-to-r from-kvt-700 to-kvt-500 flex items-center justify-center">
                <i class="fas fa-graduation-cap text-7xl text-white/30"></i>
            </div>
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <h1 class="text-3xl font-black text-white">{{ $kelas->nama }}</h1>
                        <p class="text-gray-400 mt-1">{{ $kelas->deskripsi }}</p>
                        <div class="flex items-center gap-4 mt-3 text-sm text-gray-500">
                            <span><i class="fas fa-user mr-1"></i>{{ $kelas->guru->name ?? '-' }}</span>
                            <span><i class="fas fa-users mr-1"></i>{{ $kelas->anggota->count() }} siswa</span>
                            <span><i class="fas fa-book mr-1"></i>{{ $kelas->materi->count() }} materi</span>
                            <span class="bg-kvt-500/20 text-kvt-400 px-2 py-1 rounded">{{ $kelas->kode_kelas }}</span>
                        </div>
                    </div>
                    @auth
                        @if(!$sudahGabung && auth()->user()->adalahSiswa())
                            <form method="POST" action="{{ route('kelas.gabung', $kelas) }}">
                                @csrf
                                <button type="submit" class="bg-kvt-500 hover:bg-kvt-600 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg">
                                    <i class="fas fa-door-open mr-2"></i>Gabung Kelas
                                </button>
                            </form>
                        @elseif($sudahGabung)
                            <span class="bg-green-500/20 text-green-400 px-4 py-2 rounded-xl text-sm font-semibold">
                                <i class="fas fa-check mr-1"></i>Sudah Bergabung
                            </span>
                        @endif
                        @if(auth()->user()->adalahGuru() && $kelas->guru_id === auth()->id())
                            <a href="{{ route('materi.buat', ['kelas_id' => $kelas->id]) }}" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-semibold transition">
                                <i class="fas fa-plus mr-2"></i>Tambah Materi
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        {{-- Daftar Materi --}}
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-6"><i class="fas fa-book-open text-kvt-400 mr-2"></i>Materi Pembelajaran</h2>
            <div class="space-y-3">
                @forelse($kelas->materi as $i => $materi)
                    <a href="{{ route('materi.tampilkan', $materi) }}" class="flex items-center gap-4 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl p-4 transition group">
                        <div class="w-10 h-10 bg-kvt-700/50 group-hover:bg-kvt-500 rounded-lg flex items-center justify-center transition">
                            @if($materi->tipe === 'video')
                                <i class="fas fa-play text-kvt-400 group-hover:text-white"></i>
                            @elseif($materi->tipe === 'quiz')
                                <i class="fas fa-question text-purple-400 group-hover:text-white"></i>
                            @else
                                <i class="fas fa-file-alt text-green-400 group-hover:text-white"></i>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h3 class="text-white font-semibold group-hover:text-kvt-400 transition">{{ $materi->judul }}</h3>
                            <p class="text-gray-500 text-xs">{{ ucfirst($materi->tipe) }} • {{ $materi->durasi_menit }} menit • +{{ $materi->xp_reward }} XP</p>
                        </div>
                        @if($materi->eksklusif)
                            <span class="bg-yellow-500/20 text-yellow-400 text-xs px-2 py-1 rounded-full"><i class="fas fa-crown mr-1"></i>Eksklusif</span>
                        @endif
                        <i class="fas fa-chevron-right text-gray-600 group-hover:text-kvt-400 transition"></i>
                    </a>
                @empty
                    <div class="text-center py-12">
                        <i class="fas fa-book text-5xl text-gray-700 mb-4"></i>
                        <p class="text-gray-500">Belum ada materi di kelas ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
