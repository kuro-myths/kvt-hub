@extends('tata-letak.utama')
@section('judul', 'Study Group - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-emerald-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #10B981 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-emerald-800/30 border border-emerald-600/30 rounded-full px-4 py-1.5 text-xs text-emerald-300 mb-6" data-aos="fade-down">
            <i class="fas fa-users"></i> 3,000+ Grup Aktif
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Study</span><br>
            <span class="teks-gradien">Group</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Gabung grup belajar dengan teman seangkatan atau lintas jurusan. Jadwal terstruktur, sesi virtual & offline, collaborative tools, dan progress tracking — belajar lebih efektif bersama.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5">
                <i class="fas fa-plus-circle mr-2"></i>Buat Grup Baru
            </a>
            <a href="#jenis" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-search mr-2"></i>Cari Grup
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">3K+</div><div class="text-xs text-gray-500">Grup</div></div>
            <div><div class="text-2xl font-black text-white">15K+</div><div class="text-xs text-gray-500">Anggota</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Sesi/Bulan</div></div>
            <div><div class="text-2xl font-black text-white">Virtual</div><div class="text-xs text-gray-500">& Offline</div></div>
        </div>
    </div>
</section>

{{-- JENIS GRUP --}}
<section id="jenis" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">JENIS GRUP</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Temukan Grup Belajar Anda</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih jenis grup yang sesuai dengan tujuan dan gaya belajar Anda</p>
    </div>
    @php
    $jenis = [
        ['ikon' => 'fas fa-laptop-code', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Web Development', 'anggota' => 245, 'desc' => 'HTML, CSS, JS, React, Laravel — belajar bareng dari nol hingga deploy.'],
        ['ikon' => 'fas fa-database', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Data Science', 'anggota' => 189, 'desc' => 'Python, Pandas, ML, AI — analisis data dan machine learning bersama.'],
        ['ikon' => 'fas fa-mobile-alt', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Mobile Dev', 'anggota' => 156, 'desc' => 'Flutter, React Native, Kotlin — develop apps bareng dari desain ke publish.'],
        ['ikon' => 'fas fa-cloud', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'Cloud & DevOps', 'anggota' => 132, 'desc' => 'AWS, GCP, Docker, K8s — persiapan sertifikasi dan hands-on lab.'],
        ['ikon' => 'fas fa-calculator', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'Matematika', 'anggota' => 210, 'desc' => 'Kalkulus, Statistik, Aljabar Linear — sesi latihan soal dan diskusi.'],
        ['ikon' => 'fas fa-flask', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => 'Sains & Riset', 'anggota' => 98, 'desc' => 'Fisika, Kimia, Biologi — eksperimen virtual dan review jurnal bersama.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jenis as $i => $g)
        <div class="kaca rounded-2xl p-6 border-{{ $g['warna'] }}-500/20 hover:border-{{ $g['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $g['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="{{ $g['ikon'] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $g['judul'] }}</h3>
            <p class="text-{{ $g['warna'] }}-400 text-xs mb-3">{{ $g['anggota'] }} anggota aktif</p>
            <p class="text-gray-400 text-sm">{{ $g['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- CARA MEMBUAT GRUP --}}
<section class="bg-gradient-to-br from-emerald-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">PANDUAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Cara Membuat Study Group</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">4 langkah mudah untuk memulai grup belajar Anda sendiri</p>
        </div>
        @php
        $langkah = [
            ['step' => '01', 'ikon' => 'fas fa-edit', 'warna' => 'blue', 'judul' => 'Buat Grup', 'desc' => 'Pilih topik, beri nama grup, dan tulis deskripsi singkat tentang apa yang akan dipelajari.'],
            ['step' => '02', 'ikon' => 'fas fa-calendar-check', 'warna' => 'green', 'judul' => 'Atur Jadwal', 'desc' => 'Tetapkan jadwal belajar reguler — harian, mingguan, atau sesuai kebutuhan. Tentukan durasi dan zona waktu.'],
            ['step' => '03', 'ikon' => 'fas fa-user-friends', 'warna' => 'purple', 'judul' => 'Undang Anggota', 'desc' => 'Bagikan link undangan atau buka grup untuk publik. Atur batas maksimal anggota jika diperlukan.'],
            ['step' => '04', 'ikon' => 'fas fa-rocket', 'warna' => 'amber', 'judul' => 'Mulai Belajar', 'desc' => 'Mulai sesi pertama! Gunakan shared whiteboard, screen sharing, dan collaborative notes.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach($langkah as $i => $l)
            <div class="kaca rounded-2xl p-6 border-{{ $l['warna'] }}-500/20 text-center relative" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="text-5xl font-black text-{{ $l['warna'] }}-500/10 absolute top-4 right-4">{{ $l['step'] }}</div>
                <div class="w-14 h-14 bg-{{ $l['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="{{ $l['ikon'] }} text-{{ $l['warna'] }}-400 text-xl"></i></div>
                <h4 class="text-white font-bold text-lg mb-2">{{ $l['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STUDY TOOLS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">TOOLS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Study Tools Terintegrasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Alat kolaborasi yang membuat belajar bersama lebih produktif</p>
    </div>
    @php
    $tools = [
        ['ikon' => 'fas fa-chalkboard', 'warna' => 'blue', 'judul' => 'Shared Whiteboard', 'desc' => 'Papan tulis digital kolaboratif real-time untuk brainstorming dan penjelasan visual.'],
        ['ikon' => 'fas fa-video', 'warna' => 'green', 'judul' => 'Video Call', 'desc' => 'Sesi video call terintegrasi dengan screen sharing, recording, dan breakout rooms.'],
        ['ikon' => 'fas fa-sticky-note', 'warna' => 'amber', 'judul' => 'Collaborative Notes', 'desc' => 'Catatan bersama dengan Markdown support, highlight, dan export ke PDF.'],
        ['ikon' => 'fas fa-tasks', 'warna' => 'purple', 'judul' => 'Task Manager', 'desc' => 'Bagi tugas dan track progress setiap anggota. Deadline reminder otomatis.'],
        ['ikon' => 'fas fa-poll', 'warna' => 'pink', 'judul' => 'Quiz & Poll', 'desc' => 'Buat kuis cepat dan polling untuk menguji pemahaman sesama anggota grup.'],
        ['ikon' => 'fas fa-chart-line', 'warna' => 'cyan', 'judul' => 'Progress Tracker', 'desc' => 'Pantau progress belajar individual dan grup. Grafik dan analytics otomatis.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($tools as $i => $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
            <h4 class="text-white font-bold text-lg mb-2">{{ $t['judul'] }}</h4>
            <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- JADWAL SESI --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-emerald-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">JADWAL</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sesi Mendatang Minggu Ini</h2>
        </div>
        @php
        $sesi = [
            ['judul' => 'JavaScript Fundamentals — Closures & Promises', 'grup' => 'Web Development', 'waktu' => 'Sen, 19:00 WIB', 'peserta' => 24, 'warna' => 'blue'],
            ['judul' => 'Linear Algebra — Eigenvalues & Eigenvectors', 'grup' => 'Matematika', 'waktu' => 'Sel, 20:00 WIB', 'peserta' => 18, 'warna' => 'amber'],
            ['judul' => 'Python for Data Science — Pandas Deep Dive', 'grup' => 'Data Science', 'waktu' => 'Rab, 19:30 WIB', 'peserta' => 31, 'warna' => 'green'],
            ['judul' => 'Flutter UI — Custom Widgets & Animations', 'grup' => 'Mobile Dev', 'waktu' => 'Kam, 20:00 WIB', 'peserta' => 15, 'warna' => 'purple'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($sesi as $i => $s)
            <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex items-start justify-between mb-3">
                    <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $s['grup'] }}</span>
                    <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i>{{ $s['peserta'] }} peserta</span>
                </div>
                <h4 class="text-white font-bold text-lg mb-2">{{ $s['judul'] }}</h4>
                <p class="text-gray-500 text-sm"><i class="fas fa-clock mr-1"></i>{{ $s['waktu'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Study Group</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Efektif Belajar dalam Study Group', 'durasi' => '10:20', 'views' => '19K', 'warna' => 'emerald', 'thumb' => 'https://placehold.co/640x360/1a1a2e/10B981?text=Study+Tips'],
            ['judul' => 'Demo: Collaborative Tools KVT Hub', 'durasi' => '07:45', 'views' => '14K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Collab+Tools'],
            ['judul' => 'Sukses Belajar Bersama: Kisah Anggota', 'durasi' => '15:10', 'views' => '27K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Success+Story'],
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

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-emerald-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Gabung study group sesuai minat', 'Buat grup belajar sendiri', 'Akses shared whiteboard & notes', 'Track progress belajar', 'Jadwal sesi belajar reguler', 'Dapatkan XP dari partisipasi']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Buat grup kelas terstruktur', 'Assign tugas & deadline', 'Monitor progress siswa', 'Hosting sesi video call', 'Buat kuis untuk grup', 'Review & feedback kolaboratif']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua study group', 'Moderasi konten & anggota', 'Analytics grup real-time', 'Konfigurasi tools & integrasi', 'Set kapasitas & kebijakan', 'Laporan aktivitas & engagement']],
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

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Berapa jumlah maksimal anggota dalam satu grup?', 'a' => 'Secara default, satu study group bisa menampung hingga 50 anggota. Guru dan admin dapat mengatur batas ini sesuai kebutuhan, mulai dari 5 hingga 100 anggota.'],
        ['q' => 'Apakah sesi study group direkam?', 'a' => 'Ya, setiap sesi video call bisa direkam secara otomatis. Rekaman tersimpan di cloud dan bisa diakses kapan saja oleh anggota grup.'],
        ['q' => 'Bisa belajar offline juga?', 'a' => 'Tentu! Study group mendukung mode hybrid — virtual via video call dan offline dengan fitur lokasi meetup. Anda bisa mengatur preferensi di pengaturan grup.'],
        ['q' => 'Apakah ada biaya untuk membuat study group?', 'a' => 'Membuat dan bergabung study group sepenuhnya gratis. Fitur premium seperti unlimited recording dan advanced analytics tersedia untuk paket berbayar.'],
        ['q' => 'Bagaimana cara menemukan study group yang sesuai?', 'a' => 'Gunakan fitur search dan filter berdasarkan topik, jadwal, level (pemula/menengah/mahir), dan mode (virtual/offline). AI kami juga merekomendasikan grup berdasarkan minat Anda.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $i => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-emerald-400 text-sm group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-emerald-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Belajar Bersama Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Gabung dengan 15,000+ pelajar di 3,000+ study group aktif. Buat grup baru atau bergabung dengan yang sudah ada — gratis!</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Gabung Study Group
        </a>
    </div>
</section>

@endsection
