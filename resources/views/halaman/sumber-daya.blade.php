@extends('tata-letak.utama')
@section('judul', 'Sumber Daya - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-cyan-900/20 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-cyan-800/30 border border-cyan-600/30 rounded-full px-4 py-1.5 text-xs text-cyan-300 mb-6" data-aos="fade-down">
            <i class="fas fa-database"></i> Open Access Resources
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Sumber </span><span class="teks-gradien">Daya</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Akses gratis ke e-book, dataset, coding playground, API, template, tools, dan repositori pengetahuan global.
        </p>
    </div>
</section>

{{-- Resource Categories --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up">
        @php
        $sumber = [
            ['E-Book & Jurnal', 'Ribuan buku digital dan jurnal ilmiah gratis. Open access dari penerbit terkemuka.', 'fa-book', 'from-blue-500 to-indigo-500', '5,000+ judul'],
            ['Dataset', 'Dataset publik untuk riset dan machine learning. Kaggle, UCI, dan dataset eksklusif KVT.', 'fa-table', 'from-green-500 to-emerald-500', '2,000+ dataset'],
            ['Coding Playground', 'IDE online untuk Python, JavaScript, C++, Java, Go, Rust. Compile dan run di browser.', 'fa-terminal', 'from-purple-500 to-violet-500', '15+ bahasa'],
            ['API Library', 'Koleksi API gratis untuk proyek. Weather, news, currency, dan 100+ API lainnya.', 'fa-plug', 'from-orange-500 to-red-500', '100+ API'],
            ['Template & Starter', 'Template proyek siap pakai: Laravel, React, Next.js, Flutter, Django, dan lebih.', 'fa-layer-group', 'from-pink-500 to-rose-500', '200+ template'],
            ['Video Tutorial', 'Perpustakaan video tutorial dari instruktur ahli. Dari pemula sampai expert.', 'fa-play-circle', 'from-red-500 to-pink-500', '10,000+ video'],
        ];
        @endphp
        @foreach($sumber as $s)
        <div class="kaca rounded-2xl p-6 hover:border-cyan-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $s[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $s[2] }} text-white text-lg"></i>
                </div>
                <span class="text-[10px] bg-cyan-500/10 text-cyan-400 px-2 py-0.5 rounded-full border border-cyan-500/20">{{ $s[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $s[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $s[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Tools --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Tools & Utilitas</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="100">
            @php
            $tools = [
                ['JSON Formatter', 'fa-code', 'text-yellow-400'],
                ['Regex Tester', 'fa-asterisk', 'text-green-400'],
                ['Color Picker', 'fa-palette', 'text-pink-400'],
                ['Base64 Encoder', 'fa-lock', 'text-red-400'],
                ['Markdown Editor', 'fa-file-alt', 'text-blue-400'],
                ['SQL Playground', 'fa-database', 'text-cyan-400'],
                ['Image Converter', 'fa-image', 'text-purple-400'],
                ['API Tester', 'fa-plug', 'text-orange-400'],
                ['Hash Generator', 'fa-fingerprint', 'text-teal-400'],
                ['QR Generator', 'fa-qrcode', 'text-indigo-400'],
                ['Lorem Ipsum', 'fa-paragraph', 'text-gray-400'],
                ['Diff Checker', 'fa-columns', 'text-amber-400'],
            ];
            @endphp
            @foreach($tools as $t)
            <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition group cursor-pointer">
                <i class="fas {{ $t[1] }} {{ $t[2] }} text-xl mb-2 block group-hover:scale-110 transition"></i>
                <span class="text-xs text-gray-400 group-hover:text-white transition">{{ $t[0] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-cyan-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien">17K+</div><p class="text-gray-400 text-sm mt-1">Total Sumber Daya</p></div>
        <div><div class="text-3xl font-black teks-gradien">500K+</div><p class="text-gray-400 text-sm mt-1">Unduhan</p></div>
        <div><div class="text-3xl font-black teks-gradien">15+</div><p class="text-gray-400 text-sm mt-1">Bahasa Coding</p></div>
        <div><div class="text-3xl font-black teks-gradien">100%</div><p class="text-gray-400 text-sm mt-1">Open Access</p></div>
    </div>
</section>

@endsection
