@extends('tata-letak.dasbor')
@section('judul', 'Kelola Kuis - Admin KVT Hub')
@section('judul-halaman', 'Kelola Kuis')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari kuis..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="materi_id" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Materi</option>
                @foreach($materis as $m)<option value="{{ $m->id }}" {{ request('materi_id')==$m->id?'selected':'' }}>{{ $m->judul }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Kuis</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Materi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Pertanyaan</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Peserta</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">XP</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($kuis as $i => $k)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $kuis->firstItem() + $i }}</td>
                    <td class="px-4 py-3"><p class="text-white font-medium">{{ Str::limit($k->judul, 40) }}</p></td>
                    <td class="px-4 py-3 text-gray-400">{{ $k->materi->judul ?? '-' }}</td>
                    <td class="px-4 py-3 text-center"><span class="px-2 py-1 rounded-full text-xs bg-blue-500/20 text-blue-400">{{ $k->pertanyaan_count ?? 0 }}</span></td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $k->hasil_count ?? 0 }}</td>
                    <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-semibold">{{ $k->xp_reward }}</span></td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.kuis.detail', $k->id) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition flex items-center justify-center" title="Detail"><i class="fas fa-eye text-xs"></i></a>
                            <button onclick='bukaEdit(@json($k))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-yellow-500/20 text-gray-400 hover:text-yellow-400 transition flex items-center justify-center" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $k->id }}, '{{ addslashes($k->judul) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition flex items-center justify-center" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-question-circle text-3xl mb-3 block"></i>Belum ada kuis.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($kuis->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $kuis->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Kuis</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.kuis.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label><input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Materi *</label>
                <select name="materi_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih Materi --</option>
                    @foreach($materis as $m)<option value="{{ $m->id }}">{{ $m->judul }}</option>@endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (detik) *</label><input type="number" name="durasi_detik" value="60" min="10" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">XP Reward *</label><input type="number" name="xp_reward" value="10" min="1" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Waktu Tampil (detik dari awal video)</label><input type="number" name="waktu_tampil" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="0"></div>
            <div class="flex gap-2 pt-2">
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan</button>
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 font-semibold transition"><i class="fas fa-times mr-1"></i> Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
function bukaEdit(data) {
    // TODO: Implement edit modal
    alert('Edit kuis: ' + data.judul);
}

function bukaHapus(id, judul) {
    if (confirm('Hapus kuis "' + judul + '"? Data pertanyaan juga akan dihapus!')) {
        fetch('/admin/kuis/' + id, {method: 'DELETE', headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}})
            .then(() => location.reload());
    }
}
</script>
@endsection
