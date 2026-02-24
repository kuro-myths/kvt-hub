@extends('tata-letak.utama')
@section('judul', 'Layanan Kami - KVT Hub')

@section('konten')
@php
    $layanan = [
        ['judul' => 'Pembelajaran Online', 'deskripsi' => 'Kelas interaktif dengan materi multimedia, kuis real-time, dan tracking progress otomatis untuk pengalaman belajar terbaik.', 'ikon' => 'fas fa-laptop-code', 'warna' => 'kvt', 'fitur' => ['Video & teks interaktif', 'Kuis dengan timer', 'Sertifikat kelulusan', 'Progress tracking']],
        ['judul' => 'Konsultasi Akademik', 'deskripsi' => 'Layanan konsultasi langsung dengan pengajar berpengalaman untuk membimbing perjalanan akademik Anda.', 'ikon' => 'fas fa-user-tie', 'warna' => 'green', 'fitur' => ['Jadwal fleksibel', '1-on-1 dengan mentor', 'Review portofolio', 'Career guidance']],
        ['judul' => 'Sertifikasi Kompetensi', 'deskripsi' => 'Program sertifikasi yang diakui industri untuk meningkatkan kualifikasi dan daya saing profesional.', 'ikon' => 'fas fa-certificate', 'warna' => 'amber', 'fitur' => ['Sertifikat digital', 'Verifikasi blockchain', 'Standar industri', 'Berlaku nasional']],
        ['judul' => 'Manajemen Akademik', 'deskripsi' => 'Sistem lengkap untuk mengelola KRS, nilai, kehadiran, silabus, dan kurikulum dalam satu platform.', 'ikon' => 'fas fa-school', 'warna' => 'purple', 'fitur' => ['KRS & KHS digital', 'Rekap kehadiran', 'Manajemen kurikulum', 'Laporan akademik']],
        ['judul' => 'Komunitas & Networking', 'deskripsi' => 'Forum diskusi, organisasi mahasiswa, study group, dan jaringan alumni untuk memperluas koneksi.', 'ikon' => 'fas fa-users', 'warna' => 'pink', 'fitur' => ['Forum diskusi', 'Organisasi resmi', 'Study group', 'Alumni network']],
        ['judul' => 'Riset & Publikasi', 'deskripsi' => 'Dukungan riset ilmiah, publikasi jurnal, kolaborasi penelitian, dan akses repositori open access.', 'ikon' => 'fas fa-flask', 'warna' => 'teal', 'fitur' => ['Jurnal online', 'Kolaborasi riset', 'Open access repo', 'Konferensi virtual']],
    ];

    $keunggulan = [
        ['angka' => '99.9%', 'label' => 'Uptime Platform', 'ikon' => 'fas fa-server', 'warna' => 'green'],
        ['angka' => '24/7', 'label' => 'Dukungan Teknis', 'ikon' => 'fas fa-headset', 'warna' => 'kvt'],
        ['angka' => '50K+', 'label' => 'Pengguna Aktif', 'ikon' => 'fas fa-users', 'warna' => 'purple'],
        ['angka' => '100%', 'label' => 'Keamanan Data', 'ikon' => 'fas fa-shield-alt', 'warna' => 'red'],
    ];

    $proses = [
        ['no' => '01', 'judul' => 'Daftar Akun', 'deskripsi' => 'Buat akun gratis dalam hitungan detik. Dukung login via Google & GitHub.', 'ikon' => 'fas fa-user-plus', 'warna' => 'kvt'],
        ['no' => '02', 'judul' => 'Pilih Layanan', 'deskripsi' => 'Jelajahi dan pilih layanan yang sesuai kebutuhan akademik Anda.', 'ikon' => 'fas fa-th-large', 'warna' => 'green'],
        ['no' => '03', 'judul' => 'Mulai Belajar', 'deskripsi' => 'Akses materi, ikuti kelas, kerjakan kuis, dan kumpulkan XP.', 'ikon' => 'fas fa-play-circle', 'warna' => 'amber'],
        ['no' => '04', 'judul' => 'Raih Pencapaian', 'deskripsi' => 'Dapatkan sertifikat, naik level, dan bangun portofolio profesional.', 'ikon' => 'fas fa-trophy', 'warna' => 'purple'],
    ];
@endphp

{{-- ===== HERO ===== --}}
<section class="min-h-[70vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-purple-950"></div>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-kvt-500 rounded-full filter blur-[100px]"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-purple-600 rounded-full filter blur-[120px]"></div>
    </div>
    <div class="max-w-6xl mx-auto px-6 py-20 relative z-10 text-center">
        <div class="inline-flex items-center gap-2 bg-kvt-800/60 px-4 py-2 rounded-full text-kvt-300 text-sm mb-6 border border-kvt-700/30" data-aos="fade-down">
            <i class="fas fa-concierge-bell"></i>
            <span>Layanan Platform</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight" data-aos="fade-up">
            Layanan <span class="teks-gradien">Terlengkap</span>
            <br>untuk Kebutuhan Akademik
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            Dari pembelajaran online hingga sertifikasi — KVT Hub menyediakan semua layanan
            yang dibutuhkan untuk perjalanan akademik dan profesional Anda.
        </p>
        <div class="flex flex-wrap justify-center gap-4" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="px-8 py-4 bg-gradient-to-r from-kvt-600 to-kvt-500 hover:from-kvt-500 hover:to-kvt-400 text-white font-bold rounded-xl transition-all hover:scale-105 shadow-lg shadow-kvt-600/30">
                <i class="fas fa-rocket mr-2"></i> Mulai Sekarang
            </a>
            <a href="#layanan" class="px-8 py-4 bg-kvt-800/60 hover:bg-kvt-700/60 text-white font-bold rounded-xl transition border border-kvt-700/30">
                <i class="fas fa-arrow-down mr-2"></i> Lihat Layanan
            </a>
        </div>
    </div>
</section>

{{-- ===== KEUNGGULAN BAR ===== --}}
<section class="py-12 bg-kvt-950 border-b border-kvt-800/30">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($keunggulan as $i => $item)
            <div class="text-center" data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 bg-{{ $item['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3">
                    <i class="{{ $item['ikon'] }} text-{{ $item['warna'] }}-400 text-xl"></i>
                </div>
                <div class="text-2xl md:text-3xl font-extrabold text-white">{{ $item['angka'] }}</div>
                <div class="text-sm text-gray-400 mt-1">{{ $item['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== DAFTAR LAYANAN ===== --}}
<section id="layanan" class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-kvt-500/20 text-kvt-400 rounded-full text-sm font-semibold">
                <i class="fas fa-concierge-bell mr-1"></i> Layanan Kami
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Apa yang Kami Tawarkan</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ekosistem layanan lengkap untuk mendukung kebutuhan pendidikan dan pengembangan profesional</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($layanan as $i => $item)
            <div class="kaca rounded-2xl p-6 hover:border-{{ $item['warna'] }}-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-14 h-14 bg-{{ $item['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="{{ $item['ikon'] }} text-{{ $item['warna'] }}-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold text-xl mb-2">{{ $item['judul'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">{{ $item['deskripsi'] }}</p>
                <ul class="space-y-2">
                    @foreach($item['fitur'] as $fitur)
                    <li class="flex items-center gap-2 text-sm text-gray-300">
                        <i class="fas fa-check-circle text-{{ $item['warna'] }}-400 text-xs"></i>
                        {{ $fitur }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== PROSES KERJA ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-green-500/20 text-green-400 rounded-full text-sm font-semibold">
                <i class="fas fa-route mr-1"></i> Cara Kerja
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Mudah Dimulai</h2>
            <p class="text-gray-400 mt-3">4 langkah sederhana untuk memulai perjalanan Anda</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($proses as $i => $step)
            <div class="relative text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="kaca rounded-2xl p-6 hover:border-{{ $step['warna'] }}-500/30 transition">
                    <div class="w-16 h-16 bg-{{ $step['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="{{ $step['ikon'] }} text-{{ $step['warna'] }}-400 text-2xl"></i>
                    </div>
                    <span class="text-xs text-gray-600 font-bold">LANGKAH {{ $step['no'] }}</span>
                    <h4 class="text-white font-bold text-lg mt-1 mb-2">{{ $step['judul'] }}</h4>
                    <p class="text-gray-400 text-sm">{{ $step['deskripsi'] }}</p>
                </div>
                @if(!$loop->last)
                <div class="hidden lg:block absolute top-1/2 -right-3 text-kvt-600">
                    <i class="fas fa-chevron-right"></i>
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== TESTIMONI ===== --}}
<section class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-amber-500/20 text-amber-400 rounded-full text-sm font-semibold">
                <i class="fas fa-quote-left mr-1"></i> Testimoni
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Kata Mereka</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up">
            @php
                $testimoni = [
                    ['nama' => 'Rina Kartika', 'peran' => 'Mahasiswa Informatika', 'teks' => 'Layanan KVT Hub sangat membantu proses belajar saya. Materinya lengkap dan sistem gamifikasinya membuat belajar jadi menyenangkan!', 'rating' => 5],
                    ['nama' => 'Budi Santoso, M.Pd', 'peran' => 'Dosen & Pengajar', 'teks' => 'Manajemen akademik jadi jauh lebih efisien. KRS, nilai, silabus semua terintegrasi dengan baik dalam satu platform.', 'rating' => 5],
                    ['nama' => 'Dewi Lestari', 'peran' => 'Staff Administrasi', 'teks' => 'Dashboard admin sangat lengkap dan mudah dipahami. Rekap kehadiran dan laporan akademik bisa dihasilkan dalam hitungan detik.', 'rating' => 5],
                ];
            @endphp

            @foreach($testimoni as $t)
            <div class="kaca rounded-2xl p-6">
                <div class="flex gap-1 mb-3">
                    @for($s = 0; $s < $t['rating']; $s++)
                    <i class="fas fa-star text-amber-400 text-sm"></i>
                    @endfor
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-4 italic">"{{ $t['teks'] }}"</p>
                <div class="flex items-center gap-3 border-t border-kvt-700/30 pt-4">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($t['nama']) }}&background=3399FF&color=fff&size=40" class="w-10 h-10 rounded-full" alt="">
                    <div>
                        <div class="text-white font-semibold text-sm">{{ $t['nama'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $t['peran'] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== FAQ ===== --}}
<section class="py-20 bg-kvt-950">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <span class="px-4 py-1.5 bg-kvt-500/20 text-kvt-400 rounded-full text-sm font-semibold">
                <i class="fas fa-question-circle mr-1"></i> FAQ
            </span>
            <h2 class="text-3xl md:text-4xl font-extrabold text-white mt-4">Pertanyaan Umum</h2>
        </div>

        @php
            $faqs = [
                ['q' => 'Apakah semua layanan gratis?', 'a' => 'Sebagian besar layanan tersedia gratis. Untuk fitur premium seperti sertifikasi dan konsultasi 1-on-1, tersedia paket berlangganan dengan harga terjangkau.'],
                ['q' => 'Bagaimana cara mendaftar?', 'a' => 'Klik tombol "Mulai Sekarang" atau kunjungi halaman Daftar. Anda bisa mendaftar dengan email, Google, atau GitHub.'],
                ['q' => 'Apakah sertifikat diakui?', 'a' => 'Ya! Sertifikat KVT Hub diverifikasi secara digital dan memenuhi standar kompetensi nasional.'],
                ['q' => 'Bisa diakses dari perangkat apa saja?', 'a' => 'KVT Hub sepenuhnya responsive dan bisa diakses dari desktop, tablet, maupun smartphone melalui browser.'],
                ['q' => 'Bagaimana jika butuh bantuan teknis?', 'a' => 'Tim support kami tersedia 24/7 melalui halaman Bantuan, email, atau chat langsung dengan VTuber AI Kuro.'],
            ];
        @endphp

        <div class="space-y-3" data-aos="fade-up">
            @foreach($faqs as $faq)
            <div class="kaca rounded-xl overflow-hidden faq-item">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full px-6 py-4 text-left flex items-center justify-between gap-4 hover:bg-kvt-800/20 transition">
                    <span class="text-white font-semibold">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-sm faq-chevron transition-transform duration-300"></i>
                </button>
                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300">
                    <div class="px-6 pb-4 text-gray-400 text-sm">{{ $faq['a'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CTA ===== --}}
<section class="py-20 bg-gradient-to-b from-kvt-950 to-kvt-900">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="zoom-in">
        <div class="kaca rounded-3xl p-10 md:p-14 relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-kvt-600/10 to-purple-600/10"></div>
            <div class="relative z-10">
                <i class="fas fa-concierge-bell text-5xl text-kvt-400 mb-6 block"></i>
                <h2 class="text-3xl md:text-4xl font-extrabold text-white mb-4">Siap Menggunakan Layanan Kami?</h2>
                <p class="text-gray-400 max-w-2xl mx-auto mb-8">
                    Bergabung dengan ribuan pengguna yang sudah merasakan manfaat layanan KVT Hub untuk perjalanan akademik mereka.
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('daftar') }}" class="px-8 py-4 bg-gradient-to-r from-kvt-600 to-purple-600 hover:from-kvt-500 hover:to-purple-500 text-white font-bold rounded-xl transition-all hover:scale-105 shadow-lg shadow-kvt-600/30">
                        <i class="fas fa-rocket mr-2"></i> Daftar Gratis
                    </a>
                    <a href="{{ route('halaman.bantuan') }}" class="px-8 py-4 bg-kvt-800/60 hover:bg-kvt-700/60 text-white font-bold rounded-xl transition border border-kvt-700/30">
                        <i class="fas fa-life-ring mr-2"></i> Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
<style>
.faq-open .faq-chevron { transform: rotate(180deg); }
.faq-open .faq-answer { max-height: 200px; }
</style>
@endpush
@endsection
