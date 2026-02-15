@extends('tata-letak.utama')
@section('judul', 'Sumber Daya - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-cyan-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #06B6D4 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-cyan-800/30 border border-cyan-600/30 rounded-full px-4 py-1.5 text-xs text-cyan-300 mb-6" data-aos="fade-down">
            <i class="fas fa-database"></i> Open Access Resources
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Sumber </span><span class="teks-gradien">Daya</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Akses gratis ke e-book, dataset, coding playground, API, template, tools, dan repositori pengetahuan global.
            Semuanya open access dan siap digunakan untuk belajar, riset, dan proyek.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-cyan-500 to-teal-500 hover:from-cyan-400 hover:to-teal-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-cyan-500/30 hover:-translate-y-0.5">
                <i class="fas fa-download mr-2"></i>Akses Sumber Daya
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Jelajahi Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">17K+</div><div class="text-xs text-gray-500">Total Resources</div></div>
            <div><div class="text-2xl font-black text-white">500K+</div><div class="text-xs text-gray-500">Unduhan</div></div>
            <div><div class="text-2xl font-black text-white">15+</div><div class="text-xs text-gray-500">Bahasa Coding</div></div>
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Open Access</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI SUMBER DAYA --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Sumber Daya</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Temukan resource yang Anda butuhkan dari koleksi lengkap kami</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $sumber = [
            ['E-Book & Jurnal', 'Ribuan buku digital dan jurnal ilmiah gratis. Open access dari penerbit terkemuka.', 'fa-book', 'from-blue-500 to-indigo-500', '5,000+ judul', 'blue'],
            ['Dataset', 'Dataset publik untuk riset dan machine learning. Kaggle, UCI, dan dataset eksklusif KVT.', 'fa-table', 'from-green-500 to-emerald-500', '2,000+ dataset', 'green'],
            ['Coding Playground', 'IDE online untuk Python, JavaScript, C++, Java, Go, Rust. Compile dan run di browser.', 'fa-terminal', 'from-purple-500 to-violet-500', '15+ bahasa', 'purple'],
            ['API Library', 'Koleksi API gratis untuk proyek. Weather, news, currency, dan 100+ API lainnya.', 'fa-plug', 'from-orange-500 to-red-500', '100+ API', 'orange'],
            ['Template & Starter', 'Template proyek siap pakai: Laravel, React, Next.js, Flutter, Django, dan lebih.', 'fa-layer-group', 'from-pink-500 to-rose-500', '200+ template', 'pink'],
            ['Video Tutorial', 'Perpustakaan video tutorial dari instruktur ahli. Dari pemula sampai expert.', 'fa-play-circle', 'from-red-500 to-pink-500', '10,000+ video', 'red'],
        ];
        @endphp
        @foreach($sumber as $s)
        <div class="kaca rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $s[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $s[2] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-{{ $s[5] }}-500/10 text-{{ $s[5] }}-400 px-2 py-0.5 rounded-full border border-{{ $s[5] }}-500/20">{{ $s[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $s[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $s[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- FEATURED RESOURCES --}}
<section class="bg-gradient-to-br from-cyan-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FEATURED</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sumber Daya Unggulan</h2>
        </div>
        @php
        $featured = [
            ['judul' => 'Python Machine Learning Cookbook', 'tipe' => 'E-Book', 'ikon' => 'fas fa-book', 'warna' => 'blue', 'download' => '12.4K', 'rating' => '4.9'],
            ['judul' => 'Indonesia COVID-19 Dataset', 'tipe' => 'Dataset', 'ikon' => 'fas fa-table', 'warna' => 'green', 'download' => '8.7K', 'rating' => '4.8'],
            ['judul' => 'Laravel 12 Starter Kit', 'tipe' => 'Template', 'ikon' => 'fas fa-layer-group', 'warna' => 'red', 'download' => '15.2K', 'rating' => '4.9'],
            ['judul' => 'React + TypeScript Boilerplate', 'tipe' => 'Template', 'ikon' => 'fas fa-layer-group', 'warna' => 'cyan', 'download' => '9.1K', 'rating' => '4.7'],
            ['judul' => 'NLP Bahasa Indonesia Corpus', 'tipe' => 'Dataset', 'ikon' => 'fas fa-table', 'warna' => 'purple', 'download' => '6.3K', 'rating' => '4.8'],
            ['judul' => 'Full-Stack Web Dev Roadmap', 'tipe' => 'E-Book', 'ikon' => 'fas fa-book', 'warna' => 'amber', 'download' => '22.8K', 'rating' => '5.0'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($featured as $f)
            <div class="kaca rounded-xl p-5 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-{{ $f['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $f['ikon'] }} text-{{ $f['warna'] }}-400"></i></div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold text-sm group-hover:text-cyan-400 transition">{{ $f['judul'] }}</h4>
                        <span class="text-xs text-gray-500">{{ $f['tipe'] }}</span>
                    </div>
                </div>
                <div class="flex items-center justify-between text-xs text-gray-500">
                    <span><i class="fas fa-download mr-1 text-{{ $f['warna'] }}-400"></i>{{ $f['download'] }} unduhan</span>
                    <span><i class="fas fa-star mr-1 text-yellow-400"></i>{{ $f['rating'] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TOOLS & UTILITAS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">TOOLS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tools & Utilitas</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $tools = [
            ['JSON Formatter', 'fa-code', 'text-yellow-400'],
            ['Regex Tester', 'fa-asterisk', 'text-green-400'],
            ['Color Picker', 'fa-palette', 'text-pink-400'],
            ['Base64 Encoder', 'fa-lock', 'text-red-400'],
            ['Markdown Editor', 'fa-file-alt', 'text-blue-400'],
            ['SQL Playground', 'fa-database', 'text-cyan-400'],
            ['Image Converter', 'fa-image', 'text-purple-400'],
            ['API Tester', 'fa-plug', 'text-orange-400'],
            ['Hash Generator', 'fa-fingerprint', 'text-teal-400'],
            ['QR Generator', 'fa-qrcode', 'text-indigo-400'],
            ['Lorem Ipsum', 'fa-paragraph', 'text-gray-400'],
            ['Diff Checker', 'fa-columns', 'text-amber-400'],
        ];
        @endphp
        @foreach($tools as $t)
        <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition group cursor-pointer">
            <i class="fas {{ $t[1] }} {{ $t[2] }} text-xl mb-2 block group-hover:scale-110 transition"></i>
            <span class="text-xs text-gray-400 group-hover:text-white transition">{{ $t[0] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- KONTRIBUSI --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">CONTRIBUTION</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Kontribusi</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Bantu perluas koleksi sumber daya KVT Hub untuk komunitas</p>
        </div>
        @php
        $kontribusi = [
            ['ikon' => 'fas fa-upload', 'warna' => 'blue', 'judul' => 'Upload Resource', 'desc' => 'Upload e-book, dataset, atau template yang Anda buat. Tim reviewer akan memverifikasi dalam 48 jam.'],
            ['ikon' => 'fas fa-code-branch', 'warna' => 'green', 'judul' => 'Fork & Improve', 'desc' => 'Fork template atau starter kit yang ada, tambahkan fitur, lalu submit pull request.'],
            ['ikon' => 'fas fa-bug', 'warna' => 'red', 'judul' => 'Report Issues', 'desc' => 'Temukan error atau broken link? Laporkan agar tim bisa memperbaiki sesegera mungkin.'],
            ['ikon' => 'fas fa-star', 'warna' => 'amber', 'judul' => 'Review & Rate', 'desc' => 'Berikan review dan rating untuk membantu pengguna lain menemukan resource terbaik.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($kontribusi as $k)
            <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-cyan-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">17K+</div><p class="text-gray-400 text-sm mt-1">Total Sumber Daya</p></div>
        <div><div class="text-3xl font-black teks-gradien">500K+</div><p class="text-gray-400 text-sm mt-1">Unduhan</p></div>
        <div><div class="text-3xl font-black teks-gradien">15+</div><p class="text-gray-400 text-sm mt-1">Bahasa Coding</p></div>
        <div><div class="text-3xl font-black teks-gradien">100%</div><p class="text-gray-400 text-sm mt-1">Open Access</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Sumber Daya</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Tour Perpustakaan Digital KVT', 'durasi' => '08:30', 'views' => '20K', 'warna' => 'cyan', 'thumb' => 'https://placehold.co/640x360/1a1a2e/06B6D4?text=Library+Tour'],
            ['judul' => 'Cara Menggunakan Dataset', 'durasi' => '12:15', 'views' => '16K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Dataset+Guide'],
            ['judul' => 'Coding Playground Demo', 'durasi' => '10:45', 'views' => '24K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Playground+Demo'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-cyan-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Download e-book & modul gratis', 'Akses dataset untuk riset & tugas', 'Gunakan coding playground di browser', 'Simpan resource ke koleksi pribadi', 'Rate & review sumber daya', 'Kontribusi resource buatan sendiri']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Upload e-book, modul, & template', 'Buat koleksi resource per kelas', 'Share resource ke siswa langsung', 'Kelola submission dari kontributor', 'Akses analytics unduhan resource', 'Kurasi resource berkualitas tinggi']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh katalog resource', 'Moderasi kontribusi komunitas', 'Dashboard analytics & download stats', 'Kelola lisensi & hak cipta', 'Konfigurasi storage & CDN', 'Laporan penggunaan & tren']],
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
        ['q' => 'Apakah semua sumber daya benar-benar gratis?', 'a' => 'Ya, semua sumber daya di KVT Hub tersedia secara gratis (open access). Anda hanya perlu mendaftar sebagai anggota untuk mengaksesnya. Tidak ada biaya tersembunyi.'],
        ['q' => 'Format file apa saja yang tersedia?', 'a' => 'E-book tersedia dalam PDF dan EPUB. Dataset dalam CSV, JSON, dan Parquet. Template dalam format sesuai framework (ZIP). Video streamable langsung di browser.'],
        ['q' => 'Bagaimana cara berkontribusi resource?', 'a' => 'Login ke akun Anda, klik "Upload Resource" di dashboard. Isi metadata (judul, deskripsi, kategori, lisensi), upload file, dan submit. Tim reviewer akan memverifikasi dalam 48 jam.'],
        ['q' => 'Apakah saya bisa menggunakan resource untuk proyek komersial?', 'a' => 'Tergantung lisensi masing-masing resource. Sebagian besar menggunakan lisensi CC-BY atau MIT yang mengizinkan penggunaan komersial. Cek detail lisensi sebelum menggunakan.'],
        ['q' => 'Apakah coding playground mendukung semua bahasa?', 'a' => 'Saat ini mendukung 15+ bahasa: Python, JavaScript, TypeScript, Java, C++, C#, Go, Rust, PHP, Ruby, Swift, Kotlin, SQL, R, dan Dart. Bahasa baru ditambahkan secara berkala.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-cyan-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-cyan-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Akses Semua Sumber Daya Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan jelajahi 17.000+ resource: e-book, dataset, template, tools, dan video tutorial.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-cyan-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Akses Gratis
        </a>
    </div>
</section>

@endsection
