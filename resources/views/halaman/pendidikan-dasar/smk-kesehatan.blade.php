@extends('tata-letak.utama')
@section('judul', 'SMK Kesehatan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(20,184,166,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-heartbeat"></i> SMK Kesehatan & Farmasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SMK </span><span class="teks-gradien">Kesehatan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Menjadi tenaga kesehatan profesional. Keperawatan, farmasi, analis kesehatan, dan teknologi laboratorium medik.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-teal-500/20">
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
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Program keahlian bidang kesehatan dan farmasi</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $jurusan = [
            ['Asisten Keperawatan', 'Perawatan dasar pasien, P3K, anatomi, fisiologi, dan etika keperawatan.', 'fa-user-nurse', 'from-teal-500 to-cyan-500', ['P3K', 'Anatomi', 'Fisiologi', 'Etika']],
            ['Farmasi Klinis', 'Obat-obatan, resep, farmakologi, dan pengelolaan farmasi.', 'fa-pills', 'from-green-500 to-emerald-500', ['Farmakologi', 'Resep', 'Obat', 'Apotek']],
            ['Teknologi Laboratorium', 'Analisis laboratorium, hematologi, mikrobiologi, dan kimia klinis.', 'fa-vial', 'from-blue-500 to-indigo-500', ['Hematologi', 'Mikrobiologi', 'Kimia', 'PCR']],
            ['Dental Asisten', 'Asisten dokter gigi, perawatan gigi, dan kesehatan mulut.', 'fa-tooth', 'from-purple-500 to-violet-500', ['Dental', 'Ortodonti', 'Oral', 'Sterilisasi']],
            ['Radiologi', 'Teknik pencitraan medis, rontgen, CT-scan, dan MRI dasar.', 'fa-x-ray', 'from-yellow-500 to-amber-500', ['Rontgen', 'CT-Scan', 'MRI', 'PACS']],
            ['Kesehatan Lingkungan', 'Sanitasi, epidemiologi, pengolahan limbah, dan K3.', 'fa-leaf', 'from-lime-500 to-green-500', ['Sanitasi', 'Limbah', 'K3', 'AMDAL']],
        ];
        @endphp
        @foreach($jurusan as $j)
        <div class="kaca rounded-2xl p-6 hover:border-teal-500/30 transition-all duration-300 group hover:-translate-y-1">
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

{{-- Fasilitas Lab --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fasilitas Laboratorium Virtual</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="100">
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-microscope text-teal-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Lab Mikrobiologi</h3>
                <p class="text-gray-400 text-xs">Simulasi pemeriksaan mikroba dan kultur bakteri virtual</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-heartbeat text-red-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Lab Anatomi 3D</h3>
                <p class="text-gray-400 text-xs">Model anatomi tubuh manusia interaktif 3 dimensi</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-prescription-bottle-alt text-green-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Lab Farmasi</h3>
                <p class="text-gray-400 text-xs">Simulasi peracikan obat dan manajemen apotek digital</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-procedures text-blue-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Simulasi Klinik</h3>
                <p class="text-gray-400 text-xs">Praktik penanganan pasien dengan skenario virtual</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-teal-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">6</div><p class="text-gray-400 text-sm mt-1">Kompetensi Keahlian</p></div>
        <div><div class="text-3xl font-black teks-gradien">100+</div><p class="text-gray-400 text-sm mt-1">Simulasi Lab</p></div>
        <div><div class="text-3xl font-black teks-gradien">20+</div><p class="text-gray-400 text-sm mt-1">RS & Klinik Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien">90%</div><p class="text-gray-400 text-sm mt-1">Lulus Uji Kompetensi</p></div>
    </div>
</section>

{{-- Praktik Klinik & Rumah Sakit --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Praktik Klinik & Rumah Sakit</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Pengalaman langsung di fasilitas kesehatan nyata</p>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div data-aos="fade-right">
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-hospital text-teal-400 mr-2"></i>Program Praktik Klinik</h3>
            <p class="text-gray-400 mb-4 text-sm leading-relaxed">Siswa SMK Kesehatan mendapat kesempatan praktik langsung di rumah sakit, puskesmas, klinik, dan apotek mitra. Semua di bawah supervisi tenaga medis profesional.</p>
            <ul class="space-y-2 text-gray-300 text-sm mb-6">
                <li><i class="fas fa-check-circle text-teal-400 mr-2"></i>Praktik perawatan pasien dasar di RS mitra</li>
                <li><i class="fas fa-check-circle text-teal-400 mr-2"></i>Praktik peracikan obat di apotek terakrediasi</li>
                <li><i class="fas fa-check-circle text-teal-400 mr-2"></i>Praktik analisis laboratorium dengan alat standar</li>
                <li><i class="fas fa-check-circle text-teal-400 mr-2"></i>Praktik sterilisasi dan penanganan alat medis</li>
            </ul>
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-certificate text-yellow-400 mr-2"></i>Uji Kompetensi Kesehatan</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Persiapan uji kompetensi BNSP bidang kesehatan. Meliputi ujian teori, praktik klinis, dan asesmen portofolio profesional.</p>
        </div>
        <div class="space-y-4" data-aos="fade-left">
            @php
            $fasilitas = [
                ['Rumah Sakit Mitra', 'fa-hospital', 'text-teal-400', 'RS tipe B & C untuk praktik keperawatan & lab medis'],
                ['Puskesmas & Klinik', 'fa-clinic-medical', 'text-green-400', 'Pelayanan kesehatan primer & promosi kesehatan'],
                ['Apotek & Industri Farmasi', 'fa-pills', 'text-blue-400', 'Praktik peracikan obat & manajemen farmasi'],
                ['Laboratorium Klinik', 'fa-vial', 'text-purple-400', 'Analisis darah, urine, dan mikrobiologi klinik'],
            ];
            @endphp
            @foreach($fasilitas as $idx => $f)
            <div class="kaca rounded-xl p-4 flex items-center gap-4 hover:border-teal-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <i class="fas {{ $f[1] }} {{ $f[2] }} text-xl"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">{{ $f[0] }}</h4>
                    <p class="text-gray-500 text-xs">{{ $f[3] }}</p>
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
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SMK Kesehatan belajar dan berlatih di KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-teal-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SMK Kesehatan KVT Hub</p>
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
            ['Siswa', 'fa-user-graduate', 'from-teal-500 to-cyan-500', 'border-teal-500/20', [
                'Lab virtual anatomi 3D & mikrobiologi',
                'Simulasi penanganan pasien interaktif',
                'Latihan soal uji kompetensi kesehatan',
                'Portofolio klinis untuk karir medis',
            ]],
            ['Guru / Instruktur', 'fa-chalkboard-teacher', 'from-blue-500 to-indigo-500', 'border-blue-500/20', [
                'Modul ajar & skenario klinik siap pakai',
                'Dashboard monitoring praktik siswa',
                'Tools penilaian skill klinis & rubrik',
                'Pelatihan update prosedur medis terbaru',
            ]],
            ['Admin Sekolah', 'fa-user-tie', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                'Manajemen praktik klinik & RS mitra',
                'Laporan kompetensi per program keahlian',
                'Kerjasama fasilitas kesehatan terintegrasi',
                'Dashboard akreditasi & uji kompetensi',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-teal-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
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
            ['Apa saja program keahlian SMK Kesehatan?', 'KVT Hub menyediakan materi untuk 6 kompetensi keahlian: Asisten Keperawatan, Farmasi Klinis, Teknologi Laboratorium Medik, Dental Asisten, Radiologi, dan Kesehatan Lingkungan.'],
            ['Apakah ada praktik di rumah sakit?', 'Ya, siswa mendapat kesempatan praktik di 20+ rumah sakit, puskesmas, klinik, dan apotek mitra. Semua praktik di bawah supervisi tenaga medis profesional.'],
            ['Bagaimana persiapan uji kompetensi?', 'Kami menyediakan bank soal uji kompetensi BNSP bidang kesehatan, simulasi ujian, dan bimbingan intensif. Tingkat kelulusan siswa KVT Hub mencapai 90%.'],
            ['Apakah lab virtual bisa menggantikan lab fisik?', 'Lab virtual kami melengkapi praktik di lab fisik. Siswa bisa berlatih prosedur berulang kali di lab virtual sebelum praktik langsung, sehingga lebih siap dan percaya diri.'],
            ['Bagaimana prospek karir lulusan SMK Kesehatan?', 'Lulusan dapat bekerja di RS, klinik, apotek, laboratorium, atau melanjutkan ke D3/S1 Kesehatan. Kebutuhan tenaga kesehatan di Indonesia terus meningkat setiap tahun.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-teal-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-teal-400 text-xs group-open:rotate-180 transition-transform"></i>
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
        <div class="kaca rounded-3xl p-10 border-teal-500/20" data-aos="zoom-in">
            <i class="fas fa-heartbeat text-teal-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Menjadi Tenaga Kesehatan Profesional?</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Kuasai keperawatan, farmasi, dan laboratorium medis. Praktik di RS mitra dan raih sertifikasi kompetensi kesehatan!</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-teal-500/20">
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
