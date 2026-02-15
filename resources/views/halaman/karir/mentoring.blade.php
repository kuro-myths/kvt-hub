@extends('tata-letak.utama')
@section('judul', 'Mentoring - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F97316 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-chalkboard-teacher"></i> Bimbingan 1-on-1 dari Profesional Senior
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Program</span><br>
            <span class="teks-gradien-emas">Mentoring</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Bimbingan personal dari profesional senior di industri. Career coaching, technical mentoring, dan leadership development
            untuk mempersiapkan karir Anda di perusahaan top dunia.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                <i class="fas fa-user-plus mr-2"></i>Daftar Mentoring
            </a>
            <a href="#jenis" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-list-alt mr-2"></i>Lihat Program
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">300+</div><div class="text-xs text-gray-500">Mentor Aktif</div></div>
            <div><div class="text-2xl font-black text-white">5K+</div><div class="text-xs text-gray-500">Sesi Selesai</div></div>
            <div><div class="text-2xl font-black text-white">4.9/5</div><div class="text-xs text-gray-500">Rating</div></div>
            <div><div class="text-2xl font-black text-white">1-on-1</div><div class="text-xs text-gray-500">Personal</div></div>
        </div>
    </div>
</section>

{{-- JENIS MENTORING --}}
<section id="jenis" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">PROGRAM</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jenis Program Mentoring</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih program mentoring yang sesuai dengan kebutuhan pengembangan karir Anda</p>
    </div>
    @php
    $jenis = [
        ['ikon' => 'fas fa-user-tie', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'Career Mentoring', 'desc' => 'Bimbingan karir dari C-level dan VP di perusahaan Fortune 500. Resume review, interview preparation, career strategy, dan salary negotiation.', 'fitur' => ['Resume & Cover Letter Review', 'Mock Interview Practice', 'Career Path Planning', 'Salary Negotiation Tips']],
        ['ikon' => 'fas fa-code', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Technical Mentoring', 'desc' => 'Code review, system design, architecture patterns, dan best practices dari senior engineer di Big Tech companies.', 'fitur' => ['Code Review & Feedback', 'System Design Deep-dive', 'Architecture Best Practices', 'Open Source Contribution']],
        ['ikon' => 'fas fa-chess-king', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Leadership Mentoring', 'desc' => 'Pengembangan soft skills, manajemen tim, komunikasi efektif, dan kepemimpinan untuk posisi manajerial.', 'fitur' => ['Team Management Skills', 'Public Speaking Training', 'Conflict Resolution', 'Strategic Thinking']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($jenis as $j)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $j['warna'] }}-500/20 hover:border-{{ $j['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="p-6">
                <div class="w-14 h-14 bg-gradient-to-br {{ $j['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $j['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-xl mb-2">{{ $j['judul'] }}</h3>
                <p class="text-gray-400 text-sm mb-4">{{ $j['desc'] }}</p>
                <div class="space-y-2">
                    @foreach($j['fitur'] as $f)
                    <div class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-check text-{{ $j['warna'] }}-400 text-[10px]"></i>{{ $f }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- PROFIL MENTOR --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">MENTOR</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Mentor Profesional Kami</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Belajar langsung dari praktisi berpengalaman di industri teknologi global</p>
        </div>
        @php
        $mentors = [
            ['nama' => 'Dr. Andi Prasetyo', 'posisi' => 'VP of Engineering, Tokopedia', 'bidang' => 'System Design & Scalability', 'rating' => '4.9', 'sesi' => '120+', 'ikon' => 'fa-user', 'warna' => 'blue'],
            ['nama' => 'Sarah Chen, MBA', 'posisi' => 'Product Director, Google APAC', 'bidang' => 'Product Strategy & Leadership', 'rating' => '5.0', 'sesi' => '95+', 'ikon' => 'fa-user', 'warna' => 'green'],
            ['nama' => 'Budi Setiawan, CISSP', 'posisi' => 'CISO, Bank Mandiri', 'bidang' => 'Cybersecurity & Risk Management', 'rating' => '4.8', 'sesi' => '80+', 'ikon' => 'fa-user', 'warna' => 'red'],
            ['nama' => 'Lina Kurniawati, Ph.D', 'posisi' => 'Senior ML Engineer, Meta', 'bidang' => 'Machine Learning & AI Research', 'rating' => '4.9', 'sesi' => '110+', 'ikon' => 'fa-user', 'warna' => 'purple'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($mentors as $idx => $m)
            <div class="kaca rounded-2xl p-6 text-center border-{{ $m['warna'] }}-500/20 hover:border-{{ $m['warna'] }}-500/40 transition group" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="w-16 h-16 bg-{{ $m['warna'] }}-500/20 rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition"><i class="fas {{ $m['ikon'] }} text-{{ $m['warna'] }}-400 text-2xl"></i></div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $m['nama'] }}</h4>
                <p class="text-{{ $m['warna'] }}-400 text-xs mb-2">{{ $m['posisi'] }}</p>
                <p class="text-gray-500 text-xs mb-3">{{ $m['bidang'] }}</p>
                <div class="flex justify-center gap-3 text-xs text-gray-400">
                    <span><i class="fas fa-star text-yellow-400 mr-1"></i>{{ $m['rating'] }}</span>
                    <span><i class="fas fa-comments text-kvt-400 mr-1"></i>{{ $m['sesi'] }} sesi</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FORMAT SESI --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">FORMAT</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Format Sesi Mentoring</h2>
    </div>
    @php
    $format = [
        ['ikon' => 'fa-video', 'warna' => 'blue', 'judul' => 'Video Call 1-on-1', 'desc' => 'Sesi mentoring via Zoom/Google Meet selama 45-60 menit dengan screen sharing dan recording.'],
        ['ikon' => 'fa-comments', 'warna' => 'green', 'judul' => 'Chat & Async Review', 'desc' => 'Tanya jawab asinkron via chat platform. Mentor merespons dalam 24 jam untuk feedback berkelanjutan.'],
        ['ikon' => 'fa-laptop-code', 'warna' => 'purple', 'judul' => 'Pair Programming', 'desc' => 'Coding bersama secara real-time menggunakan VS Code Live Share atau CodeSandbox untuk technical mentoring.'],
        ['ikon' => 'fa-users', 'warna' => 'orange', 'judul' => 'Group Workshop', 'desc' => 'Workshop kelompok kecil (5-10 orang) untuk topik spesifik seperti system design atau behavioral interview.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($format as $idx => $f)
        <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="w-12 h-12 bg-{{ $f['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $f['ikon'] }} text-{{ $f['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $f['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">STATISTIK</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Dampak Program Mentoring</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in-up">
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">300+</div><p class="text-gray-400 text-sm mt-2">Mentor Aktif</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">5K+</div><p class="text-gray-400 text-sm mt-2">Sesi Mentoring</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">4.9/5</div><p class="text-gray-400 text-sm mt-2">Rating Rata-rata</p></div>
            <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">92%</div><p class="text-gray-400 text-sm mt-2">Mentee Dapat Kerja</p></div>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Siapa yang Bisa Menggunakan?</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Mentee', 'fitur' => ['Pilih mentor sesuai bidang & minat', 'Book sesi mentoring fleksibel', 'Akses recording sesi sebelumnya', 'Track progress & action items', 'Dapat sertifikat penyelesaian', 'Kumpulkan XP dari setiap sesi']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Mentor', 'fitur' => ['Set jadwal & tarif mentoring', 'Dashboard analitik mentee', 'Tools untuk feedback & assessment', 'Buat curriculum mentoring sendiri', 'Terima kompensasi per sesi', 'Bangun reputasi & portfolio mentor']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola & verifikasi mentor', 'Monitor kualitas sesi mentoring', 'Analitik program & ROI tracking', 'Manage billing & payment', 'Quality assurance & feedback loop', 'Konfigurasi program & policies']],
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
</section>

{{-- VIDEO --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Mentoring & Success Stories</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $videos = [
                ['judul' => 'Cara Memilih Mentor yang Tepat', 'durasi' => '11:30', 'views' => '24K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=Pilih+Mentor'],
                ['judul' => 'Success Story: Dari Mentee ke Google', 'durasi' => '18:45', 'views' => '41K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=Success+Story'],
                ['judul' => 'Tips Memaksimalkan Sesi Mentoring', 'durasi' => '09:22', 'views' => '19K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Mentoring+Tips'],
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

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Berapa lama durasi satu sesi mentoring?', 'a' => 'Setiap sesi mentoring berlangsung selama 45-60 menit via video call. Untuk chat mentoring, mentor akan merespons dalam 24 jam pada hari kerja.'],
        ['q' => 'Bagaimana cara memilih mentor yang tepat?', 'a' => 'Anda bisa memfilter mentor berdasarkan bidang keahlian, perusahaan, rating, dan ketersediaan jadwal. Kami juga menyediakan AI matching untuk merekomendasikan mentor terbaik sesuai goals Anda.'],
        ['q' => 'Apakah sesi mentoring bisa direkam?', 'a' => 'Ya, seluruh sesi video call akan otomatis direkam dan tersedia di dashboard Anda selama 30 hari untuk ditonton ulang kapan saja.'],
        ['q' => 'Berapa biaya program mentoring?', 'a' => 'Harga bervariasi tergantung mentor dan jenis program. Career mentoring mulai dari Rp150.000/sesi, technical mentoring Rp200.000/sesi. Paket bundle tersedia dengan diskon 20-40%.'],
        ['q' => 'Apakah ada garansi kepuasan?', 'a' => 'Ya, jika Anda merasa sesi pertama tidak sesuai ekspektasi, kami memberikan refund penuh atau opsi ganti mentor tanpa biaya tambahan.'],
    ];
    @endphp
    <div class="space-y-4">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-2xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 60 }}">
            <summary class="flex items-center justify-between p-5 cursor-pointer list-none">
                <span class="text-white font-semibold text-sm pr-4">{{ $f['q'] }}</span>
                <i class="fas fa-chevron-down text-gray-500 text-xs group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-orange-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Temukan Mentor Ideal Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang untuk mendapat bimbingan personal dari 300+ profesional berpengalaman di industri teknologi global.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-orange-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Cari Mentor
        </a>
    </div>
</section>

@endsection
