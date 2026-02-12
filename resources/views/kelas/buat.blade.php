@extends('tata-letak.utama')
@section('judul', 'Buat Kelas Baru - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <h1 class="text-2xl font-black text-white mb-6"><i class="fas fa-plus-circle text-kvt-400 mr-2"></i>Buat Kelas Baru</h1>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('kelas.simpan') }}" class="space-y-5">
                @csrf
                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Nama Kelas</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" required class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Contoh: Pemrograman Web Dasar">
                </div>
                <div>
                    <label class="text-sm text-gray-300 font-medium mb-1 block">Deskripsi</label>
                    <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Jelaskan tentang kelas ini...">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Kategori</label>
                        <input type="text" name="kategori" value="{{ old('kategori') }}" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition" placeholder="Web, Mobile, AI...">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Maks Siswa</label>
                        <input type="number" name="maks_siswa" value="{{ old('maks_siswa', 50) }}" min="1" max="500" class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-kvt-500 transition">
                    </div>
                </div>
                <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg">
                    <i class="fas fa-save mr-2"></i>Buat Kelas
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
