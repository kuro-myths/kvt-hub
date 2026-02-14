@extends('tata-letak.utama')
@section('judul', 'Sponsor - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[55vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-yellow-900/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, rgba(234,179,8,0.4) 0%, transparent 50%), radial-gradient(circle at 80% 40%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/20 rounded-full px-4 py-1.5 text-xs text-yellow-400 mb-6" data-aos="fade-down">
            <i class="fas fa-medal"></i> Program Sponsorship
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Sponsor </span><span class="teks-gradien">KVT Hub</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Dukung pendidikan digital Indonesia. Investasi Anda membantu ribuan pelajar mengakses teknologi dan materi berkualitas tinggi.
        </p>
        <a href="#paket" class="bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-400 hover:to-amber-500 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg shadow-yellow-500/20 inline-flex items-center gap-2" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-gift"></i>Lihat Paket Sponsorship
        </a>
    </div>
</section>

{{-- Mengapa Sponsor --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Mengapa Mendukung KVT Hub?</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Sponsorship Anda berdampak nyata pada dunia pendidikan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-right" data-aos-delay="200">
        @php
        $alasan = [
            ['Dampak Pendidikan', 'Dana sponsor digunakan langsung untuk pengembangan konten pembelajaran, beasiswa siswa berprestasi, dan infrastruktur platform.', 'fa-graduation-cap', 'from-blue-500 to-cyan-500'],
            ['Brand Visibility', 'Logo dan brand Anda tampil di platform yang diakses ribuan pelajar dan educator dari seluruh Indonesia setiap hari.', 'fa-eye', 'from-purple-500 to-pink-500'],
            ['CSR Teknologi', 'Bentuk tanggung jawab sosial perusahaan di bidang pendidikan teknologi, membantu mengurangi digital divide di Indonesia.', 'fa-heart', 'from-red-500 to-orange-500'],
        ];
        @endphp
        @foreach($alasan as $a)
        <div class="kaca rounded-2xl p-6 hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-14 h-14 bg-gradient-to-br {{ $a[3] }} rounded-xl flex items-center justify-center mb-4 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $a[2] }} text-white text-xl"></i>
            </div>
            <h3 class="text-white font-bold text-lg mb-2">{{ $a[0] }}</h3>
            <p class="text-gray-400 text-sm leading-relaxed">{{ $a[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Paket Sponsorship --}}
<section id="paket" class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Paket Sponsorship</h2>
            <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Pilih paket yang sesuai dengan visi dan kemampuan Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" data-aos="fade-left" data-aos-delay="200">
            {{-- Bronze --}}
            <div class="kaca rounded-2xl p-8 hover:border-yellow-700/30 transition-all duration-300 group hover:-translate-y-2">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-700 to-yellow-800 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition">
                        <i class="fas fa-star text-yellow-400 text-2xl"></i>
                    </div>
                    <h3 class="text-white font-bold text-xl">Bronze Sponsor</h3>
                    <div class="mt-3">
                        <span class="text-yellow-500 font-black text-3xl">Rp 500K</span>
                        <span class="text-gray-500 text-sm">/bulan</span>
                    </div>
                </div>
                <ul class="space-y-3 text-sm text-gray-400 mb-6">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-600"></i>Logo di halaman sponsor</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-600"></i>Laporan bulanan impact</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-600"></i>Terima kasih di media sosial</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-600"></i>Sertifikat sponsor digital</li>
                    <li class="flex items-center gap-2 text-gray-600"><i class="fas fa-times-circle"></i>Logo di beranda</li>
                    <li class="flex items-center gap-2 text-gray-600"><i class="fas fa-times-circle"></i>Akun premium gratis</li>
                </ul>
                <a href="mailto:sponsor@kvthub.id?subject=Bronze%20Sponsor" class="block text-center bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-6 py-3 rounded-xl font-semibold transition border border-kvt-700/50 w-full">
                    Pilih Bronze
                </a>
            </div>

            {{-- Silver --}}
            <div class="relative kaca rounded-2xl p-8 border-kvt-500/40 hover:border-kvt-500/60 transition-all duration-300 group hover:-translate-y-2 shadow-lg shadow-kvt-500/10">
                <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white text-xs px-4 py-1 rounded-full font-bold shadow-lg">
                    <i class="fas fa-fire mr-1"></i>POPULER
                </div>
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition">
                        <i class="fas fa-gem text-white text-2xl"></i>
                    </div>
                    <h3 class="text-white font-bold text-xl">Silver Sponsor</h3>
                    <div class="mt-3">
                        <span class="text-kvt-400 font-black text-3xl">Rp 2Jt</span>
                        <span class="text-gray-500 text-sm">/bulan</span>
                    </div>
                </div>
                <ul class="space-y-3 text-sm text-gray-400 mb-6">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-kvt-400"></i>Semua benefit Bronze</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-kvt-400"></i>Logo di halaman beranda</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-kvt-400"></i>5 akun premium gratis</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-kvt-400"></i>Early access fitur baru</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-kvt-400"></i>Analytics dashboard sponsor</li>
                    <li class="flex items-center gap-2 text-gray-600"><i class="fas fa-times-circle"></i>Branding eksklusif</li>
                </ul>
                <a href="mailto:sponsor@kvthub.id?subject=Silver%20Sponsor" class="block text-center bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg w-full">
                    Pilih Silver
                </a>
            </div>

            {{-- Gold --}}
            <div class="kaca rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-300 group hover:-translate-y-2">
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition">
                        <i class="fas fa-crown text-white text-2xl"></i>
                    </div>
                    <h3 class="text-white font-bold text-xl">Gold Sponsor</h3>
                    <div class="mt-3">
                        <span class="text-yellow-400 font-black text-3xl">Rp 5Jt+</span>
                        <span class="text-gray-500 text-sm">/bulan</span>
                    </div>
                </div>
                <ul class="space-y-3 text-sm text-gray-400 mb-6">
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>Semua benefit Silver</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>Branding eksklusif</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>20 akun premium gratis</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>Dashboard analytics sponsor</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>Beasiswa untuk 10 siswa</li>
                    <li class="flex items-center gap-2"><i class="fas fa-check-circle text-yellow-400"></i>Custom event & webinar bersama</li>
                </ul>
                <a href="mailto:sponsor@kvthub.id?subject=Gold%20Sponsor" class="block text-center bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-400 hover:to-amber-500 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg w-full">
                    Pilih Gold
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Alokasi Dana --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">Transparansi Dana</h2>
        <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Ke mana dana sponsor Anda digunakan</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-delay="200">
        @php
        $alokasi = [
            ['40%', 'Pengembangan Platform', 'fa-code', 'from-blue-500 to-cyan-500'],
            ['25%', 'Beasiswa Siswa', 'fa-user-graduate', 'from-green-500 to-emerald-500'],
            ['20%', 'Konten & Riset', 'fa-book-open', 'from-purple-500 to-violet-500'],
            ['15%', 'Infrastruktur & Server', 'fa-server', 'from-orange-500 to-red-500'],
        ];
        @endphp
        @foreach($alokasi as $al)
        <div class="kaca rounded-2xl p-6 text-center hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-12 h-12 bg-gradient-to-br {{ $al[3] }} rounded-xl flex items-center justify-center mx-auto mb-3 shadow-lg group-hover:scale-110 transition">
                <i class="fas {{ $al[2] }} text-white"></i>
            </div>
            <div class="text-2xl font-black teks-gradien mb-1">{{ $al[0] }}</div>
            <p class="text-gray-400 text-xs">{{ $al[1] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Proses --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-right">Proses Sponsorship</h2>
            <p class="text-gray-400" data-aos="fade-right" data-aos-delay="100">Langkah mudah untuk menjadi sponsor</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6" data-aos="fade-left" data-aos-delay="200">
            @php
            $proses = [
                ['1', 'Pilih Paket', 'Tentukan level sponsorship yang sesuai', 'from-kvt-500 to-kvt-600'],
                ['2', 'Hubungi Tim', 'Kirim email atau WhatsApp ke tim kami', 'from-ungu-500 to-purple-600'],
                ['3', 'Diskusi Detil', 'Tentukan benefit dan durasi kerja sama', 'from-pink-500 to-rose-600'],
                ['4', 'Go Live', 'Logo dan branding Anda tampil di platform', 'from-green-500 to-emerald-600'],
            ];
            @endphp
            @foreach($proses as $pr)
            <div class="text-center">
                <div class="w-14 h-14 bg-gradient-to-br {{ $pr[3] }} rounded-2xl flex items-center justify-center mx-auto mb-3 shadow-lg">
                    <span class="text-white font-black text-xl">{{ $pr[0] }}</span>
                </div>
                <h4 class="text-white font-bold text-sm mb-1">{{ $pr[1] }}</h4>
                <p class="text-gray-500 text-xs">{{ $pr[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-kvt-800/20 to-yellow-700/10 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-2xl font-bold text-white mb-3">Siap Mendukung Pendidikan Digital?</h2>
        <p class="text-gray-400 mb-6">Hubungi tim kami untuk mendiskusikan paket sponsorship yang sesuai dengan kebutuhan Anda.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="mailto:sponsor@kvthub.id" class="bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-400 hover:to-amber-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-envelope mr-2"></i>sponsor@kvthub.id
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-xl font-bold transition">
                <i class="fab fa-whatsapp mr-2"></i>WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection
