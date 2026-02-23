@extends('tata-letak.dasbor')

@section('judul', 'Silabus Pembelajaran - KVT Hub')
@section('judul-halaman', 'Silabus Pembelajaran')

@push('styles')
<style>
    .mode-excel .tabel-silabus { font-family: 'Consolas', 'Courier New', monospace; font-size: 12px; }
    .mode-excel .tabel-silabus th { background: #1e3a5f; color: #93c5fd; font-weight: 600; padding: 6px 10px; white-space: nowrap; }
    .mode-excel .tabel-silabus td { padding: 4px 8px; border: 1px solid rgba(71,85,105,0.4); }
    .mode-excel .tabel-silabus td:focus-within { outline: 2px solid #6366f1; outline-offset: -1px; }
    .mode-excel .tabel-silabus input, .mode-excel .tabel-silabus textarea { background: transparent; border: none; color: white; width: 100%; font-family: inherit; font-size: inherit; resize: none; }
    .mode-excel .tabel-silabus input:focus, .mode-excel .tabel-silabus textarea:focus { outline: none; }
    .col-resize { cursor: col-resize; position: absolute; right: 0; top: 0; width: 4px; height: 100%; }
    .col-resize:hover { background: #6366f1; }
    .drag-over { border-top: 3px solid #6366f1 !important; }
    @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
    .export-btn { background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent); background-size: 200% 100%; }
    .export-btn:hover { animation: shimmer 1.5s infinite; }
</style>
@endpush

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-teal-400 to-teal-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-scroll text-white text-sm"></i>
                    </div>
                    Silabus Pembelajaran
                </h1>
                <p class="text-gray-400 text-sm mt-1">Kelola silabus, RPP & rencana pembelajaran — mode tabel atau spreadsheet</p>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                {{-- Mode Toggle --}}
                <div class="bg-kvt-800/50 border border-kvt-700/30 rounded-xl p-1 flex">
                    <button onclick="setMode('card')" id="btnModeCard" class="px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-teal-500/20 text-teal-400">
                        <i class="fas fa-th-large mr-1"></i>Kartu
                    </button>
                    <button onclick="setMode('excel')" id="btnModeExcel" class="px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white">
                        <i class="fas fa-table mr-1"></i>Excel
                    </button>
                </div>

                {{-- Export/Import --}}
                <div class="relative" x-data="{ open: false }">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="export-btn bg-kvt-800/50 border border-kvt-700/30 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm transition">
                        <i class="fas fa-file-export mr-1"></i>Ekspor/Impor <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-56 bg-kvt-900 border border-kvt-700/30 rounded-xl shadow-2xl z-50 overflow-hidden">
                        <button onclick="eksporSilabus('excel')" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 transition">
                            <i class="fas fa-file-excel text-green-400 w-5"></i> Ekspor Excel (.xlsx)
                        </button>
                        <button onclick="eksporSilabus('word')" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 transition">
                            <i class="fas fa-file-word text-blue-400 w-5"></i> Ekspor Word (.docx)
                        </button>
                        <button onclick="eksporSilabus('pdf')" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 transition">
                            <i class="fas fa-file-pdf text-red-400 w-5"></i> Ekspor PDF
                        </button>
                        <button onclick="eksporSilabus('csv')" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 transition">
                            <i class="fas fa-file-csv text-amber-400 w-5"></i> Ekspor CSV
                        </button>
                        <hr class="border-kvt-700/30">
                        <label class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 transition cursor-pointer">
                            <i class="fas fa-file-upload text-indigo-400 w-5"></i> Impor dari Excel/CSV
                            <input type="file" accept=".xlsx,.xls,.csv" onchange="imporSilabus(this)" class="hidden">
                        </label>
                    </div>
                </div>

                <button onclick="bukaModalTambah()" class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-teal-400 hover:to-teal-500 transition shadow-lg text-sm">
                    <i class="fas fa-plus mr-2"></i>Buat Silabus
                </button>
            </div>
        </div>

        {{-- Filter Bar --}}
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4 mb-6 flex flex-wrap items-center gap-3" data-aos="fade-up" data-aos-delay="50">
            <div class="flex-1 min-w-[200px]">
                <input type="text" id="cariSilabus" placeholder="Cari silabus..." oninput="filterSilabus()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white placeholder-gray-500 focus:border-teal-500/50 focus:outline-none">
            </div>
            <select id="filterKelas" onchange="filterSilabus()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-300 focus:border-teal-500/50 focus:outline-none">
                <option value="">Semua Kelas</option>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                @endforeach
            </select>
            <select id="filterSemester" onchange="filterSilabus()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-300 focus:border-teal-500/50 focus:outline-none">
                <option value="">Semua Semester</option>
                <option value="ganjil">Ganjil</option>
                <option value="genap">Genap</option>
            </select>
            <span class="text-gray-500 text-sm"><i class="fas fa-scroll mr-1"></i><span id="totalSilabus">{{ count($silabus) }}</span> silabus</span>
        </div>

        {{-- ==================== MODE CARD ==================== --}}
        <div id="viewCard" data-aos="fade-up" data-aos-delay="100">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($silabus as $item)
                    <div class="silabus-item bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-6 hover:border-teal-500/30 transition group"
                         data-kelas="{{ $item->kelas_id }}"
                         data-semester="{{ $item->semester }}"
                         data-nama="{{ strtolower($item->judul) }}">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-400 to-teal-600 flex items-center justify-center text-white shadow-lg">
                                <i class="fas fa-scroll"></i>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="bg-{{ $item->status === 'final' ? 'green' : ($item->status === 'revisi' ? 'amber' : 'gray') }}-500/20 text-{{ $item->status === 'final' ? 'green' : ($item->status === 'revisi' ? 'amber' : 'gray') }}-400 text-xs px-3 py-1 rounded-full font-semibold">
                                    {{ ucfirst($item->status) }}
                                </span>
                                <div class="relative">
                                    <button onclick="toggleDropdown(this)" class="text-gray-500 hover:text-white p-1 transition"><i class="fas fa-ellipsis-v"></i></button>
                                    <div class="hidden absolute right-0 mt-1 w-40 bg-kvt-900 border border-kvt-700/30 rounded-lg shadow-xl z-50 overflow-hidden">
                                        <button onclick="bukaModalEdit(@json($item))" class="w-full text-left px-3 py-2 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit</button>
                                        <button onclick="bukaModalDuplikat(@json($item))" class="w-full text-left px-3 py-2 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white"><i class="fas fa-copy mr-2 text-purple-400"></i>Duplikat</button>
                                        <button onclick="eksporSatuSilabus({{ $item->id }})" class="w-full text-left px-3 py-2 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white"><i class="fas fa-download mr-2 text-green-400"></i>Unduh</button>
                                        <hr class="border-kvt-700/30">
                                        <form method="POST" action="{{ route('pengajar.silabus.hapus', $item) }}" onsubmit="return confirm('Hapus silabus ini?')">
                                            @csrf @method('DELETE')
                                            <button class="w-full text-left px-3 py-2 text-sm text-red-400 hover:bg-red-500/10"><i class="fas fa-trash mr-2"></i>Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="text-white font-bold text-lg mb-1">{{ $item->judul }}</h3>
                        @if($item->kelas)
                            <p class="text-teal-400 text-sm mb-3"><i class="fas fa-chalkboard mr-1"></i>{{ $item->kelas->nama }}</p>
                        @endif
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $item->deskripsi ?? 'Belum ada deskripsi' }}</p>

                        {{-- Pertemuan Progress --}}
                        @php
                            $totalPertemuan = is_array($item->pertemuan) ? count($item->pertemuan) : 0;
                        @endphp
                        <div class="flex items-center justify-between text-xs text-gray-500 mb-2">
                            <span><i class="fas fa-calendar-week mr-1"></i>{{ $totalPertemuan }} Pertemuan</span>
                            <span>{{ $item->semester ? ucfirst($item->semester) : '-' }}</span>
                        </div>
                        <div class="w-full h-1.5 bg-kvt-800 rounded-full">
                            <div class="h-full bg-gradient-to-r from-teal-400 to-teal-600 rounded-full" style="width: {{ $totalPertemuan > 0 ? min(($totalPertemuan / 16) * 100, 100) : 0 }}%"></div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-16">
                        <div class="w-24 h-24 bg-kvt-800/50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-scroll text-5xl text-gray-700"></i>
                        </div>
                        <h3 class="text-white font-bold text-lg mb-2">Belum ada silabus</h3>
                        <p class="text-gray-500 mb-6 max-w-md mx-auto">Buat silabus untuk merencanakan pembelajaran yang terstruktur dan efektif</p>
                        <button onclick="bukaModalTambah()" class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-xl transition font-semibold">
                            <i class="fas fa-plus mr-2"></i>Buat Silabus Pertama
                        </button>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- ==================== MODE EXCEL ==================== --}}
        <div id="viewExcel" class="hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden mode-excel">
                <div class="flex items-center justify-between p-3 bg-kvt-800/50 border-b border-kvt-700/30">
                    <div class="flex items-center gap-3">
                        <span class="text-teal-400 text-sm font-semibold"><i class="fas fa-table mr-1"></i>Mode Spreadsheet</span>
                        <span class="text-gray-500 text-xs">Klik sel untuk edit langsung</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="tambahBarisSilabus()" class="text-xs bg-teal-500/20 text-teal-400 px-3 py-1 rounded-lg hover:bg-teal-500/30 transition">
                            <i class="fas fa-plus mr-1"></i>Baris Baru
                        </button>
                        <button onclick="simpanSemuaSilabus()" class="text-xs bg-green-500/20 text-green-400 px-3 py-1 rounded-lg hover:bg-green-500/30 transition">
                            <i class="fas fa-save mr-1"></i>Simpan Semua
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="tabel-silabus w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs">
                                <th class="sticky left-0 z-10 w-10 text-center">#</th>
                                <th class="min-w-[200px] relative">Judul Silabus<div class="col-resize"></div></th>
                                <th class="min-w-[150px] relative">Kelas<div class="col-resize"></div></th>
                                <th class="min-w-[100px] relative">Semester<div class="col-resize"></div></th>
                                <th class="min-w-[120px] relative">Pertemuan<div class="col-resize"></div></th>
                                <th class="min-w-[200px] relative">Kompetensi Dasar<div class="col-resize"></div></th>
                                <th class="min-w-[200px] relative">Indikator<div class="col-resize"></div></th>
                                <th class="min-w-[150px] relative">Metode<div class="col-resize"></div></th>
                                <th class="min-w-[100px] relative">Status<div class="col-resize"></div></th>
                                <th class="w-20 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelBodySilabus">
                            @forelse($silabus as $i => $item)
                                <tr class="border-b border-kvt-700/20 hover:bg-kvt-800/30 transition" data-id="{{ $item->id }}">
                                    <td class="sticky left-0 bg-kvt-900 text-center text-gray-500 text-xs">{{ $i + 1 }}</td>
                                    <td><input type="text" value="{{ $item->judul }}" name="judul" class="py-1"></td>
                                    <td>
                                        <select name="kelas_id" class="bg-transparent border-none text-white text-xs w-full focus:outline-none">
                                            @foreach($kelas as $kls)
                                                <option value="{{ $kls->id }}" {{ $item->kelas_id == $kls->id ? 'selected' : '' }} class="bg-kvt-900">{{ $kls->nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select name="semester" class="bg-transparent border-none text-white text-xs w-full focus:outline-none">
                                            <option value="ganjil" {{ $item->semester === 'ganjil' ? 'selected' : '' }} class="bg-kvt-900">Ganjil</option>
                                            <option value="genap" {{ $item->semester === 'genap' ? 'selected' : '' }} class="bg-kvt-900">Genap</option>
                                        </select>
                                    </td>
                                    <td class="text-center text-gray-400 text-xs">{{ is_array($item->pertemuan) ? count($item->pertemuan) : 0 }}</td>
                                    <td><textarea name="kompetensi_dasar" rows="1" class="py-1">{{ $item->kompetensi_dasar }}</textarea></td>
                                    <td><textarea name="indikator" rows="1" class="py-1">{{ $item->indikator }}</textarea></td>
                                    <td><input type="text" value="{{ $item->metode }}" name="metode" class="py-1"></td>
                                    <td>
                                        <select name="status" class="bg-transparent border-none text-xs w-full focus:outline-none {{ $item->status === 'final' ? 'text-green-400' : ($item->status === 'revisi' ? 'text-amber-400' : 'text-gray-400') }}">
                                            <option value="draf" {{ $item->status === 'draf' ? 'selected' : '' }} class="bg-kvt-900">Draf</option>
                                            <option value="revisi" {{ $item->status === 'revisi' ? 'selected' : '' }} class="bg-kvt-900">Revisi</option>
                                            <option value="final" {{ $item->status === 'final' ? 'selected' : '' }} class="bg-kvt-900">Final</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <div class="flex items-center justify-center gap-1">
                                            <button onclick="bukaModalEdit(@json($item))" class="text-blue-400 hover:text-blue-300 p-1" title="Edit Detail"><i class="fas fa-expand-alt text-xs"></i></button>
                                            <form method="POST" action="{{ route('pengajar.silabus.hapus', $item) }}" class="inline" onsubmit="return confirm('Hapus?')">
                                                @csrf @method('DELETE')
                                                <button class="text-red-400 hover:text-red-300 p-1" title="Hapus"><i class="fas fa-trash-alt text-xs"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="10" class="text-center text-gray-500 py-8">Belum ada data. Klik "Baris Baru" untuk mulai.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== MODAL TAMBAH/EDIT SILABUS ==================== --}}
<div id="modalSilabus" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="tutupModal()"></div>
    <div class="absolute inset-4 md:inset-y-8 md:inset-x-auto md:left-1/2 md:-translate-x-1/2 md:max-w-3xl md:w-full bg-kvt-950 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col">
        <div class="p-6 border-b border-kvt-700/30 flex items-center justify-between">
            <h2 class="text-lg font-bold text-white" id="modalSilabusTitle">Buat Silabus Baru</h2>
            <button onclick="tutupModal()" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-xl"></i></button>
        </div>
        <div class="flex-1 overflow-y-auto p-6">
            <form id="formSilabus" method="POST" action="{{ route('pengajar.silabus.simpan') }}">
                @csrf
                <input type="hidden" name="_method" id="silabusMethod" value="POST">
                <div class="space-y-5">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Judul Silabus *</label>
                            <input type="text" name="judul" id="silabusJudul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none" placeholder="Silabus Matematika Kelas X">
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Kelas *</label>
                            <select name="kelas_id" id="silabusKelas" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Semester</label>
                            <select name="semester" id="silabusSemester" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none">
                                <option value="ganjil">Ganjil</option>
                                <option value="genap">Genap</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-300 mb-2">Status</label>
                            <select name="status" id="silabusStatus" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none">
                                <option value="draf">Draf</option>
                                <option value="revisi">Revisi</option>
                                <option value="final">Final</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Deskripsi</label>
                        <textarea name="deskripsi" id="silabusDeskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none" placeholder="Deskripsi singkat silabus..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Kompetensi Dasar</label>
                        <textarea name="kompetensi_dasar" id="silabusKD" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none" placeholder="Kompetensi dasar yang ingin dicapai..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Indikator Pencapaian</label>
                        <textarea name="indikator" id="silabusIndikator" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none" placeholder="Indikator pencapaian kompetensi..."></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-300 mb-2">Metode Pembelajaran</label>
                        <input type="text" name="metode" id="silabusMetode" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm focus:border-teal-500/50 focus:outline-none" placeholder="Ceramah, Diskusi, Praktikum, dll">
                    </div>

                    {{-- Rencana Pertemuan --}}
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <label class="text-sm font-semibold text-gray-300">Rencana Pertemuan</label>
                            <button type="button" onclick="tambahPertemuan()" class="text-xs bg-teal-500/20 text-teal-400 px-3 py-1.5 rounded-lg hover:bg-teal-500/30 transition">
                                <i class="fas fa-plus mr-1"></i>Tambah Minggu
                            </button>
                        </div>
                        <div id="daftarPertemuan" class="space-y-3">
                            {{-- Dynamic rows --}}
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-kvt-700/30">
                    <button type="button" onclick="tutupModal()" class="px-5 py-2.5 rounded-xl text-sm text-gray-400 hover:text-white transition">Batal</button>
                    <button type="submit" class="bg-gradient-to-r from-teal-500 to-teal-600 text-white px-6 py-2.5 rounded-xl font-semibold text-sm hover:from-teal-400 hover:to-teal-500 transition shadow-lg">
                        <i class="fas fa-save mr-2"></i><span id="btnSimpanLabel">Simpan Silabus</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ========== MODE TOGGLE ==========
    let currentMode = 'card';
    function setMode(mode) {
        currentMode = mode;
        document.getElementById('viewCard').classList.toggle('hidden', mode !== 'card');
        document.getElementById('viewExcel').classList.toggle('hidden', mode !== 'excel');
        document.getElementById('btnModeCard').className = mode === 'card'
            ? 'px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-teal-500/20 text-teal-400'
            : 'px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white';
        document.getElementById('btnModeExcel').className = mode === 'excel'
            ? 'px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-teal-500/20 text-teal-400'
            : 'px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white';
    }

    // ========== FILTER ==========
    function filterSilabus() {
        const cari = document.getElementById('cariSilabus').value.toLowerCase();
        const kelas = document.getElementById('filterKelas').value;
        const semester = document.getElementById('filterSemester').value;
        let count = 0;
        document.querySelectorAll('.silabus-item').forEach(el => {
            const cocok = (!cari || el.dataset.nama.includes(cari)) &&
                          (!kelas || el.dataset.kelas == kelas) &&
                          (!semester || el.dataset.semester == semester);
            el.style.display = cocok ? '' : 'none';
            if (cocok) count++;
        });
        document.getElementById('totalSilabus').textContent = count;
    }

    // ========== MODAL ==========
    function bukaModalTambah() {
        document.getElementById('formSilabus').action = "{{ route('pengajar.silabus.simpan') }}";
        document.getElementById('silabusMethod').value = 'POST';
        document.getElementById('modalSilabusTitle').textContent = 'Buat Silabus Baru';
        document.getElementById('btnSimpanLabel').textContent = 'Simpan Silabus';
        document.getElementById('formSilabus').reset();
        document.getElementById('daftarPertemuan').innerHTML = '';
        document.getElementById('modalSilabus').classList.remove('hidden');
    }

    function bukaModalEdit(item) {
        document.getElementById('formSilabus').action = `/pengajar/silabus/${item.id}`;
        document.getElementById('silabusMethod').value = 'PUT';
        document.getElementById('modalSilabusTitle').textContent = 'Edit Silabus';
        document.getElementById('btnSimpanLabel').textContent = 'Perbarui Silabus';
        document.getElementById('silabusJudul').value = item.judul || '';
        document.getElementById('silabusKelas').value = item.kelas_id || '';
        document.getElementById('silabusSemester').value = item.semester || 'ganjil';
        document.getElementById('silabusStatus').value = item.status || 'draf';
        document.getElementById('silabusDeskripsi').value = item.deskripsi || '';
        document.getElementById('silabusKD').value = item.kompetensi_dasar || '';
        document.getElementById('silabusIndikator').value = item.indikator || '';
        document.getElementById('silabusMetode').value = item.metode || '';
        // Load pertemuan
        const container = document.getElementById('daftarPertemuan');
        container.innerHTML = '';
        if (item.pertemuan && Array.isArray(item.pertemuan)) {
            item.pertemuan.forEach((p, i) => tambahPertemuan(p));
        }
        document.getElementById('modalSilabus').classList.remove('hidden');
    }

    function bukaModalDuplikat(item) {
        bukaModalEdit(item);
        document.getElementById('formSilabus').action = "{{ route('pengajar.silabus.simpan') }}";
        document.getElementById('silabusMethod').value = 'POST';
        document.getElementById('modalSilabusTitle').textContent = 'Duplikat Silabus';
        document.getElementById('silabusJudul').value = item.judul + ' (Salinan)';
    }

    function tutupModal() { document.getElementById('modalSilabus').classList.add('hidden'); }

    // ========== PERTEMUAN ROWS ==========
    let pertemuanCounter = 0;
    function tambahPertemuan(data = null) {
        const container = document.getElementById('daftarPertemuan');
        const idx = pertemuanCounter++;
        const div = document.createElement('div');
        div.className = 'bg-kvt-800/30 border border-kvt-700/20 rounded-xl p-4 relative group';
        div.innerHTML = `
            <button type="button" onclick="this.closest('div').remove()" class="absolute top-2 right-2 text-red-400/50 hover:text-red-400 text-xs opacity-0 group-hover:opacity-100 transition">
                <i class="fas fa-times"></i>
            </button>
            <div class="grid grid-cols-12 gap-3">
                <div class="col-span-1">
                    <label class="text-[10px] text-gray-500 block mb-1">Minggu</label>
                    <input type="number" name="pertemuan[${idx}][minggu]" value="${data?.minggu || idx + 1}" min="1" max="20" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-1.5 text-xs text-white text-center focus:outline-none focus:border-teal-500/50">
                </div>
                <div class="col-span-4">
                    <label class="text-[10px] text-gray-500 block mb-1">Topik</label>
                    <input type="text" name="pertemuan[${idx}][topik]" value="${data?.topik || ''}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-teal-500/50" placeholder="Materi yang dibahas">
                </div>
                <div class="col-span-3">
                    <label class="text-[10px] text-gray-500 block mb-1">Kegiatan</label>
                    <input type="text" name="pertemuan[${idx}][kegiatan]" value="${data?.kegiatan || ''}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-teal-500/50" placeholder="Diskusi, Praktik, dll">
                </div>
                <div class="col-span-2">
                    <label class="text-[10px] text-gray-500 block mb-1">Penilaian</label>
                    <input type="text" name="pertemuan[${idx}][penilaian]" value="${data?.penilaian || ''}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-teal-500/50" placeholder="Tugas/Kuis">
                </div>
                <div class="col-span-2">
                    <label class="text-[10px] text-gray-500 block mb-1">Sumber</label>
                    <input type="text" name="pertemuan[${idx}][sumber]" value="${data?.sumber || ''}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-teal-500/50" placeholder="Buku/link">
                </div>
            </div>
        `;
        container.appendChild(div);
    }

    // ========== DROPDOWN ==========
    function toggleDropdown(btn) {
        const menu = btn.nextElementSibling;
        document.querySelectorAll('.fa-ellipsis-v').forEach(b => {
            if (b !== btn.querySelector('i')) b.closest('button')?.nextElementSibling?.classList.add('hidden');
        });
        menu.classList.toggle('hidden');
    }
    document.addEventListener('click', e => {
        if (!e.target.closest('.fa-ellipsis-v') && !e.target.closest('[class*="absolute right-0"]')) {
            document.querySelectorAll('.fa-ellipsis-v').forEach(b => b.closest('button')?.nextElementSibling?.classList.add('hidden'));
        }
    });

    // ========== EXCEL MODE ==========
    function tambahBarisSilabus() {
        const tbody = document.getElementById('tabelBodySilabus');
        const count = tbody.querySelectorAll('tr').length + 1;
        const tr = document.createElement('tr');
        tr.className = 'border-b border-kvt-700/20 hover:bg-kvt-800/30 transition baru';
        tr.innerHTML = `
            <td class="sticky left-0 bg-kvt-900 text-center text-gray-500 text-xs">${count}</td>
            <td><input type="text" name="judul" class="py-1" placeholder="Judul silabus..."></td>
            <td><select name="kelas_id" class="bg-transparent border-none text-white text-xs w-full focus:outline-none"><option value="" class="bg-kvt-900">Pilih Kelas</option>@foreach($kelas as $kls)<option value="{{ $kls->id }}" class="bg-kvt-900">{{ $kls->nama }}</option>@endforeach</select></td>
            <td><select name="semester" class="bg-transparent border-none text-white text-xs w-full focus:outline-none"><option value="ganjil" class="bg-kvt-900">Ganjil</option><option value="genap" class="bg-kvt-900">Genap</option></select></td>
            <td class="text-center text-gray-400 text-xs">0</td>
            <td><textarea name="kompetensi_dasar" rows="1" class="py-1" placeholder="KD..."></textarea></td>
            <td><textarea name="indikator" rows="1" class="py-1" placeholder="Indikator..."></textarea></td>
            <td><input type="text" name="metode" class="py-1" placeholder="Metode..."></td>
            <td><select name="status" class="bg-transparent border-none text-gray-400 text-xs w-full focus:outline-none"><option value="draf" class="bg-kvt-900">Draf</option><option value="revisi" class="bg-kvt-900">Revisi</option><option value="final" class="bg-kvt-900">Final</option></select></td>
            <td class="text-center"><button onclick="this.closest('tr').remove()" class="text-red-400 hover:text-red-300 p-1" title="Hapus"><i class="fas fa-times text-xs"></i></button></td>
        `;
        tbody.appendChild(tr);
        tr.querySelector('input').focus();
    }

    function simpanSemuaSilabus() {
        const rows = document.querySelectorAll('#tabelBodySilabus tr.baru');
        if (rows.length === 0) { alert('Tidak ada baris baru untuk disimpan.'); return; }
        rows.forEach(async (tr) => {
            const data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append('judul', tr.querySelector('[name=judul]').value);
            data.append('kelas_id', tr.querySelector('[name=kelas_id]').value);
            data.append('semester', tr.querySelector('[name=semester]').value);
            data.append('kompetensi_dasar', tr.querySelector('[name=kompetensi_dasar]').value);
            data.append('indikator', tr.querySelector('[name=indikator]').value);
            data.append('metode', tr.querySelector('[name=metode]').value);
            data.append('status', tr.querySelector('[name=status]').value);
            const res = await fetch("{{ route('pengajar.silabus.simpan') }}", { method: 'POST', body: data });
            if (res.ok) { tr.classList.remove('baru'); tr.style.background = 'rgba(20,184,166,0.1)'; }
        });
    }

    // ========== EXPORT ==========
    function eksporSilabus(format) {
        window.location.href = `{{ route('pengajar.silabus.index') }}?ekspor=${format}`;
    }
    function eksporSatuSilabus(id) { window.location.href = `/pengajar/silabus/${id}/ekspor`; }
    function imporSilabus(input) {
        const file = input.files[0]; if (!file) return;
        const fd = new FormData();
        fd.append('file', file);
        fd.append('_token', '{{ csrf_token() }}');
        fetch("{{ route('pengajar.silabus.impor') }}", { method: 'POST', body: fd })
            .then(r => r.json()).then(d => { alert(d.message || 'Berhasil!'); location.reload(); })
            .catch(() => alert('Gagal mengimpor file.'));
    }
</script>
@endpush
