@extends('tata-letak.utama')
@section('judul', isset($kerjaSama) ? 'Edit Mitra - KVT Hub' : 'Tambah Mitra - KVT Hub')

@section('konten')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex items-center gap-3 mb-6">
        <a href="{{ route('admin.kerja-sama.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
        <h1 class="text-2xl font-bold text-white">{{ isset($kerjaSama) ? 'Edit Mitra' : 'Tambah Mitra Baru' }}</h1>
    </div>

    @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
            @foreach($errors->all() as $error)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $error }}</p>@endforeach
        </div>
    @endif

    <form method="POST" action="{{ isset($kerjaSama) ? route('admin.kerja-sama.update', $kerjaSama) : route('admin.kerja-sama.simpan') }}" enctype="multipart/form-data" class="kaca-gelap rounded-2xl p-6 space-y-5">
        @csrf
        @if(isset($kerjaSama)) @method('PUT') @endif

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Nama Mitra <span class="text-red-400">*</span></label>
            <input type="text" name="nama" value="{{ old('nama', $kerjaSama->nama ?? '') }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 transition" required>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Tipe</label>
                <select name="tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
                    @foreach(App\Models\KerjaSama::tipeList() as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe', $kerjaSama->tipe ?? 'sponsor') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Tier</label>
                <select name="tier" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
                    @foreach(App\Models\KerjaSama::tierList() as $key => $label)
                        <option value="{{ $key }}" {{ old('tier', $kerjaSama->tier ?? 'silver') == $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 resize-none">{{ old('deskripsi', $kerjaSama->deskripsi ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Website</label>
                <input type="url" name="website" value="{{ old('website', $kerjaSama->website ?? '') }}" placeholder="https://..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Logo</label>
                @if(isset($kerjaSama) && $kerjaSama->logo)
                    <div class="mb-2"><img src="{{ asset('storage/' . $kerjaSama->logo) }}" class="h-12 rounded-lg bg-white/5 p-1" alt="Logo"></div>
                @endif
                <input type="file" name="logo" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-400 file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:bg-kvt-600 file:text-white file:text-xs file:cursor-pointer">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Mulai</label>
                <input type="date" name="mulai_pada" value="{{ old('mulai_pada', isset($kerjaSama) && $kerjaSama->mulai_pada ? $kerjaSama->mulai_pada->format('Y-m-d') : '') }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Berakhir</label>
                <input type="date" name="berakhir_pada" value="{{ old('berakhir_pada', isset($kerjaSama) && $kerjaSama->berakhir_pada ? $kerjaSama->berakhir_pada->format('Y-m-d') : '') }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-1">Urutan</label>
                <input type="number" name="urutan" value="{{ old('urutan', $kerjaSama->urutan ?? 0) }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Benefit / Keuntungan</label>
            <textarea name="benefit" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm outline-none focus:border-kvt-500 resize-none">{{ old('benefit', $kerjaSama->benefit ?? '') }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <label class="flex items-center gap-3 cursor-pointer bg-kvt-800/30 rounded-lg px-4 py-3 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <input type="checkbox" name="aktif" value="1" {{ old('aktif', $kerjaSama->aktif ?? true) ? 'checked' : '' }} class="w-4 h-4 bg-kvt-800 border-kvt-600 rounded text-kvt-500 focus:ring-kvt-500">
                <div><span class="text-sm text-white font-medium">Aktif</span><span class="block text-[10px] text-gray-500">Tampilkan mitra di halaman publik</span></div>
            </label>
            <label class="flex items-center gap-3 cursor-pointer bg-kvt-800/30 rounded-lg px-4 py-3 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <input type="checkbox" name="tampil_beranda" value="1" {{ old('tampil_beranda', $kerjaSama->tampil_beranda ?? false) ? 'checked' : '' }} class="w-4 h-4 bg-kvt-800 border-kvt-600 rounded text-kvt-500 focus:ring-kvt-500">
                <div><span class="text-sm text-white font-medium">Tampil di Beranda</span><span class="block text-[10px] text-gray-500">Tampilkan logo di halaman utama</span></div>
            </label>
        </div>

        <div class="flex items-center justify-end gap-3 pt-4 border-t border-kvt-700/30">
            <a href="{{ route('admin.kerja-sama.index') }}" class="text-sm text-gray-400 hover:text-white transition px-4 py-2">Batal</a>
            <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-save mr-1"></i> {{ isset($kerjaSama) ? 'Perbarui' : 'Simpan' }}
            </button>
        </div>
    </form>
</div>
@endsection
