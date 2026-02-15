@extends('tata-letak.utama')
@section('judul', 'Cloud & Tech Certification - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-sky-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-sky-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #0EA5E9 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-sky-800/30 border border-sky-600/30 rounded-full px-4 py-1.5 text-xs text-sky-300 mb-6" data-aos="fade-down">
            <i class="fas fa-cloud"></i> Sertifikasi Internasional
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Cloud & </span><span class="teks-gradien">Tech</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Persiapan sertifikasi cloud dan teknologi global — AWS, Google Cloud, Azure, Cisco, dan CompTIA.
            Voucher ujian gratis untuk pelajar berprestasi. Hands-on labs dan simulasi ujian lengkap.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-sky-500 to-blue-500 hover:from-sky-400 hover:to-blue-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-sky-500/30 hover:-translate-y-0.5">
                <i class="fas fa-cloud-upload-alt mr-2"></i>Mulai Belajar
            </a>
            <a href="#tracks" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-route mr-2"></i>Lihat Tracks
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">40+</div><div class="text-xs text-gray-500">Jalur Sertifikasi</div></div>
            <div><div class="text-2xl font-black text-white">3K+</div><div class="text-xs text-gray-500">Tersertifikasi</div></div>
            <div><div class="text-2xl font-black text-white">Free</div><div class="text-xs text-gray-500">Voucher Ujian</div></div>
            <div><div class="text-2xl font-black text-white">4</div><div class="text-xs text-gray-500">Cloud Provider</div></div>
        </div>
    </div>
</section>

{{-- CERTIFICATION TRACKS --}}
<section id="tracks" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-sky-500/10 text-sky-400 px-3 py-1 rounded-full">CERTIFICATION TRACKS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jalur Sertifikasi per Provider</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih cloud provider dan ikuti learning path dari level foundational hingga professional</p>
    </div>
    @php
    $sertifikasi = [
        ['ikon' => 'fab fa-aws', 'warna' => 'amber', 'judul' => 'AWS Certified', 'jalur' => ['Cloud Practitioner', 'Solutions Architect', 'Developer Associate', 'DevOps Engineer'], 'desc' => 'Sertifikasi Amazon Web Services dari level foundational hingga professional.', 'biaya' => '$100 - $300'],
        ['ikon' => 'fab fa-google', 'warna' => 'blue', 'judul' => 'Google Cloud', 'jalur' => ['Cloud Digital Leader', 'Associate Cloud Engineer', 'Professional Data Engineer', 'Professional ML Engineer'], 'desc' => 'Google Cloud Platform certification dengan hands-on labs di Qwiklabs.', 'biaya' => '$99 - $200'],
        ['ikon' => 'fab fa-microsoft', 'warna' => 'cyan', 'judul' => 'Microsoft Azure', 'jalur' => ['AZ-900 Fundamentals', 'AZ-104 Administrator', 'AZ-204 Developer', 'AZ-400 DevOps'], 'desc' => 'Microsoft Azure certification path dari fundamentals hingga expert.', 'biaya' => '$99 - $165'],
        ['ikon' => 'fas fa-network-wired', 'warna' => 'green', 'judul' => 'Cisco', 'jalur' => ['CCNA', 'CCNP Enterprise', 'CyberOps Associate', 'DevNet Associate'], 'desc' => 'Cisco networking certification — standar emas industri jaringan global.', 'biaya' => '$165 - $400'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($sertifikasi as $s)
        <div class="kaca rounded-2xl p-8 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-5">
                <div class="w-16 h-16 bg-{{ $s['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                    <i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400 text-3xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-xl mb-2">{{ $s['judul'] }}</h3>
                    <p class="text-gray-400 text-sm mb-3">{{ $s['desc'] }}</p>
                    <div class="flex flex-wrap gap-2 mb-3">
                        @foreach($s['jalur'] as $j)
                        <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-1 rounded-full">{{ $j }}</span>
                        @endforeach
                    </div>
                    <span class="text-xs text-gray-500"><i class="fas fa-dollar-sign mr-1"></i>Biaya ujian: {{ $s['biaya'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- DIFFICULTY LEVELS --}}
<section class="bg-gradient-to-br from-sky-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">LEVEL</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tingkat Kesulitan</h2>
        </div>
        @php
        $levels = [
            ['level' => 'Foundational', 'ikon' => 'fas fa-seedling', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'desc' => 'Dasar cloud computing dan layanan inti. Cocok untuk pemula tanpa pengalaman teknis.', 'durasi' => '2-4 minggu', 'contoh' => 'AWS Cloud Practitioner, AZ-900, Cloud Digital Leader'],
            ['level' => 'Associate', 'ikon' => 'fas fa-user-cog', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'desc' => 'Implementasi dan manajemen layanan cloud. Membutuhkan 6+ bulan pengalaman.', 'durasi' => '2-3 bulan', 'contoh' => 'Solutions Architect Assoc, AZ-104, Associate Cloud Eng'],
            ['level' => 'Professional', 'ikon' => 'fas fa-user-tie', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'desc' => 'Arsitektur kompleks dan best practices. Membutuhkan 2+ tahun pengalaman.', 'durasi' => '3-6 bulan', 'contoh' => 'Solutions Architect Pro, Prof Data Engineer, CCNP'],
            ['level' => 'Specialty', 'ikon' => 'fas fa-star', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'desc' => 'Keahlian mendalam di domain spesifik: security, ML, networking, database.', 'durasi' => '3-6 bulan', 'contoh' => 'AWS Security Specialty, Prof ML Engineer, CCIE'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($levels as $l)
            <div class="kaca rounded-2xl p-6 border-{{ $l['warna'] }}-500/20 hover:border-{{ $l['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="w-14 h-14 bg-gradient-to-br {{ $l['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $l['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $l['level'] }}</h3>
                <p class="text-gray-400 text-sm mb-3">{{ $l['desc'] }}</p>
                <span class="text-xs text-gray-500 block mb-2"><i class="fas fa-clock mr-1"></i>Persiapan: {{ $l['durasi'] }}</span>
                <p class="text-xs text-{{ $l['warna'] }}-400/80">{{ $l['contoh'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PREP RESOURCES & COURSE BUNDLES --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">PREP RESOURCES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sumber Belajar & Course Bundles</h2>
    </div>
    @php
    $resources = [
        ['ikon' => 'fas fa-book-open', 'warna' => 'blue', 'judul' => 'Study Guides', 'desc' => 'Panduan belajar terstruktur per sertifikasi. Mencakup semua exam objectives dan domain.', 'jumlah' => '40+ guides'],
        ['ikon' => 'fas fa-laptop-code', 'warna' => 'green', 'judul' => 'Hands-on Labs', 'desc' => 'Lab interaktif langsung di cloud environment. Praktik langsung tanpa perlu akun sendiri.', 'jumlah' => '200+ labs'],
        ['ikon' => 'fas fa-question-circle', 'warna' => 'amber', 'judul' => 'Practice Exams', 'desc' => 'Simulasi ujian dengan format dan tingkat kesulitan yang sama dengan ujian sebenarnya.', 'jumlah' => '5000+ soal'],
        ['ikon' => 'fas fa-video', 'warna' => 'red', 'judul' => 'Video Courses', 'desc' => 'Kursus video dari instruktur bersertifikasi. Step-by-step dari dasar hingga exam-ready.', 'jumlah' => '300+ jam'],
        ['ikon' => 'fas fa-file-alt', 'warna' => 'purple', 'judul' => 'Cheat Sheets', 'desc' => 'Ringkasan cepat per layanan dan konsep. Ideal untuk review sebelum ujian.', 'jumlah' => '80+ sheets'],
        ['ikon' => 'fas fa-users', 'warna' => 'cyan', 'judul' => 'Study Groups', 'desc' => 'Grup belajar bersama per sertifikasi. Diskusi, mentoring, dan peer review.', 'jumlah' => '25+ grup'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($resources as $r)
        <div class="kaca rounded-2xl p-6 border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $r['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition"><i class="fas {{ $r['ikon'] }} text-{{ $r['warna'] }}-400 text-xl"></i></div>
                <span class="text-[10px] bg-{{ $r['warna'] }}-500/10 text-{{ $r['warna'] }}-400 px-2 py-0.5 rounded-full border border-{{ $r['warna'] }}-500/20">{{ $r['jumlah'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $r['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $r['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-sky-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">40+</div><p class="text-gray-400 text-sm mt-1">Jalur Sertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">3K+</div><p class="text-gray-400 text-sm mt-1">Tersertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">Free</div><p class="text-gray-400 text-sm mt-1">Voucher Ujian</p></div>
        <div><div class="text-3xl font-black teks-gradien">Global</div><p class="text-gray-400 text-sm mt-1">Pengakuan</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Cloud Cert</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'AWS vs Azure vs GCP Comparison', 'durasi' => '18:30', 'views' => '35K', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=Cloud+Comparison'],
            ['judul' => 'Cara Dapat Voucher Ujian Gratis', 'durasi' => '08:15', 'views' => '41K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Free+Voucher'],
            ['judul' => 'Kubernetes Certification Path', 'durasi' => '22:45', 'views' => '27K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=K8s+Cert'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-sky-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Akses hands-on labs gratis', 'Ikuti practice exam tanpa batas', 'Dapatkan voucher ujian gratis', 'Join study group per sertifikasi', 'Track progress learning path', 'Raih digital badge per level']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Buat kursus prep sertifikasi', 'Upload lab exercises & soal', 'Monitor progress siswa', 'Akses dashboard kelulusan', 'Buat learning path custom', 'Kolaborasi dengan cloud provider']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua certification tracks', 'Distribusi voucher ujian', 'Dashboard analytics kelulusan', 'Kelola partnership provider', 'Konfigurasi lab environments', 'Laporan ROI sertifikasi']],
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
        ['q' => 'Cloud provider mana yang sebaiknya saya pilih?', 'a' => 'Tergantung tujuan karier Anda. AWS memiliki market share terbesar dan paling banyak dicari. Azure populer di enterprise dan perusahaan yang menggunakan Microsoft. GCP unggul di bidang data & AI. Cisco untuk jaringan dan infrastructure.'],
        ['q' => 'Apakah voucher ujian benar-benar gratis?', 'a' => 'Ya, KVT Hub menyediakan voucher ujian gratis untuk pelajar berprestasi. Syaratnya: selesaikan learning path, capai skor 85%+ di practice exam, dan aktif di study group. Kuota terbatas per batch.'],
        ['q' => 'Berapa biaya ujian sertifikasi cloud?', 'a' => 'Biaya bervariasi: AWS $100-$300, Google Cloud $99-$200, Azure $99-$165, Cisco $165-$400. Semua harga belum termasuk pajak. Beberapa ujian retake juga berbayar.'],
        ['q' => 'Apakah sertifikasi cloud perlu diperpanjang?', 'a' => 'Ya, umumnya sertifikasi cloud berlaku 2-3 tahun. AWS 3 tahun, Google Cloud 2 tahun, Azure 1 tahun (dengan renewal gratis via Microsoft Learn). Cisco CCNA berlaku 3 tahun.'],
        ['q' => 'Apakah ada ujian dalam Bahasa Indonesia?', 'a' => 'Sebagian besar ujian hanya tersedia dalam Bahasa Inggris. Namun kursus persiapan di KVT Hub tersedia dalam Bahasa Indonesia dengan penjelasan bilingual untuk istilah teknis.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-sky-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-sky-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Raih Sertifikasi Cloud & Tech Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis, akses hands-on labs, dan persiapkan diri untuk sertifikasi cloud yang diakui global.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-blue-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-sky-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Mulai Learning Path
        </a>
    </div>
</section>

@endsection
