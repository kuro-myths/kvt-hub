@extends('tata-letak.utama')
@section('judul', 'Sertifikasi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-900/20 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-800/30 border border-amber-600/30 rounded-full px-4 py-1.5 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-award"></i> Sertifikasi Terverifikasi
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Program </span><span class="teks-gradien-emas">Sertifikasi</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Raih sertifikasi yang diakui industri global. Dari sertifikat kompetensi hingga micro-credentials berbasis blockchain.
        </p>
    </div>
</section>

{{-- Certification Types --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-up">Jenis Sertifikasi</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 border-green-500/20 hover:border-green-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-certificate text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Sertifikat Kompetensi</h3>
            <p class="text-gray-400 text-sm mb-4">Sertifikasi gratis setelah menyelesaikan kursus. Terintegrasi dengan sistem XP dan level KVT Hub.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-green-500/10 text-green-400 px-2 py-0.5 rounded-full">Gratis</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">PDF Digital</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">QR Verified</span>
            </div>
        </div>
        <div class="kaca rounded-2xl p-6 border-blue-500/20 hover:border-blue-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-stamp text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Sertifikasi Industri</h3>
            <p class="text-gray-400 text-sm mb-4">Sertifikasi yang diakui perusahaan global: AWS, Google Cloud, Microsoft, Cisco, CompTIA.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-blue-500/10 text-blue-400 px-2 py-0.5 rounded-full">Premium</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">Proctored Exam</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">Global</span>
            </div>
        </div>
        <div class="kaca rounded-2xl p-6 border-purple-500/20 hover:border-purple-500/40 transition group">
            <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-violet-500 rounded-xl flex items-center justify-center mb-4"><i class="fas fa-link text-white text-xl"></i></div>
            <h3 class="text-white font-bold text-lg mb-2">Micro-Credentials (Blockchain)</h3>
            <p class="text-gray-400 text-sm mb-4">Sertifikasi berbasis blockchain yang tidak bisa dipalsukan. Verified on-chain dan dapat dibagikan.</p>
            <div class="flex flex-wrap gap-1.5">
                <span class="text-[10px] bg-purple-500/10 text-purple-400 px-2 py-0.5 rounded-full">Blockchain</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">NFT Badge</span>
                <span class="text-[10px] bg-kvt-800/50 text-kvt-300 px-2 py-0.5 rounded-full">Tamper-proof</span>
            </div>
        </div>
    </div>
</section>

{{-- Popular Certs --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-white text-center mb-12" data-aos="fade-up">Sertifikasi Populer</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4" data-aos="fade-up" data-aos-delay="100">
            @php
            $sertif = [
                ['AWS Solutions Architect', 'Amazon Web Services', 'fa-cloud', 'text-orange-400'],
                ['Google Data Analytics', 'Google Career Certificates', 'fa-chart-bar', 'text-blue-400'],
                ['Cybersecurity Analyst', 'CompTIA Security+', 'fa-shield-alt', 'text-red-400'],
                ['Full-Stack Developer', 'KVT Hub Certificate', 'fa-code', 'text-green-400'],
                ['AI/ML Specialist', 'TensorFlow Developer', 'fa-brain', 'text-purple-400'],
                ['DevOps Engineer', 'Docker & Kubernetes', 'fa-server', 'text-cyan-400'],
                ['UI/UX Designer', 'Google UX Design', 'fa-palette', 'text-pink-400'],
                ['Project Management', 'PMI CAPM/PMP', 'fa-tasks', 'text-yellow-400'],
            ];
            @endphp
            @foreach($sertif as $s)
            <div class="kaca rounded-xl p-4 hover:border-amber-500/30 transition flex items-center gap-3 group">
                <div class="w-10 h-10 bg-kvt-800/50 rounded-lg flex items-center justify-center shrink-0">
                    <i class="fas {{ $s[2] }} {{ $s[3] }}"></i>
                </div>
                <div>
                    <h4 class="text-white text-sm font-semibold group-hover:text-amber-400 transition">{{ $s[0] }}</h4>
                    <p class="text-gray-500 text-[10px]">{{ $s[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Stats --}}
<section class="bg-gradient-to-br from-amber-800/10 to-kvt-800/20 py-16">
    <div class="max-w-5xl mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-6 text-center" data-aos="fade-up">
        <div><div class="text-3xl font-black teks-gradien-emas">120+</div><p class="text-gray-400 text-sm mt-1">Program Sertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">45K+</div><p class="text-gray-400 text-sm mt-1">Sertifikat Diterbitkan</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">30+</div><p class="text-gray-400 text-sm mt-1">Mitra Sertifikasi</p></div>
        <div><div class="text-3xl font-black teks-gradien-emas">95%</div><p class="text-gray-400 text-sm mt-1">Tingkat Kelulusan</p></div>
    </div>
</section>

@endsection
