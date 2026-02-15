<!DOCTYPE html>
<html lang="id" class="scroll-smooth overflow-x-hidden">
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
                        'salju':'salju 10s linear infinite',
                        'float':'float 6s ease-in-out infinite',
                        'float-slow':'float 8s ease-in-out infinite',
                        'slide-up':'slideUp 0.8s ease-out',
                        'slide-left':'slideLeft 0.8s ease-out',
                        'fade-in':'fadeIn 1s ease-out',
                        'pulse-slow':'pulse 4s cubic-bezier(0.4,0,0.6,1) infinite',
                        'ticker':'ticker 40s linear infinite',
                        'dropdown':'dropdownIn 0.25s cubic-bezier(0.4,0,0.2,1)',
                        'marquee':'marquee 30s linear infinite',
                        'glow':'glow 2s ease-in-out infinite alternate',
                        'spin-slow':'spin 8s linear infinite',
                    },
                    keyframes: {
                        salju:{'0%':{transform:'translateY(-10vh) translateX(0)',opacity:'1'},'100%':{transform:'translateY(100vh) translateX(20px)',opacity:'0'}},
                        float:{'0%,100%':{transform:'translateY(0px)'},'50%':{transform:'translateY(-20px)'}},
                        slideUp:{'0%':{transform:'translateY(60px)',opacity:'0'},'100%':{transform:'translateY(0)',opacity:'1'}},
                        slideLeft:{'0%':{transform:'translateX(60px)',opacity:'0'},'100%':{transform:'translateX(0)',opacity:'1'}},
                        fadeIn:{'0%':{opacity:'0'},'100%':{opacity:'1'}},
                        ticker:{'0%':{transform:'translateX(100%)'},'100%':{transform:'translateX(-100%)'}},
                        dropdownIn:{'0%':{opacity:'0',transform:'translateY(-8px) scaleY(0.95)'},'100%':{opacity:'1',transform:'translateY(0) scaleY(1)'}},
                        marquee:{'0%':{transform:'translateX(0)'},'100%':{transform:'translateX(-50%)'}},
                        glow:{'0%':{boxShadow:'0 0 5px rgba(51,153,255,0.2)'},'100%':{boxShadow:'0 0 20px rgba(51,153,255,0.4), 0 0 60px rgba(51,153,255,0.1)'}},
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        code, pre, .font-mono { font-family: 'JetBrains Mono', monospace; }

        /* ===== SNOW ===== */
        .salju-container { position:fixed;top:0;left:0;width:100%;height:100%;pointer-events:none;z-index:50;overflow:hidden }
        .kepingan-salju { position:absolute;top:-10px;color:rgba(255,255,255,0.8);font-size:1em;animation:jatuh linear infinite;text-shadow:0 0 5px rgba(173,214,255,0.5) }
        @keyframes jatuh { 0%{transform:translateY(-10vh) rotate(0deg);opacity:1} 100%{transform:translateY(105vh) rotate(360deg);opacity:0} }

        /* ===== GLASS EFFECTS ===== */
        .kaca { background:rgba(255,255,255,0.05);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.1) }
        .kaca-gelap { background:rgba(2,16,41,0.95);backdrop-filter:blur(16px);border:1px solid rgba(51,153,255,0.1) }
        .kaca-nav { background:rgba(2,16,41,0.92);backdrop-filter:blur(20px);border-bottom:1px solid rgba(51,153,255,0.08) }

        /* ===== SCROLLBAR ===== */
        ::-webkit-scrollbar { width:6px }
        ::-webkit-scrollbar-track { background:#021029 }
        ::-webkit-scrollbar-thumb { background:linear-gradient(180deg,#3399FF,#8B5CF6);border-radius:3px }

        /* ===== TEXT GRADIENT ===== */
        .teks-gradien { background:linear-gradient(135deg,#3399FF,#8B5CF6);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text }
        .teks-gradien-emas { background:linear-gradient(135deg,#FFD700,#FFA500);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text }

        /* ===== TICKER ===== */
        .ticker-wrap { overflow:hidden }
        .ticker-content { display:inline-flex;white-space:nowrap;animation:ticker 40s linear infinite }
        .ticker-content:hover { animation-play-state:paused }

        /* ===== SEARCH OVERLAY ===== */
        .search-overlay { backdrop-filter:blur(20px);background:rgba(2,16,41,0.92) }
        .popup-enter { animation:popupIn 0.4s cubic-bezier(0.34,1.56,0.64,1) }
        @keyframes popupIn { 0%{transform:scale(0.8) translateY(20px);opacity:0} 100%{transform:scale(1) translateY(0);opacity:1} }

        /* ===== SCROLL REVEAL ===== */
        .muncul-scroll { opacity:0;transform:translateY(40px);transition:all 0.8s cubic-bezier(0.4,0,0.2,1) }
        .muncul-scroll.tampil { opacity:1;transform:translateY(0) }

        /* ===== 2-ROW NAVIGATION DROPDOWNS ===== */
        .nav-row { display:flex;align-items:center }
        .nav-item { position:relative }
        .nav-link {
            display:flex;align-items:center;gap:6px;padding:8px 14px;font-size:13px;font-weight:600;
            color:rgba(209,213,219,1);border-radius:8px;white-space:nowrap;transition:all 0.2s;
            text-transform:uppercase;letter-spacing:0.02em;
        }
        .nav-link:hover, .nav-item.dropdown-open > .nav-link {
            color:#5CADFF;background:rgba(51,153,255,0.08);
        }
        .nav-link .chevron-icon { font-size:8px;transition:transform 0.25s;margin-left:2px }
        .nav-item.dropdown-open > .nav-link .chevron-icon { transform:rotate(180deg) }

        /* Primary dropdown (Level 1) */
        .nav-dropdown {
            position:absolute;top:100%;left:0;min-width:260px;
            opacity:0;visibility:hidden;pointer-events:none;
            transform:translateY(-4px);transition:all 0.25s cubic-bezier(0.4,0,0.2,1);
            z-index:200;padding-top:4px;
        }
        .nav-item.dropdown-open > .nav-dropdown {
            opacity:1;visibility:visible;pointer-events:auto;transform:translateY(0);
        }
        .nav-dropdown-inner {
            background:rgba(4,31,77,0.98);backdrop-filter:blur(20px);
            border:1px solid rgba(51,153,255,0.15);border-radius:16px;
            padding:8px;box-shadow:0 20px 60px rgba(0,0,0,0.5),0 0 20px rgba(51,153,255,0.05);
            overflow:hidden;
        }
        .nav-dropdown-mega {
            min-width:580px;
        }
        .dropdown-item {
            display:flex;align-items:center;gap:10px;padding:10px 14px;font-size:13px;
            color:rgba(156,163,175,1);border-radius:10px;transition:all 0.2s;position:relative;
        }
        .dropdown-item:hover {
            color:#fff;background:rgba(51,153,255,0.1);
        }
        .dropdown-item .item-icon {
            width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;
            flex-shrink:0;font-size:13px;
        }
        .dropdown-item .item-text .item-title { font-size:13px;font-weight:600;color:#e5e7eb }
        .dropdown-item .item-text .item-desc { font-size:11px;color:#6b7280;margin-top:1px }
        .dropdown-item:hover .item-text .item-title { color:#fff }
        .dropdown-section-title {
            font-size:10px;font-weight:700;color:#5CADFF;text-transform:uppercase;letter-spacing:0.08em;
            padding:8px 14px 4px;
        }
        .dropdown-divider { height:1px;background:rgba(51,153,255,0.1);margin:4px 8px }

        /* Sub-submenu (Level 2) - flyout right like UNEJ */
        .has-submenu { position:relative }
        .has-submenu > .dropdown-item::after {
            content:'\f054';font-family:'Font Awesome 6 Free';font-weight:900;font-size:9px;
            color:#5CADFF;margin-left:auto;opacity:0.5;transition:all 0.2s;
        }
        .has-submenu:hover > .dropdown-item::after { opacity:1;transform:translateX(2px) }
        .sub-dropdown {
            position:absolute;left:100%;top:-8px;min-width:220px;padding-left:4px;
            opacity:0;visibility:hidden;pointer-events:none;
            transform:translateX(-4px);transition:all 0.2s;z-index:210;
        }
        .has-submenu:hover > .sub-dropdown {
            opacity:1;visibility:visible;pointer-events:auto;transform:translateX(0);
        }
        .sub-dropdown-inner {
            background:rgba(4,31,77,0.98);backdrop-filter:blur(20px);
            border:1px solid rgba(51,153,255,0.15);border-radius:12px;
            padding:6px;box-shadow:0 15px 40px rgba(0,0,0,0.5);
        }
        .sub-dropdown-item {
            display:flex;align-items:center;gap:8px;padding:8px 12px;font-size:12px;
            color:rgba(156,163,175,1);border-radius:8px;transition:all 0.2s;
        }
        .sub-dropdown-item:hover { color:#fff;background:rgba(51,153,255,0.1) }
        .sub-dropdown-item i { width:16px;text-align:center;font-size:11px }

        /* Align right-side dropdowns */
        .nav-item.dropdown-right .nav-dropdown { left:auto;right:0 }

        /* Flag counter style */
        .flag-item { display:flex;align-items:center;gap:6px;font-size:11px }
        .flag-item img { width:16px;height:12px;border-radius:1px;object-fit:cover }

        /* ===== SPONSOR MARQUEE ===== */
        .sponsor-track { display:flex;gap:3rem;animation:marquee 30s linear infinite }
        .sponsor-track:hover { animation-play-state:paused }

        /* ===== SECTION DECORATIONS ===== */
        .section-glow::before {
            content:'';position:absolute;top:50%;left:50%;width:600px;height:600px;
            background:radial-gradient(circle,rgba(51,153,255,0.06) 0%,transparent 70%);
            transform:translate(-50%,-50%);pointer-events:none;
        }
        .card-hover { transition:all 0.4s cubic-bezier(0.4,0,0.2,1) }
        .card-hover:hover { transform:translateY(-8px);box-shadow:0 20px 60px rgba(0,0,0,0.3),0 0 20px rgba(51,153,255,0.1) }

        /* ===== NOTIFICATION BADGE ===== */
        .notif-badge {
            position:absolute;top:-2px;right:-2px;width:8px;height:8px;
            background:#ef4444;border-radius:50%;border:2px solid #041F4D;
        }

        /* ===== SETTINGS SIDEBAR ===== */
        .settings-panel {
            position:fixed;right:-380px;top:0;bottom:0;width:360px;z-index:200;
            background:rgba(4,16,41,0.97);backdrop-filter:blur(24px);
            border-left:1px solid rgba(51,153,255,0.15);
            transition:right 0.35s cubic-bezier(0.4,0,0.2,1);
            overflow-y:auto;
        }
        .settings-panel.open { right:0 }
        .settings-overlay {
            position:fixed;inset:0;z-index:199;background:rgba(0,0,0,0.5);
            opacity:0;visibility:hidden;transition:all 0.3s;
        }
        .settings-overlay.open { opacity:1;visibility:visible }
        .settings-toggle {
            position:fixed;bottom:24px;right:24px;z-index:60;width:56px;height:56px;
            border-radius:16px;display:flex;align-items:center;justify-content:center;
            background:linear-gradient(135deg,#3399FF,#8B5CF6);
            box-shadow:0 8px 32px rgba(51,153,255,0.3),0 0 0 0 rgba(51,153,255,0.4);
            cursor:pointer;transition:all 0.3s;
            animation:settingsPulse 3s ease-in-out infinite;
        }
        .settings-toggle:hover {
            transform:scale(1.08);
            box-shadow:0 12px 40px rgba(51,153,255,0.4);
        }
        @keyframes settingsPulse {
            0%,100% { box-shadow:0 8px 32px rgba(51,153,255,0.3),0 0 0 0 rgba(51,153,255,0.3) }
            50% { box-shadow:0 8px 32px rgba(51,153,255,0.3),0 0 0 8px rgba(51,153,255,0) }
        }
        .setting-item {
            display:flex;align-items:center;justify-content:space-between;
            padding:12px 16px;border-radius:12px;
            background:rgba(51,153,255,0.04);border:1px solid rgba(51,153,255,0.08);
            transition:all 0.2s;
        }
        .setting-item:hover { background:rgba(51,153,255,0.08) }
        .toggle-switch {
            position:relative;width:44px;height:24px;background:#1e293b;
            border-radius:12px;cursor:pointer;transition:background 0.3s;
        }
        .toggle-switch.active { background:linear-gradient(135deg,#3399FF,#8B5CF6) }
        .toggle-switch::after {
            content:'';position:absolute;top:2px;left:2px;width:20px;height:20px;
            background:#fff;border-radius:50%;transition:transform 0.3s;
        }
        .toggle-switch.active::after { transform:translateX(20px) }
    </style>
    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen overflow-x-hidden">

    <div class="salju-container" id="salju"></div>

    {{-- ==================== TOP BAR (News Ticker) ==================== --}}
    <div class="bg-gradient-to-r from-kvt-900 via-kvt-800 to-kvt-900 border-b border-kvt-700/30 py-1.5 relative z-40" id="topBar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex items-center justify-between">
            <div class="flex items-center gap-3 flex-1 overflow-hidden">
                <a href="{{ route('berita.index') }}" class="bg-gradient-to-r from-emerald-600 to-emerald-500 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shrink-0 hover:from-emerald-500 hover:to-emerald-400 transition shadow-sm">
                    <i class="fas fa-bolt mr-1"></i>Berita
                </a>
                <div class="ticker-wrap flex-1">
                    <div class="ticker-content gap-12 text-xs text-gray-400" id="tickerContent">
                        <span class="inline-flex items-center gap-2"><i class="fas fa-circle text-green-400 text-[6px]"></i> Memuat berita terbaru...</span>
                    </div>
                </div>
            </div>
            <div class="hidden md:flex items-center gap-3 text-xs text-gray-500 shrink-0 ml-4">
                <a href="{{ route('halaman.keamanan') }}" class="hover:text-kvt-400 transition flex items-center gap-1"><i class="fas fa-shield-alt text-[10px]"></i><span>Keamanan</span></a>
                <span class="text-kvt-700/50">|</span>
                <a href="{{ route('halaman.penjamin-mutu') }}" class="hover:text-kvt-400 transition flex items-center gap-1"><i class="fas fa-check-double text-[10px]"></i><span>Penjamin Mutu</span></a>
                <span class="text-kvt-700/50">|</span>
                <span class="flex items-center gap-1"><i class="far fa-calendar text-[10px]"></i>{{ now()->translatedFormat('d M Y') }}</span>
                <span class="flex items-center gap-1"><i class="far fa-clock text-[10px]"></i><span id="jamSekarang"></span></span>
            </div>
        </div>
    </div>

    {{-- ==================== MAIN NAVIGATION (2-Row like SMAN Kebumen) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-nav" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">

            {{-- ===== ROW 1: Logo + Primary Menus + Search/Auth ===== --}}
            <div class="flex items-center h-16">

                {{-- Logo (spacious, not cramped) --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 shrink-0 mr-6 group">
                    <div class="w-11 h-11 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg shadow-kvt-500/20 group-hover:shadow-kvt-500/40 transition-shadow animate-glow">
                        <span class="text-white font-black text-xl tracking-tight">K</span>
                    </div>
                    <div class="leading-tight">
                        <span class="text-xl font-extrabold tracking-tight">
                            <span class="text-white">KVT</span><span class="text-kvt-400">Hub</span>
                        </span>
                        <span class="block text-[10px] text-gray-500 tracking-[0.15em] font-semibold">GLOBAL EDUCATION</span>
                    </div>
                </a>

                {{-- Separator --}}
                <div class="hidden lg:block w-px h-8 bg-kvt-700/30 mr-4"></div>

                {{-- Row 1 Menu Items --}}
                <div class="hidden lg:flex items-center gap-0.5 flex-1 nav-row" id="navRow1">

                    {{-- 1. Beranda (with sub-menu) --}}
                    <div class="nav-item">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-home text-kvt-400"></i> Beranda
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner">
                                <a href="{{ route('beranda') }}" class="dropdown-item">
                                    <div class="item-icon bg-kvt-500/10"><i class="fas fa-home text-kvt-400"></i></div>
                                    <div class="item-text"><div class="item-title">Beranda Utama</div><div class="item-desc">Halaman utama platform</div></div>
                                </a>
                                @auth
                                <a href="{{ route('dasbor') }}" class="dropdown-item">
                                    <div class="item-icon bg-green-500/10"><i class="fas fa-tachometer-alt text-green-400"></i></div>
                                    <div class="item-text"><div class="item-title">Dasbor Saya</div><div class="item-desc">Panel kontrol pengguna</div></div>
                                </a>
                                @endauth
                                <a href="{{ route('halaman.tentang') }}" class="dropdown-item">
                                    <div class="item-icon bg-purple-500/10"><i class="fas fa-landmark text-purple-400"></i></div>
                                    <div class="item-text"><div class="item-title">Tentang KVT Hub</div><div class="item-desc">Visi, misi & informasi</div></div>
                                </a>
                                <a href="{{ route('sponsor') }}" class="dropdown-item">
                                    <div class="item-icon bg-yellow-500/10"><i class="fas fa-gem text-yellow-400"></i></div>
                                    <div class="item-text"><div class="item-title">Sponsor & Mitra</div><div class="item-desc">Pendukung platform</div></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Jenjang (with nested sub-submenus like UNEJ) --}}
                    <div class="nav-item">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-graduation-cap text-green-400"></i> Jenjang
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner nav-dropdown-mega">
                                <div class="grid grid-cols-3 gap-1">
                                    {{-- Column 1: Pendidikan Dasar --}}
                                    <div>
                                        <div class="dropdown-section-title">Pendidikan Dasar</div>
                                        <a href="{{ route('halaman.pendidikan-dasar.tk-paud') }}" class="dropdown-item">
                                            <div class="item-icon bg-pink-500/10"><i class="fas fa-baby text-pink-400"></i></div>
                                            <div class="item-text"><div class="item-title">TK / PAUD</div><div class="item-desc">Usia 4-6 tahun</div></div>
                                        </a>
                                        <a href="{{ route('halaman.pendidikan-dasar.sd-mi') }}" class="dropdown-item">
                                            <div class="item-icon bg-blue-500/10"><i class="fas fa-book-open text-blue-400"></i></div>
                                            <div class="item-text"><div class="item-title">SD / MI</div><div class="item-desc">Kelas 1-6</div></div>
                                        </a>
                                        <a href="{{ route('halaman.pendidikan-dasar.smp-mts') }}" class="dropdown-item">
                                            <div class="item-icon bg-green-500/10"><i class="fas fa-book text-green-400"></i></div>
                                            <div class="item-text"><div class="item-title">SMP / MTs</div><div class="item-desc">Kelas 7-9</div></div>
                                        </a>

                                        {{-- Nested sub-submenu for SMA --}}
                                        <div class="has-submenu">
                                            <div class="dropdown-item">
                                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-school text-yellow-400"></i></div>
                                                <div class="item-text"><div class="item-title">SMA / MA / SMK</div><div class="item-desc">Kelas 10-12</div></div>
                                            </div>
                                            <div class="sub-dropdown">
                                                <div class="sub-dropdown-inner">
                                                    <a href="{{ route('halaman.pendidikan-dasar.sma-ma') }}" class="sub-dropdown-item"><i class="fas fa-school text-yellow-400"></i> SMA / MA</a>
                                                    <a href="{{ route('halaman.pendidikan-dasar.smk-teknologi') }}" class="sub-dropdown-item"><i class="fas fa-tools text-orange-400"></i> SMK Teknologi</a>
                                                    <a href="{{ route('halaman.pendidikan-dasar.smk-bisnis') }}" class="sub-dropdown-item"><i class="fas fa-store text-pink-400"></i> SMK Bisnis</a>
                                                    <a href="{{ route('halaman.pendidikan-dasar.smk-kesehatan') }}" class="sub-dropdown-item"><i class="fas fa-heartbeat text-red-400"></i> SMK Kesehatan</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Column 2: Pendidikan Tinggi (nested sub-submenu) --}}
                                    <div>
                                        <div class="dropdown-section-title">Pendidikan Tinggi</div>
                                        <a href="{{ route('halaman.pendidikan-tinggi.diploma') }}" class="dropdown-item">
                                            <div class="item-icon bg-cyan-500/10"><i class="fas fa-certificate text-cyan-400"></i></div>
                                            <div class="item-text"><div class="item-title">Diploma (D1-D4)</div><div class="item-desc">Vokasi & terapan</div></div>
                                        </a>

                                        {{-- Nested: S1/S2/S3 --}}
                                        <div class="has-submenu">
                                            <div class="dropdown-item">
                                                <div class="item-icon bg-blue-500/10"><i class="fas fa-user-graduate text-blue-400"></i></div>
                                                <div class="item-text"><div class="item-title">Strata (S1-S3)</div><div class="item-desc">Sarjana hingga Doktoral</div></div>
                                            </div>
                                            <div class="sub-dropdown">
                                                <div class="sub-dropdown-inner">
                                                    <a href="{{ route('halaman.pendidikan-tinggi.sarjana') }}" class="sub-dropdown-item"><i class="fas fa-user-graduate text-blue-400"></i> Sarjana (S1)</a>
                                                    <a href="{{ route('halaman.pendidikan-tinggi.magister') }}" class="sub-dropdown-item"><i class="fas fa-flask text-purple-400"></i> Magister (S2)</a>
                                                    <a href="{{ route('halaman.pendidikan-tinggi.doktoral') }}" class="sub-dropdown-item"><i class="fas fa-atom text-red-400"></i> Doktoral (S3/PhD)</a>
                                                    <a href="{{ route('halaman.pendidikan-tinggi.post-doktoral') }}" class="sub-dropdown-item"><i class="fas fa-microscope text-teal-400"></i> Post-Doctoral</a>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="{{ route('halaman.pendidikan-tinggi.profesi') }}" class="dropdown-item">
                                            <div class="item-icon bg-amber-500/10"><i class="fas fa-briefcase text-amber-400"></i></div>
                                            <div class="item-text"><div class="item-title">Profesi</div><div class="item-desc">Dokter, Apoteker, dll</div></div>
                                        </a>
                                    </div>

                                    {{-- Column 3: Program Khusus --}}
                                    <div>
                                        <div class="dropdown-section-title">Program Khusus</div>
                                        <a href="{{ route('halaman.karir.lowongan') }}" class="dropdown-item">
                                            <div class="item-icon bg-pink-500/10"><i class="fas fa-rocket text-pink-400"></i></div>
                                            <div class="item-text"><div class="item-title">Fast Track Career</div><div class="item-desc">Percepatan karir industri</div></div>
                                        </a>
                                        <a href="{{ route('halaman.riset.kolaborasi') }}" class="dropdown-item">
                                            <div class="item-icon bg-teal-500/10"><i class="fas fa-microscope text-teal-400"></i></div>
                                            <div class="item-text"><div class="item-title">Research Hub</div><div class="item-desc">Pusat riset & inovasi</div></div>
                                        </a>
                                        <a href="{{ route('halaman.sertifikasi') }}" class="dropdown-item">
                                            <div class="item-icon bg-yellow-500/10"><i class="fas fa-award text-yellow-400"></i></div>
                                            <div class="item-text"><div class="item-title">Sertifikasi Pro</div><div class="item-desc">120+ program sertifikasi</div></div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <div class="px-4 py-2">
                                            <div class="bg-kvt-800/30 rounded-xl p-3 border border-kvt-700/20">
                                                <p class="text-[11px] text-gray-400"><i class="fas fa-info-circle text-kvt-400 mr-1"></i> 13 jenjang dari TK hingga S3</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 3. Platform (with nested) --}}
                    <div class="nav-item">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-cubes text-purple-400"></i> Platform
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:320px">
                                <div class="dropdown-section-title">Pembelajaran</div>
                                @auth
                                <a href="{{ route('kelas.index') }}" class="dropdown-item">
                                    <div class="item-icon bg-kvt-500/10"><i class="fas fa-chalkboard text-kvt-400"></i></div>
                                    <div class="item-text"><div class="item-title">Kelas</div><div class="item-desc">Kelola & ikuti kelas</div></div>
                                </a>
                                <a href="{{ route('laporan.index') }}" class="dropdown-item">
                                    <div class="item-icon bg-green-500/10"><i class="fas fa-chart-bar text-green-400"></i></div>
                                    <div class="item-text"><div class="item-title">Laporan & Diagram</div><div class="item-desc">30+ jenis visualisasi</div></div>
                                </a>
                                <a href="{{ route('dasbor') }}" class="dropdown-item">
                                    <div class="item-icon bg-yellow-500/10"><i class="fas fa-tachometer-alt text-yellow-400"></i></div>
                                    <div class="item-text"><div class="item-title">Dasbor</div><div class="item-desc">Panel kontrol pengguna</div></div>
                                </a>
                                @else
                                <a href="{{ route('masuk') }}" class="dropdown-item">
                                    <div class="item-icon bg-kvt-500/10"><i class="fas fa-chalkboard text-kvt-400"></i></div>
                                    <div class="item-text"><div class="item-title">Kelas</div><div class="item-desc">Login untuk mengakses</div></div>
                                </a>
                                @endauth

                                <div class="dropdown-divider"></div>
                                <div class="dropdown-section-title">Ekosistem</div>

                                <div class="has-submenu">
                                    <div class="dropdown-item">
                                        <div class="item-icon bg-purple-500/10"><i class="fas fa-layer-group text-purple-400"></i></div>
                                        <div class="item-text"><div class="item-title">Semua Fitur</div><div class="item-desc">Jelajahi platform</div></div>
                                    </div>
                                    <div class="sub-dropdown">
                                        <div class="sub-dropdown-inner">
                                            <a href="{{ route('halaman.riset') }}" class="sub-dropdown-item"><i class="fas fa-microscope text-purple-400"></i> Riset & Inovasi</a>
                                            <a href="{{ route('halaman.karir') }}" class="sub-dropdown-item"><i class="fas fa-briefcase text-orange-400"></i> Karir & Industri</a>
                                            <a href="{{ route('halaman.komunitas') }}" class="sub-dropdown-item"><i class="fas fa-users text-pink-400"></i> Komunitas</a>
                                            <a href="{{ route('halaman.sertifikasi') }}" class="sub-dropdown-item"><i class="fas fa-award text-yellow-400"></i> Sertifikasi</a>
                                            <a href="{{ route('halaman.sumber-daya') }}" class="sub-dropdown-item"><i class="fas fa-database text-cyan-400"></i> Sumber Daya</a>
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('berita.index') }}" class="dropdown-item">
                                    <div class="item-icon bg-emerald-500/10"><i class="fas fa-newspaper text-emerald-400"></i></div>
                                    <div class="item-text"><div class="item-title">Berita</div><div class="item-desc">Info & update terbaru</div></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- 4. Berita (with sub-menu) --}}
                    <div class="nav-item">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-newspaper text-emerald-400"></i> Berita
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner">
                                <a href="{{ route('berita.index') }}" class="dropdown-item">
                                    <div class="item-icon bg-emerald-500/10"><i class="fas fa-newspaper text-emerald-400"></i></div>
                                    <div class="item-text"><div class="item-title">Semua Berita</div><div class="item-desc">Berita & update terbaru</div></div>
                                </a>
                                <a href="{{ route('berita.index', ['kategori' => 'akademik']) }}" class="dropdown-item">
                                    <div class="item-icon bg-blue-500/10"><i class="fas fa-graduation-cap text-blue-400"></i></div>
                                    <div class="item-text"><div class="item-title">Berita Akademik</div><div class="item-desc">Info akademik & pendidikan</div></div>
                                </a>
                                <a href="{{ route('berita.index', ['kategori' => 'teknologi']) }}" class="dropdown-item">
                                    <div class="item-icon bg-purple-500/10"><i class="fas fa-microchip text-purple-400"></i></div>
                                    <div class="item-text"><div class="item-title">Berita Teknologi</div><div class="item-desc">Perkembangan teknologi</div></div>
                                </a>
                                <a href="{{ route('berita.index', ['kategori' => 'event']) }}" class="dropdown-item">
                                    <div class="item-icon bg-orange-500/10"><i class="fas fa-calendar-star text-orange-400"></i></div>
                                    <div class="item-text"><div class="item-title">Event & Kegiatan</div><div class="item-desc">Jadwal acara mendatang</div></div>
                                </a>
                                <a href="{{ route('berita.index', ['kategori' => 'pengumuman']) }}" class="dropdown-item">
                                    <div class="item-icon bg-red-500/10"><i class="fas fa-bullhorn text-red-400"></i></div>
                                    <div class="item-text"><div class="item-title">Pengumuman</div><div class="item-desc">Info resmi platform</div></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- 5. Kerja Sama (nested) --}}
                    <div class="nav-item">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-handshake text-yellow-400"></i> Kerja Sama
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner">
                                <a href="{{ route('kerja-sama.index') }}" class="dropdown-item">
                                    <div class="item-icon bg-kvt-500/10"><i class="fas fa-building text-kvt-400"></i></div>
                                    <div class="item-text"><div class="item-title">Semua Mitra</div><div class="item-desc">Lihat seluruh mitra</div></div>
                                </a>

                                <div class="has-submenu">
                                    <div class="dropdown-item">
                                        <div class="item-icon bg-yellow-500/10"><i class="fas fa-gem text-yellow-400"></i></div>
                                        <div class="item-text"><div class="item-title">Sponsor & Mitra</div><div class="item-desc">Kategori kerjasama</div></div>
                                    </div>
                                    <div class="sub-dropdown">
                                        <div class="sub-dropdown-inner">
                                            <a href="{{ route('kerja-sama.index', ['tipe' => 'sponsor']) }}" class="sub-dropdown-item"><i class="fas fa-gem text-yellow-400"></i> Sponsor</a>
                                            <a href="{{ route('kerja-sama.index', ['tipe' => 'mitra_akademik']) }}" class="sub-dropdown-item"><i class="fas fa-university text-blue-400"></i> Mitra Akademik</a>
                                            <a href="{{ route('kerja-sama.index', ['tipe' => 'mitra_industri']) }}" class="sub-dropdown-item"><i class="fas fa-industry text-orange-400"></i> Mitra Industri</a>
                                            <a href="{{ route('kerja-sama.index', ['tipe' => 'media_partner']) }}" class="sub-dropdown-item"><i class="fas fa-bullhorn text-pink-400"></i> Media Partner</a>
                                            <a href="{{ route('kerja-sama.index', ['tipe' => 'komunitas']) }}" class="sub-dropdown-item"><i class="fas fa-heart text-red-400"></i> Komunitas</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 6. Tentang --}}
                    <div class="nav-item dropdown-right">
                        <button class="nav-link" data-dropdown>
                            <i class="fas fa-info-circle text-cyan-400"></i> Tentang
                            <i class="fas fa-chevron-down chevron-icon"></i>
                        </button>
                        <div class="nav-dropdown">
                            <div class="nav-dropdown-inner">
                                <a href="{{ route('tentang') }}" class="dropdown-item">
                                    <div class="item-icon bg-kvt-500/10"><i class="fas fa-landmark text-kvt-400"></i></div>
                                    <div class="item-text"><div class="item-title">Tentang KVT Hub</div><div class="item-desc">Visi, misi & tim</div></div>
                                </a>
                                <a href="{{ route('lisensi') }}" class="dropdown-item">
                                    <div class="item-icon bg-green-500/10"><i class="fas fa-file-contract text-green-400"></i></div>
                                    <div class="item-text"><div class="item-title">Lisensi</div><div class="item-desc">Ketentuan penggunaan</div></div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('halaman.komunitas.organisasi') }}" class="dropdown-item">
                                    <div class="item-icon bg-pink-500/10"><i class="fas fa-sitemap text-pink-400"></i></div>
                                    <div class="item-text"><div class="item-title">Struktur Organisasi</div><div class="item-desc">Organisasi internal & eksternal</div></div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="dropdown-item">
                                    <div class="item-icon bg-gray-500/10"><i class="fab fa-github text-gray-300"></i></div>
                                    <div class="item-text"><div class="item-title">GitHub Repository</div><div class="item-desc">Source code & kontribusi</div></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right: Search + Notification + Auth --}}
                <div class="hidden lg:flex items-center gap-2 shrink-0 ml-4">
                    <button onclick="bukaSearch()" class="text-gray-400 hover:text-kvt-400 transition p-2.5 rounded-xl hover:bg-kvt-800/30 relative" title="Cari (Ctrl+K)">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="text-gray-400 hover:text-kvt-400 transition p-2.5 rounded-xl hover:bg-kvt-800/30 relative" title="Notifikasi">
                        <i class="fas fa-bell"></i>
                        <div class="notif-badge"></div>
                    </button>

                    <div class="w-px h-6 bg-kvt-700/30 mx-1"></div>

                    @guest
                        <a href="{{ route('masuk') }}" class="text-sm text-gray-300 hover:text-white transition px-4 py-2 rounded-xl hover:bg-kvt-800/30 font-medium">Masuk</a>
                        <a href="{{ route('daftar') }}" class="text-sm bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-5 py-2 rounded-xl transition shadow-lg shadow-kvt-500/20 font-semibold">Daftar</a>
                    @else
                        <div class="flex items-center gap-2 bg-kvt-900/50 rounded-full px-3 py-1.5 border border-kvt-700/30">
                            <span class="text-kvt-400 text-xs font-bold">Lv.{{ Auth::user()->level }}</span>
                            <div class="w-12 h-1.5 bg-kvt-800 rounded-full overflow-hidden">
                                <div class="h-full bg-gradient-to-r from-kvt-400 to-ungu-400 rounded-full" style="width:{{ Auth::user()->persenLevel() }}%"></div>
                            </div>
                        </div>

                        <div class="relative group nav-profile">
                            <button class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-700/30 rounded-xl px-3 py-1.5 transition border border-kvt-700/20">
                                <div class="w-7 h-7 rounded-full bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center text-xs font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <span class="text-sm text-gray-300 hidden xl:block">{{ Str::limit(Auth::user()->name, 12) }}</span>
                                <i class="fas fa-chevron-down text-[8px] text-gray-500"></i>
                            </button>
                            <div class="absolute right-0 mt-2 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50 pt-1">
                                <div class="nav-dropdown-inner">
                                    <div class="px-4 py-3 border-b border-kvt-700/20">
                                        <p class="text-sm font-semibold text-white">{{ Auth::user()->name }}</p>
                                        <p class="text-xs text-gray-500">{{ Auth::user()->email }}</p>
                                        <p class="text-xs text-kvt-400 mt-1"><i class="fas fa-star mr-1"></i>{{ Auth::user()->getRangString() }} - Level {{ Auth::user()->level }}</p>
                                    </div>
                                    <div class="py-1">
                                        <a href="{{ route('dasbor') }}" class="dropdown-item"><i class="fas fa-tachometer-alt text-kvt-400 w-5"></i><span class="text-sm">Dasbor</span></a>
                                        @if(Auth::user()->adalahAdmin())
                                        <a href="{{ route('admin.dasbor') }}" class="dropdown-item"><i class="fas fa-shield-alt text-yellow-400 w-5"></i><span class="text-sm text-yellow-400">Panel Admin</span></a>
                                        @endif
                                        <div class="dropdown-divider"></div>
                                        <form method="POST" action="{{ route('keluar') }}">
                                            @csrf
                                            <button type="submit" class="dropdown-item w-full text-left"><i class="fas fa-sign-out-alt text-red-400 w-5"></i><span class="text-sm text-red-400">Keluar</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>

                {{-- Mobile hamburger --}}
                <button class="lg:hidden text-gray-300 hover:text-white p-2 ml-auto" onclick="toggleMobile()">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>

            {{-- ===== ROW 2: Secondary Menus ===== --}}
            <div class="hidden lg:flex items-center gap-0.5 border-t border-kvt-700/15 h-11 nav-row" id="navRow2">

                {{-- 7. Riset (nested) --}}
                <div class="nav-item">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-microscope text-purple-400"></i> Riset
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.riset') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-flask text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Pusat Riset</div><div class="item-desc">Lab virtual & eksperimen</div></div>
                            </a>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-blue-500/10"><i class="fas fa-file-alt text-blue-400"></i></div>
                                    <div class="item-text"><div class="item-title">Publikasi</div><div class="item-desc">Jurnal & paper ilmiah</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.riset.publikasi') }}" class="sub-dropdown-item"><i class="fas fa-file-alt text-blue-400"></i> Jurnal Nasional</a>
                                        <a href="{{ route('halaman.riset.publikasi') }}" class="sub-dropdown-item"><i class="fas fa-globe text-green-400"></i> Jurnal Internasional</a>
                                        <a href="{{ route('halaman.riset.konferensi') }}" class="sub-dropdown-item"><i class="fas fa-book text-purple-400"></i> Prosiding Konferensi</a>
                                        <a href="{{ route('halaman.riset.publikasi') }}" class="sub-dropdown-item"><i class="fas fa-bookmark text-cyan-400"></i> Repositori Institusi</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.riset.kolaborasi') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-project-diagram text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Kolaborasi Riset</div><div class="item-desc">Tim riset lintas institusi</div></div>
                            </a>
                            <a href="{{ route('halaman.riset.inovasi-paten') }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-lightbulb text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Inovasi & Paten</div><div class="item-desc">Daftarkan inovasi</div></div>
                            </a>
                            <a href="{{ route('halaman.riset.konferensi') }}" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-calendar-alt text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Konferensi</div><div class="item-desc">Event & seminar ilmiah</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 8. Karir (nested) --}}
                <div class="nav-item">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-briefcase text-orange-400"></i> Karir
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.karir.lowongan') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-search-dollar text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Lowongan Kerja</div><div class="item-desc">Perusahaan top nasional</div></div>
                            </a>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-blue-500/10"><i class="fas fa-user-tie text-blue-400"></i></div>
                                    <div class="item-text"><div class="item-title">Program Magang</div><div class="item-desc">Intern & training</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.karir.magang') }}" class="sub-dropdown-item"><i class="fas fa-laptop-code text-kvt-400"></i> Magang IT</a>
                                        <a href="{{ route('halaman.karir.magang') }}" class="sub-dropdown-item"><i class="fas fa-chart-line text-green-400"></i> Magang Bisnis</a>
                                        <a href="{{ route('halaman.karir.magang') }}" class="sub-dropdown-item"><i class="fas fa-palette text-pink-400"></i> Magang Desain</a>
                                        <a href="{{ route('halaman.karir.magang') }}" class="sub-dropdown-item"><i class="fas fa-flask text-purple-400"></i> Magang Riset</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.karir.mentoring') }}" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-chalkboard-teacher text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Mentoring</div><div class="item-desc">Bimbingan 1-on-1</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.cv-builder') }}" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-file-invoice text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">CV Builder</div><div class="item-desc">Template ATS-friendly</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.lowongan') }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-industry text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">500+ Perusahaan</div><div class="item-desc">Mitra industri global</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 9. Komunitas (nested with Organisasi) --}}
                <div class="nav-item">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-users text-pink-400"></i> Komunitas
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner" style="min-width:320px">
                            <div class="dropdown-section-title">Forum & Diskusi</div>
                            <a href="{{ route('halaman.komunitas.forum-diskusi') }}" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-comments text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">Forum Diskusi</div><div class="item-desc">Tanya jawab & sharing</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.study-group') }}" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-user-friends text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Study Group</div><div class="item-desc">Belajar bersama virtual</div></div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-section-title">Organisasi</div>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-blue-500/10"><i class="fas fa-building text-blue-400"></i></div>
                                    <div class="item-text"><div class="item-title">Organisasi Internal</div><div class="item-desc">BEM, HMIF, OSIS, dll</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'internal']) }}" class="sub-dropdown-item"><i class="fas fa-university text-blue-400"></i> BEM & Himpunan</a>
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'internal', 'kategori' => 'olahraga']) }}" class="sub-dropdown-item"><i class="fas fa-futbol text-green-400"></i> Klub Olahraga</a>
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'internal', 'kategori' => 'seni_budaya']) }}" class="sub-dropdown-item"><i class="fas fa-palette text-pink-400"></i> Seni & Budaya</a>
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'internal', 'kategori' => 'keagamaan']) }}" class="sub-dropdown-item"><i class="fas fa-mosque text-teal-400"></i> Keagamaan</a>
                                    </div>
                                </div>
                            </div>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-green-500/10"><i class="fas fa-globe text-green-400"></i></div>
                                    <div class="item-text"><div class="item-title">Organisasi Luar</div><div class="item-desc">Nasional & Internasional</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'nasional']) }}" class="sub-dropdown-item"><i class="fas fa-flag text-red-400"></i> Organisasi Nasional</a>
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'internasional']) }}" class="sub-dropdown-item"><i class="fas fa-globe-americas text-cyan-400"></i> Organisasi Internasional</a>
                                        <a href="{{ route('halaman.komunitas.organisasi', ['tipe' => 'eksternal']) }}" class="sub-dropdown-item"><i class="fas fa-handshake text-yellow-400"></i> Mitra Eksternal</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.komunitas.organisasi', ['unggulan' => 1]) }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-star text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Organisasi Unggulan</div><div class="item-desc">Pilihan terbaik yang direkomendasikan</div></div>
                            </a>

                            <div class="dropdown-divider"></div>
                            <div class="dropdown-section-title">Lainnya</div>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-amber-500/10"><i class="fas fa-graduation-cap text-amber-400"></i></div>
                                    <div class="item-text"><div class="item-title">Alumni Network</div><div class="item-desc">Jaringan & mentoring</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.komunitas.alumni-network') }}" class="sub-dropdown-item"><i class="fas fa-users text-amber-400"></i> Direktori Alumni</a>
                                        <a href="{{ route('halaman.komunitas.alumni-network') }}" class="sub-dropdown-item"><i class="fas fa-calendar-check text-green-400"></i> Alumni Event</a>
                                        <a href="{{ route('halaman.komunitas.alumni-network') }}" class="sub-dropdown-item"><i class="fas fa-handshake text-kvt-400"></i> Alumni Mentoring</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.komunitas.hackathon') }}" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-code text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Hackathon</div><div class="item-desc">Kompetisi coding</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.open-source') }}" class="dropdown-item">
                                <div class="item-icon bg-gray-500/10"><i class="fab fa-github text-gray-300"></i></div>
                                <div class="item-text"><div class="item-title">Open Source</div><div class="item-desc">Kontribusi proyek terbuka</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 10. Sertifikasi (nested) --}}
                <div class="nav-item">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-award text-yellow-400"></i> Sertifikasi
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.sertifikasi.kompetensi-nasional') }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-certificate text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Kompetensi Nasional</div><div class="item-desc">BNSP, LSP & resmi</div></div>
                            </a>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-orange-500/10"><i class="fab fa-aws text-orange-400"></i></div>
                                    <div class="item-text"><div class="item-title">Cloud & Tech</div><div class="item-desc">Sertifikasi internasional</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.sertifikasi.cloud-tech') }}" class="sub-dropdown-item"><i class="fab fa-aws text-orange-400"></i> AWS Certified</a>
                                        <a href="{{ route('halaman.sertifikasi.cloud-tech') }}" class="sub-dropdown-item"><i class="fab fa-google text-blue-400"></i> Google Cloud</a>
                                        <a href="{{ route('halaman.sertifikasi.cloud-tech') }}" class="sub-dropdown-item"><i class="fab fa-microsoft text-cyan-400"></i> Microsoft Azure</a>
                                        <a href="{{ route('halaman.sertifikasi.cloud-tech') }}" class="sub-dropdown-item"><i class="fas fa-database text-green-400"></i> Oracle / Cisco</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.sertifikasi.blockchain-credential') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-link text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Blockchain Credential</div><div class="item-desc">Verifikasi digital</div></div>
                            </a>
                            <a href="{{ route('halaman.sertifikasi') }}" class="dropdown-item">
                                <div class="item-icon bg-teal-500/10"><i class="fas fa-list-ol text-teal-400"></i></div>
                                <div class="item-text"><div class="item-title">120+ Program</div><div class="item-desc">Katalog lengkap</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 11. Sumber Daya --}}
                <div class="nav-item">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-database text-cyan-400"></i> Sumber Daya
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.sumber-daya.ebook-modul') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-book text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">E-Book & Modul</div><div class="item-desc">5,000+ buku digital</div></div>
                            </a>
                            <a href="{{ route('halaman.sumber-daya.dataset') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-table text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Dataset Publik</div><div class="item-desc">Data riset & ML</div></div>
                            </a>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-purple-500/10"><i class="fas fa-laptop-code text-purple-400"></i></div>
                                    <div class="item-text"><div class="item-title">Dev Tools</div><div class="item-desc">Coding & development</div></div>
                                </div>
                                <div class="sub-dropdown">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.sumber-daya.dev-tools') }}" class="sub-dropdown-item"><i class="fas fa-code text-purple-400"></i> Coding Playground</a>
                                        <a href="{{ route('halaman.sumber-daya.dev-tools') }}" class="sub-dropdown-item"><i class="fas fa-plug text-cyan-400"></i> API Gateway</a>
                                        <a href="{{ route('halaman.sumber-daya.dev-tools') }}" class="sub-dropdown-item"><i class="fas fa-file-code text-green-400"></i> Template Proyek</a>
                                        <a href="{{ route('halaman.sumber-daya.dev-tools') }}" class="sub-dropdown-item"><i class="fab fa-github text-gray-300"></i> Open Source Tools</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 12. Keamanan (nested) --}}
                <div class="nav-item dropdown-right">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-shield-alt text-red-400"></i> Keamanan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.keamanan') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-lock text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">ISO 27001 & Zero Trust</div><div class="item-desc">Standar keamanan</div></div>
                            </a>

                            <div class="has-submenu">
                                <div class="dropdown-item">
                                    <div class="item-icon bg-blue-500/10"><i class="fas fa-sitemap text-blue-400"></i></div>
                                    <div class="item-text"><div class="item-title">Tata Kelola IT</div><div class="item-desc">Framework & regulasi</div></div>
                                </div>
                                <div class="sub-dropdown" style="left:auto;right:100%;padding-left:0;padding-right:4px">
                                    <div class="sub-dropdown-inner">
                                        <a href="{{ route('halaman.keamanan.tata-kelola-it') }}" class="sub-dropdown-item"><i class="fas fa-sitemap text-blue-400"></i> COBIT 2019</a>
                                        <a href="{{ route('halaman.keamanan.tata-kelola-it') }}" class="sub-dropdown-item"><i class="fas fa-gavel text-yellow-400"></i> UU ITE & PDP</a>
                                        <a href="{{ route('halaman.keamanan.tata-kelola-it') }}" class="sub-dropdown-item"><i class="fas fa-shield-alt text-green-400"></i> NIST Framework</a>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('halaman.penjamin-mutu') }}" class="dropdown-item">
                                <div class="item-icon bg-teal-500/10"><i class="fas fa-check-double text-teal-400"></i></div>
                                <div class="item-text"><div class="item-title">Penjamin Mutu</div><div class="item-desc">QA/QC & audit</div></div>
                            </a>
                            <a href="{{ route('halaman.keamanan.privasi-data') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-user-shield text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Privasi Data</div><div class="item-desc">Perlindungan data pengguna</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 13. Kurikulum --}}
                <div class="nav-item dropdown-right">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-book-reader text-indigo-400"></i> Kurikulum
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.kurikulum') }}" class="dropdown-item">
                                <div class="item-icon bg-indigo-500/10"><i class="fas fa-book-reader text-indigo-400"></i></div>
                                <div class="item-text"><div class="item-title">Kurikulum & Standar</div><div class="item-desc">Merdeka, Cambridge, IB, KKNI</div></div>
                            </a>
                            <a href="{{ route('halaman.kurikulum.silabus') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-list-alt text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Silabus & RPS</div><div class="item-desc">Per jenjang pendidikan</div></div>
                            </a>
                            <a href="{{ route('halaman.kurikulum.rps-template') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-file-alt text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Template Modul Ajar</div><div class="item-desc">RPP & RPS siap pakai</div></div>
                            </a>
                            <a href="{{ route('halaman.kurikulum.kalender-akademik') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-calendar-alt text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Kalender Akademik</div><div class="item-desc">Jadwal & event 2025/2026</div></div>
                            </a>
                            <a href="{{ route('halaman.kurikulum.learning-outcomes') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-bullseye text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Learning Outcomes</div><div class="item-desc">Capaian pembelajaran KKNI</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 14. Alur & Panduan --}}
                <div class="nav-item dropdown-right">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-project-diagram text-teal-400"></i> Panduan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.alur-panduan') }}" class="dropdown-item">
                                <div class="item-icon bg-teal-500/10"><i class="fas fa-project-diagram text-teal-400"></i></div>
                                <div class="item-text"><div class="item-title">Alur & Workflow</div><div class="item-desc">Flowchart platform lengkap</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.flowchart-sistem') }}" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-sitemap text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">Flowchart Sistem</div><div class="item-desc">Arsitektur & modul diagram</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.panduan-pengguna') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-book text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Panduan Pengguna</div><div class="item-desc">Guide lengkap per peran</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.sop-prosedur') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-clipboard-list text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">SOP & Prosedur</div><div class="item-desc">Standar operasional platform</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-question-circle text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">FAQ & Bantuan</div><div class="item-desc">Pusat bantuan & pertanyaan</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 15. Media --}}
                <div class="nav-item dropdown-right">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-play-circle text-rose-400"></i> Media
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.media') }}" class="dropdown-item">
                                <div class="item-icon bg-rose-500/10"><i class="fas fa-play-circle text-rose-400"></i></div>
                                <div class="item-text"><div class="item-title">Media & Video</div><div class="item-desc">Pusat media pembelajaran</div></div>
                            </a>
                            <a href="{{ route('halaman.media.video-tutorial') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-video text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Video Tutorial</div><div class="item-desc">500+ video pembelajaran</div></div>
                            </a>
                            <a href="{{ route('halaman.media.webinar-event') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-broadcast-tower text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Webinar & Event</div><div class="item-desc">Live & on-demand webinar</div></div>
                            </a>
                            <a href="{{ route('halaman.media.podcast-audio') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-podcast text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Podcast Edu</div><div class="item-desc">Episode inspiratif mingguan</div></div>
                            </a>
                            <a href="{{ route('halaman.media.galeri-foto') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-images text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Galeri Foto</div><div class="item-desc">Dokumentasi kegiatan</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- 16. Dokumen --}}
                <div class="nav-item dropdown-right">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-file-alt text-amber-400"></i> Dokumen
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.dokumen') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-file-alt text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Dokumen Resmi</div><div class="item-desc">Kebijakan & template platform</div></div>
                            </a>
                            <a href="{{ route('halaman.dokumen.kebijakan-privasi') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-shield-alt text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Kebijakan Privasi</div><div class="item-desc">Privacy policy & ToS</div></div>
                            </a>
                            <a href="{{ route('halaman.dokumen.template-administrasi') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-copy text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Template Administrasi</div><div class="item-desc">RPP, RPS, surat, dll</div></div>
                            </a>
                            <a href="{{ route('halaman.dokumen.surat-formulir') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-envelope-open-text text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Surat & Formulir</div><div class="item-desc">Form resmi & surat dinas</div></div>
                            </a>
                            <a href="{{ route('halaman.dokumen.arsip-regulasi') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-archive text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Arsip & Regulasi</div><div class="item-desc">UU, Permendikbud, arsip</div></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== MOBILE MENU ===== --}}
        <div id="mobileMenu" class="hidden lg:hidden border-t border-kvt-700/20">
            <div class="px-4 py-4 space-y-1 max-h-[75vh] overflow-y-auto bg-kvt-950/95 backdrop-blur-xl">
                {{-- Search on mobile --}}
                <button onclick="bukaSearch()" class="w-full flex items-center gap-3 py-3 px-4 text-gray-400 bg-kvt-800/30 rounded-xl mb-3 border border-kvt-700/20">
                    <i class="fas fa-search"></i>
                    <span class="text-sm">Cari berita, kelas, mitra...</span>
                    <kbd class="text-[10px] bg-kvt-800 px-1.5 py-0.5 rounded ml-auto border border-kvt-700">Ctrl+K</kbd>
                </button>

                <a href="{{ route('beranda') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-home w-6 text-kvt-400"></i> Beranda</a>
                <a href="{{ route('halaman.jenjang') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-graduation-cap w-6 text-green-400"></i> Jenjang Pendidikan</a>
                @auth
                <a href="{{ route('kelas.index') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-chalkboard w-6 text-kvt-400"></i> Kelas</a>
                <a href="{{ route('laporan.index') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-chart-bar w-6 text-green-400"></i> Laporan</a>
                <a href="{{ route('dasbor') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-tachometer-alt w-6 text-yellow-400"></i> Dasbor</a>
                @endauth
                <a href="{{ route('berita.index') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-newspaper w-6 text-emerald-400"></i> Berita</a>

                <div class="border-t border-kvt-700/20 my-2 mx-4"></div>

                <a href="{{ route('halaman.riset') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-microscope w-6 text-purple-400"></i> Riset & Inovasi</a>
                <a href="{{ route('halaman.karir') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-briefcase w-6 text-orange-400"></i> Karir & Industri</a>
                <a href="{{ route('halaman.komunitas') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-users w-6 text-pink-400"></i> Komunitas</a>
                <a href="{{ route('halaman.sertifikasi') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-award w-6 text-yellow-400"></i> Sertifikasi</a>
                <a href="{{ route('halaman.sumber-daya') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-database w-6 text-cyan-400"></i> Sumber Daya</a>
                <a href="{{ route('kerja-sama.index') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-handshake w-6 text-yellow-400"></i> Kerja Sama</a>

                <div class="border-t border-kvt-700/20 my-2 mx-4"></div>

                <a href="{{ route('halaman.keamanan') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-shield-alt w-6 text-red-400"></i> Keamanan</a>
                <a href="{{ route('halaman.penjamin-mutu') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-check-double w-6 text-teal-400"></i> Penjamin Mutu</a>
                <a href="{{ route('halaman.kurikulum') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-book-reader w-6 text-indigo-400"></i> Kurikulum</a>
                <a href="{{ route('halaman.alur-panduan') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-project-diagram w-6 text-teal-400"></i> Alur & Panduan</a>
                <a href="{{ route('halaman.media') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-play-circle w-6 text-rose-400"></i> Media</a>
                <a href="{{ route('halaman.dokumen') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-file-alt w-6 text-amber-400"></i> Dokumen</a>
                <a href="{{ route('tentang') }}" class="block py-2.5 px-4 text-gray-300 hover:text-kvt-400 hover:bg-kvt-800/30 rounded-xl text-sm font-medium"><i class="fas fa-info-circle w-6 text-cyan-400"></i> Tentang</a>

                @guest
                <div class="pt-3 px-2 flex gap-2">
                    <a href="{{ route('masuk') }}" class="flex-1 text-center py-2.5 text-sm bg-kvt-800/50 text-gray-300 rounded-xl font-medium border border-kvt-700/30">Masuk</a>
                    <a href="{{ route('daftar') }}" class="flex-1 text-center py-2.5 text-sm bg-gradient-to-r from-kvt-500 to-ungu-500 text-white rounded-xl font-semibold">Daftar</a>
                </div>
                @endguest
            </div>
        </div>
    </nav>

    {{-- ==================== SEARCH ENGINE POPUP ==================== --}}
    <div id="searchOverlay" class="fixed inset-0 z-[100] hidden search-overlay">
        <div class="max-w-3xl mx-auto pt-[10vh] px-4">
            <div class="nav-dropdown-inner popup-enter" style="border-radius:20px">
                <div class="p-5 border-b border-kvt-700/20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-search text-white"></i>
                        </div>
                        <input type="text" id="searchInput" class="flex-1 bg-transparent text-white text-lg placeholder-gray-500 outline-none" placeholder="Cari berita, kelas, materi, mitra..." autocomplete="off">
                        <kbd class="text-[10px] text-gray-500 bg-kvt-800 px-2 py-1 rounded-lg border border-kvt-700">ESC</kbd>
                        <button onclick="tutupSearch()" class="text-gray-500 hover:text-white transition p-1"><i class="fas fa-times text-lg"></i></button>
                    </div>
                    <div class="flex gap-1.5 mt-4">
                        <button onclick="gantimodeSearch('kvt')" class="search-mode-btn text-xs px-4 py-2 rounded-xl transition font-semibold" data-mode="kvt"><i class="fas fa-cube mr-1.5"></i>KVT Hub</button>
                        <button onclick="gantimodeSearch('web')" class="search-mode-btn text-xs px-4 py-2 rounded-xl transition font-semibold" data-mode="web"><i class="fas fa-globe mr-1.5"></i>Web Search</button>
                        <button onclick="gantimodeSearch('ai')" class="search-mode-btn text-xs px-4 py-2 rounded-xl transition font-semibold" data-mode="ai"><i class="fas fa-robot mr-1.5"></i>AI Explorer</button>
                    </div>
                </div>
                <div class="p-5 max-h-[50vh] overflow-y-auto" id="searchResults">
                    <div id="searchDefault">
                        <p class="text-xs text-gray-500 uppercase tracking-wider font-bold mb-3">Navigasi Cepat</p>
                        <div class="grid grid-cols-2 gap-2">
                            <a href="{{ route('beranda') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-home text-kvt-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Beranda</p><p class="text-[10px] text-gray-500">Halaman utama</p></div>
                            </a>
                            <a href="{{ route('berita.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-newspaper text-emerald-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Berita</p><p class="text-[10px] text-gray-500">Berita terbaru</p></div>
                            </a>
                            <a href="{{ route('halaman.jenjang') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-graduation-cap text-green-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Jenjang</p><p class="text-[10px] text-gray-500">TK sampai S3</p></div>
                            </a>
                            <a href="{{ route('kerja-sama.index') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-handshake text-yellow-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Kerja Sama</p><p class="text-[10px] text-gray-500">Sponsor & mitra</p></div>
                            </a>
                            <a href="{{ route('halaman.riset') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-microscope text-purple-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Riset</p><p class="text-[10px] text-gray-500">Inovasi & penelitian</p></div>
                            </a>
                            <a href="{{ route('halaman.keamanan') }}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group">
                                <div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas fa-shield-alt text-red-400 text-sm"></i></div>
                                <div><p class="text-sm text-white font-medium">Keamanan</p><p class="text-[10px] text-gray-500">ISO 27001</p></div>
                            </a>
                        </div>
                    </div>
                    <div id="searchLoading" class="hidden text-center py-8"><div class="w-8 h-8 border-2 border-kvt-400 border-t-transparent rounded-full animate-spin mx-auto mb-3"></div><p class="text-sm text-gray-400">Mencari...</p></div>
                    <div id="searchKvtResults" class="hidden space-y-2"></div>
                    <div id="searchWebResults" class="hidden"><div class="text-center py-8"><div class="w-16 h-16 bg-gradient-to-br from-kvt-500 to-ungu-500 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-globe text-3xl text-white"></i></div><p class="text-white font-semibold mb-2" id="webSearchTitle">KVT Web Search</p><p class="text-sm text-gray-400 mb-4">Mesin pencari web terintegrasi</p><div id="webSearchLinks" class="flex flex-wrap justify-center gap-2"></div></div></div>
                    <div id="searchAIResults" class="hidden"><div class="text-center py-8"><div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4"><i class="fas fa-robot text-3xl text-white"></i></div><p class="text-white font-semibold mb-2">KVT AI Explorer</p><p class="text-sm text-gray-400 mb-4">Pencarian cerdas dengan analisis kontekstual</p><div id="aiExplorerContent" class="text-left"></div></div></div>
                </div>
                <div class="px-5 py-3 border-t border-kvt-700/20 flex items-center justify-between text-[10px] text-gray-500">
                    <div class="flex items-center gap-3"><span><kbd class="bg-kvt-800 px-1.5 py-0.5 rounded">Tab</kbd> navigasi</span><span><kbd class="bg-kvt-800 px-1.5 py-0.5 rounded">Enter</kbd> buka</span></div>
                    <span class="font-semibold">KVT Search Engine v4.0</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('sukses'))
        <div class="fixed top-28 right-4 z-50 bg-green-500/90 backdrop-blur text-white px-6 py-3 rounded-xl shadow-lg animate-slide-left" id="flashSukses"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>
    @endif
    @if(session('error'))
        <div class="fixed top-28 right-4 z-50 bg-red-500/90 backdrop-blur text-white px-6 py-3 rounded-xl shadow-lg animate-slide-left" id="flashError"><i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}</div>
    @endif

    {{-- ==================== MAIN CONTENT ==================== --}}
    <main>@yield('konten')</main>

    {{-- ==================== MEGA FOOTER ==================== --}}
    <footer class="bg-kvt-950 border-t border-kvt-700/20 mt-20 relative">
        {{-- Visitor Stats Bar --}}
        <div class="bg-kvt-900/50 border-b border-kvt-700/20 py-3">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-6 text-xs text-gray-400">
                    <span><i class="fas fa-eye text-kvt-400 mr-1"></i> Hari ini: <strong class="text-white" id="visitorToday">--</strong></span>
                    <span><i class="fas fa-users text-green-400 mr-1"></i> Online: <strong class="text-green-400" id="visitorOnline">--</strong></span>
                    <span><i class="fas fa-chart-line text-yellow-400 mr-1"></i> Total: <strong class="text-white" id="visitorTotal">--</strong></span>
                    <span><i class="fas fa-fingerprint text-purple-400 mr-1"></i> Unik: <strong class="text-white" id="visitorUnik">--</strong></span>
                </div>
                <div class="flex items-center gap-2 text-xs text-gray-500">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span>Sistem berjalan normal</span>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10">
                {{-- Col 1-2: Brand --}}
                <div class="lg:col-span-2">
                    <div class="flex items-center gap-3 mb-5">
                        <div class="w-12 h-12 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg">
                            <span class="text-white font-black text-xl">K</span>
                        </div>
                        <div>
                            <span class="text-xl font-extrabold"><span class="text-white">KVT</span> <span class="text-kvt-400">Hub</span></span>
                            <span class="block text-[10px] text-gray-500 tracking-[0.12em] font-semibold">Global Education & Research Ecosystem</span>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm max-w-md mb-5 leading-relaxed">
                        Ekosistem pembelajaran, karir, dan riset digital terdepan. Mengintegrasikan pendidikan dari TK hingga S3 dengan teknologi modern.
                    </p>
                    <div class="flex gap-2 mb-6">
                        <a href="#" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition hover:-translate-y-0.5"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition hover:-translate-y-0.5"><i class="fab fa-instagram"></i></a>
                        <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition hover:-translate-y-0.5"><i class="fab fa-github"></i></a>
                        <a href="#" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition hover:-translate-y-0.5"><i class="fab fa-discord"></i></a>
                        <a href="#" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition hover:-translate-y-0.5"><i class="fab fa-linkedin"></i></a>
                    </div>
                    <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4">
                        <h5 class="text-sm font-semibold text-white mb-2"><i class="fas fa-envelope text-kvt-400 mr-2"></i>Kotak Saran</h5>
                        <form onsubmit="kirimSaran(event)">
                            <textarea id="saranInput" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 resize-none" placeholder="Tulis saran atau masukan Anda..."></textarea>
                            <button type="submit" class="mt-2 text-xs bg-kvt-600 hover:bg-kvt-500 text-white px-4 py-2 rounded-lg transition font-semibold"><i class="fas fa-paper-plane mr-1"></i>Kirim Saran</button>
                        </form>
                    </div>
                </div>

                {{-- Col 3: Platform --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">Platform</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Beranda</a></li>
                        <li><a href="{{ route('halaman.jenjang') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Jenjang Pendidikan</a></li>
                        <li><a href="{{ route('halaman.riset') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Riset & Inovasi</a></li>
                        <li><a href="{{ route('halaman.karir') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Karir & Industri</a></li>
                        <li><a href="{{ route('halaman.komunitas') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Komunitas</a></li>
                        <li><a href="{{ route('halaman.sertifikasi') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Sertifikasi</a></li>
                        <li><a href="{{ route('halaman.sumber-daya') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Sumber Daya</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Berita</a></li>
                        <li><a href="{{ route('kerja-sama.index') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Kerja Sama</a></li>
                    </ul>
                </div>

                {{-- Col 4: Tata Kelola --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-sm">Tata Kelola</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('halaman.keamanan') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Keamanan</a></li>
                        <li><a href="{{ route('halaman.penjamin-mutu') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Penjamin Mutu</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Tentang</a></li>
                        <li><a href="{{ route('lisensi') }}" class="text-gray-400 hover:text-kvt-400 transition flex items-center gap-2"><i class="fas fa-chevron-right text-[8px] text-kvt-600"></i>Lisensi</a></li>
                    </ul>
                    <h4 class="text-white font-bold mb-3 mt-6 text-sm">Standar</h4>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-green-500/10 rounded flex items-center justify-center"><i class="fas fa-shield-alt text-green-400 text-[10px]"></i></div><span>ISO 27001</span></div>
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-blue-500/10 rounded flex items-center justify-center"><i class="fas fa-sitemap text-blue-400 text-[10px]"></i></div><span>COBIT 2019</span></div>
                        <div class="flex items-center gap-2 text-xs text-gray-400"><div class="w-6 h-6 bg-purple-500/10 rounded flex items-center justify-center"><i class="fas fa-check-double text-purple-400 text-[10px]"></i></div><span>QA/QC</span></div>
                    </div>
                </div>

                {{-- Col 5-6: Flag Counter --}}
                <div class="lg:col-span-2">
                    <div class="bg-[#1a2744] rounded-xl p-5 border border-gray-600/20">
                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2"><i class="fas fa-flag text-kvt-400"></i> Visitors by Country</h4>
                        <div id="flagCounterGrid" class="grid grid-cols-2 gap-x-4 gap-y-2 mb-4">
                            <div class="flag-item text-gray-400"><span>Memuat...</span></div>
                        </div>
                        <div class="border-t border-gray-600/20 pt-3 mt-3">
                            <p class="text-[11px] text-gray-400">Total Pageviews: <strong class="text-white" id="flagPageviews">--</strong></p>
                        </div>
                        <div class="mt-3 flex items-center gap-1.5">
                            <i class="fas fa-flag text-kvt-400 text-[10px]"></i>
                            <span class="text-[10px] text-gray-500 font-bold tracking-widest">KVT FLAG COUNTER</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Bottom bar --}}
            <div class="border-t border-kvt-700/20 mt-12 pt-6 flex flex-wrap items-center justify-between gap-4">
                <p class="text-xs text-gray-500">&copy; {{ date('Y') }} KVT Hub - Global Education & Research Ecosystem. Seluruh hak dilindungi.</p>
                <div class="flex items-center gap-4 text-xs text-gray-500">
                    <span class="flex items-center gap-1"><i class="fas fa-database text-kvt-600"></i> PostgreSQL</span>
                    <span class="flex items-center gap-1"><i class="fab fa-laravel text-red-500"></i> Laravel v{{ app()->version() }}</span>
                    <span class="flex items-center gap-1"><i class="fab fa-php text-indigo-400"></i> PHP v{{ PHP_VERSION }}</span>
                </div>
            </div>
        </div>
    </footer>

    {{-- ==================== SETTINGS TOGGLE BUTTON ==================== --}}
    <button class="settings-toggle" onclick="toggleSettings()" title="Pengaturan Tampilan" id="settingsBtn">
        <i class="fas fa-cog text-white text-xl" id="settingsIcon"></i>
    </button>

    {{-- ==================== SETTINGS OVERLAY ==================== --}}
    <div class="settings-overlay" id="settingsOverlay" onclick="toggleSettings()"></div>

    {{-- ==================== SETTINGS SIDEBAR ==================== --}}
    <div class="settings-panel" id="settingsPanel">
        <div class="p-6 border-b border-kvt-700/20">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-sliders-h text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Pengaturan</h3>
                        <p class="text-[10px] text-gray-500">Kustomisasi tampilan</p>
                    </div>
                </div>
                <button onclick="toggleSettings()" class="text-gray-500 hover:text-white transition p-2 rounded-lg hover:bg-kvt-800/50">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <div class="p-5 space-y-5">
            {{-- EFEK VISUAL --}}
            <div>
                <h4 class="text-[11px] text-gray-500 uppercase tracking-widest font-bold mb-3"><i class="fas fa-sparkles mr-1.5"></i>Efek Visual</h4>
                <div class="space-y-2.5">
                    <div class="setting-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-snowflake text-blue-400 text-sm"></i></div>
                            <div><p class="text-sm text-white font-medium">Efek Salju</p><p class="text-[10px] text-gray-500">Animasi partikel salju</p></div>
                        </div>
                        <div class="toggle-switch active" id="toggleSalju" onclick="toggleEfekSalju()"></div>
                    </div>
                    <div class="setting-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-purple-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-magic text-purple-400 text-sm"></i></div>
                            <div><p class="text-sm text-white font-medium">Animasi Scroll</p><p class="text-[10px] text-gray-500">Efek AOS saat scroll</p></div>
                        </div>
                        <div class="toggle-switch active" id="toggleAOS" onclick="toggleAOSEffect()"></div>
                    </div>
                </div>
            </div>

            {{-- TEMA --}}
            <div>
                <h4 class="text-[11px] text-gray-500 uppercase tracking-widest font-bold mb-3"><i class="fas fa-palette mr-1.5"></i>Warna Aksen</h4>
                <div class="grid grid-cols-6 gap-2">
                    <button onclick="gantiAksen('kvt')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-kvt-400 to-kvt-600 ring-2 ring-kvt-400 ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Biru (Default)"></button>
                    <button onclick="gantiAksen('ungu')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Ungu"></button>
                    <button onclick="gantiAksen('hijau')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Hijau"></button>
                    <button onclick="gantiAksen('merah')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-rose-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Merah"></button>
                    <button onclick="gantiAksen('emas')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Emas"></button>
                    <button onclick="gantiAksen('cyan')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400 to-cyan-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Cyan"></button>
                </div>
            </div>

            {{-- BACKGROUND --}}
            <div>
                <h4 class="text-[11px] text-gray-500 uppercase tracking-widest font-bold mb-3"><i class="fas fa-image mr-1.5"></i>Background</h4>
                <div class="grid grid-cols-3 gap-2">
                    <button onclick="gantiBG('default')" class="p-3 rounded-xl bg-kvt-950 border-2 border-kvt-400 text-center transition hover:scale-105">
                        <div class="w-full h-8 bg-gradient-to-b from-kvt-900 to-kvt-950 rounded-lg mb-1.5"></div>
                        <span class="text-[10px] text-gray-400">Default</span>
                    </button>
                    <button onclick="gantiBG('galaxy')" class="p-3 rounded-xl bg-kvt-950 border-2 border-kvt-700/30 text-center transition hover:scale-105">
                        <div class="w-full h-8 bg-gradient-to-b from-indigo-950 to-purple-950 rounded-lg mb-1.5"></div>
                        <span class="text-[10px] text-gray-400">Galaxy</span>
                    </button>
                    <button onclick="gantiBG('midnight')" class="p-3 rounded-xl bg-kvt-950 border-2 border-kvt-700/30 text-center transition hover:scale-105">
                        <div class="w-full h-8 bg-gradient-to-b from-gray-900 to-slate-950 rounded-lg mb-1.5"></div>
                        <span class="text-[10px] text-gray-400">Midnight</span>
                    </button>
                </div>
            </div>

            {{-- BAHASA --}}
            <div>
                <h4 class="text-[11px] text-gray-500 uppercase tracking-widest font-bold mb-3"><i class="fas fa-language mr-1.5"></i>Bahasa / Language</h4>
                <div class="space-y-2">
                    <button onclick="gantiBahasa('id')" class="w-full setting-item justify-start gap-3 border-kvt-400/30 bg-kvt-500/10" id="langId">
                        <img src="https://flagcdn.com/w20/id.png" class="w-5 h-3.5 rounded-sm object-cover" alt="ID">
                        <span class="text-sm text-white font-medium">Bahasa Indonesia</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs" id="langIdCheck"></i>
                    </button>
                    <button onclick="gantiBahasa('en')" class="w-full setting-item justify-start gap-3" id="langEn">
                        <img src="https://flagcdn.com/w20/gb.png" class="w-5 h-3.5 rounded-sm object-cover" alt="EN">
                        <span class="text-sm text-gray-300 font-medium">English</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs hidden" id="langEnCheck"></i>
                    </button>
                    <button onclick="gantiBahasa('ja')" class="w-full setting-item justify-start gap-3" id="langJa">
                        <img src="https://flagcdn.com/w20/jp.png" class="w-5 h-3.5 rounded-sm object-cover" alt="JA">
                        <span class="text-sm text-gray-300 font-medium">Japanese</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs hidden" id="langJaCheck"></i>
                    </button>
                    <button onclick="gantiBahasa('ko')" class="w-full setting-item justify-start gap-3" id="langKo">
                        <img src="https://flagcdn.com/w20/kr.png" class="w-5 h-3.5 rounded-sm object-cover" alt="KO">
                        <span class="text-sm text-gray-300 font-medium">Korean</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs hidden" id="langKoCheck"></i>
                    </button>
                    <button onclick="gantiBahasa('zh')" class="w-full setting-item justify-start gap-3" id="langZh">
                        <img src="https://flagcdn.com/w20/cn.png" class="w-5 h-3.5 rounded-sm object-cover" alt="ZH">
                        <span class="text-sm text-gray-300 font-medium">Chinese</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs hidden" id="langZhCheck"></i>
                    </button>
                    <button onclick="gantiBahasa('ar')" class="w-full setting-item justify-start gap-3" id="langAr">
                        <img src="https://flagcdn.com/w20/sa.png" class="w-5 h-3.5 rounded-sm object-cover" alt="AR">
                        <span class="text-sm text-gray-300 font-medium">Arabic</span>
                        <i class="fas fa-check text-kvt-400 ml-auto text-xs hidden" id="langArCheck"></i>
                    </button>
                </div>
            </div>

            {{-- AI ASSISTANT --}}
            <div>
                <h4 class="text-[11px] text-gray-500 uppercase tracking-widest font-bold mb-3"><i class="fas fa-robot mr-1.5"></i>AI Assistant</h4>
                <div class="setting-item flex-col items-start gap-3">
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shrink-0">
                            <i class="fas fa-robot text-white"></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm text-white font-semibold">KVT AI Tutor</p>
                            <p class="text-[10px] text-gray-500">Asisten belajar cerdas</p>
                        </div>
                        <span class="text-[10px] bg-amber-500/20 text-amber-400 px-2 py-0.5 rounded-full font-bold">Segera</span>
                    </div>
                    <div class="w-full bg-kvt-800/30 rounded-lg p-3 mt-1">
                        <p class="text-[11px] text-gray-400 leading-relaxed">
                            <i class="fas fa-info-circle text-kvt-400 mr-1"></i>
                            AI Tutor, AI Research Assistant, dan AI Career Advisor sedang dalam tahap pengembangan
                        </p>
                    </div>
                </div>
            </div>

            {{-- RESET --}}
            <div class="pt-3 border-t border-kvt-700/20">
                <button onclick="resetPengaturan()" class="w-full py-2.5 px-4 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2">
                    <i class="fas fa-undo text-xs"></i> Reset ke Default
                </button>
            </div>
        </div>

        <div class="p-5 border-t border-kvt-700/20 mt-2">
            <div class="flex items-center gap-2 text-[10px] text-gray-600">
                <i class="fas fa-code"></i>
                <span>KVT Hub v3.1 - Settings Panel</span>
            </div>
        </div>
    </div>

    {{-- ==================== NEWS POPUP ==================== --}}
    <div id="popupBerita" class="fixed inset-0 z-[90] hidden items-center justify-center search-overlay">
        <div class="max-w-lg mx-auto px-4">
            <div class="nav-dropdown-inner popup-enter overflow-hidden" style="border-radius:20px">
                <div class="bg-gradient-to-r from-emerald-600 to-kvt-600 p-4 flex items-center justify-between">
                    <h3 class="text-white font-bold flex items-center gap-2"><i class="fas fa-newspaper"></i> Berita Terbaru</h3>
                    <div class="flex items-center gap-2">
                        <label class="flex items-center gap-1.5 text-xs text-white/80 cursor-pointer">
                            <input type="checkbox" id="togglePopupBerita" class="w-3 h-3 rounded" onchange="simpanPreferensiPopup()" checked> Tampilkan lagi
                        </label>
                        <button onclick="tutupPopupBerita()" class="text-white/80 hover:text-white transition"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="p-5 space-y-3 max-h-[50vh] overflow-y-auto" id="popupBeritaContent">
                    <div class="text-center py-6 text-gray-500 text-sm">Memuat berita...</div>
                </div>
                <div class="p-3 border-t border-kvt-700/20 text-center">
                    <a href="{{ route('berita.index') }}" class="text-xs text-kvt-400 hover:text-kvt-300 transition font-semibold"><i class="fas fa-arrow-right mr-1"></i> Lihat semua berita</a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SCRIPTS ==================== --}}
    <script>
        // AOS
        AOS.init({ duration:800, easing:'ease-out-cubic', once:false, mirror:true, offset:80 });

        // Clock
        function updateJam() {
            const e = document.getElementById('jamSekarang');
            if(e) e.textContent = new Date().toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit',second:'2-digit'});
        }
        updateJam(); setInterval(updateJam, 1000);

        // Navbar shadow on scroll
        window.addEventListener('scroll', function() {
            const n = document.getElementById('navbar');
            if(window.scrollY > 20) {
                n.classList.add('shadow-lg','shadow-kvt-950/50');
                n.style.borderColor = 'rgba(51,153,255,0.15)';
            } else {
                n.classList.remove('shadow-lg','shadow-kvt-950/50');
                n.style.borderColor = '';
            }
        });

        // Snow
        function buatSalju() {
            const c = document.getElementById('salju');
            for(let i=0;i<20;i++) {
                setTimeout(()=>{
                    const s=document.createElement('div');s.className='kepingan-salju';s.innerHTML='&#10052;';
                    s.style.left=Math.random()*100+'%';s.style.fontSize=(Math.random()*8+4)+'px';
                    s.style.animationDuration=(Math.random()*12+8)+'s';s.style.animationDelay=(Math.random()*5)+'s';
                    s.style.opacity=Math.random()*0.4+0.1;c.appendChild(s);
                    s.addEventListener('animationiteration',()=>{s.style.left=Math.random()*100+'%'});
                },i*400);
            }
        }
        buatSalju();

        // Scroll reveal
        const obs = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('tampil') });
        },{threshold:0.1});
        document.querySelectorAll('.muncul-scroll').forEach(el=>obs.observe(el));

        // Flash auto-hide
        setTimeout(()=>{ ['flashSukses','flashError'].forEach(id=>{ const el=document.getElementById(id); if(el) el.style.display='none' }) },5000);

        // Mobile menu toggle
        function toggleMobile() { document.getElementById('mobileMenu').classList.toggle('hidden') }

        // ========================
        // 2-ROW DROPDOWN NAVIGATION (Click toggle)
        // ========================
        document.querySelectorAll('[data-dropdown]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const item = this.closest('.nav-item');
                const wasOpen = item.classList.contains('dropdown-open');

                // Close all other dropdowns
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));

                // Toggle this one
                if(!wasOpen) item.classList.add('dropdown-open');
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if(!e.target.closest('.nav-item')) {
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
            }
        });

        // Close dropdowns on ESC
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
            }
        });

        // ========================
        // SEARCH ENGINE
        // ========================
        let modeSearchAktif = 'kvt';
        let searchTimeout = null;

        function bukaSearch() {
            document.getElementById('searchOverlay').classList.remove('hidden');
            document.getElementById('searchOverlay').classList.add('flex');
            setTimeout(()=>document.getElementById('searchInput').focus(),100);
            document.body.style.overflow='hidden';
        }
        function tutupSearch() {
            document.getElementById('searchOverlay').classList.add('hidden');
            document.getElementById('searchOverlay').classList.remove('flex');
            document.getElementById('searchInput').value='';
            document.body.style.overflow='';
            resetSearchUI();
        }
        function gantimodeSearch(mode) {
            modeSearchAktif=mode;
            document.querySelectorAll('.search-mode-btn').forEach(b=>{
                b.classList.toggle('bg-kvt-600',b.dataset.mode===mode);
                b.classList.toggle('text-white',b.dataset.mode===mode);
                b.classList.toggle('text-gray-400',b.dataset.mode!==mode);
                b.classList.toggle('bg-kvt-800/50',b.dataset.mode!==mode);
            });
            lakukanPencarian(document.getElementById('searchInput').value);
        }
        function resetSearchUI() {
            document.getElementById('searchDefault').classList.remove('hidden');
            document.getElementById('searchKvtResults').classList.add('hidden');
            document.getElementById('searchWebResults').classList.add('hidden');
            document.getElementById('searchAIResults').classList.add('hidden');
            document.getElementById('searchLoading').classList.add('hidden');
        }

        document.getElementById('searchInput').addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(()=>lakukanPencarian(this.value), 300);
        });

        function lakukanPencarian(q) {
            if(!q||!q.trim()){ resetSearchUI(); return }
            document.getElementById('searchDefault').classList.add('hidden');

            if(modeSearchAktif==='kvt') {
                document.getElementById('searchWebResults').classList.add('hidden');
                document.getElementById('searchAIResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.remove('hidden');
                document.getElementById('searchKvtResults').classList.add('hidden');

                fetch('/api/search?q='+encodeURIComponent(q))
                    .then(r=>r.json())
                    .then(data=>{
                        document.getElementById('searchLoading').classList.add('hidden');
                        const c=document.getElementById('searchKvtResults');c.innerHTML='';
                        if(data.hasil.length===0){
                            c.innerHTML='<div class="text-center py-6"><i class="fas fa-search text-3xl text-gray-600 mb-3"></i><p class="text-gray-500 text-sm">Tidak ditemukan untuk "'+q+'"</p></div>';
                        } else {
                            data.hasil.forEach(item=>{
                                c.innerHTML+=`<a href="${item.url}" class="flex items-center gap-3 p-3 rounded-xl hover:bg-kvt-800/40 transition group"><div class="w-9 h-9 bg-kvt-800 rounded-lg flex items-center justify-center group-hover:bg-kvt-700"><i class="fas ${item.ikon} ${item.warna} text-sm"></i></div><div class="flex-1 min-w-0"><p class="text-sm text-white font-medium">${item.judul}</p><p class="text-[11px] text-gray-500 truncate">${item.deskripsi}</p><span class="text-[10px] text-kvt-600 uppercase font-semibold">${item.tipe}</span></div><i class="fas fa-chevron-right text-gray-600 text-xs ml-auto shrink-0"></i></a>`;
                            });
                        }
                        c.classList.remove('hidden');
                    })
                    .catch(()=>{
                        document.getElementById('searchLoading').classList.add('hidden');
                        document.getElementById('searchKvtResults').innerHTML='<div class="text-center py-6 text-gray-500 text-sm">Gagal mencari. Coba lagi.</div>';
                        document.getElementById('searchKvtResults').classList.remove('hidden');
                    });
            } else if(modeSearchAktif==='web') {
                document.getElementById('searchKvtResults').classList.add('hidden');
                document.getElementById('searchAIResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.add('hidden');
                const w=document.getElementById('webSearchLinks');
                w.innerHTML=`<a href="https://www.google.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fab fa-google mr-2"></i>Google</a><a href="https://www.bing.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fab fa-microsoft mr-2"></i>Bing</a><a href="https://duckduckgo.com/?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fas fa-shield-alt mr-2"></i>DuckDuckGo</a><a href="https://scholar.google.com/scholar?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fas fa-graduation-cap mr-2"></i>Scholar</a><a href="https://github.com/search?q=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fab fa-github mr-2"></i>GitHub</a><a href="https://arxiv.org/search/?query=${encodeURIComponent(q)}" target="_blank" class="px-4 py-2.5 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl text-sm text-gray-300 hover:text-white transition border border-kvt-700/30 font-medium"><i class="fas fa-file-alt mr-2"></i>arXiv</a>`;
                document.getElementById('webSearchTitle').textContent='Cari "'+q+'" di:';
                document.getElementById('searchWebResults').classList.remove('hidden');
            } else if(modeSearchAktif==='ai') {
                document.getElementById('searchKvtResults').classList.add('hidden');
                document.getElementById('searchWebResults').classList.add('hidden');
                document.getElementById('searchLoading').classList.add('hidden');
                document.getElementById('aiExplorerContent').innerHTML=`<div class="space-y-3"><div class="p-4 bg-kvt-800/30 rounded-xl border border-kvt-700/30"><h4 class="text-sm font-semibold text-white mb-2"><i class="fas fa-lightbulb text-yellow-400 mr-2"></i>Analisis Kontekstual</h4><p class="text-xs text-gray-400">AI menganalisis: "<span class="text-kvt-400">${q}</span>"</p><div class="mt-3 space-y-2"><div class="flex items-center gap-2"><div class="w-2 h-2 bg-green-400 rounded-full"></div><span class="text-xs text-gray-300">Relevansi pendidikan</span></div><div class="flex items-center gap-2"><div class="w-2 h-2 bg-blue-400 rounded-full"></div><span class="text-xs text-gray-300">Koneksi research hub</span></div><div class="flex items-center gap-2"><div class="w-2 h-2 bg-purple-400 rounded-full"></div><span class="text-xs text-gray-300">Rekomendasi learning path</span></div></div></div><div class="p-4 bg-purple-600/10 rounded-xl border border-purple-500/20"><p class="text-xs text-gray-400"><i class="fas fa-robot text-purple-400 mr-2"></i>AI Explorer dalam pengembangan. Segera: AI Tutor, AI Research Assistant, AI Career Advisor.</p></div></div>`;
                document.getElementById('searchAIResults').classList.remove('hidden');
            }
        }

        document.addEventListener('keydown', function(e) {
            if((e.ctrlKey||e.metaKey)&&e.key==='k'){e.preventDefault();bukaSearch()}
            if(e.key==='Escape') tutupSearch();
        });
        document.getElementById('searchOverlay').addEventListener('click', function(e) { if(e.target===this) tutupSearch() });
        gantimodeSearch('kvt');

        // ========================
        // REAL-TIME VISITOR STATS
        // ========================
        function updateVisitorStats() {
            fetch('/api/pengunjung/statistik').then(r=>r.json()).then(d=>{
                document.getElementById('visitorToday').textContent=(d.hari_ini||0).toLocaleString();
                document.getElementById('visitorOnline').textContent=(d.online||0).toLocaleString();
                document.getElementById('visitorTotal').textContent=(d.total||0).toLocaleString();
                const uEl=document.getElementById('visitorUnik');
                if(uEl)uEl.textContent=(d.total_unik||0).toLocaleString();
            }).catch(()=>{});
        }
        updateVisitorStats(); setInterval(updateVisitorStats, 15000);

        // ========================
        // FLAG COUNTER
        // ========================
        function updateFlagCounter() {
            fetch('/api/pengunjung/flag-counter').then(r=>r.json()).then(d=>{
                const grid=document.getElementById('flagCounterGrid');
                if(!d.negara||d.negara.length===0){grid.innerHTML='<div class="col-span-2 text-gray-500 text-xs">Belum ada data</div>';return}
                grid.innerHTML='';
                d.negara.forEach(n=>{
                    const code=(n.kode_negara||'xx').toLowerCase();
                    grid.innerHTML+=`<div class="flag-item"><img src="https://flagcdn.com/w20/${code}.png" alt="${n.negara}" onerror="this.src='https://flagcdn.com/w20/xx.png'"><span class="text-gray-300">${code.toUpperCase()}</span><span class="text-white font-medium ml-auto">${Number(n.total).toLocaleString()}</span></div>`;
                });
                const pv=document.getElementById('flagPageviews');
                if(pv) pv.textContent=Number(d.pageviews||0).toLocaleString();
            }).catch(()=>{});
        }
        updateFlagCounter(); setInterval(updateFlagCounter,60000);

        // ========================
        // NEWS TICKER
        // ========================
        function updateTicker() {
            fetch('/api/berita/ticker').then(r=>r.json()).then(data=>{
                const tc=document.getElementById('tickerContent');
                if(!data||data.length===0) return;
                tc.innerHTML='';
                const colors=['text-green-400','text-blue-400','text-yellow-400','text-purple-400','text-pink-400','text-cyan-400'];
                data.forEach((b,i)=>{
                    tc.innerHTML+=`<a href="/berita/${b.slug}" class="inline-flex items-center gap-2 hover:text-white transition${i>0?' ml-12':''}"><i class="fas fa-circle ${colors[i%colors.length]} text-[6px]"></i> ${b.judul}</a>`;
                });
            }).catch(()=>{});
        }
        updateTicker(); setInterval(updateTicker,120000);

        // ========================
        // NEWS POPUP
        // ========================
        function tampilkanPopupBerita() {
            if(localStorage.getItem('kvt_popup_hidden')==='true') return;
            fetch('/api/berita/popup').then(r=>r.json()).then(data=>{
                if(!data||data.length===0) return;
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
            }).catch(()=>{});
        }
        function tutupPopupBerita(){const p=document.getElementById('popupBerita');p.classList.add('hidden');p.classList.remove('flex')}
        function simpanPreferensiPopup(){localStorage.setItem('kvt_popup_hidden',document.getElementById('togglePopupBerita').checked?'false':'true')}
        document.getElementById('popupBerita').addEventListener('click',function(e){if(e.target===this) tutupPopupBerita()});
        tampilkanPopupBerita();

        function kirimSaran(e){e.preventDefault();const i=document.getElementById('saranInput');if(i.value.trim()){i.value='';alert('Terima kasih atas saran Anda! Tim KVT akan meninjau masukan ini.')}}

        // ========================
        // SETTINGS PANEL
        // ========================
        function toggleSettings() {
            const panel = document.getElementById('settingsPanel');
            const overlay = document.getElementById('settingsOverlay');
            const icon = document.getElementById('settingsIcon');
            const isOpen = panel.classList.contains('open');
            panel.classList.toggle('open');
            overlay.classList.toggle('open');
            icon.className = isOpen ? 'fas fa-cog text-white text-xl' : 'fas fa-times text-white text-xl';
        }

        // Snow toggle
        function toggleEfekSalju() {
            const el = document.getElementById('toggleSalju');
            const container = document.getElementById('salju');
            const isActive = el.classList.contains('active');
            if(isActive) {
                el.classList.remove('active');
                container.style.display = 'none';
                localStorage.setItem('kvt_salju', 'off');
            } else {
                el.classList.add('active');
                container.style.display = '';
                localStorage.setItem('kvt_salju', 'on');
            }
        }

        // AOS toggle
        function toggleAOSEffect() {
            const el = document.getElementById('toggleAOS');
            const isActive = el.classList.contains('active');
            if(isActive) {
                el.classList.remove('active');
                document.querySelectorAll('[data-aos]').forEach(e => {
                    e.removeAttribute('data-aos');
                    e.style.opacity = '1';
                    e.style.transform = 'none';
                });
                localStorage.setItem('kvt_aos', 'off');
            } else {
                el.classList.add('active');
                localStorage.setItem('kvt_aos', 'on');
                location.reload();
            }
        }

        // Accent color
        function gantiAksen(warna) {
            const accents = {
                kvt: '#3399FF', ungu: '#8B5CF6', hijau: '#10B981',
                merah: '#F43F5E', emas: '#F59E0B', cyan: '#06B6D4'
            };
            document.documentElement.style.setProperty('--accent-color', accents[warna] || accents.kvt);
            document.querySelectorAll('.settings-panel .grid-cols-6 button').forEach(b => {
                b.classList.remove('ring-kvt-400','ring-purple-400','ring-emerald-400','ring-rose-400','ring-amber-400','ring-cyan-400');
                b.classList.add('ring-transparent');
            });
            const colorMap = {kvt:'ring-kvt-400',ungu:'ring-purple-400',hijau:'ring-emerald-400',merah:'ring-rose-400',emas:'ring-amber-400',cyan:'ring-cyan-400'};
            event.target.closest('button').classList.remove('ring-transparent');
            event.target.closest('button').classList.add(colorMap[warna]);
            localStorage.setItem('kvt_accent', warna);
        }

        // Background
        function gantiBG(tema) {
            const body = document.body;
            body.classList.remove('bg-kvt-950');
            const bgs = { default:'bg-kvt-950', galaxy:'bg-indigo-950', midnight:'bg-slate-950' };
            body.classList.add(bgs[tema] || bgs.default);
            document.querySelectorAll('.settings-panel .grid-cols-3 button').forEach(b => {
                b.classList.remove('border-kvt-400');
                b.classList.add('border-kvt-700/30');
            });
            event.target.closest('button').classList.remove('border-kvt-700/30');
            event.target.closest('button').classList.add('border-kvt-400');
            localStorage.setItem('kvt_bg', tema);
        }

        // Language using Google Translate
        function gantiBahasa(lang) {
            const langs = ['id','en','ja','ko','zh','ar'];
            langs.forEach(l => {
                const el = document.getElementById('lang'+l.charAt(0).toUpperCase()+l.slice(1));
                const check = document.getElementById('lang'+l.charAt(0).toUpperCase()+l.slice(1)+'Check');
                if(el) {
                    if(l === lang) {
                        el.classList.add('bg-kvt-500/10','border-kvt-400/30');
                        el.querySelector('span').classList.add('text-white');
                        el.querySelector('span').classList.remove('text-gray-300');
                        if(check) check.classList.remove('hidden');
                    } else {
                        el.classList.remove('bg-kvt-500/10','border-kvt-400/30');
                        el.querySelector('span').classList.remove('text-white');
                        el.querySelector('span').classList.add('text-gray-300');
                        if(check) check.classList.add('hidden');
                    }
                }
            });
            localStorage.setItem('kvt_lang', lang);

            // Use Google Translate widget
            if(lang === 'id') {
                // Remove translation
                const frame = document.querySelector('.goog-te-banner-frame');
                if(frame) frame.style.display = 'none';
                document.body.style.top = '';
                const el = document.querySelector('.skiptranslate');
                if(el) el.style.display = 'none';
                try {
                    const select = document.querySelector('.goog-te-combo');
                    if(select) { select.value = 'id'; select.dispatchEvent(new Event('change')); }
                } catch(e) {}
                location.reload();
            } else {
                // Load Google Translate if not loaded
                if(!document.getElementById('googleTranslateScript')) {
                    window.googleTranslateElementInit = function() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'id',
                            includedLanguages: 'id,en,ja,ko,zh-CN,ar',
                            autoDisplay: false
                        }, 'google_translate_element');
                        setTimeout(() => {
                            const select = document.querySelector('.goog-te-combo');
                            if(select) {
                                const langMap = {en:'en',ja:'ja',ko:'ko',zh:'zh-CN',ar:'ar'};
                                select.value = langMap[lang] || lang;
                                select.dispatchEvent(new Event('change'));
                            }
                        }, 500);
                    };
                    const s = document.createElement('script');
                    s.id = 'googleTranslateScript';
                    s.src = '//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit';
                    document.head.appendChild(s);
                } else {
                    const select = document.querySelector('.goog-te-combo');
                    if(select) {
                        const langMap = {en:'en',ja:'ja',ko:'ko',zh:'zh-CN',ar:'ar'};
                        select.value = langMap[lang] || lang;
                        select.dispatchEvent(new Event('change'));
                    }
                }
            }
        }

        // Reset all settings
        function resetPengaturan() {
            localStorage.removeItem('kvt_salju');
            localStorage.removeItem('kvt_aos');
            localStorage.removeItem('kvt_accent');
            localStorage.removeItem('kvt_bg');
            localStorage.removeItem('kvt_lang');
            location.reload();
        }

        // Load saved settings on page load
        (function loadSettings() {
            // Snow
            if(localStorage.getItem('kvt_salju') === 'off') {
                document.getElementById('salju').style.display = 'none';
                document.getElementById('toggleSalju').classList.remove('active');
            }
            // AOS
            if(localStorage.getItem('kvt_aos') === 'off') {
                document.getElementById('toggleAOS').classList.remove('active');
                document.querySelectorAll('[data-aos]').forEach(e => {
                    e.removeAttribute('data-aos');
                    e.style.opacity = '1';
                    e.style.transform = 'none';
                });
            }
            // Background
            const savedBG = localStorage.getItem('kvt_bg');
            if(savedBG && savedBG !== 'default') gantiBG(savedBG);
            // Language
            const savedLang = localStorage.getItem('kvt_lang');
            if(savedLang && savedLang !== 'id') {
                setTimeout(() => gantiBahasa(savedLang), 1000);
            }
        })();
    </script>
    <div id="google_translate_element" style="display:none"></div>
    @stack('scripts')
</body>
</html>
