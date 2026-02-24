@extends('tata-letak.dasbor')

@section('judul', 'Kelola Pendaftaran Edukasi')

@section('konten')
<div class="space-y-6">

    {{-- Header --}}
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-white flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clipboard-check text-white"></i>
                </div>
                Pendaftaran Edukasi
            </h1>
            <p class="text-gray-400 text-sm mt-1">Kelola pendaftaran program edukasi gratis dari pengguna</p>
        </div>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-alt text-blue-400"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-white">{{ $stats['total'] }}</p>
                    <p class="text-xs text-gray-500">Total</p>
                </div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-yellow-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-400"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-yellow-400">{{ $stats['menunggu'] }}</p>
                    <p class="text-xs text-gray-500">Menunggu</p>
                </div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-check-double text-green-400"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-green-400">{{ $stats['disetujui'] }}</p>
                    <p class="text-xs text-gray-500">Disetujui</p>
                </div>
            </div>
        </div>
        <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-red-500/10 rounded-lg flex items-center justify-center">
                    <i class="fas fa-times-circle text-red-400"></i>
                </div>
                <div>
                    <p class="text-2xl font-bold text-red-400">{{ $stats['ditolak'] }}</p>
                    <p class="text-xs text-gray-500">Ditolak</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Alert --}}
    @if(session('sukses'))
    <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4">
        <p class="text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</p>
    </div>
    @endif

    {{-- Filter Bar --}}
    <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl p-4">
        <form method="GET" class="flex flex-wrap items-center gap-3">
            <div class="flex-1 min-w-[200px]">
                <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama, email, institusi..."
                       class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 transition">
            </div>
            <select name="status" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Status</option>
                @foreach($statusList as $key => $val)
                <option value="{{ $key }}" {{ request('status') == $key ? 'selected' : '' }} class="bg-kvt-900">{{ $val['label'] }}</option>
                @endforeach
            </select>
            <select name="jenjang" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Jenjang</option>
                @foreach($jenjangList as $j)
                <option value="{{ $j }}" {{ request('jenjang') == $j ? 'selected' : '' }} class="bg-kvt-900">{{ $j }}</option>
                @endforeach
            </select>
            <select name="edukasi" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-sm text-white outline-none focus:border-kvt-500">
                <option value="" class="bg-kvt-900">Semua Program</option>
                @foreach($edukasiList as $e)
                <option value="{{ $e->id }}" {{ request('edukasi') == $e->id ? 'selected' : '' }} class="bg-kvt-900">{{ \Str::limit($e->judul, 30) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 text-white text-sm px-5 py-2 rounded-lg transition font-semibold">
                <i class="fas fa-search mr-1"></i> Filter
            </button>
            @if(request()->hasAny(['cari', 'status', 'jenjang', 'edukasi']))
            <a href="{{ route('admin.pendaftaran-edukasi.index') }}" class="text-gray-400 hover:text-white text-sm transition"><i class="fas fa-times mr-1"></i>Reset</a>
            @endif
        </form>
    </div>

    <div class="flex justify-end mb-3">
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-pendaftaran-edukasi', 'judul' => 'Data Pendaftaran Edukasi'])
    </div>

    {{-- Data Table --}}
    <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead>
                    <tr class="border-b border-kvt-700/20 text-gray-400">
                        <th class="text-left px-4 py-3 font-semibold">#</th>
                        <th class="text-left px-4 py-3 font-semibold">Pendaftar</th>
                        <th class="text-left px-4 py-3 font-semibold">Program</th>
                        <th class="text-left px-4 py-3 font-semibold">Jenjang</th>
                        <th class="text-left px-4 py-3 font-semibold">Lokasi</th>
                        <th class="text-left px-4 py-3 font-semibold">Status</th>
                        <th class="text-left px-4 py-3 font-semibold">Tanggal</th>
                        <th class="text-center px-4 py-3 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftaran as $item)
                    @php $info = $item->status_info; @endphp
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                        <td class="px-4 py-3 text-gray-500">{{ $pendaftaran->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-3">
                            <p class="text-white font-semibold">{{ $item->nama_lengkap }}</p>
                            <p class="text-gray-500 text-xs">{{ $item->email }}</p>
                            @if($item->institusi)
                            <p class="text-gray-600 text-xs">{{ $item->institusi }}</p>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-gray-300">{{ \Str::limit($item->edukasiGratis->judul ?? '-', 25) }}</span>
                        </td>
                        <td class="px-4 py-3 text-gray-400">{{ $item->jenjang ?? '-' }}</td>
                        <td class="px-4 py-3 text-gray-400 text-xs">{{ $item->lokasi_lengkap ?? '-' }}</td>
                        <td class="px-4 py-3">
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 bg-{{ $info['warna'] }}-500/15 text-{{ $info['warna'] }}-400 rounded-lg text-xs font-semibold">
                                <i class="{{ $info['ikon'] }} text-[10px]"></i> {{ $info['label'] }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-500 text-xs">{{ $item->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                {{-- Detail --}}
                                <button onclick="lihatDetail({{ $item->id }})" class="w-8 h-8 bg-blue-500/10 rounded-lg flex items-center justify-center text-blue-400 hover:bg-blue-500/20 transition" title="Lihat Detail">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                                {{-- Ubah Status --}}
                                <button onclick="bukaUbahStatus({{ $item->id }}, '{{ $item->status }}', `{{ addslashes($item->catatan_admin ?? '') }}`)" class="w-8 h-8 bg-green-500/10 rounded-lg flex items-center justify-center text-green-400 hover:bg-green-500/20 transition" title="Ubah Status">
                                    <i class="fas fa-check-circle text-xs"></i>
                                </button>
                                {{-- Notifikasi --}}
                                <form action="{{ route('admin.pendaftaran-edukasi.notifikasi', $item) }}" method="POST" class="inline">
                                    @csrf
                                    <button type="submit" class="w-8 h-8 bg-yellow-500/10 rounded-lg flex items-center justify-center text-yellow-400 hover:bg-yellow-500/20 transition" title="Kirim Notifikasi">
                                        <i class="fas fa-bell text-xs"></i>
                                    </button>
                                </form>
                                {{-- Hapus --}}
                                <form action="{{ route('admin.pendaftaran-edukasi.hapus', $item) }}" method="POST" class="inline" onsubmit="return confirm('Hapus pendaftaran ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="w-8 h-8 bg-red-500/10 rounded-lg flex items-center justify-center text-red-400 hover:bg-red-500/20 transition" title="Hapus">
                                        <i class="fas fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-12 text-center text-gray-500">
                            <i class="fas fa-inbox text-3xl text-kvt-600 mb-3"></i>
                            <p>Belum ada data pendaftaran</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($pendaftaran->hasPages())
        <div class="px-4 py-3 border-t border-kvt-700/10">
            {{ $pendaftaran->links() }}
        </div>
        @endif
    </div>
</div>

{{-- Modal Detail --}}
<div id="modalDetail" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl p-6 max-w-2xl w-full mx-4 max-h-[80vh] overflow-y-auto">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-eye text-blue-400 mr-2"></i>Detail Pendaftaran</h3>
            <button onclick="tutupModal('modalDetail')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-lg"></i></button>
        </div>
        <div id="detailKonten" class="text-sm text-gray-400 space-y-4">
            <p class="text-center"><i class="fas fa-spinner fa-spin text-kvt-400 mr-2"></i>Memuat data...</p>
        </div>
    </div>
</div>

{{-- Modal Ubah Status --}}
<div id="modalStatus" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl p-6 max-w-md w-full mx-4">
        <div class="flex items-center justify-between mb-5">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-edit text-green-400 mr-2"></i>Ubah Status</h3>
            <button onclick="tutupModal('modalStatus')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-lg"></i></button>
        </div>
        <form id="formUbahStatus" method="POST">
            @csrf @method('PUT')
            <div class="mb-4">
                <label class="block text-sm text-gray-400 mb-2">Status</label>
                <select name="status" id="selectStatus" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white outline-none focus:border-kvt-500">
                    @foreach($statusList as $key => $val)
                    <option value="{{ $key }}" class="bg-kvt-900">{{ $val['label'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label class="block text-sm text-gray-400 mb-2">Catatan Admin</label>
                <textarea name="catatan_admin" id="inputCatatan" rows="3"
                          class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2.5 text-sm text-white placeholder-gray-500 outline-none focus:border-kvt-500 resize-none"
                          placeholder="Tambahkan catatan untuk pendaftar..."></textarea>
            </div>
            <div class="flex gap-3">
                <button type="button" onclick="tutupModal('modalStatus')" class="flex-1 px-4 py-2.5 bg-kvt-800/50 border border-kvt-700/30 rounded-lg text-sm text-gray-400 hover:text-white transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-gradient-to-r from-green-600 to-green-500 text-white rounded-lg text-sm font-semibold hover:from-green-500 hover:to-green-400 transition">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('skrip')
<script>
function lihatDetail(id) {
    const modal = document.getElementById('modalDetail');
    const konten = document.getElementById('detailKonten');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    konten.innerHTML = '<p class="text-center py-8"><i class="fas fa-spinner fa-spin text-kvt-400 mr-2"></i>Memuat...</p>';

    fetch(`/admin/pendaftaran-edukasi/${id}`)
        .then(r => r.json())
        .then(data => {
            konten.innerHTML = `
                <div class="grid grid-cols-2 gap-4">
                    <div><span class="text-gray-500">Nama:</span><br><strong class="text-white">${data.nama_lengkap}</strong></div>
                    <div><span class="text-gray-500">Email:</span><br><strong class="text-white">${data.email}</strong></div>
                    <div><span class="text-gray-500">Telepon:</span><br><strong class="text-white">${data.telepon || '-'}</strong></div>
                    <div><span class="text-gray-500">Institusi:</span><br><strong class="text-white">${data.institusi || '-'}</strong></div>
                    <div><span class="text-gray-500">Jenjang:</span><br><strong class="text-white">${data.jenjang || '-'}</strong></div>
                    <div><span class="text-gray-500">Lokasi:</span><br><strong class="text-white">${data.lokasi_kota || '-'}, ${data.lokasi_provinsi || '-'}</strong></div>
                </div>
                ${data.motivasi ? `<div class="mt-4 p-3 bg-kvt-800/30 rounded-lg"><span class="text-gray-500 text-xs">Motivasi:</span><br><span class="text-gray-300">${data.motivasi}</span></div>` : ''}
                ${data.prasyarat_status ? `<div class="mt-2"><span class="text-gray-500 text-xs">Prasyarat dipenuhi: ${Object.keys(data.prasyarat_status).length} item</span></div>` : ''}
                <div class="mt-4 grid grid-cols-3 gap-3">
                    ${data.dokumen_identitas ? `<div><p class="text-xs text-gray-500 mb-1">Identitas</p><img src="/storage/${data.dokumen_identitas}" class="w-full rounded-lg border border-kvt-700/20"></div>` : ''}
                    ${data.dokumen_pendukung ? `<div><p class="text-xs text-gray-500 mb-1">Pendukung</p><img src="/storage/${data.dokumen_pendukung}" class="w-full rounded-lg border border-kvt-700/20"></div>` : ''}
                    ${data.foto_selfie ? `<div><p class="text-xs text-gray-500 mb-1">Selfie</p><img src="/storage/${data.foto_selfie}" class="w-full rounded-lg border border-kvt-700/20"></div>` : ''}
                </div>
                ${data.catatan_admin ? `<div class="mt-4 p-3 bg-yellow-500/5 border border-yellow-500/20 rounded-lg"><span class="text-yellow-400 text-xs font-semibold">Catatan Admin:</span><br><span class="text-gray-300">${data.catatan_admin}</span></div>` : ''}
                <div class="mt-3 text-xs text-gray-600">Didaftarkan: ${new Date(data.created_at).toLocaleString('id-ID')}</div>
            `;
        })
        .catch(() => {
            konten.innerHTML = '<p class="text-center text-red-400 py-8"><i class="fas fa-exclamation-circle mr-2"></i>Gagal memuat data</p>';
        });
}

function bukaUbahStatus(id, status, catatan) {
    document.getElementById('formUbahStatus').action = `/admin/pendaftaran-edukasi/${id}/status`;
    document.getElementById('selectStatus').value = status;
    document.getElementById('inputCatatan').value = catatan;
    const modal = document.getElementById('modalStatus');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function tutupModal(id) {
    const modal = document.getElementById(id);
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
@endpush
