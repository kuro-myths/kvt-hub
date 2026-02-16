@extends('tata-letak.auth')

@section('judul', 'Status Verifikasi - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-md" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl backdrop-blur text-center">

            @if($user->status_verifikasi === 'pending')
                {{-- PENDING --}}
                <div class="w-20 h-20 bg-yellow-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-hourglass-half text-3xl text-yellow-400 animate-pulse"></i>
                </div>
                <h1 class="text-2xl font-black text-white mb-2">Menunggu Verifikasi</h1>
                <p class="text-gray-400 text-sm mb-6">
                    Akun Anda telah berhasil dibuat. Admin sedang meninjau dokumen yang Anda kirimkan.
                    Proses verifikasi biasanya memerlukan waktu 1-3 hari kerja.
                </p>

                <div class="bg-kvt-800/50 border border-kvt-700/30 rounded-xl p-4 text-left space-y-3 mb-6">
                    <div class="flex items-center gap-3">
                        <i class="fas fa-user text-kvt-400 w-5"></i>
                        <div>
                            <p class="text-xs text-gray-500">Nama</p>
                            <p class="text-sm text-white font-medium">{{ $user->name }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-envelope text-kvt-400 w-5"></i>
                        <div>
                            <p class="text-xs text-gray-500">Email</p>
                            <p class="text-sm text-white font-medium">{{ $user->email }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-id-badge text-kvt-400 w-5"></i>
                        <div>
                            <p class="text-xs text-gray-500">Peran</p>
                            <p class="text-sm text-white font-medium capitalize">{{ str_replace('_', ' ', $user->peran) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="fas fa-clock text-yellow-400 w-5"></i>
                        <div>
                            <p class="text-xs text-gray-500">Status</p>
                            <p class="text-sm text-yellow-400 font-medium">Menunggu Verifikasi</p>
                        </div>
                    </div>
                </div>

            @elseif($user->status_verifikasi === 'ditolak')
                {{-- DITOLAK --}}
                <div class="w-20 h-20 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-times-circle text-3xl text-red-400"></i>
                </div>
                <h1 class="text-2xl font-black text-white mb-2">Verifikasi Ditolak</h1>
                <p class="text-gray-400 text-sm mb-4">
                    Maaf, admin tidak dapat memverifikasi akun Anda.
                </p>

                @if($user->catatan_verifikasi)
                    <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-left mb-6">
                        <p class="text-xs text-red-400 font-semibold mb-1"><i class="fas fa-comment-alt mr-1"></i>Catatan Admin:</p>
                        <p class="text-sm text-gray-300">{{ $user->catatan_verifikasi }}</p>
                    </div>
                @endif

                <p class="text-xs text-gray-500 mb-6">
                    Silakan hubungi admin atau daftar ulang dengan dokumen yang benar.
                </p>

            @else
                {{-- TERVERIFIKASI --}}
                <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-check-circle text-3xl text-green-400"></i>
                </div>
                <h1 class="text-2xl font-black text-white mb-2">Akun Terverifikasi!</h1>
                <p class="text-gray-400 text-sm mb-6">
                    Selamat! Akun Anda telah diverifikasi. Anda sekarang dapat mengakses semua fitur.
                </p>
                <a href="{{ route('dasbor') }}" class="inline-block bg-gradient-to-r from-green-500 to-green-600 hover:from-green-400 hover:to-green-500 text-white py-3 px-8 rounded-xl font-semibold transition shadow-lg shadow-green-500/30">
                    <i class="fas fa-arrow-right mr-2"></i>Masuk ke Dashboard
                </a>
            @endif

            <div class="mt-6">
                <form method="POST" action="{{ route('keluar') }}">
                    @csrf
                    <button type="submit" class="text-gray-500 hover:text-gray-300 text-sm transition">
                        <i class="fas fa-sign-out-alt mr-1"></i>Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
