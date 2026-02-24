@extends('tata-letak.utama')
@section('judul', 'Kurikulum - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-indigo-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #6366F1 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-indigo-800/30 border border-indigo-600/30 rounded-full px-4 py-1.5 text-xs text-indigo-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book-reader"></i> Standar Pendidikan Nasional & Internasional
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Kurikulum &</span><br>
            <span class="teks-gradien">Standar Akademik</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Dokumen kurikulum lengkap dari Kurikulum Merdeka, Cambridge, IB, hingga standar riset internasional.
            Silabus, RPS, kalender akademik, dan learning outcomes terstruktur untuk setiap jenjang pendidikan.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-indigo-500 to-kvt-500 hover:from-indigo-400 hover:to-kvt-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Unduh Kurikulum
            </a>
            <a href="#overview" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-sitemap mr-2"></i>Lihat Struktur
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">13</div><div class="text-xs text-gray-500">Jenjang</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Silabus</div></div>
            <div><div class="text-2xl font-black text-white">200+</div><div class="text-xs text-gray-500">Mata Pelajaran</div></div>
            <div><div class="text-2xl font-black text-white">4</div><div class="text-xs text-gray-500">Standar Global</div></div>
        </div>
    </div>
</section>

{{-- FRAMEWORK KURIKULUM --}}
<section id="overview" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">FRAMEWORK</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Framework Kurikulum yang Didukung</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">KVT Hub mendukung berbagai standar kurikulum nasional dan internasional</p>
    </div>
    @php
    $framework = [
        ['ikon' => 'fas fa-flag', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'Kurikulum Merdeka', 'desc' => 'Kurikulum nasional Indonesia terbaru dari Kemendikbudristek. Profil Pelajar Pancasila, pembelajaran berbasis projek, dan asesmen diagnostik.', 'fitur' => ['6 Dimensi Profil Pelajar Pancasila', 'Projek Penguatan (P5)', 'Capaian Pembelajaran (CP)', 'Asesmen Formatif & Sumatif']],
        ['ikon' => 'fas fa-globe-europe', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Cambridge International', 'desc' => 'Cambridge Assessment International Education — IGCSE, AS/A Level, dan Cambridge Pre-U untuk standar pendidikan global.', 'fitur' => ['IGCSE (Grade 9-10)', 'AS & A Level (Grade 11-12)', 'Cambridge Pre-U', 'Cambridge Professional Development']],
        ['ikon' => 'fas fa-earth-americas', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'International Baccalaureate', 'desc' => 'IB Programme — PYP, MYP, DP, dan CP yang dikenal di 150+ negara dengan pendekatan inquiry-based learning.', 'fitur' => ['Primary Years Programme (PYP)', 'Middle Years Programme (MYP)', 'Diploma Programme (DP)', 'Career-related Programme (CP)']],
        ['ikon' => 'fas fa-university', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'KKNI & SN-Dikti', 'desc' => 'Kerangka Kualifikasi Nasional Indonesia & Standar Nasional Dikti untuk pendidikan tinggi — D1 sampai S3.', 'fitur' => ['9 Level Kualifikasi KKNI', 'Standar Kompetensi Lulusan', 'RPS & CPMK Terstruktur', 'Outcome-Based Education (OBE)']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($framework as $f)
        <div class="kaca rounded-2xl p-8 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-5">
                <div class="w-16 h-16 bg-gradient-to-br {{ $f['gradien'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $f['ikon'] }} text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-xl mb-2">{{ $f['judul'] }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ $f['desc'] }}</p>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($f['fitur'] as $item)
                        <span class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-check text-{{ $f['warna'] }}-400 text-[10px]"></i>{{ $item }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- DOKUMEN KURIKULUM PER JENJANG --}}
<section class="bg-gradient-to-br from-indigo-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">PER JENJANG</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Dokumen Kurikulum per Jenjang</h2>
        </div>
        @php
        $jenjang = [
            ['ikon' => 'fas fa-baby', 'warna' => 'pink', 'judul' => 'TK / PAUD', 'docs' => ['Capaian Pembelajaran Fase Fondasi', 'Panduan Bermain Sambil Belajar', 'Asesmen Perkembangan Anak', 'Modul Ajar Tema']],
            ['ikon' => 'fas fa-book-open', 'warna' => 'blue', 'judul' => 'SD / MI', 'docs' => ['CP Fase A-C (Kelas 1-6)', 'Silabus 8 Mata Pelajaran', 'Projek P5 SD', 'Panduan Asesmen Kelas']],
            ['ikon' => 'fas fa-book', 'warna' => 'green', 'judul' => 'SMP / MTs', 'docs' => ['CP Fase D (Kelas 7-9)', 'Silabus 12 Mapel', 'Panduan ASPD', 'Modul Projek Kewirausahaan']],
            ['ikon' => 'fas fa-school', 'warna' => 'yellow', 'judul' => 'SMA / MA', 'docs' => ['CP Fase E-F (Kelas 10-12)', 'Peminatan MIPA/IPS/Bahasa', 'Panduan SNBT & UTBK', 'Karya Ilmiah Siswa']],
            ['ikon' => 'fas fa-tools', 'warna' => 'orange', 'judul' => 'SMK', 'docs' => ['Standar Kompetensi Keahlian', 'Teaching Factory', 'PKL/Prakerin Guide', 'Uji Kompetensi Keahlian']],
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'purple', 'judul' => 'Perguruan Tinggi', 'docs' => ['RPS Template (S1-S3)', 'Panduan OBE & CPMK', 'Pedoman Tugas Akhir', 'Panduan Akreditasi']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($jenjang as $j)
            <div class="kaca rounded-2xl p-6 border-{{ $j['warna'] }}-500/20 hover:border-{{ $j['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="w-12 h-12 bg-{{ $j['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $j['ikon'] }} text-{{ $j['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-3">{{ $j['judul'] }}</h3>
                <ul class="space-y-2">
                    @foreach($j['docs'] as $d)
                    <li class="flex items-start gap-2 text-sm text-gray-400"><i class="fas fa-file-pdf text-red-400 text-xs mt-1"></i>{{ $d }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- KALENDER AKADEMIK --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">KALENDER</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kalender Akademik 2026/2027</h2>
    </div>
    @php
    $semester = [
        ['period' => 'Semester Ganjil', 'warna' => 'blue', 'events' => [
            ['bulan' => 'Jul 2026', 'event' => 'Penerimaan Peserta Didik Baru (PPDB)'],
            ['bulan' => 'Agt 2026', 'event' => 'Masa Pengenalan Lingkungan Sekolah (MPLS)'],
            ['bulan' => 'Sep 2026', 'event' => 'Asesmen Diagnostik Awal'],
            ['bulan' => 'Okt 2026', 'event' => 'Ujian Tengah Semester (UTS)'],
            ['bulan' => 'Nov 2026', 'event' => 'Projek P5 / Capstone Semester 1'],
            ['bulan' => 'Des 2026', 'event' => 'Ujian Akhir Semester & Rapor'],
        ]],
        ['period' => 'Semester Genap', 'warna' => 'green', 'events' => [
            ['bulan' => 'Jan 2027', 'event' => 'Awal Semester Genap'],
            ['bulan' => 'Feb 2027', 'event' => 'Olimpiade & Kompetisi Regional'],
            ['bulan' => 'Mar 2027', 'event' => 'Ujian Tengah Semester (UTS)'],
            ['bulan' => 'Apr 2027', 'event' => 'SNBT / UTBK Periode 1'],
            ['bulan' => 'Mei 2027', 'event' => 'Projek P5 / Capstone Semester 2'],
            ['bulan' => 'Jun 2027', 'event' => 'Ujian Akhir Tahun & Wisuda'],
        ]],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($semester as $s)
        <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20" data-aos="fade-up">
            <h3 class="text-white font-bold text-xl mb-4"><i class="fas fa-calendar-alt text-{{ $s['warna'] }}-400 mr-2"></i>{{ $s['period'] }}</h3>
            <div class="space-y-3">
                @foreach($s['events'] as $e)
                <div class="flex items-start gap-3">
                    <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-1 rounded-full whitespace-nowrap font-mono">{{ $e['bulan'] }}</span>
                    <span class="text-gray-300 text-sm">{{ $e['event'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-indigo-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Akses silabus & materi per jenjang', 'Download modul PDF & e-book', 'Ikuti kelas & ambil kuis', 'Lihat progress & rapor digital', 'Gabung study group', 'Kumpulkan XP & naik level']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Buat kelas & upload materi', 'Buat kuis & asesmen', 'Kelola siswa & kehadiran', 'Buat laporan (30 jenis diagram)', 'Upload silabus & RPP', 'Mentoring siswa 1-on-1']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua pengguna & peran', 'CRUD berita, mitra, & sponsor', 'Dashboard analytics real-time', 'Kelola kurikulum & dokumen', 'Konfigurasi keamanan & kunci', 'Audit log & penjamin mutu']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($roles as $r)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $r['gradien'] }} p-6 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $r['ikon'] }} text-white text-2xl"></i></div>
                    <h3 class="text-white font-bold text-xl">{{ $r['peran'] }}</h3>
                </div>
                <div class="p-6 space-y-3">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $r['warna'] }}-400 text-xs mt-1"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO PENGENALAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Pengenalan Kurikulum</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Kurikulum Merdeka Explained', 'durasi' => '12:34', 'views' => '45K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Kurikulum+Merdeka'],
            ['judul' => 'Panduan SNBT & UTBK 2026', 'durasi' => '18:20', 'views' => '32K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=SNBT+UTBK+2026'],
            ['judul' => 'OBE di Perguruan Tinggi', 'durasi' => '15:45', 'views' => '21K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=OBE+Guide'],
        ];
        @endphp
        @foreach($videos as $v)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-xl ml-1"></i></div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h4 class="text-white font-bold text-sm mb-1">{{ $v['judul'] }}</h4>
                <p class="text-gray-500 text-xs"><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-indigo-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Akses Seluruh Kurikulum Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis untuk mengunduh dokumen kurikulum, silabus, dan modul pembelajaran dari semua jenjang.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-kvt-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Unduh Gratis
        </a>
    </div>
</section>

@endsection
