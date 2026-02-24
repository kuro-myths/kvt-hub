@extends('tata-letak.dasbor')
@section('judul', 'Mata Pelajaran - Admin KVT Hub')
@section('judul-halaman', 'Kelola Mata Pelajaran')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama/kode mapel..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="kurikulum_id" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kurikulum</option>
                @foreach($kurikulum as $k)<option value="{{ $k->id }}" {{ request('kurikulum_id')==$k->id?'selected':'' }}>{{ $k->nama }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-mata-pelajaran', 'judul' => 'Data Mata Pelajaran'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kode</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Nama</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kurikulum</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">SKS</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Semester</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Tipe</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($mataPelajaran as $i => $m)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $mataPelajaran->firstItem() + $i }}</td>
                    <td class="px-4 py-3"><span class="font-mono text-kvt-400 text-xs bg-kvt-800 px-2 py-1 rounded">{{ $m->kode }}</span></td>
                    <td class="px-4 py-3 text-white font-medium">{{ $m->nama }}</td>
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $m->kurikulum?->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-white font-bold">{{ $m->sks }}</td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $m->semester ?? '-' }}</td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs bg-purple-500/20 text-purple-400">{{ ucfirst($m->tipe ?? 'wajib') }}</span></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($m))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $m->id }}, '{{ addslashes($m->nama) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-list-alt text-3xl mb-3 block"></i>Belum ada mata pelajaran.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($mataPelajaran->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $mataPelajaran->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Mata Pelajaran</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.mata-pelajaran.simpan') }}" class="p-5 space-y-4">@csrf
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kode *</label><input type="text" name="kode" required placeholder="MK001" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">SKS *</label><input type="number" name="sks" required min="1" max="10" value="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Nama *</label><input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kurikulum *</label>
                    <select name="kurikulum_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach($kurikulum as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Semester</label><input type="number" name="semester" min="1" max="14" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Tipe</label>
                    <select name="tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="wajib">Wajib</option><option value="pilihan">Pilihan</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
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
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Mata Pelajaran</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kode *</label><input type="text" name="kode" id="edit-kode" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">SKS *</label><input type="number" name="sks" id="edit-sks" required min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Nama *</label><input type="text" name="nama" id="edit-nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kurikulum</label>
                    <select name="kurikulum_id" id="edit-kurikulum" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach($kurikulum as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Semester</label><input type="number" name="semester" id="edit-semester" min="1" max="14" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Tipe</label>
                    <select name="tipe" id="edit-tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="wajib">Wajib</option><option value="pilihan">Pilihan</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" id="edit-deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
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
        <h3 class="text-lg font-bold text-white mb-2">Hapus Mata Pelajaran?</h3>
        <p class="text-gray-400 text-sm mb-6">Yakin menghapus <strong id="hapus-nama" class="text-white"></strong>?</p>
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
function bukaEdit(d){
    document.getElementById('form-edit').action='/admin/mata-pelajaran/'+d.id;
    document.getElementById('edit-kode').value=d.kode||'';
    document.getElementById('edit-nama').value=d.nama||'';
    document.getElementById('edit-sks').value=d.sks||3;
    document.getElementById('edit-kurikulum').value=d.kurikulum_id||'';
    document.getElementById('edit-semester').value=d.semester||'';
    document.getElementById('edit-tipe').value=d.tipe||'wajib';
    document.getElementById('edit-deskripsi').value=d.deskripsi||'';
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){document.getElementById('form-hapus').action='/admin/mata-pelajaran/'+id;document.getElementById('hapus-nama').textContent=nama;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
