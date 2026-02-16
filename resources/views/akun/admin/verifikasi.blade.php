@extends('tata-letak.dasbor')
@section('judul', 'Verifikasi Akun - Admin KVT Hub')
@section('judul-halaman', 'Verifikasi Akun')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    {{-- Stats --}}
    <div class="grid grid-cols-3 gap-3 mb-6">
        <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-yellow-400">{{ $statistik['pending'] }}</p>
            <p class="text-xs text-gray-500">Menunggu</p>
        </div>
        <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-green-400">{{ $statistik['terverifikasi'] }}</p>
            <p class="text-xs text-gray-500">Terverifikasi</p>
        </div>
        <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 text-center">
            <p class="text-2xl font-black text-red-400">{{ $statistik['ditolak'] }}</p>
            <p class="text-xs text-gray-500">Ditolak</p>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari nama atau email..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                <option value="ditolak" {{ request('status')=='ditolak'?'selected':'' }}>Ditolak</option>
            </select>
            <select name="peran" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Peran</option>
                @foreach(['siswa','mahasiswa','orang_tua','pengajar','pengunjung'] as $p)
                <option value="{{ $p }}" {{ request('peran')==$p?'selected':'' }}>{{ ucfirst(str_replace('_',' ',$p)) }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
    </div>

    {{-- Tabel Pendaftar --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-kvt-700/30">
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Pendaftar</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Peran</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Lokasi</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Dokumen</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                        <th class="text-left text-gray-400 font-semibold px-4 py-3">Tanggal</th>
                        <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftar as $index => $u)
                    <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                        <td class="px-4 py-3 text-gray-500">{{ $pendaftar->firstItem() + $index }}</td>
                        <td class="px-4 py-3">
                            <div class="font-medium text-white">{{ $u->name }}</div>
                            <div class="text-xs text-gray-500">{{ $u->email }}</div>
                            @if($u->no_hp)
                            <div class="text-xs text-gray-500">{{ $u->no_hp }}</div>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @php
                                $warna = match($u->peran) {
                                    'pengajar' => 'green',
                                    'mahasiswa' => 'blue',
                                    'siswa' => 'kvt',
                                    'orang_tua' => 'purple',
                                    default => 'gray'
                                };
                            @endphp
                            <span class="px-2 py-0.5 text-xs rounded-full bg-{{ $warna }}-500/20 text-{{ $warna }}-400 font-semibold capitalize">
                                {{ str_replace('_', ' ', $u->peran) }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-400 text-xs">
                            @if($u->kota_kabupaten || $u->provinsi)
                                {{ $u->kota_kabupaten }}{{ $u->provinsi ? ', ' . $u->provinsi : '' }}
                            @else
                                <span class="text-gray-600">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            @php $jmlDok = collect(['dokumen_identitas','dokumen_cv','dokumen_ijazah','dokumen_sertifikat'])->filter(fn($f)=>$u->$f)->count(); @endphp
                            @if($jmlDok > 0)
                                <span class="text-kvt-400 text-xs font-semibold">{{ $jmlDok }} file</span>
                            @else
                                <span class="text-gray-600 text-xs">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-center">
                            @if($u->status_verifikasi === 'pending')
                                <span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/20 text-yellow-400 font-semibold">Pending</span>
                            @elseif($u->status_verifikasi === 'ditolak')
                                <span class="px-2 py-0.5 text-xs rounded-full bg-red-500/20 text-red-400 font-semibold">Ditolak</span>
                            @else
                                <span class="px-2 py-0.5 text-xs rounded-full bg-green-500/20 text-green-400 font-semibold">Terverifikasi</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-gray-500 text-xs">{{ $u->created_at->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex items-center justify-center gap-1">
                                {{-- Detail / View Docs --}}
                                <button onclick="bukaModal('modal-detail-{{ $u->id }}')" class="bg-kvt-700/50 hover:bg-kvt-600/50 text-kvt-400 w-8 h-8 rounded-lg transition" title="Detail">
                                    <i class="fas fa-eye text-xs"></i>
                                </button>
                                @if($u->status_verifikasi === 'pending')
                                {{-- Approve --}}
                                <form method="POST" action="{{ route('admin.verifikasi.setujui', $u) }}" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-green-500/20 hover:bg-green-500/30 text-green-400 w-8 h-8 rounded-lg transition" title="Setujui" onclick="return confirm('Setujui akun {{ $u->name }}?')">
                                        <i class="fas fa-check text-xs"></i>
                                    </button>
                                </form>
                                {{-- Reject --}}
                                <button onclick="bukaModal('modal-tolak-{{ $u->id }}')" class="bg-red-500/20 hover:bg-red-500/30 text-red-400 w-8 h-8 rounded-lg transition" title="Tolak">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>

                    {{-- Detail Modal --}}
                    <div id="modal-detail-{{ $u->id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4" onclick="if(event.target===this)tutupModal('modal-detail-{{ $u->id }}')">
                        <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-lg shadow-2xl max-h-[90vh] overflow-y-auto">
                            <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
                                <h3 class="text-lg font-bold text-white">Detail Pendaftar</h3>
                                <button onclick="tutupModal('modal-detail-{{ $u->id }}')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="grid grid-cols-2 gap-4 text-sm">
                                    <div><p class="text-gray-500 text-xs">Nama</p><p class="text-white font-medium">{{ $u->name }}</p></div>
                                    <div><p class="text-gray-500 text-xs">Email</p><p class="text-white font-medium">{{ $u->email }}</p></div>
                                    <div><p class="text-gray-500 text-xs">No HP</p><p class="text-white font-medium">{{ $u->no_hp ?: '-' }}</p></div>
                                    <div><p class="text-gray-500 text-xs">Peran</p><p class="text-white font-medium capitalize">{{ str_replace('_',' ',$u->peran) }}</p></div>
                                    <div><p class="text-gray-500 text-xs">Provinsi</p><p class="text-white font-medium">{{ $u->provinsi ?: '-' }}</p></div>
                                    <div><p class="text-gray-500 text-xs">Kota/Kabupaten</p><p class="text-white font-medium">{{ $u->kota_kabupaten ?: '-' }}</p></div>
                                    <div class="col-span-2"><p class="text-gray-500 text-xs">Asal Instansi</p><p class="text-white font-medium">{{ $u->asal_instansi ?: '-' }}</p></div>
                                    @if($u->bio)
                                    <div class="col-span-2"><p class="text-gray-500 text-xs">Bio</p><p class="text-white font-medium">{{ $u->bio }}</p></div>
                                    @endif
                                </div>

                                {{-- Documents --}}
                                <div>
                                    <p class="text-xs text-kvt-400 uppercase tracking-widest font-bold mb-3"><i class="fas fa-file-alt mr-1"></i>Dokumen</p>
                                    <div class="space-y-2">
                                        @foreach(['identitas'=>'Identitas (KTP/KTM/Kartu Pelajar/KK)', 'cv'=>'CV', 'ijazah'=>'Ijazah', 'sertifikat'=>'Sertifikat'] as $tipe=>$label)
                                            @if($u->{'dokumen_'.$tipe})
                                            <a href="{{ route('admin.verifikasi.dokumen', [$u, $tipe]) }}" target="_blank"
                                                class="flex items-center gap-3 bg-kvt-800/50 border border-kvt-700/30 rounded-lg p-3 hover:border-kvt-500/50 transition">
                                                <i class="fas fa-file-pdf text-kvt-400"></i>
                                                <div>
                                                    <p class="text-sm text-white font-medium">{{ $label }}</p>
                                                    <p class="text-xs text-gray-500">Klik untuk melihat</p>
                                                </div>
                                                <i class="fas fa-external-link-alt text-gray-500 ml-auto text-xs"></i>
                                            </a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                @if($u->catatan_verifikasi)
                                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3">
                                    <p class="text-xs text-red-400 font-semibold mb-1">Catatan Verifikasi:</p>
                                    <p class="text-sm text-gray-300">{{ $u->catatan_verifikasi }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Reject Modal --}}
                    <div id="modal-tolak-{{ $u->id }}" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm p-4" onclick="if(event.target===this)tutupModal('modal-tolak-{{ $u->id }}')">
                        <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md shadow-2xl">
                            <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
                                <h3 class="text-lg font-bold text-red-400"><i class="fas fa-times-circle mr-2"></i>Tolak Akun</h3>
                                <button onclick="tutupModal('modal-tolak-{{ $u->id }}')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
                            </div>
                            <form method="POST" action="{{ route('admin.verifikasi.tolak', $u) }}" class="p-5 space-y-4">
                                @csrf
                                @method('PUT')
                                <p class="text-sm text-gray-400">Tolak akun <span class="text-white font-semibold">{{ $u->name }}</span>?</p>
                                <div>
                                    <label class="text-sm text-gray-300 font-medium mb-1 block">Alasan Penolakan <span class="text-red-400">*</span></label>
                                    <textarea name="catatan" rows="3" required
                                        class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-red-500 focus:ring-2 focus:ring-red-500/20 transition resize-none"
                                        placeholder="Jelaskan alasan penolakan..."></textarea>
                                </div>
                                <button type="submit" class="w-full bg-red-600 hover:bg-red-500 text-white py-3 rounded-xl font-semibold transition">
                                    <i class="fas fa-times mr-2"></i>Tolak Akun
                                </button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-12 text-gray-500">
                            <i class="fas fa-check-double text-4xl mb-3 block text-green-400/30"></i>
                            Tidak ada akun yang perlu diverifikasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        {{ $pendaftar->links() }}
    </div>
</div>

@push('scripts')
<script>
function bukaModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function tutupModal(id) {
    const modal = document.getElementById(id);
    modal.classList.remove('flex');
    modal.classList.add('hidden');
}
</script>
@endpush
@endsection
