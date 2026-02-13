<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'KVT Hub - Global Education & Research Ecosystem')</title>
    <meta name="description" content="Ekosistem pembelajaran, karir, dan riset digital global. Dari TK hingga S3, profesi, industri, dan riset.">

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kvt': { 50:'#EBF5FF',100:'#D6EBFF',200:'#ADD6FF',300:'#85C2FF',400:'#5CADFF',500:'#3399FF',600:'#0A7AE6',700:'#085CB3',800:'#063D80',900:'#041F4D',950:'#021029' },
                        'salju': { 50:'#F0F9FF',100:'#E0F2FE',200:'#BAE6FD',300:'#7DD3FC' },
                        'ungu': { 400:'#A78BFA',500:'#8B5CF6',600:'#7C3AED',700:'#6D28D9' }
                    },
                    animation: {
                        'salju':'salju 10s linear infinite','float':'float 6s ease-in-out infinite',
                        'slide-up':'slideUp 0.8s ease-out','slide-left':'slideLeft 0.8s ease-out',
                        'fade-in':'fadeIn 1s ease-out','pulse-slow':'pulse 4s cubic-bezier(0.4,0,0.6,1) infinite',
                        'ticker':'ticker 40s linear infinite',
                        'dropdown':'dropdownIn 0.25s cubic-bezier(0.4,0,0.2,1)',
                    },
                    keyframes: {
                        salju:{'0%':{transform:'translateY(-10vh) translateX(0)',opacity:'1'},'100%':{transform:'translateY(100vh) translateX(20px)',opacity:'0'}},
                        float:{'0%,100%':{transform:'translateY(0px)'},'50%':{transform:'translateY(-20px)'}},
                        slideUp:{'0%':{transform:'translateY(60px)',opacity:'0'},'100%':{transform:'translateY(0)',opacity:'1'}},
                        slideLeft:{'0%':{transform:'translateX(60px)',opacity:'0'},'100%':{transform:'translateX(0)',opacity:'1'}},
                        fadeIn:{'0%':{opacity:'0'},'100%':{opacity:'1'}},
                        ticker:{'0%':{transform:'translateX(100%)'},'100%':{transform:'translateX(-100%)'}},
                        dropdownIn:{'0%':{opacity:'0',transform:'translateY(-8px) scaleY(0.95)'},'100%':{opacity:'1',transform:'translateY(0) scaleY(1)'}},
                    }
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        *{font-family:'Inter',sans-serif}
        code,pre,.font-mono{font-family:'JetBrains Mono',monospace}
        .salju-container{position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:50;overflow:hidden}
        .kepingan-salju{position:absolute;top:-10px;color:rgba(255,255,255,0.8);font-size:1em;animation:jatuh linear infinite;text-shadow:0 0 5px rgba(173,214,255,0.5)}
        @keyframes jatuh{0%{transform:translateY(-10vh) rotate(0deg);opacity:1}100%{transform:translateY(105vh) rotate(360deg);opacity:0}}
        .muncul-scroll{opacity:0;transform:translateY(40px);transition:all 0.8s cubic-bezier(0.4,0,0.2,1)}
        .muncul-scroll.tampil{opacity:1;transform:translateY(0)}
        .kaca{background:rgba(255,255,255,0.05);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.1)}
        .kaca-gelap{background:rgba(2,16,41,0.95);backdrop-filter:blur(16px);border:1px solid rgba(51,153,255,0.1)}
        .teks-gradien{background:linear-gradient(135deg,#3399FF,#8B5CF6);-webkit-background-clip:text;-webkit-text-fill-color:transparent}
        ::-webkit-scrollbar{width:6px}::-webkit-scrollbar-track{background:#021029}::-webkit-scrollbar-thumb{background:#3399FF;border-radius:3px}
        .search-overlay{backdrop-filter:blur(20px);background:rgba(2,16,41,0.92)}
        .ticker-wrap{overflow:hidden}.ticker-content{display:inline-flex;white-space:nowrap;animation:ticker 40s linear infinite}.ticker-content:hover{animation-play-state:paused}
        .popup-enter{animation:popupIn 0.4s cubic-bezier(0.34,1.56,0.64,1)}
        @keyframes popupIn{0%{transform:scale(0.8) translateY(20px);opacity:0}100%{transform:scale(1) translateY(0);opacity:1}}

        /* Dropdown submenu - animasi ke bawah */
        .nav-dropdown{position:absolute;top:100%;left:50%;transform:translateX(-50%);opacity:0;visibility:hidden;pointer-events:none;transition:opacity 0.2s,transform 0.2s;transform-origin:top center}
        .nav-item:hover .nav-dropdown,.nav-dropdown:hover{opacity:1;visibility:visible;pointer-events:auto;animation:dropdownIn 0.25s cubic-bezier(0.4,0,0.2,1) forwards}
        .nav-sub-dropdown{position:absolute;left:100%;top:0;opacity:0;visibility:hidden;pointer-events:none;transition:opacity 0.2s}
        .nav-sub-item:hover .nav-sub-dropdown{opacity:1;visibility:visible;pointer-events:auto}

        /* Menu slider */
        .menu-slider{overflow:hidden;position:relative}
        .menu-track{display:flex;transition:transform 0.4s cubic-bezier(0.4,0,0.2,1)}
        .menu-arrow{position:absolute;top:50%;transform:translateY(-50%);z-index:10;cursor:pointer;width:28px;height:28px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:rgba(51,153,255,0.2);border:1px solid rgba(51,153,255,0.3);color:#5CADFF;transition:all 0.2s}
        .menu-arrow:hover{background:rgba(51,153,255,0.4);color:#fff}
        .menu-arrow.left{left:-4px}.menu-arrow.right{right:-4px}
        .menu-arrow.hidden-arrow{opacity:0;pointer-events:none}

        /* Flag counter style */
        .flag-item{display:flex;align-items:center;gap:6px;font-size:11px}
        .flag-item img{width:16px;height:12px;border-radius:1px;object-fit:cover}
    </style>
    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen">

    <div class="salju-container" id="salju"></div>

    {{-- TOP BAR (News Ticker from DB) --}}
    <div class="bg-gradient-to-r from-kvt-900 via-kvt-800 to-kvt-900 border-b border-kvt-700/30 py-1 relative z-40" id="topBar">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
            <div class="flex items-center gap-3 flex-1 overflow-hidden">
                <a href="{{ route('berita.index') }}" class="bg-emerald-600 text-white text-[10px] font-bold px-2.5 py-0.5 rounded uppercase tracking-wider shrink-0 hover:bg-emerald-500 transition">Berita Terbaru</a>
                <div class="ticker-wrap flex-1">
                    <div class="ticker-content gap-12 text-xs text-gray-400" id="tickerContent">
                        <span class="inline-flex items-center gap-2"><i class="fas fa-circle text-green-400 text-[6px]"></i> Memuat berita terbaru...</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-3 text-xs text-gray-500 shrink-0 ml-4">
                <a href="{{ route('halaman.keamanan') }}" class="hover:text-kvt-400 transition"><i class="fas fa-shield-alt mr-1"></i>Keamanan</a>
                <span class="text-kvt-700">|</span>
                <a href="{{ route('halaman.penjamin-mutu') }}" class="hover:text-kvt-400 transition"><i class="fas fa-check-double mr-1"></i>Penjamin Mutu</a>
                <span class="text-kvt-700">|</span>
                <span><i class="far fa-calendar mr-1"></i>{{ now()->translatedFormat('d M Y') }}</span>
                <span><i class="far fa-clock mr-1"></i><span id="jamSekarang"></span></span>
            </div>
        </div>
    </div>

    {{-- MAIN NAVIGATION --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-gelap" id="navbar">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-14">
                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center space-x-2 shrink-0">
                    <div class="w-9 h-9 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-lg flex items-center justify-center shadow-lg shadow-kvt-500/30">
                        <span class="text-white font-black text-base">K</span>
                    </div>
                    <div>
                        <span class="text-lg font-bold leading-none"><span class="text-white">KVT</span><span class="text-kvt-400">Hub</span></span>
                        <span class="block text-[9px] text-gray-500 -mt-0.5 tracking-wider">GLOBAL EDUCATION</span>
                    </div>
                </a>

                {{-- Desktop Menu with Slider --}}
                <div class="hidden lg:flex items-center relative" id="menuContainer">
                    <button class="menu-arrow left hidden-arrow" id="menuArrowLeft" onclick="slideMenu(-1)" title="Menu sebelumnya">
                        <i class="fas fa-chevron-left text-xs"></i>
                    </button>

                    <div class="menu-slider" style="max-width:620px">
                        <div class="menu-track" id="menuTrack">
                            {{-- 1. Beranda --}}
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('beranda') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-home mr-1.5"></i>Beranda
                                </a>
                            </div>

                            {{-- 2. Jenjang --}}
                            <div class="nav-item shrink-0 relative">
                                <button class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center gap-1 whitespace-nowrap">
                                    <i class="fas fa-graduation-cap mr-1.5"></i>Jenjang <i class="fas fa-chevron-down text-[8px] ml-1 transition-transform"></i>
                                </button>
                                <div class="nav-dropdown mt-1 w-[640px] kaca-gelap rounded-2xl p-5 shadow-2xl shadow-kvt-950/50">
                                    <div class="grid grid-cols-3 gap-4">
                                        <div>
                                            <h5 class="text-kvt-400 text-[11px] font-bold uppercase tracking-wider mb-2.5">Pendidikan Dasar</h5>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-baby text-pink-400 w-4 text-xs"></i> TK / PAUD</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-book-open text-blue-400 w-4 text-xs"></i> SD / MI</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-book text-green-400 w-4 text-xs"></i> SMP / MTs</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-school text-yellow-400 w-4 text-xs"></i> SMA / MA</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-tools text-orange-400 w-4 text-xs"></i> SMK</a>
                                        </div>
                                        <div>
                                            <h5 class="text-kvt-400 text-[11px] font-bold uppercase tracking-wider mb-2.5">Pendidikan Tinggi</h5>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-certificate text-cyan-400 w-4 text-xs"></i> Diploma (D1-D3)</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-user-graduate text-blue-400 w-4 text-xs"></i> Sarjana (S1)</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-flask text-purple-400 w-4 text-xs"></i> Magister (S2)</a>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-atom text-red-400 w-4 text-xs"></i> Doktoral (S3/PhD)</a>
                                        </div>
                                        <div>
                                            <h5 class="text-kvt-400 text-[11px] font-bold uppercase tracking-wider mb-2.5">Program Khusus</h5>
                                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-briefcase text-amber-400 w-4 text-xs"></i> Profesi</a>
                                            <a href="{{ route('halaman.karir') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-rocket text-pink-400 w-4 text-xs"></i> Fast Track Career</a>
                                            <a href="{{ route('halaman.riset') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-microscope text-teal-400 w-4 text-xs"></i> Research Hub</a>
                                            <div class="mt-2 p-2.5 bg-kvt-800/20 rounded-xl border border-kvt-700/20">
                                                <p class="text-[11px] text-gray-400"><i class="fas fa-info-circle text-kvt-400 mr-1"></i> 13 jenjang dari TK hingga S3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- 3. Platform --}}
                            <div class="nav-item shrink-0 relative">
                                <button class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center gap-1 whitespace-nowrap">
                                    <i class="fas fa-cubes mr-1.5"></i>Platform <i class="fas fa-chevron-down text-[8px] ml-1"></i>
                                </button>
                                <div class="nav-dropdown mt-1 w-[520px] kaca-gelap rounded-2xl p-5 shadow-2xl shadow-kvt-950/50">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <h5 class="text-kvt-400 text-[11px] font-bold uppercase tracking-wider mb-2.5">Pembelajaran</h5>
                                            @auth
                                            <a href="{{ route('kelas.index') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-chalkboard text-kvt-400 w-4 text-xs"></i> Kelas</a>
                                            <a href="{{ route('laporan.index') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-chart-bar text-green-400 w-4 text-xs"></i> Laporan & Diagram</a>
                                            <a href="{{ route('dasbor') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-tachometer-alt text-yellow-400 w-4 text-xs"></i> Dasbor</a>
                                            @else
                                            <a href="{{ route('masuk') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-chalkboard text-kvt-400 w-4 text-xs"></i> Kelas <span class="text-[10px] text-kvt-500 ml-auto">(Login)</span></a>
                                            @endauth
                                            <a href="{{ route('halaman.sertifikasi') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-award text-amber-400 w-4 text-xs"></i> Sertifikasi</a>
                                            <a href="{{ route('halaman.sumber-daya') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-database text-cyan-400 w-4 text-xs"></i> Sumber Daya</a>
                                        </div>
                                        <div>
                                            <h5 class="text-kvt-400 text-[11px] font-bold uppercase tracking-wider mb-2.5">Ekosistem</h5>
                                            <a href="{{ route('halaman.riset') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-microscope text-purple-400 w-4 text-xs"></i> Riset & Inovasi</a>
                                            <a href="{{ route('halaman.karir') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-briefcase text-orange-400 w-4 text-xs"></i> Karir & Industri</a>
                                            <a href="{{ route('halaman.komunitas') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-users text-pink-400 w-4 text-xs"></i> Komunitas</a>
                                            <a href="{{ route('berita.index') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-newspaper text-emerald-400 w-4 text-xs"></i> Berita</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- 4. Berita --}}
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('berita.index') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-newspaper mr-1.5"></i>Berita
                                </a>
                            </div>

                            {{-- 5. Kerja Sama --}}
                            <div class="nav-item shrink-0 relative">
                                <button class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center gap-1 whitespace-nowrap">
                                    <i class="fas fa-handshake mr-1.5"></i>Kerja Sama <i class="fas fa-chevron-down text-[8px] ml-1"></i>
                                </button>
                                <div class="nav-dropdown mt-1 w-[280px] kaca-gelap rounded-2xl p-4 shadow-2xl shadow-kvt-950/50">
                                    <a href="{{ route('kerja-sama.index') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-building text-kvt-400 w-4 text-xs"></i> Semua Mitra</a>
                                    <a href="{{ route('kerja-sama.index', ['tipe' => 'sponsor']) }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-gem text-yellow-400 w-4 text-xs"></i> Sponsor</a>
                                    <a href="{{ route('kerja-sama.index', ['tipe' => 'mitra_akademik']) }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-university text-blue-400 w-4 text-xs"></i> Mitra Akademik</a>
                                    <a href="{{ route('kerja-sama.index', ['tipe' => 'mitra_industri']) }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-industry text-orange-400 w-4 text-xs"></i> Mitra Industri</a>
                                    <a href="{{ route('kerja-sama.index', ['tipe' => 'media_partner']) }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-bullhorn text-pink-400 w-4 text-xs"></i> Media Partner</a>
                                    <a href="{{ route('kerja-sama.index', ['tipe' => 'komunitas']) }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-heart text-red-400 w-4 text-xs"></i> Komunitas</a>
                                </div>
                            </div>

                            {{-- 6. Tentang --}}
                            <div class="nav-item shrink-0 relative">
                                <button class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center gap-1 whitespace-nowrap">
                                    <i class="fas fa-info-circle mr-1.5"></i>Tentang <i class="fas fa-chevron-down text-[8px] ml-1"></i>
                                </button>
                                <div class="nav-dropdown mt-1 w-[280px] -translate-x-[70%] kaca-gelap rounded-2xl p-4 shadow-2xl shadow-kvt-950/50">
                                    <a href="{{ route('tentang') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-landmark text-kvt-400 w-4 text-xs"></i> Tentang KVT Hub</a>
                                    <a href="{{ route('lisensi') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-file-contract text-green-400 w-4 text-xs"></i> Lisensi</a>
                                    <a href="{{ route('halaman.keamanan') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-shield-alt text-red-400 w-4 text-xs"></i> Keamanan & Privasi</a>
                                    <a href="{{ route('halaman.penjamin-mutu') }}" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fas fa-check-double text-teal-400 w-4 text-xs"></i> Penjamin Mutu</a>
                                    <div class="border-t border-kvt-700/30 my-2"></div>
                                    <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="flex items-center gap-2 py-1.5 text-sm text-gray-400 hover:text-white hover:bg-kvt-800/30 px-2 rounded-lg transition"><i class="fab fa-github text-gray-300 w-4 text-xs"></i> GitHub Repository</a>
                                </div>
                            </div>

                            {{-- 7-12: Extended menus (visible when scrolled via arrows) --}}
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.riset') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-microscope mr-1.5"></i>Riset
                                </a>
                            </div>
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.karir') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-briefcase mr-1.5"></i>Karir
                                </a>
                            </div>
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.komunitas') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-users mr-1.5"></i>Komunitas
                                </a>
                            </div>
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.sertifikasi') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-award mr-1.5"></i>Sertifikasi
                                </a>
                            </div>
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.sumber-daya') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-database mr-1.5"></i>Sumber Daya
                                </a>
                            </div>
                            <div class="nav-item shrink-0 relative">
                                <a href="{{ route('halaman.keamanan') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium px-3 py-2 rounded-lg hover:bg-kvt-800/30 flex items-center whitespace-nowrap">
                                    <i class="fas fa-shield-alt mr-1.5"></i>Keamanan
                                </a>
                            </div>
                        </div>
                    </div>

                    <button class="menu-arrow right" id="menuArrowRight" onclick="slideMenu(1)" title="Menu lainnya">
                        <i class="fas fa-chevron-right text-xs"></i>
                    </button>
                </div>

                {{-- Right: Search + Auth --}}
                <div class="flex items-center space-x-2">
                    <button onclick="bukaSearch()" class="text-gray-400 hover:text-kvt-400 transition p-2 rounded-lg hover:bg-kvt-800/30" title="Cari (Ctrl+K)">
                        <i class="fas fa-search text-lg"></i>
                    </button>

                    @guest
                        <a href="{{ route('masuk') }}" class="text-sm text-gray-300 hover:text-white transition px-3 py-1.5 rounded-lg hover:bg-kvt-800/30">Masuk</a>
                        <a href="{{ route('daftar') }}" class="text-sm bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-4 py-1.5 rounded-lg transition shadow-lg shadow-kvt-500/20">Daftar</a>
                    @else
                        <div class="hidden xl:flex items-center space-x-2 bg-kvt-900/50 rounded-full px-3 py-1 border border-kvt-700/30">
                            <span class="text-kvt-400 text-xs font-bold">Lv.{{ Auth::user()->level }}</span>
                            <div class="w-16 h-1.5 bg-kvt-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-kvt-400 to-ungu-400 rounded-full transition-all" style="width: {{ Auth::user()->persenLevel() }}%"></div>
                            </div>
                            <span class="text-kvt-300 text-[10px]">{{ Auth::user()->xp }}XP</span>
                        </div>

                        <div class="relative group">
                            <button class="flex items-center space-x-2 bg-kvt-800/30 hover:bg-kvt-700/30 rounded-lg px-2.5 py-1.5 transition border border-kvt-700/20">
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="text-sm text-gray-300 hidden sm:block">{{ Str::limit(Auth::user()->name, 12) }}</span>
                            </button>
                            <div class="absolute right-0 mt-2 w-52 kaca-gelap rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                                <div class="p-3 border-b border-kvt-700/30">
                                    <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                                    <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                    <p class="text-xs text-kvt-400 mt-1"><i class="fas fa-star mr-1"></i>{{ Auth::user()->getRangString() }} - Level {{ Auth::user()->level }}</p>
                                </div>
                                <a href="{{ route('dasbor') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-kvt-700/30 hover:text-white transition"><i class="fas fa-tachometer-alt w-5 text-kvt-400"></i>Dasbor</a>
                                @if(Auth::user()->adalahAdmin())
                                <a href="{{ route('admin.dasbor') }}" class="block px-4 py-2 text-sm text-yellow-400 hover:bg-kvt-700/30 transition"><i class="fas fa-shield-alt w-5"></i>Panel Admin</a>
                                @endif
                                <form method="POST" action="{{ route('keluar') }}">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-kvt-700/30 rounded-b-xl transition"><i class="fas fa-sign-out-alt w-5"></i>Keluar</button>
                                </form>
                            </div>
                        </div>
                    @endguest

                    <button class="lg:hidden text-gray-300 hover:text-white p-2" onclick="toggleMobile()"><i class="fas fa-bars text-lg"></i></button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden lg:hidden kaca-gelap border-t border-kvt-700/30">
            <div class="px-4 py-4 space-y-1 max-h-[70vh] overflow-y-auto">
                <a href="{{ route('beranda') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-home w-5"></i> Beranda</a>
                <a href="{{ route('halaman.jenjang') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-graduation-cap w-5"></i> Jenjang Pendidikan</a>
                @auth
                <a href="{{ route('kelas.index') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-chalkboard w-5"></i> Kelas</a>
                <a href="{{ route('laporan.index') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-chart-bar w-5"></i> Laporan</a>
                <a href="{{ route('dasbor') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-tachometer-alt w-5"></i> Dasbor</a>
                @endauth
                <a href="{{ route('berita.index') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-newspaper w-5"></i> Berita</a>
                <a href="{{ route('halaman.riset') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-microscope w-5"></i> Riset & Inovasi</a>
                <a href="{{ route('halaman.karir') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-briefcase w-5"></i> Karir & Industri</a>
                <a href="{{ route('halaman.komunitas') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-users w-5"></i> Komunitas</a>
                <a href="{{ route('halaman.sertifikasi') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-award w-5"></i> Sertifikasi</a>
                <a href="{{ route('halaman.sumber-daya') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-database w-5"></i> Sumber Daya</a>
                <a href="{{ route('kerja-sama.index') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-handshake w-5"></i> Kerja Sama</a>
                <div class="border-t border-kvt-700/30 my-2"></div>
                <a href="{{ route('halaman.keamanan') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-shield-alt w-5"></i> Keamanan</a>
                <a href="{{ route('halaman.penjamin-mutu') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-check-double w-5"></i> Penjamin Mutu</a>
                <a href="{{ route('tentang') }}" class="block py-2 px-3 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-lg text-sm"><i class="fas fa-info-circle w-5"></i> Tentang</a>
            </div>
        </div>
    </nav>

    {{-- SEARCH ENGINE POPUP - Functional --}}
    <div id="searchOverlay" class="fixed inset-0 z-[100] hidden search-overlay">
        <div class="max-w-3xl mx-auto pt-[10vh] px-4">
            <div class="kaca-gelap rounded-2xl shadow-2xl shadow-kvt-950/80 border border-kvt-600/20 popup-enter">
                <div class="p-4 border-b border-kvt-700/30">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-search text-white text-sm"></i></div>
                        <input type="text" id="searchInput" class="flex-1 bg-transparent text-white text-lg placeholder-gray-500 outline-none" placeholder="Cari berita, kelas, materi, mitra..." autocomplete="off">
                        <kbd class="text-[10px] text-gray-500 bg-kvt-800 px-1.5 py-0.5 rounded border border-kvt-700">ESC</kbd>
                        <button onclick="tutupSearch()" class="text-gray-500 hover:text-white transition p-1"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="flex gap-1 mt-3">
                        <button onclick="gantimodeSearch('kvt')" class="search-mode-btn text-xs px-3 py-1.5 rounded-lg transition font-medium" data-mode="kvt"><i class="fas fa-cube mr-1"></i>KVT Hub</button>
                        <button onclick="gantimodeSearch('web')" class="search-mode-btn text-xs px-3 py-1.5 rounded-lg transition font-medium" data-mode="web"><i class="fas fa-globe mr-1"></i>Web Search</button>
                        <button onclick="gantimodeSearch('ai')" class="search-mode-btn text-xs px-3 py-1.5 rounded-lg transition font-medium" data-mode="ai"><i class="fas fa-robot mr-1"></i>AI Explorer</button>
                    </div>
                </div>
                <div class="p-4 max-h-[50vh] overflow-y-auto" id="searchResults">
                    <div id="searchDefault">
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-semibold mb-3">Navigasi Cepat</p>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('beranda') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-home text-kvt-400 text-sm"></i></div><div><p class="text-sm text-white">Beranda</p><p class="text-[10px] text-gray-500">Halaman utama</p></div></a>
                            <a href="{{ route('berita.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-newspaper text-emerald-400 text-sm"></i></div><div><p class="text-sm text-white">Berita</p><p class="text-[10px] text-gray-500">Berita terbaru</p></div></a>
                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-graduation-cap text-green-400 text-sm"></i></div><div><p class="text-sm text-white">Jenjang</p><p class="text-[10px] text-gray-500">TK sampai S3</p></div></a>
                            <a href="{{ route('kerja-sama.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-handshake text-yellow-400 text-sm"></i></div><div><p class="text-sm text-white">Kerja Sama</p><p class="text-[10px] text-gray-500">Sponsor & mitra</p></div></a>
                            <a href="{{ route('halaman.riset') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-microscope text-purple-400 text-sm"></i></div><div><p class="text-sm text-white">Riset</p><p class="text-[10px] text-gray-500">Inovasi & penelitian</p></div></a>
                            <a href="{{ route('halaman.keamanan') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-8 h-8 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-shield-alt text-red-400 text-sm"></i></div><div><p class="text-sm text-white">Keamanan</p><p class="text-[10px] text-gray-500">ISO 27001</p></div></a>
                        </div>
                    </div>
                    <div id="searchLoading" class="hidden text-center py-8"><div class="w-8 h-8 border-2 border-kvt-400 border-t-transparent rounded-full animate-spin mx-auto mb-3"></div><p class="text-sm text-gray-400">Mencari...</p></div>
                    <div id="searchKvtResults" class="hidden space-y-2"></div>
                    <div id="searchWebResults" class="hidden"><div class="text-center py-8"><div class="w-16 h-16 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-globe text-3xl text-white"></i></div><p class="text-white font-semibold mb-2" id="webSearchTitle">KVT Web Search</p><p class="text-sm text-gray-400 mb-4">Mesin pencari web terintegrasi</p><div id="webSearchLinks" class="flex flex-wrap justify-center gap-2"></div></div></div>
                    <div id="searchAIResults" class="hidden"><div class="text-center py-8"><div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-robot text-3xl text-white"></i></div><p class="text-white font-semibold mb-2">KVT AI Explorer</p><p class="text-sm text-gray-400 mb-4">Pencarian cerdas dengan analisis kontekstual</p><div id="aiExplorerContent" class="text-left"></div></div></div>
                </div>
                <div class="px-4 py-3 border-t border-kvt-700/30 flex items-center justify-between text-[10px] text-gray-500">
                    <div class="flex items-center gap-3"><span><kbd class="bg-kvt-800 px-1 py-0.5 rounded">Tab</kbd> navigasi</span><span><kbd class="bg-kvt-800 px-1 py-0.5 rounded">Enter</kbd> buka</span></div>
                    <span>KVT Search Engine v3.0</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('sukses'))
        <div class="fixed top-20 right-4 z-50 bg-green-500/90 text-white px-6 py-3 rounded-lg shadow-lg animate-slide-left" id="flashSukses"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>
    @endif
    @if(session('error'))
        <div class="fixed top-20 right-4 z-50 bg-red-500/90 text-white px-6 py-3 rounded-lg shadow-lg animate-slide-left" id="flashError"><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</div>
    @endif

    {{-- MAIN CONTENT --}}
    <main>@yield('konten')</main>

    {{-- MEGA FOOTER --}}
    <footer class="bg-kvt-950 border-t border-kvt-700/20 mt-20 relative">
        {{-- Visitor Stats Bar (Real-time dari DB) --}}
        <div class="bg-kvt-900/50 border-b border-kvt-700/20 py-3">
            <div class="max-w-7xl mx-auto px-4 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-6 text-xs text-gray-400">
                    <span><i class="fas fa-eye text-kvt-400 mr-1"></i> Pengunjung hari ini: <strong class="text-white" id="visitorToday">--</strong></span>
                    <span><i class="fas fa-users text-green-400 mr-1"></i> Online sekarang: <strong class="text-green-400" id="visitorOnline">--</strong></span>
                    <span><i class="fas fa-chart-line text-yellow-400 mr-1"></i> Total kunjungan: <strong class="text-white" id="visitorTotal">--</strong></span>
                    <span><i class="fas fa-fingerprint text-purple-400 mr-1"></i> Unik: <strong class="text-white" id="visitorUnik">--</strong></span>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-500"><span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span><span>Sistem berjalan normal</span></div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
                {{-- Col 1-2: Brand + Saran --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-lg flex items-center justify-center"><span class="text-white font-black text-lg">K</span></div>
                        <div><span class="text-lg font-bold"><span class="text-white">KVT</span> <span class="text-kvt-400">Hub</span></span><span class="block text-[9px] text-gray-500">Global Education & Research Ecosystem</span></div>
                    </div>
                    <p class="text-gray-400 text-sm max-w-md mb-4">Ekosistem pembelajaran, karir, dan riset digital terdepan. Mengintegrasikan pendidikan dari TK hingga S3 dengan teknologi dan gamifikasi.</p>
                    <div class="flex space-x-3 mb-5">
                        <a href="#" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-github"></i></a>
                        <a href="#" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-discord"></i></a>
                        <a href="#" class="w-9 h-9 bg-kvt-800/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4">
                        <h5 class="text-sm font-semibold text-white mb-2"><i class="fas fa-envelope text-kvt-400 mr-2"></i>Kotak Saran</h5>
                        <form onsubmit="kirimSaran(event)">
                            <textarea id="saranInput" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 resize-none" placeholder="Tulis saran atau masukan Anda..."></textarea>
                            <button type="submit" class="mt-2 text-xs bg-kvt-600 hover:bg-kvt-500 text-white px-4 py-1.5 rounded-lg transition"><i class="fas fa-paper-plane mr-1"></i>Kirim Saran</button>
                        </form>
                    </div>
                </div>

                {{-- Col 3: Platform --}}
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm">Platform</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Beranda</a></li>
                        <li><a href="{{ route('halaman.jenjang') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Jenjang Pendidikan</a></li>
                        <li><a href="{{ route('halaman.riset') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Riset & Inovasi</a></li>
                        <li><a href="{{ route('halaman.karir') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Karir & Industri</a></li>
                        <li><a href="{{ route('halaman.komunitas') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Komunitas</a></li>
                        <li><a href="{{ route('halaman.sertifikasi') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Sertifikasi</a></li>
                        <li><a href="{{ route('halaman.sumber-daya') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Sumber Daya</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Berita</a></li>
                        <li><a href="{{ route('kerja-sama.index') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Kerja Sama</a></li>
                    </ul>
                </div>

                {{-- Col 4: Tata Kelola --}}
                <div>
                    <h4 class="text-white font-semibold mb-4 text-sm">Tata Kelola</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('halaman.keamanan') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Keamanan</a></li>
                        <li><a href="{{ route('halaman.penjamin-mutu') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Penjamin Mutu</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Tentang</a></li>
                        <li><a href="{{ route('lisensi') }}" class="text-gray-400 hover:text-kvt-400 transition"><i class="fas fa-chevron-right text-[8px] mr-2 text-kvt-600"></i>Lisensi</a></li>
                    </ul>
                    <h4 class="text-white font-semibold mb-3 mt-5 text-sm">Standar</h4>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-green-500/10 rounded flex items-center justify-center"><i class="fas fa-shield-alt text-green-400 text-[10px]"></i></div><span>ISO 27001</span></div>
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-blue-500/10 rounded flex items-center justify-center"><i class="fas fa-sitemap text-blue-400 text-[10px]"></i></div><span>COBIT 2019</span></div>
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-purple-500/10 rounded flex items-center justify-center"><i class="fas fa-check-double text-purple-400 text-[10px]"></i></div><span>QA/QC</span></div>
                    </div>
                </div>

                {{-- Col 5: Flag Counter (Real-time dari DB) --}}
                <div class="lg:col-span-2">
                    <div class="bg-[#2B3750] rounded-xl p-4 border border-gray-600/30">
                        <h4 class="text-white font-semibold mb-3 text-sm flex items-center gap-2"><i class="fas fa-flag"></i> Visitors</h4>
                        <div id="flagCounterGrid" class="grid grid-cols-2 gap-x-4 gap-y-1.5 mb-3">
                            <div class="flag-item text-gray-400"><span>Memuat...</span></div>
                        </div>
                        <div class="border-t border-gray-600/30 pt-2 mt-2">
                            <p class="text-[11px] text-gray-400">Pageviews: <strong class="text-white" id="flagPageviews">--</strong></p>
                        </div>
                        <div class="mt-3 flex items-center gap-1">
                            <i class="fas fa-flag text-kvt-400 text-[10px]"></i>
                            <span class="text-[10px] text-gray-500 font-bold tracking-wider">KVT FLAG COUNTER</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-kvt-700/20 mt-10 pt-6 flex flex-wrap items-center justify-between gap-4">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} KVT Hub - Global Education & Research Ecosystem. Seluruh hak dilindungi.</p>
                <div class="flex items-center gap-4 text-xs text-gray-500">
                    <span>PostgreSQL</span>
                    <span>Laravel v{{ app()->version() }}</span>
                    <span>PHP v{{ PHP_VERSION }}</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- NEWS POPUP (from DB) --}}
    <div id="popupBerita" class="fixed inset-0 z-[90] hidden items-center justify-center search-overlay">
        <div class="max-w-lg mx-auto px-4">
            <div class="kaca-gelap rounded-2xl shadow-2xl border border-kvt-600/20 popup-enter overflow-hidden">
                <div class="bg-gradient-to-r from-emerald-600 to-kvt-600 p-4 flex items-center justify-between">
                    <h3 class="text-white font-bold flex items-center gap-2"><i class="fas fa-newspaper"></i> Berita Terbaru</h3>
                    <div class="flex items-center gap-2">
                        <label class="flex items-center gap-1.5 text-xs text-white/80 cursor-pointer"><input type="checkbox" id="togglePopupBerita" class="w-3 h-3 rounded" onchange="simpanPreferensiPopup()" checked> Tampilkan lagi</label>
                        <button onclick="tutupPopupBerita()" class="text-white/80 hover:text-white transition"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="p-5 space-y-3 max-h-[50vh] overflow-y-auto" id="popupBeritaContent">
                    <div class="text-center py-6 text-gray-500 text-sm">Memuat berita...</div>
                </div>
                <div class="p-3 border-t border-kvt-700/30 text-center">
                    <a href="{{ route('berita.index') }}" class="text-xs text-kvt-400 hover:text-kvt-300 transition"><i class="fas fa-arrow-right mr-1"></i> Lihat semua berita</a>
                </div>
            </div>
        </div>
    </div>

    {{-- SCRIPTS --}}
    <script>
        AOS.init({duration:800,easing:'ease-out-cubic',once:true,offset:80});

        // Clock
        function updateJam(){const e=document.getElementById('jamSekarang');if(e)e.textContent=new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit',second:'2-digit'})}updateJam();setInterval(updateJam,1000);

        // Navbar shadow on scroll
        window.addEventListener('scroll',function(){const n=document.getElementById('navbar');window.scrollY>20?n.classList.add('shadow-lg','shadow-kvt-950/50'):n.classList.remove('shadow-lg','shadow-kvt-950/50')});

        // Snow
        function buatSalju(){const c=document.getElementById('salju');for(let i=0;i<20;i++){setTimeout(()=>{const s=document.createElement('div');s.className='kepingan-salju';s.innerHTML='&#10052;';s.style.left=Math.random()*100+'%';s.style.fontSize=(Math.random()*8+4)+'px';s.style.animationDuration=(Math.random()*12+8)+'s';s.style.animationDelay=(Math.random()*5)+'s';s.style.opacity=Math.random()*0.4+0.1;c.appendChild(s);s.addEventListener('animationiteration',()=>{s.style.left=Math.random()*100+'%'})},i*400)}}buatSalju();

        // Scroll reveal
        const obs=new IntersectionObserver((entries)=>{entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('tampil')})},{threshold:0.1});document.querySelectorAll('.muncul-scroll').forEach(el=>obs.observe(el));

        // Flash auto-hide
        setTimeout(()=>{['flashSukses','flashError'].forEach(id=>{const el=document.getElementById(id);if(el)el.style.display='none'})},5000);

        // Mobile menu toggle
        function toggleMobile(){document.getElementById('mobileMenu').classList.toggle('hidden')}

        // ========================
        // MENU SLIDER (Arrow navigation for 12 menu items)
        // ========================
        let menuOffset=0;
        function slideMenu(dir){
            const track=document.getElementById('menuTrack');
            const items=track.children;
            const containerW=track.parentElement.offsetWidth;
            let totalW=0;
            for(let i=0;i<items.length;i++)totalW+=items[i].offsetWidth;
            const maxOffset=Math.max(0,totalW-containerW);
            menuOffset=Math.max(0,Math.min(maxOffset,menuOffset+dir*200));
            track.style.transform=`translateX(-${menuOffset}px)`;
            document.getElementById('menuArrowLeft').classList.toggle('hidden-arrow',menuOffset<=0);
            document.getElementById('menuArrowRight').classList.toggle('hidden-arrow',menuOffset>=maxOffset);
        }
        // Init arrows
        setTimeout(()=>slideMenu(0),100);

        // ========================
        // SEARCH ENGINE (Functional - queries backend API)
        // ========================
        let modeSearchAktif='kvt';
        let searchTimeout=null;

        function bukaSearch(){document.getElementById('searchOverlay').classList.remove('hidden');document.getElementById('searchOverlay').classList.add('flex');setTimeout(()=>document.getElementById('searchInput').focus(),100);document.body.style.overflow='hidden'}
        function tutupSearch(){document.getElementById('searchOverlay').classList.add('hidden');document.getElementById('searchOverlay').classList.remove('flex');document.getElementById('searchInput').value='';document.body.style.overflow='';resetSearchUI()}
        function gantimodeSearch(mode){modeSearchAktif=mode;document.querySelectorAll('.search-mode-btn').forEach(b=>{b.classList.toggle('bg-kvt-600',b.dataset.mode===mode);b.classList.toggle('text-white',b.dataset.mode===mode);b.classList.toggle('text-gray-400',b.dataset.mode!==mode);b.classList.toggle('bg-kvt-800/50',b.dataset.mode!==mode)});lakukanPencarian(document.getElementById('searchInput').value)}
        function resetSearchUI(){document.getElementById('searchDefault').classList.remove('hidden');document.getElementById('searchKvtResults').classList.add('hidden');document.getElementById('searchWebResults').classList.add('hidden');document.getElementById('searchAIResults').classList.add('hidden');document.getElementById('searchLoading').classList.add('hidden')}

        document.getElementById('searchInput').addEventListener('input',function(){
            clearTimeout(searchTimeout);
            searchTimeout=setTimeout(()=>lakukanPencarian(this.value),300);
        });

        function lakukanPencarian(q){
            if(!q||!q.trim()){resetSearchUI();return}
            document.getElementById('searchDefault').classList.add('hidden');

            if(modeSearchAktif==='kvt'){
                document.getElementById('searchWebResults').classList.add('hidden');
                document.getElementById('searchAIResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.remove('hidden');
                document.getElementById('searchKvtResults').classList.add('hidden');

                fetch('/api/search?q='+encodeURIComponent(q))
                    .then(r=>r.json())
                    .then(data=>{
                        document.getElementById('searchLoading').classList.add('hidden');
                        const c=document.getElementById('searchKvtResults');
                        c.innerHTML='';
                        if(data.hasil.length===0){
                            c.innerHTML='<div class="text-center py-6"><i class="fas fa-search text-3xl text-gray-600 mb-3"></i><p class="text-gray-500 text-sm">Tidak ditemukan untuk "'+q+'"</p></div>';
                        }else{
                            data.hasil.forEach(item=>{
                                c.innerHTML+=`<a href="${item.url}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas ${item.ikon} ${item.warna} text-sm"></i></div><div class="flex-1 min-w-0"><p class="text-sm text-white font-medium">${item.judul}</p><p class="text-[11px] text-gray-500 truncate">${item.deskripsi}</p><span class="text-[10px] text-kvt-600 uppercase">${item.tipe}</span></div><i class="fas fa-chevron-right text-gray-600 text-xs ml-auto shrink-0"></i></a>`;
                            });
                        }
                        c.classList.remove('hidden');
                    })
                    .catch(()=>{
                        document.getElementById('searchLoading').classList.add('hidden');
                        document.getElementById('searchKvtResults').innerHTML='<div class="text-center py-6 text-gray-500 text-sm">Gagal mencari. Coba lagi.</div>';
                        document.getElementById('searchKvtResults').classList.remove('hidden');
                    });
            }else if(modeSearchAktif==='web'){
                document.getElementById('searchKvtResults').classList.add('hidden');
                document.getElementById('searchAIResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.add('hidden');
                const w=document.getElementById('webSearchLinks');
                w.innerHTML=`<a href="https://www.google.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fab fa-google mr-2"></i>Google</a><a href="https://www.bing.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fab fa-microsoft mr-2"></i>Bing</a><a href="https://duckduckgo.com/?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fas fa-shield-alt mr-2"></i>DuckDuckGo</a><a href="https://scholar.google.com/scholar?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fas fa-graduation-cap mr-2"></i>Scholar</a><a href="https://github.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fab fa-github mr-2"></i>GitHub</a><a href="https://arxiv.org/search/?query=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg text-sm text-gray-300 hover:text-white transition border border-kvt-700/30"><i class="fas fa-file-alt mr-2"></i>arXiv</a>`;
                document.getElementById('webSearchTitle').textContent='Cari "'+q+'" di:';
                document.getElementById('searchWebResults').classList.remove('hidden');
            }else if(modeSearchAktif==='ai'){
                document.getElementById('searchKvtResults').classList.add('hidden');
                document.getElementById('searchWebResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.add('hidden');
                document.getElementById('aiExplorerContent').innerHTML=`<div class="space-y-3"><div class="p-4 bg-kvt-800/30 rounded-xl border border-kvt-700/30"><h4 class="text-sm font-semibold text-white mb-2"><i class="fas fa-lightbulb text-yellow-400 mr-2"></i>Analisis Kontekstual</h4><p class="text-xs text-gray-400">AI menganalisis: "<span class="text-kvt-400">${q}</span>"</p><div class="mt-3 space-y-2"><div class="flex items-center gap-2"><div class="w-2 h-2 bg-green-400 rounded-full"></div><span class="text-xs text-gray-300">Relevansi pendidikan</span></div><div class="flex items-center gap-2"><div class="w-2 h-2 bg-blue-400 rounded-full"></div><span class="text-xs text-gray-300">Koneksi research hub</span></div><div class="flex items-center gap-2"><div class="w-2 h-2 bg-purple-400 rounded-full"></div><span class="text-xs text-gray-300">Rekomendasi learning path</span></div></div></div><div class="p-4 bg-purple-600/10 rounded-xl border border-purple-500/20"><p class="text-xs text-gray-400"><i class="fas fa-robot text-purple-400 mr-2"></i>AI Explorer dalam pengembangan. Segera: AI Tutor, AI Research Assistant, AI Career Advisor.</p></div></div>`;
                document.getElementById('searchAIResults').classList.remove('hidden');
            }
        }

        document.addEventListener('keydown',function(e){if((e.ctrlKey||e.metaKey)&&e.key==='k'){e.preventDefault();bukaSearch()}if(e.key==='Escape')tutupSearch()});
        document.getElementById('searchOverlay').addEventListener('click',function(e){if(e.target===this)tutupSearch()});
        gantimodeSearch('kvt');

        // ========================
        // REAL-TIME VISITOR STATS (from DB via API)
        // ========================
        function updateVisitorStats(){
            fetch('/api/pengunjung/statistik')
                .then(r=>r.json())
                .then(d=>{
                    document.getElementById('visitorToday').textContent=(d.hari_ini||0).toLocaleString();
                    document.getElementById('visitorOnline').textContent=(d.online||0).toLocaleString();
                    document.getElementById('visitorTotal').textContent=(d.total||0).toLocaleString();
                    const uEl=document.getElementById('visitorUnik');
                    if(uEl)uEl.textContent=(d.total_unik||0).toLocaleString();
                })
                .catch(()=>{});
        }
        updateVisitorStats();
        setInterval(updateVisitorStats,15000); // Refresh setiap 15 detik

        // ========================
        // FLAG COUNTER (from DB via API)
        // ========================
        function updateFlagCounter(){
            fetch('/api/pengunjung/flag-counter')
                .then(r=>r.json())
                .then(d=>{
                    const grid=document.getElementById('flagCounterGrid');
                    if(!d.negara||d.negara.length===0){
                        grid.innerHTML='<div class="col-span-2 text-gray-500 text-xs">Belum ada data pengunjung</div>';
                        return;
                    }
                    grid.innerHTML='';
                    d.negara.forEach(n=>{
                        const code=(n.kode_negara||'xx').toLowerCase();
                        grid.innerHTML+=`<div class="flag-item"><img src="https://flagcdn.com/w20/${code}.png" alt="${n.negara}" onerror="this.src='https://flagcdn.com/w20/xx.png'"><span class="text-gray-300">${code.toUpperCase()}</span><span class="text-white font-medium ml-auto">${Number(n.total).toLocaleString()}</span></div>`;
                    });
                    const pv=document.getElementById('flagPageviews');
                    if(pv)pv.textContent=Number(d.pageviews||0).toLocaleString();
                })
                .catch(()=>{});
        }
        updateFlagCounter();
        setInterval(updateFlagCounter,60000);

        // ========================
        // NEWS TICKER (from DB via API)
        // ========================
        function updateTicker(){
            fetch('/api/berita/ticker')
                .then(r=>r.json())
                .then(data=>{
                    const tc=document.getElementById('tickerContent');
                    if(!data||data.length===0)return;
                    tc.innerHTML='';
                    data.forEach((b,i)=>{
                        const colors=['text-green-400','text-blue-400','text-yellow-400','text-purple-400','text-pink-400','text-cyan-400','text-orange-400','text-red-400'];
                        const c=colors[i%colors.length];
                        tc.innerHTML+=`<a href="/berita/${b.slug}" class="inline-flex items-center gap-2 hover:text-white transition${i>0?' ml-12':''}"><i class="fas fa-circle ${c} text-[6px]"></i> ${b.judul}</a>`;
                    });
                })
                .catch(()=>{});
        }
        updateTicker();
        setInterval(updateTicker,120000);

        // ========================
        // NEWS POPUP (from DB via API)
        // ========================
        function tampilkanPopupBerita(){
            if(localStorage.getItem('kvt_popup_hidden')==='true')return;
            fetch('/api/berita/popup')
                .then(r=>r.json())
                .then(data=>{
                    if(!data||data.length===0)return;
                    const content=document.getElementById('popupBeritaContent');
                    const icons=['fa-rocket text-blue-400','fa-shield-alt text-green-400','fa-microscope text-purple-400','fa-trophy text-yellow-400','fa-newspaper text-kvt-400'];
                    const bgIcons=['bg-blue-500/10','bg-green-500/10','bg-purple-500/10','bg-yellow-500/10','bg-kvt-500/10'];
                    content.innerHTML='';
                    data.forEach((b,i)=>{
                        const dt=new Date(b.terbit_pada);
                        const tgl=dt.toLocaleDateString('id-ID',{day:'numeric',month:'long',year:'numeric'});
                        content.innerHTML+=`<a href="/berita/${b.slug}" class="flex gap-3 p-3 bg-kvt-800/30 rounded-xl hover:bg-kvt-800/50 transition"><div class="w-10 h-10 ${bgIcons[i%5]} rounded-lg flex items-center justify-center shrink-0"><i class="fas ${icons[i%5]}"></i></div><div><h4 class="text-sm font-semibold text-white">${b.judul}</h4><p class="text-xs text-gray-400 mt-0.5 line-clamp-2">${b.ringkasan||''}</p><span class="text-[10px] text-kvt-400 mt-1 block">${tgl}</span></div></a>`;
                    });
                    setTimeout(()=>{const p=document.getElementById('popupBerita');p.classList.remove('hidden');p.classList.add('flex')},2500);
                })
                .catch(()=>{});
        }
        function tutupPopupBerita(){const p=document.getElementById('popupBerita');p.classList.add('hidden');p.classList.remove('flex')}
        function simpanPreferensiPopup(){localStorage.setItem('kvt_popup_hidden',document.getElementById('togglePopupBerita').checked?'false':'true')}
        document.getElementById('popupBerita').addEventListener('click',function(e){if(e.target===this)tutupPopupBerita()});
        tampilkanPopupBerita();

        function kirimSaran(e){e.preventDefault();const i=document.getElementById('saranInput');if(i.value.trim()){i.value='';alert('Terima kasih atas saran Anda! Tim KVT akan meninjau masukan ini.')}}
    </script>
    @stack('scripts')
</body>
</html>
