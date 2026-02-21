@extends('tata-letak.dasbor')

@section('judul', 'Kelola Aturan & Peringatan Edukasi')

@section('konten')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-red-400 to-yellow-500 rounded-xl flex items-center justify-center">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
                Aturan & Peringatan Edukasi
            </h1>
            <p class="text-gray-400 text-sm mt-1">Kelola larangan, peringatan, tips aman, dan prosedur penggunaan program edukasi gratis</p>
        </div>
        <button onclick="document.getElementById('modalTambah').classList.remove('hidden');document.getElementById('modalTambah').classList.add('flex')"
                class="inline-flex items-center gap-2 px-5 py-2.5 bg-gradient-to-r from-kvt-600 to-kvt-500 text-white rounded-xl text-sm font-semibold hover:from-kvt-500 hover:to-kvt-400 transition shadow-lg shadow-kvt-500/20">
            <i class="fas fa-plus"></i> Tambah Aturan
        </button>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-list text-blue-400"></i></div>
                <div><p class="text-2xl font-bold text-white">{{ $stats['total'] }}</p><p class="text-xs text-gray-500">Total</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-ban text-red-400"></i></div>
                <div><p class="text-2xl font-bold text-red-400">{{ $stats['larangan'] }}</p><p class="text-xs text-gray-500">Larangan</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-yellow-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-exclamation-triangle text-yellow-400"></i></div>
                <div><p class="text-2xl font-bold text-yellow-400">{{ $stats['peringatan'] }}</p><p class="text-xs text-gray-500">Peringatan</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-lightbulb text-green-400"></i></div>
                <div><p class="text-2xl font-bold text-green-400">{{ $stats['tips'] }}</p><p class="text-xs text-gray-500">Tips</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center"><i class="fas fa-shield-alt text-blue-400"></i></div>
                <div><p class="text-2xl font-bold text-blue-400">{{ $stats['prosedur'] }}</p><p class="text-xs text-gray-500">Prosedur</p></div>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('sukses'))
    <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4">
        <p class="text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</p>
    </div>
    @endif

    {{-- Filter --}}
    <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
        <form method="GET" class="flex flex-wrap items-center gap-3">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari aturan..."
                       class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition">
            </div>
            <select name="tipe" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Tipe</option>
                @foreach($tipeList as $key => $val)
                <option value="{{ $key }}" {{ request('tipe') == $key ? 'selected' : '' }} class="bg-kvt-900">{{ $val['label'] }}</option>
                @endforeach
            </select>
            <select name="tingkat" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Tingkat</option>
                @foreach($tingkatList as $key => $val)
                <option value="{{ $key }}" {{ request('tingkat') == $key ? 'selected' : '' }} class="bg-kvt-900">{{ $val['label'] }}</option>
                @endforeach
            </select>
            <select name="edukasi" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Program</option>
                <option value="semua" {{ request('edukasi') == 'semua' ? 'selected' : '' }} class="bg-kvt-900">🌐 Berlaku Semua</option>
                @foreach($edukasiList as $e)
                <option value="{{ $e->id }}" {{ request('edukasi') == $e->id ? 'selected' : '' }} class="bg-kvt-900">{{ \Str::limit($e->judul, 30) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 text-white text-sm px-5 py-2 rounded-lg transition font-semibold"><i class="fas fa-search mr-1"></i> Filter</button>
            @if(request()->hasAny(['cari', 'tipe', 'tingkat', 'edukasi']))
            <a href="{{ route('admin.aturan-edukasi.index') }}" class="text-gray-400 hover:text-white text-sm transition"><i class="fas fa-times mr-1"></i>Reset</a>
            @endif
        </form>
    </div>

    {{-- Data Table --}}
    <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-kvt-700/20 text-gray-400">
                        <th class="text-left px-4 py-3 font-semibold">#</th>
                        <th class="text-left px-4 py-3 font-semibold">Aturan</th>
                        <th class="text-left px-4 py-3 font-semibold">Tipe</th>
                        <th class="text-left px-4 py-3 font-semibold">Tingkat</th>
                        <th class="text-left px-4 py-3 font-semibold">Program</th>
                        <th class="text-left px-4 py-3 font-semibold">Status</th>
                        <th class="text-center px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($aturan as $item)
                    @php $tInfo = $item->tipe_info; $lInfo = $item->tingkat_info; @endphp
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                        <td class="px-4 py-3 text-gray-500">{{ $aturan->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-3">
                            <div class="flex items-start gap-2">
                                <i class="{{ $tInfo['ikon'] }} text-{{ $tInfo['warna'] }}-400 mt-1"></i>
                                <div>
                                    <p class="text-white font-semibold">{{ $item->judul }}</p>
                                    <p class="text-gray-500 text-xs line-clamp-2">{{ \Str::limit($item->deskripsi, 100) }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-{{ $tInfo['warna'] }}-500/15 text-{{ $tInfo['warna'] }}-400 rounded-lg text-xs font-semibold">
                                <i class="{{ $tInfo['ikon'] }} text-[10px]"></i> {{ $tInfo['label'] }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-{{ $lInfo['warna'] }}-400 text-xs font-semibold">{{ $lInfo['label'] }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-400 text-xs">
                            @if($item->berlaku_semua)
                                <span class="text-kvt-400 font-semibold">🌐 Semua Program</span>
                            @elseif($item->edukasiGratis)
                                {{ \Str::limit($item->edukasiGratis->judul, 25) }}
                            @else
                                <span class="text-gray-600">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <form action="{{ route('admin.aturan-edukasi.toggle', $item) }}" method="POST" class="inline">
                                @csrf @method('PUT')
                                <button type="submit" class="w-8 h-8 rounded-lg flex items-center justify-center transition {{ $item->aktif ? 'bg-green-500/10 text-green-400 hover:bg-green-500/20' : 'bg-gray-500/10 text-gray-500 hover:bg-gray-500/20' }}" title="{{ $item->aktif ? 'Aktif' : 'Nonaktif' }}">
                                    <i class="fas fa-{{ $item->aktif ? 'check-circle' : 'times-circle' }} text-xs"></i>
                                </button>
                            </form>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                <button onclick='bukaEdit(@json($item))' class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center text-blue-400 hover:bg-blue-500/20 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                                <form action="{{ route('admin.aturan-edukasi.hapus', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus aturan ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 bg-red-500/10 rounded-lg flex items-center justify-center text-red-400 hover:bg-red-500/20 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-3xl text-kvt-600 mb-3"></i>
                            <p>Belum ada aturan edukasi</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($aturan->hasPages())
        <div class="px-4 py-3 border-t border-kvt-700/10">{{ $aturan->links() }}</div>
        @endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modalTambah" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl p-6 max-w-2xl w-full mx-4 max-h-[85vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-plus text-kvt-400 mr-2"></i>Tambah Aturan</h3>
            <button onclick="tutupModal('modalTambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-lg"></i></button>
        </div>
        <form action="{{ route('admin.aturan-edukasi.simpan') }}" method="POST">
            @csrf
            @include('akun.admin._form-aturan')
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="tutupModal('modalTambah')" class="flex-1 px-4 py-2.5 bg-kvt-800/50 border border-kvt-700/30 rounded-lg text-sm text-gray-400 hover:text-white transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-kvt-600 to-kvt-500 text-white rounded-lg text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modalEdit" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl p-6 max-w-2xl w-full mx-4 max-h-[85vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-edit text-blue-400 mr-2"></i>Edit Aturan</h3>
            <button onclick="tutupModal('modalEdit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-lg"></i></button>
        </div>
        <form id="formEdit" method="POST">
            @csrf @method('PUT')
            @include('akun.admin._form-aturan', ['prefix' => 'edit_'])
            <div class="flex gap-3 mt-6">
                <button type="button" onclick="tutupModal('modalEdit')" class="flex-1 px-4 py-2.5 bg-kvt-800/50 border border-kvt-700/30 rounded-lg text-sm text-gray-400 hover:text-white transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-blue-600 to-blue-500 text-white rounded-lg text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('skrip')
<script>
function tutupModal(id) {
    document.getElementById(id).classList.add('hidden');
    document.getElementById(id).classList.remove('flex');
}

function bukaEdit(data) {
    const modal = document.getElementById('modalEdit');
    const form = document.getElementById('formEdit');
    form.action = `/admin/aturan-edukasi/${data.id}`;

    const p = 'edit_';
    document.getElementById(p+'judul').value = data.judul;
    document.getElementById(p+'deskripsi').value = data.deskripsi;
    document.getElementById(p+'tipe').value = data.tipe;
    document.getElementById(p+'tingkat').value = data.tingkat;
    document.getElementById(p+'ikon').value = data.ikon || '';
    document.getElementById(p+'urutan').value = data.urutan || 0;
    document.getElementById(p+'edukasi_gratis_id').value = data.edukasi_gratis_id || '';
    document.getElementById(p+'aktif').checked = data.aktif;
    document.getElementById(p+'berlaku_semua').checked = data.berlaku_semua;

    // Toggle edukasi select visibility
    const edukasiRow = document.getElementById(p+'edukasi_row');
    if (data.berlaku_semua) {
        edukasiRow.classList.add('opacity-50', 'pointer-events-none');
    } else {
        edukasiRow.classList.remove('opacity-50', 'pointer-events-none');
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
</script>
@endpush
