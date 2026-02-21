@php $p = $prefix ?? ''; @endphp

<div class="space-y-4">
    <div>
        <label class="block text-sm text-gray-400 mb-2">Judul Aturan <span class="text-red-400">*</span></label>
        <input type="text" name="judul" id="{{ $p }}judul" required
               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition"
               placeholder="Contoh: Dilarang membuat banyak akun education">
    </div>

    <div>
        <label class="block text-sm text-gray-400 mb-2">Deskripsi Lengkap <span class="text-red-400">*</span></label>
        <textarea name="deskripsi" id="{{ $p }}deskripsi" rows="4" required
                  class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 resize-none transition"
                  placeholder="Jelaskan detail aturan, konsekuensi, dan solusi yang aman..."></textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-gray-400 mb-2">Tipe <span class="text-red-400">*</span></label>
            <select name="tipe" id="{{ $p }}tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white outline-none focus:border-kvt-500">
                <option value="larangan" class="bg-kvt-900">🚫 Larangan</option>
                <option value="peringatan" class="bg-kvt-900">⚠️ Peringatan</option>
                <option value="tips" class="bg-kvt-900">💡 Tips & Solusi</option>
                <option value="prosedur" class="bg-kvt-900">🛡️ Prosedur Aman</option>
            </select>
        </div>
        <div>
            <label class="block text-sm text-gray-400 mb-2">Tingkat Keparahan <span class="text-red-400">*</span></label>
            <select name="tingkat" id="{{ $p }}tingkat" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white outline-none focus:border-kvt-500">
                <option value="rendah" class="bg-kvt-900">Rendah</option>
                <option value="sedang" class="bg-kvt-900" selected>Sedang</option>
                <option value="tinggi" class="bg-kvt-900">Tinggi</option>
                <option value="kritis" class="bg-kvt-900">Kritis</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm text-gray-400 mb-2">Ikon (Font Awesome)</label>
            <input type="text" name="ikon" id="{{ $p }}ikon"
                   class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition"
                   placeholder="fas fa-ban">
        </div>
        <div>
            <label class="block text-sm text-gray-400 mb-2">Urutan</label>
            <input type="number" name="urutan" id="{{ $p }}urutan" value="0"
                   class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition">
        </div>
    </div>

    <div class="flex items-center gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="aktif" id="{{ $p }}aktif" checked class="w-4 h-4 rounded bg-kvt-800 border-kvt-600 text-kvt-500 focus:ring-kvt-500/50">
            <span class="text-sm text-gray-300">Aktif</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" name="berlaku_semua" id="{{ $p }}berlaku_semua" class="w-4 h-4 rounded bg-kvt-800 border-kvt-600 text-kvt-500 focus:ring-kvt-500/50"
                   onchange="document.getElementById('{{ $p }}edukasi_row').classList.toggle('opacity-50');document.getElementById('{{ $p }}edukasi_row').classList.toggle('pointer-events-none')">
            <span class="text-sm text-gray-300">Berlaku untuk semua program</span>
        </label>
    </div>

    <div id="{{ $p }}edukasi_row">
        <label class="block text-sm text-gray-400 mb-2">Program Edukasi Spesifik</label>
        <select name="edukasi_gratis_id" id="{{ $p }}edukasi_gratis_id" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white outline-none focus:border-kvt-500">
            <option value="" class="bg-kvt-900">Pilih program (opsional)...</option>
            @foreach($edukasiList as $e)
            <option value="{{ $e->id }}" class="bg-kvt-900">{{ $e->judul }}</option>
            @endforeach
        </select>
        <p class="text-xs text-gray-600 mt-1">Jika "Berlaku semua" dicentang, pilihan ini diabaikan</p>
    </div>
</div>
