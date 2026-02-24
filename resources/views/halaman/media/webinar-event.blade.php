@extends('tata-letak.utama')
@section('judul', 'Webinar & Event - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-blue-900/30 to-kvt-900"></div>
    <div class="absolute inset-0">
        <div class="absolute top-16 left-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-16 right-16 w-72 h-72 bg-indigo-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #3B82F6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-blue-800/30 border border-blue-600/30 rounded-full px-4 py-1.5 text-xs text-blue-300 mb-6" data-aos="fade-down">
            <i class="fas fa-broadcast-tower"></i> Live & On-Demand Events
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Webinar &</span><br>
            <span class="teks-gradien">Event Live</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Ikuti webinar edukatif bersama pakar pendidikan, praktisi industri, dan guru berprestasi.
            Jadwal rutin setiap minggu — live streaming & rekaman on-demand tersedia.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#mendatang" class="bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-400 hover:to-indigo-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-blue-500/30 hover:-translate-y-0.5">
                <i class="fas fa-calendar-alt mr-2"></i>Event Mendatang
            </a>
            <a href="#arsip" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-archive mr-2"></i>Arsip Rekaman
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Webinar/Tahun</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Speaker Ahli</div></div>
            <div><div class="text-2xl font-black text-white">15K+</div><div class="text-xs text-gray-500">Peserta Total</div></div>
            <div><div class="text-2xl font-black text-white">100+</div><div class="text-xs text-gray-500">Jam Rekaman</div></div>
        </div>
    </div>
</section>

{{-- EVENT MENDATANG --}}
<section id="mendatang" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">UPCOMING</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Event Mendatang</h2>
        <p class="text-gray-400 mt-3">Daftar sekarang sebelum slot habis</p>
    </div>
    @php
    $upcoming = [
        ['warna' => 'blue', 'tanggal' => '20 Feb 2026', 'waktu' => '14:00 WIB', 'judul' => 'AI-Powered Learning: Revolusi Pendidikan 2026', 'speaker' => 'Prof. Dr. Andi Wijaya, M.Sc.', 'slot' => '180 / 500', 'tipe' => 'Webinar'],
        ['warna' => 'green', 'tanggal' => '27 Feb 2026', 'waktu' => '10:00 WIB', 'judul' => 'Workshop: Membangun Kurikulum Digital', 'speaker' => 'Dr. Siti Nurhaliza, M.Pd.', 'slot' => '95 / 200', 'tipe' => 'Workshop'],
        ['warna' => 'purple', 'tanggal' => '05 Mar 2026', 'waktu' => '19:00 WIB', 'judul' => 'Career Talk: Tech Industry Insights', 'speaker' => 'Rizky Pratama, CTO NexaEdu', 'slot' => '250 / 300', 'tipe' => 'Talk'],
        ['warna' => 'amber', 'tanggal' => '12 Mar 2026', 'waktu' => '13:00 WIB', 'judul' => 'Hackathon Edu-Tech Nasional 2026', 'speaker' => 'Tim KVT Hub & Mitra', 'slot' => '300 / 1000', 'tipe' => 'Hackathon'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($upcoming as $u)
        <div class="kaca rounded-2xl p-6 border-{{ $u['warna'] }}-500/20 hover:border-{{ $u['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-16 h-20 bg-{{ $u['warna'] }}-500/20 rounded-2xl flex flex-col items-center justify-center flex-shrink-0">
                    <i class="fas fa-calendar text-{{ $u['warna'] }}-400 text-lg mb-1"></i>
                    <span class="text-white text-[10px] font-mono text-center leading-tight">{{ $u['tanggal'] }}</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs bg-{{ $u['warna'] }}-500/20 text-{{ $u['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $u['tipe'] }}</span>
                        <span class="text-xs text-gray-500">{{ $u['waktu'] }}</span>
                    </div>
                    <h4 class="text-white font-bold text-lg mb-1">{{ $u['judul'] }}</h4>
                    <p class="text-gray-400 text-sm"><i class="fas fa-user-tie mr-1"></i>{{ $u['speaker'] }}</p>
                    <div class="flex items-center justify-between mt-3">
                        <span class="text-gray-500 text-xs"><i class="fas fa-users mr-1"></i>{{ $u['slot'] }} peserta</span>
                        <button class="bg-{{ $u['warna'] }}-500/20 text-{{ $u['warna'] }}-400 px-4 py-1.5 rounded-lg text-xs font-semibold hover:bg-{{ $u['warna'] }}-500/30 transition"><i class="fas fa-ticket-alt mr-1"></i>Daftar</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ARSIP EVENT --}}
<section id="arsip" class="bg-gradient-to-br from-indigo-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">ARSIP</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Event yang Telah Berlalu</h2>
            <p class="text-gray-400 mt-3">Tonton rekaman event sebelumnya secara on-demand</p>
        </div>
        @php
        $arsip = [
            ['judul' => 'Transformasi Digital Sekolah', 'tanggal' => '10 Jan 2026', 'peserta' => '450', 'durasi' => '1:30:00', 'warna' => 'blue'],
            ['judul' => 'Kurikulum Merdeka Implementation', 'tanggal' => '25 Jan 2026', 'peserta' => '380', 'durasi' => '2:00:00', 'warna' => 'green'],
            ['judul' => 'Data Science for Education', 'tanggal' => '15 Jan 2026', 'peserta' => '290', 'durasi' => '1:45:00', 'warna' => 'purple'],
            ['judul' => 'Gamification in Learning', 'tanggal' => '01 Feb 2026', 'peserta' => '520', 'durasi' => '1:15:00', 'warna' => 'amber'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($arsip as $a)
            <div class="kaca rounded-xl p-5 flex items-center gap-4 border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
                <div class="w-12 h-12 bg-{{ $a['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-{{ $a['warna'] }}-500/30 transition">
                    <i class="fas fa-play-circle text-{{ $a['warna'] }}-400 text-xl"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <h4 class="text-white font-bold text-sm truncate">{{ $a['judul'] }}</h4>
                    <p class="text-gray-500 text-xs mt-1"><i class="fas fa-calendar mr-1"></i>{{ $a['tanggal'] }} · <i class="fas fa-users ml-1 mr-1"></i>{{ $a['peserta'] }} peserta · <i class="fas fa-clock ml-1 mr-1"></i>{{ $a['durasi'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SPEAKER PROFILES --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">SPEAKER</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Profil <span class="teks-gradien">Speaker</span></h2>
        <p class="text-gray-400 mt-3">Para ahli yang berbagi ilmu di KVT Hub</p>
    </div>
    @php
    $speakers = [
        ['nama' => 'Prof. Dr. Andi Wijaya', 'bidang' => 'AI & Machine Learning', 'institusi' => 'Universitas Indonesia', 'sesi' => 12, 'warna' => 'blue', 'ikon' => 'fas fa-robot'],
        ['nama' => 'Dr. Siti Nurhaliza, M.Pd.', 'bidang' => 'Kurikulum & Pedagogi', 'institusi' => 'Kemendikbudristek', 'sesi' => 8, 'warna' => 'green', 'ikon' => 'fas fa-book-open'],
        ['nama' => 'Rizky Pratama', 'bidang' => 'Software Engineering', 'institusi' => 'CTO NexaEdu', 'sesi' => 6, 'warna' => 'amber', 'ikon' => 'fas fa-code'],
        ['nama' => 'Dr. Maya Kartini, Ph.D.', 'bidang' => 'Data Science Education', 'institusi' => 'ITB Bandung', 'sesi' => 10, 'warna' => 'purple', 'ikon' => 'fas fa-chart-bar'],
    ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($speakers as $s)
        <div class="kaca rounded-2xl p-6 text-center border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="w-20 h-20 bg-{{ $s['warna'] }}-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                <i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400 text-2xl"></i>
            </div>
            <h4 class="text-white font-bold text-sm">{{ $s['nama'] }}</h4>
            <p class="text-{{ $s['warna'] }}-400 text-xs font-semibold mt-1">{{ $s['bidang'] }}</p>
            <p class="text-gray-500 text-xs mt-1">{{ $s['institusi'] }}</p>
            <div class="mt-3 bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 text-xs px-3 py-1 rounded-full inline-block">{{ $s['sesi'] }} sesi webinar</div>
        </div>
        @endforeach
    </div>
</section>

{{-- ALUR REGISTRASI --}}
<section class="bg-gradient-to-br from-blue-900/10 to-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">REGISTRASI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Pendaftaran Event</h2>
        </div>
        @php
        $alur = [
            ['no' => '01', 'judul' => 'Pilih Event', 'desc' => 'Cari event yang sesuai minat dan jadwal Anda dari daftar event mendatang.', 'ikon' => 'fas fa-search', 'warna' => 'blue'],
            ['no' => '02', 'judul' => 'Daftar & Konfirmasi', 'desc' => 'Klik tombol daftar, isi formulir singkat, dan terima email konfirmasi peserta.', 'ikon' => 'fas fa-user-plus', 'warna' => 'green'],
            ['no' => '03', 'judul' => 'Ikuti Live / Tonton Rekaman', 'desc' => 'Join via link Zoom/Meet pada hari H. Rekaman tersedia 24 jam setelah event selesai.', 'ikon' => 'fas fa-tv', 'warna' => 'amber'],
            ['no' => '04', 'judul' => 'Dapat Sertifikat', 'desc' => 'Peserta yang hadir minimal 80% durasi mendapat e-certificate otomatis.', 'ikon' => 'fas fa-certificate', 'warna' => 'purple'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @foreach($alur as $a)
            <div class="kaca rounded-2xl p-5 text-center border-{{ $a['warna'] }}-500/20" data-aos="fade-up">
                <div class="text-3xl font-black text-{{ $a['warna'] }}-500/30 mb-2">{{ $a['no'] }}</div>
                <div class="w-12 h-12 bg-{{ $a['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <i class="{{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-lg"></i>
                </div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $a['judul'] }}</h4>
                <p class="text-gray-400 text-xs">{{ $a['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- KALENDER EVENT --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">KALENDER</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kalender Event <span class="teks-gradien-emas">2026</span></h2>
    </div>
    @php
    $kalender = [
        ['bulan' => 'Februari', 'events' => 3, 'highlight' => 'AI-Powered Learning', 'warna' => 'blue'],
        ['bulan' => 'Maret', 'events' => 4, 'highlight' => 'Hackathon Edu-Tech', 'warna' => 'green'],
        ['bulan' => 'April', 'events' => 2, 'highlight' => 'EdTech Summit', 'warna' => 'purple'],
        ['bulan' => 'Mei', 'events' => 3, 'highlight' => 'Teacher Innovation Day', 'warna' => 'amber'],
        ['bulan' => 'Juni', 'events' => 5, 'highlight' => 'Annual Conference', 'warna' => 'rose'],
        ['bulan' => 'Juli', 'events' => 2, 'highlight' => 'Summer Bootcamp', 'warna' => 'cyan'],
    ];
    @endphp
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($kalender as $k)
        <div class="kaca rounded-xl p-4 text-center border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="text-{{ $k['warna'] }}-400 font-bold text-sm mb-2">{{ $k['bulan'] }}</div>
            <div class="text-2xl font-black text-white mb-1">{{ $k['events'] }}</div>
            <div class="text-gray-500 text-[10px]">events</div>
            <div class="mt-2 text-[10px] text-{{ $k['warna'] }}-400 bg-{{ $k['warna'] }}-500/10 rounded-full px-2 py-0.5 truncate">{{ $k['highlight'] }}</div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-blue-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">HAK AKSES</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Event per Peran</h2>
        </div>
        @php
        $roles = [
            ['peran' => 'Siswa', 'ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'fitur' => ['Daftar event gratis & berbayar', 'Tonton rekaman on-demand', 'Download materi presentasi', 'Dapat e-certificate kehadiran', 'Tanya jawab live dengan speaker', 'Share event ke teman']],
            ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Ajukan jadi speaker/host', 'Buat event untuk kelas sendiri', 'Akses recording premium', 'Kelola peserta per event', 'Embed materi ke kelas', 'Lihat analytics kehadiran']],
            ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Kelola semua event platform', 'Approve/reject speaker baru', 'Set event sebagai featured', 'Kelola jadwal & kalender', 'Atur kapasitas & registrasi', 'Generate laporan event']],
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
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Jangan Lewatkan Event Berikutnya!</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar gratis dan ikuti 50+ webinar & event edukatif sepanjang tahun bersama para pakar terbaik di bidangnya.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-blue-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-calendar-check"></i> Daftar Event Sekarang
        </a>
    </div>
</section>

@endsection
