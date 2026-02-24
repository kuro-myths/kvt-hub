@extends('tata-letak.dasbor')
@section('judul', 'Admin Dashboard - KVT Hub')
@section('judul-halaman', 'Panel Admin')
@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center gap-4 mb-8" data-aos="fade-right">
            <div class="w-14 h-14 bg-gradient-to-br from-red-400 to-red-600 rounded-2xl flex items-center justify-center">
                <i class="fas fa-shield-alt text-2xl text-white"></i>
            </div>
            <div>
                <h1 class="text-3xl font-black text-white">Panel Admin</h1>
                <p class="text-gray-400">Kelola semua data KVT Hub</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-6" data-aos="fade-up" data-aos-delay="0">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-blue-400 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-white">{{ $totalPengguna }}</p>
                        <p class="text-xs text-gray-500">Total Pengguna</p>
                    </div>
                </div>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-chalkboard text-green-400 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-white">{{ $totalKelas }}</p>
                        <p class="text-xs text-gray-500">Total Kelas</p>
                    </div>
                </div>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-6" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-book text-purple-400 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-white">{{ $totalMateri }}</p>
                        <p class="text-xs text-gray-500">Total Materi</p>
                    </div>
                </div>
            </div>
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-6" data-aos="fade-up" data-aos-delay="300">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-key text-yellow-400 text-xl"></i>
                    </div>
                    <div>
                        <p class="text-2xl font-black text-white">{{ $totalKunci }}</p>
                        <p class="text-xs text-gray-500">Kunci Aktif</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- CHART: Pengguna per Bulan --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-white"><i class="fas fa-chart-line mr-2 text-kvt-400"></i>Pertumbuhan Pengguna</h2>
                    <span class="text-[10px] text-gray-500 bg-kvt-800/50 px-2 py-1 rounded-lg">6 Bulan Terakhir</span>
                </div>
                <div style="height: 280px;">
                    <canvas id="chartPenggunaBulan"></canvas>
                </div>
            </div>

            {{-- CHART: Distribusi Peran --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-bold text-white"><i class="fas fa-chart-pie mr-2 text-purple-400"></i>Distribusi Peran</h2>
                    <span class="text-[10px] text-gray-500 bg-kvt-800/50 px-2 py-1 rounded-lg">Semua Pengguna</span>
                </div>
                <div style="height: 280px;">
                    <canvas id="chartDistribusiPeran"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-clock mr-2 text-kvt-400"></i>Pengguna Terbaru</h2>
                <div class="space-y-3 max-h-[400px] overflow-y-auto">
                    @forelse($penggunaTerbaru as $user)
                        <div class="flex items-center gap-3 bg-kvt-800/30 p-3 rounded-xl">
                            <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-white text-sm font-medium truncate">{{ $user->name }}</p>
                                <p class="text-gray-500 text-xs">{{ $user->email }} • {{ ucfirst($user->peran) }}</p>
                            </div>
                            <span class="text-xs text-gray-600">Lv.{{ $user->level }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-sm">Belum ada pengguna terdaftar.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-link mr-2 text-kvt-400"></i>Aksi Cepat</h2>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('admin.pengguna') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 p-4 rounded-xl text-center transition border border-transparent hover:border-kvt-500/30">
                        <i class="fas fa-users-cog text-kvt-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">Kelola Pengguna</p>
                    </a>
                    <a href="{{ route('admin.kunci') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 p-4 rounded-xl text-center transition border border-transparent hover:border-kvt-500/30">
                        <i class="fas fa-key text-yellow-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">Kunci Admin</p>
                    </a>
                    <a href="{{ route('admin.paket') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 p-4 rounded-xl text-center transition border border-transparent hover:border-kvt-500/30">
                        <i class="fas fa-gem text-purple-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">Paket Eksklusif</p>
                    </a>
                    <a href="{{ route('laporan.index') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 p-4 rounded-xl text-center transition border border-transparent hover:border-kvt-500/30">
                        <i class="fas fa-chart-bar text-green-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">Laporan</p>
                    </a>
                    <a href="{{ route('admin.ekspor.pengguna') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 p-4 rounded-xl text-center transition border border-transparent hover:border-green-500/30 col-span-2">
                        <i class="fas fa-file-excel text-green-400 text-2xl mb-2"></i>
                        <p class="text-white text-sm font-medium">Ekspor Data Pengguna (CSV/Excel)</p>
                        <p class="text-gray-500 text-[10px] mt-1">Download data lengkap ke spreadsheet</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Chart 1: Pengguna per Bulan (Bar + Line)
    const ctxBulan = document.getElementById('chartPenggunaBulan');
    if (ctxBulan) {
        new Chart(ctxBulan.getContext('2d'), {
            type: 'bar',
            data: {
                labels: {!! json_encode(collect($penggunaPerBulan)->pluck('label')) !!},
                datasets: [{
                    label: 'Pengguna Baru',
                    data: {!! json_encode(collect($penggunaPerBulan)->pluck('jumlah')) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.5)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    borderRadius: 8,
                    barPercentage: 0.6,
                }, {
                    label: 'Tren',
                    data: {!! json_encode(collect($penggunaPerBulan)->pluck('jumlah')) !!},
                    type: 'line',
                    borderColor: 'rgba(168, 85, 247, 1)',
                    backgroundColor: 'rgba(168, 85, 247, 0.1)',
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: 'rgba(168, 85, 247, 1)',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { labels: { color: '#94a3b8', font: { size: 11 } } },
                    tooltip: { backgroundColor: '#1e293b', titleColor: '#e2e8f0', bodyColor: '#e2e8f0', borderColor: '#334155', borderWidth: 1 }
                },
                scales: {
                    x: { ticks: { color: '#64748b', font: { size: 10 } }, grid: { color: 'rgba(51,65,85,0.3)' } },
                    y: { ticks: { color: '#64748b', font: { size: 10 } }, grid: { color: 'rgba(51,65,85,0.3)' }, beginAtZero: true }
                }
            }
        });
    }

    // Chart 2: Distribusi Peran (Doughnut)
    const ctxPeran = document.getElementById('chartDistribusiPeran');
    if (ctxPeran) {
        const peranData = @json($distribusiPeran);
        const peranLabels = Object.keys(peranData).map(k => k ? k.charAt(0).toUpperCase() + k.slice(1) : 'Pengguna');
        const peranValues = Object.values(peranData);
        const peranColors = ['#3b82f6', '#f59e0b', '#10b981', '#ef4444', '#8b5cf6', '#ec4899', '#06b6d4'];

        new Chart(ctxPeran.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: peranLabels,
                datasets: [{
                    data: peranValues,
                    backgroundColor: peranColors.slice(0, peranLabels.length),
                    borderColor: '#0f172a',
                    borderWidth: 3,
                    hoverOffset: 10,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { color: '#94a3b8', font: { size: 11 }, padding: 15, usePointStyle: true } },
                    tooltip: { backgroundColor: '#1e293b', titleColor: '#e2e8f0', bodyColor: '#e2e8f0', borderColor: '#334155', borderWidth: 1 }
                },
                cutout: '60%',
            }
        });
    }
});
</script>
@endpush
@endsection
