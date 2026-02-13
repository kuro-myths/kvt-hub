@extends('tata-letak.utama')
@section('judul', $berita->judul . ' - KVT Hub')

@section('konten')
<div class="min-h-screen">
    {{-- Breadcrumb --}}
    <div class="bg-kvt-900/50 border-b border-kvt-700/20 py-3">
        <div class="max-w-4xl mx-auto px-4">
            <nav class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('beranda') }}" class="hover:text-kvt-400 transition">Beranda</a>
                <i class="fas fa-chevron-right text-[8px]"></i>
                <a href="{{ route('berita.index') }}" class="hover:text-kvt-400 transition">Berita</a>
                <i class="fas fa-chevron-right text-[8px]"></i>
                <span class="text-gray-400 truncate max-w-[200px]">{{ $berita->judul }}</span>
            </nav>
        </div>
    </div>

    {{-- Article --}}
    <article class="max-w-4xl mx-auto px-4 py-10">
        {{-- Header --}}
        <header class="mb-8">
            <div class="flex items-center gap-3 mb-4">
                <span class="bg-kvt-600/20 text-kvt-400 text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $berita->kategori }}</span>
                @if($berita->unggulan)
                    <span class="bg-yellow-500/20 text-yellow-400 text-xs font-bold px-3 py-1 rounded-full"><i class="fas fa-star mr-1"></i>Unggulan</span>
                @endif
            </div>
            <h1 class="text-3xl md:text-4xl font-black text-white leading-tight mb-4">{{ $berita->judul }}</h1>
            @if($berita->ringkasan)
                <p class="text-lg text-gray-400 mb-6">{{ $berita->ringkasan }}</p>
            @endif
            <div class="flex items-center gap-6 text-sm text-gray-500 border-b border-kvt-700/30 pb-6">
                @if($berita->penulis)
                    <span class="flex items-center gap-2">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center text-xs font-bold text-white">
                            {{ strtoupper(substr($berita->penulis->name, 0, 1)) }}
                        </div>
                        <span class="text-gray-300">{{ $berita->penulis->name }}</span>
                    </span>
                @endif
                <span><i class="far fa-calendar mr-1"></i>{{ $berita->terbit_pada ? $berita->terbit_pada->translatedFormat('d F Y, H:i') : '-' }}</span>
                <span><i class="far fa-eye mr-1"></i>{{ number_format($berita->dilihat) }}x dilihat</span>
            </div>
        </header>

        {{-- Featured Image --}}
        @if($berita->gambar)
            <div class="mb-8 rounded-2xl overflow-hidden">
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="w-full max-h-[500px] object-cover">
            </div>
        @endif

        {{-- Content --}}
        <div class="prose prose-invert prose-lg max-w-none
            prose-headings:text-white prose-headings:font-bold
            prose-p:text-gray-300 prose-p:leading-relaxed
            prose-a:text-kvt-400 prose-a:no-underline hover:prose-a:underline
            prose-strong:text-white
            prose-code:text-kvt-400 prose-code:bg-kvt-800/50 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
            prose-blockquote:border-kvt-500 prose-blockquote:text-gray-400
            prose-li:text-gray-300
            mb-10">
            {!! nl2br(e($berita->konten)) !!}
        </div>

        {{-- Share --}}
        <div class="flex items-center gap-4 border-t border-b border-kvt-700/30 py-5 mb-10">
            <span class="text-sm text-gray-500">Bagikan:</span>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($berita->judul) }}" target="_blank" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#1DA1F2] hover:bg-[#1DA1F2]/10 transition"><i class="fab fa-twitter"></i></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#1877F2] hover:bg-[#1877F2]/10 transition"><i class="fab fa-facebook-f"></i></a>
            <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}" target="_blank" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#25D366] hover:bg-[#25D366]/10 transition"><i class="fab fa-whatsapp"></i></a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($berita->judul) }}" target="_blank" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#0077B5] hover:bg-[#0077B5]/10 transition"><i class="fab fa-linkedin-in"></i></a>
            <button onclick="navigator.clipboard.writeText(window.location.href);this.innerHTML='<i class=\'fas fa-check\'></i>';setTimeout(()=>this.innerHTML='<i class=\'fas fa-link\'></i>',2000)" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-400/10 transition"><i class="fas fa-link"></i></button>
        </div>

        {{-- Related News --}}
        @if($beritaTerkait->count() > 0)
            <section>
                <h3 class="text-xl font-bold text-white mb-6"><i class="fas fa-newspaper text-kvt-400 mr-2"></i>Berita Terkait</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    @foreach($beritaTerkait as $terkait)
                        <a href="{{ route('berita.tampilkan', $terkait) }}" class="kaca-gelap rounded-xl p-4 hover:border-kvt-500/30 transition group">
                            <span class="text-[10px] text-kvt-400 uppercase font-bold">{{ $terkait->kategori }}</span>
                            <h4 class="text-sm font-bold text-white mt-1 mb-2 line-clamp-2 group-hover:text-kvt-400 transition">{{ $terkait->judul }}</h4>
                            <p class="text-xs text-gray-500"><i class="far fa-calendar mr-1"></i>{{ $terkait->terbit_pada ? $terkait->terbit_pada->translatedFormat('d M Y') : '-' }}</p>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif
    </article>
</div>
@endsection
