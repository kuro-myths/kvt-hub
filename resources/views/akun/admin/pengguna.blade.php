@extends('tata-letak.dasbor')
@section('judul', 'Kelola Pengguna - Admin KVT Hub')
@section('judul-halaman', 'Kelola Pengguna')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-white">{{ $pengguna->total() }}</p>
            <p class="text-xs text-gray-500">Total</p>
        </div>
        @foreach(['admin'=>'red','guru'=>'green','staff'=>'orange','siswa'=>'blue','mahasiswa'=>'indigo','orang_tua'=>'amber','pengunjung'=>'gray'] as $r=>$w)
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-{{ $w }}-400">{{ $totalPerPeran[$r] ?? 0 }}</p>
            <p class="text-xs text-gray-500">{{ ucfirst($r) }}</p>
        </div>
        @endforeach
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama atau email..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="peran" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Peran</option>
                @foreach(['admin','guru','staff','siswa','mahasiswa','orang_tua','pengunjung'] as $p)
                <option value="{{ $p }}" {{ request('peran')==$p?'selected':'' }}>{{ ucfirst($p) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-kvt-700/30">
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Pengguna</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Email</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Peran</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Level</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pengguna as $i => $user)
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                        <td class="px-4 py-3 text-gray-500">{{ $pengguna->firstItem() + $i }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <span class="text-white font-medium">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="px-4 py-3 text-gray-400">{{ $user->email }}</td>
                        <td class="px-4 py-3">
                            @php $warna = match($user->peran) { 'admin'=>'red','guru'=>'green','staff'=>'orange','mahasiswa'=>'indigo','orang_tua'=>'amber','pengunjung'=>'gray',default=>'blue' }; @endphp
                            <span class="px-2 py-1 rounded-full text-xs font-semibold bg-{{ $warna }}-500/20 text-{{ $warna }}-400">{{ ucfirst($user->peran) }}</span>
                        </td>
                        <td class="px-4 py-3 text-center text-kvt-400 font-bold">Lv.{{ $user->level }}</td>
                        <td class="px-4 py-3 text-center">
                            <span class="px-2 py-1 rounded-full text-xs {{ $user->aktif ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                {{ $user->aktif ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick="bukaEdit({{ json_encode($user) }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                                @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.pengguna.toggle', $user) }}" class="inline">@csrf @method('PUT')
                                    <button class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-yellow-500/20 text-gray-400 hover:text-yellow-400 transition" title="Toggle Aktif"><i class="fas fa-power-off text-xs"></i></button>
                                </form>
                                <button onclick="bukaHapus({{ $user->id }}, '{{ addslashes($user->name) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-users text-3xl mb-3 block"></i>Tidak ada data pengguna.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($pengguna->hasPages())
        <div class="px-4 py-3 border-t border-kvt-700/30">{{ $pengguna->links() }}</div>
        @endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-user-plus mr-2 text-green-400"></i>Tambah Pengguna</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.pengguna.simpan') }}" class="p-5 space-y-4">
            @csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama Lengkap *</label><input type="text" name="name" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Email *</label><input type="email" name="email" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Password *</label><input type="password" name="password" required minlength="6" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Peran *</label>
                <select name="peran" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="siswa">Siswa</option><option value="mahasiswa">Mahasiswa</option><option value="orang_tua">Orang Tua</option><option value="pengunjung">Pengunjung</option><option value="guru">Guru</option><option value="staff">Staff</option><option value="admin">Admin</option>
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Bio</label><textarea name="bio" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
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
            <h3 class="text-lg font-bold text-white"><i class="fas fa-user-edit mr-2 text-blue-400"></i>Edit Pengguna</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">
            @csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Nama Lengkap *</label><input type="text" name="name" id="edit-name" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Email *</label><input type="email" name="email" id="edit-email" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Password Baru <span class="text-gray-600">(kosongkan jika tidak diubah)</span></label><input type="password" name="password" minlength="6" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Peran *</label>
                    <select name="peran" id="edit-peran" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="siswa">Siswa</option><option value="mahasiswa">Mahasiswa</option><option value="orang_tua">Orang Tua</option><option value="pengunjung">Pengunjung</option><option value="guru">Guru</option><option value="staff">Staff</option><option value="admin">Admin</option>
                    </select>
                </div>
                <div><label class="block text-sm text-gray-400 mb-1">Level</label><input type="number" name="level" id="edit-level" min="1" max="100" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Bio</label><textarea name="bio" id="edit-bio" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
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
            <h3 class="text-lg font-bold text-white mb-2">Hapus Pengguna?</h3>
            <p class="text-gray-400 text-sm mb-6">Anda yakin ingin menghapus <strong id="hapus-nama" class="text-white"></strong>? Tindakan ini tidak dapat dibatalkan.</p>
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
function bukaEdit(u){
    document.getElementById('form-edit').action='/admin/pengguna/'+u.id;
    document.getElementById('edit-name').value=u.name;
    document.getElementById('edit-email').value=u.email;
    document.getElementById('edit-peran').value=u.peran;
    document.getElementById('edit-level').value=u.level;
    document.getElementById('edit-bio').value=u.bio||'';
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){
    document.getElementById('form-hapus').action='/admin/pengguna/'+id;
    document.getElementById('hapus-nama').textContent=nama;
    bukaModal('modal-hapus');
}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
