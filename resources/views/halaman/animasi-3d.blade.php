@extends('tata-letak.utama')

@section('judul', 'Animasi 3D - KVT Hub')

@section('konten')

{{-- HERO --}}
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-950/20 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <div class="inline-flex items-center bg-orange-500/10 border border-orange-500/20 rounded-full px-4 py-1.5 mb-6" data-aos="fade-down">
            <i class="fas fa-cube text-orange-400 mr-2"></i>
            <span class="text-orange-300 text-sm font-bold">KVT Hub Ekosistem</span>
        </div>
        <h1 class="text-5xl lg:text-6xl font-black text-white mb-6" data-aos="zoom-in">
            <span class="bg-gradient-to-r from-orange-400 to-orange-300 bg-clip-text text-transparent">Animasi 3D</span>
        </h1>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto" data-aos="fade-up">
            Program animasi 3D, motion graphics, dan visual effects.
        </p>
    </div>
</section>

{{-- KONTEN UTAMA --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-black text-white mb-4">Tentang Animasi 3D</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Program animasi 3D, motion graphics, dan visual effects.</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="kaca rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-book text-orange-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Materi Lengkap</h3>
                <p class="text-gray-400 text-sm">Kurikulum terstruktur dari dasar hingga mahir dengan bimbingan mentor profesional.</p>
            </div>
            <div class="kaca rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-users text-orange-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Komunitas Aktif</h3>
                <p class="text-gray-400 text-sm">Bergabung dengan komunitas pelajar dan profesional aktif di bidang ini.</p>
            </div>
            <div class="kaca rounded-2xl p-8 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="w-16 h-16 rounded-2xl bg-orange-500/10 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-certificate text-orange-400 text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Sertifikasi</h3>
                <p class="text-gray-400 text-sm">Raih sertifikat kompetensi yang diakui industri setelah menyelesaikan program.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="kaca rounded-3xl p-12" data-aos="zoom-in">
            <i class="fas fa-cube text-5xl text-orange-400 mb-6"></i>
            <h2 class="text-3xl font-black text-white mb-4">Mulai Belajar Animasi 3D</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftar sekarang dan mulai perjalanan Anda di bidang Animasi 3D bersama KVT Hub.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-kvt-500 to-ungu-600 text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg hover:shadow-kvt-500/25 transition-all">
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </a>
                <a href="{{ route('beranda') }}" class="inline-flex items-center gap-2 border border-kvt-500/30 text-kvt-300 px-8 py-3 rounded-xl font-bold hover:bg-kvt-500/10 transition-all">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
