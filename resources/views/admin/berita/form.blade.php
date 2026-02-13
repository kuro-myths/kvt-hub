@extends('tata-letak.utama')
@section('judul', isset($berita) ? 'Edit Berita - KVT Hub' : 'Tambah Berita - KVT Hub')

@section('konten')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.berita.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
        <h1 class="text-2xl font-bold text-white">{{ isset($berita) ? 'Edit Berita' : 'Tambah Berita Baru' }}</h1>
    </div>

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
            @foreach($errors->all() as $error)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}</p>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ isset($berita) ? route('admin.berita.update', $berita) : route('admin.berita.simpan') }}" enctype="multipart/form-data" class="kaca-gelap rounded-2xl p-6 space-y-5">
        @csrf
        @if(isset($berita)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Judul <span class="text-red-400">*</span></label>
            <input type="text" name="judul" value="{{ old('judul', $berita->judul ?? '') }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 transition" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Kategori</label>
                <select name="kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
                    @foreach(App\Models\Berita::kategoriList() as $key => $label)
                        <option value="{{ $key }}" {{ old('kategori', $berita->kategori ?? 'umum') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Status</label>
                <select name="status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
                    <option value="draft" {{ old('status', $berita->status ?? 'draft') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="terbit" {{ old('status', $berita->status ?? '') == 'terbit' ? 'selected' : '' }}>Terbit</option>
                    <option value="arsip" {{ old('status', $berita->status ?? '') == 'arsip' ? 'selected' : '' }}>Arsip</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Tanggal Terbit</label>
                <input type="datetime-local" name="terbit_pada" value="{{ old('terbit_pada', isset($berita) && $berita->terbit_pada ? $berita->terbit_pada->format('Y-m-d\TH:i') : now()->format('Y-m-d\TH:i')) }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Ringkasan</label>
            <textarea name="ringkasan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 resize-none" placeholder="Ringkasan singkat untuk preview...">{{ old('ringkasan', $berita->ringkasan ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Konten <span class="text-red-400">*</span></label>
            <textarea name="konten" rows="12" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 resize-y font-mono" required>{{ old('konten', $berita->konten ?? '') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Gambar</label>
            @if(isset($berita) && $berita->gambar)
                <div class="mb-2"><img src="{{ asset('storage/' . $berita->gambar) }}" class="h-20 rounded-lg" alt="Preview"></div>
            @endif
            <input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-kvt-600 file:text-white file:text-xs file:cursor-pointer">
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <label class="flex items-center gap-3 cursor-pointer bg-kvt-800/30 rounded-lg px-4 py-3 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <input type="checkbox" name="tampil_ticker" value="1" {{ old('tampil_ticker', $berita->tampil_ticker ?? false) ? 'checked' : '' }} class="w-4 h-4 bg-kvt-800 border-kvt-600 rounded text-kvt-500 focus:ring-kvt-500">
                <div><span class="text-sm text-white font-medium">Tampil Ticker</span><span class="block text-[10px] text-gray-500">Tampilkan di news ticker header</span></div>
            </label>
            <label class="flex items-center gap-3 cursor-pointer bg-kvt-800/30 rounded-lg px-4 py-3 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <input type="checkbox" name="tampil_popup" value="1" {{ old('tampil_popup', $berita->tampil_popup ?? false) ? 'checked' : '' }} class="w-4 h-4 bg-kvt-800 border-kvt-600 rounded text-kvt-500 focus:ring-kvt-500">
                <div><span class="text-sm text-white font-medium">Tampil Popup</span><span class="block text-[10px] text-gray-500">Tampilkan di popup berita terbaru</span></div>
            </label>
            <label class="flex items-center gap-3 cursor-pointer bg-kvt-800/30 rounded-lg px-4 py-3 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <input type="checkbox" name="unggulan" value="1" {{ old('unggulan', $berita->unggulan ?? false) ? 'checked' : '' }} class="w-4 h-4 bg-kvt-800 border-kvt-600 rounded text-kvt-500 focus:ring-kvt-500">
                <div><span class="text-sm text-white font-medium">Unggulan</span><span class="block text-[10px] text-gray-500">Tandai sebagai berita unggulan</span></div>
            </label>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-kvt-700/30">
            <a href="{{ route('admin.berita.index') }}" class="text-sm text-gray-400 hover:text-white transition px-4 py-2">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-save mr-1"></i> {{ isset($berita) ? 'Perbarui' : 'Simpan' }} Berita
            </button>
        </div>
    </form>
</div>
@endsection
