@extends('tata-letak.utama')
@section('judul', 'Program Magang - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-20 w-80 h-80 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F97316 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-building"></i> Intern & Professional Training
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Program</span><br>
            <span class="teks-gradien-emas">Magang</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pengalaman kerja nyata di 500+ perusahaan mitra. Program PKL & Prakerin untuk siswa SMK/SMA
            di bidang IT, Bisnis, Desain, dan Riset dengan mentoring dari profesional berpengalaman.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-orange-500 to-amber-500 hover:from-orange-400 hover:to-amber-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-orange-500/30 hover:-translate-y-0.5">
                <i class="fas fa-paper-plane mr-2"></i>Daftar Magang
            </a>
            <a href="#jalur" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-route mr-2"></i>Lihat Jalur Magang
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">480+</div><div class="text-xs text-gray-500">Posisi</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Perusahaan</div></div>
            <div><div class="text-2xl font-black text-white">75%</div><div class="text-xs text-gray-500">Convert FTE</div></div>
            <div><div class="text-2xl font-black text-white">3-6</div><div class="text-xs text-gray-500">Bulan</div></div>
        </div>
    </div>
</section>

{{-- JALUR MAGANG --}}
<section id="jalur" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">JALUR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jalur Magang</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih jalur magang sesuai bidang keahlian dan minat karir Anda</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
        $jalur = [
            ['Magang IT', 'Software engineering, data science, DevOps, cybersecurity, dan QA testing.', 'fa-laptop-code', 'from-blue-500 to-indigo-500', '200+ posisi', ['React', 'Python', 'Docker', 'SQL']],
            ['Magang Bisnis', 'Marketing, finance, HR, operations, dan business development.', 'fa-chart-line', 'from-green-500 to-emerald-500', '150+ posisi', ['Excel', 'SAP', 'CRM', 'Analytics']],
            ['Magang Desain', 'UI/UX design, graphic design, motion graphics, dan branding.', 'fa-palette', 'from-pink-500 to-rose-500', '80+ posisi', ['Figma', 'Adobe CC', 'Sketch', 'Blender']],
            ['Magang Riset', 'Research assistant di lab universitas dan R&D perusahaan.', 'fa-flask', 'from-purple-500 to-violet-500', '50+ posisi', ['SPSS', 'R', 'LaTeX', 'Matlab']],
        ];
        @endphp
        @foreach($jalur as $idx => $j)
        <div class="kaca rounded-2xl p-6 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br {{ $j[3] }} rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition"><i class="fas {{ $j[2] }} text-white text-xl"></i></div>
                <span class="text-[10px] bg-orange-500/10 text-orange-400 px-2 py-0.5 rounded-full border border-orange-500/20">{{ $j[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $j[0] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $j[1] }}</p>
            <div class="flex flex-wrap gap-1.5">
                @foreach($j[5] as $tag)
                <span class="text-[10px] bg-kvt-800/50 text-gray-400 px-2 py-0.5 rounded-full border border-kvt-700/30">{{ $tag }}</span>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- MITRA PERUSAHAAN --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-kvt-500/10 text-kvt-400 px-3 py-1 rounded-full">MITRA</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Perusahaan Mitra Magang</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Program magang di perusahaan nasional dan multinasional terpercaya</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="100">
            @foreach(['Telkom', 'Pertamina', 'BCA', 'Tokopedia', 'Gojek', 'Grab', 'Astra', 'Unilever', 'Samsung', 'Microsoft', 'Google', 'Shopee'] as $idx => $p)
            <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition group" data-aos="zoom-in" data-aos-delay="{{ $idx * 40 }}">
                <div class="w-10 h-10 mx-auto bg-kvt-800/50 rounded-lg flex items-center justify-center mb-2 group-hover:scale-110 transition"><i class="fas fa-building text-kvt-400"></i></div>
                <span class="text-xs text-gray-400">{{ $p }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TIMELINE PENDAFTARAN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">TIMELINE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Timeline Pendaftaran</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Proses seleksi magang dari pendaftaran hingga onboarding</p>
    </div>
    @php
    $timeline = [
        ['fase' => 'Pendaftaran', 'durasi' => 'Minggu 1-2', 'ikon' => 'fa-edit', 'warna' => 'blue', 'desc' => 'Isi formulir online, upload CV & portofolio. AI matching mencocokkan profil Anda dengan posisi yang tersedia.'],
        ['fase' => 'Seleksi', 'durasi' => 'Minggu 3-4', 'ikon' => 'fa-tasks', 'warna' => 'purple', 'desc' => 'Assessment online, technical test, dan soft-skill evaluation oleh tim HR perusahaan mitra.'],
        ['fase' => 'Interview', 'durasi' => 'Minggu 5-6', 'ikon' => 'fa-video', 'warna' => 'green', 'desc' => 'Interview dengan supervisor dan team lead. Bisa online atau on-site sesuai kebijakan perusahaan.'],
        ['fase' => 'Onboarding', 'durasi' => 'Minggu 7', 'ikon' => 'fa-rocket', 'warna' => 'orange', 'desc' => 'Orientasi, meet the team, setup workspace, dan mulai program magang dengan mentor yang ditunjuk.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($timeline as $idx => $t)
        <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition relative" data-aos="fade-up" data-aos-delay="{{ $idx * 100 }}">
            <div class="absolute -top-3 left-6 bg-{{ $t['warna'] }}-500/20 text-{{ $t['warna'] }}-400 text-[10px] px-3 py-0.5 rounded-full border border-{{ $t['warna'] }}-500/30">{{ $t['durasi'] }}</div>
            <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center mt-2 mb-4"><i class="fas {{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $t['fase'] }}</h3>
            <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- BENEFIT MAGANG --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">BENEFIT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Benefit Magang</h2>
        </div>
        @php
        $benefit = [
            ['ikon' => 'fa-money-bill-wave', 'warna' => 'green', 'judul' => 'Stipend Bulanan', 'desc' => 'Uang saku bulanan kompetitif selama masa magang, disesuaikan dengan posisi dan perusahaan.'],
            ['ikon' => 'fa-certificate', 'warna' => 'yellow', 'judul' => 'Sertifikat Resmi', 'desc' => 'Sertifikat pengalaman kerja yang diakui industri, bisa digunakan untuk CV dan LinkedIn.'],
            ['ikon' => 'fa-user-tie', 'warna' => 'blue', 'judul' => 'Mentoring Profesional', 'desc' => 'Bimbingan langsung dari senior engineer, manager, dan profesional berpengalaman.'],
            ['ikon' => 'fa-briefcase', 'warna' => 'purple', 'judul' => 'Full-time Offer', 'desc' => '75% peserta magang mendapat tawaran kerja tetap setelah menyelesaikan program.'],
            ['ikon' => 'fa-laptop-house', 'warna' => 'orange', 'judul' => 'Fleksibel WFH/WFO', 'desc' => 'Opsi hybrid working tersedia di banyak perusahaan mitra, sesuaikan dengan jadwal sekolah.'],
            ['ikon' => 'fa-network-wired', 'warna' => 'cyan', 'judul' => 'Networking', 'desc' => 'Bangun koneksi profesional dengan rekan magang, mentor, dan alumni perusahaan mitra.'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($benefit as $idx => $b)
            <div class="kaca rounded-2xl p-6 border-{{ $b['warna'] }}-500/20 hover:border-{{ $b['warna'] }}-500/40 transition" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                <div class="w-12 h-12 bg-{{ $b['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="fas {{ $b['ikon'] }} text-{{ $b['warna'] }}-400 text-xl"></i></div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $b['judul'] }}</h3>
                <p class="text-gray-400 text-sm">{{ $b['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="max-w-5xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">STATISTIK</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Program Magang dalam Angka</h2>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="zoom-in-up">
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">480+</div><p class="text-gray-400 text-sm mt-2">Posisi Magang</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">500+</div><p class="text-gray-400 text-sm mt-2">Perusahaan</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">75%</div><p class="text-gray-400 text-sm mt-2">Convert to FTE</p></div>
        <div class="kaca rounded-2xl p-6 text-center"><div class="text-3xl font-black teks-gradien-emas">3-6</div><p class="text-gray-400 text-sm mt-2">Bulan Durasi</p></div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur untuk Setiap Peran</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Peserta Magang', 'fitur' => ['Browse 480+ posisi magang aktif', 'AI matching profil ke perusahaan', 'Apply magang dengan one-click', 'Track status lamaran real-time', 'Logbook & jurnal harian otomatis', 'Sertifikat digital setelah selesai']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pembimbing', 'fitur' => ['Monitor siswa yang sedang magang', 'Kelola program PKL/Prakerin', 'Komunikasi dengan supervisor mitra', 'Evaluasi & penilaian siswa', 'Laporan progress mingguan', 'Koordinasi jadwal kunjungan']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh data magang sekolah', 'MoU & kerja sama perusahaan mitra', 'Dashboard analitik placement', 'Surat pengantar & administrasi', 'Verifikasi perusahaan partner', 'Report & quality assurance']],
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

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Pengalaman Magang</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Pengalaman Magang di Tokopedia', 'durasi' => '12:30', 'views' => '34K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Magang+Tokopedia'],
            ['judul' => 'Tips Lolos Seleksi Magang', 'durasi' => '09:45', 'views' => '29K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=Tips+Seleksi'],
            ['judul' => 'Dari PKL ke Karyawan Tetap', 'durasi' => '15:20', 'views' => '41K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3399FF?text=PKL+to+FTE'],
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

{{-- FAQ --}}
<section class="bg-gradient-to-br from-orange-900/10 to-kvt-900/30 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
        </div>
        @php
        $faq = [
            ['q' => 'Siapa yang bisa mendaftar program magang?', 'a' => 'Program magang terbuka untuk siswa SMK/SMA kelas 11-12, mahasiswa semester 5+, dan fresh graduate. Setiap jalur magang memiliki persyaratan spesifik yang bisa dilihat di halaman masing-masing.'],
            ['q' => 'Berapa lama durasi magang?', 'a' => 'Durasi magang berkisar 3-6 bulan tergantung program dan perusahaan. Program PKL/Prakerin untuk SMK biasanya 3 bulan, sedangkan internship perusahaan tech bisa 4-6 bulan.'],
            ['q' => 'Apakah peserta magang mendapat uang saku?', 'a' => 'Ya, sebagian besar perusahaan mitra menyediakan stipend/uang saku bulanan. Besarannya bervariasi tergantung posisi, lokasi, dan perusahaan (rata-rata Rp 1-5 juta/bulan).'],
            ['q' => 'Bagaimana proses seleksi magang?', 'a' => 'Proses seleksi meliputi: pendaftaran online → screening AI → assessment/test → interview → onboarding. Total proses biasanya 4-7 minggu dari pendaftaran hingga mulai magang.'],
            ['q' => 'Apakah ada kesempatan direkrut setelah magang?', 'a' => '75% peserta magang kami mendapat tawaran kerja dari perusahaan tempat magang. Performa selama magang akan menjadi pertimbangan utama untuk konversi ke karyawan tetap.'],
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
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Raih Pengalaman Kerja Nyata</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang untuk mengakses 480+ posisi magang di 500+ perusahaan mitra. Gratis dengan mentoring profesional dan sertifikat resmi.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-amber-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-orange-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar Program Magang
        </a>
    </div>
</section>

@endsection
