@extends('tata-letak.utama')
@section('judul', 'Generate Laporan - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.laporan-akademik.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <h1 class="text-xl font-bold text-white">Generate Laporan Akademik</h1>
        </div>

        @if($errors->any())
        <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <ul class="list-disc list-inside">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
        @endif

        <form action="{{ route('admin.laporan-akademik.generate') }}" method="POST" class="kaca rounded-xl p-6 border border-kvt-700/20 space-y-5">
            @csrf

            <div>
                <label class="text-sm text-gray-400 block mb-1">Judul Laporan *</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required placeholder="Rekap Nilai Semester Ganjil 2025/2026"
                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 focus:ring-kvt-500/30 placeholder-gray-600">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Tipe Laporan *</label>
                    <select name="tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                        @foreach($tipeList as $key => $label)
                        <option value="{{ $key }}" {{ old('tipe') == $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="text-sm text-gray-400 block mb-1">Format *</label>
                    <select name="format" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                        <option value="csv">CSV (Spreadsheet)</option>
                        <option value="excel">Excel</option>
                        <option value="pdf">PDF</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Kurikulum (opsional)</label>
                <select name="kurikulum_id" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500">
                    <option value="">Semua Kurikulum</option>
                    @foreach($kurikulumList as $k)
                    <option value="{{ $k->id }}" {{ old('kurikulum_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="text-sm text-gray-400 block mb-1">Deskripsi (opsional)</label>
                <textarea name="deskripsi" rows="3" placeholder="Catatan tambahan untuk laporan ini..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-white text-sm focus:border-kvt-500 resize-none placeholder-gray-600">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-2">
                <a href="{{ route('admin.laporan-akademik.index') }}" class="bg-kvt-800/50 text-gray-300 px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">Batal</a>
                <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg">
                    <i class="fas fa-cogs mr-1"></i>Generate Laporan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
