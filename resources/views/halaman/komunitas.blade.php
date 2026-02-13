@extends('tata-letak.utama')
@section('judul', 'Komunitas - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-pink-900/20 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 40% 50%, rgba(236,72,153,0.3) 0%, transparent 50%), radial-gradient(circle at 60% 50%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-pink-800/30 border border-pink-600/30 rounded-full px-4 py-1.5 text-xs text-pink-300 mb-6" data-aos="fade-down">
            <i class="fas fa-users"></i> 50,000+ Anggota Aktif
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Komunitas </span><span class="teks-gradien">Global</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Bergabung dengan komunitas pelajar, peneliti, dan profesional dari seluruh dunia. Forum, study group, dan alumni network.
        </p>
    </div>
</section>

{{-- Community Channels --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Kanal Komunitas</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        @php
        $kanal = [
            ['Forum Diskusi', 'Diskusi akademik, teknis, dan umum. Tanya jawab peer-to-peer.', 'fa-comments', 'from-blue-500 to-cyan-500', '15K+ topik'],
            ['Study Group', 'Grup belajar berdasarkan mata kuliah, kursus, dan topik riset.', 'fa-book-reader', 'from-green-500 to-emerald-500', '3K+ grup'],
            ['Alumni Network', 'Jaringan alumni dari TK hingga S3. Mentoring dan networking.', 'fa-user-tie', 'from-purple-500 to-violet-500', '8K+ alumni'],
            ['Hackathon', 'Kompetisi coding, desain, dan inovasi dengan hadiah besar.', 'fa-trophy', 'from-yellow-500 to-amber-500', '24 event/tahun'],
            ['Open Source', 'Kontribusi ke proyek open source KVT dan ekosistemnya.', 'fa-code-branch', 'from-orange-500 to-red-500', '200+ repo'],
            ['Event & Webinar', 'Webinar bulanan, workshop, dan konferensi tahunan.', 'fa-video', 'from-pink-500 to-rose-500', '120 event/tahun'],
        ];
        @endphp
        @foreach($kanal as $k)
        <div class="kaca rounded-2xl p-6 hover:border-pink-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $k[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $k[2] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">{{ $k[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Leaderboard --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Leaderboard Komunitas</h2>
        <div class="kaca rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="grid grid-cols-4 gap-4 p-4 bg-kvt-800/30 text-xs font-semibold text-gray-400 border-b border-kvt-700/30">
                <span>Peringkat</span><span>Anggota</span><span>Level</span><span>Kontribusi</span>
            </div>
            @for($i = 1; $i <= 5; $i++)
            <div class="grid grid-cols-4 gap-4 p-4 items-center text-sm hover:bg-kvt-800/20 transition {{ $i === 1 ? 'bg-yellow-500/5' : '' }}">
                <span class="font-bold {{ $i <= 3 ? 'text-yellow-400' : 'text-gray-400' }}">
                    @if($i === 1)<i class="fas fa-crown text-yellow-400 mr-1"></i>@endif#{{ $i }}
                </span>
                <span class="text-white">
                    <div class="w-7 h-7 inline-flex items-center justify-center bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-full text-xs font-bold mr-2">{{ chr(64+$i) }}</div>
                    Anggota {{ $i }}
                </span>
                <span class="text-kvt-400 font-semibold">Lv.{{ 50 - $i * 5 }}</span>
                <span class="text-gray-400">{{ number_format((6-$i) * 1234) }} XP</span>
            </div>
            @endfor
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="max-w-4xl mx-auto px-4 py-16 text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-white mb-4">Bergabung dengan Komunitas</h2>
    <p class="text-gray-400 mb-8">Jadilah bagian dari 50,000+ pelajar dan profesional global.</p>
    <div class="flex justify-center gap-4">
        <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-400 hover:to-purple-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-pink-500/20">
            <i class="fas fa-user-plus mr-2"></i>Gabung Sekarang
        </a>
        <a href="#" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
            <i class="fab fa-discord mr-2"></i>Discord
        </a>
    </div>
</section>

@endsection
