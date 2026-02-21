@extends('tata-letak.dasbor')
@section('judul', 'Kelola Cerita Karakter - Admin KVT Hub')
@section('judul-halaman', 'Cerita Karakter — Bejotaro & Veteran')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Karakter Tabs --}}
    <div class="grid grid-cols-2 gap-4 mb-6">
        <a href="{{ route('admin.karakter-cerita.index', ['karakter' => 'bejotaro']) }}" class="bg-kvt-900/80 border {{ request('karakter')=='bejotaro' ? 'border-amber-500/50 bg-amber-500/10' : 'border-kvt-700/30 hover:border-amber-500/30' }} rounded-xl p-4 flex items-center gap-4 transition-all">
            <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-yellow-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-om text-white text-lg"></i>
            </div>
            <div>
                <h3 class="text-white font-bold">Bejotaro</h3>
                <p class="text-amber-400 text-xs">Sang Leluhur — The Book of LELUHUR</p>
            </div>
        </a>
        <a href="{{ route('admin.karakter-cerita.index', ['karakter' => 'veteran']) }}" class="bg-kvt-900/80 border {{ request('karakter')=='veteran' ? 'border-red-500/50 bg-red-500/10' : 'border-kvt-700/30 hover:border-red-500/30' }} rounded-xl p-4 flex items-center gap-4 transition-all">
            <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-bolt text-white text-lg"></i>
            </div>
            <div>
                <h3 class="text-white font-bold">Veteran</h3>
                <p class="text-red-400 text-xs">The Legend — The Book of LEGEND</p>
            </div>
        </a>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            @if(request('karakter'))<input type="hidden" name="karakter" value="{{ request('karakter') }}">@endif
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul chapter..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="draft" {{ request('status')=='draft'?'selected':'' }}>Draft</option>
                <option value="terbit" {{ request('status')=='terbit'?'selected':'' }}>Terbit</option>
                <option value="arsip" {{ request('status')=='arsip'?'selected':'' }}>Arsip</option>
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        <button onclick="bukaModal('modal-tambah')" class="bg-gradient-to-r from-amber-600 to-red-600 hover:from-amber-500 hover:to-red-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Chapter</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Karakter</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Ch</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aliansi</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($cerita as $c)
                @php
                    $isAmber = $c->karakter === 'bejotaro';
                    $accentColor = $isAmber ? 'amber' : 'red';
                @endphp
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center gap-1.5 bg-{{ $accentColor }}-500/10 border border-{{ $accentColor }}-500/20 rounded-lg px-2.5 py-1 text-{{ $accentColor }}-400 text-xs font-bold">
                            <i class="fas {{ $isAmber ? 'fa-om' : 'fa-bolt' }}"></i>
                            {{ ucfirst($c->karakter) }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-{{ $accentColor }}-500/20 text-{{ $accentColor }}-400 font-black text-xs">{{ $c->chapter }}</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($c->gambar)<img src="{{ asset('storage/'.$c->gambar) }}" class="w-10 h-10 rounded-lg object-cover">@else<div class="w-10 h-10 bg-kvt-800 rounded-lg flex items-center justify-center"><i class="fas fa-book text-gray-600"></i></div>@endif
                            <div>
                                <p class="text-white font-medium">{{ Str::limit($c->judul, 40) }}</p>
                                @if($c->judul_asing)<p class="text-xs text-{{ $accentColor }}-400 italic">{{ $c->judul_asing }}</p>@endif
                                <p class="text-xs text-gray-500">{{ Str::limit($c->ringkasan, 60) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($c->aliansi)<span class="text-xs font-bold text-gray-300">{{ $c->aliansi }}</span>@else<span class="text-gray-600">—</span>@endif
                    </td>
                    <td class="px-4 py-3 text-center">
                        @php $sw = ['draft'=>'gray','terbit'=>'green','arsip'=>'red'][$c->status] ?? 'gray'; @endphp
                        <span class="inline-flex items-center gap-1 bg-{{ $sw }}-500/10 text-{{ $sw }}-400 px-2 py-0.5 rounded-full text-[10px] font-bold uppercase">
                            <span class="w-1.5 h-1.5 bg-{{ $sw }}-400 rounded-full"></span>{{ $c->status }}
                        </span>
                    </td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            <button onclick="editCerita({{ json_encode($c) }})" class="w-8 h-8 rounded-lg bg-blue-500/10 text-blue-400 hover:bg-blue-500/20 transition flex items-center justify-center" title="Edit"><i class="fas fa-pen text-[11px]"></i></button>
                            <form method="POST" action="{{ route('admin.karakter-cerita.hapus', $c) }}" onsubmit="return confirm('Hapus chapter ini?')">
                                @csrf @method('DELETE')
                                <button class="w-8 h-8 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500/20 transition flex items-center justify-center" title="Hapus"><i class="fas fa-trash text-[11px]"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="6" class="text-center py-12 text-gray-500">
                    <i class="fas fa-book-open text-3xl mb-3 block"></i>
                    <p class="font-semibold">Belum ada cerita karakter</p>
                    <p class="text-xs mt-1">Klik "Tambah Chapter" untuk memulai</p>
                </td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if($cerita->hasPages())
    <div class="mt-4">{{ $cerita->links() }}</div>
    @endif
</div>

{{-- MODAL TAMBAH --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-kvt-700/30 flex items-center justify-between">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-plus-circle mr-2 text-amber-400"></i>Tambah Chapter Baru</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-400 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.karakter-cerita.simpan') }}" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Karakter *</label>
                    <select name="karakter" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="bejotaro" {{ request('karakter')=='bejotaro'?'selected':'' }}>Bejotaro</option>
                        <option value="veteran" {{ request('karakter')=='veteran'?'selected':'' }}>Veteran</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Chapter *</label>
                    <input type="number" name="chapter" min="1" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Judul *</label>
                <input type="text" name="judul" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Judul Asing</label>
                <input type="text" name="judul_asing" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Judul internasional (opsional)">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Ikon (FA)</label>
                    <input type="text" name="ikon" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="fa-book">
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Warna</label>
                    <select name="warna" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="amber">Amber</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="emerald">Emerald</option>
                        <option value="violet">Violet</option>
                        <option value="cyan">Cyan</option>
                        <option value="orange">Orange</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Status</label>
                    <select name="status" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="terbit">Terbit</option>
                        <option value="draft">Draft</option>
                        <option value="arsip">Arsip</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Aliansi</label>
                    <select name="aliansi" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">Tanpa Aliansi</option>
                        <option value="VTA">VTA</option><option value="VTI">VTI</option>
                        <option value="VTU">VTU</option><option value="VTE">VTE</option><option value="VTO">VTO</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Gambar</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none file:bg-kvt-700 file:text-white file:border-0 file:rounded file:mr-2 file:text-xs">
                </div>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Ringkasan</label>
                <textarea name="ringkasan" rows="2" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-y" placeholder="Ringkasan singkat chapter..."></textarea>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Konten *</label>
                <textarea name="konten" rows="8" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-y font-mono" placeholder="Tulis isi chapter di sini... (markdown/plain text)"></textarea>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="px-4 py-2 rounded-lg bg-kvt-800 text-gray-400 text-sm hover:bg-kvt-700 transition">Batal</button>
                <button type="submit" class="px-6 py-2 rounded-lg bg-gradient-to-r from-amber-600 to-red-600 text-white text-sm font-bold hover:from-amber-500 hover:to-red-500 transition"><i class="fas fa-save mr-1"></i>Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- MODAL EDIT --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto">
        <div class="p-6 border-b border-kvt-700/30 flex items-center justify-between">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Chapter</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-400 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
            @csrf @method('PUT')
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Karakter *</label>
                    <select name="karakter" id="edit-karakter" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="bejotaro">Bejotaro</option>
                        <option value="veteran">Veteran</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Chapter *</label>
                    <input type="number" name="chapter" id="edit-chapter" min="1" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Judul *</label>
                <input type="text" name="judul" id="edit-judul" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Judul Asing</label>
                <input type="text" name="judul_asing" id="edit-judul_asing" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Ikon (FA)</label>
                    <input type="text" name="ikon" id="edit-ikon" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Warna</label>
                    <select name="warna" id="edit-warna" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="amber">Amber</option><option value="red">Red</option>
                        <option value="blue">Blue</option><option value="emerald">Emerald</option>
                        <option value="violet">Violet</option><option value="cyan">Cyan</option>
                        <option value="orange">Orange</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Status</label>
                    <select name="status" id="edit-status" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="terbit">Terbit</option><option value="draft">Draft</option><option value="arsip">Arsip</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Aliansi</label>
                    <select name="aliansi" id="edit-aliansi" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="">Tanpa Aliansi</option>
                        <option value="VTA">VTA</option><option value="VTI">VTI</option>
                        <option value="VTU">VTU</option><option value="VTE">VTE</option><option value="VTO">VTO</option>
                    </select>
                </div>
                <div>
                    <label class="text-gray-400 text-xs font-semibold mb-1 block">Gambar</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none file:bg-kvt-700 file:text-white file:border-0 file:rounded file:mr-2 file:text-xs">
                </div>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Ringkasan</label>
                <textarea name="ringkasan" id="edit-ringkasan" rows="2" class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-y"></textarea>
            </div>
            <div>
                <label class="text-gray-400 text-xs font-semibold mb-1 block">Konten *</label>
                <textarea name="konten" id="edit-konten" rows="8" required class="w-full bg-kvt-800 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-y font-mono"></textarea>
            </div>
            <div class="flex justify-end gap-3 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')" class="px-4 py-2 rounded-lg bg-kvt-800 text-gray-400 text-sm hover:bg-kvt-700 transition">Batal</button>
                <button type="submit" class="px-6 py-2 rounded-lg bg-blue-600 text-white text-sm font-bold hover:bg-blue-500 transition"><i class="fas fa-save mr-1"></i>Perbarui</button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
function bukaModal(id) { document.getElementById(id).classList.remove('hidden'); document.getElementById(id).classList.add('flex'); }
function tutupModal(id) { document.getElementById(id).classList.add('hidden'); document.getElementById(id).classList.remove('flex'); }

function editCerita(c) {
    document.getElementById('form-edit').action = '/admin/karakter-cerita/' + c.id;
    document.getElementById('edit-karakter').value = c.karakter;
    document.getElementById('edit-chapter').value = c.chapter;
    document.getElementById('edit-judul').value = c.judul;
    document.getElementById('edit-judul_asing').value = c.judul_asing || '';
    document.getElementById('edit-ikon').value = c.ikon || '';
    document.getElementById('edit-warna').value = c.warna || 'amber';
    document.getElementById('edit-status').value = c.status || 'terbit';
    document.getElementById('edit-aliansi').value = c.aliansi || '';
    document.getElementById('edit-ringkasan').value = c.ringkasan || '';
    document.getElementById('edit-konten').value = c.konten || '';
    bukaModal('modal-edit');
}

// Close modals on backdrop click
['modal-tambah', 'modal-edit'].forEach(function(id) {
    document.getElementById(id).addEventListener('click', function(e) {
        if (e.target === this) tutupModal(id);
    });
});
</script>
@endpush
@endsection
