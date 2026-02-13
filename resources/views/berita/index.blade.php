@extends('tata-letak.utama')
@section('judul', 'Berita Terbaru - KVT Hub')

@section('konten')
<div class="min-h-screen">
    {{-- Hero --}}
    <section class="relative py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-kvt-900 via-kvt-950 to-kvt-900"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 20% 50%, rgba(51,153,255,0.3) 0%, transparent 50%), radial-gradient(circle at 80% 50%, rgba(139,92,246,0.3) 0%, transparent 50%)"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 bg-emerald-500/10 border border-emerald-500/20 rounded-full px-4 py-1.5 mb-4">
                <i class="fas fa-newspaper text-emerald-400 text-sm"></i>
                <span class="text-emerald-400 text-sm font-medium">Pusat Berita</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black mb-4">
                <span class="teks-gradien">Berita & Informasi</span>
            </h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Berita terkini seputar pendidikan, teknologi, riset, karir, dan ekosistem KVT Hub</p>
        </div>
    </section>

    {{-- Filter & Search --}}
    <section class="max-w-7xl mx-auto px-4 -mt-6 relative z-10">
        <div class="kaca-gelap rounded-2xl p-4 flex flex-wrap items-center gap-4">
            <form method="GET" action="{{ route('berita.index') }}" class="flex flex-wrap items-center gap-3 w-full">
                <div class="flex-1 min-w-[200px] relative">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-sm"></i>
                    <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari berita..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg pl-10 pr-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition">
                </div>
                <select name="kategori" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white outline-none focus:border-kvt-500 appearance-none cursor-pointer">
                    <option value="">Semua Kategori</option>
                    @foreach(App\Models\Berita::kategoriList() as $key => $label)
                        <option value="{{ $key }}" {{ request('kategori') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 text-white px-5 py-2.5 rounded-lg text-sm font-medium transition">
                    <i class="fas fa-filter mr-1"></i> Filter
                </button>
                @if(request('cari') || request('kategori'))
                    <a href="{{ route('berita.index') }}" class="text-sm text-gray-400 hover:text-white transition"><i class="fas fa-times mr-1"></i>Reset</a>
                @endif
            </form>
        </div>
    </section>

    {{-- Berita Grid --}}
    <section class="max-w-7xl mx-auto px-4 py-12">
        @if($berita->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($berita as $item)
                    <article class="kaca-gelap rounded-2xl overflow-hidden group hover:border-kvt-500/30 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <div class="relative h-48 bg-gradient-to-br from-kvt-800 to-kvt-900 overflow-hidden">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <i class="fas fa-newspaper text-4xl text-kvt-700"></i>
                                </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                <span class="bg-kvt-600/90 text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase">{{ $item->kategori }}</span>
                            </div>
                            @if($item->unggulan)
                                <div class="absolute top-3 right-3">
                                    <span class="bg-yellow-500/90 text-white text-[10px] font-bold px-2.5 py-1 rounded-full"><i class="fas fa-star mr-1"></i>Unggulan</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-5">
                            <div class="flex items-center gap-3 mb-3 text-xs text-gray-500">
                                <span><i class="far fa-calendar mr-1"></i>{{ $item->terbit_pada ? $item->terbit_pada->translatedFormat('d M Y') : '-' }}</span>
                                <span><i class="far fa-eye mr-1"></i>{{ number_format($item->dilihat) }}x</span>
                            </div>
                            <h3 class="text-lg font-bold text-white mb-2 line-clamp-2 group-hover:text-kvt-400 transition">
                                <a href="{{ route('berita.tampilkan', $item) }}">{{ $item->judul }}</a>
                            </h3>
                            <p class="text-sm text-gray-400 line-clamp-3 mb-4">{{ $item->ringkasan }}</p>
                            <a href="{{ route('berita.tampilkan', $item) }}" class="inline-flex items-center gap-2 text-sm text-kvt-400 hover:text-kvt-300 font-medium transition">
                                Baca selengkapnya <i class="fas fa-arrow-right text-xs"></i>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $berita->withQueryString()->links() }}
            </div>
        @else
            <div class="text-center py-20">
                <i class="fas fa-newspaper text-5xl text-gray-700 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-400 mb-2">Belum ada berita</h3>
                <p class="text-gray-500">Berita akan segera ditampilkan di sini.</p>
            </div>
        @endif
    </section>
</div>
@endsection
