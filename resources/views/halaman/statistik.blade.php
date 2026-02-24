@extends('tata-letak.utama')
@section('judul', 'Statistik - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-ungu-700/20"></div>
    <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; width=&quot;60&quot; height=&quot;60&quot;><rect width=&quot;60&quot; height=&quot;60&quot; fill=&quot;none&quot; stroke=&quot;%23334155&quot; stroke-width=&quot;0.5&quot;/></svg>')"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-kvt-800/50 border border-kvt-600/30 rounded-full px-4 py-1.5 text-xs text-kvt-300 mb-6" data-aos="fade-down">
            <i class="fas fa-chart-pie"></i> Statistik Real-Time
        </div>
        <h1 class="text-4xl md:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Statistik </span><span class="teks-gradien">Platform</span>
        </h1>
        <p class="text-gray-400 text-lg md:text-xl max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
            Data real-time tentang pertumbuhan, aktivitas, dan pencapaian komunitas KVT Hub.
        </p>
    </div>
</section>

{{-- Primary Stats --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    @php
        $stats = [
            ['label' => 'Total Pengguna', 'nilai' => \App\Models\User::count(), 'ikon' => 'fa-users', 'warna' => 'from-kvt-400 to-kvt-600', 'desc' => 'Pengguna terdaftar'],
            ['label' => 'Kelas Aktif', 'nilai' => \App\Models\Kelas::where('status', 'aktif')->count(), 'ikon' => 'fa-school', 'warna' => 'from-green-400 to-green-600', 'desc' => 'Kelas berjalan saat ini'],
            ['label' => 'Materi Terbit', 'nilai' => \App\Models\Materi::where('status', 'terbit')->count(), 'ikon' => 'fa-book', 'warna' => 'from-purple-400 to-purple-600', 'desc' => 'Konten pembelajaran'],
            ['label' => 'Pengunjung Total', 'nilai' => \App\Models\Pengunjung::totalSemua(), 'ikon' => 'fa-chart-line', 'warna' => 'from-amber-400 to-amber-600', 'desc' => 'Total kunjungan'],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-16">
        @foreach($stats as $i => $s)
            <div class="kaca rounded-2xl p-8 border-kvt-500/20 text-center hover:-translate-y-1 transition-all duration-300 group" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-gradient-to-br {{ $s['warna'] }} rounded-xl flex items-center justify-center mx-auto mb-4 shadow-lg group-hover:scale-110 transition-transform">
                    <i class="fas {{ $s['ikon'] }} text-white text-2xl"></i>
                </div>
                <div class="text-4xl font-black text-white mb-1" id="stat-{{ $i }}">{{ number_format($s['nilai']) }}</div>
                <div class="text-white font-semibold text-sm mb-1">{{ $s['label'] }}</div>
                <div class="text-gray-500 text-xs">{{ $s['desc'] }}</div>
            </div>
        @endforeach
    </div>
</section>

{{-- Secondary Stats Grid --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Statistik <span class="teks-gradien">Detail</span></h2>
            <p class="text-gray-400">Data lengkap platform berdasarkan kategori</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
            @php
                $detailStats = [
                    ['label' => 'Pengajar', 'nilai' => \App\Models\User::where('peran', 'pengajar')->count(), 'ikon' => 'fa-chalkboard-teacher', 'warna' => 'kvt'],
                    ['label' => 'Siswa', 'nilai' => \App\Models\User::where('peran', 'siswa')->count(), 'ikon' => 'fa-user-graduate', 'warna' => 'green'],
                    ['label' => 'Kuis', 'nilai' => \App\Models\Kuis::count(), 'ikon' => 'fa-question-circle', 'warna' => 'amber'],
                    ['label' => 'Pertanyaan Kuis', 'nilai' => \App\Models\KuisPertanyaan::count(), 'ikon' => 'fa-clipboard-list', 'warna' => 'orange'],
                    ['label' => 'Organisasi', 'nilai' => \App\Models\Organisasi::count(), 'ikon' => 'fa-sitemap', 'warna' => 'purple'],
                    ['label' => 'Berita', 'nilai' => \App\Models\Berita::count(), 'ikon' => 'fa-newspaper', 'warna' => 'cyan'],
                    ['label' => 'Mata Pelajaran', 'nilai' => \App\Models\MataPelajaran::count(), 'ikon' => 'fa-atom', 'warna' => 'pink'],
                    ['label' => 'Kurikulum', 'nilai' => \App\Models\Kurikulum::count(), 'ikon' => 'fa-book-reader', 'warna' => 'indigo'],
                    ['label' => 'Silabus', 'nilai' => \App\Models\Silabus::count(), 'ikon' => 'fa-list-alt', 'warna' => 'teal'],
                    ['label' => 'Nilai Tercatat', 'nilai' => \App\Models\Nilai::count(), 'ikon' => 'fa-star', 'warna' => 'yellow'],
                    ['label' => 'Kehadiran', 'nilai' => \App\Models\Kehadiran::count(), 'ikon' => 'fa-calendar-check', 'warna' => 'emerald'],
                    ['label' => 'Kerja Sama', 'nilai' => \App\Models\KerjaSama::count(), 'ikon' => 'fa-handshake', 'warna' => 'rose'],
                ];
            @endphp
            @foreach($detailStats as $i => $ds)
                <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-5 text-center hover:border-{{ $ds['warna'] }}-500/30 transition hover:-translate-y-1" data-aos="zoom-in" data-aos-delay="{{ $i * 50 }}">
                    <i class="fas {{ $ds['ikon'] }} text-{{ $ds['warna'] }}-400 text-2xl mb-2"></i>
                    <div class="text-2xl font-black text-white">{{ number_format($ds['nilai']) }}</div>
                    <div class="text-gray-500 text-xs mt-1">{{ $ds['label'] }}</div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Chart Placeholders --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Visualisasi <span class="teks-gradien">Data</span></h2>
        <p class="text-gray-400">Grafik pertumbuhan platform dalam angka</p>
    </div>
    <div class="grid md:grid-cols-2 gap-8">
        {{-- Chart 1: Pengguna per Peran --}}
        <div class="kaca rounded-2xl p-6 border-kvt-500/20" data-aos="fade-up">
            <h3 class="text-white font-bold mb-4"><i class="fas fa-chart-pie text-kvt-400 mr-2"></i>Distribusi Pengguna per Peran</h3>
            <canvas id="chartPeran" height="260"></canvas>
        </div>
        {{-- Chart 2: Materi per Status --}}
        <div class="kaca rounded-2xl p-6 border-kvt-500/20" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-white font-bold mb-4"><i class="fas fa-chart-bar text-green-400 mr-2"></i>Status Materi</h3>
            <canvas id="chartMateri" height="260"></canvas>
        </div>
    </div>
</section>

{{-- Platform Milestones --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-5xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-black text-white mb-3">Pencapaian <span class="teks-gradien">Platform</span></h2>
        </div>
        <div class="relative">
            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-kvt-700/30 hidden md:block"></div>
            @php
                $milestones = [
                    ['tahun' => '2025 Q1', 'judul' => 'Platform Diluncurkan', 'desc' => 'KVT Hub v1.0 dirilis dengan fitur kelas dasar dan sistem pengguna', 'ikon' => 'fa-rocket', 'warna' => 'kvt'],
                    ['tahun' => '2025 Q2', 'judul' => 'Gamifikasi Aktif', 'desc' => 'Sistem XP, level, dan achievement diimplementasikan penuh', 'ikon' => 'fa-gamepad', 'warna' => 'purple'],
                    ['tahun' => '2025 Q3', 'judul' => '1000+ Pengguna', 'desc' => 'Pencapaian seribu pengguna terdaftar dari berbagai jenjang', 'ikon' => 'fa-users', 'warna' => 'green'],
                    ['tahun' => '2025 Q4', 'judul' => 'AI VTuber Kuro', 'desc' => 'Kuro diluncurkan sebagai maskot dan asisten AI platform', 'ikon' => 'fa-robot', 'warna' => 'amber'],
                    ['tahun' => '2026 Q1', 'judul' => 'v8.0 Release', 'desc' => '40+ menu, 4 header, panel pengaturan lengkap, LED panel, musik streaming', 'ikon' => 'fa-star', 'warna' => 'pink'],
                ];
            @endphp
            @foreach($milestones as $i => $m)
                <div class="relative flex items-center gap-8 mb-8 {{ $i % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse' }}" data-aos="{{ $i % 2 === 0 ? 'fade-right' : 'fade-left' }}">
                    <div class="flex-1 {{ $i % 2 === 0 ? 'md:text-right' : 'md:text-left' }}">
                        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 hover:border-{{ $m['warna'] }}-500/30 transition">
                            <span class="text-{{ $m['warna'] }}-400 text-xs font-bold">{{ $m['tahun'] }}</span>
                            <h3 class="text-white font-bold text-lg mt-1">{{ $m['judul'] }}</h3>
                            <p class="text-gray-500 text-sm mt-1">{{ $m['desc'] }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex w-12 h-12 bg-{{ $m['warna'] }}-500/10 border-2 border-{{ $m['warna'] }}-500/30 rounded-full items-center justify-center shrink-0 z-10">
                        <i class="fas {{ $m['ikon'] }} text-{{ $m['warna'] }}-400 text-sm"></i>
                    </div>
                    <div class="flex-1 hidden md:block"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Highlights --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="grid md:grid-cols-3 gap-6">
        <div class="kaca rounded-2xl p-8 border-green-500/20 text-center" data-aos="fade-up">
            <div class="w-16 h-16 bg-green-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check-double text-green-400 text-2xl"></i>
            </div>
            <div class="text-3xl font-black text-white mb-1">99.9%</div>
            <div class="text-green-400 font-semibold text-sm mb-2">Uptime</div>
            <p class="text-gray-500 text-xs">Platform selalu aktif dan dapat diakses kapan saja</p>
        </div>
        <div class="kaca rounded-2xl p-8 border-kvt-500/20 text-center" data-aos="fade-up" data-aos-delay="100">
            <div class="w-16 h-16 bg-kvt-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-bolt text-kvt-400 text-2xl"></i>
            </div>
            <div class="text-3xl font-black text-white mb-1">&lt;1s</div>
            <div class="text-kvt-400 font-semibold text-sm mb-2">Load Time</div>
            <p class="text-gray-500 text-xs">Halaman dimuat dalam waktu kurang dari 1 detik</p>
        </div>
        <div class="kaca rounded-2xl p-8 border-amber-500/20 text-center" data-aos="fade-up" data-aos-delay="200">
            <div class="w-16 h-16 bg-amber-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-shield-alt text-amber-400 text-2xl"></i>
            </div>
            <div class="text-3xl font-black text-white mb-1">AES-256</div>
            <div class="text-amber-400 font-semibold text-sm mb-2">Enkripsi</div>
            <p class="text-gray-500 text-xs">Data dilindungi dengan standar keamanan tertinggi</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="kaca rounded-2xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
        <i class="fas fa-chart-bar text-5xl text-kvt-400 mb-4"></i>
        <h2 class="text-3xl font-bold text-white mb-3">Dashboard Analytics Lengkap</h2>
        <p class="text-gray-400 max-w-lg mx-auto mb-6">Login untuk mengakses analytics personal, grafik perkembangan belajar, dan leaderboard real-time.</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('masuk') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-3 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg">
                <i class="fas fa-sign-in-alt mr-2"></i>Login untuk Detail
            </a>
            <a href="{{ route('beranda') }}" class="border border-kvt-600/50 text-kvt-300 px-8 py-3 rounded-xl font-semibold hover:bg-kvt-800/50 transition">
                <i class="fas fa-home mr-2"></i>Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

@push('skrip')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart Distribusi Pengguna
    const ctxPeran = document.getElementById('chartPeran');
    if (ctxPeran) {
        new Chart(ctxPeran, {
            type: 'doughnut',
            data: {
                labels: ['Siswa', 'Pengajar', 'Staff', 'Admin'],
                datasets: [{
                    data: [
                        {{ \App\Models\User::where('peran', 'siswa')->count() }},
                        {{ \App\Models\User::where('peran', 'pengajar')->count() }},
                        {{ \App\Models\User::where('peran', 'staff')->count() }},
                        {{ \App\Models\User::where('peran', 'admin')->count() }},
                    ],
                    backgroundColor: ['#3399ff', '#8b5cf6', '#22c55e', '#f59e0b'],
                    borderWidth: 0,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#9ca3af', padding: 16, usePointStyle: true } }
                },
                cutout: '65%'
            }
        });
    }

    // Chart Status Materi
    const ctxMateri = document.getElementById('chartMateri');
    if (ctxMateri) {
        new Chart(ctxMateri, {
            type: 'bar',
            data: {
                labels: ['Terbit', 'Draft', 'Arsip'],
                datasets: [{
                    label: 'Jumlah Materi',
                    data: [
                        {{ \App\Models\Materi::where('status', 'terbit')->count() }},
                        {{ \App\Models\Materi::where('status', 'draft')->count() }},
                        {{ \App\Models\Materi::where('status', 'arsip')->count() }},
                    ],
                    backgroundColor: ['#22c55e', '#f59e0b', '#6b7280'],
                    borderRadius: 8,
                    barPercentage: 0.6,
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { display: false } },
                scales: {
                    x: { ticks: { color: '#9ca3af' }, grid: { display: false } },
                    y: { ticks: { color: '#9ca3af' }, grid: { color: 'rgba(75,85,99,0.2)' }, beginAtZero: true }
                }
            }
        });
    }
});
</script>
@endpush
@endsection
