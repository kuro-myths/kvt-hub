@extends('tata-letak.dasbor')
@section('judul', 'Detail Organisasi: ' . $organisasi->nama . ' - Admin KVT Hub')
@section('judul-halaman', 'Detail Organisasi')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">

    {{-- Flash Messages --}}
    @if(session('sukses'))<div class="mb-4 bg-green-500/20 border border-green-500/30 rounded-xl px-4 py-3 text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>@endif
    @if($errors->any())<div class="mb-4 bg-red-500/20 border border-red-500/30 rounded-xl px-4 py-3 text-red-400 text-sm">@foreach($errors->all() as $e)<p><i class="fas fa-exclamation-circle mr-1"></i>{{ $e }}</p>@endforeach</div>@endif

    {{-- Header --}}
    <div class="flex items-center gap-4 mb-6">
        <a href="{{ route('admin.organisasi.index') }}" class="w-10 h-10 bg-kvt-800/50 hover:bg-kvt-700/50 rounded-lg flex items-center justify-center text-gray-400 hover:text-white transition">
            <i class="fas fa-arrow-left"></i>
        </a>
        <div class="flex items-center gap-3 flex-1">
            @if($organisasi->logo)
            <img src="{{ asset('storage/'.$organisasi->logo) }}" class="w-12 h-12 rounded-xl object-contain bg-white p-1">
            @else
            <div class="w-12 h-12 bg-pink-500/20 rounded-xl flex items-center justify-center"><i class="fas fa-sitemap text-pink-400 text-xl"></i></div>
            @endif
            <div>
                <h1 class="text-xl font-bold text-white">{{ $organisasi->nama }}</h1>
                <div class="flex items-center gap-2 text-xs">
                    <span class="px-2 py-0.5 rounded-full bg-pink-500/20 text-pink-400 font-semibold uppercase">{{ $organisasi->tipe }}</span>
                    <span class="px-2 py-0.5 rounded-full bg-kvt-500/20 text-kvt-400">{{ ucfirst(str_replace('_', ' ', $organisasi->kategori)) }}</span>
                    @if($organisasi->unggulan)<i class="fas fa-star text-yellow-400" title="Unggulan"></i>@endif
                </div>
            </div>
        </div>
        <a href="{{ route('halaman.komunitas.organisasi.detail', $organisasi->id) }}" target="_blank" class="bg-kvt-700/50 hover:bg-kvt-600/50 px-4 py-2 rounded-lg text-kvt-400 text-sm transition">
            <i class="fas fa-external-link-alt mr-1"></i> Lihat Halaman Publik
        </a>
    </div>

    {{-- Tabs --}}
    <div class="flex gap-1 mb-6 bg-kvt-900/80 rounded-xl p-1 overflow-x-auto border border-kvt-700/20" id="tab-nav">
        <button onclick="bukaTabs('info')" class="tab-btn aktif px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="info">
            <i class="fas fa-info-circle mr-1"></i> Informasi Umum
        </button>
        <button onclick="bukaTabs('detail')" class="tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="detail">
            <i class="fas fa-file-alt mr-1"></i> Tentang & Visi Misi
        </button>
        <button onclick="bukaTabs('lokasi')" class="tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="lokasi">
            <i class="fas fa-map-marker-alt mr-1"></i> Lokasi & Kontak
        </button>
        <button onclick="bukaTabs('pengurus')" class="tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="pengurus">
            <i class="fas fa-user-tie mr-1"></i> Pengurus <span class="ml-1 bg-blue-500/20 text-blue-400 px-1.5 py-0.5 rounded-full text-xs">{{ $organisasi->pengurus->count() }}</span>
        </button>
        <button onclick="bukaTabs('kegiatan')" class="tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="kegiatan">
            <i class="fas fa-calendar-alt mr-1"></i> Kegiatan <span class="ml-1 bg-green-500/20 text-green-400 px-1.5 py-0.5 rounded-full text-xs">{{ $organisasi->kegiatan->count() }}</span>
        </button>
        <button onclick="bukaTabs('galeri')" class="tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap" data-tab="galeri">
            <i class="fas fa-images mr-1"></i> Galeri <span class="ml-1 bg-purple-500/20 text-purple-400 px-1.5 py-0.5 rounded-full text-xs">{{ $organisasi->galeri->count() }}</span>
        </button>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Informasi Umum --}}
    {{-- ============================================ --}}
    <div id="tab-info" class="tab-konten">
        <form method="POST" action="{{ route('admin.organisasi.update', $organisasi) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 space-y-5">
                <h3 class="text-lg font-bold text-white border-b border-kvt-700/20 pb-3"><i class="fas fa-info-circle text-kvt-400 mr-2"></i>Informasi Umum</h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="block text-sm text-gray-400 mb-1">Nama Organisasi *</label><input type="text" name="nama" value="{{ old('nama', $organisasi->nama) }}" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                    <div><label class="block text-sm text-gray-400 mb-1">Singkatan</label><input type="text" name="singkatan" value="{{ old('singkatan', $organisasi->singkatan) }}" placeholder="misal: BEM, HMIF" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><label class="block text-sm text-gray-400 mb-1">Tipe *</label>
                        <select name="tipe" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                            @foreach(\App\Models\Organisasi::TIPE as $key => $label)<option value="{{ $key }}" {{ $organisasi->tipe == $key ? 'selected' : '' }}>{{ $label }}</option>@endforeach
                        </select>
                    </div>
                    <div><label class="block text-sm text-gray-400 mb-1">Kategori</label>
                        <select name="kategori" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                            @foreach(\App\Models\Organisasi::KATEGORI as $key => $label)<option value="{{ $key }}" {{ $organisasi->kategori == $key ? 'selected' : '' }}>{{ $label }}</option>@endforeach
                        </select>
                    </div>
                    <div><label class="block text-sm text-gray-400 mb-1">Tahun Berdiri</label><input type="number" name="tahun_berdiri" value="{{ old('tahun_berdiri', $organisasi->tahun_berdiri) }}" min="1900" max="{{ date('Y') }}" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                </div>

                <div><label class="block text-sm text-gray-400 mb-1">Deskripsi Singkat</label><textarea name="deskripsi" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">{{ old('deskripsi', $organisasi->deskripsi) }}</textarea></div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="block text-sm text-gray-400 mb-1">Website Resmi</label><input type="url" name="website" value="{{ old('website', $organisasi->website) }}" placeholder="https://..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                    <div><label class="block text-sm text-gray-400 mb-1">Periode Kepengurusan</label><input type="text" name="periode_kepengurusan" value="{{ old('periode_kepengurusan', $organisasi->periode_kepengurusan) }}" placeholder="misal: 2024/2025" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                </div>

                {{-- Logo Upload --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Logo Organisasi</label>
                        <input type="file" name="logo" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none file:mr-3 file:bg-kvt-700 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:text-xs">
                        @if($organisasi->logo)
                        <div class="mt-2 flex items-center gap-2">
                            <img src="{{ asset('storage/'.$organisasi->logo) }}" class="w-16 h-16 rounded-lg object-contain bg-white p-1">
                            <span class="text-xs text-gray-500">Logo saat ini</span>
                        </div>
                        @endif
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">Gambar Struktur Organisasi</label>
                        <input type="file" name="gambar_struktur" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none file:mr-3 file:bg-kvt-700 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:text-xs">
                        @if($organisasi->gambar_struktur)
                        <div class="mt-2">
                            <img src="{{ asset('storage/'.$organisasi->gambar_struktur) }}" class="max-h-32 rounded-lg object-contain bg-white p-1">
                            <span class="text-xs text-gray-500">Gambar struktur saat ini</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="aktif" {{ $organisasi->aktif ? 'checked' : '' }} class="rounded bg-kvt-800 border-kvt-700"> Aktif</label>
                    <label class="flex items-center gap-2 text-sm text-gray-400"><input type="checkbox" name="unggulan" {{ $organisasi->unggulan ? 'checked' : '' }} class="rounded bg-kvt-800 border-kvt-700"> Unggulan</label>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-kvt-600 hover:bg-kvt-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan Informasi</button>
                </div>
            </div>
        </form>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Tentang & Visi Misi --}}
    {{-- ============================================ --}}
    <div id="tab-detail" class="tab-konten hidden">
        <form method="POST" action="{{ route('admin.organisasi.update', $organisasi) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            {{-- Hidden fields to preserve existing data --}}
            <input type="hidden" name="nama" value="{{ $organisasi->nama }}">
            <input type="hidden" name="tipe" value="{{ $organisasi->tipe }}">

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 space-y-5">
                <h3 class="text-lg font-bold text-white border-b border-kvt-700/20 pb-3"><i class="fas fa-file-alt text-green-400 mr-2"></i>Tentang, Visi & Misi</h3>

                <div><label class="block text-sm text-gray-400 mb-1">Tentang Organisasi</label>
                    <p class="text-xs text-gray-600 mb-2">Ceritakan sejarah, arti logo, latar belakang organisasi secara lengkap.</p>
                    <textarea name="tentang" rows="6" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Tulis sejarah dan deskripsi lengkap organisasi...">{{ old('tentang', $organisasi->tentang) }}</textarea>
                </div>

                <div><label class="block text-sm text-gray-400 mb-1">Visi</label>
                    <textarea name="visi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Visi organisasi...">{{ old('visi', $organisasi->visi) }}</textarea>
                </div>

                <div><label class="block text-sm text-gray-400 mb-1">Misi</label>
                    <p class="text-xs text-gray-600 mb-2">Pisahkan setiap poin misi dengan baris baru.</p>
                    <textarea name="misi" rows="5" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="1. Misi pertama...&#10;2. Misi kedua...&#10;3. Misi ketiga...">{{ old('misi', $organisasi->misi) }}</textarea>
                </div>

                <div><label class="block text-sm text-gray-400 mb-1">Tujuan</label>
                    <textarea name="tujuan" rows="4" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none" placeholder="Tujuan utama organisasi...">{{ old('tujuan', $organisasi->tujuan) }}</textarea>
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-green-600 hover:bg-green-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan Detail</button>
                </div>
            </div>
        </form>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Lokasi & Kontak --}}
    {{-- ============================================ --}}
    <div id="tab-lokasi" class="tab-konten hidden">
        <form method="POST" action="{{ route('admin.organisasi.update', $organisasi) }}" enctype="multipart/form-data">
            @csrf @method('PUT')
            <input type="hidden" name="nama" value="{{ $organisasi->nama }}">
            <input type="hidden" name="tipe" value="{{ $organisasi->tipe }}">

            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6 space-y-5">
                <h3 class="text-lg font-bold text-white border-b border-kvt-700/20 pb-3"><i class="fas fa-map-marker-alt text-red-400 mr-2"></i>Lokasi & Kontak</h3>

                <div><label class="block text-sm text-gray-400 mb-1">Alamat Lengkap</label><input type="text" name="alamat" value="{{ old('alamat', $organisasi->alamat) }}" placeholder="Jl. Contoh No. 123, Kota..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>

                <div>
                    <label class="block text-sm text-gray-400 mb-1">Google Maps Embed URL</label>
                    <p class="text-xs text-gray-600 mb-2">Buka Google Maps → Cari lokasi → Share → Embed a map → Copy src URL (yang di dalam tanda kutip).</p>
                    <input type="text" name="google_maps_embed" value="{{ old('google_maps_embed', $organisasi->google_maps_embed) }}" placeholder="https://www.google.com/maps/embed?pb=..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none">
                    @if($organisasi->google_maps_embed)
                    <div class="mt-3 rounded-lg overflow-hidden border border-kvt-700/20">
                        <iframe src="{{ $organisasi->google_maps_embed }}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="block text-sm text-gray-400 mb-1">Email</label><input type="email" name="email" value="{{ old('email', $organisasi->email) }}" placeholder="email@organisasi.com" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                    <div><label class="block text-sm text-gray-400 mb-1">Telepon / WhatsApp</label><input type="text" name="telepon" value="{{ old('telepon', $organisasi->telepon) }}" placeholder="+62..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                </div>

                <div class="border-t border-kvt-700/20 pt-4">
                    <h4 class="text-sm font-semibold text-gray-300 mb-3"><i class="fas fa-share-alt mr-1 text-kvt-400"></i> Media Sosial</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-instagram text-pink-400 mr-1"></i>Instagram</label><input type="text" name="instagram" value="{{ old('instagram', $organisasi->instagram) }}" placeholder="https://instagram.com/..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-facebook text-blue-400 mr-1"></i>Facebook</label><input type="text" name="facebook" value="{{ old('facebook', $organisasi->facebook) }}" placeholder="https://facebook.com/..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-twitter text-cyan-400 mr-1"></i>Twitter / X</label><input type="text" name="twitter" value="{{ old('twitter', $organisasi->twitter) }}" placeholder="https://twitter.com/..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-youtube text-red-400 mr-1"></i>YouTube</label><input type="text" name="youtube" value="{{ old('youtube', $organisasi->youtube) }}" placeholder="https://youtube.com/..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-linkedin text-blue-500 mr-1"></i>LinkedIn</label><input type="text" name="linkedin" value="{{ old('linkedin', $organisasi->linkedin) }}" placeholder="https://linkedin.com/..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                        <div><label class="block text-xs text-gray-500 mb-1"><i class="fab fa-tiktok text-white mr-1"></i>TikTok</label><input type="text" name="tiktok" value="{{ old('tiktok', $organisasi->tiktok) }}" placeholder="https://tiktok.com/@..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                    </div>
                </div>

                <div><label class="block text-sm text-gray-400 mb-1">Kontak Lainnya</label><input type="text" name="kontak" value="{{ old('kontak', $organisasi->kontak) }}" placeholder="Info kontak tambahan..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>

                <div class="flex justify-end pt-2">
                    <button type="submit" class="bg-red-600 hover:bg-red-500 px-6 py-2 rounded-lg text-white text-sm font-semibold transition"><i class="fas fa-save mr-1"></i> Simpan Lokasi & Kontak</button>
                </div>
            </div>
        </form>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Pengurus --}}
    {{-- ============================================ --}}
    <div id="tab-pengurus" class="tab-konten hidden">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <div class="flex items-center justify-between border-b border-kvt-700/20 pb-3 mb-5">
                <h3 class="text-lg font-bold text-white"><i class="fas fa-user-tie text-blue-400 mr-2"></i>Struktur Pengurus</h3>
                <button onclick="bukaModal('modal-tambah-pengurus')" class="bg-blue-600 hover:bg-blue-500 px-3 py-1.5 rounded-lg text-white text-xs font-semibold transition"><i class="fas fa-plus mr-1"></i> Tambah Pengurus</button>
            </div>

            @if($organisasi->pengurus->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-user-tie text-3xl mb-3 block"></i>
                <p>Belum ada data pengurus. Klik "Tambah Pengurus" untuk menambahkan.</p>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($organisasi->pengurus as $p)
                <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20 flex items-start gap-3">
                    @if($p->foto)
                    <img src="{{ asset('storage/'.$p->foto) }}" class="w-14 h-14 rounded-full object-cover flex-shrink-0 border-2 border-kvt-700/30">
                    @else
                    <div class="w-14 h-14 rounded-full bg-blue-500/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-user text-blue-400"></i></div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="text-white font-semibold text-sm truncate">{{ $p->nama }}</p>
                        <p class="text-kvt-400 text-xs">{{ $p->jabatan }}</p>
                        @if($p->periode)<p class="text-gray-600 text-xs">Periode {{ $p->periode }}</p>@endif
                        <p class="text-gray-600 text-xs">Urutan: {{ $p->urutan }}</p>
                    </div>
                    <form method="POST" action="{{ route('admin.organisasi.pengurus.hapus', [$organisasi, $p]) }}" onsubmit="return confirm('Hapus pengurus {{ addslashes($p->nama) }}?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-gray-600 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Kegiatan --}}
    {{-- ============================================ --}}
    <div id="tab-kegiatan" class="tab-konten hidden">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <div class="flex items-center justify-between border-b border-kvt-700/20 pb-3 mb-5">
                <h3 class="text-lg font-bold text-white"><i class="fas fa-calendar-alt text-green-400 mr-2"></i>Kegiatan</h3>
                <button onclick="bukaModal('modal-tambah-kegiatan')" class="bg-green-600 hover:bg-green-500 px-3 py-1.5 rounded-lg text-white text-xs font-semibold transition"><i class="fas fa-plus mr-1"></i> Tambah Kegiatan</button>
            </div>

            @if($organisasi->kegiatan->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-calendar-alt text-3xl mb-3 block"></i>
                <p>Belum ada data kegiatan.</p>
            </div>
            @else
            <div class="space-y-3">
                @foreach($organisasi->kegiatan->sortByDesc('tanggal') as $k)
                <div class="bg-kvt-800/40 rounded-xl p-4 border border-kvt-700/20 flex items-start gap-4">
                    @if($k->gambar)
                    <img src="{{ asset('storage/'.$k->gambar) }}" class="w-20 h-20 rounded-lg object-cover flex-shrink-0">
                    @else
                    <div class="w-20 h-20 rounded-lg bg-green-500/20 flex items-center justify-center flex-shrink-0"><i class="fas fa-calendar text-green-400 text-xl"></i></div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <h4 class="text-white font-semibold text-sm">{{ $k->judul }}</h4>
                        @if($k->tanggal)<p class="text-kvt-400 text-xs"><i class="fas fa-calendar-day mr-1"></i>{{ $k->tanggal->format('d M Y') }}</p>@endif
                        @if($k->lokasi)<p class="text-gray-500 text-xs"><i class="fas fa-map-marker-alt mr-1"></i>{{ $k->lokasi }}</p>@endif
                        @if($k->deskripsi)<p class="text-gray-400 text-xs mt-1">{{ Str::limit($k->deskripsi, 120) }}</p>@endif
                    </div>
                    <form method="POST" action="{{ route('admin.organisasi.kegiatan.hapus', [$organisasi, $k]) }}" onsubmit="return confirm('Hapus kegiatan {{ addslashes($k->judul) }}?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-gray-600 hover:text-red-400 transition"><i class="fas fa-trash text-xs"></i></button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    {{-- ============================================ --}}
    {{-- TAB: Galeri --}}
    {{-- ============================================ --}}
    <div id="tab-galeri" class="tab-konten hidden">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-6">
            <div class="flex items-center justify-between border-b border-kvt-700/20 pb-3 mb-5">
                <h3 class="text-lg font-bold text-white"><i class="fas fa-images text-purple-400 mr-2"></i>Galeri Foto</h3>
                <button onclick="bukaModal('modal-tambah-galeri')" class="bg-purple-600 hover:bg-purple-500 px-3 py-1.5 rounded-lg text-white text-xs font-semibold transition"><i class="fas fa-plus mr-1"></i> Tambah Foto</button>
            </div>

            @if($organisasi->galeri->isEmpty())
            <div class="text-center py-12 text-gray-500">
                <i class="fas fa-images text-3xl mb-3 block"></i>
                <p>Belum ada foto di galeri.</p>
            </div>
            @else
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                @foreach($organisasi->galeri as $g)
                <div class="relative group rounded-xl overflow-hidden border border-kvt-700/20">
                    <img src="{{ asset('storage/'.$g->gambar) }}" class="w-full h-36 object-cover">
                    <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition flex flex-col items-center justify-center gap-1 p-2">
                        @if($g->judul)<p class="text-white text-xs font-semibold text-center">{{ $g->judul }}</p>@endif
                        @if($g->keterangan)<p class="text-gray-300 text-[10px] text-center">{{ Str::limit($g->keterangan, 50) }}</p>@endif
                        <form method="POST" action="{{ route('admin.organisasi.galeri.hapus', [$organisasi, $g]) }}" onsubmit="return confirm('Hapus foto ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="mt-1 bg-red-500/80 hover:bg-red-500 text-white text-xs px-2 py-1 rounded transition"><i class="fas fa-trash mr-1"></i>Hapus</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>

{{-- ============================================ --}}
{{-- MODALS --}}
{{-- ============================================ --}}

{{-- Modal Tambah Pengurus --}}
<div id="modal-tambah-pengurus" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-user-plus mr-2 text-blue-400"></i>Tambah Pengurus</h3>
            <button onclick="tutupModal('modal-tambah-pengurus')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.organisasi.pengurus.simpan', $organisasi) }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Nama *</label><input type="text" name="nama" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Jabatan *</label><input type="text" name="jabatan" required placeholder="misal: Ketua Umum, Sekretaris..." class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Urutan</label><input type="number" name="urutan" value="0" min="0" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"><p class="text-xs text-gray-600 mt-1">0 = paling atas</p></div>
                <div><label class="block text-sm text-gray-400 mb-1">Periode</label><input type="text" name="periode" placeholder="2024/2025" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Foto</label><input type="file" name="foto" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:text-xs"></div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah-pengurus')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Tambah Kegiatan --}}
<div id="modal-tambah-kegiatan" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-calendar-plus mr-2 text-green-400"></i>Tambah Kegiatan</h3>
            <button onclick="tutupModal('modal-tambah-kegiatan')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.organisasi.kegiatan.simpan', $organisasi) }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul Kegiatan *</label><input type="text" name="judul" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Deskripsi</label><textarea name="deskripsi" rows="3" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="grid grid-cols-2 gap-3">
                <div><label class="block text-sm text-gray-400 mb-1">Tanggal</label><input type="date" name="tanggal" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
                <div><label class="block text-sm text-gray-400 mb-1">Lokasi</label><input type="text" name="lokasi" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            </div>
            <div><label class="block text-sm text-gray-400 mb-1">Gambar Kegiatan</label><input type="file" name="gambar" accept="image/*" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:text-xs"></div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah-kegiatan')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-green-600 hover:bg-green-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Tambah Galeri --}}
<div id="modal-tambah-galeri" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl w-full max-w-md mx-4 shadow-2xl">
        <div class="flex items-center justify-between p-5 border-b border-kvt-700/30">
            <h3 class="text-lg font-bold text-white"><i class="fas fa-image mr-2 text-purple-400"></i>Tambah Foto Galeri</h3>
            <button onclick="tutupModal('modal-tambah-galeri')" class="text-gray-500 hover:text-white transition"><i class="fas fa-times"></i></button>
        </div>
        <form method="POST" action="{{ route('admin.organisasi.galeri.simpan', $organisasi) }}" enctype="multipart/form-data" class="p-5 space-y-4">@csrf
            <div><label class="block text-sm text-gray-400 mb-1">Judul</label><input type="text" name="judul" placeholder="Opsional" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Gambar *</label><input type="file" name="gambar" accept="image/*" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm file:mr-3 file:bg-kvt-700 file:text-white file:border-0 file:rounded file:px-3 file:py-1 file:text-xs"></div>
            <div><label class="block text-sm text-gray-400 mb-1">Keterangan</label><textarea name="keterangan" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500 focus:outline-none"></textarea></div>
            <div class="flex gap-2 pt-2">
                <button type="button" onclick="tutupModal('modal-tambah-galeri')" class="flex-1 bg-kvt-800 hover:bg-kvt-700 px-4 py-2 rounded-lg text-gray-400 text-sm transition">Batal</button>
                <button type="submit" class="flex-1 bg-purple-600 hover:bg-purple-500 px-4 py-2 rounded-lg text-white text-sm font-semibold transition">Simpan</button>
            </div>
        </form>
    </div>
</div>

@push('styles')
<style>
    .tab-btn { color: #6B7280; }
    .tab-btn:hover { color: #D1D5DB; background: rgba(51,153,255,0.05); }
    .tab-btn.aktif { color: #3399FF; background: rgba(51,153,255,0.1); font-weight: 600; }
</style>
@endpush

@push('scripts')
<script>
function bukaModal(id){document.getElementById(id).classList.remove('hidden');document.getElementById(id).classList.add('flex')}
function tutupModal(id){document.getElementById(id).classList.add('hidden');document.getElementById(id).classList.remove('flex')}
document.querySelectorAll('.fixed.inset-0').forEach(m=>{m.addEventListener('click',e=>{if(e.target===m){m.classList.add('hidden');m.classList.remove('flex')}})});

function bukaTabs(tab) {
    document.querySelectorAll('.tab-konten').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.tab-btn').forEach(el => el.classList.remove('aktif'));
    document.getElementById('tab-' + tab).classList.remove('hidden');
    document.querySelector('[data-tab="' + tab + '"]').classList.add('aktif');
}
</script>
@endpush
@endsection
