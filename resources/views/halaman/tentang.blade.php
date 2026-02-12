@extends('tata-letak.utama')
@section('judul', 'Tentang - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="w-20 h-20 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-3xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-kvt-500/20">
                <span class="text-3xl font-black text-white">KVT</span>
            </div>
            <h1 class="text-3xl font-black text-white">Tentang KVT Hub</h1>
            <p class="text-gray-400 mt-2 max-w-xl mx-auto">Pusat teknologi dan pembelajaran digital KVT. Tempat semua project, coding, AI, dan desain berkumpul.</p>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 mb-6" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-4"><i class="fas fa-bullseye mr-2 text-kvt-400"></i>Visi & Misi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-kvt-400 font-bold mb-2">Visi</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">Menjadi platform pembelajaran digital terdepan di Indonesia yang menggabungkan teknologi modern, gamifikasi, dan kualitas konten terbaik untuk menciptakan pengalaman belajar yang menyenangkan dan efektif.</p>
                </div>
                <div>
                    <h3 class="text-kvt-400 font-bold mb-2">Misi</h3>
                    <ul class="text-gray-400 text-sm space-y-2 leading-relaxed">
                        <li><i class="fas fa-chevron-right text-kvt-500 mr-2 text-xs"></i>Menyediakan konten pembelajaran berkualitas tinggi</li>
                        <li><i class="fas fa-chevron-right text-kvt-500 mr-2 text-xs"></i>Mendemokratisasi akses pendidikan teknologi</li>
                        <li><i class="fas fa-chevron-right text-kvt-500 mr-2 text-xs"></i>Membangun komunitas belajar yang suportif</li>
                        <li><i class="fas fa-chevron-right text-kvt-500 mr-2 text-xs"></i>Menggunakan gamifikasi untuk meningkatkan motivasi</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 mb-6" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-6"><i class="fas fa-rocket mr-2 text-kvt-400"></i>Fitur Unggulan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-gamepad text-kvt-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">Sistem RPG</h4>
                    <p class="text-gray-500 text-xs mt-1">Level 1-100 dengan 10 rank. Dapatkan XP dari setiap aktivitas belajar.</p>
                </div>
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-video text-red-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">Video Tutorial</h4>
                    <p class="text-gray-500 text-xs mt-1">Integrasi YouTube dengan kuis interaktif saat video berjalan.</p>
                </div>
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-chart-bar text-green-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">30 Jenis Diagram</h4>
                    <p class="text-gray-500 text-xs mt-1">Visualisasi data pembelajaran dengan berbagai jenis chart.</p>
                </div>
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-brain text-purple-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">Kuis Interaktif</h4>
                    <p class="text-gray-500 text-xs mt-1">Uji pemahaman dengan sistem penilaian otomatis.</p>
                </div>
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-gem text-yellow-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">Paket Eksklusif</h4>
                    <p class="text-gray-500 text-xs mt-1">Akses materi premium dan fitur spesial.</p>
                </div>
                <div class="bg-kvt-800/30 rounded-xl p-4 text-center">
                    <i class="fas fa-users text-blue-400 text-2xl mb-2"></i>
                    <h4 class="text-white font-bold text-sm">Multi-peran</h4>
                    <p class="text-gray-500 text-xs mt-1">Siswa, Guru, dan Admin dengan fitur masing-masing.</p>
                </div>
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 mb-6" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-4"><i class="fas fa-code mr-2 text-kvt-400"></i>Teknologi</h2>
            <div class="flex flex-wrap gap-3">
                @foreach(['Laravel 12', 'PHP 8.2+', 'MySQL', 'Tailwind CSS', 'Chart.js', 'AOS', 'Font Awesome', 'YouTube API'] as $tech)
                    <span class="bg-kvt-800/50 text-kvt-400 text-sm px-4 py-2 rounded-xl border border-kvt-700/20 font-medium">{{ $tech }}</span>
                @endforeach
            </div>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 text-center" data-aos="fade-up">
            <h2 class="text-xl font-bold text-white mb-3"><i class="fab fa-github mr-2"></i>Open Source</h2>
            <p class="text-gray-400 mb-4">KVT Hub adalah proyek open source. Kontribusi dan ide-ide Anda sangat kami hargai!</p>
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="bg-gray-800 hover:bg-gray-700 text-white px-6 py-3 rounded-xl font-bold transition inline-block">
                <i class="fab fa-github mr-2"></i>github.com/kuro-myths/kvt-hub
            </a>
        </div>
    </div>
</section>
@endsection
