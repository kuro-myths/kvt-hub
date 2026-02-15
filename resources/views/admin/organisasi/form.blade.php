@extends('tata-letak.utama')
@section('judul', isset($organisasi) ? 'Edit Organisasi' : 'Tambah Organisasi')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.organisasi.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <h1 class="text-xl font-bold text-white">{{ isset($organisasi) ? 'Edit' : 'Tambah' }} Organisasi</h1>
        </div>

        @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <ul class="list-disc list-inside">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ isset($organisasi) ? route('admin.organisasi.update', $organisasi) : route('admin.organisasi.simpan') }}"
              method="POST" class="kaca rounded-xl p-6 border border-kvt-700/20 space-y-5">
            @csrf
            @if(isset($organisasi)) @method('PUT') @endif

            <div>
                <label class="text-sm text-gray-400 block mb-1">Nama Organisasi *</label>
                <input type="text" name="nama" value="{{ old('nama', $organisasi->nama ?? '') }}" required
                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 focus:ring-kvt-500/30">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Singkatan</label>
                    <input type="text" name="singkatan" value="{{ old('singkatan', $organisasi->singkatan ?? '') }}" maxlength="20"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Website</label>
                    <input type="url" name="website" value="{{ old('website', $organisasi->website ?? '') }}"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Tipe *</label>
                    <select name="tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                        @foreach($tipeList as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe', $organisasi->tipe ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Kategori *</label>
                    <select name="kategori" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                        @foreach($kategoriList as $key => $label)
                        <option value="{{ $key }}" {{ old('kategori', $organisasi->kategori ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 resize-none">{{ old('deskripsi', $organisasi->deskripsi ?? '') }}</textarea>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Logo URL</label>
                <input type="url" name="logo" value="{{ old('logo', $organisasi->logo ?? '') }}"
                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
            </div>

            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="unggulan" value="1" {{ old('unggulan', $organisasi->unggulan ?? false) ? 'checked' : '' }}
                        class="rounded border-kvt-600 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                    Organisasi Unggulan
                </label>
                <label class="flex items-center gap-2 text-sm text-gray-300 cursor-pointer">
                    <input type="checkbox" name="aktif" value="1" {{ old('aktif', $organisasi->aktif ?? true) ? 'checked' : '' }}
                        class="rounded border-kvt-600 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                    Aktif
                </label>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.organisasi.index') }}" class="bg-kvt-800/50 text-gray-300 px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">Batal</a>
                <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg">
                    <i class="fas fa-save mr-1"></i>{{ isset($organisasi) ? 'Perbarui' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
