@extends('tata-letak.utama')
@section('judul', 'Inovasi & Paten - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/20 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 left-20 w-80 h-80 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 right-10 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #F59E0B 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-lightbulb"></i> Daftarkan Inovasi Anda
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Inovasi &</span><br>
            <span class="teks-gradien-emas">Paten</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Lindungi inovasi Anda dengan paten. Konsultasi HKI gratis, pendaftaran paten nasional & internasional,
            tech transfer, dan inkubasi startup berbasis riset.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-10" data-aos="fade-up" data-aos-delay="200">
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-amber-500/30 hover:-translate-y-0.5">
                <i class="fas fa-file-contract mr-2"></i>Daftarkan Paten
            </a>
            <a href="#layanan" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-lightbulb mr-2"></i>Lihat Layanan
            </a>
        </div>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="300">
            <div><div class="text-2xl font-black text-white">380+</div><div class="text-xs text-gray-500">Paten</div></div>
            <div><div class="text-2xl font-black text-white">50+</div><div class="text-xs text-gray-500">Startup</div></div>
            <div><div class="text-2xl font-black text-white">$2M+</div><div class="text-xs text-gray-500">Lisensi</div></div>
            <div><div class="text-2xl font-black text-white">90%</div><div class="text-xs text-gray-500">Approval</div></div>
        </div>
    </div>
</section>

{{-- LAYANAN --}}
<section id="layanan" class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">SERVICES</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Layanan Inovasi & HKI</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari ide hingga komersialisasi — kami dampingi setiap langkah</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
        $layanan = [
            ['Konsultasi HKI', 'Konsultasi gratis mengenai Hak Kekayaan Intelektual: paten, hak cipta, merek dagang, dan desain industri.', 'fa-comment-dots', 'from-blue-500 to-indigo-500'],
            ['Pendaftaran Paten', 'Bantuan pendaftaran paten nasional (DJKI) dan internasional (PCT) dengan pendampingan penuh.', 'fa-file-contract', 'from-green-500 to-emerald-500'],
            ['Technology Transfer', 'Komersialisasi hasil riset melalui lisensi teknologi, spin-off, dan kerjasama dengan industri.', 'fa-exchange-alt', 'from-purple-500 to-violet-500'],
            ['Startup Incubation', 'Inkubasi startup berbasis riset dengan mentoring, pendanaan seed, dan akses ke investor.', 'fa-rocket', 'from-orange-500 to-red-500'],
        ];
        @endphp
        @foreach($layanan as $i => $l)
        <div class="kaca rounded-2xl p-6 hover:border-amber-500/30 transition-all duration-300 group hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
            <div class="w-12 h-12 bg-gradient-to-br {{ $l[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $l[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $l[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $l[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- STATISTIK --}}
<section class="bg-gradient-to-br from-amber-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="zoom-in-up">
        <div><div class="text-3xl font-black teks-gradien-emas">380+</div><p class="text-gray-400 text-sm mt-1">Paten Terdaftar</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">50+</div><p class="text-gray-400 text-sm mt-1">Startup Inkubasi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">$2M+</div><p class="text-gray-400 text-sm mt-1">Nilai Lisensi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">90%</div><p class="text-gray-400 text-sm mt-1">Approval Rate</p></div>
    </div>
</section>

{{-- INNOVATION PIPELINE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">PIPELINE</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Innovation Pipeline</h2>
        <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Proses lengkap dari ide inovasi hingga komersialisasi teknologi</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
        @php
        $pipeline = [
            ['Identifikasi Inovasi', 'fa-search', 'text-blue-400', 'Evaluasi potensi inovasi dari hasil riset yang memiliki nilai komersial.'],
            ['Perlindungan HKI', 'fa-shield-alt', 'text-amber-400', 'Daftarkan paten, hak cipta, atau merek dagang untuk perlindungan hukum.'],
            ['Proof of Concept', 'fa-cogs', 'text-green-400', 'Buat prototipe dan validasi kelayakan teknis serta komersial.'],
            ['Tech Transfer', 'fa-exchange-alt', 'text-purple-400', 'Transfer teknologi ke industri melalui lisensi atau spin-off.'],
            ['Komersialisasi', 'fa-store', 'text-rose-400', 'Luncurkan produk/layanan ke pasar dengan dukungan inkubator.'],
        ];
        @endphp
        @foreach($pipeline as $i => $p)
        <div class="text-center" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
            <div class="w-14 h-14 mx-auto bg-kvt-800/50 rounded-full flex items-center justify-center border border-kvt-700/30 mb-3 relative">
                <i class="fas {{ $p[1] }} {{ $p[2] }} text-xl"></i>
                <span class="absolute -top-2 -right-2 w-6 h-6 bg-amber-500 rounded-full text-white text-xs font-bold flex items-center justify-center">{{ $i + 1 }}</span>
            </div>
            <h4 class="text-white font-semibold text-sm mb-1">{{ $p[0] }}</h4>
            <p class="text-gray-500 text-xs">{{ $p[3] }}</p>
            @if($i < 4)<div class="hidden md:block text-kvt-600 mt-3"><i class="fas fa-arrow-right"></i></div>@endif
        </div>
        @endforeach
    </div>
</section>

{{-- PORTOFOLIO PATEN --}}
<section class="bg-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-indigo-500/10 text-indigo-400 px-3 py-1 rounded-full">PORTFOLIO</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Portofolio Paten Terbaru</h2>
        </div>
        @php
        $paten = [
            ['AI-Based Medical Image Diagnosis System', 'Sistem diagnosis otomatis berbasis deep learning untuk citra radiologi.', 'fa-x-ray', 'from-red-500 to-rose-500', 'P-2026-001', 'Granted', 'Dr. Rina Sari'],
            ['Quantum-Encrypted Communication Protocol', 'Protokol komunikasi terenkripsi quantum untuk keamanan data perbankan.', 'fa-lock', 'from-indigo-500 to-purple-500', 'P-2025-042', 'Granted', 'Dr. Budi Hartono'],
            ['Biodegradable Smart Packaging Material', 'Material kemasan cerdas biodegradable dengan sensor freshness terintegrasi.', 'fa-box', 'from-green-500 to-emerald-500', 'P-2025-078', 'Pending', 'Prof. Andi Wijaya'],
            ['IoT-Based Smart Agriculture System', 'Sistem pertanian presisi berbasis IoT dengan drone monitoring dan AI analytics.', 'fa-tractor', 'from-amber-500 to-yellow-500', 'P-2026-015', 'Pending', 'Dr. Mega Putri'],
        ];
        @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($paten as $i => $pt)
            <div class="kaca rounded-2xl p-6 hover:border-amber-500/30 transition group" data-aos="fade-up" data-aos-delay="{{ $i * 80 }}">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $pt[3] }} rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition">
                        <i class="fas {{ $pt[2] }} text-white text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-white font-bold text-sm mb-1">{{ $pt[0] }}</h3>
                        <p class="text-gray-400 text-xs mb-3">{{ $pt[1] }}</p>
                        <div class="flex flex-wrap items-center gap-3 text-xs">
                            <span class="text-amber-400 font-mono"><i class="fas fa-barcode mr-1"></i>{{ $pt[4] }}</span>
                            <span class="px-2 py-0.5 rounded-full border text-[10px] {{ $pt[5] === 'Granted' ? 'bg-green-500/10 text-green-400 border-green-500/20' : 'bg-yellow-500/10 text-yellow-400 border-yellow-500/20' }}">{{ $pt[5] }}</span>
                            <span class="text-gray-500"><i class="fas fa-user mr-1"></i>{{ $pt[6] }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- VIDEO --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-red-500/10 text-red-400 px-3 py-1 rounded-full">VIDEO</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Video Panduan Inovasi</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @php
        $videos = [
            ['judul' => 'Cara Mendaftarkan Paten di DJKI', 'durasi' => '15:30', 'views' => '24K', 'warna' => 'amber', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F59E0B?text=Patent+Registration'],
            ['judul' => 'Technology Transfer 101', 'durasi' => '12:18', 'views' => '18K', 'warna' => 'purple', 'thumb' => 'https://placehold.co/640x360/1a1a2e/A855F7?text=Tech+Transfer'],
            ['judul' => 'Dari Riset ke Startup', 'durasi' => '20:45', 'views' => '42K', 'warna' => 'orange', 'thumb' => 'https://placehold.co/640x360/1a1a2e/F97316?text=Research+to+Startup'],
        ];
        @endphp
        @foreach($videos as $v)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $v['warna'] }}-500/20 hover:border-{{ $v['warna'] }}-500/40 transition group" data-aos="fade-up">
            <div class="relative overflow-hidden">
                <img src="{{ $v['thumb'] }}" alt="{{ $v['judul'] }}" class="w-full h-48 object-cover group-hover:scale-105 transition duration-500">
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                    <div class="w-14 h-14 bg-white/20 backdrop-blur rounded-full flex items-center justify-center"><i class="fas fa-play text-white text-xl ml-1"></i></div>
                </div>
                <span class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-0.5 rounded">{{ $v['durasi'] }}</span>
            </div>
            <div class="p-4">
                <h4 class="text-white font-bold text-sm mb-1">{{ $v['judul'] }}</h4>
                <p class="text-gray-500 text-xs"><i class="fas fa-eye mr-1"></i>{{ $v['views'] }} views</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="bg-gradient-to-br from-kvt-900/50 to-amber-900/20 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Akses Sesuai Peran Anda</h2>
        </div>
        @php
        $roles = [
            ['ikon' => 'fas fa-user-graduate', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Inventor / Peneliti', 'fitur' => ['Ajukan disclosure inovasi', 'Konsultasi HKI gratis', 'Dampingan pendaftaran paten', 'Akses database paten global', 'Join startup incubation program', 'Dapatkan royalti dari lisensi']],
            ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Dosen / Pembimbing', 'fitur' => ['Supervisi inovasi mahasiswa', 'Co-inventor pada paten', 'Akses tech transfer office', 'Mentoring komersialissasi', 'Review disclosure inovasi', 'Partisipasi industrial advisory']],
            ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin IP Office', 'fitur' => ['Kelola portofolio paten', 'Dashboard analytics inovasi', 'Proses pendaftaran HKI', 'Kelola lisensi & royalti', 'Monitor compliance IP', 'Laporan inovasi berkala']],
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
    </div>
</section>

{{-- FAQ --}}
<section class="max-w-4xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-amber-500/10 text-amber-400 px-3 py-1 rounded-full">FAQ</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Pertanyaan Umum</h2>
    </div>
    @php
    $faq = [
        ['q' => 'Berapa lama proses pendaftaran paten?', 'a' => 'Paten sederhana memakan waktu 6-12 bulan, sedangkan paten biasa 2-3 tahun. Pendaftaran internasional (PCT) memerlukan 18-30 bulan. KVT Hub mendampingi seluruh proses.'],
        ['q' => 'Apakah konsultasi HKI benar-benar gratis?', 'a' => 'Ya, konsultasi awal mengenai jenis perlindungan HKI yang sesuai, kelayakan paten, dan strategi IP sepenuhnya gratis untuk semua anggota KVT Hub.'],
        ['q' => 'Siapa yang memiliki hak paten atas inovasi?', 'a' => 'Kepemilikan diatur dalam IP agreement. Umumnya, inventor dan institusi berbagi kepemilikan. KVT Hub memfasilitasi perjanjian yang adil bagi semua pihak.'],
        ['q' => 'Bagaimana cara mendapatkan pendanaan untuk startup?', 'a' => 'Melalui program inkubasi KVT Hub, Anda bisa mendapatkan seed funding $10K-$50K, akses ke angel investor, dan mentoring dari serial entrepreneur.'],
        ['q' => 'Apakah bisa mendaftarkan paten internasional?', 'a' => 'Ya, KVT Hub mendukung pendaftaran melalui Patent Cooperation Treaty (PCT) yang berlaku di 150+ negara. Kami juga mendampingi pendaftaran via EPO dan USPTO.'],
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
<section class="bg-gradient-to-r from-amber-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Lindungi & Komersialisasikan Inovasi Anda</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Daftarkan paten, dapatkan lisensi, dan ubah hasil riset Anda menjadi produk nyata yang berdampak.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-amber-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-lightbulb"></i> Daftarkan Inovasi Anda
        </a>
    </div>
</section>

@endsection
