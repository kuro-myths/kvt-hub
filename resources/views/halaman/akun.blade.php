@extends('tata-letak.utama')
@section('judul', 'Akun Saya - KVT Hub')
@section('konten')

<section class="pt-24 pb-12 px-4">
    <div class="max-w-2xl mx-auto">
        @auth
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 mb-6" data-aos="fade-up">
            <div class="flex items-center gap-6 mb-8">
                <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-3xl font-black text-white shadow-lg">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <h1 class="text-2xl font-black text-white">{{ auth()->user()->name }}</h1>
                    <p class="text-gray-400 text-sm">{{ auth()->user()->email }}</p>
                    <div class="flex items-center gap-3 mt-2">
                        <span class="bg-kvt-500/20 text-kvt-400 text-xs px-3 py-1 rounded-full font-semibold">{{ ucfirst(auth()->user()->peran) }}</span>
                        @if(auth()->user()->level)
                        <span class="bg-amber-500/20 text-amber-400 text-xs px-3 py-1 rounded-full font-semibold">Lv.{{ auth()->user()->level }} &middot; {{ auth()->user()->xp }} XP</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="space-y-4">
                <div class="flex items-center justify-between py-3 border-b border-kvt-700/30">
                    <span class="text-gray-400 text-sm">Nama Lengkap</span>
                    <span class="text-white font-semibold">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex items-center justify-between py-3 border-b border-kvt-700/30">
                    <span class="text-gray-400 text-sm">Email</span>
                    <span class="text-white font-semibold">{{ auth()->user()->email }}</span>
                </div>
                <div class="flex items-center justify-between py-3 border-b border-kvt-700/30">
                    <span class="text-gray-400 text-sm">Peran</span>
                    <span class="text-white font-semibold">{{ ucfirst(auth()->user()->peran) }}</span>
                </div>
                <div class="flex items-center justify-between py-3 border-b border-kvt-700/30">
                    <span class="text-gray-400 text-sm">Bergabung Sejak</span>
                    <span class="text-white font-semibold">{{ auth()->user()->created_at->format('d M Y') }}</span>
                </div>
                @if(auth()->user()->rank_title)
                <div class="flex items-center justify-between py-3">
                    <span class="text-gray-400 text-sm">Rank</span>
                    <span class="text-white font-semibold">{{ auth()->user()->rank_title }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('dasbor') }}" class="flex-1 text-center bg-gradient-to-r from-kvt-500 to-kvt-600 text-white py-3 rounded-xl font-semibold hover:from-kvt-400 hover:to-kvt-500 transition shadow-lg">
                <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
            </a>
            <form method="POST" action="{{ route('keluar') }}" class="flex-1">
                @csrf
                <button type="submit" class="w-full py-3 border border-red-500/30 text-red-400 rounded-xl font-semibold hover:bg-red-500/10 transition">
                    <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                </button>
            </form>
        </div>
        @else
        <div class="kaca rounded-2xl p-12 text-center border-kvt-500/20" data-aos="zoom-in">
            <i class="fas fa-user-circle text-6xl text-gray-700 mb-4"></i>
            <h2 class="text-2xl font-bold text-white mb-3">Belum Login</h2>
            <p class="text-gray-400 mb-6">Silakan masuk untuk melihat informasi akun Anda.</p>
            <a href="{{ route('masuk') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-8 py-3 rounded-xl font-semibold hover:from-kvt-400 transition shadow-lg inline-block">
                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
            </a>
        </div>
        @endauth
    </div>
</section>
@endsection
