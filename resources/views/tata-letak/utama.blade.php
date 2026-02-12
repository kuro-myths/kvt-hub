<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'KVT Hub - Pusat Pembelajaran Digital')</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">

    {{-- Tailwind CSS via CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kvt': {
                            50: '#EBF5FF',
                            100: '#D6EBFF',
                            200: '#ADD6FF',
                            300: '#85C2FF',
                            400: '#5CADFF',
                            500: '#3399FF',
                            600: '#0A7AE6',
                            700: '#085CB3',
                            800: '#063D80',
                            900: '#041F4D',
                            950: '#021029',
                        },
                        'salju': {
                            50: '#F0F9FF',
                            100: '#E0F2FE',
                            200: '#BAE6FD',
                            300: '#7DD3FC',
                        }
                    },
                    animation: {
                        'salju': 'salju 10s linear infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'slide-up': 'slideUp 0.8s ease-out',
                        'slide-left': 'slideLeft 0.8s ease-out',
                        'slide-right': 'slideRight 0.8s ease-out',
                        'fade-in': 'fadeIn 1s ease-out',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        salju: {
                            '0%': { transform: 'translateY(-10vh) translateX(0)', opacity: '1' },
                            '100%': { transform: 'translateY(100vh) translateX(20px)', opacity: '0' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(60px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        slideLeft: {
                            '0%': { transform: 'translateX(60px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(-60px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>

    {{-- AOS - Animate On Scroll --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        * { font-family: 'Inter', sans-serif; }

        /* Salju Effect */
        .salju-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 50;
            overflow: hidden;
        }
        .kepingan-salju {
            position: absolute;
            top: -10px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1em;
            animation: jatuh linear infinite;
            text-shadow: 0 0 5px rgba(173, 214, 255, 0.5);
        }
        @keyframes jatuh {
            0% { transform: translateY(-10vh) rotate(0deg); opacity: 1; }
            100% { transform: translateY(105vh) rotate(360deg); opacity: 0; }
        }

        /* Scroll animations */
        .muncul-scroll {
            opacity: 0;
            transform: translateY(40px);
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .muncul-scroll.tampil {
            opacity: 1;
            transform: translateY(0);
        }

        /* Glass morphism */
        .kaca {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Gradient text */
        .teks-gradien {
            background: linear-gradient(135deg, #3399FF, #85C2FF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #041F4D; }
        ::-webkit-scrollbar-thumb { background: #3399FF; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #5CADFF; }
    </style>

    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen">

    {{-- Efek Salju --}}
    <div class="salju-container" id="salju"></div>

    {{-- Navigasi --}}
    <nav class="fixed top-0 w-full z-40 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="{{ route('beranda') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-lg flex items-center justify-center shadow-lg shadow-kvt-500/30">
                        <span class="text-white font-black text-lg">K</span>
                    </div>
                    <span class="text-xl font-bold">
                        <span class="text-white">KVT</span>
                        <span class="text-kvt-400">Hub</span>
                    </span>
                </a>

                {{-- Menu Desktop --}}
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('beranda') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium">Beranda</a>
                    @auth
                        <a href="{{ route('kelas.index') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium">Kelas</a>
                        <a href="{{ route('laporan.index') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium">Laporan</a>
                        <a href="{{ route('dasbor') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium">Dasbor</a>
                    @endauth
                    <a href="{{ route('tentang') }}" class="text-gray-300 hover:text-kvt-400 transition text-sm font-medium">Tentang</a>
                </div>

                {{-- Auth Buttons --}}
                <div class="flex items-center space-x-3">
                    @guest
                        <a href="{{ route('masuk') }}" class="text-sm text-gray-300 hover:text-white transition px-4 py-2">Masuk</a>
                        <a href="{{ route('daftar') }}" class="text-sm bg-kvt-500 hover:bg-kvt-600 text-white px-5 py-2 rounded-lg transition shadow-lg shadow-kvt-500/30">Daftar</a>
                    @else
                        <div class="flex items-center space-x-3">
                            {{-- XP Bar --}}
                            <div class="hidden lg:flex items-center space-x-2 bg-kvt-900/50 rounded-full px-3 py-1">
                                <span class="text-kvt-400 text-xs font-bold">Lv.{{ auth()->user()->level }}</span>
                                <div class="w-20 h-2 bg-kvt-800 rounded-full overflow-hidden">
                                    <div class="h-full bg-gradient-to-r from-kvt-400 to-kvt-300 rounded-full transition-all" style="width: {{ auth()->user()->persenLevel() }}%"></div>
                                </div>
                                <span class="text-kvt-300 text-xs">{{ auth()->user()->xp }} XP</span>
                            </div>

                            <div class="relative group">
                                <button class="flex items-center space-x-2 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg px-3 py-2 transition">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-sm font-bold">
                                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                    </div>
                                    <span class="text-sm text-gray-300 hidden sm:block">{{ auth()->user()->name }}</span>
                                </button>
                                <div class="absolute right-0 mt-2 w-48 bg-kvt-800 rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-kvt-700">
                                    <a href="{{ route('dasbor') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-kvt-700 rounded-t-lg">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dasbor
                                    </a>
                                    @if(auth()->user()->adalahAdmin())
                                        <a href="{{ route('admin.dasbor') }}" class="block px-4 py-2 text-sm text-yellow-400 hover:bg-kvt-700">
                                            <i class="fas fa-shield-alt mr-2"></i>Panel Admin
                                        </a>
                                    @endif
                                    <form method="POST" action="{{ route('keluar') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-400 hover:bg-kvt-700 rounded-b-lg">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endguest

                    {{-- Mobile Menu --}}
                    <button class="md:hidden text-gray-300 hover:text-white" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div id="mobileMenu" class="hidden md:hidden bg-kvt-900/95 backdrop-blur border-t border-kvt-800">
            <div class="px-4 py-3 space-y-2">
                <a href="{{ route('beranda') }}" class="block py-2 text-gray-300 hover:text-kvt-400">Beranda</a>
                @auth
                    <a href="{{ route('kelas.index') }}" class="block py-2 text-gray-300 hover:text-kvt-400">Kelas</a>
                    <a href="{{ route('dasbor') }}" class="block py-2 text-gray-300 hover:text-kvt-400">Dasbor</a>
                @endauth
                <a href="{{ route('tentang') }}" class="block py-2 text-gray-300 hover:text-kvt-400">Tentang</a>
            </div>
        </div>
    </nav>

    {{-- Flash Messages --}}
    @if(session('sukses'))
        <div class="fixed top-20 right-4 z-50 bg-green-500/90 text-white px-6 py-3 rounded-lg shadow-lg animate-slide-left" id="flashSukses">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
    @endif
    @if(session('error'))
        <div class="fixed top-20 right-4 z-50 bg-red-500/90 text-white px-6 py-3 rounded-lg shadow-lg animate-slide-left" id="flashError">
            <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
        </div>
    @endif

    {{-- Konten Utama --}}
    <main>
        @yield('konten')
    </main>

    {{-- Footer --}}
    <footer class="bg-kvt-950 border-t border-kvt-800 mt-20">
        <div class="max-w-7xl mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                {{-- Brand --}}
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-black text-lg">K</span>
                        </div>
                        <span class="text-xl font-bold"><span class="text-white">KVT</span> <span class="text-kvt-400">Hub</span></span>
                    </div>
                    <p class="text-gray-400 text-sm max-w-md">
                        Pusat teknologi dan pembelajaran digital KVT. Tempat semua project, coding, AI, dan desain berkumpul.
                    </p>
                    <div class="flex space-x-4 mt-4">
                        <a href="#" class="text-gray-400 hover:text-kvt-400 transition"><i class="fab fa-youtube text-xl"></i></a>
                        <a href="#" class="text-gray-400 hover:text-kvt-400 transition"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="text-gray-400 hover:text-kvt-400 transition"><i class="fab fa-github text-xl"></i></a>
                    </div>
                </div>

                {{-- Links --}}
                <div>
                    <h4 class="text-white font-semibold mb-4">Platform</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('beranda') }}" class="text-gray-400 hover:text-kvt-400 transition">Beranda</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-gray-400 hover:text-kvt-400 transition">Tentang</a></li>
                        <li><a href="{{ route('lisensi') }}" class="text-gray-400 hover:text-kvt-400 transition">Lisensi</a></li>
                        <li><a href="{{ route('sponsor') }}" class="text-gray-400 hover:text-kvt-400 transition">Sponsor</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-semibold mb-4">Legal</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('lisensi') }}" class="text-gray-400 hover:text-kvt-400 transition">Hak Cipta</a></li>
                        <li><a href="{{ route('kerja-sama') }}" class="text-gray-400 hover:text-kvt-400 transition">Kerja Sama</a></li>
                        <li><a href="{{ route('sponsor') }}" class="text-gray-400 hover:text-kvt-400 transition">Sponsorship</a></li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-kvt-800 mt-8 pt-8 text-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} KVT Hub. Seluruh hak dilindungi. Dibuat dengan <i class="fas fa-heart text-red-400"></i> oleh Tim KVT.</p>
            </div>
        </div>
    </footer>

    {{-- Scripts --}}
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100,
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-kvt-950/95', 'backdrop-blur-lg', 'shadow-lg', 'shadow-kvt-900/50');
            } else {
                navbar.classList.remove('bg-kvt-950/95', 'backdrop-blur-lg', 'shadow-lg', 'shadow-kvt-900/50');
            }
        });

        // Snow effect
        function buatSalju() {
            const container = document.getElementById('salju');
            const jumlah = 30;
            for (let i = 0; i < jumlah; i++) {
                setTimeout(() => {
                    const salju = document.createElement('div');
                    salju.className = 'kepingan-salju';
                    salju.innerHTML = '❄';
                    salju.style.left = Math.random() * 100 + '%';
                    salju.style.fontSize = (Math.random() * 10 + 5) + 'px';
                    salju.style.animationDuration = (Math.random() * 10 + 8) + 's';
                    salju.style.animationDelay = (Math.random() * 5) + 's';
                    salju.style.opacity = Math.random() * 0.6 + 0.2;
                    container.appendChild(salju);

                    salju.addEventListener('animationiteration', () => {
                        salju.style.left = Math.random() * 100 + '%';
                    });
                }, i * 200);
            }
        }
        buatSalju();

        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('tampil');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.muncul-scroll').forEach(el => observer.observe(el));

        // Auto-hide flash messages
        setTimeout(() => {
            ['flashSukses', 'flashError'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.style.display = 'none';
            });
        }, 5000);
    </script>

    @stack('scripts')
</body>
</html>
