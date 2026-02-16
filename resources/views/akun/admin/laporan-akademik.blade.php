@extends('tata-letak.dasbor')
@section('judul', 'Laporan Akademik - Admin KVT Hub')
@section('judul-halaman', 'Laporan Akademik')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <select name="tipe" onchange="this.form.submit()" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Tipe</option>
                <option value="rekap_nilai" {{ request('tipe')=='rekap_nilai'?'selected':'' }}>Rekap Nilai</option>
                <option value="statistik_krs" {{ request('tipe')=='statistik_krs'?'selected':'' }}>Statistik KRS</option>
                <option value="performa_mahasiswa" {{ request('tipe')=='performa_mahasiswa'?'selected':'' }}>Performa Mahasiswa</option>
                <option value="distribusi_ipk" {{ request('tipe')=='distribusi_ipk'?'selected':'' }}>Distribusi IPK</option>
            </select>
        </form>
        <button onclick="bukaModal('modal-generate')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-chart-bar mr-1"></i> Generate Laporan</button>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Tipe</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kurikulum</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Dibuat Oleh</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Tanggal</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($laporan as $i => $l)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $laporan->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="text-white font-medium">{{ $l->judul }}</div>
                        @if($l->deskripsi)<div class="text-gray-500 text-xs mt-0.5 line-clamp-1">{{ $l->deskripsi }}</div>@endif
                    </td>
                    <td class="px-4 py-3">
                        @php $tipeBadge = match($l->tipe) {
                            'rekap_nilai'=>['blue','Rekap Nilai','fas fa-star'],
                            'statistik_krs'=>['purple','Statistik KRS','fas fa-clipboard-list'],
                            'performa_mahasiswa'=>['yellow','Performa','fas fa-user-graduate'],
                            'distribusi_ipk'=>['green','Distribusi IPK','fas fa-chart-pie'],
                            default=>['gray',$l->tipe,'fas fa-file']
                        }; @endphp
                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium bg-{{ $tipeBadge[0] }}-500/20 text-{{ $tipeBadge[0] }}-400">
                            <i class="{{ $tipeBadge[2] }} text-[10px]"></i>{{ $tipeBadge[1] }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $l->kurikulum?->nama ?? 'Semua' }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-medium {{ $l->status === 'selesai' ? 'bg-green-500/20 text-green-400' : 'bg-yellow-500/20 text-yellow-400' }}">{{ ucfirst($l->status) }}</span>
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $l->pembuat?->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-400">{{ $l->created_at->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.laporan-akademik.tampilkan', $l) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition flex items-center justify-center"><i class="fas fa-eye text-xs"></i></a>
                            <button onclick="bukaHapus({{ $l->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-chart-bar text-3xl mb-3 block"></i>Belum ada laporan. Klik "Generate Laporan" untuk membuat.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($laporan->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $laporan->links() }}</div>@endif
    </div>
</div>

{{-- Modal Generate Laporan --}}
<div id="modal-generate" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-chart-bar mr-2 text-green-400"></i>Generate Laporan</h3>
            <button onclick="tutupModal('modal-generate')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.laporan-akademik.generate') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul Laporan *</label>
                <input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Laporan Rekap Nilai Semester Genap">
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Tipe Laporan *</label>
                <select name="tipe" id="gen-tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">-- Pilih Tipe --</option>
                    <option value="rekap_nilai">📊 Rekap Nilai — Rekapitulasi seluruh nilai mahasiswa</option>
                    <option value="statistik_krs">📋 Statistik KRS — Analisis KRS per semester</option>
                    <option value="performa_mahasiswa">🎓 Performa Mahasiswa — Evaluasi pencapaian mahasiswa</option>
                    <option value="distribusi_ipk">📈 Distribusi IPK — Sebaran IPK mahasiswa</option>
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Kurikulum (Opsional)</label>
                <select name="kurikulum_id" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    <option value="">Semua Kurikulum</option>
                    @foreach(\App\Models\Kurikulum::where('status','aktif')->get() as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                </select>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none" placeholder="Catatan tentang laporan ini..."></textarea>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-generate')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-cogs mr-1"></i> Generate</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl"><div class="p-6 text-center">
        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
        <h3 class="text-lg font-bold text-white mb-2">Hapus Laporan?</h3>
        <p class="text-gray-400 text-sm mb-6">Laporan ini akan dihapus permanen dan tidak dapat dikembalikan.</p>
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
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/laporan-akademik/'+id;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
