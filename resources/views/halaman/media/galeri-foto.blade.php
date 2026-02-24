@extends('tata-letak.utama')
@section('judul', 'Galeri Foto & Dokumentasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-emerald-900/30 to-kvt-900"></div>
    <div class="absolute inset-0">
        <div class="absolute top-16 right-16 w-80 h-80 bg-emerald-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 left-20 w-72 h-72 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #10B981 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-emerald-800/30 border border-emerald-600/30 rounded-full px-4 py-1.5 text-xs text-emerald-300 mb-6" data-aos="fade-down">
            <i class="fas fa-images"></i> Dokumentasi Visual Kegiatan
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Galeri Foto &</span><br>
            <span class="teks-gradien">Dokumentasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Koleksi foto dan dokumentasi visual kegiatan KVT Hub — dari workshop, hackathon, wisuda,
            seminar, hingga study tour. Kenangan berharga dari seluruh komunitas pendidikan Indonesia.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="#galeri" class="bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5">
                <i class="fas fa-camera mr-2"></i>Lihat Galeri
            </a>
            <a href="#submit" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-upload mr-2"></i>Upload Foto
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">1.5K+</div><div class="text-xs text-gray-500">Foto</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Event</div></div>
            <div><div class="text-2xl font-black text-white">30+</div><div class="text-xs text-gray-500">Kota</div></div>
            <div><div class="text-2xl font-black text-white">5</div><div class="text-xs text-gray-500">Kategori</div></div>
        </div>
    </div>
</section>

{{-- KATEGORI GALERI --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">KATEGORI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Kategori Galeri</h2>
        <p class="text-gray-400 mt-3">Jelajahi foto berdasarkan jenis kegiatan</p>
    </div>
    @php
    $kategoriGaleri = [
        ['judul' => 'Workshop', 'ikon' => 'fas fa-tools', 'warna' => 'blue', 'jumlah' => '320+', 'desc' => 'Workshop coding, desain, dan keterampilan digital dari seluruh Indonesia.'],
        ['judul' => 'Hackathon', 'ikon' => 'fas fa-laptop-code', 'warna' => 'green', 'jumlah' => '250+', 'desc' => 'Momen seru kompetisi hackathon nasional dan regional KVT Hub.'],
        ['judul' => 'Wisuda', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'purple', 'jumlah' => '400+', 'desc' => 'Wisuda digital dan seremonial kelulusan peserta dari berbagai jenjang.'],
        ['judul' => 'Seminar', 'ikon' => 'fas fa-chalkboard', 'warna' => 'amber', 'jumlah' => '280+', 'desc' => 'Seminar nasional, talkshow, dan diskusi panel bersama para ahli.'],
        ['judul' => 'Study Tour', 'ikon' => 'fas fa-bus', 'warna' => 'cyan', 'jumlah' => '200+', 'desc' => 'Kunjungan edukatif ke kampus, perusahaan teknologi, dan destinasi belajar.'],
    ];
    @endphp
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
        @foreach($kategoriGaleri as $kg)
        <div class="kaca rounded-2xl p-5 text-center border-{{ $kg['warna'] }}-500/20 hover:border-{{ $kg['warna'] }}-500/40 transition group cursor-pointer" data-aos="fade-up">
            <div class="w-12 h-12 bg-{{ $kg['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                <i class="{{ $kg['ikon'] }} text-{{ $kg['warna'] }}-400 text-lg"></i>
            </div>
            <h4 class="text-white font-bold text-sm">{{ $kg['judul'] }}</h4>
            <span class="text-{{ $kg['warna'] }}-400 text-xs">{{ $kg['jumlah'] }} foto</span>
            <p class="text-gray-500 text-[10px] mt-2">{{ $kg['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- GRID FOTO --}}
<section id="galeri" class="bg-gradient-to-br from-emerald-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">GALERI</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Photo Grid Terbaru</h2>
        </div>
        @php
        $fotoGrid = [
            ['label' => 'Workshop AI Jakarta', 'warna' => 'blue', 'span' => 'col-span-2 row-span-2', 'thumb' => 'https://placehold.co/640x640/0f172a/3B82F6?text=Workshop+AI'],
            ['label' => 'Hackathon 2026', 'warna' => 'green', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/22C55E?text=Hackathon'],
            ['label' => 'Wisuda Digital Batch 8', 'warna' => 'purple', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/A855F7?text=Wisuda'],
            ['label' => 'Seminar Nasional EdTech', 'warna' => 'amber', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/F59E0B?text=Seminar'],
            ['label' => 'Study Tour Silicon Valley', 'warna' => 'cyan', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/06B6D4?text=Study+Tour'],
            ['label' => 'Career Fair 2026', 'warna' => 'rose', 'span' => 'col-span-2', 'thumb' => 'https://placehold.co/640x320/0f172a/F43F5E?text=Career+Fair'],
            ['label' => 'Olimpiade Sains', 'warna' => 'indigo', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/6366F1?text=Olimpiade'],
            ['label' => 'Pelatihan Guru Digital', 'warna' => 'emerald', 'span' => '', 'thumb' => 'https://placehold.co/320x320/0f172a/10B981?text=Pelatihan'],
        ];
        @endphp
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($fotoGrid as $fg)
            <div class="{{ $fg['span'] }} kaca rounded-xl overflow-hidden relative group cursor-pointer" data-aos="zoom-in">
                <img src="{{ $fg['thumb'] }}" alt="{{ $fg['label'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500 min-h-[160px]">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition">
                    <div class="absolute bottom-0 left-0 right-0 p-4">
                        <span class="text-white font-bold text-sm">{{ $fg['label'] }}</span>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="text-{{ $fg['warna'] }}-400 text-xs"><i class="fas fa-camera mr-1"></i>Galeri</span>
                            <span class="text-gray-400 text-xs"><i class="fas fa-expand mr-1"></i>Perbesar</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- DOKUMENTASI EVENT --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">DOKUMENTASI</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Dokumentasi Event Terbaru</h2>
    </div>
    @php
    $dokumentasi = [
        ['judul' => 'Workshop AI & Machine Learning Jakarta', 'tanggal' => '05 Feb 2026', 'lokasi' => 'Jakarta Convention Center', 'foto' => 45, 'peserta' => 200, 'warna' => 'blue'],
        ['judul' => 'Hackathon Edu-Tech Nasional 2026', 'tanggal' => '20 Jan 2026', 'lokasi' => 'Bandung Digital Valley', 'foto' => 120, 'peserta' => 500, 'warna' => 'green'],
        ['judul' => 'Wisuda Digital Batch 8 KVT Hub', 'tanggal' => '15 Jan 2026', 'lokasi' => 'Virtual Ceremony', 'foto' => 80, 'peserta' => 1200, 'warna' => 'purple'],
        ['judul' => 'Seminar Nasional Pendidikan 4.0', 'tanggal' => '01 Feb 2026', 'lokasi' => 'Surabaya Tech Park', 'foto' => 65, 'peserta' => 350, 'warna' => 'amber'],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($dokumentasi as $d)
        <div class="kaca rounded-2xl p-6 border-{{ $d['warna'] }}-500/20 hover:border-{{ $d['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 bg-{{ $d['warna'] }}-500/20 rounded-2xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-folder-open text-{{ $d['warna'] }}-400 text-xl"></i>
                </div>
                <div class="flex-1">
                    <h4 class="text-white font-bold mb-1 group-hover:text-{{ $d['warna'] }}-400 transition">{{ $d['judul'] }}</h4>
                    <div class="flex flex-wrap gap-x-3 gap-y-1 text-xs text-gray-500">
                        <span><i class="fas fa-calendar mr-1"></i>{{ $d['tanggal'] }}</span>
                        <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $d['lokasi'] }}</span>
                    </div>
                    <div class="flex items-center gap-4 mt-3">
                        <span class="text-xs bg-{{ $d['warna'] }}-500/10 text-{{ $d['warna'] }}-400 px-2 py-0.5 rounded-full"><i class="fas fa-camera mr-1"></i>{{ $d['foto'] }} foto</span>
                        <span class="text-xs bg-{{ $d['warna'] }}-500/10 text-{{ $d['warna'] }}-400 px-2 py-0.5 rounded-full"><i class="fas fa-users mr-1"></i>{{ $d['peserta'] }} peserta</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- PANDUAN SUBMISSION --}}
<section id="submit" class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">SUBMISSION</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Panduan Upload Foto</h2>
            <p class="text-gray-400 mt-3">Kontribusikan foto kegiatan Anda ke galeri KVT Hub</p>
        </div>
        @php
        $panduan = [
            ['no' => '01', 'judul' => 'Siapkan Foto', 'desc' => 'Foto berkualitas tinggi (min. 1080p), format JPG/PNG, ukuran max 10MB per file.', 'ikon' => 'fas fa-image', 'warna' => 'emerald'],
            ['no' => '02', 'judul' => 'Isi Detail Event', 'desc' => 'Cantumkan nama event, tanggal, lokasi, dan deskripsi singkat foto.', 'ikon' => 'fas fa-edit', 'warna' => 'blue'],
            ['no' => '03', 'judul' => 'Review & Approve', 'desc' => 'Tim galeri meninjau foto dalam 48 jam. Foto yang lolos seleksi tampil di galeri publik.', 'ikon' => 'fas fa-check-double', 'warna' => 'amber'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($panduan as $p)
            <div class="kaca rounded-2xl p-6 text-center border-{{ $p['warna'] }}-500/20" data-aos="fade-up">
                <div class="text-3xl font-black text-{{ $p['warna'] }}-500/30 mb-2">{{ $p['no'] }}</div>
                <div class="w-14 h-14 bg-{{ $p['warna'] }}-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i>
                </div>
                <h4 class="text-white font-bold mb-2">{{ $p['judul'] }}</h4>
                <p class="text-gray-400 text-sm">{{ $p['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">HAK AKSES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Fitur Galeri per Peran</h2>
    </div>
    @php
    $roles = [
        ['peran' => 'Siswa', 'ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'fitur' => ['Lihat semua galeri publik', 'Download foto resolusi tinggi', 'Submit foto kegiatan sendiri', 'Tandai foto favorit', 'Share ke media sosial', 'Request foto event tertentu']],
        ['peran' => 'Guru', 'ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'fitur' => ['Upload foto kegiatan kelas', 'Buat album per mata pelajaran', 'Tag siswa dalam dokumentasi', 'Embed galeri ke halaman kelas', 'Akses foto event eksklusif', 'Generate slideshow otomatis']],
        ['peran' => 'Admin', 'ikon' => 'fas fa-user-shield', 'warna' => 'red', 'fitur' => ['Kelola seluruh konten galeri', 'Moderasi foto submissions', 'Set foto sebagai featured/cover', 'Atur kategori & tag galeri', 'Kelola storage & kompresi', 'Generate laporan galeri']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($roles as $r)
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
</section>

{{-- CTA --}}
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Jelajahi Galeri Foto KVT Hub</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">1.500+ foto dokumentasi kegiatan dari seluruh Indonesia. Abadikan momen belajar dan kontribusikan foto terbaikmu.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-emerald-500 to-teal-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-emerald-500/30 hover:-translate-y-0.5 transition">
                <i class="fas fa-images"></i> Lihat Galeri Lengkap
            </a>
            <a href="#submit" class="inline-flex items-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-4 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-cloud-upload-alt"></i> Upload Foto
            </a>
        </div>
    </div>
</section>

@endsection
