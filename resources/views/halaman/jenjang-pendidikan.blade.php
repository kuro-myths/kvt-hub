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

{{-- LEARNING TIPS & SUCCESS STRATEGIES --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-16" data-aos="fade-down">
        <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-brain mr-2"></i>Tips Belajar</span>
        <h2 class="text-4xl font-black text-white mt-2">Strategi Sukses di Setiap Jenjang</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Panduan & tips dari mentor KVT Hub untuk memaksimalkan hasil belajar Anda</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
        {{-- TK/PAUD & SD Tips --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-pink-500/30 transition-all" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-child text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white">TK/PAUD & SD</h3>
            </div>
            <div class="space-y-4">
                <div class="bg-pink-500/5 border border-pink-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-pink-400 mr-2"></i>Bangun Fondasi Kuat</h4>
                    <p class="text-gray-400 text-sm">Fokus pada literasi dan numerasi dasar. 10 menit per hari lebih baik dari 1 jam sekali seminggu.</p>
                </div>
                <div class="bg-pink-500/5 border border-pink-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-pink-400 mr-2"></i>Belajar Sambil Main</h4>
                    <p class="text-gray-400 text-sm">Gunakan gamifikasi & badge untuk meningkatkan motivasi belajar. Sistem reward yang menyenangkan!</p>
                </div>
                <div class="bg-pink-500/5 border border-pink-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-pink-400 mr-2"></i>Orang Tua Aktif Mendampingi</h4>
                    <p class="text-gray-400 text-sm">Orang tua sebagai co-learner. Dashboard orang tua membantu tracking progres anak. Raih badge bersama!</p>
                </div>
            </div>
        </div>

        {{-- SMP/SMA Tips --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-blue-500/30 transition-all" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-book text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white">SMP & SMA</h3>
            </div>
            <div class="space-y-4">
                <div class="bg-blue-500/5 border border-blue-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-blue-400 mr-2"></i>Rencana Karir Sejak Dini</h4>
                    <p class="text-gray-400 text-sm">Eksplorasi passion & bakat dengan learning paths. Persiapkan SNBT & lomba akademik sejak kelas 10.</p>
                </div>
                <div class="bg-blue-500/5 border border-blue-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-blue-400 mr-2"></i>Manfaatkan Study Group</h4>
                    <p class="text-gray-400 text-sm">Bergabung study group & forum diskusi. Ajari teman = cara terbaik untuk mendalami materi.</p>
                </div>
                <div class="bg-blue-500/5 border border-blue-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-blue-400 mr-2"></i>Ikuti Kompetisi Akademik</h4>
                    <p class="text-gray-400 text-sm">Olimpiade, hackathon, kompetisi STEM. Prestasi ini boost nilai SNBT & scholarship opportunities.</p>
                </div>
            </div>
        </div>

        {{-- Perguruan Tinggi Tips --}}
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-purple-500/30 transition-all" data-aos="fade-up" data-aos-delay="200">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white">Perguruan Tinggi</h3>
            </div>
            <div class="space-y-4">
                <div class="bg-purple-500/5 border border-purple-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-purple-400 mr-2"></i>Fokus Riset & Publikasi</h4>
                    <p class="text-gray-400 text-sm">Mulai riset dari semester 1. Target publikasi jurnal Q1-Q4. Akses lab virtual & dataset global.</p>
                </div>
                <div class="bg-purple-500/5 border border-purple-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-purple-400 mr-2"></i>Program Magang Terstruktur</h4>
                    <p class="text-gray-400 text-sm">Tautan dengan 500+ perusahaan industri. Magang + sertifikasi = portfolio kuat untuk job market.</p>
                </div>
                <div class="bg-purple-500/5 border border-purple-500/20 rounded-lg p-4">
                    <h4 class="text-white font-semibold mb-2 flex items-center"><i class="fas fa-check-circle text-purple-400 mr-2"></i>Networking Internasional</h4>
                    <p class="text-gray-400 text-sm">Kolaborasi dengan 150+ universitas mitra. Exchange program, konferensi internasional, & dual degree.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Common Success Habits --}}
    <div class="mt-16 bg-gradient-to-r from-emerald-900/20 to-teal-900/20 border border-emerald-500/20 rounded-2xl p-8" data-aos="zoom-in">
        <h3 class="text-2xl font-black text-white mb-6 flex items-center">
            <i class="fas fa-star text-yellow-400 mr-3"></i>Kebiasaan Sukses di Semua Jenjang
        </h3>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="flex items-start gap-3">
                <i class="fas fa-check-double text-emerald-400 text-lg mt-1 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-0.5">Konsistensi</h4>
                    <p class="text-gray-400 text-xs">Belajar rutin > belajar berat sesekali. 30 min/hari = hasil optimal</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <i class="fas fa-check-double text-emerald-400 text-lg mt-1 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-0.5">Interaksi Aktif</h4>
                    <p class="text-gray-400 text-xs">Tanya di forum, diskusi grup, ajukan soal. Active learning = retention 70%+</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <i class="fas fa-check-double text-emerald-400 text-lg mt-1 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-0.5">Praktek & Project</h4>
                    <p class="text-gray-400 text-xs">Jangan hanya teori. Buat project, coding, eksperimen. Learning by doing!</p>
                </div>
            </div>
            <div class="flex items-start gap-3">
                <i class="fas fa-check-double text-emerald-400 text-lg mt-1 shrink-0"></i>
                <div>
                    <h4 class="text-white font-semibold text-sm mb-0.5">Feedback Loop</h4>
                    <p class="text-gray-400 text-xs">Ikuti kuis, minta feedback mentor, improve. Growth mindset = kunci sukses! </p>
                </div>
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

{{-- BENEFIT PER JENJANG --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/30 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-lime-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-gift mr-2"></i>Keuntungan</span>
            <h2 class="text-4xl font-black text-white mt-2">Apa yang Anda Dapatkan di Setiap Jenjang</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Benefit eksklusif dan akses khusus untuk memaksimalkan pembelajaran Anda</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- TK/SD Benefits --}}
            <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-pink-500/30 transition-all" data-aos="fade-right">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-pink-500 to-rose-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-star text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">TK/SD & SMP</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 bg-pink-500/5 border border-pink-500/20 rounded-lg p-3">
                        <i class="fas fa-play-circle text-pink-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Video Pembelajaran Interaktif</h4>
                            <p class="text-gray-400 text-xs">Berhenti otomatis di quiz, gamifikasi, reward points</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-pink-500/5 border border-pink-500/20 rounded-lg p-3">
                        <i class="fas fa-trophy text-pink-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Badge & Achievement System</h4>
                            <p class="text-gray-400 text-xs">20+ jenis badge dapat dikumpulkan & dibagikan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-pink-500/5 border border-pink-500/20 rounded-lg p-3">
                        <i class="fas fa-users text-pink-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Parent Dashboard</h4>
                            <p class="text-gray-400 text-xs">Orang tua bisa monitor progres belajar anak real-time</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-pink-500/5 border border-pink-500/20 rounded-lg p-3">
                        <i class="fas fa-pencil-alt text-pink-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Latihan Soal Unlimited</h4>
                            <p class="text-gray-400 text-xs">Bank soal 10K+ dengan auto-grading instant</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SMA/SMK & PT Benefits --}}
            <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-blue-500/30 transition-all" data-aos="fade-left">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-gem text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white">SMA/SMK & Perguruan Tinggi</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-start gap-3 bg-blue-500/5 border border-blue-500/20 rounded-lg p-3">
                        <i class="fas fa-certificate text-blue-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Sertifikasi Profesional</h4>
                            <p class="text-gray-400 text-xs">Akses 120+ program sertifikasi (BNSP, AWS, Google, Microsoft)</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-blue-500/5 border border-blue-500/20 rounded-lg p-3">
                        <i class="fas fa-briefcase text-blue-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Job Board & Magang</h4>
                            <p class="text-gray-400 text-xs">500+ lowongan kerja & program magang dengan 500+ perusahaan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-blue-500/5 border border-blue-500/20 rounded-lg p-3">
                        <i class="fas fa-microscope text-blue-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Research & Collaboration</h4>
                            <p class="text-gray-400 text-xs">Akses ke 150+ universitas mitra, lab virtual, dataset global</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3 bg-blue-500/5 border border-blue-500/20 rounded-lg p-3">
                        <i class="fas fa-user-tie text-blue-400 mt-1"></i>
                        <div>
                            <h4 class="text-white font-semibold text-sm">Mentoring 1-on-1</h4>
                            <p class="text-gray-400 text-xs">Konsultasi karir dengan IKM AI & mentor profesional real</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CERTIFICATION SHOWCASE --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-award mr-2"></i>Sertifikasi</span>
            <h2 class="text-4xl font-black text-white mt-2">Sertifikasi yang Bisa Diambil</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Raih sertifikat yang diakui industri dari setiap jenjang pendidikan</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $certifications = [
                ['jenjang' => 'SD & SMP', 'level' => 'Dasar', 'cert' => ['Sertifikat Menyelesaikan Modul', 'Digital Literacy Badge', 'Problem Solver Certificate'], 'warna' => 'from-yellow-500 to-amber-500', 'ikon' => 'fa-certificate'],
                ['jenjang' => 'SMA/SMK', 'level' => 'Menengah', 'cert' => ['BNSP Junior Developer', 'Google IT Support Pro', 'CompTIA A+', 'Microsoft Azure Fundamentals'], 'warna' => 'from-orange-500 to-red-500', 'ikon' => 'fa-star'],
                ['jenjang' => 'Sarjana (S1)', 'level' => 'Profesional', 'cert' => ['AWS Solutions Architect', 'Kubernetes Administrator (CKA)', 'Google Cloud Professional', 'Security+ (CompTIA)'], 'warna' => 'from-teal-500 to-cyan-500', 'ikon' => 'fa-crown'],
                ['jenjang' => 'Magister+ (S2/S3)', 'level' => 'Expert', 'cert' => ['TOGAF Enterprise Architect', 'AWS Solutions Architect Pro', 'Certified Data Scientist', 'Research Publication Verified'], 'warna' => 'from-purple-500 to-violet-500', 'ikon' => 'fa-gem'],
            ];
            @endphp

            @foreach($certifications as $i => $cert)
            <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-6 hover:border-kvt-500/30 transition-all hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $cert['warna'] }} rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas {{ $cert['ikon'] }} text-white text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold">{{ $cert['jenjang'] }}</h3>
                        <span class="text-xs text-gray-500">{{ $cert['level'] }}</span>
                    </div>
                </div>
                <div class="space-y-2">
                    @foreach($cert['cert'] as $c)
                    <div class="flex items-center gap-2 text-sm">
                        <i class="fas fa-check-circle text-emerald-400 text-[10px]"></i>
                        <span class="text-gray-300">{{ $c }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SISWA SUCCESS STORIES --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/30 to-transparent"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-rose-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-story mr-2"></i>Success Stories</span>
            <h2 class="text-4xl font-black text-white mt-2">Kisah Sukses Siswa di Setiap Jenjang</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Inspirasi dari siswa nyata yang meraih kesuksesan melalui KVT Hub</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $stories = [
                ['nama' => 'Budi (SD)', 'jenjang' => 'Kelas 5 SD', 'foto' => 'https://i.pravatar.cc/150?img=10', 'story' => 'Dari nilai 6 menjadi 9! Dengan video interaktif dan quiz otomatis, saya jadi suka matematika. Sudah dapat 15 achievement badges!', 'stats' => 'Level 12 | 500+ XP | 15 Badges', 'warna' => 'from-yellow-500 to-amber-500'],
                ['nama' => 'Siti (SMP)', 'jenjang' => 'Kelas 2 SMP', 'foto' => 'https://i.pravatar.cc/150?img=20', 'story' => 'Persiapan SNBT jadi mudah dengan modul terintegrasi. Belajar sambil bermain, progres terlacak jelas. Naik 3 level dalam sebulan!', 'stats' => 'Level 28 | 1.2K XP | Study Group Lead', 'warna' => 'from-green-500 to-emerald-500'],
                ['nama' => 'Raji (SMA)', 'jenjang' => 'Kelas 12 SMA', 'foto' => 'https://i.pravatar.cc/150?img=30', 'story' => 'Ambil sertifikasi AWS Cloud Practitioner sambil sekolah. Sekarang jadi intern di startup tech dengan gaji Rp 3 juta/bulan!', 'stats' => 'Level 45 | 3.5K XP | AWS Certified', 'warna' => 'from-blue-500 to-cyan-500'],
                ['nama' => 'Maya (SMK)', 'jenjang' => 'Kelas 13 SMK', 'foto' => 'https://i.pravatar.cc/150?img=40', 'story' => 'Program magang lewat KVT Hub langsung diterima di PT ASUS. Portfolio saya dikagumi mentor karena project yang dikerjakan real-world!', 'stats' => 'Level 52 | 4.8K XP | Internship Offer', 'warna' => 'from-purple-500 to-violet-500'],
                ['nama' => 'Andi (S1)', 'jenjang' => 'Mahasiswa Informatika', 'foto' => 'https://i.pravatar.cc/150?img=50', 'story' => 'Ambil 5 sertifikasi cloud sambil kuliah. Nilai GPA 3.8 + 3 skill verified. Sekarang kerja di Gojek sebagai Backend Engineer!', 'stats' => 'Level 67 | 8K XP | 5 Certifications', 'warna' => 'from-rose-500 to-pink-500'],
                ['nama' => 'Putri (S2)', 'jenjang' => 'Mahasiswa Magister', 'foto' => 'https://i.pravatar.cc/150?img=60', 'story' => 'Kolaborasi riset dengan 10+ universitas mitra. 2 paper published di Q2 journal. Sekarang research scientist di Google Brain!', 'stats' => 'Level 82 | 12K XP | 2 Publications', 'warna' => 'from-cyan-500 to-teal-500'],
            ];
            @endphp

            @foreach($stories as $i => $s)
            <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl overflow-hidden hover:border-kvt-500/30 transition-all hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                {{-- Header --}}
                <div class="h-16 bg-gradient-to-r {{ $s['warna'] }} relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20" style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(255,255,255,0.1) 10px, rgba(255,255,255,0.1) 20px);"></div>
                </div>

                {{-- Content --}}
                <div class="p-5">
                    {{-- Avatar --}}
                    <div class="relative -mt-8 mb-3">
                        <img src="{{ $s['foto'] }}" alt="{{ $s['nama'] }}" class="w-12 h-12 rounded-full border-4 border-kvt-900 object-cover shadow-lg">
                    </div>

                    {{-- Info --}}
                    <h3 class="text-white font-bold mb-0.5">{{ $s['nama'] }}</h3>
                    <p class="text-gray-500 text-xs mb-3">{{ $s['jenjang'] }}</p>

                    {{-- Story --}}
                    <p class="text-gray-300 text-sm leading-relaxed mb-4 italic">"{{ $s['story'] }}"</p>

                    {{-- Stats Badge --}}
                    <div class="bg-kvt-800/50 rounded-lg px-3 py-2 text-center">
                        <p class="text-kvt-400 text-xs font-bold">{{ $s['stats'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- INTERACTIVE PROGRESS ESTIMATOR --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-down">
            <h2 class="text-3xl font-black text-white mb-3">Estimator Waktu & Cost</h2>
            <p class="text-gray-400">Hitung estimasi waktu belajar dan investasi untuk jenjang pilihan Anda</p>
        </div>

        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8" data-aos="zoom-in">
            <div class="grid md:grid-cols-2 gap-8">
                {{-- Left: Estimator --}}
                <div>
                    <h3 class="text-white font-bold text-lg mb-6">Pilih Jenjang Anda</h3>
                    <div class="space-y-3">
                        @php
                        $estimates = [
                            ['label' => 'SD Lengkap (6 tahun)', 'waktu' => '2-3 bulan', 'cost' => 'Gratis', 'cert' => '6 Sertifikat', 'level' => '1-20'],
                            ['label' => 'SMP Lengkap (3 tahun)', 'waktu' => '4-5 bulan', 'cost' => 'Gratis', 'cert' => '9 Sertifikat', 'level' => '20-40'],
                            ['label' => 'SMA Lengkap (3 tahun)', 'waktu' => '5-6 bulan', 'cost' => 'Rp 299K/bulan', 'cert' => '15 Sertifikat', 'level' => '40-65'],
                            ['label' => 'SMK + Internship', 'waktu' => '6-8 bulan', 'cost' => 'Rp 499K/bulan', 'cert' => '20+ Sertifikat', 'level' => '40-70'],
                            ['label' => 'S1 + Sertifikasi', 'waktu' => '8-12 bulan', 'cost' => 'Rp 799K/bulan', 'cert' => '25+ Sertifikat', 'level' => '60-90'],
                            ['label' => 'S2/S3 + Research', 'waktu' => '12+ bulan', 'cost' => 'Custom', 'cert' => '30+ Hal', 'level' => '80-100'],
                        ];
                        @endphp
                        @foreach($estimates as $est)
                        <button onclick="selectEstimate('{{ $est['label'] }}')" class="w-full text-left bg-kvt-800/30 hover:bg-kvt-700/30 border border-kvt-700/20 hover:border-kvt-500/30 rounded-lg p-4 transition group">
                            <div class="flex items-start justify-between mb-2">
                                <h4 class="text-white font-semibold text-sm group-hover:text-kvt-300">{{ $est['label'] }}</h4>
                                <i class="fas fa-chevron-right text-kvt-400 group-hover:translate-x-1 transition"></i>
                            </div>
                            <div class="flex items-center justify-between gap-2 text-xs">
                                <span class="text-gray-500"><i class="fas fa-clock mr-1"></i>{{ $est['waktu'] }}</span>
                                <span class="text-gray-500"><i class="fas fa-credit-card mr-1"></i>{{ $est['cost'] }}</span>
                            </div>
                        </button>
                        @endforeach
                    </div>
                </div>

                {{-- Right: Details --}}
                <div class="bg-kvt-800/20 rounded-xl p-6 border border-kvt-700/20">
                    <h3 class="text-white font-bold text-lg mb-4">Rincian Program</h3>
                    <div class="space-y-4">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-gray-400 text-sm">Durasi Belajar</span>
                                <span class="text-kvt-400 font-bold text-sm" id="est-waktu">Pilih program</span>
                            </div>
                            <div class="h-2 bg-kvt-700 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-kvt-400 to-ungu-400 rounded-full" style="width: 0%" id="est-bar"></div>
                            </div>
                        </div>
                        <div class="bg-kvt-900/30 rounded-lg p-4">
                            <p class="text-gray-400 text-xs mb-2">💰 Investasi Bulanan</p>
                            <p class="text-white font-black text-2xl" id="est-cost">Gratis</p>
                        </div>
                        <div class="bg-kvt-900/30 rounded-lg p-4">
                            <p class="text-gray-400 text-xs mb-2">📜 Sertifikat yang Bisa Didapat</p>
                            <p class="text-white font-bold" id="est-cert">6 Sertifikat</p>
                        </div>
                        <div class="bg-kvt-900/30 rounded-lg p-4">
                            <p class="text-gray-400 text-xs mb-2">📊 Level Target</p>
                            <p class="text-white font-bold" id="est-level">1-20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

@push('skrip')
<script>
function selectEstimate(label) {
    const data = {
        'SD Lengkap (6 tahun)': { waktu: '2-3 bulan', cost: 'Gratis', cert: '6 Sertifikat', level: '1-20', persen: 20 },
        'SMP Lengkap (3 tahun)': { waktu: '4-5 bulan', cost: 'Gratis', cert: '9 Sertifikat', level: '20-40', persen: 35 },
        'SMA Lengkap (3 tahun)': { waktu: '5-6 bulan', cost: 'Rp 299K/bulan', cert: '15 Sertifikat', level: '40-65', persen: 60 },
        'SMK + Internship': { waktu: '6-8 bulan', cost: 'Rp 499K/bulan', cert: '20+ Sertifikat', level: '40-70', persen: 65 },
        'S1 + Sertifikasi': { waktu: '8-12 bulan', cost: 'Rp 799K/bulan', cert: '25+ Sertifikat', level: '60-90', persen: 85 },
        'S2/S3 + Research': { waktu: '12+ bulan', cost: 'Custom', cert: '30+ Hal', level: '80-100', persen: 100 },
    };
    const est = data[label] || data['SD Lengkap (6 tahun)'];
    document.getElementById('est-waktu').textContent = est.waktu;
    document.getElementById('est-cost').textContent = est.cost;
    document.getElementById('est-cert').textContent = est.cert;
    document.getElementById('est-level').textContent = est.level;
    document.getElementById('est-bar').style.width = est.persen + '%';
}
</script>
@endpush
