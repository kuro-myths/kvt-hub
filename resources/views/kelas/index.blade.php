@extends('tata-letak.utama')
@section('judul', 'Jelajahi Kelas - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-3xl font-black text-white">Jelajahi Kelas</h1>
                <p class="text-gray-400 mt-1">Temukan kelas yang sesuai dengan minatmu</p>
            </div>
            @if(auth()->check() && (auth()->user()->adalahGuru() || auth()->user()->adalahAdmin()))
                <a href="{{ route('kelas.buat') }}" class="bg-kvt-500 hover:bg-kvt-600 text-white px-6 py-3 rounded-xl font-semibold transition shadow-lg">
                    <i class="fas fa-plus mr-2"></i>Buat Kelas
                </a>
            @endif
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($kelas as $i => $kls)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden hover:border-kvt-500/50 transition-all duration-500 hover:-translate-y-2 group" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 80 }}">
                    <div class="h-32 bg-gradient-to-br from-kvt-700 to-kvt-900 flex items-center justify-center relative overflow-hidden">
                        <i class="fas fa-graduation-cap text-5xl text-kvt-400/30 group-hover:text-kvt-400/50 transition"></i>
                        @if($kls->kategori)
                            <span class="absolute top-3 right-3 bg-kvt-500/80 text-white text-xs px-2 py-1 rounded-full">{{ $kls->kategori }}</span>
                        @endif
                    </div>
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-white mb-1">{{ $kls->nama }}</h3>
                        <p class="text-gray-500 text-sm mb-4">{{ Str::limit($kls->deskripsi, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-kvt-600 rounded-full flex items-center justify-center text-xs font-bold text-white">
                                    {{ strtoupper(substr($kls->guru->name ?? 'G', 0, 1)) }}
                                </div>
                                <span class="text-gray-400 text-xs">{{ $kls->guru->name ?? '-' }}</span>
                            </div>
                            <span class="text-kvt-400 text-xs"><i class="fas fa-users mr-1"></i>{{ $kls->anggota_count }}/{{ $kls->maks_siswa }}</span>
                        </div>
                        <a href="{{ route('kelas.tampilkan', $kls) }}" class="mt-4 block text-center bg-kvt-800/50 hover:bg-kvt-500 text-kvt-400 hover:text-white py-2 rounded-lg transition text-sm font-medium">
                            Lihat Kelas
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20">
                    <i class="fas fa-school text-6xl text-gray-700 mb-4"></i>
                    <p class="text-gray-500 text-lg">Belum ada kelas tersedia.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">{{ $kelas->links() }}</div>
    </div>
</section>
@endsection
