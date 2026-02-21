@extends('tata-letak.utama')
@section('judul', 'Edukasi Gratis - KVT Hub')

@section('konten')
{{-- Hero Section --}}
<section class="relative min-h-[60vh] flex items-center justify-center overflow-hidden pt-32 pb-16">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-20 left-10 w-72 h-72 bg-green-500 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-20 right-10 w-96 h-96 bg-kvt-500 rounded-full blur-[150px]"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-purple-500 rounded-full blur-[100px] -translate-x-1/2"></div>
    </div>

    <div class="relative max-w-5xl mx-auto px-4 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-semibold mb-6">
            <i class="fas fa-gift"></i> 100% GRATIS — Tidak Perlu Bayar
        </div>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
            Edukasi <span class="teks-gradien">Gratis</span> untuk Semua
        </h1>
        <p class="text-lg md:text-xl text-gray-400 max-w-3xl mx-auto mb-8 leading-relaxed">
            Kumpulan program edukasi, tools, dan layanan premium yang bisa kamu dapatkan <strong class="text-white">secara gratis</strong>.
            Dari GitHub Pro hingga Figma Education — semua ada di sini.
        </p>
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <div class="flex items-center gap-2 px-4 py-2 bg-kvt-800/50 rounded-xl border border-kvt-700/30">
                <i class="fas fa-graduation-cap text-green-400"></i>
                <span class="text-sm text-gray-300"><strong class="text-white">{{ $totalEdukasi }}</strong> Program</span>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-kvt-800/50 rounded-xl border border-kvt-700/30">
                <i class="fas fa-check-circle text-kvt-400"></i>
                <span class="text-sm text-gray-300">Verified & Real</span>
            </div>
            <div class="flex items-center gap-2 px-4 py-2 bg-kvt-800/50 rounded-xl border border-kvt-700/30">
                <i class="fas fa-sync-alt text-amber-400"></i>
                <span class="text-sm text-gray-300">Update Real-time</span>
            </div>
        </div>

        {{-- Search bar --}}
        <form method="GET" class="max-w-xl mx-auto">
            <div class="flex items-center bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
                <div class="pl-4"><i class="fas fa-search text-gray-500"></i></div>
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari program edukasi gratis..." class="flex-1 bg-transparent px-4 py-3.5 text-white text-sm placeholder-gray-500 focus:outline-none">
                <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-6 py-3.5 text-white text-sm font-semibold transition">Cari</button>
            </div>
        </form>
    </div>
</section>

{{-- Unggulan Section --}}
@if($unggulan->count() > 0)
<section class="py-16 bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-2xl md:text-3xl font-black text-white mb-3"><i class="fas fa-star text-amber-400 mr-2"></i>Program Unggulan</h2>
            <p class="text-gray-400">Rekomendasi program edukasi gratis yang paling dicari</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($unggulan as $item)
            <a href="{{ route('edukasi-gratis.tampilkan', $item) }}" class="group bg-gradient-to-br from-kvt-900 to-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-{{ $item->warna ?? 'kvt' }}-500/30 transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-{{ $item->warna ?? 'kvt' }}-500/5" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="flex items-start gap-4 mb-4">
                    <div class="w-14 h-14 bg-{{ $item->warna ?? 'kvt' }}-500/10 rounded-2xl flex items-center justify-center shrink-0 group-hover:bg-{{ $item->warna ?? 'kvt' }}-500/20 transition">
                        <i class="{{ $item->ikon ?? 'fas fa-graduation-cap' }} text-{{ $item->warna ?? 'kvt' }}-400 text-xl"></i>
                    </div>
                    <div>
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-xs px-2 py-0.5 bg-amber-500/10 text-amber-400 rounded-full font-semibold"><i class="fas fa-star text-[8px] mr-1"></i>Unggulan</span>
                        </div>
                        <h3 class="text-lg font-bold text-white group-hover:text-{{ $item->warna ?? 'kvt' }}-400 transition">{{ $item->judul }}</h3>
                    </div>
                </div>
                <p class="text-sm text-gray-400 line-clamp-2 mb-4">{{ $item->deskripsi }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500"><i class="fas fa-tag mr-1"></i>{{ $item->platform }}</span>
                    <span class="text-xs text-{{ $item->warna ?? 'kvt' }}-400 font-semibold group-hover:translate-x-1 transition-transform">Pelajari <i class="fas fa-arrow-right ml-1"></i></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- Filter & All Programs --}}
<section class="py-16 bg-kvt-950/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-8" data-aos="fade-up">
            <h2 class="text-2xl md:text-3xl font-black text-white mb-3">Semua Program Edukasi Gratis</h2>
            <p class="text-gray-400">Temukan program yang cocok untuk kebutuhanmu</p>
        </div>

        {{-- Category Filter --}}
        <div class="flex flex-wrap justify-center gap-2 mb-10" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('edukasi-gratis.index') }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ !request('kategori') ? 'bg-kvt-500 text-white' : 'bg-kvt-800/50 text-gray-400 hover:text-white border border-kvt-700/30 hover:border-kvt-500/30' }}">
                <i class="fas fa-th-large mr-1"></i> Semua
            </a>
            @foreach($kategoriList as $k => $label)
            <a href="{{ route('edukasi-gratis.index', ['kategori' => $k]) }}" class="px-4 py-2 rounded-xl text-sm font-semibold transition {{ request('kategori')==$k ? 'bg-kvt-500 text-white' : 'bg-kvt-800/50 text-gray-400 hover:text-white border border-kvt-700/30 hover:border-kvt-500/30' }}">
                {{ $label }}
            </a>
            @endforeach
        </div>

        {{-- Programs Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
            @forelse($edukasi as $item)
            <a href="{{ route('edukasi-gratis.tampilkan', $item) }}" class="group bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-5 hover:border-{{ $item->warna ?? 'kvt' }}-500/30 transition-all duration-300 hover:-translate-y-1" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4) * 50 }}">
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-11 h-11 bg-{{ $item->warna ?? 'kvt' }}-500/10 rounded-xl flex items-center justify-center shrink-0">
                        <i class="{{ $item->ikon ?? 'fas fa-graduation-cap' }} text-{{ $item->warna ?? 'kvt' }}-400"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="text-sm font-bold text-white group-hover:text-{{ $item->warna ?? 'kvt' }}-400 transition truncate">{{ $item->judul }}</h3>
                        <p class="text-[11px] text-gray-500">{{ $item->platform }}</p>
                    </div>
                </div>
                <p class="text-xs text-gray-400 line-clamp-2 mb-3">{{ $item->deskripsi }}</p>
                <div class="flex items-center justify-between">
                    <span class="text-[10px] px-2 py-0.5 bg-{{ $item->warna ?? 'kvt' }}-500/10 text-{{ $item->warna ?? 'kvt' }}-400 rounded-full font-semibold">{{ $kategoriList[$item->kategori] ?? $item->kategori }}</span>
                    <div class="flex items-center gap-2 text-[10px] text-gray-500">
                        @if($item->unggulan)<i class="fas fa-star text-amber-400"></i>@endif
                        <span><i class="fas fa-eye mr-0.5"></i>{{ number_format($item->dilihat) }}</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-full text-center py-16">
                <i class="fas fa-search text-4xl text-gray-600 mb-4 block"></i>
                <p class="text-gray-400">Tidak ada program edukasi ditemukan.</p>
                <a href="{{ route('edukasi-gratis.index') }}" class="text-kvt-400 hover:text-kvt-300 text-sm mt-2 inline-block">Reset filter</a>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        @if($edukasi->hasPages())
        <div class="mt-10 flex justify-center">
            {{ $edukasi->links() }}
        </div>
        @endif
    </div>
</section>

{{-- CTA Section --}}
<section class="py-16 bg-kvt-950">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <div class="bg-gradient-to-br from-green-500/5 to-kvt-500/5 border border-green-500/10 rounded-3xl p-10">
            <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-kvt-500 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg shadow-green-500/20">
                <i class="fas fa-hand-holding-heart text-2xl text-white"></i>
            </div>
            <h2 class="text-2xl md:text-3xl font-black text-white mb-4">Tahu Program Edukasi Gratis Lainnya?</h2>
            <p class="text-gray-400 mb-6 max-w-xl mx-auto">Bantu kami menambahkan program edukasi gratis yang belum terdaftar. Hubungi admin atau kirim saran melalui form di bawah halaman.</p>
            <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-500 text-white rounded-xl font-semibold transition">
                <i class="fas fa-plus-circle"></i> Sarankan Program
            </a>
        </div>
    </div>
</section>
@endsection
