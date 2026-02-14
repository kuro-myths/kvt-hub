@extends('tata-letak.utama')
@section('judul', 'Tentang - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(51,153,255,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-info-circle"></i> Tentang Kami
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Tentang </span><span class="teks-gradien">KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Ekosistem pendidikan, riset, dan karir digital terdepan. Mengintegrasikan pembelajaran dari TK hingga S3 dengan teknologi modern.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-rocket mr-2"></i>Bergabung Sekarang
            </a>
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fab fa-github mr-2"></i>GitHub
            </a>
        </div>
    </div>
</section>

{{-- Visi & Misi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Visi & Misi</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Arah dan tujuan yang menjadi fondasi KVT Hub</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-right" data-aos-delay="200">
        <div class="kaca rounded-2xl p-8 border-kvt-500/20 hover:border-kvt-500/40 transition">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-eye text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-xl">Visi</h3>
            </div>
            <p class="text-gray-400 text-sm leading-relaxed">
                Menjadi platform ekosistem pendidikan digital terdepan yang menghubungkan pembelajaran, riset, karir, dan komunitas global. Menciptakan pengalaman belajar yang terukur, menyenangkan, dan memberdayakan dari TK hingga S3/PhD.
            </p>
        </div>
        <div class="kaca rounded-2xl p-8 border-ungu-500/20 hover:border-ungu-500/40 transition">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-14 h-14 bg-gradient-to-br from-ungu-500 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-bullseye text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-xl">Misi</h3>
            </div>
            <ul class="space-y-3 text-sm text-gray-400 leading-relaxed">
                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i>Menyediakan konten pembelajaran berkualitas tinggi untuk semua jenjang</li>
                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i>Mendemokratisasi akses pendidikan teknologi secara global</li>
                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i>Membangun komunitas belajar yang suportif dan inklusif</li>
                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i>Menggunakan gamifikasi dan sistem level untuk meningkatkan motivasi</li>
                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5"></i>Menghubungkan pendidikan dengan dunia kerja dan industri</li>
            </ul>
        </div>
    </div>
</section>

{{-- Fitur Unggulan --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Fitur Unggulan</h2>
            <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Teknologi dan inovasi yang membedakan KVT Hub</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-left" data-aos-delay="200">
            @php
            $fitur = [
                ['Sistem Level 1-100', 'Progres terukur dengan 10 rank dari Novice hingga Grandmaster. Dapatkan XP dari setiap aktivitas.', 'fa-graduation-cap', 'from-purple-500 to-pink-500'],
                ['Video Interaktif', 'Video berhenti otomatis di titik tertentu untuk kuis. Integrasi YouTube dan media learning.', 'fa-video', 'from-red-500 to-orange-500'],
                ['30+ Jenis Diagram', 'Dari bar chart hingga sankey diagram. Lacak pembelajaran dengan visualisasi data canggih.', 'fa-chart-pie', 'from-green-500 to-teal-500'],
                ['Multi-Role System', 'Siswa, Guru, dan Admin. Setiap peran memiliki dasbor dan kemampuan yang berbeda.', 'fa-users', 'from-blue-500 to-cyan-500'],
                ['Paket Eksklusif', 'Akses materi premium dan konten eksklusif untuk siswa berdedikasi tinggi.', 'fa-gem', 'from-yellow-500 to-amber-500'],
                ['Kuis & Pencapaian', 'Sistem kuis otomatis dan badge unik saat menyelesaikan tantangan pembelajaran.', 'fa-trophy', 'from-amber-500 to-yellow-600'],
            ];
            @endphp
            @foreach($fitur as $f)
            <div class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br {{ $f[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $f[2] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $f[0] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 8 Pilar Ekosistem --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">8 Pilar Ekosistem</h2>
        <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Ekosistem terintegrasi dari pendidikan hingga industri</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
        @php
        $pilar = [
            ['Jenjang', '13 tingkat', 'fa-graduation-cap', 'from-blue-500 to-cyan-500'],
            ['Riset', '150+ universitas', 'fa-microscope', 'from-purple-500 to-violet-500'],
            ['Karir', '500+ perusahaan', 'fa-briefcase', 'from-orange-500 to-red-500'],
            ['Komunitas', '50K+ anggota', 'fa-users', 'from-pink-500 to-rose-500'],
            ['Sertifikasi', '120+ program', 'fa-award', 'from-amber-500 to-yellow-500'],
            ['Sumber Daya', '17K+ resources', 'fa-database', 'from-cyan-500 to-teal-500'],
            ['Keamanan', 'ISO 27001', 'fa-shield-alt', 'from-red-500 to-pink-500'],
            ['Mutu', 'QA/QC & SPK', 'fa-check-double', 'from-teal-500 to-green-500'],
        ];
        @endphp
        @foreach($pilar as $p)
        <div class="kaca rounded-2xl p-5 text-center hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg mx-auto group-hover:scale-110 transition">
                <i class="fas {{ $p[2] }} text-white text-lg"></i>
            </div>
            <h4 class="text-white font-bold text-sm">{{ $p[0] }}</h4>
            <p class="text-gray-500 text-xs mt-0.5">{{ $p[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Teknologi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-right">Tech Stack</h2>
            <p class="text-gray-400" data-aos="fade-right" data-aos-delay="100">Teknologi modern yang memberdayakan platform</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4" data-aos="fade-left" data-aos-delay="200">
            @php
            $tech = [
                ['Laravel 12', 'fab fa-laravel', 'text-red-400', 'bg-red-500/10'],
                ['PHP 8.3', 'fab fa-php', 'text-indigo-400', 'bg-indigo-500/10'],
                ['PostgreSQL', 'fas fa-database', 'text-blue-400', 'bg-blue-500/10'],
                ['Tailwind CSS', 'fab fa-css3-alt', 'text-cyan-400', 'bg-cyan-500/10'],
                ['Chart.js v4', 'fas fa-chart-pie', 'text-green-400', 'bg-green-500/10'],
                ['AOS v2', 'fas fa-magic', 'text-purple-400', 'bg-purple-500/10'],
                ['Font Awesome', 'fab fa-font-awesome-flag', 'text-blue-400', 'bg-blue-500/10'],
                ['Google Translate', 'fas fa-language', 'text-yellow-400', 'bg-yellow-500/10'],
                ['Plus Jakarta Sans', 'fas fa-font', 'text-pink-400', 'bg-pink-500/10'],
                ['GitHub', 'fab fa-github', 'text-gray-300', 'bg-gray-500/10'],
            ];
            @endphp
            @foreach($tech as $t)
            <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition group">
                <div class="w-12 h-12 mx-auto {{ $t[3] }} rounded-xl flex items-center justify-center mb-2 group-hover:scale-110 transition">
                    <i class="{{ $t[1] }} {{ $t[2] }} text-xl"></i>
                </div>
                <span class="text-xs text-gray-400 font-medium">{{ $t[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Tim --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Tim Pengembang</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Di balik layar KVT Hub</p>
    </div>
    <div class="max-w-md mx-auto" data-aos="fade-up" data-aos-delay="200">
        <div class="kaca rounded-2xl p-8 text-center group hover:border-kvt-500/30 transition-all duration-300">
            <div class="w-24 h-24 bg-gradient-to-br from-kvt-400 via-ungu-500 to-pink-500 rounded-full flex items-center justify-center mx-auto mb-4 shadow-xl group-hover:scale-105 transition">
                <span class="text-white font-black text-3xl">K</span>
            </div>
            <h3 class="text-white font-bold text-xl mb-1">Kuro Myths</h3>
            <p class="text-kvt-400 text-sm font-semibold mb-3">Full-Stack Developer & Founder</p>
            <p class="text-gray-400 text-sm leading-relaxed mb-4">Pengembang utama KVT Hub. Membangun ekosistem pendidikan digital dari nol dengan passion untuk teknologi dan pendidikan.</p>
            <div class="flex justify-center gap-3">
                <a href="https://github.com/kuro-myths" target="_blank" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </div>
</section>

{{-- Open Source --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <div class="kaca rounded-2xl p-10 border-kvt-500/20">
            <div class="w-16 h-16 bg-gradient-to-br from-gray-700 to-gray-800 rounded-2xl flex items-center justify-center mx-auto mb-5 shadow-lg">
                <i class="fab fa-github text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white mb-3">Open Source</h2>
            <p class="text-gray-400 mb-6 max-w-xl mx-auto">KVT Hub adalah proyek open source. Source code tersedia di GitHub. Kontribusi, saran, dan ide Anda sangat kami hargai!</p>
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="inline-flex items-center gap-2 bg-gray-800 hover:bg-gray-700 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                <i class="fab fa-github"></i> github.com/kuro-myths/kvt-hub
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-kvt-800/20 to-ungu-700/10 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in">
        <div><div class="text-3xl font-black teks-gradien">13</div><p class="text-gray-400 text-sm mt-1">Jenjang Pendidikan</p></div>
        <div><div class="text-3xl font-black teks-gradien">8</div><p class="text-gray-400 text-sm mt-1">Pilar Ekosistem</p></div>
        <div><div class="text-3xl font-black teks-gradien">v3.1</div><p class="text-gray-400 text-sm mt-1">Versi Terkini</p></div>
        <div><div class="text-3xl font-black teks-gradien">100%</div><p class="text-gray-400 text-sm mt-1">Open Source</p></div>
    </div>
</section>

@endsection
