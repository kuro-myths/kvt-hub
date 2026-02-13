@extends('tata-letak.utama')
@section('judul', 'Riset & Inovasi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-900/30 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(139,92,246,0.4) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-purple-800/30 border border-purple-600/30 rounded-full px-4 py-1.5 text-xs text-purple-300 mb-6" data-aos="fade-down">
            <i class="fas fa-microscope"></i> Research Hub - Kolaborasi Global
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Riset & </span><span class="teks-gradien">Inovasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Pusat riset digital terdepan. Kolaborasi dengan 150+ universitas global, akses dana riset, dan publikasi di jurnal bereputasi.
        </p>
    </div>
</section>

{{-- Research Areas --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Bidang Riset Unggulan</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Fokus penelitian di 8 bidang strategis global</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="200">
        @php
        $riset = [
            ['Artificial Intelligence', 'Machine learning, NLP, computer vision, robotika', 'fa-brain', 'from-blue-500 to-cyan-500'],
            ['Cybersecurity', 'Kriptografi, keamanan jaringan, forensik digital', 'fa-shield-alt', 'from-red-500 to-orange-500'],
            ['Bioteknologi', 'Genomik, farmasi, bioinformatika, agritech', 'fa-dna', 'from-green-500 to-emerald-500'],
            ['Energi Terbarukan', 'Solar, hydro, wind, energy storage', 'fa-solar-panel', 'from-yellow-500 to-amber-500'],
            ['Quantum Computing', 'Qubit, quantum algorithm, quantum cryptography', 'fa-atom', 'from-purple-500 to-violet-500'],
            ['Space Technology', 'Satelit, propulsi, remote sensing', 'fa-satellite', 'from-indigo-500 to-blue-500'],
            ['Material Science', 'Nanomaterial, polimer, komposit, metamaterial', 'fa-cube', 'from-teal-500 to-cyan-500'],
            ['Data Science', 'Big data, analytics, visualization, statistik', 'fa-chart-pie', 'from-pink-500 to-rose-500'],
        ];
        @endphp
        @foreach($riset as $r)
        <div class="kaca rounded-2xl p-5 hover:border-purple-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $r[3] }} rounded-xl flex items-center justify-center mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $r[2] }} text-white text-lg"></i>
            </div>
            <h3 class="text-white font-bold mb-1">{{ $r[0] }}</h3>
            <p class="text-gray-400 text-xs leading-relaxed">{{ $r[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Research Pipeline --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Alur Riset KVT Hub</h2>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4" data-aos="fade-up" data-aos-delay="100">
            @php
            $alur = [
                ['Ide & Proposal', 'fa-lightbulb', 'text-yellow-400', 'Ajukan proposal riset dengan template standar internasional.'],
                ['Review & Pendanaan', 'fa-search-dollar', 'text-green-400', 'Tim ahli meninjau dan mengalokasikan dana riset.'],
                ['Eksekusi Riset', 'fa-flask', 'text-blue-400', 'Laksanakan riset dengan akses lab virtual dan dataset.'],
                ['Peer Review', 'fa-users', 'text-purple-400', 'Hasil diperiksa oleh reviewer internasional.'],
                ['Publikasi', 'fa-file-alt', 'text-kvt-400', 'Terbitkan di jurnal Q1-Q4 dan konferensi.'],
            ];
            @endphp
            @foreach($alur as $i => $a)
            <div class="text-center">
                <div class="w-14 h-14 mx-auto bg-kvt-800/50 rounded-full flex items-center justify-center border border-kvt-700/30 mb-3">
                    <i class="fas {{ $a[1] }} {{ $a[2] }} text-xl"></i>
                </div>
                <h4 class="text-white font-semibold text-sm mb-1">{{ $a[0] }}</h4>
                <p class="text-gray-500 text-xs">{{ $a[3] }}</p>
                @if($i < 4)<div class="hidden md:block text-kvt-600 mt-3"><i class="fas fa-arrow-right"></i></div>@endif
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Features --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up">
        <div class="kaca rounded-2xl p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-globe text-white text-2xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">150+ Universitas Mitra</h3>
            <p class="text-gray-400 text-sm">MIT, Stanford, Oxford, ETH Zurich, ITB, UI, UGM, dan lebih banyak lagi.</p>
        </div>
        <div class="kaca rounded-2xl p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-money-bill-wave text-white text-2xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Dana Riset Kompetitif</h3>
            <p class="text-gray-400 text-sm">Hibah riset hingga $100,000 per proyek untuk penelitian inovatif.</p>
        </div>
        <div class="kaca rounded-2xl p-6 text-center">
            <div class="w-16 h-16 mx-auto bg-gradient-to-br from-blue-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-4"><i class="fas fa-book-open text-white text-2xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Jurnal & Konferensi</h3>
            <p class="text-gray-400 text-sm">Akses publikasi di jurnal Scopus Q1-Q4 dan konferensi IEEE/ACM.</p>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-purple-800/20 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien">2,400+</div><p class="text-gray-400 text-sm mt-1">Karya Ilmiah</p></div>
        <div><div class="text-3xl font-black teks-gradien">380+</div><p class="text-gray-400 text-sm mt-1">Paten Terdaftar</p></div>
        <div><div class="text-3xl font-black teks-gradien">$5M+</div><p class="text-gray-400 text-sm mt-1">Dana Riset</p></div>
        <div><div class="text-3xl font-black teks-gradien">75+</div><p class="text-gray-400 text-sm mt-1">Negara Kolaborator</p></div>
    </div>
</section>

@endsection
