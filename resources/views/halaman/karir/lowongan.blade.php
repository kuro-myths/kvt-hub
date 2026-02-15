@extends('tata-letak.utama')
@section('judul', 'Lowongan Kerja - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F97316 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-briefcase"></i> 12,000+ Lowongan Aktif
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Lowongan</span><br>
            <span class="teks-gradien-emas">Kerja</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Temukan karir impian di perusahaan top nasional dan internasional. AI job-matching yang mencocokkan skill Anda
            dengan lowongan terbaik dari 500+ perusahaan mitra di berbagai industri.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                <i class="fas fa-search mr-2"></i>Cari Lowongan
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">12K+</div><div class="text-xs text-gray-500">Lowongan</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Perusahaan</div></div>
            <div><div class="text-2xl font-black text-white">89%</div><div class="text-xs text-gray-500">Match Rate</div></div>
            <div><div class="text-2xl font-black text-white">AI</div><div class="text-xs text-gray-500">Job Matching</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI LOWONGAN --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Lowongan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ribuan lowongan tersedia di berbagai bidang industri dan level pengalaman</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $kategori = [
            ['Software Engineering', '3,000+ lowongan', 'fa-code', 'from-blue-500 to-indigo-500', ['Frontend', 'Backend', 'Mobile', 'DevOps']],
            ['Data & AI', '2,500+ lowongan', 'fa-brain', 'from-purple-500 to-violet-500', ['Data Analyst', 'ML Engineer', 'Data Engineer', 'AI Researcher']],
            ['Product & Design', '1,800+ lowongan', 'fa-palette', 'from-pink-500 to-rose-500', ['UX Designer', 'UI Engineer', 'Product Manager', 'Researcher']],
            ['Marketing & Sales', '1,500+ lowongan', 'fa-bullhorn', 'from-green-500 to-emerald-500', ['Digital Marketing', 'Growth Hacker', 'Sales Lead', 'SEO']],
            ['Finance & Accounting', '1,200+ lowongan', 'fa-chart-line', 'from-yellow-500 to-amber-500', ['Financial Analyst', 'Accountant', 'Auditor', 'Tax']],
            ['Operations & HR', '2,000+ lowongan', 'fa-users-cog', 'from-orange-500 to-red-500', ['HR Manager', 'Recruiter', 'Operations', 'Business Analyst']],
        ];
        @endphp
        @foreach($kategori as $idx => $k)
        <div class="kaca rounded-2xl p-6 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $k[3] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition"><i class="fas {{ $k[2] }} text-white text-xl"></i></div>
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full border border-green-500/20">{{ $k[1] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $k[0] }}</h3>
            <div class="flex flex-wrap gap-1.5">
                @foreach($k[4] as $sub)
                <span class="text-[10px] bg-kvt-800/50 text-gray-400 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $sub }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FEATURED LISTINGS --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FEATURED</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Lowongan Pilihan</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Posisi terbaru dari perusahaan mitra terpilih</p>
        </div>
        @php
        $lowongan = [
            ['posisi' => 'Senior Frontend Engineer', 'perusahaan' => 'Tokopedia', 'lokasi' => 'Jakarta, Indonesia', 'tipe' => 'Full-time', 'gaji' => 'Rp 25-40 jt/bln', 'warna' => 'green', 'tags' => ['React', 'TypeScript', 'Next.js']],
            ['posisi' => 'Data Scientist', 'perusahaan' => 'Gojek', 'lokasi' => 'Jakarta / Remote', 'tipe' => 'Full-time', 'gaji' => 'Rp 30-50 jt/bln', 'warna' => 'purple', 'tags' => ['Python', 'ML', 'SQL']],
            ['posisi' => 'Product Designer', 'perusahaan' => 'Grab', 'lokasi' => 'Singapore / Remote', 'tipe' => 'Full-time', 'gaji' => 'SGD 6-10K/bln', 'warna' => 'pink', 'tags' => ['Figma', 'Design System', 'Research']],
            ['posisi' => 'DevOps Engineer', 'perusahaan' => 'Bukalapak', 'lokasi' => 'Bandung, Indonesia', 'tipe' => 'Full-time', 'gaji' => 'Rp 20-35 jt/bln', 'warna' => 'blue', 'tags' => ['Kubernetes', 'AWS', 'CI/CD']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($lowongan as $idx => $l)
            <div class="kaca rounded-2xl p-6 border-{{ $l['warna'] }}-500/20 hover:border-{{ $l['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="text-white font-bold text-lg">{{ $l['posisi'] }}</h3>
                        <p class="text-{{ $l['warna'] }}-400 text-sm">{{ $l['perusahaan'] }}</p>
                    </div>
                    <span class="text-[10px] bg-{{ $l['warna'] }}-500/10 text-{{ $l['warna'] }}-400 px-2 py-0.5 rounded-full border border-{{ $l['warna'] }}-500/20">{{ $l['tipe'] }}</span>
                </div>
                <div class="flex items-center gap-4 text-xs text-gray-400 mb-3">
                    <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $l['lokasi'] }}</span>
                    <span><i class="fas fa-money-bill-wave mr-1"></i>{{ $l['gaji'] }}</span>
                </div>
                <div class="flex flex-wrap gap-1.5">
                    @foreach($l['tags'] as $tag)
                    <span class="text-[10px] bg-kvt-800/50 text-gray-400 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- APPLICATION TIPS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">TIPS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tips Melamar Kerja</h2>
    </div>
    @php
    $tips = [
        ['ikon' => 'fa-file-alt', 'warna' => 'blue', 'judul' => 'CV yang Menonjol', 'desc' => 'Gunakan CV Builder untuk membuat CV ATS-friendly yang menonjolkan skill dan achievement Anda dengan metrik yang concrete.'],
        ['ikon' => 'fa-search', 'warna' => 'green', 'judul' => 'Riset Perusahaan', 'desc' => 'Pelajari visi, misi, produk, dan culture perusahaan. Tunjukkan ketertarikan genuino Anda saat interview.'],
        ['ikon' => 'fa-comments', 'warna' => 'purple', 'judul' => 'Mock Interview', 'desc' => 'Latihan interview dengan mentor untuk behavioral, technical, dan case study questions dari perusahaan target.'],
        ['ikon' => 'fa-handshake', 'warna' => 'orange', 'judul' => 'Networking Aktif', 'desc' => 'Bangun koneksi di LinkedIn, hadiri event industri, dan manfaatkan alumni network untuk mendapat referral.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($tips as $idx => $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $t['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">STATISTIK</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Job Board dalam Angka</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in-up">
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">12K+</div><p class="text-gray-400 text-sm mt-2">Lowongan Aktif</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">500+</div><p class="text-gray-400 text-sm mt-2">Perusahaan</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">89%</div><p class="text-gray-400 text-sm mt-2">Match Rate</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">7 Hari</div><p class="text-gray-400 text-sm mt-2">Avg. Response</p></div>
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
        ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pencari Kerja', 'fitur' => ['Browse 12,000+ lowongan aktif', 'AI job matching berdasarkan skill', 'One-click apply dengan CV Builder', 'Track status lamaran real-time', 'Notifikasi lowongan baru via email', 'Simpan & bookmark lowongan favorit']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Career Advisor', 'fitur' => ['Rekomendasikan lowongan ke siswa', 'Monitor aktivitas lamaran siswa', 'Hubungkan siswa ke hiring manager', 'Buat career counseling session', 'Akses data salary benchmark', 'Dashboard placement analytics']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola data perusahaan mitra', 'Post & manage lowongan kerja', 'Dashboard rekrutmen & analitik', 'Verifikasi perusahaan partner', 'Konfigurasi AI matching engine', 'Report & quality assurance']],
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
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Karir</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Cara Menggunakan AI Job Matching', 'durasi' => '10:15', 'views' => '31K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=AI+Matching'],
                ['judul' => 'Tips Melamar di Startup vs Corporate', 'durasi' => '16:40', 'views' => '27K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Startup+vs+Corp'],
                ['judul' => 'Negosiasi Gaji: Panduan Lengkap', 'durasi' => '19:55', 'views' => '44K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Salary+Negotiation'],
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
        ['q' => 'Apakah mencari lowongan di KVT Hub gratis?', 'a' => 'Ya, seluruh fitur pencarian lowongan, AI job matching, dan satu-kali apply tersedia gratis. Premium plan menyediakan priority listing, unlimited apply, dan interview coaching tambahan.'],
        ['q' => 'Bagaimana cara kerja AI Job Matching?', 'a' => 'AI kami menganalisis skill, pengalaman, preferensi lokasi, dan salary expectation Anda, lalu mencocokkannya dengan 12,000+ lowongan aktif untuk menghasilkan rekomendasi dengan match score tertinggi.'],
        ['q' => 'Berapa lama proses rekrutmen biasanya?', 'a' => 'Rata-rata perusahaan mitra kami merespons dalam 7 hari kerja. Total proses dari apply hingga offer biasanya 2-4 minggu tergantung posisi dan perusahaan.'],
        ['q' => 'Apakah ada lowongan remote atau WFH?', 'a' => 'Ya, sekitar 35% lowongan kami menawarkan opsi remote/hybrid. Anda bisa memfilter berdasarkan tipe kerja (on-site, hybrid, atau full remote) di halaman pencarian.'],
        ['q' => 'Bagaimana jika saya fresh graduate tanpa pengalaman?', 'a' => 'Kami punya kategori khusus entry-level dan fresh graduate dengan 2,000+ lowongan. Kombinasikan dengan program magang dan CV Builder untuk meningkatkan peluang Anda.'],
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
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Temukan Karir Impian Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis untuk mengakses 12,000+ lowongan kerja, AI job matching, dan one-click apply dari 500+ perusahaan mitra.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-orange-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Cari Lowongan
        </a>
    </div>
</section>

@endsection
