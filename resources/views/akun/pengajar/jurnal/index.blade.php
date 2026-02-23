@extends('tata-letak.dasbor')

@section('judul', 'Jurnal Mengajar - KVT Hub')
@section('judul-halaman', 'Jurnal Mengajar')

@push('styles')
<style>
    .mode-excel .tabel-jurnal { font-family: 'Consolas', 'Courier New', monospace; font-size: 12px; }
    .mode-excel .tabel-jurnal th { background: #1e3a5f; color: #93c5fd; font-weight: 600; padding: 6px 10px; white-space: nowrap; }
    .mode-excel .tabel-jurnal td { padding: 4px 8px; border: 1px solid rgba(71,85,105,0.4); }
    .mode-excel .tabel-jurnal td:focus-within { outline: 2px solid #8b5cf6; outline-offset: -1px; }
    .mode-excel .tabel-jurnal input, .mode-excel .tabel-jurnal textarea, .mode-excel .tabel-jurnal select { background: transparent; border: none; color: white; width: 100%; font-family: inherit; font-size: inherit; resize: none; }
    .mode-excel .tabel-jurnal input:focus, .mode-excel .tabel-jurnal textarea:focus { outline: none; }
    .timeline-dot { width: 12px; height: 12px; border-radius: 999px; position: relative; }
    .timeline-dot::after { content: ''; position: absolute; left: 50%; top: 100%; width: 2px; height: calc(100% + 12px); background: rgba(139,92,246,0.2); transform: translateX(-50%); }
    .timeline-item:last-child .timeline-dot::after { display: none; }
</style>
@endpush

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-violet-400 to-violet-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-journal-whills text-white text-sm"></i>
                    </div>
                    Jurnal Mengajar
                </h1>
                <p class="text-gray-400 text-sm mt-1">Catatan harian & laporan aktivitas mengajar — dokumentasikan setiap pertemuan</p>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                <div class="bg-kvt-800/50 border border-kvt-700/30 rounded-xl p-1 flex">
                    <button onclick="setModeJurnal('timeline')" id="btnTimeline" class="px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-violet-500/20 text-violet-400">
                        <i class="fas fa-stream mr-1"></i>Timeline
                    </button>
                    <button onclick="setModeJurnal('excel')" id="btnExcelJurnal" class="px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white">
                        <i class="fas fa-table mr-1"></i>Excel
                    </button>
                </div>

                <div class="relative">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="bg-kvt-800/50 border border-kvt-700/30 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm transition">
                        <i class="fas fa-file-export mr-1"></i>Ekspor <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-52 bg-kvt-900 border border-kvt-700/30 rounded-xl shadow-2xl z-50 overflow-hidden">
                        <button onclick="window.location.href='?ekspor=excel'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-excel text-green-400 w-5"></i> Excel (.xlsx)
                        </button>
                        <button onclick="window.location.href='?ekspor=word'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-word text-blue-400 w-5"></i> Word (.docx)
                        </button>
                        <button onclick="window.location.href='?ekspor=pdf'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-pdf text-red-400 w-5"></i> PDF
                        </button>
                        <hr class="border-kvt-700/30">
                        <label class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 cursor-pointer">
                            <i class="fas fa-file-upload text-indigo-400 w-5"></i> Impor Excel/CSV
                            <input type="file" accept=".xlsx,.csv" onchange="imporJurnal(this)" class="hidden">
                        </label>
                    </div>
                </div>

                <button onclick="bukaModalJurnal()" class="bg-gradient-to-r from-violet-500 to-violet-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-violet-400 hover:to-violet-500 transition shadow-lg text-sm">
                    <i class="fas fa-plus mr-2"></i>Tulis Jurnal
                </button>
            </div>
        </div>

        {{-- Filter --}}
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4 mb-6 flex flex-wrap items-center gap-3" data-aos="fade-up" data-aos-delay="50">
            <div class="flex-1 min-w-[200px]">
                <input type="text" id="cariJurnal" placeholder="Cari jurnal..." oninput="filterJurnal()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white placeholder-gray-500 focus:border-violet-500/50 focus:outline-none">
            </div>
            <select id="filterKelasJurnal" onchange="filterJurnal()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-300 focus:outline-none">
                <option value="">Semua Kelas</option>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                @endforeach
            </select>
            <input type="month" id="filterBulan" onchange="filterJurnal()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-gray-300 focus:outline-none">
            <span class="text-gray-500 text-sm"><i class="fas fa-book-open mr-1"></i><span id="totalJurnal">{{ count($jurnal) }}</span> catatan</span>
        </div>

        {{-- ==================== TIMELINE VIEW ==================== --}}
        <div id="viewTimeline" data-aos="fade-up" data-aos-delay="100">
            @php $currentMonth = ''; @endphp
            @forelse($jurnal as $item)
                @php
                    $bulan = $item->tanggal ? $item->tanggal->translatedFormat('F Y') : 'Tanpa Tanggal';
                    $showMonth = $bulan !== $currentMonth;
                    $currentMonth = $bulan;
                @endphp

                @if($showMonth)
                    <div class="flex items-center gap-3 mb-4 {{ !$loop->first ? 'mt-8' : '' }}">
                        <span class="bg-violet-500/20 text-violet-400 text-xs font-semibold px-4 py-1.5 rounded-full"><i class="fas fa-calendar-alt mr-1"></i>{{ $bulan }}</span>
                        <div class="flex-1 h-px bg-kvt-700/20"></div>
                    </div>
                @endif

                <div class="jurnal-item timeline-item flex gap-4 mb-4"
                     data-kelas="{{ $item->kelas_id }}"
                     data-bulan="{{ $item->tanggal ? $item->tanggal->format('Y-m') : '' }}"
                     data-nama="{{ strtolower($item->topik . ' ' . $item->catatan) }}">
                    {{-- Timeline Dot --}}
                    <div class="flex flex-col items-center pt-1">
                        <div class="timeline-dot bg-gradient-to-br from-violet-400 to-violet-600"></div>
                    </div>

                    {{-- Card --}}
                    <div class="flex-1 bg-kvt-900/50 border border-kvt-700/30 rounded-2xl p-5 hover:border-violet-500/30 transition group">
                        <div class="flex items-start justify-between mb-3">
                            <div>
                                <h3 class="text-white font-bold">{{ $item->topik }}</h3>
                                <div class="flex items-center gap-3 mt-1 text-xs text-gray-500">
                                    @if($item->tanggal)
                                        <span><i class="fas fa-calendar mr-1"></i>{{ $item->tanggal->translatedFormat('d M Y') }}</span>
                                    @endif
                                    @if($item->kelas)
                                        <span class="text-violet-400"><i class="fas fa-chalkboard mr-1"></i>{{ $item->kelas->nama }}</span>
                                    @endif
                                    @if($item->jam_mulai && $item->jam_selesai)
                                        <span><i class="fas fa-clock mr-1"></i>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</span>
                                    @endif
                                    <span><i class="fas fa-users mr-1"></i>{{ $item->jumlah_hadir ?? 0 }}/{{ $item->jumlah_siswa ?? 0 }}</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="bg-{{ $item->pertemuan_ke ? 'violet' : 'gray' }}-500/20 text-{{ $item->pertemuan_ke ? 'violet' : 'gray' }}-400 text-[10px] px-2 py-1 rounded-full font-semibold">
                                    P-{{ $item->pertemuan_ke ?? '?' }}
                                </span>
                                <button onclick="bukaModalEditJurnal(@json($item))" class="text-gray-500 hover:text-blue-400 opacity-0 group-hover:opacity-100 transition p-1"><i class="fas fa-edit text-xs"></i></button>
                                <form method="POST" action="{{ route('pengajar.jurnal.hapus', $item) }}" class="inline" onsubmit="return confirm('Hapus catatan ini?')">
                                    @csrf @method('DELETE')
                                    <button class="text-gray-500 hover:text-red-400 opacity-0 group-hover:opacity-100 transition p-1"><i class="fas fa-trash-alt text-xs"></i></button>
                                </form>
                            </div>
                        </div>

                        @if($item->catatan)
                            <p class="text-gray-400 text-sm mb-3">{{ $item->catatan }}</p>
                        @endif

                        <div class="flex flex-wrap items-center gap-2 text-xs">
                            @if($item->metode)
                                <span class="bg-blue-500/15 text-blue-400 px-2 py-1 rounded-lg"><i class="fas fa-chalkboard-teacher mr-1"></i>{{ $item->metode }}</span>
                            @endif
                            @if($item->materi_dibahas)
                                <span class="bg-emerald-500/15 text-emerald-400 px-2 py-1 rounded-lg"><i class="fas fa-book mr-1"></i>{{ Str::limit($item->materi_dibahas, 30) }}</span>
                            @endif
                            @if($item->kendala)
                                <span class="bg-red-500/15 text-red-400 px-2 py-1 rounded-lg"><i class="fas fa-exclamation-circle mr-1"></i>Ada Kendala</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-16">
                    <div class="w-24 h-24 bg-kvt-800/50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-journal-whills text-5xl text-gray-700"></i>
                    </div>
                    <h3 class="text-white font-bold text-lg mb-2">Belum ada jurnal mengajar</h3>
                    <p class="text-gray-500 mb-6 max-w-md mx-auto">Catat setiap aktivitas mengajar untuk dokumentasi dan evaluasi</p>
                    <button onclick="bukaModalJurnal()" class="bg-violet-500 hover:bg-violet-600 text-white px-6 py-3 rounded-xl transition font-semibold">
                        <i class="fas fa-plus mr-2"></i>Tulis Jurnal Pertama
                    </button>
                </div>
            @endforelse
        </div>

        {{-- ==================== EXCEL VIEW ==================== --}}
        <div id="viewExcelJurnal" class="hidden" data-aos="fade-up" data-aos-delay="100">
            <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden mode-excel">
                <div class="flex items-center justify-between p-3 bg-kvt-800/50 border-b border-kvt-700/30">
                    <span class="text-violet-400 text-sm font-semibold"><i class="fas fa-table mr-1"></i>Mode Spreadsheet — Jurnal Mengajar</span>
                    <div class="flex items-center gap-2">
                        <button onclick="tambahBarisJurnal()" class="text-xs bg-violet-500/20 text-violet-400 px-3 py-1 rounded-lg hover:bg-violet-500/30 transition"><i class="fas fa-plus mr-1"></i>Baris Baru</button>
                        <button onclick="simpanSemuaJurnal()" class="text-xs bg-green-500/20 text-green-400 px-3 py-1 rounded-lg hover:bg-green-500/30 transition"><i class="fas fa-save mr-1"></i>Simpan</button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="tabel-jurnal w-full text-left border-collapse">
                        <thead>
                            <tr class="text-xs">
                                <th class="sticky left-0 z-10 w-10 text-center">#</th>
                                <th class="min-w-[120px]">Tanggal</th>
                                <th class="min-w-[80px]">P.Ke</th>
                                <th class="min-w-[200px]">Topik</th>
                                <th class="min-w-[130px]">Kelas</th>
                                <th class="min-w-[80px]">Jam</th>
                                <th class="min-w-[60px]">Hadir</th>
                                <th class="min-w-[120px]">Metode</th>
                                <th class="min-w-[200px]">Materi</th>
                                <th class="min-w-[200px]">Catatan</th>
                                <th class="min-w-[150px]">Kendala</th>
                                <th class="w-16 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabelBodyJurnal">
                            @foreach($jurnal as $i => $item)
                                <tr class="border-b border-kvt-700/20 hover:bg-kvt-800/30 transition" data-id="{{ $item->id }}">
                                    <td class="sticky left-0 bg-kvt-900 text-center text-gray-500 text-xs">{{ $i + 1 }}</td>
                                    <td><input type="date" value="{{ $item->tanggal?->format('Y-m-d') }}" name="tanggal" class="py-1"></td>
                                    <td><input type="number" value="{{ $item->pertemuan_ke }}" name="pertemuan_ke" min="1" class="py-1 text-center"></td>
                                    <td><input type="text" value="{{ $item->topik }}" name="topik" class="py-1"></td>
                                    <td><select name="kelas_id" class="bg-transparent border-none text-white text-xs w-full focus:outline-none">@foreach($kelas as $kls)<option value="{{ $kls->id }}" {{ $item->kelas_id == $kls->id ? 'selected' : '' }} class="bg-kvt-900">{{ $kls->nama }}</option>@endforeach</select></td>
                                    <td><input type="text" value="{{ $item->jam_mulai }}" name="jam_mulai" class="py-1 text-center" placeholder="08:00"></td>
                                    <td><input type="number" value="{{ $item->jumlah_hadir }}" name="jumlah_hadir" class="py-1 text-center"></td>
                                    <td><input type="text" value="{{ $item->metode }}" name="metode" class="py-1"></td>
                                    <td><input type="text" value="{{ $item->materi_dibahas }}" name="materi_dibahas" class="py-1"></td>
                                    <td><textarea name="catatan" rows="1" class="py-1">{{ $item->catatan }}</textarea></td>
                                    <td><input type="text" value="{{ $item->kendala }}" name="kendala" class="py-1"></td>
                                    <td class="text-center">
                                        <form method="POST" action="{{ route('pengajar.jurnal.hapus', $item) }}" class="inline" onsubmit="return confirm('Hapus?')">
                                            @csrf @method('DELETE')
                                            <button class="text-red-400 hover:text-red-300 p-1"><i class="fas fa-trash-alt text-xs"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ==================== MODAL JURNAL ==================== --}}
<div id="modalJurnal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="tutupModalJurnal()"></div>
    <div class="absolute inset-4 md:inset-y-8 md:inset-x-auto md:left-1/2 md:-translate-x-1/2 md:max-w-2xl md:w-full bg-kvt-950 border border-kvt-700/30 rounded-2xl overflow-hidden flex flex-col">
        <div class="p-6 border-b border-kvt-700/30 flex items-center justify-between">
            <h2 class="text-lg font-bold text-white" id="modalJurnalTitle">Tulis Jurnal Mengajar</h2>
            <button onclick="tutupModalJurnal()" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-xl"></i></button>
        </div>
        <div class="flex-1 overflow-y-auto p-6">
            <form id="formJurnal" method="POST" action="{{ route('pengajar.jurnal.simpan') }}">
                @csrf
                <input type="hidden" name="_method" id="jurnalMethod" value="POST">
                <div class="space-y-4">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Tanggal *</label>
                            <input type="date" name="tanggal" id="jurnalTanggal" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-3 py-2.5 text-white text-sm focus:border-violet-500/50 focus:outline-none">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Pertemuan Ke</label>
                            <input type="number" name="pertemuan_ke" id="jurnalPertemuan" min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-3 py-2.5 text-white text-sm focus:outline-none">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Jam Mulai</label>
                            <input type="time" name="jam_mulai" id="jurnalJamMulai" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-3 py-2.5 text-white text-sm focus:outline-none">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Jam Selesai</label>
                            <input type="time" name="jam_selesai" id="jurnalJamSelesai" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-3 py-2.5 text-white text-sm focus:outline-none">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Topik *</label>
                            <input type="text" name="topik" id="jurnalTopik" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:border-violet-500/50 focus:outline-none" placeholder="Topik yang dibahas hari ini">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Kelas *</label>
                            <select name="kelas_id" id="jurnalKelas" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none">
                                <option value="">Pilih Kelas</option>
                                @foreach($kelas as $kls)
                                    <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Metode</label>
                            <input type="text" name="metode" id="jurnalMetode" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none" placeholder="Ceramah, Diskusi...">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Jumlah Hadir</label>
                            <input type="number" name="jumlah_hadir" id="jurnalHadir" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none">
                        </div>
                        <div>
                            <label class="text-xs font-semibold text-gray-400 mb-1 block">Total Siswa</label>
                            <input type="number" name="jumlah_siswa" id="jurnalSiswa" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-gray-400 mb-1 block">Materi yang Dibahas</label>
                        <textarea name="materi_dibahas" id="jurnalMateri" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none" placeholder="Uraian materi yang disampaikan..."></textarea>
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-gray-400 mb-1 block">Catatan & Refleksi</label>
                        <textarea name="catatan" id="jurnalCatatan" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none" placeholder="Catatan tentang proses pembelajaran hari ini..."></textarea>
                    </div>

                    <div>
                        <label class="text-xs font-semibold text-gray-400 mb-1 block">Kendala (jika ada)</label>
                        <textarea name="kendala" id="jurnalKendala" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-white text-sm focus:outline-none" placeholder="Kendala yang dihadapi..."></textarea>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-6 pt-5 border-t border-kvt-700/30">
                    <button type="button" onclick="tutupModalJurnal()" class="px-5 py-2.5 rounded-xl text-sm text-gray-400 hover:text-white transition">Batal</button>
                    <button type="submit" class="bg-gradient-to-r from-violet-500 to-violet-600 text-white px-6 py-2.5 rounded-xl font-semibold text-sm hover:from-violet-400 hover:to-violet-500 transition shadow-lg">
                        <i class="fas fa-save mr-2"></i><span id="btnSimpanJurnal">Simpan Jurnal</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function setModeJurnal(mode) {
        document.getElementById('viewTimeline').classList.toggle('hidden', mode !== 'timeline');
        document.getElementById('viewExcelJurnal').classList.toggle('hidden', mode !== 'excel');
        document.getElementById('btnTimeline').className = mode === 'timeline'
            ? 'px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-violet-500/20 text-violet-400'
            : 'px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white';
        document.getElementById('btnExcelJurnal').className = mode === 'excel'
            ? 'px-3 py-1.5 rounded-lg text-xs font-semibold transition bg-violet-500/20 text-violet-400'
            : 'px-3 py-1.5 rounded-lg text-xs font-semibold transition text-gray-400 hover:text-white';
    }

    function filterJurnal() {
        const cari = document.getElementById('cariJurnal').value.toLowerCase();
        const kelas = document.getElementById('filterKelasJurnal').value;
        const bulan = document.getElementById('filterBulan').value;
        let count = 0;
        document.querySelectorAll('.jurnal-item').forEach(el => {
            const cocok = (!cari || el.dataset.nama.includes(cari)) &&
                          (!kelas || el.dataset.kelas == kelas) &&
                          (!bulan || el.dataset.bulan === bulan);
            el.style.display = cocok ? '' : 'none';
            if (cocok) count++;
        });
        document.getElementById('totalJurnal').textContent = count;
    }

    function bukaModalJurnal() {
        document.getElementById('formJurnal').action = "{{ route('pengajar.jurnal.simpan') }}";
        document.getElementById('jurnalMethod').value = 'POST';
        document.getElementById('modalJurnalTitle').textContent = 'Tulis Jurnal Mengajar';
        document.getElementById('btnSimpanJurnal').textContent = 'Simpan Jurnal';
        document.getElementById('formJurnal').reset();
        document.getElementById('jurnalTanggal').value = new Date().toISOString().split('T')[0];
        document.getElementById('modalJurnal').classList.remove('hidden');
    }

    function bukaModalEditJurnal(item) {
        document.getElementById('formJurnal').action = `/pengajar/jurnal/${item.id}`;
        document.getElementById('jurnalMethod').value = 'PUT';
        document.getElementById('modalJurnalTitle').textContent = 'Edit Jurnal';
        document.getElementById('btnSimpanJurnal').textContent = 'Perbarui Jurnal';
        document.getElementById('jurnalTanggal').value = item.tanggal ? item.tanggal.split('T')[0] : '';
        document.getElementById('jurnalPertemuan').value = item.pertemuan_ke || '';
        document.getElementById('jurnalJamMulai').value = item.jam_mulai || '';
        document.getElementById('jurnalJamSelesai').value = item.jam_selesai || '';
        document.getElementById('jurnalTopik').value = item.topik || '';
        document.getElementById('jurnalKelas').value = item.kelas_id || '';
        document.getElementById('jurnalMetode').value = item.metode || '';
        document.getElementById('jurnalHadir').value = item.jumlah_hadir || '';
        document.getElementById('jurnalSiswa').value = item.jumlah_siswa || '';
        document.getElementById('jurnalMateri').value = item.materi_dibahas || '';
        document.getElementById('jurnalCatatan').value = item.catatan || '';
        document.getElementById('jurnalKendala').value = item.kendala || '';
        document.getElementById('modalJurnal').classList.remove('hidden');
    }

    function tutupModalJurnal() { document.getElementById('modalJurnal').classList.add('hidden'); }

    function tambahBarisJurnal() {
        const tbody = document.getElementById('tabelBodyJurnal');
        const n = tbody.querySelectorAll('tr').length + 1;
        const tr = document.createElement('tr');
        tr.className = 'border-b border-kvt-700/20 hover:bg-kvt-800/30 transition baru';
        tr.innerHTML = `<td class="sticky left-0 bg-kvt-900 text-center text-gray-500 text-xs">${n}</td><td><input type="date" name="tanggal" value="${new Date().toISOString().split('T')[0]}" class="py-1"></td><td><input type="number" name="pertemuan_ke" min="1" class="py-1 text-center" value="${n}"></td><td><input type="text" name="topik" class="py-1" placeholder="Topik..."></td><td><select name="kelas_id" class="bg-transparent border-none text-white text-xs w-full focus:outline-none">@foreach($kelas as $kls)<option value="{{ $kls->id }}" class="bg-kvt-900">{{ $kls->nama }}</option>@endforeach</select></td><td><input type="text" name="jam_mulai" class="py-1 text-center" placeholder="08:00"></td><td><input type="number" name="jumlah_hadir" class="py-1 text-center"></td><td><input type="text" name="metode" class="py-1" placeholder="Metode"></td><td><input type="text" name="materi_dibahas" class="py-1" placeholder="Materi..."></td><td><textarea name="catatan" rows="1" class="py-1" placeholder="Catatan..."></textarea></td><td><input type="text" name="kendala" class="py-1"></td><td class="text-center"><button onclick="this.closest('tr').remove()" class="text-red-400 hover:text-red-300 p-1"><i class="fas fa-times text-xs"></i></button></td>`;
        tbody.appendChild(tr);
        tr.querySelector('[name=topik]').focus();
    }

    function simpanSemuaJurnal() {
        document.querySelectorAll('#tabelBodyJurnal tr.baru').forEach(async tr => {
            const fd = new FormData();
            fd.append('_token', '{{ csrf_token() }}');
            tr.querySelectorAll('input, textarea, select').forEach(el => { if (el.name) fd.append(el.name, el.value); });
            const res = await fetch("{{ route('pengajar.jurnal.simpan') }}", { method: 'POST', body: fd });
            if (res.ok) { tr.classList.remove('baru'); tr.style.background = 'rgba(139,92,246,0.1)'; }
        });
    }

    function imporJurnal(input) {
        const file = input.files[0]; if (!file) return;
        const fd = new FormData();
        fd.append('file', file);
        fd.append('_token', '{{ csrf_token() }}');
        fetch("{{ route('pengajar.jurnal.impor') }}", { method: 'POST', body: fd })
            .then(r => r.json()).then(d => { alert(d.message || 'Berhasil!'); location.reload(); })
            .catch(() => alert('Gagal mengimpor file.'));
    }
</script>
@endpush
