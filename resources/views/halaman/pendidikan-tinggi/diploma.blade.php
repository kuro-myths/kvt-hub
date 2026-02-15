@extends('tata-letak.utama')
@section('judul', 'Diploma (D1-D4) - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-cyan-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(6,182,212,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-cyan-800/30 border border-cyan-600/30 rounded-full px-4 py-1.5 text-xs text-cyan-300 mb-6" data-aos="fade-down">
            <i class="fas fa-certificate"></i> Pendidikan Vokasi & Terapan
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Program </span><span class="teks-gradien">Diploma</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pendidikan vokasi D1 hingga D4 dengan fokus keterampilan terapan dan siap kerja. Praktik 70%, teori 30%.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-cyan-500/20">
                <i class="fas fa-rocket mr-2"></i>Daftar Sekarang
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Jenjang Diploma --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Jenjang Diploma</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Dari D1 hingga D4, pilih durasi sesuai kebutuhan karirmu</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $diploma = [
            ['D1 (1 Tahun)', 'Sertifikat profesi dasar. Keterampilan operasional siap kerja dalam waktu singkat.', 'fa-award', 'from-green-500 to-emerald-500', ['Operator', 'Teknisi', 'Admin']],
            ['D2 (2 Tahun)', 'Ahli Muda. Keterampilan teknis menengah dengan pengalaman magang.', 'fa-user-cog', 'from-blue-500 to-cyan-500', ['Supervisor', 'Analis', 'Programer']],
            ['D3 (3 Tahun)', 'Ahli Madya. Kompetensi profesional dengan portofolio proyek nyata.', 'fa-user-tie', 'from-purple-500 to-violet-500', ['Manager Jr', 'Spesialis', 'Konsultan']],
            ['D4 / Sarjana Terapan', 'Setara S1. Keahlian terapan tingkat lanjut dengan riset terapan.', 'fa-user-graduate', 'from-orange-500 to-red-500', ['Lead', 'Arsitek', 'Engineer']],
        ];
        @endphp
        @foreach($diploma as $d)
        <div class="kaca rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $d[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $d[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $d[0] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $d[1] }}</p>
            <div class="flex flex-wrap gap-1.5">
                @foreach($d[4] as $tag)
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- Kompetensi & Industri --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Kompetensi & Keterkaitan Industri</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Kurikulum dirancang bersama 50+ perusahaan mitra industri</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-left" data-aos-delay="200">
            @php
            $kompetensi = [
                ['Teknik Informatika', 'Web, mobile, AI, dan cloud computing.', 'fa-laptop-code', 'text-blue-400'],
                ['Akuntansi', 'Pembukuan, audit, perpajakan, dan fintech.', 'fa-file-invoice-dollar', 'text-green-400'],
                ['Keperawatan', 'Perawatan pasien, kesehatan masyarakat.', 'fa-stethoscope', 'text-teal-400'],
                ['Manajemen Bisnis', 'Kewirausahaan, pemasaran, dan SDM.', 'fa-chart-line', 'text-orange-400'],
                ['Teknik Mesin', 'Manufaktur, CNC, dan otomasi industri.', 'fa-cogs', 'text-gray-400'],
                ['Desain Komunikasi Visual', 'Branding, UI/UX, dan motion graphics.', 'fa-palette', 'text-pink-400'],
            ];
            @endphp
            @foreach($kompetensi as $k)
            <div class="kaca rounded-xl p-4 hover:border-cyan-500/30 transition flex items-center gap-3 group">
                <div class="w-10 h-10 bg-kvt-800/50 rounded-lg flex items-center justify-center shrink-0">
                    <i class="fas {{ $k[2] }} {{ $k[3] }}"></i>
                </div>
                <div>
                    <h4 class="text-white text-sm font-semibold group-hover:text-cyan-400 transition">{{ $k[0] }}</h4>
                    <p class="text-gray-500 text-[10px]">{{ $k[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Keunggulan & PKL --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Keunggulan & Praktik Kerja Lapangan</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Pengalaman langsung di industri melalui program PKL wajib</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="200">
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-hands-helping text-cyan-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Praktik 70%</h3>
            <p class="text-gray-400 text-xs">Kurikulum berbasis praktik langsung di lab dan industri</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-building text-blue-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Magang Wajib</h3>
            <p class="text-gray-400 text-xs">PKL 3-6 bulan di perusahaan mitra nasional & multinasional</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-certificate text-green-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Sertifikasi Profesi</h3>
            <p class="text-gray-400 text-xs">Sertifikat kompetensi BNSP nasional dan internasional</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-briefcase text-orange-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Siap Kerja</h3>
            <p class="text-gray-400 text-xs">93% lulusan langsung terserap di industri mitra</p>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-cyan-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">80+</div><p class="text-gray-400 text-sm mt-1">Program Studi</p></div>
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Politeknik Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">93%</div><p class="text-gray-400 text-sm mt-1">Tingkat Penempatan</p></div>
        <div><div class="text-3xl font-black teks-gradien">70%</div><p class="text-gray-400 text-sm mt-1">Kurikulum Praktik</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Lihat Program Diploma Beraksi</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Suasana belajar, praktik lab, dan kegiatan PKL mahasiswa vokasi</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Program Diploma KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Siswa / Guru / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Mahasiswa / Siswa', 'fa-user-graduate', 'from-cyan-500 to-blue-500', [
                    'Akses materi praktik & video tutorial',
                    'Logbook PKL digital terintegrasi',
                    'Portofolio proyek online',
                    'Sertifikat kompetensi otomatis',
                ]],
                ['Dosen / Instruktur', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Manajemen kelas & modul praktik',
                    'Penilaian kompetensi berbasis rubrik',
                    'Monitoring progress PKL mahasiswa',
                    'Kolaborasi kurikulum dengan industri',
                ]],
                ['Admin / Koordinator', 'fa-user-shield', 'from-purple-500 to-violet-500', [
                    'Dashboard analitik program studi',
                    'Manajemen kerjasama industri mitra',
                    'Laporan akreditasi & tracer study',
                    'Pengelolaan jadwal PKL terpusat',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-cyan-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-cyan-400 mt-0.5 shrink-0"></i>{{ $fitur }}
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
            ['Apa perbedaan D3 dan D4?', 'D3 menghasilkan gelar Ahli Madya (A.Md) dengan masa studi 3 tahun, sedangkan D4 menghasilkan gelar Sarjana Terapan (S.Tr) setara S1 dengan masa studi 4 tahun dan mencakup riset terapan.'],
            ['Apakah lulusan diploma bisa melanjutkan ke S2?', 'Ya, lulusan D4/Sarjana Terapan dapat langsung melanjutkan ke program magister. Lulusan D3 perlu menempuh program alih jenjang ke D4 atau S1 terlebih dahulu.'],
            ['Bagaimana sistem PKL di program diploma?', 'PKL (Praktik Kerja Lapangan) wajib dilaksanakan selama 3-6 bulan di perusahaan mitra. Mahasiswa dibimbing oleh dosen dan supervisor industri, dengan logbook digital terintegrasi.'],
            ['Apakah ada sertifikasi profesi?', 'Ya, setiap program studi memfasilitasi sertifikasi kompetensi dari BNSP (Badan Nasional Sertifikasi Profesi) dan lembaga sertifikasi internasional terkait.'],
            ['Berapa biaya pendidikan program diploma?', 'Biaya bervariasi per program studi. KVT Hub menyediakan informasi beasiswa, keringanan UKT, dan program cicilan untuk membantu akses pendidikan.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-cyan-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-cyan-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-graduation-cap text-cyan-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai Karir Vokasi?</h2>
            <p class="text-gray-400 mb-8">Bergabung dengan ribuan mahasiswa diploma yang sudah sukses berkarir di industri. Daftar sekarang dan raih masa depanmu!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-400 hover:to-blue-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-cyan-500/20">
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
