@extends('tata-letak.utama')

@section('judul', 'KVT Hub - Pusat Pembelajaran Digital')

@section('konten')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    {{-- Background gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-kvt-400/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-kvt-600/5 rounded-full blur-3xl"></div>
    </div>

    {{-- Grid pattern --}}
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #3399FF 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-16">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left: Text --}}
            <div data-aos="fade-right">
                <div class="inline-flex items-center bg-kvt-500/10 border border-kvt-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-kvt-300 text-sm">Platform Edukasi Terbaru 2026</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white">Belajar</span><br>
                    <span class="teks-gradien">Tanpa Batas</span><br>
                    <span class="text-white">di</span>
                    <span class="text-kvt-400">KVT Hub</span>
                </h1>

                <p class="text-lg text-gray-400 max-w-xl mb-8 leading-relaxed">
                    Pusat pembelajaran digital terlengkap. Tutorial video, kuis interaktif,
                    sistem level RPG, dan 30+ jenis diagram untuk melacak kemajuanmu.
                    Naik level sampai <span class="text-kvt-400 font-semibold">Level 100</span>!
                </p>

                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="{{ route('daftar') }}" class="group bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-kvt-500/30 hover:shadow-kvt-400/40 hover:-translate-y-0.5">
                        Mulai Belajar Gratis
                        <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#fitur" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                        <i class="fas fa-play-circle mr-2"></i>Lihat Fitur
                    </a>
                </div>

                {{-- Stats --}}
                <div class="flex gap-8 pt-4 border-t border-kvt-800/50">
                    <div>
                        <div class="text-2xl font-black text-white">{{ number_format($statistik['total_siswa']) }}+</div>
                        <div class="text-xs text-gray-500">Siswa Aktif</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white">{{ number_format($statistik['total_kelas']) }}+</div>
                        <div class="text-xs text-gray-500">Kelas Tersedia</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white">{{ number_format($statistik['total_materi']) }}+</div>
                        <div class="text-xs text-gray-500">Materi Belajar</div>
                    </div>
                    <div>
                        <div class="text-2xl font-black text-white">100</div>
                        <div class="text-xs text-gray-500">Max Level</div>
                    </div>
                </div>
            </div>

            {{-- Right: Visual --}}
            <div data-aos="fade-left" data-aos-delay="200" class="hidden lg:block">
                <div class="relative">
                    {{-- Main card --}}
                    <div class="bg-kvt-900/80 backdrop-blur border border-kvt-700/30 rounded-2xl p-6 shadow-2xl">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-gray-500 text-xs ml-2">KVT Hub Dashboard</span>
                        </div>
                        <img src="{{ asset('images/sekolah.png') }}" alt="KVT Hub" class="rounded-xl w-full h-48 object-cover mb-4 border border-kvt-700/30">

                        {{-- RPG Stats Preview --}}
                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-kvt-800/50 rounded-lg p-3 text-center">
                                <div class="text-kvt-400 text-2xl font-black">42</div>
                                <div class="text-gray-500 text-xs">Level</div>
                            </div>
                            <div class="bg-kvt-800/50 rounded-lg p-3 text-center">
                                <div class="text-green-400 text-2xl font-black">4.2K</div>
                                <div class="text-gray-500 text-xs">XP Total</div>
                            </div>
                            <div class="bg-kvt-800/50 rounded-lg p-3 text-center">
                                <div class="text-yellow-400 text-2xl font-black">Silver</div>
                                <div class="text-gray-500 text-xs">Rang</div>
                            </div>
                        </div>
                    </div>

                    {{-- Floating cards --}}
                    <div class="absolute -top-4 -right-4 bg-green-500/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float">
                        <span class="text-white text-sm font-semibold"><i class="fas fa-trophy mr-1"></i>+50 XP</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-kvt-500/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float" style="animation-delay: 1s">
                        <span class="text-white text-sm font-semibold"><i class="fas fa-level-up-alt mr-1"></i>Level Up!</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce-slow">
        <a href="#fitur" class="text-kvt-400/50 hover:text-kvt-400 transition">
            <i class="fas fa-chevron-down text-2xl"></i>
        </a>
    </div>
</section>

{{-- FASILITAS SECTION --}}
<section class="py-20 relative" id="fasilitas">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Fasilitas Kami</span>
            <h2 class="text-4xl font-black text-white mt-2">Lingkungan Belajar Terbaik</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kami menyediakan berbagai fasilitas untuk mendukung proses pembelajaran yang optimal</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $fasilitas = [
                    ['gambar' => 'sekolah.png', 'judul' => 'Sekolah Digital', 'desk' => 'Platform pembelajaran online dengan antarmuka modern dan interaktif'],
                    ['gambar' => 'kelas.png', 'judul' => 'Kelas Virtual', 'desk' => 'Ruang kelas virtual dengan video konferensi dan whiteboard interaktif'],
                    ['gambar' => 'perpustakaan.png', 'judul' => 'Perpustakaan', 'desk' => 'Ribuan materi pembelajaran dan referensi tersedia 24/7'],
                    ['gambar' => 'lab.png', 'judul' => 'Laboratorium', 'desk' => 'Lab coding dan eksperimen digital untuk praktik langsung'],
                    ['gambar' => 'lapangan.png', 'judul' => 'Lapangan Praktik', 'desk' => 'Area untuk proyek kolaboratif dan hackathon'],
                    ['gambar' => 'pratek.png', 'judul' => 'Workshop Praktik', 'desk' => 'Belajar merakit, membangun, dan mengembangkan proyek nyata'],
                ];
            @endphp

            @foreach($fasilitas as $i => $item)
                <div class="group relative overflow-hidden rounded-2xl border border-kvt-700/30 bg-kvt-900/50 hover:border-kvt-500/50 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="overflow-hidden">
                        <img src="{{ asset('images/' . $item['gambar']) }}" alt="{{ $item['judul'] }}" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-700">
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-white mb-2">{{ $item['judul'] }}</h3>
                        <p class="text-gray-400 text-sm">{{ $item['desk'] }}</p>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-kvt-950 via-transparent to-transparent opacity-0 group-hover:opacity-60 transition-opacity duration-500"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR UTAMA SECTION --}}
<section class="py-20 relative" id="fitur">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Fitur Unggulan</span>
            <h2 class="text-4xl font-black text-white mt-2">Pembelajaran Level Berikutnya</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Sistem RPG, video interaktif, dan 30+ diagram untuk pengalaman belajar yang belum pernah ada sebelumnya</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $fitur = [
                    ['ikon' => 'fa-gamepad', 'judul' => 'Sistem RPG Level 1-100', 'desk' => 'Naik level dengan menyelesaikan materi dan kuis. Kumpulkan XP dan raih ranking tertinggi!', 'warna' => 'from-purple-500 to-pink-500'],
                    ['ikon' => 'fa-video', 'judul' => 'Video Interaktif', 'desk' => 'Video berhenti otomatis di titik tertentu untuk quiz. Seperti Komdigi Digitalen!', 'warna' => 'from-red-500 to-orange-500'],
                    ['ikon' => 'fa-chart-pie', 'judul' => '30 Jenis Diagram', 'desk' => 'Dari bar chart hingga sankey diagram. Lacak pembelajaran dengan visualisasi canggih.', 'warna' => 'from-green-500 to-teal-500'],
                    ['ikon' => 'fa-users', 'judul' => '3 Role Pengguna', 'desk' => 'Siswa, Guru, dan Admin. Setiap peran punya dasbor dan kemampuan berbeda.', 'warna' => 'from-blue-500 to-cyan-500'],
                    ['ikon' => 'fa-box-open', 'judul' => 'Paket Eksklusif', 'desk' => 'Akses materi premium dan konten eksklusif untuk siswa berdedikasi tinggi.', 'warna' => 'from-yellow-500 to-amber-500'],
                    ['ikon' => 'fa-calendar-check', 'judul' => 'Kehadiran & Laporan', 'desk' => 'Sistem absensi digital terintegrasi dengan laporan pembelajaran otomatis.', 'warna' => 'from-kvt-400 to-kvt-600'],
                    ['ikon' => 'fa-trophy', 'judul' => 'Pencapaian & Badge', 'desk' => 'Raih pencapaian dan badge unik saat menyelesaikan tantangan pembelajaran.', 'warna' => 'from-amber-500 to-yellow-600'],
                    ['ikon' => 'fa-globe', 'judul' => 'Integrasi YouTube & IG', 'desk' => 'Konten terintegrasi langsung dengan YouTube dan Instagram untuk pengalaman seamless.', 'warna' => 'from-pink-500 to-rose-500'],
                    ['ikon' => 'fa-tools', 'judul' => 'Belajar Merakit', 'desk' => 'Modul khusus untuk belajar merakit perangkat, coding, dan development dari dasar.', 'warna' => 'from-gray-500 to-slate-500'],
                ];
            @endphp

            @foreach($fitur as $i => $item)
                <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-kvt-500/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-kvt-500/10" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                    <div class="w-14 h-14 bg-gradient-to-br {{ $item['warna'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                        <i class="fas {{ $item['ikon'] }} text-white text-xl"></i>
                    </div>
                    <h3 class="text-lg font-bold text-white mb-2">{{ $item['judul'] }}</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $item['desk'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- RPG SYSTEM SECTION --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-kvt-900 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Sistem Level RPG</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-6">Belajar Seperti Bermain Game</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">
                    Terinspirasi dari game RPG seperti Endfield, sistem level kami membuat belajar jadi menyenangkan.
                    Mulai dari <span class="text-kvt-400 font-semibold">Novice (Level 1)</span> hingga
                    <span class="text-yellow-400 font-semibold">Grandmaster (Level 100)</span>.
                </p>

                {{-- Level Ranks --}}
                <div class="space-y-3">
                    @php
                        $ranks = [
                            ['nama' => 'Novice', 'level' => '1-9', 'warna' => 'bg-gray-500', 'persen' => '10'],
                            ['nama' => 'Apprentice', 'level' => '10-19', 'warna' => 'bg-green-500', 'persen' => '20'],
                            ['nama' => 'Iron', 'level' => '20-29', 'warna' => 'bg-slate-400', 'persen' => '30'],
                            ['nama' => 'Bronze', 'level' => '30-39', 'warna' => 'bg-amber-600', 'persen' => '40'],
                            ['nama' => 'Silver', 'level' => '40-49', 'warna' => 'bg-gray-300', 'persen' => '50'],
                            ['nama' => 'Gold', 'level' => '50-59', 'warna' => 'bg-yellow-400', 'persen' => '60'],
                            ['nama' => 'Platinum', 'level' => '60-69', 'warna' => 'bg-teal-400', 'persen' => '70'],
                            ['nama' => 'Diamond', 'level' => '70-79', 'warna' => 'bg-cyan-400', 'persen' => '80'],
                            ['nama' => 'Master', 'level' => '80-89', 'warna' => 'bg-purple-400', 'persen' => '90'],
                            ['nama' => 'Grandmaster', 'level' => '90-100', 'warna' => 'bg-gradient-to-r from-yellow-400 to-amber-500', 'persen' => '100'],
                        ];
                    @endphp

                    @foreach($ranks as $rank)
                        <div class="flex items-center gap-3">
                            <span class="text-xs text-gray-500 w-20 text-right">Lv {{ $rank['level'] }}</span>
                            <div class="flex-1 bg-kvt-800/50 rounded-full h-6 overflow-hidden">
                                <div class="h-full {{ $rank['warna'] }} rounded-full flex items-center justify-end pr-3 transition-all" style="width: {{ $rank['persen'] }}%">
                                    <span class="text-xs font-bold text-white drop-shadow">{{ $rank['nama'] }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="200">
                <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl">
                    <h3 class="text-xl font-bold text-white mb-6 flex items-center">
                        <i class="fas fa-scroll text-kvt-400 mr-3"></i>Cara Mendapatkan XP
                    </h3>
                    <div class="space-y-4">
                        @php
                            $xpList = [
                                ['aksi' => 'Selesaikan materi', 'xp' => '+10-50 XP', 'ikon' => 'fa-book'],
                                ['aksi' => 'Lulus kuis (>70%)', 'xp' => '+5-25 XP', 'ikon' => 'fa-question-circle'],
                                ['aksi' => 'Gabung kelas baru', 'xp' => '+20 XP', 'ikon' => 'fa-door-open'],
                                ['aksi' => 'Hadir setiap hari', 'xp' => '+5 XP', 'ikon' => 'fa-calendar-check'],
                                ['aksi' => 'Selesaikan proyek', 'xp' => '+100 XP', 'ikon' => 'fa-project-diagram'],
                                ['aksi' => 'Raih pencapaian', 'xp' => '+50 XP', 'ikon' => 'fa-medal'],
                            ];
                        @endphp

                        @foreach($xpList as $item)
                            <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3 hover:bg-kvt-800/50 transition">
                                <div class="flex items-center gap-3">
                                    <i class="fas {{ $item['ikon'] }} text-kvt-400"></i>
                                    <span class="text-gray-300 text-sm">{{ $item['aksi'] }}</span>
                                </div>
                                <span class="text-green-400 font-bold text-sm">{{ $item['xp'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KELAS POPULER --}}
@if($kelasPopuler->count() > 0)
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Kelas Tersedia</span>
            <h2 class="text-4xl font-black text-white mt-2">Kelas Populer</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kelasPopuler as $i => $kls)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden hover:border-kvt-500/50 transition-all duration-500 hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="h-32 bg-gradient-to-br from-kvt-700 to-kvt-900 flex items-center justify-center">
                        <i class="fas fa-graduation-cap text-4xl text-kvt-400/50 group-hover:text-kvt-400 transition"></i>
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-white mb-1">{{ $kls->nama }}</h3>
                        <p class="text-gray-500 text-sm mb-3">{{ Str::limit($kls->deskripsi, 80) }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-kvt-400 text-xs"><i class="fas fa-users mr-1"></i>{{ $kls->anggota_count }} siswa</span>
                            <span class="text-gray-500 text-xs"><i class="fas fa-user mr-1"></i>{{ $kls->guru->name ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- CTA SECTION --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/30 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-kvt-500/5 to-kvt-400/5"></div>
            <div class="relative">
                <div class="w-20 h-20 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-kvt-500/30">
                    <i class="fas fa-rocket text-3xl text-white"></i>
                </div>
                <h2 class="text-4xl font-black text-white mb-4">Mulai Petualangan Belajarmu</h2>
                <p class="text-gray-400 mb-8 max-w-xl mx-auto">
                    Daftar sekarang dan mulai perjalananmu dari Level 1 menuju Grandmaster.
                    Gratis, tanpa batas waktu.
                </p>
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-10 py-4 rounded-xl font-bold transition-all shadow-lg shadow-kvt-500/30 hover:shadow-kvt-400/40 text-lg">
                        <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                    </a>
                    <a href="{{ route('masuk') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-10 py-4 rounded-xl font-bold transition border border-kvt-700/50 text-lg">
                        Sudah Punya Akun?
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
