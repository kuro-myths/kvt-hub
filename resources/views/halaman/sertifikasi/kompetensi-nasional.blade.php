@extends('tata-letak.utama')
@section('judul', 'Kompetensi Nasional - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-red-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #EF4444 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-red-800/30 border border-red-600/30 rounded-full px-4 py-1.5 text-xs text-red-300 mb-6" data-aos="fade-down">
            <i class="fas fa-flag"></i> BNSP & LSP Terakreditasi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Kompetensi </span><span class="teks-gradien">Nasional</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Sertifikasi kompetensi yang diakui Badan Nasional Sertifikasi Profesi (BNSP).
            Berbasis SKKNI dan dilaksanakan oleh Lembaga Sertifikasi Profesi (LSP) terakreditasi.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-red-500 to-rose-500 hover:from-red-400 hover:to-rose-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-red-500/30 hover:-translate-y-0.5">
                <i class="fas fa-certificate mr-2"></i>Daftar Sertifikasi
            </a>
            <a href="#skema" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-list-alt mr-2"></i>Lihat Skema
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Skema BNSP</div></div>
            <div><div class="text-2xl font-black text-white">5K+</div><div class="text-xs text-gray-500">Tersertifikasi</div></div>
            <div><div class="text-2xl font-black text-white">98%</div><div class="text-xs text-gray-500">Lulus</div></div>
            <div><div class="text-2xl font-black text-white">15+</div><div class="text-xs text-gray-500">LSP Mitra</div></div>
        </div>
    </div>
</section>

{{-- SKEMA BNSP --}}
<section id="skema" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">SKEMA SERTIFIKASI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Skema BNSP Tersedia</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pilih skema sertifikasi sesuai bidang keahlian dan level KKNI Anda</p>
    </div>
    @php
    $sertifikasi = [
        ['ikon' => 'fas fa-code', 'warna' => 'blue', 'judul' => 'Junior Web Developer', 'lembaga' => 'LSP Informatika', 'level' => 'KKNI Level 2-3', 'desc' => 'Kompetensi pengembangan web dasar: HTML, CSS, JavaScript, dan framework.', 'unit' => 6],
        ['ikon' => 'fas fa-network-wired', 'warna' => 'green', 'judul' => 'Network Administrator', 'lembaga' => 'LSP Telematika', 'level' => 'KKNI Level 4', 'desc' => 'Administrasi jaringan, routing, switching, dan keamanan jaringan.', 'unit' => 8],
        ['ikon' => 'fas fa-database', 'warna' => 'purple', 'judul' => 'Database Administrator', 'lembaga' => 'LSP Informatika', 'level' => 'KKNI Level 4-5', 'desc' => 'Manajemen basis data, optimasi query, backup & recovery.', 'unit' => 7],
        ['ikon' => 'fas fa-chart-bar', 'warna' => 'cyan', 'judul' => 'Data Analyst', 'lembaga' => 'LSP Telematika', 'level' => 'KKNI Level 5', 'desc' => 'Analisis data, visualisasi, dan pengambilan keputusan berbasis data.', 'unit' => 9],
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'red', 'judul' => 'Cyber Security Analyst', 'lembaga' => 'LSP Informatika', 'level' => 'KKNI Level 5-6', 'desc' => 'Keamanan siber, penetration testing, dan incident response.', 'unit' => 10],
        ['ikon' => 'fas fa-project-diagram', 'warna' => 'amber', 'judul' => 'Project Manager IT', 'lembaga' => 'LSP Manajemen', 'level' => 'KKNI Level 6', 'desc' => 'Manajemen proyek TI, Agile, Scrum, dan pengelolaan tim.', 'unit' => 8],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($sertifikasi as $s)
        <div class="kaca rounded-2xl p-6 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="w-12 h-12 bg-{{ $s['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition"><i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400 text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $s['judul'] }}</h3>
            <div class="flex flex-wrap gap-2 mb-3">
                <span class="text-xs bg-{{ $s['warna'] }}-500/10 text-{{ $s['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $s['lembaga'] }}</span>
                <span class="text-xs bg-gray-700/50 text-gray-400 px-2 py-0.5 rounded-full">{{ $s['level'] }}</span>
                <span class="text-xs bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">{{ $s['unit'] }} Unit Kompetensi</span>
            </div>
            <p class="text-gray-400 text-sm">{{ $s['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- UNIT KOMPETENSI & JENIS UJIAN --}}
<section class="bg-gradient-to-br from-red-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">UJIAN & ASESMEN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Jenis Ujian & Asesmen</h2>
        </div>
        @php
        $ujian = [
            ['ikon' => 'fas fa-file-alt', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-indigo-500', 'judul' => 'Ujian Tertulis', 'desc' => 'Tes pengetahuan teori berdasarkan SKKNI. Multiple choice dan essay berbasis unit kompetensi.', 'durasi' => '90 menit'],
            ['ikon' => 'fas fa-laptop-code', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Ujian Praktik', 'desc' => 'Demonstrasi kompetensi secara langsung di TUK. Dinilai oleh asesor bersertifikat BNSP.', 'durasi' => '120 menit'],
            ['ikon' => 'fas fa-comments', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Wawancara Profesional', 'desc' => 'Sesi tanya jawab dengan asesor untuk memvalidasi pengalaman dan kompetensi kerja.', 'durasi' => '30 menit'],
            ['ikon' => 'fas fa-folder-open', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'Portofolio Evidence', 'desc' => 'Pengumpulan bukti kompetensi: sertifikat pelatihan, proyek, dan surat keterangan kerja.', 'durasi' => 'Pra-ujian'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($ujian as $u)
            <div class="kaca rounded-2xl p-6 border-{{ $u['warna'] }}-500/20 hover:border-{{ $u['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="w-14 h-14 bg-gradient-to-br {{ $u['gradien'] }} rounded-2xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $u['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $u['judul'] }}</h3>
                <p class="text-gray-400 text-sm mb-3">{{ $u['desc'] }}</p>
                <span class="text-xs bg-{{ $u['warna'] }}-500/10 text-{{ $u['warna'] }}-400 px-2 py-1 rounded-full"><i class="fas fa-clock mr-1"></i>{{ $u['durasi'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PROSES SERTIFIKASI --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">ALUR PROSES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Proses Sertifikasi BNSP</h2>
    </div>
    @php
    $proses = [
        ['step' => '01', 'judul' => 'Pendaftaran', 'desc' => 'Isi formulir pendaftaran dan pilih skema sertifikasi yang sesuai.', 'ikon' => 'fas fa-user-plus'],
        ['step' => '02', 'judul' => 'Verifikasi Berkas', 'desc' => 'LSP memverifikasi persyaratan dan dokumen pendaftaran Anda.', 'ikon' => 'fas fa-check-double'],
        ['step' => '03', 'judul' => 'Asesmen/Ujian', 'desc' => 'Ikuti ujian tertulis, praktik, wawancara, dan kumpulkan portofolio.', 'ikon' => 'fas fa-clipboard-check'],
        ['step' => '04', 'judul' => 'Penilaian Asesor', 'desc' => 'Asesor BNSP menilai seluruh bukti kompetensi secara objektif.', 'ikon' => 'fas fa-user-tie'],
        ['step' => '05', 'judul' => 'Keputusan', 'desc' => 'Hasil Kompeten atau Belum Kompeten diumumkan dalam 14 hari kerja.', 'ikon' => 'fas fa-gavel'],
        ['step' => '06', 'judul' => 'Penerbitan Sertifikat', 'desc' => 'Sertifikat BNSP diterbitkan dan tercatat di database nasional.', 'ikon' => 'fas fa-certificate'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-6 gap-4">
        @foreach($proses as $p)
        <div class="kaca rounded-2xl p-5 text-center border-kvt-700/30 hover:border-red-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
            <div class="text-2xl font-black teks-gradien mb-3">{{ $p['step'] }}</div>
            <div class="w-10 h-10 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $p['ikon'] }} text-red-400 text-sm"></i></div>
            <h4 class="text-white font-bold text-sm mb-1">{{ $p['judul'] }}</h4>
            <p class="text-gray-500 text-xs">{{ $p['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- LOKASI TUK --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">TEMPAT UJI KOMPETENSI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Lokasi TUK</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tempat Uji Kompetensi (TUK) tersebar di seluruh Indonesia</p>
        </div>
        @php
        $tuk = [
            ['kota' => 'Jakarta', 'tuk' => 'TUK KVT Hub Pusat', 'alamat' => 'Gedung Cyber Lt. 5, Kuningan', 'ikon' => 'fas fa-building', 'warna' => 'blue'],
            ['kota' => 'Bandung', 'tuk' => 'TUK Telkom University', 'alamat' => 'Jl. Telekomunikasi No 1', 'ikon' => 'fas fa-university', 'warna' => 'green'],
            ['kota' => 'Surabaya', 'tuk' => 'TUK ITS Digital', 'alamat' => 'Kampus ITS Sukolilo', 'ikon' => 'fas fa-school', 'warna' => 'amber'],
            ['kota' => 'Yogyakarta', 'tuk' => 'TUK UGM Tech', 'alamat' => 'FMIPA UGM Bulaksumur', 'ikon' => 'fas fa-landmark', 'warna' => 'purple'],
            ['kota' => 'Makassar', 'tuk' => 'TUK UNHAS IT', 'alamat' => 'Kampus UNHAS Tamalanrea', 'ikon' => 'fas fa-city', 'warna' => 'cyan'],
            ['kota' => 'Medan', 'tuk' => 'TUK USU Digital', 'alamat' => 'Kampus USU Padang Bulan', 'ikon' => 'fas fa-map-marker-alt', 'warna' => 'red'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($tuk as $t)
            <div class="kaca rounded-xl p-5 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 bg-{{ $t['warna'] }}-500/20 rounded-lg flex items-center justify-center"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400"></i></div>
                    <div>
                        <h4 class="text-white font-semibold text-sm">{{ $t['tuk'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $t['kota'] }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-xs"><i class="fas fa-map-pin mr-1 text-gray-600"></i>{{ $t['alamat'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-red-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien">30+</div><p class="text-gray-400 text-sm mt-1">Skema BNSP</p></div>
        <div><div class="text-3xl font-black teks-gradien">5K+</div><p class="text-gray-400 text-sm mt-1">Tersertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien">98%</div><p class="text-gray-400 text-sm mt-1">Tingkat Lulus</p></div>
        <div><div class="text-3xl font-black teks-gradien">15+</div><p class="text-gray-400 text-sm mt-1">LSP Mitra</p></div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan BNSP</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Apa itu Sertifikasi BNSP?', 'durasi' => '10:15', 'views' => '22K', 'warna' => 'red', 'thumb' => 'https://placehold.co/640x360/1a1a2e/EF4444?text=BNSP+Explained'],
            ['judul' => 'Tips Lulus Ujian Kompetensi', 'durasi' => '13:40', 'views' => '18K', 'warna' => 'blue', 'thumb' => 'https://placehold.co/640x360/1a1a2e/3B82F6?text=Tips+Lulus'],
            ['judul' => 'Cara Menyiapkan Portofolio', 'durasi' => '09:55', 'views' => '12K', 'warna' => 'green', 'thumb' => 'https://placehold.co/640x360/1a1a2e/22C55E?text=Portofolio+Guide'],
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
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Apa yang Bisa Anda Lakukan?</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Peserta', 'fitur' => ['Daftar skema sertifikasi BNSP', 'Ikuti kursus persiapan gratis', 'Akses simulasi ujian kompetensi', 'Upload portofolio evidence', 'Track status pendaftaran & hasil', 'Download sertifikat digital BNSP']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Asesor', 'fitur' => ['Buat materi persiapan sertifikasi', 'Kelola bank soal berdasarkan SKKNI', 'Pantau progress peserta ujian', 'Input penilaian asesmen', 'Buat jadwal ujian di TUK', 'Laporan kelulusan per batch']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola skema & unit kompetensi', 'Konfigurasi TUK & jadwal ujian', 'Dashboard analytics sertifikasi', 'Kelola mitra LSP & asesor', 'Terbitkan & distribusi sertifikat', 'Audit log & pelaporan BNSP']],
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
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apa itu sertifikasi BNSP?', 'a' => 'BNSP (Badan Nasional Sertifikasi Profesi) adalah lembaga yang berwenang menyelenggarakan sertifikasi kompetensi kerja di Indonesia. Sertifikat BNSP diakui secara nasional dan membuktikan bahwa pemegangnya memiliki kompetensi sesuai standar SKKNI.'],
        ['q' => 'Berapa lama masa berlaku sertifikat BNSP?', 'a' => 'Sertifikat kompetensi BNSP berlaku selama 3 tahun. Setelah itu, pemegang sertifikat perlu melakukan resertifikasi (asesmen ulang) untuk memperbarui sertifikatnya.'],
        ['q' => 'Apa saja persyaratan mengikuti ujian?', 'a' => 'Persyaratan umum: KTP/identitas, ijazah terakhir, surat keterangan kerja (jika ada), bukti pelatihan/kursus terkait, dan portofolio proyek. Persyaratan spesifik bervariasi per skema.'],
        ['q' => 'Di mana ujian dilaksanakan?', 'a' => 'Ujian dilaksanakan di Tempat Uji Kompetensi (TUK) yang telah diverifikasi LSP. KVT Hub memiliki TUK di 6 kota besar Indonesia dan terus bertambah.'],
        ['q' => 'Berapa biaya sertifikasi BNSP?', 'a' => 'Biaya bervariasi per skema, mulai dari Rp 500.000 - Rp 2.500.000. Siswa berprestasi dan penerima beasiswa dapat mengikuti sertifikasi gratis melalui program subsidi KVT Hub.'],
    ];
    @endphp
    <div class="space-y-3">
        @foreach($faq as $idx => $f)
        <details class="kaca rounded-xl group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
            <summary class="p-5 cursor-pointer text-white font-semibold flex items-center justify-between hover:text-red-400 transition">
                {{ $f['q'] }}
                <i class="fas fa-chevron-down text-xs text-gray-500 group-open:rotate-180 transition-transform"></i>
            </summary>
            <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-800/50 pt-4">{{ $f['a'] }}</div>
        </details>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-red-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Raih Sertifikasi Kompetensi Nasional</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar sekarang dan persiapkan diri untuk ujian sertifikasi BNSP. Kursus persiapan gratis untuk semua anggota.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-500 to-rose-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-red-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar Sertifikasi BNSP
        </a>
    </div>
</section>

@endsection
