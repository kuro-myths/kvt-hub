@extends('tata-letak.utama')

@section('judul', 'KVT Hub - Global Education & Research Ecosystem')

@section('konten')

{{-- HERO SECTION --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-ungu-400/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 2s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-kvt-600/5 rounded-full blur-3xl"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #3399FF 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-24 pb-16">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center bg-kvt-500/10 border border-kvt-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-kvt-300 text-sm">Global Education & Research Ecosystem 2026</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white">Ekosistem</span><br>
                    <span class="teks-gradien">Pendidikan</span><br>
                    <span class="text-white">& </span><span class="text-kvt-400">Riset Global</span>
                </h1>

                <p class="text-lg text-gray-400 max-w-xl mb-8 leading-relaxed">
                    Dari TK hingga S3/PhD. Pembelajaran, karir, riset, dan sertifikasi dalam satu ekosistem digital.
                    Kampus virtual dengan <span class="text-kvt-400 font-semibold">100 level pencapaian</span>,
                    kolaborasi dengan <span class="text-ungu-400 font-semibold">150+ universitas global</span>.
                </p>

                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="{{ route('daftar') }}" class="group bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-kvt-500/30 hover:-translate-y-0.5">
                        Mulai Sekarang <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <a href="#ekosistem" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                        <i class="fas fa-globe mr-2"></i>Jelajahi Ekosistem
                    </a>
                </div>

                <div class="flex gap-8 pt-4 border-t border-kvt-800/50">
                    <div><div class="text-2xl font-black text-white">{{ number_format($statistik['total_siswa']) }}+</div><div class="text-xs text-gray-500">Peserta Didik</div></div>
                    <div><div class="text-2xl font-black text-white">{{ number_format($statistik['total_kelas']) }}+</div><div class="text-xs text-gray-500">Kelas & Kursus</div></div>
                    <div><div class="text-2xl font-black text-white">{{ number_format($statistik['total_materi']) }}+</div><div class="text-xs text-gray-500">Materi</div></div>
                    <div><div class="text-2xl font-black text-white">13</div><div class="text-xs text-gray-500">Jenjang</div></div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="200" class="hidden lg:block">
                <div class="relative">
                    <div class="bg-kvt-900/80 backdrop-blur border border-kvt-700/30 rounded-2xl p-6 shadow-2xl">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                            <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            <span class="text-gray-500 text-xs ml-2">KVT Hub Ecosystem</span>
                        </div>
                        <div class="grid grid-cols-3 gap-3 mb-4">
                            <div class="bg-gradient-to-br from-kvt-600/20 to-kvt-700/10 rounded-xl p-4 text-center border border-kvt-700/20">
                                <i class="fas fa-graduation-cap text-kvt-400 text-xl mb-2"></i>
                                <div class="text-white font-bold text-lg">13</div>
                                <div class="text-gray-500 text-[10px]">Jenjang</div>
                            </div>
                            <div class="bg-gradient-to-br from-purple-600/20 to-purple-700/10 rounded-xl p-4 text-center border border-purple-700/20">
                                <i class="fas fa-microscope text-purple-400 text-xl mb-2"></i>
                                <div class="text-white font-bold text-lg">150+</div>
                                <div class="text-gray-500 text-[10px]">Universitas</div>
                            </div>
                            <div class="bg-gradient-to-br from-orange-600/20 to-orange-700/10 rounded-xl p-4 text-center border border-orange-700/20">
                                <i class="fas fa-briefcase text-orange-400 text-xl mb-2"></i>
                                <div class="text-white font-bold text-lg">500+</div>
                                <div class="text-gray-500 text-[10px]">Industri</div>
                            </div>
                        </div>
                        <div class="bg-kvt-800/30 rounded-xl p-4">
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-xs text-gray-400">Progres Akademik</span>
                                <span class="text-xs text-kvt-400 font-bold">Level 42</span>
                            </div>
                            <div class="w-full h-2.5 bg-kvt-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-kvt-400 via-ungu-400 to-pink-400 rounded-full w-[42%]"></div>
                            </div>
                            <div class="flex justify-between mt-2 text-[10px] text-gray-500">
                                <span>4,200 Poin</span><span>Silver Scholar</span>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-green-500/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float">
                        <span class="text-white text-sm font-semibold"><i class="fas fa-certificate mr-1"></i>Sertifikat</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-kvt-500 to-ungu-500 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float" style="animation-delay: 1s">
                        <span class="text-white text-sm font-semibold"><i class="fas fa-graduation-cap mr-1"></i>Wisuda Virtual</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce-slow">
        <a href="#ekosistem" class="text-kvt-400/50 hover:text-kvt-400 transition"><i class="fas fa-chevron-down text-2xl"></i></a>
    </div>
</section>

{{-- ECOSYSTEM PILLARS --}}
<section class="py-20 relative" id="ekosistem">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Ekosistem Terintegrasi</span>
            <h2 class="text-4xl font-black text-white mt-2">8 Pilar Ekosistem Global</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari pendidikan dasar, riset, karir, hingga keamanan informasi - semua dalam satu platform</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
            $pilar = [
                ['Jenjang Pendidikan', '13 jenjang TK-S3', 'fa-graduation-cap', 'from-blue-500 to-cyan-500', 'halaman.jenjang'],
                ['Riset & Inovasi', '150+ universitas', 'fa-microscope', 'from-purple-500 to-violet-500', 'halaman.riset'],
                ['Karir & Industri', '500+ perusahaan', 'fa-briefcase', 'from-orange-500 to-red-500', 'halaman.karir'],
                ['Komunitas', '50K+ anggota', 'fa-users', 'from-pink-500 to-rose-500', 'halaman.komunitas'],
                ['Sertifikasi', '120+ program', 'fa-award', 'from-amber-500 to-yellow-500', 'halaman.sertifikasi'],
                ['Sumber Daya', '17K+ resources', 'fa-database', 'from-cyan-500 to-teal-500', 'halaman.sumber-daya'],
                ['Keamanan', 'ISO 27001', 'fa-shield-alt', 'from-red-500 to-pink-500', 'halaman.keamanan'],
                ['Penjamin Mutu', 'QA/QC & SPK', 'fa-check-double', 'from-teal-500 to-green-500', 'halaman.penjamin-mutu'],
            ];
            @endphp
            @foreach($pilar as $i => $p)
            <a href="{{ route($p[4]) }}" class="group kaca rounded-2xl p-5 hover:border-kvt-500/30 transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $p[2] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-0.5">{{ $p[0] }}</h3>
                <p class="text-gray-500 text-xs">{{ $p[1] }}</p>
            </a>
            @endforeach
        </div>
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
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Kampus virtual interaktif, video learning, dan 30+ diagram untuk pengalaman belajar yang belum pernah ada sebelumnya</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $fitur = [
                    ['ikon' => 'fa-graduation-cap', 'judul' => 'Kampus Virtual Level 1-100', 'desk' => 'Naik level dengan menyelesaikan materi dan sertifikasi. Raih gelar virtual dan pencapaian akademik!', 'warna' => 'from-purple-500 to-pink-500'],
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

{{-- VIRTUAL CAMPUS PROGRESSION SECTION --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-kvt-900 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Progres Akademik Virtual</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-6">Kampus Digital Interaktif</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">
                    Sistem pencapaian bertingkat yang mengubah perjalanan belajar menjadi pengalaman yang terukur dan memotivasi.
                    Mulai dari <span class="text-kvt-400 font-semibold">Novice Scholar (Level 1)</span> hingga
                    <span class="text-yellow-400 font-semibold">Grandmaster Scholar (Level 100)</span>.
                </p>

                {{-- Level Ranks --}}
                <div class="space-y-3">
                    @php
                        $ranks = [
                            ['nama' => 'Novice Scholar', 'level' => '1-9', 'warna' => 'bg-gray-500', 'persen' => '10'],
                            ['nama' => 'Apprentice', 'level' => '10-19', 'warna' => 'bg-green-500', 'persen' => '20'],
                            ['nama' => 'Iron Scholar', 'level' => '20-29', 'warna' => 'bg-slate-400', 'persen' => '30'],
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
                        <i class="fas fa-star text-kvt-400 mr-3"></i>Cara Mendapatkan Poin
                    </h3>
                    <div class="space-y-4">
                        @php
                            $xpList = [
                                ['aksi' => 'Selesaikan materi', 'xp' => '+10-50 Poin', 'ikon' => 'fa-book'],
                                ['aksi' => 'Lulus kuis (>70%)', 'xp' => '+5-25 Poin', 'ikon' => 'fa-question-circle'],
                                ['aksi' => 'Gabung kelas baru', 'xp' => '+20 Poin', 'ikon' => 'fa-door-open'],
                                ['aksi' => 'Hadir setiap hari', 'xp' => '+5 Poin', 'ikon' => 'fa-calendar-check'],
                                ['aksi' => 'Selesaikan proyek', 'xp' => '+100 Poin', 'ikon' => 'fa-project-diagram'],
                                ['aksi' => 'Raih pencapaian', 'xp' => '+50 Poin', 'ikon' => 'fa-medal'],
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

{{-- RISET & INOVASI SECTION --}}
<section class="py-20 relative" id="riset">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-purple-950/20 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div data-aos="fade-right">
                <span class="text-purple-400 text-sm font-semibold tracking-wider uppercase">Riset & Inovasi</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-6">Pusat Riset Digital Global</h2>
                <p class="text-gray-400 mb-8 leading-relaxed">
                    Kolaborasi riset lintas negara dengan 150+ universitas mitra. Akses jurnal, konferensi internasional, dan paten inovasi dalam satu platform terintegrasi.
                </p>
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-purple-700/20">
                        <i class="fas fa-flask text-purple-400 text-xl mb-2"></i>
                        <h4 class="text-white font-bold text-sm">Pusat Riset</h4>
                        <p class="text-gray-500 text-xs mt-1">Lab virtual untuk eksperimen & simulasi</p>
                    </div>
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-blue-700/20">
                        <i class="fas fa-file-alt text-blue-400 text-xl mb-2"></i>
                        <h4 class="text-white font-bold text-sm">Jurnal & Publikasi</h4>
                        <p class="text-gray-500 text-xs mt-1">Repositori jurnal terakreditasi</p>
                    </div>
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-green-700/20">
                        <i class="fas fa-project-diagram text-green-400 text-xl mb-2"></i>
                        <h4 class="text-white font-bold text-sm">Kolaborasi</h4>
                        <p class="text-gray-500 text-xs mt-1">Tim riset lintas institusi & negara</p>
                    </div>
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-yellow-700/20">
                        <i class="fas fa-lightbulb text-yellow-400 text-xl mb-2"></i>
                        <h4 class="text-white font-bold text-sm">Inovasi & Paten</h4>
                        <p class="text-gray-500 text-xs mt-1">Daftarkan inovasi & hak cipta</p>
                    </div>
                </div>
                <a href="{{ route('halaman.riset') }}" class="inline-flex items-center gap-2 text-purple-400 hover:text-purple-300 font-semibold transition">
                    Jelajahi Riset <i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div data-aos="fade-left" data-aos-delay="150">
                <div class="bg-kvt-900/80 border border-purple-700/20 rounded-2xl p-8 shadow-2xl">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-violet-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-microscope text-white text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold">Research Dashboard</h3>
                            <p class="text-gray-500 text-xs">Statistik riset real-time</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3">
                            <span class="text-gray-300 text-sm"><i class="fas fa-university text-blue-400 mr-2"></i>Universitas Mitra</span>
                            <span class="text-white font-bold">150+</span>
                        </div>
                        <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3">
                            <span class="text-gray-300 text-sm"><i class="fas fa-file-alt text-green-400 mr-2"></i>Paper Terpublikasi</span>
                            <span class="text-white font-bold">2,400+</span>
                        </div>
                        <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3">
                            <span class="text-gray-300 text-sm"><i class="fas fa-globe-americas text-cyan-400 mr-2"></i>Negara Kolaborator</span>
                            <span class="text-white font-bold">35+</span>
                        </div>
                        <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg px-4 py-3">
                            <span class="text-gray-300 text-sm"><i class="fas fa-award text-yellow-400 mr-2"></i>Konferensi Per Tahun</span>
                            <span class="text-white font-bold">48+</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KARIR & INDUSTRI SECTION --}}
<section class="py-20 relative" id="karir">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-orange-400 text-sm font-semibold tracking-wider uppercase">Karir & Industri</span>
            <h2 class="text-4xl font-black text-white mt-2">Jembatan Menuju Dunia Kerja</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Terhubung langsung dengan 500+ perusahaan mitra untuk lowongan, magang, dan mentoring profesional</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $karirItems = [
                ['ikon' => 'fa-search-dollar', 'judul' => 'Lowongan Kerja', 'desk' => 'Ribuan lowongan dari perusahaan top nasional & multinasional', 'warna' => 'from-green-500 to-emerald-600', 'border' => 'border-green-700/20'],
                ['ikon' => 'fa-user-tie', 'judul' => 'Magang & Intern', 'desk' => 'Program magang bersertifikat di perusahaan teknologi terkemuka', 'warna' => 'from-blue-500 to-indigo-600', 'border' => 'border-blue-700/20'],
                ['ikon' => 'fa-chalkboard-teacher', 'judul' => 'Mentoring', 'desk' => 'Bimbingan 1-on-1 dari profesional industri berpengalaman', 'warna' => 'from-orange-500 to-red-500', 'border' => 'border-orange-700/20'],
                ['ikon' => 'fa-file-invoice', 'judul' => 'CV Builder', 'desk' => 'Buat CV profesional dengan template ATS-friendly', 'warna' => 'from-cyan-500 to-blue-500', 'border' => 'border-cyan-700/20'],
            ];
            @endphp
            @foreach($karirItems as $i => $item)
            <div class="group bg-kvt-900/50 border {{ $item['border'] }} rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-500 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br {{ $item['warna'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas {{ $item['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $item['judul'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $item['desk'] }}</p>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-10" data-aos="fade-up">
            <a href="{{ route('halaman.karir') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-orange-500 to-red-500 text-white px-8 py-3 rounded-xl font-semibold hover:from-orange-400 hover:to-red-400 transition shadow-lg">
                <i class="fas fa-briefcase"></i> Jelajahi Karir
            </a>
        </div>
    </div>
</section>

{{-- SERTIFIKASI & SUMBER DAYA --}}
<section class="py-20 relative" id="sertifikasi">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
            {{-- Sertifikasi --}}
            <div data-aos="fade-right">
                <span class="text-yellow-400 text-sm font-semibold tracking-wider uppercase">Sertifikasi</span>
                <h2 class="text-3xl font-black text-white mt-2 mb-6">120+ Program Sertifikasi</h2>
                <p class="text-gray-400 mb-6 text-sm leading-relaxed">Tingkatkan kompetensi dengan sertifikasi yang diakui industri global</p>
                <div class="space-y-3">
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-yellow-700/20 hover:border-yellow-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-amber-600 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-certificate text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Kompetensi Nasional</h4>
                            <p class="text-gray-500 text-xs">BNSP, LSP, & Badan Sertifikasi Resmi</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-orange-700/20 hover:border-orange-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-500 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fab fa-aws text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">AWS / Google / Microsoft</h4>
                            <p class="text-gray-500 text-xs">Sertifikasi cloud & teknologi internasional</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-blue-700/20 hover:border-blue-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-link text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Blockchain Credential</h4>
                            <p class="text-gray-500 text-xs">Verifikasi digital berbasis blockchain</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('halaman.sertifikasi') }}" class="inline-flex items-center gap-2 text-yellow-400 hover:text-yellow-300 font-semibold transition mt-6">
                    Lihat Semua Sertifikasi <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            {{-- Sumber Daya --}}
            <div data-aos="fade-left" data-aos-delay="150">
                <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase">Sumber Daya</span>
                <h2 class="text-3xl font-black text-white mt-2 mb-6">17,000+ Resources</h2>
                <p class="text-gray-400 mb-6 text-sm leading-relaxed">Akses e-book, dataset, coding playground, API, dan template proyek</p>
                <div class="space-y-3">
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-blue-700/20 hover:border-blue-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-kvt-600 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">E-Book & Modul</h4>
                            <p class="text-gray-500 text-xs">5,000+ e-book dari berbagai bidang ilmu</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-green-700/20 hover:border-green-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-table text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Dataset Publik</h4>
                            <p class="text-gray-500 text-xs">Data riset, ML, dan analytics siap pakai</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 bg-kvt-800/30 rounded-xl p-4 border border-purple-700/20 hover:border-purple-600/40 transition">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-violet-600 rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas fa-laptop-code text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">Coding Playground</h4>
                            <p class="text-gray-500 text-xs">IDE online untuk Python, JS, PHP & lainnya</p>
                        </div>
                    </div>
                </div>
                <a href="{{ route('halaman.sumber-daya') }}" class="inline-flex items-center gap-2 text-cyan-400 hover:text-cyan-300 font-semibold transition mt-6">
                    Akses Sumber Daya <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- KOMUNITAS SECTION --}}
<section class="py-20 relative" id="komunitas">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-pink-400 text-sm font-semibold tracking-wider uppercase">Komunitas</span>
            <h2 class="text-4xl font-black text-white mt-2">50,000+ Anggota Aktif</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Forum diskusi, study group, alumni network, hackathon, dan kontribusi open source</p>
        </div>
        <div class="grid md:grid-cols-3 lg:grid-cols-5 gap-4">
            @php
            $komunitas = [
                ['ikon' => 'fa-comments', 'judul' => 'Forum Diskusi', 'desk' => 'Tanya jawab & sharing knowledge', 'warna' => 'from-kvt-500 to-blue-600'],
                ['ikon' => 'fa-user-friends', 'judul' => 'Study Group', 'desk' => 'Belajar bersama secara virtual', 'warna' => 'from-pink-500 to-rose-600'],
                ['ikon' => 'fa-graduation-cap', 'judul' => 'Alumni', 'desk' => 'Jaringan alumni & mentoring', 'warna' => 'from-amber-500 to-orange-600'],
                ['ikon' => 'fa-code', 'judul' => 'Hackathon', 'desk' => 'Kompetisi coding & inovasi', 'warna' => 'from-emerald-500 to-green-600'],
                ['ikon' => 'fab fa-github', 'judul' => 'Open Source', 'desk' => 'Kontribusi proyek terbuka', 'warna' => 'from-gray-600 to-gray-700'],
            ];
            @endphp
            @foreach($komunitas as $i => $item)
            <a href="{{ route('halaman.komunitas') }}" class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-5 hover:border-kvt-500/30 transition-all duration-300 hover:-translate-y-2 text-center" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $item['warna'] }} rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="{{ str_contains($item['ikon'], 'fab') ? $item['ikon'] : 'fas '.$item['ikon'] }} text-white text-lg"></i>
                </div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $item['judul'] }}</h4>
                <p class="text-gray-500 text-xs">{{ $item['desk'] }}</p>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/30 rounded-3xl p-12 shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-kvt-500/5 to-ungu-400/5"></div>
            <div class="relative">
                <div class="w-20 h-20 bg-gradient-to-br from-kvt-400 to-ungu-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-kvt-500/30">
                    <i class="fas fa-rocket text-3xl text-white"></i>
                </div>
                <h2 class="text-4xl font-black text-white mb-4">Bergabung dengan Ekosistem Global</h2>
                <p class="text-gray-400 mb-8 max-w-xl mx-auto">
                    Daftar sekarang dan mulai perjalanan akademik virtual.
                    Akses 13 jenjang pendidikan, riset global, dan 500+ mitra industri.
                </p>
                <div class="flex justify-center gap-4 flex-wrap">
                    <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-10 py-4 rounded-xl font-bold transition-all shadow-lg shadow-kvt-500/30 text-lg">
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

{{-- SECURITY & STANDARDS RIBBON --}}
<section class="py-12 bg-kvt-900/30 border-t border-b border-kvt-700/20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap items-center justify-center gap-8" data-aos="fade-up">
            @php
            $standar = [
                ['ISO 27001', 'fa-shield-alt', 'text-green-400'],
                ['COBIT 2019', 'fa-sitemap', 'text-blue-400'],
                ['QA/QC', 'fa-check-double', 'text-purple-400'],
                ['UU ITE & PDP', 'fa-gavel', 'text-yellow-400'],
                ['SPK/DSS', 'fa-cogs', 'text-cyan-400'],
                ['CRM', 'fa-handshake', 'text-pink-400'],
            ];
            @endphp
            @foreach($standar as $s)
            <div class="flex items-center gap-2 text-xs text-gray-400">
                <div class="w-8 h-8 bg-kvt-800/50 rounded-lg flex items-center justify-center"><i class="fas {{ $s[1] }} {{ $s[2] }}"></i></div>
                <span>{{ $s[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
