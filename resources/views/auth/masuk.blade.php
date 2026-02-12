@extends('tata-letak.utama')

@section('judul', 'Masuk - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-md" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl backdrop-blur">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-sign-in-alt text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">Selamat Datang Kembali</h1>
                <p class="text-gray-400 text-sm mt-1">Masuk ke akun KVT Hub kamu</p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('masuk') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="email@contoh.com">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Kata Sandi</label>
                    <input type="password" name="password" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="ingat" class="rounded border-kvt-600 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                        <span class="text-sm text-gray-400">Ingat saya</span>
                    </label>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/30">
                    Masuk
                </button>
            </form>

            {{-- OAuth --}}
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-kvt-700/50"></div></div>
                    <div class="relative flex justify-center text-sm"><span class="px-4 bg-kvt-900 text-gray-500">atau masuk dengan</span></div>
                </div>

                <div class="mt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('auth.google') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-google text-red-400"></i>
                        <span class="text-sm text-gray-300">Google</span>
                    </a>
                    <a href="{{ route('auth.github') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-github text-gray-300"></i>
                        <span class="text-sm text-gray-300">GitHub</span>
                    </a>
                </div>
            </div>

            <div class="mt-6 text-center text-sm">
                <span class="text-gray-500">Belum punya akun?</span>
                <a href="{{ route('daftar') }}" class="text-kvt-400 hover:text-kvt-300 font-medium ml-1">Daftar Sekarang</a>
            </div>

            <div class="mt-3 text-center">
                <a href="{{ route('masuk.admin') }}" class="text-gray-600 hover:text-gray-400 text-xs transition">
                    <i class="fas fa-shield-alt mr-1"></i>Masuk sebagai Admin
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
