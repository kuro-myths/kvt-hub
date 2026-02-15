@extends('tata-letak.utama')
@section('judul', 'Magister (S2) - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(139,92,246,0.4) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-flask"></i> Program Magister - 2 Tahun
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Magister </span><span class="teks-gradien">(S2)</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pendalaman keahlian dan riset lanjutan. Program tesis dan non-tesis dengan kolaborasi internasional dan akses jurnal premium.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-purple-500 to-violet-500 hover:from-purple-400 hover:to-violet-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-purple-500/20">
                <i class="fas fa-rocket mr-2"></i>Daftar Program
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Jalur Tesis vs Non-Tesis --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Jalur Program Magister</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Pilih jalur yang sesuai dengan tujuan akademik dan karirmu</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-right" data-aos-delay="200">
        <div class="kaca rounded-2xl p-8 border-purple-500/20 hover:border-purple-500/40 transition">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-file-alt text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-xl mb-3">Jalur Tesis (By Research)</h3>
            <p class="text-gray-400 text-sm mb-4">Program riset mendalam dengan bimbingan profesor. Cocok untuk melanjutkan ke S3 dan karir akademik.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Riset original & tesis</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Publikasi jurnal wajib</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Bimbingan 1-on-1</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Akses lab riset penuh</li>
                <li><i class="fas fa-check text-purple-400 mr-2"></i>Durasi: 2-3 tahun</li>
            </ul>
        </div>
        <div class="kaca rounded-2xl p-8 border-blue-500/20 hover:border-blue-500/40 transition">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-briefcase text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-xl mb-3">Jalur Non-Tesis (Professional)</h3>
            <p class="text-gray-400 text-sm mb-4">Program profesional dengan proyek capstone. Cocok untuk peningkatan karir dan posisi manajerial.</p>
            <ul class="space-y-2 text-sm text-gray-400">
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Coursework intensif</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Proyek capstone industri</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Networking profesional</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Kelas malam/weekend</li>
                <li><i class="fas fa-check text-blue-400 mr-2"></i>Durasi: 1.5-2 tahun</li>
            </ul>
        </div>
    </div>
</section>

{{-- Spesialisasi & Bidang Studi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Spesialisasi & Bidang Studi</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Program magister dengan spesialisasi mendalam di berbagai disiplin ilmu</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-left" data-aos-delay="200">
            @php
            $bidang = [
                ['MBA', 'Master of Business Admin', 'fa-chart-line', 'text-yellow-400'],
                ['M.Cs / MIT', 'Master of Computer Science', 'fa-laptop-code', 'text-blue-400'],
                ['M.Ed', 'Master of Education', 'fa-chalkboard-teacher', 'text-green-400'],
                ['M.Eng', 'Master of Engineering', 'fa-cogs', 'text-orange-400'],
                ['M.Sc', 'Master of Science', 'fa-atom', 'text-purple-400'],
                ['M.H', 'Master of Law', 'fa-balance-scale', 'text-red-400'],
                ['M.Psi', 'Master of Psychology', 'fa-brain', 'text-pink-400'],
                ['M.Kes', 'Master of Public Health', 'fa-heartbeat', 'text-teal-400'],
            ];
            @endphp
            @foreach($bidang as $b)
            <div class="kaca rounded-xl p-4 hover:border-purple-500/30 transition flex items-center gap-3 group">
                <div class="w-10 h-10 bg-kvt-800/50 rounded-lg flex items-center justify-center shrink-0">
                    <i class="fas {{ $b[2] }} {{ $b[3] }}"></i>
                </div>
                <div>
                    <h4 class="text-white text-sm font-semibold group-hover:text-purple-400 transition">{{ $b[0] }}</h4>
                    <p class="text-gray-500 text-[10px]">{{ $b[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Laboratorium Riset --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Laboratorium Riset</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Fasilitas riset modern untuk mendukung penelitian magister</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="zoom-in" data-aos-delay="200">
        @php
        $lab = [
            ['Lab AI & Machine Learning', 'GPU cluster, dataset besar, dan framework deep learning terkini.', 'fa-robot', 'from-blue-500 to-indigo-500'],
            ['Lab Bioteknologi', 'PCR, sekuensing DNA, kultur sel, dan microscopy advanced.', 'fa-dna', 'from-green-500 to-emerald-500'],
            ['Lab Energi Terbarukan', 'Solar panel testing, wind tunnel, dan battery research.', 'fa-solar-panel', 'from-yellow-500 to-amber-500'],
            ['Lab Nanomaterial', 'SEM, TEM, dan XRD untuk analisis material nano.', 'fa-cube', 'from-purple-500 to-violet-500'],
            ['Lab Psikologi Terapan', 'Eye tracking, EEG, dan fasilitas observasi perilaku.', 'fa-brain', 'from-pink-500 to-rose-500'],
            ['Lab Ekonomi Digital', 'Big data analytics, fintech sandbox, dan trading simulator.', 'fa-chart-bar', 'from-cyan-500 to-teal-500'],
        ];
        @endphp
        @foreach($lab as $l)
        <div class="kaca rounded-2xl p-5 hover:border-purple-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-11 h-11 bg-gradient-to-br {{ $l[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $l[2] }} text-white"></i>
            </div>
            <h3 class="text-white font-bold text-sm mb-1">{{ $l[0] }}</h3>
            <p class="text-gray-400 text-xs">{{ $l[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-purple-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">60+</div><p class="text-gray-400 text-sm mt-1">Program S2</p></div>
        <div><div class="text-3xl font-black teks-gradien">800+</div><p class="text-gray-400 text-sm mt-1">Publikasi/Tahun</p></div>
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Profesor Pembimbing</p></div>
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Beasiswa Tersedia</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pengalaman Studi Magister</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Testimoni dan suasana riset mahasiswa magister di KVT Hub</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Program Magister KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Siswa / Guru / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Mahasiswa S2', 'fa-user-graduate', 'from-purple-500 to-violet-500', [
                    'Portal tesis & manajemen referensi',
                    'Akses jurnal internasional premium',
                    'Jadwal bimbingan dosen online',
                    'Tracking progress riset real-time',
                ]],
                ['Dosen Pembimbing', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Dashboard bimbingan mahasiswa S2',
                    'Review & feedback tesis digital',
                    'Kolaborasi riset lintas universitas',
                    'Manajemen publikasi bersama',
                ]],
                ['Admin Pascasarjana', 'fa-user-shield', 'from-blue-500 to-indigo-500', [
                    'Analitik program pascasarjana',
                    'Manajemen sidang tesis & jadwal',
                    'Laporan akreditasi & output riset',
                    'Pengelolaan beasiswa & stipend',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-purple-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-purple-400 mt-0.5 shrink-0"></i>{{ $fitur }}
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
            ['Apa perbedaan jalur tesis dan non-tesis?', 'Jalur tesis fokus pada riset original dan publikasi jurnal, cocok untuk karir akademik dan melanjutkan S3. Jalur non-tesis (professional) fokus pada coursework dan capstone project, cocok untuk peningkatan karir di industri.'],
            ['Berapa lama masa studi S2?', 'Jalur tesis umumnya 2-3 tahun, jalur non-tesis 1.5-2 tahun. Beberapa program profesional seperti MBA Executive bisa diselesaikan dalam 1 tahun dengan kelas intensif.'],
            ['Apakah bisa kuliah S2 sambil bekerja?', 'Ya, banyak program magister menawarkan kelas malam (18.00-21.00) dan weekend. Program online/hybrid juga tersedia untuk fleksibilitas maksimal bagi profesional yang bekerja.'],
            ['Bagaimana sistem bimbingan tesis?', 'Setiap mahasiswa mendapat 1 pembimbing utama dan 1 co-pembimbing. Bimbingan dilakukan secara reguler (minimal 2x/bulan) melalui pertemuan tatap muka atau daring via platform KVT Hub.'],
            ['Apakah ada beasiswa untuk S2?', 'Ya, tersedia beasiswa LPDP, BPI Kemendikbud, beasiswa universitas mitra, dan KVT Research Grant. Beasiswa mencakup biaya kuliah, tunjangan hidup, dan biaya riset.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-purple-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-purple-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-flask text-purple-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Tingkatkan Keahlianmu ke Level Magister</h2>
            <p class="text-gray-400 mb-8">Bergabung dengan program magister terbaik. Akses riset, jurnal internasional, dan bimbingan profesor berpengalaman!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-purple-500 to-violet-500 hover:from-purple-400 hover:to-violet-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-purple-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Program
                </a>
                <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
