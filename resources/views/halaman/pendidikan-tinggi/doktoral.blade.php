@extends('tata-letak.utama')
@section('judul', 'Doktoral (S3/PhD) - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 50%, rgba(239,68,68,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 50%, rgba(236,72,153,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-atom"></i> Program Doktoral - 3-5 Tahun
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Doktoral </span><span class="teks-gradien">(S3/PhD)</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Riset orisinal dan kontribusi baru pada ilmu pengetahuan. Bimbingan profesor internasional, disertasi, jurnal Q1, dan konferensi global.
        </p>
        <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-400 hover:to-pink-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-red-500/20">
                <i class="fas fa-rocket mr-2"></i>Apply Now
            </a>
            <a href="{{ route('halaman.jenjang') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                <i class="fas fa-arrow-left mr-2"></i>Semua Jenjang
            </a>
        </div>
    </div>
</section>

{{-- Alur Doktoral & Panduan Disertasi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Alur Program Doktoral</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Panduan lengkap dari coursework hingga sidang disertasi terbuka</p>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4" data-aos="fade-left" data-aos-delay="200">
        @php
        $alur = [
            ['Coursework', 'fa-book', 'text-blue-400', 'Mata kuliah lanjutan & qualifying exam'],
            ['Proposal', 'fa-file-alt', 'text-green-400', 'Proposal disertasi & review komite'],
            ['Riset', 'fa-flask', 'text-purple-400', 'Riset mandiri dengan bimbingan promotor'],
            ['Publikasi', 'fa-newspaper', 'text-orange-400', 'Jurnal internasional Q1-Q2 min. 2 paper'],
            ['Disertasi', 'fa-award', 'text-yellow-400', 'Penulisan, sidang terbuka & wisuda'],
        ];
        @endphp
        @foreach($alur as $i => $a)
        <div class="text-center">
            <div class="w-14 h-14 mx-auto bg-kvt-800/50 rounded-full flex items-center justify-center border border-kvt-700/30 mb-3">
                <i class="fas {{ $a[1] }} {{ $a[2] }} text-xl"></i>
            </div>
            <h4 class="text-white font-semibold text-sm mb-1">{{ $a[0] }}</h4>
            <p class="text-gray-500 text-[10px]">{{ $a[3] }}</p>
            @if($i < 4)<div class="hidden md:block text-kvt-600 mt-3"><i class="fas fa-arrow-right"></i></div>@endif
        </div>
        @endforeach
    </div>
</section>

{{-- Bidang Riset --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Bidang Riset Fokus</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Area riset unggulan dengan dampak global dan kolaborasi internasional</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
            @php
            $riset = [
                ['Artificial Intelligence', 'Deep learning, NLP, reinforcement learning, dan AGI.', 'fa-brain', 'from-blue-500 to-indigo-500'],
                ['Quantum Computing', 'Quantum algorithms, error correction, dan quantum ML.', 'fa-atom', 'from-purple-500 to-violet-500'],
                ['Biotechnology', 'CRISPR, genomics, synthetic biology, dan drug discovery.', 'fa-dna', 'from-green-500 to-emerald-500'],
                ['Climate Science', 'Climate modeling, carbon capture, dan renewable energy.', 'fa-globe', 'from-cyan-500 to-teal-500'],
                ['Materials Science', 'Nanomaterials, metamaterials, dan superconductors.', 'fa-cube', 'from-orange-500 to-red-500'],
                ['Neuroscience', 'Brain-computer interface, cognitive science, dan neuroimaging.', 'fa-brain', 'from-pink-500 to-rose-500'],
            ];
            @endphp
            @foreach($riset as $r)
            <div class="kaca rounded-2xl p-6 hover:border-red-500/30 transition-all duration-300 group hover:-translate-y-1">
                <div class="w-12 h-12 bg-gradient-to-br {{ $r[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $r[2] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $r[0] }}</h3>
                <p class="text-gray-400 text-sm">{{ $r[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Persyaratan Publikasi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-down">Persyaratan Publikasi</h2>
    <p class="text-gray-400 text-center mb-12" data-aos="fade-down" data-aos-delay="100">Standar publikasi internasional untuk kandidat doktoral</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in" data-aos-delay="200">
        @php
        $publikasi = [
            ['Jurnal Q1-Q2', 'Minimal 2 paper di jurnal terindeks Scopus/WoS quartile 1-2.', 'fa-journal-whills', 'text-red-400'],
            ['Konferensi Internasional', 'Presentasi di minimal 1 konferensi internasional bereputasi.', 'fa-globe-americas', 'text-blue-400'],
            ['H-Index Target', 'Membangun profil akademik dengan target h-index di Google Scholar.', 'fa-chart-line', 'text-green-400'],
            ['Open Access', 'Didorong untuk publikasi open-access agar riset berdampak luas.', 'fa-unlock-alt', 'text-yellow-400'],
        ];
        @endphp
        @foreach($publikasi as $pub)
        <div class="kaca rounded-2xl p-5 text-center hover:border-red-500/20 transition">
            <i class="fas {{ $pub[2] }} {{ $pub[3] }} text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">{{ $pub[0] }}</h3>
            <p class="text-gray-400 text-xs">{{ $pub[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Beasiswa & Funding --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Beasiswa & Pendanaan</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="zoom-in">
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-graduation-cap text-yellow-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">LPDP</h3>
                <p class="text-gray-400 text-xs">Beasiswa pemerintah Indonesia full-funded</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-globe text-blue-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">Fulbright</h3>
                <p class="text-gray-400 text-xs">Beasiswa S3 ke universitas di Amerika</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-university text-green-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">DAAD</h3>
                <p class="text-gray-400 text-xs">Beasiswa riset doktoral di Jerman</p>
            </div>
            <div class="kaca rounded-2xl p-5 text-center">
                <i class="fas fa-money-bill-wave text-purple-400 text-2xl mb-3"></i>
                <h3 class="text-white font-bold mb-1">KVT Research Grant</h3>
                <p class="text-gray-400 text-xs">Hibah riset internal hingga $50,000</p>
            </div>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-red-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">40+</div><p class="text-gray-400 text-sm mt-1">Program Doktoral</p></div>
        <div><div class="text-3xl font-black teks-gradien">500+</div><p class="text-gray-400 text-sm mt-1">Disertasi/Tahun</p></div>
        <div><div class="text-3xl font-black teks-gradien">75+</div><p class="text-gray-400 text-sm mt-1">Negara Kolaborator</p></div>
        <div><div class="text-3xl font-black teks-gradien">$5M+</div><p class="text-gray-400 text-sm mt-1">Dana Riset/Tahun</p></div>
    </div>
</section>

{{-- Video --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="text-center mb-10">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Kehidupan Kandidat Doktoral</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Pengalaman riset, konferensi internasional, dan perjalanan akademik PhD</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden aspect-video" data-aos="zoom-in" data-aos-delay="200">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Program Doktoral KVT Hub" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</section>

{{-- Peran Pengguna (Siswa / Guru / Admin) --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-down">Fitur untuk Setiap Peran</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-up" data-aos-delay="100">
            @php
            $peran = [
                ['Kandidat Doktoral', 'fa-user-graduate', 'from-red-500 to-pink-500', [
                    'Portal disertasi & manajemen referensi',
                    'Tracking publikasi & sitasi otomatis',
                    'Jadwal bimbingan promotor online',
                    'Akses database riset global 24/7',
                ]],
                ['Promotor / Profesor', 'fa-chalkboard-teacher', 'from-green-500 to-emerald-500', [
                    'Dashboard bimbingan kandidat PhD',
                    'Co-authoring & review paper digital',
                    'Manajemen lab riset & asisten',
                    'Kolaborasi internasional terfasilitasi',
                ]],
                ['Admin Graduate School', 'fa-user-shield', 'from-blue-500 to-indigo-500', [
                    'Analitik output riset program doktoral',
                    'Manajemen sidang & qualifying exam',
                    'Laporan akreditasi & ranking global',
                    'Pengelolaan beasiswa & research grant',
                ]],
            ];
            @endphp
            @foreach($peran as $p)
            <div class="kaca rounded-2xl p-6 hover:border-red-500/30 transition">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[2] }} rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $p[1] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-4">{{ $p[0] }}</h3>
                <ul class="space-y-2">
                    @foreach($p[3] as $fitur)
                    <li class="flex items-start gap-2 text-sm text-gray-400">
                        <i class="fas fa-check-circle text-red-400 mt-0.5 shrink-0"></i>{{ $fitur }}
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
            ['Berapa lama masa studi S3?', 'Program doktoral umumnya ditempuh dalam 3-5 tahun. Tahun pertama fokus coursework dan qualifying exam, tahun 2-4 untuk riset dan publikasi, dan tahun terakhir untuk penulisan dan sidang disertasi.'],
            ['Apa persyaratan publikasi untuk lulus S3?', 'Kandidat doktoral wajib mempublikasikan minimal 2 paper di jurnal internasional terindeks Scopus/Web of Science (Q1-Q2) dan presentasi di minimal 1 konferensi internasional bereputasi.'],
            ['Bagaimana sistem bimbingan disertasi?', 'Setiap kandidat memiliki tim promotor terdiri dari 1 promotor utama dan 1-2 ko-promotor. Bimbingan dilakukan minimal 2x/bulan dengan progress seminar setiap semester di hadapan komite.'],
            ['Apakah bisa S3 sambil bekerja?', 'Beberapa program menawarkan jalur part-time dengan durasi lebih lama (5-7 tahun). Namun, disarankan full-time untuk fokus riset maksimal terutama di tahun riset dan penulisan.'],
            ['Bagaimana mendapatkan pendanaan riset?', 'Tersedia beasiswa LPDP, Fulbright, DAAD, dan KVT Research Grant. Kandidat juga bisa mengajukan hibah riset dari Kemendikbud, BRIN, atau lembaga internasional lainnya.'],
        ];
        @endphp
        @foreach($faq as $f)
        <details class="kaca rounded-xl group">
            <summary class="flex items-center justify-between cursor-pointer p-5 text-white font-semibold hover:text-red-400 transition">
                <span>{{ $f[0] }}</span>
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm leading-relaxed">{{ $f[1] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-red-900/20 to-kvt-900/40 py-16">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="kaca rounded-2xl p-10">
            <i class="fas fa-atom text-red-400 text-4xl mb-4"></i>
            <h2 class="text-3xl font-bold text-white mb-4">Kontribusi untuk Ilmu Pengetahuan</h2>
            <p class="text-gray-400 mb-8">Jadilah peneliti kelas dunia. Bergabung dengan program doktoral dan ciptakan penemuan yang mengubah dunia!</p>
            <div class="flex justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-red-500 to-pink-500 hover:from-red-400 hover:to-pink-400 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-red-500/20">
                    <i class="fas fa-rocket mr-2"></i>Apply Now
                </a>
                <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-white px-8 py-3 rounded-xl font-semibold transition border border-kvt-700/30">
                    <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
