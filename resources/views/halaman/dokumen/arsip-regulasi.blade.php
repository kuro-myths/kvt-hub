@extends('tata-letak.utama')
@section('judul', 'Arsip & Regulasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-rose-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-rose-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F43F5E 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-rose-800/30 border border-rose-600/30 rounded-full px-4 py-1.5 text-xs text-rose-300 mb-6" data-aos="fade-down">
            <i class="fas fa-landmark"></i> Regulasi & Arsip Dokumen Pendidikan
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Arsip &</span><br>
            <span class="teks-gradien">Regulasi Pendidikan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pusat arsip digital regulasi pendidikan Indonesia — Undang-Undang Sisdiknas, Permendikbud, Peraturan Pemerintah, dan dokumen historis kelembagaan. Selalu up-to-date dan terverifikasi.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-rose-500 to-pink-500 hover:from-rose-400 hover:to-pink-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-rose-500/30 hover:-translate-y-0.5">
                <i class="fas fa-search mr-2"></i>Cari Regulasi
            </a>
            <a href="#timeline" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-stream mr-2"></i>Lihat Timeline
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">150+</div><div class="text-xs text-gray-500">Regulasi</div></div>
            <div><div class="text-2xl font-black text-white">20+</div><div class="text-xs text-gray-500">Tahun Arsip</div></div>
            <div><div class="text-2xl font-black text-white">500+</div><div class="text-xs text-gray-500">Dokumen</div></div>
            <div><div class="text-2xl font-black text-white">Real-time</div><div class="text-xs text-gray-500">Update</div></div>
        </div>
    </div>
</section>

{{-- TIMELINE REGULASI --}}
<section id="timeline" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">TIMELINE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Timeline Regulasi Pendidikan</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Perkembangan regulasi utama pendidikan Indonesia dari masa ke masa</p>
    </div>
    @php
    $timeline = [
        ['tahun' => '2003', 'judul' => 'UU No. 20/2003 — Sistem Pendidikan Nasional', 'desc' => 'Undang-Undang dasar yang mengatur seluruh aspek sistem pendidikan nasional Indonesia.', 'warna' => 'red', 'ikon' => 'fas fa-gavel'],
        ['tahun' => '2005', 'judul' => 'UU No. 14/2005 — Guru dan Dosen', 'desc' => 'Mengatur kedudukan, fungsi, dan peran guru & dosen sebagai tenaga profesional.', 'warna' => 'blue', 'ikon' => 'fas fa-chalkboard-teacher'],
        ['tahun' => '2012', 'judul' => 'UU No. 12/2012 — Pendidikan Tinggi', 'desc' => 'Regulasi komprehensif tentang penyelenggaraan pendidikan tinggi di Indonesia.', 'warna' => 'green', 'ikon' => 'fas fa-university'],
        ['tahun' => '2019', 'judul' => 'Permendikbud No. 3/2020 — SN-Dikti', 'desc' => 'Standar Nasional Pendidikan Tinggi — standar kompetensi lulusan & pembelajaran.', 'warna' => 'purple', 'ikon' => 'fas fa-graduation-cap'],
        ['tahun' => '2022', 'judul' => 'Kepmendikbudristek — Kurikulum Merdeka', 'desc' => 'Peluncuran Kurikulum Merdeka sebagai kurikulum nasional dengan pendekatan fleksibel.', 'warna' => 'amber', 'ikon' => 'fas fa-flag'],
        ['tahun' => '2024', 'judul' => 'PP No. 4/2024 — Pendanaan Pendidikan', 'desc' => 'Peraturan Pemerintah tentang mekanisme pendanaan pendidikan dan alokasi anggaran.', 'warna' => 'teal', 'ikon' => 'fas fa-coins'],
    ];
    @endphp
    <div class="relative">
        <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-rose-500/50 via-purple-500/50 to-teal-500/50"></div>
        <div class="space-y-8">
            @foreach($timeline as $i => $t)
            <div class="relative flex items-center {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}" data-aos="fade-up">
                <div class="absolute left-8 md:left-1/2 w-4 h-4 bg-{{ $t['warna'] }}-500 rounded-full transform -translate-x-1/2 z-10 ring-4 ring-kvt-950"></div>
                <div class="ml-16 md:ml-0 md:w-1/2 {{ $i % 2 === 0 ? 'md:pr-12' : 'md:pl-12' }}">
                    <div class="kaca rounded-2xl p-6 border-{{ $t['warna'] }}-500/20 hover:border-{{ $t['warna'] }}-500/40 transition">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-xs bg-{{ $t['warna'] }}-500/10 text-{{ $t['warna'] }}-400 px-3 py-1 rounded-full font-mono font-bold">{{ $t['tahun'] }}</span>
                            <i class="{{ $t['ikon'] }} text-{{ $t['warna'] }}-400"></i>
                        </div>
                        <h3 class="text-white font-bold mb-2">{{ $t['judul'] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $t['desc'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- REFERENSI REGULASI --}}
<section class="bg-gradient-to-br from-rose-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">REFERENSI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Referensi Hukum & Regulasi Utama</h2>
        </div>
        @php
        $regulasi = [
            ['ikon' => 'fas fa-balance-scale', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'judul' => 'Undang-Undang', 'docs' => [
                ['nama' => 'UU No. 20/2003 — Sisdiknas', 'status' => 'Berlaku'],
                ['nama' => 'UU No. 14/2005 — Guru & Dosen', 'status' => 'Berlaku'],
                ['nama' => 'UU No. 12/2012 — Dikti', 'status' => 'Berlaku'],
                ['nama' => 'UU No. 27/2022 — PDP', 'status' => 'Berlaku'],
            ]],
            ['ikon' => 'fas fa-scroll', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'judul' => 'Peraturan Pemerintah', 'docs' => [
                ['nama' => 'PP No. 57/2021 — SNP', 'status' => 'Berlaku'],
                ['nama' => 'PP No. 4/2024 — Pendanaan', 'status' => 'Berlaku'],
                ['nama' => 'PP No. 19/2005 — SNP (Lama)', 'status' => 'Dicabut'],
                ['nama' => 'PP No. 17/2010 — Pengelolaan', 'status' => 'Berlaku'],
            ]],
            ['ikon' => 'fas fa-file-signature', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'judul' => 'Permendikbud', 'docs' => [
                ['nama' => 'Permendikbud No. 3/2020 — SN-Dikti', 'status' => 'Berlaku'],
                ['nama' => 'Permendikbud No. 5/2022 — SKL', 'status' => 'Berlaku'],
                ['nama' => 'Permendikbudristek — K. Merdeka', 'status' => 'Berlaku'],
                ['nama' => 'Permendikbud No. 22/2024 — BOS', 'status' => 'Berlaku'],
            ]],
            ['ikon' => 'fas fa-sitemap', 'warna' => 'purple', 'gradien' => 'from-purple-500 to-violet-500', 'judul' => 'Keputusan & Surat Edaran', 'docs' => [
                ['nama' => 'SE Mendikbudristek — Asesmen Nasional', 'status' => 'Berlaku'],
                ['nama' => 'Kepmendikbudristek — IKU PT', 'status' => 'Berlaku'],
                ['nama' => 'SE Sesjen — PPDB 2026', 'status' => 'Baru'],
                ['nama' => 'Kepmen — Akreditasi BAN-PT', 'status' => 'Berlaku'],
            ]],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @foreach($regulasi as $r)
            <div class="kaca rounded-2xl p-6 border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $r['gradien'] }} rounded-xl flex items-center justify-center"><i class="{{ $r['ikon'] }} text-white text-lg"></i></div>
                    <h3 class="text-white font-bold text-lg">{{ $r['judul'] }}</h3>
                </div>
                <div class="space-y-2">
                    @foreach($r['docs'] as $d)
                    <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-2.5">
                        <span class="text-gray-300 text-sm"><i class="fas fa-file-pdf text-{{ $r['warna'] }}-400 text-xs mr-2"></i>{{ $d['nama'] }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full {{ $d['status'] === 'Berlaku' ? 'bg-green-500/10 text-green-400' : ($d['status'] === 'Baru' ? 'bg-blue-500/10 text-blue-400' : 'bg-red-500/10 text-red-400') }}">{{ $d['status'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ARSIP PER TAHUN --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">ARSIP</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Arsip Dokumen per Tahun</h2>
    </div>
    @php
    $arsip = [
        ['tahun' => '2026', 'jumlah' => 18, 'warna' => 'rose', 'highlight' => true, 'contoh' => ['SE PPDB 2026/2027', 'Kalender Akademik 2026', 'Juknis BOS 2026']],
        ['tahun' => '2025', 'jumlah' => 42, 'warna' => 'blue', 'highlight' => false, 'contoh' => ['Kurikulum Merdeka Update', 'Permendikbud SNBT', 'Juknis Akreditasi']],
        ['tahun' => '2024', 'jumlah' => 56, 'warna' => 'green', 'highlight' => false, 'contoh' => ['PP Pendanaan Pendidikan', 'SE Asesmen Nasional', 'Raport Kurikulum Merdeka']],
        ['tahun' => '2023', 'jumlah' => 48, 'warna' => 'purple', 'highlight' => false, 'contoh' => ['IKU Perguruan Tinggi', 'Panduan P5 Lengkap', 'SN-Dikti Revisi']],
        ['tahun' => '2022', 'jumlah' => 39, 'warna' => 'amber', 'highlight' => false, 'contoh' => ['Peluncuran K. Merdeka', 'UU PDP', 'SKL Baru']],
        ['tahun' => '≤ 2021', 'jumlah' => 285, 'warna' => 'gray', 'highlight' => false, 'contoh' => ['Arsip UU Sisdiknas', 'PP SNP 2005-2021', 'Regulasi Historis']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($arsip as $a)
        <div class="kaca rounded-2xl p-6 border-{{ $a['warna'] }}-500/20 hover:border-{{ $a['warna'] }}-500/40 transition {{ $a['highlight'] ? 'ring-1 ring-rose-500/30' : '' }}" data-aos="fade-up">
            <div class="flex items-center justify-between mb-4">
                <span class="text-2xl font-black text-white">{{ $a['tahun'] }}</span>
                <span class="text-xs bg-{{ $a['warna'] }}-500/10 text-{{ $a['warna'] }}-400 px-3 py-1 rounded-full">{{ $a['jumlah'] }} dokumen</span>
            </div>
            @if($a['highlight'])<span class="text-[10px] bg-rose-500/20 text-rose-400 px-2 py-0.5 rounded-full mb-3 inline-block">Terbaru</span>@endif
            <ul class="space-y-2">
                @foreach($a['contoh'] as $c)
                <li class="flex items-center gap-2 text-sm text-gray-400"><i class="fas fa-folder text-{{ $a['warna'] }}-400 text-xs"></i>{{ $c }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>
</section>

{{-- SEARCH & COMPLIANCE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-rose-900/10 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            {{-- Search --}}
            <div data-aos="fade-right">
                <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">PENCARIAN</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Cari Regulasi dengan Cepat</h2>
                <p class="text-gray-400 text-sm mb-6">Gunakan fitur pencarian canggih untuk menemukan regulasi berdasarkan nomor, tahun, kata kunci, atau kategori.</p>
                <div class="kaca rounded-xl p-4 border-cyan-500/20 mb-4">
                    <div class="flex items-center gap-3 bg-kvt-800/50 rounded-lg px-4 py-3">
                        <i class="fas fa-search text-cyan-400"></i>
                        <span class="text-gray-500 text-sm">Cari regulasi... (contoh: "Permendikbud 2024")</span>
                    </div>
                </div>
                @php
                $filterPencarian = [
                    ['label' => 'Jenis', 'contoh' => 'UU, PP, Permendikbud, SE'],
                    ['label' => 'Tahun', 'contoh' => '2003-2026'],
                    ['label' => 'Status', 'contoh' => 'Berlaku, Dicabut, Draft'],
                    ['label' => 'Topik', 'contoh' => 'Kurikulum, Guru, Dana BOS'],
                ];
                @endphp
                <div class="grid grid-cols-2 gap-3">
                    @foreach($filterPencarian as $fp)
                    <div class="kaca rounded-lg p-3 border-kvt-700/30">
                        <span class="text-white text-xs font-bold block mb-1">{{ $fp['label'] }}</span>
                        <span class="text-gray-500 text-[11px]">{{ $fp['contoh'] }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Compliance --}}
            <div data-aos="fade-left">
                <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">COMPLIANCE</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Compliance Tracking</h2>
                <p class="text-gray-400 text-sm mb-6">Pantau kepatuhan institusi Anda terhadap regulasi pendidikan yang berlaku secara real-time.</p>
                @php
                $compliance = [
                    ['regulasi' => 'SNP (PP 57/2021)', 'progress' => 92, 'warna' => 'green'],
                    ['regulasi' => 'Kurikulum Merdeka', 'progress' => 85, 'warna' => 'blue'],
                    ['regulasi' => 'UU PDP (Perlindungan Data)', 'progress' => 78, 'warna' => 'amber'],
                    ['regulasi' => 'Standar Akreditasi BAN', 'progress' => 95, 'warna' => 'purple'],
                    ['regulasi' => 'Juknis BOS 2026', 'progress' => 60, 'warna' => 'red'],
                ];
                @endphp
                <div class="space-y-4">
                    @foreach($compliance as $c)
                    <div class="kaca rounded-xl p-4 border-{{ $c['warna'] }}-500/20">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-white text-sm font-semibold">{{ $c['regulasi'] }}</span>
                            <span class="text-{{ $c['warna'] }}-400 text-sm font-bold">{{ $c['progress'] }}%</span>
                        </div>
                        <div class="w-full bg-kvt-800/50 rounded-full h-2">
                            <div class="bg-gradient-to-r from-{{ $c['warna'] }}-500 to-{{ $c['warna'] }}-400 h-2 rounded-full" style="width: {{ $c['progress'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Arsip Berdasarkan Peran</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Akses regulasi kurikulum aktif', 'Download panduan SNBT/UTBK', 'Lihat kalender akademik resmi', 'Akses dokumen beasiswa & KIP', 'Referensi tugas & penelitian', 'Notifikasi regulasi baru']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Akses lengkap Permendikbud', 'Panduan penilaian & asesmen', 'Referensi RPP & CP terbaru', 'Download juknis sesuai mata pelajaran', 'Regulatory update alert', 'Arsip pelatihan & sertifikasi']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin', 'fitur' => ['Akses seluruh 500+ arsip dokumen', 'Compliance dashboard real-time', 'Upload & kelola dokumen regulasi', 'Audit trail & versioning', 'Auto-alert regulasi dicabut/diubah', 'Laporan compliance per standar']],
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
<section class="bg-gradient-to-r from-rose-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Akses Arsip Regulasi Lengkap</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftar untuk mengakses 500+ dokumen regulasi, timeline perubahan, dan compliance tracking untuk institusi Anda.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-rose-500 to-pink-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-rose-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-landmark"></i> Daftar & Akses Arsip
        </a>
    </div>
</section>

@endsection
