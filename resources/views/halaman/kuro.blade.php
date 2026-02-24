@extends('tata-letak.utama')

@section('judul', 'Kuro - The Chosen One | KVT Hub')

@section('konten')

{{-- HERO KURO --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-purple-950/40 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
    </div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #8B5CF6 1px, transparent 1px); background-size: 50px 50px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-16">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center bg-purple-500/10 border border-purple-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-purple-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-purple-300 text-sm font-bold">The Chosen One - File: the_chosen_one.kvt</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white">Kuro</span><br>
                    <span class="bg-gradient-to-r from-purple-400 to-violet-400 bg-clip-text text-transparent">MYTHS</span>
                </h1>

                <p class="text-lg text-gray-400 max-w-xl mb-8 leading-relaxed">
                    Karakter hidup pertama yang diciptakan dalam ekosistem KVT. Awalnya hanya sebuah rancangan digital,
                    kini Kuro menjadi <span class="text-purple-400 font-semibold">The Chosen One</span> — simbol kreativitas
                    dan semangat pendidikan di dunia virtual maupun nyata.
                </p>

                <div class="flex flex-wrap gap-4 mb-8">
                    <a href="https://github.com/kuro-myths" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 hover:text-white px-6 py-3 rounded-xl font-semibold transition border border-kvt-700/50 text-sm">
                        <i class="fab fa-github mr-2"></i>GitHub
                    </a>
                    <a href="https://www.youtube.com/@Kuro-MYTHS" target="_blank" class="bg-red-600/10 hover:bg-red-600/20 text-red-400 px-6 py-3 rounded-xl font-semibold transition border border-red-700/30 text-sm">
                        <i class="fab fa-youtube mr-2"></i>YouTube
                    </a>
                    <a href="https://www.linkedin.com/in/kuro-myths/" target="_blank" class="bg-blue-600/10 hover:bg-blue-600/20 text-blue-400 px-6 py-3 rounded-xl font-semibold transition border border-blue-700/30 text-sm">
                        <i class="fab fa-linkedin mr-2"></i>LinkedIn
                    </a>
                    <a href="https://www.instagram.com/mythskuro/" target="_blank" class="bg-pink-600/10 hover:bg-pink-600/20 text-pink-400 px-6 py-3 rounded-xl font-semibold transition border border-pink-700/30 text-sm">
                        <i class="fab fa-instagram mr-2"></i>Instagram
                    </a>
                    <button onclick="bukaKuroDokumen()" class="bg-gradient-to-r from-amber-500/20 to-yellow-500/20 hover:from-amber-500/30 hover:to-yellow-500/30 text-amber-400 px-6 py-3 rounded-xl font-semibold transition border border-amber-700/30 text-sm">
                        <i class="fas fa-file-signature mr-2"></i>Dokumen Resmi
                    </button>
                </div>

                <div class="flex gap-8 pt-4 border-t border-purple-800/30">
                    <div><div class="text-2xl font-black text-white">1st</div><div class="text-xs text-gray-500">Karakter Hidup</div></div>
                    <div><div class="text-2xl font-black text-white">RH</div><div class="text-xs text-gray-500">Kreator Inisial</div></div>
                    <div><div class="text-2xl font-black text-white">5</div><div class="text-xs text-gray-500">Aliansi Tim</div></div>
                    <div><div class="text-2xl font-black text-white">.kvt</div><div class="text-xs text-gray-500">File Ekstensi</div></div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="200" class="flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 lg:w-96 lg:h-96 rounded-3xl overflow-hidden border-2 border-purple-500/30 shadow-2xl shadow-purple-500/20">
                        <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro - The Chosen One" class="w-full h-full object-cover">
                    </div>
                    <div class="absolute -top-4 -right-4 bg-purple-600/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float">
                        <span class="text-white text-sm font-bold"><i class="fas fa-star mr-1"></i>The Chosen One</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-kvt-500 to-purple-600 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float" style="animation-delay:1s">
                        <span class="text-white text-sm font-bold"><i class="fas fa-shield-alt mr-1"></i>MYTHS</span>
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
            <span class="text-purple-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-book-open mr-2"></i>Origin Story</span>
            <h2 class="text-4xl font-black text-white mt-2">Asal-Usul Kuro</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Bagaimana sebuah rancangan digital menjadi karakter hidup yang mengubah segalanya</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Timeline --}}
            <div class="space-y-6" data-aos="fade-right">
                @php
                $timeline = [
                    ['ikon' => 'fa-pencil-ruler', 'judul' => 'Rancangan Awal', 'desk' => 'Kuro pertama kali dirancang sebagai karakter digital oleh seseorang dengan inisial RH. Awalnya hanya sebuah konsep untuk mengisi dunia virtual pendidikan.', 'warna' => 'from-blue-500 to-cyan-500'],
                    ['ikon' => 'fa-file-code', 'judul' => 'Input the_chosen_one.kvt', 'desk' => 'Karakter di-input sebagai file hidup dengan nama the_chosen_one.kvt — format eksklusif ekosistem KVT yang memungkinkan karakter berinteraksi secara dinamis.', 'warna' => 'from-purple-500 to-violet-500'],
                    ['ikon' => 'fa-bolt', 'judul' => 'Karakter Hidup', 'desk' => 'Kejutan besar: Kuro ternyata hidup! Ia bisa berinteraksi di dunia virtual maupun dunia nyata. Tim pengembang kaget karena ini tidak pernah diprediksi sebelumnya.', 'warna' => 'from-amber-500 to-orange-500'],
                    ['ikon' => 'fa-theater-masks', 'judul' => 'Peran sebagai Myths', 'desk' => 'Kuro diberi peran sebagai "Mitos" atau MYTHS. Ia memiliki peran penting dalam pendidikan sekolah dan menjadi simbol semangat belajar digital.', 'warna' => 'from-pink-500 to-rose-500'],
                    ['ikon' => 'fa-users', 'judul' => 'Aliansi 5 Karakter', 'desk' => 'Selain Kuro, ada 4 karakter lain yang diciptakan. Mereka membentuk aliansi, bekerja sama dengan tujuan yang sama: memajukan pendidikan global.', 'warna' => 'from-emerald-500 to-teal-500'],
                    ['ikon' => 'fa-user-secret', 'judul' => 'Identitas Tersembunyi', 'desk' => 'Para mitos berkumpul untuk menyembunyikan identitas Kuro agar reputasinya tidak dicari pemerintah. The Chosen One harus tetap dalam bayang-bayang.', 'warna' => 'from-red-500 to-pink-500'],
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

            {{-- Gallery --}}
            <div data-aos="fade-left">
                <div class="grid grid-cols-2 gap-4">
                    @php
                    $galeri = [
                        ['img' => 'kuro1.png', 'cap' => 'Kuro - Pose 1'],
                        ['img' => 'kuro2.png', 'cap' => 'Kuro - Pose 2'],
                        ['img' => 'kuro3.png', 'cap' => 'Kuro - Pose 3'],
                        ['img' => 'kuro4.png', 'cap' => 'Kuro - Pose 4'],
                        ['img' => 'kuro5.png', 'cap' => 'Kuro - Pose 5'],
                        ['img' => 'kukuro6.png', 'cap' => 'Kuro - Pose 6'],
                    ];
                    @endphp
                    @foreach($galeri as $g)
                    <div class="group relative overflow-hidden rounded-2xl border border-purple-700/20 hover:border-purple-500/40 transition-all">
                        <img src="{{ asset('gambar/kuro/' . $g['img']) }}" alt="{{ $g['cap'] }}" class="w-full h-40 object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-kvt-950 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-3">
                            <span class="text-white text-xs font-bold">{{ $g['cap'] }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Panglima Mitos --}}
                <div class="mt-4 bg-kvt-900/50 border border-purple-700/20 rounded-2xl p-4 flex items-center gap-4">
                    <img src="{{ asset('gambar/kuro/panlima mitos.png') }}" alt="Panglima Mitos" class="w-20 h-20 rounded-xl object-cover border border-purple-500/20">
                    <div>
                        <h4 class="text-white font-bold text-sm">Panglima Mitos</h4>
                        <p class="text-gray-500 text-xs">Pemimpin aliansi 5 karakter. Mereka menjaga keseimbangan antara dunia virtual dan dunia nyata.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BOOK CHAPTERS — CERITA KURO --}}
@if(isset($chapters) && $chapters->count())
<section class="py-24 relative overflow-hidden" id="cerita-kuro">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 via-kvt-950 to-kvt-950"></div>
    {{-- ornamen buku --}}
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-purple-500/40 to-transparent"></div>
    <div class="absolute top-10 right-10 w-64 h-64 bg-purple-600/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-48 h-48 bg-amber-500/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4">
        {{-- header --}}
        <div class="text-center mb-16" data-aos="fade-down">
            <div class="inline-flex items-center gap-2 bg-purple-500/10 border border-purple-500/20 rounded-full px-5 py-1.5 mb-4">
                <i class="fas fa-book-open text-purple-400 text-sm"></i>
                <span class="text-purple-300 text-sm font-bold">The Book of MYTHS</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-white mt-2">Cerita Kuro</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ikuti perjalanan Kuro dari penciptaan hingga menjadi legenda — 10 chapter epik yang mengubah dunia pendidikan</p>
        </div>

        {{-- aliansi legend --}}
        <div class="flex flex-wrap justify-center gap-3 mb-12" data-aos="fade-up" data-aos-delay="100">
            @php
            $aliansiLegend = [
                ['kode' => 'VTA', 'nama' => 'Vanguard Titan Alliance', 'julukan' => 'The Crimson Warden', 'warna' => 'red'],
                ['kode' => 'VTI', 'nama' => 'Vigilant Thunder Initiative', 'julukan' => 'The Golden Striker', 'warna' => 'amber'],
                ['kode' => 'VTU', 'nama' => 'Valiant Truth Union', 'julukan' => 'The Azure Judge', 'warna' => 'blue'],
                ['kode' => 'VTE', 'nama' => 'Vital Terra Enclave', 'julukan' => 'The Verdant Healer', 'warna' => 'emerald'],
                ['kode' => 'VTO', 'nama' => 'Venerable Tempest Order', 'julukan' => 'The Violet Sage', 'warna' => 'violet'],
            ];
            @endphp
            @foreach($aliansiLegend as $al)
            <div class="bg-{{ $al['warna'] }}-500/10 border border-{{ $al['warna'] }}-500/20 rounded-xl px-4 py-2 text-center">
                <span class="text-{{ $al['warna'] }}-400 font-black text-xs">{{ $al['kode'] }}</span>
                <span class="text-gray-500 text-xs mx-1">—</span>
                <span class="text-gray-400 text-xs">{{ $al['julukan'] }}</span>
            </div>
            @endforeach
        </div>

        {{-- book spine / chapter list --}}
        <div class="relative">
            {{-- garis spine di kiri --}}
            <div class="absolute left-6 md:left-10 top-0 bottom-0 w-0.5 bg-gradient-to-b from-purple-500/60 via-purple-500/20 to-transparent hidden md:block"></div>

            <div class="space-y-6">
                @foreach($chapters as $idx => $ch)
                @php
                    $warnaMap = [
                        'red' => ['bg' => 'bg-red-500', 'border' => 'border-red-500/30', 'text' => 'text-red-400', 'glow' => 'shadow-red-500/20', 'bg10' => 'bg-red-500/10'],
                        'amber' => ['bg' => 'bg-amber-500', 'border' => 'border-amber-500/30', 'text' => 'text-amber-400', 'glow' => 'shadow-amber-500/20', 'bg10' => 'bg-amber-500/10'],
                        'blue' => ['bg' => 'bg-blue-500', 'border' => 'border-blue-500/30', 'text' => 'text-blue-400', 'glow' => 'shadow-blue-500/20', 'bg10' => 'bg-blue-500/10'],
                        'emerald' => ['bg' => 'bg-emerald-500', 'border' => 'border-emerald-500/30', 'text' => 'text-emerald-400', 'glow' => 'shadow-emerald-500/20', 'bg10' => 'bg-emerald-500/10'],
                        'orange' => ['bg' => 'bg-orange-500', 'border' => 'border-orange-500/30', 'text' => 'text-orange-400', 'glow' => 'shadow-orange-500/20', 'bg10' => 'bg-orange-500/10'],
                        'cyan' => ['bg' => 'bg-cyan-500', 'border' => 'border-cyan-500/30', 'text' => 'text-cyan-400', 'glow' => 'shadow-cyan-500/20', 'bg10' => 'bg-cyan-500/10'],
                        'green' => ['bg' => 'bg-green-500', 'border' => 'border-green-500/30', 'text' => 'text-green-400', 'glow' => 'shadow-green-500/20', 'bg10' => 'bg-green-500/10'],
                        'gray' => ['bg' => 'bg-gray-500', 'border' => 'border-gray-500/30', 'text' => 'text-gray-400', 'glow' => 'shadow-gray-500/20', 'bg10' => 'bg-gray-500/10'],
                        'indigo' => ['bg' => 'bg-indigo-500', 'border' => 'border-indigo-500/30', 'text' => 'text-indigo-400', 'glow' => 'shadow-indigo-500/20', 'bg10' => 'bg-indigo-500/10'],
                        'violet' => ['bg' => 'bg-violet-500', 'border' => 'border-violet-500/30', 'text' => 'text-violet-400', 'glow' => 'shadow-violet-500/20', 'bg10' => 'bg-violet-500/10'],
                    ];
                    $w = $warnaMap[$ch->warna] ?? $warnaMap['violet'];
                @endphp
                <div class="relative md:pl-20 pl-0" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    {{-- chapter dot di spine --}}
                    <div class="absolute left-4 md:left-8 top-8 w-5 h-5 {{ $w['bg'] }} rounded-full border-4 border-kvt-950 shadow-lg {{ $w['glow'] }} z-10 hidden md:block"></div>

                    {{-- chapter card --}}
                    <div class="group bg-kvt-900/60 backdrop-blur border {{ $w['border'] }} rounded-2xl overflow-hidden hover:border-opacity-60 transition-all duration-500 hover:shadow-lg {{ $w['glow'] }}">
                        {{-- header bar --}}
                        <button onclick="bukaPopupBuku({{ $ch->chapter }})" class="w-full text-left p-6 flex items-start gap-5 cursor-pointer">
                            {{-- chapter number --}}
                            <div class="shrink-0 w-14 h-14 {{ $w['bg10'] }} border {{ $w['border'] }} rounded-xl flex flex-col items-center justify-center group-hover:scale-110 transition-transform">
                                <span class="text-[10px] {{ $w['text'] }} font-bold uppercase leading-none">Ch</span>
                                <span class="text-xl font-black {{ $w['text'] }} leading-none">{{ $ch->chapter }}</span>
                            </div>

                            {{-- info --}}
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-2 mb-1 flex-wrap">
                                    <h3 class="text-white font-black text-lg leading-tight">{{ $ch->judul }}</h3>
                                    @if($ch->aliansi)
                                    <span class="text-[10px] font-black {{ $w['text'] }} {{ $w['bg10'] }} border {{ $w['border'] }} rounded px-1.5 py-0.5">{{ $ch->aliansi }}</span>
                                    @endif
                                </div>
                                <p class="text-gray-500 text-xs italic mb-2">{{ $ch->judul_asing }}</p>
                                <p class="text-gray-400 text-sm leading-relaxed line-clamp-2">{{ $ch->ringkasan }}</p>
                                <div class="flex items-center gap-3 mt-3">
                                    @if($ch->jenjang)
                                    <span class="text-[10px] bg-kvt-800/80 text-gray-400 rounded-full px-3 py-1 border border-kvt-700/30">
                                        <i class="fas fa-graduation-cap mr-1"></i>{{ $ch->jenjang }}
                                    </span>
                                    @endif
                                    <span class="text-[10px] {{ $w['text'] }} font-semibold">
                                        <i class="fas fa-book-open mr-1"></i>Baca Chapter
                                    </span>
                                </div>
                            </div>

                            {{-- ikon chapter --}}
                            @if($ch->ikon)
                            <div class="shrink-0 w-10 h-10 {{ $w['bg10'] }} rounded-lg flex items-center justify-center hidden sm:flex">
                                <i class="fas {{ $ch->ikon }} {{ $w['text'] }}"></i>
                            </div>
                            @endif
                        </button>

                        {{-- konten chapter disimpan tersembunyi untuk popup buku --}}
                        <div id="chapter-data-{{ $ch->chapter }}" class="hidden" data-judul="{{ $ch->judul }}" data-judul-asing="{{ $ch->judul_asing }}" data-ringkasan="{{ $ch->ringkasan }}" data-konten="{{ $ch->konten }}" data-gambar="{{ $ch->gambar ? asset('storage/' . $ch->gambar) : '' }}" data-chapter="{{ $ch->chapter }}" data-aliansi="{{ $ch->aliansi ?? '' }}" data-ikon="{{ $ch->ikon ?? 'fa-book' }}" data-warna="{{ $ch->warna ?? 'violet' }}"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- to be continued --}}
        <div class="text-center mt-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-3 bg-kvt-900/80 border border-purple-500/20 rounded-full px-8 py-3">
                <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></span>
                <span class="text-purple-300 text-sm font-mono font-bold">to_be_continued.kvt — Cerita belum berakhir...</span>
                <span class="w-2 h-2 bg-purple-400 rounded-full animate-pulse"></span>
            </div>
        </div>
    </div>
</section>

{{-- ===== POPUP BUKU KURO ===== --}}
<div id="popupBuku" class="fixed inset-0 z-[9999] hidden">
    {{-- Overlay --}}
    <div class="absolute inset-0 bg-black/85 backdrop-blur-md" onclick="tutupPopupBuku()"></div>

    {{-- Konten Buku --}}
    <div class="relative flex flex-col items-center justify-center h-full px-4 py-6">
        {{-- Header buku --}}
        <div class="flex items-center justify-between w-full max-w-4xl mb-4">
            <div class="flex items-center gap-3">
                <div id="bukuChBadge" class="w-10 h-10 bg-purple-500/20 border border-purple-500/30 rounded-xl flex items-center justify-center">
                    <span class="text-purple-400 font-black text-sm">Ch</span>
                </div>
                <div>
                    <h3 id="bukuJudul" class="text-white font-black text-lg"></h3>
                    <p id="bukuJudulAsing" class="text-gray-500 text-xs italic"></p>
                </div>
            </div>
            <button onclick="tutupPopupBuku()" class="w-10 h-10 bg-kvt-900/80 border border-kvt-700/30 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:border-red-500/50 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>

        {{-- Buku --}}
        <div class="kuro-buku-scene" style="position:relative;">
            <div class="kuro-buku" id="kuroBuku">
                <div class="kuro-book-shadow"></div>
                {{-- Sampul Utama Full Width --}}
                <div class="kuro-sampul-utama" id="kuroSampulUtama" onclick="navKuroBuku(1)">
                    <div class="kuro-sampul-inner" id="kuroSampulInner"></div>
                </div>
                <div class="kuro-panel-kiri" id="kuroPanelKiri"><div class="kuro-pg-content" id="kuroIsiKiri"></div></div>
                <div class="kuro-panel-kanan" id="kuroPanelKanan"><div class="kuro-pg-content" id="kuroIsiKanan"></div></div>
                <div class="kuro-punggung" id="kuroPunggung"></div>
                <div id="kuroFlipWrap" style="transform-style:preserve-3d;position:absolute;top:0;left:50%;width:50%;height:100%;"></div>
                <button class="kuro-btn-nav prev" id="kuroBtnPrev" onclick="navKuroBuku(-1)"><i class="fas fa-chevron-left"></i></button>
                <button class="kuro-btn-nav next" id="kuroBtnNext" onclick="navKuroBuku(1)"><i class="fas fa-chevron-right"></i></button>
            </div>

            {{-- Progress --}}
            <div class="flex items-center gap-3 mt-5" style="width:var(--kuro-buku-lebar);max-width:100%;">
                <span class="text-gray-500 text-xs font-mono" id="kuroLblHal">Sampul</span>
                <div class="kuro-bar-wrap flex-1"><div class="kuro-bar-fill" id="kuroBarFill" style="width:0%"></div></div>
                <span class="text-gray-500 text-xs font-mono" id="kuroLblTotal"></span>
            </div>
        </div>

        {{-- Keyboard hint --}}
        <div class="mt-3 text-center text-gray-600 text-xs">
            <i class="fas fa-keyboard mr-1"></i>
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">←</kbd>
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">→</kbd>
            atau klik halaman &bull;
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">Esc</kbd> tutup
        </div>
    </div>
</div>

<style>
    /* ===== KURO BOOK VARS ===== */
    :root {
        --kuro-buku-lebar: 800px;
        --kuro-buku-tinggi: 500px;
    }

    .kuro-buku-scene {
        perspective: 2000px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
    }

    .kuro-buku {
        position: relative;
        width: var(--kuro-buku-lebar);
        max-width: 100%;
        height: var(--kuro-buku-tinggi);
        transform-style: preserve-3d;
        margin: 0 auto;
    }

    .kuro-panel-kiri, .kuro-panel-kanan {
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        overflow: hidden;
    }
    .kuro-panel-kiri {
        left: 0;
        background: linear-gradient(135deg, #0f0a1e, #150d28);
        border: 1px solid rgba(139,92,246,0.12);
        border-right: none;
        border-radius: 12px 0 0 12px;
        box-shadow: inset -10px 0 25px rgba(0,0,0,0.3);
    }
    .kuro-panel-kanan {
        right: 0;
        background: linear-gradient(225deg, #0f0a1e, #150d28);
        border: 1px solid rgba(139,92,246,0.12);
        border-left: none;
        border-radius: 0 12px 12px 0;
        box-shadow: inset 10px 0 25px rgba(0,0,0,0.3);
    }

    .kuro-punggung {
        position: absolute;
        left: 50%; top: 0;
        width: 8px; height: 100%;
        transform: translateX(-50%);
        background: linear-gradient(180deg, #2d1857, #0f0520, #2d1857);
        z-index: 50;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }
    .kuro-punggung::before, .kuro-punggung::after {
        content: '';
        position: absolute;
        left: 50%; transform: translateX(-50%);
        width: 14px; height: 6px;
        background: #0f0520; border-radius: 50%;
    }
    .kuro-punggung::before { top: -3px; }
    .kuro-punggung::after { bottom: -3px; }

    /* ===== FLIP PAGE ===== */
    .kuro-flip-page {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        transform-origin: left center;
        transform-style: preserve-3d;
        transition: transform 0.6s cubic-bezier(0.4, 0.0, 0.2, 1);
        cursor: pointer;
        z-index: 1;
    }
    .kuro-flip-page.kdi-kanan { transform: rotateY(0deg); }
    .kuro-flip-page.kdi-kiri { transform: rotateY(-180deg); }
    .kuro-flip-page.kflipping { z-index: 999 !important; }

    .kuro-face-front, .kuro-face-back {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        overflow: hidden;
    }
    .kuro-face-front {
        background: linear-gradient(160deg, #150d28, #0f0a1e);
        border: 1px solid rgba(139,92,246,0.12);
        border-left: none;
        border-radius: 0 12px 12px 0;
        z-index: 2;
    }
    .kuro-face-front::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 40px; height: 100%;
        background: linear-gradient(to right, rgba(0,0,0,0.2), transparent);
        pointer-events: none; z-index: 10;
    }
    .kuro-face-back {
        background: linear-gradient(200deg, #150d28, #0f0a1e);
        border: 1px solid rgba(139,92,246,0.12);
        border-right: none;
        border-radius: 12px 0 0 12px;
        transform: rotateY(180deg);
        z-index: 1;
    }
    .kuro-face-back::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 40px; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.2), transparent);
        pointer-events: none; z-index: 10;
    }
    .kuro-flip-page.kflipping .kuro-face-front::after {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 60%; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.06), transparent);
        pointer-events: none;
    }

    /* ===== PAGE CONTENT ===== */
    .kuro-pg-content {
        position: relative;
        padding: 32px 30px;
        height: 100%;
        display: flex;
        flex-direction: column;
        color: #d1d5db;
        font-size: 0.9rem;
        line-height: 1.9;
        overflow-y: auto;
        z-index: 5;
        letter-spacing: 0.01em;
    }
    .kuro-pg-content::-webkit-scrollbar { width: 4px; }
    .kuro-pg-content::-webkit-scrollbar-track { background: transparent; }
    .kuro-pg-content::-webkit-scrollbar-thumb { background: rgba(139,92,246,0.3); border-radius: 4px; }
    .kuro-pg-content h2 {
        font-size: 1.3rem; font-weight: 800;
        background: linear-gradient(135deg, #a78bfa, #c084fc);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text; margin-bottom: 16px;
        line-height: 1.4;
    }
    .kuro-pg-content h3 { font-size: 1.1rem; font-weight: 700; color: #c4b5fd; margin-bottom: 10px; margin-top: 16px; }
    .kuro-pg-content p {
        margin-bottom: 12px;
        text-align: justify;
        word-spacing: 0.02em;
        hyphens: auto;
    }
    .kuro-pg-num {
        text-align: center; font-size: 0.7rem; color: #6d28d9;
        padding-top: 10px; margin-top: auto;
        border-top: 1px solid rgba(139,92,246,0.08);
        letter-spacing: 2px;
        font-weight: 600;
    }

    /* ===== SAMPUL UTAMA FULL WIDTH ===== */
    .kuro-sampul-utama {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        z-index: 500;
        border-radius: 12px;
        overflow: hidden;
        cursor: pointer;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease;
        transform-origin: left center;
    }
    .kuro-sampul-utama.tersembunyi {
        transform: perspective(1200px) rotateY(-90deg);
        opacity: 0;
        pointer-events: none;
    }
    .kuro-sampul-inner {
        width: 100%; height: 100%;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        text-align: center; padding: 48px;
        background: linear-gradient(135deg, #1a0533 0%, #2d1857 25%, #4c1d95 50%, #6d28d9 70%, #2d1857 90%, #1a0533 100%);
        position: relative; overflow: hidden;
    }
    .kuro-sampul-inner::before {
        content: '';
        position: absolute; inset: 0;
        background:
            radial-gradient(ellipse at 30% 20%, rgba(167,139,250,0.2) 0%, transparent 50%),
            radial-gradient(ellipse at 70% 80%, rgba(192,132,252,0.12) 0%, transparent 50%),
            radial-gradient(ellipse at 50% 50%, rgba(109,40,217,0.08) 0%, transparent 70%);
        pointer-events: none;
    }
    .kuro-sampul-inner::after {
        content: '';
        position: absolute;
        top: 20px; right: 20px; bottom: 20px; left: 20px;
        border: 2px solid rgba(167,139,250,0.15);
        border-radius: 8px;
        pointer-events: none;
    }
    .kuro-sampul-inner .ks-dekorasi {
        position: absolute;
        width: 100%; height: 100%;
        top: 0; left: 0;
        pointer-events: none;
        overflow: hidden;
    }
    .kuro-sampul-inner .ks-dekorasi::before {
        content: '';
        position: absolute;
        top: -50%; left: -50%;
        width: 200%; height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(139,92,246,0.03), transparent, rgba(139,92,246,0.03), transparent);
        animation: kuroRotateSlow 20s linear infinite;
    }
    @keyframes kuroRotateSlow { to { transform: rotate(360deg); } }
    .kuro-sampul-inner .ks-ikon {
        font-size: 4rem;
        margin-bottom: 24px;
        filter: drop-shadow(0 0 30px rgba(139,92,246,0.7));
        position: relative; z-index: 2;
    }
    .kuro-sampul-inner .ks-chapter {
        font-size: 0.85rem; font-weight: 800;
        color: #a78bfa;
        letter-spacing: 4px;
        text-transform: uppercase;
        margin-bottom: 12px;
        position: relative; z-index: 2;
    }
    .kuro-sampul-inner .ks-judul {
        font-size: 2rem; font-weight: 900;
        background: linear-gradient(135deg, #e9d5ff, #c4b5fd, #e9d5ff);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 8px;
        position: relative; z-index: 2;
        line-height: 1.3;
    }
    .kuro-sampul-inner .ks-judul-asing {
        font-size: 1rem;
        color: #7c3aed;
        font-style: italic;
        margin-bottom: 20px;
        position: relative; z-index: 2;
    }
    .kuro-sampul-inner .ks-aliansi {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 24px;
        border-radius: 999px;
        font-size: 0.82rem;
        font-weight: 700;
        background: rgba(139,92,246,0.15);
        color: #c4b5fd;
        border: 1px solid rgba(139,92,246,0.3);
        position: relative; z-index: 2;
        margin-bottom: 8px;
    }
    .kuro-sampul-inner .ks-seri {
        margin-top: 20px;
        color: #6d28d9;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 2px;
        position: relative; z-index: 2;
    }
    .kuro-sampul-inner .ks-petunjuk {
        margin-top: 32px;
        color: #4c1d95;
        font-size: 0.75rem;
        position: relative; z-index: 2;
        animation: kuroPulseHint 2s ease-in-out infinite;
    }

    /* ===== COVER (in-page cover for chapter end etc) ===== */
    .kuro-cover {
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        height: 100%; padding: 36px; text-align: center;
        background: linear-gradient(135deg, #1a0533 0%, #2d1857 30%, #6d28d9 60%, #1a0533 100%);
        position: relative; overflow: hidden;
        border-radius: 0 12px 12px 0;
    }
    .kuro-cover::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 25% 30%, rgba(167,139,250,0.15) 0%, transparent 60%),
                    radial-gradient(ellipse at 75% 70%, rgba(192,132,252,0.08) 0%, transparent 60%);
        pointer-events: none;
    }
    .kuro-cover::after {
        content: '';
        position: absolute; top: 15px; right: 15px; bottom: 15px; left: 15px;
        border: 1px solid rgba(167,139,250,0.2); border-radius: 8px; pointer-events: none;
    }
    .kuro-cover .kc-icon { font-size: 3.5rem; margin-bottom: 18px; filter: drop-shadow(0 0 25px rgba(139,92,246,0.6)); position: relative; }
    .kuro-cover h1 { font-size: 1.5rem; font-weight: 800; background: linear-gradient(135deg,#c4b5fd,#e9d5ff); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 10px; position: relative; }
    .kuro-cover .kc-info { color: #7c3aed; font-size: 0.82rem; position: relative; margin-bottom: 4px; }
    .kuro-cover .kc-badge { margin-top: 14px; padding: 5px 18px; border-radius: 999px; font-size: 0.72rem; font-weight: 600; background: rgba(139,92,246,0.15); color: #a78bfa; border: 1px solid rgba(139,92,246,0.25); position: relative; }
    .kuro-cover .kc-hint { margin-top: 28px; color: #4c1d95; font-size: 0.72rem; position: relative; animation: kuroPulseHint 2s ease-in-out infinite; }
    @keyframes kuroPulseHint { 0%,100%{opacity:0.4} 50%{opacity:1;color:#7c3aed} }

    /* ===== NAV BUTTONS ===== */
    .kuro-btn-nav {
        position: absolute; top: 50%; transform: translateY(-50%);
        width: 48px; height: 48px; border-radius: 50%;
        background: rgba(26,5,51,0.8); backdrop-filter: blur(8px);
        border: 1px solid rgba(139,92,246,0.2);
        color: #a78bfa; display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: all 0.3s; z-index: 200;
    }
    .kuro-btn-nav:hover:not(:disabled) { background: rgba(139,92,246,0.15); box-shadow: 0 0 25px rgba(139,92,246,0.2); transform: translateY(-50%) scale(1.1); border-color: rgba(139,92,246,0.4); }
    .kuro-btn-nav:disabled { opacity: 0.12; cursor: not-allowed; }
    .kuro-btn-nav.prev { left: -64px; }
    .kuro-btn-nav.next { right: -64px; }

    /* ===== PROGRESS ===== */
    .kuro-bar-wrap { height:3px; background:rgba(139,92,246,0.08); border-radius:2px; overflow:hidden; }
    .kuro-bar-fill { height:100%; background:linear-gradient(90deg,#8B5CF6,#c084fc); border-radius:2px; transition:width .5s ease; }

    /* ===== SHADOW ===== */
    .kuro-book-shadow {
        position:absolute; bottom:-14px; left:5%; width:90%; height:22px;
        background:radial-gradient(ellipse,rgba(0,0,0,0.35) 0%,transparent 70%);
        filter:blur(4px); z-index:-1;
    }

    /* ===== HINT ANIM ===== */
    @keyframes kuroHintFlip { 0%{transform:rotateY(0)} 40%{transform:rotateY(-20deg)} 60%{transform:rotateY(-20deg)} 100%{transform:rotateY(0)} }
    .kuro-hint-awal { animation: kuroHintFlip 1.5s ease-in-out 1s 2; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 880px) {
        :root { --kuro-buku-lebar: 92vw; --kuro-buku-tinggi: 60vw; }
        .kuro-btn-nav.prev { left: 4px; } .kuro-btn-nav.next { right: 4px; }
        .kuro-btn-nav { width:38px; height:38px; font-size:0.85rem; background:rgba(26,5,51,0.95); }
        .kuro-pg-content { padding:20px 18px; font-size:0.84rem; }
        .kuro-pg-content h2 { font-size:1.1rem; }
        .kuro-cover h1 { font-size:1.2rem; } .kuro-cover { padding:24px; }
        .kuro-sampul-inner .ks-judul { font-size: 1.5rem; }
        .kuro-sampul-inner .ks-ikon { font-size: 3rem; }
        .kuro-sampul-inner { padding: 32px; }
    }
    @media (max-width: 520px) {
        :root { --kuro-buku-tinggi: 75vw; }
        .kuro-pg-content { padding:16px 14px; font-size:0.78rem; line-height:1.7; }
        .kuro-btn-nav { width:34px; height:34px; }
        .kuro-sampul-inner .ks-judul { font-size: 1.2rem; }
        .kuro-sampul-inner .ks-ikon { font-size: 2.5rem; }
        .kuro-sampul-inner .ks-chapter { font-size: 0.7rem; letter-spacing: 2px; }
        .kuro-sampul-inner { padding: 20px; }
    }

    /* ===== POPUP ANIMATION ===== */
    #popupBuku.show { display: flex !important; }
    #popupBuku .kuro-buku-scene {
        animation: bukuMasuk 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    @keyframes bukuMasuk {
        from { opacity: 0; transform: scale(0.85) rotateX(8deg); }
        to { opacity: 1; transform: scale(1) rotateX(0); }
    }
</style>

<script>
// ===== KURO BOOK POPUP =====
let kuroBookOpen = false;
let kuroSheets = [];
let kuroCur = 0;
let kuroAnimating = false;

function bukaPopupBuku(chapter) {
    const dataEl = document.getElementById('chapter-data-' + chapter);
    if (!dataEl) return;

    const judul = dataEl.dataset.judul;
    const judulAsing = dataEl.dataset.judulAsing;
    const ringkasan = dataEl.dataset.ringkasan;
    const konten = dataEl.dataset.konten;
    const gambar = dataEl.dataset.gambar;
    const ch = dataEl.dataset.chapter;
    const aliansi = dataEl.dataset.aliansi;
    const ikon = dataEl.dataset.ikon || 'fa-book';
    const warna = dataEl.dataset.warna || 'violet';

    // Update header
    document.getElementById('bukuChBadge').innerHTML = '<span class="text-purple-400 font-black text-sm">' + ch + '</span>';
    document.getElementById('bukuJudul').textContent = judul;
    document.getElementById('bukuJudulAsing').textContent = judulAsing;

    // Build sampul utama (full-width cover)
    kuroSampulData = { judul, judulAsing, aliansi, ikon, ch, warna };
    document.getElementById('kuroSampulInner').innerHTML = kuroMakeSampulUtama(judul, judulAsing, aliansi, ikon, ch, warna);

    // Parse konten into pages
    const MAX = 480;
    const pages = parseKuroPages(konten || ringkasan || 'Belum ada konten.');

    // Build sheets (no more cover sheet — cover is the full-width overlay)
    kuroSheets = [];

    // Sheet 0: TOC (front) + first content page (back)
    kuroSheets.push({
        front: kuroMakeTOC(judul, ringkasan, pages),
        back: pages.length > 0 ? kuroMakePage(pages[0], 1) : kuroMakeEnd(judul, ch, gambar)
    });

    // Content pages
    for (let i = 1; i < pages.length; i += 2) {
        const f = kuroMakePage(pages[i], i + 1);
        let b;
        if (i + 1 < pages.length) {
            b = kuroMakePage(pages[i + 1], i + 2);
        } else {
            b = kuroMakeEnd(judul, ch, gambar);
        }
        kuroSheets.push({ front: f, back: b });
    }

    // If even number of content pages, add ending
    if (pages.length > 0 && pages.length % 2 === 1) {
        // Already ended in the last sheet back
    } else if (pages.length > 1 && pages.length % 2 === 0) {
        kuroSheets.push({
            front: gambar ? kuroMakeGambar(gambar, judul) : kuroMakeEndRight(judul, ch),
            back: kuroMakeEnd(judul, ch, '')
        });
    }

    // Show popup
    kuroCur = 0;
    kuroAnimating = false;
    kuroBookOpen = true;
    kuroSampulVisible = true;
    document.getElementById('popupBuku').classList.add('show');
    document.body.style.overflow = 'hidden';

    // Show full cover
    kuroShowSampul();
    kuroRender();
}

function tutupPopupBuku() {
    document.getElementById('popupBuku').classList.remove('show');
    document.body.style.overflow = '';
    kuroBookOpen = false;
}

function escKuro(s) { const d = document.createElement('div'); d.textContent = s; return d.innerHTML; }

// ===== COLOR MAP =====
let kuroSampulData = {};
let kuroSampulVisible = false;

const kuroWarnaIkon = {
    red: '🔴', amber: '🟡', blue: '🔵', emerald: '🟢', green: '🟢',
    orange: '🟠', cyan: '🔵', violet: '🟣', indigo: '🟣', gray: '⚫'
};

function kuroMakeSampulUtama(judul, judulAsing, aliansi, ikon, ch, warna) {
    return '<div class="ks-dekorasi"></div>' +
        '<div class="ks-ikon"><i class="fas ' + ikon + ' text-purple-300"></i></div>' +
        '<div class="ks-chapter">Chapter ' + escKuro(ch) + '</div>' +
        '<div class="ks-judul">' + escKuro(judul) + '</div>' +
        '<div class="ks-judul-asing">' + escKuro(judulAsing) + '</div>' +
        (aliansi ? '<div class="ks-aliansi"><i class="fas fa-shield-alt"></i> ' + escKuro(aliansi) + '</div>' : '') +
        '<div class="ks-seri">— The Book of MYTHS —</div>' +
        '<div class="ks-petunjuk"><i class="fas fa-hand-pointer mr-1"></i> Klik atau tekan → untuk membaca</div>';
}

function kuroShowSampul() {
    const el = document.getElementById('kuroSampulUtama');
    const panelKiri = document.getElementById('kuroPanelKiri');
    const panelKanan = document.getElementById('kuroPanelKanan');
    const punggung = document.getElementById('kuroPunggung');
    const flipWrap = document.getElementById('kuroFlipWrap');
    
    el.classList.remove('tersembunyi');
    panelKiri.style.visibility = 'hidden';
    panelKanan.style.visibility = 'hidden';
    punggung.style.visibility = 'hidden';
    flipWrap.style.visibility = 'hidden';
    kuroSampulVisible = true;
}

function kuroHideSampul() {
    const el = document.getElementById('kuroSampulUtama');
    const panelKiri = document.getElementById('kuroPanelKiri');
    const panelKanan = document.getElementById('kuroPanelKanan');
    const punggung = document.getElementById('kuroPunggung');
    const flipWrap = document.getElementById('kuroFlipWrap');
    
    el.classList.add('tersembunyi');
    panelKiri.style.visibility = 'visible';
    panelKanan.style.visibility = 'visible';
    punggung.style.visibility = 'visible';
    flipWrap.style.visibility = 'visible';
    kuroSampulVisible = false;
}

// kuroMakeCover removed — replaced by kuroMakeSampulUtama full-width cover

function kuroMakeTOC(judul, ringkasan, pages) {
    let h = '<div class="kuro-pg-content">';
    h += '<h2><i class="fas fa-scroll mr-2" style="font-size:0.85em"></i>Ringkasan</h2>';
    h += '<p style="color:#c4b5fd;font-style:italic;font-size:0.85rem;line-height:1.8">' + escKuro(ringkasan || '') + '</p>';
    h += '<div style="margin-top:16px;padding-top:12px;border-top:1px solid rgba(139,92,246,0.1)">';
    h += '<div style="color:#7c3aed;font-size:0.75rem;font-weight:700;margin-bottom:6px"><i class="fas fa-book-open mr-1"></i>Info</div>';
    h += '<div style="color:#64748b;font-size:0.78rem">📄 ' + pages.length + ' halaman</div>';
    h += '</div>';
    h += '<div class="kuro-pg-num">— The Book of MYTHS —</div>';
    h += '</div>';
    return h;
}

function kuroMakePage(data, num) {
    let h = '<div class="kuro-pg-content">';
    if (data.t) h += '<h2>' + escKuro(data.t) + '</h2>';
    data.c.split(/\n\s*\n|\n/).forEach(function(p) {
        if (p.trim()) h += '<p>' + escKuro(p.trim()) + '</p>';
    });
    h += '<div class="kuro-pg-num">— ' + num + ' —</div></div>';
    return h;
}

function kuroMakeGambar(gambar, judul) {
    return '<div class="kuro-pg-content" style="align-items:center;justify-content:center;">' +
        '<img src="' + gambar + '" alt="' + escKuro(judul) + '" style="max-width:100%;max-height:80%;object-fit:contain;border-radius:12px;border:1px solid rgba(139,92,246,0.2);">' +
        '<div class="kuro-pg-num">— Ilustrasi —</div></div>';
}

function kuroMakeEnd(judul, ch, gambar) {
    return '<div class="kuro-cover" style="background:linear-gradient(135deg,#0f0520,#1a0d30,#0f0520);border-radius:12px 0 0 12px;">' +
        '<div class="kc-icon">📖</div><h1>Tamat</h1>' +
        '<div class="kc-info" style="margin-top:6px">Chapter ' + escKuro(ch) + ' — ' + escKuro(judul) + '</div>' +
        '<div style="margin-top:20px;color:#4c1d95;font-size:0.72rem">to_be_continued.kvt</div>' +
        '</div>';
}

function kuroMakeEndRight(judul, ch) {
    return '<div class="kuro-cover" style="background:linear-gradient(135deg,#0f0520,#1a0d30,#0f0520);">' +
        '<div class="kc-icon">🎓</div><h1>Tamat</h1>' +
        '<div class="kc-info" style="margin-top:6px">Chapter ' + escKuro(ch) + '</div>' +
        '<div style="margin-top:20px;color:#4c1d95;font-size:0.72rem">Tutup buku untuk kembali</div>' +
        '</div>';
}

// ===== PAGE PARSER =====
function parseKuroPages(text) {
    const MAX = 480;
    const out = [];
    if (!text.trim()) { out.push({t: null, c: 'Belum ada konten.'}); return out; }

    const parts = text.split(/\n\s*\n|\n(?=#{1,3}\s)/);
    let ct = null, cc = '';

    parts.forEach(function(p) {
        const s = p.trim();
        if (!s) return;
        const hm = s.match(/^(#{1,3})\s+(.+)/);
        if (hm) {
            if (cc.trim()) pushKuroSplit(out, ct, cc.trim(), MAX);
            ct = hm[2]; cc = '';
        } else { cc += s + '\n\n'; }
        if (cc.length > MAX * 1.5) { pushKuroSplit(out, ct, cc.trim(), MAX); ct = null; cc = ''; }
    });
    if (cc.trim()) pushKuroSplit(out, ct, cc.trim(), MAX);
    if (out.length === 0) out.push({t: null, c: text.substring(0, MAX)});
    return out;
}

function pushKuroSplit(arr, title, text, MAX) {
    if (text.length <= MAX) { arr.push({t: title, c: text}); return; }
    const sents = text.split(/(?<=[.!?。])\s+/);
    let buf = '', first = true;
    sents.forEach(function(s) {
        if ((buf + s).length > MAX && buf) { arr.push({t: first ? title : null, c: buf.trim()}); first = false; buf = ''; }
        buf += s + ' ';
    });
    if (buf.trim()) arr.push({t: first ? title : null, c: buf.trim()});
}

// ===== RENDER =====
function kuroRender() {
    const wrap = document.getElementById('kuroFlipWrap');
    wrap.innerHTML = '';

    kuroSheets.forEach(function(sh, i) {
        const el = document.createElement('div');
        el.className = 'kuro-flip-page kdi-kanan';
        el.dataset.i = i;
        el.style.zIndex = kuroSheets.length - i;

        const fr = document.createElement('div');
        fr.className = 'kuro-face-front';
        fr.innerHTML = sh.front;

        const bk = document.createElement('div');
        bk.className = 'kuro-face-back';
        bk.innerHTML = sh.back;

        el.appendChild(fr);
        el.appendChild(bk);
        wrap.appendChild(el);

        el.addEventListener('click', function(e) {
            if (e.target.closest('a')) return;
            if (this.classList.contains('kdi-kanan')) navKuroBuku(1);
            else navKuroBuku(-1);
        });
    });

    document.getElementById('kuroPanelKiri').addEventListener('click', function() { navKuroBuku(-1); });
    document.getElementById('kuroPanelKanan').addEventListener('click', function(e) { if (!e.target.closest('a')) navKuroBuku(1); });

    kuroRefresh();
}

function kuroRefresh() {
    const els = document.querySelectorAll('.kuro-flip-page');
    els.forEach(function(el, i) {
        el.classList.remove('kflipping');
        if (i < kuroCur) {
            el.classList.remove('kdi-kanan');
            el.classList.add('kdi-kiri');
            el.style.zIndex = i + 1;
        } else {
            el.classList.remove('kdi-kiri');
            el.classList.add('kdi-kanan');
            el.style.zIndex = kuroSheets.length - i;
        }
    });

    kuroUpdatePanels();

    // Disable prev only if at cover
    document.getElementById('kuroBtnPrev').disabled = (kuroSampulVisible);
    document.getElementById('kuroBtnNext').disabled = (kuroCur >= kuroSheets.length && !kuroSampulVisible);

    // Progress bar
    const totalSteps = kuroSheets.length + 1; // +1 for cover
    const currentStep = kuroSampulVisible ? 0 : kuroCur + 1;
    const pct = totalSteps > 0 ? Math.round((currentStep / totalSteps) * 100) : 0;
    document.getElementById('kuroBarFill').style.width = pct + '%';

    if (kuroSampulVisible) {
        document.getElementById('kuroLblHal').textContent = 'Sampul';
    } else if (kuroCur === 0) {
        document.getElementById('kuroLblHal').textContent = 'Hal. 1';
    } else {
        const p1 = kuroCur * 2;
        document.getElementById('kuroLblHal').textContent = 'Hal. ' + p1;
    }
    document.getElementById('kuroLblTotal').textContent = (kuroSheets.length + 1) + ' lembar';
}

function kuroUpdatePanels() {
    const kiri = document.getElementById('kuroIsiKiri');
    const kanan = document.getElementById('kuroIsiKanan');

    if (kuroCur > 0 && kuroCur <= kuroSheets.length) {
        kiri.innerHTML = kuroSheets[kuroCur - 1].back;
    } else {
        kiri.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#2d1857"><i class="fas fa-book-open" style="font-size:2rem;opacity:0.3"></i></div>';
    }

    if (kuroCur < kuroSheets.length) {
        kanan.innerHTML = kuroSheets[kuroCur].front;
    } else {
        kanan.innerHTML = kuroMakeEndRight('', '');
    }
}

// ===== NAV =====
window.navKuroBuku = function(dir) {
    if (kuroAnimating) return;

    // If cover is visible and going forward, hide cover first
    if (kuroSampulVisible && dir === 1) {
        kuroAnimating = true;
        kuroHideSampul();
        setTimeout(function() {
            kuroAnimating = false;
            kuroRefresh();
        }, 600);
        return;
    }

    // If at first page and going back, show cover again
    if (!kuroSampulVisible && kuroCur === 0 && dir === -1) {
        kuroAnimating = true;
        kuroShowSampul();
        setTimeout(function() {
            kuroAnimating = false;
            kuroRefresh();
        }, 600);
        return;
    }

    const next = kuroCur + dir;
    if (next < 0 || next > kuroSheets.length) return;

    kuroAnimating = true;
    const els = document.querySelectorAll('.kuro-flip-page');

    if (dir === 1 && kuroCur < kuroSheets.length) {
        const pg = els[kuroCur];
        pg.style.zIndex = 999;
        pg.classList.add('kflipping');
        pg.classList.remove('kdi-kanan');
        pg.classList.add('kdi-kiri');
    } else if (dir === -1 && kuroCur > 0) {
        const pg = els[kuroCur - 1];
        pg.style.zIndex = 999;
        pg.classList.add('kflipping');
        pg.classList.remove('kdi-kiri');
        pg.classList.add('kdi-kanan');
    }

    kuroCur = next;
    setTimeout(function() {
        kuroAnimating = false;
        kuroRefresh();
    }, 650);
};

// ===== KEYBOARD (only when book is open) =====
document.addEventListener('keydown', function(e) {
    if (!kuroBookOpen) return;
    if (e.key === 'ArrowRight' || e.key === ' ') { e.preventDefault(); navKuroBuku(1); }
    if (e.key === 'ArrowLeft') { e.preventDefault(); navKuroBuku(-1); }
    if (e.key === 'Escape') { e.preventDefault(); tutupPopupBuku(); }
});
</script>
@endif

{{-- KARAKTER & TRAITS --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="zoom-in">
            <span class="text-cyan-400 text-sm font-semibold tracking-wider uppercase">Karakter Profil</span>
            <h2 class="text-4xl font-black text-white mt-2">Sifat & Kemampuan</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $traits = [
                ['ikon' => 'fa-heart', 'judul' => 'Baik & Ramah', 'desk' => 'Kuro dikenal sebagai karakter yang baik hati, selalu membantu siapa saja yang membutuhkan', 'warna' => 'from-red-500 to-pink-500'],
                ['ikon' => 'fa-brain', 'judul' => 'Cerdas & Kreatif', 'desk' => 'Memiliki kecerdasan di atas rata-rata dan imajinasi tanpa batas untuk menyelesaikan masalah', 'warna' => 'from-purple-500 to-violet-500'],
                ['ikon' => 'fa-shield-alt', 'judul' => 'Pelindung', 'desk' => 'Melindungi anggota tim dan menjaga keseimbangan antara dunia virtual dan nyata', 'warna' => 'from-blue-500 to-cyan-500'],
                ['ikon' => 'fa-compass', 'judul' => 'Punya Tujuan', 'desk' => 'Memiliki visi besar untuk memajukan pendidikan digital dan memberdayakan generasi muda', 'warna' => 'from-emerald-500 to-teal-500'],
                ['ikon' => 'fa-handshake', 'judul' => 'Kerja Sama Tim', 'desk' => 'Bekerja sama dengan aliansi 5 karakter untuk mencapai tujuan bersama', 'warna' => 'from-amber-500 to-orange-500'],
                ['ikon' => 'fa-mask', 'judul' => 'Identitas Misterius', 'desk' => 'Menyembunyikan identitas aslinya agar tidak ditemukan oleh pihak yang berkuasa', 'warna' => 'from-gray-500 to-slate-600'],
                ['ikon' => 'fa-code', 'judul' => 'Digital Native', 'desk' => 'Lahir dari kode digital .kvt, Kuro bisa hidup di dunia virtual dan dunia nyata sekaligus', 'warna' => 'from-kvt-500 to-kvt-600'],
                ['ikon' => 'fa-fire', 'judul' => 'Semangat Pantang Menyerah', 'desk' => 'Tidak pernah berhenti berjuang meskipun menghadapi tantangan dan rintangan besar', 'warna' => 'from-orange-500 to-red-600'],
            ];
            @endphp
            @foreach($traits as $i => $t)
            <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-purple-500/30 transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
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

{{-- INSPIRASI & REFERENSI --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-4xl mx-auto px-4">
        <div class="bg-kvt-900/80 border border-purple-700/20 rounded-3xl p-10 text-center" data-aos="zoom-in">
            <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                <i class="fas fa-lightbulb text-white text-2xl"></i>
            </div>
            <h2 class="text-3xl font-black text-white mb-4">Inspirasi & Referensi</h2>
            <p class="text-gray-400 leading-relaxed mb-6 max-w-2xl mx-auto">
                Cerita Kuro dan aliansinya terinspirasi dari <span class="text-yellow-400 font-semibold">Alan Becker Animation (Stick Figure)</span>.
                Bedanya, dalam kisah ini terdapat <strong class="text-white">5 karakter utama</strong> yang diciptakan, dimana Kuro
                (The Chosen One) menjadi pusat cerita. Keunikan Kuro adalah kemampuannya hidup di dua dimensi:
                dunia virtual dan dunia nyata secara bersamaan.
            </p>
            <div class="flex justify-center gap-4 flex-wrap">
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Referensi</span>
                    <span class="text-white font-bold text-sm">Alan Becker Animation</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Karakter</span>
                    <span class="text-white font-bold text-sm">5 Mitos + Kuro</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">File</span>
                    <span class="text-purple-400 font-bold text-sm font-mono">the_chosen_one.kvt</span>
                </div>
                <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                    <span class="text-gray-500 text-xs block">Kreator</span>
                    <span class="text-white font-bold text-sm">Inisial RH</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black text-white mb-4">Ikuti Perjalanan Kuro</h2>
        <p class="text-gray-400 mb-8">Follow semua akun resmi Kuro untuk update terbaru</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="https://github.com/kuro-myths" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 hover:text-white px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fab fa-github mr-2"></i>GitHub
            </a>
            <a href="https://www.youtube.com/@Kuro-MYTHS" target="_blank" class="bg-red-600 hover:bg-red-500 text-white px-8 py-3.5 rounded-xl font-semibold transition shadow-lg">
                <i class="fab fa-youtube mr-2"></i>YouTube
            </a>
            <a href="{{ route('halaman.donasi') }}" class="bg-gradient-to-r from-amber-500 to-orange-500 hover:from-amber-400 hover:to-orange-400 text-white px-8 py-3.5 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-heart mr-2"></i>Donasi
            </a>
        </div>
    </div>
</section>

{{-- ==================== DOKUMEN RESMI KURO POPUP ==================== --}}
<div id="kuroDokumenOverlay" class="fixed inset-0 z-[100] hidden" style="backdrop-filter:blur(20px);background:rgba(2,16,41,0.95)">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="w-full max-w-3xl animate-fade-in">
            {{-- Close --}}
            <div class="flex justify-end mb-4">
                <button onclick="tutupKuroDokumen()" class="w-10 h-10 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            {{-- Document Page --}}
            <div class="bg-gradient-to-b from-amber-50 to-white rounded-2xl shadow-2xl overflow-hidden" id="kuroDokumenKertas">
                {{-- Header Ornamental --}}
                <div class="bg-gradient-to-r from-amber-800 via-amber-700 to-amber-800 py-1"></div>
                <div class="px-8 sm:px-12 pt-8 pb-4 text-center border-b-2 border-amber-200/50">
                    <div class="flex justify-center mb-3">
                        <div class="w-16 h-16 bg-gradient-to-br from-purple-600 to-violet-700 rounded-2xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-black text-2xl">K</span>
                        </div>
                    </div>
                    <h2 class="text-xl sm:text-2xl font-black text-amber-900 tracking-wide">KVT Hub — Global Education Ecosystem</h2>
                    <p class="text-amber-700/60 text-xs tracking-[0.3em] font-semibold mt-1">SURAT PERNYATAAN RESMI</p>
                    <div class="flex justify-center gap-2 mt-2">
                        <span class="w-8 h-0.5 bg-amber-300 rounded"></span>
                        <span class="w-2 h-0.5 bg-amber-400 rounded"></span>
                        <span class="w-8 h-0.5 bg-amber-300 rounded"></span>
                    </div>
                </div>

                {{-- Document Body --}}
                <div class="px-8 sm:px-12 py-8 space-y-6 text-amber-900">
                    <div class="text-center text-sm text-amber-600 font-semibold">
                        No: KVT/KURO/DOC/{{ date('Y') }}/001
                    </div>

                    <div class="text-center">
                        <h3 class="text-lg font-bold text-amber-900">DEKLARASI STATUS KARAKTER</h3>
                        <h4 class="text-sm font-semibold text-amber-700">"Kuro — The Chosen One"</h4>
                    </div>

                    <div class="space-y-4 text-sm leading-relaxed text-amber-800">
                        <p>Dengan ini kami menyatakan bahwa karakter bernama <strong class="text-purple-800">Kuro</strong> dengan kode file <code class="bg-purple-100 text-purple-700 px-1.5 py-0.5 rounded text-xs font-mono">the_chosen_one.kvt</code> adalah:</p>

                        <div class="bg-amber-50 border border-amber-200 rounded-xl p-5 space-y-3">
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0 mt-0.5">1</span>
                                <div><strong>Karakter Pertama</strong> — Karakter hidup pertama yang diciptakan dalam ekosistem KVT Hub, dirancang sebagai maskot dan simbol pendidikan digital global.</div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0 mt-0.5">2</span>
                                <div><strong>The Chosen One</strong> — Dipilih dari 5 aliansi karakter sebagai pemimpin dan representasi utama misi pendidikan KVT Hub.</div>
                            </div>
                            <div class="flex items-start gap-3">
                                <span class="w-6 h-6 bg-purple-600 rounded-lg flex items-center justify-center text-white text-xs font-bold shrink-0 mt-0.5">3</span>
                                <div><strong>Hak Intelektual</strong> — Seluruh desain, cerita, dan konten terkait Kuro merupakan karya orisinal milik KVT Hub dengan inisial kreator <strong>RH</strong>.</div>
                            </div>
                        </div>

                        <div>
                            <h5 class="font-bold text-amber-900 mb-2"><i class="fas fa-eye mr-1.5"></i>Visi Karakter:</h5>
                            <p class="italic text-amber-700 bg-amber-50/50 border-l-4 border-purple-400 pl-4 py-2 rounded-r-lg">"Menjadikan karakter digital sebagai jembatan kreativitas dan pendidikan, menginspirasi generasi muda untuk belajar, berkarya, dan berinovasi tanpa batas."</p>
                        </div>

                        <div>
                            <h5 class="font-bold text-amber-900 mb-2"><i class="fas fa-bullseye mr-1.5"></i>Misi Karakter:</h5>
                            <ul class="space-y-1.5 ml-3">
                                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-600 mt-0.5 text-xs"></i> Menjadi maskot resmi KVT Hub dalam semua media dan platform</li>
                                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-600 mt-0.5 text-xs"></i> Menghubungkan dunia virtual dan nyata melalui cerita interaktif</li>
                                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-600 mt-0.5 text-xs"></i> Mendukung 8 pilar ekosistem pendidikan global</li>
                                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-600 mt-0.5 text-xs"></i> Memotivasi peserta didik dari semua jenjang (TK—S3/PhD)</li>
                                <li class="flex items-start gap-2"><i class="fas fa-check-circle text-green-600 mt-0.5 text-xs"></i> Membangun komunitas kreatif yang inklusif dan kolaboratif</li>
                            </ul>
                        </div>
                    </div>

                    {{-- Signature --}}
                    <div class="pt-6 border-t-2 border-dashed border-amber-200">
                        <div class="flex flex-col sm:flex-row items-start sm:items-end justify-between gap-6">
                            <div class="text-sm text-amber-700">
                                <p>Ditetapkan di: <strong>KVT Hub Digital HQ</strong></p>
                                <p>Tanggal: <strong>{{ \Carbon\Carbon::now()->locale('id')->isoFormat('D MMMM Y') }}</strong></p>
                            </div>
                            <div class="text-center">
                                <div class="w-28 h-20 border-2 border-dashed border-amber-300 rounded-xl flex items-center justify-center mb-2 bg-amber-50/50 mx-auto">
                                    <div class="text-center">
                                        <i class="fas fa-signature text-amber-400 text-2xl"></i>
                                        <div class="text-[9px] text-amber-400 font-semibold mt-1">TERTANDATANGAN</div>
                                    </div>
                                </div>
                                <p class="text-sm font-bold text-amber-900">Kreator (RH)</p>
                                <p class="text-xs text-amber-600">Founder & Creator — KVT Hub</p>
                            </div>
                        </div>
                    </div>

                    {{-- Stamp --}}
                    <div class="flex justify-center pt-4">
                        <div class="w-24 h-24 rounded-full border-4 border-purple-500/30 flex items-center justify-center relative">
                            <div class="absolute inset-1 rounded-full border-2 border-dashed border-purple-400/40"></div>
                            <div class="text-center">
                                <i class="fas fa-shield-alt text-purple-500 text-lg"></i>
                                <div class="text-[8px] font-black text-purple-600 tracking-wider">VERIFIED</div>
                                <div class="text-[7px] text-purple-400">KVT HUB</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Footer ornamental --}}
                <div class="bg-gradient-to-r from-amber-800 via-amber-700 to-amber-800 py-1"></div>
            </div>

            {{-- Actions --}}
            <div class="flex justify-center gap-3 mt-4">
                <button onclick="cetakKuroDokumen()" class="bg-white/10 hover:bg-white/20 text-white px-6 py-2.5 rounded-xl font-semibold transition text-sm border border-white/10">
                    <i class="fas fa-print mr-2"></i>Cetak Dokumen
                </button>
                <button onclick="tutupKuroDokumen()" class="bg-purple-600 hover:bg-purple-500 text-white px-6 py-2.5 rounded-xl font-semibold transition text-sm">
                    <i class="fas fa-times mr-2"></i>Tutup
                </button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
function bukaKuroDokumen(){document.getElementById('kuroDokumenOverlay').classList.remove('hidden');document.body.style.overflow='hidden'}
function tutupKuroDokumen(){document.getElementById('kuroDokumenOverlay').classList.add('hidden');document.body.style.overflow=''}
document.getElementById('kuroDokumenOverlay').addEventListener('click',function(e){if(e.target===this)tutupKuroDokumen()});
function cetakKuroDokumen(){
    const el=document.getElementById('kuroDokumenKertas');
    if(typeof html2canvas!=='undefined'){
        html2canvas(el,{scale:2,backgroundColor:'#FFFBEB'}).then(c=>{const a=document.createElement('a');a.download='Dokumen-Resmi-Kuro-KVT-Hub.png';a.href=c.toDataURL();a.click()});
    } else { window.print() }
}
</script>
@endpush

@endsection
