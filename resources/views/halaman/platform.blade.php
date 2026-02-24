@extends('tata-letak.utama')
@section('judul', 'Platform - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(51,153,255,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
    <div class="absolute top-20 left-10 w-72 h-72 bg-kvt-500/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-ungu-500/5 rounded-full blur-3xl animate-pulse" style="animation-delay:2s"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-laptop-code"></i> Platform Edukasi v8.0
        </div>
        <h1 class="text-4xl md:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Platform </span><span class="teks-gradien">KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="100">
            Ekosistem pembelajaran digital terintegrasi dengan fitur-fitur canggih untuk mendukung proses belajar mengajar dari TK hingga S3.
        </p>
        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-4 rounded-2xl font-bold text-lg transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-rocket mr-2"></i>Mulai Gratis
            </a>
            <a href="#fitur" class="border border-kvt-600/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition">
                <i class="fas fa-th-large mr-2"></i>Lihat Fitur
            </a>
        </div>
    </div>
</section>

{{-- Platform Stats Bar --}}
<section class="border-y border-kvt-700/20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 text-center">
            @php
                $platformStats = [
                    ['ikon' => 'fa-users', 'nilai' => number_format(\App\Models\User::count()), 'label' => 'Pengguna Aktif'],
                    ['ikon' => 'fa-book-open', 'nilai' => number_format(\App\Models\Materi::count()), 'label' => 'Total Materi'],
                    ['ikon' => 'fa-school', 'nilai' => number_format(\App\Models\Kelas::count()), 'label' => 'Kelas Tersedia'],
                    ['ikon' => 'fa-graduation-cap', 'nilai' => '13', 'label' => 'Jenjang Pendidikan'],
                    ['ikon' => 'fa-trophy', 'nilai' => '100', 'label' => 'Level Gamifikasi'],
                ];
            @endphp
            @foreach($platformStats as $i => $s)
                <div data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="text-3xl md:text-4xl font-black teks-gradien mb-1">{{ $s['nilai'] }}</div>
                    <div class="text-gray-500 text-xs"><i class="fas {{ $s['ikon'] }} mr-1"></i>{{ $s['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Fitur Utama --}}
<section class="max-w-7xl mx-auto px-4 py-20" id="fitur">
    <div class="text-center mb-14">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-3" data-aos="zoom-in">Fitur <span class="teks-gradien">Utama</span></h2>
        <p class="text-gray-400 max-w-2xl mx-auto" data-aos="zoom-in" data-aos-delay="100">Semua yang Anda butuhkan untuk pembelajaran modern dalam satu platform</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($fitur as $i => $f)
            <div class="kaca rounded-2xl p-6 border-kvt-500/20 hover:border-kvt-500/40 hover:-translate-y-1 transition-all duration-300 text-center group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="{{ $f['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $f['deskripsi'] }}</p>
            </div>
        @endforeach
    </div>
</section>

{{-- Tech Stack --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Dibangun dengan <span class="teks-gradien">Teknologi Modern</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">KVT Hub menggunakan stack teknologi terdepan untuk performa dan keamanan maksimal</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-5">
            @php
                $techs = [
                    ['nama' => 'Laravel 11', 'ikon' => 'fab fa-laravel', 'warna' => 'red'],
                    ['nama' => 'PHP 8.3', 'ikon' => 'fab fa-php', 'warna' => 'indigo'],
                    ['nama' => 'PostgreSQL', 'ikon' => 'fas fa-database', 'warna' => 'blue'],
                    ['nama' => 'TailwindCSS', 'ikon' => 'fab fa-css3-alt', 'warna' => 'cyan'],
                    ['nama' => 'Chart.js', 'ikon' => 'fas fa-chart-bar', 'warna' => 'orange'],
                    ['nama' => 'AOS Animate', 'ikon' => 'fas fa-magic', 'warna' => 'purple'],
                ];
            @endphp
            @foreach($techs as $i => $t)
                <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 text-center hover:border-{{ $t['warna'] }}-500/30 transition-all hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                    <i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-3xl mb-3"></i>
                    <div class="text-white font-semibold text-sm">{{ $t['nama'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Keunggulan Platform --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="grid lg:grid-cols-2 gap-12 items-center">
        <div data-aos="fade-right">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-6">Mengapa <span class="teks-gradien">KVT Hub?</span></h2>
            <p class="text-gray-400 mb-8">Platform yang dirancang khusus untuk ekosistem pendidikan Indonesia, dari tingkat dasar hingga perguruan tinggi.</p>
            <div class="space-y-4">
                @php
                    $keunggulan = [
                        ['ikon' => 'fa-shield-alt', 'warna' => 'green', 'judul' => 'Keamanan Tingkat Enterprise', 'desc' => 'Enkripsi AES-256, SSL/TLS, 2FA, dan compliance ISO 27001'],
                        ['ikon' => 'fa-bolt', 'warna' => 'amber', 'judul' => 'Performa Ultra Cepat', 'desc' => 'Optimasi query + caching untuk loading di bawah 1 detik'],
                        ['ikon' => 'fa-mobile-alt', 'warna' => 'kvt', 'judul' => 'Responsive Design', 'desc' => 'Tampilan sempurna di semua perangkat: desktop, tablet, phone'],
                        ['ikon' => 'fa-gamepad', 'warna' => 'purple', 'judul' => 'Gamifikasi RPG', 'desc' => '100 level, XP system, achievement badges, dan leaderboard'],
                        ['ikon' => 'fa-robot', 'warna' => 'cyan', 'judul' => 'AI VTuber Assistant', 'desc' => 'Kuro — maskot AI yang bisa menjawab pertanyaan real-time'],
                    ];
                @endphp
                @foreach($keunggulan as $i => $k)
                    <div class="flex gap-4 bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4 hover:border-{{ $k['warna'] }}-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                        <div class="w-12 h-12 bg-{{ $k['warna'] }}-500/10 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas {{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-lg"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold mb-1">{{ $k['judul'] }}</h4>
                            <p class="text-gray-500 text-sm">{{ $k['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="relative" data-aos="fade-left">
            <div class="bg-gradient-to-br from-kvt-900/80 to-kvt-800/50 border border-kvt-700/30 rounded-3xl p-8 space-y-4">
                {{-- Mock Dashboard Preview --}}
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex gap-1.5">
                        <span class="w-3 h-3 rounded-full bg-red-500/80"></span>
                        <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                        <span class="w-3 h-3 rounded-full bg-green-500/80"></span>
                    </div>
                    <span class="text-gray-500 text-xs font-mono">kvthub.com/dasbor</span>
                </div>
                <div class="grid grid-cols-3 gap-3">
                    <div class="bg-kvt-700/20 rounded-xl p-3 text-center"><div class="text-kvt-400 text-lg font-black">85</div><div class="text-gray-500 text-[10px]">XP Hari Ini</div></div>
                    <div class="bg-kvt-700/20 rounded-xl p-3 text-center"><div class="text-green-400 text-lg font-black">12/15</div><div class="text-gray-500 text-[10px]">Materi Selesai</div></div>
                    <div class="bg-kvt-700/20 rounded-xl p-3 text-center"><div class="text-amber-400 text-lg font-black">Lv.24</div><div class="text-gray-500 text-[10px]">Level Saat Ini</div></div>
                </div>
                <div class="bg-kvt-700/10 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-gray-400 text-xs font-semibold">Progress Minggu Ini</span>
                        <span class="text-kvt-400 text-xs font-bold">78%</span>
                    </div>
                    <div class="w-full bg-kvt-800 rounded-full h-2.5">
                        <div class="bg-gradient-to-r from-kvt-500 to-ungu-500 h-2.5 rounded-full" style="width: 78%"></div>
                    </div>
                </div>
                <div class="bg-kvt-700/10 rounded-xl p-4">
                    <div class="text-gray-400 text-xs font-semibold mb-3">Aktivitas Terakhir</div>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs"><span class="w-2 h-2 bg-green-400 rounded-full"></span><span class="text-gray-300">Menyelesaikan kuis Matematika</span><span class="text-gray-600 ml-auto">2m</span></div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-2 h-2 bg-kvt-400 rounded-full"></span><span class="text-gray-300">Membaca materi Fisika Bab 5</span><span class="text-gray-600 ml-auto">15m</span></div>
                        <div class="flex items-center gap-2 text-xs"><span class="w-2 h-2 bg-amber-400 rounded-full"></span><span class="text-gray-300">Naik ke Level 24!</span><span class="text-gray-600 ml-auto">1j</span></div>
                    </div>
                </div>
            </div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-gradient-to-br from-kvt-500/10 to-ungu-500/10 rounded-full blur-2xl"></div>
        </div>
    </div>
</section>

{{-- Integrasi & Mitra --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Integrasi & <span class="teks-gradien">Mitra</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Terhubung dengan berbagai platform dan tools populer</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-4">
            @php
                $integrations = [
                    ['nama' => 'Google', 'ikon' => 'fab fa-google'],
                    ['nama' => 'GitHub', 'ikon' => 'fab fa-github'],
                    ['nama' => 'YouTube', 'ikon' => 'fab fa-youtube'],
                    ['nama' => 'Discord', 'ikon' => 'fab fa-discord'],
                    ['nama' => 'Slack', 'ikon' => 'fab fa-slack'],
                    ['nama' => 'Zoom', 'ikon' => 'fas fa-video'],
                    ['nama' => 'Figma', 'ikon' => 'fab fa-figma'],
                    ['nama' => 'AWS', 'ikon' => 'fab fa-aws'],
                ];
            @endphp
            @foreach($integrations as $i => $int)
                <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4 text-center hover:border-kvt-500/30 transition hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="{{ $i * 60 }}">
                    <i class="{{ $int['ikon'] }} text-gray-400 text-2xl mb-2 hover:text-white transition"></i>
                    <div class="text-gray-500 text-[10px] font-semibold">{{ $int['nama'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Perbandingan Fitur --}}
<section class="max-w-5xl mx-auto px-4 py-20">
    <div class="text-center mb-14" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Perbandingan <span class="teks-gradien">Fitur</span></h2>
        <p class="text-gray-400">Lihat bagaimana KVT Hub dibandingkan dengan platform lain</p>
    </div>
    <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-kvt-700/30">
                        <th class="text-left text-gray-400 p-4 font-semibold">Fitur</th>
                        <th class="text-center text-kvt-400 p-4 font-bold">KVT Hub</th>
                        <th class="text-center text-gray-500 p-4 font-semibold">Platform A</th>
                        <th class="text-center text-gray-500 p-4 font-semibold">Platform B</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $compare = [
                            ['fitur' => '13 Jenjang Pendidikan', 'kvt' => true, 'a' => false, 'b' => false],
                            ['fitur' => 'Gamifikasi RPG 100 Level', 'kvt' => true, 'a' => false, 'b' => true],
                            ['fitur' => 'AI VTuber Assistant', 'kvt' => true, 'a' => false, 'b' => false],
                            ['fitur' => 'Panel Pengaturan 10+ Fitur', 'kvt' => true, 'a' => true, 'b' => false],
                            ['fitur' => 'LED Dot Matrix Panel', 'kvt' => true, 'a' => false, 'b' => false],
                            ['fitur' => 'Music Streaming Built-in', 'kvt' => true, 'a' => false, 'b' => false],
                            ['fitur' => 'Screenshot & Screen Record', 'kvt' => true, 'a' => false, 'b' => true],
                            ['fitur' => 'Sertifikasi Resmi', 'kvt' => true, 'a' => true, 'b' => true],
                        ];
                    @endphp
                    @foreach($compare as $c)
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="p-4 text-gray-300">{{ $c['fitur'] }}</td>
                            <td class="p-4 text-center"><i class="fas {{ $c['kvt'] ? 'fa-check-circle text-green-400' : 'fa-times-circle text-red-400/50' }}"></i></td>
                            <td class="p-4 text-center"><i class="fas {{ $c['a'] ? 'fa-check-circle text-green-400/50' : 'fa-times-circle text-red-400/30' }}"></i></td>
                            <td class="p-4 text-center"><i class="fas {{ $c['b'] ? 'fa-check-circle text-green-400/50' : 'fa-times-circle text-red-400/30' }}"></i></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Pertanyaan <span class="teks-gradien">Umum</span></h2>
        </div>
        @php
            $faq = [
                ['q' => 'Apakah KVT Hub gratis?', 'a' => 'Ya! KVT Hub menyediakan paket gratis dengan akses ke kelas dasar, komunitas, dan fitur gamifikasi. Untuk fitur lengkap seperti sertifikasi dan AI assistant, tersedia paket Premium.'],
                ['q' => 'Bagaimana sistem gamifikasi bekerja?', 'a' => 'Setiap aktivitas (menyelesaikan materi, kuis, forum) memberikan XP. Kumpulkan XP untuk naik level dari 1 hingga 100. Dapatkan badge achievement dan bersaing di leaderboard!'],
                ['q' => 'Apakah bisa digunakan secara offline?', 'a' => 'Saat ini KVT Hub membutuhkan koneksi internet. Namun, beberapa materi bisa di-download untuk dibaca offline melalui fitur PDF Export.'],
                ['q' => 'Bagaimana keamanan data pengguna?', 'a' => 'Data dilindungi dengan enkripsi AES-256, SSL/TLS pada semua koneksi, autentikasi 2FA, dan kami mematuhi standar GDPR serta ISO 27001.'],
                ['q' => 'Berapa banyak kelas yang tersedia?', 'a' => 'Saat ini tersedia ' . number_format(\App\Models\Kelas::count()) . ' kelas aktif yang mencakup 13 jenjang pendidikan. Kelas baru ditambahkan setiap minggu oleh para pengajar.'],
            ];
        @endphp
        <div class="space-y-4">
            @foreach($faq as $i => $item)
                <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-6 text-left hover:bg-kvt-800/20 transition">
                        <span class="text-white font-bold"><i class="fas fa-question-circle text-kvt-400 mr-2"></i>{{ $item['q'] }}</span>
                        <i class="fas fa-chevron-down text-kvt-400 text-sm transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-6 pb-6">
                        <p class="text-gray-400 text-sm leading-relaxed">{{ $item['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="relative overflow-hidden kaca rounded-3xl p-12 md:p-16 text-center border-kvt-500/20" data-aos="zoom-in">
        <div class="absolute top-0 left-0 w-64 h-64 bg-kvt-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-64 h-64 bg-ungu-500/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        <div class="relative">
            <h2 class="text-3xl md:text-5xl font-black text-white mb-4">Siap Memulai <span class="teks-gradien">Perjalanan</span> Anda?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto text-lg">Bergabung dengan {{ number_format(\App\Models\User::count()) }}+ pengguna yang sudah menggunakan KVT Hub.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-4 rounded-2xl font-bold text-lg transition shadow-lg shadow-kvt-500/20">
                    <i class="fas fa-rocket mr-2"></i>Daftar Gratis
                </a>
                <a href="{{ route('masuk') }}" class="border border-kvt-600/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
