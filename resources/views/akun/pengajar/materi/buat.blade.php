@extends('tata-letak.dasbor')

@section('judul', 'Buat Materi Baru - KVT Hub')
@section('judul-halaman', 'Buat Materi')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="mb-6" data-aos="fade-up">
            <a href="{{ route('pengajar.materi.index') }}" class="text-gray-400 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali ke Daftar Materi
            </a>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
            <h1 class="text-2xl font-black text-white mb-6"><i class="fas fa-file-medical text-purple-400 mr-3"></i>Buat Materi Baru</h1>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-circle mr-2"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('pengajar.materi.simpan') }}" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Judul Materi <span class="text-red-400">*</span></label>
                    <input type="text" name="judul" value="{{ old('judul') }}" required
                           class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition"
                           placeholder="Contoh: Pengantar Aljabar Linear">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Kelas <span class="text-red-400">*</span></label>
                    <select name="kelas_id" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $kls)
                            <option value="{{ $kls->id }}" {{ old('kelas_id') == $kls->id ? 'selected' : '' }}>{{ $kls->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-300 mb-2">Konten <span class="text-red-400">*</span></label>
                    <textarea name="konten" rows="10" required
                              class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500 transition"
                              placeholder="Tulis konten materi di sini...">{{ old('konten') }}</textarea>
                </div>
                <div class="flex gap-3">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-purple-500 to-purple-600 text-white py-3 rounded-xl font-semibold hover:from-purple-400 hover:to-purple-500 transition shadow-lg">
                        <i class="fas fa-save mr-2"></i>Simpan Draf
                    </button>
                    <button type="submit" name="terbitkan" value="1" class="flex-1 bg-gradient-to-r from-green-500 to-green-600 text-white py-3 rounded-xl font-semibold hover:from-green-400 hover:to-green-500 transition shadow-lg">
                        <i class="fas fa-paper-plane mr-2"></i>Terbitkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
