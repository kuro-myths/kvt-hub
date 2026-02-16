@extends('tata-letak.dasbor')
@section('judul', 'KRS Mahasiswa - Admin KVT Hub')
@section('judul-halaman', 'Kelola KRS Mahasiswa')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif

    {{-- Stats --}}
    <div class="grid grid-cols-3 gap-3 mb-6">
        <div class="bg-yellow-500/10 border border-yellow-500/20 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-yellow-400">{{ $totalMenunggu ?? 0 }}</p>
            <p class="text-xs text-gray-500">Menunggu</p>
        </div>
        <div class="bg-green-500/10 border border-green-500/20 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-green-400">{{ $totalDisetujui ?? 0 }}</p>
            <p class="text-xs text-gray-500">Disetujui</p>
        </div>
        <div class="bg-red-500/10 border border-red-500/20 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-red-400">{{ $totalDitolak ?? 0 }}</p>
            <p class="text-xs text-gray-500">Ditolak</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama mahasiswa..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                @foreach(['menunggu','disetujui','ditolak'] as $s)<option value="{{ $s }}" {{ request('status')==$s?'selected':'' }}>{{ ucfirst($s) }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Mahasiswa</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kurikulum</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Semester</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">SKS</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Tanggal</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($krsList as $i => $krs)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $krsList->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-cyan-500/20 rounded-full flex items-center justify-center text-cyan-400 font-bold text-xs">{{ strtoupper(substr($krs->user?->name ?? '?', 0, 1)) }}</div>
                            <span class="text-white font-medium">{{ $krs->user?->name ?? '-' }}</span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-400 text-xs">{{ $krs->kurikulum?->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-white font-bold">{{ $krs->semester ?? '-' }}</td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $krs->total_sks ?? 0 }}</td>
                    <td class="px-4 py-3 text-center">
                        @php $sw = match($krs->status) { 'disetujui'=>'green','ditolak'=>'red',default=>'yellow' }; @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-{{ $sw }}-500/20 text-{{ $sw }}-400">{{ ucfirst($krs->status ?? 'menunggu') }}</span>
                    </td>
                    <td class="px-4 py-3 text-center text-gray-500 text-xs">{{ $krs->created_at?->format('d M Y') }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            @if(($krs->status ?? 'menunggu') === 'menunggu')
                            <form method="POST" action="{{ route('admin.krs.setujui', $krs) }}" class="inline">@csrf @method('PUT')
                                <button class="w-8 h-8 rounded-lg bg-green-500/20 hover:bg-green-500/30 text-green-400 transition" title="Setujui"><i class="fas fa-check text-xs"></i></button>
                            </form>
                            <button onclick="bukaTolak({{ $krs->id }})" class="w-8 h-8 rounded-lg bg-red-500/20 hover:bg-red-500/30 text-red-400 transition" title="Tolak"><i class="fas fa-times text-xs"></i></button>
                            @endif
                            <button onclick="bukaDetail(@json($krs))" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Detail"><i class="fas fa-eye text-xs"></i></button>
                            <button onclick="bukaHapus({{ $krs->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-clipboard-list text-3xl mb-3 block"></i>Belum ada KRS.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($krsList->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $krsList->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tolak --}}
<div id="modal-tolak" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl">
        <div class="p-5 border-b border-kvt-700/30"><h3 class="text-lg font-bold text-white"><i class="fas fa-times-circle mr-2 text-red-400"></i>Tolak KRS</h3></div>
        <form id="form-tolak" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Catatan (opsional)</label><textarea name="catatan" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Alasan penolakan..."></textarea></div>
            <div class="flex gap-2">
                <button type="button" onclick="tutupModal('modal-tolak')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Tolak KRS</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Detail --}}
<div id="modal-detail" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-info-circle mr-2 text-blue-400"></i>Detail KRS</h3>
            <button onclick="tutupModal('modal-detail')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <div class="p-5" id="detail-content"></div>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl"><div class="p-6 text-center">
        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
        <h3 class="text-lg font-bold text-white mb-2">Hapus KRS?</h3>
        <p class="text-gray-400 text-sm mb-6">Tindakan ini akan menghapus KRS beserta detail mata kuliah.</p>
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
function bukaTolak(id){document.getElementById('form-tolak').action='/admin/krs/'+id+'/tolak';bukaModal('modal-tolak')}
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/krs/'+id;bukaModal('modal-hapus')}
function bukaDetail(krs){
    let html='<div class="space-y-3">';
    html+='<div class="flex justify-between"><span class="text-gray-400">Mahasiswa</span><span class="text-white font-medium">'+(krs.user?.name||'-')+'</span></div>';
    html+='<div class="flex justify-between"><span class="text-gray-400">Semester</span><span class="text-white">'+(krs.semester||'-')+'</span></div>';
    html+='<div class="flex justify-between"><span class="text-gray-400">Total SKS</span><span class="text-white">'+(krs.total_sks||0)+'</span></div>';
    html+='<div class="flex justify-between"><span class="text-gray-400">Tahun Ajaran</span><span class="text-white">'+(krs.tahun_ajaran||'-')+'</span></div>';
    if(krs.catatan_pembimbing)html+='<div class="mt-3 p-3 bg-kvt-800/50 rounded-lg"><p class="text-xs text-gray-400 mb-1">Catatan Pembimbing:</p><p class="text-sm text-white">'+krs.catatan_pembimbing+'</p></div>';
    if(krs.details&&krs.details.length>0){html+='<div class="mt-3"><p class="text-xs text-gray-400 mb-2">Mata Kuliah:</p><div class="space-y-1">';krs.details.forEach(d=>{html+='<div class="flex justify-between bg-kvt-800/30 px-3 py-2 rounded-lg text-sm"><span class="text-white">'+(d.mata_pelajaran?.nama||'MK #'+d.mata_pelajaran_id)+'</span><span class="text-gray-400">'+(d.mata_pelajaran?.sks||'-')+' SKS</span></div>'});html+='</div></div>'}
    html+='</div>';
    document.getElementById('detail-content').innerHTML=html;
    bukaModal('modal-detail');
}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
