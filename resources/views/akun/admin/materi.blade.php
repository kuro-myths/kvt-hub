@extends('tata-letak.dasbor')
@section('judul', 'Kelola Materi - Admin KVT Hub')
@section('judul-halaman', 'Kelola Materi')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Filter & Actions --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2 flex-wrap" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul materi..."
                class="flex-1 min-w-[200px] bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="kelas_id" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kelas</option>
                @foreach($kelasList as $k)<option value="{{ $k->id }}" {{ request('kelas_id')==$k->id?'selected':'' }}>{{ $k->nama }}</option>@endforeach
            </select>
            <select name="tipe" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Tipe</option>
                @foreach(['video','artikel','tutorial','praktik','quiz'] as $t)<option value="{{ $t }}" {{ request('tipe')==$t?'selected':'' }}>{{ ucfirst($t) }}</option>@endforeach
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-materi', 'judul' => 'Data Materi'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap">
            <i class="fas fa-plus mr-1"></i> Tambah Materi
        </button>
    </div>

    {{-- Table --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Materi</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kelas</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Tipe</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">XP</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Kuis</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($materi as $i => $m)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $materi->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-kvt-400/20 to-purple-500/20 rounded-lg flex items-center justify-center flex-shrink-0">
                                @php $ikon = match($m->tipe) { 'video'=>'fa-play-circle','artikel'=>'fa-newspaper','tutorial'=>'fa-laptop-code','praktik'=>'fa-flask','quiz'=>'fa-brain',default=>'fa-book' }; @endphp
                                <i class="fas {{ $ikon }} text-kvt-400/60"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ $m->judul }}</p>
                                <p class="text-xs text-gray-500">{{ Str::limit($m->deskripsi, 50) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-gray-400">{{ $m->kelas?->nama ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs bg-kvt-800 text-kvt-400 font-semibold">{{ ucfirst($m->tipe) }}</span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <span class="text-green-400 font-semibold">+{{ $m->xp_reward }}</span>
                    </td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ $m->kuis_count }}</td>
                    <td class="px-4 py-3 text-center">
                        @php $sw = $m->status === 'terbit' ? 'green' : 'yellow'; @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-semibold bg-{{ $sw }}-500/20 text-{{ $sw }}-400">{{ ucfirst($m->status ?? 'draft') }}</span>
                        @if($m->eksklusif)<span class="ml-1 px-2 py-1 rounded-full text-xs font-semibold bg-yellow-500/20 text-yellow-400"><i class="fas fa-crown text-[10px]"></i></span>@endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <a href="{{ route('materi.buku', $m) }}" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-purple-500/20 text-gray-400 hover:text-purple-400 transition flex items-center justify-center" title="Mode Buku">
                                <i class="fas fa-book-open text-xs"></i>
                            </a>
                            <button onclick='bukaEdit(@json($m))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition">
                                <i class="fas fa-edit text-xs"></i>
                            </button>
                            <button onclick="bukaHapus({{ $m->id }}, '{{ addslashes($m->judul) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition">
                                <i class="fas fa-trash text-xs"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-book text-3xl mb-3 block"></i>Belum ada materi.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($materi->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $materi->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Materi</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.materi.simpan') }}" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul Materi *</label>
                <input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kelas *</label>
                    <select name="kelas_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelasList as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                    </select></div>
                <div><label class="block text-sm text-gray-400 mb-1">Pengajar</label>
                    <select name="guru_id" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">-- Pilih --</option>
                        @foreach($pengajar as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach
                    </select></div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Tipe *</label>
                    <select name="tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['video','artikel','tutorial','praktik','quiz'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select></div>
                <div><label class="block text-sm text-gray-400 mb-1">XP Reward</label>
                    <input type="number" name="xp_reward" min="1" max="1000" value="10" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (menit)</label>
                    <input type="number" name="durasi_menit" min="1" value="10" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Video URL (YouTube)</label>
                <input type="url" name="video_url" placeholder="https://youtube.com/watch?v=..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label>
                <textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten <span class="text-gray-600">(isi materi untuk Mode Buku, gunakan # untuk heading)</span></label>
                <textarea name="konten" rows="8" placeholder="# Bab 1&#10;&#10;Konten materi di sini...&#10;&#10;# Bab 2&#10;&#10;Lanjutan materi..."
                    class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none font-mono"></textarea></div>
            <div class="flex items-center gap-6">
                <div><label class="block text-sm text-gray-400 mb-1">Status *</label>
                    <select name="status" required class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="terbit">Terbit</option><option value="draft">Draft</option>
                    </select></div>
                <label class="flex items-center gap-2 cursor-pointer mt-5">
                    <input type="checkbox" name="eksklusif" value="1" class="w-4 h-4 rounded border-kvt-700 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                    <span class="text-sm text-yellow-400"><i class="fas fa-crown mr-1"></i>Eksklusif</span>
                </label>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Materi</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" class="p-5 space-y-4">@csrf @method('PUT')
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label>
                <input type="text" name="judul" id="edit-judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Kelas *</label>
                    <select name="kelas_id" id="edit-kelas" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach($kelasList as $k)<option value="{{ $k->id }}">{{ $k->nama }}</option>@endforeach
                    </select></div>
                <div><label class="block text-sm text-gray-400 mb-1">Pengajar</label>
                    <select name="guru_id" id="edit-guru" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">-- Pilih --</option>
                        @foreach($pengajar as $p)<option value="{{ $p->id }}">{{ $p->name }}</option>@endforeach
                    </select></div>
            </div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Tipe *</label>
                    <select name="tipe" id="edit-tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach(['video','artikel','tutorial','praktik','quiz'] as $t)<option value="{{ $t }}">{{ ucfirst($t) }}</option>@endforeach
                    </select></div>
                <div><label class="block text-sm text-gray-400 mb-1">XP Reward</label>
                    <input type="number" name="xp_reward" id="edit-xp" min="1" max="1000" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Durasi (menit)</label>
                    <input type="number" name="durasi_menit" id="edit-durasi" min="1" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Video URL</label>
                <input type="url" name="video_url" id="edit-video" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label>
                <textarea name="deskripsi" id="edit-deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten <span class="text-gray-600">(gunakan # untuk heading)</span></label>
                <textarea name="konten" id="edit-konten" rows="8" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none font-mono"></textarea></div>
            <div class="flex items-center gap-6">
                <div><label class="block text-sm text-gray-400 mb-1">Status *</label>
                    <select name="status" id="edit-status" required class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="terbit">Terbit</option><option value="draft">Draft</option>
                    </select></div>
                <label class="flex items-center gap-2 cursor-pointer mt-5">
                    <input type="checkbox" name="eksklusif" id="edit-eksklusif" value="1" class="w-4 h-4 rounded border-kvt-700 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                    <span class="text-sm text-yellow-400"><i class="fas fa-crown mr-1"></i>Eksklusif</span>
                </label>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Perbarui</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl"><div class="p-6 text-center">
        <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
        <h3 class="text-lg font-bold text-white mb-2">Hapus Materi?</h3>
        <p class="text-gray-400 text-sm mb-6">Yakin menghapus <strong id="hapus-nama" class="text-white"></strong>? Semua kuis terkait juga akan terhapus.</p>
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

function bukaEdit(d){
    document.getElementById('form-edit').action='/admin/materi/'+d.id;
    document.getElementById('edit-judul').value=d.judul||'';
    document.getElementById('edit-kelas').value=d.kelas_id||'';
    document.getElementById('edit-guru').value=d.guru_id||'';
    document.getElementById('edit-tipe').value=d.tipe||'artikel';
    document.getElementById('edit-xp').value=d.xp_reward||10;
    document.getElementById('edit-durasi').value=d.durasi_menit||0;
    document.getElementById('edit-video').value=d.video_url||'';
    document.getElementById('edit-deskripsi').value=d.deskripsi||'';
    document.getElementById('edit-konten').value=d.konten||'';
    document.getElementById('edit-status').value=d.status||'draft';
    document.getElementById('edit-eksklusif').checked=!!d.eksklusif;
    bukaModal('modal-edit');
}

function bukaHapus(id, nama){
    document.getElementById('form-hapus').action='/admin/materi/'+id;
    document.getElementById('hapus-nama').textContent=nama;
    bukaModal('modal-hapus');
}
</script>
@endpush
@endsection
