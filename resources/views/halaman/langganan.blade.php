@extends('tata-letak.utama')
@section('judul', 'Langganan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[50vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-crown"></i> Langganan
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Paket </span><span class="teks-gradien">Langganan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Pilih paket yang sesuai dengan kebutuhan pembelajaran Anda.
        </p>
    </div>
</section>

{{-- Paket --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
            $paket = [
                ['nama' => 'Gratis', 'harga' => '0', 'fitur' => ['Akses kelas dasar', 'Materi terbatas', 'Kuis dasar', 'Komunitas'], 'warna' => 'gray', 'populer' => false],
                ['nama' => 'Premium', 'harga' => '99.000', 'fitur' => ['Semua kelas', 'Materi lengkap', 'Kuis & Sertifikasi', 'Laporan detail', 'Prioritas support'], 'warna' => 'kvt', 'populer' => true],
                ['nama' => 'Enterprise', 'harga' => 'Custom', 'fitur' => ['Semua fitur Premium', 'API akses', 'Custom branding', 'Dedicated support', 'SLA 99.9%'], 'warna' => 'ungu', 'populer' => false],
            ];
        @endphp

        @foreach($paket as $i => $p)
            <div class="relative kaca rounded-2xl p-8 border-{{ $p['warna'] }}-500/{{ $p['populer'] ? '40' : '20' }} hover:border-{{ $p['warna'] }}-500/60 transition {{ $p['populer'] ? 'ring-2 ring-kvt-500/30' : '' }}" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                @if($p['populer'])
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white text-xs font-bold px-4 py-1 rounded-full">Populer</div>
                @endif
                <h3 class="text-white font-bold text-xl mb-2">{{ $p['nama'] }}</h3>
                <div class="mb-6">
                    <span class="text-3xl font-black text-white">Rp {{ $p['harga'] }}</span>
                    @if($p['harga'] !== 'Custom')
                        <span class="text-gray-500 text-sm">/bulan</span>
                    @endif
                </div>
                <ul class="space-y-3 mb-8">
                    @foreach($p['fitur'] as $f)
                        <li class="flex items-center gap-2 text-gray-300 text-sm">
                            <i class="fas fa-check text-green-400 text-xs"></i>{{ $f }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('daftar') }}" class="block text-center w-full py-3 rounded-xl font-semibold transition {{ $p['populer'] ? 'bg-gradient-to-r from-kvt-500 to-ungu-500 text-white hover:from-kvt-400' : 'border border-kvt-700/50 text-gray-300 hover:bg-kvt-800/50' }}">
                    {{ $p['harga'] === 'Custom' ? 'Hubungi Kami' : 'Mulai Sekarang' }}
                </a>
            </div>
        @endforeach
    </div>
</section>
@endsection
