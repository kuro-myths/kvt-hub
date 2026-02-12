@extends('tata-letak.utama')
@section('judul', 'Sponsor - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-medal text-2xl text-white"></i>
            </div>
            <h1 class="text-3xl font-black text-white">Sponsor KVT Hub</h1>
            <p class="text-gray-400 mt-2">Dukung pendidikan digital Indonesia bersama kami</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 text-center" data-aos="fade-up">
                <div class="w-14 h-14 bg-yellow-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-star text-yellow-500 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg">Bronze Sponsor</h3>
                <p class="text-yellow-400 font-black text-2xl mt-2">Rp 500K</p>
                <p class="text-gray-500 text-xs mt-1">per bulan</p>
                <ul class="text-gray-400 text-sm mt-4 space-y-2 text-left">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Logo di halaman sponsor</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Laporan bulanan</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Terima kasih di media sosial</li>
                </ul>
            </div>

            <div class="bg-kvt-900/80 border-2 border-kvt-500/50 rounded-2xl p-6 text-center relative" data-aos="fade-up" data-aos-delay="100">
                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-kvt-500 text-white text-xs px-3 py-1 rounded-full font-bold">POPULER</span>
                <div class="w-14 h-14 bg-kvt-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-gem text-kvt-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg">Silver Sponsor</h3>
                <p class="text-kvt-400 font-black text-2xl mt-2">Rp 2Jt</p>
                <p class="text-gray-500 text-xs mt-1">per bulan</p>
                <ul class="text-gray-400 text-sm mt-4 space-y-2 text-left">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Semua benefit Bronze</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Logo di halaman beranda</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>5 akun premium gratis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Early access fitur baru</li>
                </ul>
            </div>

            <div class="bg-kvt-900/80 border border-yellow-500/30 rounded-2xl p-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="w-14 h-14 bg-yellow-500/20 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-crown text-yellow-400 text-2xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg">Gold Sponsor</h3>
                <p class="text-yellow-400 font-black text-2xl mt-2">Rp 5Jt+</p>
                <p class="text-gray-500 text-xs mt-1">per bulan</p>
                <ul class="text-gray-400 text-sm mt-4 space-y-2 text-left">
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Semua benefit Silver</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Branding eksklusif</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>20 akun premium gratis</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Dashboard analytics sponsor</li>
                    <li><i class="fas fa-check text-green-400 mr-2"></i>Beasiswa untuk 10 siswa</li>
                </ul>
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 text-center" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-3">Tertarik Menjadi Sponsor?</h2>
            <p class="text-gray-400 mb-6">Hubungi tim kami untuk mendiskusikan paket sponsorship yang sesuai dengan kebutuhan Anda.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:sponsor@kvthub.id" class="bg-gradient-to-r from-yellow-500 to-yellow-600 hover:from-yellow-400 hover:to-yellow-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                    <i class="fas fa-envelope mr-2"></i>sponsor@kvthub.id
                </a>
                <a href="https://wa.me/6281234567890" target="_blank" class="bg-green-600 hover:bg-green-500 text-white px-8 py-3 rounded-xl font-bold transition">
                    <i class="fab fa-whatsapp mr-2"></i>WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
