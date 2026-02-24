@extends('tata-letak.dasbor')
@section('judul', 'Kelola Edukasi Gratis - Admin KVT Hub')
@section('judul-halaman', 'Kelola Edukasi Gratis')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Stats Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-green-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-graduation-cap text-green-400"></i></div>
                <div><p class="text-2xl font-black text-white">{{ \App\Models\EdukasiGratis::count() }}</p><p class="text-xs text-gray-500">Total Edukasi</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-kvt-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-check-circle text-kvt-400"></i></div>
                <div><p class="text-2xl font-black text-white">{{ \App\Models\EdukasiGratis::where('aktif', true)->count() }}</p><p class="text-xs text-gray-500">Aktif</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-amber-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-star text-amber-400"></i></div>
                <div><p class="text-2xl font-black text-white">{{ \App\Models\EdukasiGratis::where('unggulan', true)->count() }}</p><p class="text-xs text-gray-500">Unggulan</p></div>
            </div>
        </div>
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-xl p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-purple-500/10 rounded-xl flex items-center justify-center"><i class="fas fa-eye text-purple-400"></i></div>
                <div><p class="text-2xl font-black text-white">{{ number_format(\App\Models\EdukasiGratis::sum('dilihat')) }}</p><p class="text-xs text-gray-500">Total Dilihat</p></div>
            </div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row gap-3 mb-6">
        <form class="flex-1 flex gap-2" method="GET">
            <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul edukasi..." class="flex-1 bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm placeholder-gray-500 focus:border-kvt-500 focus:outline-none">
            <select name="kategori" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Kategori</option>
                @foreach($kategoriList as $k => $label)<option value="{{ $k }}" {{ request('kategori')==$k?'selected':'' }}>{{ $label }}</option>@endforeach
            </select>
            <select name="status" class="bg-kvt-900/80 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                <option value="">Semua Status</option>
                <option value="aktif" {{ request('status')=='aktif'?'selected':'' }}>Aktif</option>
                <option value="nonaktif" {{ request('status')=='nonaktif'?'selected':'' }}>Nonaktif</option>
            </select>
            <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-4 py-2 rounded-lg text-white text-sm transition"><i class="fas fa-search"></i></button>
        </form>
        @include('komponen.tombol-ekspor', ['tabelId' => 'tabel-data', 'namaFile' => 'data-edukasi-gratis', 'judul' => 'Data Edukasi Gratis'])
        <button onclick="bukaModal('modal-tambah')" class="bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition whitespace-nowrap"><i class="fas fa-plus mr-1"></i> Tambah Edukasi</button>
    </div>

    {{-- Tabel --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table id="tabel-data" class="w-full text-sm">
                <thead><tr class="border-b border-kvt-700/30">
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">#</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Judul</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Kategori</th>
                    <th class="text-left text-gray-400 font-semibold px-4 py-3">Platform</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Status</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Unggulan</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Dilihat</th>
                    <th class="text-center text-gray-400 font-semibold px-4 py-3">Aksi</th>
                </tr></thead>
                <tbody>
                @forelse($edukasi as $i => $e)
                <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/30 transition">
                    <td class="px-4 py-3 text-gray-500">{{ $edukasi->firstItem() + $i }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-{{ $e->warna ?? 'kvt' }}-500/10 rounded-lg flex items-center justify-center shrink-0">
                                <i class="{{ $e->ikon ?? 'fas fa-graduation-cap' }} text-{{ $e->warna ?? 'kvt' }}-400"></i>
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ Str::limit($e->judul, 45) }}</p>
                                <p class="text-xs text-gray-500">{{ Str::limit($e->deskripsi, 60) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3"><span class="px-2 py-1 rounded-full text-xs bg-kvt-800 text-gray-300">{{ $kategoriList[$e->kategori] ?? $e->kategori }}</span></td>
                    <td class="px-4 py-3 text-gray-400">{{ $e->platform ?? '-' }}</td>
                    <td class="px-4 py-3 text-center">
                        <form method="POST" action="{{ route('admin.edukasi-gratis.toggle', $e) }}" class="inline">
                            @csrf @method('PUT')
                            <button type="submit" class="px-2 py-1 rounded-full text-xs font-semibold {{ $e->aktif ? 'bg-green-500/20 text-green-400' : 'bg-red-500/20 text-red-400' }}">
                                {{ $e->aktif ? 'Aktif' : 'Nonaktif' }}
                            </button>
                        </form>
                    </td>
                    <td class="px-4 py-3 text-center">
                        @if($e->unggulan)<i class="fas fa-star text-amber-400"></i>@else<i class="far fa-star text-gray-600"></i>@endif
                    </td>
                    <td class="px-4 py-3 text-center text-gray-400">{{ number_format($e->dilihat) }}</td>
                    <td class="px-4 py-3 text-center">
                        <div class="flex items-center justify-center gap-1">
                            @if($e->url_resmi)<a href="{{ $e->url_resmi }}" target="_blank" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-green-500/20 text-gray-400 hover:text-green-400 transition" title="Buka Link"><i class="fas fa-external-link-alt text-xs"></i></a>@endif
                            <button onclick='bukaEdit(@json($e))' class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-blue-500/20 text-gray-400 hover:text-blue-400 transition" title="Edit"><i class="fas fa-edit text-xs"></i></button>
                            <button onclick="bukaHapus({{ $e->id }}, '{{ addslashes($e->judul) }}')" class="w-8 h-8 rounded-lg bg-kvt-800/50 hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr><td colspan="8" class="text-center py-12 text-gray-500"><i class="fas fa-graduation-cap text-3xl mb-3 block"></i>Belum ada data edukasi gratis.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>
        @if($edukasi->hasPages())<div class="px-4 py-3 border-t border-kvt-700/30">{{ $edukasi->links() }}</div>@endif
    </div>
</div>

{{-- Modal Tambah --}}
<div id="modal-tambah" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-plus-circle mr-2 text-green-400"></i>Tambah Edukasi Gratis</h3>
            <button onclick="tutupModal('modal-tambah')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.edukasi-gratis.simpan') }}" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Judul <span class="text-red-400">*</span></label>
                    <input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Contoh: Cara Daftar GitHub Education Pro Gratis">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Kategori</label>
                    <select name="kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach($kategoriList as $k => $label)<option value="{{ $k }}">{{ $label }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Platform</label>
                    <input type="text" name="platform" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="GitHub, Figma, Google, dll">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">URL Resmi</label>
                    <input type="url" name="url_resmi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="https://education.github.com/">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Deskripsi <span class="text-red-400">*</span></label>
                    <textarea name="deskripsi" rows="3" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none" placeholder="Deskripsi singkat tentang program edukasi ini..."></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Langkah-langkah (HTML)</label>
                    <textarea name="langkah" rows="6" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none font-mono" placeholder="<ol><li>Langkah 1...</li><li>Langkah 2...</li></ol>"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Ikon (Font Awesome)</label>
                    <input type="text" name="ikon" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="fab fa-github" value="fas fa-graduation-cap">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Warna</label>
                    <select name="warna" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="kvt">Biru KVT</option>
                        <option value="green">Hijau</option>
                        <option value="purple">Ungu</option>
                        <option value="amber">Amber</option>
                        <option value="red">Merah</option>
                        <option value="cyan">Cyan</option>
                        <option value="pink">Pink</option>
                        <option value="indigo">Indigo</option>
                        <option value="teal">Teal</option>
                        <option value="orange">Orange</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Gambar</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Urutan</label>
                    <input type="number" name="urutan" value="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
            </div>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                    <input type="checkbox" name="aktif" checked class="w-4 h-4 rounded bg-kvt-800 border-kvt-700 text-kvt-500 focus:ring-kvt-500"> Aktif
                </label>
                <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                    <input type="checkbox" name="unggulan" class="w-4 h-4 rounded bg-kvt-800 border-kvt-700 text-amber-500 focus:ring-amber-500"> Unggulan
                </label>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah')" class="px-4 py-2 rounded-lg text-gray-400 hover:text-white transition text-sm">Batal</button>
                <button type="submit" class="bg-green-600 hover:bg-green-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Edit --}}
<div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-2xl mx-4 max-h-[90vh] overflow-y-auto shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-edit mr-2 text-blue-400"></i>Edit Edukasi Gratis</h3>
            <button onclick="tutupModal('modal-edit')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form id="form-edit" method="POST" enctype="multipart/form-data" class="p-5 space-y-4">
            @csrf @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Judul <span class="text-red-400">*</span></label>
                    <input type="text" name="judul" id="edit-judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Kategori</label>
                    <select name="kategori" id="edit-kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        @foreach($kategoriList as $k => $label)<option value="{{ $k }}">{{ $label }}</option>@endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Platform</label>
                    <input type="text" name="platform" id="edit-platform" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">URL Resmi</label>
                    <input type="url" name="url_resmi" id="edit-url_resmi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Deskripsi <span class="text-red-400">*</span></label>
                    <textarea name="deskripsi" id="edit-deskripsi" rows="3" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none"></textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm text-gray-400 mb-1">Langkah-langkah (HTML)</label>
                    <textarea name="langkah" id="edit-langkah" rows="6" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none resize-none font-mono"></textarea>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Ikon (Font Awesome)</label>
                    <input type="text" name="ikon" id="edit-ikon" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Warna</label>
                    <select name="warna" id="edit-warna" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                        <option value="kvt">Biru KVT</option>
                        <option value="green">Hijau</option>
                        <option value="purple">Ungu</option>
                        <option value="amber">Amber</option>
                        <option value="red">Merah</option>
                        <option value="cyan">Cyan</option>
                        <option value="pink">Pink</option>
                        <option value="indigo">Indigo</option>
                        <option value="teal">Teal</option>
                        <option value="orange">Orange</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Gambar</label>
                    <input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-sm text-gray-400 mb-1">Urutan</label>
                    <input type="number" name="urutan" id="edit-urutan" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-4 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                </div>
            </div>
            <div class="flex items-center gap-6">
                <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                    <input type="checkbox" name="aktif" id="edit-aktif" class="w-4 h-4 rounded bg-kvt-800 border-kvt-700 text-kvt-500 focus:ring-kvt-500"> Aktif
                </label>
                <label class="flex items-center gap-2 text-sm text-gray-400 cursor-pointer">
                    <input type="checkbox" name="unggulan" id="edit-unggulan" class="w-4 h-4 rounded bg-kvt-800 border-kvt-700 text-amber-500 focus:ring-amber-500"> Unggulan
                </label>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-edit')" class="px-4 py-2 rounded-lg text-gray-400 hover:text-white transition text-sm">Batal</button>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Hapus --}}
<div id="modal-hapus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="p-6 text-center">
            <div class="w-16 h-16 bg-red-500/10 rounded-full flex items-center justify-center mx-auto mb-4"><i class="fas fa-trash text-2xl text-red-400"></i></div>
            <h3 class="text-lg font-bold text-white mb-2">Hapus Edukasi Gratis?</h3>
            <p class="text-sm text-gray-400 mb-6">Yakin ingin menghapus "<span id="hapus-judul" class="text-white font-semibold"></span>"?</p>
            <form id="form-hapus" method="POST" class="flex gap-2 justify-center">
                @csrf @method('DELETE')
                <button type="button" onclick="tutupModal('modal-hapus')" class="px-6 py-2 rounded-lg text-gray-400 hover:text-white border border-kvt-700/30 hover:bg-kvt-800/50 transition text-sm">Batal</button>
                <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-trash mr-1"></i> Hapus</button>
            </form>
        </div>
    </div>
</div>

<script>
function bukaModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('flex');}
function tutupModal(id){document.getElementById(id).classList.add('hidden');document.getElementById(id).classList.remove('flex');}

function bukaEdit(data){
    document.getElementById('form-edit').action = '/admin/edukasi-gratis/' + data.id;
    document.getElementById('edit-judul').value = data.judul || '';
    document.getElementById('edit-kategori').value = data.kategori || '';
    document.getElementById('edit-platform').value = data.platform || '';
    document.getElementById('edit-url_resmi').value = data.url_resmi || '';
    document.getElementById('edit-deskripsi').value = data.deskripsi || '';
    document.getElementById('edit-langkah').value = data.langkah || '';
    document.getElementById('edit-ikon').value = data.ikon || '';
    document.getElementById('edit-warna').value = data.warna || 'kvt';
    document.getElementById('edit-urutan').value = data.urutan || 0;
    document.getElementById('edit-aktif').checked = data.aktif;
    document.getElementById('edit-unggulan').checked = data.unggulan;
    bukaModal('modal-edit');
}

function bukaHapus(id, judul){
    document.getElementById('form-hapus').action = '/admin/edukasi-gratis/' + id;
    document.getElementById('hapus-judul').textContent = judul;
    bukaModal('modal-hapus');
}
</script>
@endsection
