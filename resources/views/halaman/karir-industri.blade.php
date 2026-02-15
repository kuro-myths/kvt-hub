@extends('tata-letak.utama')
@section('judul', 'Karir & Industri - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 25% 50%, rgba(249,115,22,0.3) 0%, transparent 50%), radial-gradient(circle at 75% 50%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-briefcase"></i> Career Hub - Dari Kampus ke Industri
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Karir &</span><br>
            <span class="teks-gradien-emas">Industri</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Jembatan antara pendidikan dan dunia kerja. Temukan magang, lowongan, mentoring, dan CV builder
            dari profesional global di 500+ perusahaan mitra terkemuka.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                <i class="fas fa-rocket mr-2"></i>Mulai Karir Anda
            </a>
            <a href="#sektor" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-compass mr-2"></i>Jelajahi Sektor
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">12K+</div><div class="text-xs text-gray-500">Lowongan</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Perusahaan</div></div>
            <div><div class="text-2xl font-black text-white">89%</div><div class="text-xs text-gray-500">Penempatan</div></div>
            <div><div class="text-2xl font-black text-white">$85K</div><div class="text-xs text-gray-500">Avg Salary</div></div>
        </div>
    </div>
</section>

{{-- SEKTOR INDUSTRI --}}
<section id="sektor" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">SEKTOR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sektor Industri</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih jalur karir sesuai passion dan keahlian Anda di berbagai sektor industri global</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $sektor = [
            ['Software Engineering', 'Full-stack, mobile, DevOps, cloud architecture', 'fa-code', 'from-blue-500 to-cyan-500', '$60K - $200K/yr', ['React', 'Node.js', 'AWS', 'Docker']],
            ['Data & AI', 'Data scientist, ML engineer, AI researcher', 'fa-brain', 'from-purple-500 to-violet-500', '$70K - $250K/yr', ['Python', 'TensorFlow', 'SQL', 'Spark']],
            ['Cybersecurity', 'Security analyst, pentester, CISO', 'fa-shield-alt', 'from-red-500 to-orange-500', '$65K - $180K/yr', ['Ethical Hacking', 'SIEM', 'CompTIA', 'CISSP']],
            ['Product & Design', 'PM, UX designer, UI engineer', 'fa-palette', 'from-pink-500 to-rose-500', '$55K - $170K/yr', ['Figma', 'User Research', 'Agile', 'A/B Test']],
            ['Finance & Fintech', 'Analyst, quant, blockchain developer', 'fa-chart-line', 'from-green-500 to-emerald-500', '$60K - $220K/yr', ['Bloomberg', 'Solidity', 'Risk', 'DeFi']],
            ['Biotech & Health', 'Bioinformatics, healthtech, pharma', 'fa-heartbeat', 'from-teal-500 to-cyan-500', '$55K - $190K/yr', ['R', 'Genomics', 'Clinical', 'FDA']],
        ];
        @endphp
        @foreach($sektor as $idx => $s)
        <div class="kaca rounded-2xl p-6 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $s[3] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition"><i class="fas {{ $s[2] }} text-white text-xl"></i></div>
                <span class="text-xs bg-green-500/10 text-green-400 px-2 py-1 rounded-lg border border-green-500/20">{{ $s[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $s[0] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $s[1] }}</p>
            <div class="flex flex-wrap gap-1.5">
                @foreach($s[5] as $tag)
                <span class="text-[10px] bg-kvt-800/50 text-gray-400 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- CAREER PATHWAY --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">PATHWAY</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Career Pathway</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Roadmap terstruktur dari pemula hingga profesional senior</p>
        </div>
        @php
        $pathway = [
            ['level' => 'Entry Level', 'durasi' => '0-2 Tahun', 'ikon' => 'fa-seedling', 'warna' => 'green', 'desc' => 'Fresh graduate, magang, junior position. Fokus membangun skill dasar dan portofolio.', 'gaji' => 'Rp 5-12 jt/bln'],
            ['level' => 'Mid Level', 'durasi' => '2-5 Tahun', 'ikon' => 'fa-arrow-up', 'warna' => 'blue', 'desc' => 'Spesialisasi teknis, lead small projects, mulai mentoring junior.', 'gaji' => 'Rp 12-25 jt/bln'],
            ['level' => 'Senior Level', 'durasi' => '5-10 Tahun', 'ikon' => 'fa-star', 'warna' => 'purple', 'desc' => 'Technical leadership, architecture decisions, cross-team collaboration.', 'gaji' => 'Rp 25-50 jt/bln'],
            ['level' => 'Executive', 'durasi' => '10+ Tahun', 'ikon' => 'fa-crown', 'warna' => 'amber', 'desc' => 'VP, CTO, Director level. Strategic vision, people management, business impact.', 'gaji' => 'Rp 50-150 jt/bln'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($pathway as $idx => $p)
            <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition relative" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                <div class="absolute -top-3 left-6 bg-{{ $p['warna'] }}-500/20 text-{{ $p['warna'] }}-400 text-[10px] px-3 py-0.5 rounded-full border border-{{ $p['warna'] }}-500/30">{{ $p['durasi'] }}</div>
                <div class="w-12 h-12 bg-{{ $p['warna'] }}-500/20 rounded-xl flex items-center justify-center mt-2 mb-4"><i class="fas {{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $p['level'] }}</h3>
                <p class="text-gray-400 text-sm mb-3">{{ $p['desc'] }}</p>
                <div class="text-{{ $p['warna'] }}-400 text-sm font-semibold"><i class="fas fa-money-bill-wave mr-1"></i>{{ $p['gaji'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="max-w-5xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">STATISTIK</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Career Hub dalam Angka</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in-up">
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">12K+</div><p class="text-gray-400 text-sm mt-2">Lowongan Aktif</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">500+</div><p class="text-gray-400 text-sm mt-2">Perusahaan Mitra</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">89%</div><p class="text-gray-400 text-sm mt-2">Tingkat Penempatan</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">$85K</div><p class="text-gray-400 text-sm mt-2">Rata-rata Gaji</p></div>
    </div>
</section>

{{-- MITRA INDUSTRI --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-kvt-500/10 text-kvt-400 px-3 py-1 rounded-full">MITRA</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Mitra Industri</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Berkolaborasi dengan perusahaan teknologi terkemuka dunia</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="100">
            @foreach(['Google', 'Microsoft', 'Amazon', 'Meta', 'Apple', 'Tesla', 'NVIDIA', 'Intel', 'Samsung', 'Tokopedia', 'Gojek', 'Grab'] as $idx => $p)
            <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition group" data-aos="zoom-in" data-aos-delay="{{ $idx * 40 }}">
                <div class="w-10 h-10 mx-auto bg-kvt-800/50 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition"><i class="fas fa-building text-kvt-400"></i></div>
                <span class="text-xs text-gray-400">{{ $p }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur untuk Setiap Peran</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa', 'fitur' => ['Browse 12,000+ lowongan kerja aktif', 'AI job matching berdasarkan skill Anda', 'Program magang di 500+ perusahaan', 'Mentoring 1-on-1 dari profesional', 'CV Builder dengan template ATS-friendly', 'Career pathway & salary insights']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru', 'fitur' => ['Rekomendasikan lowongan ke siswa', 'Monitor progress karir siswa', 'Kelola program magang & PKL', 'Career counseling dashboard', 'Hubungkan siswa dengan mitra industri', 'Laporan placement & analytics']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh data mitra industri', 'Dashboard analitik karir & placement', 'Konfigurasi AI matching engine', 'Manage program magang sekolah', 'Verifikasi perusahaan partner', 'Report & placement tracking']],
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

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Career Development</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Roadmap Karir Tech 2025', 'durasi' => '14:30', 'views' => '45K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=Career+Roadmap'],
                ['judul' => 'Interview Tips: Big Tech Companies', 'durasi' => '22:15', 'views' => '38K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Interview+Tips'],
                ['judul' => 'Dari Fresh Graduate ke Senior Engineer', 'durasi' => '18:45', 'views' => '52K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Career+Growth'],
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

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah Career Hub gratis untuk siswa?', 'a' => 'Ya, seluruh fitur dasar termasuk job search, AI matching, dan CV Builder tersedia gratis. Paket premium menawarkan priority listing, unlimited mentoring, dan access ke exclusive events.'],
        ['q' => 'Bagaimana cara mendaftar program magang?', 'a' => 'Buat akun KVT Hub, lengkapi profil dan skill Anda, lalu browse program magang yang tersedia. AI kami akan merekomendasikan posisi yang paling cocok dengan profil Anda.'],
        ['q' => 'Apakah lowongan kerja hanya untuk bidang IT?', 'a' => 'Tidak. Kami menyediakan lowongan di 6 sektor utama termasuk bisnis, desain, finance, biotech, dan lainnya. Total 12,000+ lowongan aktif dari 500+ perusahaan mitra.'],
        ['q' => 'Berapa lama biasanya proses rekrutmen?', 'a' => 'Rata-rata 2-4 minggu dari apply hingga offer. Perusahaan mitra kami berkomitmen merespons dalam 7 hari kerja untuk tahap pertama screening.'],
        ['q' => 'Apakah ada dukungan untuk fresh graduate?', 'a' => 'Tentu! Kami punya program khusus fresh graduate termasuk entry-level positions, internship-to-hire, mentoring program, dan career coaching untuk mempersiapkan Anda memasuki dunia kerja.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
            <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
                <span class="text-white font-semibold text-sm pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-gray-500 text-xs group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-orange-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Karir Impian Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis untuk mengakses 12,000+ lowongan, program magang, mentoring profesional, dan AI job matching dari 500+ perusahaan mitra.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-orange-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Mulai Karir
        </a>
    </div>
</section>

@endsection
