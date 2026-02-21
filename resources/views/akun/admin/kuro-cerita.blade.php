@extends('tata-letak.dasbor')
@section('judul', 'Kelola Cerita Kuro - Admin KVT Hub')
@section('judul-halaman', 'Cerita Kuro — Chapters')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Aliansi Legend --}}
    <div class="grid grid-cols-5 gap-3 mb-6">
        @php
        $aliansiList = [
            ['kode' => 'VTA', 'nama' => 'Vanguard Titan Alliance', 'warna' => 'red', 'ikon' => 'fa-fist-raised'],
            ['kode' => 'VTI', 'nama' => 'Vigilant Thunder Initiative', 'warna' => 'yellow', 'ikon' => 'fa-bolt'],
            ['kode' => 'VTU', 'nama' => 'Valiant Truth Union', 'warna' => 'blue', 'ikon' => 'fa-balance-scale'],
            ['kode' => 'VTE', 'nama' => 'Vital Terra Enclave', 'warna' => 'green', 'ikon' => 'fa-leaf'],
            ['kode' => 'VTO', 'nama' => 'Venerable Tempest Order', 'warna' => 'purple', 'ikon' => 'fa-wind'],
        ];
        @endphp
        @foreach($aliansiList as $a)
        <div class="bg-{{ $a['warna'] }}-500/10 border border-{{ $a['warna'] }}-500/20 rounded-xl px-3 py-2 text-center">
            <i class="fas {{ $a['ikon'] }} text-{{ $a['warna'] }}-400 text-lg"></i>
            <div class="text-{{ $a['warna'] }}-400 font-black text-xs mt-1">{{ $a['kode'] }}</div>
            <div class="text-gray-500 text-[10px] leading-tight">{{ $a['nama'] }}</div>
        </div>
        @endforeach
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul chapter..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="draft" {{ request('status')=='draft'?'selected':'' }}>Draft</option>
                <option value="terbit" {{ request('status')=='terbit'?'selected':'' }}>Terbit</option>
                <option value="arsip" {{ request('status')=='arsip'?'selected':'' }}>Arsip</option>
            </select>
            <select name="aliansi" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Aliansi</option>
                <option value="VTA" {{ request('aliansi')=='VTA'?'selected':'' }}>VTA</option>
                <option value="VTI" {{ request('aliansi')=='VTI'?'selected':'' }}>VTI</option>
                <option value="VTU" {{ request('aliansi')=='VTU'?'selected':'' }}>VTU</option>
                <option value="VTE" {{ request('aliansi')=='VTE'?'selected':'' }}>VTE</option>
                <option value="VTO" {{ request('aliansi')=='VTO'?'selected':'' }}>VTO</option>
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-violet-600 hover:bg-violet-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Chapter</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Ch</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aliansi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Jenjang</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($cerita as $i => $c)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-violet-500/20 text-violet-400 font-black text-xs">{{ $c->chapter }}</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($c->gambar)<img src="{{ asset('storage/'.$c->gambar) }}" class="w-10 h-10 rounded-lg object-cover">@else<div class="w-10 h-10 bg-kvt-800 rounded-lg flex items-center justify-center"><i class="fas fa-book text-gray-600"></i></div>@endif
                            <div>
                                <p class="text-white font-medium">{{ Str::limit($c->judul, 40) }}</p>
                                @if($c->judul_asing)<p class="text-xs text-purple-400 italic">{{ $c->judul_asing }}</p>@endif
                                <p class="text-xs text-gray-500">{{ Str::limit($c->ringkasan, 60) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($c->aliansi)
                        @php
                            $warnaAliansi = match($c->aliansi) { 'VTA' => 'red', 'VTI' => 'yellow', 'VTU' => 'blue', 'VTE' => 'green', 'VTO' => 'purple', default => 'gray' };
                        @endphp
                        <span class="px-2 py-1 rounded-full text-xs font-bold bg-{{ $warnaAliansi }}-500/20 text-{{ $warnaAliansi }}-400">{{ $c->aliansi }}</span>
                        @else <span class="text-gray-600">—</span> @endif
                    </td>
                    <td class="px-4 py-3 text-center text-gray-400 text-xs">{{ $c->jenjang ?? '—' }}</td>
                    <td class="px-4 py-3 text-center">
                        <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $c->status=='terbit' ? 'bg-green-500/20 text-green-400' : ($c->status=='draft' ? 'bg-yellow-500/20 text-yellow-400' : 'bg-gray-500/20 text-gray-400') }}">{{ ucfirst($c->status ?? 'draft') }}</span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick='bukaEdit(@json($c))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $c->id }}, '{{ addslashes($c->judul) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-12 text-gray-500"><i class="fas fa-book-dead text-3xl mb-3 block"></i>Belum ada chapter cerita Kuro.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($cerita->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $cerita->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-violet-400"></i>Tambah Chapter</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.kuro-cerita.simpan') }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Chapter # *</label><input type="number" name="chapter" min="1" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Aliansi</label>
                    <select name="aliansi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">— Pilih —</option>
                        <option value="VTA">VTA — Vanguard Titan Alliance</option>
                        <option value="VTI">VTI — Vigilant Thunder Initiative</option>
                        <option value="VTU">VTU — Valiant Truth Union</option>
                        <option value="VTE">VTE — Vital Terra Enclave</option>
                        <option value="VTO">VTO — Venerable Tempest Order</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label><input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Misal: Awal Mula — Penciptaan"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Judul Asing (Julukan)</label><input type="text" name="judul_asing" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Misal: Genesis of the Chosen"></div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Ikon (FA)</label><input type="text" name="ikon" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="fa-star"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Warna Class</label><input type="text" name="warna" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="purple"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Warna Hex</label><input type="text" name="warna_hex" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="#8B5CF6"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Jenjang Pendidikan</label><input type="text" name="jenjang" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="TK, SD, SMP, SMA, S1, dll"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Ringkasan</label><textarea name="ringkasan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Ringkasan singkat chapter..."></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten Cerita *</label><textarea name="konten" rows="8" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Cerita lengkap chapter ini..."></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Gambar Cover</label><input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Status</label>
                    <select name="status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="draft">Draft</option><option value="terbit" selected>Terbit</option><option value="arsip">Arsip</option>
                    </select>
                </div>
            </div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-violet-600 hover:bg-violet-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan Chapter</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Chapter</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">@csrf @method('PUT')
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Chapter # *</label><input type="number" name="chapter" id="edit-chapter" min="1" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Aliansi</label>
                    <select name="aliansi" id="edit-aliansi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">— Pilih —</option>
                        <option value="VTA">VTA — Vanguard Titan Alliance</option>
                        <option value="VTI">VTI — Vigilant Thunder Initiative</option>
                        <option value="VTU">VTU — Valiant Truth Union</option>
                        <option value="VTE">VTE — Vital Terra Enclave</option>
                        <option value="VTO">VTO — Venerable Tempest Order</option>
                    </select>
                </div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Judul *</label><input type="text" name="judul" id="edit-judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Judul Asing (Julukan)</label><input type="text" name="judul_asing" id="edit-judul_asing" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-3 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Ikon (FA)</label><input type="text" name="ikon" id="edit-ikon" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Warna Class</label><input type="text" name="warna" id="edit-warna" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Warna Hex</label><input type="text" name="warna_hex" id="edit-warna_hex" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Jenjang Pendidikan</label><input type="text" name="jenjang" id="edit-jenjang" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Ringkasan</label><textarea name="ringkasan" id="edit-ringkasan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div><label class="block text-sm text-gray-400 mb-1">Konten Cerita *</label><textarea name="konten" id="edit-konten" rows="8" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Ganti Gambar</label><input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:border-0 file:rounded file:px-3 file:py-1 file:text-sm file:text-white focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Status</label>
                    <select name="status" id="edit-status" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="draft">Draft</option><option value="terbit">Terbit</option><option value="arsip">Arsip</option>
                    </select>
                </div>
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
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-sm mx-4 shadow-2xl">
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-red-500/20 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-exclamation-triangle text-red-400 text-2xl"></i></div>
            <h3 class="text-lg font-bold text-white mb-2">Hapus Chapter?</h3>
            <p class="text-gray-400 text-sm mb-6">Yakin menghapus <strong id="hapus-nama" class="text-white"></strong>?</p>
            <form id="form-hapus" method="POST">@csrf @method('DELETE')
                <div class="flex gap-2">
                    <button type="button" onclick="tutupModal('modal-hapus')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                    <button type="submit" class="flex-1 bg-red-600 hover:bg-red-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Ya, Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
function bukaModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('flex')}
function tutupModal(id){document.getElementById(id).classList.add('hidden');document.getElementById(id).classList.remove('flex')}
function bukaEdit(c){
    document.getElementById('form-edit').action='/admin/kuro-cerita/'+c.id;
    document.getElementById('edit-chapter').value=c.chapter||'';
    document.getElementById('edit-judul').value=c.judul||'';
    document.getElementById('edit-judul_asing').value=c.judul_asing||'';
    document.getElementById('edit-ikon').value=c.ikon||'';
    document.getElementById('edit-warna').value=c.warna||'';
    document.getElementById('edit-warna_hex').value=c.warna_hex||'';
    document.getElementById('edit-ringkasan').value=c.ringkasan||'';
    document.getElementById('edit-konten').value=c.konten||'';
    document.getElementById('edit-aliansi').value=c.aliansi||'';
    document.getElementById('edit-jenjang').value=c.jenjang||'';
    document.getElementById('edit-status').value=c.status||'draft';
    bukaModal('modal-edit');
}
function bukaHapus(id,nama){document.getElementById('form-hapus').action='/admin/kuro-cerita/'+id;document.getElementById('hapus-nama').textContent=nama;bukaModal('modal-hapus')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});
</script>
@endpush
@endsection
