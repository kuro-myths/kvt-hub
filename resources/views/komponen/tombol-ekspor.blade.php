{{-- Tombol Ekspor Universal --}}
{{-- Penggunaan: @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-pengguna', 'judul' => 'Data Pengguna']) --}}
@php
    $tabelId = $tabelId ?? 'tabel-data';
    $namaFile = $namaFile ?? 'ekspor-data';
    $judul = $judul ?? 'Data Ekspor';
@endphp

<div class="relative inline-block" x-data="{ buka: false }" @click.away="buka = false">
    <button @click="buka = !buka" class="bg-kvt-700 hover:bg-kvt-600 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap flex items-center gap-2">
        <i class="fas fa-file-export"></i>
        <span class="hidden sm:inline">Ekspor</span>
        <i class="fas fa-chevron-down text-[10px]" :class="buka && 'rotate-180'" style="transition: transform 0.2s"></i>
    </button>
    <div x-show="buka" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="absolute right-0 mt-2 w-52 bg-kvt-900 border border-kvt-700/30 rounded-xl shadow-2xl z-50 overflow-hidden" style="display:none">
        <div class="p-2 border-b border-kvt-700/30">
            <p class="text-xs text-gray-500 font-semibold px-2">EKSPOR DATA</p>
        </div>
        <div class="p-1.5">
            <button onclick="eksporExcel('{{ $tabelId }}', '{{ $namaFile }}')" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-300 hover:bg-green-500/10 hover:text-green-400 rounded-lg transition">
                <div class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-file-excel text-green-400"></i></div>
                <div class="text-left"><div class="font-semibold">Excel (.xlsx)</div><div class="text-[10px] text-gray-500">Spreadsheet data</div></div>
            </button>
            <button onclick="eksporPDF('{{ $tabelId }}', '{{ $namaFile }}', '{{ $judul }}')" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-300 hover:bg-red-500/10 hover:text-red-400 rounded-lg transition">
                <div class="w-8 h-8 bg-red-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-file-pdf text-red-400"></i></div>
                <div class="text-left"><div class="font-semibold">PDF (.pdf)</div><div class="text-[10px] text-gray-500">Dokumen cetak</div></div>
            </button>
            <button onclick="eksporWord('{{ $tabelId }}', '{{ $namaFile }}', '{{ $judul }}')" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-300 hover:bg-blue-500/10 hover:text-blue-400 rounded-lg transition">
                <div class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-file-word text-blue-400"></i></div>
                <div class="text-left"><div class="font-semibold">Word (.doc)</div><div class="text-[10px] text-gray-500">Dokumen teks</div></div>
            </button>
            <button onclick="eksporCSV('{{ $tabelId }}', '{{ $namaFile }}')" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-300 hover:bg-amber-500/10 hover:text-amber-400 rounded-lg transition">
                <div class="w-8 h-8 bg-amber-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-file-csv text-amber-400"></i></div>
                <div class="text-left"><div class="font-semibold">CSV (.csv)</div><div class="text-[10px] text-gray-500">Data mentah</div></div>
            </button>
            <button onclick="eksporPPT('{{ $tabelId }}', '{{ $namaFile }}', '{{ $judul }}')" class="w-full flex items-center gap-3 px-3 py-2.5 text-sm text-gray-300 hover:bg-orange-500/10 hover:text-orange-400 rounded-lg transition">
                <div class="w-8 h-8 bg-orange-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-file-powerpoint text-orange-400"></i></div>
                <div class="text-left"><div class="font-semibold">PPT (.pptx)</div><div class="text-[10px] text-gray-500">Presentasi</div></div>
            </button>
        </div>
    </div>
</div>
