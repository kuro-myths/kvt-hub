@extends('tata-letak.utama')
@section('judul', 'Laboratorium Virtual - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%2306B6D4%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-50"></div>
    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 bg-kvt-800/40 border border-kvt-700/30 rounded-full px-5 py-2 mb-8">
            <i class="fas fa-flask text-cyan-400"></i>
            <span class="text-kvt-300 text-sm font-semibold">Simulasi Interaktif</span>
        </div>
        <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
            Laboratorium <span class="teks-gradien">Virtual</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-10">
            Eksplorasi eksperimen sains dan teknologi secara virtual. Simulasi realistis dengan peralatan digital lengkap, kapan saja dan di mana saja.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#labs" class="bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:shadow-lg hover:shadow-cyan-500/30 transition-all">
                <i class="fas fa-microscope mr-2"></i>Mulai Eksperimen
            </a>
            <a href="#cara-kerja" class="border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold text-lg hover:bg-kvt-800/50 transition-all">
                <i class="fas fa-info-circle mr-2"></i>Cara Kerja
            </a>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="py-12 border-b border-kvt-700/20">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php $stats = [['80+','Laboratorium'],['30K+','Pengguna'],['500+','Eksperimen'],['15','Bidang Ilmu']]; @endphp
            @foreach($stats as $s)
            <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-3xl md:text-4xl font-black teks-gradien">{{ $s[0] }}</div>
                <div class="text-gray-500 text-sm mt-1">{{ $s[1] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kategori Lab --}}
<section class="py-20" id="labs">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Kategori <span class="teks-gradien">Laboratorium</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Pilih bidang laboratorium virtual sesuai kebutuhan riset dan pembelajaran Anda.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $kategoris = [
                ['icon'=>'fa-atom','color'=>'cyan','judul'=>'Kimia','desc'=>'Reaksi kimia, titrasi, analisis spektroskopi, dan eksperimen organik/anorganik','total'=>'120 eksperimen'],
                ['icon'=>'fa-magnet','color'=>'teal','judul'=>'Fisika','desc'=>'Mekanika, optik, elektromagnetisme, termodinamika, dan fisika modern','total'=>'95 eksperimen'],
                ['icon'=>'fa-dna','color'=>'green','judul'=>'Biologi','desc'=>'Mikroskopi, genetika, ekologi, anatomi, dan bioteknologi','total'=>'85 eksperimen'],
                ['icon'=>'fa-laptop-code','color'=>'kvt','judul'=>'Komputer','desc'=>'Jaringan, algoritma, arsitektur komputer, dan simulasi sistem','total'=>'75 eksperimen'],
                ['icon'=>'fa-cogs','color'=>'amber','judul'=>'Teknik','desc'=>'Simulasi mekanik, elektro, material, dan teknik sipil','total'=>'70 eksperimen'],
                ['icon'=>'fa-heartbeat','color'=>'red','judul'=>'Kedokteran','desc'=>'Anatomi virtual, farmakologi, simulasi klinis, dan diagnostik','total'=>'55 eksperimen'],
            ];
            @endphp
            @foreach($kategoris as $k)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $k['color'] }}-500/30 transition-all group card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-14 h-14 bg-{{ $k['color'] }}-500/10 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <i class="fas {{ $k['icon'] }} text-{{ $k['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $k['judul'] }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $k['desc'] }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-{{ $k['color'] }}-400 text-xs font-semibold">{{ $k['total'] }}</span>
                    <i class="fas fa-arrow-right text-gray-600 group-hover:text-{{ $k['color'] }}-400 transition"></i>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Cara Kerja --}}
<section class="py-20 bg-kvt-900/30" id="cara-kerja">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Cara <span class="teks-gradien">Kerja</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Mulai eksperimen virtual dalam 4 langkah mudah.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $langkah = [
                ['no'=>'01','icon'=>'fa-search','judul'=>'Pilih Lab','desc'=>'Jelajahi katalog laboratorium dan pilih eksperimen yang ingin dilakukan.'],
                ['no'=>'02','icon'=>'fa-desktop','judul'=>'Buka Simulasi','desc'=>'Akses simulasi interaktif langsung dari browser tanpa instalasi apapun.'],
                ['no'=>'03','icon'=>'fa-hand-pointer','judul'=>'Jalankan Eksperimen','desc'=>'Ikuti panduan langkah demi langkah dan manipulasi variabel eksperimen.'],
                ['no'=>'04','icon'=>'fa-chart-bar','judul'=>'Analisis Hasil','desc'=>'Lihat hasil eksperimen secara real-time dan unduh laporan lengkap.'],
            ];
            @endphp
            @foreach($langkah as $l)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="text-cyan-500/20 text-5xl font-black mb-3">{{ $l['no'] }}</div>
                <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $l['icon'] }} text-cyan-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $l['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $l['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Fitur Unggulan --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black mb-4">Fitur <span class="teks-gradien">Unggulan</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Teknologi terdepan untuk pengalaman laboratorium yang realistis.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
            $fitur = [
                ['icon'=>'fa-cube','judul'=>'Simulasi 3D Realistis','desc'=>'Model 3D berkualitas tinggi untuk peralatan dan bahan eksperimen yang interaktif.'],
                ['icon'=>'fa-chart-line','judul'=>'Data Real-time','desc'=>'Hasil pengukuran dan grafik data diperbarui secara real-time saat eksperimen berlangsung.'],
                ['icon'=>'fa-users','judul'=>'Kolaborasi Tim','desc'=>'Lakukan eksperimen bersama teman sekelompok secara online dan real-time.'],
                ['icon'=>'fa-file-pdf','judul'=>'Laporan Otomatis','desc'=>'Generate laporan praktikum lengkap dengan data, grafik, dan analisis secara otomatis.'],
                ['icon'=>'fa-shield-alt','judul'=>'Aman & Tanpa Risiko','desc'=>'Eksperimen berbahaya dapat dilakukan secara virtual tanpa risiko keselamatan.'],
                ['icon'=>'fa-mobile-alt','judul'=>'Akses Multi-Device','desc'=>'Jalankan laboratorium dari laptop, tablet, atau smartphone kapan saja.'],
            ];
            @endphp
            @foreach($fitur as $f)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 card-hover" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                <div class="w-12 h-12 bg-cyan-500/10 rounded-xl flex items-center justify-center mb-4">
                    <i class="fas {{ $f['icon'] }} text-cyan-400 text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">{{ $f['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $f['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20">
    <div class="max-w-4xl mx-auto px-6 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 border border-kvt-700/20 rounded-3xl p-12">
            <h2 class="text-3xl font-black mb-4">Siap Bereksperimen <span class="teks-gradien">Secara Virtual</span>?</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Daftarkan diri Anda dan akses seluruh laboratorium virtual KVT Hub tanpa batas.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-cyan-500 to-teal-500 text-white px-8 py-4 rounded-2xl font-bold hover:shadow-lg hover:shadow-cyan-500/30 transition-all">
                    <i class="fas fa-rocket"></i> Daftar Sekarang
                </a>
                <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 border border-kvt-700/50 text-white px-8 py-4 rounded-2xl font-bold hover:bg-kvt-800/50 transition-all">
                    <i class="fas fa-info-circle"></i> Pelajari Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
