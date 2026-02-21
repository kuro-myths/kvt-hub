@extends('tata-letak.utama')
@section('judul', 'Donasi - Dukung Pengembangan KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">

    {{-- Hero Section --}}
    <section class="pt-28 pb-16 px-4 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/50 to-kvt-950"></div>
        <div class="absolute top-20 right-10 w-72 h-72 bg-green-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-yellow-500/10 rounded-full blur-3xl animate-pulse-slow"></div>

        <div class="max-w-5xl mx-auto relative z-10 text-center" data-aos="fade-up">
            <div class="inline-flex items-center bg-green-500/10 border border-green-500/20 rounded-full px-4 py-1.5 mb-6">
                <i class="fas fa-heart text-green-400 mr-2"></i>
                <span class="text-green-300 text-sm">Dukung Pengembangan KVT Hub</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-black text-white mb-6">
                <span class="teks-gradien">Donasi</span> untuk <br class="hidden md:block">
                <span class="text-white">Masa Depan</span> <span class="text-kvt-400">Edukasi</span>
            </h1>

            <p class="text-lg text-gray-400 max-w-3xl mx-auto mb-8 leading-relaxed">
                Bantu kami mengembangkan platform pendidikan yang lebih baik dengan donasi Anda.
                Setiap kontribusi akan digunakan untuk membeli peralatan pengembangan dan meningkatkan infrastruktur.
            </p>

            <div class="flex flex-wrap gap-4 justify-center">
                <a href="#campaign" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-green-500/30 hover:-translate-y-0.5">
                    <i class="fas fa-hand-holding-heart mr-2"></i>Donasi Sekarang
                </a>
                <a href="#faq" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                    <i class="fas fa-question-circle mr-2"></i>Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    {{-- Campaign Target --}}
    <section id="campaign" class="px-4 py-16 relative">
        <div class="max-w-5xl mx-auto">
            <div class="kaca rounded-2xl p-8 md:p-12 border border-kvt-700/20" data-aos="fade-up">
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div>
                        <h2 class="text-3xl font-black text-white mb-4">
                            <i class="fas fa-laptop-code text-kvt-400 mr-3"></i>
                            Campaign: PC & Laptop Pro
                        </h2>
                        <p class="text-gray-400 leading-relaxed mb-6">
                            Kami membutuhkan PC dan Laptop dengan spesifikasi tinggi untuk pengembangan KVT Hub yang lebih cepat dan efisien.
                            Target dana: <span class="text-yellow-400 font-bold">Rp 50.000.000</span>
                        </p>

                        {{-- Progress Bar --}}
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <span class="text-sm text-gray-500">Terkumpul</span>
                                <span class="text-sm text-kvt-400 font-bold" id="donasi-terkumpul">Rp 0</span>
                            </div>
                            <div class="w-full h-4 bg-kvt-800 rounded-full overflow-hidden">
                                <div id="progress-bar" class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all duration-500" style="width: 0%"></div>
                            </div>
                            <div class="flex justify-between mt-2 text-xs text-gray-500">
                                <span id="donatur-count">0 Donatur</span>
                                <span>Target: Rp 50.000.000</span>
                            </div>
                        </div>

                        {{-- Stats Grid --}}
                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-kvt-800/30 rounded-xl p-3 text-center border border-kvt-700/10">
                                <i class="fas fa-users text-kvt-400 text-xl mb-1"></i>
                                <div class="text-white font-bold" id="stat-donatur">0</div>
                                <div class="text-gray-500 text-xs">Donatur</div>
                            </div>
                            <div class="bg-kvt-800/30 rounded-xl p-3 text-center border border-kvt-700/10">
                                <i class="fas fa-calendar text-green-400 text-xl mb-1"></i>
                                <div class="text-white font-bold">30</div>
                                <div class="text-gray-500 text-xs">Hari</div>
                            </div>
                            <div class="bg-kvt-800/30 rounded-xl p-3 text-center border border-kvt-700/10">
                                <i class="fas fa-heart text-pink-400 text-xl mb-1"></i>
                                <div class="text-white font-bold" id="stat-dukungan">0</div>
                                <div class="text-gray-500 text-xs">Dukungan</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        {{-- Donation Options --}}
                        <div class="bg-gradient-to-br from-kvt-800/50 to-kvt-900/50 rounded-xl p-6 border border-kvt-700/20">
                            <h3 class="text-lg font-bold text-white mb-4">
                                <i class="fas fa-donate text-yellow-400 mr-2"></i>
                                Pilih Jumlah Donasi
                            </h3>

                            <div class="grid grid-cols-2 gap-3 mb-4">
                                <button onclick="selectAmount(50000)" class="donation-btn bg-kvt-700/30 hover:bg-kvt-600/40 border border-kvt-600/30 rounded-lg py-3 text-white font-semibold transition">
                                    Rp 50.000
                                </button>
                                <button onclick="selectAmount(100000)" class="donation-btn bg-kvt-700/30 hover:bg-kvt-600/40 border border-kvt-600/30 rounded-lg py-3 text-white font-semibold transition">
                                    Rp 100.000
                                </button>
                                <button onclick="selectAmount(250000)" class="donation-btn bg-kvt-700/30 hover:bg-kvt-600/40 border border-kvt-600/30 rounded-lg py-3 text-white font-semibold transition">
                                    Rp 250.000
                                </button>
                                <button onclick="selectAmount(500000)" class="donation-btn bg-kvt-700/30 hover:bg-kvt-600/40 border border-kvt-600/30 rounded-lg py-3 text-white font-semibold transition">
                                    Rp 500.000
                                </button>
                            </div>

                            <div class="mb-4">
                                <label class="text-sm text-gray-400 mb-2 block">Atau masukkan jumlah lain</label>
                                <input type="number" id="custom-amount" placeholder="Masukkan jumlah..."
                                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-3 text-white focus:border-kvt-500 focus:outline-none">
                            </div>

                            <button onclick="processDonation()" class="w-full bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white py-3 rounded-lg font-bold transition-all hover:-translate-y-0.5 shadow-lg shadow-green-500/30">
                                <i class="fas fa-heart mr-2"></i>Lanjutkan Donasi
                            </button>

                            <p class="text-xs text-gray-500 text-center mt-3">
                                <i class="fas fa-shield-alt mr-1"></i>
                                Transaksi aman dan terenkripsi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Spesifikasi Target --}}
    <section class="px-4 py-16 bg-kvt-900/30">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-black text-white text-center mb-4" data-aos="fade-up">
                <i class="fas fa-desktop text-kvt-400 mr-3"></i>
                Spesifikasi Target
            </h2>
            <p class="text-center text-gray-400 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Dengan donasi Anda, kami akan membeli peralatan dengan spesifikasi berikut:
            </p>

            <div class="grid md:grid-cols-2 gap-6">
                {{-- PC Workstation --}}
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="200">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500/20 to-blue-600/10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-desktop text-blue-400 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">PC Workstation</h3>
                            <p class="text-sm text-gray-500">High-Performance</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Processor: AMD Ryzen 9 / Intel i9
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            RAM: 64GB DDR5
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Storage: 2TB NVMe SSD + 4TB HDD
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            GPU: RTX 4070 Ti / RX 7900 XT
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Monitor: 32" 4K IPS 144Hz
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-kvt-700/20">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">Target Budget:</span>
                            <span class="text-kvt-400 font-bold">Rp 35.000.000</span>
                        </div>
                    </div>
                </div>

                {{-- Laptop Development --}}
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="300">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500/20 to-purple-600/10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-laptop-code text-purple-400 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-white">Laptop Development</h3>
                            <p class="text-sm text-gray-500">Mobile Workstation</p>
                        </div>
                    </div>
                    <ul class="space-y-2 text-sm text-gray-400">
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Processor: Ryzen 9 / Intel i9 Mobile
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            RAM: 32GB DDR5
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Storage: 1TB NVMe SSD
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            GPU: RTX 4060 / RX 7600M
                        </li>
                        <li class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400"></i>
                            Display: 16" QHD+ 165Hz
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-kvt-700/20">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-500 text-sm">Target Budget:</span>
                            <span class="text-purple-400 font-bold">Rp 15.000.000</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Benefits of Donating --}}
    <section class="px-4 py-16">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-3xl font-black text-white mb-4" data-aos="fade-up">
                <i class="fas fa-gift text-yellow-400 mr-3"></i>
                Apresiasi Donatur
            </h2>
            <p class="text-gray-400 mb-12 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Sebagai bentuk terima kasih, kami memberikan apresiasi khusus untuk setiap donatur:
            </p>

            <div class="grid md:grid-cols-4 gap-5">
                <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="100">
                    <i class="fas fa-certificate text-3xl text-green-400 mb-3"></i>
                    <h3 class="text-white font-bold mb-2">Sertifikat Digital</h3>
                    <p class="text-sm text-gray-400">Sertifikat donatur resmi dari KVT Hub</p>
                </div>

                <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="200">
                    <i class="fas fa-star text-3xl text-yellow-400 mb-3"></i>
                    <h3 class="text-white font-bold mb-2">Badge Khusus</h3>
                    <p class="text-sm text-gray-400">Badge "Supporter" di profil Anda</p>
                </div>

                <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="300">
                    <i class="fas fa-trophy text-3xl text-orange-400 mb-3"></i>
                    <h3 class="text-white font-bold mb-2">Hall of Fame</h3>
                    <p class="text-sm text-gray-400">Nama Anda di halaman donatur</p>
                </div>

                <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="400">
                    <i class="fas fa-heart text-3xl text-pink-400 mb-3"></i>
                    <h3 class="text-white font-bold mb-2">Bonus XP</h3>
                    <p class="text-sm text-gray-400">1000 XP untuk level up</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="px-4 py-16 bg-kvt-900/30">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl font-black text-white text-center mb-12" data-aos="fade-up">
                <i class="fas fa-question-circle text-kvt-400 mr-3"></i>
                Pertanyaan Umum
            </h2>

            <div class="space-y-4">
                <details class="kaca rounded-xl border border-kvt-700/20 overflow-hidden group" data-aos="fade-up">
                    <summary class="px-6 py-4 cursor-pointer text-white font-semibold flex justify-between items-center hover:bg-kvt-800/30 transition">
                        <span>Kemana donasi saya akan digunakan?</span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-4 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/10 pt-4">
                        100% donasi akan digunakan untuk membeli PC Workstation dan Laptop Development sesuai spesifikasi yang tercantum. Kami akan transparan dengan update progress penggunaan dana.
                    </div>
                </details>

                <details class="kaca rounded-xl border border-kvt-700/20 overflow-hidden group" data-aos="fade-up" data-aos-delay="100">
                    <summary class="px-6 py-4 cursor-pointer text-white font-semibold flex justify-between items-center hover:bg-kvt-800/30 transition">
                        <span>Apakah donasi saya aman?</span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-4 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/10 pt-4">
                        Ya, sangat aman. Kami menggunakan payment gateway terpercaya dengan enkripsi SSL 256-bit. Data Anda dilindungi sesuai standar PCI-DSS.
                    </div>
                </details>

                <details class="kaca rounded-xl border border-kvt-700/20 overflow-hidden group" data-aos="fade-up" data-aos-delay="200">
                    <summary class="px-6 py-4 cursor-pointer text-white font-semibold flex justify-between items-center hover:bg-kvt-800/30 transition">
                        <span>Bagaimana cara track donasi saya?</span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-4 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/10 pt-4">
                        Setelah donasi, Anda akan menerima email konfirmasi dan dapat melihat status campaign di halaman ini. Kami juga akan mengirim update berkala melalui email.
                    </div>
                </details>

                <details class="kaca rounded-xl border border-kvt-700/20 overflow-hidden group" data-aos="fade-up" data-aos-delay="300">
                    <summary class="px-6 py-4 cursor-pointer text-white font-semibold flex justify-between items-center hover:bg-kvt-800/30 transition">
                        <span>Apakah ada minimal donasi?</span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-4 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/10 pt-4">
                        Tidak ada minimal donasi. Setiap kontribusi, sekecil apapun, sangat berarti bagi kami. Namun kami merekomendasikan minimal Rp 10.000 untuk efisiensi biaya transaksi.
                    </div>
                </details>

                <details class="kaca rounded-xl border border-kvt-700/20 overflow-hidden group" data-aos="fade-up" data-aos-delay="400">
                    <summary class="px-6 py-4 cursor-pointer text-white font-semibold flex justify-between items-center hover:bg-kvt-800/30 transition">
                        <span>Kapan target akan tercapai?</span>
                        <i class="fas fa-chevron-down group-open:rotate-180 transition-transform"></i>
                    </summary>
                    <div class="px-6 pb-4 text-gray-400 text-sm leading-relaxed border-t border-kvt-700/10 pt-4">
                        Campaign ini berjalan selama 30 hari atau hingga target tercapai. Jika target tercapai lebih cepat, kami akan segera melakukan pembelian dan memberikan update kepada semua donatur.
                    </div>
                </details>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="px-4 py-16">
        <div class="max-w-4xl mx-auto kaca rounded-2xl p-8 md:p-12 border border-kvt-700/20 text-center" data-aos="fade-up">
            <div class="w-20 h-20 bg-gradient-to-br from-green-500/20 to-emerald-600/20 rounded-full flex items-c justify-center mx-auto mb-6">
                <i class="fas fa-hands-helping text-green-400 text-3xl"></i>
            </div>
            <h2 class="text-3xl font-black text-white mb-4">
                Mari Bersama Membangun Masa Depan Pendidikan
            </h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">
                Dengan donasi Anda, kami dapat bekerja lebih cepat untuk mengembangkan fitur-fitur baru yang bermanfaat untuk seluruh ekosistem KVT Hub.
            </p>
            <a href="#campaign" class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-400 hover:to-emerald-500 text-white px-8 py-3.5 rounded-xl font-semibold transition-all shadow-lg shadow-green-500/30 hover:-translate-y-0.5">
                <i class="fas fa-heart"></i>
                Donasi Sekarang
            </a>
        </div>
    </section>

</div>

@push('scripts')
<script>
// Simulate donation data (would come from backend in production)
let selectedAmount = 0;
const targetAmount = 50000000;
let currentAmount = 0; // This should come from database
let donorCount = 0;

function selectAmount(amount) {
    selectedAmount = amount;
    document.getElementById('custom-amount').value = amount;

    // Highlight selected button
    document.querySelectorAll('.donation-btn').forEach(btn => {
        btn.classList.remove('bg-green-500/30', 'border-green-500/50');
    });
    event.target.classList.add('bg-green-500/30', 'border-green-500/50');
}

function processDonation() {
    const customAmount = document.getElementById('custom-amount').value;
    const amount = customAmount || selectedAmount;

    if (!amount || amount < 10000) {
        alert('Minimal donasi adalah Rp 10.000');
        return;
    }

    alert(`Terima kasih! Anda akan diarahkan ke halaman pembayaran untuk donasi sebesar Rp ${parseInt(amount).toLocaleString('id-ID')}`);

    // In production, redirect to payment gateway
    // window.location.href = `/donasi/checkout?amount=${amount}`;
}

function updateProgress() {
    const percentage = (currentAmount / targetAmount) * 100;
    document.getElementById('progress-bar').style.width = percentage + '%';
    document.getElementById('donasi-terkumpul').textContent = 'Rp ' + currentAmount.toLocaleString('id-ID');
    document.getElementById('donatur-count').textContent = donorCount + ' Donatur';
    document.getElementById('stat-donatur').textContent = donorCount;
    document.getElementById('stat-dukungan').textContent = donorCount * 2; // Simulate
}

// Initialize
updateProgress();
</script>
@endpush

@endsection
