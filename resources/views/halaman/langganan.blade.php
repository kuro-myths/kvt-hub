@extends('tata-letak.utama')
@section('judul', 'Langganan - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute top-20 right-20 w-80 h-80 bg-kvt-500/5 rounded-full blur-3xl animate-pulse"></div>
    <div class="absolute bottom-20 left-20 w-96 h-96 bg-ungu-500/5 rounded-full blur-3xl animate-pulse" style="animation-delay:2s"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 rounded-full px-5 py-2 text-xs text-amber-300 mb-6" data-aos="fade-down">
            <i class="fas fa-crown"></i> Paket Langganan
        </div>
        <h1 class="text-4xl md:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Pilih Paket </span><span class="teks-gradien">Terbaik</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Mulai gratis, upgrade kapan saja. Semua paket termasuk akses komunitas dan fitur gamifikasi.
        </p>
        {{-- Toggle Bulanan / Tahunan --}}
        <div class="inline-flex items-center gap-3 bg-kvt-900/50 border border-kvt-700/30 rounded-full p-1" data-aos="fade-up" data-aos-delay="200">
            <button onclick="togglePricing('bulanan')" id="btn-bulanan" class="px-6 py-2 rounded-full text-sm font-semibold transition bg-kvt-500 text-white">Bulanan</button>
            <button onclick="togglePricing('tahunan')" id="btn-tahunan" class="px-6 py-2 rounded-full text-sm font-semibold transition text-gray-400 hover:text-white">Tahunan <span class="text-green-400 text-xs ml-1">-20%</span></button>
        </div>
    </div>
</section>

{{-- Paket --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
            $paket = [
                [
                    'nama' => 'Gratis', 'harga_bln' => '0', 'harga_thn' => '0',
                    'desc' => 'Cocok untuk mulai belajar',
                    'fitur' => ['Akses 10 kelas dasar', 'Materi terbatas', 'Kuis dasar (3/hari)', 'Komunitas forum', 'Level 1-20', 'Profil publik'],
                    'limit' => ['Sertifikasi', 'AI Assistant', 'Prioritas support', 'Lab virtual'],
                    'warna' => 'gray', 'populer' => false, 'ikon' => 'fa-paper-plane'
                ],
                [
                    'nama' => 'Premium', 'harga_bln' => '99.000', 'harga_thn' => '950.000',
                    'desc' => 'Akses penuh semua fitur',
                    'fitur' => ['Semua kelas unlimited', 'Materi lengkap + download', 'Kuis & Sertifikasi', 'Laporan detail', 'Prioritas support', 'Level 1-100', 'AI Assistant Kuro', 'Lab virtual', 'Webinar akses', 'Badge eksklusif'],
                    'limit' => ['API akses', 'Custom branding'],
                    'warna' => 'kvt', 'populer' => true, 'ikon' => 'fa-crown'
                ],
                [
                    'nama' => 'Enterprise', 'harga_bln' => 'Custom', 'harga_thn' => 'Custom',
                    'desc' => 'Untuk institusi & perusahaan',
                    'fitur' => ['Semua fitur Premium', 'API akses lengkap', 'Custom branding', 'Dedicated account manager', 'SLA 99.9%', 'On-premise deployment', 'Bulk user management', 'Custom integrations', 'Training & onboarding', 'Invoice pembayaran'],
                    'limit' => [],
                    'warna' => 'ungu', 'populer' => false, 'ikon' => 'fa-building'
                ],
            ];
        @endphp

        @foreach($paket as $i => $p)
            <div class="relative kaca rounded-2xl p-8 border-{{ $p['warna'] }}-500/{{ $p['populer'] ? '40' : '20' }} hover:border-{{ $p['warna'] }}-500/60 transition-all hover:-translate-y-1 {{ $p['populer'] ? 'ring-2 ring-kvt-500/30 scale-[1.02]' : '' }}" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                @if($p['populer'])
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white text-xs font-bold px-4 py-1 rounded-full shadow-lg shadow-kvt-500/20">
                        <i class="fas fa-fire mr-1"></i>Paling Populer
                    </div>
                @endif
                <div class="text-center mb-6">
                    <div class="w-14 h-14 bg-{{ $p['warna'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <i class="fas {{ $p['ikon'] }} text-{{ $p['warna'] }}-400 text-xl"></i>
                    </div>
                    <h3 class="text-white font-bold text-xl">{{ $p['nama'] }}</h3>
                    <p class="text-gray-500 text-xs mt-1">{{ $p['desc'] }}</p>
                </div>
                <div class="text-center mb-6">
                    <div class="pricing-bulanan">
                        <span class="text-4xl font-black text-white">Rp {{ $p['harga_bln'] }}</span>
                        @if($p['harga_bln'] !== 'Custom')
                            <span class="text-gray-500 text-sm">/bulan</span>
                        @endif
                    </div>
                    <div class="pricing-tahunan hidden">
                        <span class="text-4xl font-black text-white">Rp {{ $p['harga_thn'] }}</span>
                        @if($p['harga_thn'] !== 'Custom')
                            <span class="text-gray-500 text-sm">/tahun</span>
                        @endif
                    </div>
                </div>
                <ul class="space-y-2.5 mb-6">
                    @foreach($p['fitur'] as $f)
                        <li class="flex items-center gap-2 text-gray-300 text-sm">
                            <i class="fas fa-check-circle text-green-400 text-xs"></i>{{ $f }}
                        </li>
                    @endforeach
                    @foreach($p['limit'] as $l)
                        <li class="flex items-center gap-2 text-gray-600 text-sm line-through">
                            <i class="fas fa-times-circle text-gray-700 text-xs"></i>{{ $l }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('daftar') }}" class="block text-center w-full py-3 rounded-xl font-semibold transition {{ $p['populer'] ? 'bg-gradient-to-r from-kvt-500 to-ungu-500 text-white hover:from-kvt-400 shadow-lg shadow-kvt-500/20' : 'border border-kvt-700/50 text-gray-300 hover:bg-kvt-800/50' }}">
                    {{ $p['harga_bln'] === 'Custom' ? 'Hubungi Kami' : 'Mulai Sekarang' }}
                </a>
            </div>
        @endforeach
    </div>
</section>

{{-- Benefit Highlights --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Semua Paket <span class="teks-gradien">Termasuk</span></h2>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @php
                $includes = [
                    ['ikon' => 'fa-shield-alt', 'judul' => 'Keamanan Data', 'desc' => 'Enkripsi AES-256'],
                    ['ikon' => 'fa-mobile-alt', 'judul' => 'Responsive', 'desc' => 'Semua perangkat'],
                    ['ikon' => 'fa-sync', 'judul' => 'Update Gratis', 'desc' => 'Fitur terbaru otomatis'],
                    ['ikon' => 'fa-users', 'judul' => 'Komunitas', 'desc' => 'Forum & diskusi'],
                    ['ikon' => 'fa-headset', 'judul' => 'Support', 'desc' => 'Email & chat'],
                    ['ikon' => 'fa-gamepad', 'judul' => 'Gamifikasi', 'desc' => 'XP & Level system'],
                    ['ikon' => 'fa-music', 'judul' => 'Music Player', 'desc' => '5 stasiun streaming'],
                    ['ikon' => 'fa-palette', 'judul' => 'Kustomisasi', 'desc' => 'Tema & warna'],
                ];
            @endphp
            @foreach($includes as $i => $inc)
                <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 text-center hover:border-kvt-500/30 transition" data-aos="zoom-in" data-aos-delay="{{ $i * 50 }}">
                    <i class="fas {{ $inc['ikon'] }} text-kvt-400 text-xl mb-2"></i>
                    <div class="text-white font-semibold text-sm">{{ $inc['judul'] }}</div>
                    <div class="text-gray-500 text-xs">{{ $inc['desc'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Testimonials --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Apa Kata <span class="teks-gradien">Mereka?</span></h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @php
            $testimonials = [
                ['nama' => 'Andi Pratama', 'peran' => 'Mahasiswa S1 IT', 'teks' => 'KVT Hub Premium worth it banget! Materi lengkap, sertifikasi resmi, dan fitur gamifikasi bikin belajar jadi seru.', 'rating' => 5],
                ['nama' => 'Dr. Siti Rahayu', 'peran' => 'Dosen Universitas', 'teks' => 'Sebagai pengajar, saya sangat terbantu dengan dashboard analytics dan laporan otomatis. Enterprise plan sangat sesuai.', 'rating' => 5],
                ['nama' => 'Budi Santoso', 'peran' => 'Pelajar SMA', 'teks' => 'Paket gratis sudah cukup lengkap untuk belajar sehari-hari. Tapi setelah upgrade Premium, fiturnya luar biasa!', 'rating' => 4],
            ];
        @endphp
        @foreach($testimonials as $i => $t)
            <div class="kaca rounded-2xl p-6 border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="flex gap-1 mb-4">
                    @for($s = 0; $s < $t['rating']; $s++)
                        <i class="fas fa-star text-amber-400 text-sm"></i>
                    @endfor
                    @for($s = $t['rating']; $s < 5; $s++)
                        <i class="fas fa-star text-gray-700 text-sm"></i>
                    @endfor
                </div>
                <p class="text-gray-300 text-sm mb-4 italic">"{{ $t['teks'] }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                        {{ strtoupper(substr($t['nama'], 0, 1)) }}
                    </div>
                    <div>
                        <div class="text-white font-semibold text-sm">{{ $t['nama'] }}</div>
                        <div class="text-gray-500 text-xs">{{ $t['peran'] }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- FAQ --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">FAQ <span class="teks-gradien">Langganan</span></h2>
        </div>
        @php
            $faq = [
                ['q' => 'Bagaimana cara berlangganan?', 'a' => 'Setelah mendaftar, buka halaman Langganan, pilih paket yang diinginkan, dan ikuti proses pembayaran yang tersedia (transfer bank, e-wallet, atau kartu kredit).'],
                ['q' => 'Bisa upgrade atau downgrade paket?', 'a' => 'Ya! Anda bisa upgrade kapan saja dan hanya membayar selisih prorate. Downgrade efektif di periode berikutnya.'],
                ['q' => 'Apakah ada garansi uang kembali?', 'a' => 'Kami menyediakan garansi 30 hari uang kembali untuk paket Premium. Jika tidak puas, hubungi support untuk refund penuh.'],
                ['q' => 'Metode pembayaran apa saja?', 'a' => 'Transfer bank (BCA, Mandiri, BNI, BRI), e-wallet (GoPay, OVO, Dana), kartu kredit/debit, dan virtual account.'],
                ['q' => 'Apakah ada diskon untuk pelajar?', 'a' => 'Ya! Verifikasi status pelajar Anda dengan email .ac.id atau kartu pelajar untuk mendapatkan diskon hingga 50%.'],
            ];
        @endphp
        <div class="space-y-3">
            @foreach($faq as $i => $item)
                <div class="kaca rounded-2xl overflow-hidden border-kvt-500/20" data-aos="fade-up" data-aos-delay="{{ $i * 50 }}">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.fa-chevron-down').classList.toggle('rotate-180')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/20 transition">
                        <span class="text-white font-semibold text-sm"><i class="fas fa-question-circle text-kvt-400 mr-2"></i>{{ $item['q'] }}</span>
                        <i class="fas fa-chevron-down text-kvt-400 text-xs transition-transform duration-300"></i>
                    </button>
                    <div class="hidden px-5 pb-5">
                        <p class="text-gray-400 text-sm">{{ $item['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Guarantee CTA --}}
<section class="max-w-4xl mx-auto px-4 py-16">
    <div class="relative overflow-hidden kaca rounded-3xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
        <div class="absolute top-0 right-0 w-40 h-40 bg-green-500/5 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
        <div class="relative">
            <div class="w-20 h-20 bg-green-500/10 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-shield-alt text-green-400 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-black text-white mb-3">Garansi 30 Hari Uang Kembali</h2>
            <p class="text-gray-400 mb-8 max-w-lg mx-auto">Coba Premium tanpa risiko. Jika dalam 30 hari pertama Anda tidak puas, kami akan refund 100% — tanpa pertanyaan.</p>
            <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 text-white px-10 py-4 rounded-2xl font-bold text-lg transition shadow-lg shadow-kvt-500/20 inline-block">
                <i class="fas fa-rocket mr-2"></i>Mulai Gratis Sekarang
            </a>
        </div>
    </div>
</section>

@push('skrip')
<script>
function togglePricing(mode) {
    const bulanan = document.querySelectorAll('.pricing-bulanan');
    const tahunan = document.querySelectorAll('.pricing-tahunan');
    const btnB = document.getElementById('btn-bulanan');
    const btnT = document.getElementById('btn-tahunan');
    if (mode === 'tahunan') {
        bulanan.forEach(el => el.classList.add('hidden'));
        tahunan.forEach(el => el.classList.remove('hidden'));
        btnB.classList.remove('bg-kvt-500', 'text-white');
        btnB.classList.add('text-gray-400');
        btnT.classList.add('bg-kvt-500', 'text-white');
        btnT.classList.remove('text-gray-400');
    } else {
        bulanan.forEach(el => el.classList.remove('hidden'));
        tahunan.forEach(el => el.classList.add('hidden'));
        btnT.classList.remove('bg-kvt-500', 'text-white');
        btnT.classList.add('text-gray-400');
        btnB.classList.add('bg-kvt-500', 'text-white');
        btnB.classList.remove('text-gray-400');
    }
}
</script>
@endpush
@endsection
