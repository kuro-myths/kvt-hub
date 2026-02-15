@extends('tata-letak.utama')
@section('judul', 'Jenjang Pendidikan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, rgba(51,153,255,0.3) 0%, transparent 50%), radial-gradient(circle at 80% 50%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-graduation-cap"></i> 13 Jenjang Pendidikan Terintegrasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Jenjang </span><span class="teks-gradien">Pendidikan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Dari TK/PAUD hingga Doktoral (S3/PhD), KVT Hub menyediakan ekosistem pembelajaran lengkap untuk setiap tahapan pendidikan.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Belajar
            </a>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/jenjang-steps.svg') }}" alt="Jenjang Pendidikan" class="w-full max-w-3xl mx-auto rounded-2xl shadow-2xl shadow-kvt-500/10 border border-kvt-700/20">
        </div>
    </div>
</section>

{{-- Jenjang Cards --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Pendidikan Dasar & Menengah</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Fondasi pendidikan dari usia dini hingga menengah atas</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" data-aos="fade-right" data-aos-delay="200">
        @php
        $dasar = [
            ['TK / PAUD', 'Usia 4-6 tahun', 'fa-baby', 'from-pink-500 to-rose-500', 'Stimulasi motorik, bahasa, kreativitas, dan sosial-emosional melalui permainan edukatif.'],
            ['SD / MI', 'Kelas 1-6', 'fa-book-open', 'from-blue-500 to-cyan-500', 'Literasi, numerasi, sains dasar, dan karakter dengan metode belajar interaktif.'],
            ['SMP / MTs', 'Kelas 7-9', 'fa-book', 'from-green-500 to-emerald-500', 'Matematika, IPA, IPS, bahasa, dan keterampilan berpikir kritis.'],
            ['SMA / MA', 'Kelas 10-12', 'fa-school', 'from-yellow-500 to-amber-500', 'IPA/IPS/Bahasa dengan persiapan SNBT, olimpiade, dan riset dasar.'],
            ['SMK', 'Kelas 10-13', 'fa-tools', 'from-orange-500 to-red-500', 'Kompetensi keahlian teknis, magang industri, dan sertifikasi profesi.'],
        ];
        @endphp
        @foreach($dasar as $j)
        <div class="kaca rounded-2xl p-5 hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $j[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $j[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $j[0] }}</h3>
            <p class="text-kvt-400 text-xs mb-2">{{ $j[1] }}</p>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $j[4] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Pendidikan Tinggi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Pendidikan Tinggi</h2>
            <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Dari Diploma hingga Doktoral, membangun keahlian mendalam</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="200">
            @php
            $tinggi = [
                ['Diploma (D1-D3)', '1-3 Tahun', 'fa-certificate', 'from-cyan-500 to-blue-500', 'Pendidikan vokasi dengan fokus keterampilan terapan dan siap kerja. Termasuk D1 Informatika, D2 Teknik, D3 Akuntansi.', ['Praktik 70%', 'Magang', 'Sertifikasi']],
                ['Sarjana (S1)', '4 Tahun', 'fa-user-graduate', 'from-blue-500 to-indigo-500', 'Program akademik dan terapan dengan skripsi. Tersedia 100+ program studi lintas fakultas.', ['Skripsi', 'KKN', 'Lab Riset']],
                ['Magister (S2)', '2 Tahun', 'fa-flask', 'from-purple-500 to-violet-500', 'Pendalaman keahlian dan riset. Program tesis dan non-tesis dengan kolaborasi internasional.', ['Tesis', 'Publikasi', 'Seminar']],
                ['Doktoral (S3/PhD)', '3-5 Tahun', 'fa-atom', 'from-red-500 to-pink-500', 'Riset orisinal dan kontribusi baru pada ilmu pengetahuan. Bimbingan profesor internasional.', ['Disertasi', 'Jurnal Q1', 'Konferensi']],
            ];
            @endphp
            @foreach($tinggi as $j)
            <div class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
                <div class="w-14 h-14 bg-gradient-to-br {{ $j[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $j[2] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-1">{{ $j[0] }}</h3>
                <p class="text-kvt-400 text-xs mb-3">{{ $j[1] }}</p>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">{{ $j[4] }}</p>
                <div class="flex flex-wrap gap-1.5">
                    @foreach($j[5] as $tag)
                    <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Tabel Perbandingan Jenjang --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Perbandingan <span class="teks-gradien">Jenjang Pendidikan</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Comparison table — durasi, gelar, dan fokus utama tiap level</p>
    </div>
    <div class="kaca rounded-2xl overflow-x-auto" data-aos="fade-up" data-aos-delay="200">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b border-kvt-700/40 text-kvt-300 text-xs uppercase">
                    <th class="px-4 py-3">Jenjang</th><th class="px-4 py-3">Durasi</th><th class="px-4 py-3">Gelar</th><th class="px-4 py-3">Fokus Utama</th><th class="px-4 py-3">Peserta</th>
                </tr>
            </thead>
            <tbody>
                @php
                $tabel = [
                    ['TK / PAUD','1-2 Tahun','-','Motorik & Sosial','3.200+'],
                    ['SD / MI','6 Tahun','-','Literasi & Numerasi','12.500+'],
                    ['SMP / MTs','3 Tahun','-','Berpikir Kritis','9.800+'],
                    ['SMA / MA','3 Tahun','-','Akademik & Olimpiade','8.400+'],
                    ['SMK','3-4 Tahun','-','Vokasi & Sertifikasi','6.100+'],
                    ['D1-D3','1-3 Tahun','A.Md','Keterampilan Terapan','3.700+'],
                    ['S1','4 Tahun','S.X / S.T','Akademik & Riset Dasar','4.200+'],
                    ['S2','2 Tahun','M.X / M.T','Riset & Spesialisasi','1.500+'],
                    ['S3/PhD','3-5 Tahun','Dr. / Ph.D','Riset Orisinal','600+'],
                ];
                @endphp
                @foreach($tabel as $b)
                <tr class="border-b border-kvt-800/30 hover:bg-kvt-800/20 transition">
                    <td class="px-4 py-2.5 text-white font-semibold">{{ $b[0] }}</td>
                    <td class="px-4 py-2.5 text-gray-400">{{ $b[1] }}</td>
                    <td class="px-4 py-2.5 text-kvt-300 font-mono text-xs">{{ $b[2] }}</td>
                    <td class="px-4 py-2.5 text-gray-400">{{ $b[3] }}</td>
                    <td class="px-4 py-2.5 text-green-400 font-semibold">{{ $b[4] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{-- Progression Pathway --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Alur <span class="teks-gradien-emas">Progresi Pendidikan</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Education progression pathway — dari usia dini sampai doktoral</p>
        </div>
        <div class="flex flex-col gap-3" data-aos="fade-up" data-aos-delay="200">
            @php
            $alur = [
                ['TK/PAUD','fa-baby','from-pink-500 to-rose-500','Usia 4-6','Bermain & Eksplorasi'],
                ['SD/MI','fa-book-open','from-blue-500 to-cyan-500','Usia 7-12','Fondasi Akademik'],
                ['SMP/MTs','fa-book','from-green-500 to-emerald-500','Usia 13-15','Pendalaman Ilmu'],
                ['SMA/MA/SMK','fa-school','from-yellow-500 to-amber-500','Usia 16-18','Spesialisasi Awal'],
                ['D1-D3 / S1','fa-user-graduate','from-blue-500 to-indigo-500','Usia 18-22','Keahlian Profesional'],
                ['S2 / Profesi','fa-flask','from-purple-500 to-violet-500','Usia 22-25','Riset & Spesialisasi'],
                ['S3 / PhD','fa-atom','from-red-500 to-pink-500','Usia 25+','Kontribusi Ilmiah'],
            ];
            @endphp
            @foreach($alur as $i => $a)
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-gradient-to-br {{ $a[2] }} rounded-full flex items-center justify-center shrink-0 shadow-lg">
                    <i class="fas {{ $a[1] }} text-white text-sm"></i>
                </div>
                <div class="flex-1 kaca rounded-xl px-4 py-3 flex items-center justify-between">
                    <div><span class="text-white font-bold text-sm">{{ $a[0] }}</span><span class="text-gray-500 text-xs ml-2">({{ $a[3] }})</span></div>
                    <span class="text-kvt-400 text-xs hidden md:block">{{ $a[4] }}</span>
                </div>
                @if($i < count($alur) - 1)<i class="fas fa-arrow-down text-kvt-600 text-xs ml-4 hidden md:block"></i>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Key Milestones --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Milestone <span class="teks-gradien">Utama</span> Tiap Jenjang</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Pencapaian kunci yang ditargetkan di setiap tahapan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        @php
        $milestone = [
            ['Pendidikan Dasar','fa-seedling','from-green-500 to-emerald-500',['Lulus UN/AKM SD','Hafal perkalian & literasi dasar','Karakter: jujur, disiplin, mandiri','Portofolio kreativitas pertama']],
            ['Pendidikan Menengah','fa-mountain','from-blue-500 to-cyan-500',['Lulus SNBT / Ujian Kompetensi','Juara olimpiade/kompetisi','Magang industri (SMK)','Skor TOEFL/IELTS awal']],
            ['Pendidikan Tinggi','fa-trophy','from-purple-500 to-violet-500',['Gelar sarjana/magister/doktoral','Publikasi jurnal nasional/internasional','Sertifikasi profesi terakreditasi','Jejaring alumni global']],
        ];
        @endphp
        @foreach($milestone as $m)
        <div class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition group">
            <div class="w-12 h-12 bg-gradient-to-br {{ $m[2] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition">
                <i class="fas {{ $m[1] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $m[0] }}</h3>
            <ul class="space-y-2">
                @foreach($m[3] as $item)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check-circle text-green-400 mt-0.5 text-xs"></i>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- Program Khusus --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">Program Khusus</h2>
            <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Jalur akselerasi dan program elite untuk karir profesional</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
            <div class="kaca rounded-2xl p-6 border-amber-500/20 hover:border-amber-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-amber-500 to-yellow-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-briefcase text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Program Profesi</h3>
                <p class="text-gray-400 text-sm mb-4">Pendidikan profesi untuk dokter, pengacara, akuntan, insinyur, apoteker, notaris, dan lainnya.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Profesi Dokter (Sp.1, Sp.2)</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Profesi Insinyur (IPM)</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Profesi Akuntan (CPA)</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Profesi Hukum (Advokat)</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-6 border-pink-500/20 hover:border-pink-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-rocket text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Fast Track Career</h3>
                <p class="text-gray-400 text-sm mb-4">Program akselerasi karir 6-12 bulan dengan jaminan penempatan kerja di perusahaan mitra.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Bootcamp Intensif</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Mentoring 1-on-1</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Job Guarantee</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Sertifikasi Industri</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-6 border-teal-500/20 hover:border-teal-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-teal-500 to-cyan-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-microscope text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Research Hub</h3>
                <p class="text-gray-400 text-sm mb-4">Kolaborasi riset internasional dengan akses ke laboratorium virtual dan dataset global.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>150+ Universitas Mitra</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Dana Riset Kompetitif</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Publikasi Jurnal Q1-Q4</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Konferensi Internasional</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-kvt-800/30 to-ungu-700/10 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in">
            <div>
                <div class="text-3xl font-black teks-gradien">13</div>
                <p class="text-gray-400 text-sm mt-1">Jenjang Pendidikan</p>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">500+</div>
                <p class="text-gray-400 text-sm mt-1">Program Studi</p>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">150+</div>
                <p class="text-gray-400 text-sm mt-1">Universitas Mitra</p>
            </div>
            <div>
                <div class="text-3xl font-black teks-gradien">50K+</div>
                <p class="text-gray-400 text-sm mt-1">Peserta Didik</p>
            </div>
        </div>
    </div>
</section>

{{-- Video Introduction --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Video <span class="teks-gradien">Pengenalan</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Kenali setiap jenjang pendidikan lewat video interaktif</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
        <div class="relative aspect-video bg-kvt-900 flex items-center justify-center">
            <div class="text-center">
                <div class="w-20 h-20 mx-auto bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-full flex items-center justify-center mb-4 shadow-lg shadow-kvt-500/30 cursor-pointer hover:scale-110 transition">
                    <i class="fas fa-play text-white text-2xl ml-1"></i>
                </div>
                <p class="text-gray-400 text-sm">Jenjang Pendidikan di KVT Hub — Overview Lengkap</p>
                <p class="text-gray-600 text-xs mt-1">Durasi: 8 menit &middot; Bahasa Indonesia</p>
            </div>
        </div>
    </div>
</section>

{{-- Role Features --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Fitur per <span class="teks-gradien-emas">Peran</span></h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Apa yang bisa dilakukan siswa, guru, dan admin di platform</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
            @php
            $peran = [
                ['Siswa / Student','fa-user-graduate','from-blue-500 to-cyan-500','border-blue-500/20',['Pilih jenjang & program studi','Akses materi interaktif per level','Ikuti kuis & ujian nasional prep','Pantau progres & raih pencapaian','Konsultasi karir berbasis AI']],
                ['Guru / Teacher','fa-chalkboard-teacher','from-green-500 to-emerald-500','border-green-500/20',['Kelola kelas multi-jenjang','Buat materi sesuai kurikulum','Koreksi otomatis & manual','Pantau kehadiran & performa','Laporan analitik per siswa']],
                ['Admin / Administrator','fa-user-shield','from-purple-500 to-violet-500','border-purple-500/20',['Kelola seluruh jenjang & kelas','Atur kurikulum & standar kompetensi','Monitor KPI seluruh platform','Manajemen pengguna & hak akses','Laporan akreditasi & compliance']],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 {{ $p[3] }} hover:border-kvt-500/30 transition">
                <div class="w-14 h-14 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[4] as $fitur)
                    <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pertanyaan <span class="teks-gradien">Umum</span></h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Frequently Asked Questions tentang jenjang pendidikan</p>
    </div>
    <div class="space-y-3" data-aos="fade-up" data-aos-delay="200">
        @php
        $faq = [
            ['Apakah semua jenjang tersedia secara online?','Ya, KVT Hub menyediakan pembelajaran online dan hybrid untuk seluruh 13 jenjang pendidikan, dari TK/PAUD hingga S3/PhD dengan kurikulum terintegrasi.'],
            ['Bagaimana cara berpindah antar jenjang?','Siswa secara otomatis dapat melanjutkan ke jenjang berikutnya setelah menyelesaikan seluruh kompetensi yang dipersyaratkan dan lulus evaluasi akhir.'],
            ['Apakah ada biaya untuk setiap jenjang?','Paket dasar gratis tersedia untuk semua jenjang. Paket premium dan eksklusif menyediakan fitur tambahan seperti mentoring personal dan sertifikasi.'],
            ['Apakah sertifikat/ijazah diakui?','KVT Hub bermitra dengan 150+ universitas dan lembaga sertifikasi terakreditasi BAN-PT untuk menjamin pengakuan resmi.'],
            ['Bisa ambil lebih dari satu jenjang secara bersamaan?','Ya, sistem mendukung multi-enrollment sehingga Anda bisa mengambil program vokasi sambil mempersiapkan program sarjana.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="px-5 py-4 cursor-pointer flex items-center justify-between text-white font-semibold text-sm hover:text-kvt-300 transition">
                {{ $f[0] }}
                <i class="fas fa-chevron-down text-kvt-500 text-xs group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-4 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-kvt-800/30 to-ungu-700/20 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <div class="kaca rounded-2xl p-10">
            <h2 class="text-3xl font-bold text-white mb-4">Temukan Jenjang yang <span class="teks-gradien">Tepat</span></h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang dan mulai perjalanan pendidikan Anda dari mana saja — gratis untuk semua jenjang.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
                    <i class="fas fa-user-plus mr-2"></i>Daftar Gratis
                </a>
                <a href="{{ route('masuk') }}" class="border border-kvt-500/30 hover:bg-kvt-800/30 text-white px-8 py-3 rounded-xl font-semibold transition">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
