@extends('tata-letak.utama')
@section('judul', 'Publikasi Ilmiah - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #8B5CF6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book-open"></i> Jurnal & Paper Ilmiah
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Publikasi</span><br>
            <span class="teks-gradien">Ilmiah</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Akses dan publikasikan karya ilmiah di jurnal nasional, internasional, prosiding konferensi, dan repositori institusi.
            Dilengkapi tools AI untuk penulisan akademik dan pelacakan sitasi.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-400 hover:to-purple-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-blue-500/30 hover:-translate-y-0.5">
                <i class="fas fa-pen-fancy mr-2"></i>Submit Paper
            </a>
            <a href="#kategori" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-search mr-2"></i>Cari Jurnal
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">2,400+</div><div class="text-xs text-gray-500">Paper</div></div>
            <div><div class="text-2xl font-black text-white">1,700+</div><div class="text-xs text-gray-500">Jurnal</div></div>
            <div><div class="text-2xl font-black text-white">15K+</div><div class="text-xs text-gray-500">Sitasi</div></div>
            <div><div class="text-2xl font-black text-white">AI</div><div class="text-xs text-gray-500">Proofreading</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI PUBLIKASI --}}
<section id="kategori" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">CATEGORIES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Publikasi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Empat jalur publikasi utama untuk karya ilmiah Anda</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
        $kategori = [
            ['Jurnal Nasional', 'Jurnal terakreditasi SINTA 1-6. Terindeks Garuda, Google Scholar, dan DOAJ.', 'fa-flag', 'from-red-500 to-pink-500', '1,200+ jurnal'],
            ['Jurnal Internasional', 'Jurnal Q1-Q4 Scopus, Web of Science, IEEE, ACM, Springer, dan Elsevier.', 'fa-globe', 'from-blue-500 to-indigo-500', '500+ jurnal'],
            ['Prosiding Konferensi', 'Paper dari konferensi nasional dan internasional. IEEE, ACM, dan Springer.', 'fa-users', 'from-green-500 to-emerald-500', '200+ event'],
            ['Repositori Institusi', 'Skripsi, tesis, disertasi, dan karya ilmiah dari universitas mitra.', 'fa-database', 'from-yellow-500 to-amber-500', '50K+ karya'],
        ];
        @endphp
        @foreach($kategori as $i => $k)
        <div class="kaca rounded-2xl p-6 hover:border-purple-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $k[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $k[2] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full border border-purple-500/20">{{ $k[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-purple-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">2,400+</div><p class="text-gray-400 text-sm mt-1">Karya Terpublikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">1,700+</div><p class="text-gray-400 text-sm mt-1">Jurnal Partner</p></div>
        <div><div class="text-3xl font-black teks-gradien">15K+</div><p class="text-gray-400 text-sm mt-1">Total Sitasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">92%</div><p class="text-gray-400 text-sm mt-1">Acceptance Rate</p></div>
    </div>
</section>

{{-- PAPER TERBARU --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">RECENT PAPERS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Publikasi Terbaru</h2>
    </div>
    @php
    $papers = [
        ['judul' => 'Deep Reinforcement Learning for Autonomous Navigation in Dynamic Environments', 'penulis' => 'Dr. Rina Sari, Prof. Budi H.', 'jurnal' => 'IEEE Transactions on AI', 'tahun' => '2026', 'sitasi' => 48, 'warna' => 'blue', 'quartil' => 'Q1'],
        ['judul' => 'Quantum-Resistant Blockchain Protocol for Secure IoT Communications', 'penulis' => 'Dr. Budi Hartono et al.', 'jurnal' => 'ACM Computing Surveys', 'tahun' => '2025', 'sitasi' => 73, 'warna' => 'purple', 'quartil' => 'Q1'],
        ['judul' => 'CRISPR-Cas9 Gene Editing untuk Resistensi Penyakit Tanaman Padi', 'penulis' => 'Prof. Mega Putri, Dr. Andi W.', 'jurnal' => 'Nature Biotechnology', 'tahun' => '2025', 'sitasi' => 112, 'warna' => 'green', 'quartil' => 'Q1'],
        ['judul' => 'Perovskite Solar Cells with 28% Efficiency Using Novel Hole Transport Layer', 'penulis' => 'Dr. Fajar Rahman et al.', 'jurnal' => 'Advanced Energy Materials', 'tahun' => '2026', 'sitasi' => 35, 'warna' => 'amber', 'quartil' => 'Q1'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($papers as $i => $p)
        <div class="kaca rounded-2xl p-6 hover:border-{{ $p['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-{{ $p['warna'] }}-500/10 rounded-lg flex items-center justify-center flex-shrink-0 border border-{{ $p['warna'] }}-500/20">
                    <i class="fas fa-file-alt text-{{ $p['warna'] }}-400"></i>
                </div>
                <div class="flex-1">
                    <h3 class="text-white font-bold text-sm mb-1 group-hover:text-{{ $p['warna'] }}-300 transition">{{ $p['judul'] }}</h3>
                    <p class="text-gray-500 text-xs mb-2">{{ $p['penulis'] }}</p>
                    <div class="flex flex-wrap items-center gap-3 text-xs">
                        <span class="text-{{ $p['warna'] }}-400"><i class="fas fa-journal-whills mr-1"></i>{{ $p['jurnal'] }}</span>
                        <span class="bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full border border-green-500/20">{{ $p['quartil'] }}</span>
                        <span class="text-gray-500"><i class="fas fa-calendar mr-1"></i>{{ $p['tahun'] }}</span>
                        <span class="text-yellow-400"><i class="fas fa-quote-right mr-1"></i>{{ $p['sitasi'] }} sitasi</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PENERBITAN --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">TOOLS</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Penerbitan</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tools lengkap untuk membantu proses penulisan hingga publikasi</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $fiturPublish = [
                ['Template Jurnal', 'Template LaTeX dan Word sesuai format jurnal target. APA, IEEE, ACM, Springer.', 'fa-file-word', 'from-blue-500 to-indigo-500'],
                ['Plagiarism Check', 'Pengecekan plagiarisme otomatis dengan Turnitin & iThenticate terintegrasi.', 'fa-search', 'from-green-500 to-emerald-500'],
                ['Proofreading AI', 'AI proofreader untuk grammar, academic English, dan style consistency.', 'fa-language', 'from-purple-500 to-violet-500'],
                ['Citation Tracker', 'Lacak sitasi, h-index, i10-index, dan impact factor karya ilmiah Anda.', 'fa-chart-line', 'from-orange-500 to-red-500'],
                ['Reference Manager', 'Kelola daftar referensi dengan format BibTeX, RIS, dan EndNote otomatis.', 'fa-bookmark', 'from-teal-500 to-cyan-500'],
                ['Peer Review System', 'Sistem review double-blind terintegrasi dengan feedback terstruktur.', 'fa-users-cog', 'from-pink-500 to-rose-500'],
                ['DOI Registration', 'Pendaftaran DOI (Digital Object Identifier) otomatis untuk setiap publikasi.', 'fa-fingerprint', 'from-indigo-500 to-blue-500'],
                ['Open Access Option', 'Opsi publikasi open access dengan Creative Commons licensing.', 'fa-unlock-alt', 'from-amber-500 to-yellow-500'],
            ];
            @endphp
            @foreach($fiturPublish as $i => $fp)
            <div class="kaca rounded-2xl p-5 text-center hover:border-blue-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                <div class="w-12 h-12 mx-auto bg-gradient-to-br {{ $fp[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $fp[2] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-1">{{ $fp[0] }}</h3>
                <p class="text-gray-400 text-xs">{{ $fp[1] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tutorial Penulisan Ilmiah</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Menulis Abstract yang Efektif', 'durasi' => '10:35', 'views' => '41K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Writing+Abstract'],
            ['judul' => 'Literature Review Systematic', 'durasi' => '16:42', 'views' => '35K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Literature+Review'],
            ['judul' => 'Submit Paper ke Scopus Q1', 'durasi' => '22:10', 'views' => '58K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Scopus+Submission'],
        ];
        @endphp
        @foreach($videos as $v)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-xl ml-1"></i></div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h4 class="text-white font-bold text-sm mb-1">{{ $v['judul'] }}</h4>
                <p class="text-gray-500 text-xs"><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-blue-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Sesuai Peran Anda</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Mahasiswa / Peneliti', 'fitur' => ['Submit paper ke jurnal terakreditasi', 'Akses plagiarism checker & AI proofreader', 'Download template LaTeX & Word', 'Lacak sitasi & h-index pribadi', 'Akses jurnal premium & database', 'Dapatkan DOI untuk setiap paper']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Dosen / Reviewer', 'fitur' => ['Review paper sebagai peer reviewer', 'Co-author & supervisi mahasiswa', 'Akses editorial dashboard', 'Buat special issue & call for papers', 'Kelola reference manager tim', 'Mentor penulisan akademik']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin Publikasi', 'fitur' => ['Kelola semua submission & review', 'Dashboard analytics publikasi', 'Konfigurasi jurnal & prosiding', 'Monitor compliance & etika', 'Laporan bibliometrik berkala', 'Kelola DOI & indexing']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($roles as $r)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $r['gradien'] }} p-6 text-center">
                    <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $r['ikon'] }} text-white text-2xl"></i></div>
                    <h3 class="text-white font-bold text-xl">{{ $r['peran'] }}</h3>
                </div>
                <div class="p-6 space-y-3">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $r['warna'] }}-400 text-xs mt-1"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Bagaimana cara submit paper di KVT Hub?', 'a' => 'Upload manuscript melalui dashboard publikasi, pilih jurnal target, dan ikuti panduan format. Sistem akan otomatis memeriksa plagiarisme dan mengirim ke reviewer.'],
        ['q' => 'Berapa lama proses review hingga diterbitkan?', 'a' => 'Rata-rata 4-8 minggu untuk peer review dan 2-4 minggu untuk proses editorial setelah paper diterima. Total sekitar 2-3 bulan.'],
        ['q' => 'Apakah ada biaya publikasi?', 'a' => 'Publikasi di repositori institusi gratis. Untuk jurnal Q1-Q2, biaya APC (Article Processing Charge) bervariasi tergantung jurnal. KVT Hub menyediakan subsidi APC bagi peneliti berprestasi.'],
        ['q' => 'Bagaimana cara meningkatkan h-index?', 'a' => 'Publikasikan secara konsisten di jurnal bereputasi, promosikan paper di konferensi, kolaborasi dengan peneliti lain, dan manfaatkan open access untuk meningkatkan visibility.'],
        ['q' => 'Apakah plagiarism checker otomatis?', 'a' => 'Ya, setiap paper yang disubmit otomatis di-scan menggunakan Turnitin dan iThenticate. Hasil pengecekan tersedia dalam 24 jam.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $f)
        <details class="kaca rounded-xl group" data-aos="fade-up">
            <summary class="cursor-pointer p-5 flex items-center justify-between text-white font-semibold text-sm">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition text-xs"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-700/50 pt-3">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-blue-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Publikasikan Karya Ilmiah Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis, submit paper, dan publikasikan riset Anda di jurnal internasional bereputasi dengan bantuan AI tools.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-purple-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-blue-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-pen-fancy"></i> Submit Paper Sekarang
        </a>
    </div>
</section>

@endsection
