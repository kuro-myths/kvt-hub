@extends('tata-letak.dasbor')

@section('judul', 'Nilai & Penilaian - KVT Hub')
@section('judul-halaman', 'Nilai & Penilaian')

@push('styles')
<style>
    .tabel-nilai { font-family: 'Consolas', 'Courier New', monospace; font-size: 12px; border-collapse: collapse; }
    .tabel-nilai thead th { position: sticky; top: 0; z-index: 10; background: #0f172a; color: #93c5fd; font-weight: 600; padding: 8px 10px; white-space: nowrap; border-bottom: 2px solid rgba(71,85,105,0.5); }
    .tabel-nilai td { padding: 4px 8px; border: 1px solid rgba(71,85,105,0.3); transition: background 0.1s; }
    .tabel-nilai td:focus-within { outline: 2px solid #f59e0b; outline-offset: -1px; background: rgba(245,158,11,0.05); }
    .tabel-nilai input, .tabel-nilai select { background: transparent; border: none; color: white; width: 100%; font-family: inherit; font-size: inherit; text-align: center; }
    .tabel-nilai input:focus { outline: none; }
    .tabel-nilai input[type=number] { -moz-appearance: textfield; }
    .tabel-nilai input::-webkit-outer-spin-button, .tabel-nilai input::-webkit-inner-spin-button { -webkit-appearance: none; }
    .nilai-a { color: #4ade80; font-weight: 700; }
    .nilai-b { color: #60a5fa; font-weight: 600; }
    .nilai-c { color: #fbbf24; font-weight: 600; }
    .nilai-d { color: #f97316; font-weight: 600; }
    .nilai-e { color: #ef4444; font-weight: 700; }
    .frozen-col { position: sticky; left: 0; z-index: 5; background: #0f172a; }
    .frozen-col-2 { position: sticky; left: 40px; z-index: 5; background: #0f172a; }
    .row-even { background: rgba(30,41,59,0.3); }
    .stat-bar { height: 6px; border-radius: 999px; transition: width 0.5s ease; }
    @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 0 0 rgba(245,158,11,0.3); } 50% { box-shadow: 0 0 12px 2px rgba(245,158,11,0.2); } }
    .auto-save-indicator { animation: pulse-glow 2s infinite; }
</style>
@endpush

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-full mx-auto">
        {{-- Header --}}
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-6" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white flex items-center gap-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-600 rounded-xl flex items-center justify-center">
                        <i class="fas fa-star-half-alt text-white text-sm"></i>
                    </div>
                    Nilai & Penilaian
                </h1>
                <p class="text-gray-400 text-sm mt-1">Input nilai siswa mode spreadsheet — auto-hitung, ekspor, impor</p>
            </div>
            <div class="flex items-center gap-2 flex-wrap">
                <div class="relative">
                    <button onclick="this.nextElementSibling.classList.toggle('hidden')" class="bg-kvt-800/50 border border-kvt-700/30 text-gray-300 hover:text-white px-4 py-2 rounded-xl text-sm transition">
                        <i class="fas fa-file-export mr-1"></i>Ekspor/Impor <i class="fas fa-chevron-down ml-1 text-xs"></i>
                    </button>
                    <div class="hidden absolute right-0 mt-2 w-56 bg-kvt-900 border border-kvt-700/30 rounded-xl shadow-2xl z-50 overflow-hidden">
                        <button onclick="window.location.href='?ekspor=excel'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-excel text-green-400 w-5"></i> Ekspor Excel
                        </button>
                        <button onclick="window.location.href='?ekspor=csv'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-csv text-amber-400 w-5"></i> Ekspor CSV
                        </button>
                        <button onclick="window.location.href='?ekspor=pdf'" class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3">
                            <i class="fas fa-file-pdf text-red-400 w-5"></i> Ekspor PDF (Raport)
                        </button>
                        <hr class="border-kvt-700/30">
                        <label class="w-full text-left px-4 py-3 text-sm text-gray-300 hover:bg-kvt-800/50 hover:text-white flex items-center gap-3 cursor-pointer">
                            <i class="fas fa-file-upload text-indigo-400 w-5"></i> Impor dari Excel
                            <input type="file" accept=".xlsx,.csv" onchange="imporNilai(this)" class="hidden">
                        </label>
                    </div>
                </div>

                <button onclick="simpanSemuaNilai()" id="btnSimpanNilai" class="bg-gradient-to-r from-amber-500 to-amber-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-amber-400 hover:to-amber-500 transition shadow-lg text-sm">
                    <i class="fas fa-save mr-2"></i>Simpan Nilai
                </button>
            </div>
        </div>

        {{-- Kelas Selector --}}
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4 mb-6 flex flex-wrap items-center gap-4" data-aos="fade-up" data-aos-delay="50">
            <select id="pilihKelas" onchange="muatNilaiKelas()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-2.5 text-sm text-white focus:border-amber-500/50 focus:outline-none min-w-[200px]">
                <option value="">Pilih Kelas</option>
                @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}" {{ request('kelas_id') == $kls->id ? 'selected' : '' }}>{{ $kls->nama }} ({{ $kls->anggota_count ?? 0 }} siswa)</option>
                @endforeach
            </select>

            <div class="flex items-center gap-2 text-xs text-gray-500">
                <span id="statusSimpan" class="hidden bg-green-500/20 text-green-400 px-3 py-1.5 rounded-lg"><i class="fas fa-check mr-1"></i>Tersimpan</span>
                <span id="statusUbah" class="hidden bg-amber-500/20 text-amber-400 px-3 py-1.5 rounded-lg auto-save-indicator"><i class="fas fa-pen mr-1"></i>Ada perubahan</span>
            </div>

            @if(isset($kelasAktif) && $kelasAktif)
                <div class="ml-auto flex items-center gap-4 text-xs">
                    <span class="text-gray-500"><i class="fas fa-users mr-1"></i>{{ $siswa->count() }} siswa</span>
                    <span class="text-green-400"><i class="fas fa-chart-line mr-1"></i>Rata-rata: <strong>{{ number_format($rataRata ?? 0, 1) }}</strong></span>
                </div>
            @endif
        </div>

        {{-- Statistik Ringkas --}}
        @if(isset($siswa) && $siswa->count() > 0)
        <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6" data-aos="fade-up" data-aos-delay="100">
            @php
                $hurufMutu = ['A' => 0, 'B' => 0, 'C' => 0, 'D' => 0, 'E' => 0];
                foreach($nilaiData as $n) { $h = $n->huruf_mutu ?? '-'; if(isset($hurufMutu[$h])) $hurufMutu[$h]++; }
                $total = max(array_sum($hurufMutu), 1);
            @endphp
            @foreach($hurufMutu as $huruf => $jml)
                @php
                    $warna = match($huruf) { 'A' => 'green', 'B' => 'blue', 'C' => 'amber', 'D' => 'orange', 'E' => 'red' };
                    $persen = round(($jml / $total) * 100);
                @endphp
                <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-xl p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-{{ $warna }}-400 font-black text-2xl">{{ $huruf }}</span>
                        <span class="text-gray-500 text-xs">{{ $jml }} siswa</span>
                    </div>
                    <div class="w-full bg-kvt-800 rounded-full h-1.5">
                        <div class="stat-bar bg-{{ $warna }}-500" style="width: {{ $persen }}%"></div>
                    </div>
                </div>
            @endforeach
        </div>
        @endif

        {{-- ==================== SPREADSHEET NILAI ==================== --}}
        @if(isset($siswa) && $siswa->count() > 0)
        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up" data-aos-delay="150">
            <div class="flex items-center justify-between p-3 bg-kvt-800/50 border-b border-kvt-700/30">
                <div class="flex items-center gap-3">
                    <span class="text-amber-400 text-sm font-semibold"><i class="fas fa-table mr-1"></i>Spreadsheet Nilai — {{ $kelasAktif->nama }}</span>
                    <span class="text-gray-500 text-xs">Tab/Enter untuk pindah sel</span>
                </div>
                <div class="flex items-center gap-2 text-xs">
                    <label class="flex items-center gap-1.5 text-gray-400 cursor-pointer">
                        <input type="checkbox" id="autoHitung" checked onchange="toggleAutoHitung()" class="rounded accent-amber-500">
                        Auto Hitung
                    </label>
                    <span class="text-gray-600">|</span>
                    <button onclick="resetNilai()" class="text-red-400/50 hover:text-red-400 transition">Reset</button>
                </div>
            </div>
            <div class="overflow-x-auto max-h-[65vh]">
                <table class="tabel-nilai w-full">
                    <thead>
                        <tr>
                            <th class="frozen-col w-10 text-center">#</th>
                            <th class="frozen-col-2 min-w-[180px] text-left">Nama Siswa</th>
                            <th class="min-w-[80px]">Tugas<br><span class="text-[10px] text-gray-500 font-normal">({{ $bobot['tugas'] ?? 20 }}%)</span></th>
                            <th class="min-w-[80px]">UTS<br><span class="text-[10px] text-gray-500 font-normal">({{ $bobot['uts'] ?? 25 }}%)</span></th>
                            <th class="min-w-[80px]">UAS<br><span class="text-[10px] text-gray-500 font-normal">({{ $bobot['uas'] ?? 30 }}%)</span></th>
                            <th class="min-w-[80px]">Praktik<br><span class="text-[10px] text-gray-500 font-normal">({{ $bobot['praktik'] ?? 15 }}%)</span></th>
                            <th class="min-w-[80px]">Partisipasi<br><span class="text-[10px] text-gray-500 font-normal">({{ $bobot['partisipasi'] ?? 10 }}%)</span></th>
                            <th class="min-w-[90px] bg-amber-500/10">N.Akhir</th>
                            <th class="min-w-[60px] bg-amber-500/10">Huruf</th>
                            <th class="min-w-[60px] bg-amber-500/10">Mutu</th>
                            <th class="min-w-[100px]">Status</th>
                            <th class="min-w-[150px]">Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($siswa as $i => $s)
                            @php
                                $nilai = $nilaiData->firstWhere('user_id', $s->id);
                            @endphp
                            <tr class="{{ $i % 2 === 0 ? 'row-even' : '' }} hover:bg-kvt-800/20" data-user="{{ $s->id }}">
                                <td class="frozen-col text-center text-gray-500">{{ $i + 1 }}</td>
                                <td class="frozen-col-2 text-white text-xs font-medium">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-[10px] font-bold text-white">
                                            {{ strtoupper(substr($s->name, 0, 1)) }}
                                        </div>
                                        {{ $s->name }}
                                    </div>
                                </td>
                                <td><input type="number" name="tugas" min="0" max="100" value="{{ $nilai->tugas ?? '' }}" onchange="hitungNilai(this)" class="py-1" placeholder="—"></td>
                                <td><input type="number" name="uts" min="0" max="100" value="{{ $nilai->uts ?? '' }}" onchange="hitungNilai(this)" class="py-1" placeholder="—"></td>
                                <td><input type="number" name="uas" min="0" max="100" value="{{ $nilai->uas ?? '' }}" onchange="hitungNilai(this)" class="py-1" placeholder="—"></td>
                                <td><input type="number" name="praktik" min="0" max="100" value="{{ $nilai->praktik ?? '' }}" onchange="hitungNilai(this)" class="py-1" placeholder="—"></td>
                                <td><input type="number" name="partisipasi" min="0" max="100" value="{{ $nilai->partisipasi ?? '' }}" onchange="hitungNilai(this)" class="py-1" placeholder="—"></td>
                                <td class="bg-amber-500/5 text-center font-bold text-white nilai-akhir">{{ $nilai->nilai_akhir ? number_format($nilai->nilai_akhir, 1) : '—' }}</td>
                                <td class="bg-amber-500/5 text-center font-bold huruf-mutu {{ 'nilai-' . strtolower($nilai->huruf_mutu ?? 'e') }}">{{ $nilai->huruf_mutu ?? '—' }}</td>
                                <td class="bg-amber-500/5 text-center text-gray-400 bobot-mutu">{{ $nilai->bobot_mutu ?? '—' }}</td>
                                <td>
                                    <select name="status" class="bg-transparent border-none text-xs w-full focus:outline-none {{ ($nilai->status ?? '') === 'final' ? 'text-green-400' : 'text-gray-400' }}">
                                        <option value="proses" {{ ($nilai->status ?? 'proses') === 'proses' ? 'selected' : '' }} class="bg-kvt-900">Proses</option>
                                        <option value="final" {{ ($nilai->status ?? '') === 'final' ? 'selected' : '' }} class="bg-kvt-900">Final</option>
                                        <option value="mengulang" {{ ($nilai->status ?? '') === 'mengulang' ? 'selected' : '' }} class="bg-kvt-900">Mengulang</option>
                                    </select>
                                </td>
                                <td><input type="text" name="catatan" value="{{ $nilai->catatan ?? '' }}" class="py-1 text-left text-gray-400" placeholder="Catatan..."></td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="bg-kvt-800/50 border-t-2 border-kvt-700/50">
                            <td class="frozen-col"></td>
                            <td class="frozen-col-2 text-xs text-gray-400 font-semibold">RATA-RATA</td>
                            <td class="text-center text-xs text-gray-400 avg-tugas">—</td>
                            <td class="text-center text-xs text-gray-400 avg-uts">—</td>
                            <td class="text-center text-xs text-gray-400 avg-uas">—</td>
                            <td class="text-center text-xs text-gray-400 avg-praktik">—</td>
                            <td class="text-center text-xs text-gray-400 avg-partisipasi">—</td>
                            <td class="text-center text-xs font-bold text-amber-400 avg-akhir">—</td>
                            <td colspan="4"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @else
            <div class="text-center py-16 bg-kvt-900/50 border border-kvt-700/30 rounded-2xl">
                <div class="w-24 h-24 bg-kvt-800/50 rounded-3xl flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-star-half-alt text-5xl text-gray-700"></i>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Pilih kelas untuk input nilai</h3>
                <p class="text-gray-500 max-w-md mx-auto">Pilih kelas dari dropdown di atas untuk melihat dan mengelola nilai siswa dalam mode spreadsheet</p>
            </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
    const bobot = {
        tugas: {{ $bobot['tugas'] ?? 20 }},
        uts: {{ $bobot['uts'] ?? 25 }},
        uas: {{ $bobot['uas'] ?? 30 }},
        praktik: {{ $bobot['praktik'] ?? 15 }},
        partisipasi: {{ $bobot['partisipasi'] ?? 10 }},
    };

    function muatNilaiKelas() {
        const kelasId = document.getElementById('pilihKelas').value;
        if (kelasId) window.location.href = `{{ route('pengajar.nilai.index') }}?kelas_id=${kelasId}`;
    }

    function hitungNilai(input) {
        if (!document.getElementById('autoHitung').checked) return;
        const tr = input.closest('tr');
        const tugas = parseFloat(tr.querySelector('[name=tugas]').value) || 0;
        const uts = parseFloat(tr.querySelector('[name=uts]').value) || 0;
        const uas = parseFloat(tr.querySelector('[name=uas]').value) || 0;
        const praktik = parseFloat(tr.querySelector('[name=praktik]').value) || 0;
        const partisipasi = parseFloat(tr.querySelector('[name=partisipasi]').value) || 0;

        const nilaiAkhir = (tugas * bobot.tugas + uts * bobot.uts + uas * bobot.uas + praktik * bobot.praktik + partisipasi * bobot.partisipasi) / 100;

        let huruf, bobotMutu;
        if (nilaiAkhir >= 85) { huruf = 'A'; bobotMutu = 4.0; }
        else if (nilaiAkhir >= 70) { huruf = 'B'; bobotMutu = 3.0; }
        else if (nilaiAkhir >= 55) { huruf = 'C'; bobotMutu = 2.0; }
        else if (nilaiAkhir >= 40) { huruf = 'D'; bobotMutu = 1.0; }
        else { huruf = 'E'; bobotMutu = 0.0; }

        tr.querySelector('.nilai-akhir').textContent = nilaiAkhir.toFixed(1);
        const hurufEl = tr.querySelector('.huruf-mutu');
        hurufEl.textContent = huruf;
        hurufEl.className = `bg-amber-500/5 text-center font-bold huruf-mutu nilai-${huruf.toLowerCase()}`;
        tr.querySelector('.bobot-mutu').textContent = bobotMutu.toFixed(1);

        hitungRataRata();
        tandaiPerubahan();
    }

    function hitungRataRata() {
        const fields = ['tugas', 'uts', 'uas', 'praktik', 'partisipasi'];
        fields.forEach(f => {
            const vals = [...document.querySelectorAll(`[name=${f}]`)].map(i => parseFloat(i.value)).filter(v => !isNaN(v));
            const avg = vals.length > 0 ? (vals.reduce((a, b) => a + b, 0) / vals.length).toFixed(1) : '—';
            document.querySelector(`.avg-${f}`).textContent = avg;
        });
        const akhirs = [...document.querySelectorAll('.nilai-akhir')].map(el => parseFloat(el.textContent)).filter(v => !isNaN(v));
        document.querySelector('.avg-akhir').textContent = akhirs.length > 0 ? (akhirs.reduce((a, b) => a + b, 0) / akhirs.length).toFixed(1) : '—';
    }

    function tandaiPerubahan() {
        document.getElementById('statusUbah').classList.remove('hidden');
        document.getElementById('statusSimpan').classList.add('hidden');
    }

    function simpanSemuaNilai() {
        const rows = document.querySelectorAll('.tabel-nilai tbody tr');
        const data = [];
        rows.forEach(tr => {
            data.push({
                user_id: tr.dataset.user,
                tugas: tr.querySelector('[name=tugas]')?.value || null,
                uts: tr.querySelector('[name=uts]')?.value || null,
                uas: tr.querySelector('[name=uas]')?.value || null,
                praktik: tr.querySelector('[name=praktik]')?.value || null,
                partisipasi: tr.querySelector('[name=partisipasi]')?.value || null,
                status: tr.querySelector('[name=status]')?.value || 'proses',
                catatan: tr.querySelector('[name=catatan]')?.value || '',
            });
        });

        fetch("{{ route('pengajar.nilai.simpan') }}", {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ kelas_id: '{{ request('kelas_id') }}', nilai: data })
        }).then(r => r.json()).then(d => {
            document.getElementById('statusSimpan').classList.remove('hidden');
            document.getElementById('statusUbah').classList.add('hidden');
            document.getElementById('btnSimpanNilai').innerHTML = '<i class="fas fa-check mr-2"></i>Tersimpan!';
            setTimeout(() => { document.getElementById('btnSimpanNilai').innerHTML = '<i class="fas fa-save mr-2"></i>Simpan Nilai'; }, 2000);
        }).catch(() => alert('Gagal menyimpan nilai.'));
    }

    function resetNilai() {
        if (!confirm('Reset semua nilai di halaman ini?')) return;
        document.querySelectorAll('.tabel-nilai tbody input[type=number]').forEach(i => i.value = '');
        document.querySelectorAll('.nilai-akhir, .huruf-mutu, .bobot-mutu').forEach(el => el.textContent = '—');
        hitungRataRata();
    }

    function toggleAutoHitung() {}

    function imporNilai(input) {
        const file = input.files[0]; if (!file) return;
        const fd = new FormData();
        fd.append('file', file);
        fd.append('_token', '{{ csrf_token() }}');
        fd.append('kelas_id', '{{ request('kelas_id') }}');
        fetch("{{ route('pengajar.nilai.impor') }}", { method: 'POST', body: fd })
            .then(r => r.json()).then(d => { alert(d.message || 'Berhasil!'); location.reload(); })
            .catch(() => alert('Gagal mengimpor.'));
    }

    // Keyboard navigation
    document.addEventListener('keydown', e => {
        if (e.target.tagName === 'INPUT' && e.target.type === 'number') {
            const td = e.target.closest('td');
            const tr = td.closest('tr');
            if (e.key === 'Tab' || e.key === 'Enter') {
                e.preventDefault();
                const nextInput = td.nextElementSibling?.querySelector('input, select');
                if (nextInput) nextInput.focus();
                else {
                    const nextRow = tr.nextElementSibling?.querySelector('td:nth-child(3) input');
                    if (nextRow) nextRow.focus();
                }
            }
            if (e.key === 'ArrowDown') { const idx = td.cellIndex; tr.nextElementSibling?.cells[idx]?.querySelector('input')?.focus(); }
            if (e.key === 'ArrowUp') { const idx = td.cellIndex; tr.previousElementSibling?.cells[idx]?.querySelector('input')?.focus(); }
        }
    });

    // Initial calculation
    document.addEventListener('DOMContentLoaded', hitungRataRata);
</script>
@endpush
