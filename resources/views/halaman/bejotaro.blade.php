@extends('tata-letak.utama')

@section('judul', 'Bejotaro - Sang Leluhur | KVT Hub')

@section('konten')

{{-- HERO BEJOTARO --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-amber-950/30 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-96 h-96 bg-amber-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-yellow-600/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-amber-900/5 rounded-full blur-3xl"></div>
    </div>
    {{-- Motif batik/budaya pattern overlay --}}
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle, #D97706 1px, transparent 1px); background-size: 40px 40px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-16">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center bg-amber-500/10 border border-amber-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-amber-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-amber-300 text-sm font-bold">Sang Leluhur - File: the_antaboga.kvt</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white">Bejotaro</span><br>
                    <span class="bg-gradient-to-r from-amber-400 to-yellow-500 bg-clip-text text-transparent">LELUHUR</span>
                </h1>

                <p class="text-lg text-gray-400 max-w-xl mb-8 leading-relaxed">
                    Anak yang terlahir dari sejarah budaya leluhur Nusantara. Bejotaro membawa darah keturunan
                    <span class="text-amber-400 font-semibold">Pandawa</span> — mewarisi kebijaksanaan, keberanian,
                    dan kemuliaan para leluhur. Dalam setiap tindakan dan keputusan, ia selalu serius, bijak, dan ramah.
                </p>

                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="bg-amber-600/10 hover:bg-amber-600/20 text-amber-400 px-6 py-3 rounded-xl font-semibold transition border border-amber-700/30 text-sm">
                        <i class="fas fa-crown mr-2"></i>Keturunan Pandawa
                    </div>
                    <div class="bg-yellow-600/10 hover:bg-yellow-600/20 text-yellow-400 px-6 py-3 rounded-xl font-semibold transition border border-yellow-700/30 text-sm">
                        <i class="fas fa-dragon mr-2"></i>Antaboga
                    </div>
                    <div class="bg-orange-600/10 hover:bg-orange-600/20 text-orange-400 px-6 py-3 rounded-xl font-semibold transition border border-orange-700/30 text-sm">
                        <i class="fas fa-scroll mr-2"></i>Budaya Leluhur
                    </div>
                </div>

                <div class="flex gap-8 pt-4 border-t border-amber-800/30">
                    <div><div class="text-2xl font-black text-white">2nd</div><div class="text-xs text-gray-500">Karakter Hidup</div></div>
                    <div><div class="text-2xl font-black text-white">古</div><div class="text-xs text-gray-500">Keturunan Leluhur</div></div>
                    <div><div class="text-2xl font-black text-white">5</div><div class="text-xs text-gray-500">Aliansi Tim</div></div>
                    <div><div class="text-2xl font-black text-white">.kvt</div><div class="text-xs text-gray-500">File Ekstensi</div></div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="200" class="flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 lg:w-96 lg:h-96 rounded-3xl overflow-hidden border-2 border-amber-500/30 shadow-2xl shadow-amber-500/20 bg-gradient-to-br from-amber-950/50 to-kvt-950 flex items-center justify-center">
                        {{-- Placeholder jika belum ada gambar --}}
                        <div class="text-center p-8">
                            <i class="fas fa-dragon text-amber-500/30 text-8xl mb-4"></i>
                            <p class="text-amber-500/40 text-sm font-bold">Bejotaro</p>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-amber-600/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float">
                        <span class="text-white text-sm font-bold"><i class="fas fa-crown mr-1"></i>Sang Leluhur</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-amber-600 to-yellow-600 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float" style="animation-delay:1s">
                        <span class="text-white text-sm font-bold"><i class="fas fa-dragon mr-1"></i>Antaboga</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ORIGIN STORY --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-book-open mr-2"></i>Origin Story</span>
            <h2 class="text-4xl font-black text-white mt-2">Asal-Usul Bejotaro</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Dari garis keturunan Pandawa, lahirlah sang pelindung budaya dan kebijaksanaan leluhur</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Timeline --}}
            <div class="space-y-6" data-aos="fade-right">
                @php
                $timeline = [
                    ['ikon' => 'fa-scroll', 'judul' => 'Garis Keturunan Pandawa', 'desk' => 'Bejotaro lahir dari garis keturunan Pandawa, mewarisi darah para ksatria yang bijaksana dan berjiwa mulia. Setiap keputusannya dipandu oleh ajaran leluhur.', 'warna' => 'from-amber-500 to-yellow-600'],
                    ['ikon' => 'fa-dragon', 'judul' => 'Naga Antaboga', 'desk' => 'Namanya terinspirasi dari Antaboga — naga penguasa dunia bawah dalam mitologi Jawa. Ia di-input sebagai the_antaboga.kvt, file kedua dalam ekosistem KVT.', 'warna' => 'from-yellow-500 to-amber-600'],
                    ['ikon' => 'fa-landmark', 'judul' => 'Terlahir dalam Sejarah', 'desk' => 'Berbeda dengan karakter lain, Bejotaro terlahir langsung dari sejarah budaya. Ia membawa esensi peradaban Nusantara ke dalam dunia virtual KVT.', 'warna' => 'from-orange-500 to-red-500'],
                    ['ikon' => 'fa-balance-scale', 'judul' => 'Penjaga Kebijaksanaan', 'desk' => 'Perannya adalah menjaga kebijaksanaan leluhur. Setiap tindakan dan keputusannya selalu didasari oleh keseritusan, kebijaksanaan, dan keramahan.', 'warna' => 'from-emerald-500 to-teal-500'],
                    ['ikon' => 'fa-handshake', 'judul' => 'Rakyat & Kemuliaan', 'desk' => 'Bejotaro mengutamakan rakyat dan kemuliaan seperti Pandawa. Ia bijak dalam diplomasi, ramah kepada semua, namun serius dalam menghadapi ancaman.', 'warna' => 'from-blue-500 to-indigo-500'],
                    ['ikon' => 'fa-users', 'judul' => 'Bergabung dengan Aliansi', 'desk' => 'Bejotaro bergabung dengan aliansi 5 karakter bersama Kuro dan yang lainnya, membawa perspektif budaya dan kebijaksanaan leluhur ke dalam tim.', 'warna' => 'from-purple-500 to-violet-500'],
                ];
                @endphp

                @foreach($timeline as $i => $t)
                <div class="flex items-start gap-4 group">
                    <div class="w-12 h-12 bg-gradient-to-br {{ $t['warna'] }} rounded-xl flex items-center justify-center shadow-lg shrink-0 group-hover:scale-110 transition">
                        <i class="fas {{ $t['ikon'] }} text-white"></i>
                    </div>
                    <div>
                        <h4 class="text-white font-bold mb-1">{{ $t['judul'] }}</h4>
                        <p class="text-gray-400 text-sm leading-relaxed">{{ $t['desk'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Filosofi Pandawa --}}
            <div data-aos="fade-left">
                <div class="bg-kvt-900/60 border border-amber-700/20 rounded-2xl p-8 mb-6">
                    <h3 class="text-amber-400 font-black text-lg mb-4"><i class="fas fa-om mr-2"></i>Filosofi Pandawa</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">
                        Seperti Pandawa Lima yang mewakili dharma (kebenaran), kekuatan, keberanian, keahlian, dan kebijaksanaan —
                        Bejotaro merangkum semua nilai tersebut dalam satu karakter. Ia adalah manifestasi digital dari warisan budaya Nusantara.
                    </p>
                    <div class="grid grid-cols-2 gap-3">
                        @php
                        $pandawa = [
                            ['nama' => 'Yudhistira', 'nilai' => 'Dharma & Kebenaran', 'warna' => 'amber'],
                            ['nama' => 'Bima', 'nilai' => 'Kekuatan & Keberanian', 'warna' => 'red'],
                            ['nama' => 'Arjuna', 'nilai' => 'Keahlian & Fokus', 'warna' => 'blue'],
                            ['nama' => 'Nakula-Sadewa', 'nilai' => 'Kebijaksanaan & Kesetiaan', 'warna' => 'emerald'],
                        ];
                        @endphp
                        @foreach($pandawa as $p)
                        <div class="bg-{{ $p['warna'] }}-500/5 border border-{{ $p['warna'] }}-500/15 rounded-xl px-4 py-3 text-center">
                            <span class="text-{{ $p['warna'] }}-400 text-xs font-bold block">{{ $p['nama'] }}</span>
                            <span class="text-gray-500 text-[10px]">{{ $p['nilai'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- File Info Card --}}
                <div class="bg-kvt-900/50 border border-amber-700/20 rounded-2xl p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-code text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">File Karakter</h4>
                            <code class="text-amber-400 text-xs bg-amber-500/10 px-2 py-0.5 rounded">the_antaboga.kvt</code>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Status</span>
                            <span class="text-amber-400 font-bold">Aktif</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Tipe</span>
                            <span class="text-amber-400 font-bold">Karakter Hidup</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Asal</span>
                            <span class="text-amber-400 font-bold">Leluhur Nusantara</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Julukan</span>
                            <span class="text-amber-400 font-bold">Sang Leluhur</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KEAHLIAN UNIK --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-gem mr-2"></i>Keahlian Unik</span>
            <h2 class="text-4xl font-black text-white mt-2">Kemampuan Sang Leluhur</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Keahlian yang diwarisi dari garis keturunan Pandawa dan budaya leluhur Nusantara</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6 mb-12">
            @php
            $keahlian = [
                [
                    'ikon' => 'fa-gavel',
                    'judul' => 'Serius dalam Tindakan',
                    'desk' => 'Setiap tindakan dilakukan dengan penuh pertimbangan dan tanggung jawab. Tidak pernah gegabah, selalu penuh dengan kalkulasi matang seperti strategi perang Pandawa.',
                    'warna' => 'from-red-500 to-rose-600',
                    'border' => 'border-red-500/20 hover:border-red-500/40',
                ],
                [
                    'ikon' => 'fa-brain',
                    'judul' => 'Bijak dalam Keputusan',
                    'desk' => 'Kebijaksanaan Yudhistira mengalir dalam darahnya. Setiap keputusan diambil dengan mempertimbangkan dampak jangka panjang dan keadilan bagi semua pihak.',
                    'warna' => 'from-amber-500 to-yellow-600',
                    'border' => 'border-amber-500/20 hover:border-amber-500/40',
                ],
                [
                    'ikon' => 'fa-hands-helping',
                    'judul' => 'Ramah dalam Interaksi',
                    'desk' => 'Keramahan adalah kekuatan terbesarnya. Seperti Nakula-Sadewa yang setia dan penuh kasih, Bejotaro menyambut setiap orang dengan tangan terbuka.',
                    'warna' => 'from-emerald-500 to-teal-600',
                    'border' => 'border-emerald-500/20 hover:border-emerald-500/40',
                ],
            ];
            @endphp

            @foreach($keahlian as $i => $k)
            <div class="group bg-kvt-900/50 border {{ $k['border'] }} rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-gradient-to-br {{ $k['warna'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas {{ $k['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-3">{{ $k['judul'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $k['desk'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- BOOK CHAPTERS — CERITA BEJOTARO --}}
@if(isset($chapters) && $chapters->count())
<section class="py-24 relative overflow-hidden" id="cerita-bejotaro">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-amber-500/40 to-transparent"></div>
    <div class="absolute top-10 right-10 w-64 h-64 bg-amber-600/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <div class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/20 rounded-full px-5 py-1.5 mb-4">
                <i class="fas fa-book-open text-amber-400 text-sm"></i>
                <span class="text-amber-300 text-sm font-bold">The Book of LELUHUR</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-white mt-2">Cerita Bejotaro</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ikuti perjalanan Bejotaro — dari keturunan Pandawa hingga menjadi penasihat bijak aliansi</p>
        </div>

        <div class="relative">
            <div class="absolute left-6 md:left-10 top-0 bottom-0 w-0.5 bg-gradient-to-b from-amber-500/60 via-amber-500/20 to-transparent hidden md:block"></div>
            <div class="space-y-6">
                @foreach($chapters as $idx => $ch)
                @php
                    $warnaMap = [
                        'red' => ['bg' => 'bg-red-500', 'border' => 'border-red-500/30', 'text' => 'text-red-400', 'glow' => 'shadow-red-500/20', 'bg10' => 'bg-red-500/10'],
                        'amber' => ['bg' => 'bg-amber-500', 'border' => 'border-amber-500/30', 'text' => 'text-amber-400', 'glow' => 'shadow-amber-500/20', 'bg10' => 'bg-amber-500/10'],
                        'blue' => ['bg' => 'bg-blue-500', 'border' => 'border-blue-500/30', 'text' => 'text-blue-400', 'glow' => 'shadow-blue-500/20', 'bg10' => 'bg-blue-500/10'],
                        'emerald' => ['bg' => 'bg-emerald-500', 'border' => 'border-emerald-500/30', 'text' => 'text-emerald-400', 'glow' => 'shadow-emerald-500/20', 'bg10' => 'bg-emerald-500/10'],
                        'orange' => ['bg' => 'bg-orange-500', 'border' => 'border-orange-500/30', 'text' => 'text-orange-400', 'glow' => 'shadow-orange-500/20', 'bg10' => 'bg-orange-500/10'],
                        'yellow' => ['bg' => 'bg-yellow-500', 'border' => 'border-yellow-500/30', 'text' => 'text-yellow-400', 'glow' => 'shadow-yellow-500/20', 'bg10' => 'bg-yellow-500/10'],
                        'violet' => ['bg' => 'bg-violet-500', 'border' => 'border-violet-500/30', 'text' => 'text-violet-400', 'glow' => 'shadow-violet-500/20', 'bg10' => 'bg-violet-500/10'],
                    ];
                    $w = $warnaMap[$ch->warna] ?? $warnaMap['amber'];
                @endphp
                <div class="relative md:pl-20 pl-0" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    <div class="absolute left-4 md:left-8 top-8 w-5 h-5 {{ $w['bg'] }} rounded-full border-4 border-kvt-950 shadow-lg {{ $w['glow'] }} z-10 hidden md:block"></div>
                    <div class="group bg-kvt-900/60 backdrop-blur border {{ $w['border'] }} rounded-2xl overflow-hidden hover:border-opacity-60 transition-all duration-500 hover:shadow-lg {{ $w['glow'] }}">
                        <button onclick="bukaPopupBuku({{ $ch->chapter }}, 'bejotaro')" class="w-full text-left p-6 flex items-start gap-5 cursor-pointer">
                            <div class="shrink-0 w-14 h-14 {{ $w['bg10'] }} border {{ $w['border'] }} rounded-xl flex flex-col items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="text-[10px] {{ $w['text'] }} font-bold uppercase leading-none">Ch</span>
                                <span class="text-xl font-black {{ $w['text'] }} leading-none">{{ $ch->chapter }}</span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1 flex-wrap">
                                    <h3 class="text-white font-black text-lg leading-tight">{{ $ch->judul }}</h3>
                                </div>
                                <p class="text-gray-500 text-xs italic mb-2">{{ $ch->judul_asing }}</p>
                                <p class="text-gray-400 text-sm leading-relaxed line-clamp-2">{{ $ch->ringkasan }}</p>
                                <div class="flex items-center gap-3 mt-3">
                                    <span class="text-[10px] {{ $w['text'] }} font-semibold">
                                        <i class="fas fa-book-open mr-1"></i>Baca Chapter
                                    </span>
                                </div>
                            </div>
                            @if($ch->ikon)
                            <div class="shrink-0 w-10 h-10 {{ $w['bg10'] }} rounded-lg flex items-center justify-center hidden sm:flex">
                                <i class="fas {{ $ch->ikon }} {{ $w['text'] }}"></i>
                            </div>
                            @endif
                        </button>
                        <div id="chapter-data-bejotaro-{{ $ch->chapter }}" class="hidden"
                            data-judul="{{ $ch->judul }}" data-judul-asing="{{ $ch->judul_asing }}"
                            data-ringkasan="{{ $ch->ringkasan }}" data-konten="{{ $ch->konten }}"
                            data-gambar="{{ $ch->gambar ? asset('storage/' . $ch->gambar) : '' }}"
                            data-chapter="{{ $ch->chapter }}" data-aliansi="{{ $ch->aliansi ?? '' }}"
                            data-ikon="{{ $ch->ikon ?? 'fa-book' }}" data-warna="{{ $ch->warna ?? 'amber' }}"
                            data-karakter="bejotaro"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-3 bg-kvt-900/80 border border-amber-500/20 rounded-full px-8 py-3">
                <span class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
                <span class="text-amber-300 text-sm font-mono font-bold">leluhur_continues.kvt — Cerita belum berakhir...</span>
                <span class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
            </div>
        </div>
    </div>
</section>

@include('komponen.popup-buku', ['karakterId' => 'bejotaro', 'warnaPrimer' => 'amber', 'judulBuku' => 'The Book of LELUHUR'])
@endif

{{-- KARAKTER & TRAITS --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="zoom-in">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase">Karakter Profil</span>
            <h2 class="text-4xl font-black text-white mt-2">Sifat & Identitas</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $traits = [
                ['ikon' => 'fa-crown', 'judul' => 'Keturunan Mulia', 'desk' => 'Lahir dari garis keturunan Pandawa, membawa darah bangsawan dan ksatria Nusantara dalam setiap langkahnya', 'warna' => 'from-amber-500 to-yellow-600'],
                ['ikon' => 'fa-balance-scale', 'judul' => 'Adil & Bijaksana', 'desk' => 'Menimbang setiap keputusan dengan cermat, memastikan keadilan bagi semua pihak tanpa terkecuali', 'warna' => 'from-blue-500 to-indigo-500'],
                ['ikon' => 'fa-shield-alt', 'judul' => 'Pelindung Budaya', 'desk' => 'Menjaga warisan budaya leluhur Nusantara agar tetap hidup dan relevan di era digital', 'warna' => 'from-emerald-500 to-teal-500'],
                ['ikon' => 'fa-praying-hands', 'judul' => 'Rendah Hati', 'desk' => 'Meski memiliki kekuatan besar, Bejotaro selalu rendah hati dan menghargai setiap makhluk', 'warna' => 'from-purple-500 to-violet-500'],
                ['ikon' => 'fa-fist-raised', 'judul' => 'Tegas & Serius', 'desk' => 'Dalam menghadapi ketidakadilan, ia tidak ragu untuk bertindak tegas dan serius demi kebenaran', 'warna' => 'from-red-500 to-rose-600'],
                ['ikon' => 'fa-dove', 'judul' => 'Cinta Damai', 'desk' => 'Mengutamakan jalan damai dan diplomasi, namun siap bertempur jika dharma mengharuskan', 'warna' => 'from-cyan-500 to-sky-500'],
                ['ikon' => 'fa-dragon', 'judul' => 'Kekuatan Antaboga', 'desk' => 'Menyimpan kekuatan Naga Antaboga — penguasa dunia bawah yang misterius dan dahsyat', 'warna' => 'from-orange-500 to-amber-600'],
                ['ikon' => 'fa-om', 'judul' => 'Spiritual & Filosofis', 'desk' => 'Memahami filsafat Jawa dan ajaran leluhur, menjadikannya kompas dalam setiap perjalanan', 'warna' => 'from-yellow-500 to-amber-500'],
            ];
            @endphp
            @foreach($traits as $i => $t)
            <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-amber-500/30 transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
                <div class="w-12 h-12 bg-gradient-to-br {{ $t['warna'] }} rounded-xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas {{ $t['ikon'] }} text-white text-lg"></i>
                </div>
                <h3 class="text-white font-bold text-sm mb-2">{{ $t['judul'] }}</h3>
                <p class="text-gray-400 text-xs leading-relaxed">{{ $t['desk'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- WARISAN BUDAYA --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-4xl mx-auto px-4">
        <div class="bg-kvt-900/80 border border-amber-700/20 rounded-3xl p-10 text-center" data-aos="zoom-in">
            <div class="w-16 h-16 bg-gradient-to-br from-amber-400 to-yellow-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                <i class="fas fa-landmark text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-black text-white mb-4">Warisan Budaya Nusantara</h2>
            <p class="text-gray-400 leading-relaxed mb-6 max-w-2xl mx-auto">
                Bejotaro merepresentasikan <span class="text-amber-400 font-semibold">kekayaan budaya Nusantara</span> dalam ekosistem digital KVT.
                Terinspirasi dari kisah <strong class="text-white">Pandawa</strong> dan mitologi <strong class="text-white">Naga Antaboga</strong>,
                ia menjadi jembatan antara warisan leluhur dan teknologi modern. Setiap kebijaksanaannya adalah cerminan dari
                ajaran para leluhur yang telah berabad-abad menjaga keharmonisan Nusantara.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Inspirasi</span>
                    <span class="text-white font-bold text-sm">Pandawa & Antaboga</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Julukan</span>
                    <span class="text-white font-bold text-sm">Sang Leluhur</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">File</span>
                    <span class="text-amber-400 font-bold text-sm font-mono">the_antaboga.kvt</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Sifat Utama</span>
                    <span class="text-white font-bold text-sm">Serius, Bijak, Ramah</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HUBUNGAN DENGAN ALIANSI --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-amber-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-link mr-2"></i>Koneksi</span>
            <h2 class="text-4xl font-black text-white mt-2">Hubungan dengan Aliansi</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Peran Bejotaro dalam aliansi 5 karakter ekosistem KVT</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-kvt-900/50 border border-amber-700/20 rounded-2xl p-8" data-aos="fade-right">
                <h3 class="text-amber-400 font-black text-lg mb-4"><i class="fas fa-users mr-2"></i>Peran dalam Tim</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Dalam aliansi, Bejotaro berperan sebagai <span class="text-amber-400 font-semibold">penasihat dan penjaga moral</span>.
                    Ia memastikan setiap keputusan tim sejalan dengan nilai-nilai luhur. Kebijaksanaannya sering menjadi kompas
                    ketika aliansi menghadapi dilema etis.
                </p>
                <div class="flex items-center gap-3 bg-kvt-800/50 rounded-xl p-3 border border-kvt-700/20">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-lg flex items-center justify-center">
                        <i class="fas fa-chess-king text-white text-sm"></i>
                    </div>
                    <div>
                        <span class="text-white font-bold text-sm block">Penasihat Utama</span>
                        <span class="text-gray-500 text-xs">Pembimbing arah dan keputusan aliansi</span>
                    </div>
                </div>
            </div>

            <div class="bg-kvt-900/50 border border-purple-700/20 rounded-2xl p-8" data-aos="fade-left">
                <h3 class="text-purple-400 font-black text-lg mb-4"><i class="fas fa-handshake mr-2"></i>Hubungan dengan Kuro</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Bejotaro dan Kuro saling melengkapi. Jika Kuro adalah kreativitas dan semangat, maka Bejotaro adalah
                    <span class="text-amber-400 font-semibold">kebijaksanaan dan ketenangan</span>. Bersama, mereka menciptakan
                    keseimbangan sempurna dalam aliansi.
                </p>
                <a href="{{ route('halaman.kuro') }}" class="inline-flex items-center gap-2 bg-purple-500/10 hover:bg-purple-500/20 text-purple-400 px-4 py-2 rounded-xl text-sm font-semibold transition border border-purple-500/20">
                    <i class="fas fa-user-secret"></i> Lihat Profil Kuro
                </a>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black text-white mb-4">Kenali Sang Leluhur</h2>
        <p class="text-gray-400 mb-8">Bejotaro — dari garis keturunan Pandawa, menjaga kebijaksanaan di dunia digital</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('halaman.kuro') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 hover:text-white px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-user-secret mr-2"></i>Lihat Profil Kuro
            </a>
            <a href="{{ route('halaman.donasi') }}" class="bg-gradient-to-r from-amber-500 to-yellow-500 hover:from-amber-400 hover:to-yellow-400 text-white px-8 py-3.5 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-heart mr-2"></i>Donasi
            </a>
        </div>
    </div>
</section>

@endsection
