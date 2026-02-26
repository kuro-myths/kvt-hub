@extends('tata-letak.dasbor')
@section('judul', 'Hasil Kuis - Admin KVT Hub')
@section('judul-halaman', 'Hasil Kuis')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari peserta..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="kuis_id" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kuis</option>
                @foreach($kuis as $k)<option value="{{ $k->id }}" {{ request('kuis_id')==$k->id?'selected':'' }}>{{ $k->judul }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <a href="{{ route('admin.kuis-hasil.statistik') }}" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-chart-bar mr-1"></i> Statistik</a>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Peserta</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kuis</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Skor</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Benar</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">XP</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Waktu</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($hasil as $i => $h)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $hasil->firstItem() + $i }}</td>
                    <td class="px-4 py-3"><p class="text-white font-medium">{{ $h->user->name }}</p><p class="text-xs text-gray-500">{{ $h->user->email }}</p></td>
                    <td class="px-4 py-3 text-gray-400">{{ Str::limit($h->kuis->judul, 30) }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-bold {{ $h->skor >= 70 ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">{{ $h->skor }}%</span>
                    </td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $h->jawaban_benar_count }}/{{ $h->total_pertanyaan }}</td>
                    <td class="px-4 py-3 text-center"><span class="text-yellow-400 font-semibold">{{ $h->xp_didapat ?? 0 }}xp</span></td>
                    <td class="px-4 py-3 text-center text-gray-500 text-xs">{{ $h->created_at?->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('admin.kuis-hasil.tampilkan', $h->id) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition flex items-center justify-center" title="Lihat"><i class="fas fa-eye text-xs"></i></a>
                            <button onclick="bukaHapus({{ $h->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition flex items-center justify-center" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-inbox text-3xl mb-3 block"></i>Belum ada hasil kuis.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($hasil->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $hasil->links() }}</div>@endif
    </div>
</div>

<script>
function bukaHapus(id) {
    if (confirm('Hapus hasil kuis ini?')) {
        fetch('/admin/kuis-hasil/' + id, {method: 'DELETE', headers: {'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}})
            .then(() => location.reload());
    }
}
</script>
@endsection
