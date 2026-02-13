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
    </div>
</section>

{{-- Jenjang Cards --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pendidikan Dasar & Menengah</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Fondasi pendidikan dari usia dini hingga menengah atas</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4" data-aos="fade-up" data-aos-delay="200">
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
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Pendidikan Tinggi</h2>
            <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Dari Diploma hingga Doktoral, membangun keahlian mendalam</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
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

{{-- Program Khusus --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Program Khusus</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Jalur akselerasi dan program elite untuk karir profesional</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
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
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-kvt-800/30 to-ungu-700/10 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
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

{{-- CTA --}}
<section class="max-w-4xl mx-auto px-4 py-16 text-center" data-aos="fade-up">
    <h2 class="text-3xl font-bold text-white mb-4">Temukan Jenjang yang Tepat</h2>
    <p class="text-gray-400 mb-8">Daftar sekarang dan mulai perjalanan pendidikan Anda dari mana saja.</p>
    <a href="{{ route('daftar') }}" class="inline-block bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/20">
        <i class="fas fa-user-plus mr-2"></i>Daftar Gratis
    </a>
</section>

@endsection
