<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'KVT Hub - Dashboard')</title>

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
                        'slide-up':'slideUp 0.5s ease-out',
                        'fade-in':'fadeIn 0.5s ease-out',
                    },
                    keyframes: {
                        slideUp:{'0%':{transform:'translateY(20px)',opacity:'0'},'100%':{transform:'translateY(0)',opacity:'1'}},
                        fadeIn:{'0%':{opacity:'0'},'100%':{opacity:'1'}},
                    }
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4" defer></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        code, pre, .font-mono { font-family: 'JetBrains Mono', monospace; }
        ::-webkit-scrollbar { width:6px }
        ::-webkit-scrollbar-track { background:#021029 }
        ::-webkit-scrollbar-thumb { background:linear-gradient(180deg,#3399FF,#8B5CF6);border-radius:3px }
        .kaca { background:rgba(255,255,255,0.05);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,0.1) }
    </style>
    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen">

    @php
        $user = auth()->user();
        $peran = $user->peran ?? 'pengguna';
        $peranWarna = match($peran) {
            'admin' => 'red',
            'pengajar' => 'green',
            'staff' => 'orange',
            default => 'kvt',
        };
        $peranLabel = match($peran) {
            'admin' => 'Admin',
            'pengajar' => 'Pengajar',
            'staff' => 'Staff',
            default => 'Pengguna',
        };
        $peranIkon = match($peran) {
            'admin' => 'fas fa-shield-alt',
            'pengajar' => 'fas fa-chalkboard-teacher',
            'staff' => 'fas fa-user-tie',
            default => 'fas fa-user-graduate',
        };
    @endphp

    {{-- ==================== DASHBOARD HEADER ==================== --}}
    <header class="fixed top-0 left-0 right-0 z-30 h-16 bg-kvt-950/95 backdrop-blur-xl border-b border-kvt-700/20">
        <div class="flex items-center h-full px-4">

            {{-- Left: Sidebar Toggle + Logo --}}
            <div class="flex items-center gap-3">
                {{-- Sidebar Toggle --}}
                <button onclick="toggleSidebar()" class="w-10 h-10 rounded-xl bg-kvt-900/80 border border-kvt-700/30 flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-800/80 transition" id="sidebarToggleBtn" title="Toggle Sidebar">
                    <i class="fas fa-bars text-sm"></i>
                </button>

                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center gap-2.5 group">
                    <div class="w-9 h-9 bg-gradient-to-br from-kvt-400 via-ungu-500 to-kvt-600 rounded-lg flex items-center justify-center shadow-lg shadow-kvt-500/20">
                        <span class="text-white font-black text-base">K</span>
                    </div>
                    <div class="hidden sm:block leading-tight">
                        <span class="text-lg font-extrabold tracking-tight">
                            <span class="text-white">KVT</span><span class="text-kvt-400">Hub</span>
                        </span>
                    </div>
                </a>
            </div>

            {{-- Center: Page title (optional) --}}
            <div class="flex-1 ml-4 hidden md:block">
                <p class="text-sm text-gray-500">
                    <i class="{{ $peranIkon }} text-{{ $peranWarna }}-400 mr-1.5 text-xs"></i>
                    <span class="text-{{ $peranWarna }}-400 font-semibold">{{ $peranLabel }}</span>
                    <span class="text-kvt-700 mx-2">/</span>
                    <span class="text-gray-400">@yield('judul-halaman', 'Dashboard')</span>
                </p>
            </div>

            {{-- Right: Actions --}}
            <div class="flex items-center gap-2 ml-auto">
                {{-- Search --}}
                <button class="w-9 h-9 rounded-lg bg-kvt-900/60 border border-kvt-700/20 flex items-center justify-center text-gray-500 hover:text-kvt-400 hover:border-kvt-600/30 transition" title="Cari">
                    <i class="fas fa-search text-sm"></i>
                </button>

                {{-- Notifications --}}
                <div class="relative">
                    <button onclick="toggleNotifDasbor()" class="w-9 h-9 rounded-lg bg-kvt-900/60 border border-kvt-700/20 flex items-center justify-center text-gray-500 hover:text-kvt-400 hover:border-kvt-600/30 transition relative" title="Notifikasi">
                        <i class="fas fa-bell text-sm"></i>
                        <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 rounded-full text-[9px] font-bold flex items-center justify-center hidden" id="notifBadgeDasbor">0</span>
                    </button>
                    {{-- Notification Dropdown --}}
                    <div class="absolute right-0 top-full mt-2 w-80 bg-kvt-900/98 backdrop-blur-xl border border-kvt-700/30 rounded-xl shadow-2xl hidden z-50" id="notifDropdownDasbor">
                        <div class="p-3 border-b border-kvt-700/20">
                            <p class="text-sm font-bold text-white">Notifikasi</p>
                        </div>
                        <div class="max-h-72 overflow-y-auto p-2 space-y-1" id="notifContentDasbor">
                            <div class="text-center py-6 text-gray-500 text-sm">
                                <i class="fas fa-bell-slash text-2xl mb-2 block"></i>Memuat...
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Beranda link --}}
                <a href="{{ route('beranda') }}" class="w-9 h-9 rounded-lg bg-kvt-900/60 border border-kvt-700/20 flex items-center justify-center text-gray-500 hover:text-kvt-400 hover:border-kvt-600/30 transition" title="Ke Beranda">
                    <i class="fas fa-home text-sm"></i>
                </a>

                {{-- User Dropdown --}}
                <div class="relative">
                    <button onclick="toggleUserDasbor()" class="flex items-center gap-2 px-2 py-1.5 rounded-xl hover:bg-kvt-800/50 transition">
                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-{{ $peranWarna }}-400 to-{{ $peranWarna }}-600 flex items-center justify-center text-white text-xs font-black">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="hidden sm:block text-left leading-tight">
                            <p class="text-xs font-semibold text-white truncate max-w-[100px]">{{ $user->name }}</p>
                            <p class="text-[10px] text-{{ $peranWarna }}-400">Lv.{{ $user->level }}</p>
                        </div>
                        <i class="fas fa-chevron-down text-[8px] text-gray-500 hidden sm:block"></i>
                    </button>
                    {{-- User Dropdown Menu --}}
                    <div class="absolute right-0 top-full mt-2 w-56 bg-kvt-900/98 backdrop-blur-xl border border-kvt-700/30 rounded-xl shadow-2xl hidden z-50" id="userDropdownDasbor">
                        <div class="p-3 border-b border-kvt-700/20">
                            <p class="text-sm font-bold text-white">{{ $user->name }}</p>
                            <p class="text-[11px] text-gray-500">{{ $user->email }}</p>
                        </div>
                        <div class="p-1.5">
                            @php
                                $dasborRoute = match($peran) {
                                    'admin' => 'admin.dasbor',
                                    'pengajar' => 'pengajar.dasbor',
                                    'staff' => 'staff.dasbor',
                                    default => 'pengguna.dasbor',
                                };
                            @endphp
                            <a href="{{ route($dasborRoute) }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                                <i class="fas fa-tachometer-alt text-xs w-4 text-center"></i> Dashboard
                            </a>
                            <a href="{{ route('beranda') }}" class="flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-gray-400 hover:text-white hover:bg-kvt-800/50 transition">
                                <i class="fas fa-home text-xs w-4 text-center"></i> Beranda
                            </a>
                            <div class="h-px bg-kvt-700/20 my-1 mx-2"></div>
                            <form method="POST" action="{{ route('keluar') }}">
                                @csrf
                                <button type="submit" class="w-full flex items-center gap-2.5 px-3 py-2 rounded-lg text-sm text-red-400/70 hover:text-red-400 hover:bg-red-500/10 transition">
                                    <i class="fas fa-sign-out-alt text-xs w-4 text-center"></i> Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>

    {{-- ==================== SIDEBAR ==================== --}}
    @include('tata-letak.sidebar')

    {{-- ==================== MAIN CONTENT ==================== --}}
    {{-- Flash Messages --}}
    @if(session('sukses'))
    <div class="fixed top-20 right-4 z-50 bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl text-sm animate-slide-up" id="flashSukses">
        <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
    </div>
    @endif
    @if(session('error'))
    <div class="fixed top-20 right-4 z-50 bg-red-500/20 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl text-sm animate-slide-up" id="flashError">
        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
    </div>
    @endif

    <main class="pt-16 lg:ml-64 min-h-screen transition-all duration-300" id="mainContent">
        @yield('konten')
    </main>

    {{-- ==================== SCRIPTS ==================== --}}
    <script>
        // AOS Init
        document.addEventListener('DOMContentLoaded', () => {
            if(typeof AOS !== 'undefined') AOS.init({ duration: 600, once: true, offset: 50 });
        });

        // Sidebar Toggle
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebarNav');
            const overlay = document.getElementById('sidebarOverlay');
            const main = document.getElementById('mainContent');
            const btn = document.getElementById('sidebarToggleBtn');

            if (window.innerWidth >= 1024) {
                // Desktop: collapse/expand
                sidebar.classList.toggle('lg:translate-x-0');
                sidebar.classList.toggle('lg:-translate-x-full');
                main.classList.toggle('lg:ml-64');
                main.classList.toggle('lg:ml-0');
            } else {
                // Mobile: slide in/out
                sidebar.classList.toggle('-translate-x-full');
                overlay.classList.toggle('hidden');
            }
        }

        // Notification Toggle
        function toggleNotifDasbor() {
            const dd = document.getElementById('notifDropdownDasbor');
            const ud = document.getElementById('userDropdownDasbor');
            ud.classList.add('hidden');
            dd.classList.toggle('hidden');
            if (!dd.classList.contains('hidden')) muatNotifDasbor();
        }
        function muatNotifDasbor() {
            fetch('/api/berita/popup').then(r => r.json()).then(data => {
                const c = document.getElementById('notifContentDasbor');
                const badge = document.getElementById('notifBadgeDasbor');
                const dibaca = JSON.parse(localStorage.getItem('kvt_notif_dibaca') || '[]');
                const belumDibaca = (data || []).filter(b => !dibaca.includes(b.id));
                if (badge) {
                    if (belumDibaca.length > 0) { badge.textContent = belumDibaca.length; badge.classList.remove('hidden'); }
                    else badge.classList.add('hidden');
                }
                if (!data || !data.length) { c.innerHTML = '<div class="text-center py-6 text-gray-500 text-sm"><i class="fas fa-bell-slash text-2xl mb-2 block"></i>Belum ada notifikasi</div>'; return; }
                c.innerHTML = '';
                data.forEach((b, i) => {
                    const tgl = new Date(b.terbit_pada).toLocaleDateString('id-ID', { day: 'numeric', month: 'short' });
                    const sudahBaca = dibaca.includes(b.id);
                    c.innerHTML += `<a href="/berita/${b.slug}" class="flex gap-2.5 p-2 rounded-lg hover:bg-kvt-800/50 transition ${sudahBaca ? 'opacity-60' : ''}"><div class="flex-1 min-w-0"><p class="text-xs font-semibold text-white truncate">${b.judul}</p><span class="text-[10px] text-gray-500">${tgl}</span></div>${!sudahBaca ? '<span class="w-2 h-2 bg-kvt-400 rounded-full shrink-0 mt-2"></span>' : ''}</a>`;
                });
            }).catch(() => {
                document.getElementById('notifContentDasbor').innerHTML = '<div class="text-center py-4 text-gray-500 text-xs">Gagal memuat</div>';
            });
        }

        // User Dropdown Toggle
        function toggleUserDasbor() {
            const ud = document.getElementById('userDropdownDasbor');
            const nd = document.getElementById('notifDropdownDasbor');
            nd.classList.add('hidden');
            ud.classList.toggle('hidden');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('#notifDropdownDasbor') && !e.target.closest('[onclick="toggleNotifDasbor()"]')) {
                document.getElementById('notifDropdownDasbor')?.classList.add('hidden');
            }
            if (!e.target.closest('#userDropdownDasbor') && !e.target.closest('[onclick="toggleUserDasbor()"]')) {
                document.getElementById('userDropdownDasbor')?.classList.add('hidden');
            }
        });

        // ESC to close
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.getElementById('notifDropdownDasbor')?.classList.add('hidden');
                document.getElementById('userDropdownDasbor')?.classList.add('hidden');
            }
        });

        // Auto-dismiss flash messages
        setTimeout(() => {
            document.querySelectorAll('#flashSukses, #flashError').forEach(el => {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 4000);

        // Clock
        function updateClock() {
            const el = document.getElementById('jamDasbor');
            if (el) el.textContent = new Date().toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        setInterval(updateClock, 1000);
        updateClock();
    </script>
    @stack('scripts')
</body>
</html>
