@extends('tata-letak.dasbor')
@section('judul', 'Kelola Nilai - Admin KVT Hub')
@section('judul-halaman', 'Kelola Nilai')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama mahasiswa/mata pelajaran..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-nilai', 'judul' => 'Data Nilai'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Input Nilai</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Mahasiswa</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Mata Pelajaran</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Tugas</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">UTS</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">UAS</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Akhir</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Huruf</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($nilai as $i => $n)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $nilai->firstItem() + $i }}</td>
                    <td class="px-4 py-3 text-white font-medium">{{ $n->user?->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-400">{{ $n->mataPelajaran?->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-gray-300">{{ $n->tugas ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-gray-300">{{ $n->uts ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-gray-300">{{ $n->uas ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="font-bold {{ ($n->nilai_akhir ?? 0) >= 70 ? 'text-green-400' : (($n->nilai_akhir ?? 0) >= 50 ? 'text-yellow-400' : 'text-red-400') }}">{{ number_format($n->nilai_akhir ?? 0, 1) }}</span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        @php $hw = match($n->huruf_mutu ?? 'E') { 'A','A-'=>'green','B+','B','B-'=>'blue','C+','C'=>'yellow',default=>'red' }; @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-{{ $hw }}-500/20 text-{{ $hw }}-400">{{ $n->huruf_mutu ?? '-' }}</span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($n))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $n->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="9" class="text-center py-12 text-gray-500"><i class="fas fa-star-half-alt text-3xl mb-3 block"></i>Belum ada data nilai.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($nilai->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $nilai->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah/Edit Nilai --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Input Nilai</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.nilai.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Mahasiswa *</label>
                <select name="user_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih --</option>
                    @foreach($pengguna as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Mata Pelajaran *</label>
                <select name="mata_pelajaran_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih --</option>
                    @foreach($mataPelajaran as $mp)<option value="{{ $mp->id }}">{{ $mp->kode }} - {{ $mp->nama }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-5 gap-2">
                <div><label class="block text-xs text-gray-400 mb-1">Tugas</label><input type="number" name="tugas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">UTS</label><input type="number" name="uts" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">UAS</label><input type="number" name="uas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">Praktik</label><input type="number" name="praktik" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">Partisipasi</label><input type="number" name="partisipasi" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <p class="text-xs text-gray-600">Nilai akhir & huruf mutu dihitung otomatis (Tugas 20%, UTS 25%, UAS 30%, Praktik 15%, Partisipasi 10%)</p>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Nilai</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div class="bg-kvt-800/30 rounded-lg p-3">
                <p class="text-sm text-white font-medium" id="edit-info"></p>
            </div>
            <input type="hidden" name="user_id" id="edit-user-id">
            <input type="hidden" name="mata_pelajaran_id" id="edit-mapel-id">
            <div class="grid grid-cols-5 gap-2">
                <div><label class="block text-xs text-gray-400 mb-1">Tugas</label><input type="number" name="tugas" id="edit-tugas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">UTS</label><input type="number" name="uts" id="edit-uts" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">UAS</label><input type="number" name="uas" id="edit-uas" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">Praktik</label><input type="number" name="praktik" id="edit-praktik" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-xs text-gray-400 mb-1">Partisipasi</label><input type="number" name="partisipasi" id="edit-partisipasi" min="0" max="100" step="0.1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-2 py-2 text-white text-sm text-center focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl"><div class="p-6 text-center">
        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
        <h3 class="text-lg font-bold text-white mb-2">Hapus Nilai?</h3>
        <p class="text-gray-400 text-sm mb-6">Data nilai ini akan dihapus permanen.</p>
        <form id="form-hapus" method="POST">@csrf @method('DELETE')<div class="flex gap-2">
            <button type="button" onclick="tutupModal('modal-hapus')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
            <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Ya, Hapus</button>
        </div></form>
    </div></div>
</div>

@push('scripts')
<script>
function bukaModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('flex')}
function tutupModal(id){document.getElementById(id).classList.add('hidden');document.getElementById(id).classList.remove('flex')}
function bukaEdit(n){
    document.getElementById('form-edit').action='/admin/nilai/'+n.id;
    document.getElementById('edit-info').textContent=(n.user?.name||'-')+' — '+(n.mata_pelajaran?.nama||'-');
    document.getElementById('edit-user-id').value=n.user_id;
    document.getElementById('edit-mapel-id').value=n.mata_pelajaran_id;
    document.getElementById('edit-tugas').value=n.tugas||'';
    document.getElementById('edit-uts').value=n.uts||'';
    document.getElementById('edit-uas').value=n.uas||'';
    document.getElementById('edit-praktik').value=n.praktik||'';
    document.getElementById('edit-partisipasi').value=n.partisipasi||'';
    bukaModal('modal-edit');
}
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/nilai/'+id;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
