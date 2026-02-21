{{--
    KOMPONEN BUKU POPUP UNIVERSAL
    Digunakan oleh: Kuro, Bejotaro, Veteran
    
    @param string $karakterId - ID unik karakter (kuro/bejotaro/veteran)
    @param string $warnaPrimer - Warna CSS tema (purple/amber/red)
    @param string $judulBuku - Judul seri buku
--}}

@php
    $karakterId = $karakterId ?? 'karakter';
    $warnaPrimer = $warnaPrimer ?? 'purple';
    $judulBuku = $judulBuku ?? 'The Book';
    
    $warnaMap = [
        'purple' => [
            'accent' => '#8B5CF6', 'accentRgb' => '139,92,246',
            'dark1' => '#1a0533', 'dark2' => '#2d1857', 'dark3' => '#4c1d95', 'dark4' => '#6d28d9',
            'text' => 'text-purple-400', 'text300' => 'text-purple-300',
            'bg10' => 'bg-purple-500/10', 'border20' => 'border-purple-500/20',
            'gradient' => 'from-purple-600 to-violet-600',
        ],
        'amber' => [
            'accent' => '#D97706', 'accentRgb' => '217,119,6',
            'dark1' => '#1a1005', 'dark2' => '#3d2a07', 'dark3' => '#78350f', 'dark4' => '#b45309',
            'text' => 'text-amber-400', 'text300' => 'text-amber-300',
            'bg10' => 'bg-amber-500/10', 'border20' => 'border-amber-500/20',
            'gradient' => 'from-amber-600 to-yellow-600',
        ],
        'red' => [
            'accent' => '#EF4444', 'accentRgb' => '239,68,68',
            'dark1' => '#1a0505', 'dark2' => '#450a0a', 'dark3' => '#991b1b', 'dark4' => '#dc2626',
            'text' => 'text-red-400', 'text300' => 'text-red-300',
            'bg10' => 'bg-red-500/10', 'border20' => 'border-red-500/20',
            'gradient' => 'from-red-600 to-rose-600',
        ],
    ];
    $w = $warnaMap[$warnaPrimer] ?? $warnaMap['purple'];
@endphp

{{-- ===== POPUP BUKU ===== --}}
<div id="popupBuku-{{ $karakterId }}" class="popup-buku-wrapper fixed inset-0 z-[9999] hidden" data-karakter="{{ $karakterId }}">
    <div class="absolute inset-0 bg-black/90 backdrop-blur-lg" onclick="tutupPopupBuku('{{ $karakterId }}')"></div>

    <div class="relative flex flex-col items-center justify-center h-full px-4 py-6">
        {{-- Header --}}
        <div class="flex items-center justify-between w-full max-w-4xl mb-4 popup-buku-header" style="opacity:0">
            <div class="flex items-center gap-3">
                <div id="bukuChBadge-{{ $karakterId }}" class="w-10 h-10 {{ $w['bg10'] }} border {{ $w['border20'] }} rounded-xl flex items-center justify-center">
                    <span class="{{ $w['text'] }} font-black text-sm">Ch</span>
                </div>
                <div>
                    <h3 id="bukuJudul-{{ $karakterId }}" class="text-white font-black text-lg"></h3>
                    <p id="bukuJudulAsing-{{ $karakterId }}" class="text-gray-500 text-xs italic"></p>
                </div>
            </div>
            <button onclick="tutupPopupBuku('{{ $karakterId }}')" class="w-10 h-10 bg-kvt-900/80 border border-kvt-700/30 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:border-red-500/50 transition group">
                <i class="fas fa-times group-hover:rotate-90 transition-transform duration-300"></i>
            </button>
        </div>

        {{-- Buku --}}
        <div class="buku-scene" style="position:relative;">
            <div class="buku-main" id="buku-{{ $karakterId }}">
                <div class="buku-shadow"></div>
                <div class="buku-sampul-utama" id="sampul-{{ $karakterId }}" onclick="navBuku('{{ $karakterId }}', 1)">
                    <div class="buku-sampul-inner" id="sampulInner-{{ $karakterId }}" data-warna="{{ $warnaPrimer }}"></div>
                </div>
                <div class="buku-panel-kiri" id="panelKiri-{{ $karakterId }}"><div class="buku-pg-content" id="isiKiri-{{ $karakterId }}"></div></div>
                <div class="buku-panel-kanan" id="panelKanan-{{ $karakterId }}"><div class="buku-pg-content" id="isiKanan-{{ $karakterId }}"></div></div>
                <div class="buku-punggung" id="punggung-{{ $karakterId }}" style="--accent: {{ $w['accent'] }}"></div>
                <div id="flipWrap-{{ $karakterId }}" style="transform-style:preserve-3d;position:absolute;top:0;left:50%;width:50%;height:100%;"></div>
                <button class="buku-btn-nav prev" id="btnPrev-{{ $karakterId }}" onclick="navBuku('{{ $karakterId }}', -1)"><i class="fas fa-chevron-left"></i></button>
                <button class="buku-btn-nav next" id="btnNext-{{ $karakterId }}" onclick="navBuku('{{ $karakterId }}', 1)"><i class="fas fa-chevron-right"></i></button>
            </div>

            {{-- Progress --}}
            <div class="flex items-center gap-3 mt-5" style="width:var(--buku-lebar);max-width:100%;">
                <span class="text-gray-500 text-xs font-mono" id="lblHal-{{ $karakterId }}">Sampul</span>
                <div class="buku-bar-wrap flex-1"><div class="buku-bar-fill" id="barFill-{{ $karakterId }}" style="width:0%;--accent: {{ $w['accent'] }}"></div></div>
                <span class="text-gray-500 text-xs font-mono" id="lblTotal-{{ $karakterId }}"></span>
            </div>
        </div>

        {{-- Keyboard hint --}}
        <div class="mt-3 text-center text-gray-600 text-xs popup-buku-hint" style="opacity:0">
            <i class="fas fa-keyboard mr-1"></i>
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">←</kbd>
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">→</kbd>
            atau klik halaman &bull;
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">Esc</kbd> tutup
        </div>
    </div>
</div>

@once
{{-- ===== SHARED BOOK STYLES ===== --}}
<style>
    :root {
        --buku-lebar: 820px;
        --buku-tinggi: 520px;
    }

    .buku-scene {
        perspective: 2200px;
        display: flex; justify-content: center;
        flex-direction: column; align-items: center;
    }
    .buku-main {
        position: relative;
        width: var(--buku-lebar); max-width: 100%;
        height: var(--buku-tinggi);
        transform-style: preserve-3d;
        margin: 0 auto;
    }

    /* Panel kiri & kanan */
    .buku-panel-kiri, .buku-panel-kanan {
        position: absolute; top: 0; width: 50%; height: 100%; overflow: hidden;
    }
    .buku-panel-kiri {
        left: 0;
        background: linear-gradient(135deg, #0c0918, #120d22);
        border: 1px solid rgba(255,255,255,0.06);
        border-right: none;
        border-radius: 14px 0 0 14px;
        box-shadow: inset -12px 0 30px rgba(0,0,0,0.35);
    }
    .buku-panel-kanan {
        right: 0;
        background: linear-gradient(225deg, #0c0918, #120d22);
        border: 1px solid rgba(255,255,255,0.06);
        border-left: none;
        border-radius: 0 14px 14px 0;
        box-shadow: inset 12px 0 30px rgba(0,0,0,0.35);
    }

    /* Punggung buku */
    .buku-punggung {
        position: absolute;
        left: 50%; top: 0;
        width: 10px; height: 100%;
        transform: translateX(-50%);
        background: linear-gradient(180deg,
            color-mix(in srgb, var(--accent) 30%, #0f0520),
            #0a0316,
            color-mix(in srgb, var(--accent) 30%, #0f0520));
        z-index: 50;
        box-shadow: 0 0 24px rgba(0,0,0,0.6);
    }
    .buku-punggung::before, .buku-punggung::after {
        content: ''; position: absolute;
        left: 50%; transform: translateX(-50%);
        width: 16px; height: 7px;
        background: #0a0316; border-radius: 50%;
    }
    .buku-punggung::before { top: -3px; }
    .buku-punggung::after { bottom: -3px; }

    /* Flip pages */
    .buku-flip-page {
        position: absolute; top: 0; left: 0;
        width: 100%; height: 100%;
        transform-origin: left center;
        transform-style: preserve-3d;
        transition: transform 0.65s cubic-bezier(0.4, 0.0, 0.2, 1);
        cursor: pointer; z-index: 1;
    }
    .buku-flip-page.bdi-kanan { transform: rotateY(0deg); }
    .buku-flip-page.bdi-kiri { transform: rotateY(-180deg); }
    .buku-flip-page.bflipping { z-index: 999 !important; }

    .buku-face-front, .buku-face-back {
        position: absolute; top: 0; left: 0;
        width: 100%; height: 100%;
        backface-visibility: hidden; -webkit-backface-visibility: hidden;
        overflow: hidden;
    }
    .buku-face-front {
        background: linear-gradient(160deg, #120d22, #0c0918);
        border: 1px solid rgba(255,255,255,0.06);
        border-left: none;
        border-radius: 0 14px 14px 0; z-index: 2;
    }
    .buku-face-front::before {
        content: ''; position: absolute;
        top: 0; left: 0; width: 45px; height: 100%;
        background: linear-gradient(to right, rgba(0,0,0,0.25), transparent);
        pointer-events: none; z-index: 10;
    }
    .buku-face-back {
        background: linear-gradient(200deg, #120d22, #0c0918);
        border: 1px solid rgba(255,255,255,0.06);
        border-right: none;
        border-radius: 14px 0 0 14px;
        transform: rotateY(180deg); z-index: 1;
    }
    .buku-face-back::before {
        content: ''; position: absolute;
        top: 0; right: 0; width: 45px; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.25), transparent);
        pointer-events: none; z-index: 10;
    }
    .buku-flip-page.bflipping .buku-face-front::after {
        content: ''; position: absolute;
        top: 0; right: 0; width: 60%; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.08), transparent);
        pointer-events: none;
    }

    /* Page content */
    .buku-pg-content {
        position: relative;
        padding: 36px 32px; height: 100%;
        display: flex; flex-direction: column;
        color: #d1d5db; font-size: 0.88rem;
        line-height: 1.95; overflow-y: auto;
        z-index: 5; letter-spacing: 0.01em;
    }
    .buku-pg-content::-webkit-scrollbar { width: 4px; }
    .buku-pg-content::-webkit-scrollbar-track { background: transparent; }
    .buku-pg-content::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 4px; }
    .buku-pg-content::-webkit-scrollbar-thumb:hover { background: rgba(255,255,255,0.2); }
    .buku-pg-content h2 {
        font-size: 1.25rem; font-weight: 800;
        background: linear-gradient(135deg, #e2e8f0, #cbd5e1);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text; margin-bottom: 18px; line-height: 1.4;
    }
    .buku-pg-content h3 { font-size: 1.05rem; font-weight: 700; color: #94a3b8; margin-bottom: 10px; margin-top: 16px; }
    .buku-pg-content p {
        margin-bottom: 14px; text-align: justify;
        word-spacing: 0.02em; hyphens: auto;
    }
    .buku-pg-num {
        text-align: center; font-size: 0.68rem;
        padding-top: 12px; margin-top: auto;
        border-top: 1px solid rgba(255,255,255,0.04);
        letter-spacing: 3px; font-weight: 600;
        opacity: 0.4;
    }

    /* Sampul utama (full-width cover) */
    .buku-sampul-utama {
        position: absolute; top: 0; left: 0;
        width: 100%; height: 100%;
        z-index: 500; border-radius: 14px;
        overflow: hidden; cursor: pointer;
        transition: transform 0.7s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.5s ease;
        transform-origin: left center;
    }
    .buku-sampul-utama.tersembunyi {
        transform: perspective(1200px) rotateY(-95deg);
        opacity: 0; pointer-events: none;
    }
    .buku-sampul-inner {
        width: 100%; height: 100%;
        display: flex; flex-direction: column;
        align-items: center; justify-content: center;
        text-align: center; padding: 48px;
        position: relative; overflow: hidden;
    }
    .buku-sampul-inner[data-warna="purple"] {
        background: linear-gradient(135deg, #1a0533 0%, #2d1857 25%, #4c1d95 50%, #6d28d9 70%, #2d1857 90%, #1a0533 100%);
    }
    .buku-sampul-inner[data-warna="amber"] {
        background: linear-gradient(135deg, #1a1005 0%, #3d2a07 25%, #78350f 50%, #b45309 70%, #3d2a07 90%, #1a1005 100%);
    }
    .buku-sampul-inner[data-warna="red"] {
        background: linear-gradient(135deg, #1a0505 0%, #450a0a 25%, #991b1b 50%, #dc2626 70%, #450a0a 90%, #1a0505 100%);
    }
    .buku-sampul-inner::before {
        content: ''; position: absolute; inset: 0;
        background:
            radial-gradient(ellipse at 30% 20%, rgba(255,255,255,0.08) 0%, transparent 50%),
            radial-gradient(ellipse at 70% 80%, rgba(255,255,255,0.04) 0%, transparent 50%);
        pointer-events: none;
    }
    .buku-sampul-inner::after {
        content: ''; position: absolute;
        top: 18px; right: 18px; bottom: 18px; left: 18px;
        border: 2px solid rgba(255,255,255,0.08);
        border-radius: 10px; pointer-events: none;
    }
    .buku-sampul-inner .bs-dekorasi {
        position: absolute; width: 100%; height: 100%;
        top: 0; left: 0; pointer-events: none; overflow: hidden;
    }
    .buku-sampul-inner .bs-dekorasi::before {
        content: ''; position: absolute;
        top: -50%; left: -50%; width: 200%; height: 200%;
        background: conic-gradient(from 0deg, transparent, rgba(255,255,255,0.02), transparent, rgba(255,255,255,0.02), transparent);
        animation: bukuRotateSlow 25s linear infinite;
    }
    @keyframes bukuRotateSlow { to { transform: rotate(360deg); } }
    .buku-sampul-inner .bs-ikon {
        font-size: 3.5rem; margin-bottom: 24px;
        filter: drop-shadow(0 0 30px rgba(255,255,255,0.3));
        position: relative; z-index: 2; color: rgba(255,255,255,0.7);
    }
    .buku-sampul-inner .bs-chapter {
        font-size: 0.82rem; font-weight: 800;
        color: rgba(255,255,255,0.5);
        letter-spacing: 5px; text-transform: uppercase;
        margin-bottom: 14px; position: relative; z-index: 2;
    }
    .buku-sampul-inner .bs-judul {
        font-size: 1.8rem; font-weight: 900;
        background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(255,255,255,0.7));
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text; margin-bottom: 8px;
        position: relative; z-index: 2; line-height: 1.3;
    }
    .buku-sampul-inner .bs-judul-asing {
        font-size: 0.95rem;
        color: rgba(255,255,255,0.3);
        font-style: italic; margin-bottom: 20px;
        position: relative; z-index: 2;
    }
    .buku-sampul-inner .bs-aliansi {
        display: inline-flex; align-items: center; gap: 6px;
        padding: 8px 24px; border-radius: 999px;
        font-size: 0.8rem; font-weight: 700;
        background: rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.6);
        border: 1px solid rgba(255,255,255,0.12);
        position: relative; z-index: 2; margin-bottom: 8px;
    }
    .buku-sampul-inner .bs-seri {
        margin-top: 20px;
        color: rgba(255,255,255,0.2);
        font-size: 0.76rem; font-weight: 600;
        letter-spacing: 3px;
        position: relative; z-index: 2;
    }
    .buku-sampul-inner .bs-petunjuk {
        margin-top: 36px;
        color: rgba(255,255,255,0.15);
        font-size: 0.72rem;
        position: relative; z-index: 2;
        animation: bukuPulseHint 2.5s ease-in-out infinite;
    }

    /* Cover (end pages) */
    .buku-cover {
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        height: 100%; padding: 36px; text-align: center;
        position: relative; overflow: hidden;
        border-radius: 0 14px 14px 0;
    }
    .buku-cover.cover-kiri { border-radius: 14px 0 0 14px; }
    .buku-cover::before {
        content: ''; position: absolute; inset: 0;
        background: radial-gradient(ellipse at 25% 30%, rgba(255,255,255,0.04) 0%, transparent 60%),
                    radial-gradient(ellipse at 75% 70%, rgba(255,255,255,0.02) 0%, transparent 60%);
        pointer-events: none;
    }
    .buku-cover::after {
        content: ''; position: absolute;
        top: 14px; right: 14px; bottom: 14px; left: 14px;
        border: 1px solid rgba(255,255,255,0.06); border-radius: 8px; pointer-events: none;
    }
    .buku-cover .bc-icon { font-size: 3rem; margin-bottom: 18px; filter: drop-shadow(0 0 20px rgba(255,255,255,0.15)); position: relative; }
    .buku-cover h1 {
        font-size: 1.4rem; font-weight: 800;
        background: linear-gradient(135deg, #e2e8f0, #94a3b8);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text; margin-bottom: 10px; position: relative;
    }
    .buku-cover .bc-info { color: rgba(255,255,255,0.3); font-size: 0.8rem; position: relative; margin-bottom: 4px; }
    .buku-cover .bc-hint { margin-top: 28px; color: rgba(255,255,255,0.12); font-size: 0.7rem; position: relative; animation: bukuPulseHint 2.5s ease-in-out infinite; }

    @keyframes bukuPulseHint { 0%,100%{opacity:0.3} 50%{opacity:0.8} }

    /* Nav buttons */
    .buku-btn-nav {
        position: absolute; top: 50%; transform: translateY(-50%);
        width: 50px; height: 50px; border-radius: 50%;
        background: rgba(10,3,22,0.85); backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.08);
        color: rgba(255,255,255,0.4); display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: all 0.3s; z-index: 200;
        font-size: 0.9rem;
    }
    .buku-btn-nav:hover:not(:disabled) {
        background: rgba(255,255,255,0.06);
        box-shadow: 0 0 30px rgba(255,255,255,0.05);
        transform: translateY(-50%) scale(1.1);
        border-color: rgba(255,255,255,0.15);
        color: rgba(255,255,255,0.7);
    }
    .buku-btn-nav:disabled { opacity: 0.08; cursor: not-allowed; }
    .buku-btn-nav.prev { left: -68px; }
    .buku-btn-nav.next { right: -68px; }

    /* Progress */
    .buku-bar-wrap { height: 3px; background: rgba(255,255,255,0.04); border-radius: 2px; overflow: hidden; }
    .buku-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--accent), color-mix(in srgb, var(--accent) 60%, white));
        border-radius: 2px; transition: width .5s ease;
    }

    /* Shadow */
    .buku-shadow {
        position: absolute; bottom: -16px; left: 5%; width: 90%; height: 24px;
        background: radial-gradient(ellipse, rgba(0,0,0,0.4) 0%, transparent 70%);
        filter: blur(5px); z-index: -1;
    }

    /* Popup animation */
    .popup-buku-wrapper.show { display: flex !important; }
    .popup-buku-wrapper.show .buku-scene {
        animation: bukuMasuk 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
    .popup-buku-wrapper.show .popup-buku-header {
        animation: bukuFadeIn 0.5s ease 0.2s forwards;
    }
    .popup-buku-wrapper.show .popup-buku-hint {
        animation: bukuFadeIn 0.5s ease 0.4s forwards;
    }
    @keyframes bukuMasuk {
        from { opacity: 0; transform: scale(0.8) rotateX(10deg) translateY(30px); }
        to { opacity: 1; transform: scale(1) rotateX(0) translateY(0); }
    }
    @keyframes bukuFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 880px) {
        :root { --buku-lebar: 94vw; --buku-tinggi: 62vw; }
        .buku-btn-nav.prev { left: 4px; } .buku-btn-nav.next { right: 4px; }
        .buku-btn-nav { width: 40px; height: 40px; font-size: 0.82rem; background: rgba(10,3,22,0.95); }
        .buku-pg-content { padding: 22px 18px; font-size: 0.82rem; }
        .buku-pg-content h2 { font-size: 1.05rem; }
        .buku-cover h1 { font-size: 1.15rem; } .buku-cover { padding: 24px; }
        .buku-sampul-inner .bs-judul { font-size: 1.4rem; }
        .buku-sampul-inner .bs-ikon { font-size: 2.8rem; }
        .buku-sampul-inner { padding: 30px; }
    }
    @media (max-width: 520px) {
        :root { --buku-tinggi: 78vw; }
        .buku-pg-content { padding: 16px 14px; font-size: 0.76rem; line-height: 1.7; }
        .buku-btn-nav { width: 34px; height: 34px; }
        .buku-sampul-inner .bs-judul { font-size: 1.1rem; }
        .buku-sampul-inner .bs-ikon { font-size: 2.2rem; }
        .buku-sampul-inner .bs-chapter { font-size: 0.65rem; letter-spacing: 2px; }
        .buku-sampul-inner { padding: 18px; }
    }
</style>

{{-- ===== SHARED BOOK JAVASCRIPT ===== --}}
<script>
(function() {
    // State per karakter
    if (!window._bukuState) window._bukuState = {};

    function getState(id) {
        if (!window._bukuState[id]) {
            window._bukuState[id] = {
                open: false, sheets: [], cur: 0,
                animating: false, sampulVisible: false, sampulData: {}
            };
        }
        return window._bukuState[id];
    }

    function escBuku(s) { const d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

    // ===== COVER =====
    function makeSampulUtama(judul, judulAsing, aliansi, ikon, ch, warna, seri) {
        return '<div class="bs-dekorasi"></div>' +
            '<div class="bs-ikon"><i class="fas ' + ikon + '"></i></div>' +
            '<div class="bs-chapter">Chapter ' + escBuku(ch) + '</div>' +
            '<div class="bs-judul">' + escBuku(judul) + '</div>' +
            '<div class="bs-judul-asing">' + escBuku(judulAsing) + '</div>' +
            (aliansi ? '<div class="bs-aliansi"><i class="fas fa-shield-alt"></i> ' + escBuku(aliansi) + '</div>' : '') +
            '<div class="bs-seri">— ' + escBuku(seri) + ' —</div>' +
            '<div class="bs-petunjuk"><i class="fas fa-hand-pointer mr-1"></i> Klik atau tekan → untuk membaca</div>';
    }

    function makeTOC(judul, ringkasan, pages) {
        let h = '<div class="buku-pg-content">';
        h += '<h2><i class="fas fa-scroll mr-2" style="font-size:0.85em;opacity:0.6"></i>Ringkasan</h2>';
        h += '<p style="color:#94a3b8;font-style:italic;font-size:0.84rem;line-height:1.85">' + escBuku(ringkasan || '') + '</p>';
        h += '<div style="margin-top:18px;padding-top:14px;border-top:1px solid rgba(255,255,255,0.04)">';
        h += '<div style="color:rgba(255,255,255,0.3);font-size:0.73rem;font-weight:700;margin-bottom:8px"><i class="fas fa-book-open mr-1"></i>Informasi</div>';
        h += '<div style="color:#64748b;font-size:0.76rem">📄 ' + pages.length + ' halaman konten</div>';
        h += '</div>';
        h += '<div class="buku-pg-num">— Daftar Isi —</div></div>';
        return h;
    }

    function makePage(data, num) {
        let h = '<div class="buku-pg-content">';
        if (data.t) h += '<h2>' + escBuku(data.t) + '</h2>';
        data.c.split(/\n\s*\n|\n/).forEach(function(p) {
            if (p.trim()) h += '<p>' + escBuku(p.trim()) + '</p>';
        });
        h += '<div class="buku-pg-num">— ' + num + ' —</div></div>';
        return h;
    }

    function makeGambar(gambar, judul) {
        return '<div class="buku-pg-content" style="align-items:center;justify-content:center;">' +
            '<img src="' + gambar + '" alt="' + escBuku(judul) + '" style="max-width:100%;max-height:80%;object-fit:contain;border-radius:12px;border:1px solid rgba(255,255,255,0.06);">' +
            '<div class="buku-pg-num">— Ilustrasi —</div></div>';
    }

    function makeEnd(judul, ch) {
        return '<div class="buku-cover cover-kiri" style="background:linear-gradient(135deg,#0a0316,#120d22,#0a0316);">' +
            '<div class="bc-icon">📖</div><h1>Tamat</h1>' +
            '<div class="bc-info" style="margin-top:6px">Chapter ' + escBuku(ch) + ' — ' + escBuku(judul) + '</div>' +
            '<div style="margin-top:20px;color:rgba(255,255,255,0.1);font-size:0.7rem">to_be_continued.kvt</div></div>';
    }

    function makeEndRight(judul, ch) {
        return '<div class="buku-cover" style="background:linear-gradient(135deg,#0a0316,#120d22,#0a0316);">' +
            '<div class="bc-icon">🎓</div><h1>Tamat</h1>' +
            '<div class="bc-info" style="margin-top:6px">Chapter ' + escBuku(ch) + '</div>' +
            '<div style="margin-top:20px;color:rgba(255,255,255,0.1);font-size:0.7rem">Tutup buku untuk kembali</div></div>';
    }

    // ===== PARSER =====
    function parsePages(text) {
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
                if (cc.trim()) pushSplit(out, ct, cc.trim(), MAX);
                ct = hm[2]; cc = '';
            } else { cc += s + '\n\n'; }
            if (cc.length > MAX * 1.5) { pushSplit(out, ct, cc.trim(), MAX); ct = null; cc = ''; }
        });
        if (cc.trim()) pushSplit(out, ct, cc.trim(), MAX);
        if (out.length === 0) out.push({t: null, c: text.substring(0, MAX)});
        return out;
    }

    function pushSplit(arr, title, text, MAX) {
        if (text.length <= MAX) { arr.push({t: title, c: text}); return; }
        const sents = text.split(/(?<=[.!?。])\s+/);
        let buf = '', first = true;
        sents.forEach(function(s) {
            if ((buf + s).length > MAX && buf) { arr.push({t: first ? title : null, c: buf.trim()}); first = false; buf = ''; }
            buf += s + ' ';
        });
        if (buf.trim()) arr.push({t: first ? title : null, c: buf.trim()});
    }

    // ===== SHOW/HIDE SAMPUL =====
    function showSampul(id) {
        const st = getState(id);
        const el = document.getElementById('sampul-' + id);
        ['panelKiri-','panelKanan-','punggung-','flipWrap-'].forEach(function(p) {
            document.getElementById(p + id).style.visibility = 'hidden';
        });
        el.classList.remove('tersembunyi');
        st.sampulVisible = true;
    }

    function hideSampul(id) {
        const st = getState(id);
        const el = document.getElementById('sampul-' + id);
        el.classList.add('tersembunyi');
        ['panelKiri-','panelKanan-','punggung-','flipWrap-'].forEach(function(p) {
            document.getElementById(p + id).style.visibility = 'visible';
        });
        st.sampulVisible = false;
    }

    // ===== RENDER =====
    function render(id) {
        const st = getState(id);
        const wrap = document.getElementById('flipWrap-' + id);
        wrap.innerHTML = '';

        st.sheets.forEach(function(sh, i) {
            const el = document.createElement('div');
            el.className = 'buku-flip-page bdi-kanan';
            el.dataset.i = i;
            el.style.zIndex = st.sheets.length - i;

            const fr = document.createElement('div');
            fr.className = 'buku-face-front'; fr.innerHTML = sh.front;
            const bk = document.createElement('div');
            bk.className = 'buku-face-back'; bk.innerHTML = sh.back;
            el.appendChild(fr); el.appendChild(bk);
            wrap.appendChild(el);

            el.addEventListener('click', function(e) {
                if (e.target.closest('a')) return;
                if (this.classList.contains('bdi-kanan')) navBuku(id, 1);
                else navBuku(id, -1);
            });
        });

        document.getElementById('panelKiri-' + id).addEventListener('click', function() { navBuku(id, -1); });
        document.getElementById('panelKanan-' + id).addEventListener('click', function(e) { if (!e.target.closest('a')) navBuku(id, 1); });

        refresh(id);
    }

    function refresh(id) {
        const st = getState(id);
        const popup = document.getElementById('popupBuku-' + id);
        const els = popup.querySelectorAll('.buku-flip-page');
        els.forEach(function(el, i) {
            el.classList.remove('bflipping');
            if (i < st.cur) {
                el.classList.remove('bdi-kanan'); el.classList.add('bdi-kiri');
                el.style.zIndex = i + 1;
            } else {
                el.classList.remove('bdi-kiri'); el.classList.add('bdi-kanan');
                el.style.zIndex = st.sheets.length - i;
            }
        });

        updatePanels(id);

        document.getElementById('btnPrev-' + id).disabled = st.sampulVisible;
        document.getElementById('btnNext-' + id).disabled = (st.cur >= st.sheets.length && !st.sampulVisible);

        const totalSteps = st.sheets.length + 1;
        const currentStep = st.sampulVisible ? 0 : st.cur + 1;
        const pct = totalSteps > 0 ? Math.round((currentStep / totalSteps) * 100) : 0;
        document.getElementById('barFill-' + id).style.width = pct + '%';

        if (st.sampulVisible) {
            document.getElementById('lblHal-' + id).textContent = 'Sampul';
        } else if (st.cur === 0) {
            document.getElementById('lblHal-' + id).textContent = 'Hal. 1';
        } else {
            document.getElementById('lblHal-' + id).textContent = 'Hal. ' + (st.cur * 2);
        }
        document.getElementById('lblTotal-' + id).textContent = (st.sheets.length + 1) + ' lembar';
    }

    function updatePanels(id) {
        const st = getState(id);
        const kiri = document.getElementById('isiKiri-' + id);
        const kanan = document.getElementById('isiKanan-' + id);

        if (st.cur > 0 && st.cur <= st.sheets.length) {
            kiri.innerHTML = st.sheets[st.cur - 1].back;
        } else {
            kiri.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;opacity:0.15"><i class="fas fa-book-open" style="font-size:2rem"></i></div>';
        }

        if (st.cur < st.sheets.length) {
            kanan.innerHTML = st.sheets[st.cur].front;
        } else {
            kanan.innerHTML = makeEndRight('', '');
        }
    }

    // ===== NAV =====
    window.navBuku = function(id, dir) {
        const st = getState(id);
        if (st.animating) return;

        if (st.sampulVisible && dir === 1) {
            st.animating = true;
            hideSampul(id);
            setTimeout(function() { st.animating = false; refresh(id); }, 700);
            return;
        }

        if (!st.sampulVisible && st.cur === 0 && dir === -1) {
            st.animating = true;
            showSampul(id);
            setTimeout(function() { st.animating = false; refresh(id); }, 700);
            return;
        }

        const next = st.cur + dir;
        if (next < 0 || next > st.sheets.length) return;

        st.animating = true;
        const popup = document.getElementById('popupBuku-' + id);
        const els = popup.querySelectorAll('.buku-flip-page');

        if (dir === 1 && st.cur < st.sheets.length) {
            const pg = els[st.cur];
            pg.style.zIndex = 999;
            pg.classList.add('bflipping');
            pg.classList.remove('bdi-kanan'); pg.classList.add('bdi-kiri');
        } else if (dir === -1 && st.cur > 0) {
            const pg = els[st.cur - 1];
            pg.style.zIndex = 999;
            pg.classList.add('bflipping');
            pg.classList.remove('bdi-kiri'); pg.classList.add('bdi-kanan');
        }

        st.cur = next;
        setTimeout(function() { st.animating = false; refresh(id); }, 680);
    };

    // ===== BUKA POPUP =====
    window.bukaPopupBuku = function(chapter, karakter) {
        karakter = karakter || 'kuro';
        const dataPrefix = karakter === 'kuro' ? 'chapter-data-' : 'chapter-data-' + karakter + '-';
        const dataEl = document.getElementById(dataPrefix + chapter);
        if (!dataEl) return;

        const st = getState(karakter);
        const judul = dataEl.dataset.judul;
        const judulAsing = dataEl.dataset.judulAsing;
        const ringkasan = dataEl.dataset.ringkasan;
        const konten = dataEl.dataset.konten;
        const gambar = dataEl.dataset.gambar;
        const ch = dataEl.dataset.chapter;
        const aliansi = dataEl.dataset.aliansi;
        const ikon = dataEl.dataset.ikon || 'fa-book';
        const warna = dataEl.dataset.warna || 'violet';

        const seriMap = {
            kuro: 'The Book of MYTHS',
            bejotaro: 'The Book of LELUHUR',
            veteran: 'The Book of LEGEND'
        };
        const seri = seriMap[karakter] || 'The Book';

        // Update header
        const badge = document.getElementById('bukuChBadge-' + karakter);
        if (badge) badge.innerHTML = '<span class="font-black text-sm" style="opacity:0.7">' + ch + '</span>';

        const judulEl = document.getElementById('bukuJudul-' + karakter);
        if (judulEl) judulEl.textContent = judul;
        const judulAsingEl = document.getElementById('bukuJudulAsing-' + karakter);
        if (judulAsingEl) judulAsingEl.textContent = judulAsing;

        // Build sampul
        const sampulInner = document.getElementById('sampulInner-' + karakter);
        sampulInner.innerHTML = makeSampulUtama(judul, judulAsing, aliansi, ikon, ch, warna, seri);

        // Parse
        const pages = parsePages(konten || ringkasan || 'Belum ada konten.');

        st.sheets = [];
        st.sheets.push({
            front: makeTOC(judul, ringkasan, pages),
            back: pages.length > 0 ? makePage(pages[0], 1) : makeEnd(judul, ch)
        });

        for (let i = 1; i < pages.length; i += 2) {
            const f = makePage(pages[i], i + 1);
            let b;
            if (i + 1 < pages.length) b = makePage(pages[i + 1], i + 2);
            else b = makeEnd(judul, ch);
            st.sheets.push({ front: f, back: b });
        }

        if (pages.length > 0 && pages.length % 2 === 1) {
            // ended in last sheet
        } else if (pages.length > 1 && pages.length % 2 === 0) {
            st.sheets.push({
                front: gambar ? makeGambar(gambar, judul) : makeEndRight(judul, ch),
                back: makeEnd(judul, ch)
            });
        }

        st.cur = 0;
        st.animating = false;
        st.open = true;
        st.sampulVisible = true;

        document.getElementById('popupBuku-' + karakter).classList.add('show');
        document.body.style.overflow = 'hidden';

        showSampul(karakter);
        render(karakter);
    };

    // ===== TUTUP POPUP =====
    window.tutupPopupBuku = function(karakter) {
        karakter = karakter || 'kuro';
        const st = getState(karakter);
        document.getElementById('popupBuku-' + karakter).classList.remove('show');
        document.body.style.overflow = '';
        st.open = false;
    };

    // ===== KEYBOARD =====
    document.addEventListener('keydown', function(e) {
        // Find which book is open
        let activeId = null;
        if (window._bukuState) {
            Object.keys(window._bukuState).forEach(function(id) {
                if (window._bukuState[id].open) activeId = id;
            });
        }
        if (!activeId) return;
        if (e.key === 'ArrowRight' || e.key === ' ') { e.preventDefault(); navBuku(activeId, 1); }
        if (e.key === 'ArrowLeft') { e.preventDefault(); navBuku(activeId, -1); }
        if (e.key === 'Escape') { e.preventDefault(); tutupPopupBuku(activeId); }
    });
})();
</script>
@endonce
