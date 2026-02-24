@extends('tata-letak.utama')

@section('judul', 'Donasi - Dukung Pengembangan KVT Hub')

@section('konten')

{{-- HERO DONASI --}}
<section class="relative py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-950/20 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-72 h-72 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>

    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <div class="inline-flex items-center bg-amber-500/10 border border-amber-500/20 rounded-full px-4 py-1.5 mb-6" data-aos="fade-down">
            <i class="fas fa-heart text-red-400 mr-2 animate-pulse"></i>
            <span class="text-amber-300 text-sm font-bold">Bantu Pengembangan KVT Hub</span>
        </div>
        <h1 class="text-5xl lg:text-6xl font-black text-white mb-6" data-aos="zoom-in">
            Donasi untuk<br><span class="bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">Masa Depan Pendidikan</span>
        </h1>
        <p class="text-lg text-gray-400 max-w-2xl mx-auto" data-aos="fade-up">
            Setiap donasi Anda langsung membantu pengembang KVT Hub mendapatkan perangkat kerja yang layak untuk terus membangun ekosistem pendidikan digital terbaik.
        </p>
    </div>
</section>

{{-- DETAIL TARGET --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12 items-start">
            {{-- Kiri: Target --}}
            <div data-aos="fade-right">
                <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-bullseye mr-2"></i>Target Donasi</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-6">PC / Laptop Kerja</h2>
                <p class="text-gray-400 leading-relaxed mb-8">
                    Saat ini pengembangan KVT Hub dilakukan dengan perangkat seadanya. Dengan perangkat yang lebih baik,
                    kami bisa mengembangkan fitur-fitur canggih seperti AI-powered learning, real-time collaboration,
                    dan video rendering untuk konten educatif berkualitas tinggi.
                </p>

                <div class="bg-kvt-900/80 border border-amber-700/20 rounded-2xl p-8 mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-white font-bold text-lg">Progress Donasi</h3>
                        <span class="text-amber-400 font-black text-xl">Rp 0 / 50 Jt</span>
                    </div>
                    <div class="w-full h-4 bg-kvt-800 rounded-full overflow-hidden mb-3">
                        <div class="h-full bg-gradient-to-r from-amber-500 via-orange-500 to-red-500 rounded-full transition-all duration-1000" style="width:0%"></div>
                    </div>
                    <p class="text-gray-500 text-sm">0% tercapai dari target Rp 50.000.000</p>
                </div>

                {{-- Spesifikasi --}}
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6">
                    <h4 class="text-white font-bold mb-4 flex items-center"><i class="fas fa-laptop text-amber-400 mr-3"></i>Spesifikasi Target</h4>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between py-2 border-b border-kvt-700/20">
                            <span class="text-gray-400 text-sm"><i class="fas fa-microchip text-blue-400 mr-2 w-5 text-center"></i>Processor</span>
                            <span class="text-white font-semibold text-sm">Intel i9 / AMD Ryzen 9</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-kvt-700/20">
                            <span class="text-gray-400 text-sm"><i class="fas fa-memory text-green-400 mr-2 w-5 text-center"></i>RAM</span>
                            <span class="text-white font-semibold text-sm">32 - 64 GB DDR5</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-kvt-700/20">
                            <span class="text-gray-400 text-sm"><i class="fas fa-hdd text-purple-400 mr-2 w-5 text-center"></i>Storage</span>
                            <span class="text-white font-semibold text-sm">1TB NVMe SSD Gen4</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-kvt-700/20">
                            <span class="text-gray-400 text-sm"><i class="fas fa-tv text-cyan-400 mr-2 w-5 text-center"></i>GPU</span>
                            <span class="text-white font-semibold text-sm">NVIDIA RTX 4070 / 4080</span>
                        </div>
                        <div class="flex items-center justify-between py-2 border-b border-kvt-700/20">
                            <span class="text-gray-400 text-sm"><i class="fas fa-desktop text-amber-400 mr-2 w-5 text-center"></i>Monitor</span>
                            <span class="text-white font-semibold text-sm">27" 4K IPS 144Hz</span>
                        </div>
                        <div class="flex items-center justify-between py-2">
                            <span class="text-gray-400 text-sm"><i class="fas fa-keyboard text-pink-400 mr-2 w-5 text-center"></i>Peripheral</span>
                            <span class="text-white font-semibold text-sm">Mechanical KB + Mouse Gaming</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Kanan: Cara Donasi --}}
            <div data-aos="fade-left">
                <span class="text-emerald-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-hand-holding-heart mr-2"></i>Cara Donasi</span>
                <h2 class="text-4xl font-black text-white mt-2 mb-6">Metode Pembayaran</h2>

                <div class="space-y-4">
                    {{-- Transfer Bank --}}
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-emerald-500/30 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-university text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Transfer Bank</h4>
                                <p class="text-gray-500 text-xs">BCA / BNI / Mandiri / BRI</p>
                            </div>
                        </div>
                        <p class="text-gray-400 text-sm mb-3">Hubungi admin untuk mendapatkan nomor rekening tujuan transfer.</p>
                        <a href="https://www.instagram.com/mythskuro/" target="_blank" class="text-kvt-400 text-sm font-semibold hover:text-kvt-300 transition">
                            <i class="fab fa-instagram mr-1"></i> DM Instagram untuk Info Rekening
                        </a>
                    </div>

                    {{-- E-Wallet --}}
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-emerald-500/30 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-wallet text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">E-Wallet</h4>
                                <p class="text-gray-500 text-xs">GoPay / OVO / DANA / ShopeePay</p>
                            </div>
                        </div>
                        <p class="text-gray-400 text-sm">Hubungi admin via DM untuk QR code atau nomor e-wallet.</p>
                    </div>

                    {{-- GitHub Sponsors --}}
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-emerald-500/30 transition">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-600 to-gray-800 rounded-xl flex items-center justify-center">
                                <i class="fab fa-github text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">GitHub Sponsors</h4>
                                <p class="text-gray-500 text-xs">Donasi langsung via GitHub</p>
                            </div>
                        </div>
                        <a href="https://github.com/kuro-myths" target="_blank" class="text-kvt-400 text-sm font-semibold hover:text-kvt-300 transition">
                            <i class="fab fa-github mr-1"></i> github.com/kuro-myths
                        </a>
                    </div>
                </div>

                {{-- Why Donate --}}
                <div class="mt-8 bg-gradient-to-br from-amber-900/20 to-kvt-900/50 border border-amber-500/20 rounded-2xl p-6">
                    <h4 class="text-white font-bold mb-4"><i class="fas fa-question-circle text-amber-400 mr-2"></i>Mengapa Donasi?</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li class="flex items-start gap-3"><i class="fas fa-check text-emerald-400 mt-1 shrink-0"></i>Mempercepat pengembangan fitur-fitur baru</li>
                        <li class="flex items-start gap-3"><i class="fas fa-check text-emerald-400 mt-1 shrink-0"></i>Memungkinkan pembuatan konten video berkualitas tinggi</li>
                        <li class="flex items-start gap-3"><i class="fas fa-check text-emerald-400 mt-1 shrink-0"></i>Mendukung pengembang untuk bekerja full-time di KVT Hub</li>
                        <li class="flex items-start gap-3"><i class="fas fa-check text-emerald-400 mt-1 shrink-0"></i>Membantu mempertahankan platform pendidikan gratis</li>
                        <li class="flex items-start gap-3"><i class="fas fa-check text-emerald-400 mt-1 shrink-0"></i>Kontribusi Anda dicatat sebagai sponsor resmi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- DONOR WALL --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-4xl mx-auto px-4 text-center">
        <div class="mb-12" data-aos="fade-down">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-trophy mr-2"></i>Donor Wall</span>
            <h2 class="text-4xl font-black text-white mt-2">Para Pendukung Kami</h2>
            <p class="text-gray-400 mt-3">Terima kasih kepada semua yang telah mendukung pengembangan KVT Hub</p>
        </div>

        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-12 text-center" data-aos="zoom-in">
            <div class="w-20 h-20 bg-kvt-800/50 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-heart text-4xl text-gray-600"></i>
            </div>
            <h3 class="text-white font-bold text-xl mb-3">Jadilah Donatur Pertama!</h3>
            <p class="text-gray-500 mb-6 max-w-md mx-auto">Nama Anda akan ditampilkan di sini sebagai tanda terima kasih atas dukungan Anda.</p>
            <a href="https://www.instagram.com/mythskuro/" target="_blank" class="inline-flex items-center gap-2 bg-gradient-to-r from-amber-500 to-orange-500 text-white px-8 py-3.5 rounded-xl font-bold transition shadow-lg hover:from-amber-400 hover:to-orange-400">
                <i class="fas fa-donate"></i> Hubungi untuk Donasi
            </a>
        </div>
    </div>
</section>

{{-- Dampak Donasi --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Dampak <span class="bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">Donasi Anda</span></h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Setiap rupiah berdampak langsung pada pengembangan platform pendidikan gratis.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $dampak = [
                ['icon'=>'fa-tachometer-alt','judul'=>'Performa 10x','desc'=>'Perangkat baru memungkinkan development 10x lebih cepat','color'=>'amber'],
                ['icon'=>'fa-video','judul'=>'Konten Video HD','desc'=>'Produksi video tutorial berkualitas 4K untuk semua materi','color'=>'red'],
                ['icon'=>'fa-code','judul'=>'Fitur Baru','desc'=>'Pengembangan fitur-fitur advanced seperti AI dan real-time collab','color'=>'kvt'],
                ['icon'=>'fa-heart','judul'=>'Platform Gratis','desc'=>'Mempertahankan akses gratis untuk jutaan pelajar Indonesia','color'=>'pink'],
            ];
            @endphp
            @foreach($dampak as $d)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center hover:border-{{ $d['color'] }}-500/30 transition-all" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $d['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $d['icon'] }} text-{{ $d['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $d['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $d['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FAQ Donasi --}}
<section class="py-20 bg-kvt-900/30">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl font-black text-white mb-4">FAQ <span class="bg-gradient-to-r from-amber-400 to-orange-400 bg-clip-text text-transparent">Donasi</span></h2>
        </div>
        <div class="space-y-3" data-aos="fade-up">
            @php
            $faqs = [
                ['q'=>'Berapa nominal minimum donasi?','a'=>'Tidak ada minimum! Setiap donasi, sekecil apapun, sangat berarti bagi kami. Rp 1.000 sekalipun kami apresiasi setinggi-tingginya.'],
                ['q'=>'Apakah donasi bisa dikembalikan?','a'=>'Donasi bersifat sukarela dan tidak dapat dikembalikan. Namun seluruh penggunaan dana dilaporkan secara transparan.'],
                ['q'=>'Bagaimana transparansi penggunaan donasi?','a'=>'Kami mempublikasikan laporan keuangan bulanan termasuk rincian penggunaan dana di halaman Donor Wall dan akun media sosial resmi.'],
                ['q'=>'Apakah donatur mendapat benefit khusus?','a'=>'Ya! Donatur tercatat di Donor Wall, mendapat badge khusus di profil, akses early beta fitur baru, dan shoutout di media sosial KVT Hub.'],
            ];
            @endphp
            @foreach($faqs as $faq)
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl overflow-hidden">
                <button onclick="this.parentElement.classList.toggle('faq-open')" class="w-full flex items-center justify-between p-5 text-left hover:bg-kvt-800/30 transition">
                    <span class="text-white font-semibold text-sm pr-4">{{ $faq['q'] }}</span>
                    <i class="fas fa-chevron-down text-amber-400 text-xs transition-transform faq-chevron"></i>
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
<style>.faq-open .faq-chevron{transform:rotate(180deg)}.faq-open .faq-answer{max-height:200px;padding-bottom:1.25rem}</style>
@endpush
