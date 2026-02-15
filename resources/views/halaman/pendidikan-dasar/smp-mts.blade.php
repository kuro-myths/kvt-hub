@extends('tata-letak.utama')
@section('judul', 'SMP / MTs - Kelas 7-9 - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-green-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(34,197,94,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(16,185,129,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-green-800/30 border border-green-600/30 rounded-full px-4 py-1.5 text-xs text-green-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book"></i> Pendidikan Menengah Pertama - Kelas 7-9
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">SMP / </span><span class="teks-gradien">MTs</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kembangkan kemampuan berpikir kritis, analitis, dan kreatif. Matematika, IPA, IPS, bahasa, dan persiapan menuju jenjang SMA/SMK.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-400 hover:to-emerald-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-green-500/20">
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
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Mata Pelajaran SMP / MTs</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Kurikulum komprehensif untuk mengembangkan kompetensi siswa</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5" data-aos="fade-right" data-aos-delay="200">
        @php
        $mapel = [
            ['Matematika', 'Aljabar, geometri, statistika, dan penalaran logis.', 'fa-square-root-alt', 'from-blue-500 to-indigo-500'],
            ['IPA Terpadu', 'Fisika, kimia, biologi terintegrasi dengan eksperimen virtual.', 'fa-microscope', 'from-green-500 to-emerald-500'],
            ['IPS Terpadu', 'Sejarah, geografi, ekonomi, dan sosiologi dasar.', 'fa-globe-americas', 'from-yellow-500 to-amber-500'],
            ['Bahasa Indonesia', 'Teks prosedur, eksposisi, persuasi, dan sastra Indonesia.', 'fa-pen-fancy', 'from-red-500 to-pink-500'],
            ['Bahasa Inggris', 'Grammar, reading, writing, speaking, dan TOEFL prep.', 'fa-language', 'from-cyan-500 to-blue-500'],
            ['Informatika', 'Algoritma, pemrograman dasar, dan literasi digital.', 'fa-laptop-code', 'from-purple-500 to-violet-500'],
            ['Seni Budaya', 'Seni rupa, musik, tari, dan teater. Apresiasi budaya lokal.', 'fa-music', 'from-pink-500 to-rose-500'],
            ['Prakarya', 'Kerajinan, rekayasa, budidaya, dan pengolahan.', 'fa-tools', 'from-orange-500 to-red-500'],
        ];
        @endphp
        @foreach($mapel as $m)
        <div class="kaca rounded-2xl p-5 hover:border-green-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $m[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $m[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $m[0] }}</h3>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $m[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Persiapan --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Persiapan & Kompetisi</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-left" data-aos-delay="100">
            <div class="kaca rounded-2xl p-6 border-green-500/20 hover:border-green-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-file-alt text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Persiapan ASPD</h3>
                <p class="text-gray-400 text-sm mb-4">Asesmen Standarisasi Pendidikan Daerah. Latihan soal dan simulasi ujian untuk persiapan optimal.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Bank Soal 5,000+</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Simulasi CBT</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Pembahasan Detail</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-6 border-yellow-500/20 hover:border-yellow-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-trophy text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">Olimpiade Sains</h3>
                <p class="text-gray-400 text-sm mb-4">Persiapan OSN tingkat kabupaten, provinsi, dan nasional. Materi intensif dari pelatih berpengalaman.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-yellow-400 mr-2"></i>Matematika & IPA</li>
                    <li><i class="fas fa-check text-yellow-400 mr-2"></i>Informatika/Komputer</li>
                    <li><i class="fas fa-check text-yellow-400 mr-2"></i>Soal Tahun Sebelumnya</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition group">
                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-robot text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">AI Tutor</h3>
                <p class="text-gray-400 text-sm mb-4">Teman belajar AI yang menjawab pertanyaan 24/7. Penjelasan step-by-step dan adaptif.</p>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><i class="fas fa-check text-blue-400 mr-2"></i>Jawab PR Instan</li>
                    <li><i class="fas fa-check text-blue-400 mr-2"></i>Penjelasan Visual</li>
                    <li><i class="fas fa-check text-blue-400 mr-2"></i>Multi-Bahasa</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-green-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">800+</div><p class="text-gray-400 text-sm mt-1">Materi Pelajaran</p></div>
        <div><div class="text-3xl font-black teks-gradien">5,000+</div><p class="text-gray-400 text-sm mt-1">Bank Soal</p></div>
        <div><div class="text-3xl font-black teks-gradien">100+</div><p class="text-gray-400 text-sm mt-1">Lab Virtual</p></div>
        <div><div class="text-3xl font-black teks-gradien">50+</div><p class="text-gray-400 text-sm mt-1">Guru Ahli</p></div>
    </div>
</section>

{{-- Ekstrakurikuler --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Ekstrakurikuler & Pengembangan Diri</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Kembangkan bakat dan minat di luar akademik</p>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
        @php
        $ekskul = [
            ['OSIS & Kepemimpinan', 'fa-users-cog', 'text-blue-400'],
            ['Pramuka', 'fa-campground', 'text-yellow-400'],
            ['KIR (Karya Ilmiah)', 'fa-flask', 'text-cyan-400'],
            ['English Debate', 'fa-comments', 'text-green-400'],
            ['Robotika & Coding', 'fa-robot', 'text-purple-400'],
            ['Jurnalistik', 'fa-newspaper', 'text-red-400'],
            ['Olahraga & Futsal', 'fa-futbol', 'text-orange-400'],
            ['Seni Musik & Band', 'fa-guitar', 'text-pink-400'],
        ];
        @endphp
        @foreach($ekskul as $idx => $e)
        <div class="kaca rounded-xl p-4 text-center hover:border-green-500/20 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <i class="fas {{ $e[1] }} {{ $e[2] }} text-xl mb-2"></i>
            <p class="text-white text-sm font-semibold">{{ $e[0] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Tips ASPD --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div data-aos="fade-right">
                <h2 class="text-3xl font-bold text-white mb-4">Tips Sukses ASPD & Ujian</h2>
                <p class="text-gray-400 mb-6 leading-relaxed">Asesmen Standarisasi Pendidikan Daerah (ASPD) menjadi tolok ukur kesiapan siswa SMP/MTs. Persiapkan dengan strategi yang tepat bersama KVT Hub.</p>
                <ul class="space-y-3 text-gray-300 text-sm">
                    <li><i class="fas fa-check-circle text-green-400 mr-2"></i>Latihan soal harian dengan pembahasan step-by-step</li>
                    <li><i class="fas fa-check-circle text-green-400 mr-2"></i>Simulasi CBT (Computer Based Test) mirip ujian asli</li>
                    <li><i class="fas fa-check-circle text-green-400 mr-2"></i>Analisis kelemahan & rekomendasi belajar personal</li>
                    <li><i class="fas fa-check-circle text-green-400 mr-2"></i>Try out berkala dengan ranking nasional</li>
                    <li><i class="fas fa-check-circle text-green-400 mr-2"></i>Materi ringkasan & cheat sheet per mata pelajaran</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="fade-left">
                <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
                    <div class="text-center">
                        <i class="fas fa-play-circle text-green-400 text-5xl mb-3 hover:scale-110 transition cursor-pointer"></i>
                        <p class="text-gray-400 text-sm">Video: Strategi Sukses ASPD</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Video Pembelajaran --}}
<section class="max-w-5xl mx-auto px-4 py-16 text-center">
    <h2 class="text-3xl font-bold text-white mb-4" data-aos="fade-up">Video Pengenalan Program</h2>
    <p class="text-gray-400 mb-8" data-aos="fade-up" data-aos-delay="100">Lihat bagaimana siswa SMP/MTs belajar interaktif di KVT Hub</p>
    <div class="kaca rounded-2xl p-2 overflow-hidden" data-aos="zoom-in" data-aos-delay="200">
        <div class="aspect-video bg-kvt-900 rounded-xl flex items-center justify-center">
            <div class="text-center">
                <i class="fas fa-play-circle text-green-400 text-6xl mb-4 hover:scale-110 transition cursor-pointer"></i>
                <p class="text-gray-500 text-sm">Klik untuk memutar video pengenalan SMP/MTs KVT Hub</p>
            </div>
        </div>
    </div>
</section>

{{-- Fitur per Role --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $roles = [
                ['Siswa', 'fa-user-graduate', 'from-green-500 to-emerald-500', 'border-green-500/20', [
                    'Materi lengkap 8 mata pelajaran wajib',
                    'Latihan soal ASPD & simulasi CBT',
                    'Dashboard progres belajar & ranking',
                    'AI Tutor 24/7 untuk tanya jawab PR',
                ]],
                ['Guru / Pendidik', 'fa-chalkboard-teacher', 'from-blue-500 to-cyan-500', 'border-blue-500/20', [
                    'Bank soal & RPP siap pakai per mapel',
                    'Dashboard analitik kelas real-time',
                    'Tools penilaian otomatis & rubrik',
                    'Forum diskusi guru SMP se-Indonesia',
                ]],
                ['Orang Tua / Admin', 'fa-user-tie', 'from-purple-500 to-violet-500', 'border-purple-500/20', [
                    'Laporan akademik anak berkala',
                    'Monitoring kehadiran & aktivitas belajar',
                    'Notifikasi nilai ujian & tugas',
                    'Konsultasi online dengan wali kelas',
                ]],
            ];
            @endphp
            @foreach($roles as $idx => $r)
            <div class="kaca rounded-2xl p-6 {{ $r[3] }} hover:border-opacity-60 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br {{ $r[2] }} rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $r[1] }} text-white text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-3">{{ $r[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($r[4] as $fitur)
                    <li class="text-gray-400 text-sm flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5 text-xs"></i>{{ $fitur }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="py-16">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Pertanyaan Umum (FAQ)</h2>
        @php
        $faq = [
            ['Apakah materi mencakup semua mata pelajaran SMP?', 'Ya, KVT Hub menyediakan materi lengkap untuk 8 mata pelajaran wajib SMP/MTs sesuai Kurikulum Merdeka Fase D, termasuk Matematika, IPA Terpadu, IPS Terpadu, Bahasa Indonesia, Bahasa Inggris, Informatika, Seni Budaya, dan Prakarya.'],
            ['Bagaimana persiapan ASPD di KVT Hub?', 'Kami menyediakan bank soal 5,000+ butir, simulasi CBT, dan try out berkala dengan ranking nasional. Setiap soal dilengkapi pembahasan detail step-by-step untuk membantu siswa memahami konsep.'],
            ['Apakah ada program Olimpiade Sains?', 'Ya, tersedia program khusus persiapan OSN bidang Matematika, IPA, Informatika, dan Bahasa Inggris. Materi disusun oleh pelatih olimpiade berpengalaman tingkat nasional.'],
            ['Bagaimana cara guru memantau siswa?', 'Guru mendapat dashboard analitik lengkap yang menampilkan progres belajar, nilai kuis, kehadiran, dan area kelemahan setiap siswa secara real-time.'],
            ['Apakah orang tua bisa melihat nilai anak?', 'Tentu, orang tua mendapat akses ke laporan akademik berkala, notifikasi nilai ujian, dan bisa berkonsultasi langsung dengan wali kelas melalui fitur chat.'],
        ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $idx => $f)
            <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <summary class="flex items-center justify-between p-5 cursor-pointer text-white font-semibold text-sm hover:text-green-300 transition">
                    {{ $f[0] }}
                    <i class="fas fa-chevron-down text-green-400 text-xs group-open:rotate-180 transition-transform"></i>
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
        <div class="kaca rounded-3xl p-10 border-green-500/20" data-aos="zoom-in">
            <i class="fas fa-book text-green-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Siap Raih Prestasi di SMP/MTs?</h2>
            <p class="text-gray-400 mb-8 max-w-xl mx-auto">Bergabunglah sekarang dan kuasai materi SMP dengan metode belajar interaktif, AI Tutor, dan persiapan ASPD terlengkap.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-400 hover:to-emerald-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-green-500/20">
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
