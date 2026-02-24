@extends('tata-letak.utama')
@section('judul', 'Media & Video - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-rose-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-rose-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-red-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F43F5E 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-rose-800/30 border border-rose-600/30 rounded-full px-4 py-1.5 text-xs text-rose-300 mb-6" data-aos="fade-down">
            <i class="fas fa-play-circle"></i> Video, Webinar, Podcast & Galeri
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Media &</span><br>
            <span class="teks-gradien">Video Library</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pusat media pembelajaran KVT Hub — koleksi video tutorial, webinar edukatif, podcast
            inspiratif, dan galeri dokumentasi kegiatan dari seluruh jenjang pendidikan.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#video" class="bg-gradient-to-r from-rose-500 to-red-500 hover:from-rose-400 hover:to-red-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-rose-500/30 hover:-translate-y-0.5">
                <i class="fas fa-play mr-2"></i>Tonton Video
            </a>
            <a href="#podcast" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-podcast mr-2"></i>Dengar Podcast
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Video Tutorial</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Webinar</div></div>
            <div><div class="text-2xl font-black text-white">120+</div><div class="text-xs text-gray-500">Episode Podcast</div></div>
            <div><div class="text-2xl font-black text-white">1K+</div><div class="text-xs text-gray-500">Foto & Galeri</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI MEDIA --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Media</h2>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-play-circle', 'warna' => 'red', 'judul' => 'Video Tutorial', 'desc' => 'Tutorial langkah demi langkah untuk setiap fitur platform, materi pelajaran, dan tips belajar efektif.', 'count' => '500+'],
        ['ikon' => 'fas fa-video', 'warna' => 'blue', 'judul' => 'Webinar & Live', 'desc' => 'Webinar edukatif bersama pakar pendidikan, guru berprestasi, dan praktisi industri. Scheduled & on-demand.', 'count' => '50+'],
        ['ikon' => 'fas fa-podcast', 'warna' => 'purple', 'judul' => 'Podcast Edu', 'desc' => 'Podcast mingguan membahas tren pendidikan, tips karir, dan kisah sukses alumni KVT Hub. Tersedia di Spotify.', 'count' => '120+'],
        ['ikon' => 'fas fa-images', 'warna' => 'green', 'judul' => 'Galeri Foto', 'desc' => 'Dokumentasi visual kegiatan — workshop, hackathon, wisuda, dan event komunitas dari seluruh Indonesia.', 'count' => '1K+'],
        ['ikon' => 'fas fa-file-video', 'warna' => 'amber', 'judul' => 'Screencast', 'desc' => 'Rekaman layar demonstrasi penggunaan platform, coding tutorial, dan hands-on lab praktikum digital.', 'count' => '200+'],
        ['ikon' => 'fas fa-film', 'warna' => 'cyan', 'judul' => 'Dokumenter', 'desc' => 'Film dokumenter pendek tentang inovasi pendidikan, profil sekolah unggulan, dan transformasi digital kampus.', 'count' => '30+'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 bg-{{ $k['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                    <i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <h3 class="text-white font-bold text-lg">{{ $k['judul'] }}</h3>
                        <span class="text-xs bg-{{ $k['warna'] }}-500/10 text-{{ $k['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $k['count'] }}</span>
                    </div>
                    <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO UNGGULAN --}}
<section id="video" class="bg-gradient-to-br from-rose-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO UNGGULAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Paling Populer</h2>
        </div>
        @php
        $videos = [
            ['judul' => 'Intro KVT Hub Platform', 'durasi' => '08:45', 'views' => '125K', 'tag' => 'Platform', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/0f172a/3B82F6?text=Intro+KVT+Hub'],
            ['judul' => 'Kurikulum Merdeka Deep Dive', 'durasi' => '22:30', 'views' => '89K', 'tag' => 'Kurikulum', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/0f172a/EF4444?text=Kurikulum+Merdeka'],
            ['judul' => 'Tips Belajar Efektif 2026', 'durasi' => '15:12', 'views' => '67K', 'tag' => 'Tips', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/0f172a/22C55E?text=Tips+Belajar'],
            ['judul' => 'Coding for Beginners', 'durasi' => '45:00', 'views' => '54K', 'tag' => 'Tutorial', 'warna' => 'cyan', 'thumb' => 'https://placehold.co/640x360/0f172a/06B6D4?text=Coding+101'],
            ['judul' => 'Persiapan SNBT 2026', 'durasi' => '30:15', 'views' => '98K', 'tag' => 'Ujian', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/0f172a/F59E0B?text=SNBT+2026'],
            ['judul' => 'AI in Education', 'durasi' => '18:50', 'views' => '43K', 'tag' => 'Tech', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/0f172a/A855F7?text=AI+Education'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($videos as $v)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
                <div class="relative overflow-hidden">
                    <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-2xl ml-1"></i></div>
                    </div>
                    <span class="absolute top-2 left-2 bg-{{ $v['warna'] }}-500/80 text-white text-[10px] px-2 py-0.5 rounded-full font-semibold">{{ $v['tag'] }}</span>
                    <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded font-mono">{{ $v['durasi'] }}</span>
                </div>
                <div class="p-4">
                    <h4 class="text-white font-bold text-sm mb-2 group-hover:text-{{ $v['warna'] }}-400 transition">{{ $v['judul'] }}</h4>
                    <div class="flex items-center gap-3 text-xs text-gray-500">
                        <span><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $v['durasi'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WEBINAR JADWAL --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">WEBINAR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Webinar Mendatang</h2>
    </div>
    @php
    $webinars = [
        ['warna' => 'blue', 'tanggal' => '15 Feb 2026', 'waktu' => '14:00 WIB', 'judul' => 'Membangun Portfolio Digital untuk Pelajar', 'speaker' => 'Dr. Ahmad Syafiq, M.Pd.', 'slot' => '200 / 500'],
        ['warna' => 'green', 'tanggal' => '22 Feb 2026', 'waktu' => '10:00 WIB', 'judul' => 'Teaching with AI: Practical Guide for Educators', 'speaker' => 'Prof. Lisa Hartanto, Ph.D.', 'slot' => '340 / 500'],
        ['warna' => 'purple', 'tanggal' => '01 Mar 2026', 'waktu' => '19:00 WIB', 'judul' => 'Career Readiness: From Campus to Corporate', 'speaker' => 'Budi Santoso, CEO TechEdu', 'slot' => '150 / 300'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($webinars as $w)
        <div class="kaca rounded-2xl p-6 flex flex-col md:flex-row items-start md:items-center gap-4 border-{{ $w['warna'] }}-500/20 hover:border-{{ $w['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="w-20 h-20 bg-{{ $w['warna'] }}-500/20 rounded-2xl flex flex-col items-center justify-center flex-shrink-0">
                <i class="fas fa-calendar text-{{ $w['warna'] }}-400 text-xl mb-1"></i>
                <span class="text-white text-xs font-mono">{{ $w['tanggal'] }}</span>
            </div>
            <div class="flex-1">
                <h4 class="text-white font-bold text-lg">{{ $w['judul'] }}</h4>
                <p class="text-gray-400 text-sm mt-1"><i class="fas fa-user-tie mr-1"></i>{{ $w['speaker'] }} · <i class="fas fa-clock ml-2 mr-1"></i>{{ $w['waktu'] }}</p>
            </div>
            <div class="text-right flex-shrink-0">
                <div class="text-gray-500 text-xs mb-2"><i class="fas fa-users mr-1"></i>{{ $w['slot'] }} peserta</div>
                <button class="bg-{{ $w['warna'] }}-500/20 text-{{ $w['warna'] }}-400 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-{{ $w['warna'] }}-500/30 transition"><i class="fas fa-ticket-alt mr-1"></i>Daftar</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- PODCAST --}}
<section id="podcast" class="bg-gradient-to-br from-purple-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">PODCAST</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">KVT Edu Podcast</h2>
            <p class="text-gray-400 mt-3">Setiap Senin & Kamis — episode baru tentang dunia pendidikan</p>
        </div>
        @php
        $episodes = [
            ['ep' => 'EP 120', 'judul' => 'Masa Depan Pendidikan di Era AI', 'guest' => 'Prof. Dewi Lestari', 'durasi' => '42:15', 'warna' => 'purple'],
            ['ep' => 'EP 119', 'judul' => 'Skill yang Dicari Perusahaan 2026', 'guest' => 'Rini Setiawan, HRD Google', 'durasi' => '38:20', 'warna' => 'blue'],
            ['ep' => 'EP 118', 'judul' => 'Kurikulum Merdeka: Sudah 1 Tahun', 'guest' => 'Dr. Hasan Basri, M.Pd.', 'durasi' => '45:50', 'warna' => 'green'],
            ['ep' => 'EP 117', 'judul' => 'Mental Health untuk Pelajar', 'guest' => 'Psikolog Anita Pratiwi', 'durasi' => '35:10', 'warna' => 'rose'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($episodes as $ep)
            <div class="kaca rounded-2xl p-5 flex items-center gap-4 border-{{ $ep['warna'] }}-500/20 hover:border-{{ $ep['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
                <div class="w-16 h-16 bg-{{ $ep['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-{{ $ep['warna'] }}-500/30 transition">
                    <i class="fas fa-headphones text-{{ $ep['warna'] }}-400 text-2xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <span class="text-{{ $ep['warna'] }}-400 text-xs font-mono">{{ $ep['ep'] }}</span>
                    <h4 class="text-white font-bold text-sm truncate">{{ $ep['judul'] }}</h4>
                    <p class="text-gray-500 text-xs"><i class="fas fa-microphone mr-1"></i>{{ $ep['guest'] }} · {{ $ep['durasi'] }}</p>
                </div>
                <button class="w-10 h-10 bg-{{ $ep['warna'] }}-500/20 rounded-full flex items-center justify-center hover:bg-{{ $ep['warna'] }}-500/30 transition flex-shrink-0">
                    <i class="fas fa-play text-{{ $ep['warna'] }}-400 text-sm ml-0.5"></i>
                </button>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- GALERI KEGIATAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">GALERI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Galeri Kegiatan</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @php
        $galeri = [
            ['label' => 'Workshop AI', 'warna' => 'blue'],
            ['label' => 'Hackathon 2026', 'warna' => 'green'],
            ['label' => 'Wisuda Digital', 'warna' => 'purple'],
            ['label' => 'Forum Guru', 'warna' => 'amber'],
            ['label' => 'Olimpiade Sains', 'warna' => 'red'],
            ['label' => 'Seminar Nasional', 'warna' => 'cyan'],
            ['label' => 'Study Tour', 'warna' => 'rose'],
            ['label' => 'Career Fair', 'warna' => 'indigo'],
        ];
        @endphp
        @foreach($galeri as $g)
        <div class="aspect-square kaca rounded-xl overflow-hidden relative group cursor-pointer" data-aos="zoom-in">
            <div class="absolute inset-0 bg-gradient-to-br from-{{ $g['warna'] }}-500/20 to-{{ $g['warna'] }}-800/30"></div>
            <div class="w-full h-full flex items-center justify-center">
                <i class="fas fa-camera text-{{ $g['warna'] }}-400/50 text-4xl"></i>
            </div>
            <div class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                <span class="text-white font-bold text-sm">{{ $g['label'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-rose-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">HAK AKSES</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Media per Peran</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $mediaRoles = [
                ['peran' => 'Siswa', 'ikon' => 'fas fa-user', 'warna' => 'blue', 'fitur' => ['Tonton semua video gratis', 'Catat timestamp & bookmark', 'Ikut webinar live', 'Download podcast offline', 'Lihat galeri kegiatan', 'Share ke media sosial']],
                ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Upload video materi ke kelas', 'Host webinar sendiri', 'Rekam screencast materi', 'Buat playlist pembelajaran', 'Akses analytics viewer', 'Upload foto kegiatan']],
                ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Kelola semua konten media', 'Moderasi video & komentar', 'Set video sebagai featured', 'Jadwalkan webinar platform', 'Kelola hosting & storage', 'Lihat laporan engagement']],
            ];
            @endphp
            @foreach($mediaRoles as $r)
            <div class="kaca rounded-2xl p-6 border-{{ $r['warna'] }}-500/20" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-{{ $r['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $r['ikon'] }} text-{{ $r['warna'] }}-400"></i></div>
                    <h3 class="text-white font-bold">{{ $r['peran'] }}</h3>
                </div>
                <div class="space-y-2">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-center gap-2 text-sm text-gray-400"><i class="fas fa-check text-{{ $r['warna'] }}-400 text-xs"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Jelajahi Media & Video KVT Hub</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses 500+ video tutorial, podcast inspiratif, dan webinar dari para ahli. Gratis untuk akun terdaftar.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-red-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-rose-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-play-circle"></i> Mulai Menonton
        </a>
    </div>
</section>

@endsection
