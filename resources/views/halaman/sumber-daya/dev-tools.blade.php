@extends('tata-letak.utama')
@section('judul', 'Developer Tools - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F97316 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-tools"></i> Coding Playground · API Gateway · Project Templates
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Developer</span><br>
            <span class="teks-gradien-emas">Tools & Utilities</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi tools dan utilitas lengkap untuk developer. Code editor online, API tester, database designer,
            CI/CD pipeline builder, dan banyak lagi — semua gratis dan berbasis cloud.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                <i class="fas fa-code mr-2"></i>Mulai Coding
            </a>
            <a href="#tools" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-th-large mr-2"></i>Lihat Semua Tools
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">25+</div><div class="text-xs text-gray-500">Tools</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Bahasa</div></div>
            <div><div class="text-2xl font-black text-white">10K+</div><div class="text-xs text-gray-500">Pengguna</div></div>
            <div><div class="text-2xl font-black text-white">Free</div><div class="text-xs text-gray-500">Untuk Semua</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI TOOLS --}}
<section id="tools" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Developer Tools</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tools terorganisir berdasarkan kategori untuk memudahkan workflow development Anda</p>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-laptop-code', 'warna' => 'blue', 'judul' => 'Code & Editor', 'desc' => 'Online IDE, code formatter, linter, diff checker, dan syntax highlighter untuk 30+ bahasa.', 'count' => '8 Tools'],
        ['ikon' => 'fas fa-plug', 'warna' => 'green', 'judul' => 'API & Integration', 'desc' => 'API playground, REST/GraphQL tester, webhook debugger, dan mock server builder.', 'count' => '6 Tools'],
        ['ikon' => 'fas fa-database', 'warna' => 'purple', 'judul' => 'Database & Storage', 'desc' => 'ERD designer, SQL playground, migration builder, schema visualizer, dan query optimizer.', 'count' => '5 Tools'],
        ['ikon' => 'fas fa-rocket', 'warna' => 'red', 'judul' => 'DevOps & CI/CD', 'desc' => 'Pipeline builder, Docker playground, Kubernetes visualizer, dan infrastructure-as-code.', 'count' => '4 Tools'],
        ['ikon' => 'fas fa-paint-brush', 'warna' => 'pink', 'judul' => 'UI & Design', 'desc' => 'UI prototyping, color picker, CSS generator, icon finder, dan responsive tester.', 'count' => '5 Tools'],
        ['ikon' => 'fas fa-vial', 'warna' => 'cyan', 'judul' => 'Testing & QA', 'desc' => 'Unit test runner, load tester, code coverage analyzer, dan regression test suite.', 'count' => '4 Tools'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($kategori as $idx => $k)
        <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
                <span class="text-xs bg-{{ $k['warna'] }}-500/10 text-{{ $k['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $k['count'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- POPULAR TOOLS GRID --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">POPULER</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tools Paling Populer</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tools yang paling banyak digunakan oleh developer di platform KVT Hub</p>
        </div>
        @php
        $tools = [
            ['ikon' => 'fas fa-code', 'warna' => 'blue', 'judul' => 'Online IDE', 'desc' => 'Code editor di browser dengan support 30+ bahasa. Terminal, debugging, dan extension.'],
            ['ikon' => 'fas fa-plug', 'warna' => 'green', 'judul' => 'API Playground', 'desc' => 'Uji coba REST dan GraphQL API langsung di browser. Postman-like dengan kolaborasi.'],
            ['ikon' => 'fas fa-sitemap', 'warna' => 'purple', 'judul' => 'DB Designer', 'desc' => 'Desain database visual — ERD, SQL generator, migration builder, dan model export.'],
            ['ikon' => 'fas fa-paint-brush', 'warna' => 'pink', 'judul' => 'UI Prototyping', 'desc' => 'Tool desain UI cepat dengan komponen pre-built. Export ke HTML/CSS atau Figma.'],
            ['ikon' => 'fas fa-terminal', 'warna' => 'amber', 'judul' => 'Cloud Terminal', 'desc' => 'Terminal Linux di browser dengan akses SSH, Docker, dan environment pre-configured.'],
            ['ikon' => 'fas fa-vial', 'warna' => 'cyan', 'judul' => 'Testing Suite', 'desc' => 'Unit test runner, load tester, dan code coverage analyzer — semua di satu dashboard.'],
            ['ikon' => 'fas fa-code-branch', 'warna' => 'red', 'judul' => 'Git Visualizer', 'desc' => 'Visualisasi branch, merge, dan conflict resolution dengan UI interaktif.'],
            ['ikon' => 'fas fa-project-diagram', 'warna' => 'indigo', 'judul' => 'CI/CD Pipeline', 'desc' => 'Pipeline builder visual. Deploy ke AWS, GCP, atau VPS dengan satu klik.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach($tools as $idx => $t)
            <div class="kaca rounded-2xl p-5 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <div class="w-10 h-10 bg-{{ $t['warna'] }}-500/20 rounded-lg flex items-center justify-center mb-3"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400"></i></div>
                <h3 class="text-white font-bold mb-2">{{ $t['judul'] }}</h3>
                <p class="text-gray-400 text-xs">{{ $t['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-orange-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">25+</div><p class="text-gray-400 text-sm mt-1">Tools</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">10K+</div><p class="text-gray-400 text-sm mt-1">Pengguna Aktif</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">1M+</div><p class="text-gray-400 text-sm mt-1">Eksekusi Kode</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">30+</div><p class="text-gray-400 text-sm mt-1">Bahasa Didukung</p></div>
    </div>
</section>

{{-- IDE INTEGRATIONS --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">INTEGRASI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Integrasi IDE & Editor</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Hubungkan KVT Dev Tools dengan IDE favorit Anda untuk workflow yang lebih efisien</p>
    </div>
    @php
    $ide = [
        ['judul' => 'VS Code', 'ikon' => 'fab fa-microsoft', 'warna' => 'blue', 'desc' => 'Extension resmi KVT Hub untuk Visual Studio Code. Sync project, run tests, dan deploy langsung dari editor.'],
        ['judul' => 'JetBrains', 'ikon' => 'fas fa-cube', 'warna' => 'orange', 'desc' => 'Plugin untuk IntelliJ IDEA, WebStorm, PyCharm, dan seluruh keluarga JetBrains IDE.'],
        ['judul' => 'Vim / Neovim', 'ikon' => 'fas fa-terminal', 'warna' => 'green', 'desc' => 'Plugin Vim/Neovim untuk integrasi API, snippet library, dan remote coding session.'],
        ['judul' => 'GitHub Codespaces', 'ikon' => 'fab fa-github', 'warna' => 'purple', 'desc' => 'Template devcontainer siap pakai untuk GitHub Codespaces dengan KVT tools pre-installed.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($ide as $idx => $i)
        <div class="kaca rounded-2xl p-5 border-{{ $i['warna'] }}-500/20 hover:border-{{ $i['warna'] }}-500/40 transition text-center" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-14 h-14 bg-{{ $i['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                <i class="{{ $i['ikon'] }} text-{{ $i['warna'] }}-400 text-2xl"></i>
            </div>
            <h4 class="text-white font-bold mb-1">{{ $i['judul'] }}</h4>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $i['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Tutorial Dev Tools</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Online IDE: Getting Started', 'durasi' => '10:20', 'views' => '36K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=IDE+Tutorial'],
                ['judul' => 'API Playground Deep Dive', 'durasi' => '14:55', 'views' => '22K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=API+Playground'],
                ['judul' => 'CI/CD Pipeline dari Nol', 'durasi' => '18:30', 'views' => '19K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=CI+CD+Pipeline'],
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
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-orange-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Akses semua dev tools gratis', 'Gunakan coding playground 30+ bahasa', 'Simpan project & snippet pribadi', 'Ikuti coding challenge & hackathon', 'Fork template project starter', 'Share hasil code ke komunitas']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Instruktur', 'fitur' => ['Buat assignment coding untuk kelas', 'Review & grading code siswa', 'Buat template project per materi', 'Live coding session di kelas', 'Kelola sandbox environment siswa', 'Akses analytics penggunaan tools']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh katalog dev tools', 'Konfigurasi resource limits & quota', 'Moderasi kontribusi komunitas', 'Dashboard analytics & usage stats', 'Kelola integrasi IDE & plugin', 'Konfigurasi CI/CD & deployment']],
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
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum Dev Tools</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah semua developer tools benar-benar gratis?', 'a' => 'Ya, semua tools dasar tersedia gratis untuk akun terdaftar. Untuk fitur premium seperti unlimited execution time, private project, dan dedicated resources, tersedia paket Pro dan Enterprise.'],
        ['q' => 'Bahasa pemrograman apa saja yang didukung?', 'a' => 'Online IDE mendukung 30+ bahasa: Python, JavaScript, TypeScript, Java, C++, C#, Go, Rust, PHP, Ruby, Swift, Kotlin, SQL, R, Dart, Haskell, Scala, Elixir, dan banyak lagi.'],
        ['q' => 'Apakah bisa menjalankan Docker di cloud terminal?', 'a' => 'Ya, cloud terminal menyediakan akses Docker engine. Anda bisa build, run, dan manage container langsung di browser. Kubernetes playground juga tersedia untuk belajar orchestration.'],
        ['q' => 'Bagaimana cara berkontribusi template project?', 'a' => 'Buat project template di dashboard → Submit ke komunitas. Tim reviewer akan memeriksa kualitas, keamanan, dan dokumentasi. Template yang diterima akan tersedia untuk semua pengguna.'],
        ['q' => 'Apakah ada limit eksekusi kode?', 'a' => 'Akun gratis: 100 eksekusi/hari, 30 detik timeout. Akun Pro: unlimited eksekusi, 5 menit timeout. Enterprise: dedicated resources tanpa batas.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-orange-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-orange-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Coding Sekarang</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Akses 25+ developer tools gratis — online IDE, API playground, database designer, dan CI/CD pipeline builder.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-orange-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Mulai Gratis
        </a>
    </div>
</section>
</section>

@endsection
