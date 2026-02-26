@extends('tata-letak.utama')
@section('judul', 'Sertifikasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-award"></i> Sertifikasi Terverifikasi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Program </span><span class="teks-gradien-emas">Sertifikasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Raih sertifikasi yang diakui industri global. Dari sertifikat kompetensi nasional BNSP,
            sertifikasi cloud & tech internasional, hingga micro-credentials berbasis blockchain.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-amber-500/30 hover:-translate-y-0.5">
                <i class="fas fa-certificate mr-2"></i>Mulai Sertifikasi
            </a>
            <a href="#jalur" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-route mr-2"></i>Lihat Jalur
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">120+</div><div class="text-xs text-gray-500">Program</div></div>
            <div><div class="text-2xl font-black text-white">45K+</div><div class="text-xs text-gray-500">Sertifikat</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Mitra</div></div>
            <div><div class="text-2xl font-black text-white">95%</div><div class="text-xs text-gray-500">Lulus</div></div>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/sertifikat-preview.svg') }}" alt="Sertifikasi" class="w-full max-w-2xl mx-auto rounded-2xl shadow-2xl shadow-yellow-500/10 border border-yellow-700/20">
        </div>
    </div>
</section>

{{-- JENIS SERTIFIKASI --}}
<section id="jalur" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jenis Sertifikasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih jalur sertifikasi yang sesuai dengan karier dan tujuan profesional Anda</p>
    </div>
    @php
    $jenis = [
        ['ikon' => 'fas fa-certificate', 'gradien' => 'from-green-500 to-emerald-500', 'warna' => 'green', 'judul' => 'Sertifikat Kompetensi', 'desc' => 'Sertifikasi gratis setelah menyelesaikan kursus. Terintegrasi dengan sistem XP dan level KVT Hub.', 'fitur' => ['Gratis untuk semua member', 'PDF Digital dengan QR Code', 'Terintegrasi sistem XP', 'Shareable ke LinkedIn']],
        ['ikon' => 'fas fa-stamp', 'gradien' => 'from-blue-500 to-indigo-500', 'warna' => 'blue', 'judul' => 'Sertifikasi Industri', 'desc' => 'Sertifikasi yang diakui perusahaan global: AWS, Google Cloud, Microsoft, Cisco, CompTIA.', 'fitur' => ['Proctored Exam resmi', 'Voucher ujian gratis', 'Pengakuan global', 'Career-ready certification']],
        ['ikon' => 'fas fa-link', 'gradien' => 'from-purple-500 to-violet-500', 'warna' => 'purple', 'judul' => 'Micro-Credentials (Blockchain)', 'desc' => 'Sertifikasi berbasis blockchain yang tidak bisa dipalsukan. Verified on-chain dan dapat dibagikan.', 'fitur' => ['Tamper-proof on-chain', 'NFT Badge unik', 'W3C Verifiable Credentials', 'Berlaku selamanya']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($jenis as $j)
        <div class="kaca rounded-2xl p-8 border-{{ $j['warna'] }}-500/20 hover:border-{{ $j['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="w-16 h-16 bg-gradient-to-br {{ $j['gradien'] }} rounded-2xl flex items-center justify-center mb-5 shadow-lg group-hover:scale-110 transition">
                <i class="{{ $j['ikon'] }} text-white text-2xl"></i>
            </div>
            <h3 class="text-white font-bold text-xl mb-2">{{ $j['judul'] }}</h3>
            <p class="text-gray-400 text-sm mb-4">{{ $j['desc'] }}</p>
            <div class="space-y-2">
                @foreach($j['fitur'] as $f)
                <span class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-check text-{{ $j['warna'] }}-400 text-[10px]"></i>{{ $f }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- JALUR SERTIFIKASI (CERTIFICATION PATHS) --}}
<section class="bg-gradient-to-br from-amber-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">CERTIFICATION PATHS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jalur Sertifikasi Populer</h2>
        </div>
        @php
        $paths = [
            ['judul' => 'Cloud & DevOps', 'warna' => 'cyan', 'ikon' => 'fas fa-cloud', 'level' => 4, 'cert' => ['Cloud Practitioner', 'Solutions Architect', 'DevOps Engineer', 'Security Specialty']],
            ['judul' => 'Data & AI', 'warna' => 'purple', 'ikon' => 'fas fa-brain', 'level' => 4, 'cert' => ['Data Analytics', 'Machine Learning', 'Deep Learning', 'AI Engineer']],
            ['judul' => 'Cybersecurity', 'warna' => 'red', 'ikon' => 'fas fa-shield-alt', 'level' => 4, 'cert' => ['Security+', 'CySA+', 'Pentest+', 'CISSP']],
            ['judul' => 'Full-Stack Dev', 'warna' => 'green', 'ikon' => 'fas fa-code', 'level' => 4, 'cert' => ['Frontend Dev', 'Backend Dev', 'Database Expert', 'Full-Stack Pro']],
            ['judul' => 'Networking', 'warna' => 'blue', 'ikon' => 'fas fa-network-wired', 'level' => 3, 'cert' => ['CCNA', 'CCNP Enterprise', 'CCIE Lab']],
            ['judul' => 'Project Management', 'warna' => 'amber', 'ikon' => 'fas fa-tasks', 'level' => 3, 'cert' => ['CAPM', 'PMP', 'PMI-ACP']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($paths as $p)
            <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-{{ $p['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i></div>
                    <div>
                        <h3 class="text-white font-bold text-lg">{{ $p['judul'] }}</h3>
                        <span class="text-xs text-gray-500">{{ $p['level'] }} level sertifikasi</span>
                    </div>
                </div>
                <div class="space-y-2">
                    @foreach($p['cert'] as $idx => $c)
                    <div class="flex items-center gap-3">
                        <div class="w-6 h-6 bg-{{ $p['warna'] }}-500/20 rounded-full flex items-center justify-center text-[10px] text-{{ $p['warna'] }}-400 font-bold">{{ $idx + 1 }}</div>
                        <span class="text-sm text-gray-300">{{ $c }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CERTIFICATION ROADMAP --}}
<section class="max-w-7xl mx-auto px-4 py-20 bg-gradient-to-b from-kvt-900/30 to-transparent">
    <div class="text-center mb-16" data-aos="fade-down">
        <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-route mr-2"></i>Career Path</span>
        <h2 class="text-4xl font-black text-white mt-2">Roadmap Sertifikasi Karir</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Jalur pembelajaran terstruktur dari Junior hingga Expert dengan milestone sertifikasi</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        {{-- Junior Developer Path --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-green-500/30 transition-all relative" data-aos="fade-up">
            <div class="absolute top-4 right-4 bg-green-500/10 border border-green-500/30 rounded-lg px-3 py-1">
                <span class="text-green-400 text-xs font-bold"><i class="fas fa-play-circle mr-1"></i>Beginner</span>
            </div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-code text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Junior Developer</h3>
            </div>
            <p class="text-gray-400 text-sm mb-6">Waktu: 3-6 bulan | Target Salary: $1.5K-2.5K/bulan</p>
            <div class="space-y-3">
                <div class="bg-green-500/5 border border-green-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Sertifikasi Target:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-green-400 mr-2"></i>BNSP Junior Web Dev {Frontend}</li>
                        <li><i class="fas fa-check text-green-400 mr-2"></i>Google IT Support Professional</li>
                        <li><i class="fas fa-check text-green-400 mr-2"></i>Codementor Certification</li>
                    </ul>
                </div>
                <div class="bg-green-500/5 border border-green-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Skills yang Dipelajari:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-green-400 mr-2"></i>HTML, CSS, JavaScript ES6+</li>
                        <li><i class="fas fa-check text-green-400 mr-2"></i>React / Vue.js Fundamentals</li>
                        <li><i class="fas fa-check text-green-400 mr-2"></i>Responsive Design & Git</li>
                    </ul>
                </div>
                <a href="#" class="block text-center bg-green-600 hover:bg-green-500 text-white py-2 rounded-lg font-semibold text-sm transition">Mulai Jalur Ini</a>
            </div>
        </div>

        {{-- Senior Developer Path --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-blue-500/30 transition-all relative md:mt-6" data-aos="fade-up" data-aos-delay="100">
            <div class="absolute top-4 right-4 bg-blue-500/10 border border-blue-500/30 rounded-lg px-3 py-1">
                <span class="text-blue-400 text-xs font-bold"><i class="fas fa-arrow-up mr-1"></i>Intermediate</span>
            </div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-layer-group text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Senior Developer</h3>
            </div>
            <p class="text-gray-400 text-sm mb-6">Waktu: 6-12 bulan | Target Salary: $3K-6K/bulan</p>
            <div class="space-y-3">
                <div class="bg-blue-500/5 border border-blue-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Sertifikasi Target:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>AWS Solutions Architect</li>
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>Node.js Certification</li>
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>Docker & Kubernetes Basics</li>
                    </ul>
                </div>
                <div class="bg-blue-500/5 border border-blue-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Skills yang Dipelajari:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>Full-Stack Development</li>
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>Cloud Architecture & DevOps</li>
                        <li><i class="fas fa-check text-blue-400 mr-2"></i>Microservices & APIs</li>
                    </ul>
                </div>
                <a href="#" class="block text-center bg-blue-600 hover:bg-blue-500 text-white py-2 rounded-lg font-semibold text-sm transition">Lanjut Jalur Ini</a>
            </div>
        </div>

        {{-- Tech Lead Path --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-purple-500/30 transition-all relative" data-aos="fade-up" data-aos-delay="200">
            <div class="absolute top-4 right-4 bg-purple-500/10 border border-purple-500/30 rounded-lg px-3 py-1">
                <span class="text-purple-400 text-xs font-bold"><i class="fas fa-star mr-1"></i>Advanced</span>
            </div>
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-crown text-white text-xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-white">Tech Lead / Architect</h3>
            </div>
            <p class="text-gray-400 text-sm mb-6">Waktu: 12+ bulan | Target Salary: $6K-15K+/bulan</p>
            <div class="space-y-3">
                <div class="bg-purple-500/5 border border-purple-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Sertifikasi Target:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>AWS Solutions Architect Pro</li>
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>TOGAF Enterprise Architect</li>
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>Kubernetes Expert (CKA/CKAD)</li>
                    </ul>
                </div>
                <div class="bg-purple-500/5 border border-purple-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold text-sm mb-2">Skills yang Dipelajari:</h4>
                    <ul class="space-y-1 text-xs text-gray-300">
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>Enterprise Architecture</li>
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>Team Leadership & Mentoring</li>
                        <li><i class="fas fa-check text-purple-400 mr-2"></i>System Design & Scaling</li>
                    </ul>
                </div>
                <a href="#" class="block text-center bg-purple-600 hover:bg-purple-500 text-white py-2 rounded-lg font-semibold text-sm transition">Reach the Top</a>
            </div>
        </div>
    </div>

    {{-- Success Tips --}}
    <div class="mt-12 bg-gradient-to-r from-amber-900/20 to-orange-900/20 border border-amber-500/20 rounded-2xl p-8" data-aos="zoom-in">
        <h3 class="text-xl font-black text-white mb-4 flex items-center">
            <i class="fas fa-fire text-orange-400 mr-3"></i>Kunci Sukses Mendapat Sertifikasi
        </h3>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="flex gap-3">
                <i class="fas fa-check-circle text-amber-400 text-lg mt-0.5 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">Belajar Konsisten</h4>
                    <p class="text-gray-400 text-xs">1-2 jam per hari lebih baik dari belajar berat sesekali. Consistency is key!</p>
                </div>
            </div>
            <div class="flex gap-3">
                <i class="fas fa-check-circle text-amber-400 text-lg mt-0.5 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">Praktek Langsung</h4>
                    <p class="text-gray-400 text-xs">Build projects, code hands-on, eksperimen. Teori saja tidak cukup.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <i class="fas fa-check-circle text-amber-400 text-lg mt-0.5 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">Mock Test & Review</h4>
                    <p class="text-gray-400 text-xs">Ikuti mock exam berkali-kali. Pelajari area yang belum dikuasai.</p>
                </div>
            </div>
            <div class="flex gap-3">
                <i class="fas fa-check-circle text-amber-400 text-lg mt-0.5 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">Study Group Aktif</h4>
                    <p class="text-gray-400 text-xs">Berbagi dengan kelompok belajar. Diskusi soal = deeper understanding.</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- JADWAL UJIAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">JADWAL</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jadwal Ujian Sertifikasi</h2>
    </div>
    @php
    $jadwal = [
        ['bulan' => 'Mar 2026', 'ujian' => 'AWS Cloud Practitioner Batch 12', 'tipe' => 'Online Proctored', 'warna' => 'orange'],
        ['bulan' => 'Mar 2026', 'ujian' => 'BNSP Junior Web Developer', 'tipe' => 'TUK KVT Hub', 'warna' => 'red'],
        ['bulan' => 'Apr 2026', 'ujian' => 'Google Data Analytics', 'tipe' => 'Online Proctored', 'warna' => 'blue'],
        ['bulan' => 'Apr 2026', 'ujian' => 'CompTIA Security+', 'tipe' => 'Pearson VUE Center', 'warna' => 'cyan'],
        ['bulan' => 'Mei 2026', 'ujian' => 'Microsoft AZ-900', 'tipe' => 'Online Proctored', 'warna' => 'green'],
        ['bulan' => 'Jun 2026', 'ujian' => 'Blockchain Credential Issuance', 'tipe' => 'On-chain Verification', 'warna' => 'purple'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($jadwal as $j)
        <div class="kaca rounded-xl p-5 flex flex-col md:flex-row items-start md:items-center gap-4 border-{{ $j['warna'] }}-500/20 hover:border-{{ $j['warna'] }}-500/40 transition" data-aos="fade-up">
            <span class="text-xs bg-{{ $j['warna'] }}-500/10 text-{{ $j['warna'] }}-400 px-3 py-1 rounded-full font-mono whitespace-nowrap">{{ $j['bulan'] }}</span>
            <div class="flex-1">
                <h4 class="text-white font-semibold">{{ $j['ujian'] }}</h4>
                <p class="text-gray-500 text-xs">{{ $j['tipe'] }}</p>
            </div>
            <span class="text-xs bg-kvt-800/50 text-kvt-300 px-3 py-1 rounded-full"><i class="fas fa-calendar-check mr-1"></i>Daftar</span>
        </div>
        @endforeach
    </div>
</section>

{{-- MITRA SERTIFIKASI --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">PARTNER INSTITUTIONS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Mitra Sertifikasi</h2>
        </div>
        @php
        $mitra = [
            ['Amazon Web Services', 'fab fa-aws', 'text-orange-400'],
            ['Google Cloud', 'fab fa-google', 'text-blue-400'],
            ['Microsoft', 'fab fa-microsoft', 'text-cyan-400'],
            ['Cisco', 'fas fa-network-wired', 'text-green-400'],
            ['CompTIA', 'fas fa-shield-alt', 'text-red-400'],
            ['BNSP', 'fas fa-flag', 'text-amber-400'],
            ['PMI', 'fas fa-tasks', 'text-yellow-400'],
            ['Linux Foundation', 'fab fa-linux', 'text-gray-400'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
            @foreach($mitra as $m)
            <div class="kaca rounded-xl p-6 text-center hover:border-amber-500/30 transition group">
                <i class="{{ $m[1] }} {{ $m[2] }} text-3xl mb-3 block group-hover:scale-110 transition"></i>
                <span class="text-sm text-gray-400 group-hover:text-white transition">{{ $m[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-amber-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">120+</div><p class="text-gray-400 text-sm mt-1">Program Sertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">45K+</div><p class="text-gray-400 text-sm mt-1">Sertifikat Diterbitkan</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">30+</div><p class="text-gray-400 text-sm mt-1">Mitra Sertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">95%</div><p class="text-gray-400 text-sm mt-1">Tingkat Kelulusan</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Sertifikasi</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Raih Sertifikasi AWS', 'durasi' => '14:30', 'views' => '28K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=AWS+Cert+Guide'],
            ['judul' => 'Tips Lulus BNSP Pertama Kali', 'durasi' => '11:45', 'views' => '19K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EF4444?text=BNSP+Tips'],
            ['judul' => 'Blockchain Credential 101', 'durasi' => '16:20', 'views' => '15K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Blockchain+Cred'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-amber-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Ikuti kursus persiapan sertifikasi', 'Akses simulasi ujian & latihan soal', 'Raih sertifikat digital otomatis', 'Track progress sertifikasi di dashboard', 'Bagikan credential ke LinkedIn', 'Dapatkan voucher ujian gratis']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Buat kursus prep sertifikasi', 'Upload bank soal & simulasi', 'Terbitkan sertifikat kompetensi', 'Monitor kelulusan siswa', 'Buat learning path terstruktur', 'Kolaborasi dengan mitra sertifikasi']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola semua program sertifikasi', 'Konfigurasi jadwal & batch ujian', 'Dashboard analytics sertifikasi', 'Kelola mitra & partner institutions', 'Terbitkan blockchain credentials', 'Audit trail & laporan kelulusan']],
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
        ['q' => 'Apakah sertifikat KVT Hub diakui industri?', 'a' => 'Ya, sertifikat kompetensi KVT Hub terintegrasi QR code verifikasi. Untuk sertifikasi industri (AWS, Google, dll), ujian dilaksanakan langsung oleh provider resmi masing-masing.'],
        ['q' => 'Berapa biaya ujian sertifikasi?', 'a' => 'Sertifikat kompetensi KVT Hub gratis. Untuk sertifikasi industri, biaya bervariasi tergantung provider. Pelajar berprestasi bisa mendapat voucher ujian gratis.'],
        ['q' => 'Bagaimana cara kerja blockchain credential?', 'a' => 'Sertifikat Anda di-hash dan dicatat di blockchain publik. Siapa pun bisa memverifikasi keasliannya tanpa menghubungi KVT Hub. Tidak bisa dipalsukan dan berlaku selamanya.'],
        ['q' => 'Apakah ada kursus persiapan ujian?', 'a' => 'Ya, setiap jalur sertifikasi dilengkapi kursus persiapan, simulasi ujian, bank soal, dan study guide yang diperbarui secara berkala.'],
        ['q' => 'Berapa lama masa berlaku sertifikat?', 'a' => 'Sertifikat kompetensi KVT Hub dan blockchain credential berlaku selamanya. Sertifikasi industri mengikuti kebijakan masing-masing provider (umumnya 2-3 tahun, bisa diperpanjang).'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-amber-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-amber-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Perjalanan Sertifikasi Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan akses kursus persiapan, simulasi ujian, serta raih sertifikasi yang diakui global.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Mulai Gratis
        </a>
    </div>
</section>

@endsection
