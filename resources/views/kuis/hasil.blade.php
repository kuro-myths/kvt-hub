@extends('tata-letak.utama')
@section('judul', 'Hasil Kuis - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 text-center" data-aos="fade-up">
            @php
                $persen = $hasil->skor;
                $lulus = $persen >= 70;
            @endphp

            <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center {{ $lulus ? 'bg-green-500/20' : 'bg-red-500/20' }}">
                <i class="fas {{ $lulus ? 'fa-trophy text-yellow-400' : 'fa-times-circle text-red-400' }} text-4xl"></i>
            </div>

            <h1 class="text-3xl font-black {{ $lulus ? 'text-green-400' : 'text-red-400' }}">
                {{ $lulus ? 'Selamat! Kuis Lulus!' : 'Belum Berhasil' }}
            </h1>

            <p class="text-gray-400 mt-2">{{ $hasil->kuis->judul }}</p>

            <div class="grid grid-cols-3 gap-4 mt-8 mb-6">
                <div class="bg-kvt-800/50 rounded-xl p-4">
                    <p class="text-3xl font-black text-white">{{ number_format($persen, 0) }}%</p>
                    <p class="text-xs text-gray-500 mt-1">Skor</p>
                </div>
                <div class="bg-kvt-800/50 rounded-xl p-4">
                    <p class="text-3xl font-black text-white">{{ $hasil->jawaban_benar_count }}/{{ $hasil->total_pertanyaan }}</p>
                    <p class="text-xs text-gray-500 mt-1">Benar</p>
                </div>
                <div class="bg-kvt-800/50 rounded-xl p-4">
                    <p class="text-3xl font-black text-kvt-400">+{{ $hasil->xp_didapat }}</p>
                    <p class="text-xs text-gray-500 mt-1">XP Diperoleh</p>
                </div>
            </div>

            <div class="w-full bg-kvt-800/50 rounded-full h-4 mb-6">
                <div class="h-4 rounded-full transition-all duration-1000 {{ $lulus ? 'bg-gradient-to-r from-green-400 to-green-500' : 'bg-gradient-to-r from-red-400 to-red-500' }}" style="width: {{ $persen }}%"></div>
            </div>

            @if(!$lulus)
                <p class="text-gray-400 text-sm mb-6">
                    <i class="fas fa-info-circle mr-1 text-kvt-400"></i>
                    Kamu membutuhkan skor minimal 70% untuk lulus. Coba lagi dan dapatkan XP penuh!
                </p>
            @endif

            <div class="flex gap-4 justify-center mt-6">
                @if($hasil->kuis->materi)
                    <a href="{{ route('materi.tampilkan', $hasil->kuis->materi) }}" class="bg-kvt-700/50 hover:bg-kvt-600/50 text-white px-6 py-3 rounded-xl font-bold transition">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali ke Materi
                    </a>
                @endif
                <a href="{{ route('dasbor') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-6 py-3 rounded-xl font-bold transition">
                    <i class="fas fa-home mr-2"></i>Ke Dashboard
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
