<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('judul', 'KVT Hub - Global Education')</title>

    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'kvt': { 50:'#EBF5FF',100:'#D6EBFF',200:'#ADD6FF',300:'#85C2FF',400:'#5CADFF',500:'#3399FF',600:'#0A7AE6',700:'#085CB3',800:'#063D80',900:'#041F4D',950:'#021029' },
                        'ungu': { 400:'#A78BFA',500:'#8B5CF6',600:'#7C3AED',700:'#6D28D9' }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Plus Jakarta Sans', 'Inter', sans-serif; }
        ::-webkit-scrollbar { width:6px }
        ::-webkit-scrollbar-track { background:#021029 }
        ::-webkit-scrollbar-thumb { background:linear-gradient(180deg,#3399FF,#8B5CF6);border-radius:3px }
    </style>
    @stack('styles')
</head>
<body class="bg-kvt-950 text-white min-h-screen">

    {{-- Background decoration --}}
    <div class="fixed inset-0 overflow-hidden pointer-events-none">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-kvt-500/5 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-ungu-500/5 rounded-full blur-3xl"></div>
    </div>

    {{-- Back to home link --}}
    <div class="fixed top-6 left-6 z-50">
        <a href="{{ route('beranda') }}" class="flex items-center gap-2 text-gray-500 hover:text-kvt-400 transition text-sm group">
            <i class="fas fa-arrow-left group-hover:-translate-x-1 transition-transform"></i>
            <span class="hidden sm:inline">Kembali</span>
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('sukses'))
    <div class="fixed top-4 right-4 z-50 bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl text-sm animate-slide-up" id="flashSukses">
        <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
    </div>
    @endif
    @if(session('error'))
    <div class="fixed top-4 right-4 z-50 bg-red-500/20 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl text-sm animate-slide-up" id="flashError">
        <i class="fas fa-exclamation-circle mr-2"></i>{{ session('error') }}
    </div>
    @endif

    {{-- Main Content --}}
    <main class="relative z-10">
        @yield('konten')
    </main>

    <script>
        // Auto-dismiss flash messages
        setTimeout(() => {
            document.querySelectorAll('#flashSukses, #flashError').forEach(el => {
                el.style.transition = 'opacity 0.5s';
                el.style.opacity = '0';
                setTimeout(() => el.remove(), 500);
            });
        }, 4000);
    </script>
    @stack('scripts')
</body>
</html>
