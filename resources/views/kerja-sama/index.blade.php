@extends('tata-letak.utama')
@section('judul', 'Kerja Sama & Sponsor - KVT Hub')

@section('konten')
<div class="min-h-screen">
    {{-- Hero --}}
    <section class="relative py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-kvt-900 via-kvt-950 to-kvt-900"></div>
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 30% 40%, rgba(234,179,8,0.3) 0%, transparent 50%), radial-gradient(circle at 70% 60%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
        <div class="max-w-7xl mx-auto px-4 relative z-10 text-center">
            <div class="inline-flex items-center gap-2 bg-yellow-500/10 border border-yellow-500/20 rounded-full px-4 py-1.5 mb-4">
                <i class="fas fa-handshake text-yellow-400 text-sm"></i>
                <span class="text-yellow-400 text-sm font-medium">Partnership Hub</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black mb-4"><span class="teks-gradien">Kerja Sama & Sponsor</span></h1>
            <p class="text-gray-400 text-lg max-w-2xl mx-auto">Mitra strategis yang mendukung ekosistem pendidikan dan riset global KVT Hub</p>
        </div>
    </section>

    {{-- Filter --}}
    <section class="max-w-7xl mx-auto px-4 -mt-6 relative z-10 mb-10">
        <div class="kaca-gelap rounded-2xl p-4 flex flex-wrap items-center gap-3">
            <a href="{{ route('kerja-sama.index') }}" class="px-4 py-2 rounded-lg text-sm font-medium transition {{ !request('tipe') ? 'bg-kvt-600 text-white' : 'text-gray-400 hover:text-white hover:bg-kvt-800/30' }}">
                <i class="fas fa-th mr-1"></i> Semua
            </a>
            @foreach(App\Models\KerjaSama::tipeList() as $key => $label)
                <a href="{{ route('kerja-sama.index', ['tipe' => $key]) }}" class="px-4 py-2 rounded-lg text-sm font-medium transition {{ request('tipe') == $key ? 'bg-kvt-600 text-white' : 'text-gray-400 hover:text-white hover:bg-kvt-800/30' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </section>

    {{-- Mitra by Tier --}}
    <section class="max-w-7xl mx-auto px-4 pb-16">
        @foreach($mitraPerTier as $tier => $mitras)
            @if($mitras->count() > 0)
                @php
                    $tierInfo = [
                        'platinum' => ['ikon' => 'fa-crown', 'warna' => 'from-slate-200 to-gray-400', 'bg' => 'bg-gray-200/10', 'border' => 'border-gray-300/30', 'text' => 'text-gray-200'],
                        'gold' => ['ikon' => 'fa-trophy', 'warna' => 'from-yellow-300 to-amber-500', 'bg' => 'bg-yellow-500/10', 'border' => 'border-yellow-500/30', 'text' => 'text-yellow-400'],
                        'silver' => ['ikon' => 'fa-medal', 'warna' => 'from-gray-300 to-gray-500', 'bg' => 'bg-gray-400/10', 'border' => 'border-gray-400/30', 'text' => 'text-gray-300'],
                        'bronze' => ['ikon' => 'fa-award', 'warna' => 'from-orange-400 to-amber-700', 'bg' => 'bg-orange-500/10', 'border' => 'border-orange-500/30', 'text' => 'text-orange-400'],
                        'community' => ['ikon' => 'fa-heart', 'warna' => 'from-pink-400 to-rose-600', 'bg' => 'bg-pink-500/10', 'border' => 'border-pink-500/30', 'text' => 'text-pink-400'],
                    ];
                    $info = $tierInfo[$tier] ?? $tierInfo['community'];
                @endphp

                <div class="mb-12" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 {{ $info['bg'] }} border {{ $info['border'] }} rounded-xl flex items-center justify-center">
                            <i class="fas {{ $info['ikon'] }} {{ $info['text'] }}"></i>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold {{ $info['text'] }}">{{ ucfirst($tier) }} Partner</h2>
                            <p class="text-xs text-gray-500">{{ $mitras->count() }} mitra</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-{{ $tier === 'platinum' ? '2' : ($tier === 'gold' ? '3' : '4') }} gap-5">
                        @foreach($mitras as $mitra)
                            <a href="{{ route('kerja-sama.tampilkan', $mitra) }}" class="kaca-gelap rounded-2xl p-5 hover:border-kvt-500/30 transition-all duration-300 group {{ $tier === 'platinum' ? 'flex items-center gap-6' : '' }}">
                                <div class="{{ $tier === 'platinum' ? 'w-24 h-24 shrink-0' : 'w-16 h-16 mx-auto mb-4' }} bg-white/5 rounded-xl flex items-center justify-center overflow-hidden">
                                    @if($mitra->logo)
                                        <img src="{{ asset('storage/' . $mitra->logo) }}" alt="{{ $mitra->nama }}" class="max-w-full max-h-full p-2">
                                    @else
                                        <i class="fas fa-building text-2xl text-gray-600"></i>
                                    @endif
                                </div>
                                <div class="{{ $tier === 'platinum' ? '' : 'text-center' }}">
                                    <h3 class="font-bold text-white group-hover:text-kvt-400 transition mb-1">{{ $mitra->nama }}</h3>
                                    <span class="text-[10px] uppercase font-bold {{ $info['text'] }}">{{ App\Models\KerjaSama::tipeList()[$mitra->tipe] ?? $mitra->tipe }}</span>
                                    @if($mitra->deskripsi)
                                        <p class="text-sm text-gray-400 mt-2 line-clamp-2">{{ $mitra->deskripsi }}</p>
                                    @endif
                                    @if($mitra->website)
                                        <p class="text-xs text-kvt-400 mt-2"><i class="fas fa-external-link-alt mr-1"></i>{{ parse_url($mitra->website, PHP_URL_HOST) }}</p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        @if(collect($mitraPerTier)->flatten()->count() === 0)
            <div class="text-center py-20">
                <i class="fas fa-handshake text-5xl text-gray-700 mb-4"></i>
                <h3 class="text-xl font-bold text-gray-400 mb-2">Belum ada mitra</h3>
                <p class="text-gray-500">Mitra akan segera ditampilkan di sini.</p>
            </div>
        @endif
    </section>

    {{-- CTA --}}
    <section class="max-w-7xl mx-auto px-4 pb-16">
        <div class="bg-gradient-to-r from-kvt-800/50 to-ungu-700/30 rounded-3xl p-10 text-center border border-kvt-600/20" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-white mb-3">Tertarik Menjadi Mitra?</h2>
            <p class="text-gray-400 mb-6 max-w-xl mx-auto">Bergabunglah dengan ekosistem KVT Hub dan dapatkan eksposur ke komunitas pendidikan global.</p>
            <a href="mailto:partnership@kvt-hub.com" class="inline-flex items-center gap-2 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-3 rounded-xl font-medium hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg shadow-kvt-500/30">
                <i class="fas fa-envelope"></i> Hubungi Kami
            </a>
        </div>
    </section>
</div>
@endsection
