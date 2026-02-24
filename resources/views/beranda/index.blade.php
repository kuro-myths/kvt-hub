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
                    <div class="absolute -z-10 inset-0 flex items-center justify-center opacity-20">
                        <img src="{{ asset('images/hero-education.svg') }}" alt="Education Illustration" class="w-full h-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce-slow">
        <a href="#ekosistem" class="text-kvt-400/50 hover:text-kvt-400 transition"><i class="fas fa-chevron-down text-2xl"></i></a>
    </div>
</section>

{{-- SPONSOR & MITRA MARQUEE --}}
@if($mitraTampil->count() > 0)
<section class="py-6 bg-kvt-900/40 border-y border-kvt-700/20 overflow-hidden relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center gap-6">
            <div class="shrink-0 hidden md:flex items-center gap-2 text-xs text-gray-500 uppercase tracking-widest font-bold">
                <i class="fas fa-handshake text-kvt-400"></i> Didukung Oleh
            </div>
            <div class="flex-1 overflow-hidden relative">
                <div class="absolute left-0 top-0 bottom-0 w-16 bg-gradient-to-r from-kvt-900/80 to-transparent z-10 pointer-events-none"></div>
                <div class="absolute right-0 top-0 bottom-0 w-16 bg-gradient-to-l from-kvt-900/80 to-transparent z-10 pointer-events-none"></div>
                <div class="sponsor-track">
                    @foreach($mitraTampil as $mitra)
                    <a href="{{ route('kerja-sama.tampilkan', $mitra->slug) }}" class="shrink-0 flex items-center gap-3 bg-kvt-800/30 hover:bg-kvt-700/30 border border-kvt-700/20 hover:border-kvt-500/30 rounded-xl px-5 py-2.5 transition-all group" title="{{ $mitra->nama }}">
                        @if($mitra->logo_url)
                        <img src="{{ $mitra->logo_url }}" alt="{{ $mitra->nama }}" class="w-7 h-7 rounded-lg object-contain bg-white/10 p-0.5">
                        @else
                        <div class="w-7 h-7 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-lg flex items-center justify-center shrink-0">
                            <span class="text-white text-xs font-black">{{ strtoupper(substr($mitra->nama, 0, 1)) }}</span>
                        </div>
                        @endif
                        <span class="text-gray-400 group-hover:text-white text-sm font-medium whitespace-nowrap transition">{{ $mitra->nama }}</span>
                        @if($mitra->tier === 'platinum' || $mitra->tier === 'gold')
                        <i class="fas fa-gem text-yellow-400 text-[10px]"></i>
                        @endif
                    </a>
                    @endforeach
                    {{-- Duplicate for seamless infinite scroll --}}
                    @foreach($mitraTampil as $mitra)
                    <a href="{{ route('kerja-sama.tampilkan', $mitra->slug) }}" class="shrink-0 flex items-center gap-3 bg-kvt-800/30 hover:bg-kvt-700/30 border border-kvt-700/20 hover:border-kvt-500/30 rounded-xl px-5 py-2.5 transition-all group" title="{{ $mitra->nama }}">
                        @if($mitra->logo_url)
                        <img src="{{ $mitra->logo_url }}" alt="{{ $mitra->nama }}" class="w-7 h-7 rounded-lg object-contain bg-white/10 p-0.5">
                        @else
                        <div class="w-7 h-7 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-lg flex items-center justify-center shrink-0">
                            <span class="text-white text-xs font-black">{{ strtoupper(substr($mitra->nama, 0, 1)) }}</span>
                        </div>
                        @endif
                        <span class="text-gray-400 group-hover:text-white text-sm font-medium whitespace-nowrap transition">{{ $mitra->nama }}</span>
                        @if($mitra->tier === 'platinum' || $mitra->tier === 'gold')
                        <i class="fas fa-gem text-yellow-400 text-[10px]"></i>
                        @endif
                    </a>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('kerja-sama.index') }}" class="shrink-0 hidden md:flex items-center gap-1 text-xs text-kvt-400 hover:text-kvt-300 font-semibold transition">
                Semua Mitra <i class="fas fa-arrow-right text-[10px]"></i>
            </a>
        </div>
    </div>
</section>
@endif

{{-- ==================== VISI, MISI & TUJUAN ==================== --}}
<section class="py-20 relative overflow-hidden" id="visi-misi">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute top-0 left-0 w-80 h-80 bg-kvt-500/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-ungu-400/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-16" data-aos="fade-up">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-bullseye mr-2"></i>Landasan Kami</span>
            <h2 class="text-4xl font-black text-white mt-2">Visi, Misi & Tujuan</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Membangun ekosistem pendidikan digital yang inklusif, inovatif, dan berdampak global</p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            {{-- VISI --}}
            <div class="group" data-aos="fade-up" data-aos-delay="0">
                <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-kvt-500/30 transition-all duration-500 hover:-translate-y-2 h-full relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-kvt-500/5 rounded-full blur-2xl group-hover:bg-kvt-500/10 transition"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-kvt-500/20 group-hover:scale-110 transition-transform">
                            <i class="fas fa-eye text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4">Visi</h3>
                        <p class="text-gray-300 leading-relaxed text-sm mb-5">
                            Menjadi <span class="text-kvt-400 font-semibold">ekosistem pendidikan digital terdepan</span> di dunia yang menghubungkan
                            seluruh jenjang pendidikan dari TK hingga S3/PhD dalam satu platform terintegrasi, inklusif, dan inovatif.
                        </p>
                        <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                            <p class="text-xs text-gray-400 italic">"Education without limits, innovation without borders."</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MISI --}}
            <div class="group" data-aos="fade-up" data-aos-delay="100">
                <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-ungu-500/30 transition-all duration-500 hover:-translate-y-2 h-full relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-ungu-500/5 rounded-full blur-2xl group-hover:bg-ungu-500/10 transition"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-ungu-400 to-ungu-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-ungu-500/20 group-hover:scale-110 transition-transform">
                            <i class="fas fa-rocket text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4">Misi</h3>
                        <ul class="space-y-3 text-sm text-gray-300">
                            <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-ungu-400 mt-0.5 shrink-0"></i> Menyediakan kurikulum terintegrasi dari pendidikan dasar hingga tinggi</li>
                            <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-ungu-400 mt-0.5 shrink-0"></i> Menghubungkan 150+ universitas & 500+ industri secara global</li>
                            <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-ungu-400 mt-0.5 shrink-0"></i> Mengembangkan gamifikasi RPG 100 level untuk motivasi belajar</li>
                            <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-ungu-400 mt-0.5 shrink-0"></i> Mendukung riset & inovasi dengan teknologi terkini</li>
                            <li class="flex items-start gap-2.5"><i class="fas fa-check-circle text-ungu-400 mt-0.5 shrink-0"></i> Memastikan keamanan data standar ISO 27001 & COBIT 2019</li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- TUJUAN --}}
            <div class="group" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-2xl p-8 hover:border-green-500/30 transition-all duration-500 hover:-translate-y-2 h-full relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-green-500/5 rounded-full blur-2xl group-hover:bg-green-500/10 transition"></div>
                    <div class="relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 shadow-lg shadow-green-500/20 group-hover:scale-110 transition-transform">
                            <i class="fas fa-flag-checkered text-white text-2xl"></i>
                        </div>
                        <h3 class="text-2xl font-black text-white mb-4">Tujuan</h3>
                        <div class="space-y-3">
                            @php
                            $tujuan = [
                                ['Akses Merata', 'Pendidikan berkualitas untuk semua kalangan', 'fa-universal-access', 'text-blue-400'],
                                ['SDM Berkualitas', 'Mencetak lulusan siap industri global', 'fa-user-graduate', 'text-purple-400'],
                                ['Riset Unggulan', 'Kolaborasi riset lintas negara & disiplin', 'fa-microscope', 'text-teal-400'],
                                ['Inovasi Digital', 'Teknologi mutakhir dalam pendidikan', 'fa-lightbulb', 'text-yellow-400'],
                            ];
                            @endphp
                            @foreach($tujuan as $t)
                            <div class="flex items-start gap-3 bg-kvt-800/20 rounded-lg p-3 hover:bg-kvt-800/40 transition">
                                <i class="fas {{ $t[2] }} {{ $t[3] }} mt-0.5 w-5 text-center shrink-0"></i>
                                <div>
                                    <span class="text-white font-semibold text-sm">{{ $t[0] }}</span>
                                    <span class="text-gray-500 text-xs block">{{ $t[1] }}</span>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ECOSYSTEM PILLARS --}}
<section class="py-20 relative" id="ekosistem">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="zoom-in">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Ekosistem Terintegrasi</span>
            <h2 class="text-4xl font-black text-white mt-2">8 Pilar Ekosistem Global</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari pendidikan dasar, riset, karir, hingga keamanan informasi - semua dalam satu platform</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            @php
            $pilar = [
                ['Jenjang Pendidikan', '13 jenjang TK hingga S3/PhD, profesi, dan vokasi', 'fa-graduation-cap', 'from-blue-500 to-cyan-500', 'halaman.jenjang', 'Falsikom, Fasilkom & seluruh fakultas', 'Meliputi TK/PAUD, SD/MI, SMP/MTs, SMA/MA, SMK (Teknologi/Bisnis/Kesehatan), D1-D4, S1, S2, S3, Post-Doctoral, dan Profesi. Setiap jenjang memiliki kurikulum khusus.', '13 Jenjang', '200+ Kurikulum'],
                ['Riset & Inovasi', '150+ universitas mitra riset global', 'fa-microscope', 'from-purple-500 to-violet-500', 'halaman.riset', 'Publikasi, kolaborasi & paten', 'Pusat riset multidisipliner dengan laboratorium virtual, kolaborasi lintas institusi, dan program publikasi ilmiah terintegrasi.', '150+ Mitra', '50+ Riset Aktif'],
                ['Karir & Industri', '500+ perusahaan & startup mitra kerja', 'fa-briefcase', 'from-orange-500 to-red-500', 'halaman.karir', 'Lowongan, magang & mentoring', 'Job placement, program magang, mentoring industri, dan sertifikasi profesional yang diakui secara global oleh perusahaan ternama.', '500+ Perusahaan', '1K+ Lowongan'],
                ['Komunitas', '50K+ anggota aktif & kontributor', 'fa-users', 'from-pink-500 to-rose-500', 'halaman.komunitas', 'Forum, study group & hackathon', 'Wadah kolaborasi dengan forum diskusi, study group, hackathon, konferensi virtual, dan program volunteer multi-regional.', '50K+ Member', '30+ Events'],
                ['Sertifikasi', '120+ program sertifikasi terakreditasi', 'fa-award', 'from-amber-500 to-yellow-500', 'halaman.sertifikasi', 'BNSP, AWS, Google & Microsoft', 'Program sertifikasi dari lembaga resmi nasional (BNSP) dan internasional (AWS, Google, Microsoft, Cisco, Oracle).', '120+ Program', 'Blockchain Verified'],
                ['Sumber Daya', '17K+ resources & dev tools', 'fa-database', 'from-cyan-500 to-teal-500', 'halaman.sumber-daya', 'E-book, dataset & playground', 'Library digital dengan e-book, jurnal, dataset, sandbox coding, API playground, dan template proyek untuk semua tingkat kemampuan.', '17K+ Resources', '24/7 Akses'],
                ['Keamanan', 'ISO 27001 & Zero Trust Architecture', 'fa-shield-alt', 'from-red-500 to-pink-500', 'halaman.keamanan', 'Tata kelola IT & privasi data', 'Infrastruktur keamanan enterprise dengan standar ISO 27001, COBIT 2019, Zero Trust Architecture, dan enkripsi end-to-end.', 'ISO 27001', 'Zero Trust'],
                ['Penjamin Mutu', 'QA/QC, SPK & audit sistem', 'fa-check-double', 'from-teal-500 to-green-500', 'halaman.penjamin-mutu', 'Standar mutu pendidikan', 'Quality assurance komprehensif dengan sistem audit berkontinyu, standar akreditasi BAN-PT, dan penilaian berbasis outcome.', 'BAN-PT', 'Audit Berkontinyu'],
            ];
            @endphp
            @foreach($pilar as $i => $p)
            <a href="{{ route($p[4]) }}" class="group kaca rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-300 hover:-translate-y-1 flex flex-col gap-4" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                <div class="flex items-start gap-5">
                    <div class="w-14 h-14 bg-gradient-to-br {{ $p[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition shrink-0">
                        <i class="fas {{ $p[2] }} text-white text-xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-lg mb-1">{{ $p[0] }}</h3>
                        <p class="text-gray-400 text-sm mb-1">{{ $p[1] }}</p>
                        <p class="text-gray-500 text-xs"><i class="fas fa-info-circle mr-1 text-kvt-500"></i>{{ $p[5] }}</p>
                    </div>
                    <i class="fas fa-chevron-right text-kvt-600 group-hover:text-kvt-400 transition mt-1"></i>
                </div>
                {{-- Expanded detail --}}
                <div class="bg-kvt-800/20 rounded-xl p-4 border border-kvt-700/10">
                    <p class="text-gray-400 text-xs leading-relaxed mb-3">{{ $p[6] }}</p>
                    <div class="flex items-center gap-3">
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-white bg-kvt-800/50 px-3 py-1.5 rounded-lg border border-kvt-700/20"><i class="fas fa-chart-bar text-kvt-400 text-[10px]"></i>{{ $p[7] }}</span>
                        <span class="inline-flex items-center gap-1.5 text-[11px] font-semibold text-white bg-kvt-800/50 px-3 py-1.5 rounded-lg border border-kvt-700/20"><i class="fas fa-star text-yellow-400 text-[10px]"></i>{{ $p[8] }}</span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- FASILITAS SECTION --}}
<section class="py-20 relative" id="fasilitas">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
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
        <div class="text-center mb-16" data-aos="zoom-in-up">
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
                <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-kvt-500/50 transition-all duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-kvt-500/10" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
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
                            ['nama' => 'Novice Scholar', 'level' => '1-9', 'warna' => 'bg-gray-500', 'persen' => '18'],
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
                            <div class="flex-1 bg-kvt-800/50 rounded-full h-7 overflow-hidden">
                                <div class="h-full {{ $rank['warna'] }} rounded-full flex items-center pl-3 transition-all" style="width: {{ $rank['persen'] }}%; min-width: fit-content;">
                                    <span class="text-xs font-bold text-white drop-shadow whitespace-nowrap">{{ $rank['nama'] }}</span>
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
        <div class="text-center mb-16" data-aos="fade-down">
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

{{-- BERITA TERBARU - AUTO SLIDESHOW + SCREENSHOT --}}
<section class="py-20 relative" id="berita">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900/50"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="flex items-end justify-between mb-12" data-aos="fade-right">
            <div>
                <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-newspaper mr-2"></i>Berita & Update</span>
                <h2 class="text-4xl font-black text-white mt-2">Berita Terbaru</h2>
                <p class="text-gray-400 mt-2">Klik untuk melihat detail laporan lengkap</p>
            </div>
            <a href="{{ route('berita.index') }}" class="hidden md:flex items-center gap-2 text-emerald-400 hover:text-emerald-300 font-semibold transition text-sm">
                Lihat Semua <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        {{-- Auto-rotating news display --}}
        <div class="relative" data-aos="fade-up">
            <div id="beritaSlideshow" class="bg-kvt-900/70 border border-emerald-500/20 rounded-2xl overflow-hidden cursor-pointer hover:border-emerald-500/40 transition-all duration-500 group" onclick="bukaLaporanBerita()">
                <div class="grid md:grid-cols-5 gap-0">
                    {{-- Gambar / Visual --}}
                    <div class="md:col-span-2 h-64 md:h-auto bg-gradient-to-br from-emerald-700/20 to-kvt-900 flex items-center justify-center relative overflow-hidden">
                        <div class="text-center p-8">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                                <i class="fas fa-satellite-dish text-white text-3xl"></i>
                            </div>
                            <div class="text-emerald-400 text-xs font-bold uppercase tracking-widest">Live Update</div>
                            <div class="flex items-center justify-center gap-2 mt-2">
                                <span class="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></span>
                                <span class="text-gray-400 text-xs">Auto-refresh setiap 15 detik</span>
                            </div>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 h-1 bg-kvt-800">
                            <div id="beritaProgressBar" class="h-full bg-gradient-to-r from-emerald-500 to-teal-400 transition-all" style="width:0%"></div>
                        </div>
                    </div>
                    {{-- Konten berita aktif --}}
                    <div class="md:col-span-3 p-8 flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="bg-emerald-500/10 text-emerald-400 text-[10px] font-bold uppercase tracking-wider px-3 py-1 rounded-lg"><i class="fas fa-bolt mr-1"></i>Breaking</span>
                            <span class="text-gray-500 text-xs" id="beritaWaktu"><i class="far fa-clock mr-1"></i>Baru saja</span>
                        </div>
                        <h3 id="beritaJudul" class="text-2xl lg:text-3xl font-black text-white mb-4 group-hover:text-emerald-400 transition leading-tight">KVT Hub v4.0 Resmi Diluncurkan dengan Fitur Terbaru</h3>
                        <p id="beritaRingkasan" class="text-gray-400 text-sm leading-relaxed mb-6">Platform pendidikan dan riset digital global KVT Hub merilis versi 4.0 dengan berbagai peningkatan fitur termasuk donasi, profil karakter, dan tampilan yang lebih rapi.</p>
                        <div class="flex items-center gap-4">
                            <span class="text-emerald-400 font-semibold text-sm group-hover:translate-x-1 transition-transform"><i class="fas fa-expand-alt mr-2"></i>Klik untuk melihat laporan lengkap</span>
                            <div class="flex gap-2">
                                <button onclick="event.stopPropagation();gantiBerita(-1)" class="w-8 h-8 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition"><i class="fas fa-chevron-left text-xs"></i></button>
                                <button onclick="event.stopPropagation();gantiBerita(1)" class="w-8 h-8 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition"><i class="fas fa-chevron-right text-xs"></i></button>
                            </div>
                        </div>
                        {{-- Indikator slide --}}
                        <div class="flex gap-2 mt-4" id="beritaDots"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-8 md:hidden">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white px-6 py-3 rounded-xl font-semibold transition">
                <i class="fas fa-newspaper"></i> Lihat Semua Berita
            </a>
        </div>
    </div>
</section>

{{-- MODAL LAPORAN BERITA (Fullscreen View) --}}
<div id="modalLaporan" class="fixed inset-0 z-[999] bg-kvt-950/95 backdrop-blur-md hidden" onclick="tutupLaporan(event)">
    <div class="max-w-4xl mx-auto px-4 py-8 h-full overflow-y-auto" onclick="event.stopPropagation()">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
                <div>
                    <h4 class="text-white font-bold">Laporan & Changelog</h4>
                    <p class="text-gray-500 text-xs">KVT Hub - Tahun {{ date('Y') }}</p>
                </div>
            </div>
            <button onclick="tutupLaporan(event)" class="w-10 h-10 bg-kvt-800/50 hover:bg-red-500/20 rounded-xl flex items-center justify-center text-gray-400 hover:text-red-400 transition">
                <i class="fas fa-times text-lg"></i>
            </button>
        </div>
        <div id="laporanKonten" class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8">
            <div class="prose prose-invert max-w-none">
                <h2 class="text-2xl font-black text-white mb-2" id="laporanJudul">KVT Hub v4.0 Changelog</h2>
                <p class="text-gray-500 text-sm mb-6" id="laporanTanggal">16 Februari 2026</p>
                <div id="laporanIsi" class="text-gray-300 text-sm leading-relaxed space-y-4">
                    <div class="bg-emerald-500/5 border-l-4 border-emerald-500 p-4 rounded-r-xl">
                        <h4 class="text-emerald-400 font-bold mb-2"><i class="fas fa-plus-circle mr-2"></i>Fitur Baru</h4>
                        <ul class="text-gray-400 text-sm space-y-1 list-disc list-inside">
                            <li>Halaman profil karakter Kuro - The Chosen One</li>
                            <li>Fitur donasi untuk mendukung pengembangan</li>
                            <li>Berita auto-slideshow dengan laporan interaktif</li>
                            <li>Ekosistem pilar dengan layout 2 kolom yang rapi</li>
                            <li>Visi & Misi card di halaman beranda</li>
                            <li>Office illustration & visual enhancement</li>
                        </ul>
                    </div>
                    <div class="bg-blue-500/5 border-l-4 border-blue-500 p-4 rounded-r-xl">
                        <h4 class="text-blue-400 font-bold mb-2"><i class="fas fa-wrench mr-2"></i>Perbaikan</h4>
                        <ul class="text-gray-400 text-sm space-y-1 list-disc list-inside">
                            <li>Footer social links sudah sinkron dengan akun resmi</li>
                            <li>Icon pada event/ekosistem sudah diperbaiki</li>
                            <li>Layout responsif lebih rapi di mobile & desktop</li>
                            <li>Warna dan bendera pada flag counter sinkron</li>
                        </ul>
                    </div>
                    <div class="bg-purple-500/5 border-l-4 border-purple-500 p-4 rounded-r-xl">
                        <h4 class="text-purple-400 font-bold mb-2"><i class="fas fa-code mr-2"></i>Teknis</h4>
                        <ul class="text-gray-400 text-sm space-y-1 list-disc list-inside">
                            <li>Versi: v4.0.0</li>
                            <li>Framework: Laravel {{ app()->version() }}</li>
                            <li>PHP: {{ PHP_VERSION }}</li>
                            <li>Total baris kode: 10,000+</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
        <div class="text-center mb-16" data-aos="zoom-in">
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
        <div class="text-center mb-16" data-aos="fade-down">
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

{{-- VISI & MISI SECTION --}}
<section class="py-20 relative" id="visi-misi">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/30 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-bullseye mr-2"></i>Visi & Misi</span>
            <h2 class="text-4xl font-black text-white mt-2">Tujuan Kami</h2>
        </div>
        <div class="grid md:grid-cols-2 gap-8">
            {{-- Visi --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-8 hover:border-kvt-500/30 transition-all" data-aos="fade-right">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-kvt-500 to-ungu-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-eye text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white">Visi</h3>
                </div>
                <p class="text-gray-400 leading-relaxed">Menjadi ekosistem pendidikan digital global terdepan yang mengintegrasikan seluruh jenjang pendidikan (TK-S3), riset, karir, dan sertifikasi dalam satu platform terunifikasi. Menghubungkan pelajar, pengajar, peneliti, dan industri di seluruh dunia.</p>
                <div class="mt-6 flex items-center gap-3">
                    <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Admin" class="w-10 h-10 rounded-xl object-cover border-2 border-kvt-500/30">
                    <div>
                        <p class="text-white text-sm font-bold">Kuro</p>
                        <p class="text-gray-500 text-xs">Founder & The Chosen One</p>
                    </div>
                </div>
            </div>
            {{-- Misi --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-8 hover:border-kvt-500/30 transition-all" data-aos="fade-left">
                <div class="flex items-center gap-4 mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-flag text-white text-xl"></i>
                    </div>
                    <h3 class="text-2xl font-black text-white">Misi</h3>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-start gap-3 text-gray-400 text-sm"><i class="fas fa-check-circle text-emerald-400 mt-1 shrink-0"></i>Menyediakan pendidikan berkualitas yang dapat diakses oleh siapa saja, di mana saja</li>
                    <li class="flex items-start gap-3 text-gray-400 text-sm"><i class="fas fa-check-circle text-emerald-400 mt-1 shrink-0"></i>Membangun jembatan antara dunia akademik dan industri profesional</li>
                    <li class="flex items-start gap-3 text-gray-400 text-sm"><i class="fas fa-check-circle text-emerald-400 mt-1 shrink-0"></i>Mendorong kolaborasi riset lintas institusi dan lintas negara</li>
                    <li class="flex items-start gap-3 text-gray-400 text-sm"><i class="fas fa-check-circle text-emerald-400 mt-1 shrink-0"></i>Mengembangkan sistem sertifikasi yang diakui secara global</li>
                    <li class="flex items-start gap-3 text-gray-400 text-sm"><i class="fas fa-check-circle text-emerald-400 mt-1 shrink-0"></i>Menciptakan komunitas pembelajar yang saling mendukung dan menginspirasi</li>
                </ul>
            </div>
        </div>

        {{-- Veteran Profile Card Teaser --}}
        <div class="mt-12 bg-gradient-to-r from-kvt-900/80 via-red-900/15 to-kvt-900/80 border border-red-500/20 rounded-2xl p-8 flex flex-col md:flex-row items-center gap-8 relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute inset-0 opacity-[0.02] pointer-events-none" style="background: repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(255,50,50,0.1) 3px, rgba(255,50,50,0.1) 4px);"></div>
            <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-red-950/50 to-kvt-950 shadow-2xl border-2 border-red-500/30 flex items-center justify-center shrink-0 relative">
                <i class="fas fa-bolt text-red-500/40 text-5xl"></i>
            </div>
            <div class="flex-1 text-center md:text-left relative">
                <div class="inline-flex items-center bg-red-500/10 border border-red-500/20 rounded-full px-3 py-1 mb-3">
                    <span class="text-red-400 text-xs font-bold"><i class="fas fa-trophy mr-1"></i>The Legend</span>
                </div>
                <h3 class="text-2xl font-black text-white mb-2">Veteran</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">Entitas pertama yang muncul sebelum KVT dan MYTHS ada. Muncul sebagai glitch — anomali digital yang menarik semua karakter lain. Di-input sebagai <code class="text-red-400 bg-red-500/10 px-1.5 py-0.5 rounded">the_veteran.kvt</code> dalam ekosistem mitos.</p>
                <a href="{{ route('halaman.veteran') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white px-6 py-2.5 rounded-xl font-semibold transition shadow-lg shadow-red-500/20 text-sm">
                    <i class="fas fa-bolt"></i> Lihat Profil Lengkap
                </a>
            </div>
        </div>

        {{-- Bejotaro Profile Card Teaser --}}
        <div class="mt-6 bg-gradient-to-r from-kvt-900/80 via-amber-900/20 to-kvt-900/80 border border-amber-500/20 rounded-2xl p-8 flex flex-col md:flex-row items-center gap-8" data-aos="zoom-in">
            <div class="w-32 h-32 rounded-2xl bg-gradient-to-br from-amber-950/50 to-kvt-950 shadow-2xl border-2 border-amber-500/30 flex items-center justify-center shrink-0">
                <i class="fas fa-dragon text-amber-500/40 text-5xl"></i>
            </div>
            <div class="flex-1 text-center md:text-left">
                <div class="inline-flex items-center bg-amber-500/10 border border-amber-500/20 rounded-full px-3 py-1 mb-3">
                    <span class="text-amber-400 text-xs font-bold"><i class="fas fa-crown mr-1"></i>Sang Leluhur</span>
                </div>
                <h3 class="text-2xl font-black text-white mb-2">Bejotaro</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">Anak yang terlahir dari sejarah budaya leluhur Nusantara. Keturunan Pandawa yang membawa kebijaksanaan, keberanian, dan kemuliaan. Di-input sebagai <code class="text-amber-400 bg-amber-500/10 px-1.5 py-0.5 rounded">the_antaboga.kvt</code> dalam ekosistem mitos.</p>
                <a href="{{ route('halaman.bejotaro') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-600 to-yellow-600 hover:from-amber-500 hover:to-yellow-500 text-white px-6 py-2.5 rounded-xl font-semibold transition shadow-lg shadow-amber-500/20 text-sm">
                    <i class="fas fa-dragon"></i> Lihat Profil Lengkap
                </a>
            </div>
        </div>

        {{-- Kuro Profile Card Teaser --}}
        <div class="mt-12 bg-gradient-to-r from-kvt-900/80 via-purple-900/20 to-kvt-900/80 border border-purple-500/20 rounded-2xl p-8 flex flex-col md:flex-row items-center gap-8" data-aos="zoom-in">
            <img src="{{ asset('gambar/kuro/kuro1.png') }}" alt="Kuro - The Chosen One" class="w-32 h-32 rounded-2xl object-cover shadow-2xl border-2 border-purple-500/30">
            <div class="flex-1 text-center md:text-left">
                <div class="inline-flex items-center bg-purple-500/10 border border-purple-500/20 rounded-full px-3 py-1 mb-3">
                    <span class="text-purple-400 text-xs font-bold"><i class="fas fa-star mr-1"></i>The Chosen One</span>
                </div>
                <h3 class="text-2xl font-black text-white mb-2">Kuro</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">Karakter hidup yang diciptakan dengan inisial RH. Kuro adalah the_chosen_one yang menghidupkan dunia virtual KVT Hub. Karakter pertama yang di-input sebagai <code class="text-purple-400 bg-purple-500/10 px-1.5 py-0.5 rounded">the_chosen_one.kvt</code> dalam ekosistem mitos.</p>
                <a href="{{ route('halaman.kuro') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-purple-600 to-violet-600 hover:from-purple-500 hover:to-violet-500 text-white px-6 py-2.5 rounded-xl font-semibold transition shadow-lg shadow-purple-500/20 text-sm">
                    <i class="fas fa-user-secret"></i> Lihat Profil Lengkap
                </a>
            </div>
        </div>
    </div>
</section>

{{-- DONASI SECTION --}}
<section class="py-20 relative" id="donasi">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-gradient-to-br from-amber-900/20 via-kvt-900/50 to-orange-900/20 border border-amber-500/20 rounded-3xl p-10 md:p-16 relative overflow-hidden" data-aos="fade-up">
            <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/5 rounded-full blur-3xl"></div>
            <div class="relative grid md:grid-cols-2 gap-10 items-center">
                <div>
                    <div class="inline-flex items-center bg-amber-500/10 border border-amber-500/20 rounded-full px-4 py-1.5 mb-4">
                        <i class="fas fa-heart text-red-400 mr-2"></i>
                        <span class="text-amber-400 text-sm font-bold">Dukung Kami</span>
                    </div>
                    <h2 class="text-3xl lg:text-4xl font-black text-white mb-4">Bantu Pengembangan KVT Hub</h2>
                    <p class="text-gray-400 leading-relaxed mb-6">Donasi Anda akan digunakan untuk membeli perangkat kerja (PC/Laptop Rp 50.000.000) agar tim pengembang dapat terus membangun ekosistem pendidikan yang lebih baik untuk semua.</p>
                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div class="bg-kvt-800/30 rounded-xl p-4 text-center border border-amber-700/20">
                            <div class="text-2xl font-black text-amber-400">Rp 50 Jt</div>
                            <div class="text-gray-500 text-xs mt-1">Target Dana</div>
                        </div>
                        <div class="bg-kvt-800/30 rounded-xl p-4 text-center border border-emerald-700/20">
                            <div class="text-2xl font-black text-emerald-400">PC/Laptop</div>
                            <div class="text-gray-500 text-xs mt-1">Perangkat Kerja</div>
                        </div>
                    </div>
                    <a href="{{ route('halaman.donasi') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-lg shadow-amber-500/20">
                        <i class="fas fa-donate"></i> Donasi Sekarang
                    </a>
                </div>
                <div class="flex justify-center">
                    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 w-full max-w-sm">
                        <div class="text-center mb-4">
                            <i class="fas fa-laptop text-5xl text-amber-400 mb-3"></i>
                            <h4 class="text-white font-bold">Spesifikasi Impian</h4>
                        </div>
                        <div class="space-y-3">
                            <div class="flex justify-between text-sm"><span class="text-gray-400"><i class="fas fa-microchip mr-2 text-blue-400"></i>Processor</span><span class="text-white font-semibold">i9 / Ryzen 9</span></div>
                            <div class="flex justify-between text-sm"><span class="text-gray-400"><i class="fas fa-memory mr-2 text-green-400"></i>RAM</span><span class="text-white font-semibold">32-64 GB</span></div>
                            <div class="flex justify-between text-sm"><span class="text-gray-400"><i class="fas fa-hdd mr-2 text-purple-400"></i>Storage</span><span class="text-white font-semibold">1TB NVMe SSD</span></div>
                            <div class="flex justify-between text-sm"><span class="text-gray-400"><i class="fas fa-tv mr-2 text-cyan-400"></i>GPU</span><span class="text-white font-semibold">RTX 4070+</span></div>
                            <div class="flex justify-between text-sm"><span class="text-gray-400"><i class="fas fa-desktop mr-2 text-amber-400"></i>Monitor</span><span class="text-white font-semibold">27" 4K IPS</span></div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-kvt-700/30">
                            <div class="flex justify-between"><span class="text-gray-500 text-sm">Progress</span><span class="text-amber-400 text-sm font-bold">0%</span></div>
                            <div class="w-full h-2.5 bg-kvt-800 rounded-full mt-2 overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-amber-500 to-orange-500 rounded-full" style="width:0%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA SECTION --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
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

{{-- TEKNOLOGI & INFRASTRUKTUR --}}
<section class="py-20 relative overflow-hidden" id="teknologi">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/50 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase">Teknologi</span>
            <h2 class="text-4xl font-black text-white mt-2">Infrastruktur Modern</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dibangun di atas teknologi terkini untuk performa, keamanan, dan skalabilitas terbaik</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $techItems = [
                ['ikon' => 'fab fa-laravel', 'judul' => 'Laravel Framework', 'desk' => 'Backend robust dengan Laravel terbaru, RESTful API, dan arsitektur MVC yang solid', 'warna' => 'from-red-500 to-orange-500'],
                ['ikon' => 'fas fa-database', 'judul' => 'PostgreSQL', 'desk' => 'Database enterprise-grade dengan ACID compliance, JSON support, dan full-text search', 'warna' => 'from-blue-500 to-indigo-600'],
                ['ikon' => 'fas fa-cloud', 'judul' => 'Cloud Infrastructure', 'desk' => 'Auto-scaling cloud hosting dengan CDN global, 99.99% uptime guarantee', 'warna' => 'from-cyan-500 to-blue-500'],
                ['ikon' => 'fas fa-shield-alt', 'judul' => 'Security First', 'desk' => 'ISO 27001 certified, Zero Trust architecture, enkripsi end-to-end AES-256', 'warna' => 'from-green-500 to-emerald-600'],
                ['ikon' => 'fas fa-chart-bar', 'judul' => 'Real-Time Analytics', 'desk' => 'Dashboard analitik real-time dengan 30+ jenis visualisasi data interaktif', 'warna' => 'from-purple-500 to-violet-600'],
                ['ikon' => 'fas fa-robot', 'judul' => 'AI-Powered', 'desk' => 'Machine learning untuk rekomendasi pembelajaran personal dan analisis prediktif', 'warna' => 'from-pink-500 to-rose-600'],
                ['ikon' => 'fas fa-mobile-alt', 'judul' => 'PWA Ready', 'desk' => 'Progressive Web App yang responsif, bisa diakses offline di semua perangkat', 'warna' => 'from-amber-500 to-yellow-500'],
                ['ikon' => 'fas fa-code-branch', 'judul' => 'Open Source', 'desk' => 'Kode sumber terbuka di GitHub, kontribusi komunitas developer global', 'warna' => 'from-gray-500 to-slate-600'],
            ];
            @endphp
            @foreach($techItems as $i => $item)
            <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-500 hover:-translate-y-2 hover:shadow-xl hover:shadow-cyan-500/5" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $item['warna'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="{{ $item['ikon'] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-sm mb-2">{{ $item['judul'] }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $item['desk'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- TESTIMONI & PENGHARGAAN --}}
<section class="py-20 relative" id="testimoni">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="zoom-in">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase">Testimoni</span>
            <h2 class="text-4xl font-black text-white mt-2">Dipercaya oleh Ribuan Pengguna</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Pendapat para pengguna, pengajar, dan mitra yang telah merasakan manfaat KVT Hub</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $testimoni = [
                ['nama' => 'Dr. Sarah Pratiwi', 'peran' => 'Dosen Ilmu Komputer', 'uni' => 'Universitas Indonesia', 'teks' => 'KVT Hub mengubah cara saya mengajar. Platform ini sangat komprehensif, dari materi hingga analitik pembelajaran. Mahasiswa saya jauh lebih aktif dan termotivasi.', 'avatar' => 'S', 'warna' => 'from-blue-500 to-cyan-500'],
                ['nama' => 'Andi Wijaya', 'peran' => 'Mahasiswa S2 Data Science', 'uni' => 'ITB Bandung', 'teks' => 'Fitur riset kolaborasi sangat membantu tesis saya. Saya bisa terhubung dengan peneliti dari 5 universitas berbeda. Plus, sertifikasi cloud-nya diakui industri!', 'avatar' => 'A', 'warna' => 'from-purple-500 to-violet-500'],
                ['nama' => 'Prof. Budi Hartono', 'peran' => 'Rektor', 'uni' => 'Universitas Teknologi', 'teks' => 'Sebagai institusi, KVT Hub membantu kami mendigitalisasi seluruh kurikulum. Dashboard admin sangat powerful untuk monitoring kinerja akademik secara real-time.', 'avatar' => 'B', 'warna' => 'from-amber-500 to-orange-500'],
            ];
            @endphp
            @foreach($testimoni as $i => $t)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-amber-500/30 transition-all duration-300 relative" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="absolute -top-3 right-6 text-5xl text-kvt-700/30 font-serif">"</div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $t['warna'] }} rounded-xl flex items-center justify-center text-white font-bold text-lg shadow-lg">{{ $t['avatar'] }}</div>
                    <div>
                        <h4 class="text-white font-bold text-sm">{{ $t['nama'] }}</h4>
                        <p class="text-gray-500 text-xs">{{ $t['peran'] }}</p>
                        <p class="text-kvt-400 text-[10px] font-semibold">{{ $t['uni'] }}</p>
                    </div>
                </div>
                <p class="text-gray-400 text-sm leading-relaxed italic">"{{ $t['teks'] }}"</p>
                <div class="flex gap-0.5 mt-4">
                    @for($s = 0; $s < 5; $s++)
                    <i class="fas fa-star text-amber-400 text-xs"></i>
                    @endfor
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATISTIK PLATFORM --}}
<section class="py-20 relative overflow-hidden" id="statistik">
    <div class="absolute inset-0 bg-gradient-to-r from-kvt-950 via-purple-950/20 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-kvt-400 text-sm font-semibold tracking-wider uppercase">Statistik</span>
            <h2 class="text-4xl font-black text-white mt-2">Platform dalam Angka</h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            @php
            $stats = [
                ['angka' => '50K+', 'label' => 'Peserta Didik', 'ikon' => 'fa-users', 'warna' => 'text-blue-400'],
                ['angka' => '13', 'label' => 'Jenjang Pendidikan', 'ikon' => 'fa-graduation-cap', 'warna' => 'text-green-400'],
                ['angka' => '150+', 'label' => 'Universitas Mitra', 'ikon' => 'fa-university', 'warna' => 'text-purple-400'],
                ['angka' => '500+', 'label' => 'Perusahaan Industri', 'ikon' => 'fa-building', 'warna' => 'text-orange-400'],
                ['angka' => '120+', 'label' => 'Program Sertifikasi', 'ikon' => 'fa-award', 'warna' => 'text-yellow-400'],
                ['angka' => '35+', 'label' => 'Negara Kolaborator', 'ikon' => 'fa-globe-americas', 'warna' => 'text-cyan-400'],
            ];
            @endphp
            @foreach($stats as $i => $s)
            <div class="text-center p-4" data-aos="zoom-in" data-aos-delay="{{ $i * 80 }}">
                <i class="fas {{ $s['ikon'] }} {{ $s['warna'] }} text-2xl mb-3"></i>
                <div class="text-3xl font-black text-white">{{ $s['angka'] }}</div>
                <div class="text-gray-500 text-xs mt-1">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ SECTION --}}
<section class="py-20 relative" id="faq">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-lime-400 text-sm font-semibold tracking-wider uppercase">FAQ</span>
            <h2 class="text-4xl font-black text-white mt-2">Pertanyaan yang Sering Diajukan</h2>
        </div>
        <div class="space-y-3" data-aos="fade-up">
            @php
            $faqs = [
                ['q' => 'Apakah KVT Hub gratis untuk digunakan?', 'a' => 'Ya! KVT Hub menyediakan akses gratis untuk fitur dasar termasuk kelas, materi, dan kuis. Untuk fitur premium seperti sertifikasi internasional dan akses riset, tersedia paket langganan yang terjangkau.'],
                ['q' => 'Bagaimana sistem level dan pencapaian bekerja?', 'a' => 'Setiap aktivitas seperti menyelesaikan materi, lulus kuis, dan hadir harian akan memberikan poin. Poin akan meningkatkan level Anda dari Novice Scholar (Lv.1) hingga Grandmaster Scholar (Lv.100) dengan gelar dan badge unik.'],
                ['q' => 'Apakah sertifikat yang diterbitkan diakui?', 'a' => 'Sertifikat KVT Hub terverifikasi blockchain dan terintegrasi dengan BNSP, LSP, serta lembaga sertifikasi internasional seperti AWS, Google Cloud, dan Microsoft Azure.'],
                ['q' => 'Bagaimana cara menjadi pengajar di KVT Hub?', 'a' => 'Daftar sebagai pengajar melalui halaman pendaftaran khusus. Setelah verifikasi credential dan pengalaman, Anda bisa membuat kelas dan materi yang akan diakses oleh ribuan peserta didik.'],
                ['q' => 'Apakah KVT Hub mendukung pembelajaran offline?', 'a' => 'KVT Hub adalah Progressive Web App (PWA) yang mendukung akses offline untuk materi yang sudah diunduh. Anda bisa belajar kapan saja tanpa koneksi internet.'],
            ];
            @endphp
            @foreach($faqs as $i => $faq)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden group" x-data="{ open: false }">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/30 transition">
                    <span class="text-white font-semibold text-sm pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-kvt-400 text-xs transition-transform faq-chevron"></i>
                </button>
                <div class="faq-answer px-5 pb-0 max-h-0 overflow-hidden transition-all duration-300">
                    <p class="text-gray-400 text-sm leading-relaxed pb-5">{{ $faq['a'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
.faq-open .faq-chevron { transform:rotate(180deg) }
.faq-open .faq-answer { max-height:200px;padding-bottom:1.25rem }
.line-clamp-2 { display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden }
</style>
@endpush

@push('scripts')
<script>
// === BERITA AUTO SLIDESHOW ===
const daftarBeritaSlide = [
    { judul: 'KVT Hub v4.0 Resmi Diluncurkan dengan Fitur Terbaru', ringkasan: 'Platform pendidikan dan riset digital global KVT Hub merilis versi 4.0 dengan fitur donasi, profil karakter Kuro, dan landing page yang lebih rapi.', waktu: '16 Feb 2026' },
    { judul: 'Program Beasiswa Riset Global 2026 Dibuka untuk Mahasiswa', ringkasan: 'KVT Hub bekerja sama dengan 150+ universitas mitra membuka program beasiswa riset global. Pendaftaran dibuka hingga Maret 2026.', waktu: '15 Feb 2026' },
    { judul: 'Fitur Real-Time Analytics Dashboard Kini Tersedia', ringkasan: 'Dashboard analitik real-time dengan 30+ jenis visualisasi data interaktif membantu pengajar memantau progres siswa secara langsung.', waktu: '14 Feb 2026' },
    { judul: 'Kolaborasi dengan 50+ Perusahaan Teknologi Terkemuka', ringkasan: 'KVT Hub menjalin kerja sama strategis dengan perusahaan teknologi for program magang, sertifikasi, dan job placement.', waktu: '13 Feb 2026' },
    { judul: 'Kuro - The Chosen One: Karakter Pertama yang Hidup', ringkasan: 'Cerita di balik terciptanya Kuro, karakter the_chosen_one.kvt yang diciptakan oleh RH dan menjadi simbol kreativitas di dunia digital.', waktu: '12 Feb 2026' },
    { judul: 'Sistem Sertifikasi Blockchain Credential Diluncurkan', ringkasan: 'Sertifikat digital terverifikasi blockchain memastikan keaslian kredensial pendidikan yang tidak bisa dipalsukan.', waktu: '11 Feb 2026' },
];

let beritaIndex = 0;
let beritaTimer = null;
let progressInterval = null;

function renderBeritaDots() {
    const dots = document.getElementById('beritaDots');
    if (!dots) return;
    dots.innerHTML = daftarBeritaSlide.map((_, i) =>
        `<button onclick="event.stopPropagation();keBerita(${i})" class="w-2 h-2 rounded-full transition-all ${i === beritaIndex ? 'bg-emerald-400 w-6' : 'bg-kvt-700 hover:bg-kvt-600'}"></button>`
    ).join('');
}

function tampilBerita(i) {
    const b = daftarBeritaSlide[i];
    const judul = document.getElementById('beritaJudul');
    const ringkasan = document.getElementById('beritaRingkasan');
    const waktu = document.getElementById('beritaWaktu');
    if (judul) judul.textContent = b.judul;
    if (ringkasan) ringkasan.textContent = b.ringkasan;
    if (waktu) waktu.innerHTML = '<i class="far fa-clock mr-1"></i>' + b.waktu;
    renderBeritaDots();
    mulaiProgress();
}

function mulaiProgress() {
    const bar = document.getElementById('beritaProgressBar');
    if (!bar) return;
    bar.style.width = '0%';
    let persen = 0;
    clearInterval(progressInterval);
    progressInterval = setInterval(() => {
        persen += 0.67;
        bar.style.width = persen + '%';
        if (persen >= 100) clearInterval(progressInterval);
    }, 100);
}

function gantiBerita(dir) {
    beritaIndex = (beritaIndex + dir + daftarBeritaSlide.length) % daftarBeritaSlide.length;
    tampilBerita(beritaIndex);
    resetTimer();
}

function keBerita(i) {
    beritaIndex = i;
    tampilBerita(beritaIndex);
    resetTimer();
}

function resetTimer() {
    clearInterval(beritaTimer);
    beritaTimer = setInterval(() => gantiBerita(1), 15000);
}

function bukaLaporanBerita() {
    const modal = document.getElementById('modalLaporan');
    const judul = document.getElementById('laporanJudul');
    const tanggal = document.getElementById('laporanTanggal');
    if (modal) modal.classList.remove('hidden');
    if (judul) judul.textContent = daftarBeritaSlide[beritaIndex].judul;
    if (tanggal) tanggal.textContent = daftarBeritaSlide[beritaIndex].waktu;
    document.body.style.overflow = 'hidden';
}

function tutupLaporan(e) {
    e.stopPropagation();
    const modal = document.getElementById('modalLaporan');
    if (modal) modal.classList.add('hidden');
    document.body.style.overflow = '';
}

document.addEventListener('DOMContentLoaded', () => {
    tampilBerita(0);
    beritaTimer = setInterval(() => gantiBerita(1), 15000);
});
</script>
@endpush
