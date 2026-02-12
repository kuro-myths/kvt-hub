@extends('tata-letak.utama')

@section('judul', 'Dasbor Guru - KVT Hub')

@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 mb-8" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-3xl font-black text-white shadow-lg">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 flex-wrap">
                        <h1 class="text-2xl font-black text-white">{{ $user->name }}</h1>
                        <span class="bg-green-500/20 text-green-400 text-xs px-3 py-1 rounded-full font-semibold">Guru</span>
                    </div>
                    <p class="text-gray-400 text-sm mt-1">{{ $user->email }}</p>
                </div>
                <a href="{{ route('kelas.buat') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-kvt-400 hover:to-kvt-500 transition shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Buat Kelas Baru
                </a>
            </div>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            @php
                $kartuStat = [
                    ['label' => 'Total Kelas', 'nilai' => $statistik['total_kelas'], 'ikon' => 'fa-school', 'warna' => 'from-kvt-400 to-kvt-600'],
                    ['label' => 'Total Siswa', 'nilai' => $statistik['total_siswa'], 'ikon' => 'fa-users', 'warna' => 'from-green-400 to-green-600'],
                    ['label' => 'Total Materi', 'nilai' => $statistik['total_materi'], 'ikon' => 'fa-book', 'warna' => 'from-purple-400 to-purple-600'],
                    ['label' => 'Materi Terbit', 'nilai' => $statistik['materi_terbit'], 'ikon' => 'fa-check-circle', 'warna' => 'from-yellow-400 to-amber-500'],
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

        {{-- Kelas yang Diajar --}}
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6" data-aos="fade-up">
            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-chalkboard text-green-400 mr-2"></i>Kelas yang Diajar</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($kelasAktif as $kls)
                    <a href="{{ route('kelas.tampilkan', $kls) }}" class="block bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl p-5 transition border border-kvt-700/20 hover:border-kvt-500/30">
                        <h3 class="text-white font-bold mb-2">{{ $kls->nama }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-kvt-400 text-sm"><i class="fas fa-users mr-1"></i>{{ $kls->anggota_count }} siswa</span>
                            <span class="bg-kvt-500/20 text-kvt-400 text-xs px-2 py-1 rounded">{{ $kls->kode_kelas }}</span>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 text-center py-12">
                        <i class="fas fa-chalkboard-teacher text-5xl text-gray-700 mb-4"></i>
                        <p class="text-gray-500 mb-4">Belum ada kelas yang dibuat.</p>
                        <a href="{{ route('kelas.buat') }}" class="bg-kvt-500 hover:bg-kvt-600 text-white px-6 py-2 rounded-lg transition">Buat Kelas Pertama</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection
