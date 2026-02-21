@extends('tata-letak.utama')
@section('judul', $edukasiGratis->judul . ' - Edukasi Gratis KVT Hub')

@section('konten')
<section class="pt-32 pb-16 bg-kvt-950">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">
        {{-- Breadcrumb --}}
        <div class="flex items-center gap-2 text-sm text-gray-500 mb-8" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="hover:text-kvt-400 transition">Beranda</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="{{ route('edukasi-gratis.index') }}" class="hover:text-kvt-400 transition">Edukasi Gratis</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-gray-400">{{ Str::limit($edukasiGratis->judul, 40) }}</span>
        </div>

        {{-- Header --}}
        <div class="mb-10" data-aos="fade-up" data-aos-delay="100">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-14 h-14 bg-{{ $edukasiGratis->warna ?? 'kvt' }}-500/10 rounded-2xl flex items-center justify-center">
                    <i class="{{ $edukasiGratis->ikon ?? 'fas fa-graduation-cap' }} text-{{ $edukasiGratis->warna ?? 'kvt' }}-400 text-xl"></i>
                </div>
                <div>
                    <div class="flex items-center gap-2 mb-1">
                        <span class="text-xs px-2 py-0.5 bg-green-500/10 text-green-400 rounded-full font-semibold"><i class="fas fa-gift text-[8px] mr-1"></i>GRATIS</span>
                        @if($edukasiGratis->unggulan)<span class="text-xs px-2 py-0.5 bg-amber-500/10 text-amber-400 rounded-full font-semibold"><i class="fas fa-star text-[8px] mr-1"></i>Unggulan</span>@endif
                        <span class="text-xs px-2 py-0.5 bg-{{ $edukasiGratis->warna ?? 'kvt' }}-500/10 text-{{ $edukasiGratis->warna ?? 'kvt' }}-400 rounded-full font-semibold">{{ \App\Models\EdukasiGratis::daftarKategori()[$edukasiGratis->kategori] ?? $edukasiGratis->kategori }}</span>
                    </div>
                    <h1 class="text-2xl md:text-3xl font-black text-white">{{ $edukasiGratis->judul }}</h1>
                </div>
            </div>

            <div class="flex items-center gap-4 text-sm text-gray-500">
                @if($edukasiGratis->platform)<span><i class="fas fa-tag mr-1"></i>{{ $edukasiGratis->platform }}</span>@endif
                <span><i class="fas fa-eye mr-1"></i>{{ number_format($edukasiGratis->dilihat) }}x dilihat</span>
                <span><i class="fas fa-clock mr-1"></i>{{ $edukasiGratis->updated_at->diffForHumans() }}</span>
            </div>
        </div>

        {{-- Content --}}
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 md:p-8 mb-8" data-aos="fade-up" data-aos-delay="200">
            {{-- Description --}}
            <div class="mb-8">
                <h2 class="text-lg font-bold text-white mb-3 flex items-center gap-2"><i class="fas fa-info-circle text-kvt-400"></i> Tentang Program</h2>
                <p class="text-gray-300 leading-relaxed">{{ $edukasiGratis->deskripsi }}</p>
            </div>

            {{-- Official Link --}}
            @if($edukasiGratis->url_resmi)
            <div class="mb-8 bg-green-500/5 border border-green-500/20 rounded-xl p-5">
                <h3 class="text-sm font-bold text-green-400 mb-2 flex items-center gap-2"><i class="fas fa-external-link-alt"></i> Link Resmi</h3>
                <a href="{{ $edukasiGratis->url_resmi }}" target="_blank" rel="noopener noreferrer" class="text-kvt-400 hover:text-kvt-300 text-sm break-all transition underline underline-offset-2">
                    {{ $edukasiGratis->url_resmi }}
                </a>
                <div class="mt-3 flex flex-wrap gap-3">
                    <a href="{{ $edukasiGratis->url_resmi }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-5 py-2.5 bg-green-600 hover:bg-green-500 text-white rounded-xl text-sm font-semibold transition">
                        <i class="fas fa-external-link-alt"></i> Daftar Langsung — Gratis!
                    </a>
                    @auth
                    <a href="{{ route('pendaftaran-edukasi.buat', $edukasiGratis) }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-kvt-600 hover:bg-kvt-500 text-white rounded-xl text-sm font-semibold transition shadow-lg shadow-kvt-500/20">
                        <i class="fas fa-clipboard-check"></i> Daftar via KVT Hub
                    </a>
                    @else
                    <a href="{{ route('masuk') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-kvt-800/50 border border-kvt-700/30 text-gray-300 rounded-xl text-sm font-semibold hover:text-white hover:bg-kvt-700/50 transition">
                        <i class="fas fa-sign-in-alt"></i> Login untuk Daftar via KVT Hub
                    </a>
                    @endauth
                </div>
            </div>
            @endif

            {{-- Steps --}}
            @if($edukasiGratis->langkah)
            <div class="mb-4">
                <h2 class="text-lg font-bold text-white mb-4 flex items-center gap-2"><i class="fas fa-list-ol text-amber-400"></i> Langkah-langkah Pendaftaran</h2>
                <div class="prose prose-invert prose-sm max-w-none text-gray-300 leading-relaxed
                    [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:space-y-3
                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:space-y-2
                    [&_li]:text-gray-300
                    [&_strong]:text-white [&_strong]:font-semibold
                    [&_a]:text-kvt-400 [&_a]:underline [&_a:hover]:text-kvt-300
                    [&_code]:bg-kvt-800 [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:rounded [&_code]:text-green-400 [&_code]:text-xs
                    [&_h3]:text-white [&_h3]:font-bold [&_h3]:text-base [&_h3]:mt-6 [&_h3]:mb-2
                    [&_p]:mb-3">
                    {!! $edukasiGratis->langkah !!}
                </div>
            </div>
            @endif
        </div>

        {{-- Aturan & Peringatan --}}
        @if(isset($aturan) && $aturan->count() > 0)
        <div class="mb-8 space-y-4" data-aos="fade-up" data-aos-delay="250">
            <h2 class="text-xl font-black text-white flex items-center gap-2"><i class="fas fa-exclamation-triangle text-yellow-400"></i> Aturan & Peringatan Penting</h2>
            <p class="text-gray-400 text-sm mb-4">Baca dan pahami aturan berikut sebelum mendaftar program ini. Pelanggaran dapat mengakibatkan akun diblokir atau akses dicabut secara permanen.</p>

            @php
                $grouped = $aturan->groupBy('tipe');
                $tipeOrder = ['tentang', 'larangan', 'peringatan', 'prosedur', 'tips'];
                $tipeConfig = \App\Models\AturanEdukasi::daftarTipe();
            @endphp

            @foreach($tipeOrder as $tipe)
                @if(isset($grouped[$tipe]) && $grouped[$tipe]->count() > 0)
                @php $cfg = $tipeConfig[$tipe]; @endphp
                <div class="bg-{{ $cfg['warna'] }}-500/5 border border-{{ $cfg['warna'] }}-500/20 rounded-2xl overflow-hidden">
                    <div class="flex items-center gap-3 px-5 py-3 bg-{{ $cfg['warna'] }}-500/10 border-b border-{{ $cfg['warna'] }}-500/10">
                        <i class="{{ $cfg['ikon'] }} text-{{ $cfg['warna'] }}-400"></i>
                        <h3 class="text-{{ $cfg['warna'] }}-400 font-bold text-sm">{{ $cfg['label'] }}</h3>
                        <span class="text-[10px] bg-{{ $cfg['warna'] }}-500/20 text-{{ $cfg['warna'] }}-400 px-2 py-0.5 rounded-full font-semibold">{{ $grouped[$tipe]->count() }}</span>
                    </div>
                    <div class="divide-y divide-{{ $cfg['warna'] }}-500/10">
                        @foreach($grouped[$tipe] as $rule)
                        <div class="px-5 py-4 flex items-start gap-3">
                            <div class="w-7 h-7 bg-{{ $cfg['warna'] }}-500/10 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="{{ $rule->ikon ?? $cfg['ikon'] }} text-{{ $cfg['warna'] }}-400 text-xs"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-semibold text-sm mb-1">{{ $rule->judul }}</h4>
                                <p class="text-gray-400 text-sm leading-relaxed">{{ $rule->deskripsi }}</p>
                                @if($rule->tingkat === 'kritis' || $rule->tingkat === 'tinggi')
                                <span class="inline-flex items-center gap-1 mt-2 text-[10px] px-2 py-0.5 bg-{{ $rule->tingkat === 'kritis' ? 'red' : 'orange' }}-500/15 text-{{ $rule->tingkat === 'kritis' ? 'red' : 'orange' }}-400 rounded-full font-bold uppercase tracking-wider">
                                    <i class="fas fa-{{ $rule->tingkat === 'kritis' ? 'skull-crossbones' : 'exclamation' }} text-[8px]"></i> {{ $rule->tingkat }}
                                </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        @endif

        {{-- Share & Action --}}
        <div class="flex flex-wrap items-center gap-3 mb-16" data-aos="fade-up" data-aos-delay="300">
            <button onclick="navigator.clipboard.writeText(window.location.href);this.innerHTML='<i class=\'fas fa-check mr-1\'></i> Tersalin!';setTimeout(()=>this.innerHTML='<i class=\'fas fa-link mr-1\'></i> Salin Link',2000)" class="px-4 py-2 bg-kvt-800/50 border border-kvt-700/30 rounded-xl text-sm text-gray-300 hover:text-white hover:border-kvt-500/30 transition">
                <i class="fas fa-link mr-1"></i> Salin Link
            </button>
            <a href="https://wa.me/?text={{ urlencode($edukasiGratis->judul . ' - ' . url()->current()) }}" target="_blank" class="px-4 py-2 bg-green-600/10 border border-green-500/20 rounded-xl text-sm text-green-400 hover:bg-green-600/20 transition">
                <i class="fab fa-whatsapp mr-1"></i> Bagikan
            </a>
            <a href="{{ route('edukasi-gratis.index') }}" class="px-4 py-2 bg-kvt-800/50 border border-kvt-700/30 rounded-xl text-sm text-gray-300 hover:text-white hover:border-kvt-500/30 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        {{-- Related --}}
        @if($terkait->count() > 0)
        <div data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-xl font-black text-white mb-6"><i class="fas fa-th-large text-kvt-400 mr-2"></i>Program Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                @foreach($terkait as $item)
                <a href="{{ route('edukasi-gratis.tampilkan', $item) }}" class="group bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-5 hover:border-{{ $item->warna ?? 'kvt' }}-500/30 transition-all duration-300 hover:-translate-y-0.5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-{{ $item->warna ?? 'kvt' }}-500/10 rounded-xl flex items-center justify-center shrink-0">
                            <i class="{{ $item->ikon ?? 'fas fa-graduation-cap' }} text-{{ $item->warna ?? 'kvt' }}-400"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm font-bold text-white group-hover:text-{{ $item->warna ?? 'kvt' }}-400 transition truncate">{{ $item->judul }}</h3>
                            <p class="text-xs text-gray-500">{{ $item->platform }}</p>
                        </div>
                        <i class="fas fa-chevron-right text-gray-600 group-hover:text-{{ $item->warna ?? 'kvt' }}-400 transition"></i>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>
@endsection
