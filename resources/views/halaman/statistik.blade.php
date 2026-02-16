@extends('tata-letak.utama')
@section('judul', 'Statistik - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[50vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-chart-pie"></i> Statistik
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Statistik </span><span class="teks-gradien">Platform</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Data real-time tentang pertumbuhan dan aktivitas KVT Hub.
        </p>
    </div>
</section>

{{-- Stats --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    @php
        $stats = [
            ['label' => 'Total Pengguna', 'nilai' => \App\Models\User::count(), 'ikon' => 'fa-users', 'warna' => 'from-kvt-400 to-kvt-600'],
            ['label' => 'Kelas Aktif', 'nilai' => \App\Models\Kelas::where('status', 'aktif')->count(), 'ikon' => 'fa-school', 'warna' => 'from-green-400 to-green-600'],
            ['label' => 'Materi Terbit', 'nilai' => \App\Models\Materi::where('status', 'terbit')->count(), 'ikon' => 'fa-book', 'warna' => 'from-purple-400 to-purple-600'],
            ['label' => 'Pengunjung Total', 'nilai' => \App\Models\Pengunjung::totalSemua(), 'ikon' => 'fa-chart-line', 'warna' => 'from-amber-400 to-amber-600'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        @foreach($stats as $i => $s)
            <div class="kaca rounded-2xl p-8 border-kvt-500/20 text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-gradient-to-br {{ $s['warna'] }} rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas {{ $s['ikon'] }} text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-black text-white mb-1">{{ number_format($s['nilai']) }}</div>
                <div class="text-gray-400 text-sm">{{ $s['label'] }}</div>
            </div>
        @endforeach
    </div>

    {{-- Info --}}
    <div class="kaca rounded-2xl p-8 border-kvt-500/20 text-center" data-aos="zoom-in">
        <i class="fas fa-chart-bar text-5xl text-kvt-400 mb-4"></i>
        <h2 class="text-2xl font-bold text-white mb-3">Dashboard Analytics</h2>
        <p class="text-gray-400 max-w-lg mx-auto mb-6">Analytics lengkap tersedia di dashboard setelah Anda login. Pantau perkembangan belajar dan aktivitas Anda secara real-time.</p>
        <a href="{{ route('masuk') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-3 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg inline-block">
            <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Detail
        </a>
    </div>
</section>
@endsection
