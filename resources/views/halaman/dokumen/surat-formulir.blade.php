@extends('tata-letak.utama')
@section('judul', 'Surat & Formulir - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-sky-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-sky-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #0EA5E9 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-sky-800/30 border border-sky-600/30 rounded-full px-4 py-1.5 text-xs text-sky-300 mb-6" data-aos="fade-down">
            <i class="fas fa-envelope-open-text"></i> Surat Resmi & Formulir Digital
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Surat &</span><br>
            <span class="teks-gradien">Formulir Resmi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi lengkap surat resmi dan formulir digital untuk institusi pendidikan. Dari surat keterangan, surat tugas, hingga formulir pendaftaran — semua tersedia dalam format yang siap cetak dan editable.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-sky-500 to-blue-500 hover:from-sky-400 hover:to-blue-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-sky-500/30 hover:-translate-y-0.5">
                <i class="fas fa-pen-fancy mr-2"></i>Buat Surat Baru
            </a>
            <a href="#jenis-surat" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-folder-open mr-2"></i>Lihat Koleksi
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">40+</div><div class="text-xs text-gray-500">Jenis Surat</div></div>
            <div><div class="text-2xl font-black text-white">25+</div><div class="text-xs text-gray-500">Formulir</div></div>
            <div><div class="text-2xl font-black text-white">Auto</div><div class="text-xs text-gray-500">Nomor Surat</div></div>
            <div><div class="text-2xl font-black text-white">Digital</div><div class="text-xs text-gray-500">Signature</div></div>
        </div>
    </div>
</section>

{{-- JENIS SURAT --}}
<section id="jenis-surat" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-sky-500/10 text-sky-400 px-3 py-1 rounded-full">JENIS SURAT</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Surat Resmi</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Berbagai jenis surat resmi yang umum digunakan dalam administrasi pendidikan</p>
    </div>
    @php
    $surat = [
        ['ikon' => 'fas fa-certificate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Surat Keterangan', 'desc' => 'Surat yang menerangkan status, kondisi, atau fakta terkait siswa, guru, atau institusi.', 'contoh' => ['Surat Keterangan Aktif Belajar', 'Surat Keterangan Lulus', 'Surat Keterangan Mengajar', 'Surat Keterangan Berkelakuan Baik', 'Surat Keterangan Domisili Sekolah']],
        ['ikon' => 'fas fa-paper-plane', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Surat Tugas', 'desc' => 'Surat penugasan resmi untuk kegiatan dinas, pelatihan, atau representasi institusi.', 'contoh' => ['Surat Tugas Mengikuti Diklat', 'Surat Tugas Pengawas Ujian', 'Surat Tugas Pembimbing Lomba', 'Surat Tugas Kunjungan Industri', 'Surat Tugas Narasumber']],
        ['ikon' => 'fas fa-hand-holding-heart', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Surat Pengantar', 'desc' => 'Surat yang mengantar atau memperkenalkan seseorang atau dokumen ke pihak terkait.', 'contoh' => ['Surat Pengantar Magang/PKL', 'Surat Pengantar Proposal Kerja Sama', 'Surat Pengantar Studi Banding', 'Surat Pengantar Beasiswa', 'Surat Pengantar Penelitian']],
        ['ikon' => 'fas fa-gavel', 'warna' => 'amber', 'gradien' => 'from-amber-500 to-orange-500', 'judul' => 'Surat Keputusan', 'desc' => 'Surat keputusan resmi kepala sekolah/rektor terkait kebijakan dan pengangkatan.', 'contoh' => ['SK Pengangkatan Guru Tetap', 'SK Panitia Ujian Nasional', 'SK Wali Kelas', 'SK Pembagian Tugas Mengajar', 'SK Tim Akreditasi']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @foreach($surat as $s)
        <div class="kaca rounded-2xl p-8 border-{{ $s['warna'] }}-500/20 hover:border-{{ $s['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-5">
                <div class="w-16 h-16 bg-gradient-to-br {{ $s['gradien'] }} rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                    <i class="{{ $s['ikon'] }} text-white text-2xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-xl mb-2">{{ $s['judul'] }}</h3>
                    <p class="text-gray-400 text-sm mb-4">{{ $s['desc'] }}</p>
                    <ul class="space-y-1.5">
                        @foreach($s['contoh'] as $c)
                        <li class="flex items-center gap-2 text-xs text-gray-300"><i class="fas fa-file-alt text-{{ $s['warna'] }}-400 text-[10px]"></i>{{ $c }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- JENIS FORMULIR --}}
<section class="bg-gradient-to-br from-sky-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">FORMULIR</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Formulir Digital</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Formulir online yang dapat diisi langsung atau diunduh untuk keperluan administrasi</p>
        </div>
        @php
        $formulir = [
            ['judul' => 'Formulir Pendaftaran Siswa Baru', 'desc' => 'PPDB online dengan auto-validation & tracking status.', 'ikon' => 'fas fa-user-plus', 'warna' => 'blue', 'fields' => 12],
            ['judul' => 'Formulir Izin & Dispensasi', 'desc' => 'Permohonan izin tidak masuk, dispensasi kegiatan, & cuti.', 'ikon' => 'fas fa-calendar-times', 'warna' => 'red', 'fields' => 8],
            ['judul' => 'Formulir Evaluasi Guru', 'desc' => 'Penilaian kinerja guru oleh siswa, peer, & supervisor.', 'ikon' => 'fas fa-clipboard-check', 'warna' => 'green', 'fields' => 15],
            ['judul' => 'Formulir Pengaduan & Saran', 'desc' => 'Saluran resmi untuk pengaduan, kritik, dan saran.', 'ikon' => 'fas fa-comment-dots', 'warna' => 'purple', 'fields' => 6],
            ['judul' => 'Formulir Beasiswa & Bantuan', 'desc' => 'Permohonan beasiswa, KIP, dan bantuan pendidikan.', 'ikon' => 'fas fa-hand-holding-usd', 'warna' => 'amber', 'fields' => 18],
            ['judul' => 'Formulir Perpindahan Sekolah', 'desc' => 'Mutasi masuk/keluar siswa dengan tracking dokumen.', 'ikon' => 'fas fa-exchange-alt', 'warna' => 'cyan', 'fields' => 10],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($formulir as $f)
            <div class="kaca rounded-2xl p-6 border-{{ $f['warna'] }}-500/20 hover:border-{{ $f['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="w-12 h-12 bg-{{ $f['warna'] }}-500/20 rounded-xl flex items-center justify-center mb-4"><i class="{{ $f['ikon'] }} text-{{ $f['warna'] }}-400 text-xl"></i></div>
                <h4 class="text-white font-bold mb-2">{{ $f['judul'] }}</h4>
                <p class="text-gray-400 text-sm mb-3">{{ $f['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500"><i class="fas fa-list-ul mr-1"></i>{{ $f['fields'] }} fields</span>
                    <button class="text-xs text-{{ $f['warna'] }}-400 hover:text-{{ $f['warna'] }}-300 transition font-semibold"><i class="fas fa-external-link-alt mr-1"></i>Isi Online</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- SAMPLE PREVIEW --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-violet-500/10 text-violet-400 px-3 py-1 rounded-full">PREVIEW</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Contoh Surat & Formulir</h2>
    </div>
    @php
    $contoh = [
        ['judul' => 'Surat Keterangan Aktif', 'thumb' => 'https://placehold.co/600x400/1a1a2e/0EA5E9?text=Surat+Keterangan', 'warna' => 'sky', 'format' => 'DOCX', 'ukuran' => '85 KB'],
        ['judul' => 'SK Wali Kelas', 'thumb' => 'https://placehold.co/600x400/1a1a2e/F59E0B?text=SK+Wali+Kelas', 'warna' => 'amber', 'format' => 'PDF', 'ukuran' => '120 KB'],
        ['judul' => 'Formulir PPDB Online', 'thumb' => 'https://placehold.co/600x400/1a1a2e/22C55E?text=Form+PPDB', 'warna' => 'green', 'format' => 'Online', 'ukuran' => 'Web Form'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($contoh as $c)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $c['warna'] }}-500/20 hover:border-{{ $c['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $c['thumb'] }}" alt="{{ $c['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-search-plus text-white text-xl"></i></div>
                </div>
            </div>
            <div class="p-5">
                <h4 class="text-white font-bold mb-2">{{ $c['judul'] }}</h4>
                <div class="flex items-center gap-3 text-xs text-gray-400">
                    <span><i class="fas fa-file mr-1"></i>{{ $c['format'] }}</span>
                    <span><i class="fas fa-weight-hanging mr-1"></i>{{ $c['ukuran'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ALUR PENGAJUAN --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-sky-900/10 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">WORKFLOW</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Alur Pengajuan Surat & Formulir</h2>
        </div>
        @php
        $alur = [
            ['step' => 1, 'judul' => 'Pilih Template', 'desc' => 'Pilih jenis surat atau formulir yang dibutuhkan dari katalog.', 'ikon' => 'fas fa-mouse-pointer', 'warna' => 'sky'],
            ['step' => 2, 'judul' => 'Isi Data', 'desc' => 'Lengkapi formulir online atau edit template surat yang dipilih.', 'ikon' => 'fas fa-keyboard', 'warna' => 'blue'],
            ['step' => 3, 'judul' => 'Review & Approve', 'desc' => 'Surat dikirim ke atasan/admin untuk ditinjau dan disetujui.', 'ikon' => 'fas fa-check-double', 'warna' => 'green'],
            ['step' => 4, 'judul' => 'Tanda Tangan Digital', 'desc' => 'Dokumen ditandatangani secara digital oleh pejabat berwenang.', 'ikon' => 'fas fa-signature', 'warna' => 'purple'],
            ['step' => 5, 'judul' => 'Download / Cetak', 'desc' => 'Unduh dokumen final dalam format PDF atau cetak langsung.', 'ikon' => 'fas fa-print', 'warna' => 'amber'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach($alur as $a)
            <div class="kaca rounded-2xl p-6 border-{{ $a['warna'] }}-500/20 text-center relative" data-aos="fade-up" data-aos-delay="{{ ($a['step'] - 1) * 100 }}">
                <div class="w-12 h-12 bg-{{ $a['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="{{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-lg"></i></div>
                <span class="text-xs bg-{{ $a['warna'] }}-500/10 text-{{ $a['warna'] }}-400 px-2 py-0.5 rounded-full">Step {{ $a['step'] }}</span>
                <h4 class="text-white font-bold text-sm mt-2 mb-1">{{ $a['judul'] }}</h4>
                <p class="text-gray-400 text-xs">{{ $a['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Berdasarkan Peran</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Ajukan surat keterangan aktif', 'Isi formulir izin & dispensasi', 'Ajukan permohonan beasiswa', 'Tracking status pengajuan', 'Download surat yang disetujui', 'Riwayat pengajuan lengkap']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Buat surat tugas & rekomendasi', 'Approve formulir izin siswa', 'Buat surat pengantar PKL', 'Template surat resmi kustom', 'Tanda tangan digital', 'Laporan surat per periode']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Kelola seluruh surat & formulir', 'Terbitkan SK & surat keputusan', 'Auto-numbering surat resmi', 'Approval workflow management', 'Arsip surat digital terpusat', 'Cetak massal & distribusi']],
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

{{-- CTA --}}
<section class="bg-gradient-to-r from-sky-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Kelola Surat & Formulir Secara Digital</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Tinggalkan proses manual. Buat, ajukan, dan kelola seluruh surat & formulir institusi Anda secara digital.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-sky-500 to-blue-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-sky-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-pen-fancy"></i> Mulai Buat Surat Digital
        </a>
    </div>
</section>

@endsection
