@extends('tata-letak.dasbor')
@section('judul', 'Kelola Bobot Nilai - Admin KVT Hub')
@section('judul-halaman', 'Bobot Nilai')

@section('konten')
<div class="max-w-5xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <select name="kurikulum_id" onchange="this.form.submit()" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kurikulum</option>
                @foreach($kurikulum as $k)<option value="{{ $k->id }}" {{ request('kurikulum_id')==$k->id?'selected':'' }}>{{ $k->nama }}</option>@endforeach
            </select>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Bobot</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Huruf</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Bobot</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Batas Bawah</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Batas Atas</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kurikulum</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Keterangan</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($bobotNilai as $i => $b)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $i + 1 }}</td>
                    <td class="px-4 py-3 text-center">
                        @php $cl = match($b->huruf) { 'A','A-'=>'green','B+','B','B-'=>'blue','C+','C'=>'yellow',default=>'red' }; @endphp
                        <span class="px-3 py-1 rounded-full text-sm font-bold bg-{{ $cl }}-500/20 text-{{ $cl }}-400">{{ $b->huruf }}</span>
                    </td>
                    <td class="px-4 py-3 text-center text-white font-semibold">{{ number_format($b->bobot, 2) }}</td>
                    <td class="px-4 py-3 text-center text-gray-300">{{ $b->batas_bawah }}</td>
                    <td class="px-4 py-3 text-center text-gray-300">{{ $b->batas_atas }}</td>
                    <td class="px-4 py-3 text-gray-400">{{ $b->kurikulum?->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-400">{{ $b->keterangan ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($b))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $b->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-balance-scale text-3xl mb-3 block"></i>Belum ada data bobot nilai.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4 bg-kvt-900/60 border border-kvt-700/20 rounded-xl p-4">
        <h4 class="text-sm font-semibold text-gray-400 mb-2"><i class="fas fa-info-circle mr-1"></i> Panduan Bobot Nilai</h4>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 text-xs text-gray-500">
            <div>A = 4.00 (85-100)</div><div>B+ = 3.50 (80-84)</div><div>B = 3.00 (75-79)</div><div>B- = 2.75 (70-74)</div>
            <div>C+ = 2.50 (65-69)</div><div>C = 2.00 (60-64)</div><div>D = 1.00 (50-59)</div><div>E = 0.00 (0-49)</div>
        </div>
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Bobot Nilai</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.bobot-nilai.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Kurikulum *</label>
                <select name="kurikulum_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih --</option>
                    @foreach($kurikulum as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Huruf *</label>
                    <select name="huruf" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['A','A-','B+','B','B-','C+','C','D','E'] as $h)<option value="{{ $h }}">{{ $h }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Bobot *</label><input type="number" name="bobot" step="0.01" min="0" max="4" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div></div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Batas Bawah *</label><input type="number" name="batas_bawah" min="0" max="100" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Batas Atas *</label><input type="number" name="batas_atas" min="0" max="100" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Keterangan</label><input type="text" name="keterangan" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Sangat Baik, Baik, dst."></div>
            <p class="text-xs text-gray-600">Jika huruf+kurikulum sudah ada, data akan diperbarui (upsert).</p>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Bobot Nilai</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Kurikulum *</label>
                <select name="kurikulum_id" id="edit-kurikulum-id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    @foreach($kurikulum as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Huruf *</label>
                    <select name="huruf" id="edit-huruf" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['A','A-','B+','B','B-','C+','C','D','E'] as $h)<option value="{{ $h }}">{{ $h }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Bobot *</label><input type="number" name="bobot" id="edit-bobot" step="0.01" min="0" max="4" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div></div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Batas Bawah *</label><input type="number" name="batas_bawah" id="edit-batas-bawah" min="0" max="100" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Batas Atas *</label><input type="number" name="batas_atas" id="edit-batas-atas" min="0" max="100" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Keterangan</label><input type="text" name="keterangan" id="edit-keterangan" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
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
        <h3 class="text-lg font-bold text-white mb-2">Hapus Bobot Nilai?</h3>
        <p class="text-gray-400 text-sm mb-6">Data bobot nilai ini akan dihapus permanen.</p>
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
function bukaEdit(b){
    document.getElementById('form-edit').action='/admin/bobot-nilai/'+b.id;
    document.getElementById('edit-kurikulum-id').value=b.kurikulum_id||'';
    document.getElementById('edit-huruf').value=b.huruf||'';
    document.getElementById('edit-bobot').value=b.bobot||'';
    document.getElementById('edit-batas-bawah').value=b.batas_bawah||'';
    document.getElementById('edit-batas-atas').value=b.batas_atas||'';
    document.getElementById('edit-keterangan').value=b.keterangan||'';
    bukaModal('modal-edit');
}
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/bobot-nilai/'+id;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
