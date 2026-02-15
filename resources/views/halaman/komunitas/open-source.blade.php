@extends('tata-letak.utama')
@section('judul', 'Open Source - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-gray-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-gray-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #9CA3AF 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-gray-800/50 border border-gray-600/30 rounded-full px-4 py-1.5 text-xs text-gray-300 mb-6" data-aos="fade-down">
            <i class="fab fa-github"></i> 500+ Kontributor Global
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Open</span><br>
            <span class="teks-gradien">Source</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Berkontribusi ke proyek open source KVT Hub dan komunitas. Belajar kolaborasi, Git workflow, code review, dan bangun portofolio GitHub Anda bersama maintainer berpengalaman.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-gray-600 to-gray-800 hover:from-gray-500 hover:to-gray-700 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-gray-500/30 hover:-translate-y-0.5">
                <i class="fab fa-github mr-2"></i>Mulai Berkontribusi
            </a>
            <a href="#proyek" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-code-branch mr-2"></i>Lihat Repositori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">25+</div><div class="text-xs text-gray-500">Repositori</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Kontributor</div></div>
            <div><div class="text-2xl font-black text-white">4K+</div><div class="text-xs text-gray-500">GitHub Stars</div></div>
            <div><div class="text-2xl font-black text-white">MIT</div><div class="text-xs text-gray-500">Lisensi</div></div>
        </div>
    </div>
</section>

{{-- FEATURED PROJECTS --}}
<section id="proyek" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">REPOSITORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Proyek Open Source Unggulan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kontribusi ke proyek yang sesuai dengan keahlian dan minat Anda</p>
    </div>
    @php
    $proyek = [
        ['ikon' => 'fas fa-book-open', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'KVT LMS Core', 'bahasa' => 'PHP / Laravel', 'bintang' => '1.2K', 'desc' => 'Platform pembelajaran inti KVT Hub. Fitur kelas, kuis, dan laporan.', 'issues' => 34],
        ['ikon' => 'fas fa-palette', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => 'KVT UI Kit', 'bahasa' => 'Tailwind CSS', 'bintang' => '890', 'desc' => 'Komponen UI dengan dark theme dan glassmorphism untuk ekosistem KVT.', 'issues' => 18],
        ['ikon' => 'fas fa-robot', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'KVT AI Engine', 'bahasa' => 'Python', 'bintang' => '650', 'desc' => 'Engine AI untuk rekomendasi pembelajaran dan analitik prediktif.', 'issues' => 21],
        ['ikon' => 'fas fa-mobile-alt', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'KVT Mobile', 'bahasa' => 'Flutter', 'bintang' => '430', 'desc' => 'Aplikasi mobile cross-platform untuk akses pembelajaran mobile.', 'issues' => 15],
        ['ikon' => 'fas fa-plug', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'KVT API', 'bahasa' => 'Node.js', 'bintang' => '520', 'desc' => 'REST & GraphQL API untuk integrasi pihak ketiga dan developer.', 'issues' => 27],
        ['ikon' => 'fas fa-file-alt', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'KVT Docs', 'bahasa' => 'Markdown', 'bintang' => '310', 'desc' => 'Dokumentasi lengkap, tutorial, dan panduan kontribusi.', 'issues' => 12],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($proyek as $i => $p)
        <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $p['gradien'] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition"><i class="{{ $p['ikon'] }} text-white text-xl"></i></div>
                <div class="flex items-center gap-3 text-xs text-gray-500">
                    <span><i class="fas fa-star text-yellow-400 mr-1"></i>{{ $p['bintang'] }}</span>
                    <span><i class="fas fa-exclamation-circle text-{{ $p['warna'] }}-400 mr-1"></i>{{ $p['issues'] }} issues</span>
                </div>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $p['judul'] }}</h3>
            <span class="text-xs bg-{{ $p['warna'] }}-500/10 text-{{ $p['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $p['bahasa'] }}</span>
            <p class="text-gray-400 text-sm mt-3">{{ $p['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- CONTRIBUTION GUIDE --}}
<section class="bg-gradient-to-br from-gray-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">PANDUAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Cara Berkontribusi</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">5 langkah mudah untuk mulai berkontribusi ke proyek open source KVT</p>
        </div>
        @php
        $langkah = [
            ['step' => '01', 'ikon' => 'fas fa-code-branch', 'warna' => 'blue', 'judul' => 'Fork & Clone', 'desc' => 'Fork repositori yang ingin Anda kontribusi, lalu clone ke local machine.'],
            ['step' => '02', 'ikon' => 'fas fa-search', 'warna' => 'green', 'judul' => 'Pilih Issue', 'desc' => 'Cari issue berlabel "good first issue" atau "help wanted" untuk pemula.'],
            ['step' => '03', 'ikon' => 'fas fa-code', 'warna' => 'purple', 'judul' => 'Code & Test', 'desc' => 'Buat branch baru, tulis kode, dan pastikan semua test pass sebelum commit.'],
            ['step' => '04', 'ikon' => 'fas fa-paper-plane', 'warna' => 'amber', 'judul' => 'Pull Request', 'desc' => 'Submit PR dengan deskripsi jelas. Link ke issue yang terkait.'],
            ['step' => '05', 'ikon' => 'fas fa-check-double', 'warna' => 'pink', 'judul' => 'Review & Merge', 'desc' => 'Maintainer akan review, beri feedback, dan merge PR Anda jika approved.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach($langkah as $i => $l)
            <div class="kaca rounded-2xl p-5 border-{{ $l['warna'] }}-500/20 text-center relative" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="text-4xl font-black text-{{ $l['warna'] }}-500/10 absolute top-3 right-3">{{ $l['step'] }}</div>
                <div class="w-12 h-12 bg-{{ $l['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="{{ $l['ikon'] }} text-{{ $l['warna'] }}-400 text-lg"></i></div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $l['judul'] }}</h4>
                <p class="text-gray-400 text-xs">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- HALL OF FAME --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">HALL OF FAME</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Top Kontributor</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kontributor terbaik yang membentuk ekosistem open source KVT Hub</p>
    </div>
    @php
    $kontributor = [
        ['nama' => 'Fajar Rahman', 'commits' => 342, 'pr' => 89, 'repo' => 'KVT LMS Core', 'warna' => 'yellow'],
        ['nama' => 'Anisa Putri', 'commits' => 278, 'pr' => 72, 'repo' => 'KVT UI Kit', 'warna' => 'pink'],
        ['nama' => 'Dimas Aditya', 'commits' => 256, 'pr' => 65, 'repo' => 'KVT AI Engine', 'warna' => 'purple'],
        ['nama' => 'Novia Sari', 'commits' => 198, 'pr' => 51, 'repo' => 'KVT API', 'warna' => 'blue'],
        ['nama' => 'Reza Mahendra', 'commits' => 175, 'pr' => 48, 'repo' => 'KVT Mobile', 'warna' => 'green'],
    ];
    @endphp
    <div class="kaca rounded-2xl overflow-hidden" data-aos="fade-up">
        <div class="grid grid-cols-5 gap-4 p-4 bg-kvt-800/30 text-xs font-semibold text-gray-400 border-b border-kvt-700/30">
            <span>Peringkat</span><span>Kontributor</span><span>Commits</span><span>Pull Requests</span><span>Top Repo</span>
        </div>
        @foreach($kontributor as $i => $c)
        <div class="grid grid-cols-5 gap-4 p-4 items-center text-sm hover:bg-kvt-800/20 transition {{ $i === 0 ? 'bg-yellow-500/5' : '' }}">
            <span class="font-bold {{ $i < 3 ? 'text-yellow-400' : 'text-gray-400' }}">
                @if($i === 0)<i class="fas fa-crown text-yellow-400 mr-1"></i>@endif#{{ $i + 1 }}
            </span>
            <span class="text-white font-medium">{{ $c['nama'] }}</span>
            <span class="text-green-400 font-mono text-xs">{{ $c['commits'] }}</span>
            <span class="text-blue-400 font-mono text-xs">{{ $c['pr'] }} merged</span>
            <span class="text-xs bg-{{ $c['warna'] }}-500/10 text-{{ $c['warna'] }}-400 px-2 py-0.5 rounded-full inline-block w-fit">{{ $c['repo'] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- TECH STACK & GRANTS --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-gray-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Tech Stack --}}
            <div data-aos="fade-right">
                <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">TECH STACK</span>
                <h3 class="text-2xl font-black text-white mt-4 mb-6">Teknologi yang Digunakan</h3>
                @php
                $tech = [
                    ['nama' => 'PHP / Laravel', 'ikon' => 'fab fa-laravel', 'warna' => 'red'],
                    ['nama' => 'Tailwind CSS', 'ikon' => 'fab fa-css3-alt', 'warna' => 'cyan'],
                    ['nama' => 'Python', 'ikon' => 'fab fa-python', 'warna' => 'yellow'],
                    ['nama' => 'Node.js', 'ikon' => 'fab fa-node-js', 'warna' => 'green'],
                    ['nama' => 'Flutter / Dart', 'ikon' => 'fas fa-mobile-alt', 'warna' => 'blue'],
                    ['nama' => 'PostgreSQL', 'ikon' => 'fas fa-database', 'warna' => 'indigo'],
                ];
                @endphp
                <div class="grid grid-cols-2 gap-3">
                    @foreach($tech as $t)
                    <div class="kaca rounded-xl p-3 flex items-center gap-3 border-{{ $t['warna'] }}-500/20">
                        <i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-lg"></i>
                        <span class="text-gray-300 text-sm">{{ $t['nama'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Grants --}}
            <div data-aos="fade-left">
                <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">GRANTS</span>
                <h3 class="text-2xl font-black text-white mt-4 mb-6">Program Hibah Kontributor</h3>
                @php
                $grants = [
                    ['judul' => 'First Contribution Grant', 'desc' => 'Rp 500K untuk PR pertama yang di-merge. Berlaku untuk semua repo.', 'ikon' => 'fas fa-seedling', 'warna' => 'green'],
                    ['judul' => 'Monthly Top Contributor', 'desc' => 'Rp 2 Juta/bulan untuk kontributor teraktif. Dipilih oleh maintainer.', 'ikon' => 'fas fa-star', 'warna' => 'amber'],
                    ['judul' => 'Feature Bounty', 'desc' => 'Rp 1-10 Juta per fitur. Lihat issue berlabel "bounty" di GitHub.', 'ikon' => 'fas fa-coins', 'warna' => 'yellow'],
                    ['judul' => 'Annual OSS Fellowship', 'desc' => 'Rp 50 Juta/tahun untuk 5 fellow yang dedikasi full-time ke proyek KVT.', 'ikon' => 'fas fa-award', 'warna' => 'purple'],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($grants as $g)
                    <div class="kaca rounded-xl p-4 flex items-start gap-3 border-{{ $g['warna'] }}-500/20">
                        <div class="w-10 h-10 bg-{{ $g['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $g['ikon'] }} text-{{ $g['warna'] }}-400"></i></div>
                        <div>
                            <h5 class="text-white font-semibold text-sm">{{ $g['judul'] }}</h5>
                            <p class="text-gray-400 text-xs">{{ $g['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Open Source</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Panduan Kontribusi Pertama ke KVT OSS', 'durasi' => '10:25', 'views' => '16K', 'warna' => 'gray', 'thumb' => 'https://placehold.co/640x360/1a1a2e/9CA3AF?text=First+Contrib'],
            ['judul' => 'Git Workflow untuk Tim Open Source', 'durasi' => '14:50', 'views' => '21K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Git+Workflow'],
            ['judul' => 'KVT OSS Community Day 2025 Recap', 'durasi' => '19:30', 'views' => '33K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=OSS+Day+2025'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-gray-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Open Source Berdasarkan Peran</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Fork & kontribusi ke repositori', 'Klaim issue "good first issue"', 'Submit pull request', 'Akses panduan kontribusi', 'Dapatkan XP & badge OSS', 'Apply untuk OSS Fellowship']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Jadi maintainer repositori', 'Review pull request siswa', 'Buat tugas berbasis kontribusi', 'Mentoring Git workflow', 'Kelola issue & project board', 'Hosting code review session']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua repositori', 'Approve maintainer baru', 'Manage bounty & grants', 'Analytics kontribusi', 'Konfigurasi CI/CD pipeline', 'Audit keamanan & compliance']],
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
        <span class="text-xs bg-gray-500/10 text-gray-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah saya harus ahli coding untuk berkontribusi?', 'a' => 'Tidak! Kontribusi open source bukan hanya code. Anda bisa membantu dengan dokumentasi, terjemahan, testing, desain UI, dan pelaporan bug. Semua kontribusi dihargai.'],
        ['q' => 'Lisensi apa yang digunakan untuk proyek KVT?', 'a' => 'Semua repositori utama KVT menggunakan lisensi MIT, yang memungkinkan penggunaan bebas untuk keperluan personal dan komersial dengan atribusi.'],
        ['q' => 'Bagaimana cara mendapat grant/bounty?', 'a' => 'Cari issue berlabel "bounty" di GitHub. Selesaikan issue tersebut dan submit PR. Setelah di-merge dan di-review, tim akan memproses pembayaran bounty.'],
        ['q' => 'Apakah kontribusi dihitung sebagai portofolio?', 'a' => 'Tentu! Semua kontribusi tercatat di profil GitHub Anda. KVT juga memberikan sertifikat kontribusi dan badge di profil KVT Hub.'],
        ['q' => 'Bagaimana cara menjadi maintainer?', 'a' => 'Kontributor reguler dengan 10+ merged PR dan track record baik bisa direkomendasikan oleh maintainer existing. Admin akan melakukan review dan approval.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $i => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-gray-400 text-sm group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-gray-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Berkontribusi Hari Ini</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bergabung dengan 500+ kontributor global. Fork repo, klaim issue, dan bangun portofolio open source Anda bersama KVT Hub.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-gray-600 to-gray-800 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-gray-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-rocket"></i> Mulai Berkontribusi
            </a>
            <a href="#" class="inline-flex items-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-10 py-4 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fab fa-github"></i> GitHub KVT Hub
            </a>
        </div>
    </div>
</section>

@endsection
