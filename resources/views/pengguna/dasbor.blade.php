@extends('tata-letak.utama')
@section('judul', 'Dasbor Pengguna - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        {{-- Welcome Header --}}
        <div class="kaca rounded-2xl p-6 mb-8 border border-kvt-700/20">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center text-2xl font-bold text-white shadow-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white">Selamat datang, {{ $user->name }}! 👋</h1>
                    <p class="text-gray-400 text-sm mt-1">
                        <span class="text-kvt-400 font-semibold">{{ $user->getRangString() }}</span> •
                        Level {{ $user->level }} •
                        {{ $user->xp_total }} XP Total
                    </p>
                </div>
                <div class="ml-auto hidden md:flex gap-3">
                    <a href="{{ route('pengguna.krs.index') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg">
                        <i class="fas fa-book-open mr-2"></i>KRS Saya
                    </a>
                    <a href="{{ route('pengguna.khs') }}" class="bg-kvt-800/50 text-gray-300 px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">
                        <i class="fas fa-chart-bar mr-2"></i>KHS & Transkrip
                    </a>
                </div>
            </div>

            {{-- XP Progress Bar --}}
            <div class="mt-4">
                <div class="flex justify-between text-xs text-gray-500 mb-1">
                    <span>Level {{ $user->level }}</span>
                    <span>{{ round($user->persenLevel()) }}% ke Level {{ $user->level + 1 }}</span>
                </div>
                <div class="w-full h-2 bg-kvt-800 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-kvt-400 to-ungu-400 rounded-full transition-all duration-500" style="width:{{ $user->persenLevel() }}%"></div>
                </div>
            </div>
        </div>

        {{-- Quick Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="kaca rounded-xl p-4 text-center border border-kvt-700/20 card-hover">
                <div class="text-3xl font-bold teks-gradien">{{ $statistik['total_kelas'] }}</div>
                <div class="text-xs text-gray-500 mt-1">Kelas Diikuti</div>
            </div>
            <div class="kaca rounded-xl p-4 text-center border border-kvt-700/20 card-hover">
                <div class="text-3xl font-bold text-green-400">{{ $statistik['materi_selesai'] }}</div>
                <div class="text-xs text-gray-500 mt-1">Materi Selesai</div>
            </div>
            <div class="kaca rounded-xl p-4 text-center border border-kvt-700/20 card-hover">
                <div class="text-3xl font-bold text-yellow-400">{{ $statistik['kuis_selesai'] }}</div>
                <div class="text-xs text-gray-500 mt-1">Kuis Dikerjakan</div>
            </div>
            <div class="kaca rounded-xl p-4 text-center border border-kvt-700/20 card-hover">
                <div class="text-3xl font-bold text-purple-400">{{ $statistik['hadir_bulan_ini'] }}</div>
                <div class="text-xs text-gray-500 mt-1">Kehadiran Bulan Ini</div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Kelas Saya --}}
            <div class="lg:col-span-2 kaca rounded-2xl p-6 border border-kvt-700/20">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-chalkboard text-kvt-400 mr-2"></i>Kelas Saya</h2>
                @forelse($kelasAktif as $kelas)
                <div class="bg-kvt-800/30 rounded-xl p-4 mb-3 border border-kvt-700/15 hover:border-kvt-500/30 transition">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="font-semibold text-white text-sm">{{ $kelas->nama }}</h3>
                            <p class="text-xs text-gray-500 mt-1">Pengajar: {{ $kelas->guru->name ?? 'Tim' }}</p>
                        </div>
                        <a href="{{ route('kelas.tampilkan', $kelas) }}" class="text-kvt-400 text-xs hover:underline">Buka →</a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-sm text-center py-6">Belum mengikuti kelas. <a href="{{ route('kelas.index') }}" class="text-kvt-400 hover:underline">Jelajahi kelas</a></p>
                @endforelse
            </div>

            {{-- Quick Actions --}}
            <div class="kaca rounded-2xl p-6 border border-kvt-700/20">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-bolt text-yellow-400 mr-2"></i>Aksi Cepat</h2>
                <div class="space-y-2">
                    <a href="{{ route('kelas.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-search text-kvt-400 w-5"></i> Cari Kelas Baru
                    </a>
                    <a href="{{ route('pengguna.krs.pilih-jenjang') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-graduation-cap text-green-400 w-5"></i> Pilih Jenjang Pendidikan
                    </a>
                    <a href="{{ route('pengguna.krs.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-book-open text-purple-400 w-5"></i> Kelola KRS
                    </a>
                    <a href="{{ route('pengguna.khs') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-chart-line text-yellow-400 w-5"></i> Lihat KHS & Transkrip
                    </a>
                    <a href="{{ route('laporan.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-chart-bar text-orange-400 w-5"></i> Laporan & Diagram
                    </a>
                    <a href="{{ route('berita.index') }}" class="flex items-center gap-3 p-3 rounded-xl bg-kvt-800/30 hover:bg-kvt-700/30 transition text-sm text-gray-300 hover:text-white">
                        <i class="fas fa-newspaper text-emerald-400 w-5"></i> Berita Terbaru
                    </a>
                </div>
            </div>
        </div>

        {{-- Recent Activity --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            {{-- Materi Terakhir --}}
            <div class="kaca rounded-2xl p-6 border border-kvt-700/20">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-book text-green-400 mr-2"></i>Materi Dalam Progres</h2>
                @forelse($materiTerakhir as $mp)
                <div class="flex items-center gap-3 bg-kvt-800/30 rounded-xl p-3 mb-2 border border-kvt-700/15">
                    <div class="w-10 h-10 rounded-lg bg-green-500/10 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-play text-green-400 text-xs"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ $mp->materi->judul ?? '-' }}</p>
                        <p class="text-xs text-gray-500">{{ $mp->materi->kelas->nama ?? '-' }} • {{ $mp->progres_persen ?? 0 }}%</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-sm text-center py-4">Belum ada materi dalam progres.</p>
                @endforelse
            </div>

            {{-- Kuis Terakhir --}}
            <div class="kaca rounded-2xl p-6 border border-kvt-700/20">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-question-circle text-yellow-400 mr-2"></i>Hasil Kuis Terbaru</h2>
                @forelse($kuisHasilTerakhir as $hasil)
                <div class="flex items-center gap-3 bg-kvt-800/30 rounded-xl p-3 mb-2 border border-kvt-700/15">
                    <div class="w-10 h-10 rounded-lg {{ $hasil->skor >= 70 ? 'bg-green-500/10' : 'bg-red-500/10' }} flex items-center justify-center flex-shrink-0">
                        <span class="text-sm font-bold {{ $hasil->skor >= 70 ? 'text-green-400' : 'text-red-400' }}">{{ $hasil->skor }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-medium text-white truncate">{{ $hasil->kuis->judul ?? '-' }}</p>
                        <p class="text-xs text-gray-500">{{ $hasil->jawaban_benar_count }}/{{ $hasil->total_pertanyaan }} benar • +{{ $hasil->xp_didapat }} XP</p>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-sm text-center py-4">Belum ada hasil kuis.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
