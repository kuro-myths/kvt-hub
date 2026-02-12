@extends('tata-letak.utama')

@section('judul', 'Dasbor Siswa - KVT Hub')

@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-7xl mx-auto">
        {{-- Header Profil --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-8" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-3xl font-black text-white shadow-lg shadow-kvt-500/30">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 flex-wrap">
                        <h1 class="text-2xl font-black text-white">{{ $user->name }}</h1>
                        <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">{{ ucfirst($user->peran) }}</span>
                        <span class="bg-yellow-500/20 text-yellow-400 text-xs px-3 py-1 rounded-full font-semibold">{{ $user->getRangString() }}</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-1">{{ $user->email }}</p>

                    {{-- XP Progress Bar --}}
                    <div class="mt-3 flex items-center gap-3">
                        <span class="text-kvt-400 font-bold text-sm">Lv.{{ $user->level }}</span>
                        <div class="flex-1 max-w-xs h-3 bg-kvt-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-kvt-500 to-kvt-300 rounded-full transition-all duration-1000" style="width: {{ $user->persenLevel() }}%"></div>
                        </div>
                        <span class="text-gray-500 text-sm">{{ $user->xp_total }} XP</span>
                        @if($user->level < 100)
                            <span class="text-gray-600 text-xs">({{ $user->xpUntukLevelBerikutnya() }} XP untuk level berikutnya)</span>
                        @else
                            <span class="text-yellow-400 text-xs font-bold">MAX LEVEL!</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            @php
                $kartuStat = [
                    ['label' => 'Kelas Aktif', 'nilai' => $statistik['total_kelas'], 'ikon' => 'fa-school', 'warna' => 'from-kvt-400 to-kvt-600'],
                    ['label' => 'Materi Selesai', 'nilai' => $statistik['materi_selesai'], 'ikon' => 'fa-book-open', 'warna' => 'from-green-400 to-green-600'],
                    ['label' => 'Kuis Selesai', 'nilai' => $statistik['kuis_selesai'], 'ikon' => 'fa-question-circle', 'warna' => 'from-purple-400 to-purple-600'],
                    ['label' => 'Hadir Bulan Ini', 'nilai' => $statistik['hadir_bulan_ini'], 'ikon' => 'fa-calendar-check', 'warna' => 'from-yellow-400 to-amber-500'],
                ];
            @endphp

            @foreach($kartuStat as $i => $stat)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-5 hover:border-kvt-500/30 transition" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                    <div class="w-10 h-10 bg-gradient-to-br {{ $stat['warna'] }} rounded-lg flex items-center justify-center mb-3">
                        <i class="fas {{ $stat['ikon'] }} text-white"></i>
                    </div>
                    <div class="text-3xl font-black text-white">{{ $stat['nilai'] }}</div>
                    <div class="text-gray-500 text-sm">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="grid lg:grid-cols-2 gap-8">
            {{-- Kelas Aktif --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-graduation-cap text-kvt-400 mr-2"></i>Kelas Aktif</h2>
                @forelse($kelasAktif as $kls)
                    <a href="{{ route('kelas.tampilkan', $kls) }}" class="block bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl p-4 mb-3 transition">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white font-semibold">{{ $kls->nama }}</h3>
                                <p class="text-gray-500 text-sm">Guru: {{ $kls->guru->name ?? '-' }}</p>
                            </div>
                            <i class="fas fa-chevron-right text-gray-600"></i>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-8">
                        <i class="fas fa-inbox text-4xl text-gray-700 mb-3"></i>
                        <p class="text-gray-500">Belum ada kelas aktif.</p>
                        <a href="{{ route('kelas.index') }}" class="text-kvt-400 text-sm hover:underline mt-2 inline-block">Jelajahi Kelas</a>
                    </div>
                @endforelse
            </div>

            {{-- Hasil Kuis Terakhir --}}
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-chart-bar text-green-400 mr-2"></i>Hasil Kuis Terakhir</h2>
                @forelse($kuisHasilTerakhir as $hasil)
                    <div class="bg-kvt-800/30 rounded-xl p-4 mb-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-white font-semibold text-sm">{{ $hasil->kuis->judul ?? 'Kuis' }}</h3>
                                <p class="text-gray-500 text-xs">{{ $hasil->created_at->diffForHumans() }}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-black {{ $hasil->skor >= 70 ? 'text-green-400' : 'text-red-400' }}">{{ $hasil->skor }}%</div>
                                <div class="text-xs text-gray-500">+{{ $hasil->xp_didapat }} XP</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8">
                        <i class="fas fa-clipboard-check text-4xl text-gray-700 mb-3"></i>
                        <p class="text-gray-500">Belum ada kuis yang dikerjakan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
