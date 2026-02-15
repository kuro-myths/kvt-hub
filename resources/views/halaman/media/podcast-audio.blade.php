@extends('tata-letak.utama')
@section('judul', 'Podcast & Audio - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0">
        <div class="absolute top-24 left-16 w-72 h-72 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-20 w-80 h-80 bg-fuchsia-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #A855F7 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-podcast"></i> Konten Audio Edukasi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Podcast &</span><br>
            <span class="teks-gradien">Audio Content</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Dengarkan episode podcast KVT Edu — membahas tren pendidikan, tips karir, inovasi teknologi,
            dan kisah inspiratif dari para ahli. Episode baru setiap Senin & Kamis.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#episode-terbaru" class="bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:from-purple-400 hover:to-fuchsia-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-purple-500/30 hover:-translate-y-0.5">
                <i class="fas fa-headphones mr-2"></i>Dengarkan Sekarang
            </a>
            <a href="#platform" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fab fa-spotify mr-2"></i>Tersedia di Spotify
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">120+</div><div class="text-xs text-gray-500">Episode</div></div>
            <div><div class="text-2xl font-black text-white">5</div><div class="text-xs text-gray-500">Season</div></div>
            <div><div class="text-2xl font-black text-white">80K+</div><div class="text-xs text-gray-500">Pendengar</div></div>
            <div><div class="text-2xl font-black text-white">200+</div><div class="text-xs text-gray-500">Jam Audio</div></div>
        </div>
    </div>
</section>

{{-- EPISODE TERBARU --}}
<section id="episode-terbaru" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">TERBARU</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Episode Terbaru</h2>
        <p class="text-gray-400 mt-3">Episode terbaru dari KVT Edu Podcast</p>
    </div>
    @php
    $episodes = [
        ['ep' => 'EP 124', 'judul' => 'Masa Depan Pendidikan Hybrid di Indonesia', 'guest' => 'Prof. Dewi Lestari, M.Ed.', 'durasi' => '42:15', 'tanggal' => '10 Feb 2026', 'warna' => 'purple', 'desc' => 'Diskusi mendalam tentang model blended learning dan hybrid classroom pasca-pandemi.'],
        ['ep' => 'EP 123', 'judul' => 'Skill yang Dicari Perusahaan Top 2026', 'guest' => 'Rini Setiawan, HRD Google ID', 'durasi' => '38:20', 'tanggal' => '06 Feb 2026', 'warna' => 'blue', 'desc' => 'Insight langsung dari HR perusahaan teknologi tentang skill yang paling dibutuhkan.'],
        ['ep' => 'EP 122', 'judul' => 'Mental Health untuk Pelajar Gen Z', 'guest' => 'Psikolog Anita Pratiwi, M.Psi.', 'durasi' => '45:50', 'tanggal' => '03 Feb 2026', 'warna' => 'rose', 'desc' => 'Tips menjaga kesehatan mental di tengah tekanan akademik dan sosial media.'],
        ['ep' => 'EP 121', 'judul' => 'Blockchain Credential di Pendidikan', 'guest' => 'Dr. Hasan Prasetyo, Ph.D.', 'durasi' => '35:10', 'tanggal' => '30 Jan 2026', 'warna' => 'cyan', 'desc' => 'Bagaimana blockchain mengamankan ijazah dan sertifikat digital.'],
        ['ep' => 'EP 120', 'judul' => 'Gamification: Belajar Sambil Bermain', 'guest' => 'Fajar Nugroho, Game Designer', 'durasi' => '40:30', 'tanggal' => '27 Jan 2026', 'warna' => 'green', 'desc' => 'Studi kasus gamification yang meningkatkan engagement pelajar hingga 300%.'],
        ['ep' => 'EP 119', 'judul' => 'Dari Mahasiswa ke Startup Founder', 'guest' => 'Dimas Arya, CEO EduPlay', 'durasi' => '52:00', 'tanggal' => '23 Jan 2026', 'warna' => 'amber', 'desc' => 'Kisah inspiratif mahasiswa yang membangun startup edutech bernilai miliaran.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($episodes as $ep)
        <div class="kaca rounded-2xl p-5 border-{{ $ep['warna'] }}-500/20 hover:border-{{ $ep['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-16 h-16 bg-{{ $ep['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:bg-{{ $ep['warna'] }}-500/30 transition">
                    <i class="fas fa-headphones text-{{ $ep['warna'] }}-400 text-2xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-{{ $ep['warna'] }}-400 text-xs font-mono font-bold">{{ $ep['ep'] }}</span>
                        <span class="text-gray-600 text-xs">{{ $ep['tanggal'] }}</span>
                    </div>
                    <h4 class="text-white font-bold text-sm mb-1">{{ $ep['judul'] }}</h4>
                    <p class="text-gray-500 text-xs mb-2">{{ $ep['desc'] }}</p>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-500 text-xs"><i class="fas fa-microphone mr-1"></i>{{ $ep['guest'] }} · {{ $ep['durasi'] }}</p>
                        <button class="w-9 h-9 bg-{{ $ep['warna'] }}-500/20 rounded-full flex items-center justify-center hover:bg-{{ $ep['warna'] }}-500/30 transition flex-shrink-0">
                            <i class="fas fa-play text-{{ $ep['warna'] }}-400 text-xs ml-0.5"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- SERI & SEASON --}}
<section class="bg-gradient-to-br from-fuchsia-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-fuchsia-500/10 text-fuchsia-400 px-3 py-1 rounded-full">SEASON</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Podcast Series & Season</h2>
            <p class="text-gray-400 mt-3">Dengarkan per-seri sesuai topik favoritmu</p>
        </div>
        @php
        $seasons = [
            ['season' => 'Season 5', 'judul' => 'Future of Work & Education', 'episode' => 24, 'status' => 'Ongoing', 'warna' => 'purple', 'ikon' => 'fas fa-rocket'],
            ['season' => 'Season 4', 'judul' => 'Tech in Classroom', 'episode' => 30, 'status' => 'Completed', 'warna' => 'blue', 'ikon' => 'fas fa-laptop'],
            ['season' => 'Season 3', 'judul' => 'Career & Professional Growth', 'episode' => 28, 'status' => 'Completed', 'warna' => 'green', 'ikon' => 'fas fa-briefcase'],
            ['season' => 'Season 2', 'judul' => 'Student Life & Wellness', 'episode' => 22, 'status' => 'Completed', 'warna' => 'rose', 'ikon' => 'fas fa-heart'],
            ['season' => 'Season 1', 'judul' => 'Education Fundamentals', 'episode' => 16, 'status' => 'Completed', 'warna' => 'amber', 'ikon' => 'fas fa-graduation-cap'],
        ];
        @endphp
        <div class="space-y-4">
            @foreach($seasons as $s)
            <div class="kaca rounded-xl p-5 flex items-center gap-4 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="w-14 h-14 bg-{{ $s['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                    <i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400 text-xl"></i>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-{{ $s['warna'] }}-400 text-xs font-mono font-bold">{{ $s['season'] }}</span>
                        <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $s['status'] }}</span>
                    </div>
                    <h4 class="text-white font-bold">{{ $s['judul'] }}</h4>
                    <p class="text-gray-500 text-xs mt-1">{{ $s['episode'] }} episode</p>
                </div>
                <button class="bg-{{ $s['warna'] }}-500/20 text-{{ $s['warna'] }}-400 px-4 py-2 rounded-lg text-xs font-semibold hover:bg-{{ $s['warna'] }}-500/30 transition"><i class="fas fa-list mr-1"></i>Lihat</button>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- GUEST SPOTLIGHT --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">SPOTLIGHT</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Guest <span class="teks-gradien-emas">Spotlight</span></h2>
        <p class="text-gray-400 mt-3">Narasumber tamu yang paling sering tampil di podcast kami</p>
    </div>
    @php
    $guests = [
        ['nama' => 'Prof. Dewi Lestari', 'keahlian' => 'Education Innovation', 'tampil' => 8, 'warna' => 'purple'],
        ['nama' => 'Rini Setiawan', 'keahlian' => 'HR & Talent Acquisition', 'tampil' => 5, 'warna' => 'blue'],
        ['nama' => 'Dr. Hasan Prasetyo', 'keahlian' => 'Blockchain & EdTech', 'tampil' => 4, 'warna' => 'cyan'],
        ['nama' => 'Anita Pratiwi, M.Psi.', 'keahlian' => 'Psychology & Wellness', 'tampil' => 6, 'warna' => 'rose'],
    ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($guests as $g)
        <div class="kaca rounded-2xl p-6 text-center border-{{ $g['warna'] }}-500/20 hover:border-{{ $g['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="w-16 h-16 bg-{{ $g['warna'] }}-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-user text-{{ $g['warna'] }}-400 text-xl"></i>
            </div>
            <h4 class="text-white font-bold text-sm">{{ $g['nama'] }}</h4>
            <p class="text-{{ $g['warna'] }}-400 text-xs mt-1">{{ $g['keahlian'] }}</p>
            <div class="mt-3 bg-{{ $g['warna'] }}-500/10 text-{{ $g['warna'] }}-400 text-xs px-3 py-1 rounded-full inline-block">{{ $g['tampil'] }}x tampil</div>
        </div>
        @endforeach
    </div>
</section>

{{-- LISTENING PLATFORMS --}}
<section id="platform" class="bg-gradient-to-br from-green-900/10 to-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">PLATFORM</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Dengarkan di Platform Favorit</h2>
            <p class="text-gray-400 mt-3">KVT Edu Podcast tersedia di berbagai platform streaming audio</p>
        </div>
        @php
        $platforms = [
            ['nama' => 'Spotify', 'ikon' => 'fab fa-spotify', 'warna' => 'green', 'desc' => 'Streaming gratis dengan akun Spotify. Episode baru selalu update otomatis.'],
            ['nama' => 'Apple Podcasts', 'ikon' => 'fab fa-apple', 'warna' => 'purple', 'desc' => 'Tersedia untuk pengguna iPhone, iPad, dan Mac melalui Apple Podcasts.'],
            ['nama' => 'Google Podcasts', 'ikon' => 'fab fa-google', 'warna' => 'blue', 'desc' => 'Akses langsung dari Google Search, Google Home, atau aplikasi Android.'],
            ['nama' => 'YouTube Music', 'ikon' => 'fab fa-youtube', 'warna' => 'red', 'desc' => 'Versi audio dan video tersedia di YouTube Music dan YouTube channel.'],
        ];
        @endphp
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @foreach($platforms as $p)
            <div class="kaca rounded-2xl p-6 flex items-start gap-4 border-{{ $p['warna'] }}-500/20 hover:border-{{ $p['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
                <div class="w-14 h-14 bg-{{ $p['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                    <i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-2xl"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold text-lg group-hover:text-{{ $p['warna'] }}-400 transition">{{ $p['nama'] }}</h4>
                    <p class="text-gray-400 text-sm mt-1">{{ $p['desc'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK EPISODE --}}
<section class="max-w-5xl mx-auto px-4 py-16">
    <div class="kaca rounded-2xl p-8" data-aos="zoom-in-up">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            @php
            $stats = [
                ['angka' => '120+', 'label' => 'Total Episode', 'ikon' => 'fas fa-podcast', 'warna' => 'purple'],
                ['angka' => '200+', 'label' => 'Jam Konten Audio', 'ikon' => 'fas fa-clock', 'warna' => 'blue'],
                ['angka' => '80K+', 'label' => 'Total Pendengar', 'ikon' => 'fas fa-headphones', 'warna' => 'green'],
                ['angka' => '4.8/5', 'label' => 'Rating Rata-rata', 'ikon' => 'fas fa-star', 'warna' => 'amber'],
            ];
            @endphp
            @foreach($stats as $st)
            <div>
                <div class="w-12 h-12 bg-{{ $st['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <i class="{{ $st['ikon'] }} text-{{ $st['warna'] }}-400 text-lg"></i>
                </div>
                <div class="text-2xl font-black teks-gradien">{{ $st['angka'] }}</div>
                <p class="text-gray-400 text-xs mt-1">{{ $st['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-purple-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-fuchsia-500/10 text-fuchsia-400 px-3 py-1 rounded-full">HAK AKSES</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Podcast per Peran</h2>
        </div>
        @php
        $roles = [
            ['peran' => 'Siswa', 'ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'fitur' => ['Dengarkan semua episode gratis', 'Download untuk offline listening', 'Buat playlist episode favorit', 'Beri rating & review episode', 'Subscribe notifikasi episode baru', 'Share episode ke media sosial']],
            ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Ajukan jadi narasumber tamu', 'Rekam podcast mini per kelas', 'Embed episode ke materi kelas', 'Assign podcast sebagai tugas dengar', 'Akses transkrip lengkap', 'Buat quiz berdasarkan episode']],
            ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Kelola semua konten podcast', 'Atur jadwal rilis episode', 'Moderasi review & komentar', 'Distribusi ke platform streaming', 'Akses analytics pendengar', 'Kelola narasumber & penjadwalan']],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($roles as $r)
            <div class="kaca rounded-2xl p-6 border-{{ $r['warna'] }}-500/20" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-{{ $r['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $r['ikon'] }} text-{{ $r['warna'] }}-400"></i></div>
                    <h3 class="text-white font-bold">{{ $r['peran'] }}</h3>
                </div>
                <div class="space-y-2">
                    @foreach($r['fitur'] as $f)
                    <div class="flex items-center gap-2 text-sm text-gray-400"><i class="fas fa-check text-{{ $r['warna'] }}-400 text-xs"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Dengarkan KVT Edu Podcast</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">120+ episode inspiratif tentang pendidikan, karir, dan teknologi. Gratis di Spotify, Apple Podcasts, dan platform lainnya.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-500 to-fuchsia-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-purple-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-headphones"></i> Mulai Dengarkan
            </a>
            <a href="#" class="inline-flex items-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-4 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fab fa-spotify"></i> Buka di Spotify
            </a>
        </div>
    </div>
</section>

@endsection
