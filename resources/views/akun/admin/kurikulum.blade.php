@extends('tata-letak.dasbor')
@section('judul', 'Kelola Kurikulum - Admin KVT Hub')
@section('judul-halaman', 'Kelola Kurikulum')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari kurikulum..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="jenjang" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Jenjang</option>
                @foreach(['SD','SMP','SMA','D3','S1','S2','S3'] as $j)<option value="{{ $j }}" {{ request('jenjang')==$j?'selected':'' }}>{{ $j }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-kurikulum', 'judul' => 'Data Kurikulum'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Nama</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Jenjang</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Durasi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">SKS</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Mapel</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($kurikulum as $i => $k)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $kurikulum->firstItem() + $i }}</td>
                    <td class="px-4 py-3"><p class="text-white font-medium">{{ $k->nama }}</p>@if($k->akreditasi)<p class="text-xs text-kvt-400">Akreditasi: {{ $k->akreditasi }}</p>@endif</td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs bg-indigo-500/20 text-indigo-400 font-semibold">{{ $k->jenjang }}</span></td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $k->durasi_tahun ?? '-' }} thn</td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $k->total_sks ?? '-' }}</td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs bg-kvt-800 text-kvt-400 font-bold">{{ $k->mata_pelajaran_count }}</span></td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs font-semibold {{ ($k->status ?? 'aktif')=='aktif' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">{{ ucfirst($k->status ?? 'aktif') }}</span></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($k))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $k->id }}, '{{ addslashes($k->nama) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-book-reader text-3xl mb-3 block"></i>Belum ada kurikulum.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($kurikulum->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $kurikulum->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Kurikulum</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.kurikulum.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama Kurikulum *</label><input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Jenjang *</label>
                    <select name="jenjang" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['SD','SMP','SMA','D3','S1','S2','S3'] as $j)<option value="{{ $j }}">{{ $j }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Akreditasi</label><input type="text" name="akreditasi" placeholder="A, B, C..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (Tahun)</label><input type="number" name="durasi_tahun" min="1" max="8" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Total Semester</label><input type="number" name="total_semester" min="1" max="16" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Total SKS</label><input type="number" name="total_sks" min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
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
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Kurikulum</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Nama *</label><input type="text" name="nama" id="edit-nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Jenjang *</label>
                    <select name="jenjang" id="edit-jenjang" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['SD','SMP','SMA','D3','S1','S2','S3'] as $j)<option value="{{ $j }}">{{ $j }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Akreditasi</label><input type="text" name="akreditasi" id="edit-akreditasi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Durasi</label><input type="number" name="durasi_tahun" id="edit-durasi" min="1" max="8" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Semester</label><input type="number" name="total_semester" id="edit-semester" min="1" max="16" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">SKS</label><input type="number" name="total_sks" id="edit-sks" min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Status</label>
                <select name="status" id="edit-status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="aktif">Aktif</option><option value="nonaktif">Nonaktif</option><option value="arsip">Arsip</option>
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" id="edit-deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl">
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
            <h3 class="text-lg font-bold text-white mb-2">Hapus Kurikulum?</h3>
            <p class="text-gray-400 text-sm mb-6">Yakin menghapus <strong id="hapus-nama" class="text-white"></strong>?</p>
            <form id="form-hapus" method="POST">@csrf @method('DELETE')
                <div class="flex gap-2">
                    <button type="button" onclick="tutupModal('modal-hapus')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                    <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function bukaModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('flex')}
function tutupModal(id){document.getElementById(id).classList.add('hidden');document.getElementById(id).classList.remove('flex')}
function bukaEdit(d){
    document.getElementById('form-edit').action='/admin/kurikulum/'+d.id;
    document.getElementById('edit-nama').value=d.nama||'';
    document.getElementById('edit-jenjang').value=d.jenjang||'S1';
    document.getElementById('edit-akreditasi').value=d.akreditasi||'';
    document.getElementById('edit-durasi').value=d.durasi_tahun||'';
    document.getElementById('edit-semester').value=d.total_semester||'';
    document.getElementById('edit-sks').value=d.total_sks||'';
    document.getElementById('edit-status').value=d.status||'aktif';
    document.getElementById('edit-deskripsi').value=d.deskripsi||'';
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){document.getElementById('form-hapus').action='/admin/kurikulum/'+id;document.getElementById('hapus-nama').textContent=nama;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
