@extends('tata-letak.utama')
@section('judul', 'Karir & Industri - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-orange-900/20 to-kvt-900"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 25% 50%, rgba(249,115,22,0.3) 0%, transparent 50%), radial-gradient(circle at 75% 50%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-orange-800/30 border border-orange-600/30 rounded-full px-4 py-1.5 text-xs text-orange-300 mb-6" data-aos="fade-down">
            <i class="fas fa-briefcase"></i> Career Hub - Dari Kampus ke Industri
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Karir & </span><span class="teks-gradien-emas">Industri</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Jembatan antara pendidikan dan dunia kerja. Temukan magang, lowongan, dan mentoring dari profesional global.
        </p>
    </div>
</section>

{{-- Career Paths --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Jalur Karir</h2>
        <p class="text-gray-400" data-aos="fade-up" data-aos-delay="100">Pilih jalur karir sesuai passion dan keahlian Anda</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        @php
        $karir = [
            ['Software Engineering', 'Full-stack, mobile, DevOps, cloud', 'fa-code', 'from-blue-500 to-cyan-500', '$60K - $200K/yr'],
            ['Data & AI', 'Data scientist, ML engineer, AI researcher', 'fa-brain', 'from-purple-500 to-violet-500', '$70K - $250K/yr'],
            ['Cybersecurity', 'Security analyst, pentester, CISO', 'fa-shield-alt', 'from-red-500 to-orange-500', '$65K - $180K/yr'],
            ['Product & Design', 'PM, UX designer, UI engineer', 'fa-palette', 'from-pink-500 to-rose-500', '$55K - $170K/yr'],
            ['Finance & Fintech', 'Analyst, quant, blockchain developer', 'fa-chart-line', 'from-green-500 to-emerald-500', '$60K - $220K/yr'],
            ['Biotech & Health', 'Bioinformatics, healthtech, pharma', 'fa-heartbeat', 'from-teal-500 to-cyan-500', '$55K - $190K/yr'],
        ];
        @endphp
        @foreach($karir as $k)
        <div class="kaca rounded-2xl p-6 hover:border-orange-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="flex items-start justify-between mb-4">
                <div class="w-12 h-12 bg-gradient-to-br {{ $k[3] }} rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                    <i class="fas {{ $k[2] }} text-white text-lg"></i>
                </div>
                <span class="text-xs bg-green-500/10 text-green-400 px-2 py-1 rounded-lg border border-green-500/20">{{ $k[4] }}</span>
            </div>
            <h3 class="text-white font-bold text-lg mb-1">{{ $k[0] }}</h3>
            <p class="text-gray-400 text-sm">{{ $k[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Industry Partners --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-4" data-aos="fade-up">Mitra Industri</h2>
        <p class="text-gray-400 text-center mb-12" data-aos="fade-up" data-aos-delay="100">Berkolaborasi dengan perusahaan teknologi terkemuka</p>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" data-aos="fade-up" data-aos-delay="200">
            @foreach(['Google', 'Microsoft', 'Amazon', 'Meta', 'Apple', 'Tesla', 'NVIDIA', 'Intel', 'Samsung', 'Tokopedia', 'Gojek', 'Grab'] as $p)
            <div class="kaca rounded-xl p-4 text-center hover:border-kvt-500/30 transition">
                <div class="w-10 h-10 mx-auto bg-kvt-800/50 rounded-lg flex items-center justify-center mb-2"><i class="fas fa-building text-kvt-400"></i></div>
                <span class="text-xs text-gray-400">{{ $p }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Features --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" data-aos="fade-up">
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-search text-kvt-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Job Matching</h3>
            <p class="text-gray-400 text-xs">AI mencocokkan skill Anda dengan lowongan terbaik</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-chalkboard-teacher text-orange-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Mentoring</h3>
            <p class="text-gray-400 text-xs">Bimbingan 1-on-1 dari profesional senior</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-building text-green-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">Magang</h3>
            <p class="text-gray-400 text-xs">Program magang di 500+ perusahaan mitra</p>
        </div>
        <div class="kaca rounded-2xl p-5 text-center">
            <i class="fas fa-file-signature text-purple-400 text-2xl mb-3"></i>
            <h3 class="text-white font-bold mb-1">CV Builder</h3>
            <p class="text-gray-400 text-xs">Generator CV profesional dengan template ATS-friendly</p>
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-orange-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien-emas">12K+</div><p class="text-gray-400 text-sm mt-1">Lowongan Aktif</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">500+</div><p class="text-gray-400 text-sm mt-1">Perusahaan Mitra</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">89%</div><p class="text-gray-400 text-sm mt-1">Tingkat Penempatan</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">$85K</div><p class="text-gray-400 text-sm mt-1">Rata-rata Gaji</p></div>
    </div>
</section>

@endsection
