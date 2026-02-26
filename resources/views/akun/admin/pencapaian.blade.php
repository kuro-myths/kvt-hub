@extends('tata-letak.dasbor')
@section('judul', 'Pencapaian - Admin KVT Hub')
@section('judul-halaman', 'Manajemen Pencapaian')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari pencapaian..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <a href="{{ route('admin.pencapaian.statistik') }}" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-chart-bar mr-1"></i> Statistik</a>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Nama</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Deskripsi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">XP Syarat</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Level Syarat</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($pencapaian as $i => $p)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $pencapaian->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg flex items-center justify-center text-white" style="background-color: {{ $p->warna ?? '#FFD700' }}">
                                <i class="fas {{ $p->ikon ?? 'fa-star' }} text-xs"></i>
                            </div>
                            <p class="text-white font-medium">{{ $p->nama }}</p>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-400 text-sm">{{ Str::limit($p->deskripsi, 50) ?? '-' }}</td>
                    <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-semibold">{{ $p->xp_syarat }}</span></td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $p->level_syarat ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.pencapaian.detail', $p->id) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition flex items-center justify-center" title="Detail"><i class="fas fa-eye text-xs"></i></a>
                            <button onclick="bukaEdit({{ $p->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-yellow-500/20 text-gray-400 hover:text-yellow-400 transition flex items-center justify-center" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $p->id }}, '{{ addslashes($p->nama) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition flex items-center justify-center" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-12 text-gray-500"><i class="fas fa-trophy text-3xl mb-3 block"></i>Belum ada pencapaian.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($pencapaian->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $pencapaian->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Pencapaian</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.pencapaian.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama *</label><input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Icon FontAwesome</label><input type="text" name="ikon" value="fa-star" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="fa-star"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Warna</label><input type="color" name="warna" value="#FFD700" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">XP Syarat *</label><input type="number" name="xp_syarat" value="0" min="0" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Level Syarat</label><input type="number" name="level_syarat" min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan</button>
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 font-semibold transition"><i class="fas fa-times mr-1"></i> Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function bukaEdit(id) {
    alert('Edit akan dibuat soon');
}

function bukaHapus(id, nama) {
    if (confirm('Hapus pencapaian "' + nama + '"?')) {
        fetch('/admin/pencapaian/' + id, {method: 'DELETE', headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}})
            .then(() => location.reload());
    }
}

function bukaModal(id) { document.getElementById(id).classList.remove('hidden'); }
function tutupModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection
