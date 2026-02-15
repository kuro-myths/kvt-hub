@extends('tata-letak.utama')
@section('judul', 'Panduan Pengguna Lengkap - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-blue-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-blue-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-sky-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #3B82F6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-blue-800/30 border border-blue-600/30 rounded-full px-4 py-1.5 text-xs text-blue-300 mb-6" data-aos="fade-down">
            <i class="fas fa-book-open"></i> Panduan Lengkap untuk Semua Peran
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Panduan</span><br>
            <span class="teks-gradien">Pengguna Lengkap</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Dokumentasi komprehensif untuk siswa, guru, dan admin. Mulai dari getting started,
            tutorial fitur, troubleshooting, hingga tips & trik untuk menggunakan KVT Hub secara optimal.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#getting-started" class="bg-gradient-to-r from-blue-500 to-sky-500 hover:from-blue-400 hover:to-sky-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-blue-500/30 hover:-translate-y-0.5">
                <i class="fas fa-play-circle mr-2"></i>Getting Started
            </a>
            <a href="#tutorial" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-graduation-cap mr-2"></i>Tutorial Fitur
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">3</div><div class="text-xs text-gray-500">Peran Pengguna</div></div>
            <div><div class="text-2xl font-black text-white">25+</div><div class="text-xs text-gray-500">Tutorial</div></div>
            <div><div class="text-2xl font-black text-white">10</div><div class="text-xs text-gray-500">Shortcut</div></div>
            <div><div class="text-2xl font-black text-white">20+</div><div class="text-xs text-gray-500">Tips & Trik</div></div>
        </div>
    </div>
</section>

{{-- GETTING STARTED PER ROLE --}}
<section id="getting-started" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">GETTING STARTED</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Memulai per Peran</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Langkah pertama untuk setiap jenis pengguna di KVT Hub</p>
    </div>
    @php
    $started = [
        ['peran' => 'Siswa / Pelajar', 'ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'langkah' => [
            ['judul' => 'Buat Akun', 'desc' => 'Klik "Daftar" di header, isi nama, email, dan password. Verifikasi email Anda.'],
            ['judul' => 'Lengkapi Profil', 'desc' => 'Upload foto, pilih jenjang pendidikan, dan set preferensi mata pelajaran.'],
            ['judul' => 'Jelajahi Kelas', 'desc' => 'Browse katalog kelas tersedia, baca deskripsi, dan daftar ke kelas yang diminati.'],
            ['judul' => 'Mulai Belajar', 'desc' => 'Buka materi, tonton video, baca dokumen, dan tandai progress Anda.'],
            ['judul' => 'Kerjakan Kuis', 'desc' => 'Uji pemahaman dengan mengikuti kuis. Lihat hasil dan pembahasan detail.'],
            ['judul' => 'Raih Pencapaian', 'desc' => 'Kumpulkan XP, badge, dan download sertifikat kelulusan kelas.'],
        ]],
        ['peran' => 'Guru / Pengajar', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'langkah' => [
            ['judul' => 'Daftar sebagai Guru', 'desc' => 'Buat akun dan minta admin untuk mengubah peran Anda menjadi guru.'],
            ['judul' => 'Buat Kelas Pertama', 'desc' => 'Dari dashboard, klik "Buat Kelas". Isi judul, deskripsi, dan upload cover.'],
            ['judul' => 'Upload Materi', 'desc' => 'Tambahkan materi berupa video, PDF, atau teks ke dalam kelas Anda.'],
            ['judul' => 'Buat Kuis', 'desc' => 'Buat soal pilihan ganda atau essay. Set waktu, bobot, dan kunci jawaban.'],
            ['judul' => 'Kelola Kehadiran', 'desc' => 'Input absensi harian siswa: hadir, izin, atau alpa. Monitor persentase.'],
            ['judul' => 'Lihat Laporan', 'desc' => 'Generate laporan performa siswa dengan 30+ jenis grafik dan diagram.'],
        ]],
        ['peran' => 'Administrator', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'langkah' => [
            ['judul' => 'Akses Dashboard Admin', 'desc' => 'Login dengan akun admin. Anda akan diarahkan ke panel administrasi.'],
            ['judul' => 'Kelola Pengguna', 'desc' => 'Tambah, edit, hapus pengguna. Ubah peran antara siswa, guru, dan admin.'],
            ['judul' => 'Kelola Konten', 'desc' => 'CRUD berita, mitra kerja sama, sponsor, dan pengumuman platform.'],
            ['judul' => 'Konfigurasi Sistem', 'desc' => 'Atur paket eksklusif, kunci keamanan, dan parameter sistem.'],
            ['judul' => 'Monitor Analytics', 'desc' => 'Pantau statistik pengguna, traffic, dan performa platform real-time.'],
            ['judul' => 'Audit & Keamanan', 'desc' => 'Review audit log, kelola session, dan pastikan kepatuhan keamanan.'],
        ]],
    ];
    @endphp
    <div class="space-y-8">
        @foreach($started as $s)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $s['warna'] }}-500/20" data-aos="fade-up">
            <div class="bg-gradient-to-r {{ $s['gradien'] }} p-5 flex items-center gap-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><i class="{{ $s['ikon'] }} text-white text-xl"></i></div>
                <div><h3 class="text-white font-bold text-xl">{{ $s['peran'] }}</h3><p class="text-white/70 text-sm">Panduan langkah demi langkah</p></div>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach($s['langkah'] as $i => $l)
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-{{ $s['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                        <span class="text-{{ $s['warna'] }}-400 text-xs font-bold">{{ $i + 1 }}</span>
                    </div>
                    <div><h4 class="text-white font-semibold text-sm">{{ $l['judul'] }}</h4><p class="text-gray-500 text-xs mt-0.5">{{ $l['desc'] }}</p></div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- TUTORIAL FITUR --}}
<section id="tutorial" class="bg-gradient-to-br from-blue-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-sky-500/10 text-sky-400 px-3 py-1 rounded-full">TUTORIAL</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Tutorial Fitur Platform</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pelajari setiap fitur KVT Hub dengan panduan detail</p>
        </div>
        @php
        $tutorials = [
            ['ikon' => 'fas fa-user-plus', 'warna' => 'blue', 'judul' => 'Registrasi & Login', 'desc' => 'Cara membuat akun baru, verifikasi email, reset password, dan login SSO.', 'durasi' => '5 menit'],
            ['ikon' => 'fas fa-chalkboard', 'warna' => 'green', 'judul' => 'Membuat & Mengelola Kelas', 'desc' => 'CRUD kelas, upload cover, mengatur kapasitas, dan invite siswa.', 'durasi' => '8 menit'],
            ['ikon' => 'fas fa-file-upload', 'warna' => 'purple', 'judul' => 'Upload & Organisasi Materi', 'desc' => 'Upload video, PDF, teks. Atur urutan materi dan set prerequisite.', 'durasi' => '6 menit'],
            ['ikon' => 'fas fa-clipboard-list', 'warna' => 'amber', 'judul' => 'Membuat Kuis & Asesmen', 'desc' => 'Buat soal PG/essay, set timer, bobot nilai, dan auto-grading.', 'durasi' => '10 menit'],
            ['ikon' => 'fas fa-chart-pie', 'warna' => 'rose', 'judul' => 'Laporan & Visualisasi Data', 'desc' => 'Generate 30+ jenis grafik, filter data, dan export ke PDF/Excel.', 'durasi' => '7 menit'],
            ['ikon' => 'fas fa-calendar-check', 'warna' => 'teal', 'judul' => 'Kehadiran & Absensi', 'desc' => 'Input kehadiran harian, rekap bulanan, dan alert ketidakhadiran.', 'durasi' => '4 menit'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($tutorials as $t)
            <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-11 h-11 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center group-hover:scale-110 transition"><i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400"></i></div>
                    <div>
                        <h3 class="text-white font-bold text-sm">{{ $t['judul'] }}</h3>
                        <span class="text-{{ $t['warna'] }}-400 text-xs"><i class="fas fa-clock mr-1"></i>{{ $t['durasi'] }}</span>
                    </div>
                </div>
                <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TROUBLESHOOTING --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">TROUBLESHOOTING</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pemecahan Masalah Umum</h2>
    </div>
    @php
    $masalah = [
        ['masalah' => 'Tidak bisa login setelah daftar', 'solusi' => 'Pastikan Anda sudah verifikasi email. Cek folder spam/junk di inbox. Jika masih gagal, gunakan fitur "Lupa Password" untuk reset.', 'ikon' => 'fas fa-sign-in-alt', 'warna' => 'red'],
        ['masalah' => 'Materi video tidak bisa diputar', 'solusi' => 'Cek koneksi internet Anda. Pastikan browser mendukung HTML5 video. Coba clear cache browser atau gunakan browser lain (Chrome/Firefox).', 'ikon' => 'fas fa-video', 'warna' => 'amber'],
        ['masalah' => 'Kuis tidak muncul di kelas', 'solusi' => 'Kuis mungkin belum dipublikasikan oleh guru. Hubungi guru kelas Anda. Pastikan juga deadline kuis belum berakhir.', 'ikon' => 'fas fa-clipboard', 'warna' => 'purple'],
        ['masalah' => 'Sertifikat tidak bisa diunduh', 'solusi' => 'Pastikan Anda telah menyelesaikan semua materi dan lulus kuis minimum. Cek progress di dashboard — semua item harus 100%.', 'ikon' => 'fas fa-certificate', 'warna' => 'green'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($masalah as $m)
        <div class="kaca rounded-2xl p-6 border-{{ $m['warna'] }}-500/20" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 bg-{{ $m['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0"><i class="{{ $m['ikon'] }} text-{{ $m['warna'] }}-400"></i></div>
                <div>
                    <h4 class="text-white font-bold text-sm mb-2"><i class="fas fa-exclamation-triangle text-{{ $m['warna'] }}-400 mr-2 text-xs"></i>{{ $m['masalah'] }}</h4>
                    <p class="text-gray-400 text-sm">{{ $m['solusi'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- KEYBOARD SHORTCUTS & TIPS --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-blue-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">TIPS & SHORTCUT</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Keyboard Shortcuts & Tips</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
            {{-- Shortcuts --}}
            <div data-aos="fade-up">
                <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-keyboard text-cyan-400 mr-2"></i>Keyboard Shortcuts</h3>
                @php
                $shortcuts = [
                    ['key' => 'Ctrl + D', 'aksi' => 'Buka Dashboard cepat'],
                    ['key' => 'Ctrl + K', 'aksi' => 'Cari kelas atau materi'],
                    ['key' => 'Ctrl + N', 'aksi' => 'Buat item baru (kelas/materi/kuis)'],
                    ['key' => 'Ctrl + S', 'aksi' => 'Simpan perubahan saat edit'],
                    ['key' => 'Ctrl + /', 'aksi' => 'Tampilkan bantuan shortcut'],
                    ['key' => 'Esc', 'aksi' => 'Tutup modal atau popup'],
                    ['key' => 'Ctrl + Enter', 'aksi' => 'Submit form / kirim jawaban'],
                    ['key' => 'Alt + ←', 'aksi' => 'Kembali ke halaman sebelumnya'],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($shortcuts as $sc)
                    <div class="flex items-center justify-between kaca rounded-lg px-4 py-2.5">
                        <span class="text-gray-300 text-sm">{{ $sc['aksi'] }}</span>
                        <kbd class="bg-kvt-700/50 text-cyan-400 text-xs px-2.5 py-1 rounded border border-kvt-600/50 font-mono">{{ $sc['key'] }}</kbd>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- Tips --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <h3 class="text-white font-bold text-lg mb-5"><i class="fas fa-lightbulb text-amber-400 mr-2"></i>Tips & Trik</h3>
                @php
                $tips = [
                    ['tip' => 'Gunakan fitur filter di katalog kelas untuk menemukan kelas sesuai minat dan jenjang Anda.', 'ikon' => 'fas fa-filter', 'warna' => 'blue'],
                    ['tip' => 'Bookmark materi favorit agar mudah diakses kembali dari dashboard Anda.', 'ikon' => 'fas fa-bookmark', 'warna' => 'amber'],
                    ['tip' => 'Aktifkan notifikasi agar tidak ketinggalan deadline kuis dan pengumuman baru.', 'ikon' => 'fas fa-bell', 'warna' => 'green'],
                    ['tip' => 'Review pembahasan kuis setelah submit — pahami jawaban yang benar untuk belajar lebih efektif.', 'ikon' => 'fas fa-redo', 'warna' => 'purple'],
                    ['tip' => 'Manfaatkan study group untuk diskusi dan kolaborasi dengan sesama pelajar.', 'ikon' => 'fas fa-users', 'warna' => 'cyan'],
                    ['tip' => 'Upload materi secara bertahap agar siswa bisa belajar step-by-step tanpa overwhelm.', 'ikon' => 'fas fa-layer-group', 'warna' => 'rose'],
                    ['tip' => 'Cek analytics di dashboard secara berkala untuk memahami progress dan area perbaikan.', 'ikon' => 'fas fa-chart-line', 'warna' => 'teal'],
                    ['tip' => 'Gunakan dark mode untuk kenyamanan belajar di malam hari — KVT Hub sudah dark by default!', 'ikon' => 'fas fa-moon', 'warna' => 'violet'],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($tips as $t)
                    <div class="flex items-start gap-3 kaca rounded-lg px-4 py-2.5">
                        <i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-sm mt-0.5"></i>
                        <span class="text-gray-300 text-sm">{{ $t['tip'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Apakah panduan ini selalu diperbarui?', 'a' => 'Ya. Tim KVT Hub secara rutin memperbarui dokumentasi setiap kali ada fitur baru atau perubahan pada platform.'],
        ['q' => 'Di mana saya bisa mendapatkan bantuan langsung?', 'a' => 'Anda bisa menghubungi tim support melalui halaman FAQ & Pusat Bantuan, atau email langsung ke support@kvthub.id.'],
        ['q' => 'Apakah tersedia video tutorial?', 'a' => 'Ya, setiap tutorial memiliki versi video yang bisa diakses di channel YouTube KVT Hub serta di halaman tutorial platform.'],
        ['q' => 'Bisakah saya request tutorial untuk fitur tertentu?', 'a' => 'Tentu! Kirimkan request Anda melalui form feedback di dashboard atau hubungi tim support kami.'],
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
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-blue-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Siap Memulai Perjalanan Belajar?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Dengan panduan lengkap ini, Anda sudah siap memanfaatkan semua fitur KVT Hub secara maksimal.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-500 to-sky-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-blue-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-rocket"></i> Daftar & Mulai Belajar
        </a>
    </div>
</section>

@endsection
