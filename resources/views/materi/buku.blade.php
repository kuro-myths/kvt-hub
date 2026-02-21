@extends('tata-letak.utama')
@section('judul', 'Baca: ' . $materi->judul . ' - KVT Hub')
@section('konten')

<style>
    /* ===== ROOT VARS ===== */
    :root {
        --buku-lebar: 800px;
        --buku-tinggi: 520px;
        --warna-kertas: #0e1726;
        --warna-kertas2: #162032;
        --warna-border: rgba(51,153,255,0.12);
        --flip-durasi: 0.6s;
    }

    /* ===== SCENE ===== */
    .buku-scene {
        perspective: 2000px;
        display: flex;
        justify-content: center;
    }

    .buku {
        position: relative;
        width: var(--buku-lebar);
        height: var(--buku-tinggi);
        transform-style: preserve-3d;
    }

    /* ===== PANELS ===== */
    .panel-kiri, .panel-kanan {
        position: absolute;
        top: 0;
        width: 50%;
        height: 100%;
        overflow: hidden;
    }
    .panel-kiri {
        left: 0;
        background: linear-gradient(135deg, var(--warna-kertas), var(--warna-kertas2));
        border: 1px solid var(--warna-border);
        border-right: none;
        border-radius: 12px 0 0 12px;
        box-shadow: inset -10px 0 25px rgba(0,0,0,0.3);
    }
    .panel-kanan {
        right: 0;
        background: linear-gradient(225deg, var(--warna-kertas), var(--warna-kertas2));
        border: 1px solid var(--warna-border);
        border-left: none;
        border-radius: 0 12px 12px 0;
        box-shadow: inset 10px 0 25px rgba(0,0,0,0.3);
    }

    /* ===== SPINE ===== */
    .punggung {
        position: absolute;
        left: 50%; top: 0;
        width: 8px; height: 100%;
        transform: translateX(-50%);
        background: linear-gradient(180deg, #1a365d, #0d1b2a, #1a365d);
        z-index: 50;
        box-shadow: 0 0 20px rgba(0,0,0,0.5);
    }
    .punggung::before, .punggung::after {
        content: '';
        position: absolute;
        left: 50%; transform: translateX(-50%);
        width: 14px; height: 6px;
        background: #0d1b2a; border-radius: 50%;
    }
    .punggung::before { top: -3px; }
    .punggung::after { bottom: -3px; }

    /* ===== FLIP PAGE ===== */
    .flip-page {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        transform-origin: left center;
        transform-style: preserve-3d;
        transition: transform var(--flip-durasi) cubic-bezier(0.4, 0.0, 0.2, 1);
        cursor: pointer;
        z-index: 1;
    }
    .flip-page.di-kanan { transform: rotateY(0deg); }
    .flip-page.di-kiri  { transform: rotateY(-180deg); }
    .flip-page.flipping { z-index: 999 !important; }

    /* ===== FACES ===== */
    .face-front, .face-back {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        overflow: hidden;
    }
    .face-front {
        background: linear-gradient(160deg, var(--warna-kertas2), var(--warna-kertas));
        border: 1px solid var(--warna-border);
        border-left: none;
        border-radius: 0 12px 12px 0;
        z-index: 2;
    }
    /* Inner shadow for spine side */
    .face-front::before {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 40px; height: 100%;
        background: linear-gradient(to right, rgba(0,0,0,0.2), transparent);
        pointer-events: none; z-index: 10;
    }
    .face-back {
        background: linear-gradient(200deg, var(--warna-kertas2), var(--warna-kertas));
        border: 1px solid var(--warna-border);
        border-right: none;
        border-radius: 12px 0 0 12px;
        transform: rotateY(180deg);
        z-index: 1;
    }
    .face-back::before {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 40px; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.2), transparent);
        pointer-events: none; z-index: 10;
    }
    /* Extra shadow during flip */
    .flip-page.flipping .face-front::after {
        content: '';
        position: absolute;
        top: 0; right: 0;
        width: 60%; height: 100%;
        background: linear-gradient(to left, rgba(0,0,0,0.06), transparent);
        pointer-events: none;
    }

    /* ===== PAGE CONTENT ===== */
    .pg-content {
        position: relative;
        padding: 30px 28px;
        height: 100%;
        display: flex;
        flex-direction: column;
        color: #c8d6e5;
        font-size: 0.88rem;
        line-height: 1.8;
        overflow-y: auto;
        z-index: 5;
    }
    .pg-content::-webkit-scrollbar { width: 3px; }
    .pg-content::-webkit-scrollbar-track { background: transparent; }
    .pg-content::-webkit-scrollbar-thumb { background: rgba(51,153,255,0.2); border-radius: 3px; }
    .pg-content h2 {
        font-size: 1.25rem; font-weight: 800;
        background: linear-gradient(135deg, #60a5fa, #a78bfa);
        -webkit-background-clip: text; -webkit-text-fill-color: transparent;
        background-clip: text; margin-bottom: 14px;
    }
    .pg-content h3 { font-size: 1.05rem; font-weight: 700; color: #93c5fd; margin-bottom: 8px; margin-top: 14px; }
    .pg-content p { margin-bottom: 10px; text-align: justify; }
    .pg-num {
        text-align: center; font-size: 0.68rem; color: #334155;
        padding-top: 8px; margin-top: auto;
        border-top: 1px solid rgba(51,153,255,0.04);
        letter-spacing: 1px;
    }

    /* ===== COVER ===== */
    .cover {
        display: flex; flex-direction: column; align-items: center; justify-content: center;
        height: 100%; padding: 36px; text-align: center;
        background: linear-gradient(135deg, #041F4D 0%, #0a2a5e 30%, #085CB3 60%, #041F4D 100%);
        position: relative; overflow: hidden;
        border-radius: 0 12px 12px 0;
    }
    .cover::before {
        content: '';
        position: absolute; inset: 0;
        background: radial-gradient(ellipse at 25% 30%, rgba(96,165,250,0.12) 0%, transparent 60%),
                    radial-gradient(ellipse at 75% 70%, rgba(167,139,250,0.08) 0%, transparent 60%);
        pointer-events: none;
    }
    .cover::after {
        content: '';
        position: absolute; top: 15px; right: 15px; bottom: 15px; left: 15px;
        border: 1px solid rgba(96,165,250,0.15); border-radius: 8px; pointer-events: none;
    }
    .cover .c-icon { font-size: 3.5rem; margin-bottom: 18px; filter: drop-shadow(0 0 25px rgba(51,153,255,0.5)); position: relative; }
    .cover h1 { font-size: 1.5rem; font-weight: 800; background: linear-gradient(135deg,#93c5fd,#c4b5fd); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin-bottom: 10px; position: relative; }
    .cover .c-info { color: #64748b; font-size: 0.82rem; position: relative; margin-bottom: 4px; }
    .cover .c-badge { margin-top: 14px; padding: 5px 18px; border-radius: 999px; font-size: 0.72rem; font-weight: 600; background: rgba(51,153,255,0.12); color: #60a5fa; border: 1px solid rgba(51,153,255,0.2); position: relative; }
    .cover .c-hint { margin-top: 28px; color: #334155; font-size: 0.72rem; position: relative; animation: pulseHint 2s ease-in-out infinite; }
    @keyframes pulseHint { 0%,100%{opacity:0.4} 50%{opacity:1;color:#475569} }

    /* ===== QUIZ ===== */
    .quiz-page { display:flex; flex-direction:column; height:100%; padding:28px; }
    .quiz-page .qh { text-align:center; margin-bottom:16px; }
    .quiz-page .qh h2 { font-size:1.15rem; font-weight:800; background:linear-gradient(135deg,#a78bfa,#f472b6); -webkit-background-clip:text; -webkit-text-fill-color:transparent; background-clip:text; }
    .quiz-page .qh p { color:#64748b; font-size:0.78rem; margin-top:4px; }
    .qi {
        display:flex; align-items:center; gap:12px;
        padding:12px 14px; margin-bottom:8px;
        background:rgba(139,92,246,0.04);
        border:1px solid rgba(139,92,246,0.08);
        border-radius:10px; transition:all 0.25s; cursor:pointer; text-decoration:none;
    }
    .qi:hover { background:rgba(139,92,246,0.1); border-color:rgba(139,92,246,0.25); transform:translateX(4px); }
    .qi-icon { width:36px;height:36px;background:rgba(139,92,246,0.15);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0; }
    .qi-icon i { color:#a78bfa; font-size:0.9rem; }
    .qi-info h3 { color:#e2e8f0; font-size:0.85rem; font-weight:600; margin-bottom:2px; }
    .qi-info p { color:#64748b; font-size:0.7rem; }
    .qi-go { margin-left:auto; background:rgba(139,92,246,0.15); color:#a78bfa; font-size:0.68rem; font-weight:600; padding:3px 10px; border-radius:999px; flex-shrink:0; }

    /* ===== NAV BUTTONS ===== */
    .btn-nav {
        position: absolute; top: 50%; transform: translateY(-50%);
        width: 48px; height: 48px; border-radius: 50%;
        background: rgba(4,31,77,0.7); backdrop-filter: blur(8px);
        border: 1px solid rgba(51,153,255,0.2);
        color: #60a5fa; display: flex; align-items: center; justify-content: center;
        cursor: pointer; transition: all 0.3s; z-index: 200;
    }
    .btn-nav:hover:not(:disabled) { background: rgba(51,153,255,0.15); box-shadow: 0 0 25px rgba(51,153,255,0.15); transform: translateY(-50%) scale(1.1); border-color: rgba(51,153,255,0.4); }
    .btn-nav:disabled { opacity: 0.12; cursor: not-allowed; }
    .btn-nav.prev { left: -64px; }
    .btn-nav.next { right: -64px; }

    /* ===== PROGRESS ===== */
    .bar-wrap { height:3px; background:rgba(51,153,255,0.08); border-radius:2px; overflow:hidden; }
    .bar-fill { height:100%; background:linear-gradient(90deg,#3399FF,#8B5CF6); border-radius:2px; transition:width .5s ease; }

    /* ===== TOC ITEM ===== */
    .toc-i { padding:7px 12px; border-radius:8px; cursor:pointer; transition:all .2s; border:1px solid transparent; }
    .toc-i:hover { background:rgba(51,153,255,0.06); border-color:rgba(51,153,255,0.12); }
    .toc-i.active { background:rgba(51,153,255,0.1); border-color:rgba(51,153,255,0.2); }

    /* ===== SHADOW UNDER BOOK ===== */
    .book-shadow {
        position:absolute; bottom:-14px; left:5%; width:90%; height:22px;
        background:radial-gradient(ellipse,rgba(0,0,0,0.35) 0%,transparent 70%);
        filter:blur(4px); z-index:-1;
    }

    /* ===== HINT ANIM ===== */
    @keyframes hintFlip { 0%{transform:rotateY(0)} 40%{transform:rotateY(-20deg)} 60%{transform:rotateY(-20deg)} 100%{transform:rotateY(0)} }
    .hint-awal { animation: hintFlip 1.5s ease-in-out 1.5s 2; }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 880px) {
        :root { --buku-lebar: 94vw; --buku-tinggi: 62vw; }
        .btn-nav.prev { left: 4px; } .btn-nav.next { right: 4px; }
        .btn-nav { width:38px; height:38px; font-size:0.85rem; background:rgba(4,31,77,0.9); }
        .pg-content { padding:18px 16px; font-size:0.82rem; }
        .pg-content h2 { font-size:1.05rem; }
        .cover h1 { font-size:1.2rem; } .cover { padding:24px; }
    }
    @media (max-width: 520px) {
        :root { --buku-tinggi: 72vw; }
        .pg-content { padding:14px 12px; font-size:0.76rem; line-height:1.6; }
        .btn-nav { width:34px; height:34px; }
    }
</style>

<section class="pt-24 pb-12 px-4 min-h-screen">
    <div class="max-w-5xl mx-auto">
        {{-- Breadcrumb --}}
        <div class="mb-4 text-sm text-gray-500 flex items-center justify-between flex-wrap gap-2" data-aos="fade-up">
            <div class="flex items-center flex-wrap gap-1">
                <a href="{{ route('kelas.tampilkan', $materi->kelas) }}" class="hover:text-kvt-400 transition">{{ $materi->kelas->nama }}</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <a href="{{ route('materi.tampilkan', $materi) }}" class="hover:text-kvt-400 transition">{{ $materi->judul }}</a>
                <i class="fas fa-chevron-right mx-2 text-xs"></i>
                <span class="text-kvt-400 font-semibold">📖 Mode Buku</span>
            </div>
            <a href="{{ route('materi.tampilkan', $materi) }}"
               class="text-gray-500 hover:text-white transition text-xs bg-kvt-900/60 border border-kvt-700/30 px-4 py-1.5 rounded-lg backdrop-blur">
                <i class="fas fa-arrow-left mr-1"></i> Kembali
            </a>
        </div>

        {{-- BOOK --}}
        <div class="flex justify-center" data-aos="zoom-in" data-aos-duration="600">
            <div class="buku-scene" style="position:relative;">
                <div class="buku" id="buku">
                    <div class="book-shadow"></div>
                    <div class="panel-kiri" id="panelKiri"><div class="pg-content" id="isiKiri"></div></div>
                    <div class="panel-kanan" id="panelKanan"><div class="pg-content" id="isiKanan"></div></div>
                    <div class="punggung"></div>

                    {{-- Flip container --}}
                    <div id="flipWrap" style="transform-style:preserve-3d;position:absolute;top:0;left:50%;width:50%;height:100%;"></div>

                    <button class="btn-nav prev" id="btnPrev" onclick="navBuku(-1)"><i class="fas fa-chevron-left"></i></button>
                    <button class="btn-nav next" id="btnNext" onclick="navBuku(1)"><i class="fas fa-chevron-right"></i></button>
                </div>

                {{-- Progress --}}
                <div class="flex items-center gap-3 mt-5" style="width:var(--buku-lebar);max-width:100%;">
                    <span class="text-gray-500 text-xs font-mono" id="lblHal">Sampul</span>
                    <div class="bar-wrap flex-1"><div class="bar-fill" id="barFill" style="width:0%"></div></div>
                    <span class="text-gray-500 text-xs font-mono" id="lblTotal"></span>
                </div>
            </div>
        </div>

        {{-- TOC --}}
        <div class="mt-8 max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="150">
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-5">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">
                    <i class="fas fa-list mr-2 text-kvt-400"></i>Daftar Isi
                </h3>
                <div class="space-y-1" id="tocWrap"></div>
            </div>
        </div>

        {{-- Keyboard --}}
        <div class="mt-4 text-center text-gray-600 text-xs" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-keyboard mr-1"></i>
            Gunakan <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">←</kbd>
            <kbd class="bg-kvt-800 px-1.5 py-0.5 rounded text-gray-400 border border-kvt-700/30 text-[10px]">→</kbd>
            atau klik halaman
        </div>

        {{-- Selesai --}}
        @auth
            @if(!$progres || $progres->status !== 'selesai')
                <form method="POST" action="{{ route('materi.selesai', $materi) }}" class="mt-6 max-w-md mx-auto" data-aos="fade-up">
                    @csrf
                    <button type="submit" id="btnSelesai"
                        class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-400 hover:to-green-500 text-white px-8 py-3 rounded-xl font-semibold transition shadow-lg w-full opacity-40 cursor-not-allowed" disabled>
                        <i class="fas fa-check-circle mr-2"></i>Tandai Selesai (+{{ $materi->xp_reward }} XP)
                    </button>
                    <p class="text-gray-600 text-xs text-center mt-2" id="pesanSelesai">Baca semua halaman untuk menandai selesai</p>
                </form>
            @else
                <div class="mt-6 bg-green-500/10 border border-green-500/30 rounded-xl p-4 text-center max-w-md mx-auto" data-aos="fade-up">
                    <i class="fas fa-check-circle text-green-400 text-2xl mb-2"></i>
                    <p class="text-green-400 font-semibold">Materi ini sudah selesai!</p>
                </div>
            @endif
        @endauth
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {

    // ===== DATA =====
    const judul = @json($materi->judul);
    const desc  = @json($materi->deskripsi ?? '');
    const konten = @json($materi->konten ?? '');
    const tipe  = @json(ucfirst($materi->tipe));
    const guru  = @json($materi->guru->name ?? 'KVT Hub');
    const kls   = @json($materi->kelas->nama);
    const xp    = @json($materi->xp_reward);
    const quizzes = @json($materi->kuis->map(fn($k) => [
        'id' => $k->id,
        'judul' => $k->judul,
        'count' => $k->pertanyaan->count(),
        'xp' => $k->xp_reward,
        'url' => route('kuis.mulai', $k->id),
    ]));

    // ===== PARSE =====
    const MAX = 520;
    const pages = parsePages(konten, desc);

    function parsePages(k, d) {
        const out = [];
        const txt = k || d || '';
        if (!txt.trim()) { out.push({t:null,c:'Belum ada konten.'}); return out; }

        const parts = txt.split(/\n\s*\n|\n(?=#{1,3}\s)/);
        let ct = null, cc = '';

        parts.forEach(function(p){
            const s = p.trim();
            if(!s) return;
            const hm = s.match(/^(#{1,3})\s+(.+)/);
            if(hm){
                if(cc.trim()) pushSplit(out, ct, cc.trim());
                ct = hm[2]; cc = '';
            } else { cc += s + '\n\n'; }
            if(cc.length > MAX*1.5){ pushSplit(out,ct,cc.trim()); ct=null; cc=''; }
        });
        if(cc.trim()) pushSplit(out, ct, cc.trim());
        if(out.length===0) out.push({t:null, c:txt.substring(0,MAX)});
        return out;
    }

    function pushSplit(arr, title, text){
        if(text.length <= MAX){ arr.push({t:title,c:text}); return; }
        const sents = text.split(/(?<=[.!?。])\s+/);
        let buf='', first=true;
        sents.forEach(function(s){
            if((buf+s).length>MAX && buf){ arr.push({t:first?title:null, c:buf.trim()}); first=false; buf=''; }
            buf += s+' ';
        });
        if(buf.trim()) arr.push({t:first?title:null, c:buf.trim()});
    }

    function esc(s){ const d=document.createElement('div'); d.textContent=s; return d.innerHTML; }

    // ===== HTML BUILDERS =====
    function coverFront(){
        return `<div class="cover">
            <div class="c-icon">📖</div>
            <h1>${esc(judul)}</h1>
            <div class="c-info"><i class="fas fa-user-circle mr-1"></i>${esc(guru)}</div>
            <div class="c-info"><i class="fas fa-graduation-cap mr-1"></i>${esc(kls)}</div>
            <div class="c-badge">${esc(tipe)} • +${xp} XP</div>
            <div class="c-hint"><i class="fas fa-hand-pointer mr-1"></i> Klik atau tekan → untuk mulai</div>
        </div>`;
    }

    function coverBack(){
        let h='<div class="pg-content"><h2><i class="fas fa-bookmark mr-2" style="font-size:0.85em"></i>Daftar Isi</h2>';
        let n=1;
        pages.forEach(function(p,i){
            if(p.t){ h+=`<div style="display:flex;justify-content:space-between;padding:6px 0;border-bottom:1px solid rgba(51,153,255,0.05)"><span style="color:#93c5fd;font-size:0.85rem">${n}. ${esc(p.t)}</span><span style="color:#334155;font-size:0.8rem">${i+1}</span></div>`; n++; }
        });
        if(n===1) h+=`<div style="color:#475569;padding:8px 0;font-size:0.85rem">${pages.length} halaman</div>`;
        if(quizzes.length>0){
            h+='<div style="margin-top:12px;padding-top:10px;border-top:1px solid rgba(139,92,246,0.1)"><div style="color:#a78bfa;font-size:0.78rem;font-weight:700;margin-bottom:4px"><i class="fas fa-brain mr-1"></i>Kuis</div>';
            quizzes.forEach(function(q){ h+=`<div style="color:#64748b;font-size:0.78rem;padding:2px 0">• ${esc(q.judul)} (${q.count} soal)</div>`; });
            h+='</div>';
        }
        if(desc) h+=`<div style="margin-top:auto;padding-top:12px;border-top:1px solid rgba(51,153,255,0.05);color:#334155;font-size:0.78rem;font-style:italic">${esc(desc.substring(0,160))}${desc.length>160?'...':''}</div>`;
        h+='</div>';
        return h;
    }

    function pgHTML(data, num){
        let h='<div class="pg-content">';
        if(data.t) h+='<h2>'+esc(data.t)+'</h2>';
        data.c.split(/\n\s*\n|\n/).forEach(function(p){ if(p.trim()) h+='<p>'+esc(p.trim())+'</p>'; });
        h+='<div class="pg-num">— '+num+' —</div></div>';
        return h;
    }

    function quizHTML(){
        let h='<div class="quiz-page"><div class="qh"><h2><i class="fas fa-brain mr-2"></i>Kuis</h2><p>Uji pemahamanmu!</p></div><div style="flex:1;overflow-y:auto">';
        quizzes.forEach(function(q){
            h+=`<a href="${q.url}" class="qi"><div class="qi-icon"><i class="fas fa-brain"></i></div><div class="qi-info"><h3>${esc(q.judul)}</h3><p>${q.count} pertanyaan • +${q.xp} XP</p></div><span class="qi-go">Mulai →</span></a>`;
        });
        h+='</div><div class="pg-num">— Kuis —</div></div>';
        return h;
    }

    function endHTML(){
        return `<div class="cover" style="background:linear-gradient(135deg,#0a1628,#1a2744,#0d1b2a);border-radius:12px 0 0 12px;">
            <div class="c-icon">🎓</div><h1>Selesai!</h1>
            <div class="c-info" style="margin-top:6px">${esc(judul)}</div>
            ${quizzes.length?'<div class="c-info" style="color:#a78bfa;margin-top:12px"><i class="fas fa-brain mr-1"></i>Jangan lupa kuis!</div>':''}
            <div style="margin-top:20px;color:#334155;font-size:0.72rem">Tandai materi sebagai selesai di bawah</div>
        </div>`;
    }

    function endHTMLRight(){
        return `<div class="cover" style="background:linear-gradient(135deg,#0a1628,#1a2744,#0d1b2a);">
            <div class="c-icon">🎓</div><h1>Selesai!</h1>
            <div class="c-info" style="margin-top:6px">${esc(judul)}</div>
            ${quizzes.length?'<div class="c-info" style="color:#a78bfa;margin-top:12px"><i class="fas fa-brain mr-1"></i>Jangan lupa kuis!</div>':''}
            <div style="margin-top:20px;color:#334155;font-size:0.72rem">Tandai materi sebagai selesai di bawah</div>
        </div>`;
    }

    // ===== BUILD SHEETS =====
    // Each sheet: front = right page visible, back = left page when flipped
    const sheets = [];

    // Cover
    sheets.push({ front: coverFront(), back: coverBack() });

    // Content
    for(let i=0; i<pages.length; i+=2){
        const f = pgHTML(pages[i], i+1);
        let b;
        if(i+1 < pages.length) b = pgHTML(pages[i+1], i+2);
        else if(quizzes.length>0) b = quizHTML();
        else b = endHTML();
        sheets.push({front:f, back:b});
    }

    // Quiz or ending
    if(quizzes.length>0 && pages.length%2===0){
        sheets.push({front: quizHTML(), back: endHTML()});
    } else if(quizzes.length===0 && pages.length%2===0){
        sheets.push({front: endHTMLRight(), back: endHTML()});
    }

    // ===== STATE =====
    let cur = 0;
    let animating = false;
    const read = new Set([0]);

    // ===== RENDER =====
    function render(){
        const wrap = document.getElementById('flipWrap');
        wrap.innerHTML = '';

        sheets.forEach(function(sh, i){
            const el = document.createElement('div');
            el.className = 'flip-page di-kanan' + (i===0?' hint-awal':'');
            el.dataset.i = i;
            el.style.zIndex = sheets.length - i;

            const fr = document.createElement('div');
            fr.className = 'face-front';
            fr.innerHTML = sh.front;

            const bk = document.createElement('div');
            bk.className = 'face-back';
            bk.innerHTML = sh.back;

            el.appendChild(fr);
            el.appendChild(bk);
            wrap.appendChild(el);

            el.addEventListener('click', function(e){
                if(e.target.closest('a')) return;
                if(this.classList.contains('di-kanan')) navBuku(1);
                else navBuku(-1);
            });
        });

        document.getElementById('panelKiri').addEventListener('click', function(){ navBuku(-1); });
        document.getElementById('panelKanan').addEventListener('click', function(e){ if(!e.target.closest('a')) navBuku(1); });

        refresh();
        buildTOC();
    }

    function refresh(){
        const els = document.querySelectorAll('.flip-page');
        els.forEach(function(el, i){
            el.classList.remove('flipping');
            if(i < cur){
                el.classList.remove('di-kanan');
                el.classList.add('di-kiri');
                el.style.zIndex = i+1;
            } else {
                el.classList.remove('di-kiri');
                el.classList.add('di-kanan');
                el.style.zIndex = sheets.length - i;
            }
        });

        updatePanels();

        document.getElementById('btnPrev').disabled = (cur <= 0);
        document.getElementById('btnNext').disabled = (cur >= sheets.length);

        const pct = sheets.length>0 ? Math.round((cur/sheets.length)*100) : 0;
        document.getElementById('barFill').style.width = pct+'%';

        if(cur===0) document.getElementById('lblHal').textContent='Sampul';
        else {
            const p1=(cur-1)*2+1, p2=Math.min(p1+1, pages.length);
            document.getElementById('lblHal').textContent='Hal. '+p1+(p1!==p2?'-'+p2:'');
        }
        document.getElementById('lblTotal').textContent = pages.length+' halaman';

        read.add(cur);

        document.querySelectorAll('.toc-i').forEach(function(el){
            el.classList.toggle('active', parseInt(el.dataset.s)===cur);
        });

        const btn = document.getElementById('btnSelesai');
        if(btn && read.size >= sheets.length){
            btn.disabled = false;
            btn.classList.remove('opacity-40','cursor-not-allowed');
            const msg = document.getElementById('pesanSelesai');
            if(msg) msg.textContent = '✨ Semua halaman sudah dibaca!';
        }
    }

    function updatePanels(){
        const kiri = document.getElementById('isiKiri');
        const kanan = document.getElementById('isiKanan');

        if(cur > 0 && cur <= sheets.length){
            kiri.innerHTML = sheets[cur-1].back;
        } else {
            kiri.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#1a2744"><i class="fas fa-book-open" style="font-size:2rem;opacity:0.3"></i></div>';
        }

        if(cur < sheets.length){
            kanan.innerHTML = sheets[cur].front;
        } else {
            kanan.innerHTML = endHTMLRight();
        }
    }

    // ===== NAV =====
    window.navBuku = function(dir){
        if(animating) return;
        const next = cur + dir;
        if(next<0 || next>sheets.length) return;

        animating = true;
        const els = document.querySelectorAll('.flip-page');

        if(dir===1 && cur<sheets.length){
            const pg = els[cur];
            pg.style.zIndex = 999;
            pg.classList.add('flipping');
            pg.classList.remove('di-kanan');
            pg.classList.add('di-kiri');
        } else if(dir===-1 && cur>0){
            const pg = els[cur-1];
            pg.style.zIndex = 999;
            pg.classList.add('flipping');
            pg.classList.remove('di-kiri');
            pg.classList.add('di-kanan');
        }

        cur = next;

        setTimeout(function(){
            animating = false;
            refresh();
        }, 650);
    };

    window.goSpread = function(s){
        if(animating) return;
        // Animate step by step if close, jump if far
        const diff = Math.abs(s - cur);
        if(diff <= 2){
            const dir = s > cur ? 1 : -1;
            const interval = setInterval(function(){
                if(cur === s || animating){ clearInterval(interval); return; }
                navBuku(dir);
            }, 300);
        } else {
            cur = Math.max(0, Math.min(s, sheets.length));
            refresh();
        }
        window.scrollTo({top:0, behavior:'smooth'});
    };

    // ===== KEYBOARD =====
    document.addEventListener('keydown', function(e){
        if(e.key==='ArrowRight'||e.key===' '){ e.preventDefault(); navBuku(1); }
        if(e.key==='ArrowLeft'){ e.preventDefault(); navBuku(-1); }
    });

    // ===== TOC =====
    function buildTOC(){
        const w = document.getElementById('tocWrap');
        w.innerHTML = '';
        addTOC(w, 0, 'fas fa-book text-kvt-400', 'Sampul & Daftar Isi', 'Awal');
        pages.forEach(function(p,i){
            if(p.t){
                const sp = Math.floor(i/2)+1;
                addTOC(w, sp, 'fas fa-file-alt text-kvt-400', p.t, 'Hal. '+(i+1));
            }
        });
        if(quizzes.length>0){
            const qs = pages.length%2===0 ? Math.floor(pages.length/2)+1 : Math.ceil(pages.length/2);
            addTOC(w, qs, 'fas fa-brain text-purple-400', 'Kuis', '');
        }
    }

    function addTOC(w, sp, icon, text, badge){
        const el = document.createElement('div');
        el.className = 'toc-i flex items-center gap-2 text-sm'+(sp===cur?' active':'');
        el.dataset.s = sp;
        el.innerHTML = '<i class="'+icon+' mr-2"></i><span class="text-gray-300 flex-1">'+esc(text)+'</span>'+(badge?'<span class="text-gray-600 text-xs">'+badge+'</span>':'');
        el.onclick = function(){ goSpread(sp); };
        w.appendChild(el);
    }

    // ===== INIT =====
    render();
});
</script>
@endsection
