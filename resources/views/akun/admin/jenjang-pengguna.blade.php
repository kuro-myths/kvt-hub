@extends('tata-letak.dasbor')
@section('judul', 'Jenjang Pengguna - Admin KVT Hub')
@section('judul-halaman', 'Manajemen Jenjang Pengguna')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari pengguna..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                @foreach($statuses as $s)<option value="{{ $s }}" {{ request('status')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Daftarkan</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Pengguna</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kurikulum</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Semester</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">IPK</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($jenjang as $i => $j)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $jenjang->firstItem() + $i }}</td>
                    <td class="px-4 py-3"><p class="text-white font-medium">{{ $j->pengguna->name }}</p><p class="text-xs text-gray-500">{{ $j->pengguna->email }}</p></td>
                    <td class="px-4 py-3 text-gray-400">{{ $j->kurikulum->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center"><span class="text-blue-400 font-semibold">{{ $j->semester_aktif }}</span></td>
                    <td class="px-4 py-3 text-center">{{ $j->ipk ? number_format($j->ipk, 2) : '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $j->status=='aktif' ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">{{ ucfirst($j->status) }}</span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.jenjang-pengguna.detail', $j->id) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition flex items-center justify-center" title="Detail"><i class="fas fa-eye text-xs"></i></a>
                            <button onclick="bukaHapus({{ $j->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition flex items-center justify-center" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-graduation-cap text-3xl mb-3 block"></i>Belum ada jenjang pengguna.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($jenjang->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $jenjang->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Daftarkan Jenjang</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.jenjang-pengguna.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Pengguna *</label>
                <select name="user_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih Pengguna --</option>
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Kurikulum *</label>
                <select name="kurikulum_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih Kurikulum --</option>
                    @foreach($kurikulums as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Semester Aktif *</label><input type="number" name="semester_aktif" value="1" min="1" max="8" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">IPK</label><input type="number" name="ipk" step="0.01" min="0" max="4" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Jurusan</label><input type="text" name="jurusan" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Status *</label>
                <select name="status" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="aktif">Aktif</option>
                    <option value="suspend">Suspend</option>
                    <option value="lulus">Lulus</option>
                    <option value="dropout">Dropout</option>
                </select>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan</button>
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 font-semibold transition"><i class="fas fa-times mr-1"></i> Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function bukaHapus(id) {
    if (confirm('Hapus jenjang pengguna ini?')) {
        fetch('/admin/jenjang-pengguna/' + id, {method: 'DELETE', headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}})
            .then(() => location.reload());
    }
}

function bukaModal(id) { document.getElementById(id).classList.remove('hidden'); }
function tutupModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection
