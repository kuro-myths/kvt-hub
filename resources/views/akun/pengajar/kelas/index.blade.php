@extends('tata-letak.dasbor')

@section('judul', 'Kelas Saya - KVT Hub')
@section('judul-halaman', 'Kelas Saya')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white">Kelas Saya</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola semua kelas yang Anda ampu</p>
            </div>
            <a href="{{ route('pengajar.kelas.buat') }}" class="bg-gradient-to-r from-kvt-500 to-kvt-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-kvt-400 hover:to-kvt-500 transition shadow-lg text-sm">
                <i class="fas fa-plus mr-2"></i>Buat Kelas
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($kelas as $kls)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-kvt-500/30 transition" data-aos="fade-up">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center text-white font-bold shadow-lg">
                            {{ strtoupper(substr($kls->nama, 0, 1)) }}
                        </div>
                        <span class="bg-{{ $kls->status === 'aktif' ? 'green' : 'gray' }}-500/20 text-{{ $kls->status === 'aktif' ? 'green' : 'gray' }}-400 text-xs px-3 py-1 rounded-full font-semibold">
                            {{ ucfirst($kls->status) }}
                        </span>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">{{ $kls->nama }}</h3>
                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">{{ $kls->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm"><i class="fas fa-users mr-1"></i>{{ $kls->anggota_count ?? 0 }} siswa</span>
                        <a href="{{ route('kelas.tampilkan', $kls) }}" class="text-kvt-400 hover:text-kvt-300 text-sm font-semibold">
                            Kelola <i class="fas fa-arrow-right ml-1"></i>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-chalkboard-teacher text-6xl text-gray-700 mb-4"></i>
                    <h3 class="text-white font-bold text-lg mb-2">Belum ada kelas</h3>
                    <p class="text-gray-500 mb-6">Mulai buat kelas pertama Anda untuk mengajar</p>
                    <a href="{{ route('pengajar.kelas.buat') }}" class="bg-kvt-500 hover:bg-kvt-600 text-white px-6 py-3 rounded-xl transition font-semibold">
                        <i class="fas fa-plus mr-2"></i>Buat Kelas Pertama
                    </a>
                </div>
            @endforelse
        </div>

        @if($kelas->hasPages())
            <div class="mt-8">{{ $kelas->links() }}</div>
        @endif
    </div>
</section>
@endsection
