@extends('tata-letak.utama')
@section('judul', 'Forum Diskusi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-indigo-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #6366F1 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-indigo-800/30 border border-indigo-600/30 rounded-full px-4 py-1.5 text-xs text-indigo-300 mb-6" data-aos="fade-down">
            <i class="fas fa-comments"></i> 15,000+ Topik Aktif
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Forum</span><br>
            <span class="teks-gradien">Diskusi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Ruang diskusi interaktif untuk bertukar ide, bertanya, dan berbagi pengetahuan. Tanya jawab peer-to-peer, debat akademik, dan knowledge sharing dengan sistem reputasi dan gamifikasi.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-indigo-500 to-kvt-500 hover:from-indigo-400 hover:to-kvt-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5">
                <i class="fas fa-pen mr-2"></i>Mulai Berdiskusi
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">15K+</div><div class="text-xs text-gray-500">Topik</div></div>
            <div><div class="text-2xl font-black text-white">73K+</div><div class="text-xs text-gray-500">Balasan</div></div>
            <div><div class="text-2xl font-black text-white">12K+</div><div class="text-xs text-gray-500">Anggota</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">Aktif</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI FORUM --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Forum</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Temukan diskusi yang sesuai dengan minat dan keahlian Anda</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-code', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Programming', 'topik' => '2.4K', 'balasan' => '18K', 'desc' => 'Diskusi tentang bahasa pemrograman, framework, algoritma, dan best practices.'],
        ['ikon' => 'fas fa-brain', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'AI & Machine Learning', 'topik' => '1.8K', 'balasan' => '12K', 'desc' => 'Deep learning, NLP, computer vision, dan implementasi model AI.'],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'Cybersecurity', 'topik' => '950', 'balasan' => '7K', 'desc' => 'Ethical hacking, penetration testing, CTF writeup, dan keamanan jaringan.'],
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Akademik', 'topik' => '3.1K', 'balasan' => '22K', 'desc' => 'Matematika, fisika, bahasa, dan mata pelajaran umum lintas jenjang.'],
        ['ikon' => 'fas fa-briefcase', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'Karir & Industri', 'topik' => '1.2K', 'balasan' => '9K', 'desc' => 'Tips interview, review perusahaan, salary negotiation, dan career path.'],
        ['ikon' => 'fas fa-lightbulb', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'Ide & Proyek', 'topik' => '780', 'balasan' => '5K', 'desc' => 'Brainstorming ide startup, side project showcase, dan kolaborasi.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($kategori as $i => $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-start gap-4 mb-3">
                <div class="w-14 h-14 bg-gradient-to-br {{ $k['gradien'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $k['ikon'] }} text-white text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg">{{ $k['judul'] }}</h3>
                    <p class="text-gray-500 text-xs mt-1">{{ $k['topik'] }} topik · {{ $k['balasan'] }} balasan</p>
                </div>
            </div>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- TOPIK TRENDING --}}
<section class="bg-gradient-to-br from-indigo-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">TRENDING</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Topik Paling Panas</h2>
        </div>
        @php
        $hot = [
            ['judul' => 'Laravel 12 vs Next.js 15 — mana yang lebih cocok untuk startup?', 'kategori' => 'Programming', 'balasan' => 234, 'views' => '12K', 'warna' => 'blue'],
            ['judul' => 'Belajar machine learning dari nol, mulai dari mana?', 'kategori' => 'AI & ML', 'balasan' => 189, 'views' => '9.5K', 'warna' => 'purple'],
            ['judul' => 'Pengalaman interview Google — timeline & tips lengkap', 'kategori' => 'Karir', 'balasan' => 156, 'views' => '8.2K', 'warna' => 'amber'],
            ['judul' => 'Persiapan SNBT 2026: strategi 100 hari terakhir', 'kategori' => 'Akademik', 'balasan' => 312, 'views' => '15K', 'warna' => 'green'],
            ['judul' => 'Writeup CTF KVT 2025 — Web Exploitation category', 'kategori' => 'Cybersecurity', 'balasan' => 98, 'views' => '5.1K', 'warna' => 'red'],
        ];
        @endphp
        <div class="space-y-4">
            @foreach($hot as $i => $h)
            <div class="kaca rounded-2xl p-5 hover:border-{{ $h['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        <div class="w-10 h-10 bg-{{ $h['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="fas fa-fire text-{{ $h['warna'] }}-400"></i></div>
                        <div>
                            <h4 class="text-white font-semibold group-hover:text-indigo-300 transition">{{ $h['judul'] }}</h4>
                            <span class="text-xs text-{{ $h['warna'] }}-400">{{ $h['kategori'] }}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-gray-500 text-sm flex-shrink-0">
                        <span><i class="fas fa-eye mr-1"></i>{{ $h['views'] }}</span>
                        <span><i class="fas fa-comment mr-1"></i>{{ $h['balasan'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TOP KONTRIBUTOR --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">LEADERBOARD</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Top Kontributor Bulan Ini</h2>
    </div>
    @php
    $kontributor = [
        ['nama' => 'Arif Wijaya', 'level' => 45, 'xp' => 12500, 'badge' => 'Guru Besar', 'warna' => 'yellow'],
        ['nama' => 'Siti Nurhaliza', 'level' => 42, 'xp' => 11200, 'badge' => 'Expert', 'warna' => 'purple'],
        ['nama' => 'Budi Santoso', 'level' => 39, 'xp' => 9800, 'badge' => 'Mentor', 'warna' => 'blue'],
        ['nama' => 'Dewi Lestari', 'level' => 37, 'xp' => 8900, 'badge' => 'Contributor', 'warna' => 'green'],
        ['nama' => 'Rizky Pratama', 'level' => 35, 'xp' => 8100, 'badge' => 'Contributor', 'warna' => 'green'],
    ];
    @endphp
    <div class="kaca rounded-2xl overflow-hidden" data-aos="fade-up">
        <div class="grid grid-cols-5 gap-4 p-4 bg-kvt-800/30 text-xs font-semibold text-gray-400 border-b border-kvt-700/30">
            <span>Peringkat</span><span>Anggota</span><span>Level</span><span>Badge</span><span>XP</span>
        </div>
        @foreach($kontributor as $i => $c)
        <div class="grid grid-cols-5 gap-4 p-4 items-center text-sm hover:bg-kvt-800/20 transition {{ $i === 0 ? 'bg-yellow-500/5' : '' }}">
            <span class="font-bold {{ $i < 3 ? 'text-yellow-400' : 'text-gray-400' }}">
                @if($i === 0)<i class="fas fa-crown text-yellow-400 mr-1"></i>@endif#{{ $i + 1 }}
            </span>
            <span class="text-white font-medium">{{ $c['nama'] }}</span>
            <span class="text-kvt-400 font-semibold">Lv.{{ $c['level'] }}</span>
            <span class="text-xs bg-{{ $c['warna'] }}-500/20 text-{{ $c['warna'] }}-400 px-2 py-0.5 rounded-full inline-block w-fit">{{ $c['badge'] }}</span>
            <span class="text-gray-400">{{ number_format($c['xp']) }} XP</span>
        </div>
        @endforeach
    </div>
</section>

{{-- PANDUAN & GAMIFIKASI --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-indigo-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">GAMIFIKASI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sistem Reputasi & Reward</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dapatkan XP, naik level, dan kumpulkan badge dari setiap kontribusi di forum</p>
        </div>
        @php
        $reward = [
            ['ikon' => 'fas fa-pen', 'warna' => 'blue', 'aksi' => 'Buat topik baru', 'xp' => '+10 XP'],
            ['ikon' => 'fas fa-reply', 'warna' => 'green', 'aksi' => 'Jawab pertanyaan', 'xp' => '+5 XP'],
            ['ikon' => 'fas fa-check-double', 'warna' => 'amber', 'aksi' => 'Jawaban terpilih (best answer)', 'xp' => '+25 XP'],
            ['ikon' => 'fas fa-thumbs-up', 'warna' => 'purple', 'aksi' => 'Mendapat upvote', 'xp' => '+2 XP'],
            ['ikon' => 'fas fa-fire', 'warna' => 'red', 'aksi' => 'Streak 7 hari berturut-turut', 'xp' => '+50 XP'],
            ['ikon' => 'fas fa-medal', 'warna' => 'pink', 'aksi' => 'Naik level', 'xp' => 'Badge baru'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($reward as $i => $r)
            <div class="kaca rounded-2xl p-5 border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-{{ $r['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="{{ $r['ikon'] }} text-{{ $r['warna'] }}-400 text-lg"></i></div>
                    <div>
                        <h4 class="text-white font-semibold">{{ $r['aksi'] }}</h4>
                        <span class="text-{{ $r['warna'] }}-400 text-sm font-bold">{{ $r['xp'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Forum</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Membuat Topik yang Baik', 'durasi' => '06:42', 'views' => '15K', 'warna' => 'indigo', 'thumb' => 'https://placehold.co/640x360/1a1a2e/6366F1?text=Posting+Guide'],
            ['judul' => 'Etika Berdiskusi di Forum Online', 'durasi' => '09:15', 'views' => '11K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Forum+Etiquette'],
            ['judul' => 'Menjadi Top Kontributor: Tips & Trik', 'durasi' => '14:30', 'views' => '22K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Top+Contributor'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-indigo-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Forum Berdasarkan Peran</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Buat topik & jawab pertanyaan', 'Upvote & bookmark diskusi', 'Kumpulkan XP dan badge', 'Tag pertanyaan per kategori', 'Follow topik favorit', 'Lapor konten tidak pantas']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Semua fitur siswa', 'Tandai jawaban terbaik', 'Pin topik penting', 'Moderasi diskusi kelas', 'Buat Q&A session terjadwal', 'Badge khusus verified educator']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Semua fitur guru', 'Kelola kategori & tag forum', 'Ban/mute pengguna', 'Analytics forum real-time', 'Konfigurasi auto-moderasi', 'Kelola sistem gamifikasi']],
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
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Bagaimana cara membuat topik diskusi baru?', 'a' => 'Masuk ke forum, pilih kategori yang sesuai, lalu klik tombol "Buat Topik Baru". Isi judul, deskripsi, dan tag yang relevan. Gunakan Markdown untuk formatting.'],
        ['q' => 'Apa itu sistem reputasi dan bagaimana cara kerjanya?', 'a' => 'Setiap aktivitas di forum memberikan XP: buat topik (+10), jawab (+5), best answer (+25), dapat upvote (+2). XP menentukan level Anda dan membuka badge eksklusif.'],
        ['q' => 'Apakah ada moderasi di forum?', 'a' => 'Ya, forum dimoderasi oleh tim moderator sukarelawan, guru verified, dan admin. Sistem auto-moderasi juga aktif untuk mendeteksi spam dan konten tidak pantas.'],
        ['q' => 'Bisa posting kode di forum?', 'a' => 'Tentu! Forum mendukung syntax highlighting untuk 50+ bahasa pemrograman. Gunakan triple backtick (```) diikuti nama bahasa untuk code block.'],
        ['q' => 'Bagaimana cara menjadi moderator forum?', 'a' => 'Moderator dipilih berdasarkan reputasi, aktivitas, dan kualitas kontribusi. Anggota dengan level 30+ dan track record baik bisa mengajukan diri sebagai moderator.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $i => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-indigo-400 text-sm group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-indigo-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Diskusi Pertama Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bergabung dengan 12,000+ anggota aktif. Tanyakan apa saja, bagikan pengetahuan, dan bangun reputasi Anda di komunitas.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-500 to-kvt-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Gabung Forum Sekarang
        </a>
    </div>
</section>

@endsection
