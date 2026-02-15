@extends('tata-letak.utama')
@section('judul', 'SD / MI - Kelas 1-6 - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-blue-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(59,130,246,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(6,182,212,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-blue-800/30 border border-blue-600/30 rounded-full px-4 py-1.5 text-xs text-blue-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book-open"></i> Pendidikan Dasar - Kelas 1-6
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SD / </span><span class="teks-gradien">MI</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Fondasi kuat untuk masa depan. Literasi, numerasi, sains dasar, dan karakter dengan metode belajar interaktif dan menyenangkan.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-400 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-blue-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Belajar
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Mata Pelajaran --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Mata Pelajaran</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Kurikulum Merdeka Belajar untuk SD/MI</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5" data-aos="fade-right" data-aos-delay="200">
        @php
        $mapel = [
            ['Bahasa Indonesia', 'Membaca, menulis, menyimak, berbicara, dan sastra anak.', 'fa-language', 'from-blue-500 to-indigo-500'],
            ['Matematika', 'Aritmetika, geometri dasar, pengukuran, dan pemecahan masalah.', 'fa-calculator', 'from-green-500 to-emerald-500'],
            ['IPA', 'Makhluk hidup, energi, bumi & antariksa, dan metode ilmiah sederhana.', 'fa-flask', 'from-cyan-500 to-blue-500'],
            ['IPS', 'Lingkungan sosial, sejarah, geografi, dan kewarganegaraan dasar.', 'fa-globe-asia', 'from-yellow-500 to-amber-500'],
            ['Bahasa Inggris', 'Kosa kata, frasa sederhana, lagu, dan percakapan dasar.', 'fa-comment-dots', 'from-red-500 to-pink-500'],
            ['Seni & Budaya', 'Seni rupa, musik, tari, teater, dan budaya lokal Nusantara.', 'fa-palette', 'from-purple-500 to-violet-500'],
            ['PJOK', 'Pendidikan jasmani, olahraga, dan pola hidup sehat.', 'fa-running', 'from-orange-500 to-red-500'],
            ['Informatika', 'Computational thinking, coding dasar, dan literasi digital.', 'fa-laptop-code', 'from-teal-500 to-cyan-500'],
        ];
        @endphp
        @foreach($mapel as $m)
        <div class="kaca rounded-2xl p-5 hover:border-blue-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $m[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $m[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $m[0] }}</h3>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $m[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Kelas per Tingkat --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Tingkatan Kelas</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4" data-aos="fade-left" data-aos-delay="100">
            @for($i = 1; $i <= 6; $i++)
            <div class="kaca rounded-2xl p-5 text-center hover:border-blue-500/30 transition group">
                <div class="w-14 h-14 mx-auto bg-gradient-to-br from-blue-500 to-cyan-500 rounded-full flex items-center justify-center mb-3 text-white text-xl font-black group-hover:scale-110 transition">{{ $i }}</div>
                <h3 class="text-white font-bold mb-1">Kelas {{ $i }}</h3>
                <p class="text-gray-500 text-[10px]">{{ $i <= 3 ? 'Kelas Rendah' : 'Kelas Tinggi' }}</p>
            </div>
            @endfor
        </div>
    </div>
</section>

{{-- Fitur Belajar --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-gamepad text-blue-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Gamifikasi</h3>
            <p class="text-gray-400 text-xs">Belajar dengan game interaktif dan kuis seru</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-robot text-cyan-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">AI Tutor</h3>
            <p class="text-gray-400 text-xs">Asisten AI yang membantu menjawab pertanyaan</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-video text-green-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Video Interaktif</h3>
            <p class="text-gray-400 text-xs">Video pembelajaran dengan kuis di dalamnya</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-trophy text-yellow-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Kompetisi</h3>
            <p class="text-gray-400 text-xs">Olimpiade dan lomba antar sekolah</p>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-blue-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">500+</div><p class="text-gray-400 text-sm mt-1">Materi Pelajaran</p></div>
        <div><div class="text-3xl font-black teks-gradien">200+</div><p class="text-gray-400 text-sm mt-1">Video Interaktif</p></div>
        <div><div class="text-3xl font-black teks-gradien">1,000+</div><p class="text-gray-400 text-sm mt-1">Soal Latihan</p></div>
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Game Edukatif</p></div>
    </div>
</section>

{{-- Kurikulum per Fase --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Kurikulum Merdeka per Fase</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Pembelajaran terstruktur sesuai tahap perkembangan siswa</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $fase = [
            ['Fase A', 'Kelas 1-2', 'Literasi & numerasi awal. Mengenal huruf, angka, membaca permulaan, penjumlahan & pengurangan sederhana.', 'fa-seedling', 'from-green-500 to-emerald-500', 'border-green-500/20'],
            ['Fase B', 'Kelas 3-4', 'Membaca kritis, perkalian & pembagian, IPA dasar, IPS pengenalan lingkungan, dan seni budaya.', 'fa-leaf', 'from-blue-500 to-cyan-500', 'border-blue-500/20'],
            ['Fase C', 'Kelas 5-6', 'Berpikir analitis, pecahan & desimal, metode ilmiah, sejarah Indonesia, dan proyek kolaboratif.', 'fa-tree', 'from-purple-500 to-violet-500', 'border-purple-500/20'],
        ];
        @endphp
        @foreach($fase as $idx => $f)
        <div class="kaca rounded-2xl p-6 {{ $f[5] }} hover:border-opacity-60 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $f[4] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $f[3] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $f[0] }}</h3>
            <p class="text-blue-300 text-xs mb-3 font-semibold">{{ $f[1] }}</p>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $f[2] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Proyek P5 --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Proyek Penguatan Profil Pelajar Pancasila (P5)</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Pembelajaran berbasis proyek untuk membangun karakter siswa</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $p5 = [
                ['Gaya Hidup Berkelanjutan', 'Proyek daur ulang, hemat energi, dan cinta lingkungan sekitar.', 'fa-recycle', 'text-green-400'],
                ['Kearifan Lokal', 'Eksplorasi budaya daerah, cerita rakyat, dan tradisi Nusantara.', 'fa-landmark', 'text-yellow-400'],
                ['Bhinneka Tunggal Ika', 'Menghargai keberagaman suku, agama, dan budaya Indonesia.', 'fa-hands-helping', 'text-blue-400'],
                ['Bangunlah Jiwa & Raganya', 'Olahraga, nutrisi sehat, dan kesehatan mental anak.', 'fa-heartbeat', 'text-red-400'],
                ['Suara Demokrasi', 'Musyawarah kelas, pemilihan ketua, dan hak & kewajiban warga.', 'fa-bullhorn', 'text-purple-400'],
                ['Kewirausahaan', 'Market day sederhana, kreativitas produk, dan kerja tim.', 'fa-store', 'text-orange-400'],
            ];
            @endphp
            @foreach($p5 as $idx => $p)
            <div class="kaca rounded-2xl p-5 hover:border-blue-500/20 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <i class="fas {{ $p[2] }} {{ $p[3] }} text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">{{ $p[0] }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $p[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Ekstrakurikuler --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Ekstrakurikuler Unggulan</h2>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
        @php
        $ekskul = [
            ['Pramuka', 'fa-campground', 'text-yellow-400'],
            ['Robotika', 'fa-robot', 'text-cyan-400'],
            ['Seni Tari', 'fa-music', 'text-pink-400'],
            ['English Club', 'fa-globe', 'text-blue-400'],
            ['Coding Kids', 'fa-laptop-code', 'text-green-400'],
            ['Olahraga', 'fa-futbol', 'text-orange-400'],
            ['Seni Rupa', 'fa-palette', 'text-purple-400'],
            ['Jurnalistik', 'fa-newspaper', 'text-red-400'],
        ];
        @endphp
        @foreach($ekskul as $idx => $e)
        <div class="kaca rounded-xl p-4 text-center hover:border-blue-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <i class="fas {{ $e[1] }} {{ $e[2] }} text-xl mb-2"></i>
            <p class="text-white text-sm font-semibold">{{ $e[0] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Video Pembelajaran --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Video Pengenalan Program</h2>
        <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SD/MI belajar interaktif di KVT Hub</p>
        <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
            <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                <div class="text-center">
                    <i class="fas fa-play-circle text-blue-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                    <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SD/MI KVT Hub</p>
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
            ['Siswa', 'fa-user-graduate', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                'Materi interaktif dengan gamifikasi seru',
                'Kuis & latihan soal otomatis terkoreksi',
                'Dashboard pencapaian & koleksi badge',
                'AI Tutor untuk bantuan belajar 24/7',
            ]],
            ['Guru / Pendidik', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                'Bank soal & modul ajar siap pakai',
                'Dashboard nilai & progres siswa lengkap',
                'Tools pembuatan kuis interaktif mudah',
                'Komunitas guru SD/MI se-Indonesia',
            ]],
            ['Orang Tua / Admin', 'fa-user-tie', 'from-purple-500 to-violet-500', 'border-purple-500/20', [
                'Laporan perkembangan anak berkala',
                'Monitoring aktivitas belajar real-time',
                'Notifikasi tugas & pencapaian anak',
                'Konsultasi online dengan guru kelas',
            ]],
        ];
        @endphp
        @foreach($roles as $idx => $r)
        <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
            <ul class="space-y-2">
                @foreach($r[4] as $fitur)
                <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-blue-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
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
            ['Apakah materi sesuai Kurikulum Merdeka?', 'Ya, seluruh materi SD/MI di KVT Hub disusun berdasarkan Capaian Pembelajaran (CP) Kurikulum Merdeka Fase A, B, dan C yang diterbitkan oleh Kemendikbudristek.'],
            ['Bagaimana sistem penilaian belajar siswa?', 'Kami menggunakan asesmen formatif & sumatif. Siswa mengerjakan kuis, proyek, dan latihan soal. Hasil otomatis terangkum di dashboard guru dan orang tua.'],
            ['Apakah ada fitur belajar offline?', 'Beberapa materi dan video dapat diunduh untuk belajar offline. Fitur ini tersedia pada paket langganan premium KVT Hub.'],
            ['Berapa biaya langganan untuk siswa SD?', 'KVT Hub menyediakan akses gratis untuk materi dasar. Paket premium dengan fitur lengkap tersedia mulai dari Rp 49.000/bulan.'],
            ['Apakah ada program persiapan olimpiade?', 'Ya, kami menyediakan program persiapan Olimpiade Sains Nasional (OSN) untuk siswa kelas 4-6 di bidang Matematika dan IPA.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-blue-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-blue-400 text-xs group-open:rotate-180 transition-transform"></i>
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
        <div class="kaca rounded-3xl p-10 border-blue-500/20" data-aos="zoom-in">
            <i class="fas fa-book-open text-blue-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Perjalanan Belajar SD/MI!</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bangun fondasi kuat untuk masa depan anak Anda dengan materi interaktif dan metode belajar yang menyenangkan.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-cyan-500 hover:from-blue-400 hover:to-cyan-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-blue-500/20">
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
