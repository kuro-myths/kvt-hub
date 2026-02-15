@extends('tata-letak.utama')
@section('judul', 'Riset & Inovasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(139,92,246,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-microscope"></i> Research Hub - Kolaborasi Global
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Riset &</span><br>
            <span class="teks-gradien">Inovasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pusat riset digital terdepan. Kolaborasi dengan 150+ universitas global, akses dana riset kompetitif,
            dan publikasikan karya ilmiah di jurnal bereputasi internasional.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-purple-500 to-kvt-500 hover:from-purple-400 hover:to-kvt-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/30 hover:-translate-y-0.5">
                <i class="fas fa-flask mr-2"></i>Mulai Riset
            </a>
            <a href="#bidang" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-microscope mr-2"></i>Jelajahi Bidang
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">8</div><div class="text-xs text-gray-500">Bidang Riset</div></div>
            <div><div class="text-2xl font-black text-white">150+</div><div class="text-xs text-gray-500">Universitas</div></div>
            <div><div class="text-2xl font-black text-white">2,400+</div><div class="text-xs text-gray-500">Publikasi</div></div>
            <div><div class="text-2xl font-black text-white">75+</div><div class="text-xs text-gray-500">Negara</div></div>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/riset-lab.svg') }}" alt="Riset & Inovasi" class="w-full max-w-3xl mx-auto rounded-2xl shadow-2xl shadow-green-500/10 border border-green-700/20">
        </div>
    </div>
</section>

{{-- BIDANG RISET --}}
<section id="bidang" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">RESEARCH AREAS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Bidang Riset Unggulan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Fokus penelitian di 8 bidang strategis yang relevan dengan kebutuhan global</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @php
        $riset = [
            ['Artificial Intelligence', 'Machine learning, NLP, computer vision, robotika cerdas', 'fa-brain', 'from-blue-500 to-cyan-500'],
            ['Cybersecurity', 'Kriptografi, keamanan jaringan, forensik digital, zero-trust', 'fa-shield-alt', 'from-red-500 to-orange-500'],
            ['Bioteknologi', 'Genomik, farmasi, bioinformatika, CRISPR, agritech', 'fa-dna', 'from-green-500 to-emerald-500'],
            ['Energi Terbarukan', 'Solar, hydro, wind energy, battery storage', 'fa-solar-panel', 'from-yellow-500 to-amber-500'],
            ['Quantum Computing', 'Qubit, quantum algorithm, quantum cryptography', 'fa-atom', 'from-purple-500 to-violet-500'],
            ['Space Technology', 'Satelit, propulsi, remote sensing, orbital mechanics', 'fa-satellite', 'from-indigo-500 to-blue-500'],
            ['Material Science', 'Nanomaterial, polimer, komposit, metamaterial', 'fa-cube', 'from-teal-500 to-cyan-500'],
            ['Data Science', 'Big data, analytics, visualization, statistik terapan', 'fa-chart-pie', 'from-pink-500 to-rose-500'],
        ];
        @endphp
        @foreach($riset as $i => $r)
        <div class="kaca rounded-2xl p-5 hover:border-purple-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <div class="w-12 h-12 bg-gradient-to-br {{ $r[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $r[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $r[0] }}</h3>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $r[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-purple-800/20 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">2,400+</div><p class="text-gray-400 text-sm mt-1">Karya Ilmiah</p></div>
        <div><div class="text-3xl font-black teks-gradien">380+</div><p class="text-gray-400 text-sm mt-1">Paten Terdaftar</p></div>
        <div><div class="text-3xl font-black teks-gradien">$5M+</div><p class="text-gray-400 text-sm mt-1">Dana Riset Tersalurkan</p></div>
        <div><div class="text-3xl font-black teks-gradien">75+</div><p class="text-gray-400 text-sm mt-1">Negara Kolaborator</p></div>
    </div>
</section>

{{-- ALUR RISET --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">PIPELINE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Riset KVT Hub</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari ide hingga publikasi — setiap tahap didampingi dan terstruktur</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        @php
        $alur = [
            ['Ide & Proposal', 'fa-lightbulb', 'text-yellow-400', 'Ajukan proposal riset dengan template standar internasional.'],
            ['Review & Pendanaan', 'fa-search-dollar', 'text-green-400', 'Tim ahli meninjau dan mengalokasikan dana riset.'],
            ['Eksekusi Riset', 'fa-flask', 'text-blue-400', 'Laksanakan riset dengan akses lab virtual dan dataset.'],
            ['Peer Review', 'fa-users', 'text-purple-400', 'Hasil diperiksa oleh reviewer internasional.'],
            ['Publikasi', 'fa-file-alt', 'text-kvt-400', 'Terbitkan di jurnal Q1-Q4 dan konferensi global.'],
        ];
        @endphp
        @foreach($alur as $i => $a)
        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="w-14 h-14 mx-auto bg-kvt-800/50 rounded-full flex items-center justify-center border border-kvt-700/30 mb-3">
                <i class="fas {{ $a[1] }} {{ $a[2] }} text-xl"></i>
            </div>
            <h4 class="text-white font-semibold text-sm mb-1">{{ $a[0] }}</h4>
            <p class="text-gray-500 text-xs">{{ $a[3] }}</p>
            @if($i < 4)<div class="hidden md:block text-kvt-600 mt-3"><i class="fas fa-arrow-right"></i></div>@endif
        </div>
        @endforeach
    </div>
</section>

{{-- PROYEK RISET AKTIF --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">ACTIVE PROJECTS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Proyek Riset Aktif</h2>
        </div>
        @php
        $proyek = [
            ['AI-Powered Early Disease Detection', 'Deteksi penyakit dini menggunakan deep learning pada citra medis X-ray dan MRI.', 'fa-heartbeat', 'from-red-500 to-rose-500', 'Prof. Dr. Rina Sari', '2025-2027', '$85,000'],
            ['Quantum-Safe Cryptography Protocol', 'Pengembangan protokol kriptografi tahan quantum untuk infrastruktur perbankan.', 'fa-lock', 'from-indigo-500 to-purple-500', 'Dr. Budi Hartono', '2025-2026', '$120,000'],
            ['Smart Grid Renewable Energy', 'Optimisasi distribusi energi terbarukan pada smart grid menggunakan IoT dan AI.', 'fa-bolt', 'from-yellow-500 to-amber-500', 'Dr. Mega Putri', '2026-2028', '$95,000'],
            ['Biodegradable Nano-Packaging', 'Material kemasan biodegradable berbasis nanoteknologi untuk industri FMCG.', 'fa-leaf', 'from-green-500 to-emerald-500', 'Prof. Andi Wijaya', '2025-2027', '$70,000'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($proyek as $i => $p)
            <div class="kaca rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                        <i class="fas {{ $p[2] }} text-white text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold mb-1">{{ $p[0] }}</h3>
                        <p class="text-gray-400 text-sm mb-3">{{ $p[1] }}</p>
                        <div class="flex flex-wrap gap-3 text-xs">
                            <span class="text-cyan-400"><i class="fas fa-user mr-1"></i>{{ $p[4] }}</span>
                            <span class="text-gray-500"><i class="fas fa-calendar mr-1"></i>{{ $p[5] }}</span>
                            <span class="text-green-400"><i class="fas fa-dollar-sign mr-1"></i>{{ $p[6] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR UNGGULAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FEATURES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Infrastruktur Riset Terlengkap</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $fitur = [
            ['150+ Universitas Mitra', 'MIT, Stanford, Oxford, ETH Zurich, ITB, UI, UGM, dan lebih banyak lagi.', 'fa-globe', 'from-purple-500 to-pink-500'],
            ['Dana Riset Kompetitif', 'Hibah riset hingga $100,000 per proyek untuk penelitian inovatif dan berdampak.', 'fa-money-bill-wave', 'from-green-500 to-emerald-500'],
            ['Jurnal & Konferensi', 'Akses publikasi di jurnal Scopus Q1-Q4 dan konferensi IEEE, ACM, Springer.', 'fa-book-open', 'from-blue-500 to-indigo-500'],
            ['Virtual Lab & Dataset', 'Laboratorium virtual dengan GPU cloud, Jupyter Notebook, dan akses dataset publik.', 'fa-laptop-code', 'from-cyan-500 to-teal-500'],
            ['Mentoring Ahli', 'Bimbingan langsung dari profesor dan researcher berpengalaman internasional.', 'fa-user-tie', 'from-amber-500 to-orange-500'],
            ['Open Access Repository', 'Repositori terbuka untuk preprint, dataset, dan kode sumber penelitian.', 'fa-database', 'from-rose-500 to-red-500'],
        ];
        @endphp
        @foreach($fitur as $i => $f)
        <div class="kaca rounded-2xl p-6 text-center hover:border-purple-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br {{ $f[3] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition"><i class="fas {{ $f[2] }} text-white text-2xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $f[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $f[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Pengenalan Riset</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Panduan Menulis Paper Ilmiah', 'durasi' => '14:22', 'views' => '38K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Paper+Writing'],
                ['judul' => 'Research Methodology 101', 'durasi' => '20:15', 'views' => '52K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Methodology+101'],
                ['judul' => 'Cara Mendapatkan Dana Riset', 'durasi' => '11:48', 'views' => '29K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Research+Funding'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-purple-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Mahasiswa / Peneliti', 'fitur' => ['Ajukan proposal riset & dapatkan dana', 'Akses virtual lab & dataset', 'Kolaborasi tim lintas universitas', 'Submit paper ke jurnal terakreditasi', 'Ikuti konferensi & seminar', 'Dapatkan sertifikat & publikasi']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Dosen / Pembimbing', 'fitur' => ['Supervisi riset mahasiswa', 'Review & approve proposal', 'Co-author publikasi ilmiah', 'Kelola lab riset virtual', 'Buat grup riset interdisipliner', 'Akses jurnal premium & database']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin Riset', 'fitur' => ['Kelola alokasi dana riset', 'Monitor progress semua proyek', 'Dashboard analytics riset', 'Kelola kerjasama institusi', 'Audit & compliance riset', 'Laporan output riset berkala']],
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
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Siapa yang bisa mengajukan riset di KVT Hub?', 'a' => 'Semua mahasiswa, dosen, dan peneliti yang terdaftar di platform KVT Hub dapat mengajukan proposal riset. Kolaborasi dengan institusi eksternal juga didukung.'],
        ['q' => 'Berapa besar dana riset yang tersedia?', 'a' => 'Dana riset berkisar $10,000 hingga $100,000 per proyek, tergantung skala dan bidang penelitian. Evaluasi dilakukan oleh tim reviewer internasional.'],
        ['q' => 'Bagaimana proses peer review dilakukan?', 'a' => 'Peer review dilakukan secara double-blind oleh minimal 2 reviewer dari universitas mitra. Proses ini memakan waktu 2-4 minggu.'],
        ['q' => 'Apakah hasil riset bisa dipatenkan?', 'a' => 'Ya, KVT Hub menyediakan layanan konsultasi HKI dan pendampingan pendaftaran paten nasional (DJKI) maupun internasional (PCT).'],
        ['q' => 'Jurnal apa saja yang bisa diakses?', 'a' => 'KVT Hub memberikan akses ke jurnal Scopus Q1-Q4, Web of Science, IEEE Xplore, ACM Digital Library, Springer, dan Elsevier.'],
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
<section class="bg-gradient-to-r from-purple-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Perjalanan Riset Anda Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis, ajukan proposal, dapatkan pendanaan, dan publikasikan riset Anda di jurnal internasional bereputasi.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-kvt-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-purple-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Mulai Riset
        </a>
    </div>
</section>

@endsection
