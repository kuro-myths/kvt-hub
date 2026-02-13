@extends('tata-letak.utama')
@section('judul', $kerjaSama->nama . ' - Kerja Sama KVT Hub')

@section('konten')
<div class="min-h-screen">
    {{-- Breadcrumb --}}
    <div class="bg-kvt-900/50 border-b border-kvt-700/20 py-3">
        <div class="max-w-4xl mx-auto px-4">
            <nav class="flex items-center gap-2 text-xs text-gray-500">
                <a href="{{ route('beranda') }}" class="hover:text-kvt-400 transition">Beranda</a>
                <i class="fas fa-chevron-right text-[8px]"></i>
                <a href="{{ route('kerja-sama.index') }}" class="hover:text-kvt-400 transition">Kerja Sama</a>
                <i class="fas fa-chevron-right text-[8px]"></i>
                <span class="text-gray-400">{{ $kerjaSama->nama }}</span>
            </nav>
        </div>
    </div>

    <article class="max-w-4xl mx-auto px-4 py-10">
        @php $tw = $kerjaSama->tierWarna(); $ikon = $kerjaSama->tierIkon(); @endphp
        <div class="kaca-gelap rounded-3xl p-8 mb-8" data-aos="fade-up">
            <div class="flex flex-col md:flex-row items-start gap-8">
                <div class="w-28 h-28 bg-white/5 rounded-2xl flex items-center justify-center overflow-hidden shrink-0 border border-kvt-700/20">
                    @if($kerjaSama->logo)
                        <img src="{{ asset('storage/' . $kerjaSama->logo) }}" alt="{{ $kerjaSama->nama }}" class="max-w-full max-h-full p-3">
                    @else
                        <i class="fas fa-building text-3xl text-gray-600"></i>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-xs font-bold uppercase px-3 py-1 rounded-full bg-gradient-to-r {{ $tw }} text-white">
                            <i class="fas {{ $ikon }} mr-1"></i>{{ ucfirst($kerjaSama->tier) }}
                        </span>
                        <span class="text-xs text-gray-400 bg-kvt-800/50 px-3 py-1 rounded-full">
                            {{ App\Models\KerjaSama::tipeList()[$kerjaSama->tipe] ?? $kerjaSama->tipe }}
                        </span>
                        @if($kerjaSama->aktif)
                            <span class="text-xs text-green-400 bg-green-500/10 px-3 py-1 rounded-full"><i class="fas fa-check-circle mr-1"></i>Aktif</span>
                        @endif
                    </div>
                    <h1 class="text-3xl font-black text-white mb-3">{{ $kerjaSama->nama }}</h1>
                    @if($kerjaSama->deskripsi)
                        <p class="text-gray-400 text-base leading-relaxed">{{ $kerjaSama->deskripsi }}</p>
                    @endif
                    @if($kerjaSama->website)
                        <a href="{{ $kerjaSama->website }}" target="_blank" class="inline-flex items-center gap-2 text-kvt-400 hover:text-kvt-300 mt-4 text-sm transition">
                            <i class="fas fa-external-link-alt"></i> {{ $kerjaSama->website }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

        {{-- Details --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            @if($kerjaSama->mulai_pada || $kerjaSama->berakhir_pada)
                <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up" data-aos-delay="100">
                    <h3 class="text-sm font-bold text-white mb-3"><i class="fas fa-calendar text-kvt-400 mr-2"></i>Periode Kerjasama</h3>
                    <div class="space-y-2 text-sm text-gray-400">
                        @if($kerjaSama->mulai_pada)<p>Mulai: <span class="text-white">{{ $kerjaSama->mulai_pada->translatedFormat('d F Y') }}</span></p>@endif
                        @if($kerjaSama->berakhir_pada)<p>Berakhir: <span class="text-white">{{ $kerjaSama->berakhir_pada->translatedFormat('d F Y') }}</span></p>@endif
                    </div>
                </div>
            @endif

            @if($kerjaSama->benefit)
                <div class="kaca-gelap rounded-2xl p-6" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="text-sm font-bold text-white mb-3"><i class="fas fa-gift text-yellow-400 mr-2"></i>Benefit</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">{{ $kerjaSama->benefit }}</p>
                </div>
            @endif
        </div>

        <div class="text-center">
            <a href="{{ route('kerja-sama.index') }}" class="inline-flex items-center gap-2 text-sm text-kvt-400 hover:text-kvt-300 transition">
                <i class="fas fa-arrow-left"></i> Kembali ke daftar mitra
            </a>
        </div>
    </article>
</div>
@endsection
