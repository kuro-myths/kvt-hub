@extends('tata-letak.utama')
@section('judul', 'Dataset Publik - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-20 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-database"></i> Katalog Data
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Dataset </span><span class="teks-gradien">Publik</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Eksplorasi ribuan dataset berkualitas tinggi untuk riset, machine learning, dan analisis data.
            Akses gratis, dokumentasi lengkap, dan tersedia via API.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-0.5">
                <i class="fas fa-search mr-2"></i>Jelajahi Dataset
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Kategori
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">850+</div><div class="text-xs text-gray-500">Dataset</div></div>
            <div><div class="text-2xl font-black text-white">25 TB+</div><div class="text-xs text-gray-500">Total Data</div></div>
            <div><div class="text-2xl font-black text-white">API</div><div class="text-xs text-gray-500">Access</div></div>
            <div><div class="text-2xl font-black text-white">CC/MIT</div><div class="text-xs text-gray-500">Lisensi</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI DATASET --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Dataset</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Koleksi dataset dari berbagai domain untuk kebutuhan riset dan machine learning</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-heartbeat', 'warna' => 'red', 'judul' => 'Healthcare', 'size' => '2.4 GB', 'records' => '1.2M+', 'desc' => 'Data medis, epidemiologi, genomik, dan catatan klinis untuk riset kesehatan.'],
        ['ikon' => 'fas fa-chart-line', 'warna' => 'green', 'judul' => 'Finance', 'size' => '5.1 GB', 'records' => '8.5M+', 'desc' => 'Harga saham, crypto, indeks ekonomi, dan data transaksi keuangan.'],
        ['ikon' => 'fas fa-language', 'warna' => 'blue', 'judul' => 'NLP & Text', 'size' => '3.8 GB', 'records' => '4.2M+', 'desc' => 'Korpus teks, sentiment analysis, chatbot training, dan summarization.'],
        ['ikon' => 'fas fa-image', 'warna' => 'purple', 'judul' => 'Computer Vision', 'size' => '12 GB', 'records' => '2.8M+', 'desc' => 'Image classification, object detection, segmentation, dan OCR.'],
        ['ikon' => 'fas fa-globe-asia', 'warna' => 'amber', 'judul' => 'Geospatial', 'size' => '1.8 GB', 'records' => '700K+', 'desc' => 'Data GIS, satellite imagery, peta demografis, dan climate data.'],
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'cyan', 'judul' => 'Education', 'size' => '800 MB', 'records' => '500K+', 'desc' => 'Student performance, e-learning analytics, dan education research.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
                <div class="text-right">
                    <div class="text-sm font-bold text-{{ $k['warna'] }}-400">{{ $k['size'] }}</div>
                    <div class="text-xs text-gray-500">{{ $k['records'] }} records</div>
                </div>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- POPULAR DATASETS --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">POPULER</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Dataset Paling Banyak Digunakan</h2>
        </div>
        @php
        $populer = [
            ['judul' => 'Indonesia Stock Market 2010-2025', 'kategori' => 'Finance', 'warna' => 'green', 'ikon' => 'fas fa-chart-line', 'download' => '24K', 'format' => 'CSV', 'size' => '1.2 GB', 'lisensi' => 'CC BY 4.0'],
            ['judul' => 'Indonesian NLP Corpus', 'kategori' => 'NLP & Text', 'warna' => 'blue', 'ikon' => 'fas fa-language', 'download' => '19K', 'format' => 'JSON', 'size' => '2.4 GB', 'lisensi' => 'MIT'],
            ['judul' => 'Medical X-Ray Images (Thorax)', 'kategori' => 'Healthcare', 'warna' => 'red', 'ikon' => 'fas fa-x-ray', 'download' => '16K', 'format' => 'PNG', 'size' => '8.5 GB', 'lisensi' => 'CC BY-NC'],
            ['judul' => 'Road Sign Detection Indonesia', 'kategori' => 'Computer Vision', 'warna' => 'purple', 'ikon' => 'fas fa-traffic-light', 'download' => '12K', 'format' => 'COCO', 'size' => '4.3 GB', 'lisensi' => 'CC BY 4.0'],
            ['judul' => 'Climate Data Southeast Asia', 'kategori' => 'Geospatial', 'warna' => 'amber', 'ikon' => 'fas fa-cloud-sun', 'download' => '8K', 'format' => 'NetCDF', 'size' => '1.1 GB', 'lisensi' => 'Open Data'],
            ['judul' => 'Student Performance Analytics', 'kategori' => 'Education', 'warna' => 'cyan', 'ikon' => 'fas fa-user-graduate', 'download' => '7K', 'format' => 'CSV', 'size' => '250 MB', 'lisensi' => 'CC0'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($populer as $d)
            <div class="kaca rounded-xl p-5 border-{{ $d['warna'] }}-500/20 hover:border-{{ $d['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-{{ $d['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                        <i class="{{ $d['ikon'] }} text-{{ $d['warna'] }}-400 text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-bold text-sm mb-1 group-hover:text-teal-400 transition">{{ $d['judul'] }}</h4>
                        <p class="text-gray-500 text-xs mb-2">{{ $d['kategori'] }} · {{ $d['size'] }} · {{ $d['format'] }}</p>
                        <div class="flex items-center gap-3 text-xs text-gray-500">
                            <span><i class="fas fa-download mr-1 text-{{ $d['warna'] }}-400"></i>{{ $d['download'] }}</span>
                            <span><i class="fas fa-balance-scale mr-1"></i>{{ $d['lisensi'] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- API ACCESS & FORMAT --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">AKSES DATA</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Cara Akses Dataset</h2>
    </div>
    @php
    $akses = [
        ['ikon' => 'fas fa-download', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Direct Download', 'desc' => 'Unduh dataset lengkap dalam format CSV, JSON, Parquet, atau file spesifik domain langsung dari browser.'],
        ['ikon' => 'fas fa-code', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'REST API', 'desc' => 'Akses dataset via REST API dengan autentikasi token. Ideal untuk integrasi ke pipeline ML dan aplikasi.'],
        ['ikon' => 'fab fa-python', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'Python SDK', 'desc' => 'Install package kvthub-data via pip. Load dataset langsung ke Pandas DataFrame atau NumPy array.'],
        ['ikon' => 'fas fa-eye', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Data Preview', 'desc' => 'Preview sample data (100 rows) langsung di browser. Lihat schema, distribusi, dan statistik deskriptif.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($akses as $a)
        <div class="kaca rounded-2xl p-6 border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="w-14 h-14 bg-gradient-to-br {{ $a['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="{{ $a['ikon'] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $a['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $a['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- LISENSI & KONTRIBUSI --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">KONTRIBUSI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Lisensi & Kontribusi Dataset</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Sumbangkan dataset Anda ke komunitas riset terbuka</p>
        </div>
        @php
        $kontribusi = [
            ['ikon' => 'fas fa-upload', 'warna' => 'blue', 'judul' => 'Upload Dataset', 'desc' => 'Upload file dataset beserta dokumentasi schema, format, dan deskripsi. Mendukung file hingga 10 GB.'],
            ['ikon' => 'fas fa-file-alt', 'warna' => 'green', 'judul' => 'Datasheet & Metadata', 'desc' => 'Isi datasheet: sumber data, metode pengumpulan, preprocessing, dan limitasi. Wajib untuk quality assurance.'],
            ['ikon' => 'fas fa-balance-scale', 'warna' => 'amber', 'judul' => 'Pilih Lisensi', 'desc' => 'Pilih lisensi: CC0, CC BY 4.0, MIT, atau Open Data License. Tentukan batasan penggunaan komersial.'],
            ['ikon' => 'fas fa-medal', 'warna' => 'purple', 'judul' => 'Credit & Citation', 'desc' => 'Dapatkan halaman profil kontributor, badge "Data Provider", dan citation template (BibTeX) otomatis.'],
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
<section class="bg-gradient-to-br from-teal-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">850+</div><p class="text-gray-400 text-sm mt-1">Dataset</p></div>
        <div><div class="text-3xl font-black teks-gradien">25 TB+</div><p class="text-gray-400 text-sm mt-1">Total Data</p></div>
        <div><div class="text-3xl font-black teks-gradien">120K+</div><p class="text-gray-400 text-sm mt-1">Unduhan</p></div>
        <div><div class="text-3xl font-black teks-gradien">200+</div><p class="text-gray-400 text-sm mt-1">Kontributor</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Download & Gunakan Dataset', 'durasi' => '06:45', 'views' => '28K', 'warna' => 'teal', 'thumb' => 'https://placehold.co/640x360/1a1a2e/14B8A6?text=Download+Dataset'],
            ['judul' => 'Akses Dataset via REST API', 'durasi' => '10:20', 'views' => '15K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=API+Access'],
            ['judul' => 'Upload & Kontribusi Dataset', 'durasi' => '08:15', 'views' => '9K', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=Upload+Dataset'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-teal-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Peneliti', 'fitur' => ['Download dataset unlimited', 'Preview data & schema', 'Akses via API & Python SDK', 'Bookmark & request dataset', 'Dapatkan citation template', 'Join forum diskusi data']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Dosen', 'fitur' => ['Upload & publish dataset sendiri', 'Assign dataset untuk tugas kelas', 'Monitor statistik penggunaan', 'Buat koleksi dataset per mata kuliah', 'Peer review submission', 'Dapatkan badge kontributor']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh katalog dataset', 'Moderasi submission & kualitas', 'Dashboard analytics unduhan', 'Kelola lisensi & compliance', 'Konfigurasi API rate limits', 'Laporan penggunaan storage']],
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
        ['q' => 'Apakah dataset gratis untuk digunakan?', 'a' => 'Ya, semua dataset bersifat open-access dan gratis. Sebagian besar menggunakan lisensi CC BY 4.0 atau CC0 yang mengizinkan penggunaan untuk riset dan pendidikan.'],
        ['q' => 'Format apa saja yang tersedia?', 'a' => 'Dataset tersedia dalam format CSV, JSON, Parquet, COCO (computer vision), NetCDF (geospatial), dan format spesifik domain lainnya. Informasi format ada di halaman detail dataset.'],
        ['q' => 'Bagaimana cara mengakses dataset via API?', 'a' => 'Daftar akun, generate API token di dashboard, lalu gunakan REST API atau Python SDK kami. Dokumentasi lengkap tersedia di halaman API Reference.'],
        ['q' => 'Apakah saya bisa upload dataset sendiri?', 'a' => 'Ya, semua pengguna terdaftar bisa mengupload dataset. Anda perlu mengisi metadata, datasheet, dan memilih lisensi. Dataset akan direview sebelum dipublikasikan.'],
        ['q' => 'Apakah ada batasan ukuran file?', 'a' => 'Ukuran maksimal per dataset adalah 10 GB untuk upload via browser. Untuk dataset lebih besar, hubungi tim kami untuk akses upload khusus via CLI tool.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-teal-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-teal-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Eksplorasi Data Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan akses 850+ dataset berkualitas tinggi untuk riset, machine learning, dan analisis data Anda.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Akses Dataset
        </a>
    </div>
</section>

@endsection
