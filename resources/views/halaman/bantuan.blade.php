@extends('tata-letak.utama')
@section('judul', 'Pusat Bantuan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute top-0 left-0 w-full h-full opacity-5" style="background-image: radial-gradient(circle at 20% 50%, rgba(51,153,255,0.4) 0%, transparent 40%), radial-gradient(circle at 80% 50%, rgba(139,92,246,0.3) 0%, transparent 40%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-5 py-2 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-life-ring"></i> Pusat Bantuan
        </div>
        <h1 class="text-4xl md:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Pusat </span><span class="teks-gradien">Bantuan</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10" data-aos="fade-up" data-aos-delay="100">
            Temukan jawaban atas pertanyaan Anda, pelajari cara menggunakan fitur, atau hubungi tim support kami.
        </p>
        {{-- Search --}}
        <div class="max-w-xl mx-auto relative" data-aos="fade-up" data-aos-delay="200">
            <input type="text" id="bantuanSearch" placeholder="Cari bantuan... (contoh: cara daftar, reset password)" class="w-full bg-kvt-900/80 border border-kvt-700/30 rounded-2xl px-6 py-4 pl-12 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500/50 transition" onkeyup="filterFAQ(this.value)">
            <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-500"></i>
        </div>
    </div>
</section>

{{-- Quick Links --}}
<section class="border-b border-kvt-700/20 bg-kvt-900/30">
    <div class="max-w-7xl mx-auto px-4 py-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $quickLinks = [
                    ['ikon' => 'fa-rocket', 'judul' => 'Memulai', 'desc' => 'Panduan untuk pengguna baru', 'warna' => 'kvt', 'link' => '#memulai'],
                    ['ikon' => 'fa-graduation-cap', 'judul' => 'Akademik', 'desc' => 'Kelas, materi, dan kuis', 'warna' => 'green', 'link' => '#akademik'],
                    ['ikon' => 'fa-user-cog', 'judul' => 'Akun', 'desc' => 'Profil dan pengaturan', 'warna' => 'amber', 'link' => '#akun'],
                    ['ikon' => 'fa-credit-card', 'judul' => 'Pembayaran', 'desc' => 'Langganan dan refund', 'warna' => 'purple', 'link' => '#pembayaran'],
                ];
            @endphp
            @foreach($quickLinks as $i => $ql)
                <a href="{{ $ql['link'] }}" class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 hover:border-{{ $ql['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-12 h-12 bg-{{ $ql['warna'] }}-500/10 rounded-xl flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                        <i class="fas {{ $ql['ikon'] }} text-{{ $ql['warna'] }}-400 text-lg"></i>
                    </div>
                    <h3 class="text-white font-bold text-sm">{{ $ql['judul'] }}</h3>
                    <p class="text-gray-500 text-xs mt-1">{{ $ql['desc'] }}</p>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Memulai --}}
<section class="max-w-4xl mx-auto px-4 py-16" id="memulai">
    <div class="flex items-center gap-3 mb-8" data-aos="fade-up">
        <div class="w-10 h-10 bg-kvt-500/10 rounded-xl flex items-center justify-center">
            <i class="fas fa-rocket text-kvt-400"></i>
        </div>
        <h2 class="text-2xl font-black text-white">Memulai di KVT Hub</h2>
    </div>
    @php
        $faqMemulai = [
            ['q' => 'Bagaimana cara mendaftar?', 'a' => 'Klik tombol "Daftar" di halaman utama, isi data diri Anda (nama, email, password), pilih peran (Siswa/Pengajar/Staff), dan verifikasi email. Anda juga bisa mendaftar menggunakan akun Google atau GitHub.'],
            ['q' => 'Apa saja peran yang tersedia?', 'a' => 'Tersedia 4 peran: <strong>Siswa</strong> (belajar & ikut kuis), <strong>Pengajar</strong> (buat kelas & materi), <strong>Staff</strong> (kelola organisasi), dan <strong>Admin</strong> (kelola platform). Peran Admin hanya bisa diaktifkan oleh admin existing.'],
            ['q' => 'Bagaimana cara menggunakan fitur gamifikasi?', 'a' => 'Gamifikasi otomatis aktif! Setiap aktivitas (login, baca materi, kuis) memberikan XP. Anda naik level dari 1-100 dan mendapatkan badge. Cek progress di Dashboard atau halaman Akun.'],
            ['q' => 'Apakah KVT Hub bisa diakses di HP?', 'a' => 'Ya! KVT Hub sepenuhnya responsive. Tampilan otomatis menyesuaikan ukuran layar. Kami juga menyediakan menu mobile dengan navigasi accordion untuk kemudahan akses.'],
        ];
    @endphp
    <div class="space-y-3 faq-section">
        @foreach($faqMemulai as $i => $item)
            <div class="faq-item kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm faq-question"><i class="fas fa-question-circle text-kvt-400 mr-2"></i>{{ $item['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-xs transition-transform duration-300"></i>
                </button>
                <div class="hidden px-5 pb-5">
                    <p class="text-gray-400 text-sm leading-relaxed">{!! $item['a'] !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- FAQ Akademik --}}
<section class="bg-kvt-900/30 py-16" id="akademik">
    <div class="max-w-4xl mx-auto px-4">
        <div class="flex items-center gap-3 mb-8" data-aos="fade-up">
            <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-graduation-cap text-green-400"></i>
            </div>
            <h2 class="text-2xl font-black text-white">Akademik & Pembelajaran</h2>
        </div>
        @php
            $faqAkademik = [
                ['q' => 'Bagaimana cara mengikuti kelas?', 'a' => 'Login → buka halaman Kelas → cari atau gunakan kode kelas dari pengajar → klik "Gabung". Setelah bergabung, Anda bisa mengakses semua materi dan kuis di kelas tersebut.'],
                ['q' => 'Apakah sertifikat diakui?', 'a' => 'Sertifikat KVT Hub diakui oleh mitra industri dan institusi pendidikan yang bekerja sama. Sertifikat dilengkapi QR code verifikasi dan unique ID yang bisa dicek keasliannya di platform.'],
                ['q' => 'Bagaimana sistem kuis bekerja?', 'a' => 'Setiap kelas memiliki kuis dengan berbagai tipe soal (pilihan ganda, essay, dll). Kuis dijadwalkan oleh pengajar. Nilai otomatis masuk ke sistem dan berpengaruh pada XP gamifikasi.'],
                ['q' => 'Bisakah saya download materi?', 'a' => 'Pengguna Premium bisa download materi dalam format PDF. Pengguna Gratis bisa membaca semua materi secara online. Materi yang bisa didownload ditandai dengan ikon download.'],
                ['q' => 'Ada berapa jenjang pendidikan?', 'a' => 'KVT Hub mendukung <strong>13 jenjang</strong>: TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK (3 bidang), Diploma (D1-D4), Sarjana (S1), Magister (S2), Doktoral (S3), Post-Doc, dan Profesi.'],
            ];
        @endphp
        <div class="space-y-3 faq-section">
            @foreach($faqAkademik as $i => $item)
                <div class="faq-item kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                        <span class="text-white font-semibold text-sm faq-question"><i class="fas fa-question-circle text-green-400 mr-2"></i>{{ $item['q'] }}</span>
                        <i class="fas fa-chevron-down text-green-400 text-xs transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-5 pb-5">
                        <p class="text-gray-400 text-sm leading-relaxed">{!! $item['a'] !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Akun --}}
<section class="max-w-4xl mx-auto px-4 py-16" id="akun">
    <div class="flex items-center gap-3 mb-8" data-aos="fade-up">
        <div class="w-10 h-10 bg-amber-500/10 rounded-xl flex items-center justify-center">
            <i class="fas fa-user-cog text-amber-400"></i>
        </div>
        <h2 class="text-2xl font-black text-white">Akun & Pengaturan</h2>
    </div>
    @php
        $faqAkun = [
            ['q' => 'Bagaimana cara reset password?', 'a' => 'Klik "Lupa Password" di halaman login, masukkan email yang terdaftar, lalu cek inbox email untuk link reset. Link berlaku 60 menit.'],
            ['q' => 'Bagaimana cara mengubah profil?', 'a' => 'Login → buka halaman Akun atau Dashboard → klik tombol Edit → ubah nama, foto, bio, atau data lainnya → Simpan.'],
            ['q' => 'Bagaimana cara menghapus akun?', 'a' => 'Untuk keamanan, penghapusan akun harus melalui support. Hubungi support@kvthub.com dengan subject "Hapus Akun". Proses memakan waktu 3-5 hari kerja.'],
            ['q' => 'Apakah data saya aman?', 'a' => 'Data dilindungi dengan enkripsi AES-256, SSL/TLS, 2FA opsional, dan kami comply dengan GDPR. Baca lengkap di halaman Keamanan.'],
        ];
    @endphp
    <div class="space-y-3 faq-section">
        @foreach($faqAkun as $i => $item)
            <div class="faq-item kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm faq-question"><i class="fas fa-question-circle text-amber-400 mr-2"></i>{{ $item['q'] }}</span>
                    <i class="fas fa-chevron-down text-amber-400 text-xs transition-transform duration-300"></i>
                </button>
                <div class="hidden px-5 pb-5">
                    <p class="text-gray-400 text-sm leading-relaxed">{!! $item['a'] !!}</p>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- FAQ Pembayaran --}}
<section class="bg-kvt-900/30 py-16" id="pembayaran">
    <div class="max-w-4xl mx-auto px-4">
        <div class="flex items-center gap-3 mb-8" data-aos="fade-up">
            <div class="w-10 h-10 bg-purple-500/10 rounded-xl flex items-center justify-center">
                <i class="fas fa-credit-card text-purple-400"></i>
            </div>
            <h2 class="text-2xl font-black text-white">Pembayaran & Langganan</h2>
        </div>
        @php
            $faqBayar = [
                ['q' => 'Metode pembayaran apa yang diterima?', 'a' => 'Transfer bank (BCA, Mandiri, BNI, BRI), e-wallet (GoPay, OVO, Dana, ShopeePay), kartu kredit/debit (Visa, Mastercard), dan virtual account.'],
                ['q' => 'Bagaimana cara upgrade ke Premium?', 'a' => 'Login → buka halaman Langganan → pilih paket Premium → pilih metode pembayaran → selesaikan pembayaran. Aktivasi instan setelah pembayaran berhasil.'],
                ['q' => 'Apakah ada garansi uang kembali?', 'a' => 'Ya! 30 hari garansi uang kembali untuk paket Premium. Hubungi support jika tidak puas. Refund diproses dalam 3-5 hari kerja.'],
                ['q' => 'Bisakah saya berhenti berlangganan?', 'a' => 'Tentu! Batal langganan kapan saja dari halaman Akun. Anda tetap bisa menggunakan fitur Premium hingga akhir periode yang sudah dibayar.'],
            ];
        @endphp
        <div class="space-y-3 faq-section">
            @foreach($faqBayar as $i => $item)
                <div class="faq-item kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                        <span class="text-white font-semibold text-sm faq-question"><i class="fas fa-question-circle text-purple-400 mr-2"></i>{{ $item['q'] }}</span>
                        <i class="fas fa-chevron-down text-purple-400 text-xs transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-5 pb-5">
                        <p class="text-gray-400 text-sm leading-relaxed">{!! $item['a'] !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Video Tutorials --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Tutorial <span class="teks-gradien">Video</span></h2>
        <p class="text-gray-400">Panduan visual untuk memaksimalkan penggunaan platform</p>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @php
            $tutorials = [
                ['judul' => 'Cara Mendaftar & Login', 'durasi' => '5:30', 'views' => '12.5K', 'ikon' => 'fa-user-plus', 'warna' => 'kvt'],
                ['judul' => 'Navigasi Menu & Fitur', 'durasi' => '8:15', 'views' => '8.2K', 'ikon' => 'fa-compass', 'warna' => 'green'],
                ['judul' => 'Mengikuti Kelas & Kuis', 'durasi' => '10:45', 'views' => '15.1K', 'ikon' => 'fa-graduation-cap', 'warna' => 'amber'],
                ['judul' => 'Panel Pengaturan Lengkap', 'durasi' => '12:00', 'views' => '6.8K', 'ikon' => 'fa-cogs', 'warna' => 'purple'],
                ['judul' => 'Sistem Gamifikasi & XP', 'durasi' => '7:20', 'views' => '9.3K', 'ikon' => 'fa-gamepad', 'warna' => 'pink'],
                ['judul' => 'Chat dengan Kuro AI', 'durasi' => '4:50', 'views' => '20.7K', 'ikon' => 'fa-robot', 'warna' => 'cyan'],
            ];
        @endphp
        @foreach($tutorials as $i => $tut)
            <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20 hover:border-{{ $tut['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="relative bg-kvt-800/50 h-40 flex items-center justify-center">
                    <div class="w-16 h-16 bg-{{ $tut['warna'] }}-500/20 rounded-full flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-play text-{{ $tut['warna'] }}-400 text-xl ml-1"></i>
                    </div>
                    <span class="absolute bottom-2 right-3 bg-black/60 text-white text-xs px-2 py-0.5 rounded">{{ $tut['durasi'] }}</span>
                </div>
                <div class="p-5">
                    <h3 class="text-white font-bold text-sm mb-2"><i class="fas {{ $tut['ikon'] }} text-{{ $tut['warna'] }}-400 mr-2"></i>{{ $tut['judul'] }}</h3>
                    <div class="flex items-center gap-3 text-gray-500 text-xs">
                        <span><i class="fas fa-eye mr-1"></i>{{ $tut['views'] }} views</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $tut['durasi'] }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Keyboard Shortcuts --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black text-white mb-3">Shortcut <span class="teks-gradien">Keyboard</span></h2>
            <p class="text-gray-400">Percepat navigasi dengan keyboard shortcuts</p>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
            @php
                $shortcuts = [
                    ['key' => 'Ctrl + K', 'desc' => 'Buka pencarian global'],
                    ['key' => 'Ctrl + ,', 'desc' => 'Buka panel pengaturan'],
                    ['key' => 'Ctrl + /', 'desc' => 'Tampilkan bantuan keyboard'],
                    ['key' => 'Esc', 'desc' => 'Tutup popup/modal apapun'],
                    ['key' => 'Alt + H', 'desc' => 'Kembali ke beranda'],
                    ['key' => 'Alt + D', 'desc' => 'Buka dashboard'],
                ];
            @endphp
            @foreach($shortcuts as $i => $sc)
                <div class="flex items-center justify-between bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <span class="text-gray-300 text-sm">{{ $sc['desc'] }}</span>
                    <kbd class="bg-kvt-800 border border-kvt-600/30 text-kvt-300 text-xs px-3 py-1.5 rounded-lg font-mono">{{ $sc['key'] }}</kbd>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SUPPORT RESOURCES & TUTORIALS --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-graduation-cap mr-2"></i>Learning Resources</span>
            <h2 class="text-4xl font-black text-white mt-2">Sumber Daya Pembelajaran</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Akses video tutorial, dokumentasi, dan panduan lengkap untuk semua fitur KVT Hub</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $resources = [
                ['ikon' => 'fa-video', 'judul' => 'Video Tutorial', 'desk' => '100+ video step-by-step dari basic hingga advanced', 'warna' => 'from-red-500 to-pink-500', 'link' => '#', 'count' => '120+'],
                ['ikon' => 'fa-book', 'judul' => 'Dokumentasi', 'desk' => 'Panduan lengkap fitur dengan screenshot & contoh', 'warna' => 'from-blue-500 to-cyan-500', 'link' => '#', 'count' => '50+'],
                ['ikon' => 'fa-file-pdf', 'judul' => 'Panduan PDF', 'desk' => 'E-book & panduan offline yang bisa didownload gratis', 'warna' => 'from-purple-500 to-violet-500', 'link' => '#', 'count' => '25+'],
                ['ikon' => 'fab fa-youtube', 'judul' => 'YouTube Channel', 'desk' => 'Webinar, tutorial, dan tips dari mentor KVT Hub', 'warna' => 'from-orange-500 to-red-600', 'link' => 'https://youtube.com', 'count' => '500+'],
                ['ikon' => 'fa-comments', 'judul' => 'Forum Komunitas', 'desk' => 'Tanya jawab & diskusi dengan pengguna lain & mentor', 'warna' => 'from-green-500 to-emerald-600', 'link' => '#', 'count' => '10K+'],
                ['ikon' => 'fa-code', 'judul' => 'Code Samples', 'desk' => 'Kode contoh & template siap pakai dari proyek real', 'warna' => 'from-gray-600 to-slate-700', 'link' => 'https://github.com', 'count' => '200+'],
                ['ikon' => 'fa-graduation-cap', 'judul' => 'Bootcamp Live', 'desk' => 'Sesi live coding & Q&A dengan developer berpengalaman', 'warna' => 'from-yellow-500 to-amber-600', 'link' => '#', 'count' => '4x/bulan'],
                ['ikon' => 'fa-certificate', 'judul' => 'Cheat Sheets', 'desk' => 'Ringkasan cepat syntaks & best practices programming', 'warna' => 'from-teal-500 to-cyan-600', 'link' => '#', 'count' => '50+'],
            ];
            @endphp

            @foreach($resources as $i => $r)
            <a href="{{ $r['link'] }}" target="{{ str_contains($r['link'], 'http') ? '_blank' : '' }}" class="group bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-300 hover:-translate-y-2 flex flex-col" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $r['warna'] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition shrink-0">
                    <i class="fas {{ $r['ikon'] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $r['judul'] }}</h3>
                <p class="text-gray-400 text-sm mb-4 flex-1">{{ $r['desk'] }}</p>
                <div class="inline-flex items-center gap-1.5 text-kvt-400 font-semibold text-xs group-hover:text-kvt-300 transition">
                    <span>{{ $r['count'] }} resources</span>
                    <i class="fas fa-arrow-right text-[10px]"></i>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO PLAYLIST SECTION --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-16" data-aos="fade-down">
        <h2 class="text-3xl font-black text-white mb-3">Video Tutorial Populer</h2>
        <p class="text-gray-400">Mulai belajar dengan video pilihan yang paling banyak ditonton</p>
    </div>

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Daftar & Setup Profil di KVT Hub', 'durasi' => '5 min', 'views' => '12.5K', 'thumbnail' => 'kvt-setup'],
            ['judul' => 'Tutorial Lengkap Menggunakan Dasbor Siswa', 'durasi' => '12 min', 'views' => '8.3K', 'thumbnail' => 'dasbor-tutorial'],
            ['judul' => 'Cara Membuat & Mengelola Kelas (Untuk Guru)', 'durasi' => '15 min', 'views' => '6.7K', 'thumbnail' => 'kelas-tutorial'],
            ['judul' => 'Konsultasi Karir dengan AI Mentor Kuro', 'durasi' => '8 min', 'views' => '5.4K', 'thumbnail' => 'kuro-konsultasi'],
            ['judul' => 'Tips Maksimalkan XP & Naik Level Cepat', 'durasi' => '7 min', 'views' => '9.2K', 'thumbnail' => 'xp-tips'],
            ['judul' => 'Panduan Mengikuti Kuis & Ujian Online', 'durasi' => '10 min', 'views' => '11.8K', 'thumbnail' => 'kuis-tutorial'],
        ];
        @endphp

        @foreach($videos as $i => $v)
        <a href="#" class="group bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden hover:border-kvt-500/30 transition-all hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="relative aspect-video bg-gradient-to-br from-kvt-800 to-kvt-900 flex items-center justify-center overflow-hidden group-hover:from-kvt-700">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center group-hover:bg-black/30 transition">
                    <div class="w-16 h-16 bg-kvt-500/30 rounded-full flex items-center justify-center group-hover:bg-kvt-500/50 transition">
                        <i class="fas fa-play text-kvt-400 text-2xl ml-1 group-hover:text-kvt-300"></i>
                    </div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h3 class="text-white font-bold text-sm mb-2 line-clamp-2 group-hover:text-kvt-300 transition">{{ $v['judul'] }}</h3>
                <div class="flex items-center justify-between text-xs text-gray-500">
                    <span><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</span>
                    <span class="text-kvt-400 font-semibold">Play →</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>

{{-- TROUBLESHOOTING GUIDE --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl font-black text-white mb-3">Troubleshooting Guide</h2>
            <p class="text-gray-400">Solusi cepat untuk masalah yang sering terjadi</p>
        </div>

        <div class="space-y-3" data-aos="fade-up" data-aos-delay="100">
            @php
            $troubleshoot = [
                ['q' => 'Lupa Password, Bagaimana Cara Reset?', 'a' => 'Klik "Lupa Password" di halaman login → masukkan email terdaftar → verifikasi link di email → buat password baru. Password baru aktif dalam 5 menit.'],
                ['q' => 'Tidak Bisa Login / "Invalid Credentials"?', 'a' => 'Pastikan email dan password sudah benar. Jika email belum verifikasi, cek email spam folder untuk link verifikasi. Jika masih error, hubungi support@kvthub.com'],
                ['q' => 'Halaman Loading Lambat / Website Error 500?', 'a' => 'Coba 1) Refresh halaman (Ctrl+F5) 2) Clear browser cache 3) Coba browser lain 4) Tunggu beberapa menit (server sedang maintenance). Jika persistent, report ke GitHub Issues.'],
                ['q' => 'Video Tidak Bisa Diputar / Buffering Terus?', 'a' => 'Cek koneksi internet Anda. Jika internet cukup kuat, coba: 1) Clear browser cache 2) Disable browser extensions 3) Gunakan video quality lebih rendah (360p) 4) Coba browser berbeda'],
                ['q' => 'Upload File Gagal / File Terlalu Besar?', 'a' => 'Batas upload: 50MB per file. Jika file lebih besar, compress terlebih dahulu atau pisah menjadi beberapa file. Format yang didukung: JPG, PNG, PDF, DOC, XLS, MP4.'],
                ['q' => 'XP Tidak Bertambah Setelah Selesai Materi?', 'a' => 'XP butuh beberapa detik untuk tercatat. Refresh dashboard. Jika masih 0 XP, pastikan materi sudah 100% selesai (watched & scored kuis ≥60%). Lihat riwayat aktivitas Anda.'],
            ];
            @endphp

            @foreach($troubleshoot as $idx => $t)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden group" data-aos="fade-up" data-aos-delay="{{ $idx * 50 }}">
                <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.classList.toggle('bg-kvt-800/30')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold text-sm pr-4"><i class="fas fa-wrench text-orange-400 mr-2"></i>{{ $t['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-xs transition-transform group-hover:rotate-180"></i>
                </button>
                <div class="hidden px-5 pb-5 bg-kvt-800/10 border-t border-kvt-700/20">
                    <p class="text-gray-300 text-sm leading-relaxed">{{ $t['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="relative overflow-hidden kaca rounded-3xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
        <div class="absolute top-0 left-0 w-40 h-40 bg-kvt-500/5 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-40 h-40 bg-ungu-500/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl"></div>
        <div class="relative">
            <div class="w-20 h-20 bg-kvt-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-headset text-kvt-400 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-bold text-white mb-4">Masih Butuh Bantuan?</h2>
            <p class="text-gray-400 mb-8 max-w-md mx-auto">Tim support kami siap membantu 24/7. Rata-rata waktu respons: 2 jam.</p>
            <div class="flex justify-center gap-4 flex-wrap">
                <a href="mailto:support@kvthub.com" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg">
                    <i class="fas fa-envelope mr-2"></i>Email Support
                </a>
                <a href="https://github.com/kuro-myths/kvt-hub/issues" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-6 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                    <i class="fab fa-github mr-2"></i>GitHub Issues
                </a>
                <a href="https://discord.gg" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-6 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                    <i class="fab fa-discord mr-2"></i>Discord Server
                </a>
            </div>
        </div>
    </div>
</section>

@push('skrip')
<script>
function filterFAQ(query) {
    const q = query.toLowerCase();
    document.querySelectorAll('.faq-item').forEach(item => {
        const text = item.querySelector('.faq-question').textContent.toLowerCase();
        item.style.display = text.includes(q) || q === '' ? '' : 'none';
    });
}
</script>
@endpush
@endsection
