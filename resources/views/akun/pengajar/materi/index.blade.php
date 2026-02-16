@extends('tata-letak.dasbor')

@section('judul', 'Materi Saya - KVT Hub')
@section('judul-halaman', 'Materi Saya')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white">Materi Saya</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola semua materi pembelajaran</p>
            </div>
            <a href="{{ route('pengajar.materi.buat') }}" class="bg-gradient-to-r from-purple-500 to-purple-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-purple-400 hover:to-purple-500 transition shadow-lg text-sm">
                <i class="fas fa-plus mr-2"></i>Buat Materi
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($materi as $item)
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-purple-500/30 transition" data-aos="fade-up">
                    <div class="flex items-start justify-between mb-4">
                        <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center">
                            <i class="fas fa-book text-white text-sm"></i>
                        </div>
                        <span class="bg-{{ $item->status === 'terbit' ? 'green' : 'amber' }}-500/20 text-{{ $item->status === 'terbit' ? 'green' : 'amber' }}-400 text-xs px-3 py-1 rounded-full font-semibold">
                            {{ ucfirst($item->status) }}
                        </span>
                    </div>
                    <h3 class="text-white font-bold mb-2">{{ $item->judul }}</h3>
                    @if($item->kelas)
                        <p class="text-kvt-400 text-sm mb-3"><i class="fas fa-chalkboard mr-1"></i>{{ $item->kelas->nama }}</p>
                    @endif
                    <p class="text-gray-500 text-sm">{{ $item->created_at->diffForHumans() }}</p>
                </div>
            @empty
                <div class="col-span-full text-center py-16">
                    <i class="fas fa-book text-6xl text-gray-700 mb-4"></i>
                    <h3 class="text-white font-bold text-lg mb-2">Belum ada materi</h3>
                    <p class="text-gray-500 mb-6">Mulai buat materi pembelajaran untuk kelas Anda</p>
                    <a href="{{ route('pengajar.materi.buat') }}" class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-xl transition font-semibold">
                        <i class="fas fa-plus mr-2"></i>Buat Materi Pertama
                    </a>
                </div>
            @endforelse
        </div>

        @if($materi->hasPages())
            <div class="mt-8">{{ $materi->links() }}</div>
        @endif
    </div>
</section>
@endsection
