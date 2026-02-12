@extends('tata-letak.utama')

@section('judul', 'Masuk Admin - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-md" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-yellow-500/30 rounded-2xl p-8 shadow-2xl backdrop-blur">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-amber-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-shield-alt text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">Panel Admin</h1>
                <p class="text-gray-400 text-sm mt-1">Masuk dengan kunci khusus admin</p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('masuk.admin') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Email Admin</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition"
                        placeholder="admin@kvthub.com">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Kata Sandi</label>
                    <input type="password" name="password" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition"
                        placeholder="••••••••">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">
                        <i class="fas fa-key text-yellow-400 mr-1"></i>Kunci Admin
                    </label>
                    <input type="text" name="kunci_admin" required
                        class="w-full bg-kvt-800/50 border border-yellow-500/30 rounded-xl px-4 py-3 text-yellow-400 placeholder-gray-500 focus:outline-none focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 transition font-mono tracking-wider"
                        placeholder="XXXX-XXXX-XXXX-XXXX">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-400 hover:to-amber-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-yellow-500/30">
                    <i class="fas fa-lock-open mr-2"></i>Masuk Admin
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('masuk') }}" class="text-gray-500 hover:text-gray-300 text-sm transition">
                    <i class="fas fa-arrow-left mr-1"></i>Kembali ke halaman masuk biasa
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
