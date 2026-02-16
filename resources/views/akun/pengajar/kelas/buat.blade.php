@extends('tata-letak.dasbor')

@section('judul', 'Buat Kelas Baru - KVT Hub')
@section('judul-halaman', 'Buat Kelas')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6" data-aos="fade-up">
            <a href="{{ route('pengajar.kelas.index') }}" class="text-gray-400 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Kelas
            </a>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <h1 class="text-2xl font-black text-white mb-6"><i class="fas fa-plus-circle text-kvt-400 mr-3"></i>Buat Kelas Baru</h1>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('pengajar.kelas.simpan') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Nama Kelas <span class="text-red-400">*</span></label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required
                           class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition"
                           placeholder="Contoh: Matematika Dasar Kelas 10">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Kategori</label>
                    <input type="text" name="kategori" value="{{ old('kategori') }}"
                           class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition"
                           placeholder="Contoh: Matematika, Sains, Bahasa">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4"
                              class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition"
                              placeholder="Deskripsi singkat tentang kelas ini...">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-kvt-500 to-kvt-600 text-white py-3 rounded-xl font-semibold hover:from-kvt-400 hover:to-kvt-500 transition shadow-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Kelas
                    </button>
                    <a href="{{ route('pengajar.kelas.index') }}" class="px-6 py-3 border border-kvt-700/30 text-gray-400 rounded-xl hover:text-white hover:border-kvt-500/30 transition font-semibold">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
