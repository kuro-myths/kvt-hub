@extends('tata-letak.dasbor')
@section('judul', 'Kelola Paket - Admin KVT Hub')
@section('judul-halaman', 'Paket Eksklusif')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex justify-end gap-2 mb-6">
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-paket', 'judul' => 'Data Paket Eksklusif'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Paket</button>
    </div>

    {{-- Card Grid --}}
    @if($paketList->count())
    {{-- Hidden table for export --}}
    <table id="tabel-data" class="hidden">
        <thead><tr><th>Nama</th><th>Harga</th><th>Durasi (Hari)</th><th>XP Bonus</th><th>Status</th></tr></thead>
        <tbody>@foreach($paketList as $p)<tr><td>{{ $p->nama }}</td><td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td><td>{{ $p->durasi_hari }}</td><td>+{{ $p->xp_bonus ?? 0 }}</td><td>{{ $p->aktif ? 'Aktif' : 'Nonaktif' }}</td></tr>@endforeach</tbody>
    </table>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        @foreach($paketList as $p)
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden hover:border-kvt-500/30 transition group">
            <div class="p-5">
                <div class="flex items-start justify-between mb-3">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $p->nama }}</h3>
                        @if($p->deskripsi)<p class="text-gray-400 text-xs mt-1 line-clamp-2">{{ $p->deskripsi }}</p>@endif
                    </div>
                    <span class="px-2 py-1 rounded-full text-xs font-medium {{ $p->aktif ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">{{ $p->aktif ? 'Aktif' : 'Nonaktif' }}</span>
                </div>

                <div class="flex items-baseline gap-1 mb-4">
                    <span class="text-3xl font-bold text-kvt-400">Rp {{ number_format($p->harga, 0, ',', '.') }}</span>
                    <span class="text-xs text-gray-500">/ {{ $p->durasi_hari }} hari</span>
                </div>

                <div class="grid grid-cols-2 gap-2 mb-4 text-xs">
                    <div class="bg-kvt-800/30 rounded-lg px-3 py-2 text-center">
                        <p class="text-kvt-400 font-bold text-lg">{{ $p->durasi_hari }}</p>
                        <p class="text-gray-500">Hari</p>
                    </div>
                    <div class="bg-kvt-800/30 rounded-lg px-3 py-2 text-center">
                        <p class="text-yellow-400 font-bold text-lg">+{{ $p->xp_bonus ?? 0 }}</p>
                        <p class="text-gray-500">XP Bonus</p>
                    </div>
                </div>

                @if($p->fitur)
                <div class="mb-4">
                    <p class="text-xs text-gray-500 mb-1">Fitur:</p>
                    <div class="text-xs text-gray-400 space-y-1">
                        @foreach(explode("\n", $p->fitur) as $fitur)
                            @if(trim($fitur))<p><i class="fas fa-check text-green-500 mr-1"></i>{{ trim($fitur) }}</p>@endif
                        @endforeach
                    </div>
                </div>
                @endif

                <div class="flex items-center justify-between pt-3 border-t border-kvt-700/20">
                    <span class="text-xs text-gray-500"><i class="fas fa-users mr-1"></i>{{ $p->langganan_count ?? 0 }} langganan</span>
                    <div class="flex gap-1">
                        <form method="POST" action="{{ route('admin.paket.toggle', $p) }}" class="inline">@csrf @method('PUT')
                            <button type="submit" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-{{ $p->aktif ? 'red' : 'green' }}-500/20 text-gray-400 hover:text-{{ $p->aktif ? 'red' : 'green' }}-400 transition" title="{{ $p->aktif ? 'Nonaktifkan' : 'Aktifkan' }}"><i class="fas fa-{{ $p->aktif ? 'toggle-on' : 'toggle-off' }} text-xs"></i></button>
                        </form>
                        <button onclick='bukaEdit(@json($p))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition"><i class="fas fa-edit text-xs"></i></button>
                        <button onclick="bukaHapus({{ $p->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-12 text-center">
        <i class="fas fa-gem text-4xl text-gray-600 mb-3"></i>
        <p class="text-gray-500">Belum ada paket eksklusif.</p>
    </div>
    @endif
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Paket</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.paket.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama Paket *</label>
                <input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Paket Premium">
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none" placeholder="Deskripsi singkat paket..."></textarea>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Harga (Rp) *</label><input type="number" name="harga" min="0" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="50000"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (Hari) *</label><input type="number" name="durasi_hari" min="1" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="30"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">XP Bonus</label><input type="number" name="xp_bonus" min="0" value="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Fitur (satu per baris)</label>
                <textarea name="fitur" rows="4" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none" placeholder="Akses semua materi&#10;Sertifikat&#10;Konsultasi 1-on-1"></textarea>
            </div>
            <div><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="aktif" checked class="w-4 h-4 rounded bg-kvt-800/50 border-kvt-700/30 text-kvt-500 focus:ring-kvt-500"><span class="text-sm text-gray-400">Aktif</span></label></div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Paket</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Nama Paket *</label>
                <input type="text" name="nama" id="edit-nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="edit-deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none"></textarea>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Harga (Rp) *</label><input type="number" name="harga" id="edit-harga" min="0" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (Hari) *</label><input type="number" name="durasi_hari" id="edit-durasi" min="1" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">XP Bonus</label><input type="number" name="xp_bonus" id="edit-xp" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Fitur (satu per baris)</label>
                <textarea name="fitur" id="edit-fitur" rows="4" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none"></textarea>
            </div>
            <div><label class="flex items-center gap-2 cursor-pointer"><input type="checkbox" name="aktif" id="edit-aktif" class="w-4 h-4 rounded bg-kvt-800/50 border-kvt-700/30 text-kvt-500 focus:ring-kvt-500"><span class="text-sm text-gray-400">Aktif</span></label></div>
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
        <h3 class="text-lg font-bold text-white mb-2">Hapus Paket?</h3>
        <p class="text-gray-400 text-sm mb-6">Paket ini akan dihapus permanen.</p>
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
function bukaEdit(p){
    document.getElementById('form-edit').action='/admin/paket/'+p.id;
    document.getElementById('edit-nama').value=p.nama||'';
    document.getElementById('edit-deskripsi').value=p.deskripsi||'';
    document.getElementById('edit-harga').value=p.harga||0;
    document.getElementById('edit-durasi').value=p.durasi_hari||1;
    document.getElementById('edit-xp').value=p.xp_bonus||0;
    document.getElementById('edit-fitur').value=p.fitur||'';
    document.getElementById('edit-aktif').checked=!!p.aktif;
    bukaModal('modal-edit');
}
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/paket/'+id;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
