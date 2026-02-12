@extends('tata-letak.utama')
@section('judul', 'Buat Laporan - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-3xl mx-auto">
        <div class="flex items-center gap-4 mb-8" data-aos="fade-right">
            <div class="w-12 h-12 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center">
                <i class="fas fa-chart-bar text-xl text-white"></i>
            </div>
            <div>
                <h1 class="text-2xl font-black text-white">Buat Laporan Baru</h1>
                <p class="text-gray-400 text-sm">Buat visualisasi data dengan berbagai jenis diagram</p>
            </div>
        </div>

        <form method="POST" action="{{ route('laporan.simpan') }}" class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 space-y-6" data-aos="fade-up">
            @csrf

            <div>
                <label class="text-gray-300 font-medium text-sm mb-2 block">Judul Laporan</label>
                <input type="text" name="judul" value="{{ old('judul') }}" required class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-kvt-500/50 transition placeholder-gray-500" placeholder="Statistik Pembelajaran Semester 1">
                @error('judul') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="text-gray-300 font-medium text-sm mb-2 block">Tipe Diagram</label>
                <select name="tipe_diagram" required class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-kvt-500/50 transition">
                    <option value="">Pilih tipe diagram...</option>
                    @php $tipeDiagram = \App\Models\Laporan::tipeDiagram(); @endphp
                    @foreach($tipeDiagram as $tipe)
                        <option value="{{ $tipe }}" {{ old('tipe_diagram') == $tipe ? 'selected' : '' }}>{{ $tipe }}</option>
                    @endforeach
                </select>
                @error('tipe_diagram') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="text-gray-300 font-medium text-sm mb-2 block">Deskripsi</label>
                <textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-kvt-500/50 transition placeholder-gray-500 resize-none" placeholder="Deskripsi laporan...">{{ old('deskripsi') }}</textarea>
            </div>

            <div>
                <label class="text-gray-300 font-medium text-sm mb-2 block">Data (JSON)</label>
                <textarea name="data_json" rows="8" required class="w-full bg-kvt-800/50 border border-kvt-700/30 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-kvt-500/50 transition placeholder-gray-500 resize-none font-mono text-sm" placeholder='{
    "labels": ["Jan", "Feb", "Mar", "Apr", "Mei"],
    "datasets": [{
        "label": "Siswa Aktif",
        "data": [120, 150, 180, 170, 200]
    }]
}'>{{ old('data_json') }}</textarea>
                @error('data_json') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                <p class="text-gray-600 text-xs mt-1"><i class="fas fa-info-circle mr-1"></i>Format JSON sesuai dengan Chart.js data structure.</p>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('laporan.index') }}" class="bg-kvt-700/50 hover:bg-kvt-600/50 text-white px-6 py-3 rounded-xl font-bold transition">
                    <i class="fas fa-arrow-left mr-2"></i>Batal
                </a>
                <button type="submit" class="flex-1 bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-bold transition shadow-lg">
                    <i class="fas fa-save mr-2"></i>Simpan Laporan
                </button>
            </div>
        </form>
    </div>
</section>
@endsection
