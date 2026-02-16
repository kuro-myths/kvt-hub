@extends('tata-letak.dasbor')
@section('judul', 'Kelola Kerja Sama - Admin KVT Hub')
@section('judul-halaman', 'Kelola Kerja Sama')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama mitra..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="tipe" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Tipe</option>
                @foreach(['sponsor','akademik','industri','komunitas','pemerintah'] as $t)<option value="{{ $t }}" {{ request('tipe')==$t?'selected':'' }}>{{ ucfirst($t) }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Mitra</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Mitra</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Tipe</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Tier</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Beranda</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($kerjaSama as $i => $ks)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $kerjaSama->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($ks->logo)<img src="{{ asset('storage/'.$ks->logo) }}" class="w-10 h-10 rounded-lg object-contain bg-white p-1">@else<div class="w-10 h-10 bg-kvt-800 rounded-lg flex items-center justify-center"><i class="fas fa-handshake text-gray-600"></i></div>@endif
                            <div><p class="text-white font-medium">{{ $ks->nama }}</p>@if($ks->website)<p class="text-xs text-kvt-400">{{ parse_url($ks->website, PHP_URL_HOST) }}</p>@endif</div>
                        </div>
                    </td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs bg-kvt-800 text-gray-300">{{ ucfirst($ks->tipe ?? '-') }}</span></td>
                    <td class="px-4 py-3 text-gray-400">{{ ucfirst($ks->tier ?? '-') }}</td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs font-semibold {{ $ks->aktif ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">{{ $ks->aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
                    <td class="px-4 py-3 text-center"><i class="fas {{ $ks->tampil_beranda ? 'fa-check-circle text-green-400' : 'fa-times-circle text-gray-600' }}"></i></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($ks))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $ks->id }}, '{{ addslashes($ks->nama) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-handshake text-3xl mb-3 block"></i>Belum ada mitra kerja sama.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($kerjaSama->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $kerjaSama->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Mitra</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.kerja-sama.simpan') }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama Mitra *</label><input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Tipe</label>
                    <select name="tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['sponsor','akademik','industri','komunitas','pemerintah'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Tier</label>
                    <select name="tier" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['platinum','gold','silver','bronze'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Website</label><input type="url" name="website" placeholder="https://..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Logo</label><input type="file" name="logo" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="aktif" checked class="rounded bg-kvt-800 border-kvt-700"> Aktif</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_beranda" class="rounded bg-kvt-800 border-kvt-700"> Tampil di Beranda</label>
            </div>
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
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Mitra</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Nama Mitra *</label><input type="text" name="nama" id="edit-nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" id="edit-deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Tipe</label>
                    <select name="tipe" id="edit-tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['sponsor','akademik','industri','komunitas','pemerintah'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Tier</label>
                    <select name="tier" id="edit-tier" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['platinum','gold','silver','bronze'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Website</label><input type="url" name="website" id="edit-website" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Ganti Logo</label><input type="file" name="logo" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="aktif" id="edit-aktif" class="rounded bg-kvt-800 border-kvt-700"> Aktif</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_beranda" id="edit-tampil_beranda" class="rounded bg-kvt-800 border-kvt-700"> Tampil di Beranda</label>
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
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl">
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
            <h3 class="text-lg font-bold text-white mb-2">Hapus Mitra?</h3>
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
    document.getElementById('form-edit').action='/admin/kerja-sama/'+d.id;
    document.getElementById('edit-nama').value=d.nama||'';
    document.getElementById('edit-deskripsi').value=d.deskripsi||'';
    document.getElementById('edit-tipe').value=d.tipe||'sponsor';
    document.getElementById('edit-tier').value=d.tier||'bronze';
    document.getElementById('edit-website').value=d.website||'';
    document.getElementById('edit-aktif').checked=!!d.aktif;
    document.getElementById('edit-tampil_beranda').checked=!!d.tampil_beranda;
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){document.getElementById('form-hapus').action='/admin/kerja-sama/'+id;document.getElementById('hapus-nama').textContent=nama;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
