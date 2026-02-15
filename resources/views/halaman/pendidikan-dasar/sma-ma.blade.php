@extends('tata-letak.utama')
@section('judul', 'SMA / MA - Kelas 10-12 - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-yellow-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(234,179,8,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(245,158,11,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-yellow-800/30 border border-yellow-600/30 rounded-full px-4 py-1.5 text-xs text-yellow-300 mb-6" data-aos="fade-down">
            <i class="fas fa-school"></i> Pendidikan Menengah Atas - Kelas 10-12
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SMA / </span><span class="teks-gradien-emas">MA</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Persiapan menuju perguruan tinggi terbaik. IPA, IPS, Bahasa dengan persiapan SNBT, UTBK, olimpiade, dan riset dasar.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-yellow-500 to-amber-500 hover:from-yellow-400 hover:to-amber-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-yellow-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Belajar
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Peminatan --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Program Peminatan</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Pilih jalur peminatan sesuai minat dan cita-cita</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-atom text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">MIPA (Ilmu Alam)</h3>
            <p class="text-gray-400 text-sm mb-4">Matematika lanjutan, Fisika, Kimia, dan Biologi. Persiapan untuk fakultas teknik, kedokteran, dan sains.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">Matematika</span>
                <span class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">Fisika</span>
                <span class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">Kimia</span>
                <span class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">Biologi</span>
            </div>
        </div>
        <div class="kaca rounded-2xl p-6 border-green-500/20 hover:border-green-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-chart-bar text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">IPS (Ilmu Sosial)</h3>
            <p class="text-gray-400 text-sm mb-4">Ekonomi, Sosiologi, Geografi, dan Sejarah. Untuk fakultas hukum, ekonomi, dan ilmu sosial.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full">Ekonomi</span>
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full">Sosiologi</span>
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full">Geografi</span>
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full">Sejarah</span>
            </div>
        </div>
        <div class="kaca rounded-2xl p-6 border-purple-500/20 hover:border-purple-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-book text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Bahasa & Budaya</h3>
            <p class="text-gray-400 text-sm mb-4">Sastra Indonesia, Bahasa asing, Antropologi, dan Budaya. Untuk fakultas sastra dan hubungan internasional.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full">Sastra</span>
                <span class="text-[10px] bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full">Bahasa Asing</span>
                <span class="text-[10px] bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full">Antropologi</span>
            </div>
        </div>
    </div>
</section>

{{-- Persiapan UTBK --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Persiapan SNBT / UTBK 2026</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Program intensif untuk lolos ke PTN impian</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="200">
            <div class="kaca rounded-2xl p-5 text-center hover:border-yellow-500/20 transition">
                <i class="fas fa-brain text-yellow-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">TPS</h3>
                <p class="text-gray-400 text-xs">Tes Potensi Skolastik: penalaran, literasi, kuantitatif</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center hover:border-yellow-500/20 transition">
                <i class="fas fa-pen text-blue-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Literasi</h3>
                <p class="text-gray-400 text-xs">Bahasa Indonesia & Bahasa Inggris comprehension</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center hover:border-yellow-500/20 transition">
                <i class="fas fa-calculator text-green-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Penalaran Matematika</h3>
                <p class="text-gray-400 text-xs">Logika, aljabar, geometri, dan statistika</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center hover:border-yellow-500/20 transition">
                <i class="fas fa-flask text-purple-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Tes Subbidang</h3>
                <p class="text-gray-400 text-xs">Saintek & Soshum sesuai pilihan program studi</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-yellow-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">1,200+</div><p class="text-gray-400 text-sm mt-1">Materi Pelajaran</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">10,000+</div><p class="text-gray-400 text-sm mt-1">Soal UTBK</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">85%</div><p class="text-gray-400 text-sm mt-1">Lolos PTN</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">100+</div><p class="text-gray-400 text-sm mt-1">Mentor Berpengalaman</p></div>
    </div>
</section>

{{-- Olimpiade & Kompetisi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Olimpiade & Kompetisi Nasional</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Persiapan intensif menuju OSN, KSN, dan kompetisi internasional</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $olimpiade = [
            ['Matematika', 'Teori bilangan, kombinatorika, geometri, aljabar, dan analisis. Soal OSN & IMO.', 'fa-square-root-alt', 'from-blue-500 to-indigo-500'],
            ['Fisika', 'Mekanika, termodinamika, elektromagnetisme, optik, dan fisika modern.', 'fa-atom', 'from-cyan-500 to-blue-500'],
            ['Kimia', 'Kimia organik, anorganik, fisika kimia, biokimia, dan analisis.', 'fa-flask', 'from-green-500 to-emerald-500'],
            ['Biologi', 'Genetika, ekologi, anatomi, fisiologi, dan biologi molekuler.', 'fa-dna', 'from-red-500 to-pink-500'],
            ['Informatika', 'Algoritma, struktur data, graph theory, DP, dan competitive programming.', 'fa-laptop-code', 'from-purple-500 to-violet-500'],
            ['Ekonomi', 'Mikroekonomi, makroekonomi, analisis data, dan studi kasus bisnis.', 'fa-chart-line', 'from-yellow-500 to-amber-500'],
        ];
        @endphp
        @foreach($olimpiade as $idx => $o)
        <div class="kaca rounded-2xl p-5 hover:border-yellow-500/20 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <div class="w-12 h-12 bg-gradient-to-br {{ $o[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $o[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $o[0] }}</h3>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $o[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Video Pembelajaran --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Video Pengenalan Program</h2>
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SMA/MA meraih prestasi bersama KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-yellow-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SMA/MA KVT Hub</p>
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
            ['Siswa', 'fa-user-graduate', 'from-yellow-500 to-amber-500', 'border-yellow-500/20', [
                'Materi per peminatan MIPA, IPS, Bahasa',
                'Simulasi UTBK/SNBT dengan skor prediksi',
                'Bank soal olimpiade & pembahasan video',
                'AI Tutor 24/7 untuk tanya jawab materi',
            ]],
            ['Guru / Pendidik', 'fa-chalkboard-teacher', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                'Modul ajar & RPP Kurikulum Merdeka',
                'Dashboard analitik kelas & penilaian',
                'Tools pembuatan ujian CBT otomatis',
                'Pelatihan & webinar pengembangan profesi',
            ]],
            ['Orang Tua / Admin', 'fa-user-tie', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                'Laporan akademik anak & analisis SNBT',
                'Monitoring progres belajar real-time',
                'Konsultasi karir & jurusan kuliah',
                'Informasi beasiswa & PTN favorit',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-yellow-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
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
            ['Bagaimana program persiapan SNBT/UTBK?', 'KVT Hub menyediakan 10,000+ soal latihan UTBK, simulasi CBT berkala, dan analisis skor prediksi. Materi mencakup TPS, Literasi, Penalaran Matematika, dan Tes Subbidang Saintek/Soshum.'],
            ['Apakah ada program untuk semua peminatan?', 'Ya, kami menyediakan materi lengkap untuk peminatan MIPA, IPS, dan Bahasa & Budaya. Setiap peminatan memiliki materi, soal latihan, dan mentor khusus.'],
            ['Bagaimana persiapan olimpiade sains?', 'Program olimpiade kami mencakup Matematika, Fisika, Kimia, Biologi, Informatika, dan Ekonomi. Materi disusun oleh alumni OSN dan pelatih tingkat nasional.'],
            ['Apakah ada bimbingan pemilihan jurusan kuliah?', 'Ya, KVT Hub menyediakan tes minat bakat, konsultasi karir, informasi PTN favorit, dan panduan beasiswa untuk membantu siswa memilih jurusan yang tepat.'],
            ['Berapa tingkat kelulusan SNBT alumni KVT Hub?', 'Berdasarkan data 2025, 85% siswa KVT Hub yang mengikuti program intensif SNBT berhasil diterima di PTN pilihan pertama atau kedua mereka.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-yellow-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-yellow-400 text-xs group-open:rotate-180 transition-transform"></i>
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
        <div class="kaca rounded-3xl p-10 border-yellow-500/20" data-aos="zoom-in">
            <i class="fas fa-school text-yellow-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Raih PTN Impianmu Bersama KVT Hub!</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Persiapkan SNBT, kuasai materi peminatan, dan raih prestasi olimpiade dengan program belajar terlengkap.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-yellow-500 to-amber-500 hover:from-yellow-400 hover:to-amber-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-yellow-500/20">
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
