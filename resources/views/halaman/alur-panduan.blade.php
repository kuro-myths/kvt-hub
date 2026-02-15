@extends('tata-letak.utama')
@section('judul', 'Alur & Panduan - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-project-diagram"></i> Workflow, Flowchart & SOP
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Alur &</span><br>
            <span class="teks-gradien">Panduan Pengguna</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Visualisasi alur lengkap platform KVT Hub — dari pendaftaran hingga lulus sertifikasi.
            Flowchart interaktif, panduan langkah demi langkah, dan SOP untuk setiap peran pengguna.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#alur-utama" class="bg-gradient-to-r from-teal-500 to-cyan-500 hover:from-teal-400 hover:to-cyan-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-teal-500/30 hover:-translate-y-0.5">
                <i class="fas fa-sitemap mr-2"></i>Lihat Alur Utama
            </a>
            <a href="#panduan" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-book mr-2"></i>Baca Panduan
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">15+</div><div class="text-xs text-gray-500">Flowchart</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Step-by-Step Guide</div></div>
            <div><div class="text-2xl font-black text-white">3</div><div class="text-xs text-gray-500">Peran Pengguna</div></div>
            <div><div class="text-2xl font-black text-white">12</div><div class="text-xs text-gray-500">SOP Dokumen</div></div>
        </div>
        <div class="mt-12" data-aos="fade-up" data-aos-delay="400">
            <img src="{{ asset('images/flowchart-alur.svg') }}" alt="Flowchart Alur" class="w-full max-w-3xl mx-auto rounded-2xl shadow-2xl shadow-teal-500/10 border border-teal-700/20">
        </div>
    </div>
</section>

{{-- ALUR UTAMA PLATFORM --}}
<section id="alur-utama" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-16" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">ALUR UTAMA</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Pengguna di KVT Hub</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari pendaftaran hingga pencapaian — setiap langkah tervisualisasi jelas</p>
    </div>
    {{-- Flowchart visual --}}
    <div class="relative" data-aos="fade-up">
        @php
        $steps = [
            ['ikon' => 'fas fa-user-plus', 'warna' => 'blue', 'judul' => 'Pendaftaran', 'desc' => 'Daftar akun baru dengan email atau SSO. Pilih peran: siswa, guru, atau admin.', 'sub' => 'Form → Verifikasi Email → Aktivasi Akun'],
            ['ikon' => 'fas fa-user-check', 'warna' => 'green', 'judul' => 'Profil & Onboarding', 'desc' => 'Lengkapi profil, pilih jenjang pendidikan, dan minat mata pelajaran.', 'sub' => 'Data Diri → Pilih Jenjang → Set Preferensi'],
            ['ikon' => 'fas fa-search', 'warna' => 'yellow', 'judul' => 'Jelajahi Platform', 'desc' => 'Telusuri katalog kelas, materi, kuis, dan program sertifikasi.', 'sub' => 'Cari → Filter → Preview Konten'],
            ['ikon' => 'fas fa-play-circle', 'warna' => 'cyan', 'judul' => 'Mulai Belajar', 'desc' => 'Daftar ke kelas, akses materi video/dokumen, dan mulai perjalanan belajar.', 'sub' => 'Enroll → Akses Materi → Tandai Progress'],
            ['ikon' => 'fas fa-clipboard-check', 'warna' => 'purple', 'judul' => 'Asesmen & Kuis', 'desc' => 'Ikuti kuis, ujian, dan asesmen formatif. Lihat hasil dan pembahasan.', 'sub' => 'Kuis → Review → Perbaiki Jawaban'],
            ['ikon' => 'fas fa-trophy', 'warna' => 'amber', 'judul' => 'Pencapaian & Sertifikat', 'desc' => 'Raih badge, XP, dan sertifikat digital. Bagikan ke profil LinkedIn.', 'sub' => 'Badge → Sertifikat → Portfolio Digital'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
            @foreach($steps as $i => $s)
            <div class="relative text-center group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-{{ $s['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-3 group-hover:bg-{{ $s['warna'] }}-500/30 transition">
                    <i class="{{ $s['ikon'] }} text-{{ $s['warna'] }}-400 text-xl"></i>
                </div>
                <div class="absolute top-8 left-full w-full h-0.5 bg-gradient-to-r from-{{ $s['warna'] }}-500/50 to-transparent hidden md:block {{ $i === count($steps)-1 ? '!hidden' : '' }}"></div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $s['judul'] }}</h4>
                <p class="text-gray-500 text-xs mb-2">{{ $s['desc'] }}</p>
                <div class="text-[10px] text-{{ $s['warna'] }}-400 bg-{{ $s['warna'] }}-500/10 rounded-lg px-2 py-1">{{ $s['sub'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WORKFLOW PER PERAN --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">WORKFLOW PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Workflow Berdasarkan Peran</h2>
        </div>
        @php
        $workflows = [
            ['peran' => 'Siswa', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'steps' => [
                'Login → Dashboard Siswa',
                'Jelajahi kelas & materi tersedia',
                'Daftar kelas (gratis / eksklusif)',
                'Buka materi → Tandai selesai',
                'Ikuti kuis → Lihat hasil & pembahasan',
                'Kumpulkan XP & badge',
                'Unduh sertifikat kelulusan',
                'Gabung study group & diskusi',
            ]],
            ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'steps' => [
                'Login → Dashboard Guru',
                'Buat kelas baru (judul, deskripsi, gambar)',
                'Upload materi (video / dokumen / teks)',
                'Buat kuis (pilihan ganda / essay)',
                'Tugaskan ke siswa & set deadline',
                'Pantau kehadiran (hadir/izin/alpa)',
                'Review jawaban siswa & beri feedback',
                'Generate laporan (30 jenis grafik)',
            ]],
            ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'steps' => [
                'Login → Dashboard Admin',
                'Kelola pengguna (CRUD + ganti peran)',
                'Kelola kelas, materi & kuis global',
                'Kelola berita & pengumuman',
                'Kelola mitra kerja sama',
                'Kelola paket eksklusif & langganan',
                'Konfigurasi kunci admin & keamanan',
                'Lihat analytics & statistik platform',
            ]],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($workflows as $w)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $w['warna'] }}-500/20 hover:border-{{ $w['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $w['gradien'] }} p-5 flex items-center gap-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><i class="{{ $w['ikon'] }} text-white text-xl"></i></div>
                    <h3 class="text-white font-bold text-lg">Alur {{ $w['peran'] }}</h3>
                </div>
                <div class="p-6">
                    <div class="relative pl-6 space-y-4">
                        <div class="absolute left-2 top-1 bottom-1 w-0.5 bg-{{ $w['warna'] }}-500/30"></div>
                        @foreach($w['steps'] as $i => $step)
                        <div class="relative flex items-start gap-3">
                            <div class="absolute -left-6 top-0.5 w-4 h-4 bg-{{ $w['warna'] }}-500/30 rounded-full flex items-center justify-center">
                                <div class="w-2 h-2 bg-{{ $w['warna'] }}-400 rounded-full"></div>
                            </div>
                            <div>
                                <span class="text-{{ $w['warna'] }}-400 text-xs font-mono mr-1">{{ $i + 1 }}.</span>
                                <span class="text-gray-300 text-sm">{{ $step }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PANDUAN LANGKAH DEMI LANGKAH --}}
<section id="panduan" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">PANDUAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Step-by-Step</h2>
    </div>
    @php
    $panduan = [
        ['ikon' => 'fas fa-user-plus', 'warna' => 'blue', 'judul' => 'Cara Mendaftar Akun', 'langkah' => ['Buka halaman Daftar dari menu header', 'Isi nama lengkap, email, dan password', 'Upload foto profil (opsional)', 'Klik "Daftar" dan cek email verifikasi', 'Klik link verifikasi untuk aktivasi akun', 'Login dan lengkapi profil Anda']],
        ['ikon' => 'fas fa-plus-circle', 'warna' => 'green', 'judul' => 'Cara Membuat Kelas (Guru)', 'langkah' => ['Login sebagai Guru ke Dashboard', 'Klik "Buat Kelas Baru" di sidebar', 'Isi nama kelas, deskripsi, dan tingkat', 'Upload gambar cover kelas', 'Set kapasitas dan jadwal kelas', 'Klik "Publikasikan" — kelas siap diakses']],
        ['ikon' => 'fas fa-file-upload', 'warna' => 'purple', 'judul' => 'Cara Upload Materi', 'langkah' => ['Masuk ke kelas yang sudah dibuat', 'Klik tab "Materi" → "Tambah Materi"', 'Pilih tipe: Video, Dokumen, atau Teks', 'Upload file atau paste URL video', 'Isi judul dan deskripsi materi', 'Atur urutan dan publish materi']],
        ['ikon' => 'fas fa-clipboard-list', 'warna' => 'red', 'judul' => 'Cara Mengerjakan Kuis', 'langkah' => ['Buka kelas yang Anda ikuti', 'Klik tab "Kuis" → pilih kuis', 'Baca instruksi dan waktu pengerjaan', 'Jawab setiap pertanyaan dengan teliti', 'Klik "Kirim Jawaban" sebelum batas waktu', 'Lihat hasil, skor, dan pembahasan']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($panduan as $p)
        <div class="kaca rounded-2xl p-6 border-{{ $p['warna'] }}-500/20" data-aos="fade-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-{{ $p['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400"></i></div>
                <h3 class="text-white font-bold">{{ $p['judul'] }}</h3>
            </div>
            <ol class="space-y-2 list-decimal list-inside">
                @foreach($p['langkah'] as $l)
                <li class="text-gray-400 text-sm">{{ $l }}</li>
                @endforeach
            </ol>
        </div>
        @endforeach
    </div>
</section>

{{-- FAQ --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-teal-900/20 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
        </div>
        @php
        $faq = [
            ['q' => 'Apakah harus membayar untuk mengakses platform?', 'a' => 'Tidak. KVT Hub gratis digunakan untuk fitur dasar. Fitur eksklusif seperti kelas premium dan sertifikat resmi membutuhkan paket berlangganan.'],
            ['q' => 'Bagaimana cara mengubah peran dari siswa menjadi guru?', 'a' => 'Hubungi admin melalui halaman kontak atau dashboard. Admin akan memverifikasi dan mengubah peran akun Anda.'],
            ['q' => 'Apakah sertifikat yang diberikan diakui secara resmi?', 'a' => 'Sertifikat KVT Hub dapat diverifikasi via blockchain dan bisa ditambahkan ke LinkedIn. Pengakuan resmi tergantung kebijakan institusi masing-masing.'],
            ['q' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan satu kelas?', 'a' => 'Tergantung kelas. Rata-rata kelas memiliki 10-20 materi yang dapat diselesaikan dalam 2-4 minggu dengan belajar 1 jam per hari.'],
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
    </div>
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Mulai Perjalanan Belajar Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Ikuti alur yang sudah kami rancang — dari pendaftaran hingga sertifikasi, setiap langkah terstruktur.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-cyan-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar Gratis Sekarang
        </a>
    </div>
</section>

@endsection
