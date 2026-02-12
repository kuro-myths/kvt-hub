@extends('tata-letak.utama')

@section('judul', 'Daftar - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-md" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl backdrop-blur">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-user-plus text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">Buat Akun Baru</h1>
                <p class="text-gray-400 text-sm mt-1">Mulai petualangan belajarmu sekarang</p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('daftar') }}" class="space-y-5">
                @csrf

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="Nama lengkap kamu">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="email@contoh.com">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Daftar Sebagai</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="peran" value="siswa" class="hidden peer" checked>
                            <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                <i class="fas fa-user-graduate text-2xl text-kvt-400 mb-1"></i>
                                <div class="text-sm font-medium text-white">Siswa</div>
                                <div class="text-xs text-gray-500">Pelajar & Murid</div>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="peran" value="guru" class="hidden peer">
                            <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                <i class="fas fa-chalkboard-teacher text-2xl text-green-400 mb-1"></i>
                                <div class="text-sm font-medium text-white">Guru</div>
                                <div class="text-xs text-gray-500">Pengajar & Mentor</div>
                            </div>
                        </label>
                    </div>
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Kata Sandi</label>
                    <input type="password" name="password" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="Minimal 8 karakter">
                </div>

                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Konfirmasi Kata Sandi</label>
                    <input type="password" name="password_confirmation" required
                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                        placeholder="Ulangi kata sandi">
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/30">
                    <i class="fas fa-rocket mr-2"></i>Mulai Petualangan
                </button>
            </form>

            {{-- OAuth --}}
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-kvt-700/50"></div></div>
                    <div class="relative flex justify-center text-sm"><span class="px-4 bg-kvt-900 text-gray-500">atau daftar dengan</span></div>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('auth.google') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-google text-red-400"></i><span class="text-sm text-gray-300">Google</span>
                    </a>
                    <a href="{{ route('auth.github') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-github text-gray-300"></i><span class="text-sm text-gray-300">GitHub</span>
                    </a>
                </div>
            </div>

            <div class="mt-6 text-center text-sm">
                <span class="text-gray-500">Sudah punya akun?</span>
                <a href="{{ route('masuk') }}" class="text-kvt-400 hover:text-kvt-300 font-medium ml-1">Masuk</a>
            </div>
        </div>
    </div>
</section>
@endsection
