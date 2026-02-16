@extends('tata-letak.dasbor')
@section('judul', 'Kelola Berita - Admin KVT Hub')
@section('judul-halaman', 'Kelola Berita')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul berita..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="draf" {{ request('status')=='draf'?'selected':'' }}>Draf</option>
                <option value="terbit" {{ request('status')=='terbit'?'selected':'' }}>Terbit</option>
            </select>
            <select name="kategori" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $k)<option value="{{ $k }}" {{ request('kategori')==$k?'selected':'' }}>{{ $k }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Berita</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kategori</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Dilihat</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Tanggal</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($berita as $i => $b)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $berita->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($b->gambar)<img src="{{ asset('storage/'.$b->gambar) }}" class="w-10 h-10 rounded-lg object-cover">@else<div class="w-10 h-10 bg-kvt-800 rounded-lg flex items-center justify-center"><i class="fas fa-newspaper text-gray-600"></i></div>@endif
                            <div><p class="text-white font-medium">{{ Str::limit($b->judul, 50) }}</p><p class="text-xs text-gray-500">{{ Str::limit($b->ringkasan ?? strip_tags($b->konten), 60) }}</p></div>
                        </div>
                    </td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs bg-kvt-800 text-gray-300">{{ $b->kategori ?? '-' }}</span></td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $b->status=='terbit' ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }}">{{ ucfirst($b->status ?? 'draf') }}</span>
                    </td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ number_format($b->dilihat ?? 0) }}</td>
                    <td class="px-4 py-3 text-center text-gray-500 text-xs">{{ $b->created_at?->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($b))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $b->id }}, '{{ addslashes($b->judul) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-newspaper text-3xl mb-3 block"></i>Belum ada berita.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($berita->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $berita->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Berita</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.berita.simpan') }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label><input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Ringkasan</label><textarea name="ringkasan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Ringkasan singkat berita..."></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten *</label><textarea name="konten" rows="6" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kategori</label><input type="text" name="kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Pengumuman, Event, dll"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Status</label>
                    <select name="status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="draf">Draf</option><option value="terbit">Terbit</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Gambar</label><input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="unggulan" class="rounded bg-kvt-800 border-kvt-700"> Unggulan</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_ticker" class="rounded bg-kvt-800 border-kvt-700"> Ticker</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_popup" class="rounded bg-kvt-800 border-kvt-700"> Popup</label>
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
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Berita</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label><input type="text" name="judul" id="edit-judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Ringkasan</label><textarea name="ringkasan" id="edit-ringkasan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten *</label><textarea name="konten" id="edit-konten" rows="6" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kategori</label><input type="text" name="kategori" id="edit-kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Status</label>
                    <select name="status" id="edit-status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="draf">Draf</option><option value="terbit">Terbit</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Ganti Gambar</label><input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
            <div class="flex flex-wrap gap-4">
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="unggulan" id="edit-unggulan" class="rounded bg-kvt-800 border-kvt-700"> Unggulan</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_ticker" id="edit-tampil_ticker" class="rounded bg-kvt-800 border-kvt-700"> Ticker</label>
                <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="tampil_popup" id="edit-tampil_popup" class="rounded bg-kvt-800 border-kvt-700"> Popup</label>
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
            <h3 class="text-lg font-bold text-white mb-2">Hapus Berita?</h3>
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
function bukaEdit(b){
    document.getElementById('form-edit').action='/admin/berita/'+b.id;
    document.getElementById('edit-judul').value=b.judul||'';
    document.getElementById('edit-ringkasan').value=b.ringkasan||'';
    document.getElementById('edit-konten').value=b.konten||'';
    document.getElementById('edit-kategori').value=b.kategori||'';
    document.getElementById('edit-status').value=b.status||'draf';
    document.getElementById('edit-unggulan').checked=!!b.unggulan;
    document.getElementById('edit-tampil_ticker').checked=!!b.tampil_ticker;
    document.getElementById('edit-tampil_popup').checked=!!b.tampil_popup;
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){document.getElementById('form-hapus').action='/admin/berita/'+id;document.getElementById('hapus-nama').textContent=nama;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
