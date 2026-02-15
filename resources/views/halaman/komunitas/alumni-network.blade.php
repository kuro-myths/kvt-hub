@extends('tata-letak.utama')
@section('judul', 'Alumni Network - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-yellow-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-yellow-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-yellow-800/30 border border-yellow-600/30 rounded-full px-4 py-1.5 text-xs text-yellow-300 mb-6" data-aos="fade-down">
            <i class="fas fa-user-graduate"></i> 50,000+ Alumni Terhubung
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Alumni</span><br>
            <span class="teks-gradien-emas">Network</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Terhubung dengan 50,000+ alumni KVT Hub di 40+ negara. Networking profesional, mentoring program, career guidance, dan kolaborasi tanpa batas lintas generasi.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-yellow-500 to-amber-500 hover:from-yellow-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-yellow-500/30 hover:-translate-y-0.5">
                <i class="fas fa-handshake mr-2"></i>Bergabung Sekarang
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-address-book mr-2"></i>Direktori Alumni
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black teks-gradien-emas">50K+</div><div class="text-xs text-gray-500">Alumni</div></div>
            <div><div class="text-2xl font-black teks-gradien-emas">40+</div><div class="text-xs text-gray-500">Negara</div></div>
            <div><div class="text-2xl font-black teks-gradien-emas">200+</div><div class="text-xs text-gray-500">Perusahaan</div></div>
            <div><div class="text-2xl font-black teks-gradien-emas">1K+</div><div class="text-xs text-gray-500">Mentor</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI ALUMNI --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">DIREKTORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Alumni</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Temukan alumni berdasarkan bidang karir dan kontribusi mereka</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-building', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Alumni Korporat', 'desc' => 'Alumni yang bekerja di perusahaan multinasional — Google, Microsoft, Tokopedia, GoTo, dan lainnya.'],
        ['ikon' => 'fas fa-rocket', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Alumni Startup', 'desc' => 'Founder dan co-founder startup yang lahir dari ekosistem KVT Hub. Unicorn dan decacorn.'],
        ['ikon' => 'fas fa-university', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Alumni Akademisi', 'desc' => 'Dosen, peneliti, dan profesor di universitas ternama dalam negeri dan luar negeri.'],
        ['ikon' => 'fas fa-globe', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'Alumni Global', 'desc' => 'Alumni yang berkarir di luar negeri — Silicon Valley, London, Tokyo, Berlin.'],
        ['ikon' => 'fas fa-hand-holding-heart', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => 'Alumni Contributor', 'desc' => 'Alumni yang aktif berkontribusi sebagai mentor, speaker, dan donatur program beasiswa.'],
        ['ikon' => 'fas fa-award', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'Alumni Berprestasi', 'desc' => 'Hall of Fame alumni dengan pencapaian luar biasa di bidang masing-masing.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($kategori as $i => $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $k['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="{{ $k['ikon'] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- ALUMNI SPOTLIGHT --}}
<section class="bg-gradient-to-br from-yellow-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">SPOTLIGHT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alumni Berprestasi</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kisah sukses alumni KVT Hub yang menginspirasi</p>
        </div>
        @php
        $spotlight = [
            ['nama' => 'Dr. Rina Kusuma', 'posisi' => 'AI Research Lead, Google DeepMind', 'prestasi' => 'Memimpin riset NLP multi-bahasa. Pemenang Best Paper Award NeurIPS 2025.', 'warna' => 'blue'],
            ['nama' => 'Andi Prasetyo', 'posisi' => 'Founder & CEO, EduNusa (Unicorn)', 'prestasi' => 'Membangun platform edtech terbesar di Asia Tenggara dengan 10 juta pengguna.', 'warna' => 'purple'],
            ['nama' => 'Sari Dewi, M.Sc.', 'posisi' => 'Cybersecurity Director, Bank Mandiri', 'prestasi' => 'Merancang sistem keamanan perbankan digital yang melindungi 30 juta nasabah.', 'warna' => 'green'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($spotlight as $i => $s)
            <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-gradient-to-br from-{{ $s['warna'] }}-400 to-{{ $s['warna'] }}-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user text-white text-2xl"></i>
                </div>
                <h4 class="text-white font-bold text-lg text-center mb-1">{{ $s['nama'] }}</h4>
                <p class="text-{{ $s['warna'] }}-400 text-xs text-center mb-3">{{ $s['posisi'] }}</p>
                <p class="text-gray-400 text-sm text-center">{{ $s['prestasi'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- NETWORKING EVENTS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">EVENT</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Networking Events</h2>
    </div>
    @php
    $events = [
        ['judul' => 'Alumni Meetup Jakarta — Tech Talk & Networking', 'tanggal' => '28 Feb 2026', 'lokasi' => 'Jakarta', 'peserta' => 150, 'warna' => 'blue', 'ikon' => 'fas fa-map-marker-alt'],
        ['judul' => 'Virtual Career Fair 2026 — 50+ Perusahaan', 'tanggal' => '15 Mar 2026', 'lokasi' => 'Online', 'peserta' => 2000, 'warna' => 'green', 'ikon' => 'fas fa-laptop'],
        ['judul' => 'Mentorship Matching Day — Find Your Mentor', 'tanggal' => '1 Apr 2026', 'lokasi' => 'Online', 'peserta' => 500, 'warna' => 'purple', 'ikon' => 'fas fa-users'],
        ['judul' => 'KVT Alumni Gala Dinner & Awards 2026', 'tanggal' => '20 Mei 2026', 'lokasi' => 'Bali', 'peserta' => 300, 'warna' => 'amber', 'ikon' => 'fas fa-glass-cheers'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($events as $i => $e)
        <div class="kaca rounded-2xl p-6 border-{{ $e['warna'] }}-500/20 hover:border-{{ $e['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-{{ $e['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="{{ $e['ikon'] }} text-{{ $e['warna'] }}-400 text-xl"></i></div>
                <div>
                    <h4 class="text-white font-bold text-lg mb-1">{{ $e['judul'] }}</h4>
                    <p class="text-gray-500 text-sm"><i class="fas fa-calendar-alt mr-1"></i>{{ $e['tanggal'] }} · <i class="fas fa-map-pin ml-1 mr-1"></i>{{ $e['lokasi'] }} · <i class="fas fa-users ml-1 mr-1"></i>{{ number_format($e['peserta']) }} peserta</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- BENEFIT ALUMNI --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-yellow-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">BENEFITS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Keuntungan Bergabung Alumni Network</h2>
        </div>
        @php
        $benefit = [
            ['ikon' => 'fas fa-user-tie', 'warna' => 'blue', 'judul' => 'Mentoring 1-on-1', 'desc' => 'Akses ke 1,000+ mentor alumni yang siap membimbing karir dan pengembangan profesional Anda.'],
            ['ikon' => 'fas fa-briefcase', 'warna' => 'green', 'judul' => 'Job Board Eksklusif', 'desc' => 'Lowongan kerja eksklusif dari perusahaan partner alumni. Referral langsung dari insider.'],
            ['ikon' => 'fas fa-graduation-cap', 'warna' => 'purple', 'judul' => 'Beasiswa & Sponsor', 'desc' => 'Program beasiswa yang didanai oleh alumni untuk generasi penerus KVT Hub.'],
            ['ikon' => 'fas fa-calendar-check', 'warna' => 'amber', 'judul' => 'Event Eksklusif', 'desc' => 'Akses ke networking event, gala dinner, dan meetup alumni di berbagai kota.'],
            ['ikon' => 'fas fa-project-diagram', 'warna' => 'pink', 'judul' => 'Kolaborasi Proyek', 'desc' => 'Temukan co-founder, partner bisnis, atau tim proyek dari jaringan alumni.'],
            ['ikon' => 'fas fa-id-card', 'warna' => 'cyan', 'judul' => 'Alumni ID Card', 'desc' => 'Kartu alumni digital dengan akses ke diskon, fasilitas kampus, dan benefit partner.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($benefit as $i => $b)
            <div class="kaca rounded-2xl p-6 border-{{ $b['warna'] }}-500/20 hover:border-{{ $b['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 bg-{{ $b['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $b['ikon'] }} text-{{ $b['warna'] }}-400 text-xl"></i></div>
                <h4 class="text-white font-bold text-lg mb-2">{{ $b['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $b['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Alumni Network</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Kisah Sukses Alumni KVT Hub', 'durasi' => '18:30', 'views' => '35K', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=Alumni+Story'],
            ['judul' => 'Cara Memaksimalkan Alumni Network', 'durasi' => '12:15', 'views' => '22K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Network+Tips'],
            ['judul' => 'KVT Alumni Gala 2025 Highlight', 'durasi' => '25:40', 'views' => '48K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Gala+2025'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-yellow-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Berdasarkan Peran</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Cari mentor alumni', 'Akses job board alumni', 'Ikuti networking event', 'Daftar program beasiswa', 'Lihat profil alumni inspiratif', 'Request career guidance']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Jadi mentor untuk siswa', 'Undang alumni sebagai speaker', 'Hubungkan siswa dengan alumni', 'Akses direktori lengkap', 'Kolaborasi riset dengan alumni', 'Hosting alumni talk session']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola direktori alumni', 'Verifikasi status alumni', 'Analytics alumni network', 'Kelola event & program', 'Manage partnership alumni', 'Konfigurasi benefit & rewards']],
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
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Siapa yang bisa bergabung dengan Alumni Network?', 'a' => 'Semua pengguna KVT Hub yang telah menyelesaikan minimal satu program atau kursus berhak mendaftar sebagai alumni. Verifikasi dilakukan oleh tim admin.'],
        ['q' => 'Bagaimana cara menjadi mentor alumni?', 'a' => 'Alumni dengan pengalaman kerja minimal 2 tahun bisa mendaftar sebagai mentor. Isi formulir, pilih bidang keahlian, dan tim kami akan mencocokkan Anda dengan mentee.'],
        ['q' => 'Apakah ada biaya untuk alumni network?', 'a' => 'Keanggotaan alumni network dasar gratis seumur hidup. Fitur premium seperti priority mentoring dan VIP event access tersedia dengan kontribusi sukarela.'],
        ['q' => 'Bagaimana cara mengakses job board alumni?', 'a' => 'Login ke alumni dashboard, buka tab "Job Board". Anda bisa filter berdasarkan industri, lokasi, dan level. Alumni juga bisa posting lowongan dari perusahaan mereka.'],
        ['q' => 'Apakah alumni bisa mendapatkan Alumni ID Card?', 'a' => 'Ya! Alumni terverifikasi mendapat kartu alumni digital yang bisa digunakan untuk akses diskon partner, fasilitas kampus, dan event eksklusif.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $i => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-yellow-400 text-sm group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-yellow-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Bergabung dengan Alumni Network</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Terhubung dengan 50,000+ alumni di 40+ negara. Mentoring, networking, dan peluang karir menanti Anda.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-yellow-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Gabung Alumni Network
        </a>
    </div>
</section>

@endsection
