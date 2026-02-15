@extends('tata-letak.utama')
@section('judul', 'Dokumen Resmi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-yellow-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-file-alt"></i> Kebijakan, Template & Formulir
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Dokumen</span><br>
            <span class="teks-gradien-emas">Resmi Platform</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pusat dokumentasi resmi KVT Hub — kebijakan privasi, syarat penggunaan, template administrasi,
            formulir pendaftaran, panduan akreditasi, dan dokumen legal yang dibutuhkan.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#dokumen" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-black px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-amber-500/30 hover:-translate-y-0.5">
                <i class="fas fa-folder-open mr-2"></i>Buka Arsip
            </a>
            <a href="#template" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-download mr-2"></i>Unduh Template
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">80+</div><div class="text-xs text-gray-500">Dokumen</div></div>
            <div><div class="text-2xl font-black text-white">25</div><div class="text-xs text-gray-500">Template</div></div>
            <div><div class="text-2xl font-black text-white">15</div><div class="text-xs text-gray-500">Kebijakan</div></div>
            <div><div class="text-2xl font-black text-white">10</div><div class="text-xs text-gray-500">Formulir</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI DOKUMEN --}}
<section id="dokumen" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">ARSIP</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Dokumen</h2>
    </div>
    @php
    $kategori = [
        ['ikon' => 'fas fa-shield-alt', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'Kebijakan & Legal', 'desc' => 'Dokumen hukum, privasi, dan kepatuhan platform.', 'items' => [
            ['nama' => 'Kebijakan Privasi', 'format' => 'PDF', 'ukuran' => '245 KB'],
            ['nama' => 'Syarat & Ketentuan Penggunaan', 'format' => 'PDF', 'ukuran' => '310 KB'],
            ['nama' => 'Kebijakan Cookie', 'format' => 'PDF', 'ukuran' => '128 KB'],
            ['nama' => 'Lisensi & Hak Cipta', 'format' => 'PDF', 'ukuran' => '189 KB'],
            ['nama' => 'Perjanjian Mitra Kerja Sama', 'format' => 'DOCX', 'ukuran' => '456 KB'],
        ]],
        ['ikon' => 'fas fa-graduation-cap', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Akademik & Kurikulum', 'desc' => 'Standar akademik, pedoman penilaian, dan panduan pembelajaran.', 'items' => [
            ['nama' => 'Pedoman Akademik 2025/2026', 'format' => 'PDF', 'ukuran' => '1.2 MB'],
            ['nama' => 'Standar Penilaian & Asesmen', 'format' => 'PDF', 'ukuran' => '678 KB'],
            ['nama' => 'Panduan Tugas Akhir / Skripsi', 'format' => 'DOCX', 'ukuran' => '890 KB'],
            ['nama' => 'Rubrik Penilaian Universal', 'format' => 'XLSX', 'ukuran' => '234 KB'],
            ['nama' => 'Kalender Akademik 2025/2026', 'format' => 'PDF', 'ukuran' => '156 KB'],
        ]],
        ['ikon' => 'fas fa-award', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Sertifikasi & Akreditasi', 'desc' => 'Pedoman sertifikasi, akreditasi, dan penjaminan mutu.', 'items' => [
            ['nama' => 'Pedoman Sertifikasi Kompetensi', 'format' => 'PDF', 'ukuran' => '567 KB'],
            ['nama' => 'Panduan Akreditasi BAN-PT', 'format' => 'PDF', 'ukuran' => '1.5 MB'],
            ['nama' => 'SOP Penjaminan Mutu Internal', 'format' => 'DOCX', 'ukuran' => '723 KB'],
            ['nama' => 'Form Audit Mutu Internal', 'format' => 'XLSX', 'ukuran' => '345 KB'],
        ]],
        ['ikon' => 'fas fa-cogs', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Teknis & Infrastruktur', 'desc' => 'Dokumentasi teknis, API, dan panduan developer.', 'items' => [
            ['nama' => 'API Documentation v3.0', 'format' => 'PDF', 'ukuran' => '2.1 MB'],
            ['nama' => 'Arsitektur Sistem KVT Hub', 'format' => 'PDF', 'ukuran' => '890 KB'],
            ['nama' => 'Panduan Deployment Server', 'format' => 'MD', 'ukuran' => '345 KB'],
            ['nama' => 'Backup & Disaster Recovery Plan', 'format' => 'PDF', 'ukuran' => '567 KB'],
        ]],
    ];
    @endphp
    <div class="space-y-8">
        @foreach($kategori as $k)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $k['warna'] }}-500/20" data-aos="fade-up">
            <div class="bg-gradient-to-r {{ $k['gradien'] }} p-5 flex items-center gap-4">
                <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center"><i class="{{ $k['ikon'] }} text-white text-xl"></i></div>
                <div>
                    <h3 class="text-white font-bold text-lg">{{ $k['judul'] }}</h3>
                    <p class="text-white/70 text-sm">{{ $k['desc'] }}</p>
                </div>
            </div>
            <div class="divide-y divide-kvt-800/50">
                @foreach($k['items'] as $item)
                <div class="px-6 py-4 flex items-center justify-between hover:bg-kvt-800/20 transition">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-file-{{ strtolower($item['format']) === 'pdf' ? 'pdf text-red-400' : (strtolower($item['format']) === 'docx' ? 'word text-blue-400' : (strtolower($item['format']) === 'xlsx' ? 'excel text-green-400' : 'alt text-gray-400')) }}"></i>
                        <span class="text-gray-300 text-sm">{{ $item['nama'] }}</span>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-gray-600 text-xs">{{ $item['format'] }} · {{ $item['ukuran'] }}</span>
                        <button class="text-{{ $k['warna'] }}-400 hover:text-{{ $k['warna'] }}-300 transition"><i class="fas fa-download"></i></button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- TEMPLATE UNDUH --}}
<section id="template" class="bg-gradient-to-br from-amber-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-yellow-500/10 text-yellow-400 px-3 py-1 rounded-full">TEMPLATE</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Template Siap Pakai</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Download template administrasi yang sudah diformat — tinggal isi dan gunakan</p>
        </div>
        @php
        $templates = [
            ['ikon' => 'fas fa-file-alt', 'warna' => 'blue', 'judul' => 'RPS (Rencana Pembelajaran Semester)', 'desc' => 'Template RPS standar OBE dengan CPMK, metode, dan rubrik penilaian.', 'format' => 'DOCX'],
            ['ikon' => 'fas fa-clipboard', 'warna' => 'green', 'judul' => 'RPP (Rencana Pelaksanaan Pembelajaran)', 'desc' => 'Template RPP Kurikulum Merdeka dengan aktivitas P5 dan diferensiasi.', 'format' => 'DOCX'],
            ['ikon' => 'fas fa-chart-bar', 'warna' => 'purple', 'judul' => 'Laporan Kegiatan Belajar Mengajar', 'desc' => 'Template laporan KBM harian, mingguan, dan bulanan.', 'format' => 'XLSX'],
            ['ikon' => 'fas fa-user-plus', 'warna' => 'red', 'judul' => 'Formulir Pendaftaran Siswa Baru', 'desc' => 'Form PPDB online-ready dengan data orang tua dan riwayat akademik.', 'format' => 'PDF'],
            ['ikon' => 'fas fa-award', 'warna' => 'amber', 'judul' => 'Template Sertifikat Kelulusan', 'desc' => 'Desain sertifikat profesional dengan QR code verifikasi.', 'format' => 'PSD'],
            ['ikon' => 'fas fa-handshake', 'warna' => 'cyan', 'judul' => 'MoU Kerja Sama', 'desc' => 'Template perjanjian kerja sama antara institusi dan mitra industri.', 'format' => 'DOCX'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($templates as $t)
            <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition group" data-aos="fade-up">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-12 h-12 bg-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                        <i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400 text-xl"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold text-sm">{{ $t['judul'] }}</h4>
                        <p class="text-gray-500 text-xs mt-1">{{ $t['desc'] }}</p>
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 px-2 py-0.5 rounded-full">{{ $t['format'] }}</span>
                    <button class="text-sm text-{{ $t['warna'] }}-400 hover:text-{{ $t['warna'] }}-300 transition font-semibold"><i class="fas fa-download mr-1"></i>Download</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FORMULIR --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FORMULIR</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Formulir Online</h2>
    </div>
    @php
    $formulir = [
        ['ikon' => 'fas fa-user-plus', 'warna' => 'blue', 'judul' => 'Pendaftaran Akun Institusi', 'desc' => 'Untuk sekolah atau universitas yang ingin mendaftarkan seluruh sivitas akademika.'],
        ['ikon' => 'fas fa-bug', 'warna' => 'red', 'judul' => 'Laporan Bug & Masalah Teknis', 'desc' => 'Laporkan bug, error, atau masalah teknis yang ditemukan saat menggunakan platform.'],
        ['ikon' => 'fas fa-lightbulb', 'warna' => 'yellow', 'judul' => 'Saran & Masukan Fitur', 'desc' => 'Sampaikan ide fitur baru atau perbaikan yang Anda inginkan di platform KVT Hub.'],
        ['ikon' => 'fas fa-handshake', 'warna' => 'green', 'judul' => 'Pengajuan Kerja Sama', 'desc' => 'Ajukan proposal kerja sama, sponsorship, atau partnership dengan KVT Hub.'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($formulir as $f)
        <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition flex items-start gap-4 group" data-aos="fade-up">
            <div class="w-14 h-14 bg-{{ $f['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                <i class="{{ $f['ikon'] }} text-{{ $f['warna'] }}-400 text-xl"></i>
            </div>
            <div>
                <h4 class="text-white font-bold mb-1">{{ $f['judul'] }}</h4>
                <p class="text-gray-400 text-sm mb-3">{{ $f['desc'] }}</p>
                <button class="text-sm text-{{ $f['warna'] }}-400 hover:text-{{ $f['warna'] }}-300 font-semibold transition"><i class="fas fa-external-link-alt mr-1"></i>Buka Formulir</button>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-amber-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">HAK AKSES</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Dokumen per Peran</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $docRoles = [
                ['peran' => 'Siswa', 'ikon' => 'fas fa-user', 'warna' => 'blue', 'fitur' => ['Baca dokumen publik & panduan', 'Download template tugas', 'Akses formulir pengajuan', 'Lihat kebijakan platform', 'Unduh sertifikat sendiri', 'Kirim laporan bug']],
                ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Semua akses siswa +', 'Download template RPP & RPS', 'Upload dokumen ke kelas', 'Akses rubrik penilaian', 'Buat sertifikat untuk siswa', 'Akses panduan akreditasi']],
                ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Full access semua dokumen', 'Kelola & upload dokumen platform', 'Edit kebijakan & SOP', 'Kelola template global', 'Audit & review dokumen', 'Export semua data & arsip']],
            ];
            @endphp
            @foreach($docRoles as $r)
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
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Butuh Dokumen Tertentu?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Hubungi tim kami jika Anda membutuhkan dokumen khusus, surat resmi, atau bantuan administrasi lainnya.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-yellow-500 text-black px-10 py-4 rounded-xl font-semibold shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-envelope"></i> Hubungi Tim Dokumen
            </a>
        </div>
    </div>
</section>

@endsection
