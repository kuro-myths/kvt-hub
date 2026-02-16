@extends('tata-letak.utama')
@section('judul', 'Platform - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(51,153,255,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-laptop-code"></i> Platform
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Platform </span><span class="teks-gradien">KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Ekosistem pembelajaran digital terintegrasi dengan fitur-fitur canggih untuk mendukung proses belajar mengajar.
        </p>
    </div>
</section>

{{-- Fitur --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Fitur Utama</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Semua yang Anda butuhkan untuk pembelajaran modern</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($fitur as $i => $f)
            <div class="kaca rounded-2xl p-6 border-kvt-500/20 hover:border-kvt-500/40 transition text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="{{ $f['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $f['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="kaca rounded-2xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
        <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai?</h2>
        <p class="text-gray-400 mb-8 max-w-lg mx-auto">Bergabung dengan ribuan pelajar dan pengajar yang sudah menggunakan KVT Hub.</p>
        <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
            <i class="fas fa-rocket mr-2"></i>Daftar Gratis
        </a>
    </div>
</section>
@endsection
