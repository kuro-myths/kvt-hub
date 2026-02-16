@extends('tata-letak.dasbor')

@section('judul', 'Dasbor Staff - KVT Hub')
@section('judul-halaman', 'Dasbor Staff')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-8" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-orange-400 to-orange-600 flex items-center justify-center text-3xl font-black text-white shadow-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 flex-wrap">
                        <h1 class="text-2xl font-black text-white">{{ $user->name }}</h1>
                        <span class="bg-orange-500/20 text-orange-400 text-xs px-3 py-1 rounded-full font-semibold">Staff</span>
                        @if($user->level)
                        <span class="bg-amber-500/20 text-amber-400 text-xs px-3 py-1 rounded-full font-semibold">Lv.{{ $user->level }}</span>
                        @endif
                    </div>
                    <p class="text-gray-400 text-sm mt-1">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            @php
                $kartuStat = [
                    ['label' => 'Total Siswa', 'nilai' => $statistik['total_pengguna'], 'ikon' => 'fa-users', 'warna' => 'from-kvt-400 to-kvt-600'],
                    ['label' => 'Total Pengajar', 'nilai' => $statistik['total_pengajar'], 'ikon' => 'fa-chalkboard-teacher', 'warna' => 'from-green-400 to-green-600'],
                    ['label' => 'Total Kelas', 'nilai' => $statistik['total_kelas'], 'ikon' => 'fa-school', 'warna' => 'from-purple-400 to-purple-600'],
                    ['label' => 'Materi Terbit', 'nilai' => $statistik['total_materi'], 'ikon' => 'fa-book', 'warna' => 'from-orange-400 to-orange-600'],
                ];
            @endphp

            @foreach($kartuStat as $i => $stat)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-5" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="w-10 h-10 bg-gradient-to-br {{ $stat['warna'] }} rounded-lg flex items-center justify-center mb-3">
                        <i class="fas {{ $stat['ikon'] }} text-white"></i>
                    </div>
                    <div class="text-3xl font-black text-white">{{ $stat['nilai'] }}</div>
                    <div class="text-gray-500 text-sm">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Pengguna Terbaru --}}
            <div class="lg:col-span-2 bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-users text-orange-400 mr-2"></i>Siswa Terbaru</h2>
                <div class="space-y-3">
                    @forelse($penggunaTerbaru as $pg)
                        <a href="{{ route('staff.pengguna.tampilkan', $pg) }}" class="flex items-center gap-4 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-800/50 transition">
                            <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-white font-bold text-sm">
                                {{ strtoupper(substr($pg->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-semibold text-sm">{{ $pg->name }}</p>
                                <p class="text-gray-500 text-xs">{{ $pg->email }}</p>
                            </div>
                            <span class="text-gray-600 text-xs">{{ $pg->created_at->diffForHumans() }}</span>
                        </a>
                    @empty
                        <div class="text-center py-8">
                            <i class="fas fa-users text-4xl text-gray-700 mb-3"></i>
                            <p class="text-gray-500">Belum ada siswa terdaftar.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-bolt text-yellow-400 mr-2"></i>Menu Cepat</h2>
                <div class="space-y-2">
                    <a href="{{ route('staff.pengguna.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-users-cog text-blue-400 w-5"></i> Kelola Data Siswa
                    </a>
                    <a href="{{ route('staff.kehadiran.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-calendar-check text-green-400 w-5"></i> Kelola Kehadiran
                    </a>
                    <a href="{{ route('staff.kehadiran.rekap') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-clipboard-list text-indigo-400 w-5"></i> Rekap Kehadiran
                    </a>
                    <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-chart-bar text-amber-400 w-5"></i> Laporan & Diagram
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
