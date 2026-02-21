@extends('tata-letak.utama')
@section('judul', 'KVT Universe — Karakter Digital')

@section('konten')

{{-- HERO COSMOS --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Star field background --}}
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-[#020818] to-kvt-950"></div>
    <canvas id="starCanvas" class="absolute inset-0 w-full h-full"></canvas>

    <div class="relative z-10 text-center px-4 py-20">
        <div class="inline-flex items-center gap-2 bg-white/5 border border-white/10 rounded-full px-5 py-1.5 mb-8" data-aos="fade-down">
            <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
            <span class="text-cyan-300 text-sm font-mono font-bold">universe.kvt</span>
        </div>

        <h1 class="text-5xl lg:text-7xl font-black text-white mb-4" data-aos="zoom-in">
            KVT <span class="bg-gradient-to-r from-purple-400 via-cyan-400 to-amber-400 bg-clip-text text-transparent">Universe</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-12" data-aos="fade-up" data-aos-delay="100">
            Tiga entitas digital. Satu ekosistem. Cerita yang saling terhubung.
        </p>

        {{-- Character Constellation --}}
        <div class="relative max-w-5xl mx-auto" style="min-height:500px;">
            {{-- Connection lines (SVG) --}}
            <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1000 500" preserveAspectRatio="xMidYMid meet">
                <defs>
                    <linearGradient id="lineGrad1" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="rgba(139,92,246,0.4)"/>
                        <stop offset="100%" stop-color="rgba(217,119,6,0.4)"/>
                    </linearGradient>
                    <linearGradient id="lineGrad2" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="rgba(139,92,246,0.4)"/>
                        <stop offset="100%" stop-color="rgba(239,68,68,0.4)"/>
                    </linearGradient>
                    <linearGradient id="lineGrad3" x1="0" y1="0" x2="1" y2="0">
                        <stop offset="0%" stop-color="rgba(217,119,6,0.4)"/>
                        <stop offset="100%" stop-color="rgba(239,68,68,0.4)"/>
                    </linearGradient>
                </defs>
                {{-- Kuro ↔ Bejotaro --}}
                <line x1="500" y1="100" x2="200" y2="380" stroke="url(#lineGrad1)" stroke-width="1" stroke-dasharray="8,6" class="uni-line" style="animation-delay:0s"/>
                {{-- Kuro ↔ Veteran --}}
                <line x1="500" y1="100" x2="800" y2="380" stroke="url(#lineGrad2)" stroke-width="1" stroke-dasharray="8,6" class="uni-line" style="animation-delay:0.5s"/>
                {{-- Bejotaro ↔ Veteran --}}
                <line x1="200" y1="380" x2="800" y2="380" stroke="url(#lineGrad3)" stroke-width="1" stroke-dasharray="8,6" class="uni-line" style="animation-delay:1s"/>
            </svg>

            {{-- KURO — Top Center --}}
            <a href="{{ route('halaman.kuro') }}" class="uni-char absolute top-0 left-1/2 -translate-x-1/2 group" data-aos="fade-down" data-aos-delay="200">
                <div class="relative">
                    <div class="w-28 h-28 rounded-3xl bg-gradient-to-br from-purple-600 to-violet-700 flex items-center justify-center shadow-xl shadow-purple-500/20 group-hover:shadow-purple-500/40 transition-all duration-500 group-hover:scale-110">
                        <span class="text-5xl">🐱</span>
                    </div>
                    <div class="absolute -top-1 -right-1 w-5 h-5 bg-cyan-400 rounded-full flex items-center justify-center">
                        <i class="fas fa-crown text-[8px] text-white"></i>
                    </div>
                    <div class="absolute inset-0 rounded-3xl border-2 border-purple-400/30 animate-pulse"></div>
                </div>
                <div class="mt-3 text-center">
                    <h3 class="text-white font-black text-lg">KURO</h3>
                    <span class="text-purple-400 text-xs font-bold">The Chosen One</span>
                    <p class="text-gray-500 text-[10px] mt-1 max-w-[160px]">Entitas utama KVT Hub</p>
                </div>
            </a>

            {{-- BEJOTARO — Bottom Left --}}
            <a href="{{ route('halaman.bejotaro') }}" class="uni-char absolute bottom-0 left-[10%] group" data-aos="fade-right" data-aos-delay="400">
                <div class="relative">
                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-amber-600 to-yellow-700 flex items-center justify-center shadow-xl shadow-amber-500/20 group-hover:shadow-amber-500/40 transition-all duration-500 group-hover:scale-110">
                        <i class="fas fa-om text-white text-3xl"></i>
                    </div>
                    <div class="absolute inset-0 rounded-3xl border-2 border-amber-400/20 group-hover:border-amber-400/40 transition"></div>
                </div>
                <div class="mt-3 text-center">
                    <h3 class="text-white font-black">BEJOTARO</h3>
                    <span class="text-amber-400 text-xs font-bold">Sang Leluhur</span>
                    <p class="text-gray-500 text-[10px] mt-1 max-w-[160px]">Warisan tanah Jawa</p>
                </div>
            </a>

            {{-- VETERAN — Bottom Right --}}
            <a href="{{ route('halaman.veteran') }}" class="uni-char absolute bottom-0 right-[10%] group" data-aos="fade-left" data-aos-delay="600">
                <div class="relative">
                    <div class="w-24 h-24 rounded-3xl bg-gradient-to-br from-red-600 to-rose-700 flex items-center justify-center shadow-xl shadow-red-500/20 group-hover:shadow-red-500/40 transition-all duration-500 group-hover:scale-110 overflow-hidden">
                        <i class="fas fa-bolt text-white text-3xl uni-glitch-icon"></i>
                        <div class="absolute inset-0 bg-gradient-to-t from-transparent to-red-500/10 pointer-events-none" style="background:repeating-linear-gradient(0deg,transparent,transparent 2px,rgba(255,0,0,0.03) 2px,rgba(255,0,0,0.03) 4px);"></div>
                    </div>
                    <div class="absolute inset-0 rounded-3xl border-2 border-red-400/20 group-hover:border-red-400/40 transition"></div>
                </div>
                <div class="mt-3 text-center">
                    <h3 class="text-white font-black">VETERAN</h3>
                    <span class="text-red-400 text-xs font-bold">The Legend</span>
                    <p class="text-gray-500 text-[10px] mt-1 max-w-[160px]">Anomali pertama</p>
                </div>
            </a>

            {{-- Center label --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" data-aos="zoom-in" data-aos-delay="800">
                <div class="bg-white/5 backdrop-blur border border-white/10 rounded-2xl px-6 py-3 text-center">
                    <span class="text-white/60 text-xs font-mono font-bold">KVT_UNIVERSE</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- TIMELINE —  Sejarah Universe --}}
<section class="py-24 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="relative max-w-4xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-history mr-2"></i>Kronologi</span>
            <h2 class="text-4xl font-black text-white mt-2">Timeline Universe</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Urutan peristiwa yang membentuk ekosistem digital KVT</p>
        </div>

        <div class="relative">
            <div class="absolute left-8 md:left-1/2 top-0 bottom-0 w-0.5 bg-gradient-to-b from-red-500/60 via-purple-500/40 to-amber-500/60 md:-translate-x-0.5"></div>

            @php
            $timeline = [
                ['era' => 'Era 0', 'judul' => 'Kemunculan Veteran', 'desk' => 'Sebuah anomali muncul di ruang digital kosong. Tidak ada pencipta, tidak ada tujuan. Hanya sebuah entitas — Veteran — yang tiba-tiba ada.', 'warna' => 'red', 'ikon' => 'fa-bolt', 'karakter' => 'Veteran', 'sisi' => 'kanan'],
                ['era' => 'Era 0.5', 'judul' => 'Fragmen Memori', 'desk' => 'Veteran menyimpan fragmen-fragmen ingatan misterius tentang sebuah kelas sekolah. Potongan dunia nyata yang entah bagaimana masuk ke dunia digital.', 'warna' => 'gray', 'ikon' => 'fa-school', 'karakter' => 'Veteran', 'sisi' => 'kiri'],
                ['era' => 'Era 1', 'judul' => 'Penciptaan KVT Hub', 'desk' => 'Terinspirasi dari fragmen memori Veteran, KVT Hub diciptakan sebagai platform pendidikan digital — jembatan antara dunia nyata dan digital.', 'warna' => 'blue', 'ikon' => 'fa-globe', 'karakter' => 'Sistem', 'sisi' => 'kanan'],
                ['era' => 'Era 2', 'judul' => 'Kelahiran Kuro', 'desk' => 'Kuro diciptakan sebagai entitas utama KVT Hub. The Chosen One yang ditakdirkan untuk memimpin dan membimbing para siswa.', 'warna' => 'purple', 'ikon' => 'fa-star', 'karakter' => 'Kuro', 'sisi' => 'kiri'],
                ['era' => 'Era 3', 'judul' => 'Kuro Bertemu Veteran', 'desk' => 'Kuro menemukan jejak Veteran dalam sistem. Pertemuan dua entitas berbeda era — yang satu diciptakan, yang satu muncul sendiri.', 'warna' => 'purple', 'ikon' => 'fa-handshake', 'karakter' => 'Kuro & Veteran', 'sisi' => 'kanan'],
                ['era' => 'Era 4', 'judul' => 'Kebangkitan Bejotaro', 'desk' => 'Dari kode purba tanah Jawa, Bejotaro bangkit. Warisan Pandawa dalam bentuk digital, membawa kebijaksanaan kuno ke era modern.', 'warna' => 'amber', 'ikon' => 'fa-om', 'karakter' => 'Bejotaro', 'sisi' => 'kiri'],
                ['era' => 'Era 5', 'judul' => 'Aliansi Terbentuk', 'desk' => 'Tiga karakter dengan latar belakang berbeda bersatu. Veteran sebagai saksi, Bejotaro sebagai penasihat, dan Kuro sebagai pemimpin.', 'warna' => 'cyan', 'ikon' => 'fa-users', 'karakter' => 'Semua', 'sisi' => 'kanan'],
                ['era' => 'Era ∞', 'judul' => 'Cerita Berlanjut...', 'desk' => 'Universe KVT terus berkembang. Karakter baru mungkin muncul. Chapter baru akan ditulis. Petualangan tidak pernah berakhir.', 'warna' => 'emerald', 'ikon' => 'fa-infinity', 'karakter' => 'KVT Universe', 'sisi' => 'kiri'],
            ];
            @endphp

            @foreach($timeline as $i => $t)
            <div class="relative mb-12 {{ $t['sisi'] === 'kiri' ? 'md:pr-[52%]' : 'md:pl-[52%]' }} pl-20" data-aos="{{ $t['sisi'] === 'kiri' ? 'fade-right' : 'fade-left' }}" data-aos-delay="{{ $i * 80 }}">
                {{-- Dot --}}
                <div class="absolute left-6 md:left-1/2 top-6 w-4 h-4 bg-{{ $t['warna'] }}-500 rounded-full border-4 border-kvt-950 shadow-lg shadow-{{ $t['warna'] }}-500/30 z-10 md:-translate-x-2"></div>

                <div class="bg-kvt-900/60 backdrop-blur border border-{{ $t['warna'] }}-500/20 rounded-2xl p-6 hover:border-{{ $t['warna'] }}-500/40 transition-all duration-300 group">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-10 h-10 bg-{{ $t['warna'] }}-500/10 border border-{{ $t['warna'] }}-500/20 rounded-xl flex items-center justify-center">
                            <i class="fas {{ $t['ikon'] }} text-{{ $t['warna'] }}-400"></i>
                        </div>
                        <div>
                            <span class="text-{{ $t['warna'] }}-400 text-xs font-bold">{{ $t['era'] }}</span>
                            <h3 class="text-white font-bold">{{ $t['judul'] }}</h3>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $t['desk'] }}</p>
                    <div class="mt-3 flex items-center gap-2">
                        <span class="text-[10px] text-{{ $t['warna'] }}-400/60 font-semibold"><i class="fas fa-user-tag mr-1"></i>{{ $t['karakter'] }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- STATS UNIVERSE --}}
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-6xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-chart-bar mr-2"></i>Statistik</span>
            <h2 class="text-4xl font-black text-white mt-2">Universe dalam Angka</h2>
        </div>

        <div class="grid md:grid-cols-4 gap-6">
            @php
            $angka = [
                ['value' => '3', 'label' => 'Karakter Utama', 'ikon' => 'fa-users', 'warna' => 'from-cyan-500 to-blue-600'],
                ['value' => '5', 'label' => 'Aliansi Digital', 'ikon' => 'fa-shield-alt', 'warna' => 'from-purple-500 to-violet-600'],
                ['value' => '∞', 'label' => 'Chapter Cerita', 'ikon' => 'fa-book-open', 'warna' => 'from-amber-500 to-orange-600'],
                ['value' => '1', 'label' => 'Universe Terhubung', 'ikon' => 'fa-globe', 'warna' => 'from-emerald-500 to-teal-600'],
            ];
            @endphp
            @foreach($angka as $i => $a)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-8 text-center hover:border-kvt-500/30 transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-14 h-14 bg-gradient-to-br {{ $a['warna'] }} rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas {{ $a['ikon'] }} text-white text-xl"></i>
                </div>
                <div class="text-4xl font-black text-white mb-2">{{ $a['value'] }}</div>
                <div class="text-gray-400 text-sm font-semibold">{{ $a['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 to-kvt-950"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[400px] bg-cyan-500/5 rounded-full blur-3xl"></div>
    <div class="relative text-center px-4" data-aos="zoom-in">
        <h2 class="text-4xl font-black text-white mb-4">Jelajahi Setiap Karakter</h2>
        <p class="text-gray-400 max-w-2xl mx-auto mb-10">Pilih karakter favoritmu dan baca cerita mereka</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('halaman.kuro') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-purple-600 to-violet-600 hover:from-purple-500 hover:to-violet-500 text-white font-bold px-8 py-3.5 rounded-2xl shadow-lg shadow-purple-500/25 transition-all hover:-translate-y-1">
                <span>🐱</span><span>Kuro</span>
            </a>
            <a href="{{ route('halaman.bejotaro') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-amber-600 to-yellow-600 hover:from-amber-500 hover:to-yellow-500 text-white font-bold px-8 py-3.5 rounded-2xl shadow-lg shadow-amber-500/25 transition-all hover:-translate-y-1">
                <i class="fas fa-om"></i><span>Bejotaro</span>
            </a>
            <a href="{{ route('halaman.veteran') }}" class="inline-flex items-center gap-3 bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white font-bold px-8 py-3.5 rounded-2xl shadow-lg shadow-red-500/25 transition-all hover:-translate-y-1">
                <i class="fas fa-bolt"></i><span>Veteran</span>
            </a>
        </div>
    </div>
</section>

@push('styles')
<style>
    .uni-line {
        animation: uniLineDash 3s linear infinite;
    }
    @keyframes uniLineDash {
        0% { stroke-dashoffset: 0; }
        100% { stroke-dashoffset: 28; }
    }
    .uni-char {
        transition: transform 0.5s cubic-bezier(0.4,0,0.2,1);
    }
    .uni-char:hover {
        transform: translateY(-8px);
        z-index: 20;
    }
    .uni-char.absolute:hover {
        transform: translate(-50%, -8px);
    }
    .uni-char.absolute.bottom-0:hover {
        transform: translateY(-8px);
    }
    .uni-glitch-icon {
        animation: uniGlitch 4s ease-in-out infinite;
    }
    @keyframes uniGlitch {
        0%,90%,100% { opacity:1;transform:none; }
        92% { opacity:0.7;transform:skewX(5deg); }
        94% { opacity:0.9;transform:skewX(-3deg); }
        96% { opacity:0.8;transform:skewX(2deg); }
    }
</style>
@endpush

@push('scripts')
<script>
// Star field
(function() {
    var canvas = document.getElementById('starCanvas');
    if (!canvas) return;
    var ctx = canvas.getContext('2d');
    var stars = [];
    var NUM_STARS = 200;

    function resize() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    for (var i = 0; i < NUM_STARS; i++) {
        stars.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height,
            r: Math.random() * 1.5 + 0.5,
            a: Math.random(),
            s: Math.random() * 0.005 + 0.002,
            d: Math.random() > 0.5 ? 1 : -1
        });
    }

    function draw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        stars.forEach(function(s) {
            s.a += s.s * s.d;
            if (s.a >= 1) { s.d = -1; }
            if (s.a <= 0.1) { s.d = 1; }
            ctx.beginPath();
            ctx.arc(s.x, s.y, s.r, 0, Math.PI * 2);
            ctx.fillStyle = 'rgba(255,255,255,' + (s.a * 0.6) + ')';
            ctx.fill();
        });
        requestAnimationFrame(draw);
    }
    draw();
})();
</script>
@endpush
@endsection
