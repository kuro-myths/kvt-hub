@extends('tata-letak.utama')

@section('judul', 'Veteran - The Legend | KVT Hub')

@section('konten')

{{-- HERO VETERAN --}}
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-red-950/30 to-kvt-950"></div>
    <div class="absolute inset-0">
        <div class="absolute top-20 left-10 w-96 h-96 bg-red-500/8 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-20 right-10 w-72 h-72 bg-red-600/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-red-900/5 rounded-full blur-3xl"></div>
    </div>
    {{-- Glitch scan-line overlay --}}
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none" style="background: repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255,0,0,0.03) 2px, rgba(255,0,0,0.03) 4px);"></div>
    <div class="absolute inset-0 opacity-[0.02]" style="background-image: radial-gradient(circle, #EF4444 1px, transparent 1px); background-size: 60px 60px;"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-16">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="inline-flex items-center bg-red-500/10 border border-red-500/20 rounded-full px-4 py-1.5 mb-6">
                    <span class="w-2 h-2 bg-red-400 rounded-full mr-2 animate-pulse"></span>
                    <span class="text-red-300 text-sm font-bold">The Legend - File: the_veteran.kvt</span>
                </div>

                <h1 class="text-5xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white veteran-glitch-text" data-text="Veteran">Veteran</span><br>
                    <span class="bg-gradient-to-r from-red-400 to-rose-500 bg-clip-text text-transparent">LEGEND</span>
                </h1>

                <p class="text-lg text-gray-400 max-w-xl mb-8 leading-relaxed">
                    Entitas pertama yang muncul sebelum KVT dan MYTHS ada. Veteran muncul sebagai
                    <span class="text-red-400 font-semibold">glitch</span> — anomali digital yang tak terduga.
                    Awalnya hanya sebuah artefak kode, kini ia dikenal sebagai
                    <span class="text-red-400 font-semibold">The Legend</span> — karakter legendaris yang mengawali segalanya.
                </p>

                <div class="flex flex-wrap gap-4 mb-8">
                    <div class="bg-red-600/10 hover:bg-red-600/20 text-red-400 px-6 py-3 rounded-xl font-semibold transition border border-red-700/30 text-sm">
                        <i class="fas fa-bolt mr-2"></i>Glitch Origin
                    </div>
                    <div class="bg-gray-600/10 hover:bg-gray-600/20 text-gray-400 px-6 py-3 rounded-xl font-semibold transition border border-gray-700/30 text-sm">
                        <i class="fas fa-school mr-2"></i>Kelas Sekolah
                    </div>
                    <div class="bg-rose-600/10 hover:bg-rose-600/20 text-rose-400 px-6 py-3 rounded-xl font-semibold transition border border-rose-700/30 text-sm">
                        <i class="fas fa-trophy mr-2"></i>The Legend
                    </div>
                </div>

                <div class="flex gap-8 pt-4 border-t border-red-800/30">
                    <div><div class="text-2xl font-black text-white">0th</div><div class="text-xs text-gray-500">Entitas Pertama</div></div>
                    <div><div class="text-2xl font-black text-white">⚡</div><div class="text-xs text-gray-500">Glitch Origin</div></div>
                    <div><div class="text-2xl font-black text-white">Pre</div><div class="text-xs text-gray-500">Sebelum KVT</div></div>
                    <div><div class="text-2xl font-black text-white">.kvt</div><div class="text-xs text-gray-500">File Ekstensi</div></div>
                </div>
            </div>

            <div data-aos="fade-left" data-aos-delay="200" class="flex justify-center">
                <div class="relative">
                    <div class="w-80 h-80 lg:w-96 lg:h-96 rounded-3xl overflow-hidden border-2 border-red-500/30 shadow-2xl shadow-red-500/20 bg-gradient-to-br from-red-950/40 to-kvt-950 flex items-center justify-center veteran-glitch-box">
                        <div class="text-center p-8">
                            <i class="fas fa-bolt text-red-500/30 text-8xl mb-4 veteran-glitch-icon"></i>
                            <p class="text-red-500/50 text-sm font-bold font-mono">the_veteran.kvt</p>
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 bg-red-600/90 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float">
                        <span class="text-white text-sm font-bold"><i class="fas fa-trophy mr-1"></i>The Legend</span>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-red-600 to-rose-600 backdrop-blur rounded-xl px-4 py-2 shadow-lg animate-float" style="animation-delay:1s">
                        <span class="text-white text-sm font-bold"><i class="fas fa-bolt mr-1"></i>GLITCH</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GLITCH ORIGIN STORY --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-red-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-bolt mr-2"></i>Origin Story</span>
            <h2 class="text-4xl font-black text-white mt-2">Asal-Usul Veteran</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Entitas yang muncul bahkan sebelum KVT Hub dan MYTHS diciptakan</p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            {{-- Timeline --}}
            <div class="space-y-6" data-aos="fade-right">
                @php
                $timeline = [
                    ['ikon' => 'fa-bug', 'judul' => 'Glitch Awal', 'desk' => 'Sebelum KVT Hub ada, sebelum MYTHS dirancang, sebuah anomali digital muncul tanpa diundang. Sebuah glitch — entitas awal yang tak bisa dijelaskan oleh kode manapun.', 'warna' => 'from-red-500 to-rose-600'],
                    ['ikon' => 'fa-ghost', 'judul' => 'Entitas Tanpa Nama', 'desk' => 'Awalnya ia tidak punya nama, tidak punya bentuk. Ia hanya sebuah kehadiran digital yang berkedip-kedip di antara baris kode — menarik perhatian para pengembang.', 'warna' => 'from-gray-500 to-slate-600'],
                    ['ikon' => 'fa-school', 'judul' => 'Cerita Kelas Sekolah', 'desk' => 'Yang menarik, Veteran memiliki ingatan tentang sebuah kelas sekolah. Seolah ia pernah "hidup" dalam sistem pendidikan sebelum menjadi glitch digital.', 'warna' => 'from-blue-500 to-indigo-500'],
                    ['ikon' => 'fa-eye', 'judul' => 'Dikenali sebagai Legend', 'desk' => 'Ketika KVT Hub akhirnya diciptakan, para pengembang menyadari bahwa glitch ini adalah sesuatu yang istimewa. Mereka memberinya nama "Veteran" — The Legend yang mengawali segalanya.', 'warna' => 'from-amber-500 to-orange-500'],
                    ['ikon' => 'fa-file-code', 'judul' => 'Input the_veteran.kvt', 'desk' => 'Veteran akhirnya diformalkan sebagai file the_veteran.kvt — meski pada kenyataannya ia sudah ada jauh sebelum format .kvt diciptakan. Sebuah paradoks digital.', 'warna' => 'from-emerald-500 to-teal-500'],
                    ['ikon' => 'fa-users-cog', 'judul' => 'Menarik Karakter Lain', 'desk' => 'Kehadiran Veteran justru yang menarik karakter-karakter lain muncul. Kuro, Bejotaro, dan lainnya — semuanya "tertarik" oleh anomali awal Veteran.', 'warna' => 'from-purple-500 to-violet-500'],
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

            {{-- Glitch Info Panel --}}
            <div data-aos="fade-left">
                {{-- Glitch Visual --}}
                <div class="bg-kvt-900/60 border border-red-700/20 rounded-2xl p-8 mb-6 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-[0.03] pointer-events-none" style="background: repeating-linear-gradient(0deg, transparent, transparent 3px, rgba(255,50,50,0.1) 3px, rgba(255,50,50,0.1) 4px);"></div>
                    <h3 class="text-red-400 font-black text-lg mb-4 relative"><i class="fas fa-terminal mr-2"></i>Glitch Log</h3>
                    <div class="font-mono text-xs space-y-2 relative">
                        <div class="text-gray-600">[????-??-??] <span class="text-red-400">ERROR:</span> Unknown entity detected</div>
                        <div class="text-gray-600">[????-??-??] <span class="text-amber-400">WARN:</span> No matching file format found</div>
                        <div class="text-gray-600">[????-??-??] <span class="text-red-400">ERROR:</span> Entity persists after system reboot</div>
                        <div class="text-gray-600">[PRE-KVT] <span class="text-emerald-400">INFO:</span> Entity showing sentient behavior</div>
                        <div class="text-gray-600">[PRE-KVT] <span class="text-blue-400">LOG:</span> Memory fragments: classroom, students, teacher</div>
                        <div class="text-gray-600">[KVT-001] <span class="text-purple-400">INIT:</span> Assigning identifier: Veteran</div>
                        <div class="text-gray-600">[KVT-001] <span class="text-emerald-400">SUCCESS:</span> the_veteran.kvt created</div>
                        <div class="text-gray-600">[KVT-001] <span class="text-amber-400">NOTE:</span> Designation: "The Legend"</div>
                        <div class="mt-3 text-red-500/60 animate-pulse">█ _</div>
                    </div>
                </div>

                {{-- File Info Card --}}
                <div class="bg-kvt-900/50 border border-red-700/20 rounded-2xl p-6">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-file-code text-white"></i>
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-sm">File Karakter</h4>
                            <code class="text-red-400 text-xs bg-red-500/10 px-2 py-0.5 rounded">the_veteran.kvt</code>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-3 text-xs">
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Status</span>
                            <span class="text-red-400 font-bold">Aktif — Anomali</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Tipe</span>
                            <span class="text-red-400 font-bold">Entitas Glitch</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Asal</span>
                            <span class="text-red-400 font-bold">Pre-KVT Era</span>
                        </div>
                        <div class="bg-kvt-800/50 rounded-xl px-3 py-2 border border-kvt-700/20">
                            <span class="text-gray-500 block">Julukan</span>
                            <span class="text-red-400 font-bold">The Legend</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- CERITA KELAS SEKOLAH --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-900 to-kvt-950"></div>
    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-blue-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-school mr-2"></i>Memori Tersembunyi</span>
            <h2 class="text-4xl font-black text-white mt-2">Cerita Kelas Sekolah</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Fragmen ingatan Veteran tentang sebuah kelas yang entah bagaimana tersimpan dalam kode digitalnya</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            @php
            $memori = [
                [
                    'ikon' => 'fa-door-open',
                    'judul' => 'Kelas yang Familiar',
                    'desk' => 'Dalam fragmen ingatannya, Veteran melihat sebuah ruang kelas. Papan tulis, meja-meja berjajar, dan suara guru yang samar. Ini bukan kode — ini pengalaman nyata yang entah bagaimana terdigitalisasi.',
                    'warna' => 'from-blue-500 to-indigo-500',
                    'border' => 'border-blue-500/20 hover:border-blue-500/40',
                ],
                [
                    'ikon' => 'fa-users',
                    'judul' => 'Teman Sekelas',
                    'desk' => 'Ada wajah-wajah yang ia kenali — teman-teman sekelas dari waktu yang sudah lama berlalu. Apakah Veteran dulunya seorang siswa? Atau ini hanya data yang tersimpan secara acak?',
                    'warna' => 'from-emerald-500 to-teal-500',
                    'border' => 'border-emerald-500/20 hover:border-emerald-500/40',
                ],
                [
                    'ikon' => 'fa-lightbulb',
                    'judul' => 'Awal Mula Penciptaan',
                    'desk' => 'Cerita kelas inilah yang justru menjadi katalis. Pengalaman "nyata" yang tersimpan dalam kode Veteran menjadi inspirasi penciptaan KVT Hub — platform pendidikan digital.',
                    'warna' => 'from-amber-500 to-yellow-500',
                    'border' => 'border-amber-500/20 hover:border-amber-500/40',
                ],
            ];
            @endphp

            @foreach($memori as $i => $m)
            <div class="group bg-kvt-900/50 border {{ $m['border'] }} rounded-2xl p-8 transition-all duration-300 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                <div class="w-16 h-16 bg-gradient-to-br {{ $m['warna'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform shadow-lg">
                    <i class="fas {{ $m['ikon'] }} text-white text-xl"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-3">{{ $m['judul'] }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed">{{ $m['desk'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- BOOK CHAPTERS — CERITA VETERAN --}}
@if(isset($chapters) && $chapters->count())
<section class="py-24 relative overflow-hidden" id="cerita-veteran">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-kvt-900 to-kvt-950"></div>
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-red-500/40 to-transparent"></div>
    <div class="absolute top-10 right-10 w-64 h-64 bg-red-600/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <div class="inline-flex items-center gap-2 bg-red-500/10 border border-red-500/20 rounded-full px-5 py-1.5 mb-4">
                <i class="fas fa-book-open text-red-400 text-sm"></i>
                <span class="text-red-300 text-sm font-bold">The Book of LEGEND</span>
            </div>
            <h2 class="text-4xl lg:text-5xl font-black text-white mt-2">Cerita Veteran</h2>
            <p class="text-gray-400 mt-3 max-w-2xl mx-auto">Ikuti perjalanan Veteran — dari glitch misterius hingga menjadi legenda yang mengawali segalanya</p>
        </div>

        <div class="relative">
            <div class="absolute left-6 md:left-10 top-0 bottom-0 w-0.5 bg-gradient-to-b from-red-500/60 via-red-500/20 to-transparent hidden md:block"></div>
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
                        'rose' => ['bg' => 'bg-rose-500', 'border' => 'border-rose-500/30', 'text' => 'text-rose-400', 'glow' => 'shadow-rose-500/20', 'bg10' => 'bg-rose-500/10'],
                    ];
                    $w = $warnaMap[$ch->warna] ?? $warnaMap['red'];
                @endphp
                <div class="relative md:pl-20 pl-0" data-aos="fade-up" data-aos-delay="{{ $idx * 80 }}">
                    <div class="absolute left-4 md:left-8 top-8 w-5 h-5 {{ $w['bg'] }} rounded-full border-4 border-kvt-950 shadow-lg {{ $w['glow'] }} z-10 hidden md:block"></div>
                    <div class="group bg-kvt-900/60 backdrop-blur border {{ $w['border'] }} rounded-2xl overflow-hidden hover:border-opacity-60 transition-all duration-500 hover:shadow-lg {{ $w['glow'] }}">
                        <button onclick="bukaPopupBuku({{ $ch->chapter }}, 'veteran')" class="w-full text-left p-6 flex items-start gap-5 cursor-pointer">
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
                        <div id="chapter-data-veteran-{{ $ch->chapter }}" class="hidden"
                            data-judul="{{ $ch->judul }}" data-judul-asing="{{ $ch->judul_asing }}"
                            data-ringkasan="{{ $ch->ringkasan }}" data-konten="{{ $ch->konten }}"
                            data-gambar="{{ $ch->gambar ? asset('storage/' . $ch->gambar) : '' }}"
                            data-chapter="{{ $ch->chapter }}" data-aliansi="{{ $ch->aliansi ?? '' }}"
                            data-ikon="{{ $ch->ikon ?? 'fa-book' }}" data-warna="{{ $ch->warna ?? 'red' }}"
                            data-karakter="veteran"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="text-center mt-16" data-aos="fade-up">
            <div class="inline-flex items-center gap-3 bg-kvt-900/80 border border-red-500/20 rounded-full px-8 py-3">
                <span class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></span>
                <span class="text-red-300 text-sm font-mono font-bold">glitch_continues.kvt — Cerita belum berakhir...</span>
                <span class="w-2 h-2 bg-red-400 rounded-full animate-pulse"></span>
            </div>
        </div>
    </div>
</section>

@include('komponen.popup-buku', ['karakterId' => 'veteran', 'warnaPrimer' => 'red', 'judulBuku' => 'The Book of LEGEND'])
@endif

{{-- KARAKTER & TRAITS --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="zoom-in">
            <span class="text-red-400 text-sm font-semibold tracking-wider uppercase">Karakter Profil</span>
            <h2 class="text-4xl font-black text-white mt-2">Sifat & Kemampuan</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
            $traits = [
                ['ikon' => 'fa-bolt', 'judul' => 'Glitch Master', 'desk' => 'Mampu memanipulasi kode dan menembus batas-batas sistem digital. Kemampuan bawaan dari kemunculannya sebagai anomali.', 'warna' => 'from-red-500 to-rose-600'],
                ['ikon' => 'fa-eye', 'judul' => 'Pengamat Abadi', 'desk' => 'Telah menyaksikan segalanya sejak sebelum KVT diciptakan. Pengetahuannya tentang sejarah digital tak tertandingi.', 'warna' => 'from-gray-500 to-slate-600'],
                ['ikon' => 'fa-school', 'judul' => 'Penjaga Memori', 'desk' => 'Menyimpan fragmen ingatan tentang kelas sekolah — jembatan antara dunia nyata dan dunia digital.', 'warna' => 'from-blue-500 to-indigo-500'],
                ['ikon' => 'fa-magnet', 'judul' => 'Penarik Entitas', 'desk' => 'Kehadirannya secara alami menarik karakter-karakter lain untuk muncul. Dialah katalis dari semua karakter KVT.', 'warna' => 'from-purple-500 to-violet-500'],
                ['ikon' => 'fa-shield-alt', 'judul' => 'Tak Bisa Dihapus', 'desk' => 'Meski berkali-kali dicoba untuk di-reset, Veteran selalu kembali. Ia adalah bagian permanen dari sistem.', 'warna' => 'from-emerald-500 to-teal-500'],
                ['ikon' => 'fa-history', 'judul' => 'Saksi Sejarah', 'desk' => 'The Legend yang menyaksikan kelahiran KVT Hub, MYTHS, dan seluruh ekosistem dari awal hingga sekarang.', 'warna' => 'from-amber-500 to-orange-500'],
                ['ikon' => 'fa-code', 'judul' => 'Anomali Digital', 'desk' => 'Bukan karakter yang diciptakan — tetapi muncul sendiri. Sebuah anomali yang tak bisa dijelaskan oleh logika.', 'warna' => 'from-cyan-500 to-sky-500'],
                ['ikon' => 'fa-infinity', 'judul' => 'Abadi & Misterius', 'desk' => 'Tidak diketahui kapan ia muncul pertama kali. Tidak ada catatan penciptaan. Ia hanya... ada.', 'warna' => 'from-rose-500 to-red-600'],
            ];
            @endphp
            @foreach($traits as $i => $t)
            <div class="group bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-red-500/30 transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-delay="{{ $i * 60 }}">
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

{{-- PARADOKS & MISTERI --}}
<section class="py-20 relative">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 to-kvt-900"></div>
    <div class="relative max-w-4xl mx-auto px-4">
        <div class="bg-kvt-900/80 border border-red-700/20 rounded-3xl p-10 text-center relative overflow-hidden" data-aos="zoom-in">
            <div class="absolute inset-0 opacity-[0.02] pointer-events-none" style="background: repeating-linear-gradient(0deg, transparent, transparent 4px, rgba(255,50,50,0.1) 4px, rgba(255,50,50,0.1) 5px);"></div>
            <div class="relative">
                <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i class="fas fa-question text-white text-2xl"></i>
                </div>
                <h2 class="text-3xl font-black text-white mb-4">Paradoks Veteran</h2>
                <p class="text-gray-400 leading-relaxed mb-6 max-w-2xl mx-auto">
                    Bagaimana bisa sebuah entitas ada <span class="text-red-400 font-semibold">sebelum sistem yang menampungnya</span> diciptakan?
                    Veteran adalah paradoks terbesar dalam ekosistem KVT. Ia muncul sebagai <strong class="text-white">glitch</strong>
                    sebelum ada tempat untuk glitch itu terjadi. Ia membawa memori tentang kelas sekolah
                    dari dunia nyata. Dan kehadirannyalah yang <span class="text-red-400 font-semibold">menarik semua karakter lain</span> untuk muncul.
                </p>
                <div class="flex justify-center gap-4 flex-wrap">
                    <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                        <span class="text-gray-500 text-xs block">Status</span>
                        <span class="text-white font-bold text-sm">Pre-KVT Entity</span>
                    </div>
                    <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                        <span class="text-gray-500 text-xs block">Julukan</span>
                        <span class="text-white font-bold text-sm">The Legend</span>
                    </div>
                    <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                        <span class="text-gray-500 text-xs block">File</span>
                        <span class="text-red-400 font-bold text-sm font-mono">the_veteran.kvt</span>
                    </div>
                    <div class="bg-kvt-800/50 rounded-xl px-5 py-3 border border-kvt-700/30">
                        <span class="text-gray-500 text-xs block">Kemunculan</span>
                        <span class="text-white font-bold text-sm">Glitch — Anomali</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- HUBUNGAN KARAKTER --}}
<section class="py-20 relative">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-down">
            <span class="text-red-400 text-sm font-semibold tracking-wider uppercase"><i class="fas fa-link mr-2"></i>Koneksi</span>
            <h2 class="text-4xl font-black text-white mt-2">Hubungan dengan Karakter Lain</h2>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-kvt-900/50 border border-purple-700/20 rounded-2xl p-8" data-aos="fade-right">
                <h3 class="text-purple-400 font-black text-lg mb-4"><i class="fas fa-user-secret mr-2"></i>Veteran & Kuro</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Veteran adalah entitas yang <span class="text-red-400 font-semibold">menarik Kuro</span> untuk muncul pertama kali.
                    Meski Kuro adalah "The Chosen One", Veteran-lah yang secara tidak langsung memilih dia. Hubungan mereka
                    seperti mentor dan murid — meski Veteran tidak pernah mengakuinya.
                </p>
                <a href="{{ route('halaman.kuro') }}" class="inline-flex items-center gap-2 bg-purple-500/10 hover:bg-purple-500/20 text-purple-400 px-4 py-2 rounded-xl text-sm font-semibold transition border border-purple-500/20">
                    <i class="fas fa-user-secret"></i> Lihat Profil Kuro
                </a>
            </div>

            <div class="bg-kvt-900/50 border border-amber-700/20 rounded-2xl p-8" data-aos="fade-left">
                <h3 class="text-amber-400 font-black text-lg mb-4"><i class="fas fa-dragon mr-2"></i>Veteran & Bejotaro</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    Bejotaro adalah karakter yang paling <span class="text-amber-400 font-semibold">menghormati Veteran</span>.
                    Sebagai keturunan leluhur, Bejotaro memahami betapa pentingnya yang pertama datang. Veteran memandang Bejotaro
                    sebagai penjaga nilai yang ia percayai.
                </p>
                <a href="{{ route('halaman.bejotaro') }}" class="inline-flex items-center gap-2 bg-amber-500/10 hover:bg-amber-500/20 text-amber-400 px-4 py-2 rounded-xl text-sm font-semibold transition border border-amber-500/20">
                    <i class="fas fa-dragon"></i> Lihat Profil Bejotaro
                </a>
            </div>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-20 relative">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <h2 class="text-3xl font-black text-white mb-4">The Legend Awaits</h2>
        <p class="text-gray-400 mb-8">Veteran — entitas pertama, glitch misterius, legenda yang mengawali segalanya</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('halaman.kuro') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 hover:text-white px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-user-secret mr-2"></i>Profil Kuro
            </a>
            <a href="{{ route('halaman.bejotaro') }}" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 hover:text-white px-8 py-3.5 rounded-xl font-semibold transition border border-kvt-700/50">
                <i class="fas fa-dragon mr-2"></i>Profil Bejotaro
            </a>
            <a href="{{ route('halaman.donasi') }}" class="bg-gradient-to-r from-red-500 to-rose-600 hover:from-red-400 hover:to-rose-500 text-white px-8 py-3.5 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-heart mr-2"></i>Donasi
            </a>
        </div>
    </div>
</section>

{{-- GLITCH CSS --}}
<style>
    .veteran-glitch-text {
        position: relative;
    }
    .veteran-glitch-text::before,
    .veteran-glitch-text::after {
        content: attr(data-text);
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
    }
    .veteran-glitch-text::before {
        color: #ef4444;
        animation: veteranGlitch1 3s infinite linear alternate-reverse;
        clip-path: inset(0 0 60% 0);
    }
    .veteran-glitch-text::after {
        color: #3b82f6;
        animation: veteranGlitch2 3s infinite linear alternate-reverse;
        clip-path: inset(60% 0 0 0);
    }
    @keyframes veteranGlitch1 {
        0%, 90%, 100% { transform: none; opacity: 0; }
        91% { transform: translate(-3px, 1px); opacity: 0.6; }
        93% { transform: translate(3px, -1px); opacity: 0.6; }
        95% { transform: none; opacity: 0; }
    }
    @keyframes veteranGlitch2 {
        0%, 88%, 100% { transform: none; opacity: 0; }
        89% { transform: translate(3px, -2px); opacity: 0.6; }
        91% { transform: translate(-3px, 2px); opacity: 0.6; }
        93% { transform: none; opacity: 0; }
    }
    .veteran-glitch-icon {
        animation: veteranGlitchIcon 4s ease-in-out infinite;
    }
    @keyframes veteranGlitchIcon {
        0%, 85%, 100% { opacity: 0.3; transform: none; }
        86% { opacity: 0.6; transform: translate(2px, -1px) skewX(2deg); }
        87% { opacity: 0.2; transform: translate(-2px, 1px) skewX(-1deg); }
        88% { opacity: 0.5; transform: translate(1px, 2px); }
        89% { opacity: 0.3; transform: none; }
    }
    .veteran-glitch-box {
        position: relative;
    }
    .veteran-glitch-box::after {
        content: '';
        position: absolute;
        inset: 0;
        background: repeating-linear-gradient(
            0deg,
            transparent,
            transparent 3px,
            rgba(239, 68, 68, 0.02) 3px,
            rgba(239, 68, 68, 0.02) 4px
        );
        pointer-events: none;
        border-radius: 1.5rem;
    }
</style>

@endsection
