@extends('tata-letak.utama')
@section('judul', 'Hackathon - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-red-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #EF4444 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-trophy"></i> 20+ Event per Tahun
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Hackathon</span><br>
            <span class="teks-gradien">& Kompetisi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Uji kemampuan Anda di hackathon nasional dan internasional. Bangun solusi inovatif dalam 24-48 jam, bersaing dengan developer terbaik, dan menangkan hadiah total Rp 1 Miliar+.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-red-500 to-orange-500 hover:from-red-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-red-500/30 hover:-translate-y-0.5">
                <i class="fas fa-bolt mr-2"></i>Daftar Hackathon
            </a>
            <a href="#upcoming" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-calendar mr-2"></i>Lihat Jadwal
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">20+</div><div class="text-xs text-gray-500">Event/Tahun</div></div>
            <div><div class="text-2xl font-black text-white">5K+</div><div class="text-xs text-gray-500">Peserta</div></div>
            <div><div class="text-2xl font-black text-white">Rp 1M+</div><div class="text-xs text-gray-500">Total Hadiah</div></div>
            <div><div class="text-2xl font-black text-white">Global</div><div class="text-xs text-gray-500">Jangkauan</div></div>
        </div>
    </div>
</section>

{{-- UPCOMING HACKATHONS --}}
<section id="upcoming" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">MENDATANG</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hackathon Mendatang</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih hackathon yang sesuai minat dan daftarkan tim Anda</p>
    </div>
    @php
    $events = [
        ['ikon' => 'fas fa-brain', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'AI Innovation Challenge', 'tanggal' => 'Mar 2026', 'hadiah' => 'Rp 150 Juta', 'status' => 'Pendaftaran Dibuka', 'peserta' => 500],
        ['ikon' => 'fas fa-leaf', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Green Tech Hackathon', 'tanggal' => 'Apr 2026', 'hadiah' => 'Rp 100 Juta', 'status' => 'Coming Soon', 'peserta' => 300],
        ['ikon' => 'fas fa-heartbeat', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'HealthTech for Good', 'tanggal' => 'Mei 2026', 'hadiah' => 'Rp 120 Juta', 'status' => 'Coming Soon', 'peserta' => 400],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'cyan', 'gradien' => 'from-cyan-500 to-teal-500', 'judul' => 'Capture The Flag (CTF)', 'tanggal' => 'Jun 2026', 'hadiah' => 'Rp 80 Juta', 'status' => 'Coming Soon', 'peserta' => 250],
        ['ikon' => 'fas fa-gamepad', 'warna' => 'pink', 'gradien' => 'from-pink-500 to-rose-500', 'judul' => 'Game Jam Indonesia', 'tanggal' => 'Jul 2026', 'hadiah' => 'Rp 75 Juta', 'status' => 'Coming Soon', 'peserta' => 200],
        ['ikon' => 'fas fa-chart-line', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-yellow-500', 'judul' => 'FinTech Disrupt', 'tanggal' => 'Agt 2026', 'hadiah' => 'Rp 200 Juta', 'status' => 'Coming Soon', 'peserta' => 350],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($events as $i => $e)
        <div class="kaca rounded-2xl p-6 border-{{ $e['warna'] }}-500/20 hover:border-{{ $e['warna'] }}-500/40 transition group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $e['gradien'] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition"><i class="{{ $e['ikon'] }} text-white text-xl"></i></div>
                <span class="text-xs bg-{{ $e['warna'] }}-500/20 text-{{ $e['warna'] }}-300 px-2 py-1 rounded-full">{{ $e['status'] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $e['judul'] }}</h3>
            <p class="text-gray-500 text-xs"><i class="fas fa-calendar-alt mr-1"></i>{{ $e['tanggal'] }} · <i class="fas fa-trophy ml-1 mr-1"></i>{{ $e['hadiah'] }} · <i class="fas fa-users ml-1 mr-1"></i>{{ $e['peserta'] }} slot</p>
        </div>
        @endforeach
    </div>
</section>

{{-- PEMENANG TERDAHULU --}}
<section class="bg-gradient-to-br from-red-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">HALL OF FAME</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pemenang Terdahulu</h2>
        </div>
        @php
        $winners = [
            ['tim' => 'Team NeuralForge', 'hackathon' => 'AI Innovation 2025', 'proyek' => 'EduAssist AI — Asisten belajar adaptif berbasis GPT-4', 'hadiah' => 'Juara 1 · Rp 75 Juta', 'warna' => 'yellow'],
            ['tim' => 'Team GreenCode', 'hackathon' => 'Green Tech 2025', 'proyek' => 'CarbonTrack — Platform monitoring jejak karbon real-time', 'hadiah' => 'Juara 1 · Rp 50 Juta', 'warna' => 'green'],
            ['tim' => 'Team CyberShield', 'hackathon' => 'CTF Championship 2025', 'proyek' => 'Menyelesaikan 28/30 challenge dalam 12 jam', 'hadiah' => 'Juara 1 · Rp 40 Juta', 'warna' => 'cyan'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($winners as $i => $w)
            <div class="kaca rounded-2xl p-6 border-{{ $w['warna'] }}-500/20 hover:border-{{ $w['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex items-center gap-2 mb-4">
                    <i class="fas fa-trophy text-{{ $w['warna'] }}-400 text-xl"></i>
                    <span class="text-{{ $w['warna'] }}-400 text-sm font-bold">{{ $w['hadiah'] }}</span>
                </div>
                <h4 class="text-white font-bold text-lg mb-1">{{ $w['tim'] }}</h4>
                <p class="text-gray-500 text-xs mb-2">{{ $w['hackathon'] }}</p>
                <p class="text-gray-400 text-sm">{{ $w['proyek'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SPONSOR & HADIAH --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-purple-500/10 text-purple-400 px-3 py-1 rounded-full">SPONSOR & HADIAH</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Sponsor & Hadiah Menarik</h2>
    </div>
    @php
    $hadiah = [
        ['ikon' => 'fas fa-money-bill-wave', 'warna' => 'green', 'judul' => 'Prize Pool', 'desc' => 'Total hadiah Rp 1 Miliar+ per tahun. Cash prize untuk Juara 1, 2, 3 dan kategori khusus.'],
        ['ikon' => 'fas fa-laptop', 'warna' => 'blue', 'judul' => 'Hardware & Gadget', 'desc' => 'MacBook, iPad, monitor, dan gadget premium dari sponsor teknologi.'],
        ['ikon' => 'fas fa-cloud', 'warna' => 'cyan', 'judul' => 'Cloud Credits', 'desc' => 'Cloud credits dari AWS, GCP, dan Azure senilai jutaan rupiah untuk deploy proyek.'],
        ['ikon' => 'fas fa-briefcase', 'warna' => 'purple', 'judul' => 'Job Offers', 'desc' => 'Fast-track interview dan job offers langsung dari perusahaan sponsor hackathon.'],
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'amber', 'judul' => 'Beasiswa', 'desc' => 'Beasiswa pendidikan dan pelatihan dari mitra akademik internasional.'],
        ['ikon' => 'fas fa-handshake', 'warna' => 'pink', 'judul' => 'Mentorship', 'desc' => 'Sesi mentorship eksklusif dengan CTO dan tech lead dari perusahaan unicorn.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($hadiah as $i => $h)
        <div class="kaca rounded-2xl p-6 border-{{ $h['warna'] }}-500/20 hover:border-{{ $h['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-12 h-12 bg-{{ $h['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $h['ikon'] }} text-{{ $h['warna'] }}-400 text-xl"></i></div>
            <h4 class="text-white font-bold text-lg mb-2">{{ $h['judul'] }}</h4>
            <p class="text-gray-400 text-sm">{{ $h['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- KRITERIA PENILAIAN & TEAM FORMATION --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-red-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Judging Criteria --}}
            <div data-aos="fade-right">
                <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">PENILAIAN</span>
                <h3 class="text-2xl font-black text-white mt-4 mb-6">Kriteria Penilaian</h3>
                @php
                $kriteria = [
                    ['nama' => 'Inovasi & Kreativitas', 'persen' => 30, 'warna' => 'red'],
                    ['nama' => 'Implementasi Teknis', 'persen' => 25, 'warna' => 'blue'],
                    ['nama' => 'UI/UX & Desain', 'persen' => 20, 'warna' => 'purple'],
                    ['nama' => 'Impact & Skalabilitas', 'persen' => 15, 'warna' => 'green'],
                    ['nama' => 'Presentasi & Pitch', 'persen' => 10, 'warna' => 'amber'],
                ];
                @endphp
                <div class="space-y-4">
                    @foreach($kriteria as $k)
                    <div>
                        <div class="flex justify-between text-sm mb-1"><span class="text-gray-300">{{ $k['nama'] }}</span><span class="text-{{ $k['warna'] }}-400 font-bold">{{ $k['persen'] }}%</span></div>
                        <div class="w-full bg-kvt-800/50 rounded-full h-2"><div class="bg-{{ $k['warna'] }}-500 h-2 rounded-full" style="width: {{ $k['persen'] }}%"></div></div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Team Formation --}}
            <div data-aos="fade-left">
                <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">TIM</span>
                <h3 class="text-2xl font-black text-white mt-4 mb-6">Cara Bentuk Tim</h3>
                @php
                $steps = [
                    ['step' => '1', 'judul' => 'Daftar sebagai peserta', 'desc' => 'Buat akun dan pilih hackathon yang diminati.'],
                    ['step' => '2', 'judul' => 'Cari anggota tim', 'desc' => 'Gunakan fitur team matching berdasarkan skill.'],
                    ['step' => '3', 'judul' => 'Bentuk tim (2-5 orang)', 'desc' => 'Undang teman atau terima request dari peserta lain.'],
                    ['step' => '4', 'judul' => 'Pilih challenge track', 'desc' => 'Pilih tema challenge dan mulai brainstorm solusi.'],
                    ['step' => '5', 'judul' => 'Submit & presentasi', 'desc' => 'Upload repo, demo video, dan pitch deck sebelum deadline.'],
                ];
                @endphp
                <div class="space-y-4">
                    @foreach($steps as $s)
                    <div class="flex items-start gap-4">
                        <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center flex-shrink-0"><span class="text-blue-400 text-sm font-bold">{{ $s['step'] }}</span></div>
                        <div>
                            <h5 class="text-white font-semibold text-sm">{{ $s['judul'] }}</h5>
                            <p class="text-gray-400 text-xs">{{ $s['desc'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Hackathon</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Highlight: AI Innovation Challenge 2025', 'durasi' => '15:20', 'views' => '38K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EF4444?text=AI+Hackathon'],
            ['judul' => 'Tips Menang Hackathon dari Juara', 'durasi' => '11:45', 'views' => '29K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Winning+Tips'],
            ['judul' => 'Behind the Scenes: 48 Jam Non-Stop', 'durasi' => '20:30', 'views' => '52K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=BTS+Hackathon'],
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
<section class="bg-gradient-to-br from-kvt-900/50 to-red-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Hackathon Berdasarkan Peran</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Daftar & ikuti hackathon', 'Bentuk tim dan cari anggota', 'Submit proyek & pitch deck', 'Akses mentoring pre-hackathon', 'Lihat result & leaderboard', 'Kumpulkan badge kompetisi']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Jadi mentor tim hackathon', 'Juri hackathon & kompetisi', 'Buat challenge khusus kelas', 'Review dan beri feedback', 'Rekomendasi siswa ke sponsor', 'Hosting internal hackathon']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Buat & kelola hackathon', 'Kelola sponsor & partnership', 'Set kriteria penilaian', 'Manage prize distribution', 'Analytics & reporting', 'Konfigurasi team matching']],
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
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Berapa ukuran tim yang diperbolehkan?', 'a' => 'Setiap tim terdiri dari 2-5 orang. Anda bisa mendaftar solo dan menggunakan fitur team matching untuk menemukan anggota tim berdasarkan skill complementary.'],
        ['q' => 'Apakah harus bayar untuk ikut hackathon?', 'a' => 'Sebagian besar hackathon KVT Hub gratis untuk peserta. Beberapa event premium mungkin memerlukan biaya registrasi minimal yang mencakup makan, swag, dan cloud credits.'],
        ['q' => 'Apakah hackathon dilakukan online atau offline?', 'a' => 'Tersedia dalam format online, offline, dan hybrid. Peserta online menggunakan platform KVT Hub untuk kolaborasi, submission, dan presentasi real-time.'],
        ['q' => 'Apa yang harus disiapkan sebelum hackathon?', 'a' => 'Pastikan Anda memiliki laptop, koneksi internet stabil, akun GitHub, dan IDE favorit. Kami juga menyediakan sesi mentoring pre-hackathon 1 minggu sebelum event.'],
        ['q' => 'Bagaimana proses penilaian hackathon?', 'a' => 'Juri menilai berdasarkan 5 kriteria: Inovasi (30%), Implementasi Teknis (25%), UI/UX (20%), Impact (15%), dan Presentasi (10%). Feedback diberikan untuk semua tim.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $i => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
            <summary class="flex items-center justify-between p-6 cursor-pointer list-none">
                <span class="text-white font-semibold pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-red-400 text-sm group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-6 pb-6 text-gray-400 text-sm border-t border-kvt-700/30 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-red-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Siap Bertanding?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang dan buktikan kemampuan Anda di hackathon berikutnya. Hadiah besar, pengalaman tak ternilai, dan koneksi industri menanti.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-orange-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-red-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar Hackathon Sekarang
        </a>
    </div>
</section>

@endsection
