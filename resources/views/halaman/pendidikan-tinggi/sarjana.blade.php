@extends('tata-letak.utama')
@section('judul', 'Sarjana (S1) - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-blue-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(59,130,246,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(99,102,241,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-blue-800/30 border border-blue-600/30 rounded-full px-4 py-1.5 text-xs text-blue-300 mb-6" data-aos="fade-down">
            <i class="fas fa-user-graduate"></i> Program Sarjana - 4 Tahun
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Sarjana </span><span class="teks-gradien">(S1)</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Program akademik dan terapan 4 tahun. 100+ program studi lintas fakultas dengan skripsi, KKN, dan laboratorium riset.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-blue-500/20">
                <i class="fas fa-rocket mr-2"></i>Daftar Sekarang
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Fakultas Grid --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Rumpun Ilmu & Fakultas</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">100+ program studi di 10 rumpun ilmu pengetahuan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" data-aos="fade-right" data-aos-delay="200">
        @php
        $fakultas = [
            ['Teknik', 'Sipil, Mesin, Elektro, Informatika, Industri', 'fa-cogs', 'from-blue-500 to-indigo-500'],
            ['MIPA', 'Matematika, Fisika, Kimia, Biologi, Statistika', 'fa-atom', 'from-green-500 to-emerald-500'],
            ['Kedokteran', 'Kedokteran Umum, Gigi, Keperawatan, Farmasi', 'fa-stethoscope', 'from-red-500 to-pink-500'],
            ['Ekonomi & Bisnis', 'Akuntansi, Manajemen, Ekonomi, Bisnis Digital', 'fa-chart-line', 'from-yellow-500 to-amber-500'],
            ['Hukum', 'Hukum Perdata, Pidana, Tata Negara, Bisnis', 'fa-balance-scale', 'from-purple-500 to-violet-500'],
            ['Ilmu Sosial & Politik', 'HI, Komunikasi, Sosiologi, Administrasi Publik', 'fa-users', 'from-pink-500 to-rose-500'],
            ['Sastra & Budaya', 'Sastra Indonesia, Inggris, Jepang, Sejarah', 'fa-book', 'from-orange-500 to-red-500'],
            ['Pertanian', 'Agroteknologi, Agribisnis, Peternakan, Perikanan', 'fa-seedling', 'from-lime-500 to-green-500'],
            ['Psikologi', 'Psikologi Klinis, Industri, Pendidikan, Sosial', 'fa-brain', 'from-cyan-500 to-teal-500'],
            ['Ilmu Komputer', 'CS, Data Science, AI, Cybersecurity, SE', 'fa-laptop-code', 'from-indigo-500 to-blue-500'],
        ];
        @endphp
        @foreach($fakultas as $f)
        <div class="kaca rounded-2xl p-4 hover:border-blue-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-10 h-10 bg-gradient-to-br {{ $f[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $f[2] }} text-white"></i>
            </div>
            <h3 class="text-white font-bold text-sm mb-1">{{ $f[0] }}</h3>
            <p class="text-gray-500 text-[10px] leading-relaxed">{{ $f[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Riset & Kegiatan Mahasiswa --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Riset & Kegiatan Mahasiswa</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Kembangkan potensimu melalui riset, organisasi, dan kompetisi</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
            @php
            $kegiatan = [
                ['Riset Mahasiswa', 'Program Kreativitas Mahasiswa (PKM) dan riset dosen-mahasiswa.', 'fa-flask', 'text-blue-400'],
                ['KKN & Pengabdian', 'Kuliah Kerja Nyata di desa dan program pengabdian masyarakat.', 'fa-hands-helping', 'text-green-400'],
                ['UKM & Organisasi', 'BEM, Himpunan, dan 50+ Unit Kegiatan Mahasiswa aktif.', 'fa-users', 'text-purple-400'],
                ['Kompetisi Nasional', 'Gemastik, LKTI, debat, dan olimpiade sains nasional.', 'fa-trophy', 'text-yellow-400'],
            ];
            @endphp
            @foreach($kegiatan as $k)
            <div class="kaca rounded-2xl p-5 text-center hover:border-blue-500/20 transition">
                <i class="fas {{ $k[2] }} {{ $k[3] }} text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">{{ $k[0] }}</h3>
                <p class="text-gray-400 text-xs">{{ $k[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Beasiswa --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Beasiswa & Bantuan Biaya</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="100">
        @php
        $beasiswa = [
            ['KIP Kuliah', 'Beasiswa pemerintah untuk keluarga tidak mampu. Full tuition & living cost.', 'fa-graduation-cap', 'text-green-400'],
            ['Beasiswa Prestasi', 'Untuk mahasiswa berprestasi akademik, olahraga, atau seni budaya.', 'fa-star', 'text-yellow-400'],
            ['Beasiswa Djarum', 'Program Djarum Beasiswa Plus dengan pelatihan soft skills.', 'fa-award', 'text-blue-400'],
            ['Beasiswa Kampus', 'Beasiswa internal universitas mitra berdasarkan seleksi.', 'fa-university', 'text-purple-400'],
        ];
        @endphp
        @foreach($beasiswa as $b)
        <div class="kaca rounded-2xl p-5 text-center hover:border-blue-500/20 transition">
            <i class="fas {{ $b[2] }} {{ $b[3] }} text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">{{ $b[0] }}</h3>
            <p class="text-gray-400 text-xs">{{ $b[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-blue-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">100+</div><p class="text-gray-400 text-sm mt-1">Program Studi</p></div>
        <div><div class="text-3xl font-black teks-gradien">150+</div><p class="text-gray-400 text-sm mt-1">Universitas Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">50K+</div><p class="text-gray-400 text-sm mt-1">Mahasiswa Aktif</p></div>
        <div><div class="text-3xl font-black teks-gradien">87%</div><p class="text-gray-400 text-sm mt-1">Tingkat Kelulusan</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Kehidupan Kampus S1</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Suasana perkuliahan, riset laboratorium, dan kegiatan mahasiswa</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Kehidupan Kampus S1 KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Siswa / Guru / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Mahasiswa', 'fa-user-graduate', 'from-blue-500 to-indigo-500', [
                    'Akses materi kuliah & e-library 24/7',
                    'Sistem KRS & jadwal kuliah online',
                    'Portal skripsi & bimbingan daring',
                    'Tracking IPK & transkrip real-time',
                ]],
                ['Dosen / Pengajar', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Manajemen kelas & upload materi',
                    'Sistem penilaian & rubrik otomatis',
                    'Bimbingan skripsi mahasiswa online',
                    'Kolaborasi riset antar fakultas',
                ]],
                ['Admin Akademik', 'fa-user-shield', 'from-purple-500 to-violet-500', [
                    'Dashboard analitik universitas',
                    'Manajemen jadwal & ruang kuliah',
                    'Laporan akreditasi BAN-PT otomatis',
                    'Pengelolaan beasiswa & KRS mahasiswa',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-blue-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-blue-400 mt-0.5 shrink-0"></i>{{ $fitur }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Pertanyaan Umum (FAQ)</h2>
    <div class="space-y-4" data-aos="fade-up" data-aos-delay="100">
        @php
        $faq = [
            ['Berapa lama masa studi S1?', 'Program sarjana umumnya ditempuh dalam 4 tahun (8 semester). Mahasiswa dapat menyelesaikan lebih cepat melalui program akselerasi atau lebih lama hingga batas maksimal 7 tahun.'],
            ['Apa perbedaan S1 akademik dan S1 terapan?', 'S1 akademik fokus pada pengembangan ilmu dan riset, menghasilkan gelar S.Si, S.T, S.H, dll. S1 terapan (D4) fokus pada keterampilan terapan dengan gelar S.Tr.'],
            ['Apakah ada program pertukaran mahasiswa?', 'Ya, KVT Hub memfasilitasi program pertukaran mahasiswa ke universitas mitra internasional melalui program IISMA, Erasmus+, dan bilateral exchange.'],
            ['Bagaimana sistem KKN dilaksanakan?', 'KKN (Kuliah Kerja Nyata) dilaksanakan pada semester 6-7 selama 1-2 bulan di desa/kota tujuan. Mahasiswa melaksanakan program pengabdian masyarakat secara berkelompok.'],
            ['Apakah ada fasilitas laboratorium riset?', 'Setiap fakultas dilengkapi laboratorium riset modern. Mahasiswa S1 dapat mengakses laboratorium untuk penelitian skripsi dan proyek riset dosen-mahasiswa.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-blue-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-blue-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-university text-blue-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Perjalanan Akademikmu</h2>
            <p class="text-gray-400 mb-8">Bergabung dengan 50.000+ mahasiswa di 150+ universitas mitra. Raih gelar sarjana dan bangun fondasi karir cemerlangmu!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-blue-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Sekarang
                </a>
                <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
