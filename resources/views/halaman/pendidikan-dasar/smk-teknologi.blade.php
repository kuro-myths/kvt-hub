@extends('tata-letak.utama')
@section('judul', 'SMK Teknologi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(249,115,22,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-microchip"></i> SMK Teknologi & Rekayasa
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SMK </span><span class="teks-gradien-emas">Teknologi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kuasai teknologi masa depan. Pemrograman, jaringan, robotika, IoT, dan AI. Siap kerja di industri teknologi global.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-400 hover:to-red-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-orange-500/20">
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
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Program keahlian teknologi informasi dan komunikasi</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $jurusan = [
            ['Rekayasa Perangkat Lunak', 'Full-stack development, mobile app, web, dan desktop programming.', 'fa-code', 'from-blue-500 to-indigo-500', ['PHP', 'JavaScript', 'Python', 'Java']],
            ['Teknik Komputer & Jaringan', 'Instalasi jaringan, server admin, cybersecurity, dan cloud.', 'fa-network-wired', 'from-green-500 to-emerald-500', ['Cisco', 'Linux', 'Mikrotik', 'AWS']],
            ['Multimedia / DKV', 'Desain grafis, animasi, videografi, dan UI/UX design.', 'fa-palette', 'from-pink-500 to-rose-500', ['Photoshop', 'Figma', 'Blender', 'AE']],
            ['Elektronika Industri', 'Rangkaian elektronika, mikrokontroler, IoT, dan robotika.', 'fa-microchip', 'from-yellow-500 to-amber-500', ['Arduino', 'ESP32', 'PCB', 'Sensor']],
            ['Teknik Mesin', 'CNC, CAD/CAM, fabrikasi logam, dan perawatan mesin industri.', 'fa-cogs', 'from-gray-500 to-gray-600', ['AutoCAD', 'SolidWorks', 'CNC', '3D Print']],
            ['Teknik Otomotif', 'Mesin kendaraan, kelistrikan, chassis, dan kendaraan listrik.', 'fa-car', 'from-red-500 to-orange-500', ['EFI', 'Hybrid', 'EV', 'Diagnosa']],
        ];
        @endphp
        @foreach($jurusan as $j)
        <div class="kaca rounded-2xl p-6 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1">
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

{{-- Sertifikasi & Magang --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Sertifikasi & Magang Industri</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="100">
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-certificate text-orange-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">BNSP / LSP</h3>
                <p class="text-gray-400 text-xs">Sertifikasi kompetensi nasional dari Badan Nasional Sertifikasi Profesi</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-building text-blue-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Prakerin</h3>
                <p class="text-gray-400 text-xs">Praktik kerja industri 3-6 bulan di perusahaan mitra teknologi</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-award text-green-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Cisco / CompTIA</h3>
                <p class="text-gray-400 text-xs">Sertifikasi internasional CCNA, CompTIA A+, dan Security+</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-trophy text-yellow-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">LKS SMK</h3>
                <p class="text-gray-400 text-xs">Lomba Kompetensi Siswa tingkat kabupaten hingga nasional</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-orange-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">6</div><p class="text-gray-400 text-sm mt-1">Kompetensi Keahlian</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">200+</div><p class="text-gray-400 text-sm mt-1">Proyek Praktik</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">50+</div><p class="text-gray-400 text-sm mt-1">Mitra Industri</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">92%</div><p class="text-gray-400 text-sm mt-1">Tingkat Penempatan</p></div>
    </div>
</section>

{{-- Teaching Factory & PKL --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Teaching Factory & Praktik Kerja Lapangan</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Belajar langsung dari industri dengan proyek nyata</p>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
        <div data-aos="fade-right">
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-industry text-orange-400 mr-2"></i>Teaching Factory</h3>
            <p class="text-gray-400 mb-4 text-sm leading-relaxed">Konsep pembelajaran berbasis produksi nyata. Siswa mengerjakan proyek IT untuk klien sesungguhnya di bawah bimbingan instruktur industri.</p>
            <ul class="space-y-2 text-gray-300 text-sm mb-6">
                <li><i class="fas fa-check-circle text-orange-400 mr-2"></i>Proyek website & aplikasi untuk UMKM lokal</li>
                <li><i class="fas fa-check-circle text-orange-400 mr-2"></i>Instalasi jaringan untuk sekolah & kantor</li>
                <li><i class="fas fa-check-circle text-orange-400 mr-2"></i>Produksi konten multimedia profesional</li>
                <li><i class="fas fa-check-circle text-orange-400 mr-2"></i>Perakitan & maintenance PC untuk instansi</li>
            </ul>
            <h3 class="text-xl font-bold text-white mb-4"><i class="fas fa-building text-blue-400 mr-2"></i>PKL / Prakerin</h3>
            <p class="text-gray-400 text-sm leading-relaxed">Praktik Kerja Lapangan selama 3-6 bulan di perusahaan mitra teknologi. Siswa mendapat pengalaman kerja nyata dan networking industri.</p>
        </div>
        <div class="space-y-4" data-aos="fade-left">
            @php
            $mitra = [
                ['Perusahaan IT & Startup', 'fa-laptop-code', 'text-blue-400', 'Software house, startup teknologi, dan digital agency'],
                ['Provider & Telekomunikasi', 'fa-wifi', 'text-green-400', 'ISP, operator seluler, dan perusahaan telekomunikasi'],
                ['Industri Manufaktur', 'fa-cogs', 'text-yellow-400', 'Pabrik elektronik, otomotif, dan industri berat'],
                ['Instansi Pemerintah', 'fa-university', 'text-purple-400', 'Dinas Kominfo, BUMN teknologi, dan lembaga riset'],
            ];
            @endphp
            @foreach($mitra as $idx => $m)
            <div class="kaca rounded-xl p-4 flex items-center gap-4 hover:border-orange-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <i class="fas {{ $m[1] }} {{ $m[2] }} text-xl"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm">{{ $m[0] }}</h4>
                    <p class="text-gray-500 text-xs">{{ $m[3] }}</p>
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
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SMK Teknologi belajar dan berkarya di KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-orange-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SMK Teknologi KVT Hub</p>
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
            ['Siswa', 'fa-user-graduate', 'from-orange-500 to-red-500', 'border-orange-500/20', [
                'Lab virtual coding, jaringan & multimedia',
                'Proyek portofolio untuk karir & freelance',
                'Latihan sertifikasi BNSP & Cisco',
                'AI Tutor untuk debugging & troubleshoot',
            ]],
            ['Guru / Instruktur', 'fa-chalkboard-teacher', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                'Modul ajar & jobsheet praktik siap pakai',
                'Dashboard monitoring proyek siswa',
                'Tools penilaian kompetensi & rubrik',
                'Pelatihan industri & update teknologi',
            ]],
            ['Admin Sekolah', 'fa-user-tie', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                'Manajemen PKL & Teaching Factory',
                'Laporan kompetensi siswa per jurusan',
                'Kerjasama DU/DI & IDUKA terintegrasi',
                'Dashboard akreditasi & BKK sekolah',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-orange-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
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
            ['Jurusan apa saja yang tersedia di SMK Teknologi?', 'KVT Hub menyediakan materi untuk 6 kompetensi keahlian: Rekayasa Perangkat Lunak (RPL), Teknik Komputer & Jaringan (TKJ), Multimedia/DKV, Elektronika Industri, Teknik Mesin, dan Teknik Otomotif (TKRO).'],
            ['Apakah ada sertifikasi industri?', 'Ya, kami mempersiapkan siswa untuk sertifikasi BNSP/LSP, Cisco CCNA, CompTIA A+ & Security+, serta sertifikasi vendor lainnya. Materi latihan dan simulasi ujian tersedia lengkap.'],
            ['Bagaimana sistem Teaching Factory bekerja?', 'Siswa mengerjakan proyek nyata dari klien industri di bawah bimbingan instruktur. Hasil proyek menjadi portofolio profesional yang bisa digunakan saat melamar kerja.'],
            ['Apakah ada program PKL/Prakerin?', 'KVT Hub memfasilitasi penempatan PKL di 50+ perusahaan mitra teknologi. Durasi PKL 3-6 bulan dengan monitoring dan evaluasi berkala.'],
            ['Bagaimana prospek kerja lulusan?', '92% lulusan SMK Teknologi yang belajar di KVT Hub berhasil mendapat penempatan kerja atau melanjutkan kuliah dalam 6 bulan setelah lulus.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-orange-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-orange-400 text-xs group-open:rotate-180 transition-transform"></i>
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
        <div class="kaca rounded-3xl p-10 border-orange-500/20" data-aos="zoom-in">
            <i class="fas fa-microchip text-orange-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Jadi Ahli Teknologi Masa Depan?</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Kuasai pemrograman, jaringan, dan multimedia dengan proyek industri nyata. Raih sertifikasi dan siap kerja!</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-red-500 hover:from-orange-400 hover:to-red-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-orange-500/20">
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
