@extends('tata-letak.dasbor')

@section('judul', 'Detail Pengguna - KVT Hub')
@section('judul-halaman', 'Detail Pengguna')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="mb-6" data-aos="fade-up">
            <a href="{{ route('staff.pengguna.index') }}" class="text-gray-400 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Pengguna
            </a>
        </div>

        {{-- Profile Header --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-6" data-aos="fade-up">
            <div class="flex items-center gap-6">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-3xl font-black text-white shadow-lg">
                    {{ strtoupper(substr($pengguna->name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-black text-white">{{ $pengguna->name }}</h1>
                    <p class="text-gray-400 text-sm">{{ $pengguna->email }}</p>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">{{ ucfirst($pengguna->peran) }}</span>
                        @if($pengguna->level)
                        <span class="bg-amber-500/20 text-amber-400 text-xs px-3 py-1 rounded-full font-semibold">Lv.{{ $pengguna->level }} &middot; {{ $pengguna->xp }} XP</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Kelas yang Diikuti --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-book-open text-kvt-400 mr-2"></i>Kelas yang Diikuti</h2>
                <div class="space-y-3">
                    @forelse($pengguna->kelasYangDiikuti ?? [] as $kls)
                        <div class="bg-kvt-800/30 rounded-xl p-4">
                            <p class="text-white font-semibold text-sm">{{ $kls->nama }}</p>
                            <p class="text-gray-500 text-xs mt-1">{{ $kls->kategori ?? '-' }}</p>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Belum mengikuti kelas apapun.</p>
                    @endforelse
                </div>
            </div>

            {{-- Info Akademik --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-graduation-cap text-green-400 mr-2"></i>Info Akademik</h2>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">KRS Aktif</span>
                        <span class="text-white font-semibold">{{ $pengguna->krs?->count() ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">Total Nilai</span>
                        <span class="text-white font-semibold">{{ $pengguna->nilai?->count() ?? 0 }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-400 text-sm">Bergabung</span>
                        <span class="text-white font-semibold">{{ $pengguna->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
