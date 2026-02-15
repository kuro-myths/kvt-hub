@extends('tata-letak.utama')
@section('judul', 'Organisasi - Komunitas KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">

    {{-- Hero --}}
    <section class="pt-28 pb-12 px-4">
        <div class="max-w-6xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-black text-white mb-4" data-aos="fade-up">
                <i class="fas fa-sitemap text-kvt-400 mr-3"></i>Organisasi
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="100">
                Temukan dan bergabung dengan organisasi, komunitas, serta mitra yang tergabung dalam ekosistem KVT Hub.
            </p>
        </div>
    </section>

    {{-- Filters --}}
    <section class="px-4 pb-8">
        <div class="max-w-6xl mx-auto">
            <form method="GET" class="kaca rounded-xl p-4 border border-kvt-700/20 flex flex-wrap gap-3 items-end">
                <div class="flex-1 min-w-[150px]">
                    <label class="text-xs text-gray-500 block mb-1">Tipe</label>
                    <select name="tipe" onchange="this.form.submit()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500">
                        <option value="">Semua Tipe</option>
                        @foreach($tipeList as $key => $label)
                        <option value="{{ $key }}" {{ request('tipe') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-1 min-w-[150px]">
                    <label class="text-xs text-gray-500 block mb-1">Kategori</label>
                    <select name="kategori" onchange="this.form.submit()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500">
                        <option value="">Semua Kategori</option>
                        @foreach($kategoriList as $key => $label)
                        <option value="{{ $key }}" {{ request('kategori') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <a href="{{ request('unggulan') ? route('halaman.komunitas.organisasi') : route('halaman.komunitas.organisasi', ['unggulan' => 1] + request()->query()) }}"
                       class="inline-flex items-center gap-2 px-4 py-2 rounded-lg text-sm font-semibold transition
                       {{ request('unggulan') ? 'bg-yellow-500/20 text-yellow-400 border border-yellow-500/30' : 'bg-kvt-800/50 text-gray-400 border border-kvt-700/30 hover:bg-kvt-700/50' }}">
                        <i class="fas fa-star"></i>Unggulan
                    </a>
                </div>
                @if(request()->hasAny(['tipe', 'kategori', 'unggulan']))
                <a href="{{ route('halaman.komunitas.organisasi') }}" class="text-gray-500 hover:text-white text-xs transition px-3 py-2">
                    <i class="fas fa-times mr-1"></i>Reset
                </a>
                @endif
            </form>
        </div>
    </section>

    {{-- Grid --}}
    <section class="px-4 pb-16">
        <div class="max-w-6xl mx-auto">
            @if($organisasi->isEmpty())
            <div class="kaca rounded-2xl p-16 text-center border border-kvt-700/20">
                <i class="fas fa-search text-5xl text-gray-600 mb-4"></i>
                <p class="text-gray-400">Tidak ada organisasi yang cocok dengan filter Anda.</p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach($organisasi as $i => $org)
                <div class="kaca rounded-xl p-5 border border-kvt-700/20 card-hover group" data-aos="fade-up" data-aos-delay="{{ ($i % 6) * 80 }}">
                    <div class="flex items-start gap-4 mb-3">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br from-kvt-400/20 to-ungu-500/20 flex items-center justify-center flex-shrink-0 border border-kvt-700/20 overflow-hidden">
                            @if($org->logo)
                            <img src="{{ $org->logo }}" alt="{{ $org->nama }}" class="w-full h-full object-contain p-1">
                            @else
                            <i class="fas fa-building text-kvt-400 text-xl"></i>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1 flex-wrap">
                                <h3 class="text-white font-bold text-sm truncate">{{ $org->nama }}</h3>
                                @if($org->unggulan)
                                <i class="fas fa-star text-yellow-400 text-xs" title="Unggulan"></i>
                                @endif
                            </div>
                            @if($org->singkatan)
                            <span class="text-xs text-gray-500">({{ $org->singkatan }})</span>
                            @endif
                        </div>
                    </div>

                    <p class="text-xs text-gray-400 mb-3 line-clamp-2">{{ $org->deskripsi ?? 'Organisasi resmi yang terdaftar di KVT Hub.' }}</p>

                    <div class="flex items-center justify-between">
                        <div class="flex gap-2">
                            <span class="text-[10px] px-2 py-0.5 rounded-full
                                {{ $org->tipe === 'dalam' ? 'bg-blue-500/10 text-blue-400' : '' }}
                                {{ $org->tipe === 'luar' ? 'bg-green-500/10 text-green-400' : '' }}
                                {{ $org->tipe === 'mitra' ? 'bg-purple-500/10 text-purple-400' : '' }}
                                {{ $org->tipe === 'sponsor' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                            ">{{ ucfirst($org->tipe) }}</span>
                            <span class="text-[10px] px-2 py-0.5 rounded-full bg-kvt-500/10 text-kvt-400">
                                {{ ucfirst(str_replace('_', ' ', $org->kategori)) }}
                            </span>
                        </div>
                        @if($org->website)
                        <a href="{{ $org->website }}" target="_blank" class="text-kvt-400 text-xs hover:underline opacity-0 group-hover:opacity-100 transition">
                            <i class="fas fa-external-link-alt mr-1"></i>Kunjungi
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-center">
                {{ $organisasi->links() }}
            </div>
            @endif
        </div>
    </section>
</div>
@endsection
