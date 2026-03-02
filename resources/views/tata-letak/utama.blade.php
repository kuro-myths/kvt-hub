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

        /* ===== HEADER STYLE SWITCHER ===== */
        .header-block { display:none }
        .header-block.header-aktif { display:block }

        /* Header 2: Compact - grouped dropdowns */
        .header-compact .compact-group-btn {
            display:flex;align-items:center;gap:6px;padding:8px 16px;font-size:12px;font-weight:700;
            color:#d1d5db;border-radius:10px;white-space:nowrap;transition:all 0.2s;
            text-transform:uppercase;letter-spacing:0.04em;background:rgba(51,153,255,0.05);
            border:1px solid rgba(51,153,255,0.08);
        }
        .header-compact .compact-group-btn:hover,
        .header-compact .compact-group-btn.aktif {
            color:#5CADFF;background:rgba(51,153,255,0.12);border-color:rgba(51,153,255,0.25);
        }
        .header-compact .compact-dropdown {
            position:absolute;top:100%;left:0;min-width:520px;padding-top:6px;
            opacity:0;visibility:hidden;pointer-events:none;transform:translateY(-4px);
            transition:all 0.25s cubic-bezier(0.4,0,0.2,1);z-index:200;
        }
        .header-compact .compact-group.open .compact-dropdown {
            opacity:1;visibility:visible;pointer-events:auto;transform:translateY(0);
        }

        /* Header 3: Center - logo centered, menu below */
        .header-center .center-logo-row {
            display:flex;align-items:center;justify-content:center;padding:12px 0 4px;
        }
        .header-center .center-menu-row {
            display:flex;align-items:center;justify-content:center;gap:2px;padding:4px 0 8px;
            flex-wrap:nowrap;overflow-x:auto;scrollbar-width:none;
        }
        .header-center .center-menu-row::-webkit-scrollbar { display:none }

        /* Header 4: Carousel Paginated */
        .header-carousel .carousel-track {
            display:flex;align-items:center;gap:2px;
            transition:all 0.4s cubic-bezier(0.4,0,0.2,1);
        }
        .header-carousel .carousel-item {
            opacity:0;transform:translateY(8px) scale(0.95);
            animation:carouselItemIn 0.4s cubic-bezier(0.16,1,0.3,1) forwards;
        }
        .header-carousel .carousel-item:nth-child(1) { animation-delay:0s }
        .header-carousel .carousel-item:nth-child(2) { animation-delay:0.05s }
        .header-carousel .carousel-item:nth-child(3) { animation-delay:0.1s }
        .header-carousel .carousel-item:nth-child(4) { animation-delay:0.15s }
        .header-carousel .carousel-item:nth-child(5) { animation-delay:0.2s }
        @keyframes carouselItemIn {
            to { opacity:1;transform:translateY(0) scale(1) }
        }
        .header-carousel .carousel-nav-pill {
            display:inline-flex;align-items:center;gap:4px;
            background:rgba(4,31,77,0.7);border:1px solid rgba(51,153,255,0.15);
            border-radius:20px;padding:5px 8px;
            backdrop-filter:blur(8px);
        }
        .header-carousel .carousel-dot {
            width:7px;height:7px;border-radius:50%;
            background:rgba(51,153,255,0.2);border:1px solid rgba(51,153,255,0.15);
            cursor:pointer;transition:all 0.3s;
        }
        .header-carousel .carousel-dot:hover {
            background:rgba(51,153,255,0.4);transform:scale(1.2);
        }
        .header-carousel .carousel-dot.aktif {
            background:linear-gradient(135deg,#3399FF,#8B5CF6);
            border-color:transparent;width:20px;border-radius:10px;
            box-shadow:0 0 10px rgba(51,153,255,0.4);
        }
        .header-carousel .carousel-arrow {
            display:flex;align-items:center;justify-content:center;
            width:24px;height:24px;border-radius:50%;
            background:rgba(51,153,255,0.08);border:1px solid rgba(51,153,255,0.15);
            color:#5CADFF;cursor:pointer;transition:all 0.25s;flex-shrink:0;
        }
        .header-carousel .carousel-arrow:hover:not(:disabled) {
            background:linear-gradient(135deg,rgba(51,153,255,0.25),rgba(139,92,246,0.2));
            color:#fff;transform:scale(1.1);border-color:rgba(92,173,255,0.4);
        }
        .header-carousel .carousel-arrow:disabled { opacity:0.2;cursor:not-allowed }
        .header-carousel .carousel-semua {
            display:flex;align-items:center;gap:5px;padding:5px 12px;
            font-size:11px;font-weight:700;color:#fff;
            border-radius:20px;border:none;
            background:linear-gradient(135deg,rgba(51,153,255,0.2),rgba(139,92,246,0.2));
            transition:all 0.3s;white-space:nowrap;
            text-transform:uppercase;letter-spacing:0.04em;
            cursor:pointer;position:relative;overflow:hidden;
        }
        .header-carousel .carousel-semua::before {
            content:'';position:absolute;inset:0;border-radius:20px;
            border:1px solid rgba(92,173,255,0.25);
            transition:border-color 0.3s;
        }
        .header-carousel .carousel-semua:hover {
            background:linear-gradient(135deg,rgba(51,153,255,0.35),rgba(139,92,246,0.3));
            transform:translateY(-1px);box-shadow:0 4px 15px rgba(51,153,255,0.2);
        }
        .header-carousel .carousel-semua:hover::before {
            border-color:rgba(92,173,255,0.5);
        }
        .header-carousel .carousel-badge {
            font-size:9px;font-weight:800;padding:2px 6px;border-radius:8px;
            background:linear-gradient(135deg,#3399FF,#8B5CF6);color:#fff;
            line-height:1;
        }

        /* Header style preview cards */
        .header-style-card {
            padding:10px;border-radius:12px;border:2px solid rgba(51,153,255,0.1);
            background:rgba(4,31,77,0.3);cursor:pointer;transition:all 0.25s;text-align:center;
        }
        .header-style-card:hover { border-color:rgba(51,153,255,0.3);background:rgba(51,153,255,0.08) }
        .header-style-card.aktif { border-color:#5CADFF;background:rgba(51,153,255,0.15);box-shadow:0 0 20px rgba(51,153,255,0.15) }
        .header-style-card .preview-bar {
            height:32px;border-radius:6px;background:rgba(2,16,41,0.8);border:1px solid rgba(51,153,255,0.1);
            margin-bottom:6px;display:flex;align-items:center;padding:0 6px;gap:3px;overflow:hidden;
        }

        /* ===== NAVIGATION DROPDOWNS ===== */
        .nav-row { display:flex;align-items:center;width:100% }
        .nav-item { position:relative;flex:1;min-width:0 }
        .nav-link {
            display:flex;align-items:center;justify-content:center;gap:5px;padding:8px 6px;font-size:11.5px;font-weight:600;
            color:rgba(209,213,219,1);border-radius:10px;white-space:nowrap;transition:all 0.2s;
            text-transform:uppercase;letter-spacing:0.03em;width:100%;
        }
        @media(min-width:1280px) { .nav-link { font-size:12.5px;padding:8px 10px;gap:6px } }
        /* Nav page arrow buttons */
        .nav-page-arrow {
            display:flex;align-items:center;justify-content:center;
            width:28px;height:28px;border-radius:8px;
            background:rgba(51,153,255,0.08);border:1px solid rgba(51,153,255,0.15);
            color:#5CADFF;cursor:pointer;transition:all 0.25s;flex-shrink:0;
        }
        .nav-dot { width:6px;height:6px;border-radius:50%;background:rgba(92,173,255,0.2);transition:all 0.3s;cursor:pointer }
        .nav-dot.aktif { background:#5CADFF;width:18px;border-radius:4px }
        .nav-dot:hover:not(.aktif) { background:rgba(92,173,255,0.45) }
        /* Nav page number buttons (replaces dots) */
        .nav-page-num {
            width:24px;height:24px;border-radius:7px;font-size:10px;font-weight:700;
            display:flex;align-items:center;justify-content:center;cursor:pointer;
            background:rgba(51,153,255,0.06);color:#6b7280;border:1px solid rgba(51,153,255,0.1);
            transition:all 0.2s;flex-shrink:0;
        }
        .nav-page-num:hover { background:rgba(51,153,255,0.15);color:#93c5fd;border-color:rgba(51,153,255,0.3) }
        .nav-page-num.aktif {
            background:linear-gradient(135deg,#3399FF,#8B5CF6);color:#fff;
            border-color:transparent;box-shadow:0 2px 8px rgba(51,153,255,0.3);
        }
        /* Editable page input */
        .nav-page-input {
            width:52px;height:26px;text-align:center;font-size:11px;font-weight:700;
            background:rgba(51,153,255,0.08);border:1px solid rgba(51,153,255,0.2);
            color:#5CADFF;border-radius:8px;outline:none;cursor:pointer;
            transition:all 0.2s;
        }
        .nav-page-input:focus { border-color:#5CADFF;background:rgba(51,153,255,0.15);box-shadow:0 0 10px rgba(51,153,255,0.2) }
        .nav-page-input:hover { border-color:rgba(51,153,255,0.35) }
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
        @media(max-width:1279px) { .nav-link .chevron-icon { display:none } .nav-link i:first-child { display:none } }
        .nav-item.dropdown-open > .nav-link .chevron-icon { transform:rotate(180deg) }

        /* Primary dropdown (Level 1) */
        .nav-dropdown {
            position:absolute;top:100%;left:0;min-width:260px;
            opacity:0;visibility:hidden;pointer-events:none;
            transform:translateY(-4px);transition:all 0.25s cubic-bezier(0.4,0,0.2,1);
            z-index:200;padding-top:4px;
        }
        /* Auto-flip dropdown ke kanan jika terlalu dekat tepi kanan */
        .nav-dropdown.dropdown-flip-right {
            left:auto;right:0;
        }
        /* Auto-flip dropdown ke kiri jika terlalu dekat tepi kiri */
        .nav-dropdown.dropdown-flip-left {
            left:0;right:auto;
        }
        /* Clamp dropdown agar tidak keluar viewport */
        .nav-dropdown.dropdown-clamped {
            left:auto;right:auto;
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

        /* ==================== K-ARMA AI WIDGET ==================== */
        .kuro-ai-toggle {
            position:fixed;bottom:24px;left:24px;z-index:60;width:64px;height:64px;
            border-radius:50%;display:flex;align-items:center;justify-content:center;
            background:none !important;
            background-color:transparent !important;
            box-shadow:none !important;
            cursor:pointer;transition:all 0.4s cubic-bezier(0.34,1.56,0.64,1);
            animation:none;
            border:none !important;
            outline:none !important;
            overflow:visible;
            padding:0;
            -webkit-appearance:none;
            appearance:none;
        }
        .kuro-ai-toggle:hover {
            transform:scale(1.12) rotate(-5deg);
            box-shadow:none !important;
        }
        .kuro-ai-toggle:focus {
            outline:none !important;
            box-shadow:none !important;
        }
        .kuro-ai-toggle.chat-open {
            transform:scale(0.9);
            border-radius:50%;
            animation:none;
        }
        .kuro-ai-toggle img {
            width:64px;height:64px;object-fit:contain;border-radius:0;
            filter:drop-shadow(0 4px 12px rgba(0,0,0,0.5));
            background:transparent !important;
        }
        @keyframes kuroPulse {
            0%,100% { box-shadow:0 8px 32px rgba(255,77,109,0.35),0 0 0 0 rgba(255,77,109,0.3) }
            50% { box-shadow:0 8px 32px rgba(255,77,109,0.35),0 0 0 10px rgba(255,77,109,0) }
        }
        @keyframes kuroFloat {
            0%,100% { transform:translateY(0) }
            50% { transform:translateY(-6px) }
        }

        /* K-Arma Chat Panel */
        .kuro-chat-panel {
            position:fixed;bottom:96px;left:24px;z-index:59;
            width:380px;max-height:520px;
            background:rgba(4,16,41,0.97);
            backdrop-filter:blur(24px);
            border-radius:24px;
            border:1px solid rgba(255,77,109,0.2);
            box-shadow:0 24px 80px rgba(0,0,0,0.6),0 0 60px rgba(255,77,109,0.08);
            display:flex;flex-direction:column;
            opacity:0;transform:translateY(20px) scale(0.95);
            pointer-events:none;
            transition:all 0.4s cubic-bezier(0.34,1.56,0.64,1);
        }
        .kuro-chat-panel.open {
            opacity:1;transform:translateY(0) scale(1);pointer-events:auto;
        }
        .kuro-chat-header {
            padding:16px 20px;
            background:linear-gradient(135deg,rgba(255,77,109,0.15),rgba(192,132,252,0.1));
            border-bottom:1px solid rgba(255,77,109,0.1);
            border-radius:24px 24px 0 0;
            display:flex;align-items:center;gap:12px;
        }
        .kuro-chat-header .kuro-avatar {
            width:40px;height:40px;border-radius:12px;
            background:transparent;
            display:flex;align-items:center;justify-content:center;
            font-size:20px;
            overflow:hidden;
        }
        .kuro-chat-header .kuro-avatar img {
            width:100%;height:100%;object-fit:cover;
        }
        .kuro-chat-body {
            flex:1;overflow-y:auto;padding:16px;
            max-height:340px;min-height:200px;
            scrollbar-width:thin;scrollbar-color:rgba(255,77,109,0.3) transparent;
        }
        .kuro-chat-body::-webkit-scrollbar { width:4px }
        .kuro-chat-body::-webkit-scrollbar-thumb { background:rgba(255,77,109,0.3);border-radius:4px }
        .kuro-msg { margin-bottom:12px;display:flex;gap:8px;animation:kuroMsgIn 0.3s ease }
        .kuro-msg.user { flex-direction:row-reverse }
        .kuro-msg-bubble {
            max-width:80%;padding:10px 14px;border-radius:16px;font-size:13px;line-height:1.5;
        }
        .kuro-msg.bot .kuro-msg-bubble {
            background:rgba(255,77,109,0.1);color:#e2e8f0;
            border:1px solid rgba(255,77,109,0.1);border-bottom-left-radius:4px;
        }
        .kuro-msg.user .kuro-msg-bubble {
            background:linear-gradient(135deg,#3399FF,#8B5CF6);color:#fff;
            border-bottom-right-radius:4px;
        }
        .kuro-msg-avatar {
            width:28px;height:28px;border-radius:8px;flex-shrink:0;
            overflow:hidden;background:transparent;
        }
        .kuro-msg-avatar img { width:100%;height:100%;object-fit:cover }
        .karma-intro-card {
            margin-top:8px;padding:10px;border-radius:12px;
            background:linear-gradient(135deg,rgba(255,77,109,0.08),rgba(192,132,252,0.06));
            border:1px solid rgba(255,77,109,0.12);
            display:flex;align-items:center;gap:10px;
        }
        .karma-intro-card img {
            width:64px;height:auto;border-radius:10px;flex-shrink:0;
        }
        .karma-intro-card .karma-intro-info {
            font-size:11px;color:#94a3b8;line-height:1.5;
        }
        .karma-intro-card .karma-intro-info strong { color:#e2e8f0;font-size:12px }
        .karma-tools-grid {
            display:grid;grid-template-columns:1fr 1fr;gap:4px;margin-top:8px;
        }
        .karma-tool-chip {
            font-size:10px;padding:5px 8px;border-radius:8px;
            background:rgba(255,255,255,0.04);border:1px solid rgba(255,255,255,0.06);
            color:#94a3b8;display:flex;align-items:center;gap:4px;
            transition:all 0.2s;cursor:default;
        }
        .karma-tool-chip:hover { background:rgba(255,77,109,0.08);border-color:rgba(255,77,109,0.15);color:#e2e8f0 }
        .karma-tool-chip i { font-size:10px }
        .karma-attach-bar {
            display:flex;align-items:center;gap:2px;
        }
        .karma-attach-btn {
            width:32px;height:32px;border-radius:8px;display:flex;align-items:center;justify-content:center;
            color:#64748b;cursor:pointer;transition:all 0.2s;border:none;background:none;font-size:13px;
        }
        .karma-attach-btn:hover { color:#FF4D6D;background:rgba(255,77,109,0.08) }
        @keyframes kuroMsgIn { from{opacity:0;transform:translateY(8px)} to{opacity:1;transform:translateY(0)} }

        .kuro-chat-footer {
            padding:12px 16px;
            border-top:1px solid rgba(255,77,109,0.1);
            display:flex;align-items:center;gap:8px;
        }
        .kuro-chat-footer input {
            flex:1;background:rgba(255,255,255,0.06);border:1px solid rgba(255,77,109,0.15);
            border-radius:12px;padding:10px 14px;color:#e2e8f0;font-size:13px;
            outline:none;transition:border-color 0.3s;
        }
        .kuro-chat-footer input:focus { border-color:rgba(255,77,109,0.4) }
        .kuro-chat-footer input::placeholder { color:#64748b }
        .kuro-chat-send {
            width:38px;height:38px;border-radius:12px;
            background:linear-gradient(135deg,#FF4D6D,#C084FC);
            display:flex;align-items:center;justify-content:center;
            color:#fff;cursor:pointer;transition:all 0.3s;flex-shrink:0;
            border:none;
        }
        .kuro-chat-send:hover { transform:scale(1.05);box-shadow:0 4px 16px rgba(255,77,109,0.3) }
        .kuro-chat-send:disabled { opacity:0.5;cursor:not-allowed;transform:none }
        .kuro-typing {
            display:flex;gap:4px;padding:8px 14px;
        }
        .kuro-typing span {
            width:6px;height:6px;border-radius:50%;background:#FF4D6D;
            animation:kuroTyping 1.4s ease-in-out infinite;
        }
        .kuro-typing span:nth-child(2) { animation-delay:0.2s }
        .kuro-typing span:nth-child(3) { animation-delay:0.4s }
        @keyframes kuroTyping {
            0%,100% { opacity:0.3;transform:scale(0.8) }
            50% { opacity:1;transform:scale(1.2) }
        }

        /* ==================== MULTI-AI PROVIDER PANEL ==================== */
        .kuro-provider-panel {
            max-height:0;overflow:hidden;
            background:rgba(4,16,41,0.95);
            border-bottom:1px solid rgba(139,92,246,0.1);
            transition:max-height 0.35s cubic-bezier(0.4,0,0.2,1);
        }
        .kuro-provider-panel.open { max-height:250px }
        .kuro-provider-grid {
            display:grid;grid-template-columns:repeat(5,1fr);gap:4px;
        }
        .kuro-provider-card {
            display:flex;flex-direction:column;align-items:center;gap:3px;
            padding:8px 4px;border-radius:10px;cursor:pointer;
            background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.06);
            transition:all 0.25s;position:relative;
        }
        .kuro-provider-card:hover {
            background:rgba(139,92,246,0.08);border-color:rgba(139,92,246,0.2);transform:translateY(-1px);
        }
        .kuro-provider-card.active {
            background:rgba(139,92,246,0.12);border-color:rgba(139,92,246,0.4);
            box-shadow:0 0 12px rgba(139,92,246,0.15);
        }
        .kuro-provider-card.active::after {
            content:'';position:absolute;top:3px;right:3px;
            width:6px;height:6px;border-radius:50%;background:#22c55e;
            box-shadow:0 0 6px rgba(34,197,94,0.5);
        }
        .kuro-provider-card.unavailable {
            opacity:0.4;cursor:not-allowed;
        }
        .kuro-provider-card i { font-size:16px }
        .kuro-provider-name { font-size:9px;color:#94a3b8;font-weight:600;white-space:nowrap }
        .kuro-provider-badge {
            font-size:7px;padding:1px 4px;border-radius:4px;font-weight:700;
            text-transform:uppercase;letter-spacing:0.5px;line-height:1.3;
        }
        .kuro-provider-badge.gratis { background:rgba(34,197,94,0.15);color:#4ade80 }
        .kuro-provider-badge.lokal { background:rgba(59,130,246,0.15);color:#60a5fa }
        .kuro-custom-key-panel {
            max-height:0;overflow:hidden;transition:max-height 0.3s ease;
            border-top:1px solid rgba(139,92,246,0.08);
        }
        .kuro-custom-key-panel.open { max-height:120px }
        .kuro-provider-info {
            display:flex;align-items:center;gap:6px;
            padding:4px 8px;margin:8px 12px 4px;border-radius:8px;
            background:rgba(139,92,246,0.06);border:1px solid rgba(139,92,246,0.1);
            font-size:10px;color:#a78bfa;
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

    {{-- ==================== HEADER 1: DEFAULT (Split 2-Row: Top=Auth, Bottom=Menu) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 header-block header-aktif" id="navbar" data-header="1">

        {{-- ===== TOP ROW: Logo + Search + Notification + Auth ===== --}}
        <div class="kaca-nav border-b border-kvt-700/10">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-5">
                <div class="flex items-center h-[56px]">

                    {{-- Logo --}}
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 shrink-0 mr-4 group">
                        <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg shadow-kvt-500/20 group-hover:shadow-kvt-500/40 transition-shadow animate-glow">
                            <span class="text-white font-black text-lg tracking-tight">K</span>
                        </div>
                        <div class="leading-tight">
                            <span class="text-lg font-extrabold tracking-tight">
                                <span class="text-white">KVT</span><span class="text-kvt-400">Hub</span>
                            </span>
                            <span class="block text-[9px] text-gray-500 tracking-[0.15em] font-semibold">GLOBAL EDUCATION</span>
                        </div>
                    </a>

                    {{-- Spacer --}}
                    <div class="flex-1"></div>

                    {{-- Right Controls: Search, Notif, Auth --}}
                    <div class="hidden lg:flex items-center gap-1.5 shrink-0">
                        {{-- Search --}}
                        <button onclick="bukaSearch()" class="w-9 h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/50 transition" title="Cari (Ctrl+K)">
                            <i class="fas fa-search text-sm"></i>
                        </button>

                        {{-- Nav Controls: Arrows + Page Numbers + Lainnya --}}
                        <div class="flex items-center gap-1 shrink-0">
                            <button onclick="navMundur()" class="nav-page-arrow" title="Menu sebelumnya" id="navBtnPrevTop">
                                <i class="fas fa-chevron-left text-[9px]"></i>
                            </button>
                            <div class="flex items-center gap-0.5 px-0.5" id="navPageNumsTop"></div>
                            <button onclick="navMaju()" class="nav-page-arrow" title="Menu berikutnya" id="navBtnNextTop">
                                <i class="fas fa-chevron-right text-[9px]"></i>
                            </button>
                            <button onclick="bukaSemuaMenu()" class="btn-semua-menu ml-0.5" title="Semua menu & kustomisasi">
                                <i class="fas fa-th-large text-[11px]"></i>
                                <span class="hidden xl:inline">Lainnya</span>
                            </button>
                            <input type="text" class="nav-page-input" id="navPageInputTop" value="1/3" title="Ketik halaman tujuan, misal: 3 lalu Enter" onclick="this.select()" onkeydown="navInputKeydown(event, this)">
                        </div>

                        {{-- Toggle: K-Arma AI --}}
                        <button onclick="toggleKuroVisibility()" class="w-9 h-9 rounded-xl flex items-center justify-center transition relative group" id="toggleKuroBtn" title="Tampilkan/Sembunyikan K-Arma AI" style="color:#FF4D6D;background:rgba(255,77,109,0.1)">
                            <i class="fas fa-robot text-sm"></i>
                            <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-green-500 border border-kvt-950" id="kuroStatusDot"></span>
                        </button>

                        {{-- Toggle: Settings --}}
                        <button onclick="toggleSettingsVisibility()" class="w-9 h-9 rounded-xl flex items-center justify-center transition relative group" id="toggleSettingsBtn" title="Tampilkan/Sembunyikan Tombol Settings" style="color:#3399FF;background:rgba(51,153,255,0.1)">
                            <i class="fas fa-cog text-sm"></i>
                            <span class="absolute -top-1 -right-1 w-3 h-3 rounded-full bg-green-500 border border-kvt-950" id="settingsStatusDot"></span>
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
                                    <a href="{{ route('berita.index') }}" class="text-[11px] text-kvt-400 hover:text-kvt-300 transition font-semibold"><i class="fas fa-arrow-right mr-1"></i> Lihat semua berita & notifikasi</a>
                                </div>
                            </div>
                        </div>

                        <div class="w-px h-6 bg-kvt-700/30 mx-1.5"></div>

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
                    <button onclick="toggleMobile()" class="lg:hidden ml-2 w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                        <i class="fas fa-bars text-lg"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- ===== BOTTOM ROW: Menu Navigation (separate bar) ===== --}}
        <div class="hidden lg:block kaca-nav border-b border-kvt-700/10" id="navMenuBar">
            <div class="max-w-[1600px] mx-auto px-4 sm:px-5">
                <div class="flex items-center h-[46px]">
                    {{-- All Menu Items - Single Row with Pagination --}}
                    <div class="flex items-center flex-1 relative" id="navMenuWrapper">

                    {{-- Left Arrow (hidden - moved to top row) --}}
                    <button onclick="navMundur()" class="nav-page-arrow shrink-0 mr-1.5 hidden" title="Menu sebelumnya" id="navBtnPrev">
                        <i class="fas fa-chevron-left text-[9px]"></i>
                    </button>

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
                            <div class="nav-dropdown-inner nav-dropdown-mega" style="min-width:680px">
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

                                    {{-- Column 2: Pendidikan Tinggi --}}
                                    <div>
                                        <div class="dropdown-section-title">Pendidikan Tinggi</div>
                                        <a href="{{ route('halaman.pendidikan-tinggi.diploma') }}" class="dropdown-item">
                                            <div class="item-icon bg-cyan-500/10"><i class="fas fa-certificate text-cyan-400"></i></div>
                                            <div class="item-text"><div class="item-title">Diploma (D1-D4)</div><div class="item-desc">Vokasi & terapan</div></div>
                                        </a>

                                        {{-- Sarjana S1 with Prodi --}}
                                        <div class="has-submenu">
                                            <div class="dropdown-item">
                                                <div class="item-icon bg-blue-500/10"><i class="fas fa-user-graduate text-blue-400"></i></div>
                                                <div class="item-text"><div class="item-title">Sarjana (S1)</div><div class="item-desc">Program studi sarjana</div></div>
                                            </div>
                                            <div class="sub-dropdown">
                                                <div class="sub-dropdown-inner" style="min-width:320px;max-height:70vh;overflow-y:auto">
                                                    <a href="{{ route('halaman.pendidikan-tinggi.sarjana') }}" class="sub-dropdown-item"><i class="fas fa-graduation-cap text-blue-400"></i> <strong>Semua Prodi S1</strong></a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <div style="padding:2px 12px;font-size:10px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px">Teknik & IT</div>
                                                    <a href="{{ route('halaman.teknik-informatika') }}" class="sub-dropdown-item"><i class="fas fa-code text-cyan-400"></i> Teknik Informatika</a>
                                                    <a href="{{ route('halaman.sistem-informasi') }}" class="sub-dropdown-item"><i class="fas fa-database text-blue-400"></i> Sistem Informasi</a>
                                                    <a href="{{ route('halaman.teknik-sipil') }}" class="sub-dropdown-item"><i class="fas fa-hard-hat text-orange-400"></i> Teknik Sipil</a>
                                                    <a href="{{ route('halaman.teknik-mesin') }}" class="sub-dropdown-item"><i class="fas fa-cogs text-gray-400"></i> Teknik Mesin</a>
                                                    <a href="{{ route('halaman.teknik-elektro') }}" class="sub-dropdown-item"><i class="fas fa-bolt text-yellow-400"></i> Teknik Elektro</a>
                                                    <a href="{{ route('halaman.arsitektur') }}" class="sub-dropdown-item"><i class="fas fa-drafting-compass text-amber-400"></i> Arsitektur</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <div style="padding:2px 12px;font-size:10px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px">Kesehatan</div>
                                                    <a href="{{ route('halaman.kedokteran') }}" class="sub-dropdown-item"><i class="fas fa-stethoscope text-red-400"></i> Kedokteran</a>
                                                    <a href="{{ route('halaman.farmasi') }}" class="sub-dropdown-item"><i class="fas fa-pills text-green-400"></i> Farmasi</a>
                                                    <a href="{{ route('halaman.keperawatan') }}" class="sub-dropdown-item"><i class="fas fa-heartbeat text-pink-400"></i> Keperawatan</a>
                                                    <a href="{{ route('halaman.gizi-kesehatan') }}" class="sub-dropdown-item"><i class="fas fa-apple-alt text-lime-400"></i> Gizi & Kesehatan</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <div style="padding:2px 12px;font-size:10px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px">Bisnis & Sosial</div>
                                                    <a href="{{ route('halaman.manajemen-bisnis') }}" class="sub-dropdown-item"><i class="fas fa-chart-line text-emerald-400"></i> Manajemen Bisnis</a>
                                                    <a href="{{ route('halaman.hubungan-internasional') }}" class="sub-dropdown-item"><i class="fas fa-globe text-indigo-400"></i> Hubungan Internasional</a>
                                                    <a href="{{ route('halaman.administrasi-publik') }}" class="sub-dropdown-item"><i class="fas fa-landmark text-purple-400"></i> Administrasi Publik</a>
                                                    <a href="{{ route('halaman.ekonomi-keuangan') }}" class="sub-dropdown-item"><i class="fas fa-chart-line text-green-400"></i> Ekonomi & Keuangan</a>
                                                    <a href="{{ route('halaman.hukum-regulasi') }}" class="sub-dropdown-item"><i class="fas fa-balance-scale text-yellow-400"></i> Hukum</a>
                                                    <a href="{{ route('halaman.psikologi-pendidikan') }}" class="sub-dropdown-item"><i class="fas fa-brain text-pink-400"></i> Psikologi</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <div style="padding:2px 12px;font-size:10px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px">Seni & Kreatif</div>
                                                    <a href="{{ route('halaman.desain-grafis') }}" class="sub-dropdown-item"><i class="fas fa-palette text-pink-400"></i> Desain Grafis</a>
                                                    <a href="{{ route('halaman.fotografi') }}" class="sub-dropdown-item"><i class="fas fa-camera text-amber-400"></i> Fotografi</a>
                                                    <a href="{{ route('halaman.videografi') }}" class="sub-dropdown-item"><i class="fas fa-film text-red-400"></i> Videografi</a>
                                                    <a href="{{ route('halaman.musik-digital') }}" class="sub-dropdown-item"><i class="fas fa-music text-violet-400"></i> Musik Digital</a>
                                                    <a href="{{ route('halaman.animasi-3d') }}" class="sub-dropdown-item"><i class="fas fa-cube text-cyan-400"></i> Animasi 3D</a>
                                                    <a href="{{ route('halaman.bahasa-asing') }}" class="sub-dropdown-item"><i class="fas fa-language text-blue-400"></i> Bahasa Asing</a>
                                                    <a href="{{ route('halaman.sastra-budaya') }}" class="sub-dropdown-item"><i class="fas fa-book-open text-amber-400"></i> Sastra & Budaya</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <div style="padding:2px 12px;font-size:10px;color:#6b7280;font-weight:600;text-transform:uppercase;letter-spacing:0.5px">Hospitality & Lainnya</div>
                                                    <a href="{{ route('halaman.pariwisata') }}" class="sub-dropdown-item"><i class="fas fa-map-marked-alt text-cyan-400"></i> Pariwisata</a>
                                                    <a href="{{ route('halaman.perhotelan') }}" class="sub-dropdown-item"><i class="fas fa-hotel text-purple-400"></i> Perhotelan</a>
                                                    <a href="{{ route('halaman.tata-boga') }}" class="sub-dropdown-item"><i class="fas fa-utensils text-orange-400"></i> Tata Boga</a>
                                                    <a href="{{ route('halaman.olahraga') }}" class="sub-dropdown-item"><i class="fas fa-running text-blue-400"></i> Olahraga</a>
                                                    <a href="{{ route('halaman.lingkungan-hidup') }}" class="sub-dropdown-item"><i class="fas fa-tree text-green-400"></i> Lingkungan Hidup</a>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Magister S2 with Prodi --}}
                                        <div class="has-submenu">
                                            <div class="dropdown-item">
                                                <div class="item-icon bg-purple-500/10"><i class="fas fa-flask text-purple-400"></i></div>
                                                <div class="item-text"><div class="item-title">Magister (S2)</div><div class="item-desc">Program studi magister</div></div>
                                            </div>
                                            <div class="sub-dropdown">
                                                <div class="sub-dropdown-inner" style="min-width:250px">
                                                    <a href="{{ route('halaman.pendidikan-tinggi.magister') }}" class="sub-dropdown-item"><i class="fas fa-graduation-cap text-purple-400"></i> Semua Prodi S2</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <a href="{{ route('halaman.teknik-informatika') }}" class="sub-dropdown-item"><i class="fas fa-code text-cyan-400"></i> M.T. Informatika</a>
                                                    <a href="{{ route('halaman.manajemen-bisnis') }}" class="sub-dropdown-item"><i class="fas fa-chart-line text-emerald-400"></i> M.M. Manajemen</a>
                                                    <a href="{{ route('halaman.kedokteran') }}" class="sub-dropdown-item"><i class="fas fa-stethoscope text-red-400"></i> M.Ked. Kedokteran</a>
                                                    <a href="{{ route('halaman.arsitektur') }}" class="sub-dropdown-item"><i class="fas fa-drafting-compass text-amber-400"></i> M.Ars. Arsitektur</a>
                                                    <a href="{{ route('halaman.hubungan-internasional') }}" class="sub-dropdown-item"><i class="fas fa-globe text-indigo-400"></i> M.A. Hubungan Internasional</a>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Doktoral S3 --}}
                                        <div class="has-submenu">
                                            <div class="dropdown-item">
                                                <div class="item-icon bg-red-500/10"><i class="fas fa-atom text-red-400"></i></div>
                                                <div class="item-text"><div class="item-title">Doktoral (S3/PhD)</div><div class="item-desc">Program doktor & riset</div></div>
                                            </div>
                                            <div class="sub-dropdown">
                                                <div class="sub-dropdown-inner" style="min-width:240px">
                                                    <a href="{{ route('halaman.pendidikan-tinggi.doktoral') }}" class="sub-dropdown-item"><i class="fas fa-graduation-cap text-red-400"></i> Semua Prodi S3</a>
                                                    <div style="height:1px;background:rgba(51,153,255,0.1);margin:4px 8px"></div>
                                                    <a href="{{ route('halaman.teknik-informatika') }}" class="sub-dropdown-item"><i class="fas fa-code text-cyan-400"></i> Dr. Ilmu Komputer</a>
                                                    <a href="{{ route('halaman.kedokteran') }}" class="sub-dropdown-item"><i class="fas fa-stethoscope text-red-400"></i> Dr. Kedokteran</a>
                                                    <a href="{{ route('halaman.hubungan-internasional') }}" class="sub-dropdown-item"><i class="fas fa-globe text-indigo-400"></i> Dr. Ilmu Politik</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Column 3: Program Lanjutan --}}
                                    <div>
                                        <div class="dropdown-section-title">Program Lanjutan</div>
                                        <a href="{{ route('halaman.pendidikan-tinggi.post-doktoral') }}" class="dropdown-item">
                                            <div class="item-icon bg-teal-500/10"><i class="fas fa-microscope text-teal-400"></i></div>
                                            <div class="item-text"><div class="item-title">Post-Doctoral</div><div class="item-desc">Riset lanjutan pasca doktor</div></div>
                                        </a>
                                        <a href="{{ route('halaman.pendidikan-tinggi.profesi') }}" class="dropdown-item">
                                            <div class="item-icon bg-amber-500/10"><i class="fas fa-briefcase text-amber-400"></i></div>
                                            <div class="item-text"><div class="item-title">Profesi</div><div class="item-desc">Dokter, Apoteker, dll</div></div>
                                        </a>

                                        <div class="dropdown-divider"></div>

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
                                                <p class="text-[11px] text-gray-400"><i class="fas fa-info-circle text-kvt-400 mr-1"></i> 13 jenjang dari TK hingga S3 dengan 30+ program studi</p>
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
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="langganan">
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
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="sumberdaya">
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
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="keamanan">
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
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="kurikulum">
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
                                <div class="item-text"><div class="item-title">Kalender Akademik</div><div class="item-desc">Jadwal & event 2026/2027</div></div>
                            </a>
                            <a href="{{ route('halaman.kurikulum.learning-outcomes') }}" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-bullseye text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Learning Outcomes</div><div class="item-desc">Capaian pembelajaran KKNI</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 15. Panduan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="1" data-nav-id="panduan">
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

                    {{-- 16. Staff --}}
                    <div class="nav-item nav-menu-item" data-nav-page="2" data-nav-id="staff">
                    <button class="nav-link" data-dropdown>
                        <i class="fas fa-user-tie text-orange-400"></i> Staff
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown">
                        <div class="nav-dropdown-inner" style="min-width:320px">
                            <div class="dropdown-section-title">Kepengurusan</div>
                            <a href="/staff-hub" class="dropdown-item">
                                <div class="item-icon bg-orange-500/10"><i class="fas fa-users-cog text-orange-400"></i></div>
                                <div class="item-text"><div class="item-title">Pengurus Aktif</div><div class="item-desc">Struktur kepengurusan saat ini</div></div>
                            </a>
                            <a href="/staff-hub#alumni" class="dropdown-item">
                                <div class="item-icon bg-amber-500/10"><i class="fas fa-user-graduate text-amber-400"></i></div>
                                <div class="item-text"><div class="item-title">Alumni Pengurus</div><div class="item-desc">Daftar pengurus periode lalu</div></div>
                            </a>
                            <a href="/staff-hub#divisi" class="dropdown-item">
                                <div class="item-icon bg-blue-500/10"><i class="fas fa-sitemap text-blue-400"></i></div>
                                <div class="item-text"><div class="item-title">Divisi & Departemen</div><div class="item-desc">Unit kerja & bidang</div></div>
                            </a>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-section-title">Informasi</div>
                            <a href="/staff-hub#struktur" class="dropdown-item">
                                <div class="item-icon bg-green-500/10"><i class="fas fa-project-diagram text-green-400"></i></div>
                                <div class="item-text"><div class="item-title">Struktur Organisasi</div><div class="item-desc">Bagan & hierarki jabatan</div></div>
                            </a>
                            <a href="/staff-hub#riwayat" class="dropdown-item">
                                <div class="item-icon bg-purple-500/10"><i class="fas fa-history text-purple-400"></i></div>
                                <div class="item-text"><div class="item-title">Riwayat Kepengurusan</div><div class="item-desc">Arsip periode sebelumnya</div></div>
                            </a>
                            <a href="/staff-hub#rekrutmen" class="dropdown-item">
                                <div class="item-icon bg-pink-500/10"><i class="fas fa-user-plus text-pink-400"></i></div>
                                <div class="item-text"><div class="item-title">Rekrutmen Staff</div><div class="item-desc">Lowongan posisi & pendaftaran</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- 17. Media --}}
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

                    {{-- 41. Repositori --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="repositori">
                    <button class="nav-link" data-dropdown>
                        <i class="fab fa-github text-gray-300"></i> Repositori
                        <i class="fas fa-chevron-down chevron-icon"></i>
                    </button>
                    <div class="nav-dropdown dropdown-right">
                        <div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.repositori') }}" class="dropdown-item">
                                <div class="item-icon bg-gray-500/10"><i class="fab fa-github text-gray-300"></i></div>
                                <div class="item-text"><div class="item-title">Repositori Proyek</div><div class="item-desc">Source code & update</div></div>
                            </a>
                            <a href="{{ route('halaman.repositori') }}#changelog" class="dropdown-item">
                                <div class="item-icon bg-emerald-500/10"><i class="fas fa-history text-emerald-400"></i></div>
                                <div class="item-text"><div class="item-title">Changelog</div><div class="item-desc">Riwayat versi & update</div></div>
                            </a>
                            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="dropdown-item">
                                <div class="item-icon bg-kvt-500/10"><i class="fas fa-external-link-alt text-kvt-400"></i></div>
                                <div class="item-text"><div class="item-title">GitHub</div><div class="item-desc">Buka di GitHub</div></div>
                            </a>
                        </div>
                    </div>
                </div>

                    {{-- ============================================================ --}}
                    {{-- MENU 42-100: EKOSISTEM LENGKAP (Folder-based structure)       --}}
                    {{-- ============================================================ --}}

                    {{-- === FOLDER: INOVASI & STARTUP (Hal 5) === --}}

                    {{-- 42. Inkubator --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="inkubator">
                        <button class="nav-link" data-dropdown><i class="fas fa-rocket text-orange-400"></i> Inkubator <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.inkubator') }}" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-rocket text-orange-400"></i></div><div class="item-text"><div class="item-title">Program Inkubator</div><div class="item-desc">Inkubasi ide jadi produk</div></div></a>
                            <a href="{{ route('halaman.inkubator') }}#pendaftaran" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-clipboard-list text-yellow-400"></i></div><div class="item-text"><div class="item-title">Pendaftaran</div><div class="item-desc">Daftar batch terbaru</div></div></a>
                            <a href="{{ route('halaman.inkubator') }}#alumni" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-trophy text-green-400"></i></div><div class="item-text"><div class="item-title">Alumni Startup</div><div class="item-desc">Sukses story alumni</div></div></a>
                        </div></div>
                    </div>

                    {{-- 43. Akselerator --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="akselerator">
                        <button class="nav-link" data-dropdown><i class="fas fa-bolt text-yellow-400"></i> Akselerator <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.akselerator') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-bolt text-yellow-400"></i></div><div class="item-text"><div class="item-title">Program Akselerator</div><div class="item-desc">Percepat pertumbuhan startup</div></div></a>
                            <a href="{{ route('halaman.akselerator') }}#mentor" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-user-tie text-blue-400"></i></div><div class="item-text"><div class="item-title">Mentor & Investor</div><div class="item-desc">Jaringan bisnis global</div></div></a>
                        </div></div>
                    </div>

                    {{-- 44. Startup Hub --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="startup-hub">
                        <button class="nav-link" data-dropdown><i class="fas fa-store text-pink-400"></i> Startup Hub <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.startup-hub') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-store text-pink-400"></i></div><div class="item-text"><div class="item-title">Startup Hub</div><div class="item-desc">Ekosistem wirausaha digital</div></div></a>
                            <a href="{{ route('halaman.startup-hub') }}#showcase" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-star text-purple-400"></i></div><div class="item-text"><div class="item-title">Showcase Produk</div><div class="item-desc">Demo hari startup</div></div></a>
                        </div></div>
                    </div>

                    {{-- 45. Hackathon Global --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="hackathon">
                        <button class="nav-link" data-dropdown><i class="fas fa-code text-emerald-400"></i> Hackathon <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.hackathon-global') }}" class="dropdown-item"><div class="item-icon bg-emerald-500/10"><i class="fas fa-code text-emerald-400"></i></div><div class="item-text"><div class="item-title">Hackathon Global</div><div class="item-desc">Kompetisi coding 48 jam</div></div></a>
                            <a href="{{ route('halaman.hackathon-global') }}#jadwal" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-calendar text-blue-400"></i></div><div class="item-text"><div class="item-title">Jadwal Event</div><div class="item-desc">Hackathon mendatang</div></div></a>
                        </div></div>
                    </div>

                    {{-- 46. Olimpiade --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="olimpiade">
                        <button class="nav-link" data-dropdown><i class="fas fa-medal text-amber-400"></i> Olimpiade <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.olimpiade') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-medal text-amber-400"></i></div><div class="item-text"><div class="item-title">Olimpiade Sains</div><div class="item-desc">Kompetisi akademik nasional</div></div></a>
                            <a href="{{ route('halaman.olimpiade') }}#peringkat" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-ranking-star text-red-400"></i></div><div class="item-text"><div class="item-title">Peringkat & Medali</div><div class="item-desc">Hall of fame peserta</div></div></a>
                        </div></div>
                    </div>

                    {{-- 47. Pertukaran Pelajar --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="pertukaran">
                        <button class="nav-link" data-dropdown><i class="fas fa-exchange-alt text-cyan-400"></i> Pertukaran <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.pertukaran-pelajar') }}" class="dropdown-item"><div class="item-icon bg-cyan-500/10"><i class="fas fa-exchange-alt text-cyan-400"></i></div><div class="item-text"><div class="item-title">Pertukaran Pelajar</div><div class="item-desc">Program internasional</div></div></a>
                            <a href="{{ route('halaman.studi-banding') }}" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-plane text-teal-400"></i></div><div class="item-text"><div class="item-title">Studi Banding</div><div class="item-desc">Kunjungan antar kampus</div></div></a>
                        </div></div>
                    </div>

                    {{-- 48. Kelas Industri --}}
                    <div class="nav-item nav-menu-item" data-nav-page="5" data-nav-id="kelas-industri">
                        <button class="nav-link" data-dropdown><i class="fas fa-industry text-gray-400"></i> Kelas Industri <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.kelas-industri') }}" class="dropdown-item"><div class="item-icon bg-gray-500/10"><i class="fas fa-industry text-gray-400"></i></div><div class="item-text"><div class="item-title">Kelas Industri</div><div class="item-desc">Kurikulum dari industri</div></div></a>
                            <a href="{{ route('halaman.kelas-industri') }}#mitra" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-building text-blue-400"></i></div><div class="item-text"><div class="item-title">Mitra Industri</div><div class="item-desc">500+ partner perusahaan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 49. Bootcamp --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="bootcamp">
                        <button class="nav-link" data-dropdown><i class="fas fa-laptop-code text-kvt-400"></i> Bootcamp <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.bootcamp') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-laptop-code text-kvt-400"></i></div><div class="item-text"><div class="item-title">Bootcamp Intensif</div><div class="item-desc">Program 12 minggu</div></div></a>
                            <a href="{{ route('halaman.bootcamp') }}#fullstack" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-layer-group text-green-400"></i></div><div class="item-text"><div class="item-title">Full-Stack Dev</div><div class="item-desc">Frontend + Backend</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: TEKNOLOGI (Hal 6) === --}}

                    {{-- 50. Coding Lab --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="coding-lab">
                        <button class="nav-link" data-dropdown><i class="fas fa-terminal text-green-400"></i> Coding Lab <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.coding-lab') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-terminal text-green-400"></i></div><div class="item-text"><div class="item-title">Coding Lab</div><div class="item-desc">Lab pemrograman online</div></div></a>
                            <a href="{{ route('halaman.coding-lab') }}#challenge" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-puzzle-piece text-yellow-400"></i></div><div class="item-text"><div class="item-title">Daily Challenge</div><div class="item-desc">Tantangan coding harian</div></div></a>
                        </div></div>
                    </div>

                    {{-- 51. AI Center --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="ai-center">
                        <button class="nav-link" data-dropdown><i class="fas fa-brain text-purple-400"></i> AI Center <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.ai-center') }}" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-brain text-purple-400"></i></div><div class="item-text"><div class="item-title">AI Research Center</div><div class="item-desc">Kecerdasan buatan & ML</div></div></a>
                            <a href="{{ route('halaman.ai-center') }}#model" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-robot text-indigo-400"></i></div><div class="item-text"><div class="item-title">Model Zoo</div><div class="item-desc">Koleksi model AI siap pakai</div></div></a>
                        </div></div>
                    </div>

                    {{-- 52. Cyber Security --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="cyber-security">
                        <button class="nav-link" data-dropdown><i class="fas fa-user-shield text-red-400"></i> Cyber Sec <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.cyber-security') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-user-shield text-red-400"></i></div><div class="item-text"><div class="item-title">Cyber Security</div><div class="item-desc">Keamanan siber & ethical hacking</div></div></a>
                            <a href="{{ route('halaman.cyber-security') }}#ctf" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-flag text-orange-400"></i></div><div class="item-text"><div class="item-title">CTF Arena</div><div class="item-desc">Capture The Flag challenge</div></div></a>
                        </div></div>
                    </div>

                    {{-- 53. Data Science --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="data-science">
                        <button class="nav-link" data-dropdown><i class="fas fa-database text-blue-400"></i> Data Science <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.data-science') }}" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-database text-blue-400"></i></div><div class="item-text"><div class="item-title">Data Science Lab</div><div class="item-desc">Analisis & visualisasi data</div></div></a>
                            <a href="{{ route('halaman.data-science') }}#dataset" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-table text-teal-400"></i></div><div class="item-text"><div class="item-title">Open Dataset</div><div class="item-desc">Dataset publik riset</div></div></a>
                        </div></div>
                    </div>

                    {{-- 54. IoT Lab --}}
                    <div class="nav-item nav-menu-item" data-nav-page="6" data-nav-id="iot-lab">
                        <button class="nav-link" data-dropdown><i class="fas fa-microchip text-teal-400"></i> IoT Lab <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.iot-lab') }}" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-microchip text-teal-400"></i></div><div class="item-text"><div class="item-title">IoT Laboratory</div><div class="item-desc">Internet of Things & embedded</div></div></a>
                            <a href="{{ route('halaman.iot-lab') }}#proyek" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-project-diagram text-green-400"></i></div><div class="item-text"><div class="item-title">Proyek IoT</div><div class="item-desc">Proyek smart device</div></div></a>
                        </div></div>
                    </div>

                    {{-- 55. Cloud Computing --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="cloud">
                        <button class="nav-link" data-dropdown><i class="fas fa-cloud text-sky-400"></i> Cloud <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.cloud-computing') }}" class="dropdown-item"><div class="item-icon bg-sky-500/10"><i class="fas fa-cloud text-sky-400"></i></div><div class="item-text"><div class="item-title">Cloud Computing</div><div class="item-desc">AWS, GCP, Azure learning</div></div></a>
                            <a href="{{ route('halaman.cloud-computing') }}#sertifikasi" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-certificate text-orange-400"></i></div><div class="item-text"><div class="item-title">Cloud Certification</div><div class="item-desc">Sertifikasi cloud provider</div></div></a>
                        </div></div>
                    </div>

                    {{-- 56. Blockchain --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="blockchain">
                        <button class="nav-link" data-dropdown><i class="fas fa-link text-violet-400"></i> Blockchain <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.blockchain-center') }}" class="dropdown-item"><div class="item-icon bg-violet-500/10"><i class="fas fa-link text-violet-400"></i></div><div class="item-text"><div class="item-title">Blockchain Center</div><div class="item-desc">Web3 & smart contract</div></div></a>
                            <a href="{{ route('halaman.blockchain-center') }}#defi" class="dropdown-item"><div class="item-icon bg-emerald-500/10"><i class="fas fa-coins text-emerald-400"></i></div><div class="item-text"><div class="item-title">DeFi & NFT</div><div class="item-desc">Keuangan desentralisasi</div></div></a>
                        </div></div>
                    </div>

                    {{-- 57. VR/AR Lab --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="vr-ar">
                        <button class="nav-link" data-dropdown><i class="fas fa-vr-cardboard text-indigo-400"></i> VR/AR <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.vr-ar-lab') }}" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-vr-cardboard text-indigo-400"></i></div><div class="item-text"><div class="item-title">VR/AR Lab</div><div class="item-desc">Virtual & augmented reality</div></div></a>
                            <a href="{{ route('halaman.vr-ar-lab') }}#metaverse" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-globe text-purple-400"></i></div><div class="item-text"><div class="item-title">Metaverse Campus</div><div class="item-desc">Kampus virtual 3D</div></div></a>
                        </div></div>
                    </div>

                    {{-- 58. Robotika --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="robotika">
                        <button class="nav-link" data-dropdown><i class="fas fa-robot text-gray-300"></i> Robotika <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.robotika') }}" class="dropdown-item"><div class="item-icon bg-gray-500/10"><i class="fas fa-robot text-gray-300"></i></div><div class="item-text"><div class="item-title">Lab Robotika</div><div class="item-desc">Robot & otomasi industri</div></div></a>
                            <a href="{{ route('halaman.robotika') }}#kompetisi" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-trophy text-red-400"></i></div><div class="item-text"><div class="item-title">Robocontest</div><div class="item-desc">Kompetisi robot nasional</div></div></a>
                        </div></div>
                    </div>

                    {{-- 59. Game Dev --}}
                    <div class="nav-item nav-menu-item" data-nav-page="7" data-nav-id="game-dev">
                        <button class="nav-link" data-dropdown><i class="fas fa-gamepad text-green-400"></i> Game Dev <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.game-dev') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-gamepad text-green-400"></i></div><div class="item-text"><div class="item-title">Game Development</div><div class="item-desc">Unity, Unreal & Godot</div></div></a>
                            <a href="{{ route('halaman.game-dev') }}#jam" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-dice text-pink-400"></i></div><div class="item-text"><div class="item-title">Game Jam</div><div class="item-desc">Kompetisi bikin game</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: KREATIF & MEDIA (Hal 8) === --}}

                    {{-- 60. Desain Grafis --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="desain-grafis">
                        <button class="nav-link" data-dropdown><i class="fas fa-palette text-pink-400"></i> Desain <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.desain-grafis') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-palette text-pink-400"></i></div><div class="item-text"><div class="item-title">Desain Grafis</div><div class="item-desc">Adobe, Figma, Canva</div></div></a>
                            <a href="{{ route('halaman.desain-grafis') }}#portofolio" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-images text-purple-400"></i></div><div class="item-text"><div class="item-title">Galeri Karya</div><div class="item-desc">Portofolio mahasiswa</div></div></a>
                        </div></div>
                    </div>

                    {{-- 61. Fotografi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="fotografi">
                        <button class="nav-link" data-dropdown><i class="fas fa-camera text-amber-400"></i> Fotografi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.fotografi') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-camera text-amber-400"></i></div><div class="item-text"><div class="item-title">Studio Fotografi</div><div class="item-desc">Teknik & editing foto</div></div></a>
                        </div></div>
                    </div>

                    {{-- 62. Videografi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="videografi">
                        <button class="nav-link" data-dropdown><i class="fas fa-film text-red-400"></i> Videografi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.videografi') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-film text-red-400"></i></div><div class="item-text"><div class="item-title">Studio Videografi</div><div class="item-desc">Produksi & editing video</div></div></a>
                        </div></div>
                    </div>

                    {{-- 63. Musik Digital --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="musik">
                        <button class="nav-link" data-dropdown><i class="fas fa-music text-violet-400"></i> Musik <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.musik-digital') }}" class="dropdown-item"><div class="item-icon bg-violet-500/10"><i class="fas fa-music text-violet-400"></i></div><div class="item-text"><div class="item-title">Musik Digital</div><div class="item-desc">Produksi & distribusi musik</div></div></a>
                        </div></div>
                    </div>

                    {{-- 64. Animasi 3D --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="animasi">
                        <button class="nav-link" data-dropdown><i class="fas fa-cube text-cyan-400"></i> Animasi 3D <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.animasi-3d') }}" class="dropdown-item"><div class="item-icon bg-cyan-500/10"><i class="fas fa-cube text-cyan-400"></i></div><div class="item-text"><div class="item-title">Animasi & 3D</div><div class="item-desc">Blender, Maya, Cinema 4D</div></div></a>
                        </div></div>
                    </div>

                    {{-- 65. UI/UX Studio --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="ui-ux">
                        <button class="nav-link" data-dropdown><i class="fas fa-pen-nib text-kvt-400"></i> UI/UX <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.ui-ux-studio') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-pen-nib text-kvt-400"></i></div><div class="item-text"><div class="item-title">UI/UX Studio</div><div class="item-desc">User experience design</div></div></a>
                            <a href="{{ route('halaman.ui-ux-studio') }}#case-study" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-search text-green-400"></i></div><div class="item-text"><div class="item-title">Case Study</div><div class="item-desc">Studi kasus desain</div></div></a>
                        </div></div>
                    </div>

                    {{-- 66. Content Creator --}}
                    <div class="nav-item nav-menu-item" data-nav-page="8" data-nav-id="content-creator">
                        <button class="nav-link" data-dropdown><i class="fas fa-hashtag text-rose-400"></i> Creator <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.content-creator') }}" class="dropdown-item"><div class="item-icon bg-rose-500/10"><i class="fas fa-hashtag text-rose-400"></i></div><div class="item-text"><div class="item-title">Content Creator Hub</div><div class="item-desc">YouTube, TikTok, Instagram</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: BISNIS & DIGITAL (Hal 9) === --}}

                    {{-- 67. Digital Marketing --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="digimar">
                        <button class="nav-link" data-dropdown><i class="fas fa-bullseye text-orange-400"></i> DigiMar <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.digital-marketing') }}" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-bullseye text-orange-400"></i></div><div class="item-text"><div class="item-title">Digital Marketing</div><div class="item-desc">Strategi pemasaran digital</div></div></a>
                            <a href="{{ route('halaman.seo-sem') }}" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-search-dollar text-blue-400"></i></div><div class="item-text"><div class="item-title">SEO & SEM</div><div class="item-desc">Optimasi mesin pencari</div></div></a>
                        </div></div>
                    </div>

                    {{-- 68. Bisnis Digital --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="bisnis-digital">
                        <button class="nav-link" data-dropdown><i class="fas fa-chart-pie text-kvt-400"></i> Bisnis Digital <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.bisnis-digital') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-chart-pie text-kvt-400"></i></div><div class="item-text"><div class="item-title">Bisnis Digital</div><div class="item-desc">E-commerce & marketplace</div></div></a>
                        </div></div>
                    </div>

                    {{-- 69. Fintech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="fintech">
                        <button class="nav-link" data-dropdown><i class="fas fa-wallet text-green-400"></i> Fintech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.fintech') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-wallet text-green-400"></i></div><div class="item-text"><div class="item-title">Fintech Lab</div><div class="item-desc">Teknologi keuangan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 70. Agritech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="agritech">
                        <button class="nav-link" data-dropdown><i class="fas fa-seedling text-lime-400"></i> Agritech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.agritech') }}" class="dropdown-item"><div class="item-icon bg-lime-500/10"><i class="fas fa-seedling text-lime-400"></i></div><div class="item-text"><div class="item-title">Agritech Hub</div><div class="item-desc">Teknologi pertanian modern</div></div></a>
                        </div></div>
                    </div>

                    {{-- 71. Healthtech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="healthtech">
                        <button class="nav-link" data-dropdown><i class="fas fa-heartbeat text-red-400"></i> Healthtech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.healthtech') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-heartbeat text-red-400"></i></div><div class="item-text"><div class="item-title">Healthtech Center</div><div class="item-desc">Teknologi kesehatan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 72. Edtech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="edtech">
                        <button class="nav-link" data-dropdown><i class="fas fa-chalkboard text-kvt-400"></i> Edtech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.edtech') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-chalkboard text-kvt-400"></i></div><div class="item-text"><div class="item-title">Edtech Innovation</div><div class="item-desc">Teknologi pendidikan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 73. Greentech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="greentech">
                        <button class="nav-link" data-dropdown><i class="fas fa-leaf text-emerald-400"></i> Greentech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.greentech') }}" class="dropdown-item"><div class="item-icon bg-emerald-500/10"><i class="fas fa-leaf text-emerald-400"></i></div><div class="item-text"><div class="item-title">Greentech Lab</div><div class="item-desc">Teknologi ramah lingkungan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 74. Legaltech --}}
                    <div class="nav-item nav-menu-item" data-nav-page="9" data-nav-id="legaltech">
                        <button class="nav-link" data-dropdown><i class="fas fa-gavel text-amber-400"></i> Legaltech <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.legaltech') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-gavel text-amber-400"></i></div><div class="item-text"><div class="item-title">Legaltech Center</div><div class="item-desc">Teknologi hukum & legal</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: HUMANIORA & SOSIAL (Hal 10) === --}}

                    {{-- 75. Bahasa Asing --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="bahasa">
                        <button class="nav-link" data-dropdown><i class="fas fa-language text-blue-400"></i> Bahasa <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.bahasa-asing') }}" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-language text-blue-400"></i></div><div class="item-text"><div class="item-title">Bahasa Asing</div><div class="item-desc">Inggris, Jepang, Mandarin, dll</div></div></a>
                        </div></div>
                    </div>

                    {{-- 76. Sastra & Budaya --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="sastra">
                        <button class="nav-link" data-dropdown><i class="fas fa-book-open text-amber-400"></i> Sastra <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.sastra-budaya') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-book-open text-amber-400"></i></div><div class="item-text"><div class="item-title">Sastra & Budaya</div><div class="item-desc">Sastra, seni, kebudayaan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 77. Penelitian Sosial --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="sosial">
                        <button class="nav-link" data-dropdown><i class="fas fa-people-arrows text-indigo-400"></i> Sosial <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.penelitian-sosial') }}" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-people-arrows text-indigo-400"></i></div><div class="item-text"><div class="item-title">Penelitian Sosial</div><div class="item-desc">Sosiologi, antropologi</div></div></a>
                        </div></div>
                    </div>

                    {{-- 78. Psikologi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="psikologi">
                        <button class="nav-link" data-dropdown><i class="fas fa-brain text-pink-400"></i> Psikologi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.psikologi-pendidikan') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-brain text-pink-400"></i></div><div class="item-text"><div class="item-title">Psikologi Pendidikan</div><div class="item-desc">Konseling & pengembangan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 79. Hukum --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="hukum">
                        <button class="nav-link" data-dropdown><i class="fas fa-balance-scale text-yellow-400"></i> Hukum <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.hukum-regulasi') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-balance-scale text-yellow-400"></i></div><div class="item-text"><div class="item-title">Hukum & Regulasi</div><div class="item-desc">Ilmu hukum terapan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 80. Ekonomi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="ekonomi">
                        <button class="nav-link" data-dropdown><i class="fas fa-chart-line text-green-400"></i> Ekonomi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.ekonomi-keuangan') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-chart-line text-green-400"></i></div><div class="item-text"><div class="item-title">Ekonomi & Keuangan</div><div class="item-desc">Teori ekonomi & akuntansi</div></div></a>
                        </div></div>
                    </div>

                    {{-- 81. Manajemen --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="manajemen">
                        <button class="nav-link" data-dropdown><i class="fas fa-tasks text-kvt-400"></i> Manajemen <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.manajemen-bisnis') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-tasks text-kvt-400"></i></div><div class="item-text"><div class="item-title">Manajemen Bisnis</div><div class="item-desc">MBA & manajemen strategis</div></div></a>
                        </div></div>
                    </div>

                    {{-- 82. Hub. Internasional --}}
                    <div class="nav-item nav-menu-item" data-nav-page="10" data-nav-id="hubinter">
                        <button class="nav-link" data-dropdown><i class="fas fa-globe-americas text-blue-400"></i> HubInter <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.hubungan-internasional') }}" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-globe-americas text-blue-400"></i></div><div class="item-text"><div class="item-title">Hubungan Internasional</div><div class="item-desc">Diplomasi & politik global</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: TEKNIK & SAINS (Hal 11) === --}}

                    {{-- 83. Adm. Publik --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="adm-publik">
                        <button class="nav-link" data-dropdown><i class="fas fa-landmark text-teal-400"></i> Adm. Publik <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.administrasi-publik') }}" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-landmark text-teal-400"></i></div><div class="item-text"><div class="item-title">Administrasi Publik</div><div class="item-desc">Kebijakan & pemerintahan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 84. Arsitektur --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="arsitektur">
                        <button class="nav-link" data-dropdown><i class="fas fa-drafting-compass text-orange-400"></i> Arsitektur <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.arsitektur') }}" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-drafting-compass text-orange-400"></i></div><div class="item-text"><div class="item-title">Arsitektur & Desain</div><div class="item-desc">Perancangan bangunan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 85. T. Sipil --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="sipil">
                        <button class="nav-link" data-dropdown><i class="fas fa-hard-hat text-yellow-400"></i> T. Sipil <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.teknik-sipil') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-hard-hat text-yellow-400"></i></div><div class="item-text"><div class="item-title">Teknik Sipil</div><div class="item-desc">Konstruksi & infrastruktur</div></div></a>
                        </div></div>
                    </div>

                    {{-- 86. T. Mesin --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="mesin">
                        <button class="nav-link" data-dropdown><i class="fas fa-cogs text-gray-400"></i> T. Mesin <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.teknik-mesin') }}" class="dropdown-item"><div class="item-icon bg-gray-500/10"><i class="fas fa-cogs text-gray-400"></i></div><div class="item-text"><div class="item-title">Teknik Mesin</div><div class="item-desc">Mekanika & manufaktur</div></div></a>
                        </div></div>
                    </div>

                    {{-- 87. T. Elektro --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="elektro">
                        <button class="nav-link" data-dropdown><i class="fas fa-bolt text-yellow-300"></i> T. Elektro <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.teknik-elektro') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-bolt text-yellow-300"></i></div><div class="item-text"><div class="item-title">Teknik Elektro</div><div class="item-desc">Elektronika & listrik</div></div></a>
                        </div></div>
                    </div>

                    {{-- 88. T. Informatika --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="informatika">
                        <button class="nav-link" data-dropdown><i class="fas fa-code text-kvt-400"></i> Informatika <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.teknik-informatika') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-code text-kvt-400"></i></div><div class="item-text"><div class="item-title">Teknik Informatika</div><div class="item-desc">Ilmu komputer & algoritma</div></div></a>
                        </div></div>
                    </div>

                    {{-- 89. Sistem Informasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="si">
                        <button class="nav-link" data-dropdown><i class="fas fa-server text-indigo-400"></i> Sis. Info <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.sistem-informasi') }}" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-server text-indigo-400"></i></div><div class="item-text"><div class="item-title">Sistem Informasi</div><div class="item-desc">Pengembangan sistem bisnis</div></div></a>
                        </div></div>
                    </div>

                    {{-- 90. Kedokteran --}}
                    <div class="nav-item nav-menu-item" data-nav-page="11" data-nav-id="kedokteran">
                        <button class="nav-link" data-dropdown><i class="fas fa-stethoscope text-red-400"></i> Kedokteran <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.kedokteran') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-stethoscope text-red-400"></i></div><div class="item-text"><div class="item-title">Kedokteran</div><div class="item-desc">Ilmu kedokteran & bedah</div></div></a>
                        </div></div>
                    </div>

                    {{-- === FOLDER: KESEHATAN & LINGKUNGAN (Hal 12) === --}}

                    {{-- 91. Farmasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="farmasi">
                        <button class="nav-link" data-dropdown><i class="fas fa-pills text-green-400"></i> Farmasi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.farmasi') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-pills text-green-400"></i></div><div class="item-text"><div class="item-title">Farmasi</div><div class="item-desc">Ilmu farmasi & obat-obatan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 92. Keperawatan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="keperawatan">
                        <button class="nav-link" data-dropdown><i class="fas fa-user-nurse text-pink-400"></i> Keperawatan <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.keperawatan') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-user-nurse text-pink-400"></i></div><div class="item-text"><div class="item-title">Keperawatan</div><div class="item-desc">Ilmu keperawatan & kebidanan</div></div></a>
                        </div></div>
                    </div>

                    {{-- 93. Gizi & Kesehatan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="gizi">
                        <button class="nav-link" data-dropdown><i class="fas fa-apple-alt text-lime-400"></i> Gizi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.gizi-kesehatan') }}" class="dropdown-item"><div class="item-icon bg-lime-500/10"><i class="fas fa-apple-alt text-lime-400"></i></div><div class="item-text"><div class="item-title">Gizi & Kesehatan</div><div class="item-desc">Nutrisi & diet klinis</div></div></a>
                        </div></div>
                    </div>

                    {{-- 94. Lingkungan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="lingkungan">
                        <button class="nav-link" data-dropdown><i class="fas fa-tree text-green-400"></i> Lingkungan <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.lingkungan-hidup') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-tree text-green-400"></i></div><div class="item-text"><div class="item-title">Lingkungan Hidup</div><div class="item-desc">Ekologi & konservasi</div></div></a>
                        </div></div>
                    </div>

                    {{-- 95. Pariwisata --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="pariwisata">
                        <button class="nav-link" data-dropdown><i class="fas fa-map-marked-alt text-cyan-400"></i> Pariwisata <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.pariwisata') }}" class="dropdown-item"><div class="item-icon bg-cyan-500/10"><i class="fas fa-map-marked-alt text-cyan-400"></i></div><div class="item-text"><div class="item-title">Pariwisata</div><div class="item-desc">Tour & travel management</div></div></a>
                        </div></div>
                    </div>

                    {{-- 96. Perhotelan --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="perhotelan">
                        <button class="nav-link" data-dropdown><i class="fas fa-hotel text-purple-400"></i> Perhotelan <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.perhotelan') }}" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-hotel text-purple-400"></i></div><div class="item-text"><div class="item-title">Perhotelan</div><div class="item-desc">Hospitality management</div></div></a>
                        </div></div>
                    </div>

                    {{-- 97. Tata Boga --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="tata-boga">
                        <button class="nav-link" data-dropdown><i class="fas fa-utensils text-orange-400"></i> Tata Boga <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.tata-boga') }}" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-utensils text-orange-400"></i></div><div class="item-text"><div class="item-title">Tata Boga</div><div class="item-desc">Kuliner & culinary arts</div></div></a>
                        </div></div>
                    </div>

                    {{-- 98. Olahraga --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="olahraga">
                        <button class="nav-link" data-dropdown><i class="fas fa-running text-blue-400"></i> Olahraga <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.olahraga') }}" class="dropdown-item"><div class="item-icon bg-blue-500/10"><i class="fas fa-running text-blue-400"></i></div><div class="item-text"><div class="item-title">Olahraga & Sport Science</div><div class="item-desc">Keolahragaan & fitness</div></div></a>
                        </div></div>
                    </div>

                    {{-- 99. Donasi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="donasi">
                        <button class="nav-link" data-dropdown><i class="fas fa-hand-holding-heart text-rose-400"></i> Donasi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('halaman.donasi') }}" class="dropdown-item"><div class="item-icon bg-rose-500/10"><i class="fas fa-hand-holding-heart text-rose-400"></i></div><div class="item-text"><div class="item-title">Donasi & Support</div><div class="item-desc">Dukung pengembangan platform</div></div></a>
                            <a href="{{ route('sponsor') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-gem text-yellow-400"></i></div><div class="item-text"><div class="item-title">Sponsor</div><div class="item-desc">Jadi sponsor KVT Hub</div></div></a>
                        </div></div>
                    </div>

                    {{-- 100. Lisensi --}}
                    <div class="nav-item nav-menu-item" data-nav-page="12" data-nav-id="lisensi">
                        <button class="nav-link" data-dropdown><i class="fas fa-file-contract text-gray-400"></i> Lisensi <i class="fas fa-chevron-down chevron-icon"></i></button>
                        <div class="nav-dropdown"><div class="nav-dropdown-inner">
                            <a href="{{ route('lisensi') }}" class="dropdown-item"><div class="item-icon bg-gray-500/10"><i class="fas fa-file-contract text-gray-400"></i></div><div class="item-text"><div class="item-title">Lisensi & Hak Cipta</div><div class="item-desc">Ketentuan penggunaan</div></div></a>
                            <a href="{{ route('halaman.donasi') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-info-circle text-kvt-400"></i></div><div class="item-text"><div class="item-title">Open Source</div><div class="item-desc">Kontribusi & lisensi MIT</div></div></a>
                        </div></div>
                    </div>

                    {{-- ============================================================ --}}
                    {{-- MENU 101-200: AI, INOVASI & TEKNOLOGI MASA DEPAN            --}}
                    {{-- ============================================================ --}}
                    @include('tata-letak.partials.nav-menus-ai-inovasi')

                        </div>{{-- /navMenuItems --}}
                    </div>{{-- /navSlider --}}

                    {{-- Right Arrow (hidden - moved to top row) --}}
                    <button onclick="navMaju()" class="nav-page-arrow shrink-0 ml-1.5 hidden" title="Menu berikutnya" id="navBtnNext">
                        <i class="fas fa-chevron-right text-[9px]"></i>
                    </button>

                    {{-- Dot Indicators + Lainnya (hidden - moved to top row) --}}
                    <div class="flex items-center ml-2.5 shrink-0 gap-2.5 hidden">
                        <div class="flex items-center gap-1" id="navDotIndicators"></div>
                        <button onclick="bukaSemuaMenu()" class="btn-semua-menu" title="Semua menu & kustomisasi">
                            <i class="fas fa-th-large text-[12px]"></i>
                            <span class="hidden xl:inline">Lainnya</span>
                            <span class="text-[9px] bg-kvt-700/50 px-1.5 py-0.5 rounded-md ml-1 font-bold" id="navPageBadge">1/5</span>
                        </button>
                    </div>

                </div>{{-- /navMenuWrapper --}}
                </div>{{-- /flex row menu bar --}}
            </div>
        </div>{{-- /navMenuBar --}}

        {{-- ===== MOBILE MENU ===== --}}
        <div id="mobileMenu" class="hidden lg:hidden border-t border-kvt-700/20">
            <div class="px-4 py-4 space-y-1 max-h-[80vh] overflow-y-auto bg-kvt-950/95 backdrop-blur-xl">
                {{-- Search on mobile --}}
                <button onclick="bukaSearch()" class="w-full flex items-center gap-3 py-3 px-4 text-gray-400 bg-kvt-800/30 rounded-xl mb-3 border border-kvt-700/20">
                    <i class="fas fa-search"></i>
                    <span class="text-sm">Cari berita, kelas, mitra...</span>
                    <kbd class="text-[10px] bg-kvt-800 px-1.5 py-0.5 rounded ml-auto border border-kvt-700">Ctrl+K</kbd>
                </button>

                {{-- User info (authenticated) --}}
                @auth
                <div class="flex items-center gap-3 bg-gradient-to-r from-kvt-800/50 to-ungu-900/30 rounded-xl p-3 mb-3 border border-kvt-700/20">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-kvt-500 to-ungu-500 flex items-center justify-center text-white font-bold text-sm shadow">{{ strtoupper(substr(Auth::user()->nama, 0, 1)) }}</div>
                    <div class="flex-1 min-w-0">
                        <div class="text-white font-semibold text-sm truncate">{{ Auth::user()->nama }}</div>
                        <div class="text-gray-500 text-xs">{{ ucfirst(Auth::user()->peran) }}</div>
                    </div>
                    <a href="{{ route('dasbor') }}" class="text-kvt-400 text-xs font-semibold bg-kvt-800/50 px-3 py-1.5 rounded-lg border border-kvt-700/30">Dasbor</a>
                </div>
                @endauth

                {{-- ===== ACCORDION: UTAMA ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-home w-6 text-kvt-400"></i> Utama</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('beranda') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-home w-5 text-xs text-kvt-400/60"></i> Beranda</a>
                        @auth
                        <a href="{{ route('dasbor') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-tachometer-alt w-5 text-xs text-green-400/60"></i> Dasbor Saya</a>
                        <a href="{{ route('kelas.index') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-chalkboard w-5 text-xs text-kvt-400/60"></i> Kelas</a>
                        <a href="{{ route('laporan.index') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-chart-bar w-5 text-xs text-green-400/60"></i> Laporan</a>
                        @endauth
                        <a href="{{ route('berita.index') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-newspaper w-5 text-xs text-emerald-400/60"></i> Berita</a>
                        <a href="{{ route('tentang') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-landmark w-5 text-xs text-cyan-400/60"></i> Tentang</a>
                        <a href="{{ route('halaman.pengumuman') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-bullhorn w-5 text-xs text-red-400/60"></i> Pengumuman</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: AKADEMIK ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-graduation-cap w-6 text-green-400"></i> Akademik</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.jenjang') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-layer-group w-5 text-xs text-green-400/60"></i> Jenjang Pendidikan</a>
                        <a href="{{ route('halaman.kurikulum') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-book-reader w-5 text-xs text-indigo-400/60"></i> Kurikulum</a>
                        <a href="{{ route('halaman.sertifikasi') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-certificate w-5 text-xs text-yellow-400/60"></i> Sertifikasi</a>
                        <a href="{{ route('halaman.akreditasi') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-check-double w-5 text-xs text-emerald-400/60"></i> Akreditasi</a>
                        <a href="{{ route('halaman.penjamin-mutu') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-shield-alt w-5 text-xs text-teal-400/60"></i> Penjamin Mutu</a>
                        <a href="{{ route('halaman.alur-panduan') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-project-diagram w-5 text-xs text-teal-400/60"></i> Alur & Panduan</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: PEMBELAJARAN ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-laptop-code w-6 text-kvt-400"></i> Pembelajaran</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.platform') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-globe w-5 text-xs text-kvt-400/60"></i> Platform</a>
                        <a href="{{ route('halaman.e-learning') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-laptop w-5 text-xs text-kvt-400/60"></i> E-Learning</a>
                        <a href="{{ route('halaman.webinar') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-video w-5 text-xs text-red-400/60"></i> Webinar</a>
                        <a href="{{ route('halaman.workshop') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-tools w-5 text-xs text-green-400/60"></i> Workshop</a>
                        <a href="{{ route('halaman.laboratorium') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-flask w-5 text-xs text-cyan-400/60"></i> Lab Virtual</a>
                        <a href="{{ route('halaman.podcast') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-podcast w-5 text-xs text-pink-400/60"></i> Podcast</a>
                        <a href="{{ route('halaman.pelatihan') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-chalkboard-teacher w-5 text-xs text-orange-400/60"></i> Pelatihan</a>
                        <a href="{{ route('halaman.langganan') }}" class="block py-2 px-4 text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/20 rounded-lg text-sm transition"><i class="fas fa-crown w-5 text-xs text-amber-400/60"></i> Langganan</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: RISET & KARIR ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-microscope w-6 text-purple-400"></i> Riset & Karir</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.riset') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-microscope w-5 text-xs text-purple-400/60"></i> Riset & Inovasi</a>
                        <a href="{{ route('halaman.karir') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-briefcase w-5 text-xs text-orange-400/60"></i> Karir & Industri</a>
                        <a href="{{ route('halaman.magang') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-building w-5 text-xs text-amber-400/60"></i> Program Magang</a>
                        <a href="{{ route('halaman.beasiswa') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-award w-5 text-xs text-yellow-400/60"></i> Beasiswa</a>
                        <a href="{{ route('halaman.kompetisi') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-medal w-5 text-xs text-rose-400/60"></i> Kompetisi</a>
                        <a href="{{ route('halaman.konsultasi') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-comments w-5 text-xs text-kvt-400/60"></i> Konsultasi</a>
                        <a href="{{ route('halaman.jurnal') }}" class="block py-2 px-4 text-gray-400 hover:text-purple-400 hover:bg-purple-500/5 rounded-lg text-sm transition"><i class="fas fa-file-alt w-5 text-xs text-indigo-400/60"></i> Jurnal Akademik</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: KOMUNITAS ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-users w-6 text-pink-400"></i> Komunitas</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.komunitas') }}" class="block py-2 px-4 text-gray-400 hover:text-pink-400 hover:bg-pink-500/5 rounded-lg text-sm transition"><i class="fas fa-users w-5 text-xs text-pink-400/60"></i> Komunitas</a>
                        <a href="{{ route('halaman.forum') }}" class="block py-2 px-4 text-gray-400 hover:text-pink-400 hover:bg-pink-500/5 rounded-lg text-sm transition"><i class="fas fa-comments w-5 text-xs text-indigo-400/60"></i> Forum Diskusi</a>
                        <a href="{{ route('halaman.mentoring') }}" class="block py-2 px-4 text-gray-400 hover:text-pink-400 hover:bg-pink-500/5 rounded-lg text-sm transition"><i class="fas fa-chalkboard-teacher w-5 text-xs text-violet-400/60"></i> Mentoring</a>
                        <a href="{{ route('halaman.alumni') }}" class="block py-2 px-4 text-gray-400 hover:text-pink-400 hover:bg-pink-500/5 rounded-lg text-sm transition"><i class="fas fa-user-graduate w-5 text-xs text-cyan-400/60"></i> Alumni</a>
                        <a href="{{ route('halaman.portofolio') }}" class="block py-2 px-4 text-gray-400 hover:text-pink-400 hover:bg-pink-500/5 rounded-lg text-sm transition"><i class="fas fa-folder-open w-5 text-xs text-green-400/60"></i> Portofolio</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: SUMBER DAYA ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-database w-6 text-cyan-400"></i> Sumber Daya</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.sumber-daya') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-database w-5 text-xs text-cyan-400/60"></i> Sumber Daya</a>
                        <a href="{{ route('halaman.perpustakaan') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-book w-5 text-xs text-amber-400/60"></i> Perpustakaan</a>
                        <a href="{{ route('halaman.media') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-photo-video w-5 text-xs text-rose-400/60"></i> Media</a>
                        <a href="{{ route('halaman.dokumen') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-file-alt w-5 text-xs text-amber-400/60"></i> Dokumen</a>
                        <a href="{{ route('halaman.galeri') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-images w-5 text-xs text-emerald-400/60"></i> Galeri</a>
                        <a href="{{ route('halaman.statistik') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fas fa-chart-pie w-5 text-xs text-kvt-400/60"></i> Statistik</a>
                        <a href="{{ route('halaman.repositori') }}" class="block py-2 px-4 text-gray-400 hover:text-cyan-400 hover:bg-cyan-500/5 rounded-lg text-sm transition"><i class="fab fa-github w-5 text-xs text-gray-400/60"></i> Repositori</a>
                    </div>
                </div>

                {{-- ===== ACCORDION: KEAMANAN & LAINNYA ===== --}}
                <div class="mb-1">
                    <button onclick="toggleMobileAccordion(this)" class="w-full flex items-center justify-between py-2.5 px-4 text-gray-300 hover:bg-kvt-800/30 rounded-xl text-sm font-semibold transition">
                        <span><i class="fas fa-shield-alt w-6 text-red-400"></i> Keamanan & Lainnya</span>
                        <i class="fas fa-chevron-down text-[10px] text-gray-500 transition-transform duration-300 accordion-chevron"></i>
                    </button>
                    <div class="hidden accordion-content pl-4 space-y-0.5 mt-1">
                        <a href="{{ route('halaman.keamanan') }}" class="block py-2 px-4 text-gray-400 hover:text-red-400 hover:bg-red-500/5 rounded-lg text-sm transition"><i class="fas fa-shield-alt w-5 text-xs text-red-400/60"></i> Keamanan</a>
                        <a href="{{ route('halaman.layanan') }}" class="block py-2 px-4 text-gray-400 hover:text-red-400 hover:bg-red-500/5 rounded-lg text-sm transition"><i class="fas fa-concierge-bell w-5 text-xs text-amber-400/60"></i> Layanan</a>
                        <a href="{{ route('halaman.bantuan') }}" class="block py-2 px-4 text-gray-400 hover:text-red-400 hover:bg-red-500/5 rounded-lg text-sm transition"><i class="fas fa-life-ring w-5 text-xs text-green-400/60"></i> Bantuan</a>
                        <a href="{{ route('edukasi-gratis.index') }}" class="block py-2 px-4 text-gray-400 hover:text-green-400 hover:bg-green-500/5 rounded-lg text-sm transition"><i class="fas fa-gift w-5 text-xs text-green-400/60"></i> Edukasi Gratis</a>
                        <a href="{{ route('kerja-sama.index') }}" class="block py-2 px-4 text-gray-400 hover:text-red-400 hover:bg-red-500/5 rounded-lg text-sm transition"><i class="fas fa-handshake w-5 text-xs text-yellow-400/60"></i> Kerja Sama</a>
                        <a href="{{ route('halaman.kuro') }}" class="block py-2 px-4 text-gray-400 hover:text-red-400 hover:bg-red-500/5 rounded-lg text-sm transition"><i class="fas fa-cat w-5 text-xs text-purple-400/60"></i> Kuro</a>
                    </div>
                </div>

                @guest
                <div class="pt-3 px-2 flex gap-2">
                    <a href="{{ route('masuk') }}" class="flex-1 text-center py-2.5 text-sm bg-kvt-800/50 text-gray-300 rounded-xl font-medium border border-kvt-700/30">Masuk</a>
                    <a href="{{ route('daftar') }}" class="flex-1 text-center py-2.5 text-sm bg-gradient-to-r from-kvt-500 to-ungu-500 text-white rounded-xl font-semibold">Daftar</a>
                </div>
                @endguest

                @auth
                <div class="pt-3 px-2">
                    <form action="{{ route('keluar') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full text-center py-2.5 text-sm bg-red-500/10 text-red-400 rounded-xl font-medium border border-red-500/20 hover:bg-red-500/20 transition">
                            <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                        </button>
                    </form>
                </div>
                @endauth
            </div>
        </div>
    </nav>

    {{-- ==================== HEADER 2: COMPACT (Grouped Dropdowns) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-nav header-block header-compact" id="navbar2" data-header="2">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-5">
            <div class="flex items-center h-[60px]">
                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-2.5 shrink-0 mr-4 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg shadow-kvt-500/20 group-hover:shadow-kvt-500/40 transition-shadow animate-glow">
                        <span class="text-white font-black text-lg tracking-tight">K</span>
                    </div>
                    <div class="leading-tight hidden xl:block">
                        <span class="text-lg font-extrabold tracking-tight"><span class="text-white">KVT</span><span class="text-kvt-400">Hub</span></span>
                    </div>
                </a>

                <div class="hidden lg:block w-px h-7 bg-kvt-700/30 mr-3"></div>

                {{-- Compact Grouped Menus --}}
                <div class="hidden lg:flex items-center gap-1 flex-1">
                    {{-- Grup: Utama --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-home text-kvt-400 text-xs"></i> Utama <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('beranda') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-home text-kvt-400"></i></div><div class="item-text"><div class="item-title">Beranda</div><div class="item-desc">Halaman utama</div></div></a>
                                @auth<a href="{{ route('dasbor') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-tachometer-alt text-green-400"></i></div><div class="item-text"><div class="item-title">Dasbor</div><div class="item-desc">Panel kontrol</div></div></a>@endauth
                                <a href="{{ route('tentang') }}" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-landmark text-purple-400"></i></div><div class="item-text"><div class="item-title">Tentang</div><div class="item-desc">Visi & misi</div></div></a>
                                <a href="{{ route('berita.index') }}" class="dropdown-item"><div class="item-icon bg-emerald-500/10"><i class="fas fa-newspaper text-emerald-400"></i></div><div class="item-text"><div class="item-title">Berita</div><div class="item-desc">Info terbaru</div></div></a>
                                <a href="{{ route('halaman.pengumuman') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-bullhorn text-red-400"></i></div><div class="item-text"><div class="item-title">Pengumuman</div><div class="item-desc">Info resmi</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Grup: Akademik --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-graduation-cap text-green-400 text-xs"></i> Akademik <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('halaman.jenjang') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-graduation-cap text-green-400"></i></div><div class="item-text"><div class="item-title">Jenjang</div><div class="item-desc">TK hingga S3</div></div></a>
                                <a href="{{ route('halaman.kurikulum') }}" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-book-reader text-indigo-400"></i></div><div class="item-text"><div class="item-title">Kurikulum</div><div class="item-desc">Standar kurikulum</div></div></a>
                                <a href="{{ route('halaman.platform') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-laptop-code text-kvt-400"></i></div><div class="item-text"><div class="item-title">Platform</div><div class="item-desc">Fitur & teknologi</div></div></a>
                                <a href="{{ route('halaman.sertifikasi') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-award text-yellow-400"></i></div><div class="item-text"><div class="item-title">Sertifikasi</div><div class="item-desc">120+ program</div></div></a>
                                <a href="{{ route('halaman.akreditasi') }}" class="dropdown-item"><div class="item-icon bg-emerald-500/10"><i class="fas fa-check-double text-emerald-400"></i></div><div class="item-text"><div class="item-title">Akreditasi</div><div class="item-desc">Standar mutu</div></div></a>
                                <a href="{{ route('edukasi-gratis.index') }}" class="dropdown-item"><div class="item-icon bg-lime-500/10"><i class="fas fa-gift text-lime-400"></i></div><div class="item-text"><div class="item-title">Edukasi Gratis</div><div class="item-desc">Program gratis</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Grup: Digital --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-laptop text-purple-400 text-xs"></i> Digital <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('halaman.e-learning') }}" class="dropdown-item"><div class="item-icon bg-kvt-500/10"><i class="fas fa-laptop text-kvt-400"></i></div><div class="item-text"><div class="item-title">E-Learning</div><div class="item-desc">1000+ kursus</div></div></a>
                                <a href="{{ route('halaman.webinar') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-video text-red-400"></i></div><div class="item-text"><div class="item-title">Webinar</div><div class="item-desc">Live & on-demand</div></div></a>
                                <a href="{{ route('halaman.workshop') }}" class="dropdown-item"><div class="item-icon bg-green-500/10"><i class="fas fa-tools text-green-400"></i></div><div class="item-text"><div class="item-title">Workshop</div><div class="item-desc">Pelatihan praktis</div></div></a>
                                <a href="{{ route('halaman.laboratorium') }}" class="dropdown-item"><div class="item-icon bg-cyan-500/10"><i class="fas fa-flask text-cyan-400"></i></div><div class="item-text"><div class="item-title">Lab Virtual</div><div class="item-desc">80+ lab</div></div></a>
                                <a href="{{ route('halaman.podcast') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-podcast text-pink-400"></i></div><div class="item-text"><div class="item-title">Podcast</div><div class="item-desc">200+ episode</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Grup: Riset & Karir --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-microscope text-amber-400 text-xs"></i> Riset <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('halaman.riset') }}" class="dropdown-item"><div class="item-icon bg-purple-500/10"><i class="fas fa-microscope text-purple-400"></i></div><div class="item-text"><div class="item-title">Riset</div><div class="item-desc">Pusat penelitian</div></div></a>
                                <a href="{{ route('halaman.karir') }}" class="dropdown-item"><div class="item-icon bg-orange-500/10"><i class="fas fa-briefcase text-orange-400"></i></div><div class="item-text"><div class="item-title">Karir</div><div class="item-desc">Lowongan & peluang</div></div></a>
                                <a href="{{ route('halaman.magang') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-building text-amber-400"></i></div><div class="item-text"><div class="item-title">Magang</div><div class="item-desc">200+ perusahaan</div></div></a>
                                <a href="{{ route('halaman.beasiswa') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-award text-yellow-400"></i></div><div class="item-text"><div class="item-title">Beasiswa</div><div class="item-desc">Pendanaan studi</div></div></a>
                                <a href="{{ route('halaman.kompetisi') }}" class="dropdown-item"><div class="item-icon bg-rose-500/10"><i class="fas fa-medal text-rose-400"></i></div><div class="item-text"><div class="item-title">Kompetisi</div><div class="item-desc">100+ event</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Grup: Komunitas --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-users text-pink-400 text-xs"></i> Komunitas <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('halaman.komunitas') }}" class="dropdown-item"><div class="item-icon bg-pink-500/10"><i class="fas fa-users text-pink-400"></i></div><div class="item-text"><div class="item-title">Komunitas</div><div class="item-desc">Kolaborasi</div></div></a>
                                <a href="{{ route('halaman.forum') }}" class="dropdown-item"><div class="item-icon bg-indigo-500/10"><i class="fas fa-comments text-indigo-400"></i></div><div class="item-text"><div class="item-title">Forum</div><div class="item-desc">50K+ diskusi</div></div></a>
                                <a href="{{ route('halaman.mentoring') }}" class="dropdown-item"><div class="item-icon bg-violet-500/10"><i class="fas fa-chalkboard-teacher text-violet-400"></i></div><div class="item-text"><div class="item-title">Mentoring</div><div class="item-desc">300+ mentor</div></div></a>
                                <a href="{{ route('halaman.alumni') }}" class="dropdown-item"><div class="item-icon bg-rose-500/10"><i class="fas fa-user-graduate text-rose-400"></i></div><div class="item-text"><div class="item-title">Alumni</div><div class="item-desc">25K+ anggota</div></div></a>
                                <a href="{{ route('halaman.konsultasi') }}" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-headset text-teal-400"></i></div><div class="item-text"><div class="item-title">Konsultasi</div><div class="item-desc">Bimbingan ahli</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Grup: Lainnya --}}
                    <div class="compact-group relative" data-compact-group>
                        <button class="compact-group-btn" data-compact-toggle>
                            <i class="fas fa-ellipsis-h text-cyan-400 text-xs"></i> Lainnya <i class="fas fa-chevron-down text-[7px] ml-1 opacity-50"></i>
                        </button>
                        <div class="compact-dropdown" style="right:0;left:auto">
                            <div class="nav-dropdown-inner" style="min-width:300px">
                                <a href="{{ route('halaman.sumber-daya') }}" class="dropdown-item"><div class="item-icon bg-cyan-500/10"><i class="fas fa-database text-cyan-400"></i></div><div class="item-text"><div class="item-title">Sumber Daya</div><div class="item-desc">Library & tools</div></div></a>
                                <a href="{{ route('halaman.keamanan') }}" class="dropdown-item"><div class="item-icon bg-red-500/10"><i class="fas fa-shield-alt text-red-400"></i></div><div class="item-text"><div class="item-title">Keamanan</div><div class="item-desc">ISO 27001</div></div></a>
                                <a href="{{ route('halaman.langganan') }}" class="dropdown-item"><div class="item-icon bg-amber-500/10"><i class="fas fa-crown text-amber-400"></i></div><div class="item-text"><div class="item-title">Langganan</div><div class="item-desc">Paket premium</div></div></a>
                                <a href="{{ route('halaman.media') }}" class="dropdown-item"><div class="item-icon bg-rose-500/10"><i class="fas fa-play-circle text-rose-400"></i></div><div class="item-text"><div class="item-title">Media</div><div class="item-desc">Video & audio</div></div></a>
                                <a href="{{ route('halaman.alur-panduan') }}" class="dropdown-item"><div class="item-icon bg-teal-500/10"><i class="fas fa-project-diagram text-teal-400"></i></div><div class="item-text"><div class="item-title">Panduan</div><div class="item-desc">Alur & SOP</div></div></a>
                                <a href="{{ route('kerja-sama.index') }}" class="dropdown-item"><div class="item-icon bg-yellow-500/10"><i class="fas fa-handshake text-yellow-400"></i></div><div class="item-text"><div class="item-title">Kerja Sama</div><div class="item-desc">150+ mitra</div></div></a>
                            </div>
                        </div>
                    </div>

                    {{-- Semua Menu --}}
                    <button onclick="bukaSemuaMenu()" class="btn-semua-menu ml-auto" title="Semua menu">
                        <i class="fas fa-th-large text-[11px]"></i> <span class="hidden xl:inline">Semua</span>
                    </button>
                </div>

                {{-- Right Controls --}}
                <div class="hidden lg:flex items-center gap-1 shrink-0 ml-3">
                    <button onclick="bukaSearch()" class="w-9 h-9 rounded-xl flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/50 transition" title="Cari"><i class="fas fa-search text-sm"></i></button>
                    @guest
                    <a href="{{ route('masuk') }}" class="px-4 py-2 text-xs text-gray-300 hover:text-white bg-kvt-800/50 hover:bg-kvt-700/50 rounded-xl transition font-semibold border border-kvt-700/30"><i class="fas fa-sign-in-alt text-xs text-kvt-400 mr-1"></i> Masuk</a>
                    <a href="{{ route('daftar') }}" class="px-4 py-2 text-xs bg-gradient-to-r from-kvt-500 to-ungu-500 text-white rounded-xl font-bold shadow-lg shadow-kvt-500/20"><i class="fas fa-user-plus text-xs mr-1"></i> Daftar</a>
                    @else
                    <button onclick="toggleUserMenu()" class="flex items-center gap-2 px-2 py-1.5 rounded-xl hover:bg-kvt-800/50 transition">
                        <div class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center text-white text-xs font-bold shadow">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                    </button>
                    @endguest
                </div>

                <button onclick="toggleMobile()" class="lg:hidden ml-auto w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition"><i class="fas fa-bars text-lg"></i></button>
            </div>
        </div>
    </nav>

    {{-- ==================== HEADER 3: CENTER (Logo Center, Menu Below) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-nav header-block header-center" id="navbar3" data-header="3">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-5">
            {{-- Row 1: Logo Centered --}}
            <div class="center-logo-row">
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg shadow-kvt-500/20 animate-glow">
                        <span class="text-white font-black text-lg tracking-tight">K</span>
                    </div>
                    <span class="text-xl font-extrabold tracking-tight"><span class="text-white">KVT</span><span class="text-kvt-400">Hub</span></span>
                </a>

                {{-- Right side: Search + Auth (absolute positioned) --}}
                <div class="hidden lg:flex items-center gap-2 absolute right-5">
                    <button onclick="bukaSearch()" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/50 transition"><i class="fas fa-search text-sm"></i></button>
                    @guest
                    <a href="{{ route('masuk') }}" class="px-3 py-1.5 text-xs text-gray-300 bg-kvt-800/50 rounded-lg font-semibold border border-kvt-700/30">Masuk</a>
                    @else
                    <button onclick="toggleUserMenu()" class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center text-white text-xs font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</button>
                    @endguest
                </div>
            </div>

            {{-- Row 2: Menu Centered with Scroll --}}
            <div class="hidden lg:flex center-menu-row relative overflow-x-auto scrollbar-hide" style="scrollbar-width:none">
                <a href="{{ route('beranda') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-home text-kvt-400 text-[10px]"></i> Beranda</a>
                <a href="{{ route('halaman.jenjang') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-graduation-cap text-green-400 text-[10px]"></i> Jenjang</a>
                <a href="{{ route('berita.index') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-newspaper text-emerald-400 text-[10px]"></i> Berita</a>
                <a href="{{ route('halaman.platform') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-laptop-code text-kvt-400 text-[10px]"></i> Platform</a>
                <a href="{{ route('halaman.e-learning') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-laptop text-kvt-400 text-[10px]"></i> E-Learning</a>
                <a href="{{ route('halaman.sertifikasi') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-certificate text-yellow-400 text-[10px]"></i> Sertifikasi</a>
                <a href="{{ route('halaman.riset') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-microscope text-purple-400 text-[10px]"></i> Riset</a>
                <a href="{{ route('halaman.karir') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-briefcase text-orange-400 text-[10px]"></i> Karir</a>
                <a href="{{ route('halaman.komunitas') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-users text-pink-400 text-[10px]"></i> Komunitas</a>
                <a href="{{ route('halaman.webinar') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-video text-red-400 text-[10px]"></i> Webinar</a>
                <a href="{{ route('halaman.laboratorium') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-flask text-cyan-400 text-[10px]"></i> Lab</a>
                <a href="{{ route('halaman.beasiswa') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-award text-amber-400 text-[10px]"></i> Beasiswa</a>
                <a href="{{ route('halaman.forum') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-comments text-indigo-400 text-[10px]"></i> Forum</a>
                <a href="{{ route('kerja-sama.index') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-handshake text-yellow-400 text-[10px]"></i> Kerja Sama</a>
                <a href="{{ route('halaman.keamanan') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-shield-alt text-red-400 text-[10px]"></i> Keamanan</a>
                <a href="{{ route('tentang') }}" class="nav-link text-xs !py-2 !px-3 shrink-0"><i class="fas fa-landmark text-indigo-400 text-[10px]"></i> Tentang</a>
                <button onclick="bukaSemuaMenu()" class="nav-link text-xs !py-2 !px-3 text-kvt-400 shrink-0"><i class="fas fa-th-large text-[10px]"></i> Lainnya</button>
            </div>

            <button onclick="toggleMobile()" class="lg:hidden ml-auto w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition absolute right-4 top-3"><i class="fas fa-bars text-lg"></i></button>
        </div>
    </nav>

    {{-- ==================== HEADER 4: CAROUSEL PAGINATED (5 items per page, dots + LAINNYA integrated) ==================== --}}
    <nav class="sticky top-0 w-full z-40 transition-all duration-300 kaca-nav header-block header-carousel" id="navbar4" data-header="4">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-5">
            <div class="flex items-center h-[64px] gap-3">
                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-2.5 shrink-0 group">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-xl flex items-center justify-center shadow-lg shadow-kvt-500/20 animate-glow">
                        <span class="text-white font-black text-lg">K</span>
                    </div>
                    <div class="leading-tight hidden md:block">
                        <span class="text-lg font-extrabold tracking-tight"><span class="text-white">KVT</span><span class="text-kvt-400">Hub</span></span>
                        <span class="block text-[9px] text-gray-500 tracking-[0.12em] font-semibold">GLOBAL EDUCATION</span>
                    </div>
                </a>

                <div class="hidden lg:block w-px h-7 bg-kvt-700/30"></div>

                {{-- Carousel Paginated Menu --}}
                <div class="hidden lg:flex items-center flex-1 gap-0">

                    {{-- Menu Items Container --}}
                    <div class="flex-1 overflow-hidden" id="carouselSlider">
                        <div class="carousel-track" id="carouselTrack">
                            {{-- Page items will be toggled by JS --}}
                        </div>
                    </div>

                    {{-- Unified Nav Pill: Arrows + Dots + Lainnya --}}
                    <div class="carousel-nav-pill ml-2" id="carouselNavPill">
                        <button onclick="carouselPrev()" class="carousel-arrow" id="carouselBtnPrev" title="Sebelumnya">
                            <i class="fas fa-chevron-left text-[8px]"></i>
                        </button>

                        <div class="flex items-center gap-1.5 px-1" id="carouselDots">
                            {{-- Dots generated by JS --}}
                        </div>

                        <button onclick="carouselNext()" class="carousel-arrow" id="carouselBtnNext" title="Berikutnya">
                            <i class="fas fa-chevron-right text-[8px]"></i>
                        </button>

                        <div class="w-px h-4 bg-kvt-700/30 mx-1"></div>

                        <button onclick="bukaSemuaMenu()" class="carousel-semua" title="Semua menu">
                            <i class="fas fa-th-large text-[10px]"></i>
                            <span class="hidden xl:inline">Lainnya</span>
                            <span class="carousel-badge" id="carouselBadge">1/4</span>
                        </button>
                    </div>
                </div>

                {{-- Right Controls --}}
                <div class="hidden lg:flex items-center gap-1 shrink-0">
                    <button onclick="bukaSearch()" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-kvt-400 hover:bg-kvt-800/50 transition"><i class="fas fa-search text-sm"></i></button>
                    @guest
                    <a href="{{ route('masuk') }}" class="px-3 py-1.5 text-xs text-gray-300 bg-kvt-800/50 rounded-lg font-semibold border border-kvt-700/30">Masuk</a>
                    <a href="{{ route('daftar') }}" class="px-3 py-1.5 text-xs bg-gradient-to-r from-kvt-500 to-ungu-500 text-white rounded-lg font-bold shadow-lg shadow-kvt-500/20">Daftar</a>
                    @else
                    <button onclick="toggleUserMenu()" class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded-lg flex items-center justify-center text-white text-xs font-bold">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</button>
                    @endguest
                </div>

                <button onclick="toggleMobile()" class="lg:hidden ml-auto w-10 h-10 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/50 transition"><i class="fas fa-bars text-lg"></i></button>
            </div>
        </div>
    </nav>

    {{-- ==================== KOTAK SARAN POPUP ==================== --}}
    <div id="saranOverlay" class="fixed inset-0 z-[90] hidden" style="backdrop-filter:blur(20px);background:rgba(2,16,41,0.92)">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-kvt-900/95 border border-kvt-700/30 rounded-3xl shadow-2xl shadow-black/50 w-full max-w-2xl popup-enter" style="border-radius:24px">
                {{-- Header --}}
                <div class="bg-gradient-to-r from-kvt-600 to-ungu-600 p-5 flex items-center justify-between" style="border-radius:24px 24px 0 0">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center">
                            <i class="fas fa-comment-dots text-white text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg">Kotak Saran & Masukan</h3>
                            <p class="text-white/70 text-xs">Bantu kami menjadi lebih baik</p>
                        </div>
                    </div>
                    <button onclick="tutupSaranPopup()" class="w-9 h-9 rounded-xl bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                {{-- Body --}}
                <form id="formSaran" onsubmit="kirimSaran(event)" class="p-6 space-y-5">
                    {{-- Kategori --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2"><i class="fas fa-tag text-kvt-400 mr-1.5"></i>Kategori Saran</label>
                        <div class="flex flex-wrap gap-2">
                            @php $kategori = ['Fitur Baru','Bug / Error','Tampilan / UI','Konten','Performa','Lainnya']; @endphp
                            @foreach($kategori as $i => $kat)
                            <label class="cursor-pointer">
                                <input type="radio" name="kategori_saran" value="{{ $kat }}" class="hidden peer" {{ $i === 0 ? 'checked' : '' }}>
                                <span class="inline-block px-4 py-2 text-xs font-semibold rounded-xl border border-kvt-700/30 text-gray-400 bg-kvt-800/30 peer-checked:bg-kvt-600 peer-checked:text-white peer-checked:border-kvt-500 transition cursor-pointer hover:bg-kvt-800/50">{{ $kat }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2"><i class="fas fa-pencil-alt text-kvt-400 mr-1.5"></i>Pesan / Saran Anda</label>
                        <textarea id="saranInput" rows="5" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 resize-none transition" placeholder="Tuliskan saran, masukan, atau laporan bug Anda disini... Semakin detail semakin baik!"></textarea>
                        <p class="text-[11px] text-gray-600 mt-1 flex items-center gap-1"><i class="fas fa-info-circle"></i> Minimal 10 karakter</p>
                    </div>

                    {{-- Lampiran --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2"><i class="fas fa-paperclip text-kvt-400 mr-1.5"></i>Lampiran (Opsional)</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            {{-- Dokumen --}}
                            <label class="cursor-pointer group">
                                <input type="file" id="saranDokumen" accept=".pdf,.doc,.docx,.txt,.xlsx,.csv" class="hidden" onchange="tampilNamaFile(this,'saranDokNama')">
                                <div class="flex items-center gap-3 bg-kvt-800/30 border border-dashed border-kvt-700/40 rounded-xl px-4 py-3 group-hover:border-kvt-500/50 group-hover:bg-kvt-800/50 transition">
                                    <div class="w-10 h-10 rounded-lg bg-blue-500/10 flex items-center justify-center shrink-0">
                                        <i class="fas fa-file-alt text-blue-400"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs font-semibold text-gray-300 block">Upload Dokumen</span>
                                        <span id="saranDokNama" class="text-[10px] text-gray-500 truncate block">PDF, DOC, XLSX, TXT (Maks 5MB)</span>
                                    </div>
                                </div>
                            </label>
                            {{-- Video/Gambar --}}
                            <label class="cursor-pointer group">
                                <input type="file" id="saranMedia" accept="image/*,video/*" class="hidden" onchange="tampilNamaFile(this,'saranMediaNama')">
                                <div class="flex items-center gap-3 bg-kvt-800/30 border border-dashed border-kvt-700/40 rounded-xl px-4 py-3 group-hover:border-kvt-500/50 group-hover:bg-kvt-800/50 transition">
                                    <div class="w-10 h-10 rounded-lg bg-purple-500/10 flex items-center justify-center shrink-0">
                                        <i class="fas fa-photo-video text-purple-400"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <span class="text-xs font-semibold text-gray-300 block">Upload Media</span>
                                        <span id="saranMediaNama" class="text-[10px] text-gray-500 truncate block">Gambar / Video (Maks 20MB)</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>

                    {{-- Kontak balik --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2"><i class="fas fa-envelope text-kvt-400 mr-1.5"></i>Email (Opsional)</label>
                        <input type="email" id="saranEmail" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition" placeholder="email@contoh.com — untuk respon balik dari tim">
                    </div>

                    {{-- Tombol Kirim --}}
                    <div class="flex items-center justify-between pt-2">
                        <p class="text-[11px] text-gray-600"><i class="fas fa-lock mr-1"></i>Saran Anda bersifat rahasia</p>
                        <button type="submit" id="btnKirimSaran" class="bg-gradient-to-r from-kvt-500 to-ungu-500 hover:from-kvt-400 hover:to-ungu-400 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg shadow-kvt-500/20 hover:shadow-kvt-500/30 flex items-center gap-2 text-sm">
                            <i class="fas fa-paper-plane"></i> Kirim Saran
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

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

                    {{-- Kotak Saran - Tombol Buka Popup --}}
                    <div class="mt-5">
                        <button onclick="bukaSaranPopup()" class="w-full bg-gradient-to-r from-kvt-600 to-ungu-600 hover:from-kvt-500 hover:to-ungu-500 text-white px-4 py-3 rounded-xl transition font-semibold text-sm flex items-center justify-center gap-2 shadow-lg shadow-kvt-500/20 hover:shadow-kvt-500/30 hover:-translate-y-0.5 active:translate-y-0">
                            <i class="fas fa-comment-dots"></i> Kotak Saran & Masukan
                        </button>
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

    {{-- VTuber removed --}}

    {{-- ==================== K-ARMA AI CHAT WIDGET ==================== --}}
    <button class="kuro-ai-toggle" onclick="toggleKuroChat()" title="K-Arma AI Assistant" id="kuroAiBtn">
        <img src="{{ asset('k-arma/k-arma.png') }}" alt="K-Arma" id="kuroAiIcon" onerror="this.onerror=null;this.src='{{ asset('gambar/kuro/kuro.png') }}'">
    </button>

    {{-- K-Arma Chat Panel --}}
    <div class="kuro-chat-panel" id="kuroChatPanel">
        <div class="kuro-chat-header">
            <div class="kuro-avatar">
                <img src="{{ asset('k-arma/k-arma.png') }}" alt="K-Arma" style="width:100%;height:100%;object-fit:cover;border-radius:12px">
            </div>
            <div class="flex-1">
                <h4 class="text-white font-bold text-sm flex items-center gap-2">
                    K-Arma AI
                    <span class="text-[9px] px-2 py-0.5 rounded-full bg-green-500/20 text-green-400 font-semibold">Multi-AI</span>
                </h4>
                <p class="text-[11px] text-gray-400 flex items-center gap-1">
                    <span id="kuroProviderLabel">GitHub AI</span> &bull;
                    <span id="kuroModelLabel">gpt-4o-mini</span>
                </p>
            </div>
            {{-- Provider selector toggle --}}
            <button onclick="toggleProviderPanel()" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-purple-400 hover:bg-white/10 transition" title="Ganti AI Provider" id="providerToggleBtn">
                <i class="fas fa-exchange-alt text-sm"></i>
            </button>
            <button onclick="toggleKuroChat()" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-white/10 transition">
                <i class="fas fa-times text-sm"></i>
            </button>
        </div>

        {{-- Provider Selector Panel (slide-down) --}}
        <div class="kuro-provider-panel" id="kuroProviderPanel">
            <div class="px-3 pt-3 pb-1">
                <div class="flex items-center justify-between mb-2">
                    <h5 class="text-[11px] text-gray-400 uppercase tracking-widest font-bold"><i class="fas fa-microchip mr-1"></i>Pilih AI Provider</h5>
                    <button onclick="toggleCustomKeyPanel()" class="text-[10px] text-gray-500 hover:text-pink-400 transition flex items-center gap-1" title="Gunakan API Key Sendiri">
                        <i class="fas fa-key text-[9px]"></i> API Key
                    </button>
                </div>
                <div class="kuro-provider-grid" id="kuroProviderGrid">
                    {{-- Providers will be loaded dynamically --}}
                    <button class="kuro-provider-card active" data-provider="github" onclick="selectProvider('github')">
                        <i class="fab fa-github" style="color:#8B5CF6"></i>
                        <span class="kuro-provider-name">GitHub AI</span>
                        <span class="kuro-provider-badge gratis">GRATIS</span>
                    </button>
                    <button class="kuro-provider-card" data-provider="openai" onclick="selectProvider('openai')">
                        <i class="fas fa-brain" style="color:#10B981"></i>
                        <span class="kuro-provider-name">OpenAI</span>
                    </button>
                    <button class="kuro-provider-card" data-provider="claude" onclick="selectProvider('claude')">
                        <i class="fas fa-robot" style="color:#F59E0B"></i>
                        <span class="kuro-provider-name">Claude</span>
                    </button>
                    <button class="kuro-provider-card" data-provider="ollama" onclick="selectProvider('ollama')">
                        <i class="fas fa-server" style="color:#3B82F6"></i>
                        <span class="kuro-provider-name">Ollama</span>
                        <span class="kuro-provider-badge lokal">LOKAL</span>
                    </button>
                    <button class="kuro-provider-card" data-provider="n8n" onclick="selectProvider('n8n')">
                        <i class="fas fa-project-diagram" style="color:#EF4444"></i>
                        <span class="kuro-provider-name">n8n</span>
                    </button>
                </div>
            </div>
            {{-- Custom API Key Panel --}}
            <div class="kuro-custom-key-panel" id="kuroCustomKeyPanel">
                <div class="px-3 pb-3">
                    <p class="text-[10px] text-gray-500 mb-1.5">Masukkan API key kamu sendiri (disimpan di browser):</p>
                    <div class="flex gap-1.5">
                        <input type="password" id="kuroCustomApiKey" placeholder="sk-... atau key lainnya"
                            class="flex-1 bg-white/5 border border-white/10 rounded-lg px-3 py-1.5 text-[11px] text-gray-300 placeholder-gray-600 outline-none focus:border-purple-400/50 transition" autocomplete="off">
                        <button onclick="saveCustomApiKey()" class="px-3 py-1.5 rounded-lg bg-purple-500/20 border border-purple-500/30 text-purple-300 text-[10px] font-bold hover:bg-purple-500/30 transition">
                            <i class="fas fa-save mr-1"></i>Simpan
                        </button>
                    </div>
                    <div class="flex items-center justify-between mt-1.5">
                        <span class="text-[9px] text-gray-600" id="kuroKeyStatus">Belum ada key tersimpan</span>
                        <button onclick="clearCustomApiKey()" class="text-[9px] text-red-400/50 hover:text-red-400 transition">Hapus Key</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="kuro-chat-body" id="kuroChatBody">
            {{-- Welcome message --}}
            <div class="kuro-msg bot">
                <div class="kuro-msg-avatar">
                    <img src="{{ asset('k-arma/k-arma.png') }}" alt="K" style="width:100%;height:100%;object-fit:cover">
                </div>
                <div class="kuro-msg-bubble">
                    <strong>Halo! Aku K-Arma</strong> <span style="font-size:16px">✨</span><br>
                    Asisten AI super cerdas dari KVT Hub!

                    {{-- Character intro card with karakter.png --}}
                    <div class="karma-intro-card">
                        <img src="{{ asset('k-arma/karakter.svg') }}" alt="K-Arma Character" onerror="this.onerror=null;this.src='{{ asset('k-arma/k-arma.png') }}'">
                        <div class="karma-intro-info">
                            <strong>K-Arma</strong> &mdash; AI Assistant<br>
                            Aku bisa menganalisis dokumen, gambar, video, dan bahkan membuat video otomatis untukmu!
                        </div>
                    </div>

                    {{-- Tools grid --}}
                    <div class="karma-tools-grid">
                        <div class="karma-tool-chip"><i class="fas fa-file-pdf text-red-400"></i> Analisis Dokumen</div>
                        <div class="karma-tool-chip"><i class="fas fa-image text-blue-400"></i> Analisis Gambar</div>
                        <div class="karma-tool-chip"><i class="fas fa-video text-purple-400"></i> Analisis Video</div>
                        <div class="karma-tool-chip"><i class="fas fa-film text-pink-400"></i> Generate Video</div>
                        <div class="karma-tool-chip"><i class="fas fa-graduation-cap text-amber-400"></i> Rekomendasi Prodi</div>
                        <div class="karma-tool-chip"><i class="fas fa-search text-green-400"></i> Riset & Analisis</div>
                        <div class="karma-tool-chip"><i class="fas fa-language text-cyan-400"></i> Multi Bahasa</div>
                        <div class="karma-tool-chip"><i class="fas fa-magic text-orange-400"></i> AI Kreatif</div>
                    </div>

                    {{-- Quick asks --}}
                    <div style="margin-top:8px;display:flex;flex-wrap:wrap;gap:4px">
                        <button onclick="kuroQuickAsk('Apa itu KVT Hub?')" class="text-[10px] px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:border-pink-400/30 transition cursor-pointer">Apa itu KVT Hub?</button>
                        <button onclick="kuroQuickAsk('Buatkan video pendek tentang KVT Hub')" class="text-[10px] px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:border-pink-400/30 transition cursor-pointer">Buat video</button>
                        <button onclick="kuroQuickAsk('Rekomendasikan prodi untukku')" class="text-[10px] px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:border-pink-400/30 transition cursor-pointer">Rekomendasi prodi</button>
                        <button onclick="kuroQuickAsk('Analisis tren pendidikan 2026')" class="text-[10px] px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:border-pink-400/30 transition cursor-pointer">Tren edukasi</button>
                        <button onclick="kuroQuickAsk('Beasiswa yang tersedia')" class="text-[10px] px-2.5 py-1 rounded-full bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:border-pink-400/30 transition cursor-pointer">Info beasiswa</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="kuro-chat-footer" style="flex-direction:column;gap:6px;padding:10px 14px">
            {{-- Attachment bar --}}
            <div id="karmaFileBadgeArea"></div>
            <div style="display:flex;align-items:center;gap:6px;width:100%">
                <div class="karma-attach-bar">
                    <label for="karmaFileInput" class="karma-attach-btn" title="Dokumen (PDF, DOC, TXT)">
                        <i class="fas fa-file-alt"></i>
                    </label>
                    <input type="file" id="karmaFileInput" class="hidden" accept=".pdf,.doc,.docx,.txt,.csv,.xlsx" onchange="karmaHandleFile(this)">
                    <label for="karmaImageInput" class="karma-attach-btn" title="Gambar (PNG, JPG)">
                        <i class="fas fa-image"></i>
                    </label>
                    <input type="file" id="karmaImageInput" class="hidden" accept=".png,.jpg,.jpeg,.gif,.webp,.svg" onchange="karmaHandleFile(this)">
                    <label for="karmaVideoInput" class="karma-attach-btn" title="Video (MP4, WebM)">
                        <i class="fas fa-video"></i>
                    </label>
                    <input type="file" id="karmaVideoInput" class="hidden" accept=".mp4,.webm,.mov,.avi" onchange="karmaHandleFile(this)">
                    <button class="karma-attach-btn" onclick="karmaShowVideoGen()" title="AI Generate Video">
                        <i class="fas fa-film"></i>
                    </button>
                </div>
                <input type="text" id="kuroInput" placeholder="Tanya K-Arma sesuatu..." onkeydown="if(event.key==='Enter')kuroSend()" autocomplete="off" style="flex:1">
                <button class="kuro-chat-send" onclick="kuroSend()" id="kuroSendBtn" title="Kirim">
                    <i class="fas fa-paper-plane text-sm"></i>
                </button>
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

                {{-- Gaya Header --}}
                <div>
                    <p class="text-[10px] text-gray-500 uppercase tracking-widest font-bold mb-2"><i class="fas fa-columns mr-1"></i>Gaya Header / Navbar</p>
                    <div class="grid grid-cols-2 gap-2">
                        {{-- Header 1: Default --}}
                        <button onclick="gantiHeader(1)" class="header-style-card aktif" data-header-card="1">
                            <div class="preview-bar">
                                <div class="w-4 h-4 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded flex-shrink-0" style="border-radius:3px"></div>
                                <div class="flex gap-0.5 flex-1 ml-1">
                                    <div class="h-1.5 w-5 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1.5 w-3 bg-kvt-500/40 rounded-sm ml-auto"></div>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 font-bold">Default</span>
                            <p class="text-[8px] text-gray-600">Horizontal + Pagination</p>
                        </button>

                        {{-- Header 2: Compact --}}
                        <button onclick="gantiHeader(2)" class="header-style-card" data-header-card="2">
                            <div class="preview-bar">
                                <div class="w-4 h-4 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded flex-shrink-0" style="border-radius:3px"></div>
                                <div class="flex gap-0.5 flex-1 ml-1">
                                    <div class="h-1.5 w-6 bg-kvt-500/30 rounded-sm border border-kvt-600/20"></div>
                                    <div class="h-1.5 w-6 bg-kvt-500/30 rounded-sm border border-kvt-600/20"></div>
                                    <div class="h-1.5 w-6 bg-kvt-500/30 rounded-sm border border-kvt-600/20"></div>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 font-bold">Compact</span>
                            <p class="text-[8px] text-gray-600">Grouped Dropdowns</p>
                        </button>

                        {{-- Header 3: Center --}}
                        <button onclick="gantiHeader(3)" class="header-style-card" data-header-card="3">
                            <div class="preview-bar flex-col !h-auto !p-1 gap-1">
                                <div class="flex items-center justify-center gap-1 w-full">
                                    <div class="w-3 h-3 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded" style="border-radius:2px"></div>
                                    <div class="h-1 w-6 bg-gray-500 rounded-sm"></div>
                                </div>
                                <div class="flex gap-0.5 justify-center w-full">
                                    <div class="h-1 w-4 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1 w-4 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1 w-4 bg-gray-600 rounded-sm"></div>
                                    <div class="h-1 w-4 bg-gray-600 rounded-sm"></div>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 font-bold">Center</span>
                            <p class="text-[8px] text-gray-600">Logo Tengah + Menu Bawah</p>
                        </button>

                        {{-- Header 4: Carousel --}}
                        <button onclick="gantiHeader(4)" class="header-style-card" data-header-card="4">
                            <div class="preview-bar">
                                <div class="w-4 h-4 bg-gradient-to-br from-kvt-400 to-ungu-500 rounded flex-shrink-0" style="border-radius:3px"></div>
                                <div class="flex gap-0.5 flex-1 ml-1 items-center">
                                    <div class="h-1.5 w-5 bg-kvt-500/40 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-kvt-500/40 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-kvt-500/40 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-kvt-500/40 rounded-sm"></div>
                                    <div class="h-1.5 w-5 bg-kvt-500/40 rounded-sm"></div>
                                </div>
                                <div class="flex gap-0.5 ml-auto items-center">
                                    <div class="w-1.5 h-1.5 bg-kvt-500/30 rounded-full"></div>
                                    <div class="w-3 h-1.5 bg-gradient-to-r from-kvt-500 to-ungu-500 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-kvt-500/30 rounded-full"></div>
                                    <div class="w-1.5 h-1.5 bg-kvt-500/30 rounded-full"></div>
                                </div>
                            </div>
                            <span class="text-[10px] text-gray-400 font-bold">Carousel</span>
                            <p class="text-[8px] text-gray-600">5 Menu + Dots + Lainnya</p>
                        </button>
                    </div>
                </div>

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
            const activeNav = document.querySelector('.header-block.header-aktif');
            if(activeNav && window.scrollY > 20) {
                activeNav.classList.add('shadow-lg','shadow-kvt-950/50');
                activeNav.style.borderColor = 'rgba(51,153,255,0.15)';
            } else if(activeNav) {
                activeNav.classList.remove('shadow-lg','shadow-kvt-950/50');
                activeNav.style.borderColor = '';
            }
        });

        // ========================
        // HEADER STYLE SWITCHER
        // ========================
        function gantiHeader(num) {
            // Hide all headers
            document.querySelectorAll('.header-block').forEach(h => {
                h.classList.remove('header-aktif');
            });
            // Show selected
            const target = document.querySelector('[data-header="'+num+'"]');
            if (target) target.classList.add('header-aktif');

            // Update settings cards
            document.querySelectorAll('.header-style-card').forEach(c => c.classList.remove('aktif'));
            const card = document.querySelector('[data-header-card="'+num+'"]');
            if (card) card.classList.add('aktif');

            // Save preference
            localStorage.setItem('kvt_header_style', num);

            // Toast notification
            const names = {1:'Default',2:'Compact',3:'Center',4:'Vertikal'};
            const toast = document.createElement('div');
            toast.className = 'fixed top-20 right-4 z-[200] bg-kvt-500/90 backdrop-blur text-white px-5 py-2.5 rounded-xl shadow-lg text-sm font-semibold flex items-center gap-2';
            toast.innerHTML = '<i class="fas fa-columns"></i> Header: ' + (names[num]||'Default');
            document.body.appendChild(toast);
            setTimeout(() => { toast.style.transition='opacity 0.3s';toast.style.opacity='0';setTimeout(()=>toast.remove(),300) }, 1500);
        }

        // Load saved header on init
        (function(){
            const saved = parseInt(localStorage.getItem('kvt_header_style')) || 1;
            if (saved !== 1) gantiHeader(saved);
        })();

        // ========================
        // HEADER 2: COMPACT DROPDOWN LOGIC
        // ========================
        document.querySelectorAll('[data-compact-toggle]').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const group = this.closest('[data-compact-group]');
                const wasOpen = group.classList.contains('open');

                // Close all compact groups
                document.querySelectorAll('[data-compact-group]').forEach(g => g.classList.remove('open'));

                if (!wasOpen) group.classList.add('open');
            });
        });

        // Close compact dropdowns on click outside
        document.addEventListener('click', function() {
            document.querySelectorAll('[data-compact-group]').forEach(g => g.classList.remove('open'));
        });

        // ========================
        // HEADER 4: CAROUSEL PAGINATED LOGIC
        // ========================
        const carouselMenuData = [
            { label: 'Beranda', icon: 'fa-home', color: 'text-kvt-400', url: '{{ route("beranda") }}' },
            { label: 'Jenjang', icon: 'fa-graduation-cap', color: 'text-green-400', url: '{{ route("halaman.jenjang") }}' },
            { label: 'Berita', icon: 'fa-newspaper', color: 'text-emerald-400', url: '{{ route("berita.index") }}' },
            { label: 'Riset', icon: 'fa-microscope', color: 'text-purple-400', url: '{{ route("halaman.riset") }}' },
            { label: 'Karir', icon: 'fa-briefcase', color: 'text-orange-400', url: '{{ route("halaman.karir") }}' },
            { label: 'Komunitas', icon: 'fa-users', color: 'text-pink-400', url: '{{ route("halaman.komunitas") }}' },
            { label: 'E-Learning', icon: 'fa-laptop', color: 'text-kvt-400', url: '{{ route("halaman.e-learning") }}' },
            { label: 'Kerja Sama', icon: 'fa-handshake', color: 'text-yellow-400', url: '{{ route("kerja-sama.index") }}' },
            { label: 'Sertifikasi', icon: 'fa-award', color: 'text-yellow-400', url: '{{ route("halaman.sertifikasi") }}' },
            { label: 'Keamanan', icon: 'fa-shield-alt', color: 'text-red-400', url: '{{ route("halaman.keamanan") }}' },
            { label: 'Kurikulum', icon: 'fa-book-reader', color: 'text-indigo-400', url: '{{ route("halaman.kurikulum") }}' },
            { label: 'Webinar', icon: 'fa-video', color: 'text-red-400', url: '{{ route("halaman.webinar") }}' },
            { label: 'Workshop', icon: 'fa-tools', color: 'text-green-400', url: '{{ route("halaman.workshop") }}' },
            { label: 'Forum', icon: 'fa-comments', color: 'text-indigo-400', url: '{{ route("halaman.forum") }}' },
            { label: 'Media', icon: 'fa-play-circle', color: 'text-rose-400', url: '{{ route("halaman.media") }}' },
            { label: 'Sumber Daya', icon: 'fa-database', color: 'text-cyan-400', url: '{{ route("halaman.sumber-daya") }}' },
            { label: 'Tentang', icon: 'fa-landmark', color: 'text-purple-400', url: '{{ route("tentang") }}' },
            { label: 'Langganan', icon: 'fa-crown', color: 'text-amber-400', url: '{{ route("halaman.langganan") }}' },
            { label: 'Panduan', icon: 'fa-project-diagram', color: 'text-teal-400', url: '{{ route("halaman.alur-panduan") }}' },
        ];
        const CAROUSEL_PER_PAGE = 5;
        let carouselPage = 0;
        const carouselTotalPages = Math.ceil(carouselMenuData.length / CAROUSEL_PER_PAGE);

        function carouselRender(page) {
            const track = document.getElementById('carouselTrack');
            const dots = document.getElementById('carouselDots');
            const badge = document.getElementById('carouselBadge');
            if (!track) return;

            carouselPage = page;
            const start = page * CAROUSEL_PER_PAGE;
            const items = carouselMenuData.slice(start, start + CAROUSEL_PER_PAGE);

            // Render menu items
            track.innerHTML = items.map((m, i) =>
                `<a href="${m.url}" class="carousel-item nav-link text-xs !py-2 !px-3" style="animation-delay:${i*0.05}s">`+
                `<i class="fas ${m.icon} ${m.color} text-[11px]"></i> ${m.label}</a>`
            ).join('');

            // Render dots
            if (dots) {
                dots.innerHTML = '';
                for (let i = 0; i < carouselTotalPages; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'carousel-dot' + (i === page ? ' aktif' : '');
                    dot.title = 'Halaman ' + (i+1);
                    dot.onclick = () => carouselRender(i);
                    dots.appendChild(dot);
                }
            }

            // Update badge
            if (badge) badge.textContent = (page+1) + '/' + carouselTotalPages;

            // Update arrows
            const prev = document.getElementById('carouselBtnPrev');
            const next = document.getElementById('carouselBtnNext');
            if (prev) prev.disabled = page === 0;
            if (next) next.disabled = page >= carouselTotalPages - 1;
        }

        function carouselPrev() {
            if (carouselPage > 0) carouselRender(carouselPage - 1);
        }

        function carouselNext() {
            if (carouselPage < carouselTotalPages - 1) carouselRender(carouselPage + 1);
        }

        // Init carousel
        carouselRender(0);

        // Mouse wheel on carousel
        const carouselSlider = document.getElementById('carouselSlider');
        if (carouselSlider) {
            carouselSlider.addEventListener('wheel', function(e) {
                e.preventDefault();
                if (e.deltaY > 0) carouselNext(); else carouselPrev();
            }, { passive: false });
        }

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
        function toggleMobile() {
            const menu = document.getElementById('mobileMenu');
            if (menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                menu.style.maxHeight = '0';
                menu.style.opacity = '0';
                requestAnimationFrame(() => { menu.style.transition = 'max-height 0.4s ease, opacity 0.3s ease'; menu.style.maxHeight = '80vh'; menu.style.opacity = '1'; });
            } else {
                menu.style.maxHeight = '0'; menu.style.opacity = '0';
                setTimeout(() => { menu.classList.add('hidden'); menu.style.transition = ''; menu.style.maxHeight = ''; menu.style.opacity = ''; }, 400);
            }
        }

        // Mobile accordion
        function toggleMobileAccordion(btn) {
            const content = btn.nextElementSibling;
            const chevron = btn.querySelector('.accordion-chevron');
            const isOpen = !content.classList.contains('hidden');
            // Close all other accordions
            document.querySelectorAll('#mobileMenu .accordion-content').forEach(c => {
                if (c !== content) { c.classList.add('hidden'); c.style.maxHeight = '0'; }
            });
            document.querySelectorAll('#mobileMenu .accordion-chevron').forEach(c => { c.style.transform = 'rotate(0deg)'; });
            if (isOpen) {
                content.style.maxHeight = '0';
                setTimeout(() => content.classList.add('hidden'), 300);
                chevron.style.transform = 'rotate(0deg)';
            } else {
                content.classList.remove('hidden');
                content.style.maxHeight = content.scrollHeight + 'px';
                content.style.transition = 'max-height 0.3s ease';
                chevron.style.transform = 'rotate(180deg)';
            }
        }

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
                if(!wasOpen) {
                    item.classList.add('dropdown-open');
                    posisiDropdown(item);
                }
            });
        });

        // Auto-position dropdown agar tidak kepotong kiri/kanan
        function posisiDropdown(navItem) {
            const dropdown = navItem.querySelector('.nav-dropdown');
            if (!dropdown) return;

            // Reset positioning dulu
            dropdown.classList.remove('dropdown-flip-right', 'dropdown-flip-left', 'dropdown-clamped');
            dropdown.style.left = '';
            dropdown.style.right = '';

            // Tunggu render untuk mengukur
            requestAnimationFrame(() => {
                const rect = dropdown.getBoundingClientRect();
                const vw = window.innerWidth;
                const itemRect = navItem.getBoundingClientRect();

                // Jika dropdown melewati sisi kanan viewport
                if (rect.right > vw - 8) {
                    // Coba flip ke kanan dulu
                    dropdown.classList.add('dropdown-flip-right');
                    const newRect = dropdown.getBoundingClientRect();
                    // Jika masih keluar di kiri setelah flip
                    if (newRect.left < 8) {
                        dropdown.classList.remove('dropdown-flip-right');
                        dropdown.classList.add('dropdown-clamped');
                        // Posisikan manual agar pas di viewport
                        const overflow = rect.right - vw + 16;
                        dropdown.style.left = (-overflow) + 'px';
                    }
                }
                // Jika dropdown melewati sisi kiri viewport
                else if (rect.left < 8) {
                    dropdown.classList.add('dropdown-flip-left');
                    dropdown.style.left = (-rect.left + 8) + 'px';
                }
            });
        }

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
        const ITEMS_PER_PAGE = 8;
        let currentNavPage = 0;
        let totalNavPages = 3;

        // Default page assignments (24 menus / 8 per page = 3 pages)
        const defaultPageMap = {
            // Hal 0 (1/3): Utama
            'beranda':0,'jenjang':0,'platform':0,'kerjasama':0,'berita':0,'tentang':0,'riset':0,'karir':0,
            // Hal 1 (2/3): Layanan & Info
            'komunitas':1,'sertifikasi':1,'langganan':1,'sumberdaya':1,'keamanan':1,'kurikulum':1,'panduan':1,'donasi':1,
            // Hal 2 (3/3): Staff & Ekstra
            'staff':2,'media':2,'dokumen':2,'bantuan':2,'edukasi':2,'statistik':2,'webinar':2,'beasiswa':2
        };

        function getPageMap() {
            try {
                const saved = localStorage.getItem('kvt_nav_pages');
                const ver = localStorage.getItem('kvt_nav_ver');
                if (saved && ver === '5') return JSON.parse(saved);
                // Clear old format
                localStorage.removeItem('kvt_nav_pages');
                localStorage.removeItem('kvt_nav_ver');
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

            // Update page number buttons (top row)
            const numsTop = document.getElementById('navPageNumsTop');
            if (numsTop) {
                numsTop.innerHTML = '';
                // Show max 7 pages with ellipsis logic for many pages
                const maxShow = 7;
                let pages = [];
                if (totalNavPages <= maxShow) {
                    pages = Array.from({length: totalNavPages}, (_, i) => i);
                } else {
                    // Always show first, last, current, and neighbors
                    pages = [0];
                    let start = Math.max(1, currentNavPage - 1);
                    let end = Math.min(totalNavPages - 2, currentNavPage + 1);
                    if (start > 1) pages.push(-1); // ellipsis
                    for (let i = start; i <= end; i++) pages.push(i);
                    if (end < totalNavPages - 2) pages.push(-1); // ellipsis
                    pages.push(totalNavPages - 1);
                }
                pages.forEach(i => {
                    if (i === -1) {
                        const dots = document.createElement('span');
                        dots.className = 'text-gray-600 text-[10px] px-0.5';
                        dots.textContent = '···';
                        numsTop.appendChild(dots);
                    } else {
                        const btn = document.createElement('div');
                        btn.className = 'nav-page-num' + (i === currentNavPage ? ' aktif' : '');
                        btn.textContent = (i + 1);
                        btn.title = 'Halaman ' + (i + 1);
                        btn.onclick = () => renderNavPage(i);
                        numsTop.appendChild(btn);
                    }
                });
            }

            // Update dot indicators (original - hidden)
            const dotsContainer = document.getElementById('navDotIndicators');
            if (dotsContainer) {
                dotsContainer.innerHTML = '';
                for (let i = 0; i < totalNavPages; i++) {
                    const dot = document.createElement('div');
                    dot.className = 'nav-dot' + (i === currentNavPage ? ' aktif' : '');
                    dot.title = 'Halaman ' + (i + 1);
                    dot.onclick = () => renderNavPage(i);
                    dotsContainer.appendChild(dot);
                }
            }

            // Update editable page inputs
            const pageText = (currentNavPage + 1) + '/' + totalNavPages;
            const inputTop = document.getElementById('navPageInputTop');
            if (inputTop && document.activeElement !== inputTop) inputTop.value = pageText;

            // Update old badge (hidden)
            const badge = document.getElementById('navPageBadge');
            if (badge) badge.textContent = pageText;

            // Disable/enable arrow buttons (both original and top row)
            const prevBtn = document.getElementById('navBtnPrev');
            const nextBtn = document.getElementById('navBtnNext');
            if (prevBtn) prevBtn.disabled = currentNavPage === 0;
            if (nextBtn) nextBtn.disabled = currentNavPage >= totalNavPages - 1;
            const prevBtnTop = document.getElementById('navBtnPrevTop');
            const nextBtnTop = document.getElementById('navBtnNextTop');
            if (prevBtnTop) prevBtnTop.disabled = currentNavPage === 0;
            if (nextBtnTop) nextBtnTop.disabled = currentNavPage >= totalNavPages - 1;
        }

        // Handle editable page input - type page number and press Enter to jump
        function navInputKeydown(e, input) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const val = input.value.trim();
                // Support "5" or "5/13" format
                let pageNum = parseInt(val.split('/')[0]);
                if (!isNaN(pageNum) && pageNum >= 1 && pageNum <= totalNavPages) {
                    renderNavPage(pageNum - 1);
                    input.blur();
                } else {
                    input.value = (currentNavPage + 1) + '/' + totalNavPages;
                }
            } else if (e.key === 'Escape') {
                input.value = (currentNavPage + 1) + '/' + totalNavPages;
                input.blur();
            }
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
            'panduan':'Panduan','donasi':'Donasi',
            'staff':'Staff','media':'Media','dokumen':'Dokumen','bantuan':'Bantuan',
            'edukasi':'Edukasi Gratis','statistik':'Statistik','webinar':'Webinar','beasiswa':'Beasiswa',
            // === AI & Innovation (Menu 101-200) ===
            'ai-playground':'AI Playground','ml-training':'ML Training','nlp-studio':'NLP Studio',
            'computer-vision':'Computer Vision','ai-art':'AI Art','ai-music':'AI Music',
            'ai-code':'AI Code','prompt-engineering':'Prompt Engineering',
            'ai-vtuber':'AI VTuber','ai-avatar':'AI Avatar','mocap-lab':'MoCap Lab',
            'virtual-presenter':'Virtual Presenter','ai-voice':'AI Voice','ai-translator':'AI Translator',
            'ai-tutor':'AI Tutor','ai-writer':'AI Writer',
            'smart-dashboard':'Smart Dashboard','smart-attendance':'Smart Attendance','air-quality':'Air Quality',
            'smart-parking':'Smart Parking','smart-library':'Smart Library','weather-station':'Weather Station',
            'building-manager':'Building Manager','iot-simulator':'IoT Simulator',
            'digital-twin':'Digital Twin','metaverse-classroom':'Metaverse','ar-museum':'AR Museum',
            'hologram-lecture':'Hologram Lecture','vr-field-trip':'VR Trip','quantum-lab':'Quantum Lab',
            'edge-computing':'Edge Computing','gpu-cloud':'GPU Cloud',
            'cicd-pipeline':'CI/CD Pipeline','container-lab':'Container Lab','api-marketplace':'API Market',
            'serverless-hub':'Serverless Hub','microservices':'Microservices','database-sandbox':'DB Sandbox',
            'cyber-range':'Cyber Range','pentest-lab':'Pentest Lab',
            'digital-forensic':'Digital Forensic','threat-intelligence':'Threat Intel','bi-dashboard':'BI Dashboard',
            'realtime-analytics':'RT Analytics','data-lakehouse':'Data Lakehouse','etl-studio':'ETL Studio',
            'geospatial':'Geospatial','neural-network-viz':'Neural Viz',
            'smart-contract-ide':'Smart Contract','dapp-builder':'DApp Builder','token-factory':'Token Factory',
            'nft-studio':'NFT Studio','dao-hub':'DAO Hub','crypto-trading-sim':'Crypto Trading',
            'space-lab':'Space Lab','satellite-tracker':'Satellite Tracker',
            'robot-simulator':'Robot Sim','drone-lab':'Drone Lab','self-driving-sim':'Self Driving',
            '3d-printing':'3D Printing','swarm-intelligence':'Swarm AI','genome-editor':'Genome Editor',
            'drug-discovery':'Drug Discovery','protein-folding':'Protein Folding',
            'ai-film-studio':'AI Film','ai-debate':'AI Debate','ai-composer':'AI Composer',
            'ai-photo-enhancer':'AI Photo','ai-storyteller':'AI Storyteller','ai-meme':'AI Meme',
            'ai-logo-maker':'AI Logo','ai-presentation':'AI Presentasi',
            'brain-interface':'Brain Interface','nanotechnology':'Nanotech','fusion-energy':'Fusion Energy',
            'quantum-crypto':'Quantum Crypto','carbon-capture':'Carbon Capture','synthetic-biology':'Synth Bio',
            'bioethics':'Bioethics','clinical-trials-ai':'Clinical AI',
            'smart-factory':'Smart Factory','supply-chain-ai':'Supply Chain','predictive-maintenance':'Predictive',
            'quality-control-ai':'QC AI','cobots-lab':'Cobots Lab','mes-system':'MES System',
            'sdg-dashboard':'SDG Dashboard','carbon-footprint':'Carbon Footprint',
            'social-enterprise':'Social Enterprise','disaster-response-ai':'Disaster AI',
            'accessibility-lab':'Accessibility','ai-ethics':'AI Ethics','innovation-garage':'Innovation',
            'ai-homework':'AI Homework','ai-resume-scorer':'AI Resume','ai-interview-coach':'AI Interview',
            'ai-health-monitor':'AI Health','ai-fitness':'AI Fitness','ai-study-planner':'AI Study',
            'ai-exam-prep':'AI Exam'
        };
        const menuIcons = {
            'beranda':'fa-home','jenjang':'fa-graduation-cap','platform':'fa-cubes','berita':'fa-newspaper',
            'kerjasama':'fa-handshake','tentang':'fa-info-circle','riset':'fa-microscope','karir':'fa-briefcase',
            'komunitas':'fa-users','sertifikasi':'fa-award','langganan':'fa-crown',
            'sumberdaya':'fa-database','keamanan':'fa-shield-alt','kurikulum':'fa-book-reader',
            'panduan':'fa-project-diagram','donasi':'fa-hand-holding-heart',
            'staff':'fa-user-tie','media':'fa-play-circle','dokumen':'fa-file-alt','bantuan':'fa-life-ring',
            'edukasi':'fa-gift','statistik':'fa-chart-line','webinar':'fa-video','beasiswa':'fa-award',
            // === AI & Innovation (Menu 101-200) ===
            'ai-playground':'fa-flask','ml-training':'fa-brain','nlp-studio':'fa-comment-dots',
            'computer-vision':'fa-eye','ai-art':'fa-paint-brush','ai-music':'fa-music',
            'ai-code':'fa-code','prompt-engineering':'fa-keyboard',
            'ai-vtuber':'fa-user-astronaut','ai-avatar':'fa-user-circle','mocap-lab':'fa-walking',
            'virtual-presenter':'fa-chalkboard-teacher','ai-voice':'fa-microphone-alt','ai-translator':'fa-language',
            'ai-tutor':'fa-user-graduate','ai-writer':'fa-pen-fancy',
            'smart-dashboard':'fa-tachometer-alt','smart-attendance':'fa-fingerprint','air-quality':'fa-wind',
            'smart-parking':'fa-parking','smart-library':'fa-book','weather-station':'fa-cloud-sun',
            'building-manager':'fa-building','iot-simulator':'fa-microchip',
            'digital-twin':'fa-city','metaverse-classroom':'fa-vr-cardboard','ar-museum':'fa-monument',
            'hologram-lecture':'fa-broadcast-tower','vr-field-trip':'fa-globe-americas','quantum-lab':'fa-atom',
            'edge-computing':'fa-network-wired','gpu-cloud':'fa-server',
            'cicd-pipeline':'fa-code-branch','container-lab':'fa-box','api-marketplace':'fa-plug',
            'serverless-hub':'fa-cloud','microservices':'fa-project-diagram','database-sandbox':'fa-database',
            'cyber-range':'fa-shield-virus','pentest-lab':'fa-bug',
            'digital-forensic':'fa-search','threat-intelligence':'fa-crosshairs','bi-dashboard':'fa-chart-bar',
            'realtime-analytics':'fa-chart-area','data-lakehouse':'fa-warehouse','etl-studio':'fa-exchange-alt',
            'geospatial':'fa-map-marked-alt','neural-network-viz':'fa-sitemap',
            'smart-contract-ide':'fa-file-contract','dapp-builder':'fa-cubes','token-factory':'fa-coins',
            'nft-studio':'fa-gem','dao-hub':'fa-balance-scale','crypto-trading-sim':'fa-chart-line',
            'space-lab':'fa-rocket','satellite-tracker':'fa-satellite',
            'robot-simulator':'fa-robot','drone-lab':'fa-helicopter','self-driving-sim':'fa-car',
            '3d-printing':'fa-print','swarm-intelligence':'fa-spider','genome-editor':'fa-dna',
            'drug-discovery':'fa-pills','protein-folding':'fa-puzzle-piece',
            'ai-film-studio':'fa-film','ai-debate':'fa-gavel','ai-composer':'fa-guitar',
            'ai-photo-enhancer':'fa-image','ai-storyteller':'fa-book-open','ai-meme':'fa-laugh',
            'ai-logo-maker':'fa-palette','ai-presentation':'fa-desktop',
            'brain-interface':'fa-brain','nanotechnology':'fa-microscope','fusion-energy':'fa-bolt',
            'quantum-crypto':'fa-key','carbon-capture':'fa-leaf','synthetic-biology':'fa-seedling',
            'bioethics':'fa-balance-scale','clinical-trials-ai':'fa-stethoscope',
            'smart-factory':'fa-industry','supply-chain-ai':'fa-truck','predictive-maintenance':'fa-tools',
            'quality-control-ai':'fa-check-double','cobots-lab':'fa-hands-helping','mes-system':'fa-cogs',
            'sdg-dashboard':'fa-globe-africa','carbon-footprint':'fa-shoe-prints',
            'social-enterprise':'fa-hand-holding-heart','disaster-response-ai':'fa-first-aid',
            'accessibility-lab':'fa-universal-access','ai-ethics':'fa-gavel','innovation-garage':'fa-lightbulb',
            'ai-homework':'fa-pencil-alt','ai-resume-scorer':'fa-file-alt','ai-interview-coach':'fa-user-tie',
            'ai-health-monitor':'fa-heartbeat','ai-fitness':'fa-dumbbell','ai-study-planner':'fa-calendar-alt',
            'ai-exam-prep':'fa-clipboard-check'
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
                        ${Array.from({length:totalNavPages},(_,p) => `<option value="${p}" ${page===p?'selected':''}>Hal ${p+1}</option>`).join('')}
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
            localStorage.setItem('kvt_nav_ver', '5');
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
        // NOTIFICATION BELL (Real-Time)
        // ========================
        let notifData = [];
        let notifPollingTimer = null;

        function toggleNotifikasi() {
            const dd = document.getElementById('notifDropdown');
            dd.classList.toggle('hidden');
            if(!dd.classList.contains('hidden')) muatNotifikasi();
        }

        function muatNotifikasi() {
            // Fetch from real notification API
            fetch('/api/notifications').then(r=>r.json()).then(data=>{
                const items = data.notifikasi || [];
                notifData = items;
                const c = document.getElementById('notifContent');
                const badge = document.getElementById('notifBadge');
                const dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca_v2') || '[]');
                const belumDibaca = items.filter(n => !dibaca.includes(n.id));

                if(badge) {
                    if(belumDibaca.length > 0) { badge.textContent = belumDibaca.length > 9 ? '9+' : belumDibaca.length; badge.classList.remove('hidden'); }
                    else badge.classList.add('hidden');
                }

                if(!items.length) {
                    c.innerHTML='<div class="text-center py-6 text-gray-500 text-sm"><i class="fas fa-bell-slash text-2xl mb-2 block"></i>Belum ada notifikasi</div>';
                    return;
                }

                c.innerHTML='';
                items.forEach(n => {
                    const sudahBaca = dibaca.includes(n.id);
                    const waktu = n.waktu ? new Date(n.waktu).toLocaleDateString('id-ID',{day:'numeric',month:'short',hour:'2-digit',minute:'2-digit'}) : '';
                    const tipeBadge = getTipeBadge(n.tipe);
                    const href = n.url || '#';
                    const onClick = n.url ? `onclick="tandaiDibaca('${n.id}')"` : `onclick="event.preventDefault();tandaiDibaca('${n.id}')"`;

                    c.innerHTML += `<a href="${href}" ${onClick} class="flex gap-2.5 p-2.5 rounded-xl hover:bg-kvt-800/50 transition ${sudahBaca?'opacity-50':''}">
                        <div class="w-8 h-8 ${n.bg || 'bg-kvt-500/10'} rounded-lg flex items-center justify-center shrink-0">
                            <i class="fas ${n.ikon || 'fa-bell'} ${n.warna || 'text-kvt-400'} text-xs"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-1.5">
                                <p class="text-xs font-semibold text-white truncate flex-1">${escNotif(n.judul)}</p>
                                ${tipeBadge}
                            </div>
                            ${n.pesan ? `<p class="text-[10px] text-gray-500 line-clamp-2 mt-0.5">${escNotif(n.pesan)}</p>` : ''}
                            <span class="text-[9px] text-gray-600 mt-1 block">${waktu}</span>
                        </div>
                        ${!sudahBaca ? '<span class="w-2 h-2 bg-kvt-400 rounded-full shrink-0 mt-2 animate-pulse"></span>' : ''}
                    </a>`;
                });
            }).catch(()=>{
                // Fallback to berita-based notifications
                muatNotifikasiFallback();
            });
        }

        function muatNotifikasiFallback() {
            fetch('/api/berita/popup').then(r=>r.json()).then(data=>{
                notifData = (data || []).map(b => ({
                    id: 'berita_' + b.id,
                    tipe: 'berita',
                    judul: b.judul,
                    pesan: '',
                    ikon: 'fa-newspaper',
                    warna: 'text-blue-400',
                    bg: 'bg-blue-500/10',
                    url: '/berita/' + b.slug,
                    waktu: b.terbit_pada
                }));
                renderNotifItems(notifData);
            }).catch(()=>{
                document.getElementById('notifContent').innerHTML='<div class="text-center py-4 text-gray-500 text-xs">Gagal memuat</div>';
            });
        }

        function renderNotifItems(items) {
            const c = document.getElementById('notifContent');
            const badge = document.getElementById('notifBadge');
            const dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca_v2') || '[]');
            const belumDibaca = items.filter(n => !dibaca.includes(n.id));
            if(badge){
                if(belumDibaca.length>0){badge.textContent=belumDibaca.length;badge.classList.remove('hidden')}
                else badge.classList.add('hidden');
            }
            if(!items.length){c.innerHTML='<div class="text-center py-6 text-gray-500 text-sm"><i class="fas fa-bell-slash text-2xl mb-2 block"></i>Belum ada notifikasi</div>';return}
            c.innerHTML='';
            items.forEach(n=>{
                const sudahBaca=dibaca.includes(n.id);
                const waktu=n.waktu?new Date(n.waktu).toLocaleDateString('id-ID',{day:'numeric',month:'short'}):'';
                c.innerHTML+=`<a href="${n.url||'#'}" onclick="tandaiDibaca('${n.id}')" class="flex gap-2.5 p-2.5 rounded-xl hover:bg-kvt-800/50 transition ${sudahBaca?'opacity-50':''}"><div class="w-8 h-8 ${n.bg} rounded-lg flex items-center justify-center shrink-0"><i class="fas ${n.ikon} ${n.warna} text-xs"></i></div><div class="flex-1 min-w-0"><p class="text-xs font-semibold text-white truncate">${escNotif(n.judul)}</p><span class="text-[10px] text-gray-500">${waktu}</span></div>${!sudahBaca?'<span class="w-2 h-2 bg-kvt-400 rounded-full shrink-0 mt-2"></span>':''}</a>`;
            });
        }

        function getTipeBadge(tipe) {
            const map = {
                'fitur_baru': '<span class="text-[8px] px-1.5 py-0.5 rounded-full bg-pink-500/20 text-pink-400 font-bold shrink-0">BARU</span>',
                'pembaruan': '<span class="text-[8px] px-1.5 py-0.5 rounded-full bg-blue-500/20 text-blue-400 font-bold shrink-0">UPDATE</span>',
                'promosi': '<span class="text-[8px] px-1.5 py-0.5 rounded-full bg-amber-500/20 text-amber-400 font-bold shrink-0">PROMO</span>',
                'event': '<span class="text-[8px] px-1.5 py-0.5 rounded-full bg-green-500/20 text-green-400 font-bold shrink-0">EVENT</span>',
                'berita': '<span class="text-[8px] px-1.5 py-0.5 rounded-full bg-blue-500/20 text-blue-400 font-bold shrink-0">BERITA</span>',
            };
            return map[tipe] || '';
        }

        function escNotif(str) { const d=document.createElement('div');d.textContent=str;return d.innerHTML; }

        function tandaiDibaca(id) {
            let dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca_v2') || '[]');
            if(!dibaca.includes(id)) { dibaca.push(id); localStorage.setItem('kvt_notif_dibaca_v2', JSON.stringify(dibaca)); }
        }
        function tandaiSemuaDibaca() {
            const ids = notifData.map(n=>n.id);
            localStorage.setItem('kvt_notif_dibaca_v2', JSON.stringify(ids));
            muatNotifikasi();
        }

        // Auto-poll notifications every 30s
        function startNotifPolling() {
            muatNotifikasi();
            notifPollingTimer = setInterval(()=>{
                // Only update badge, not content (unless dropdown is open)
                fetch('/api/notifications').then(r=>r.json()).then(data=>{
                    const items = data.notifikasi || [];
                    const dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca_v2') || '[]');
                    const belumDibaca = items.filter(n => !dibaca.includes(n.id));
                    const badge = document.getElementById('notifBadge');
                    if(badge){
                        if(belumDibaca.length>0){badge.textContent=belumDibaca.length>9?'9+':belumDibaca.length;badge.classList.remove('hidden')}
                        else badge.classList.add('hidden');
                    }
                }).catch(()=>{});
            }, 30000);
        }
        startNotifPolling();
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
            { judul: 'Program Beasiswa Riset Global 2026 Dibuka untuk Mahasiswa', slug: '#' },
            { judul: 'Workshop Cybersecurity: Mengamankan Aplikasi Web Modern', slug: '#' },
            { judul: 'Kompetisi Coding Nasional: KVT Code Challenge 2026', slug: '#' },
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

        function kirimSaran(e){
            e.preventDefault();
            const inp=document.getElementById('saranInput');
            const email=document.getElementById('saranEmail');
            const kat=document.querySelector('input[name="kategori_saran"]:checked');
            if(!inp.value.trim()||inp.value.trim().length<10){alert('Pesan saran minimal 10 karakter.');inp.focus();return}
            const btn=document.getElementById('btnKirimSaran');
            btn.disabled=true;btn.innerHTML='<i class="fas fa-spinner fa-spin"></i> Mengirim...';
            setTimeout(()=>{
                inp.value='';if(email)email.value='';
                const dokInp=document.getElementById('saranDokumen');const medInp=document.getElementById('saranMedia');
                if(dokInp)dokInp.value='';if(medInp)medInp.value='';
                document.getElementById('saranDokNama').textContent='PDF, DOC, XLSX, TXT (Maks 5MB)';
                document.getElementById('saranMediaNama').textContent='Gambar / Video (Maks 20MB)';
                btn.disabled=false;btn.innerHTML='<i class="fas fa-paper-plane"></i> Kirim Saran';
                tutupSaranPopup();
                alert('Terima kasih atas saran Anda! Tim KVT akan meninjau masukan ini dan menghubungi Anda jika perlu.');
            },1500);
        }
        function bukaSaranPopup(){document.getElementById('saranOverlay').classList.remove('hidden');document.body.style.overflow='hidden'}
        function tutupSaranPopup(){document.getElementById('saranOverlay').classList.add('hidden');document.body.style.overflow=''}
        function tampilNamaFile(inp,targetId){const n=inp.files[0]?inp.files[0].name:'Tidak ada file';document.getElementById(targetId).textContent=n;document.getElementById(targetId).classList.add('text-kvt-400');document.getElementById(targetId).classList.remove('text-gray-500')}
        document.getElementById('saranOverlay').addEventListener('click',function(e){if(e.target===this) tutupSaranPopup()});

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
        // K-ARMA AI CHAT WIDGET (MULTI-AI)
        // ========================
        let kuroChatOpen = false;
        let kuroSessionId = null;
        let kuroSessionToken = null;
        let kuroSending = false;
        let karmaAttachedFile = null;
        let kuroCurrentProvider = localStorage.getItem('kvt_ai_provider') || 'github';
        let kuroProviderPanelOpen = false;

        // Provider metadata
        const kuroProviders = {
            github:  { name: 'GitHub AI',  model: 'gpt-4o-mini', icon: 'fab fa-github',    color: '#8B5CF6', badge: 'GRATIS' },
            openai:  { name: 'OpenAI',     model: 'gpt-4o-mini', icon: 'fas fa-brain',     color: '#10B981', badge: null },
            claude:  { name: 'Claude',     model: 'claude-sonnet', icon: 'fas fa-robot',   color: '#F59E0B', badge: null },
            ollama:  { name: 'Ollama',     model: 'llama3.1',    icon: 'fas fa-server',    color: '#3B82F6', badge: 'LOKAL' },
            n8n:     { name: 'n8n',        model: 'workflow',    icon: 'fas fa-project-diagram', color: '#EF4444', badge: null }
        };

        function toggleKuroChat() {
            const panel = document.getElementById('kuroChatPanel');
            const btn = document.getElementById('kuroAiBtn');
            kuroChatOpen = !kuroChatOpen;
            panel.classList.toggle('open', kuroChatOpen);
            if (btn) btn.classList.toggle('chat-open', kuroChatOpen);
            if (kuroChatOpen && !kuroSessionId) initKuroSession();
            // Update provider display
            updateProviderDisplay();
            // Check saved custom key
            checkSavedApiKey();
        }

        async function initKuroSession() {
            try {
                const savedToken = localStorage.getItem('kvt_chat_token');
                const res = await fetch('/api/chat/guest-session', {
                    method: 'POST',
                    headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                    body: JSON.stringify({ token: savedToken || null })
                });
                const data = await res.json();
                if (data.success && data.session) {
                    kuroSessionId = data.session.id;
                    kuroSessionToken = data.session.token;
                    localStorage.setItem('kvt_chat_token', data.session.token);
                }
            } catch(e) {
                console.log('K-Arma session init skipped:', e.message);
            }
        }

        // ==================== PROVIDER SELECTION ====================
        function toggleProviderPanel() {
            kuroProviderPanelOpen = !kuroProviderPanelOpen;
            const panel = document.getElementById('kuroProviderPanel');
            const btn = document.getElementById('providerToggleBtn');
            if (panel) panel.classList.toggle('open', kuroProviderPanelOpen);
            if (btn) btn.style.color = kuroProviderPanelOpen ? '#A78BFA' : '';
        }

        function selectProvider(key) {
            kuroCurrentProvider = key;
            localStorage.setItem('kvt_ai_provider', key);
            updateProviderDisplay();

            // Update active state in grid
            document.querySelectorAll('.kuro-provider-card').forEach(c => {
                c.classList.toggle('active', c.dataset.provider === key);
            });

            // Close provider panel with a short delay
            setTimeout(() => {
                kuroProviderPanelOpen = false;
                const panel = document.getElementById('kuroProviderPanel');
                const btn = document.getElementById('providerToggleBtn');
                if (panel) panel.classList.remove('open');
                if (btn) btn.style.color = '';
            }, 300);

            // Show notification in chat
            const body = document.getElementById('kuroChatBody');
            if (body) {
                const p = kuroProviders[key];
                const notif = document.createElement('div');
                notif.className = 'kuro-provider-info';
                notif.innerHTML = `<i class="${p.icon}" style="color:${p.color}"></i> Beralih ke <strong>${p.name}</strong> (${p.model})`;
                body.appendChild(notif);
                setTimeout(() => notif.style.opacity = '0.3', 3000);
                body.scrollTop = body.scrollHeight;
            }
        }

        function updateProviderDisplay() {
            const p = kuroProviders[kuroCurrentProvider];
            if (!p) return;
            const label = document.getElementById('kuroProviderLabel');
            const model = document.getElementById('kuroModelLabel');
            if (label) label.textContent = p.name;
            if (model) model.textContent = p.model;

            // Ensure correct card is active
            document.querySelectorAll('.kuro-provider-card').forEach(c => {
                c.classList.toggle('active', c.dataset.provider === kuroCurrentProvider);
            });
        }

        // ==================== CUSTOM API KEY ====================
        function toggleCustomKeyPanel() {
            const panel = document.getElementById('kuroCustomKeyPanel');
            if (panel) panel.classList.toggle('open');
        }

        function saveCustomApiKey() {
            const input = document.getElementById('kuroCustomApiKey');
            const key = input?.value?.trim();
            if (!key) return;
            localStorage.setItem('kvt_custom_api_key', key);
            input.value = '';
            checkSavedApiKey();
        }

        function clearCustomApiKey() {
            localStorage.removeItem('kvt_custom_api_key');
            checkSavedApiKey();
        }

        function checkSavedApiKey() {
            const status = document.getElementById('kuroKeyStatus');
            const key = localStorage.getItem('kvt_custom_api_key');
            if (status) {
                if (key) {
                    status.textContent = '✓ Key tersimpan: ' + key.substring(0, 8) + '...';
                    status.style.color = '#4ade80';
                } else {
                    status.textContent = 'Belum ada key tersimpan';
                    status.style.color = '';
                }
            }
        }

        function kuroQuickAsk(q) {
            const input = document.getElementById('kuroInput');
            if (input) { input.value = q; kuroSend(); }
        }

        // File attachment handler (doc, image, video)
        function karmaHandleFile(input) {
            const file = input.files[0];
            if (!file) return;
            karmaAttachedFile = file;

            // Determine icon by type
            const ext = file.name.split('.').pop().toLowerCase();
            let icon = 'fa-file text-pink-400', typeLabel = 'Dokumen';
            if (['png','jpg','jpeg','gif','webp','svg'].includes(ext)) { icon = 'fa-image text-blue-400'; typeLabel = 'Gambar'; }
            else if (['mp4','webm','mov','avi'].includes(ext)) { icon = 'fa-video text-purple-400'; typeLabel = 'Video'; }
            else if (['pdf'].includes(ext)) { icon = 'fa-file-pdf text-red-400'; typeLabel = 'PDF'; }

            // Show file badge
            document.getElementById('karmaFileBadge')?.remove();
            const badge = document.createElement('div');
            badge.className = 'flex items-center gap-2 px-3 py-1.5 rounded-lg bg-white/5 border border-white/10 text-xs text-gray-300';
            badge.id = 'karmaFileBadge';
            badge.innerHTML = `<i class="fas ${icon}"></i><span class="truncate" style="max-width:160px">${escapeHtml(file.name)}</span><span class="text-[9px] text-gray-500">${typeLabel}</span><button onclick="karmaRemoveFile()" class="text-gray-500 hover:text-red-400 ml-auto shrink-0"><i class="fas fa-times text-[10px]"></i></button>`;
            const badgeArea = document.getElementById('karmaFileBadgeArea');
            if (badgeArea) badgeArea.appendChild(badge);
            input.value = '';
        }

        function karmaRemoveFile() {
            karmaAttachedFile = null;
            document.getElementById('karmaFileBadge')?.remove();
        }

        // AI Video Generation prompt
        function karmaShowVideoGen() {
            const input = document.getElementById('kuroInput');
            if (!input) return;
            input.value = '';
            input.placeholder = '🎬 Deskripsikan video yang ingin dibuat...';
            input.focus();

            // Show video gen tip in chat
            const body = document.getElementById('kuroChatBody');
            const existingTip = document.getElementById('karmaVideoTip');
            if (existingTip) existingTip.remove();

            const tipDiv = document.createElement('div');
            tipDiv.id = 'karmaVideoTip';
            tipDiv.className = 'kuro-msg bot';
            tipDiv.innerHTML = `${karmaAvatarHtml}<div class="kuro-msg-bubble"><div style="font-size:12px"><i class="fas fa-film text-pink-400 mr-1"></i> <strong>Mode Generate Video</strong></div><div style="font-size:11px;color:#94a3b8;margin-top:4px;line-height:1.5">Deskripsikan video yang kamu inginkan, contoh:<br><span style="color:#64748b">• "Buat video 30 detik tentang KVT Hub"</span><br><span style="color:#64748b">• "Video animasi tentang cara mendaftar"</span><br><span style="color:#64748b">• "Slideshow foto kampus dengan musik"</span></div><div style="margin-top:6px;display:flex;gap:4px;flex-wrap:wrap"><button onclick="kuroQuickAsk('Buatkan video tentang KVT Hub')" class="text-[10px] px-2 py-0.5 rounded-full bg-pink-500/10 border border-pink-500/20 text-pink-300 hover:bg-pink-500/20 transition cursor-pointer">Video KVT Hub</button><button onclick="kuroQuickAsk('Buat video tutorial pendaftaran')" class="text-[10px] px-2 py-0.5 rounded-full bg-purple-500/10 border border-purple-500/20 text-purple-300 hover:bg-purple-500/20 transition cursor-pointer">Tutorial Daftar</button><button onclick="kuroQuickAsk('Generate intro video untuk presentasi')" class="text-[10px] px-2 py-0.5 rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-300 hover:bg-blue-500/20 transition cursor-pointer">Intro Presentasi</button></div></div>`;
            body.appendChild(tipDiv);
            body.scrollTop = body.scrollHeight;
        }

        const karmaAvatarHtml = `<div class="kuro-msg-avatar"><img src="{{ asset('k-arma/k-arma.png') }}" alt="K" style="width:100%;height:100%;object-fit:cover"></div>`;

        async function kuroSend() {
            const input = document.getElementById('kuroInput');
            const body = document.getElementById('kuroChatBody');
            const sendBtn = document.getElementById('kuroSendBtn');
            const msg = input?.value?.trim();
            if ((!msg && !karmaAttachedFile) || kuroSending) return;

            // Ensure session exists
            if (!kuroSessionId) await initKuroSession();

            // Add user message
            const userDiv = document.createElement('div');
            userDiv.className = 'kuro-msg user';
            let userContent = msg ? escapeHtml(msg) : '';
            if (karmaAttachedFile) {
                const ext = karmaAttachedFile.name.split('.').pop().toLowerCase();
                let fIcon = 'fa-file text-pink-300';
                if (['png','jpg','jpeg','gif','webp','svg'].includes(ext)) fIcon = 'fa-image text-blue-300';
                else if (['mp4','webm','mov','avi'].includes(ext)) fIcon = 'fa-video text-purple-300';
                else if (['pdf'].includes(ext)) fIcon = 'fa-file-pdf text-red-300';
                userContent += `<div style="margin-top:4px;font-size:11px;color:rgba(255,255,255,0.7)"><i class="fas ${fIcon} mr-1"></i>${escapeHtml(karmaAttachedFile.name)}</div>`;
            }
            userDiv.innerHTML = `<div class="kuro-msg-bubble">${userContent}</div>`;
            body.appendChild(userDiv);
            input.value = '';
            input.placeholder = 'Tanya K-Arma sesuatu...';
            body.scrollTop = body.scrollHeight;

            // Remove file badge & video tip
            const fileBadge = document.getElementById('karmaFileBadge');
            if (fileBadge) fileBadge.remove();
            document.getElementById('karmaVideoTip')?.remove();

            // Show typing indicator with provider info
            const cp = kuroProviders[kuroCurrentProvider] || kuroProviders.github;
            const typingDiv = document.createElement('div');
            typingDiv.className = 'kuro-msg bot';
            typingDiv.id = 'kuroTyping';
            typingDiv.innerHTML = `${karmaAvatarHtml}<div class="kuro-msg-bubble"><div style="font-size:10px;color:#64748b;margin-bottom:4px"><i class="${cp.icon}" style="color:${cp.color};font-size:9px"></i> ${cp.name}</div><div class="kuro-typing"><span></span><span></span><span></span></div></div>`;
            body.appendChild(typingDiv);
            body.scrollTop = body.scrollHeight;

            kuroSending = true;
            if (sendBtn) sendBtn.disabled = true;

            try {
                // Get custom API key if saved
                const customKey = localStorage.getItem('kvt_custom_api_key') || null;

                let res;
                if (karmaAttachedFile) {
                    const formData = new FormData();
                    formData.append('message', msg || 'Analisis dokumen ini');
                    formData.append('session_id', kuroSessionId || 'guest');
                    formData.append('session_token', kuroSessionToken || '');
                    formData.append('provider', kuroCurrentProvider);
                    if (customKey) formData.append('custom_api_key', customKey);
                    formData.append('file', karmaAttachedFile);
                    res = await fetch('/api/chat/send', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                        body: formData
                    });
                    karmaAttachedFile = null;
                } else {
                    const payload = {
                        message: msg,
                        session_id: kuroSessionId,
                        session_token: kuroSessionToken || '',
                        provider: kuroCurrentProvider
                    };
                    if (customKey) payload.custom_api_key = customKey;

                    res = await fetch('/api/chat/send', {
                        method: 'POST',
                        headers: { 'Content-Type':'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '' },
                        body: JSON.stringify(payload)
                    });
                }
                const data = await res.json();

                // Remove typing
                document.getElementById('kuroTyping')?.remove();

                // Add bot response
                const botDiv = document.createElement('div');
                botDiv.className = 'kuro-msg bot';
                const reply = data.message?.content || data.reply || data.message || 'Maaf, saya tidak bisa memproses permintaan saat ini.';
                const replyProvider = data.message?.provider || kuroCurrentProvider;
                const replyModel = data.message?.model || cp.model;
                const rp = kuroProviders[replyProvider] || cp;

                botDiv.innerHTML = `${karmaAvatarHtml}<div class="kuro-msg-bubble">${formatMarkdown(reply)}<div style="margin-top:6px;font-size:9px;color:#475569;display:flex;align-items:center;gap:4px"><i class="${rp.icon}" style="color:${rp.color};font-size:8px"></i>${rp.name} &bull; ${replyModel}</div></div>`;
                body.appendChild(botDiv);
            } catch(e) {
                document.getElementById('kuroTyping')?.remove();
                const errDiv = document.createElement('div');
                errDiv.className = 'kuro-msg bot';
                errDiv.innerHTML = `${karmaAvatarHtml}<div class="kuro-msg-bubble" style="border-color:rgba(239,68,68,0.2)"><i class="fas fa-exclamation-triangle text-red-400 mr-1"></i> Ups, ada gangguan koneksi ke <strong>${cp.name}</strong>. Coba provider lain atau coba lagi nanti ya~</div>`;
                body.appendChild(errDiv);
            }

            kuroSending = false;
            if (sendBtn) sendBtn.disabled = false;
            body.scrollTop = body.scrollHeight;
        }

        // Simple markdown → HTML formatter
        function formatMarkdown(text) {
            if (!text) return '';
            let html = escapeHtml(text);
            // Code blocks
            html = html.replace(/```(\w*)\n?([\s\S]*?)```/g, '<pre style="background:rgba(0,0,0,0.3);padding:8px;border-radius:8px;overflow-x:auto;font-size:11px;margin:6px 0"><code>$2</code></pre>');
            // Inline code
            html = html.replace(/`([^`]+)`/g, '<code style="background:rgba(255,255,255,0.08);padding:1px 4px;border-radius:4px;font-size:11px">$1</code>');
            // Bold
            html = html.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');
            // Italic
            html = html.replace(/\*([^*]+)\*/g, '<em>$1</em>');
            // Headers
            html = html.replace(/^### (.+)$/gm, '<div style="font-size:13px;font-weight:700;color:#e2e8f0;margin:8px 0 4px">$1</div>');
            html = html.replace(/^## (.+)$/gm, '<div style="font-size:14px;font-weight:700;color:#e2e8f0;margin:8px 0 4px">$1</div>');
            // List items
            html = html.replace(/^- (.+)$/gm, '<div style="padding-left:12px;position:relative">• $1</div>');
            html = html.replace(/^\d+\. (.+)$/gm, '<div style="padding-left:12px">$&</div>');
            // Line breaks
            html = html.replace(/\n/g, '<br>');
            return html;
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // ========================
        // TOGGLE VISIBILITY: AI & Settings
        // ========================
        function toggleKuroVisibility() {
            const kuroBtn = document.getElementById('kuroAiBtn');
            const panel = document.getElementById('kuroChatPanel');
            const toggleBtn = document.getElementById('toggleKuroBtn');
            const dot = document.getElementById('kuroStatusDot');
            const isVisible = kuroBtn && kuroBtn.style.display !== 'none';

            if (isVisible) {
                if (kuroBtn) kuroBtn.style.display = 'none';
                if (panel) { panel.classList.remove('open'); kuroChatOpen = false; }
                if (toggleBtn) toggleBtn.style.color = '#64748b';
                if (toggleBtn) toggleBtn.style.background = 'rgba(100,116,139,0.1)';
                if (dot) dot.style.background = '#64748b';
                localStorage.setItem('kvt_kuro_visible', '0');
            } else {
                if (kuroBtn) kuroBtn.style.display = 'flex';
                if (toggleBtn) toggleBtn.style.color = '#FF4D6D';
                if (toggleBtn) toggleBtn.style.background = 'rgba(255,77,109,0.1)';
                if (dot) dot.style.background = '#22c55e';
                localStorage.setItem('kvt_kuro_visible', '1');
            }
        }

        function toggleSettingsVisibility() {
            const settingsBtn = document.getElementById('settingsBtn');
            const toggleBtn = document.getElementById('toggleSettingsBtn');
            const dot = document.getElementById('settingsStatusDot');
            const isVisible = settingsBtn && settingsBtn.style.display !== 'none';

            if (isVisible) {
                if (settingsBtn) settingsBtn.style.display = 'none';
                if (toggleBtn) toggleBtn.style.color = '#64748b';
                if (toggleBtn) toggleBtn.style.background = 'rgba(100,116,139,0.1)';
                if (dot) dot.style.background = '#64748b';
                localStorage.setItem('kvt_settings_visible', '0');
            } else {
                if (settingsBtn) settingsBtn.style.display = 'flex';
                if (toggleBtn) toggleBtn.style.color = '#3399FF';
                if (toggleBtn) toggleBtn.style.background = 'rgba(51,153,255,0.1)';
                if (dot) dot.style.background = '#22c55e';
                localStorage.setItem('kvt_settings_visible', '1');
            }
        }

        // Restore visibility states from localStorage
        (function restoreWidgetVisibility() {
            const kuroVis = localStorage.getItem('kvt_kuro_visible');
            const settingsVis = localStorage.getItem('kvt_settings_visible');

            if (kuroVis === '0') {
                const kuroBtn = document.getElementById('kuroAiBtn');
                const toggleBtn = document.getElementById('toggleKuroBtn');
                const dot = document.getElementById('kuroStatusDot');
                if (kuroBtn) kuroBtn.style.display = 'none';
                if (toggleBtn) { toggleBtn.style.color = '#64748b'; toggleBtn.style.background = 'rgba(100,116,139,0.1)'; }
                if (dot) dot.style.background = '#64748b';
            }

            if (settingsVis === '0') {
                const settingsBtn = document.getElementById('settingsBtn');
                const toggleBtn = document.getElementById('toggleSettingsBtn');
                const dot = document.getElementById('settingsStatusDot');
                if (settingsBtn) settingsBtn.style.display = 'none';
                if (toggleBtn) { toggleBtn.style.color = '#64748b'; toggleBtn.style.background = 'rgba(100,116,139,0.1)'; }
                if (dot) dot.style.background = '#64748b';
            }
        })();

    </script>
    <div id="google_translate_element" style="display:none"></div>
    
    @stack('scripts')
</body>
</html>
