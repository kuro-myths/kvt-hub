@extends('tata-letak.utama')
@section('judul', 'Video Tutorial - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/30 to-kvt-900"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 right-20 w-80 h-80 bg-red-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-10 left-10 w-64 h-64 bg-rose-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #EF4444 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-play-circle"></i> Library Video Edukasi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Video</span><br>
            <span class="teks-gradien">Tutorial Library</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi lengkap video tutorial edukasi KVT Hub — dari panduan platform, materi akademik,
            coding, sains, hingga tips belajar efektif. Terorganisir per kategori dan jenjang.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#video-unggulan" class="bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-400 hover:to-rose-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-red-500/30 hover:-translate-y-0.5">
                <i class="fas fa-play mr-2"></i>Tonton Sekarang
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Jelajahi Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Video Tutorial</div></div>
            <div><div class="text-2xl font-black text-white">12</div><div class="text-xs text-gray-500">Kategori</div></div>
            <div><div class="text-2xl font-black text-white">1.2M</div><div class="text-xs text-gray-500">Total Views</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Kreator</div></div>
        </div>
    </div>
</section>

{{-- FILTER KATEGORI --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Filter berdasarkan Kategori</h2>
        <p class="text-gray-400 mt-3">Temukan video sesuai topik dan minat belajarmu</p>
    </div>
    @php
    $filterKategori = [
        ['ikon' => 'fas fa-laptop-code', 'warna' => 'blue', 'label' => 'Programming', 'jumlah' => '120+'],
        ['ikon' => 'fas fa-flask', 'warna' => 'green', 'label' => 'Sains', 'jumlah' => '85+'],
        ['ikon' => 'fas fa-calculator', 'warna' => 'amber', 'label' => 'Matematika', 'jumlah' => '95+'],
        ['ikon' => 'fas fa-language', 'warna' => 'purple', 'label' => 'Bahasa', 'jumlah' => '60+'],
        ['ikon' => 'fas fa-brain', 'warna' => 'cyan', 'label' => 'AI & Data', 'jumlah' => '70+'],
        ['ikon' => 'fas fa-palette', 'warna' => 'rose', 'label' => 'Desain & Seni', 'jumlah' => '45+'],
    ];
    @endphp
    <div class="flex flex-wrap justify-center gap-3" data-aos="fade-up" data-aos-delay="100">
        @foreach($filterKategori as $fk)
        <button class="kaca rounded-full px-5 py-2.5 flex items-center gap-2 border-{{ $fk['warna'] }}-500/20 hover:border-{{ $fk['warna'] }}-500/50 hover:bg-{{ $fk['warna'] }}-500/10 transition group">
            <i class="{{ $fk['ikon'] }} text-{{ $fk['warna'] }}-400 group-hover:scale-110 transition"></i>
            <span class="text-white text-sm font-semibold">{{ $fk['label'] }}</span>
            <span class="text-xs bg-{{ $fk['warna'] }}-500/20 text-{{ $fk['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $fk['jumlah'] }}</span>
        </button>
        @endforeach
    </div>
</section>

{{-- VIDEO UNGGULAN --}}
<section id="video-unggulan" class="bg-gradient-to-br from-red-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">UNGGULAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Featured Pilihan Editor</h2>
        </div>
        @php
        $videoUnggulan = [
            ['judul' => 'Full Stack Web Development 2026', 'durasi' => '1:25:00', 'views' => '185K', 'tag' => 'Coding', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/0f172a/3B82F6?text=Full+Stack+Dev'],
            ['judul' => 'Fisika Kuantum untuk SMA', 'durasi' => '32:10', 'views' => '98K', 'tag' => 'Sains', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/0f172a/22C55E?text=Fisika+Kuantum'],
            ['judul' => 'Persiapan SNBT 2026 Lengkap', 'durasi' => '58:45', 'views' => '210K', 'tag' => 'Ujian', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/0f172a/F59E0B?text=SNBT+2026'],
            ['judul' => 'Machine Learning dari Nol', 'durasi' => '1:05:30', 'views' => '145K', 'tag' => 'AI', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/0f172a/A855F7?text=ML+dari+Nol'],
            ['judul' => 'Desain UI/UX dengan Figma', 'durasi' => '42:20', 'views' => '76K', 'tag' => 'Desain', 'warna' => 'rose', 'thumb' => 'https://placehold.co/640x360/0f172a/F43F5E?text=Figma+UX'],
            ['judul' => 'Bahasa Inggris: TOEFL Tips', 'durasi' => '28:50', 'views' => '120K', 'tag' => 'Bahasa', 'warna' => 'cyan', 'thumb' => 'https://placehold.co/640x360/0f172a/06B6D4?text=TOEFL+Tips'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($videoUnggulan as $v)
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

{{-- RANKING TERPOPULER --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">TERPOPULER</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Ranking <span class="teks-gradien-emas">Most Watched</span></h2>
    </div>
    @php
    $ranking = [
        ['no' => 1, 'judul' => 'Persiapan SNBT 2026 Lengkap', 'kreator' => 'KVT Academy', 'views' => '210K', 'warna' => 'amber'],
        ['no' => 2, 'judul' => 'Full Stack Web Development 2026', 'kreator' => 'CodeMaster ID', 'views' => '185K', 'warna' => 'gray'],
        ['no' => 3, 'judul' => 'Machine Learning dari Nol', 'kreator' => 'AI Lab KVT', 'views' => '145K', 'warna' => 'orange'],
        ['no' => 4, 'judul' => 'Bahasa Inggris: TOEFL Tips', 'kreator' => 'LinguaKVT', 'views' => '120K', 'warna' => 'blue'],
        ['no' => 5, 'judul' => 'Fisika Kuantum untuk SMA', 'kreator' => 'SainsHub', 'views' => '98K', 'warna' => 'green'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($ranking as $r)
        <div class="kaca rounded-xl p-4 flex items-center gap-4 border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="w-10 h-10 bg-{{ $r['warna'] }}-500/20 rounded-lg flex items-center justify-center font-black text-{{ $r['warna'] }}-400 text-lg">#{{ $r['no'] }}</div>
            <div class="flex-1 min-w-0">
                <h4 class="text-white font-bold text-sm truncate">{{ $r['judul'] }}</h4>
                <p class="text-gray-500 text-xs">oleh {{ $r['kreator'] }}</p>
            </div>
            <div class="text-gray-400 text-sm font-mono"><i class="fas fa-eye mr-1"></i>{{ $r['views'] }}</div>
        </div>
        @endforeach
    </div>
</section>

{{-- PLAYLIST / SERI VIDEO --}}
<section class="bg-gradient-to-br from-blue-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">PLAYLIST</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Series & Playlist</h2>
            <p class="text-gray-400 mt-3">Belajar terstruktur dengan video seri bertahap</p>
        </div>
        @php
        $playlist = [
            ['judul' => 'Laravel Mastery Series', 'episode' => 24, 'durasi' => '12 jam', 'level' => 'Intermediate', 'warna' => 'red', 'ikon' => 'fab fa-laravel'],
            ['judul' => 'Python for Data Science', 'episode' => 18, 'durasi' => '9 jam', 'level' => 'Beginner', 'warna' => 'blue', 'ikon' => 'fab fa-python'],
            ['judul' => 'Matematika Olimpiade', 'episode' => 30, 'durasi' => '15 jam', 'level' => 'Advanced', 'warna' => 'amber', 'ikon' => 'fas fa-square-root-alt'],
            ['judul' => 'React & Next.js 2026', 'episode' => 20, 'durasi' => '10 jam', 'level' => 'Intermediate', 'warna' => 'cyan', 'ikon' => 'fab fa-react'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($playlist as $pl)
            <div class="kaca rounded-2xl p-6 border-{{ $pl['warna'] }}-500/20 hover:border-{{ $pl['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-start gap-4">
                    <div class="w-14 h-14 bg-{{ $pl['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                        <i class="{{ $pl['ikon'] }} text-{{ $pl['warna'] }}-400 text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-lg group-hover:text-{{ $pl['warna'] }}-400 transition">{{ $pl['judul'] }}</h4>
                        <div class="flex flex-wrap gap-3 mt-2 text-xs text-gray-500">
                            <span><i class="fas fa-list mr-1"></i>{{ $pl['episode'] }} episode</span>
                            <span><i class="fas fa-clock mr-1"></i>{{ $pl['durasi'] }}</span>
                            <span class="bg-{{ $pl['warna'] }}-500/10 text-{{ $pl['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $pl['level'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">HAK AKSES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Video per Peran</h2>
    </div>
    @php
    $roles = [
        ['peran' => 'Siswa', 'ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'fitur' => ['Tonton semua video gratis', 'Bookmark & catat timestamp', 'Download untuk offline', 'Ikuti playlist bertahap', 'Beri rating & review', 'Share ke media sosial']],
        ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Upload video materi sendiri', 'Buat playlist per kelas', 'Embed video ke materi kelas', 'Akses analytics penonton', 'Assign video sebagai tugas', 'Rekam screencast langsung']],
        ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Kelola semua konten video', 'Set video featured & trending', 'Moderasi komentar & review', 'Atur storage & encoding', 'Kelola kreator & izin upload', 'Lihat laporan engagement']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($roles as $r)
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
</section>

{{-- PANDUAN UPLOAD --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-red-900/20 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">UPLOAD</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Upload Video</h2>
            <p class="text-gray-400 mt-3">Langkah mudah untuk mengunggah video tutorial ke KVT Hub</p>
        </div>
        @php
        $langkah = [
            ['no' => '01', 'judul' => 'Siapkan Konten', 'desc' => 'Rekam video berkualitas HD (min. 720p) dengan audio jernih. Durasi ideal 10-60 menit per episode.', 'ikon' => 'fas fa-video', 'warna' => 'red'],
            ['no' => '02', 'judul' => 'Isi Metadata', 'desc' => 'Tambahkan judul, deskripsi, tag, kategori, dan thumbnail menarik untuk visibilitas optimal.', 'ikon' => 'fas fa-tags', 'warna' => 'amber'],
            ['no' => '03', 'judul' => 'Review & Publish', 'desc' => 'Tim moderator akan meninjau konten Anda dalam 24 jam. Video yang lolos akan dipublikasikan secara otomatis.', 'ikon' => 'fas fa-check-circle', 'warna' => 'green'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($langkah as $l)
            <div class="kaca rounded-2xl p-6 text-center border-{{ $l['warna'] }}-500/20" data-aos="fade-up">
                <div class="text-3xl font-black text-{{ $l['warna'] }}-500/30 mb-2">{{ $l['no'] }}</div>
                <div class="w-14 h-14 bg-{{ $l['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="{{ $l['ikon'] }} text-{{ $l['warna'] }}-400 text-xl"></i>
                </div>
                <h4 class="text-white font-bold mb-2">{{ $l['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Belajar dari Video Tutorial</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses 500+ video tutorial gratis dari berbagai kategori. Belajar kapan saja, di mana saja, dengan kualitas terbaik.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-rose-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-red-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-play-circle"></i> Tonton Sekarang
        </a>
    </div>
</section>

@endsection
