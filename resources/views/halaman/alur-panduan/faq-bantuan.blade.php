@extends('tata-letak.utama')
@section('judul', 'FAQ & Pusat Bantuan - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-question-circle"></i> Pusat Bantuan & Informasi
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">FAQ &</span><br>
            <span class="teks-gradien-emas">Pusat Bantuan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Temukan jawaban atas pertanyaan Anda seputar KVT Hub. Mulai dari akun, fitur, hingga teknis —
            pusat bantuan lengkap dengan FAQ, knowledge base, video tutorial, dan kontak support.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#faq-kategori" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-amber-500/30 hover:-translate-y-0.5">
                <i class="fas fa-search mr-2"></i>Cari Jawaban
            </a>
            <a href="#kontak" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-headset mr-2"></i>Hubungi Support
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">40+</div><div class="text-xs text-gray-500">FAQ Terjawab</div></div>
            <div><div class="text-2xl font-black text-white">6</div><div class="text-xs text-gray-500">Kategori Bantuan</div></div>
            <div><div class="text-2xl font-black text-white">10+</div><div class="text-xs text-gray-500">Video Tutorial</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">Support Available</div></div>
        </div>
    </div>
</section>

{{-- FAQ KATEGORI DENGAN ACCORDION --}}
<section id="faq-kategori" class="max-w-5xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Frequently Asked Questions</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pertanyaan yang paling sering ditanyakan, dikelompokkan berdasarkan kategori</p>
    </div>
    @php
    $faqKategori = [
        ['kategori' => 'Akun & Registrasi', 'ikon' => 'fas fa-user-circle', 'warna' => 'blue', 'pertanyaan' => [
            ['q' => 'Bagaimana cara membuat akun di KVT Hub?', 'a' => 'Klik tombol "Daftar" di header website. Isi formulir dengan nama lengkap, email aktif, dan password minimal 8 karakter. Setelah submit, cek email untuk link verifikasi.'],
            ['q' => 'Saya lupa password, bagaimana cara reset?', 'a' => 'Klik "Lupa Password" di halaman login. Masukkan email terdaftar dan cek inbox Anda. Klik link reset password dan buat password baru.'],
            ['q' => 'Apakah bisa mendaftar tanpa email?', 'a' => 'Saat ini email wajib untuk registrasi karena digunakan untuk verifikasi akun dan notifikasi penting. Kami merekomendasikan menggunakan email yang aktif.'],
            ['q' => 'Bagaimana cara mengubah foto profil?', 'a' => 'Masuk ke Dashboard → Profil → klik ikon edit foto. Upload gambar baru (maks 2MB, format JPG/PNG) dan simpan perubahan.'],
        ]],
        ['kategori' => 'Kelas & Materi', 'ikon' => 'fas fa-chalkboard', 'warna' => 'green', 'pertanyaan' => [
            ['q' => 'Bagaimana cara mendaftar ke kelas?', 'a' => 'Browse katalog kelas di halaman Kelas. Klik kelas yang diminati, baca deskripsi, lalu klik "Daftar Kelas". Anda akan otomatis terdaftar dan bisa mengakses materi.'],
            ['q' => 'Apakah ada batas jumlah kelas yang bisa diikuti?', 'a' => 'Untuk akun gratis, Anda bisa mengikuti hingga 5 kelas aktif secara bersamaan. Paket eksklusif memberikan akses unlimited ke semua kelas.'],
            ['q' => 'Materi apa saja yang tersedia?', 'a' => 'KVT Hub menyediakan materi berupa video pembelajaran, dokumen PDF, dan teks interaktif. Setiap materi dilengkapi dengan progress tracker.'],
            ['q' => 'Bisakah saya download materi untuk offline?', 'a' => 'Materi PDF dan dokumen bisa didownload untuk akses offline. Video saat ini hanya bisa ditonton secara streaming melalui platform.'],
        ]],
        ['kategori' => 'Kuis & Penilaian', 'ikon' => 'fas fa-clipboard-check', 'warna' => 'purple', 'pertanyaan' => [
            ['q' => 'Berapa kali saya bisa mengulang kuis?', 'a' => 'Kebijakan pengulangan kuis ditentukan oleh guru masing-masing kelas. Beberapa kuis bisa diulang tanpa batas, sementara yang lain hanya satu kali.'],
            ['q' => 'Apa yang terjadi jika waktu kuis habis?', 'a' => 'Jawaban yang sudah Anda isi akan otomatis tersubmit. Pertanyaan yang belum dijawab akan dianggap kosong dan mendapat nilai 0 untuk soal tersebut.'],
            ['q' => 'Bagaimana sistem penilaian kuis?', 'a' => 'Soal pilihan ganda dinilai otomatis oleh sistem. Soal essay dinilai manual oleh guru. Skor akhir berupa persentase dari total bobot soal.'],
        ]],
        ['kategori' => 'Teknis & Performa', 'ikon' => 'fas fa-cog', 'warna' => 'cyan', 'pertanyaan' => [
            ['q' => 'Browser apa yang didukung?', 'a' => 'KVT Hub optimal di Chrome 90+, Firefox 88+, Safari 14+, dan Edge 90+. Kami merekomendasikan selalu menggunakan versi browser terbaru.'],
            ['q' => 'Mengapa halaman loading lambat?', 'a' => 'Pastikan koneksi internet stabil. Coba clear cache browser (Ctrl+Shift+Del). Jika masih lambat, coba gunakan browser lain atau matikan extension yang tidak perlu.'],
            ['q' => 'Apakah bisa diakses dari mobile?', 'a' => 'Ya! KVT Hub sepenuhnya responsive dan bisa diakses dari smartphone dan tablet. Tampilan otomatis menyesuaikan ukuran layar perangkat Anda.'],
        ]],
    ];
    @endphp
    <div class="space-y-8">
        @foreach($faqKategori as $fk)
        <div data-aos="fade-up">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-10 h-10 bg-{{ $fk['warna'] }}-500/20 rounded-xl flex items-center justify-center"><i class="{{ $fk['ikon'] }} text-{{ $fk['warna'] }}-400"></i></div>
                <h3 class="text-white font-bold text-lg">{{ $fk['kategori'] }}</h3>
            </div>
            <div class="space-y-3">
                @foreach($fk['pertanyaan'] as $p)
                <details class="kaca rounded-xl group">
                    <summary class="cursor-pointer p-5 flex items-center justify-between text-white font-semibold text-sm">
                        {{ $p['q'] }}
                        <i class="fas fa-chevron-down text-gray-500 group-open:rotate-180 transition text-xs ml-4 flex-shrink-0"></i>
                    </summary>
                    <div class="px-5 pb-5 text-gray-400 text-sm border-t border-kvt-700/50 pt-3">{{ $p['a'] }}</div>
                </details>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- KONTAK SUPPORT --}}
<section id="kontak" class="bg-gradient-to-br from-amber-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">SUPPORT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hubungi Tim Support</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Tidak menemukan jawaban? Hubungi kami melalui berbagai channel berikut</p>
        </div>
        @php
        $kontak = [
            ['ikon' => 'fas fa-envelope', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Email Support', 'desc' => 'Kirim pertanyaan detail via email. Respons dalam 1x24 jam kerja.', 'info' => 'support@kvthub.id', 'aksi' => 'Kirim Email'],
            ['ikon' => 'fab fa-whatsapp', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'WhatsApp', 'desc' => 'Chat langsung dengan tim support via WhatsApp Business.', 'info' => '+62 812-3456-7890', 'aksi' => 'Chat WhatsApp'],
            ['ikon' => 'fas fa-comments', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'Live Chat', 'desc' => 'Chat real-time dengan CS kami. Tersedia Senin-Jumat, 08:00-17:00 WIB.', 'info' => 'Rata-rata respons: 5 menit', 'aksi' => 'Mulai Chat'],
            ['ikon' => 'fas fa-phone-alt', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Telepon', 'desc' => 'Hubungi call center kami untuk bantuan darurat atau teknis.', 'info' => '(021) 1234-5678', 'aksi' => 'Telepon Sekarang'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($kontak as $k)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $k['warna'] }}-500/20 hover:border-{{ $k['warna'] }}-500/40 transition group text-center" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $k['gradien'] }} p-5">
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-2 group-hover:scale-110 transition"><i class="{{ $k['ikon'] }} text-white text-xl"></i></div>
                    <h3 class="text-white font-bold">{{ $k['judul'] }}</h3>
                </div>
                <div class="p-5">
                    <p class="text-gray-400 text-sm mb-3">{{ $k['desc'] }}</p>
                    <p class="text-{{ $k['warna'] }}-400 text-sm font-semibold mb-4">{{ $k['info'] }}</p>
                    <button class="w-full bg-{{ $k['warna'] }}-500/10 hover:bg-{{ $k['warna'] }}-500/20 text-{{ $k['warna'] }}-400 text-sm py-2 rounded-lg transition font-semibold">{{ $k['aksi'] }}</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- KNOWLEDGE BASE & VIDEO TUTORIAL --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">RESOURCES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Knowledge Base & Video Tutorial</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        {{-- Knowledge Base --}}
        <div data-aos="fade-up">
            <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-book text-teal-400 mr-2"></i>Knowledge Base</h3>
            @php
            $knowledgeBase = [
                ['judul' => 'Panduan Lengkap Pendaftaran', 'kategori' => 'Akun', 'warna' => 'blue'],
                ['judul' => 'Cara Menggunakan Dashboard', 'kategori' => 'Fitur', 'warna' => 'green'],
                ['judul' => 'Tips Membuat Kelas yang Menarik', 'kategori' => 'Guru', 'warna' => 'amber'],
                ['judul' => 'Panduan Keamanan Akun', 'kategori' => 'Keamanan', 'warna' => 'red'],
                ['judul' => 'Cara Export Laporan ke PDF', 'kategori' => 'Fitur', 'warna' => 'purple'],
                ['judul' => 'Troubleshooting Login Error', 'kategori' => 'Teknis', 'warna' => 'cyan'],
            ];
            @endphp
            <div class="space-y-3">
                @foreach($knowledgeBase as $kb)
                <div class="kaca rounded-lg px-4 py-3 flex items-center justify-between hover:border-{{ $kb['warna'] }}-500/30 transition cursor-pointer group">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-alt text-{{ $kb['warna'] }}-400 text-sm"></i>
                        <span class="text-gray-300 text-sm group-hover:text-white transition">{{ $kb['judul'] }}</span>
                    </div>
                    <span class="text-xs bg-{{ $kb['warna'] }}-500/10 text-{{ $kb['warna'] }}-400 px-2 py-0.5 rounded">{{ $kb['kategori'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
        {{-- Video Tutorial --}}
        <div data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-play-circle text-rose-400 mr-2"></i>Video Tutorial</h3>
            @php
            $videoHelp = [
                ['judul' => 'Mengenal Dashboard KVT Hub', 'durasi' => '5:30', 'warna' => 'blue'],
                ['judul' => 'Cara Membuat & Mengelola Kelas', 'durasi' => '8:15', 'warna' => 'green'],
                ['judul' => 'Tutorial Membuat Kuis Online', 'durasi' => '10:42', 'warna' => 'amber'],
                ['judul' => 'Cara Melihat Laporan & Grafik', 'durasi' => '7:20', 'warna' => 'purple'],
                ['judul' => 'Input Kehadiran Siswa', 'durasi' => '4:55', 'warna' => 'teal'],
                ['judul' => 'Pengaturan Akun & Keamanan', 'durasi' => '6:10', 'warna' => 'red'],
            ];
            @endphp
            <div class="space-y-3">
                @foreach($videoHelp as $vh)
                <div class="kaca rounded-lg px-4 py-3 flex items-center justify-between hover:border-{{ $vh['warna'] }}-500/30 transition cursor-pointer group">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-{{ $vh['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-play text-{{ $vh['warna'] }}-400 text-xs"></i>
                        </div>
                        <span class="text-gray-300 text-sm group-hover:text-white transition">{{ $vh['judul'] }}</span>
                    </div>
                    <span class="text-gray-500 text-xs font-mono">{{ $vh['durasi'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ROLE-SPECIFIC FAQ --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-amber-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">FAQ Khusus per Peran</h2>
        </div>
        @php
        $roleFaq = [
            ['peran' => 'Siswa', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'faq' => [
                ['q' => 'Bagaimana cara melihat progress belajar saya?', 'a' => 'Buka Dashboard Siswa, lihat widget "Progress Saya". Di sana terdapat persentase penyelesaian materi dan skor kuis untuk setiap kelas.'],
                ['q' => 'Bagaimana cara mendapatkan sertifikat?', 'a' => 'Selesaikan semua materi (100%) dan lulus kuis dengan skor minimum. Sertifikat otomatis tersedia untuk diunduh di halaman kelas.'],
                ['q' => 'Bisakah saya keluar dari kelas yang sudah didaftarkan?', 'a' => 'Ya, buka halaman kelas dan klik "Keluar Kelas". Progress Anda akan disimpan jika Anda ingin bergabung kembali.'],
            ]],
            ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'faq' => [
                ['q' => 'Berapa banyak kelas yang bisa saya buat?', 'a' => 'Tidak ada batas jumlah kelas untuk akun guru. Anda bisa membuat sebanyak mungkin kelas sesuai kebutuhan mengajar.'],
                ['q' => 'Bagaimana cara melihat jawaban essay siswa?', 'a' => 'Buka Kuis di kelas Anda → tab "Hasil" → klik nama siswa. Anda bisa melihat jawaban essay dan memberikan skor serta feedback.'],
                ['q' => 'Apakah bisa import soal kuis dari file?', 'a' => 'Saat ini pembuatan kuis dilakukan manual melalui form. Fitur import soal dari CSV/Excel sedang dalam tahap pengembangan.'],
            ]],
            ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'faq' => [
                ['q' => 'Bagaimana cara menambah admin baru?', 'a' => 'Dari panel Admin → Pengguna → pilih user → Ubah Peran menjadi Admin. Pastikan hanya memberikan akses admin kepada orang yang dipercaya.'],
                ['q' => 'Di mana saya bisa melihat audit log?', 'a' => 'Buka Dashboard Admin → menu Keamanan → Audit Log. Anda bisa filter berdasarkan tanggal, jenis aksi, dan pengguna.'],
                ['q' => 'Bagaimana cara mengelola paket eksklusif?', 'a' => 'Masuk ke panel Admin → Paket & Langganan. Di sana Anda bisa CRUD paket eksklusif, mengatur harga, dan melihat subscriber.'],
            ]],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($roleFaq as $rf)
            <div class="kaca rounded-2xl overflow-hidden border-{{ $rf['warna'] }}-500/20" data-aos="fade-up">
                <div class="bg-gradient-to-r {{ $rf['gradien'] }} p-4 flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center"><i class="{{ $rf['ikon'] }} text-white text-lg"></i></div>
                    <h3 class="text-white font-bold">FAQ {{ $rf['peran'] }}</h3>
                </div>
                <div class="p-5 space-y-3">
                    @foreach($rf['faq'] as $f)
                    <details class="group">
                        <summary class="cursor-pointer flex items-start justify-between text-white text-sm font-semibold py-2">
                            <span class="pr-3">{{ $f['q'] }}</span>
                            <i class="fas fa-plus text-gray-500 group-open:hidden text-xs mt-1 flex-shrink-0"></i>
                            <i class="fas fa-minus text-{{ $rf['warna'] }}-400 hidden group-open:inline text-xs mt-1 flex-shrink-0"></i>
                        </summary>
                        <p class="text-gray-400 text-xs pb-2 border-b border-kvt-800/30">{{ $f['a'] }}</p>
                    </details>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- COMMUNITY & LIVE CHAT CTA --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-violet-500/10 text-violet-400 px-3 py-1 rounded-full">KOMUNITAS</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Bergabung dengan Komunitas</h2>
    </div>
    @php
    $komunitas = [
        ['ikon' => 'fab fa-discord', 'warna' => 'indigo', 'judul' => 'Discord Server', 'desc' => 'Gabung server Discord KVT Hub untuk diskusi real-time, tanya jawab, dan networking dengan sesama pengguna.', 'member' => '2.5K+ Members'],
        ['ikon' => 'fab fa-telegram', 'warna' => 'blue', 'judul' => 'Telegram Group', 'desc' => 'Group Telegram resmi untuk update terbaru, tips belajar, dan sharing pengalaman sesama pelajar.', 'member' => '5K+ Members'],
        ['ikon' => 'fab fa-github', 'warna' => 'gray', 'judul' => 'GitHub Discussions', 'desc' => 'Forum diskusi teknis di GitHub untuk bug report, feature request, dan kontribusi open-source.', 'member' => '500+ Contributors'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($komunitas as $km)
        <div class="kaca rounded-2xl p-6 border-{{ $km['warna'] }}-500/20 hover:border-{{ $km['warna'] }}-500/40 transition text-center group" data-aos="fade-up">
            <div class="w-16 h-16 bg-{{ $km['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                <i class="{{ $km['ikon'] }} text-{{ $km['warna'] }}-400 text-2xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $km['judul'] }}</h3>
            <p class="text-gray-400 text-sm mb-3">{{ $km['desc'] }}</p>
            <span class="text-{{ $km['warna'] }}-400 text-xs font-semibold">{{ $km['member'] }}</span>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-amber-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Masih Butuh Bantuan?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Tim support KVT Hub siap membantu Anda. Daftar sekarang untuk mendapatkan akses penuh ke pusat bantuan dan live chat.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-rocket"></i> Daftar Gratis
            </a>
            <button class="inline-flex items-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-4 rounded-xl font-semibold border border-kvt-700/50 transition">
                <i class="fas fa-comments"></i> Live Chat
            </button>
        </div>
    </div>
</section>

@endsection
