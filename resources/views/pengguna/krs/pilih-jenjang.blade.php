@extends('tata-letak.utama')
@section('judul', 'Pilih Jenjang Pendidikan - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('pengguna.krs.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div>
                <h1 class="text-2xl font-bold text-white"><i class="fas fa-graduation-cap text-kvt-400 mr-2"></i>Pilih Jenjang Pendidikan</h1>
                <p class="text-gray-400 text-sm mt-1">Daftar ke jenjang pendidikan yang ingin Anda ikuti</p>
            </div>
        </div>

        @if($kurikulumList->isEmpty())
            <div class="kaca rounded-xl p-12 text-center border border-kvt-700/20">
                <i class="fas fa-graduation-cap text-5xl text-gray-600 mb-4"></i>
                <p class="text-gray-400">Belum ada kurikulum yang tersedia saat ini.</p>
            </div>
        @else
            @php
                $jenjangGroup = $kurikulumList->groupBy(function($k) {
                    return match(true) {
                        in_array($k->jenjang, ['tk_paud', 'sd_mi', 'smp_mts']) => 'Pendidikan Dasar',
                        in_array($k->jenjang, ['sma_ma', 'smk']) => 'Pendidikan Menengah',
                        in_array($k->jenjang, ['d1', 'd2', 'd3', 'd4']) => 'Diploma',
                        in_array($k->jenjang, ['s1']) => 'Sarjana',
                        in_array($k->jenjang, ['s2', 's3']) => 'Pascasarjana',
                        default => 'Lainnya',
                    };
                });
            @endphp

            @foreach($jenjangGroup as $kelompok => $items)
            <div class="mb-8">
                <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                    @switch($kelompok)
                        @case('Pendidikan Dasar')
                        <i class="fas fa-child text-green-400"></i>
                        @break
                        @case('Pendidikan Menengah')
                        <i class="fas fa-school text-blue-400"></i>
                        @break
                        @case('Diploma')
                        <i class="fas fa-certificate text-yellow-400"></i>
                        @break
                        @case('Sarjana')
                        <i class="fas fa-university text-purple-400"></i>
                        @break
                        @case('Pascasarjana')
                        <i class="fas fa-user-graduate text-red-400"></i>
                        @break
                        @default
                        <i class="fas fa-star text-gray-400"></i>
                    @endswitch
                    {{ $kelompok }}
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($items as $kurikulum)
                    <div class="kaca rounded-xl p-5 border border-kvt-700/20 card-hover group">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs bg-kvt-500/10 text-kvt-400 px-2 py-0.5 rounded-full font-semibold uppercase">
                                {{ str_replace('_', ' ', $kurikulum->jenjang) }}
                            </span>
                            @if($kurikulum->total_semester)
                            <span class="text-xs text-gray-500">{{ $kurikulum->total_semester }} semester</span>
                            @endif
                        </div>
                        <h3 class="text-white font-semibold mb-1">{{ $kurikulum->nama }}</h3>
                        <p class="text-xs text-gray-500 mb-3 line-clamp-2">{{ $kurikulum->deskripsi ?? 'Kurikulum resmi' }}</p>

                        @if($kurikulum->total_sks)
                        <p class="text-xs text-gray-500 mb-3">Total {{ $kurikulum->total_sks }} SKS</p>
                        @endif

                        <form action="{{ route('pengguna.krs.daftar-jenjang') }}" method="POST">
                            @csrf
                            <input type="hidden" name="kurikulum_id" value="{{ $kurikulum->id }}">

                            @if($kurikulum->perluSks())
                            <input type="text" name="jurusan" placeholder="Jurusan (opsional)" class="w-full mb-2 text-xs bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white focus:border-kvt-500 focus:ring-kvt-500/30 placeholder-gray-600">
                            @endif

                            <button type="submit" class="w-full mt-1 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white py-2 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition opacity-80 group-hover:opacity-100 shadow-lg">
                                <i class="fas fa-plus mr-1"></i>Daftar
                            </button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
