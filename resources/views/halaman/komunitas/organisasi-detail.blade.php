@extends('tata-letak.utama')
@section('judul', $organisasi->nama . ' - Komunitas KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">

    {{-- Hero --}}
    <section class="pt-28 pb-12 px-4 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-b from-kvt-900/50 to-kvt-950"></div>
        <div class="max-w-5xl mx-auto relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-6" data-aos="fade-up">
                {{-- Logo --}}
                <div class="w-28 h-28 md:w-36 md:h-36 rounded-2xl bg-white/10 border border-kvt-700/20 flex items-center justify-center overflow-hidden flex-shrink-0 p-3">
                    @if($organisasi->logo)
                    <img src="{{ asset('storage/'.$organisasi->logo) }}" alt="{{ $organisasi->nama }}" class="w-full h-full object-contain">
                    @else
                    <i class="fas fa-building text-kvt-400 text-5xl"></i>
                    @endif
                </div>
                <div class="text-center md:text-left">
                    <div class="flex items-center gap-2 justify-center md:justify-start mb-2 flex-wrap">
                        <span class="text-xs px-2 py-0.5 rounded-full bg-kvt-500/20 text-kvt-400 font-semibold uppercase">{{ $organisasi->tipe }}</span>
                        <span class="text-xs px-2 py-0.5 rounded-full bg-pink-500/20 text-pink-400">{{ ucfirst(str_replace('_', ' ', $organisasi->kategori)) }}</span>
                        @if($organisasi->unggulan)<span class="text-xs px-2 py-0.5 rounded-full bg-yellow-500/20 text-yellow-400"><i class="fas fa-star mr-1"></i>Unggulan</span>@endif
                    </div>
                    <h1 class="text-3xl md:text-4xl font-black text-white mb-1">{{ $organisasi->nama }}</h1>
                    @if($organisasi->singkatan)<p class="text-kvt-400 text-lg font-semibold">({{ $organisasi->singkatan }})</p>@endif
                    @if($organisasi->deskripsi)<p class="text-gray-400 mt-2 max-w-xl">{{ $organisasi->deskripsi }}</p>@endif

                    {{-- Quick Info --}}
                    <div class="flex items-center gap-4 mt-3 justify-center md:justify-start flex-wrap text-sm text-gray-500">
                        @if($organisasi->tahun_berdiri)<span><i class="fas fa-calendar mr-1 text-kvt-400"></i>Sejak {{ $organisasi->tahun_berdiri }}</span>@endif
                        @if($organisasi->periode_kepengurusan)<span><i class="fas fa-clock mr-1 text-green-400"></i>Periode {{ $organisasi->periode_kepengurusan }}</span>@endif
                        @if($organisasi->jumlah_anggota > 0)<span><i class="fas fa-users mr-1 text-pink-400"></i>{{ $organisasi->jumlah_anggota }} anggota</span>@endif
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex items-center gap-3 mt-4 justify-center md:justify-start flex-wrap">
                        @if($organisasi->website)
                        <a href="{{ $organisasi->website }}" target="_blank" class="bg-kvt-600 hover:bg-kvt-500 px-5 py-2 rounded-lg text-white text-sm font-semibold transition inline-flex items-center gap-2">
                            <i class="fas fa-globe"></i> Website Resmi
                        </a>
                        @endif
                        @if($organisasi->email)
                        <a href="mailto:{{ $organisasi->email }}" class="bg-kvt-800/60 hover:bg-kvt-700/60 border border-kvt-700/30 px-4 py-2 rounded-lg text-gray-300 text-sm transition inline-flex items-center gap-2">
                            <i class="fas fa-envelope"></i> Hubungi
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Navigation Tabs --}}
    <section class="px-4 sticky top-16 z-20 bg-kvt-950/95 backdrop-blur-md border-b border-kvt-700/10">
        <div class="max-w-5xl mx-auto flex gap-1 overflow-x-auto py-2" id="pub-tab-nav">
            <button onclick="bukaTabPublik('tentang')" class="pub-tab-btn aktif px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                <i class="fas fa-info-circle mr-1"></i> Tentang
            </button>
            @if($organisasi->pengurus->isNotEmpty() || $organisasi->gambar_struktur)
            <button onclick="bukaTabPublik('struktur')" class="pub-tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                <i class="fas fa-sitemap mr-1"></i> Struktur
            </button>
            @endif
            @if($organisasi->kegiatan->isNotEmpty())
            <button onclick="bukaTabPublik('kegiatan')" class="pub-tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                <i class="fas fa-calendar-alt mr-1"></i> Kegiatan
            </button>
            @endif
            @if($organisasi->galeri->isNotEmpty())
            <button onclick="bukaTabPublik('galeri')" class="pub-tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                <i class="fas fa-images mr-1"></i> Galeri
            </button>
            @endif
            @if($organisasi->alamat || $organisasi->google_maps_embed)
            <button onclick="bukaTabPublik('lokasi')" class="pub-tab-btn px-4 py-2 rounded-lg text-sm font-medium transition whitespace-nowrap">
                <i class="fas fa-map-marker-alt mr-1"></i> Lokasi
            </button>
            @endif
        </div>
    </section>

    {{-- Content Area --}}
    <section class="px-4 py-8">
        <div class="max-w-5xl mx-auto">

            {{-- ====== TAB: Tentang ====== --}}
            <div id="pub-tab-tentang" class="pub-tab-konten">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- Main Content --}}
                    <div class="lg:col-span-2 space-y-6">
                        {{-- Tentang --}}
                        @if($organisasi->tentang)
                        <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up">
                            <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-info-circle text-kvt-400 mr-2"></i>Tentang {{ $organisasi->singkatan ?? $organisasi->nama }}</h2>
                            <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">{{ $organisasi->tentang }}</div>
                        </div>
                        @endif

                        {{-- Visi --}}
                        @if($organisasi->visi)
                        <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="text-lg font-bold text-white mb-3"><i class="fas fa-eye text-green-400 mr-2"></i>Visi</h2>
                            <p class="text-gray-300 text-sm leading-relaxed">{{ $organisasi->visi }}</p>
                        </div>
                        @endif

                        {{-- Misi --}}
                        @if($organisasi->misi)
                        <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="text-lg font-bold text-white mb-3"><i class="fas fa-bullseye text-pink-400 mr-2"></i>Misi</h2>
                            <div class="text-gray-300 text-sm leading-relaxed space-y-1">
                                @foreach(explode("\n", $organisasi->misi) as $misi)
                                    @if(trim($misi))
                                    <div class="flex items-start gap-2">
                                        <i class="fas fa-check-circle text-kvt-400 mt-0.5 flex-shrink-0"></i>
                                        <span>{{ trim($misi) }}</span>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @endif

                        {{-- Tujuan --}}
                        @if($organisasi->tujuan)
                        <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="text-lg font-bold text-white mb-3"><i class="fas fa-flag text-yellow-400 mr-2"></i>Tujuan</h2>
                            <div class="text-gray-300 text-sm leading-relaxed whitespace-pre-line">{{ $organisasi->tujuan }}</div>
                        </div>
                        @endif

                        {{-- If no detail content, show placeholder --}}
                        @if(!$organisasi->tentang && !$organisasi->visi && !$organisasi->misi && !$organisasi->tujuan)
                        <div class="kaca rounded-xl p-8 border border-kvt-700/20 text-center">
                            <i class="fas fa-file-alt text-3xl text-gray-600 mb-3 block"></i>
                            <p class="text-gray-500">Informasi detail organisasi ini belum tersedia.</p>
                        </div>
                        @endif
                    </div>

                    {{-- Sidebar --}}
                    <div class="space-y-5">
                        {{-- Info Card --}}
                        <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-left">
                            <h3 class="text-sm font-bold text-white mb-3"><i class="fas fa-id-card text-kvt-400 mr-1"></i> Informasi</h3>
                            <div class="space-y-2 text-sm">
                                <div class="flex justify-between"><span class="text-gray-500">Tipe</span><span class="text-white font-medium">{{ ucfirst($organisasi->tipe) }}</span></div>
                                <div class="flex justify-between"><span class="text-gray-500">Kategori</span><span class="text-white font-medium">{{ ucfirst(str_replace('_', ' ', $organisasi->kategori)) }}</span></div>
                                @if($organisasi->tahun_berdiri)<div class="flex justify-between"><span class="text-gray-500">Berdiri</span><span class="text-white font-medium">{{ $organisasi->tahun_berdiri }}</span></div>@endif
                                @if($organisasi->periode_kepengurusan)<div class="flex justify-between"><span class="text-gray-500">Periode</span><span class="text-white font-medium">{{ $organisasi->periode_kepengurusan }}</span></div>@endif
                                @if($organisasi->jumlah_anggota > 0)<div class="flex justify-between"><span class="text-gray-500">Anggota</span><span class="text-white font-medium">{{ number_format($organisasi->jumlah_anggota) }}</span></div>@endif
                            </div>
                        </div>

                        {{-- Kontak Card --}}
                        @if($organisasi->email || $organisasi->telepon || $organisasi->kontak || $organisasi->alamat)
                        <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-left" data-aos-delay="100">
                            <h3 class="text-sm font-bold text-white mb-3"><i class="fas fa-address-book text-green-400 mr-1"></i> Kontak</h3>
                            <div class="space-y-2 text-sm">
                                @if($organisasi->email)<div class="flex items-center gap-2 text-gray-400"><i class="fas fa-envelope text-kvt-400 w-4"></i><a href="mailto:{{ $organisasi->email }}" class="hover:text-white transition">{{ $organisasi->email }}</a></div>@endif
                                @if($organisasi->telepon)<div class="flex items-center gap-2 text-gray-400"><i class="fas fa-phone text-green-400 w-4"></i><span>{{ $organisasi->telepon }}</span></div>@endif
                                @if($organisasi->kontak)<div class="flex items-center gap-2 text-gray-400"><i class="fas fa-info-circle text-yellow-400 w-4"></i><span>{{ $organisasi->kontak }}</span></div>@endif
                                @if($organisasi->alamat)<div class="flex items-start gap-2 text-gray-400"><i class="fas fa-map-marker-alt text-red-400 w-4 mt-0.5"></i><span>{{ $organisasi->alamat }}</span></div>@endif
                            </div>
                        </div>
                        @endif

                        {{-- Social Media --}}
                        @if($organisasi->instagram || $organisasi->facebook || $organisasi->twitter || $organisasi->youtube || $organisasi->linkedin || $organisasi->tiktok)
                        <div class="kaca rounded-xl p-5 border border-kvt-700/20" data-aos="fade-left" data-aos-delay="200">
                            <h3 class="text-sm font-bold text-white mb-3"><i class="fas fa-share-alt text-pink-400 mr-1"></i> Media Sosial</h3>
                            <div class="flex flex-wrap gap-2">
                                @if($organisasi->instagram)<a href="{{ $organisasi->instagram }}" target="_blank" class="w-10 h-10 rounded-lg bg-gradient-to-br from-purple-500/20 to-pink-500/20 flex items-center justify-center text-pink-400 hover:scale-110 transition" title="Instagram"><i class="fab fa-instagram text-lg"></i></a>@endif
                                @if($organisasi->facebook)<a href="{{ $organisasi->facebook }}" target="_blank" class="w-10 h-10 rounded-lg bg-blue-500/20 flex items-center justify-center text-blue-400 hover:scale-110 transition" title="Facebook"><i class="fab fa-facebook-f text-lg"></i></a>@endif
                                @if($organisasi->twitter)<a href="{{ $organisasi->twitter }}" target="_blank" class="w-10 h-10 rounded-lg bg-cyan-500/20 flex items-center justify-center text-cyan-400 hover:scale-110 transition" title="Twitter/X"><i class="fab fa-twitter text-lg"></i></a>@endif
                                @if($organisasi->youtube)<a href="{{ $organisasi->youtube }}" target="_blank" class="w-10 h-10 rounded-lg bg-red-500/20 flex items-center justify-center text-red-400 hover:scale-110 transition" title="YouTube"><i class="fab fa-youtube text-lg"></i></a>@endif
                                @if($organisasi->linkedin)<a href="{{ $organisasi->linkedin }}" target="_blank" class="w-10 h-10 rounded-lg bg-blue-600/20 flex items-center justify-center text-blue-500 hover:scale-110 transition" title="LinkedIn"><i class="fab fa-linkedin-in text-lg"></i></a>@endif
                                @if($organisasi->tiktok)<a href="{{ $organisasi->tiktok }}" target="_blank" class="w-10 h-10 rounded-lg bg-gray-500/20 flex items-center justify-center text-white hover:scale-110 transition" title="TikTok"><i class="fab fa-tiktok text-lg"></i></a>@endif
                            </div>
                        </div>
                        @endif

                        {{-- Website Button --}}
                        @if($organisasi->website)
                        <a href="{{ $organisasi->website }}" target="_blank" class="block kaca rounded-xl p-5 border border-kvt-700/20 text-center hover:border-kvt-500/30 transition group" data-aos="fade-left" data-aos-delay="300">
                            <i class="fas fa-external-link-alt text-kvt-400 text-xl mb-2 block group-hover:scale-110 transition"></i>
                            <p class="text-white font-semibold text-sm">Kunjungi Website Resmi</p>
                            <p class="text-gray-500 text-xs mt-1 truncate">{{ $organisasi->website }}</p>
                        </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ====== TAB: Struktur Pengurus ====== --}}
            @if($organisasi->pengurus->isNotEmpty() || $organisasi->gambar_struktur)
            <div id="pub-tab-struktur" class="pub-tab-konten hidden">
                @if($organisasi->gambar_struktur)
                <div class="kaca rounded-xl p-6 border border-kvt-700/20 mb-6 text-center" data-aos="fade-up">
                    <h2 class="text-lg font-bold text-white mb-4">
                        <i class="fas fa-sitemap text-kvt-400 mr-2"></i>Struktur Kepengurusan
                        @if($organisasi->periode_kepengurusan) {{ $organisasi->periode_kepengurusan }} @endif
                    </h2>
                    <img src="{{ asset('storage/'.$organisasi->gambar_struktur) }}" alt="Struktur Organisasi {{ $organisasi->nama }}" class="rounded-lg mx-auto max-w-full border border-kvt-700/20">
                </div>
                @endif

                @if($organisasi->pengurus->isNotEmpty())
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="text-lg font-bold text-white mb-6"><i class="fas fa-user-tie text-blue-400 mr-2"></i>Susunan Pengurus</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                        @foreach($organisasi->pengurus as $p)
                        <div class="text-center group" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-kvt-700/30 group-hover:border-kvt-400/50 transition mb-2">
                                @if($p->foto)
                                <img src="{{ asset('storage/'.$p->foto) }}" alt="{{ $p->nama }}" class="w-full h-full object-cover">
                                @else
                                <div class="w-full h-full bg-kvt-800 flex items-center justify-center"><i class="fas fa-user text-kvt-400/60 text-xl"></i></div>
                                @endif
                            </div>
                            <p class="text-white text-sm font-semibold">{{ $p->nama }}</p>
                            <p class="text-kvt-400 text-xs">{{ $p->jabatan }}</p>
                            @if($p->periode)<p class="text-gray-600 text-[10px]">{{ $p->periode }}</p>@endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            @endif

            {{-- ====== TAB: Kegiatan ====== --}}
            @if($organisasi->kegiatan->isNotEmpty())
            <div id="pub-tab-kegiatan" class="pub-tab-konten hidden">
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up">
                    <h2 class="text-lg font-bold text-white mb-6"><i class="fas fa-calendar-alt text-green-400 mr-2"></i>Kegiatan</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @foreach($organisasi->kegiatan->sortByDesc('tanggal') as $kegiatan)
                        <div class="bg-kvt-800/30 rounded-xl overflow-hidden border border-kvt-700/10 card-hover group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 80 }}">
                            @if($kegiatan->gambar)
                            <div class="h-40 overflow-hidden">
                                <img src="{{ asset('storage/'.$kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            </div>
                            @endif
                            <div class="p-4">
                                <h3 class="text-white font-bold text-sm mb-1">{{ $kegiatan->judul }}</h3>
                                <div class="flex items-center gap-3 text-xs text-gray-500 mb-2">
                                    @if($kegiatan->tanggal)<span><i class="fas fa-calendar-day text-kvt-400 mr-1"></i>{{ $kegiatan->tanggal->format('d M Y') }}</span>@endif
                                    @if($kegiatan->lokasi)<span><i class="fas fa-map-marker-alt text-red-400 mr-1"></i>{{ $kegiatan->lokasi }}</span>@endif
                                </div>
                                @if($kegiatan->deskripsi)<p class="text-gray-400 text-xs leading-relaxed">{{ $kegiatan->deskripsi }}</p>@endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- ====== TAB: Galeri ====== --}}
            @if($organisasi->galeri->isNotEmpty())
            <div id="pub-tab-galeri" class="pub-tab-konten hidden">
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up">
                    <h2 class="text-lg font-bold text-white mb-6"><i class="fas fa-images text-purple-400 mr-2"></i>Galeri Foto</h2>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3">
                        @foreach($organisasi->galeri as $foto)
                        <div class="relative group rounded-xl overflow-hidden cursor-pointer" data-aos="zoom-in" data-aos-delay="{{ $loop->index * 50 }}" onclick="bukaGambar('{{ asset('storage/'.$foto->gambar) }}', '{{ addslashes($foto->judul ?? '') }}')">
                            <img src="{{ asset('storage/'.$foto->gambar) }}" alt="{{ $foto->judul ?? 'Foto' }}" class="w-full h-40 object-cover group-hover:scale-110 transition duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end p-3">
                                @if($foto->judul)<p class="text-white text-xs font-semibold">{{ $foto->judul }}</p>@endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

            {{-- ====== TAB: Lokasi ====== --}}
            @if($organisasi->alamat || $organisasi->google_maps_embed)
            <div id="pub-tab-lokasi" class="pub-tab-konten hidden">
                <div class="kaca rounded-xl p-6 border border-kvt-700/20" data-aos="fade-up">
                    <h2 class="text-lg font-bold text-white mb-4"><i class="fas fa-map-marker-alt text-red-400 mr-2"></i>Lokasi</h2>

                    @if($organisasi->alamat)
                    <div class="flex items-start gap-3 mb-4 text-gray-300 text-sm bg-kvt-800/30 rounded-lg p-4 border border-kvt-700/10">
                        <i class="fas fa-map-pin text-red-400 mt-0.5"></i>
                        <span>{{ $organisasi->alamat }}</span>
                    </div>
                    @endif

                    @if($organisasi->google_maps_embed)
                    <div class="rounded-xl overflow-hidden border border-kvt-700/20">
                        <iframe src="{{ $organisasi->google_maps_embed }}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full"></iframe>
                    </div>
                    @endif
                </div>
            </div>
            @endif
        </div>
    </section>

    {{-- Back to List --}}
    <section class="px-4 pb-16">
        <div class="max-w-5xl mx-auto text-center">
            <a href="{{ route('halaman.komunitas.organisasi') }}" class="inline-flex items-center gap-2 text-gray-500 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar Organisasi
            </a>
        </div>
    </section>
</div>

{{-- Lightbox Modal --}}
<div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/90 backdrop-blur-sm cursor-pointer" onclick="tutupGambar()">
    <img id="lightbox-img" src="" alt="" class="max-w-[90vw] max-h-[85vh] object-contain rounded-lg shadow-2xl">
    <p id="lightbox-caption" class="absolute bottom-6 text-white text-sm font-medium"></p>
    <button class="absolute top-4 right-4 text-white/70 hover:text-white text-2xl transition"><i class="fas fa-times"></i></button>
</div>

@push('scripts')
<script>
function bukaTabPublik(tab) {
    document.querySelectorAll('.pub-tab-konten').forEach(el => el.classList.add('hidden'));
    document.querySelectorAll('.pub-tab-btn').forEach(el => el.classList.remove('aktif'));
    const tabEl = document.getElementById('pub-tab-' + tab);
    if (tabEl) { tabEl.classList.remove('hidden'); }
    const btnEl = document.querySelector('.pub-tab-btn[onclick*="' + tab + '"]');
    if (btnEl) { btnEl.classList.add('aktif'); }
}

function bukaGambar(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption || '';
    document.getElementById('lightbox').classList.remove('hidden');
    document.getElementById('lightbox').classList.add('flex');
}

function tutupGambar() {
    document.getElementById('lightbox').classList.add('hidden');
    document.getElementById('lightbox').classList.remove('flex');
}
</script>
@endpush

@push('styles')
<style>
    .pub-tab-btn { color: #6B7280; }
    .pub-tab-btn:hover { color: #D1D5DB; background: rgba(51,153,255,0.05); }
    .pub-tab-btn.aktif { color: #3399FF; background: rgba(51,153,255,0.1); font-weight: 600; }
</style>
@endpush
@endsection
