@extends('tata-letak.utama')
@section('judul', 'Admin Dashboard - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
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
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-clock mr-2 text-kvt-400"></i>Pengguna Terbaru</h2>
                <div class="space-y-3">
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
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
