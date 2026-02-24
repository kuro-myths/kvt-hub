@extends('tata-letak.utama')
@section('judul', 'Repositori & Update Terbaru - KVT Hub')

@section('konten')
@php
    $changelog = [
        ['versi' => 'v8.2', 'tanggal' => '2026-02-24', 'tipe' => 'major', 'judul' => 'Repositori & File Browser', 'deskripsi' => 'Fitur baru admin repositori ala GitHub — file browser, statistik kode, riwayat commit, dan landing page repositori publik.', 'fitur' => ['Admin file browser dengan navigasi folder', 'Statistik kode otomatis (baris, tipe file)', 'Riwayat commit Git terintegrasi', 'Viewer file dengan nomor baris', 'Landing page repositori publik']],
        ['versi' => 'v8.1', 'tanggal' => '2026-02-24', 'tipe' => 'major', 'judul' => 'Massive Landing Page Enhancement', 'deskripsi' => 'Enhancement besar-besaran pada semua halaman landing page — beranda, laboratorium, kompetisi, forum, pelatihan, donasi, dan lainnya.', 'fitur' => ['Beranda +6 section baru (Roadmap, Leaderboard, Comparison)', 'Newsletter popup, Scroll-to-Top, Mobile Quick Action', '15+ halaman ditambah FAQ accordion', 'Testimonial di setiap halaman', '+2640 baris kode baru']],
        ['versi' => 'v8.0', 'tanggal' => '2026-02-23', 'tipe' => 'major', 'judul' => 'Header Split & VTuber Expansion', 'deskripsi' => 'Header dibagi menjadi 4 bagian dengan pagination 8 item/halaman. VTuber Kuro AI diperluas dengan 25+ kategori respons.', 'fitur' => ['4 header terpisah (Akademik, Ekosistem, Sumber Daya, Karakter)', 'Navigasi 40 menu dengan 8 item/page + dot indicator', 'VTuber Kuro 25+ kategori respons', 'Footer popup interaktif', 'Dashboard admin dengan Chart.js']],
        ['versi' => 'v7.0', 'tanggal' => '2026-02-22', 'tipe' => 'major', 'judul' => 'Ekosistem Lengkap', 'deskripsi' => 'Penambahan fitur ekosistem lengkap: 40 menu, sub-halaman pendidikan, riset, karir, komunitas, sertifikasi.', 'fitur' => ['40 menu & submenu lengkap', 'Halaman pendidikan dasar & tinggi', 'Sistem KRS & KHS akademik', 'Kuis interaktif real-time', 'Organisasi mahasiswa']],
        ['versi' => 'v6.0', 'tanggal' => '2026-02-20', 'tipe' => 'major', 'judul' => 'Akademik & Gamifikasi', 'deskripsi' => 'Platform akademik lengkap dengan sistem gamifikasi XP, level, dan pencapaian.', 'fitur' => ['Sistem XP & Level (Lv1-100)', 'Kelas online CRUD', 'Materi pembelajaran', 'Pencapaian & badge', 'Dashboard multi-role']],
        ['versi' => 'v5.0', 'tanggal' => '2026-02-18', 'tipe' => 'major', 'judul' => 'Multi-Role System', 'deskripsi' => 'Sistem multi-role lengkap: Admin, Pengajar, Staff, Mahasiswa dengan dashboard masing-masing.', 'fitur' => ['5 role pengguna', 'Dashboard per-role', 'Verifikasi akun', 'Manajemen pengguna admin', 'Kunci admin keamanan']],
    ];

    $techStack = [
        ['nama' => 'Laravel 11', 'ikon' => 'fab fa-laravel', 'warna' => 'red', 'deskripsi' => 'PHP Framework modern dengan fitur terbaru', 'versi' => '11.x'],
        ['nama' => 'PHP 8.3', 'ikon' => 'fab fa-php', 'warna' => 'indigo', 'deskripsi' => 'Bahasa server-side terbaru dengan performa tinggi', 'versi' => '8.3.x'],
        ['nama' => 'PostgreSQL', 'ikon' => 'fas fa-database', 'warna' => 'blue', 'deskripsi' => 'Database relasional powerful & reliable', 'versi' => '16.x'],
        ['nama' => 'TailwindCSS', 'ikon' => 'fab fa-css3-alt', 'warna' => 'cyan', 'deskripsi' => 'Utility-first CSS framework untuk UI modern', 'versi' => '3.x CDN'],
        ['nama' => 'Chart.js', 'ikon' => 'fas fa-chart-pie', 'warna' => 'amber', 'deskripsi' => 'Library grafik interaktif untuk visualisasi data', 'versi' => '4.x'],
        ['nama' => 'FontAwesome', 'ikon' => 'fab fa-font-awesome', 'warna' => 'kvt', 'deskripsi' => 'Koleksi ikon terlengkap untuk web', 'versi' => '6.5.x'],
        ['nama' => 'AOS.js', 'ikon' => 'fas fa-magic', 'warna' => 'purple', 'deskripsi' => 'Animate On Scroll library untuk animasi halus', 'versi' => '2.3.x'],
        ['nama' => 'Vite', 'ikon' => 'fas fa-bolt', 'warna' => 'yellow', 'deskripsi' => 'Build tool modern untuk asset bundling cepat', 'versi' => '5.x'],
    ];

    $projectStats = [
        ['label' => 'Total File', 'nilai' => '700+', 'ikon' => 'fas fa-file-code', 'warna' => 'kvt'],
        ['label' => 'Baris Kode', 'nilai' => '50,000+', 'ikon' => 'fas fa-align-left', 'warna' => 'green'],
        ['label' => 'Halaman', 'nilai' => '49+', 'ikon' => 'fas fa-browser', 'warna' => 'purple'],
        ['label' => 'Controller', 'nilai' => '40+', 'ikon' => 'fas fa-cogs', 'warna' => 'amber'],
        ['label' => 'Model', 'nilai' => '36', 'ikon' => 'fas fa-database', 'warna' => 'blue'],
        ['label' => 'Migrasi', 'nilai' => '30+', 'ikon' => 'fas fa-layer-group', 'warna' => 'teal'],
    ];

    $fiturUtama = [
        ['judul' => 'Multi-Role Dashboard', 'deskripsi' => 'Dashboard khusus untuk Admin, Pengajar, Staff, dan Mahasiswa dengan fitur sesuai peran.', 'ikon' => 'fas fa-columns', 'warna' => 'kvt'],
        ['judul' => 'Akademik Lengkap', 'deskripsi' => 'KRS, KHS, Nilai, Silabus, Kurikulum, Jadwal, dan sistem akademik terintegrasi.', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'green'],
        ['judul' => 'VTuber AI Kuro', 'deskripsi' => 'Asisten virtual AI dengan 25+ kategori percakapan, topicMap matching, dan persona unik.', 'ikon' => 'fas fa-robot', 'warna' => 'purple'],
        ['judul' => 'Gamifikasi XP/Level', 'deskripsi' => 'Sistem poin XP, 100 level, pencapaian, dan leaderboard untuk motivasi belajar.', 'ikon' => 'fas fa-trophy', 'warna' => 'yellow'],
        ['judul' => 'File Browser (GitHub-like)', 'deskripsi' => 'Admin bisa menjelajahi file proyek, melihat kode, statistik, dan riwayat commit.', 'ikon' => 'fab fa-github', 'warna' => 'gray'],
        ['judul' => 'Komunitas & Forum', 'deskripsi' => 'Forum diskusi, organisasi, study group, hackathon, dan jaringan alumni.', 'ikon' => 'fas fa-users', 'warna' => 'pink'],
        ['judul' => 'Kuis Interaktif', 'deskripsi' => 'Kuis real-time dengan timer, skor otomatis, dan analisis jawaban.', 'ikon' => 'fas fa-question-circle', 'warna' => 'emerald'],
        ['judul' => 'Laporan & Diagram', 'deskripsi' => 'Diagram builder drag-and-drop, ekspor PDF/Excel, visualisasi Chart.js.', 'ikon' => 'fas fa-chart-bar', 'warna' => 'orange'],
        ['judul' => 'Cerita & Karakter', 'deskripsi' => 'Universe KVT Hub dengan 3 karakter utama: Kuro, Bejotaro, dan Veteran.', 'ikon' => 'fas fa-book-dead', 'warna' => 'violet'],
    ];

    $kontributor = [
        ['nama' => 'KVT Hub Team', 'peran' => 'Core Developer', 'avatar' => 'KH', 'commits' => '200+'],
    ];
@endphp

{{-- ===== HERO ===== --}}
<section class="min-h-[70vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-purple-950"></div>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-kvt-500 rounded-full filter blur-[100px]"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-600 rounded-full filter blur-[120px]"></div>
    </div>

    <div class="max-w-6xl mx-auto px-6 py-20 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 bg-kvt-800/60 px-4 py-2 rounded-full text-kvt-300 text-sm mb-6 border border-kvt-700/30" data-aos="fade-down">
            <i class="fab fa-github"></i>
            <span>Open Source Project</span>
            <span class="bg-green-500/20 text-green-400 px-2 py-0.5 rounded-full text-xs font-bold ml-1">LIVE</span>
        </div>

        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight" data-aos="fade-up">
            <span class="teks-gradien">KVT Hub</span>
            <br>
            <span class="text-white text-2xl md:text-4xl font-semibold">Repositori & Update Terbaru</span>
        </h1>

        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            Lihat perkembangan terbaru platform KVT Hub — changelog versi, teknologi yang digunakan,
            statistik kode, dan arsitektur proyek secara menyeluruh.
        </p>

        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="px-8 py-4 bg-gradient-to-r from-kvt-600 to-kvt-500 hover:from-kvt-500 hover:to-kvt-400 text-white font-bold rounded-xl transition-all hover:scale-105 shadow-lg shadow-kvt-600/30 flex items-center gap-2">
                <i class="fab fa-github text-lg"></i> Lihat di GitHub
            </a>
            <a href="#changelog" class="px-8 py-4 bg-kvt-800/60 hover:bg-kvt-700/60 text-white font-bold rounded-xl transition border border-kvt-700/30 flex items-center gap-2">
                <i class="fas fa-history"></i> Lihat Changelog
            </a>
        </div>
    </div>
</section>

{{-- ===== STATISTIK PROYEK ===== --}}
<section class="py-16 bg-kvt-950">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @foreach($projectStats as $i => $stat)
            <div class="kaca rounded-xl p-5 text-center hover:scale-105 transition-transform" data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 bg-{{ $stat['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <i class="{{ $stat['ikon'] }} text-{{ $stat['warna'] }}-400 text-xl"></i>
                </div>
                <div class="text-2xl font-bold text-white">{{ $stat['nilai'] }}</div>
                <div class="text-sm text-gray-400 mt-1">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CHANGELOG / UPDATE TERBARU ===== --}}
<section id="changelog" class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-emerald-500/20 text-emerald-400 rounded-full text-sm font-semibold">
                <i class="fas fa-history mr-1"></i> Changelog
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Update Terbaru</h2>
            <p class="text-gray-400 mt-3">Riwayat perubahan dan fitur baru di setiap versi KVT Hub</p>
        </div>

        <div class="relative">
            {{-- Timeline line --}}
            <div class="absolute left-6 md:left-8 top-0 bottom-0 w-0.5 bg-gradient-to-b from-kvt-500 via-purple-500 to-emerald-500 hidden sm:block"></div>

            <div class="space-y-8">
                @foreach($changelog as $i => $log)
                <div class="relative flex gap-6 md:gap-8" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    {{-- Timeline dot --}}
                    <div class="hidden sm:flex flex-col items-center z-10">
                        <div class="w-12 h-12 md:w-16 md:h-16 rounded-xl flex items-center justify-center shrink-0
                            {{ $i === 0 ? 'bg-gradient-to-br from-kvt-500 to-purple-600 shadow-lg shadow-kvt-500/30' : 'bg-kvt-800 border border-kvt-700/30' }}">
                            <span class="text-white font-bold text-xs md:text-sm">{{ $log['versi'] }}</span>
                        </div>
                    </div>

                    {{-- Content card --}}
                    <div class="flex-1 kaca rounded-2xl p-6 hover:border-kvt-500/30 transition {{ $i === 0 ? 'ring-1 ring-kvt-500/30' : '' }}">
                        <div class="flex items-start justify-between gap-4 mb-3">
                            <div>
                                <div class="flex items-center gap-2 mb-1">
                                    <span class="sm:hidden px-2 py-0.5 bg-kvt-600 text-white text-xs font-bold rounded">{{ $log['versi'] }}</span>
                                    <span class="px-2 py-0.5 rounded text-xs font-bold
                                        {{ $log['tipe'] === 'major' ? 'bg-emerald-500/20 text-emerald-400' : 'bg-amber-500/20 text-amber-400' }}">
                                        {{ strtoupper($log['tipe']) }}
                                    </span>
                                    @if($i === 0)
                                    <span class="px-2 py-0.5 bg-kvt-500/20 text-kvt-400 rounded text-xs font-bold animate-pulse">TERBARU</span>
                                    @endif
                                </div>
                                <h3 class="text-white font-bold text-xl">{{ $log['judul'] }}</h3>
                            </div>
                            <span class="text-gray-500 text-sm whitespace-nowrap">{{ $log['tanggal'] }}</span>
                        </div>

                        <p class="text-gray-400 mb-4">{{ $log['deskripsi'] }}</p>

                        <div class="space-y-2">
                            @foreach($log['fitur'] as $fitur)
                            <div class="flex items-center gap-2 text-sm">
                                <i class="fas fa-check-circle text-emerald-400 text-xs"></i>
                                <span class="text-gray-300">{{ $fitur }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== FITUR UTAMA ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-purple-500/20 text-purple-400 rounded-full text-sm font-semibold">
                <i class="fas fa-rocket mr-1"></i> Fitur Utama
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Yang Ada di KVT Hub</h2>
            <p class="text-gray-400 mt-3">Semua fitur utama yang tersedia di platform</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($fiturUtama as $i => $fitur)
            <div class="kaca rounded-2xl p-6 hover:border-{{ $fitur['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                <div class="w-14 h-14 bg-{{ $fitur['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="{{ $fitur['ikon'] }} text-{{ $fitur['warna'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $fitur['judul'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $fitur['deskripsi'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== TECH STACK ===== --}}
<section class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-cyan-500/20 text-cyan-400 rounded-full text-sm font-semibold">
                <i class="fas fa-microchip mr-1"></i> Tech Stack
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Teknologi yang Digunakan</h2>
            <p class="text-gray-400 mt-3">Stack modern untuk performa dan pengalaman terbaik</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($techStack as $i => $tech)
            <div class="kaca rounded-2xl p-6 hover:scale-105 transition-transform group" data-aos="zoom-in" data-aos-delay="{{ $i * 60 }}">
                <div class="flex items-center gap-4 mb-3">
                    <div class="w-12 h-12 bg-{{ $tech['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:rotate-12 transition-transform">
                        <i class="{{ $tech['ikon'] }} text-{{ $tech['warna'] }}-400 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold">{{ $tech['nama'] }}</h4>
                        <span class="text-xs text-gray-500">{{ $tech['versi'] }}</span>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">{{ $tech['deskripsi'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== ARSITEKTUR PROYEK ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-amber-500/20 text-amber-400 rounded-full text-sm font-semibold">
                <i class="fas fa-project-diagram mr-1"></i> Arsitektur
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Struktur Proyek</h2>
            <p class="text-gray-400 mt-3">Arsitektur MVC Laravel dengan organisasi modul yang rapi</p>
        </div>

        <div class="kaca rounded-2xl p-6 md:p-8 overflow-x-auto" data-aos="fade-up">
            <div class="font-mono text-sm space-y-1 min-w-[500px]">
                <div class="text-kvt-400 font-bold text-lg mb-4">📦 kvt-hub/</div>
                @php
                    $struktur = [
                        ['├── app/', '', 'Logika Aplikasi'],
                        ['│   ├── Http/Controllers/', '40+', 'Admin, Landing, Auth controllers'],
                        ['│   ├── Models/', '36', 'Eloquent models (User, Kelas, Materi…)'],
                        ['│   └── Providers/', '1', 'Service providers'],
                        ['├── config/', '10', 'Konfigurasi app, auth, database…'],
                        ['├── database/', '', 'Migrasi & Seeder'],
                        ['│   ├── migrations/', '30+', 'Schema tabel PostgreSQL'],
                        ['│   ├── seeders/', '5+', 'Data awal (AkunSeeder, dll)'],
                        ['│   └── factories/', '1', 'UserFactory'],
                        ['├── resources/views/', '', 'Blade Templates'],
                        ['│   ├── tata-letak/', '5', 'Layout: utama, dasbor, sidebar…'],
                        ['│   ├── halaman/', '49+', 'Landing pages publik'],
                        ['│   ├── akun/', '20+', 'Dashboard admin/pengajar/staff'],
                        ['│   └── beranda/', '1', 'Homepage (1500+ baris)'],
                        ['├── routes/', '6', 'web, admin, pengajar, staff, pengguna'],
                        ['├── public/', '', 'Assets, gambar, models 3D'],
                        ['├── docs/', '5', 'Dokumentasi proyek'],
                        ['├── scripts/', '2', 'Auto-commit scripts'],
                        ['├── tests/', '3', 'PHPUnit tests'],
                        ['└── vendor/', '', 'Composer dependencies'],
                    ];
                @endphp

                @foreach($struktur as $item)
                <div class="flex items-start gap-4 py-1 hover:bg-kvt-800/20 rounded px-2 transition">
                    <span class="text-amber-400 whitespace-pre">{{ $item[0] }}</span>
                    @if($item[1])
                    <span class="text-kvt-400 bg-kvt-800 px-2 py-0.5 rounded text-xs shrink-0">{{ $item[1] }}</span>
                    @endif
                    <span class="text-gray-500 text-xs mt-0.5">{{ $item[2] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ===== CARA BERKONTRIBUSI ===== --}}
<section class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-green-500/20 text-green-400 rounded-full text-sm font-semibold">
                <i class="fas fa-hands-helping mr-1"></i> Kontribusi
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Cara Berkontribusi</h2>
            <p class="text-gray-400 mt-3">Ingin ikut membangun KVT Hub? Ikuti langkah berikut</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @php
                $langkah = [
                    ['no' => '01', 'judul' => 'Fork Repository', 'deskripsi' => 'Fork repository KVT Hub dari GitHub ke akun Anda.', 'kode' => 'git clone https://github.com/your-username/kvt-hub.git', 'ikon' => 'fas fa-code-branch', 'warna' => 'kvt'],
                    ['no' => '02', 'judul' => 'Buat Branch Baru', 'deskripsi' => 'Buat branch fitur baru dari main.', 'kode' => 'git checkout -b fitur/nama-fitur-baru', 'ikon' => 'fas fa-plus', 'warna' => 'green'],
                    ['no' => '03', 'judul' => 'Commit Perubahan', 'deskripsi' => 'Commit dengan pesan yang deskriptif.', 'kode' => 'git commit -m "feat: tambah fitur baru xyz"', 'ikon' => 'fas fa-save', 'warna' => 'amber'],
                    ['no' => '04', 'judul' => 'Push & Pull Request', 'deskripsi' => 'Push ke fork dan buat Pull Request ke repo utama.', 'kode' => 'git push origin fitur/nama-fitur-baru', 'ikon' => 'fas fa-paper-plane', 'warna' => 'purple'],
                ];
            @endphp

            @foreach($langkah as $i => $step)
            <div class="kaca rounded-2xl p-6 hover:border-{{ $step['warna'] }}-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-{{ $step['warna'] }}-500/20 rounded-xl flex items-center justify-center">
                        <i class="{{ $step['ikon'] }} text-{{ $step['warna'] }}-400 text-xl"></i>
                    </div>
                    <div>
                        <span class="text-xs text-gray-500 font-semibold">LANGKAH {{ $step['no'] }}</span>
                        <h3 class="text-white font-bold text-lg">{{ $step['judul'] }}</h3>
                    </div>
                </div>
                <p class="text-gray-400 text-sm mb-3">{{ $step['deskripsi'] }}</p>
                <div class="bg-kvt-950 rounded-xl p-3 font-mono text-sm text-kvt-400 flex items-center gap-2 overflow-x-auto">
                    <span class="text-gray-600 select-none">$</span>
                    <code>{{ $step['kode'] }}</code>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== QUICK LINKS ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-rose-500/20 text-rose-400 rounded-full text-sm font-semibold">
                <i class="fas fa-link mr-1"></i> Link Penting
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Akses Cepat</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5" data-aos="fade-up">
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="kaca rounded-2xl p-6 hover:border-gray-500/30 transition group text-center">
                <i class="fab fa-github text-4xl text-gray-400 group-hover:text-white transition mb-3 block"></i>
                <h4 class="text-white font-bold">GitHub Repo</h4>
                <p class="text-gray-500 text-sm mt-1">Source code lengkap</p>
            </a>
            <a href="https://github.com/kuro-myths/kvt-hub/issues" target="_blank" class="kaca rounded-2xl p-6 hover:border-green-500/30 transition group text-center">
                <i class="fas fa-bug text-4xl text-green-400 group-hover:text-green-300 transition mb-3 block"></i>
                <h4 class="text-white font-bold">Issues</h4>
                <p class="text-gray-500 text-sm mt-1">Laporkan bug & saran</p>
            </a>
            <a href="https://github.com/kuro-myths/kvt-hub/pulls" target="_blank" class="kaca rounded-2xl p-6 hover:border-purple-500/30 transition group text-center">
                <i class="fas fa-code-branch text-4xl text-purple-400 group-hover:text-purple-300 transition mb-3 block"></i>
                <h4 class="text-white font-bold">Pull Requests</h4>
                <p class="text-gray-500 text-sm mt-1">Kontribusi kode</p>
            </a>
            <a href="{{ route('halaman.statistik') }}" class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition group text-center">
                <i class="fas fa-chart-line text-4xl text-kvt-400 group-hover:text-kvt-300 transition mb-3 block"></i>
                <h4 class="text-white font-bold">Statistik Platform</h4>
                <p class="text-gray-500 text-sm mt-1">Lihat data real-time</p>
            </a>
        </div>
    </div>
</section>

{{-- ===== FAQ ===== --}}
<section class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-kvt-500/20 text-kvt-400 rounded-full text-sm font-semibold">
                <i class="fas fa-question-circle mr-1"></i> FAQ
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Pertanyaan Umum</h2>
        </div>

        @php
            $faqs = [
                ['q' => 'Apakah KVT Hub open source?', 'a' => 'Ya! KVT Hub adalah proyek open source yang bisa dilihat, di-fork, dan dikontribusikan oleh siapa saja melalui GitHub.'],
                ['q' => 'Bagaimana cara menjalankan secara lokal?', 'a' => 'Clone repository, jalankan composer install, copy .env, generate key, setup database PostgreSQL, jalankan migrasi, lalu php artisan serve.'],
                ['q' => 'Teknologi apa yang digunakan?', 'a' => 'Laravel 11, PHP 8.3, PostgreSQL, TailwindCSS (CDN), Chart.js v4, FontAwesome 6, AOS.js, dan Vite sebagai build tool.'],
                ['q' => 'Bagaimana cara berkontribusi?', 'a' => 'Fork repository, buat branch baru, commit perubahan, lalu buat Pull Request. Pastikan mengikuti coding standards yang ada.'],
                ['q' => 'Apakah ada dokumentasi API?', 'a' => 'Saat ini KVT Hub menggunakan server-side rendering dengan Blade. Dokumentasi tersedia di folder docs/ dalam repository.'],
                ['q' => 'Seberapa sering update dirilis?', 'a' => 'Update dirilis secara berkala. Setiap versi major membawa fitur baru signifikan. Lihat changelog di atas untuk detail.'],
            ];
        @endphp

        <div class="space-y-3" data-aos="fade-up">
            @foreach($faqs as $faq)
            <div class="kaca rounded-xl overflow-hidden faq-item">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-sm faq-chevron transition-transform duration-300"></i>
                </button>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4 text-gray-400 text-sm">{{ $faq['a'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="zoom-in">
        <div class="kaca rounded-3xl p-10 md:p-14 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-kvt-600/10 to-purple-600/10"></div>
            <div class="relative z-10">
                <i class="fab fa-github text-6xl text-kvt-400 mb-6 block"></i>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Mulai Eksplorasi Sekarang</h2>
                <p class="text-gray-400 max-w-2xl mx-auto mb-8">
                    Jelajahi source code, pelajari arsitektur, dan bantu kami membangun platform edukasi terbaik Indonesia.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="px-8 py-4 bg-gradient-to-r from-kvt-600 to-purple-600 hover:from-kvt-500 hover:to-purple-500 text-white font-bold rounded-xl transition-all hover:scale-105 shadow-lg shadow-kvt-600/30">
                        <i class="fab fa-github mr-2"></i> Buka GitHub
                    </a>
                    <a href="{{ route('beranda') }}" class="px-8 py-4 bg-kvt-800/60 hover:bg-kvt-700/60 text-white font-bold rounded-xl transition border border-kvt-700/30">
                        <i class="fas fa-home mr-2"></i> Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.faq-open .faq-chevron { transform: rotate(180deg); }
.faq-open .faq-answer { max-height: 200px; }
</style>
@endpush
@endsection
