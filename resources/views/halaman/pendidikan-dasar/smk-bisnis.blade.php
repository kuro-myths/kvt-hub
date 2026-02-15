@extends('tata-letak.utama')
@section('judul', 'SMK Bisnis & Manajemen - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-emerald-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(16,185,129,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-emerald-800/30 border border-emerald-600/30 rounded-full px-4 py-1.5 text-xs text-emerald-300 mb-6" data-aos="fade-down">
            <i class="fas fa-chart-line"></i> SMK Bisnis & Manajemen
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SMK </span><span class="teks-gradien">Bisnis</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kuasai dunia bisnis dan keuangan. Akuntansi, pemasaran, administrasi, dan kewirausahaan. Siap bersaing di dunia kerja profesional.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-400 hover:to-green-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-emerald-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Belajar
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Jurusan --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Kompetensi Keahlian</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Program keahlian bisnis, manajemen, dan keuangan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $jurusan = [
            ['Akuntansi & Keuangan', 'Pembukuan, laporan keuangan, perpajakan, dan audit dasar.', 'fa-calculator', 'from-green-500 to-emerald-500', ['MYOB', 'Accurate', 'Excel', 'SAP']],
            ['Pemasaran Digital', 'Digital marketing, e-commerce, social media, dan SEO/SEM.', 'fa-bullhorn', 'from-blue-500 to-cyan-500', ['Google Ads', 'Meta Ads', 'SEO', 'Shopee']],
            ['Administrasi Perkantoran', 'Manajemen kantor, korespondensi, arsip, dan keprotokolan.', 'fa-file-invoice', 'from-purple-500 to-violet-500', ['MS Office', 'Docs', 'Filing', 'Meeting']],
            ['Perbankan & Keuangan Mikro', 'Operasional bank, kredit, tabungan, dan fintech.', 'fa-university', 'from-yellow-500 to-amber-500', ['Mobile Banking', 'Fintech', 'OJK', 'BI']],
            ['Logistik & Supply Chain', 'Pergudangan, distribusi, ekspor impor, dan manajemen rantai pasok.', 'fa-truck', 'from-orange-500 to-red-500', ['WMS', 'ERP', 'SCM', 'Ekspor']],
            ['Kewirausahaan', 'Business plan, startup, UMKM, dan transformasi digital bisnis.', 'fa-store', 'from-pink-500 to-rose-500', ['Startup', 'Pitching', 'BMC', 'UMKM']],
        ];
        @endphp
        @foreach($jurusan as $j)
        <div class="kaca rounded-2xl p-6 hover:border-emerald-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $j[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $j[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $j[0] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $j[1] }}</p>
            <div class="flex flex-wrap gap-1.5">
                @foreach($j[4] as $tag)
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Keunggulan --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Keunggulan Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="100">
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-handshake text-emerald-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Teaching Factory</h3>
                <p class="text-gray-400 text-xs">Belajar langsung dengan simulasi bisnis nyata di kelas</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-laptop text-blue-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Software Industri</h3>
                <p class="text-gray-400 text-xs">Akses legal ke MYOB, Accurate, SAP, dan tools profesional</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-certificate text-yellow-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Sertifikasi BNSP</h3>
                <p class="text-gray-400 text-xs">Sertifikasi kompetensi nasional untuk memperkuat CV</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-briefcase text-purple-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Magang Perusahaan</h3>
                <p class="text-gray-400 text-xs">Praktik kerja di perusahaan mitra lokal dan nasional</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-emerald-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">6</div><p class="text-gray-400 text-sm mt-1">Program Keahlian</p></div>
        <div><div class="text-3xl font-black teks-gradien">150+</div><p class="text-gray-400 text-sm mt-1">Studi Kasus Bisnis</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Mitra Perusahaan</p></div>
        <div><div class="text-3xl font-black teks-gradien">88%</div><p class="text-gray-400 text-sm mt-1">Siap Kerja</p></div>
    </div>
</section>

{{-- Kewirausahaan & Bisnis Digital --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Program Kewirausahaan & Bisnis Digital</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Bangun jiwa entrepreneur sejak bangku sekolah</p>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div data-aos="fade-right">
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-lightbulb text-emerald-400 mr-2"></i>Business Incubator</h3>
            <p class="text-gray-400 mb-4 text-sm leading-relaxed">Program inkubasi bisnis untuk siswa SMK. Dari ide bisnis hingga produk nyata dengan mentor profesional dan akses ke investor.</p>
            <ul class="space-y-2 text-gray-300 text-sm mb-6">
                <li><i class="fas fa-check-circle text-emerald-400 mr-2"></i>Workshop Business Model Canvas & lean startup</li>
                <li><i class="fas fa-check-circle text-emerald-400 mr-2"></i>Praktik pembuatan toko online & digital marketing</li>
                <li><i class="fas fa-check-circle text-emerald-400 mr-2"></i>Pitching session dengan pelaku bisnis & investor</li>
                <li><i class="fas fa-check-circle text-emerald-400 mr-2"></i>Kompetisi business plan tingkat nasional</li>
            </ul>
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-chart-pie text-blue-400 mr-2"></i>Studi Kasus Bisnis</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Analisis kasus bisnis nyata dari perusahaan Indonesia dan multinasional. Belajar dari keberhasilan dan kegagalan bisnis di dunia nyata.</p>
        </div>
        <div class="space-y-4" data-aos="fade-left">
            @php
            $bisnis = [
                ['E-Commerce & Marketplace', 'fa-shopping-cart', 'text-emerald-400', 'Kelola toko Shopee, Tokopedia, dan marketplace'],
                ['Social Media Marketing', 'fa-hashtag', 'text-blue-400', 'Instagram, TikTok, dan content marketing'],
                ['Financial Technology', 'fa-mobile-alt', 'text-yellow-400', 'Digital payment, e-wallet, dan peer lending'],
                ['UMKM Go Digital', 'fa-store', 'text-pink-400', 'Transformasi digital untuk usaha mikro kecil menengah'],
            ];
            @endphp
            @foreach($bisnis as $idx => $b)
            <div class="kaca rounded-xl p-4 flex items-center gap-4 hover:border-emerald-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <i class="fas {{ $b[1] }} {{ $b[2] }} text-xl"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">{{ $b[0] }}</h4>
                    <p class="text-gray-500 text-xs">{{ $b[3] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Video Pembelajaran --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Video Pengenalan Program</h2>
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SMK Bisnis belajar dan berkarya di KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-emerald-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SMK Bisnis KVT Hub</p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Fitur per Role --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Fitur untuk Setiap Peran</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $roles = [
            ['Siswa', 'fa-user-graduate', 'from-emerald-500 to-green-500', 'border-emerald-500/20', [
                'Simulasi software akuntansi & ERP',
                'Praktik digital marketing & e-commerce',
                'Studi kasus bisnis Indonesia & global',
                'Portofolio bisnis plan untuk karir',
            ]],
            ['Guru / Instruktur', 'fa-chalkboard-teacher', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                'Modul ajar & studi kasus siap pakai',
                'Dashboard monitoring proyek bisnis siswa',
                'Tools penilaian kompetensi akuntansi',
                'Pelatihan update regulasi & teknologi',
            ]],
            ['Admin Sekolah', 'fa-user-tie', 'from-purple-500 to-violet-500', 'border-purple-500/20', [
                'Manajemen Teaching Factory & Magang',
                'Laporan kompetensi per program keahlian',
                'Kerjasama perusahaan mitra & BKK',
                'Dashboard akreditasi & sertifikasi BNSP',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-emerald-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- FAQ --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Pertanyaan Umum (FAQ)</h2>
        @php
        $faq = [
            ['Apa saja program keahlian SMK Bisnis?', 'KVT Hub menyediakan materi untuk 6 kompetensi keahlian: Akuntansi & Keuangan Lembaga (AKL), Pemasaran Digital (BDP), Administrasi Perkantoran (OTKP), Perbankan & Keuangan Mikro, Logistik & Supply Chain, dan Kewirausahaan.'],
            ['Apakah siswa belajar software akuntansi?', 'Ya, siswa mendapat akses simulasi MYOB, Accurate, SAP, dan Microsoft Excel tingkat lanjut. Semua tools digunakan langsung dalam proyek praktik.'],
            ['Bagaimana program kewirausahaan?', 'Kami menyediakan Business Incubator yang mencakup pembuatan bisnis plan, digital marketing, pitching session, dan pendampingan dari mentor bisnis profesional.'],
            ['Apakah ada sertifikasi untuk lulusan?', 'Ya, siswa dipersiapkan untuk sertifikasi BNSP bidang Akuntansi, Administrasi, dan Pemasaran. Sertifikasi ini memperkuat daya saing di dunia kerja.'],
            ['Bagaimana peluang magang di perusahaan?', 'KVT Hub memiliki 30+ perusahaan mitra untuk penempatan magang, termasuk bank, asuransi, perusahaan logistik, dan startup e-commerce.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-emerald-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-emerald-400 text-xs group-open:rotate-180 transition-transform"></i>
                </summary>
                <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/30 pt-4">{{ $f[1] }}</div>
            </details>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="kaca rounded-3xl p-10 border-emerald-500/20" data-aos="zoom-in">
            <i class="fas fa-chart-line text-emerald-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Jadi Profesional Bisnis Masa Depan?</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Kuasai akuntansi, pemasaran digital, dan kewirausahaan. Raih sertifikasi dan bangun karir bisnis impianmu!</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-emerald-500 to-green-500 hover:from-emerald-400 hover:to-green-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-emerald-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Gratis
                </a>
                <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-info-circle mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
