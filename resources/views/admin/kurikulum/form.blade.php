@extends('tata-letak.utama')
@section('judul', isset($kurikulum) ? 'Edit Kurikulum' : 'Tambah Kurikulum')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.kurikulum.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <h1 class="text-xl font-bold text-white">{{ isset($kurikulum) ? 'Edit' : 'Tambah' }} Kurikulum</h1>
        </div>

        @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <ul class="list-disc list-inside">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ isset($kurikulum) ? route('admin.kurikulum.update', $kurikulum) : route('admin.kurikulum.simpan') }}"
              method="POST" class="kaca rounded-xl p-6 border border-kvt-700/20 space-y-5">
            @csrf
            @if(isset($kurikulum)) @method('PUT') @endif

            <div>
                <label class="text-sm text-gray-400 block mb-1">Nama Kurikulum *</label>
                <input type="text" name="nama" value="{{ old('nama', $kurikulum->nama ?? '') }}" required
                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 focus:ring-kvt-500/30">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Jenjang *</label>
                    <select name="jenjang" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                        <option value="">-- Pilih Jenjang --</option>
                        @foreach($jenjangList as $key => $label)
                        <option value="{{ $key }}" {{ old('jenjang', $kurikulum->jenjang ?? '') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Durasi (tahun) *</label>
                    <input type="number" name="durasi_tahun" value="{{ old('durasi_tahun', $kurikulum->durasi_tahun ?? 4) }}" required min="1" max="10"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Total Semester</label>
                    <input type="number" name="total_semester" value="{{ old('total_semester', $kurikulum->total_semester ?? '') }}"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Total SKS</label>
                    <input type="number" name="total_sks" value="{{ old('total_sks', $kurikulum->total_sks ?? '') }}"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Akreditasi</label>
                    <input type="text" name="akreditasi" value="{{ old('akreditasi', $kurikulum->akreditasi ?? '') }}" maxlength="10"
                        class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 resize-none">{{ old('deskripsi', $kurikulum->deskripsi ?? '') }}</textarea>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Status</label>
                <select name="status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                    <option value="aktif" {{ old('status', $kurikulum->status ?? 'aktif') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ old('status', $kurikulum->status ?? '') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    <option value="draft" {{ old('status', $kurikulum->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.kurikulum.index') }}" class="bg-kvt-800/50 text-gray-300 px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">Batal</a>
                <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg">
                    <i class="fas fa-save mr-1"></i>{{ isset($kurikulum) ? 'Perbarui' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
