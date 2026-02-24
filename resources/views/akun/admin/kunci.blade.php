@extends('tata-letak.dasbor')
@section('judul', 'Kunci Admin - Admin KVT Hub')
@section('judul-halaman', 'Kunci Admin')

@section('konten')
<div class="max-w-6xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if(session('kunci_baru'))
    <div class="mb-4 bg-kvt-500/10 border border-kvt-500/30 rounded-xl px-4 py-3">
        <p class="text-kvt-400 text-sm font-semibold mb-1"><i class="fas fa-key mr-1"></i> Kunci Baru Dibuat:</p>
        <div class="bg-kvt-900/80 rounded-lg px-3 py-2 font-mono text-xs text-green-400 break-all select-all">{{ session('kunci_baru') }}</div>
    </div>
    @endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Stats --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-6">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-bold text-kvt-400">{{ $kunciList->count() }}</p>
            <p class="text-xs text-gray-500 mt-1">Total Kunci</p>
        </div>
        <div class="bg-kvt-900/80 border border-green-500/20 rounded-xl p-4 text-center">
            <p class="text-2xl font-bold text-green-400">{{ $totalAktif }}</p>
            <p class="text-xs text-gray-500 mt-1">Belum Digunakan</p>
        </div>
        <div class="bg-kvt-900/80 border border-blue-500/20 rounded-xl p-4 text-center">
            <p class="text-2xl font-bold text-blue-400">{{ $totalDigunakan }}</p>
            <p class="text-xs text-gray-500 mt-1">Sudah Digunakan</p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <div class="flex-1"></div>
        <div class="flex gap-2">
            @if($totalDigunakan > 0)
            <form method="POST" action="{{ route('admin.kunci.hapus-semua') }}" onsubmit="return confirm('Hapus semua kunci yang sudah digunakan?')">@csrf @method('DELETE')
                <button type="submit" class="bg-red-600/20 hover:bg-red-600 border border-red-500/30 px-4 py-2 rounded-lg text-red-400 hover:text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-broom mr-1"></i> Bersihkan Terpakai</button>
            </form>
            @endif
            @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-kunci-admin', 'judul' => 'Data Kunci Admin'])
            <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Buat Kunci</button>
        </div>
    </div>

    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kunci</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Deskripsi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Digunakan Oleh</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Tanggal</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($kunciList as $i => $k)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $i + 1 }}</td>
                    <td class="px-4 py-3">
                        <code class="bg-kvt-800/50 px-2 py-1 rounded text-xs font-mono {{ $k->digunakan ? 'text-gray-500 line-through' : 'text-green-400' }}">{{ $k->kunci }}</code>
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $k->deskripsi ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        @if($k->digunakan)
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-blue-500/20 text-blue-400"><i class="fas fa-check mr-1"></i>Terpakai</span>
                        @else
                            <span class="px-2 py-1 rounded-full text-xs font-medium bg-green-500/20 text-green-400"><i class="fas fa-key mr-1"></i>Aktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $k->pengguna?->name ?? '-' }}</td>
                    <td class="px-4 py-3 text-gray-500 text-xs">{{ $k->created_at->format('d M Y H:i') }}</td>
                    <td class="px-4 py-3 text-center">
                        <button onclick="bukaHapus({{ $k->id }})" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                    </td>
                </tr>
                @empty
                <tr><td colspan="7" class="text-center py-12 text-gray-500"><i class="fas fa-key text-3xl mb-3 block"></i>Belum ada kunci admin.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Buat Kunci --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-key mr-2 text-green-400"></i>Buat Kunci Admin</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.kunci.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Jumlah Kunci</label>
                <input type="number" name="jumlah" value="1" min="1" max="20" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <p class="text-xs text-gray-600 mt-1">Buat 1–20 kunci sekaligus</p>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi (Opsional)</label>
                <input type="text" name="deskripsi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Batch untuk pendaftaran guru baru">
            </div>
            <div class="bg-kvt-800/30 rounded-lg p-3 text-xs text-gray-500">
                <i class="fas fa-info-circle mr-1 text-kvt-500"></i> Kunci akan di-generate otomatis dengan format <code class="text-kvt-400">KVT-XXXXXXXXXXXXXXXX</code>. Kunci digunakan saat registrasi akun admin baru.
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-key mr-1"></i> Buat Kunci</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl"><div class="p-6 text-center">
        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
        <h3 class="text-lg font-bold text-white mb-2">Hapus Kunci?</h3>
        <p class="text-gray-400 text-sm mb-6">Kunci admin ini akan dihapus permanen.</p>
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
function bukaHapus(id){document.getElementById('form-hapus').action='/admin/kunci/'+id;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
