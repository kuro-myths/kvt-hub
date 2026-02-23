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

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js" defer></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" media="print" onload="this.media='all'">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

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

        /* ===== NAV PAGE TABS (in popup) ===== */
        .nav-page-tab {
            width:28px;height:28px;border-radius:8px;font-size:11px;font-weight:700;
            display:flex;align-items:center;justify-content:center;cursor:pointer;
            background:rgba(51,153,255,0.05);color:#6b7280;border:1px solid rgba(51,153,255,0.1);
            transition:all 0.2s;
        }
        .nav-page-tab:hover { background:rgba(51,153,255,0.12);color:#93c5fd;border-color:rgba(51,153,255,0.25) }
        .nav-page-tab.aktif {
            background:linear-gradient(135deg,#3399FF,#8B5CF6);color:#fff;
            border-color:transparent;box-shadow:0 2px 10px rgba(51,153,255,0.3);
        }

        /* ===== SCROLL REVEAL (Modern) ===== */
        .muncul-scroll {
            opacity:0;transform:translateY(50px) scale(0.97);
            transition:opacity 0.7s cubic-bezier(0.16,1,0.3,1),transform 0.8s cubic-bezier(0.16,1,0.3,1);
        }
        .muncul-scroll.tampil { opacity:1;transform:translateY(0) scale(1) }
        .muncul-scroll.dari-kiri { transform:translateX(-60px) scale(0.97) }
        .muncul-scroll.dari-kanan { transform:translateX(60px) scale(0.97) }
        .muncul-scroll.dari-kiri.tampil,.muncul-scroll.dari-kanan.tampil { transform:translateX(0) scale(1) }
        .muncul-scroll.zoom-in { transform:scale(0.85);transform-origin:center }
        .muncul-scroll.zoom-in.tampil { transform:scale(1) }
        .muncul-scroll[data-delay="1"] { transition-delay:0.1s }
        .muncul-scroll[data-delay="2"] { transition-delay:0.2s }
        .muncul-scroll[data-delay="3"] { transition-delay:0.3s }
        .muncul-scroll[data-delay="4"] { transition-delay:0.4s }

        /* ===== MODERN LOADING ===== */
        .kvt-loader { position:fixed;inset:0;z-index:9999;display:flex;align-items:center;justify-content:center;background:rgba(2,16,41,0.97);transition:opacity 0.5s,visibility 0.5s }
        .kvt-loader.selesai { opacity:0;visibility:hidden;pointer-events:none }
        .loader-ring { width:56px;height:56px;position:relative }
        .loader-ring::before,.loader-ring::after {
            content:'';position:absolute;inset:0;border-radius:50%;
            border:3px solid transparent;
        }
        .loader-ring::before { border-top-color:#3399FF;animation:loaderSpin 1s cubic-bezier(0.55,0.15,0.45,0.85) infinite }
        .loader-ring::after { border-right-color:#8B5CF6;animation:loaderSpin 1.5s cubic-bezier(0.55,0.15,0.45,0.85) infinite reverse }
        @keyframes loaderSpin { to{transform:rotate(360deg)} }
        .loader-pulse { width:10px;height:10px;background:linear-gradient(135deg,#3399FF,#8B5CF6);border-radius:50%;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);animation:loaderPulse 1.2s ease-in-out infinite }
        @keyframes loaderPulse { 0%,100%{transform:translate(-50%,-50%) scale(0.8);opacity:1} 50%{transform:translate(-50%,-50%) scale(1.5);opacity:0.4} }
        .loader-text { margin-top:20px;font-size:12px;color:#5CADFF;font-weight:600;letter-spacing:0.15em;text-transform:uppercase;animation:loaderFade 1.5s ease-in-out infinite }
        @keyframes loaderFade { 0%,100%{opacity:1} 50%{opacity:0.4} }
        .loader-bar { width:180px;height:3px;background:rgba(51,153,255,0.1);border-radius:3px;overflow:hidden;margin-top:14px }
        .loader-bar-fill { height:100%;background:linear-gradient(90deg,#3399FF,#8B5CF6,#3399FF);background-size:200%;border-radius:3px;animation:loaderBar 1.8s ease-in-out infinite }
        @keyframes loaderBar { 0%{width:0;background-position:0%} 50%{width:70%;background-position:100%} 100%{width:100%;background-position:0%} }

        /* ===== NAVIGATION DROPDOWNS ===== */
        .nav-row { display:flex;align-items:center }
        .nav-item { position:relative }
        .nav-link {
            display:flex;align-items:center;gap:6px;padding:9px 14px;font-size:13px;font-weight:600;
            color:rgba(209,213,219,1);border-radius:10px;white-space:nowrap;transition:all 0.2s;
            text-transform:uppercase;letter-spacing:0.03em;
        }
        /* Nav page arrow buttons */
        .nav-page-arrow {
            display:flex;align-items:center;justify-content:center;
            width:26px;height:20px;border-radius:7px;
            background:rgba(51,153,255,0.08);border:1px solid rgba(51,153,255,0.15);
            color:#5CADFF;cursor:pointer;transition:all 0.25s;flex-shrink:0;
        }
        .nav-page-arrow:hover:not(:disabled) { background:rgba(51,153,255,0.25);color:#fff;transform:scale(1.1) }
        .nav-page-arrow:disabled { opacity:0.25;cursor:not-allowed }
        .nav-page-arrow i { transition:transform 0.3s }
        .nav-page-fade-enter { animation:navPageFade 0.3s ease-out }
        @keyframes navPageFade { 0%{opacity:0;transform:translateY(-6px)} 100%{opacity:1;transform:translateY(0)} }

        /* ===== SEMUA MENU OVERLAY ===== */
        .megamenu-overlay { backdrop-filter:blur(24px);background:rgba(2,16,41,0.95) }
        .megamenu-popup { animation:popupIn 0.35s cubic-bezier(0.34,1.56,0.64,1) }
        .megamenu-card {
            display:flex;align-items:center;gap:12px;padding:14px 16px;border-radius:14px;
            border:1px solid rgba(51,153,255,0.08);transition:all 0.25s;cursor:pointer;
            background:rgba(4,31,77,0.4);
        }
        .megamenu-card:hover {
            background:rgba(51,153,255,0.12);border-color:rgba(51,153,255,0.25);
            transform:translateY(-2px);box-shadow:0 8px 24px rgba(0,0,0,0.3);
        }
        .megamenu-card .mc-icon {
            width:40px;height:40px;border-radius:12px;display:flex;align-items:center;justify-content:center;
            flex-shrink:0;font-size:15px;
        }
        .megamenu-card .mc-title { font-size:13.5px;font-weight:700;color:#e5e7eb }
        .megamenu-card .mc-desc { font-size:11px;color:#6b7280;margin-top:2px }
        .megamenu-card:hover .mc-title { color:#fff }
        .megamenu-section-title {
            font-size:11px;font-weight:800;color:#5CADFF;text-transform:uppercase;letter-spacing:0.1em;
            padding:4px 0 10px;display:flex;align-items:center;gap:8px;
        }
        .megamenu-section-title::after {
            content:'';flex:1;height:1px;background:linear-gradient(90deg,rgba(51,153,255,0.2),transparent);
        }
        .btn-semua-menu {
            display:flex;align-items:center;gap:6px;padding:7px 14px;font-size:12px;font-weight:700;
            color:#5CADFF;border-radius:10px;border:1px solid rgba(92,173,255,0.2);
            background:rgba(51,153,255,0.08);transition:all 0.25s;white-space:nowrap;
            text-transform:uppercase;letter-spacing:0.03em;
        }
        .btn-semua-menu:hover { background:rgba(51,153,255,0.18);color:#fff;border-color:rgba(92,173,255,0.4) }
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
            overflow:visible;
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

        /* Sub-submenu (Level 2) - flyout right */
        .has-submenu { position:relative;cursor:pointer }
        .has-submenu > .dropdown-item::after {
            content:'\f054';font-family:'Font Awesome 6 Free';font-weight:900;font-size:9px;
            color:#5CADFF;margin-left:auto;opacity:0.5;transition:all 0.2s;
        }
        .has-submenu.sub-open > .dropdown-item::after { opacity:1;transform:translateX(2px) }
        .sub-dropdown {
            position:absolute;left:100%;top:-8px;min-width:220px;padding-left:4px;
            opacity:0;visibility:hidden;pointer-events:none;
            transform:translateX(-4px);transition:all 0.2s;z-index:210;
        }
        .has-submenu.sub-open > .sub-dropdown {
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
        .nav-item.dropdown-right .nav-dropdown,
        .nav-dropdown.dropdown-right { left:auto;right:0 }

        /* Flag counter style */
        .flag-item { display:flex;align-items:center;gap:6px;font-size:11px }
        .flag-item img { width:16px;height:12px;border-radius:1px;object-fit:cover }

        /* ===== SPONSOR MARQUEE ===== */
        .sponsor-track { display:flex;gap:3rem;animation:marquee 30s linear infinite }
        .sponsor-track:hover { animation-play-state:paused }

        /* ===== LED DOT MATRIX PANEL ===== */
        @import url('https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap');
        .led-matrix-bar {
            background:#000;
            border-bottom:2px solid #0a1a0a;
            overflow:hidden;
            position:relative;
            height:28px;
        }
        .led-matrix-bar::before {
            content:'';position:absolute;inset:0;
            background:repeating-linear-gradient(0deg,transparent,transparent 1px,rgba(0,0,0,0.15) 1px,rgba(0,0,0,0.15) 2px);
            pointer-events:none;z-index:2;
        }
        .led-matrix-bar::after {
            content:'';position:absolute;inset:0;
            background:repeating-linear-gradient(90deg,transparent,transparent 2px,rgba(0,0,0,0.08) 2px,rgba(0,0,0,0.08) 3px);
            pointer-events:none;z-index:2;
        }
        .led-matrix-inner {
            width:100%;height:100%;overflow:hidden;position:relative;
        }
        .led-matrix-track {
            display:inline-flex;white-space:nowrap;
            animation:ledScroll 40s linear infinite;
            height:100%;align-items:center;
        }
        .led-matrix-text {
            font-family:'Press Start 2P','Courier New',monospace;
            font-size:11px;
            color:#00ff66;
            text-shadow:0 0 8px #00ff66,0 0 20px #00ff66,0 0 40px #00cc55;
            letter-spacing:2px;
            padding:0 60px;
            animation:ledFlicker 0.1s ease-in-out infinite alternate;
            line-height:28px;
        }
        @keyframes ledScroll {
            0% { transform:translateX(0) }
            100% { transform:translateX(-50%) }
        }
        @keyframes ledFlicker {
            0% { opacity:1 }
            100% { opacity:0.92 }
        }

        /* ===== LOADING SCREEN (Modern Morphic) ===== */
        .loading-screen {
            position:fixed;inset:0;z-index:9999;
            background:#060d1a;
            display:flex;flex-direction:column;align-items:center;justify-content:center;
            transition:opacity 0.8s cubic-bezier(0.4,0,0.2,1),visibility 0.8s,filter 0.8s;
            overflow:hidden;
        }
        .loading-screen.hide {
            opacity:0;visibility:hidden;pointer-events:none;filter:blur(8px);
        }
        .loading-screen.hide .ld-logo { transform:scale(0.7) rotateY(90deg);opacity:0; }
        .loading-screen.hide .ld-ring { opacity:0;transform:scale(1.5); }
        .loading-screen.hide .ld-glow { transform:translate(-50%,-50%) scale(2);opacity:0; }

        /* Dot grid background with animated opacity */
        .ld-dots {
            position:absolute;inset:0;
            background-image:radial-gradient(circle at 1px 1px, rgba(51,153,255,0.06) 1px, transparent 0);
            background-size:20px 20px;
            animation:ldDotsShift 8s linear infinite;
        }
        @keyframes ldDotsShift { 0%{background-position:0 0} 100%{background-position:20px 20px} }

        /* Multi-layer gradient glow */
        .ld-glow {
            position:absolute;top:50%;left:50%;
            width:600px;height:600px;
            transform:translate(-50%,-50%);
            background:
                radial-gradient(ellipse at 30% 40%, rgba(31,111,235,0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 70% 60%, rgba(139,92,246,0.08) 0%, transparent 50%),
                radial-gradient(circle, rgba(88,166,255,0.04) 0%, transparent 60%);
            border-radius:50%;
            animation:ldGlowPulse 3s ease-in-out infinite;
            transition:all 0.8s;
        }
        @keyframes ldGlowPulse {
            0%,100% { opacity:0.5;transform:translate(-50%,-50%) scale(1) rotate(0deg); }
            50% { opacity:1;transform:translate(-50%,-50%) scale(1.15) rotate(5deg); }
        }

        /* Logo with glassmorphism */
        .ld-logo {
            width:76px;height:76px;
            background:linear-gradient(135deg,rgba(31,111,235,0.9),rgba(139,92,246,0.9));
            border-radius:20px;
            display:flex;align-items:center;justify-content:center;
            position:relative;z-index:2;
            transition:all 0.6s cubic-bezier(0.4,0,0.2,1);
            box-shadow:0 0 50px rgba(31,111,235,0.25),0 0 100px rgba(139,92,246,0.1),inset 0 1px 0 rgba(255,255,255,0.15);
            animation:ldLogoFloat 3s ease-in-out infinite;
        }
        @keyframes ldLogoFloat {
            0%,100% { transform:translateY(0); }
            50% { transform:translateY(-6px); }
        }
        .ld-logo .logo-k {
            font-size:2rem;font-weight:900;color:#fff;
            filter:drop-shadow(0 2px 8px rgba(0,0,0,0.3));
            animation:ldLogoK 2s ease-in-out infinite;
        }
        @keyframes ldLogoK {
            0%,100% { opacity:1; }
            50% { opacity:0.85; }
        }

        /* Dual-orbit spinner ring */
        .ld-ring {
            position:absolute;
            width:110px;height:110px;
            border-radius:50%;
            border:2px solid rgba(48,54,61,0.3);
            border-top-color:#58a6ff;
            border-bottom-color:#8b5cf6;
            animation:ldSpin 1.2s cubic-bezier(0.5,0,0.5,1) infinite;
            transition:all 0.6s;
            filter:drop-shadow(0 0 6px rgba(88,166,255,0.3));
        }
        @keyframes ldSpin { to { transform:rotate(360deg); } }

        /* Shimmer progress bar */
        .ld-progress {
            width:220px;height:3px;
            background:rgba(48,54,61,0.4);
            border-radius:3px;
            margin-top:36px;
            overflow:hidden;z-index:2;
            position:relative;
        }
        .ld-progress-fill {
            width:0%;height:100%;
            background:linear-gradient(90deg,#1f6feb,#58a6ff,#8b5cf6,#58a6ff);
            background-size:300% 100%;
            border-radius:3px;
            transition:width 0.4s cubic-bezier(0.4,0,0.2,1);
            animation:ldShimmer 2s linear infinite;
            box-shadow:0 0 8px rgba(88,166,255,0.4);
        }
        @keyframes ldShimmer { 0%{background-position:300% 0} 100%{background-position:0 0} }

        /* Text with fade animation */
        .ld-text {
            z-index:2;margin-top:24px;
            font-size:10px;font-weight:700;
            color:#3d4450;
            letter-spacing:4px;
            text-transform:uppercase;
            transition:all 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .ld-text.done {
            color:#58a6ff;
            text-shadow:0 0 20px rgba(88,166,255,0.3);
            letter-spacing:6px;
        }

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
            position:fixed;right:-420px;top:0;bottom:0;width:400px;z-index:200;
            background:rgba(4,16,41,0.97);backdrop-filter:blur(24px);
            border-left:1px solid rgba(51,153,255,0.15);
            transition:right 0.35s cubic-bezier(0.4,0,0.2,1);
            display:flex;flex-direction:column;
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

        /* Grid boxes for settings navigation */
        .stg-box {
            display:flex;flex-direction:column;align-items:center;gap:4px;
            padding:8px 4px;border-radius:12px;border:1px solid rgba(51,153,255,0.06);
            background:rgba(51,153,255,0.03);cursor:pointer;transition:all 0.2s;
        }
        .stg-box:hover { background:rgba(51,153,255,0.08);transform:translateY(-1px) }
        .stg-box.active { background:rgba(51,153,255,0.12);border-color:rgba(51,153,255,0.25);box-shadow:0 0 12px rgba(51,153,255,0.1) }
        .stg-box-icon { width:32px;height:32px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:13px;transition:all 0.2s }
        .stg-box.active .stg-box-icon { transform:scale(1.1) }
        .stg-box-label { font-size:9px;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:0.5px }
        .stg-box.active .stg-box-label { color:#94a3b8 }

        .stg-tool-btn.active { background:rgba(51,153,255,0.12) !important;border-color:rgba(51,153,255,0.25) !important }

        /* Sketch canvas overlay */
        #sketsaOverlay {
            position:fixed;inset:0;z-index:9999;cursor:crosshair;
            touch-action:none;
        }
        #sketsaToolbar {
            position:fixed;bottom:20px;left:50%;transform:translateX(-50%);z-index:10000;
            background:rgba(4,16,41,0.95);backdrop-filter:blur(20px);
            border:1px solid rgba(51,153,255,0.2);border-radius:16px;
            padding:8px 16px;display:flex;align-items:center;gap:8px;
            box-shadow:0 8px 32px rgba(0,0,0,0.5);
        }
        #sketsaToolbar button {
            width:36px;height:36px;border-radius:10px;display:flex;align-items:center;justify-content:center;
            background:rgba(51,153,255,0.08);border:1px solid rgba(51,153,255,0.1);
            color:#94a3b8;cursor:pointer;transition:all 0.2s;font-size:14px;
        }
        #sketsaToolbar button:hover { background:rgba(51,153,255,0.15);color:#fff }
        #sketsaToolbar button.active { background:rgba(51,153,255,0.2);color:#3399FF;border-color:rgba(51,153,255,0.3) }
        #sketsaToolbar .divider { width:1px;height:24px;background:rgba(51,153,255,0.15) }

        /* Screenshot area selection */
        #ssSelectOverlay {
            position:fixed;inset:0;z-index:9998;cursor:crosshair;background:rgba(0,0,0,0.3);
        }
        #ssSelectBox {
            position:absolute;border:2px dashed #3399FF;background:rgba(51,153,255,0.1);
            pointer-events:none;
        }
    </style>
    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen overflow-x-hidden">

    {{-- ==================== LOADING SCREEN ==================== --}}
    <div class="loading-screen" id="loadingScreen">
        <div class="ld-dots"></div>
        <div class="ld-glow"></div>

        <div class="relative flex items-center justify-center" style="z-index:2;">
            <div class="ld-ring"></div>
            <div class="ld-logo">
                <span class="logo-k">K</span>
            </div>
        </div>

        <div class="ld-progress">
            <div class="ld-progress-fill" id="ldProgressFill"></div>
        </div>

        <div class="ld-text" id="ldText">MEMUAT</div>
    </div>

    <div class="salju-container" id="salju"></div>

    {{-- ==================== TOP BAR: LED DOT MATRIX + NEWS TICKER ==================== --}}
    <div class="relative z-40" id="topBar">
        {{-- LED Dot Matrix Panel --}}
        <div class="led-matrix-bar" id="ledMatrixBar">
            <div class="led-matrix-inner">
                <div class="led-matrix-track" id="ledMatrixTrack">
                    <span class="led-matrix-text" id="ledText1"></span>
                    <span class="led-matrix-text" id="ledText2"></span>
                </div>
            </div>
        </div>
        {{-- News Ticker --}}
        <div class="bg-gradient-to-r from-kvt-900 via-kvt-800 to-kvt-900 border-b border-kvt-700/30 py-1.5">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-5 flex items-center justify-between">
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
                    <a href="{{ route('halaman.penjamin-mutu') }}" class="hover:text-kvt-400 transition flex items-center gap-1"><i class="fas fa-check-double text-[10px]"></i><span>Penjamin Mutu</span></a>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== MAIN NAVIGATION (2-Row like SMAN Kebumen) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-nav" id="navbar">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-5">

            {{-- ===== ROW 1: Logo + Primary Menus + Search/Auth ===== --}}
            <div class="flex items-center h-[68px]">

                {{-- Logo (spacious, not cramped) --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 shrink-0 mr-4 group">
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
                <div class="hidden lg:block w-px h-8 bg-kvt-700/30 mr-2"></div>

                {{-- All Menu Items - Single Row with Pagination --}}
                <div class="hidden lg:flex items-center flex-1 relative" id="navMenuWrapper">

                    {{-- Sliding Menu Container --}}
                    <div class="flex-1 overflow-visible" id="navSlider">
                        <div class="flex items-center gap-0 transition-transform duration-300 nav-row" id="navMenuItems" style="transform:translateX(0)">

                    {{-- 1. Beranda --}}
                    <div class="nav-item nav-menu-item" data-nav-page="0" data-nav-id="beranda">
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
                                <a href="{{ route('tentang') }}" class="dropdown-item">
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

                    {{-- 2. Jenjang --}}
                    <div class="nav-item nav-menu-item" data-nav-page="0" data-nav-id="jenjang">
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

                    {{-- 3. Platform --}}
                    <div class="nav-item nav-menu-item" data-nav-page="0" data-nav-id="platform">
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

                    {{-- 4. Berita --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="berita">
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

                    {{-- 5. Kerja Sama --}}
                    <div class="nav-item nav-menu-item" data-nav-page="0" data-nav-id="kerjasama">
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
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="tentang">
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

                    {{-- 7. Riset --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="riset">
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

                    {{-- 8. Karir --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="karir">
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

                    {{-- 9. Komunitas --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="komunitas">
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

                    {{-- 10. Sertifikasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="sertifikasi">
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

                    {{-- 11. Langganan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="langganan">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-crown text-amber-400"></i> Langganan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('sponsor') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-crown text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Paket Premium</div><div class="item-desc">Akses fitur eksklusif</div></div>
                            </a>
                            <a href="{{ route('sponsor') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-gift text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Paket Semester</div><div class="item-desc">Hemat per semester</div></div>
                            </a>
                            <a href="{{ route('sponsor') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-university text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Paket Institusi</div><div class="item-desc">Untuk sekolah & kampus</div></div>
                            </a>
                            <a href="{{ route('sponsor') }}" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-tags text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">Promo & Diskon</div><div class="item-desc">Penawaran terbatas</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 12. Sumber Daya --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="sumberdaya">
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

                    {{-- 13. Keamanan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="keamanan">
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

                    {{-- 14. Kurikulum --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="kurikulum">
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

                    {{-- 15. Panduan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="panduan">
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

                    {{-- 16. Media --}}
                    <div class="nav-item nav-menu-item" data-nav-page="3" data-nav-id="media">
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
                    <div class="nav-item nav-menu-item" data-nav-page="3" data-nav-id="dokumen">
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

                    {{-- 19. Bantuan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="3" data-nav-id="bantuan">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-life-ring text-lime-400"></i> Bantuan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="dropdown-item">
                                <div class="item-icon bg-lime-500/10"><i class="fas fa-question-circle text-lime-400"></i></div>
                                <div class="item-text"><div class="item-title">FAQ</div><div class="item-desc">Pertanyaan umum</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.panduan-pengguna') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-headset text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Pusat Bantuan</div><div class="item-desc">Hubungi tim support</div></div>
                            </a>
                            <a href="{{ route('halaman.alur-panduan.sop-prosedur') }}" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-bug text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Laporkan Masalah</div><div class="item-desc">Bug report & feedback</div></div>
                            </a>
                            <a href="{{ route('tentang') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-envelope text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Kontak Kami</div><div class="item-desc">Email & media sosial</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 20. Edukasi Gratis --}}
                    <div class="nav-item nav-menu-item" data-nav-page="3" data-nav-id="edukasi">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-gift text-green-400"></i> Edukasi Gratis
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('edukasi-gratis.index') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-graduation-cap text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Program</div><div class="item-desc">Lihat semua edukasi gratis</div></div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-section-title">Kategori Populer</div>
                            <a href="{{ route('edukasi-gratis.index', ['kategori' => 'tools']) }}" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-tools text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">Developer Tools</div><div class="item-desc">GitHub, JetBrains, IDE gratis</div></div>
                            </a>
                            <a href="{{ route('edukasi-gratis.index', ['kategori' => 'cloud']) }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-cloud text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Cloud & Hosting</div><div class="item-desc">Azure, GCP, AWS credit gratis</div></div>
                            </a>
                            <a href="{{ route('edukasi-gratis.index', ['kategori' => 'design']) }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-palette text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Desain & Kreativitas</div><div class="item-desc">Figma, Canva, Autodesk gratis</div></div>
                            </a>
                            <a href="{{ route('edukasi-gratis.index', ['kategori' => 'pendidikan']) }}" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-book-open text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">Platform Pendidikan</div><div class="item-desc">Coursera, edX, Khan Academy</div></div>
                            </a>
                            @auth
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('pendaftaran-edukasi.riwayat') }}" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-clipboard-check text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Riwayat Pendaftaran</div><div class="item-desc">Lihat status pendaftaran Anda</div></div>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>

                    {{-- 21. Statistik --}}
                    <div class="nav-item nav-menu-item" data-nav-page="3" data-nav-id="statistik">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-chart-line text-sky-400"></i> Statistik
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('beranda') }}" class="dropdown-item">
                                <div class="item-icon bg-sky-500/10"><i class="fas fa-chart-bar text-sky-400"></i></div>
                                <div class="item-text"><div class="item-title">Statistik Platform</div><div class="item-desc">Data pengunjung & aktivitas</div></div>
                            </a>
                            <a href="{{ route('beranda') }}#statistik" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-users text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Pengguna Aktif</div><div class="item-desc">Statistik pengguna harian</div></div>
                            </a>
                            <a href="{{ route('beranda') }}#peringkat" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-trophy text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Peringkat & XP</div><div class="item-desc">Papan peringkat gamifikasi</div></div>
                            </a>
                            @auth
                            <a href="{{ route('laporan.index') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-chart-pie text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Laporan Saya</div><div class="item-desc">30+ jenis visualisasi</div></div>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>

                    {{-- 22. Layanan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="layanan">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-concierge-bell text-emerald-400"></i> Layanan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <div class="dropdown-section-title">Layanan Platform</div>
                            <a href="{{ route('halaman.langganan') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-crown text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Paket Langganan</div><div class="item-desc">Akses fitur premium</div></div>
                            </a>
                            <a href="{{ route('halaman.sertifikasi') }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-certificate text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Penerbitan Sertifikat</div><div class="item-desc">Cetak & verifikasi sertifikat</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.cv-builder') }}" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-file-invoice text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">CV Builder</div><div class="item-desc">Buat CV profesional ATS-friendly</div></div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-section-title">Bantuan & Dukungan</div>
                            <a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="dropdown-item">
                                <div class="item-icon bg-lime-500/10"><i class="fas fa-question-circle text-lime-400"></i></div>
                                <div class="item-text"><div class="item-title">FAQ & Bantuan</div><div class="item-desc">Pusat bantuan pengguna</div></div>
                            </a>
                            <a href="{{ route('tentang') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-envelope text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Hubungi Kami</div><div class="item-desc">Kontak & media sosial</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- ===== PAGE 4 (items 22-26) ===== --}}

                    {{-- 22. Webinar --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="webinar">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-video text-red-400"></i> Webinar
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.webinar') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-video text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Webinar</div><div class="item-desc">Live & on-demand sessions</div></div>
                            </a>
                            <a href="{{ route('halaman.webinar') }}#jadwal" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-calendar-alt text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Jadwal Mendatang</div><div class="item-desc">Webinar yang akan datang</div></div>
                            </a>
                            <a href="{{ route('halaman.media.webinar-event') }}" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-play-circle text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Rekaman</div><div class="item-desc">Tonton ulang webinar</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 23. Beasiswa --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="beasiswa">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-award text-amber-400"></i> Beasiswa
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.beasiswa') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-award text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Beasiswa</div><div class="item-desc">Program pendanaan pendidikan</div></div>
                            </a>
                            <a href="{{ route('halaman.beasiswa') }}#jenis" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-trophy text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Beasiswa Prestasi</div><div class="item-desc">Untuk berprestasi akademik</div></div>
                            </a>
                            <a href="{{ route('halaman.beasiswa') }}#syarat" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-clipboard-list text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Persyaratan</div><div class="item-desc">Syarat & cara daftar</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 24. Laboratorium --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="laboratorium">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-flask text-cyan-400"></i> Lab Virtual
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.laboratorium') }}" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-flask text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Lab</div><div class="item-desc">80+ laboratorium virtual</div></div>
                            </a>
                            <a href="{{ route('halaman.laboratorium') }}#kategori" class="dropdown-item">
                                <div class="item-icon bg-teal-500/10"><i class="fas fa-atom text-teal-400"></i></div>
                                <div class="item-text"><div class="item-title">Lab Sains</div><div class="item-desc">Fisika, Kimia, Biologi</div></div>
                            </a>
                            <a href="{{ route('halaman.laboratorium') }}#kategori" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-laptop-code text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Lab Komputer</div><div class="item-desc">Coding & simulasi</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 25. Perpustakaan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="perpustakaan">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-book-reader text-emerald-400"></i> Perpustakaan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.perpustakaan') }}" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-book-reader text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Katalog Lengkap</div><div class="item-desc">100K+ koleksi digital</div></div>
                            </a>
                            <a href="{{ route('halaman.sumber-daya.ebook-modul') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-book text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">E-Book & Modul</div><div class="item-desc">Buku digital gratis</div></div>
                            </a>
                            <a href="{{ route('halaman.perpustakaan') }}#jurnal" class="dropdown-item">
                                <div class="item-icon bg-lime-500/10"><i class="fas fa-file-alt text-lime-400"></i></div>
                                <div class="item-text"><div class="item-title">Jurnal & Referensi</div><div class="item-desc">Akses jurnal ilmiah</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 26. Forum --}}
                    <div class="nav-item nav-menu-item" data-nav-page="4" data-nav-id="forum">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-comments text-indigo-400"></i> Forum
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.forum') }}" class="dropdown-item">
                                <div class="item-icon bg-indigo-500/10"><i class="fas fa-comments text-indigo-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Forum</div><div class="item-desc">50K+ diskusi aktif</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.forum-diskusi') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-comment-dots text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Diskusi Akademik</div><div class="item-desc">Tanya jawab pelajaran</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.study-group') }}" class="dropdown-item">
                                <div class="item-icon bg-violet-500/10"><i class="fas fa-user-friends text-violet-400"></i></div>
                                <div class="item-text"><div class="item-title">Study Group</div><div class="item-desc">Belajar kelompok online</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- ===== PAGE 5 (items 27-31) ===== --}}

                    {{-- 27. Mentoring --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="mentoring">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-chalkboard-teacher text-violet-400"></i> Mentoring
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.mentoring') }}" class="dropdown-item">
                                <div class="item-icon bg-violet-500/10"><i class="fas fa-chalkboard-teacher text-violet-400"></i></div>
                                <div class="item-text"><div class="item-title">Cari Mentor</div><div class="item-desc">300+ mentor profesional</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.mentoring') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-user-tie text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Mentoring Karir</div><div class="item-desc">Bimbingan karir 1-on-1</div></div>
                            </a>
                            <a href="{{ route('halaman.mentoring') }}#cara" class="dropdown-item">
                                <div class="item-icon bg-fuchsia-500/10"><i class="fas fa-route text-fuchsia-400"></i></div>
                                <div class="item-text"><div class="item-title">Cara Kerja</div><div class="item-desc">Proses mentoring</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 28. Magang --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="magang">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-building text-orange-400"></i> Magang
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.magang') }}" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-building text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Lowongan Magang</div><div class="item-desc">200+ perusahaan mitra</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.magang') }}" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-briefcase text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Magang Industri</div><div class="item-desc">MBKM & program kampus</div></div>
                            </a>
                            <a href="{{ route('halaman.magang') }}#apply" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-paper-plane text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Cara Melamar</div><div class="item-desc">Panduan apply magang</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 29. Alumni --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="alumni">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-user-graduate text-rose-400"></i> Alumni
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.alumni') }}" class="dropdown-item">
                                <div class="item-icon bg-rose-500/10"><i class="fas fa-user-graduate text-rose-400"></i></div>
                                <div class="item-text"><div class="item-title">Jaringan Alumni</div><div class="item-desc">25K+ alumni terhubung</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.alumni-network') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-network-wired text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Alumni Network</div><div class="item-desc">Direktori & koneksi</div></div>
                            </a>
                            <a href="{{ route('halaman.alumni') }}#events" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-calendar-star text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Event Alumni</div><div class="item-desc">Reuni & gathering</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 30. Portofolio --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="portofolio">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-palette text-sky-400"></i> Portofolio
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.portofolio') }}" class="dropdown-item">
                                <div class="item-icon bg-sky-500/10"><i class="fas fa-palette text-sky-400"></i></div>
                                <div class="item-text"><div class="item-title">E-Portfolio</div><div class="item-desc">Showcase proyek & karya</div></div>
                            </a>
                            <a href="{{ route('halaman.karir.cv-builder') }}" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-file-invoice text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">CV Builder</div><div class="item-desc">Buat CV profesional</div></div>
                            </a>
                            <a href="{{ route('halaman.portofolio') }}#template" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-th text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">Template</div><div class="item-desc">200+ template portofolio</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 31. Kompetisi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="kompetisi">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-medal text-yellow-400"></i> Kompetisi
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.kompetisi') }}" class="dropdown-item">
                                <div class="item-icon bg-yellow-500/10"><i class="fas fa-medal text-yellow-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Kompetisi</div><div class="item-desc">100+ event & olimpiade</div></div>
                            </a>
                            <a href="{{ route('halaman.komunitas.hackathon') }}" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-code text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Hackathon</div><div class="item-desc">Kompetisi coding</div></div>
                            </a>
                            <a href="{{ route('halaman.kompetisi') }}#hall" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-trophy text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Hall of Fame</div><div class="item-desc">Pemenang & juara</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- ===== PAGE 6 (items 32-36) ===== --}}

                    {{-- 32. Workshop --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="workshop">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-tools text-green-400"></i> Workshop
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.workshop') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-tools text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Workshop</div><div class="item-desc">150+ pelatihan praktis</div></div>
                            </a>
                            <a href="{{ route('halaman.workshop') }}#upcoming" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-calendar-check text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Workshop Mendatang</div><div class="item-desc">Daftar sekarang</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 33. Jurnal --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="jurnal">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-scroll text-purple-400"></i> Jurnal
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.jurnal') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-scroll text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Jurnal Akademik</div><div class="item-desc">30+ jurnal terakreditasi</div></div>
                            </a>
                            <a href="{{ route('halaman.riset.publikasi') }}" class="dropdown-item">
                                <div class="item-icon bg-violet-500/10"><i class="fas fa-file-signature text-violet-400"></i></div>
                                <div class="item-text"><div class="item-title">Submit Paper</div><div class="item-desc">Kirim artikel ilmiah</div></div>
                            </a>
                            <a href="{{ route('halaman.jurnal') }}#arsip" class="dropdown-item">
                                <div class="item-icon bg-indigo-500/10"><i class="fas fa-archive text-indigo-400"></i></div>
                                <div class="item-text"><div class="item-title">Arsip Jurnal</div><div class="item-desc">Database publikasi</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 34. Podcast --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="podcast">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-podcast text-pink-400"></i> Podcast
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.podcast') }}" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-podcast text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Podcast</div><div class="item-desc">200+ episode edukatif</div></div>
                            </a>
                            <a href="{{ route('halaman.media.podcast-audio') }}" class="dropdown-item">
                                <div class="item-icon bg-rose-500/10"><i class="fas fa-headphones text-rose-400"></i></div>
                                <div class="item-text"><div class="item-title">Audio Learning</div><div class="item-desc">Belajar sambil dengarkan</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 35. Pelatihan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="pelatihan">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-dumbbell text-kvt-400"></i> Pelatihan
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.pelatihan') }}" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-dumbbell text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">Program Pelatihan</div><div class="item-desc">300+ program profesional</div></div>
                            </a>
                            <a href="{{ route('halaman.pelatihan') }}#sertifikasi" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-certificate text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Sertifikasi Keahlian</div><div class="item-desc">50+ sertifikasi profesional</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 36. Konsultasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="konsultasi">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-headset text-teal-400"></i> Konsultasi
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.konsultasi') }}" class="dropdown-item">
                                <div class="item-icon bg-teal-500/10"><i class="fas fa-headset text-teal-400"></i></div>
                                <div class="item-text"><div class="item-title">Konsultasi Akademik</div><div class="item-desc">Bimbingan dari ahli</div></div>
                            </a>
                            <a href="{{ route('halaman.konsultasi') }}#booking" class="dropdown-item">
                                <div class="item-icon bg-cyan-500/10"><i class="fas fa-calendar-plus text-cyan-400"></i></div>
                                <div class="item-text"><div class="item-title">Booking Sesi</div><div class="item-desc">Jadwalkan konsultasi</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- ===== PAGE 7 (items 37-40) ===== --}}

                    {{-- 37. E-Learning --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="elearning">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-laptop text-kvt-400"></i> E-Learning
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.e-learning') }}" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-laptop text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">Platform LMS</div><div class="item-desc">1000+ kursus online</div></div>
                            </a>
                            <a href="{{ route('edukasi-gratis.index') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-gift text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Kursus Gratis</div><div class="item-desc">Belajar tanpa biaya</div></div>
                            </a>
                            @auth
                            <a href="{{ route('kelas.index') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-chalkboard text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Kelas Saya</div><div class="item-desc">Lanjutkan belajar</div></div>
                            </a>
                            @endauth
                        </div>
                    </div>
                </div>

                    {{-- 38. Akreditasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="akreditasi">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-check-double text-emerald-400"></i> Akreditasi
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.akreditasi') }}" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-check-double text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Standar Mutu</div><div class="item-desc">ISO, AUN-QA, BAN-PT</div></div>
                            </a>
                            <a href="{{ route('halaman.penjamin-mutu') }}" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-shield-alt text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Penjamin Mutu</div><div class="item-desc">Quality assurance</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 39. Galeri --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="galeri">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-images text-pink-400"></i> Galeri
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.galeri') }}" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-images text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Galeri Foto</div><div class="item-desc">5K+ foto dokumentasi</div></div>
                            </a>
                            <a href="{{ route('halaman.media.galeri-foto') }}" class="dropdown-item">
                                <div class="item-icon bg-rose-500/10"><i class="fas fa-camera text-rose-400"></i></div>
                                <div class="item-text"><div class="item-title">Album Kegiatan</div><div class="item-desc">Foto event & acara</div></div>
                            </a>
                            <a href="{{ route('halaman.media.video-tutorial') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-film text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Video Gallery</div><div class="item-desc">500+ video highlights</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 40. Pengumuman --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="pengumuman">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-bullhorn text-red-400"></i> Pengumuman
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.pengumuman') }}" class="dropdown-item">
                                <div class="item-icon bg-red-500/10"><i class="fas fa-bullhorn text-red-400"></i></div>
                                <div class="item-text"><div class="item-title">Semua Pengumuman</div><div class="item-desc">Info resmi terbaru</div></div>
                            </a>
                            <a href="{{ route('berita.index') }}" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-newspaper text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Berita Terkini</div><div class="item-desc">Kabar terbaru platform</div></div>
                            </a>
                            <a href="{{ route('halaman.pengumuman') }}#arsip" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-archive text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Arsip</div><div class="item-desc">Pengumuman sebelumnya</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                        </div>{{-- /navMenuItems --}}
                    </div>{{-- /navSlider --}}

                    {{-- Nav Scroll Arrows + Lainnya --}}
                    <div class="flex items-center ml-2 shrink-0 gap-1">
                        <button onclick="navMundur()" class="nav-page-arrow" title="Menu sebelumnya" id="navBtnPrev">
                            <i class="fas fa-chevron-left text-[9px]"></i>
                        </button>
                        <button onclick="navMaju()" class="nav-page-arrow" title="Menu berikutnya" id="navBtnNext">
                            <i class="fas fa-chevron-right text-[9px]"></i>
                        </button>
                        <button onclick="bukaSemuaMenu()" class="btn-semua-menu" title="Semua menu & kustomisasi">
                            <i class="fas fa-th-large text-[12px]"></i>
                            <span class="hidden xl:inline">Lainnya</span>
                            <span class="text-[9px] bg-kvt-700/50 px-1.5 py-0.5 rounded-md ml-1 font-bold" id="navPageBadge">1/10</span>
                        </button>
                    </div>

                </div>{{-- /navMenuWrapper --}}

                {{-- ===== RIGHT SIDE CONTROLS ===== --}}
                <div class="hidden lg:flex items-center gap-1 shrink-0 ml-3">
                    {{-- Search --}}
                    <button onclick="bukaSearch()" class="w-9 h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/50 transition" title="Cari (Ctrl+K)">
                        <i class="fas fa-search text-sm"></i>
                    </button>

                    {{-- Notification Bell --}}
                    <div class="relative" id="notifWrapper">
                        <button onclick="toggleNotifikasi()" class="w-9 h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-yellow-400 hover:bg-kvt-800/50 transition relative" title="Notifikasi">
                            <i class="fas fa-bell text-sm"></i>
                            <span id="notifBadge" class="absolute -top-0.5 -right-0.5 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center hidden">0</span>
                        </button>
                        {{-- Notification Dropdown --}}
                        <div id="notifDropdown" class="hidden absolute right-0 top-full mt-2 w-80 nav-dropdown-inner rounded-2xl overflow-hidden shadow-2xl shadow-black/50 z-50" style="border-radius:16px">
                            <div class="bg-gradient-to-r from-kvt-600 to-ungu-600 p-3 flex items-center justify-between">
                                <h4 class="text-white font-bold text-sm flex items-center gap-2"><i class="fas fa-bell"></i> Notifikasi</h4>
                                <button onclick="tandaiSemuaDibaca()" class="text-[10px] text-white/70 hover:text-white transition">Tandai semua dibaca</button>
                            </div>
                            <div id="notifContent" class="max-h-[300px] overflow-y-auto p-2 space-y-1">
                                <div class="text-center py-6 text-gray-500 text-sm">Memuat notifikasi...</div>
                            </div>
                            <div class="p-2 border-t border-kvt-700/20 text-center">
                                <a href="{{ route('berita.index') }}" class="text-[11px] text-kvt-400 hover:text-kvt-300 transition font-semibold"><i class="fas fa-arrow-right mr-1"></i> Lihat semua berita</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-px h-6 bg-kvt-700/30 mx-1"></div>

                    @guest
                    <a href="{{ route('masuk') }}" class="px-5 py-2 text-sm text-gray-300 hover:text-white bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl transition font-semibold border border-kvt-700/30 flex items-center gap-2"><i class="fas fa-sign-in-alt text-xs text-kvt-400"></i> Masuk</a>
                    <a href="{{ route('daftar') }}" class="px-5 py-2 text-sm bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white rounded-xl transition font-bold shadow-lg shadow-kvt-500/20 flex items-center gap-2"><i class="fas fa-user-plus text-xs"></i> Daftar</a>
                    @else
                    <div class="relative" id="userMenuWrapper">
                        <button onclick="toggleUserMenu()" class="flex items-center gap-2 px-2 py-1.5 rounded-xl hover:bg-kvt-800/50 transition group">
                            <div class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <div class="leading-tight text-left">
                                <span class="text-xs text-white font-semibold block max-w-[80px] truncate">{{ Auth::user()->name }}</span>
                                <div class="flex items-center gap-1">
                                    <div class="w-12 h-1 bg-kvt-800 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-kvt-400 to-ungu-500 rounded-full" style="width:{{ min(Auth::user()->level ?? 0, 100) }}%"></div>
                                    </div>
                                    <span class="text-[9px] text-gray-500">Lv.{{ Auth::user()->level ?? 0 }}</span>
                                </div>
                            </div>
                            <i class="fas fa-chevron-down text-[8px] text-gray-500 group-hover:text-gray-300 transition"></i>
                        </button>
                        <div id="userDropdown" class="hidden absolute right-0 top-full mt-2 w-56 nav-dropdown-inner rounded-2xl overflow-hidden shadow-2xl shadow-black/50 z-50" style="border-radius:14px">
                            <div class="p-3 border-b border-kvt-700/20">
                                <p class="text-sm text-white font-semibold">{{ Auth::user()->name }}</p>
                                <p class="text-[11px] text-gray-500">{{ Auth::user()->email }}</p>
                                <span class="inline-block mt-1 text-[10px] px-2 py-0.5 rounded-full font-bold {{ Auth::user()->peran === 'admin' ? 'bg-red-500/20 text-red-400' : (Auth::user()->peran === 'pengajar' ? 'bg-green-500/20 text-green-400' : (Auth::user()->peran === 'staff' ? 'bg-orange-500/20 text-orange-400' : 'bg-blue-500/20 text-blue-400')) }}">
                                    {{ ucfirst(Auth::user()->peran ?? 'pengguna') }}
                                </span>
                            </div>
                            <div class="p-2 space-y-0.5">
                                <a href="{{ route('dasbor') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-300 hover:text-white hover:bg-kvt-800/50 rounded-lg transition"><i class="fas fa-tachometer-alt w-5 text-kvt-400 text-xs"></i> Dasbor</a>
                                @if(Auth::user()->peran === 'admin')
                                <a href="{{ route('admin.dasbor') }}" class="flex items-center gap-2.5 px-3 py-2 text-sm text-gray-300 hover:text-white hover:bg-kvt-800/50 rounded-lg transition"><i class="fas fa-crown w-5 text-yellow-400 text-xs"></i> Admin Panel</a>
                                @endif
                            </div>
                            <div class="p-2 border-t border-kvt-700/20">
                                <form action="{{ route('keluar') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 text-sm text-red-400 hover:text-red-300 hover:bg-red-500/10 rounded-lg transition"><i class="fas fa-sign-out-alt w-5 text-xs"></i> Keluar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endguest
                </div>

                {{-- Mobile Toggle --}}
                <button onclick="toggleMobile()" class="lg:hidden ml-auto w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                    <i class="fas fa-bars text-lg"></i>
                </button>

            </div>{{-- /flex row --}}

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
                <a href="{{ route('edukasi-gratis.index') }}" class="block py-2.5 px-4 text-gray-300 hover:text-green-400 hover:bg-green-500/5 rounded-xl text-sm font-medium"><i class="fas fa-gift w-6 text-green-400"></i> Edukasi Gratis</a>
                @auth
                <a href="{{ route('pendaftaran-edukasi.riwayat') }}" class="block py-2.5 px-4 text-gray-300 hover:text-emerald-400 hover:bg-emerald-500/5 rounded-xl text-sm font-medium pl-10"><i class="fas fa-clipboard-check w-6 text-emerald-400"></i> Riwayat Pendaftaran</a>
                @endauth
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
                    <span class="font-semibold">KVT Search Engine v5.0</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SEMUA MENU POPUP ==================== --}}
    <div id="semuaMenuOverlay" class="fixed inset-0 z-[99] hidden megamenu-overlay">
        <div class="max-w-5xl mx-auto pt-[6vh] px-4 pb-8 h-full overflow-y-auto">
            <div class="nav-dropdown-inner megamenu-popup" style="border-radius:24px">
                {{-- Header --}}
                <div class="p-5 border-b border-kvt-700/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-xl flex items-center justify-center">
                                <i class="fas fa-th-large text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Semua Menu</h3>
                                <p class="text-gray-500 text-xs">Akses cepat ke seluruh 40 fitur KVT Hub</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="bukaSearch()" class="text-xs text-gray-400 hover:text-kvt-400 bg-kvt-800/50 px-3 py-1.5 rounded-lg border border-kvt-700/30 transition flex items-center gap-2">
                                <i class="fas fa-search text-[10px]"></i> Cari Menu
                                <kbd class="text-[9px] bg-kvt-700/50 px-1 py-0.5 rounded ml-1">Ctrl+K</kbd>
                            </button>
                            <button onclick="tutupSemuaMenu()" class="w-9 h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                                <i class="fas fa-times text-lg"></i>
                            </button>
                        </div>
                    </div>
                    {{-- Page Switcher Tabs --}}
                    <div class="flex items-center gap-2">
                        <span class="text-[11px] text-gray-500 font-semibold mr-1"><i class="fas fa-layer-group mr-1"></i>Halaman Navbar:</span>
                        <div class="flex items-center gap-1 flex-wrap" id="popupPageTabs">
                            <button onclick="navPindahHalaman(0)" class="nav-page-tab aktif" data-page="0">1</button>
                            <button onclick="navPindahHalaman(1)" class="nav-page-tab" data-page="1">2</button>
                            <button onclick="navPindahHalaman(2)" class="nav-page-tab" data-page="2">3</button>
                            <button onclick="navPindahHalaman(3)" class="nav-page-tab" data-page="3">4</button>
                            <button onclick="navPindahHalaman(4)" class="nav-page-tab" data-page="4">5</button>
                            <button onclick="navPindahHalaman(5)" class="nav-page-tab" data-page="5">6</button>
                            <button onclick="navPindahHalaman(6)" class="nav-page-tab" data-page="6">7</button>
                            <button onclick="navPindahHalaman(7)" class="nav-page-tab" data-page="7">8</button>
                            <button onclick="navPindahHalaman(8)" class="nav-page-tab" data-page="8">9</button>
                            <button onclick="navPindahHalaman(9)" class="nav-page-tab" data-page="9">10</button>
                        </div>
                        <button onclick="navMundur()" class="nav-page-arrow ml-1" title="Sebelumnya" id="navBtnAtas"><i class="fas fa-chevron-left text-[9px]"></i></button>
                        <button onclick="navMaju()" class="nav-page-arrow" title="Berikutnya" id="navBtnBawah"><i class="fas fa-chevron-right text-[9px]"></i></button>
                    </div>
                </div>

                {{-- Menu Grid (All 40 Menus) --}}
                <div class="p-6 space-y-6 max-h-[60vh] overflow-y-auto">

                    {{-- Kategori: Utama --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-star text-amber-400 text-xs"></i> Utama</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('beranda') }}" class="megamenu-card"><div class="mc-icon bg-kvt-500/15"><i class="fas fa-home text-kvt-400"></i></div><div><div class="mc-title">Beranda</div><div class="mc-desc">Halaman utama</div></div></a>
                            @auth<a href="{{ route('dasbor') }}" class="megamenu-card"><div class="mc-icon bg-green-500/15"><i class="fas fa-tachometer-alt text-green-400"></i></div><div><div class="mc-title">Dasbor</div><div class="mc-desc">Panel kontrol</div></div></a>@endauth
                            <a href="{{ route('tentang') }}" class="megamenu-card"><div class="mc-icon bg-purple-500/15"><i class="fas fa-landmark text-purple-400"></i></div><div><div class="mc-title">Tentang</div><div class="mc-desc">Visi & misi</div></div></a>
                            <a href="{{ route('berita.index') }}" class="megamenu-card"><div class="mc-icon bg-emerald-500/15"><i class="fas fa-newspaper text-emerald-400"></i></div><div><div class="mc-title">Berita</div><div class="mc-desc">Berita terbaru</div></div></a>
                            <a href="{{ route('kerja-sama.index') }}" class="megamenu-card"><div class="mc-icon bg-amber-500/15"><i class="fas fa-handshake text-amber-400"></i></div><div><div class="mc-title">Kerja Sama</div><div class="mc-desc">150+ mitra global</div></div></a>
                            <a href="{{ route('halaman.pengumuman') }}" class="megamenu-card"><div class="mc-icon bg-red-500/15"><i class="fas fa-bullhorn text-red-400"></i></div><div><div class="mc-title">Pengumuman</div><div class="mc-desc">Info resmi</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Akademik --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-graduation-cap text-green-400 text-xs"></i> Akademik & Jenjang</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.jenjang') }}" class="megamenu-card"><div class="mc-icon bg-green-500/15"><i class="fas fa-graduation-cap text-green-400"></i></div><div><div class="mc-title">Jenjang</div><div class="mc-desc">TK hingga S3</div></div></a>
                            <a href="{{ route('halaman.kurikulum') }}" class="megamenu-card"><div class="mc-icon bg-indigo-500/15"><i class="fas fa-book-reader text-indigo-400"></i></div><div><div class="mc-title">Kurikulum</div><div class="mc-desc">Standar kurikulum</div></div></a>
                            <a href="{{ route('halaman.platform') }}" class="megamenu-card"><div class="mc-icon bg-kvt-500/15"><i class="fas fa-laptop-code text-kvt-400"></i></div><div><div class="mc-title">Platform</div><div class="mc-desc">Fitur & teknologi</div></div></a>
                            <a href="{{ route('halaman.sertifikasi') }}" class="megamenu-card"><div class="mc-icon bg-yellow-500/15"><i class="fas fa-award text-yellow-400"></i></div><div><div class="mc-title">Sertifikasi</div><div class="mc-desc">120+ program</div></div></a>
                            <a href="{{ route('halaman.akreditasi') }}" class="megamenu-card"><div class="mc-icon bg-emerald-500/15"><i class="fas fa-check-double text-emerald-400"></i></div><div><div class="mc-title">Akreditasi</div><div class="mc-desc">Standar mutu</div></div></a>
                            <a href="{{ route('edukasi-gratis.index') }}" class="megamenu-card"><div class="mc-icon bg-lime-500/15"><i class="fas fa-gift text-lime-400"></i></div><div><div class="mc-title">Edukasi Gratis</div><div class="mc-desc">Program gratis</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Pembelajaran --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-laptop text-kvt-400 text-xs"></i> Pembelajaran Digital</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.e-learning') }}" class="megamenu-card"><div class="mc-icon bg-kvt-500/15"><i class="fas fa-laptop text-kvt-400"></i></div><div><div class="mc-title">E-Learning</div><div class="mc-desc">1000+ kursus</div></div></a>
                            <a href="{{ route('halaman.webinar') }}" class="megamenu-card"><div class="mc-icon bg-red-500/15"><i class="fas fa-video text-red-400"></i></div><div><div class="mc-title">Webinar</div><div class="mc-desc">Live & on-demand</div></div></a>
                            <a href="{{ route('halaman.workshop') }}" class="megamenu-card"><div class="mc-icon bg-green-500/15"><i class="fas fa-tools text-green-400"></i></div><div><div class="mc-title">Workshop</div><div class="mc-desc">Pelatihan praktis</div></div></a>
                            <a href="{{ route('halaman.laboratorium') }}" class="megamenu-card"><div class="mc-icon bg-cyan-500/15"><i class="fas fa-flask text-cyan-400"></i></div><div><div class="mc-title">Lab Virtual</div><div class="mc-desc">80+ laboratorium</div></div></a>
                            <a href="{{ route('halaman.pelatihan') }}" class="megamenu-card"><div class="mc-icon bg-blue-500/15"><i class="fas fa-dumbbell text-blue-400"></i></div><div><div class="mc-title">Pelatihan</div><div class="mc-desc">Profesional</div></div></a>
                            <a href="{{ route('halaman.podcast') }}" class="megamenu-card"><div class="mc-icon bg-pink-500/15"><i class="fas fa-podcast text-pink-400"></i></div><div><div class="mc-title">Podcast</div><div class="mc-desc">200+ episode</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Riset & Karir --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-microscope text-purple-400 text-xs"></i> Riset & Karir</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.riset') }}" class="megamenu-card"><div class="mc-icon bg-purple-500/15"><i class="fas fa-microscope text-purple-400"></i></div><div><div class="mc-title">Riset</div><div class="mc-desc">Pusat penelitian</div></div></a>
                            <a href="{{ route('halaman.karir') }}" class="megamenu-card"><div class="mc-icon bg-orange-500/15"><i class="fas fa-briefcase text-orange-400"></i></div><div><div class="mc-title">Karir</div><div class="mc-desc">Lowongan & peluang</div></div></a>
                            <a href="{{ route('halaman.magang') }}" class="megamenu-card"><div class="mc-icon bg-amber-500/15"><i class="fas fa-building text-amber-400"></i></div><div><div class="mc-title">Magang</div><div class="mc-desc">200+ perusahaan</div></div></a>
                            <a href="{{ route('halaman.jurnal') }}" class="megamenu-card"><div class="mc-icon bg-violet-500/15"><i class="fas fa-scroll text-violet-400"></i></div><div><div class="mc-title">Jurnal</div><div class="mc-desc">Publikasi ilmiah</div></div></a>
                            <a href="{{ route('halaman.beasiswa') }}" class="megamenu-card"><div class="mc-icon bg-yellow-500/15"><i class="fas fa-award text-yellow-400"></i></div><div><div class="mc-title">Beasiswa</div><div class="mc-desc">Pendanaan studi</div></div></a>
                            <a href="{{ route('halaman.kompetisi') }}" class="megamenu-card"><div class="mc-icon bg-rose-500/15"><i class="fas fa-medal text-rose-400"></i></div><div><div class="mc-title">Kompetisi</div><div class="mc-desc">100+ event</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Komunitas & Networking --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-users text-pink-400 text-xs"></i> Komunitas & Networking</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.komunitas') }}" class="megamenu-card"><div class="mc-icon bg-pink-500/15"><i class="fas fa-users text-pink-400"></i></div><div><div class="mc-title">Komunitas</div><div class="mc-desc">Kolaborasi</div></div></a>
                            <a href="{{ route('halaman.forum') }}" class="megamenu-card"><div class="mc-icon bg-indigo-500/15"><i class="fas fa-comments text-indigo-400"></i></div><div><div class="mc-title">Forum</div><div class="mc-desc">50K+ diskusi</div></div></a>
                            <a href="{{ route('halaman.mentoring') }}" class="megamenu-card"><div class="mc-icon bg-violet-500/15"><i class="fas fa-chalkboard-teacher text-violet-400"></i></div><div><div class="mc-title">Mentoring</div><div class="mc-desc">300+ mentor</div></div></a>
                            <a href="{{ route('halaman.alumni') }}" class="megamenu-card"><div class="mc-icon bg-rose-500/15"><i class="fas fa-user-graduate text-rose-400"></i></div><div><div class="mc-title">Alumni</div><div class="mc-desc">25K+ anggota</div></div></a>
                            <a href="{{ route('halaman.konsultasi') }}" class="megamenu-card"><div class="mc-icon bg-teal-500/15"><i class="fas fa-headset text-teal-400"></i></div><div><div class="mc-title">Konsultasi</div><div class="mc-desc">Bimbingan ahli</div></div></a>
                            <a href="{{ route('halaman.portofolio') }}" class="megamenu-card"><div class="mc-icon bg-sky-500/15"><i class="fas fa-palette text-sky-400"></i></div><div><div class="mc-title">Portofolio</div><div class="mc-desc">Showcase karya</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Sumber Daya & Media --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-database text-cyan-400 text-xs"></i> Sumber Daya & Media</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.sumber-daya') }}" class="megamenu-card"><div class="mc-icon bg-cyan-500/15"><i class="fas fa-database text-cyan-400"></i></div><div><div class="mc-title">Sumber Daya</div><div class="mc-desc">Library & tools</div></div></a>
                            <a href="{{ route('halaman.perpustakaan') }}" class="megamenu-card"><div class="mc-icon bg-emerald-500/15"><i class="fas fa-book-reader text-emerald-400"></i></div><div><div class="mc-title">Perpustakaan</div><div class="mc-desc">100K+ koleksi</div></div></a>
                            <a href="{{ route('halaman.media') }}" class="megamenu-card"><div class="mc-icon bg-rose-500/15"><i class="fas fa-play-circle text-rose-400"></i></div><div><div class="mc-title">Media</div><div class="mc-desc">Video & audio</div></div></a>
                            <a href="{{ route('halaman.dokumen') }}" class="megamenu-card"><div class="mc-icon bg-amber-500/15"><i class="fas fa-file-alt text-amber-400"></i></div><div><div class="mc-title">Dokumen</div><div class="mc-desc">Unduhan & template</div></div></a>
                            <a href="{{ route('halaman.galeri') }}" class="megamenu-card"><div class="mc-icon bg-pink-500/15"><i class="fas fa-images text-pink-400"></i></div><div><div class="mc-title">Galeri</div><div class="mc-desc">5K+ foto & video</div></div></a>
                            <a href="{{ route('halaman.karir.cv-builder') }}" class="megamenu-card"><div class="mc-icon bg-sky-500/15"><i class="fas fa-file-invoice text-sky-400"></i></div><div><div class="mc-title">CV Builder</div><div class="mc-desc">Buat CV pro</div></div></a>
                        </div>
                    </div>

                    {{-- Kategori: Keamanan & Informasi --}}
                    <div>
                        <div class="megamenu-section-title"><i class="fas fa-shield-alt text-red-400 text-xs"></i> Keamanan & Layanan</div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <a href="{{ route('halaman.keamanan') }}" class="megamenu-card"><div class="mc-icon bg-red-500/15"><i class="fas fa-shield-alt text-red-400"></i></div><div><div class="mc-title">Keamanan</div><div class="mc-desc">ISO 27001</div></div></a>
                            <a href="{{ route('halaman.alur-panduan') }}" class="megamenu-card"><div class="mc-icon bg-teal-500/15"><i class="fas fa-project-diagram text-teal-400"></i></div><div><div class="mc-title">Panduan</div><div class="mc-desc">Alur & SOP</div></div></a>
                            <a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="megamenu-card"><div class="mc-icon bg-lime-500/15"><i class="fas fa-question-circle text-lime-400"></i></div><div><div class="mc-title">FAQ & Bantuan</div><div class="mc-desc">Pusat bantuan</div></div></a>
                            <a href="{{ route('halaman.langganan') }}" class="megamenu-card"><div class="mc-icon bg-amber-500/15"><i class="fas fa-crown text-amber-400"></i></div><div><div class="mc-title">Langganan</div><div class="mc-desc">Paket premium</div></div></a>
                            <a href="{{ route('beranda') }}#statistik" class="megamenu-card"><div class="mc-icon bg-sky-500/15"><i class="fas fa-chart-line text-sky-400"></i></div><div><div class="mc-title">Statistik</div><div class="mc-desc">Data & analitik</div></div></a>
                            @auth<a href="{{ route('laporan.index') }}" class="megamenu-card"><div class="mc-icon bg-violet-500/15"><i class="fas fa-chart-pie text-violet-400"></i></div><div><div class="mc-title">Laporan</div><div class="mc-desc">Visualisasi data</div></div></a>@endauth
                        </div>
                    </div>

                </div>

                {{-- Menu Customizer Section --}}
                <div class="px-6 py-5 border-t border-kvt-700/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-sliders-h text-kvt-400 text-sm"></i>
                            <span class="text-white font-semibold text-sm">Kustomisasi Halaman Menu</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="resetKustomMenu()" class="text-[10px] text-gray-500 hover:text-red-400 bg-kvt-800/40 px-2.5 py-1 rounded-lg border border-kvt-700/20 transition" title="Reset ke default">
                                <i class="fas fa-undo-alt mr-1"></i>Reset
                            </button>
                            <button onclick="simpanKustomMenu()" class="text-[10px] text-white bg-kvt-500 hover:bg-kvt-400 px-3 py-1 rounded-lg transition font-semibold">
                                <i class="fas fa-save mr-1"></i>Simpan
                            </button>
                        </div>
                    </div>
                    <p class="text-gray-500 text-[11px] mb-3"><i class="fas fa-info-circle mr-1"></i> Pilih halaman (1-4) untuk setiap menu. Setiap halaman menampilkan max 5 menu di navbar.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2" id="kustomMenuGrid">
                        {{-- Filled by JS --}}
                    </div>
                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 border-t border-kvt-700/20 flex items-center justify-between">
                    <div class="text-[11px] text-gray-500 flex items-center gap-2">
                        <i class="fas fa-info-circle text-kvt-400"></i>
                        <span>Tekan <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-[10px]">ESC</kbd> untuk menutup</span>
                    </div>
                    <div class="text-[11px] text-gray-500 font-semibold">KVT Hub — Global Education</div>
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

    {{-- ==================== MEGA FOOTER v6.0 ==================== --}}
    <footer class="bg-kvt-950 border-t border-kvt-700/20 mt-20 relative overflow-hidden">
        {{-- Decorative Background --}}
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-kvt-500/3 rounded-full blur-[150px]"></div>
            <div class="absolute top-0 right-0 w-72 h-72 bg-purple-500/3 rounded-full blur-[120px]"></div>
        </div>

        {{-- Visitor Stats Bar --}}
        <div class="relative bg-gradient-to-r from-kvt-900/80 via-kvt-900/50 to-kvt-900/80 border-b border-kvt-700/20 py-3">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-6 text-xs text-gray-400">
                    <span class="flex items-center gap-1.5"><i class="fas fa-eye text-kvt-400"></i> Hari ini: <strong class="text-white" id="visitorToday">--</strong></span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-users text-green-400"></i> Online: <strong class="text-green-400" id="visitorOnline">--</strong></span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-chart-line text-yellow-400"></i> Total: <strong class="text-white" id="visitorTotal">--</strong></span>
                    <span class="flex items-center gap-1.5"><i class="fas fa-fingerprint text-purple-400"></i> Unik: <strong class="text-white" id="visitorUnik">--</strong></span>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span>
                    <span class="text-green-400 font-semibold">Sistem berjalan normal</span>
                    <span class="text-gray-600 mx-1">|</span>
                    <span class="text-gray-500">v8.0</span>
                </div>
            </div>
        </div>

        {{-- Edukasi Gratis Banner --}}
        <div class="relative bg-gradient-to-r from-green-500/5 via-kvt-500/5 to-purple-500/5 border-b border-kvt-700/10 py-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-500/20">
                        <i class="fas fa-gift text-white"></i>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-white">Edukasi Gratis untuk Semua</p>
                        <p class="text-[11px] text-gray-400">Akses 30+ program edukasi premium gratis — GitHub Pro, Figma, Azure, dan lainnya</p>
                    </div>
                </div>
                <a href="{{ route('edukasi-gratis.index') }}" class="inline-flex items-center gap-2 px-5 py-2 bg-green-600 hover:bg-green-500 text-white text-sm rounded-xl font-semibold transition hover:-translate-y-0.5 shadow-lg shadow-green-500/20">
                    <i class="fas fa-arrow-right text-xs"></i> Jelajahi Sekarang
                </a>
            </div>
        </div>

        {{-- ===== Search Bar Footer ===== --}}
        <div class="relative border-b border-kvt-700/10 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col md:flex-row items-center gap-4">
                    <div class="flex items-center gap-3 shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-2xl flex items-center justify-center shadow-xl shadow-kvt-500/20 animate-glow">
                            <span class="text-white font-black text-xl">K</span>
                        </div>
                        <div>
                            <span class="text-xl font-extrabold"><span class="text-white">KVT</span> <span class="teks-gradien">Hub</span></span>
                            <span class="block text-[10px] text-gray-500 tracking-[0.15em] font-semibold uppercase">Global Education</span>
                        </div>
                    </div>
                    <button onclick="bukaSearch()" class="flex-1 max-w-xl flex items-center gap-3 px-5 py-3 bg-kvt-900/80 border border-kvt-700/30 rounded-2xl text-gray-500 hover:border-kvt-500/40 hover:text-gray-400 transition cursor-pointer group">
                        <i class="fas fa-search text-sm group-hover:text-kvt-400 transition"></i>
                        <span class="text-sm">Cari Artikel / Panduan / Menu...</span>
                        <kbd class="ml-auto text-[10px] bg-kvt-800 px-2 py-0.5 rounded-lg border border-kvt-700 text-gray-500">Ctrl+K</kbd>
                    </button>
                    {{-- Social Links --}}
                    <div class="flex gap-2 shrink-0">
                        <a href="https://www.youtube.com/@Kuro-MYTHS" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-red-500 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-youtube text-base"></i></a>
                        <a href="https://www.instagram.com/mythskuro/" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-gradient-to-br hover:from-purple-500 hover:to-pink-500 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-instagram text-base"></i></a>
                        <a href="https://github.com/kuro-myths" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-700 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-github text-base"></i></a>
                        <a href="https://www.linkedin.com/in/kuro-myths/" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-blue-600 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-linkedin text-base"></i></a>
                        <a href="https://discord.gg/" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-indigo-500 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-discord text-base"></i></a>
                        <a href="https://t.me/" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-sky-500 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-telegram text-base"></i></a>
                        <a href="https://x.com/" target="_blank" class="group w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-gray-800 transition-all duration-300 hover:-translate-y-1"><i class="fab fa-x-twitter text-base"></i></a>
                    </div>
                </div>
            </div>
        </div>

        {{-- ===== MAIN FOOTER LINKS (Multi Column like DomaiNesia) ===== --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12">
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-7 gap-8 lg:gap-6">

                {{-- Col 1: Jenjang --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Jenjang</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('halaman.pendidikan-dasar.tk-paud') }}" class="text-gray-400 hover:text-kvt-400 transition">TK / PAUD</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.sd-mi') }}" class="text-gray-400 hover:text-kvt-400 transition">SD / MI</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.smp-mts') }}" class="text-gray-400 hover:text-kvt-400 transition">SMP / MTs</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.sma-ma') }}" class="text-gray-400 hover:text-kvt-400 transition">SMA / MA</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.smk-teknologi') }}" class="text-gray-400 hover:text-kvt-400 transition">SMK Teknologi</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.smk-bisnis') }}" class="text-gray-400 hover:text-kvt-400 transition">SMK Bisnis</a></li>
                        <li><a href="{{ route('halaman.pendidikan-dasar.smk-kesehatan') }}" class="text-gray-400 hover:text-kvt-400 transition">SMK Kesehatan</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.diploma') }}" class="text-gray-400 hover:text-kvt-400 transition">Diploma (D1-D4)</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.sarjana') }}" class="text-gray-400 hover:text-kvt-400 transition">Sarjana (S1)</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.magister') }}" class="text-gray-400 hover:text-kvt-400 transition">Magister (S2)</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.doktoral') }}" class="text-gray-400 hover:text-kvt-400 transition">Doktoral (S3)</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.post-doktoral') }}" class="text-gray-400 hover:text-kvt-400 transition">Post-Doctoral</a></li>
                        <li><a href="{{ route('halaman.pendidikan-tinggi.profesi') }}" class="text-gray-400 hover:text-kvt-400 transition">Profesi</a></li>
                    </ul>
                </div>

                {{-- Col 2: Akademik --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Akademik</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('halaman.kurikulum') }}" class="text-gray-400 hover:text-kvt-400 transition">Kurikulum</a></li>
                        <li><a href="{{ route('halaman.sertifikasi') }}" class="text-gray-400 hover:text-kvt-400 transition">Sertifikasi</a></li>
                        <li><a href="{{ route('halaman.penjamin-mutu') }}" class="text-gray-400 hover:text-kvt-400 transition">Penjamin Mutu</a></li>
                        <li><a href="{{ route('halaman.alur-panduan') }}" class="text-gray-400 hover:text-kvt-400 transition">Alur & Panduan</a></li>
                        <li><a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="text-gray-400 hover:text-kvt-400 transition">FAQ & Bantuan</a></li>
                        <li><a href="{{ route('halaman.dokumen') }}" class="text-gray-400 hover:text-kvt-400 transition">Dokumen</a></li>
                    </ul>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Edukasi Gratis</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('edukasi-gratis.index') }}" class="text-green-400/80 hover:text-green-400 transition">Semua Program</a></li>
                        <li><a href="{{ route('edukasi-gratis.index', ['kategori' => 'tools']) }}" class="text-gray-400 hover:text-kvt-400 transition">Developer Tools</a></li>
                        <li><a href="{{ route('edukasi-gratis.index', ['kategori' => 'cloud']) }}" class="text-gray-400 hover:text-kvt-400 transition">Cloud & Hosting</a></li>
                        <li><a href="{{ route('edukasi-gratis.index', ['kategori' => 'design']) }}" class="text-gray-400 hover:text-kvt-400 transition">Desain & Kreativitas</a></li>
                        <li><a href="{{ route('edukasi-gratis.index', ['kategori' => 'pendidikan']) }}" class="text-gray-400 hover:text-kvt-400 transition">Platform Pendidikan</a></li>
                    </ul>
                </div>

                {{-- Col 3: Platform --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Platform</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-kvt-400 transition">Beranda</a></li>
                        <li><a href="{{ route('halaman.platform') }}" class="text-gray-400 hover:text-kvt-400 transition">Fitur Platform</a></li>
                        <li><a href="{{ route('halaman.jenjang') }}" class="text-gray-400 hover:text-kvt-400 transition">Jenjang Pendidikan</a></li>
                        <li><a href="{{ route('halaman.langganan') }}" class="text-gray-400 hover:text-kvt-400 transition">Langganan Premium</a></li>
                        <li><a href="{{ route('halaman.sumber-daya') }}" class="text-gray-400 hover:text-kvt-400 transition">Sumber Daya</a></li>
                        <li><a href="{{ route('halaman.media') }}" class="text-gray-400 hover:text-kvt-400 transition">Media & Galeri</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-kvt-400 transition">Berita</a></li>
                    </ul>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Pengguna</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('masuk') }}" class="text-gray-400 hover:text-kvt-400 transition">Masuk</a></li>
                        <li><a href="{{ route('daftar') }}" class="text-gray-400 hover:text-kvt-400 transition">Daftar Akun</a></li>
                        @auth
                        <li><a href="{{ route('dasbor') }}" class="text-gray-400 hover:text-kvt-400 transition">Dasbor</a></li>
                        <li><a href="{{ route('kelas.index') }}" class="text-gray-400 hover:text-kvt-400 transition">Kelas Saya</a></li>
                        <li><a href="{{ route('laporan.index') }}" class="text-gray-400 hover:text-kvt-400 transition">Laporan Saya</a></li>
                        @endauth
                    </ul>
                </div>

                {{-- Col 4: Riset & Karir --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Riset & Karir</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('halaman.riset') }}" class="text-gray-400 hover:text-kvt-400 transition">Riset & Inovasi</a></li>
                        <li><a href="{{ route('halaman.riset.kolaborasi') }}" class="text-gray-400 hover:text-kvt-400 transition">Riset Kolaborasi</a></li>
                        <li><a href="{{ route('halaman.karir') }}" class="text-gray-400 hover:text-kvt-400 transition">Karir & Industri</a></li>
                        <li><a href="{{ route('halaman.karir.lowongan') }}" class="text-gray-400 hover:text-kvt-400 transition">Lowongan Kerja</a></li>
                        <li><a href="{{ route('halaman.karir.cv-builder') }}" class="text-gray-400 hover:text-kvt-400 transition">CV Builder</a></li>
                        <li><a href="{{ route('halaman.komunitas') }}" class="text-gray-400 hover:text-kvt-400 transition">Komunitas</a></li>
                    </ul>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Kerja Sama</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('kerja-sama.index') }}" class="text-gray-400 hover:text-kvt-400 transition">Semua Mitra</a></li>
                        <li><a href="{{ route('sponsor') }}" class="text-gray-400 hover:text-kvt-400 transition">Sponsor & Mitra</a></li>
                    </ul>
                </div>

                {{-- Col 5: Keamanan --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Keamanan</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('halaman.keamanan') }}" class="text-gray-400 hover:text-kvt-400 transition">Kebijakan Keamanan</a></li>
                        <li><a href="{{ route('halaman.keamanan') }}#enkripsi" class="text-gray-400 hover:text-kvt-400 transition">Enkripsi AES-256</a></li>
                        <li><a href="{{ route('halaman.keamanan') }}#iso" class="text-gray-400 hover:text-kvt-400 transition">Standar ISO 27001</a></li>
                        <li><a href="{{ route('halaman.keamanan') }}#backup" class="text-gray-400 hover:text-kvt-400 transition">Backup & Recovery</a></li>
                        <li><a href="{{ route('halaman.keamanan') }}#privasi" class="text-gray-400 hover:text-kvt-400 transition">Kebijakan Privasi</a></li>
                    </ul>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Layanan</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('halaman.langganan') }}" class="text-gray-400 hover:text-kvt-400 transition">Paket Langganan</a></li>
                        <li><a href="{{ route('halaman.sertifikasi') }}" class="text-gray-400 hover:text-kvt-400 transition">Penerbitan Sertifikat</a></li>
                        <li><a href="{{ route('halaman.karir.cv-builder') }}" class="text-gray-400 hover:text-kvt-400 transition">CV Builder</a></li>
                    </ul>
                </div>

                {{-- Col 6: Perusahaan --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Perusahaan</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-kvt-400 transition">Tentang Kami</a></li>
                        <li><a href="{{ route('tentang') }}#visi" class="text-gray-400 hover:text-kvt-400 transition">Visi & Misi</a></li>
                        <li><a href="{{ route('tentang') }}#tim" class="text-gray-400 hover:text-kvt-400 transition">Tim Kami</a></li>
                        <li><a href="{{ route('tentang') }}#kontak" class="text-gray-400 hover:text-kvt-400 transition">Kontak</a></li>
                        <li><a href="{{ route('lisensi') }}" class="text-gray-400 hover:text-kvt-400 transition">Lisensi</a></li>
                        <li><a href="{{ route('halaman.karir.lowongan') }}" class="text-gray-400 hover:text-kvt-400 transition">Karir di KVT</a></li>
                    </ul>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Informasi</h4>
                    <ul class="space-y-2.5 text-[13px]">
                        <li><a href="{{ route('beranda') }}#statistik" class="text-gray-400 hover:text-kvt-400 transition">Statistik</a></li>
                        <li><a href="{{ route('berita.index') }}" class="text-gray-400 hover:text-kvt-400 transition">Blog & Berita</a></li>
                        <li><a href="{{ route('halaman.alur-panduan') }}" class="text-gray-400 hover:text-kvt-400 transition">Panduan</a></li>
                        <li><a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="text-gray-400 hover:text-kvt-400 transition">FAQ</a></li>
                    </ul>
                </div>

                {{-- Col 7: Info & Kontak --}}
                <div>
                    <h4 class="text-white font-bold mb-4 text-[13px]">Kantor</h4>
                    <div class="space-y-3 text-[13px] text-gray-400">
                        <p class="font-semibold text-white">KVT Hub Foundation</p>
                        <p>Kampus Virtual Terpadu,<br>Jl. Pendidikan No. 1<br>Indonesia</p>
                    </div>

                    <h4 class="text-white font-bold mb-3 mt-6 text-[13px]">Jam Operasional</h4>
                    <ul class="space-y-2 text-[13px] text-gray-400">
                        <li class="flex items-center gap-2"><i class="fas fa-headset text-kvt-400 text-[11px] w-4"></i> 24/7 Online Support</li>
                        <li class="flex items-center gap-2"><i class="fas fa-envelope text-kvt-400 text-[11px] w-4"></i> support@kvthub.id</li>
                    </ul>

                    {{-- Kotak Saran --}}
                    <div class="mt-5 bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4">
                        <h5 class="text-xs font-bold text-white mb-2 flex items-center gap-1.5"><i class="fas fa-comment-dots text-kvt-400 text-[10px]"></i>Kotak Saran</h5>
                        <form onsubmit="kirimSaran(event)">
                            <textarea id="saranInput" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-xs text-white placeholder-gray-500 outline-none focus:border-kvt-500 resize-none transition" placeholder="Tulis saran Anda..."></textarea>
                            <button type="submit" class="mt-2 w-full text-[11px] bg-kvt-600 hover:bg-kvt-500 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-paper-plane mr-1"></i>Kirim</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

        {{-- ===== Standar & Flag Counter Row ===== --}}
        <div class="relative border-t border-kvt-700/10 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Standar & Sertifikasi --}}
                    <div>
                        <h4 class="text-white font-bold mb-4 text-sm flex items-center gap-2"><i class="fas fa-shield-alt text-green-400"></i> Standar & Teknologi</h4>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-green-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-shield-alt text-green-400 text-[11px]"></i></div>
                                <span>ISO 27001</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-blue-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-sitemap text-blue-400 text-[11px]"></i></div>
                                <span>COBIT 2019</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-purple-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-check-double text-purple-400 text-[11px]"></i></div>
                                <span>QA/QC</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-red-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-lock text-red-400 text-[11px]"></i></div>
                                <span>AES-256</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-yellow-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-certificate text-yellow-400 text-[11px]"></i></div>
                                <span>SSL/TLS</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-gray-400 bg-kvt-800/30 rounded-lg px-3 py-2.5 border border-kvt-700/10">
                                <div class="w-7 h-7 bg-cyan-500/10 rounded-lg flex items-center justify-center shrink-0"><i class="fas fa-database text-cyan-400 text-[11px]"></i></div>
                                <span>GDPR Ready</span>
                            </div>
                        </div>
                    </div>
                    {{-- Flag Counter --}}
                    <div>
                        <div class="bg-gradient-to-br from-[#1a2744] to-[#162038] rounded-2xl p-5 border border-gray-600/20 shadow-xl">
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
            </div>
        </div>

        {{-- Tech Stack Bar --}}
        <div class="relative border-t border-kvt-700/10 bg-gradient-to-r from-kvt-900/50 via-kvt-950 to-kvt-900/50 py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <p class="text-xs text-gray-500 text-center mb-4 tracking-wider uppercase font-semibold">Powered by</p>
                <div class="flex flex-wrap items-center justify-center gap-3">
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fas fa-database text-blue-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">PostgreSQL</span>
                    </div>
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fab fa-laravel text-red-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">Laravel v{{ app()->version() }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fab fa-php text-indigo-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">PHP v{{ PHP_VERSION }}</span>
                    </div>
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fab fa-js text-yellow-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">Tailwind CSS</span>
                    </div>
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fas fa-shield-alt text-green-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">AES-256 Encrypted</span>
                    </div>
                    <div class="flex items-center gap-2 bg-kvt-800/30 hover:bg-kvt-800/50 rounded-xl px-4 py-2 border border-kvt-700/10 hover:border-kvt-700/30 transition group">
                        <i class="fas fa-cloud text-sky-400 text-sm group-hover:scale-110 transition-transform"></i>
                        <span class="text-xs text-gray-400 group-hover:text-white transition">Cloud Hosted</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="relative border-t border-kvt-700/10 bg-kvt-950 py-5">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <div class="flex items-center gap-3">
                        <div class="w-7 h-7 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-black text-xs">K</span>
                        </div>
                        <p class="text-xs text-gray-500">&copy; {{ date('Y') }} <span class="text-gray-400 font-semibold">KVT Hub</span> — Global Education & Research Ecosystem. Seluruh hak dilindungi.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 text-xs text-gray-600">
                        <a href="{{ route('tentang') }}" class="hover:text-gray-400 transition">Tentang</a>
                        <span>·</span>
                        <a href="{{ route('lisensi') }}" class="hover:text-gray-400 transition">Lisensi</a>
                        <span>·</span>
                        <a href="{{ route('halaman.keamanan') }}" class="hover:text-gray-400 transition">Keamanan</a>
                        <span>·</span>
                        <a href="{{ route('halaman.keamanan') }}#privasi" class="hover:text-gray-400 transition">Privasi</a>
                        <span>·</span>
                        <a href="{{ route('halaman.alur-panduan.faq-bantuan') }}" class="hover:text-gray-400 transition">FAQ</a>
                        <span>·</span>
                        <a href="{{ route('tentang') }}#kontak" class="hover:text-gray-400 transition">Kontak</a>
                        <span class="text-gray-700 ml-2">v8.0</span>
                    </div>
                </div>
                <p class="text-center text-[11px] text-gray-700 mt-3">KVT Hub merupakan platform edukasi digital yang dikembangkan oleh KVT Hub Foundation</p>
            </div>
        </div>
    </footer>

    {{-- ==================== AI VTUBER ASSISTANT ==================== --}}
    <div id="vtuberWidget" class="fixed bottom-6 left-6 z-[80] transition-all duration-500" style="transform: translateY(0)">
        {{-- VTuber Character Display --}}
        <div id="vtuberCharacter" class="relative cursor-pointer group" onclick="toggleVtuberChat()">
            {{-- 3D Model Container (Live2D/VRM container) --}}
            <div id="vtuberModelContainer" class="w-[100px] h-[120px] relative">
                {{-- Fallback: Animated Kuro Avatar --}}
                <div id="vtuberFallbackAvatar" class="w-full h-full flex items-center justify-center">
                    <div class="relative">
                        {{-- Glow ring --}}
                        <div class="absolute -inset-2 bg-gradient-to-r from-kvt-400 via-ungu-500 to-pink-500 rounded-full opacity-30 animate-pulse blur-md"></div>
                        {{-- Avatar --}}
                        <div class="relative w-20 h-20 rounded-full overflow-hidden border-3 border-kvt-400/50 shadow-xl shadow-kvt-500/30 group-hover:border-kvt-400 group-hover:shadow-kvt-500/50 transition-all duration-300 group-hover:scale-110">
                            <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro AI" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-kvt-500 to-ungu-600 flex items-center justify-center\'><i class=\'fas fa-robot text-white text-2xl\'></i></div>'">
                        </div>
                        {{-- Online indicator --}}
                        <div class="absolute -bottom-0.5 -right-0.5 w-5 h-5 bg-green-500 rounded-full border-2 border-kvt-950 flex items-center justify-center">
                            <div class="w-2 h-2 bg-white rounded-full animate-pulse"></div>
                        </div>
                        {{-- AI badge --}}
                        <div class="absolute -top-1 -right-1 bg-gradient-to-r from-kvt-500 to-ungu-500 text-[8px] text-white font-bold px-1.5 py-0.5 rounded-md shadow-lg">
                            AI
                        </div>
                    </div>
                </div>
            </div>
            {{-- Tooltip --}}
            <div class="absolute left-full ml-3 top-1/2 -translate-y-1/2 bg-kvt-900/95 backdrop-blur-xl border border-kvt-700/30 rounded-xl px-3 py-2 whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity pointer-events-none shadow-xl">
                <p class="text-xs text-white font-semibold">Kuro AI Assistant</p>
                <p class="text-[10px] text-gray-400">Klik untuk chat</p>
                <div class="absolute right-full top-1/2 -translate-y-1/2 w-0 h-0 border-t-4 border-b-4 border-r-4 border-transparent border-r-kvt-700/30"></div>
            </div>
        </div>

        {{-- Chat Panel --}}
        <div id="vtuberChatPanel" class="hidden absolute bottom-0 left-0 w-[380px] max-h-[520px] bg-kvt-950/98 backdrop-blur-2xl border border-kvt-700/30 rounded-2xl shadow-2xl shadow-black/50 overflow-hidden" style="transform-origin: bottom left;">
            {{-- Chat Header --}}
            <div class="bg-gradient-to-r from-kvt-600 via-ungu-600 to-kvt-700 p-4 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl overflow-hidden border-2 border-white/20 shrink-0">
                    <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center\'><i class=\'fas fa-robot text-white\'></i></div>'">
                </div>
                <div class="flex-1">
                    <h4 class="text-white font-bold text-sm flex items-center gap-2">
                        Kuro AI
                        <span class="text-[9px] bg-white/20 px-1.5 py-0.5 rounded-md font-semibold">VTuber</span>
                    </h4>
                    <p class="text-[11px] text-white/70 flex items-center gap-1">
                        <span class="w-1.5 h-1.5 bg-green-400 rounded-full inline-block"></span> Online — Siap membantu
                    </p>
                </div>
                <div class="flex items-center gap-1">
                    <button onclick="toggleVtuberFullscreen()" class="w-8 h-8 rounded-lg flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition" title="Mode 3D">
                        <i class="fas fa-cube text-sm"></i>
                    </button>
                    <button onclick="toggleVtuberChat()" class="w-8 h-8 rounded-lg flex items-center justify-center text-white/60 hover:text-white hover:bg-white/10 transition" title="Tutup">
                        <i class="fas fa-times text-sm"></i>
                    </button>
                </div>
            </div>

            {{-- Chat Messages --}}
            <div id="vtuberMessages" class="h-[320px] overflow-y-auto p-4 space-y-3 scroll-smooth">
                {{-- Welcome Message --}}
                <div class="flex gap-2.5">
                    <div class="w-7 h-7 rounded-lg overflow-hidden shrink-0 mt-0.5 bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center">
                        <i class="fas fa-robot text-white text-[10px]"></i>
                    </div>
                    <div class="flex-1">
                        <div class="bg-kvt-800/60 border border-kvt-700/20 rounded-xl rounded-tl-none px-3.5 py-2.5 max-w-[280px]">
                            <p class="text-sm text-gray-200">Hai! Aku <strong class="text-kvt-400">Kuro</strong>, asisten AI KVT Hub. 🐱</p>
                            <p class="text-sm text-gray-300 mt-1.5">Aku bisa bantu navigasi platform, jelaskan fitur, jawab pertanyaan akademik, dan banyak lagi!</p>
                        </div>
                        <p class="text-[10px] text-gray-600 mt-1 ml-1">Kuro AI · Baru saja</p>
                    </div>
                </div>

                {{-- Quick Actions --}}
                <div class="flex flex-wrap gap-1.5 ml-9">
                    <button onclick="vtuberQuickAction('Bagaimana cara mendaftar?')" class="text-[11px] bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-400 hover:text-kvt-300 border border-kvt-700/20 px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-user-plus mr-1"></i> Cara Mendaftar
                    </button>
                    <button onclick="vtuberQuickAction('Jelaskan fitur platform')" class="text-[11px] bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-400 hover:text-kvt-300 border border-kvt-700/20 px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-cubes mr-1"></i> Fitur Platform
                    </button>
                    <button onclick="vtuberQuickAction('Jenjang pendidikan apa saja?')" class="text-[11px] bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-400 hover:text-kvt-300 border border-kvt-700/20 px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-graduation-cap mr-1"></i> Jenjang
                    </button>
                    <button onclick="vtuberQuickAction('Ada kursus gratis apa?')" class="text-[11px] bg-kvt-800/50 hover:bg-kvt-700/50 text-green-400 hover:text-green-300 border border-green-700/20 px-3 py-1.5 rounded-lg transition">
                        <i class="fas fa-gift mr-1"></i> Edukasi Gratis
                    </button>
                </div>
            </div>

            {{-- Chat Input --}}
            <div class="p-3 border-t border-kvt-700/20 bg-kvt-900/50">
                <div class="flex items-center gap-2">
                    <div class="flex-1 relative">
                        <input type="text" id="vtuberInput" placeholder="Tanya Kuro AI..." class="w-full bg-kvt-800/60 border border-kvt-700/30 text-white text-sm rounded-xl px-4 py-2.5 outline-none focus:border-kvt-500/50 placeholder-gray-500 transition pr-10" onkeypress="if(event.key==='Enter')kirimPesanVtuber()" autocomplete="off">
                        <button onclick="toggleVoiceInput()" class="absolute right-2 top-1/2 -translate-y-1/2 text-gray-500 hover:text-kvt-400 transition p-1" title="Input Suara">
                            <i class="fas fa-microphone text-xs"></i>
                        </button>
                    </div>
                    <button onclick="kirimPesanVtuber()" class="w-10 h-10 bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 rounded-xl flex items-center justify-center text-white transition shadow-lg shadow-kvt-500/20 shrink-0">
                        <i class="fas fa-paper-plane text-sm"></i>
                    </button>
                </div>
                <div class="flex items-center justify-between mt-2">
                    <p class="text-[10px] text-gray-600 flex items-center gap-1">
                        <i class="fas fa-shield-alt text-[8px]"></i> Percakapan tidak disimpan
                    </p>
                    <p class="text-[10px] text-gray-600 font-semibold">Kuro AI v1.0</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== VTUBER 3D MODEL FULLSCREEN ==================== --}}
    <div id="vtuberFullscreenOverlay" class="fixed inset-0 z-[200] hidden bg-kvt-950/95 backdrop-blur-xl">
        <div class="max-w-5xl mx-auto h-full flex flex-col p-6">
            {{-- Header --}}
            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-cube text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-lg">Kuro — Mode 3D Interaktif</h3>
                        <p class="text-gray-500 text-xs">VTuber AI Assistant · Live2D / VRM Model</p>
                    </div>
                </div>
                <button onclick="toggleVtuberFullscreen()" class="w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                    <i class="fas fa-times text-lg"></i>
                </button>
            </div>

            {{-- 3D Model Viewport --}}
            <div class="flex-1 bg-kvt-900/50 border border-kvt-700/20 rounded-2xl overflow-hidden relative" id="vtuber3DViewport">
                {{-- Three.js / Live2D / VRM model akan di-render di sini --}}
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="text-center">
                        <div class="w-24 h-24 bg-gradient-to-br from-kvt-500/20 to-ungu-500/20 rounded-3xl flex items-center justify-center mx-auto mb-4 border border-kvt-700/20">
                            <img src="{{ asset('gambar/kuro/kuro.png') }}" alt="Kuro" class="w-16 h-16 rounded-xl object-cover" onerror="this.parentElement.innerHTML='<i class=\'fas fa-robot text-kvt-400 text-4xl\'></i>'">
                        </div>
                        <h4 class="text-white font-bold text-lg mb-2">Model 3D Kuro</h4>
                        <p class="text-gray-400 text-sm mb-4 max-w-md">Tempat untuk model 3D karakter VTuber.<br>Mendukung format <strong class="text-kvt-400">Live2D</strong>, <strong class="text-purple-400">VRM</strong>, dan <strong class="text-pink-400">GLB/GLTF</strong>.</p>
                        <div class="flex flex-wrap justify-center gap-2">
                            <span class="text-[11px] bg-kvt-800/60 text-kvt-400 px-3 py-1.5 rounded-lg border border-kvt-700/20"><i class="fas fa-cube mr-1"></i> Three.js</span>
                            <span class="text-[11px] bg-kvt-800/60 text-purple-400 px-3 py-1.5 rounded-lg border border-kvt-700/20"><i class="fas fa-user mr-1"></i> @pixiv/three-vrm</span>
                            <span class="text-[11px] bg-kvt-800/60 text-pink-400 px-3 py-1.5 rounded-lg border border-kvt-700/20"><i class="fas fa-paint-brush mr-1"></i> Live2D Cubism</span>
                        </div>
                        <div class="mt-6 bg-kvt-800/40 border border-kvt-700/20 rounded-xl p-4 max-w-lg mx-auto text-left">
                            <p class="text-[11px] text-kvt-400 font-bold mb-2"><i class="fas fa-info-circle mr-1"></i> Cara Menambahkan Model 3D:</p>
                            <ol class="text-[11px] text-gray-400 space-y-1.5 list-decimal list-inside">
                                <li>Siapkan file model: <code class="text-white bg-kvt-900 px-1 rounded">.vrm</code>, <code class="text-white bg-kvt-900 px-1 rounded">.glb</code>, atau <code class="text-white bg-kvt-900 px-1 rounded">.moc3</code></li>
                                <li>Letakkan di <code class="text-white bg-kvt-900 px-1 rounded">public/models/vtuber/</code></li>
                                <li>Install: <code class="text-white bg-kvt-900 px-1 rounded">npm i three @pixiv/three-vrm</code></li>
                                <li>Aktifkan renderer di <code class="text-white bg-kvt-900 px-1 rounded">vtuber3DViewport</code></li>
                                <li>Model akan otomatis ter-load dan interaktif</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Controls --}}
            <div class="flex items-center justify-between mt-4 bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-3">
                <div class="flex items-center gap-2">
                    <button class="text-xs bg-kvt-800/60 hover:bg-kvt-700/50 text-gray-400 hover:text-white border border-kvt-700/20 px-3 py-2 rounded-lg transition"><i class="fas fa-redo mr-1"></i> Reset Pose</button>
                    <button class="text-xs bg-kvt-800/60 hover:bg-kvt-700/50 text-gray-400 hover:text-white border border-kvt-700/20 px-3 py-2 rounded-lg transition"><i class="fas fa-camera mr-1"></i> Screenshot</button>
                    <button class="text-xs bg-kvt-800/60 hover:bg-kvt-700/50 text-gray-400 hover:text-white border border-kvt-700/20 px-3 py-2 rounded-lg transition"><i class="fas fa-cog mr-1"></i> Settings</button>
                </div>
                <div class="flex items-center gap-3 text-[11px] text-gray-500">
                    <span><i class="fas fa-mouse mr-1"></i> Drag: Rotasi</span>
                    <span><i class="fas fa-search-plus mr-1"></i> Scroll: Zoom</span>
                    <span><i class="fas fa-arrows-alt mr-1"></i> Shift+Drag: Pan</span>
                </div>
            </div>
        </div>
    </div>

    {{-- ==================== SETTINGS TOGGLE BUTTON ==================== --}}
    <button class="settings-toggle" onclick="toggleSettings()" title="Pengaturan Tampilan" id="settingsBtn">
        <i class="fas fa-cog text-white text-xl" id="settingsIcon"></i>
    </button>

    {{-- ==================== SETTINGS OVERLAY ==================== --}}
    <div class="settings-overlay" id="settingsOverlay" onclick="toggleSettings()"></div>

    {{-- ==================== SETTINGS SIDEBAR ==================== --}}
    <div class="settings-panel" id="settingsPanel">
        {{-- Header --}}
        <div class="p-5 border-b border-kvt-700/20">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-xl flex items-center justify-center">
                        <i class="fas fa-sliders-h text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-white font-bold text-sm">Pengaturan</h3>
                        <p class="text-[10px] text-gray-500">Kustomisasi & Alat</p>
                    </div>
                </div>
                <button onclick="toggleSettings()" class="text-gray-500 hover:text-white transition p-2 rounded-lg hover:bg-kvt-800/50">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        {{-- Grid Navigation --}}
        <div class="p-4 border-b border-kvt-700/20">
            <div class="grid grid-cols-5 gap-2" id="settingsGrid">
                <button onclick="bukaPanelSetting('efek')" class="stg-box active" data-panel="efek" title="Efek Visual">
                    <div class="stg-box-icon bg-blue-500/15"><i class="fas fa-sparkles text-blue-400"></i></div>
                    <span class="stg-box-label">Efek</span>
                </button>
                <button onclick="bukaPanelSetting('led')" class="stg-box" data-panel="led" title="LED Panel">
                    <div class="stg-box-icon bg-green-500/15"><i class="fas fa-tv text-green-400"></i></div>
                    <span class="stg-box-label">LED</span>
                </button>
                <button onclick="bukaPanelSetting('tema')" class="stg-box" data-panel="tema" title="Tema & Warna">
                    <div class="stg-box-icon bg-purple-500/15"><i class="fas fa-palette text-purple-400"></i></div>
                    <span class="stg-box-label">Tema</span>
                </button>
                <button onclick="bukaPanelSetting('bahasa')" class="stg-box" data-panel="bahasa" title="Bahasa">
                    <div class="stg-box-icon bg-cyan-500/15"><i class="fas fa-language text-cyan-400"></i></div>
                    <span class="stg-box-label">Bahasa</span>
                </button>
                <button onclick="bukaPanelSetting('musik')" class="stg-box" data-panel="musik" title="Musik">
                    <div class="stg-box-icon bg-emerald-500/15"><i class="fas fa-music text-emerald-400"></i></div>
                    <span class="stg-box-label">Musik</span>
                </button>
                <button onclick="bukaPanelSetting('screenshot')" class="stg-box" data-panel="screenshot" title="Foto Layar">
                    <div class="stg-box-icon bg-rose-500/15"><i class="fas fa-camera-retro text-rose-400"></i></div>
                    <span class="stg-box-label">Layar</span>
                </button>
                <button onclick="bukaPanelSetting('kamera')" class="stg-box" data-panel="kamera" title="Kamera & Dokumen">
                    <div class="stg-box-icon bg-amber-500/15"><i class="fas fa-camera text-amber-400"></i></div>
                    <span class="stg-box-label">Kamera</span>
                </button>
                <button onclick="bukaPanelSetting('rekaman')" class="stg-box" data-panel="rekaman" title="Rekam Layar">
                    <div class="stg-box-icon bg-red-500/15"><i class="fas fa-record-vinyl text-red-400"></i></div>
                    <span class="stg-box-label">Rekam</span>
                </button>
                <button onclick="bukaPanelSetting('sketsa')" class="stg-box" data-panel="sketsa" title="Mode Sketsa">
                    <div class="stg-box-icon bg-yellow-500/15"><i class="fas fa-pen-fancy text-yellow-400"></i></div>
                    <span class="stg-box-label">Sketsa</span>
                </button>
                <button onclick="bukaPanelSetting('ai')" class="stg-box" data-panel="ai" title="AI Assistant">
                    <div class="stg-box-icon bg-pink-500/15"><i class="fas fa-robot text-pink-400"></i></div>
                    <span class="stg-box-label">AI</span>
                </button>
            </div>
        </div>

        {{-- Panel Content Area --}}
        <div class="flex-1 overflow-y-auto" id="settingsPanelContent" style="max-height:calc(100vh - 220px)">

            {{-- ===== PANEL: EFEK VISUAL ===== --}}
            <div class="stg-panel p-5 space-y-3" id="panel-efek">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-sparkles text-blue-400"></i>Efek Visual</h4>
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

            {{-- ===== PANEL: LED ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-led">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-tv text-green-400"></i>LED Panel Info</h4>
                <div class="space-y-2.5">
                    <div class="setting-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-tv text-green-400 text-sm"></i></div>
                            <div><p class="text-sm text-white font-medium">LED Panel</p><p class="text-[10px] text-gray-500">Tampilan LED dot matrix</p></div>
                        </div>
                        <div class="toggle-switch active" id="toggleLED" onclick="toggleLEDPanel()"></div>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Mode Tampilan</p>
                        <div class="space-y-1.5">
                            <button onclick="setLEDMode('shalat')" class="led-mode-btn w-full setting-item justify-start gap-3 text-left" data-mode="shalat">
                                <i class="fas fa-mosque text-green-400 text-xs w-4 text-center"></i>
                                <span class="text-xs text-white font-medium">Jadwal Shalat</span>
                            </button>
                            <button onclick="setLEDMode('waktu_dunia')" class="led-mode-btn w-full setting-item justify-start gap-3 text-left" data-mode="waktu_dunia">
                                <i class="fas fa-globe text-cyan-400 text-xs w-4 text-center"></i>
                                <span class="text-xs text-white font-medium">Waktu Dunia</span>
                            </button>
                            <button onclick="setLEDMode('motivasi')" class="led-mode-btn w-full setting-item justify-start gap-3 text-left" data-mode="motivasi">
                                <i class="fas fa-quote-right text-yellow-400 text-xs w-4 text-center"></i>
                                <span class="text-xs text-white font-medium">Motivasi Harian</span>
                            </button>
                            <button onclick="setLEDMode('info')" class="led-mode-btn w-full setting-item justify-start gap-3 text-left" data-mode="info">
                                <i class="fas fa-info-circle text-kvt-400 text-xs w-4 text-center"></i>
                                <span class="text-xs text-white font-medium">Info Platform</span>
                            </button>
                            <button onclick="setLEDMode('custom')" class="led-mode-btn w-full setting-item justify-start gap-3 text-left" data-mode="custom">
                                <i class="fas fa-edit text-pink-400 text-xs w-4 text-center"></i>
                                <span class="text-xs text-white font-medium">Teks Kustom</span>
                            </button>
                        </div>
                        <div id="ledCustomInput" class="mt-2 hidden">
                            <input type="text" id="ledCustomText" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-sm text-green-400 placeholder-gray-600 outline-none focus:border-green-500" placeholder="Ketik teks kustom..." style="font-family:'Press Start 2P',monospace;font-size:10px" maxlength="200">
                            <button onclick="applyCustomLED()" class="mt-1.5 w-full text-xs bg-green-600 hover:bg-green-500 text-white px-3 py-1.5 rounded-lg transition font-semibold"><i class="fas fa-check mr-1"></i>Terapkan</button>
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Kecepatan Scroll</p>
                        <input type="range" min="10" max="80" value="40" class="w-full h-1 accent-green-500 cursor-pointer" id="ledSpeed" oninput="setLEDSpeed(this.value)" style="background:linear-gradient(to right,#00ff66 40%,#1e293b 40%)">
                        <div class="flex justify-between text-[10px] text-gray-600 mt-1"><span>Lambat</span><span>Cepat</span></div>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: TEMA ===== --}}
            <div class="stg-panel p-5 space-y-4 hidden" id="panel-tema">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-palette text-purple-400"></i>Tema & Warna</h4>
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Warna Aksen</p>
                    <div class="grid grid-cols-6 gap-2">
                        <button onclick="gantiAksen('kvt')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-kvt-400 to-kvt-600 ring-2 ring-kvt-400 ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Biru"></button>
                        <button onclick="gantiAksen('ungu')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-purple-400 to-purple-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Ungu"></button>
                        <button onclick="gantiAksen('hijau')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-emerald-400 to-emerald-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Hijau"></button>
                        <button onclick="gantiAksen('merah')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-rose-400 to-rose-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Merah"></button>
                        <button onclick="gantiAksen('emas')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-amber-400 to-amber-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Emas"></button>
                        <button onclick="gantiAksen('cyan')" class="w-10 h-10 rounded-xl bg-gradient-to-br from-cyan-400 to-cyan-600 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110" title="Cyan"></button>
                    </div>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Background</p>
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
            </div>

            {{-- ===== PANEL: BAHASA ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-bahasa">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-language text-cyan-400"></i>Bahasa / Language</h4>
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

            {{-- ===== PANEL: MUSIK ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-musik">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-music text-emerald-400"></i>Musik Ambient</h4>
                <div class="setting-item flex-col items-start gap-3">
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center shrink-0" id="musikAlbumArt">
                            <i class="fas fa-headphones text-white" id="musikIcon"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-white font-semibold truncate" id="musikJudul">Lo-Fi Study Beats</p>
                            <p class="text-[10px] text-gray-500 truncate" id="musikArtis">KVT Radio</p>
                        </div>
                        <div class="flex items-center gap-1.5">
                            <button onclick="musikPrev()" class="w-7 h-7 rounded-lg bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-400 hover:text-white flex items-center justify-center transition text-[10px]"><i class="fas fa-step-backward"></i></button>
                            <button onclick="musikToggle()" class="w-9 h-9 rounded-xl bg-gradient-to-br from-green-500 to-emerald-600 text-white flex items-center justify-center transition hover:scale-105 shadow-lg shadow-green-500/30" id="musikPlayBtn"><i class="fas fa-play text-sm" id="musikPlayIcon"></i></button>
                            <button onclick="musikNext()" class="w-7 h-7 rounded-lg bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-400 hover:text-white flex items-center justify-center transition text-[10px]"><i class="fas fa-step-forward"></i></button>
                        </div>
                    </div>
                    <div class="w-full mt-1">
                        <div class="flex items-center gap-2">
                            <span class="text-[10px] text-gray-500 font-mono w-8 text-right" id="musikWaktu">0:00</span>
                            <div class="flex-1 h-1.5 bg-kvt-800 rounded-full overflow-hidden cursor-pointer group" onclick="musikSeek(event)">
                                <div class="h-full bg-gradient-to-r from-green-400 to-emerald-500 rounded-full transition-all" id="musikProgress" style="width:0%"></div>
                            </div>
                            <span class="text-[10px] text-gray-500 font-mono w-8" id="musikDurasi">0:00</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 w-full">
                        <button onclick="musikMute()" class="text-gray-500 hover:text-white transition"><i class="fas fa-volume-up text-xs" id="musikVolIcon"></i></button>
                        <input type="range" min="0" max="100" value="30" class="flex-1 h-1 accent-green-500 cursor-pointer" id="musikVolume" oninput="musikSetVol(this.value)" style="background:linear-gradient(to right,#10B981 30%,#1e293b 30%)">
                        <button onclick="musikShuffle()" class="text-gray-500 hover:text-green-400 transition" id="btnShuffle" title="Acak"><i class="fas fa-random text-xs"></i></button>
                        <button onclick="musikRepeat()" class="text-gray-500 hover:text-green-400 transition" id="btnRepeat" title="Ulangi"><i class="fas fa-redo text-xs"></i></button>
                    </div>
                    <div class="w-full mt-1">
                        <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Playlist</p>
                        <div class="space-y-1 max-h-32 overflow-y-auto" id="musikPlaylist"></div>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: SCREENSHOT ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-screenshot">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-camera-retro text-rose-400"></i>Foto Layar</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">Ambil tangkapan layar halaman ini sebagai gambar PNG. Cocok untuk menyimpan catatan atau membagikan konten.</p>
                <div class="space-y-2">
                    <button onclick="ambilScreenshot('penuh')" class="w-full setting-item justify-start gap-3 hover:bg-rose-500/10 transition group">
                        <div class="w-9 h-9 bg-rose-500/10 rounded-lg flex items-center justify-center group-hover:bg-rose-500/20 transition"><i class="fas fa-desktop text-rose-400 text-sm"></i></div>
                        <div><p class="text-sm text-white font-medium">Screenshot Penuh</p><p class="text-[10px] text-gray-500">Tangkap seluruh halaman</p></div>
                    </button>
                    <button onclick="ambilScreenshot('area')" class="w-full setting-item justify-start gap-3 hover:bg-rose-500/10 transition group">
                        <div class="w-9 h-9 bg-rose-500/10 rounded-lg flex items-center justify-center group-hover:bg-rose-500/20 transition"><i class="fas fa-crop-alt text-rose-400 text-sm"></i></div>
                        <div><p class="text-sm text-white font-medium">Screenshot Area</p><p class="text-[10px] text-gray-500">Pilih area tertentu</p></div>
                    </button>
                </div>
                <div id="ssPreview" class="hidden mt-3">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Preview</p>
                    <div class="rounded-xl overflow-hidden border border-kvt-700/30">
                        <img id="ssPreviewImg" class="w-full" alt="Screenshot preview">
                    </div>
                    <div class="flex gap-2 mt-2">
                        <button onclick="downloadScreenshot()" class="flex-1 text-xs bg-rose-600 hover:bg-rose-500 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-download mr-1"></i>Unduh</button>
                        <button onclick="salinScreenshot()" class="flex-1 text-xs bg-kvt-700 hover:bg-kvt-600 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-copy mr-1"></i>Salin</button>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: KAMERA ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-kamera">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-camera text-amber-400"></i>Kamera & Dokumen</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">Ambil foto dokumen, tugas, atau catatan langsung dari kamera perangketmu.</p>
                <div class="rounded-xl overflow-hidden bg-black border border-kvt-700/30 relative" id="kameraContainer">
                    <video id="kameraVideo" class="w-full" autoplay playsinline style="display:none;max-height:220px;object-fit:cover"></video>
                    <canvas id="kameraCanvas" class="w-full hidden"></canvas>
                    <div id="kameraPlaceholder" class="flex flex-col items-center justify-center py-10 text-center">
                        <div class="w-16 h-16 bg-amber-500/10 rounded-2xl flex items-center justify-center mb-3"><i class="fas fa-camera text-amber-400 text-2xl"></i></div>
                        <p class="text-xs text-gray-500">Kamera belum aktif</p>
                    </div>
                </div>
                <div class="flex gap-2">
                    <button onclick="toggleKamera()" id="btnKamera" class="flex-1 text-xs bg-amber-600 hover:bg-amber-500 text-white px-3 py-2.5 rounded-lg transition font-semibold">
                        <i class="fas fa-power-off mr-1"></i><span id="btnKameraLabel">Nyalakan Kamera</span>
                    </button>
                    <button onclick="ambilFoto()" id="btnFoto" class="text-xs bg-kvt-700 hover:bg-kvt-600 text-white px-4 py-2.5 rounded-lg transition font-semibold disabled:opacity-30" disabled>
                        <i class="fas fa-circle"></i>
                    </button>
                    <button onclick="flipKamera()" class="text-xs bg-kvt-700 hover:bg-kvt-600 text-white px-3 py-2.5 rounded-lg transition font-semibold" title="Ganti Kamera">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                </div>
                <div id="fotoPreview" class="hidden">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Hasil Foto</p>
                    <div class="rounded-xl overflow-hidden border border-kvt-700/30"><img id="fotoHasil" class="w-full" alt="Foto"></div>
                    <div class="flex gap-2 mt-2">
                        <button onclick="downloadFoto()" class="flex-1 text-xs bg-amber-600 hover:bg-amber-500 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-download mr-1"></i>Unduh</button>
                        <button onclick="ulangiFoto()" class="flex-1 text-xs bg-kvt-700 hover:bg-kvt-600 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-redo mr-1"></i>Ulangi</button>
                    </div>
                </div>
            </div>

            {{-- ===== PANEL: REKAMAN ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-rekaman">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-record-vinyl text-red-400"></i>Rekam Layar</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">Rekam aktivitas layar untuk tutorial, presentasi, atau dokumentasi pembelajaran.</p>
                <div class="space-y-2">
                    <div class="setting-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-red-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-microphone text-red-400 text-sm"></i></div>
                            <div><p class="text-sm text-white font-medium">Sertakan Audio</p><p class="text-[10px] text-gray-500">Rekam suara mikrofon</p></div>
                        </div>
                        <div class="toggle-switch active" id="toggleRekamanAudio" onclick="this.classList.toggle('active')"></div>
                    </div>
                    <div class="setting-item">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-volume-up text-blue-400 text-sm"></i></div>
                            <div><p class="text-sm text-white font-medium">Audio Sistem</p><p class="text-[10px] text-gray-500">Rekam suara tab/sistem</p></div>
                        </div>
                        <div class="toggle-switch" id="toggleSystemAudio" onclick="this.classList.toggle('active')"></div>
                    </div>
                </div>
                <div id="rekamanStatus" class="hidden">
                    <div class="setting-item bg-red-500/10 border-red-500/30">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-red-500 rounded-full animate-pulse"></div>
                            <div><p class="text-sm text-red-400 font-bold">Sedang Merekam</p><p class="text-[10px] text-gray-400" id="rekamanTimer">00:00</p></div>
                        </div>
                        <button onclick="hentikanRekaman()" class="text-xs bg-red-600 hover:bg-red-500 text-white px-3 py-1.5 rounded-lg transition font-semibold"><i class="fas fa-stop mr-1"></i>Stop</button>
                    </div>
                </div>
                <button onclick="mulaiRekaman()" id="btnMulaiRekam" class="w-full text-sm bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-500 hover:to-rose-500 text-white px-4 py-3 rounded-xl transition font-semibold shadow-lg shadow-red-500/20">
                    <i class="fas fa-circle mr-2 text-xs"></i>Mulai Rekam Layar
                </button>
                <div id="rekamanPreview" class="hidden">
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Hasil Rekaman</p>
                    <video id="rekamanVideo" class="w-full rounded-xl border border-kvt-700/30" controls></video>
                    <button onclick="downloadRekaman()" class="w-full mt-2 text-xs bg-red-600 hover:bg-red-500 text-white px-3 py-2 rounded-lg transition font-semibold"><i class="fas fa-download mr-1"></i>Unduh Rekaman</button>
                </div>
            </div>

            {{-- ===== PANEL: SKETSA ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-sketsa">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-pen-fancy text-yellow-400"></i>Mode Sketsa</h4>
                <p class="text-[11px] text-gray-500 leading-relaxed">Gambar, tandai, atau tulis catatan langsung di atas layar. Seperti whiteboard di Zoom!</p>
                <div class="space-y-2">
                    <button onclick="mulaiSketsa()" id="btnSketsa" class="w-full text-sm bg-gradient-to-r from-yellow-600 to-amber-600 hover:from-yellow-500 hover:to-amber-500 text-white px-4 py-3 rounded-xl transition font-semibold shadow-lg shadow-yellow-500/20">
                        <i class="fas fa-pen mr-2"></i>Buka Mode Sketsa
                    </button>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Warna Pena</p>
                    <div class="flex gap-2 flex-wrap" id="sketsaWarnaList">
                        <button onclick="setSketsaWarna('#FF3B30')" class="w-8 h-8 rounded-lg bg-red-500 ring-2 ring-red-400 ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna active"></button>
                        <button onclick="setSketsaWarna('#007AFF')" class="w-8 h-8 rounded-lg bg-blue-500 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna"></button>
                        <button onclick="setSketsaWarna('#34C759')" class="w-8 h-8 rounded-lg bg-green-500 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna"></button>
                        <button onclick="setSketsaWarna('#FFCC00')" class="w-8 h-8 rounded-lg bg-yellow-400 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna"></button>
                        <button onclick="setSketsaWarna('#FFFFFF')" class="w-8 h-8 rounded-lg bg-white ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna"></button>
                        <button onclick="setSketsaWarna('#AF52DE')" class="w-8 h-8 rounded-lg bg-purple-500 ring-2 ring-transparent ring-offset-2 ring-offset-kvt-950 transition hover:scale-110 sketsa-warna"></button>
                    </div>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Ukuran Pena</p>
                    <input type="range" min="1" max="20" value="3" class="w-full h-1 accent-yellow-500 cursor-pointer" id="sketsaSize" oninput="setSketsaSize(this.value)">
                    <div class="flex justify-between text-[10px] text-gray-600 mt-1"><span>Tipis</span><span id="sketsaSizeVal">3px</span><span>Tebal</span></div>
                </div>
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2">Alat</p>
                    <div class="grid grid-cols-4 gap-2">
                        <button onclick="setSketsaTool('pen')" class="stg-tool-btn active setting-item flex-col gap-1 py-2" data-tool="pen" title="Pena">
                            <i class="fas fa-pen text-yellow-400"></i><span class="text-[9px] text-gray-400">Pena</span>
                        </button>
                        <button onclick="setSketsaTool('highlighter')" class="stg-tool-btn setting-item flex-col gap-1 py-2" data-tool="highlighter" title="Stabilo">
                            <i class="fas fa-highlighter text-green-400"></i><span class="text-[9px] text-gray-400">Stabilo</span>
                        </button>
                        <button onclick="setSketsaTool('eraser')" class="stg-tool-btn setting-item flex-col gap-1 py-2" data-tool="eraser" title="Penghapus">
                            <i class="fas fa-eraser text-gray-400"></i><span class="text-[9px] text-gray-400">Hapus</span>
                        </button>
                        <button onclick="setSketsaTool('text')" class="stg-tool-btn setting-item flex-col gap-1 py-2" data-tool="text" title="Teks">
                            <i class="fas fa-font text-cyan-400"></i><span class="text-[9px] text-gray-400">Teks</span>
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <button onclick="sketsaUndo()" class="setting-item flex-col gap-1 py-2 hover:bg-kvt-800/50"><i class="fas fa-undo text-gray-400 text-xs"></i><span class="text-[9px] text-gray-400">Undo</span></button>
                    <button onclick="sketsaClear()" class="setting-item flex-col gap-1 py-2 hover:bg-red-500/10"><i class="fas fa-trash text-red-400 text-xs"></i><span class="text-[9px] text-gray-400">Bersihkan</span></button>
                    <button onclick="sketsaSave()" class="setting-item flex-col gap-1 py-2 hover:bg-green-500/10"><i class="fas fa-save text-green-400 text-xs"></i><span class="text-[9px] text-gray-400">Simpan</span></button>
                </div>
            </div>

            {{-- ===== PANEL: AI ===== --}}
            <div class="stg-panel p-5 space-y-3 hidden" id="panel-ai">
                <h4 class="text-xs text-gray-400 uppercase tracking-widest font-bold flex items-center gap-2"><i class="fas fa-robot text-pink-400"></i>AI Assistant</h4>
                <div class="setting-item flex-col items-start gap-3">
                    <div class="flex items-center gap-3 w-full">
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center shrink-0"><i class="fas fa-robot text-white"></i></div>
                        <div class="flex-1">
                            <p class="text-sm text-white font-semibold">KVT AI Tutor</p>
                            <p class="text-[10px] text-gray-500">Asisten belajar cerdas</p>
                        </div>
                        <span class="text-[10px] bg-amber-500/20 text-amber-400 px-2 py-0.5 rounded-full font-bold">Segera</span>
                    </div>
                    <div class="w-full bg-kvt-800/30 rounded-lg p-3 mt-1">
                        <p class="text-[11px] text-gray-400 leading-relaxed"><i class="fas fa-info-circle text-kvt-400 mr-1"></i>AI Tutor, AI Research Assistant, dan AI Career Advisor sedang dalam tahap pengembangan</p>
                    </div>
                </div>
            </div>

            {{-- Reset --}}
            <div class="p-5 pt-0">
                <button onclick="resetPengaturan()" class="w-full py-2.5 px-4 bg-red-500/10 hover:bg-red-500/20 text-red-400 rounded-xl text-sm font-semibold transition flex items-center justify-center gap-2">
                    <i class="fas fa-undo text-xs"></i> Atur Ulang
                </button>
            </div>
        </div>

        <div class="p-4 border-t border-kvt-700/20">
            <div class="flex items-center gap-2 text-[10px] text-gray-600">
                <i class="fas fa-code"></i>
                <span>KVT Hub v5.0 - Settings & Tools</span>
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
        // ========================
        // LOADING SCREEN (Modern)
        // ========================
        (function() {
            var fill = document.getElementById('ldProgressFill');
            var text = document.getElementById('ldText');
            var progress = 0;
            var labels = ['MEMUAT', 'MENYIAPKAN', 'HAMPIR SIAP'];

            // Smooth multi-step progress with status text
            var steps = [
                {delay:0, to:20, label:0},
                {delay:150, to:40, label:0},
                {delay:350, to:60, label:1},
                {delay:600, to:80, label:1},
                {delay:800, to:90, label:2},
            ];
            steps.forEach(function(s) {
                setTimeout(function() {
                    progress = s.to;
                    if (fill) fill.style.width = progress + '%';
                    if (text) text.textContent = labels[s.label];
                }, s.delay);
            });

            window.addEventListener('load', function() {
                setTimeout(function() {
                    progress = 100;
                    if (fill) fill.style.width = '100%';
                    if (text) { text.textContent = 'SELAMAT DATANG'; text.classList.add('done'); }
                    setTimeout(function() {
                        var ls = document.getElementById('loadingScreen');
                        if (ls) ls.classList.add('hide');
                        setTimeout(function() { if (ls) ls.style.display = 'none'; }, 900);
                    }, 400);
                }, 200);
            });
        })();

        // AOS (deferred)
        document.addEventListener('DOMContentLoaded', function() {
            if(typeof AOS !== 'undefined') AOS.init({ duration:800, easing:'ease-out-cubic', once:true, offset:80 });
        });
        window.addEventListener('load', function() {
            if(typeof AOS !== 'undefined') AOS.init({ duration:800, easing:'ease-out-cubic', once:true, offset:80 });
        });

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
            for(let i=0;i<10;i++) {
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

        // Scroll reveal (Enhanced with stagger & variants)
        const scrollObs = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    // Support data-delay for stagger
                    const delay = e.target.dataset.delay;
                    if (delay) {
                        setTimeout(() => e.target.classList.add('tampil'), parseInt(delay) * 100);
                    } else {
                        e.target.classList.add('tampil');
                    }
                    scrollObs.unobserve(e.target); // Only animate once
                }
            });
        }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
        document.querySelectorAll('.muncul-scroll').forEach(el => scrollObs.observe(el));

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

                // Close all other dropdowns & submenus
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
                document.querySelectorAll('.has-submenu.sub-open').forEach(el => el.classList.remove('sub-open'));

                // Toggle this one
                if(!wasOpen) item.classList.add('dropdown-open');
            });
        });

        // Submenu click toggle (Level 2)
        document.querySelectorAll('.has-submenu > .dropdown-item').forEach(item => {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const parent = this.closest('.has-submenu');
                const wasOpen = parent.classList.contains('sub-open');

                // Close sibling submenus
                parent.closest('.nav-dropdown-inner').querySelectorAll('.has-submenu.sub-open').forEach(el => el.classList.remove('sub-open'));

                if(!wasOpen) parent.classList.add('sub-open');
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if(!e.target.closest('.nav-item')) {
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
                document.querySelectorAll('.has-submenu.sub-open').forEach(el => el.classList.remove('sub-open'));
            }
        });

        // Close dropdowns on ESC
        document.addEventListener('keydown', function(e) {
            if(e.key === 'Escape') {
                document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
                document.querySelectorAll('.has-submenu.sub-open').forEach(el => el.classList.remove('sub-open'));
                const nd = document.getElementById('notifDropdown');
                if(nd) nd.classList.add('hidden');
                const ud = document.getElementById('userDropdown');
                if(ud) ud.classList.add('hidden');
            }
        });

        // ========================
        // SEMUA MENU POPUP
        // ========================
        function bukaSemuaMenu() {
            const overlay = document.getElementById('semuaMenuOverlay');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            // Close navbar dropdowns
            document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));
            // Render customizer when opening
            renderKustomMenu();
        }

        function tutupSemuaMenu() {
            const overlay = document.getElementById('semuaMenuOverlay');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        }

        // Close semua menu overlay on outside click
        document.getElementById('semuaMenuOverlay')?.addEventListener('click', function(e) {
            if (e.target === this || e.target === this.firstElementChild) tutupSemuaMenu();
        });

        // ESC key closes semua menu overlay
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const overlay = document.getElementById('semuaMenuOverlay');
                if (overlay && !overlay.classList.contains('hidden')) {
                    tutupSemuaMenu();
                }
            }
        });

        // ========================
        // NAV PAGINATION (Scroll Up/Down)
        // ========================
        const ITEMS_PER_PAGE = 4;
        let currentNavPage = 0;
        let totalNavPages = 10;

        // Default page assignments (40 menus / 4 per page = 10 pages)
        const defaultPageMap = {
            'beranda':0,'jenjang':0,'platform':0,'kerjasama':0,
            'berita':1,'tentang':1,'riset':1,'karir':1,
            'komunitas':2,'sertifikasi':2,'langganan':2,'sumberdaya':2,
            'keamanan':3,'kurikulum':3,'panduan':3,'media':3,
            'dokumen':4,'bantuan':4,'edukasi':4,'statistik':4,
            'layanan':5,'webinar':5,'beasiswa':5,'laboratorium':5,
            'perpustakaan':6,'forum':6,'mentoring':6,'magang':6,
            'alumni':7,'portofolio':7,'kompetisi':7,'workshop':7,
            'jurnal':8,'podcast':8,'pelatihan':8,'konsultasi':8,
            'elearning':9,'akreditasi':9,'galeri':9,'pengumuman':9
        };

        function getPageMap() {
            try {
                const saved = localStorage.getItem('kvt_nav_pages');
                if (saved) return JSON.parse(saved);
            } catch(e) {}
            return {...defaultPageMap};
        }

        function applyPageMap() {
            const map = getPageMap();
            document.querySelectorAll('.nav-item[data-nav-id]').forEach(item => {
                const id = item.dataset.navId;
                if (map[id] !== undefined) {
                    item.dataset.navPage = map[id];
                }
            });
            // Recalculate total pages
            const pages = new Set(Object.values(map));
            totalNavPages = Math.max(...pages) + 1;
        }

        function renderNavPage(page) {
            const slider = document.getElementById('navSlider');
            if (!slider) return;

            const items = slider.querySelectorAll('.nav-item[data-nav-page]');
            // Close any open dropdowns
            document.querySelectorAll('.nav-item.dropdown-open').forEach(el => el.classList.remove('dropdown-open'));

            // Add animation class
            slider.classList.remove('nav-page-animate');
            void slider.offsetWidth; // trigger reflow
            slider.classList.add('nav-page-animate');

            items.forEach(item => {
                const itemPage = parseInt(item.dataset.navPage);
                if (itemPage === page) {
                    item.style.display = '';
                    item.style.animation = 'navPageFade 0.35s ease forwards';
                } else {
                    item.style.display = 'none';
                    item.style.animation = '';
                }
            });

            currentNavPage = page;
            updateNavControls();
        }

        function updateNavControls() {
            // Update popup page tabs
            document.querySelectorAll('.nav-page-tab').forEach(tab => {
                const p = parseInt(tab.dataset.page);
                if (p === currentNavPage) tab.classList.add('aktif');
                else tab.classList.remove('aktif');
            });
            // Update badge on Lainnya button
            const badge = document.getElementById('navPageBadge');
            if (badge) badge.textContent = (currentNavPage + 1) + '/' + totalNavPages;
        }

        // Navigate to specific page (called from popup tabs)
        function navPindahHalaman(page) {
            if (page >= 0 && page < totalNavPages) {
                renderNavPage(page);
            }
        }

        function navMaju() {
            if (currentNavPage < totalNavPages - 1) {
                renderNavPage(currentNavPage + 1);
            }
        }

        function navMundur() {
            if (currentNavPage > 0) {
                renderNavPage(currentNavPage - 1);
            }
        }

        // Initialize pagination on load
        applyPageMap();
        renderNavPage(0);

        // Mouse wheel scroll on nav
        const navWrapper = document.getElementById('navMenuWrapper');
        if (navWrapper) {
            navWrapper.addEventListener('wheel', function(e) {
                e.preventDefault();
                if (e.deltaY > 0) navMaju();
                else navMundur();
            }, { passive: false });
        }

        // ========================
        // MENU CUSTOMIZER (in Semua Menu popup)
        // ========================
        const menuLabels = {
            'beranda':'Beranda','jenjang':'Jenjang','platform':'Platform','berita':'Berita',
            'kerjasama':'Kerja Sama','tentang':'Tentang','riset':'Riset','karir':'Karir',
            'komunitas':'Komunitas','sertifikasi':'Sertifikasi','langganan':'Langganan',
            'sumberdaya':'Sumber Daya','keamanan':'Keamanan','kurikulum':'Kurikulum',
            'panduan':'Panduan','media':'Media','dokumen':'Dokumen','bantuan':'Bantuan',
            'edukasi':'Edukasi','statistik':'Statistik','layanan':'Layanan',
            'webinar':'Webinar','beasiswa':'Beasiswa','laboratorium':'Lab Virtual',
            'perpustakaan':'Perpustakaan','forum':'Forum','mentoring':'Mentoring',
            'magang':'Magang','alumni':'Alumni','portofolio':'Portofolio',
            'kompetisi':'Kompetisi','workshop':'Workshop','jurnal':'Jurnal',
            'podcast':'Podcast','pelatihan':'Pelatihan','konsultasi':'Konsultasi',
            'elearning':'E-Learning','akreditasi':'Akreditasi','galeri':'Galeri',
            'pengumuman':'Pengumuman'
        };
        const menuIcons = {
            'beranda':'fa-home','jenjang':'fa-layer-group','platform':'fa-globe','berita':'fa-newspaper',
            'kerjasama':'fa-handshake','tentang':'fa-landmark','riset':'fa-microscope','karir':'fa-briefcase',
            'komunitas':'fa-users','sertifikasi':'fa-certificate','langganan':'fa-crown',
            'sumberdaya':'fa-book-open','keamanan':'fa-shield-alt','kurikulum':'fa-graduation-cap',
            'panduan':'fa-project-diagram','media':'fa-photo-video','dokumen':'fa-file-alt',
            'bantuan':'fa-question-circle','edukasi':'fa-chalkboard-teacher','statistik':'fa-chart-line',
            'layanan':'fa-concierge-bell','webinar':'fa-video','beasiswa':'fa-award',
            'laboratorium':'fa-flask','perpustakaan':'fa-book-reader','forum':'fa-comments',
            'mentoring':'fa-chalkboard-teacher','magang':'fa-building','alumni':'fa-user-graduate',
            'portofolio':'fa-palette','kompetisi':'fa-medal','workshop':'fa-tools',
            'jurnal':'fa-scroll','podcast':'fa-podcast','pelatihan':'fa-dumbbell',
            'konsultasi':'fa-headset','elearning':'fa-laptop','akreditasi':'fa-check-double',
            'galeri':'fa-images','pengumuman':'fa-bullhorn'
        };

        function renderKustomMenu() {
            const grid = document.getElementById('kustomMenuGrid');
            if (!grid) return;
            const map = getPageMap();
            grid.innerHTML = '';
            Object.keys(menuLabels).forEach(id => {
                const page = map[id] !== undefined ? map[id] : 0;
                const card = document.createElement('div');
                card.className = 'flex items-center gap-2.5 bg-kvt-800/40 border border-kvt-700/20 rounded-xl px-3 py-2 hover:border-kvt-500/30 transition';
                card.innerHTML = `
                    <i class="fas ${menuIcons[id] || 'fa-circle'} text-kvt-400 text-xs w-4 text-center"></i>
                    <span class="text-white text-xs font-medium flex-1">${menuLabels[id]}</span>
                    <select data-kustom-id="${id}" class="bg-kvt-900 border border-kvt-700/30 text-white text-[11px] rounded-lg px-2 py-1 focus:outline-none focus:border-kvt-400 cursor-pointer" onchange="tandaiKustomBerubah()">
                        ${[0,1,2,3,4,5,6,7,8,9].map(p => `<option value="${p}" ${page===p?'selected':''}>Hal ${p+1}</option>`).join('')}
                    </select>
                `;
                grid.appendChild(card);
            });
        }

        let kustomBerubah = false;
        function tandaiKustomBerubah() { kustomBerubah = true; }

        function simpanKustomMenu() {
            const selects = document.querySelectorAll('[data-kustom-id]');
            const map = {};
            selects.forEach(sel => {
                map[sel.dataset.kustomId] = parseInt(sel.value);
            });
            localStorage.setItem('kvt_nav_pages', JSON.stringify(map));
            applyPageMap();
            renderNavPage(0);
            kustomBerubah = false;

            // Show toast
            const toast = document.createElement('div');
            toast.className = 'fixed top-28 right-4 z-[200] bg-green-500/90 backdrop-blur text-white px-5 py-2.5 rounded-xl shadow-lg text-sm font-semibold flex items-center gap-2';
            toast.innerHTML = '<i class="fas fa-check-circle"></i> Menu berhasil disimpan!';
            toast.style.animation = 'navPageFade 0.3s ease';
            document.body.appendChild(toast);
            setTimeout(() => { toast.style.opacity = '0'; toast.style.transition = 'opacity 0.3s'; }, 2000);
            setTimeout(() => toast.remove(), 2500);
        }

        function resetKustomMenu() {
            localStorage.removeItem('kvt_nav_pages');
            applyPageMap();
            renderNavPage(0);
            renderKustomMenu();

            const toast = document.createElement('div');
            toast.className = 'fixed top-28 right-4 z-[200] bg-amber-500/90 backdrop-blur text-white px-5 py-2.5 rounded-xl shadow-lg text-sm font-semibold flex items-center gap-2';
            toast.innerHTML = '<i class="fas fa-undo-alt"></i> Menu dikembalikan ke default';
            toast.style.animation = 'navPageFade 0.3s ease';
            document.body.appendChild(toast);
            setTimeout(() => { toast.style.opacity = '0'; toast.style.transition = 'opacity 0.3s'; }, 2000);
            setTimeout(() => toast.remove(), 2500);
        }

        // ========================
        // NOTIFICATION BELL
        // ========================
        let notifData = [];
        function toggleNotifikasi() {
            const dd = document.getElementById('notifDropdown');
            dd.classList.toggle('hidden');
            if(!dd.classList.contains('hidden')) muatNotifikasi();
        }
        function muatNotifikasi() {
            fetch('/api/berita/popup').then(r=>r.json()).then(data=>{
                notifData = data || [];
                const c = document.getElementById('notifContent');
                const badge = document.getElementById('notifBadge');
                const dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca') || '[]');
                const belumDibaca = notifData.filter(b => !dibaca.includes(b.id));
                if(badge) {
                    if(belumDibaca.length > 0) { badge.textContent = belumDibaca.length; badge.classList.remove('hidden'); }
                    else badge.classList.add('hidden');
                }
                if(!notifData.length) { c.innerHTML='<div class="text-center py-6 text-gray-500 text-sm"><i class="fas fa-bell-slash text-2xl mb-2 block"></i>Belum ada notifikasi</div>'; return; }
                c.innerHTML='';
                const icons=['fa-rocket text-blue-400','fa-shield-alt text-green-400','fa-microscope text-purple-400','fa-trophy text-yellow-400','fa-newspaper text-kvt-400'];
                const bgIcons=['bg-blue-500/10','bg-green-500/10','bg-purple-500/10','bg-yellow-500/10','bg-kvt-500/10'];
                notifData.forEach((b,i)=>{
                    const tgl = new Date(b.terbit_pada).toLocaleDateString('id-ID',{day:'numeric',month:'short'});
                    const sudahBaca = dibaca.includes(b.id);
                    c.innerHTML+=`<a href="/berita/${b.slug}" onclick="tandaiDibaca(${b.id})" class="flex gap-2.5 p-2.5 rounded-xl hover:bg-kvt-800/50 transition ${sudahBaca?'opacity-60':''}"><div class="w-8 h-8 ${bgIcons[i%5]} rounded-lg flex items-center justify-center shrink-0"><i class="fas ${icons[i%5]} text-xs"></i></div><div class="flex-1 min-w-0"><p class="text-xs font-semibold text-white truncate">${b.judul}</p><span class="text-[10px] text-gray-500">${tgl}</span></div>${!sudahBaca?'<span class="w-2 h-2 bg-kvt-400 rounded-full shrink-0 mt-2"></span>':''}</a>`;
                });
            }).catch(()=>{
                document.getElementById('notifContent').innerHTML='<div class="text-center py-4 text-gray-500 text-xs">Gagal memuat</div>';
            });
        }
        function tandaiDibaca(id) {
            let dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca') || '[]');
            if(!dibaca.includes(id)) { dibaca.push(id); localStorage.setItem('kvt_notif_dibaca', JSON.stringify(dibaca)); }
        }
        function tandaiSemuaDibaca() {
            const ids = notifData.map(b=>b.id);
            localStorage.setItem('kvt_notif_dibaca', JSON.stringify(ids));
            muatNotifikasi();
        }
        // Auto-load notification badge
        muatNotifikasi();

        // ========================
        // USER MENU
        // ========================
        function toggleUserMenu() {
            const dd = document.getElementById('userDropdown');
            if(dd) dd.classList.toggle('hidden');
        }

        // Close notification & user dropdowns on outside click
        document.addEventListener('click', function(e) {
            if(!e.target.closest('#notifWrapper')) {
                const nd = document.getElementById('notifDropdown');
                if(nd) nd.classList.add('hidden');
            }
            if(!e.target.closest('#userMenuWrapper')) {
                const ud = document.getElementById('userDropdown');
                if(ud) ud.classList.add('hidden');
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
        const tickerFallback = [
            { judul: 'KVT Hub v5.0 Resmi Diluncurkan dengan Fitur Edukasi Gratis & Real-Time Analytics', slug: '#' },
            { judul: 'Program Beasiswa Riset Global 2025 Dibuka untuk Mahasiswa', slug: '#' },
            { judul: 'Workshop Cybersecurity: Mengamankan Aplikasi Web Modern', slug: '#' },
            { judul: 'Kompetisi Coding Nasional: KVT Code Challenge 2025', slug: '#' },
            { judul: 'Alumni KVT Hub Raih Penghargaan Forbes 30 Under 30 Asia', slug: '#' },
        ];
        function renderTickerItems(data) {
            const tc=document.getElementById('tickerContent');
            if(!data||data.length===0) data = tickerFallback;
            tc.innerHTML='';
            const colors=['text-green-400','text-blue-400','text-yellow-400','text-purple-400','text-pink-400','text-cyan-400'];
            data.forEach((b,i)=>{
                const href = b.slug && b.slug !== '#' ? '/berita/'+b.slug : '#';
                tc.innerHTML+=`<a href="${href}" class="inline-flex items-center gap-2 hover:text-white transition${i>0?' ml-12':''}"><i class="fas fa-circle ${colors[i%colors.length]} text-[6px]"></i> ${b.judul}</a>`;
            });
        }
        function updateTicker() {
            fetch('/api/berita/ticker').then(r=>r.json()).then(data=>{
                if(!data||data.length===0) { renderTickerItems(tickerFallback); return; }
                renderTickerItems(data);
            }).catch(()=>{ renderTickerItems(tickerFallback); });
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
        // LED DOT MATRIX PANEL
        // ========================
        const ledModes = {
            shalat: 'SUBUH 04:15  ★  DZUHUR 11:45  ★  ASHAR 15:10  ★  MAGHRIB 17:55  ★  ISYA 19:05  ★  TAHAJUD 03:00',
            waktu_dunia: function() {
                const now = new Date();
                const zones = [
                    { name:'JAKARTA', offset:7 }, { name:'TOKYO', offset:9 },
                    { name:'LONDON', offset:0 }, { name:'NEW YORK', offset:-5 },
                    { name:'DUBAI', offset:4 }, { name:'SYDNEY', offset:11 },
                    { name:'SEOUL', offset:9 }, { name:'BERLIN', offset:1 }
                ];
                return zones.map(z => {
                    const d = new Date(now.getTime() + (z.offset - (now.getTimezoneOffset()/-60)) * 3600000);
                    return z.name + ' ' + d.toLocaleTimeString('id-ID',{hour:'2-digit',minute:'2-digit'});
                }).join('  ★  ');
            },
            motivasi: [
                'PENDIDIKAN ADALAH SENJATA PALING AMPUH UNTUK MENGUBAH DUNIA ★ NELSON MANDELA',
                'BELAJAR TANPA BERPIKIR ADALAH SIA-SIA, BERPIKIR TANPA BELAJAR ADALAH BAHAYA ★ KONFUSIUS',
                'MASA DEPAN MILIK MEREKA YANG PERCAYA PADA KEINDAHAN MIMPI MEREKA ★ ELEANOR ROOSEVELT',
                'INVESTASI TERBAIK ADALAH INVESTASI PADA PENGETAHUAN ★ BENJAMIN FRANKLIN',
                'KEGAGALAN ADALAH BAGIAN DARI SUKSES ★ JANGAN PERNAH MENYERAH',
            ],
            info: 'KVT HUB ★ GLOBAL EDUCATION & RESEARCH ECOSYSTEM ★ 13 JENJANG PENDIDIKAN ★ 150+ UNIVERSITAS MITRA ★ 500+ PERUSAHAAN INDUSTRI ★ 120+ SERTIFIKASI ★ 50.000+ PESERTA DIDIK',
            custom: ''
        };
        let ledModeAktif = localStorage.getItem('kvt_led_mode') || 'shalat';
        let ledSpeedVal = parseInt(localStorage.getItem('kvt_led_speed') || '40');

        function getLEDText() {
            const mode = ledModeAktif;
            if(mode === 'waktu_dunia') return ledModes.waktu_dunia();
            if(mode === 'motivasi') {
                const arr = ledModes.motivasi;
                const idx = Math.floor(Date.now() / 60000) % arr.length;
                return arr[idx];
            }
            if(mode === 'custom') {
                const c = localStorage.getItem('kvt_led_custom') || '';
                return c || 'KETIK TEKS KUSTOM DI PENGATURAN ★ KVT HUB';
            }
            return ledModes[mode] || ledModes.shalat;
        }

        function updateLEDContent() {
            const txt = getLEDText();
            const el1 = document.getElementById('ledText1');
            const el2 = document.getElementById('ledText2');
            if(el1) el1.textContent = txt;
            if(el2) el2.textContent = txt;
        }

        function setLEDSpeed(val) {
            ledSpeedVal = parseInt(val);
            const dur = Math.max(10, 90 - ledSpeedVal) + 's';
            const track = document.getElementById('ledMatrixTrack');
            if(track) track.style.animationDuration = dur;
            localStorage.setItem('kvt_led_speed', val);
            const slider = document.getElementById('ledSpeed');
            if(slider) slider.style.background = `linear-gradient(to right,#00ff66 ${val}%,#1e293b ${val}%)`;
        }

        function setLEDMode(mode) {
            ledModeAktif = mode;
            localStorage.setItem('kvt_led_mode', mode);
            updateLEDContent();
            // Update UI buttons
            document.querySelectorAll('.led-mode-btn').forEach(b => {
                const isActive = b.dataset.mode === mode;
                b.classList.toggle('bg-green-500/10', isActive);
                b.classList.toggle('border-green-500/30', isActive);
            });
            // Show/hide custom input
            const ci = document.getElementById('ledCustomInput');
            if(ci) ci.classList.toggle('hidden', mode !== 'custom');
        }

        function applyCustomLED() {
            const txt = document.getElementById('ledCustomText').value.trim().toUpperCase();
            if(txt) {
                localStorage.setItem('kvt_led_custom', txt);
                ledModes.custom = txt;
                updateLEDContent();
            }
        }

        function toggleLEDPanel() {
            const el = document.getElementById('toggleLED');
            const bar = document.getElementById('ledMatrixBar');
            const isActive = el.classList.contains('active');
            if(isActive) {
                el.classList.remove('active');
                if(bar) bar.style.display = 'none';
                localStorage.setItem('kvt_led', 'off');
            } else {
                el.classList.add('active');
                if(bar) bar.style.display = '';
                localStorage.setItem('kvt_led', 'on');
            }
        }

        // Init LED
        (function initLED() {
            updateLEDContent();
            setLEDSpeed(ledSpeedVal);
            // Update waktu_dunia every 30s
            setInterval(function() {
                if(ledModeAktif === 'waktu_dunia') updateLEDContent();
            }, 30000);
            // Update motivasi every minute
            setInterval(function() {
                if(ledModeAktif === 'motivasi') updateLEDContent();
            }, 60000);
            // Restore saved state
            if(localStorage.getItem('kvt_led') === 'off') {
                const bar = document.getElementById('ledMatrixBar');
                const toggle = document.getElementById('toggleLED');
                if(bar) bar.style.display = 'none';
                if(toggle) toggle.classList.remove('active');
            }
            // Restore saved mode
            setLEDMode(ledModeAktif);
            // Restore custom text
            const ct = localStorage.getItem('kvt_led_custom');
            if(ct) {
                const inp = document.getElementById('ledCustomText');
                if(inp) inp.value = ct;
            }
            // Restore speed slider
            const sp = document.getElementById('ledSpeed');
            if(sp) sp.value = ledSpeedVal;
        })();

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
            localStorage.removeItem('kvt_led');
            localStorage.removeItem('kvt_led_mode');
            localStorage.removeItem('kvt_led_speed');
            localStorage.removeItem('kvt_led_custom');
            location.reload();
        }

        // ========================
        // GRID PANEL NAVIGATION
        // ========================
        function bukaPanelSetting(panel) {
            document.querySelectorAll('.stg-panel').forEach(p => p.classList.add('hidden'));
            document.querySelectorAll('.stg-box').forEach(b => b.classList.remove('active'));
            const target = document.getElementById('panel-' + panel);
            const btn = document.querySelector('.stg-box[data-panel="' + panel + '"]');
            if(target) target.classList.remove('hidden');
            if(btn) btn.classList.add('active');
        }

        // ========================
        // SCREENSHOT (FOTO LAYAR)
        // ========================
        let lastScreenshotBlob = null;

        function ambilScreenshot(mode) {
            toggleSettings(); // close panel first
            if(mode === 'area') {
                mulaiAreaSelect();
                return;
            }
            setTimeout(() => {
                if(typeof html2canvas === 'undefined') {
                    alert('html2canvas sedang dimuat, coba lagi dalam beberapa detik.');
                    return;
                }
                html2canvas(document.body, {
                    useCORS: true,
                    allowTaint: true,
                    scale: window.devicePixelRatio || 1,
                    logging: false,
                    ignoreElements: el => el.id === 'settingsPanel' || el.id === 'settingsOverlay' || el.id === 'settingsBtn'
                }).then(canvas => {
                    canvas.toBlob(blob => {
                        lastScreenshotBlob = blob;
                        const url = URL.createObjectURL(blob);
                        document.getElementById('ssPreviewImg').src = url;
                        document.getElementById('ssPreview').classList.remove('hidden');
                        toggleSettings(); // reopen
                        bukaPanelSetting('screenshot');
                    });
                });
            }, 400);
        }

        function mulaiAreaSelect() {
            const overlay = document.createElement('div');
            overlay.id = 'ssSelectOverlay';
            const box = document.createElement('div');
            box.id = 'ssSelectBox';
            overlay.appendChild(box);
            document.body.appendChild(overlay);

            let sx, sy, dragging = false;
            overlay.addEventListener('mousedown', e => { sx = e.clientX; sy = e.clientY; dragging = true; });
            overlay.addEventListener('mousemove', e => {
                if(!dragging) return;
                const x = Math.min(sx, e.clientX), y = Math.min(sy, e.clientY);
                const w = Math.abs(e.clientX - sx), h = Math.abs(e.clientY - sy);
                box.style.left = x + 'px'; box.style.top = y + 'px';
                box.style.width = w + 'px'; box.style.height = h + 'px';
            });
            overlay.addEventListener('mouseup', e => {
                dragging = false;
                const rect = { x: parseInt(box.style.left), y: parseInt(box.style.top), w: parseInt(box.style.width), h: parseInt(box.style.height) };
                overlay.remove();
                if(rect.w < 10 || rect.h < 10) return;
                html2canvas(document.body, {
                    useCORS: true, allowTaint: true, scale: window.devicePixelRatio || 1, logging: false,
                    x: rect.x + window.scrollX, y: rect.y + window.scrollY,
                    width: rect.w, height: rect.h,
                    ignoreElements: el => el.id === 'settingsPanel' || el.id === 'settingsOverlay' || el.id === 'settingsBtn'
                }).then(canvas => {
                    canvas.toBlob(blob => {
                        lastScreenshotBlob = blob;
                        const url = URL.createObjectURL(blob);
                        document.getElementById('ssPreviewImg').src = url;
                        document.getElementById('ssPreview').classList.remove('hidden');
                        toggleSettings();
                        bukaPanelSetting('screenshot');
                    });
                });
            });
        }

        function downloadScreenshot() {
            if(!lastScreenshotBlob) return;
            const a = document.createElement('a');
            a.href = URL.createObjectURL(lastScreenshotBlob);
            a.download = 'KVTHub_Screenshot_' + new Date().toISOString().slice(0,19).replace(/[:T]/g,'-') + '.png';
            a.click();
        }

        async function salinScreenshot() {
            if(!lastScreenshotBlob) return;
            try {
                await navigator.clipboard.write([new ClipboardItem({'image/png': lastScreenshotBlob})]);
                alert('Screenshot berhasil disalin ke clipboard!');
            } catch(e) { alert('Browser tidak mendukung salin gambar. Silakan unduh saja.'); }
        }

        // ========================
        // KAMERA & DOKUMEN
        // ========================
        let kameraStream = null;
        let kameraFacing = 'environment'; // rear camera default

        async function toggleKamera() {
            const video = document.getElementById('kameraVideo');
            const placeholder = document.getElementById('kameraPlaceholder');
            const canvas = document.getElementById('kameraCanvas');
            const btn = document.getElementById('btnKamera');
            const label = document.getElementById('btnKameraLabel');
            const fotoBtn = document.getElementById('btnFoto');

            if(kameraStream) {
                kameraStream.getTracks().forEach(t => t.stop());
                kameraStream = null;
                video.style.display = 'none';
                placeholder.style.display = '';
                canvas.classList.add('hidden');
                label.textContent = 'Nyalakan Kamera';
                btn.classList.remove('bg-red-600','hover:bg-red-500');
                btn.classList.add('bg-amber-600','hover:bg-amber-500');
                fotoBtn.disabled = true;
                return;
            }

            try {
                kameraStream = await navigator.mediaDevices.getUserMedia({
                    video: { facingMode: kameraFacing, width: { ideal: 1280 }, height: { ideal: 720 } },
                    audio: false
                });
                video.srcObject = kameraStream;
                video.style.display = 'block';
                placeholder.style.display = 'none';
                canvas.classList.add('hidden');
                label.textContent = 'Matikan Kamera';
                btn.classList.remove('bg-amber-600','hover:bg-amber-500');
                btn.classList.add('bg-red-600','hover:bg-red-500');
                fotoBtn.disabled = false;
                document.getElementById('fotoPreview').classList.add('hidden');
            } catch(e) {
                alert('Tidak dapat mengakses kamera. Pastikan izin kamera diaktifkan.');
            }
        }

        function ambilFoto() {
            const video = document.getElementById('kameraVideo');
            const canvas = document.getElementById('kameraCanvas');
            if(!kameraStream) return;
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            const ctx = canvas.getContext('2d');
            ctx.drawImage(video, 0, 0);
            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('fotoHasil').src = dataURL;
            document.getElementById('fotoPreview').classList.remove('hidden');
            // Flash effect
            video.style.filter = 'brightness(3)';
            setTimeout(() => video.style.filter = '', 150);
        }

        async function flipKamera() {
            kameraFacing = kameraFacing === 'environment' ? 'user' : 'environment';
            if(kameraStream) {
                kameraStream.getTracks().forEach(t => t.stop());
                kameraStream = null;
                await toggleKamera();
            }
        }

        function downloadFoto() {
            const img = document.getElementById('fotoHasil');
            if(!img.src) return;
            const a = document.createElement('a');
            a.href = img.src;
            a.download = 'KVTHub_Foto_' + new Date().toISOString().slice(0,19).replace(/[:T]/g,'-') + '.png';
            a.click();
        }

        function ulangiFoto() {
            document.getElementById('fotoPreview').classList.add('hidden');
        }

        // ========================
        // REKAM LAYAR
        // ========================
        let mediaRecorder = null;
        let rekamanChunks = [];
        let rekamanBlob = null;
        let rekamanInterval = null;
        let rekamanStartTime = 0;

        async function mulaiRekaman() {
            const withMic = document.getElementById('toggleRekamanAudio').classList.contains('active');
            const withSystem = document.getElementById('toggleSystemAudio').classList.contains('active');

            try {
                const screenStream = await navigator.mediaDevices.getDisplayMedia({
                    video: { cursor: 'always' },
                    audio: withSystem
                });

                let combinedStream = screenStream;

                if(withMic) {
                    try {
                        const micStream = await navigator.mediaDevices.getUserMedia({ audio: true, video: false });
                        const tracks = [...screenStream.getTracks(), ...micStream.getAudioTracks()];
                        combinedStream = new MediaStream(tracks);
                    } catch(e) {
                        console.warn('Mikrofon tidak tersedia, merekam tanpa mic');
                    }
                }

                rekamanChunks = [];
                mediaRecorder = new MediaRecorder(combinedStream, { mimeType: 'video/webm;codecs=vp9' });

                mediaRecorder.ondataavailable = e => { if(e.data.size > 0) rekamanChunks.push(e.data); };
                mediaRecorder.onstop = () => {
                    rekamanBlob = new Blob(rekamanChunks, { type: 'video/webm' });
                    const url = URL.createObjectURL(rekamanBlob);
                    document.getElementById('rekamanVideo').src = url;
                    document.getElementById('rekamanPreview').classList.remove('hidden');
                    document.getElementById('rekamanStatus').classList.add('hidden');
                    document.getElementById('btnMulaiRekam').classList.remove('hidden');
                    clearInterval(rekamanInterval);
                    combinedStream.getTracks().forEach(t => t.stop());
                };

                mediaRecorder.start(1000);
                rekamanStartTime = Date.now();
                document.getElementById('rekamanStatus').classList.remove('hidden');
                document.getElementById('btnMulaiRekam').classList.add('hidden');
                document.getElementById('rekamanPreview').classList.add('hidden');

                rekamanInterval = setInterval(() => {
                    const elapsed = Math.floor((Date.now() - rekamanStartTime) / 1000);
                    const m = String(Math.floor(elapsed / 60)).padStart(2, '0');
                    const s = String(elapsed % 60).padStart(2, '0');
                    document.getElementById('rekamanTimer').textContent = m + ':' + s;
                }, 1000);

                // Stop if user stops screen sharing
                screenStream.getVideoTracks()[0].onended = () => hentikanRekaman();

            } catch(e) {
                if(e.name !== 'NotAllowedError') alert('Gagal memulai rekaman: ' + e.message);
            }
        }

        function hentikanRekaman() {
            if(mediaRecorder && mediaRecorder.state !== 'inactive') {
                mediaRecorder.stop();
            }
        }

        function downloadRekaman() {
            if(!rekamanBlob) return;
            const a = document.createElement('a');
            a.href = URL.createObjectURL(rekamanBlob);
            a.download = 'KVTHub_Rekaman_' + new Date().toISOString().slice(0,19).replace(/[:T]/g,'-') + '.webm';
            a.click();
        }

        // ========================
        // MODE SKETSA (Whiteboard)
        // ========================
        let sketsaCanvas = null;
        let sketsaCtx = null;
        let sketsaActive = false;
        let sketsaDrawing = false;
        let sketsaColor = '#FF3B30';
        let sketsaPenSize = 3;
        let sketsaTool = 'pen';
        let sketsaHistory = [];
        let sketsaToolbarEl = null;

        function mulaiSketsa() {
            if(sketsaActive) { hentikanSketsa(); return; }

            toggleSettings(); // close panel

            setTimeout(() => {
                // Create canvas overlay
                const overlay = document.createElement('canvas');
                overlay.id = 'sketsaOverlay';
                overlay.width = window.innerWidth;
                overlay.height = window.innerHeight;
                document.body.appendChild(overlay);
                sketsaCanvas = overlay;
                sketsaCtx = overlay.getContext('2d');
                sketsaActive = true;

                // Create floating toolbar
                const tb = document.createElement('div');
                tb.id = 'sketsaToolbar';
                tb.innerHTML = `
                    <button class="active" onclick="setSketsaToolLive('pen')" title="Pena" data-tool="pen"><i class="fas fa-pen"></i></button>
                    <button onclick="setSketsaToolLive('highlighter')" title="Stabilo" data-tool="highlighter"><i class="fas fa-highlighter"></i></button>
                    <button onclick="setSketsaToolLive('eraser')" title="Penghapus" data-tool="eraser"><i class="fas fa-eraser"></i></button>
                    <button onclick="setSketsaToolLive('text')" title="Teks" data-tool="text"><i class="fas fa-font"></i></button>
                    <div class="divider"></div>
                    <button onclick="sketsaUndo()" title="Undo"><i class="fas fa-undo"></i></button>
                    <button onclick="sketsaClear()" title="Bersihkan"><i class="fas fa-trash"></i></button>
                    <div class="divider"></div>
                    <input type="color" value="${sketsaColor}" onchange="sketsaColor=this.value" style="width:32px;height:32px;border:none;border-radius:8px;cursor:pointer;background:transparent" title="Warna">
                    <input type="range" min="1" max="20" value="${sketsaPenSize}" oninput="sketsaPenSize=parseInt(this.value)" style="width:70px;accent-color:#3399FF" title="Ukuran">
                    <div class="divider"></div>
                    <button onclick="sketsaSave()" title="Simpan" style="color:#10B981"><i class="fas fa-save"></i></button>
                    <button onclick="hentikanSketsa()" title="Tutup" style="color:#F43F5E"><i class="fas fa-times"></i></button>
                `;
                document.body.appendChild(tb);
                sketsaToolbarEl = tb;

                // Event listeners
                overlay.addEventListener('mousedown', sketsaMouseDown);
                overlay.addEventListener('mousemove', sketsaMouseMove);
                overlay.addEventListener('mouseup', sketsaMouseUp);
                overlay.addEventListener('mouseleave', sketsaMouseUp);
                // Touch support
                overlay.addEventListener('touchstart', sketsaTouchStart, {passive:false});
                overlay.addEventListener('touchmove', sketsaTouchMove, {passive:false});
                overlay.addEventListener('touchend', sketsaMouseUp);

                // Save initial state
                sketsaHistory = [sketsaCtx.getImageData(0, 0, overlay.width, overlay.height)];

                // Update button in panel
                const btn = document.getElementById('btnSketsa');
                if(btn) { btn.innerHTML = '<i class="fas fa-times mr-2"></i>Tutup Mode Sketsa'; btn.classList.add('from-red-600','to-rose-600'); btn.classList.remove('from-yellow-600','to-amber-600'); }
            }, 300);
        }

        function hentikanSketsa() {
            if(sketsaCanvas) { sketsaCanvas.remove(); sketsaCanvas = null; sketsaCtx = null; }
            if(sketsaToolbarEl) { sketsaToolbarEl.remove(); sketsaToolbarEl = null; }
            sketsaActive = false;
            sketsaHistory = [];
            const btn = document.getElementById('btnSketsa');
            if(btn) { btn.innerHTML = '<i class="fas fa-pen mr-2"></i>Buka Mode Sketsa'; btn.classList.remove('from-red-600','to-rose-600'); btn.classList.add('from-yellow-600','to-amber-600'); }
        }

        function sketsaMouseDown(e) {
            if(sketsaTool === 'text') {
                const text = prompt('Ketik teks:');
                if(text) {
                    sketsaCtx.font = `${sketsaPenSize * 5}px 'Plus Jakarta Sans', sans-serif`;
                    sketsaCtx.fillStyle = sketsaColor;
                    sketsaCtx.fillText(text, e.offsetX, e.offsetY);
                    sketsaHistory.push(sketsaCtx.getImageData(0, 0, sketsaCanvas.width, sketsaCanvas.height));
                }
                return;
            }
            sketsaDrawing = true;
            sketsaCtx.beginPath();
            sketsaCtx.moveTo(e.offsetX, e.offsetY);
        }

        function sketsaMouseMove(e) {
            if(!sketsaDrawing) return;
            sketsaCtx.lineWidth = sketsaTool === 'highlighter' ? sketsaPenSize * 3 : (sketsaTool === 'eraser' ? sketsaPenSize * 4 : sketsaPenSize);
            sketsaCtx.lineCap = 'round';
            sketsaCtx.lineJoin = 'round';
            if(sketsaTool === 'eraser') {
                sketsaCtx.globalCompositeOperation = 'destination-out';
                sketsaCtx.strokeStyle = 'rgba(0,0,0,1)';
            } else if(sketsaTool === 'highlighter') {
                sketsaCtx.globalCompositeOperation = 'source-over';
                sketsaCtx.strokeStyle = sketsaColor + '55';
            } else {
                sketsaCtx.globalCompositeOperation = 'source-over';
                sketsaCtx.strokeStyle = sketsaColor;
            }
            sketsaCtx.lineTo(e.offsetX, e.offsetY);
            sketsaCtx.stroke();
        }

        function sketsaMouseUp() {
            if(sketsaDrawing && sketsaCanvas) {
                sketsaDrawing = false;
                sketsaHistory.push(sketsaCtx.getImageData(0, 0, sketsaCanvas.width, sketsaCanvas.height));
            }
        }

        function sketsaTouchStart(e) {
            e.preventDefault();
            const t = e.touches[0];
            const rect = sketsaCanvas.getBoundingClientRect();
            sketsaMouseDown({ offsetX: t.clientX - rect.left, offsetY: t.clientY - rect.top });
        }

        function sketsaTouchMove(e) {
            e.preventDefault();
            const t = e.touches[0];
            const rect = sketsaCanvas.getBoundingClientRect();
            sketsaMouseMove({ offsetX: t.clientX - rect.left, offsetY: t.clientY - rect.top });
        }

        function sketsaUndo() {
            if(sketsaHistory.length > 1 && sketsaCtx) {
                sketsaHistory.pop();
                sketsaCtx.putImageData(sketsaHistory[sketsaHistory.length - 1], 0, 0);
            }
        }

        function sketsaClear() {
            if(sketsaCtx && sketsaCanvas) {
                sketsaCtx.clearRect(0, 0, sketsaCanvas.width, sketsaCanvas.height);
                sketsaHistory = [sketsaCtx.getImageData(0, 0, sketsaCanvas.width, sketsaCanvas.height)];
            }
        }

        function sketsaSave() {
            if(!sketsaCanvas) return;
            const a = document.createElement('a');
            a.href = sketsaCanvas.toDataURL('image/png');
            a.download = 'KVTHub_Sketsa_' + new Date().toISOString().slice(0,19).replace(/[:T]/g,'-') + '.png';
            a.click();
        }

        function setSketsaWarna(warna) {
            sketsaColor = warna;
            document.querySelectorAll('.sketsa-warna').forEach(b => {
                b.classList.remove('ring-red-400','ring-blue-400','ring-green-400','ring-yellow-400','ring-white','ring-purple-400');
                b.classList.add('ring-transparent');
            });
            event.target.closest('button').classList.remove('ring-transparent');
            const wMap = {'#FF3B30':'ring-red-400','#007AFF':'ring-blue-400','#34C759':'ring-green-400','#FFCC00':'ring-yellow-400','#FFFFFF':'ring-white','#AF52DE':'ring-purple-400'};
            event.target.closest('button').classList.add(wMap[warna] || 'ring-white');
        }

        function setSketsaSize(val) {
            sketsaPenSize = parseInt(val);
            document.getElementById('sketsaSizeVal').textContent = val + 'px';
        }

        function setSketsaTool(tool) {
            sketsaTool = tool;
            document.querySelectorAll('.stg-tool-btn').forEach(b => b.classList.remove('active'));
            document.querySelector('.stg-tool-btn[data-tool="'+tool+'"]').classList.add('active');
        }

        function setSketsaToolLive(tool) {
            sketsaTool = tool;
            if(sketsaToolbarEl) {
                sketsaToolbarEl.querySelectorAll('button[data-tool]').forEach(b => b.classList.remove('active'));
                const btn = sketsaToolbarEl.querySelector('button[data-tool="'+tool+'"]');
                if(btn) btn.classList.add('active');
            }
        }

        // ========================
        // MUSIC PLAYER - Lo-Fi / Ambient
        // ========================
        const musikDaftar = [
            { judul: 'Lo-Fi Study Beats', artis: 'KVT Radio', src: 'https://streams.ilovemusic.de/iloveradio17.mp3', warna: 'from-green-500 to-emerald-600' },
            { judul: 'Chill Jazz Piano', artis: 'Relaxation FM', src: 'https://streams.ilovemusic.de/iloveradio10.mp3', warna: 'from-blue-500 to-cyan-600' },
            { judul: 'Deep House Focus', artis: 'Study Station', src: 'https://streams.ilovemusic.de/iloveradio2.mp3', warna: 'from-purple-500 to-pink-600' },
            { judul: 'Ambient Soundscape', artis: 'Nature Beats', src: 'https://streams.ilovemusic.de/iloveradio14.mp3', warna: 'from-teal-500 to-green-600' },
            { judul: 'Classical Focus', artis: 'KVT Classical', src: 'https://streams.ilovemusic.de/iloveradio4.mp3', warna: 'from-amber-500 to-orange-600' },
        ];
        let musikIndex = 0, musikPlaying = false, musikShuffleOn = false, musikRepeatOn = false;
        const audioPlayer = new Audio();
        audioPlayer.volume = 0.3;
        audioPlayer.crossOrigin = 'anonymous';

        function renderPlaylist() {
            const el = document.getElementById('musikPlaylist');
            el.innerHTML = '';
            musikDaftar.forEach((m, i) => {
                el.innerHTML += `<button onclick="musikPilih(${i})" class="w-full flex items-center gap-2 p-2 rounded-lg text-left transition ${i === musikIndex ? 'bg-green-500/15 border border-green-500/30' : 'hover:bg-kvt-800/50'}">
                    <div class="w-6 h-6 bg-gradient-to-br ${m.warna} rounded flex items-center justify-center shrink-0"><i class="fas ${i === musikIndex && musikPlaying ? 'fa-volume-up' : 'fa-music'} text-white text-[8px]"></i></div>
                    <div class="min-w-0 flex-1"><p class="text-xs text-white font-medium truncate">${m.judul}</p><p class="text-[10px] text-gray-500">${m.artis}</p></div>
                    ${i === musikIndex ? '<span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse shrink-0"></span>' : ''}
                </button>`;
            });
        }

        function musikPilih(i) { musikIndex = i; musikPlay(); }
        function musikPlay() {
            const m = musikDaftar[musikIndex];
            audioPlayer.src = m.src;
            audioPlayer.play().catch(() => {});
            musikPlaying = true;
            document.getElementById('musikPlayIcon').className = 'fas fa-pause text-sm';
            document.getElementById('musikJudul').textContent = m.judul;
            document.getElementById('musikArtis').textContent = m.artis;
            document.getElementById('musikAlbumArt').className = 'w-10 h-10 bg-gradient-to-br ' + m.warna + ' rounded-xl flex items-center justify-center shrink-0';
            localStorage.setItem('kvt_musik_index', musikIndex);
            localStorage.setItem('kvt_musik_playing', 'true');
            renderPlaylist();
        }
        function musikToggle() {
            if(musikPlaying) { audioPlayer.pause(); musikPlaying = false; document.getElementById('musikPlayIcon').className = 'fas fa-play text-sm'; }
            else { if(!audioPlayer.src || audioPlayer.src === location.href) musikPlay(); else { audioPlayer.play().catch(()=>{}); musikPlaying = true; document.getElementById('musikPlayIcon').className = 'fas fa-pause text-sm'; } }
            localStorage.setItem('kvt_musik_playing', musikPlaying ? 'true' : 'false');
            renderPlaylist();
        }
        function musikNext() { musikIndex = musikShuffleOn ? Math.floor(Math.random() * musikDaftar.length) : (musikIndex + 1) % musikDaftar.length; musikPlay(); }
        function musikPrev() { musikIndex = (musikIndex - 1 + musikDaftar.length) % musikDaftar.length; musikPlay(); }
        function musikSetVol(v) {
            audioPlayer.volume = v / 100;
            const slider = document.getElementById('musikVolume');
            slider.style.background = `linear-gradient(to right,#10B981 ${v}%,#1e293b ${v}%)`;
            document.getElementById('musikVolIcon').className = v == 0 ? 'fas fa-volume-mute text-xs' : v < 50 ? 'fas fa-volume-down text-xs' : 'fas fa-volume-up text-xs';
            localStorage.setItem('kvt_musik_vol', v);
        }
        function musikMute() { const v = document.getElementById('musikVolume'); if(audioPlayer.volume > 0) { v.dataset.prev = v.value; v.value = 0; musikSetVol(0); } else { v.value = v.dataset.prev || 30; musikSetVol(v.value); } }
        function musikShuffle() { musikShuffleOn = !musikShuffleOn; document.getElementById('btnShuffle').classList.toggle('text-green-400', musikShuffleOn); document.getElementById('btnShuffle').classList.toggle('text-gray-500', !musikShuffleOn); }
        function musikRepeat() { musikRepeatOn = !musikRepeatOn; audioPlayer.loop = musikRepeatOn; document.getElementById('btnRepeat').classList.toggle('text-green-400', musikRepeatOn); document.getElementById('btnRepeat').classList.toggle('text-gray-500', !musikRepeatOn); }
        function musikSeek(e) { if(audioPlayer.duration) { const rect = e.target.getBoundingClientRect(); audioPlayer.currentTime = ((e.clientX - rect.left) / rect.width) * audioPlayer.duration; } }
        function formatWaktu(s) { const m = Math.floor(s/60); return m + ':' + String(Math.floor(s%60)).padStart(2,'0'); }

        audioPlayer.addEventListener('timeupdate', () => {
            if(audioPlayer.duration && isFinite(audioPlayer.duration)) {
                const pct = (audioPlayer.currentTime / audioPlayer.duration) * 100;
                document.getElementById('musikProgress').style.width = pct + '%';
                document.getElementById('musikWaktu').textContent = formatWaktu(audioPlayer.currentTime);
                document.getElementById('musikDurasi').textContent = formatWaktu(audioPlayer.duration);
            }
        });
        audioPlayer.addEventListener('ended', () => { if(!musikRepeatOn) musikNext(); });

        // Restore saved state
        (function initMusik() {
            const savedIdx = localStorage.getItem('kvt_musik_index');
            const savedVol = localStorage.getItem('kvt_musik_vol');
            const savedPlay = localStorage.getItem('kvt_musik_playing');
            if(savedIdx !== null) musikIndex = parseInt(savedIdx);
            if(savedVol !== null) { document.getElementById('musikVolume').value = savedVol; musikSetVol(savedVol); }
            const m = musikDaftar[musikIndex];
            document.getElementById('musikJudul').textContent = m.judul;
            document.getElementById('musikArtis').textContent = m.artis;
            document.getElementById('musikAlbumArt').className = 'w-10 h-10 bg-gradient-to-br ' + m.warna + ' rounded-xl flex items-center justify-center shrink-0';
            renderPlaylist();
            if(savedPlay === 'true') {
                // Auto-play on page load (will require user interaction on most browsers)
                audioPlayer.src = m.src;
                audioPlayer.play().then(() => {
                    musikPlaying = true;
                    document.getElementById('musikPlayIcon').className = 'fas fa-pause text-sm';
                    renderPlaylist();
                }).catch(() => {});
            }
        })();

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

        // ========================
        // AI VTUBER ASSISTANT
        // ========================
        let vtuberChatOpen = false;
        let vtuberFullscreen = false;

        function toggleVtuberChat() {
            const panel = document.getElementById('vtuberChatPanel');
            const character = document.getElementById('vtuberCharacter');
            vtuberChatOpen = !vtuberChatOpen;
            if (vtuberChatOpen) {
                panel.classList.remove('hidden');
                panel.style.animation = 'popupIn 0.35s cubic-bezier(0.34,1.56,0.64,1)';
                character.style.opacity = '0.3';
                character.style.pointerEvents = 'none';
                document.getElementById('vtuberInput')?.focus();
            } else {
                panel.classList.add('hidden');
                character.style.opacity = '1';
                character.style.pointerEvents = 'auto';
            }
        }

        function toggleVtuberFullscreen() {
            const overlay = document.getElementById('vtuberFullscreenOverlay');
            vtuberFullscreen = !vtuberFullscreen;
            if (vtuberFullscreen) {
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            } else {
                overlay.classList.add('hidden');
                document.body.style.overflow = '';
            }
        }

        function toggleVoiceInput() {
            // Placeholder untuk Web Speech API
            const btn = event.currentTarget;
            btn.innerHTML = '<i class="fas fa-circle text-red-400 text-xs animate-pulse"></i>';
            setTimeout(() => {
                btn.innerHTML = '<i class="fas fa-microphone text-xs"></i>';
                tambahPesanVtuber('bot', 'Fitur input suara akan segera tersedia! 🎤 Untuk saat ini, kamu bisa mengetik pertanyaan di sini.');
            }, 2000);
        }

        // Knowledge base sederhana untuk Kuro AI
        const kuroResponses = {
            'daftar': 'Untuk mendaftar di KVT Hub:\n1. Klik tombol **Daftar** di pojok kanan atas\n2. Isi data: nama, email, password\n3. Pilih peran (Siswa/Mahasiswa/Guru/dll)\n4. Verifikasi email\n5. Login dan mulai belajar! 🎓',
            'fitur': 'KVT Hub punya banyak fitur keren:\n• **13 Jenjang** pendidikan (TK-S3)\n• **40 Menu** navigasi\n• **Gamifikasi RPG** dengan 100 level\n• **Music Streaming** 5 stasiun\n• **LED Dot Matrix** panel\n• **30+ Diagram** visualisasi\n• **AI VTuber** Assistant (aku!) 🐱',
            'jenjang': 'KVT Hub mendukung **13 jenjang pendidikan**:\n🎒 TK/PAUD · SD/MI · SMP/MTs\n🏫 SMA/MA · SMK Teknologi · SMK Bisnis · SMK Kesehatan\n🎓 Diploma (D1-D4) · Sarjana (S1) · Magister (S2)\n🔬 Doktoral (S3) · Post-Doctoral · Profesi',
            'gratis': 'Program **Edukasi Gratis** yang tersedia:\n🛠️ Developer Tools (GitHub Pro, JetBrains)\n☁️ Cloud & Hosting (Azure, AWS credit)\n🎨 Desain (Figma, Canva Pro)\n📚 Platform (Coursera, edX)\n\nSemua gratis untuk pelajar! Klik menu **Edukasi Gratis** di navbar.',
            'kelas': 'Untuk mengakses kelas:\n1. Login ke akun KVT Hub\n2. Buka menu **Platform > Kelas**\n3. Pilih kelas yang tersedia\n4. Mulai belajar & ikuti kuis\n5. Dapatkan XP dan naik level! 🚀',
            'bantuan': 'Aku bisa bantu banyak hal:\n• 📋 Navigasi menu & fitur\n• 📖 Info jenjang pendidikan\n• 🎮 Cara kerja gamifikasi\n• 🔐 Masalah login/akun\n• 📊 Penjelasan fitur diagram\n\nTanya aja! 😊',
        };

        function getKuroResponse(message) {
            const msg = message.toLowerCase();
            if (msg.includes('daftar') || msg.includes('register') || msg.includes('mendaftar')) return kuroResponses['daftar'];
            if (msg.includes('fitur') || msg.includes('platform') || msg.includes('apa saja')) return kuroResponses['fitur'];
            if (msg.includes('jenjang') || msg.includes('pendidikan') || msg.includes('tingkat')) return kuroResponses['jenjang'];
            if (msg.includes('gratis') || msg.includes('free') || msg.includes('kursus')) return kuroResponses['gratis'];
            if (msg.includes('kelas') || msg.includes('belajar') || msg.includes('materi')) return kuroResponses['kelas'];
            if (msg.includes('bantuan') || msg.includes('help') || msg.includes('bantu')) return kuroResponses['bantuan'];
            if (msg.includes('halo') || msg.includes('hai') || msg.includes('hi') || msg.includes('hello')) return 'Hai! 👋 Aku Kuro, asisten AI KVT Hub. Ada yang bisa aku bantu hari ini?';
            if (msg.includes('terima kasih') || msg.includes('makasih') || msg.includes('thanks')) return 'Sama-sama! 😊 Senang bisa membantu. Jangan ragu tanya lagi ya!';
            if (msg.includes('siapa') && (msg.includes('kamu') || msg.includes('kuro'))) return 'Aku **Kuro** 🐱 — maskot & asisten AI KVT Hub! Aku dibuat untuk membantu pengguna menjelajahi platform pendidikan ini. Nanti aku akan punya model 3D VTuber lho! ✨';
            return 'Hmm, pertanyaan menarik! 🤔 Aku masih belajar. Coba tanya tentang:\n• Cara mendaftar\n• Fitur platform\n• Jenjang pendidikan\n• Edukasi gratis\n• Cara ikut kelas\n\nAtau kunjungi menu **Bantuan** di navbar! 📖';
        }

        function tambahPesanVtuber(type, text) {
            const container = document.getElementById('vtuberMessages');
            const div = document.createElement('div');
            // Format markdown-like bold
            const formattedText = text.replace(/\*\*(.*?)\*\*/g, '<strong class="text-kvt-400">$1</strong>').replace(/\n/g, '<br>');

            if (type === 'user') {
                div.className = 'flex justify-end';
                div.innerHTML = `<div class="bg-gradient-to-r from-kvt-600 to-ungu-600 text-white text-sm rounded-xl rounded-br-none px-3.5 py-2.5 max-w-[280px]">${formattedText}</div>`;
            } else {
                div.className = 'flex gap-2.5';
                div.innerHTML = `
                    <div class="w-7 h-7 rounded-lg overflow-hidden shrink-0 mt-0.5 bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center">
                        <i class="fas fa-robot text-white text-[10px]"></i>
                    </div>
                    <div class="flex-1">
                        <div class="bg-kvt-800/60 border border-kvt-700/20 rounded-xl rounded-tl-none px-3.5 py-2.5 max-w-[280px]">
                            <p class="text-sm text-gray-200">${formattedText}</p>
                        </div>
                        <p class="text-[10px] text-gray-600 mt-1 ml-1">Kuro AI · Baru saja</p>
                    </div>`;
            }
            container.appendChild(div);
            container.scrollTop = container.scrollHeight;
        }

        function kirimPesanVtuber() {
            const input = document.getElementById('vtuberInput');
            const msg = input.value.trim();
            if (!msg) return;

            tambahPesanVtuber('user', msg);
            input.value = '';

            // Typing indicator
            const typingDiv = document.createElement('div');
            typingDiv.className = 'flex gap-2.5 vtuber-typing';
            typingDiv.innerHTML = `
                <div class="w-7 h-7 rounded-lg shrink-0 mt-0.5 bg-gradient-to-br from-kvt-400 to-ungu-500 flex items-center justify-center">
                    <i class="fas fa-robot text-white text-[10px]"></i>
                </div>
                <div class="bg-kvt-800/60 border border-kvt-700/20 rounded-xl rounded-tl-none px-4 py-3">
                    <div class="flex gap-1"><span class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay:0s"></span><span class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay:0.15s"></span><span class="w-2 h-2 bg-kvt-400 rounded-full animate-bounce" style="animation-delay:0.3s"></span></div>
                </div>`;
            document.getElementById('vtuberMessages').appendChild(typingDiv);
            document.getElementById('vtuberMessages').scrollTop = document.getElementById('vtuberMessages').scrollHeight;

            // Simulate response delay
            setTimeout(() => {
                typingDiv.remove();
                const response = getKuroResponse(msg);
                tambahPesanVtuber('bot', response);
            }, 800 + Math.random() * 700);
        }

        function vtuberQuickAction(question) {
            document.getElementById('vtuberInput').value = question;
            kirimPesanVtuber();
        }

        // Close VTuber chat on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (vtuberFullscreen) toggleVtuberFullscreen();
                else if (vtuberChatOpen) toggleVtuberChat();
            }
        });

        // Auto-greet after delay
        setTimeout(() => {
            const widget = document.getElementById('vtuberWidget');
            if (widget && !vtuberChatOpen) {
                widget.style.animation = 'vtuberBounce 0.5s ease';
                setTimeout(() => widget.style.animation = '', 500);
            }
        }, 5000);

    </script>
    <style>
        @keyframes vtuberBounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
    <div id="google_translate_element" style="display:none"></div>
    @stack('scripts')
</body>
</html>
