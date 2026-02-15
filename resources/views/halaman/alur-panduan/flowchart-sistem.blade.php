@extends('tata-letak.utama')
@section('judul', 'Flowchart Sistem - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-violet-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-violet-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-fuchsia-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #8B5CF6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-violet-800/30 border border-violet-600/30 rounded-full px-4 py-1.5 text-xs text-violet-300 mb-6" data-aos="fade-down">
            <i class="fas fa-project-diagram"></i> Arsitektur & Alur Sistem Internal
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Flowchart</span><br>
            <span class="teks-gradien">Sistem KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Visualisasi arsitektur dan alur kerja internal platform KVT Hub. Pahami bagaimana setiap modul
            saling terhubung — dari autentikasi, manajemen kelas, kuis, laporan, hingga kehadiran.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#arsitektur" class="bg-gradient-to-r from-violet-500 to-fuchsia-500 hover:from-violet-400 hover:to-fuchsia-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-violet-500/30 hover:-translate-y-0.5">
                <i class="fas fa-sitemap mr-2"></i>Lihat Arsitektur
            </a>
            <a href="#modul" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-cubes mr-2"></i>Modul Sistem
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">6</div><div class="text-xs text-gray-500">Modul Utama</div></div>
            <div><div class="text-2xl font-black text-white">15+</div><div class="text-xs text-gray-500">Alur Proses</div></div>
            <div><div class="text-2xl font-black text-white">3</div><div class="text-xs text-gray-500">Layer Arsitektur</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Endpoint API</div></div>
        </div>
    </div>
</section>

{{-- ARSITEKTUR SISTEM --}}
<section id="arsitektur" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-14" data-aos="fade-up">
        <span class="text-xs bg-violet-500/10 text-violet-400 px-3 py-1 rounded-full">ARSITEKTUR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">System Architecture Diagram</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tiga layer utama yang membentuk fondasi platform KVT Hub</p>
    </div>
    @php
    $layers = [
        ['judul' => 'Presentation Layer', 'warna' => 'blue', 'ikon' => 'fas fa-desktop', 'komponen' => ['Blade Templates + Tailwind CSS', 'Alpine.js Interactivity', 'AOS Scroll Animations', 'Responsive Glassmorphism UI']],
        ['judul' => 'Application Layer', 'warna' => 'violet', 'ikon' => 'fas fa-cogs', 'komponen' => ['Laravel 12 Controllers', 'Middleware Auth & Role-Based', 'Eloquent ORM Models', 'Route & Request Validation']],
        ['judul' => 'Data Layer', 'warna' => 'emerald', 'ikon' => 'fas fa-database', 'komponen' => ['MySQL / MariaDB Database', 'Migration & Seeder', 'File Storage (gambar/dokumen)', 'Session & Cache Management']],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($layers as $i => $l)
        <div class="kaca rounded-2xl p-6 border-{{ $l['warna'] }}-500/20 hover:border-{{ $l['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="flex flex-col md:flex-row md:items-center gap-5">
                <div class="flex items-center gap-4 md:w-1/3">
                    <div class="w-14 h-14 bg-{{ $l['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0"><i class="{{ $l['ikon'] }} text-{{ $l['warna'] }}-400 text-xl"></i></div>
                    <div>
                        <span class="text-{{ $l['warna'] }}-400 text-xs font-mono">LAYER {{ $i + 1 }}</span>
                        <h3 class="text-white font-bold text-lg">{{ $l['judul'] }}</h3>
                    </div>
                </div>
                <div class="hidden md:block text-2xl text-kvt-700"><i class="fas fa-arrow-right"></i></div>
                <div class="flex flex-wrap gap-2 md:w-2/3">
                    @foreach($l['komponen'] as $k)
                    <span class="bg-{{ $l['warna'] }}-500/10 text-{{ $l['warna'] }}-300 text-xs px-3 py-1.5 rounded-lg border border-{{ $l['warna'] }}-500/20">{{ $k }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @if($i < count($layers) - 1)
        <div class="flex justify-center text-kvt-700 text-xl" data-aos="fade-up"><i class="fas fa-arrow-down"></i></div>
        @endif
        @endforeach
    </div>
</section>

{{-- FLOWCHART MODUL --}}
<section id="modul" class="bg-gradient-to-br from-violet-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-fuchsia-500/10 text-fuchsia-400 px-3 py-1 rounded-full">MODUL FLOWCHART</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Flowchart per Modul Sistem</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Diagram alur untuk setiap modul fungsional dalam platform</p>
        </div>
        @php
        $modul = [
            ['ikon' => 'fas fa-key', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'Auth & Role Management', 'desc' => 'Autentikasi pengguna dan manajemen peran akses.', 'flow' => ['User membuka halaman Login/Daftar', 'Input kredensial (email + password)', 'Sistem validasi → Hash bcrypt', 'Cek role: Siswa / Guru / Admin', 'Redirect ke dashboard sesuai peran', 'Session + Remember Token aktif']],
            ['ikon' => 'fas fa-chalkboard', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Manajemen Kelas', 'desc' => 'CRUD kelas dan enrollment siswa.', 'flow' => ['Guru buat kelas (nama, deskripsi, cover)', 'Sistem generate kode kelas unik', 'Siswa cari & daftar ke kelas', 'Guru approve / auto-accept siswa', 'Kelas aktif → materi & kuis tersedia', 'Monitoring progress semua peserta']],
            ['ikon' => 'fas fa-clipboard-check', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Sistem Kuis & Asesmen', 'desc' => 'Pembuatan, pengerjaan, dan penilaian kuis otomatis.', 'flow' => ['Guru buat kuis (PG/essay/campuran)', 'Set waktu, bobot, & kunci jawaban', 'Siswa buka kuis → timer aktif', 'Submit jawaban → auto-grading PG', 'Guru review essay & beri skor', 'Hasil & pembahasan tersedia']],
            ['ikon' => 'fas fa-chart-bar', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Laporan & Analitik', 'desc' => 'Generasi laporan dengan 30+ jenis visualisasi.', 'flow' => ['Guru/Admin pilih jenis laporan', 'Filter: kelas, periode, siswa', 'Sistem query data dari database', 'Generate chart (bar/line/pie/radar)', 'Render ke dashboard real-time', 'Export PDF / Excel tersedia']],
            ['ikon' => 'fas fa-calendar-check', 'warna' => 'teal', 'gradien' => 'from-teal-500 to-cyan-500', 'judul' => 'Kehadiran & Absensi', 'desc' => 'Pencatatan dan rekap kehadiran peserta.', 'flow' => ['Guru buka sesi kehadiran kelas', 'Pilih tanggal & mata pelajaran', 'Input status: Hadir / Izin / Alpa', 'Sistem hitung persentase kehadiran', 'Alert jika kehadiran < 75%', 'Rekap kehadiran per semester']],
            ['ikon' => 'fas fa-book-open', 'warna' => 'rose', 'gradien' => 'from-rose-500 to-pink-500', 'judul' => 'Materi & Konten', 'desc' => 'Upload, organisasi, dan distribusi materi pembelajaran.', 'flow' => ['Guru upload materi ke kelas', 'Pilih tipe: Video / PDF / Teks', 'Sistem simpan ke storage + database', 'Siswa akses & baca/tonton materi', 'Tandai progress (selesai/belum)', 'Tracking completion rate per siswa']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($modul as $m)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $m['warna'] }}-500/20 hover:border-{{ $m['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $m['gradien'] }} p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="{{ $m['ikon'] }} text-white text-lg"></i></div>
                    <div><h3 class="text-white font-bold text-sm">{{ $m['judul'] }}</h3><p class="text-white/70 text-xs">{{ $m['desc'] }}</p></div>
                </div>
                <div class="p-5">
                    <div class="relative pl-6 space-y-3">
                        <div class="absolute left-2 top-1 bottom-1 w-0.5 bg-{{ $m['warna'] }}-500/30"></div>
                        @foreach($m['flow'] as $i => $step)
                        <div class="relative flex items-start gap-2">
                            <div class="absolute -left-6 top-0.5 w-4 h-4 bg-{{ $m['warna'] }}-500/30 rounded-full flex items-center justify-center"><div class="w-2 h-2 bg-{{ $m['warna'] }}-400 rounded-full"></div></div>
                            <span class="text-{{ $m['warna'] }}-400 text-xs font-mono mr-1">{{ $i + 1 }}.</span>
                            <span class="text-gray-300 text-xs">{{ $step }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DATA FLOW DIAGRAM --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">DATA FLOW</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Diagram Alur Data</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Bagaimana data mengalir di antara entitas dalam sistem KVT Hub</p>
    </div>
    @php
    $dataFlows = [
        ['dari' => 'User (Browser)', 'ke' => 'Laravel Router', 'data' => 'HTTP Request, Form Data, Auth Token', 'ikon' => 'fas fa-user', 'warna' => 'blue'],
        ['dari' => 'Router', 'ke' => 'Middleware', 'data' => 'Route Matching, CSRF Validation, Auth Check', 'ikon' => 'fas fa-route', 'warna' => 'amber'],
        ['dari' => 'Middleware', 'ke' => 'Controller', 'data' => 'Validated Request, User Session, Role Data', 'ikon' => 'fas fa-shield-alt', 'warna' => 'green'],
        ['dari' => 'Controller', 'ke' => 'Model (Eloquent)', 'data' => 'Query Builder, Relationships, Eager Load', 'ikon' => 'fas fa-code', 'warna' => 'violet'],
        ['dari' => 'Model', 'ke' => 'Database (MySQL)', 'data' => 'SQL Queries, Migrations, Transactions', 'ikon' => 'fas fa-database', 'warna' => 'rose'],
        ['dari' => 'Controller', 'ke' => 'Blade View', 'data' => 'Compact Data, View Variables, JSON Response', 'ikon' => 'fas fa-file-code', 'warna' => 'cyan'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($dataFlows as $i => $d)
        <div class="kaca rounded-xl p-5 border-{{ $d['warna'] }}-500/20 hover:border-{{ $d['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 bg-{{ $d['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $d['ikon'] }} text-{{ $d['warna'] }}-400 text-sm"></i></div>
                <div class="flex items-center gap-2 text-sm">
                    <span class="text-white font-semibold">{{ $d['dari'] }}</span>
                    <i class="fas fa-arrow-right text-{{ $d['warna'] }}-500/50 text-xs"></i>
                    <span class="text-{{ $d['warna'] }}-400 font-semibold">{{ $d['ke'] }}</span>
                </div>
            </div>
            <p class="text-gray-500 text-xs">{{ $d['data'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-violet-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">AKSES PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hak Akses Modul per Peran</h2>
        </div>
        @php
        $akses = [
            ['peran' => 'Siswa', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'modul' => ['Dashboard pribadi & progress', 'Baca materi & tonton video', 'Kerjakan kuis & lihat hasil', 'Lihat kehadiran sendiri', 'Kumpulkan badge & XP', 'Download sertifikat digital']],
            ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'modul' => ['CRUD kelas & materi', 'Buat & kelola kuis', 'Input & rekap kehadiran', 'Generate 30+ jenis laporan', 'Review & grading jawaban', 'Mentoring & feedback siswa']],
            ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'modul' => ['Kelola semua pengguna & peran', 'CRUD berita, mitra, sponsor', 'Konfigurasi paket & langganan', 'Analytics & statistik platform', 'Keamanan & kunci admin', 'Audit log & sistem monitoring']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($akses as $a)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $a['gradien'] }} p-5 text-center">
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-2"><i class="{{ $a['ikon'] }} text-white text-xl"></i></div>
                    <h3 class="text-white font-bold text-lg">{{ $a['peran'] }}</h3>
                </div>
                <div class="p-6 space-y-3">
                    @foreach($a['modul'] as $m)
                    <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $a['warna'] }}-400 text-xs mt-1"></i>{{ $m }}</div>
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
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Seputar Sistem</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Teknologi apa yang digunakan KVT Hub?', 'a' => 'KVT Hub dibangun dengan Laravel 12, Tailwind CSS, Alpine.js, MySQL/MariaDB, dan dihosting menggunakan infrastruktur cloud modern.'],
        ['q' => 'Apakah sistem mendukung scalability?', 'a' => 'Ya. Arsitektur KVT Hub dirancang modular sehingga dapat di-scale horizontal maupun vertikal sesuai kebutuhan pengguna.'],
        ['q' => 'Bagaimana keamanan data pengguna dijamin?', 'a' => 'Data dienkripsi dengan bcrypt untuk password, CSRF protection, XSS filtering, rate limiting, dan audit log untuk setiap perubahan kritis.'],
        ['q' => 'Apakah tersedia API untuk integrasi?', 'a' => 'Saat ini KVT Hub menggunakan server-side rendering dengan Blade. API RESTful sedang dalam pengembangan untuk integrasi pihak ketiga.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $f)
        <details class="kaca rounded-xl group" data-aos="fade-up">
            <summary class="cursor-pointer p-5 flex items-center justify-between text-white font-semibold text-sm">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition text-xs"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-700/50 pt-3">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-violet-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Pahami Sistem, Kuasai Platform</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Dengan memahami arsitektur dan alur sistem, Anda dapat memanfaatkan KVT Hub secara maksimal.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-violet-500 to-fuchsia-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-violet-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Mulai Gunakan KVT Hub
        </a>
    </div>
</section>

@endsection
