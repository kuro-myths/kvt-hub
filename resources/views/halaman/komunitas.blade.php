@extends('tata-letak.utama')
@section('judul', 'Komunitas - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-pink-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-pink-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #EC4899 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-pink-800/30 border border-pink-600/30 rounded-full px-4 py-1.5 text-xs text-pink-300 mb-6" data-aos="fade-down">
            <i class="fas fa-users"></i> 50,000+ Anggota Aktif
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Komunitas</span><br>
            <span class="teks-gradien">Global KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Bergabung dengan komunitas pelajar, peneliti, dan profesional dari seluruh dunia. Forum diskusi, study group, alumni network, hackathon, dan open source — semua dalam satu ekosistem.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-400 hover:to-purple-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-pink-500/30 hover:-translate-y-0.5">
                <i class="fas fa-user-plus mr-2"></i>Gabung Sekarang
            </a>
            <a href="#kanal" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-compass mr-2"></i>Jelajahi Kanal
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">50K+</div><div class="text-xs text-gray-500">Anggota</div></div>
            <div><div class="text-2xl font-black text-white">6</div><div class="text-xs text-gray-500">Kanal</div></div>
            <div><div class="text-2xl font-black text-white">40+</div><div class="text-xs text-gray-500">Negara</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">Aktif</div></div>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/komunitas-network.svg') }}" alt="Komunitas" class="w-full max-w-2xl mx-auto rounded-2xl shadow-2xl shadow-purple-500/10 border border-purple-700/20">
        </div>
    </div>
</section>

{{-- KANAL KOMUNITAS --}}
<section id="kanal" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-pink-500/10 text-pink-400 px-3 py-1 rounded-full">KANAL</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kanal Komunitas</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih kanal yang sesuai dengan minat dan kebutuhan Anda</p>
    </div>
    @php
    $kanal = [
        ['judul' => 'Forum Diskusi', 'desc' => 'Diskusi akademik, teknis, dan umum. Tanya jawab peer-to-peer dengan sistem reputasi.', 'ikon' => 'fa-comments', 'gradien' => 'from-blue-500 to-cyan-500', 'warna' => 'blue', 'stat' => '15K+ topik'],
        ['judul' => 'Study Group', 'desc' => 'Grup belajar berdasarkan mata kuliah, kursus, dan topik riset. Jadwal terstruktur.', 'ikon' => 'fa-book-reader', 'gradien' => 'from-green-500 to-emerald-500', 'warna' => 'green', 'stat' => '3K+ grup'],
        ['judul' => 'Alumni Network', 'desc' => 'Jaringan alumni dari TK hingga S3. Mentoring, networking, dan kolaborasi karir.', 'ikon' => 'fa-user-tie', 'gradien' => 'from-purple-500 to-violet-500', 'warna' => 'purple', 'stat' => '8K+ alumni'],
        ['judul' => 'Hackathon', 'desc' => 'Kompetisi coding, desain, dan inovasi. Hadiah besar dan rekrutmen industri.', 'ikon' => 'fa-trophy', 'gradien' => 'from-yellow-500 to-amber-500', 'warna' => 'amber', 'stat' => '24 event/tahun'],
        ['judul' => 'Open Source', 'desc' => 'Kontribusi ke proyek open source KVT dan ekosistemnya. Belajar Git workflow.', 'ikon' => 'fa-code-branch', 'gradien' => 'from-orange-500 to-red-500', 'warna' => 'orange', 'stat' => '200+ repo'],
        ['judul' => 'Event & Webinar', 'desc' => 'Webinar bulanan, workshop hands-on, dan konferensi tahunan global.', 'ikon' => 'fa-video', 'gradien' => 'from-pink-500 to-rose-500', 'warna' => 'pink', 'stat' => '120 event/tahun'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($kanal as $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $k['gradien'] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $k['ikon'] }} text-white text-xl"></i>
                </div>
                <span class="text-[10px] bg-{{ $k['warna'] }}-500/10 text-{{ $k['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $k['stat'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK AKTIVITAS --}}
<section class="bg-gradient-to-br from-pink-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">STATISTIK</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Aktivitas Komunitas</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
            <div class="kaca rounded-2xl p-6"><div class="text-3xl font-black teks-gradien">50K+</div><p class="text-gray-400 text-sm mt-2">Anggota Terdaftar</p></div>
            <div class="kaca rounded-2xl p-6"><div class="text-3xl font-black teks-gradien">120K+</div><p class="text-gray-400 text-sm mt-2">Posting/Bulan</p></div>
            <div class="kaca rounded-2xl p-6"><div class="text-3xl font-black teks-gradien">15K+</div><p class="text-gray-400 text-sm mt-2">Topik Diskusi</p></div>
            <div class="kaca rounded-2xl p-6"><div class="text-3xl font-black teks-gradien">98%</div><p class="text-gray-400 text-sm mt-2">Respon Rate</p></div>
        </div>
    </div>
</section>

{{-- DISKUSI POPULER --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">TRENDING</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Diskusi Populer Minggu Ini</h2>
    </div>
    @php
    $diskusi = [
        ['judul' => 'Bagaimana cara optimasi query Laravel Eloquent?', 'kategori' => 'Programming', 'balasan' => 87, 'warna' => 'blue'],
        ['judul' => 'Tips lolos interview Google sebagai fresh graduate', 'kategori' => 'Karir', 'balasan' => 134, 'warna' => 'green'],
        ['judul' => 'Rekomendasi resource belajar AI dari nol', 'kategori' => 'AI & ML', 'balasan' => 102, 'warna' => 'purple'],
        ['judul' => 'Strategi persiapan SNBT 2026 dalam 3 bulan', 'kategori' => 'Akademik', 'balasan' => 96, 'warna' => 'pink'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($diskusi as $i => $d)
        <div class="kaca rounded-2xl p-6 hover:border-{{ $d['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 bg-{{ $d['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="fas fa-fire text-{{ $d['warna'] }}-400"></i></div>
                    <div>
                        <h4 class="text-white font-semibold group-hover:text-pink-300 transition">{{ $d['judul'] }}</h4>
                        <span class="text-xs text-{{ $d['warna'] }}-400">{{ $d['kategori'] }}</span>
                    </div>
                </div>
                <span class="text-gray-500 text-sm"><i class="fas fa-comment mr-1"></i>{{ $d['balasan'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- EVENT TERBARU --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-purple-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">EVENT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Event Komunitas Mendatang</h2>
        </div>
        @php
        $events = [
            ['judul' => 'KVT Tech Talk: Laravel 12 Deep Dive', 'tanggal' => '22 Feb 2026', 'tipe' => 'Webinar', 'warna' => 'blue', 'ikon' => 'fas fa-microphone'],
            ['judul' => 'Study Jam: Persiapan SNBT Matematika', 'tanggal' => '1 Mar 2026', 'tipe' => 'Study Group', 'warna' => 'green', 'ikon' => 'fas fa-book-open'],
            ['judul' => 'AI Innovation Challenge 2026', 'tanggal' => '15 Mar 2026', 'tipe' => 'Hackathon', 'warna' => 'purple', 'ikon' => 'fas fa-trophy'],
            ['judul' => 'Alumni Meetup: Silicon Valley Edition', 'tanggal' => '5 Apr 2026', 'tipe' => 'Networking', 'warna' => 'amber', 'ikon' => 'fas fa-handshake'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($events as $i => $e)
            <div class="kaca rounded-2xl p-6 border-{{ $e['warna'] }}-500/20 hover:border-{{ $e['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-{{ $e['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="{{ $e['ikon'] }} text-{{ $e['warna'] }}-400 text-xl"></i></div>
                    <div>
                        <span class="text-xs bg-{{ $e['warna'] }}-500/10 text-{{ $e['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $e['tipe'] }}</span>
                        <h4 class="text-white font-bold text-lg mt-2">{{ $e['judul'] }}</h4>
                        <p class="text-gray-500 text-sm mt-1"><i class="fas fa-calendar-alt mr-1"></i>{{ $e['tanggal'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PANDUAN KOMUNITAS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">GUIDELINES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Komunitas</h2>
    </div>
    @php
    $panduan = [
        ['ikon' => 'fas fa-heart', 'warna' => 'pink', 'judul' => 'Saling Menghormati', 'desc' => 'Hormati semua anggota tanpa memandang latar belakang, level, atau pendapat. Tidak ada tempat untuk diskriminasi.'],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'blue', 'judul' => 'Konten Berkualitas', 'desc' => 'Bagikan konten yang bermanfaat, akurat, dan relevan. Hindari spam, hoax, dan plagiarisme.'],
        ['ikon' => 'fas fa-hands-helping', 'warna' => 'green', 'judul' => 'Bantu Sesama', 'desc' => 'Jawab pertanyaan anggota lain, beri feedback konstruktif, dan kontribusi positif ke komunitas.'],
        ['ikon' => 'fas fa-gavel', 'warna' => 'amber', 'judul' => 'Patuhi Aturan', 'desc' => 'Ikuti kode etik dan terms of service KVT Hub. Pelanggaran akan dikenai sanksi oleh moderator.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($panduan as $i => $p)
        <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-{{ $p['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i></div>
                <div>
                    <h4 class="text-white font-bold text-lg mb-1">{{ $p['judul'] }}</h4>
                    <p class="text-gray-400 text-sm">{{ $p['desc'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-pink-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Komunitas</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Panduan Bergabung Komunitas KVT', 'durasi' => '08:15', 'views' => '25K', 'warna' => 'pink', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EC4899?text=Komunitas+Guide'],
                ['judul' => 'Tips Aktif di Forum Diskusi', 'durasi' => '12:30', 'views' => '18K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Forum+Tips'],
                ['judul' => 'Highlight: KVT Community Day 2025', 'durasi' => '22:10', 'views' => '42K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Community+Day'],
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
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Gabung forum & study group', 'Posting pertanyaan & jawaban', 'Ikuti hackathon & event', 'Kumpulkan XP & badge', 'Akses mentoring alumni', 'Kontribusi open source']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Moderasi forum & diskusi', 'Buat study group terstruktur', 'Jadi mentor di alumni network', 'Juri hackathon & kompetisi', 'Review kontribusi open source', 'Hosting webinar & workshop']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua kanal komunitas', 'Approve event & hackathon', 'Moderasi konten & pengguna', 'Analytics komunitas real-time', 'Kelola badge & gamification', 'Konfigurasi kebijakan komunitas']],
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
</section>

{{-- FAQ --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-pink-900/10 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-pink-500/10 text-pink-400 px-3 py-1 rounded-full">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
        </div>
        @php
        $faq = [
            ['q' => 'Bagaimana cara bergabung dengan komunitas KVT Hub?', 'a' => 'Cukup daftar akun gratis di KVT Hub, lalu masuk ke menu Komunitas. Anda bisa langsung bergabung ke forum, study group, dan kanal lainnya tanpa biaya tambahan.'],
            ['q' => 'Apakah komunitas KVT Hub gratis?', 'a' => 'Ya, semua kanal komunitas dasar gratis untuk semua anggota. Beberapa fitur premium seperti mentoring 1-on-1 dan akses eksklusif tersedia untuk anggota paket berbayar.'],
            ['q' => 'Bagaimana sistem XP dan badge bekerja?', 'a' => 'Anda mendapatkan XP dari berbagai aktivitas: posting, menjawab pertanyaan, mengikuti event, dan kontribusi open source. XP menentukan level dan membuka badge khusus.'],
            ['q' => 'Apakah saya bisa membuat study group sendiri?', 'a' => 'Tentu! Setiap anggota bisa membuat study group baru. Pilih topik, atur jadwal, dan undang teman. Guru juga bisa membuat grup terstruktur dengan silabus.'],
            ['q' => 'Siapa yang memoderasi diskusi di forum?', 'a' => 'Forum dimoderasi oleh tim moderator sukarelawan dan guru. Admin memantau keseluruhan konten. Laporkan konten yang melanggar aturan via tombol report.'],
        ];
        @endphp
        <div class="space-y-4">
            @foreach($faq as $i => $f)
            <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                    <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                    <i class="fas fa-chevron-down text-pink-400 text-sm group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-pink-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Bergabung dengan Komunitas Global</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Jadilah bagian dari 50,000+ pelajar dan profesional. Forum, event, hackathon, dan networking — semuanya menanti Anda.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-pink-500 to-purple-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-pink-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-rocket"></i> Gabung Sekarang
            </a>
            <a href="#" class="inline-flex items-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-10 py-4 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fab fa-discord"></i> Join Discord
            </a>
        </div>
    </div>
</section>

@endsection
