@extends('tata-letak.utama')

@section('judul', 'Daftar ' . $edukasiGratis->judul . ' - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950 pt-32 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6">

        {{-- Alert Sudah Terdaftar --}}
        @if($sudahDaftar)
        <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-2xl p-6 mb-8" data-aos="fade-up">
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-exclamation-triangle text-yellow-400 text-xl"></i>
                </div>
                <div>
                    <h3 class="text-white font-bold text-lg mb-1">Anda Sudah Terdaftar</h3>
                    <p class="text-gray-400 text-sm mb-3">Anda sudah mendaftar pada program ini. Status pendaftaran Anda:</p>
                    @php $info = $sudahDaftar->status_info; @endphp
                    <span class="inline-flex items-center gap-2 px-4 py-2 bg-{{ $info['warna'] }}-500/20 text-{{ $info['warna'] }}-400 rounded-xl text-sm font-semibold">
                        <i class="{{ $info['ikon'] }}"></i> {{ $info['label'] }}
                    </span>
                    @if($sudahDaftar->catatan_admin)
                    <p class="mt-3 text-sm text-gray-400"><strong class="text-white">Catatan Admin:</strong> {{ $sudahDaftar->catatan_admin }}</p>
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('pendaftaran-edukasi.riwayat') }}" class="text-kvt-400 hover:text-kvt-300 text-sm font-semibold transition">
                            <i class="fas fa-history mr-1"></i> Lihat Riwayat Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endif

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="hover:text-kvt-400 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="{{ route('edukasi-gratis.index') }}" class="hover:text-kvt-400 transition">Edukasi Gratis</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="{{ route('edukasi-gratis.tampilkan', $edukasiGratis) }}" class="hover:text-kvt-400 transition">{{ $edukasiGratis->judul }}</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-kvt-400">Daftar</span>
        </nav>

        {{-- Header --}}
        <div class="bg-gradient-to-r from-kvt-900/60 to-kvt-800/30 border border-kvt-700/30 rounded-2xl p-6 mb-8" data-aos="fade-up">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 bg-{{ $edukasiGratis->warna ?? 'kvt' }}-500/20 rounded-2xl flex items-center justify-center">
                    <i class="{{ $edukasiGratis->ikon ?? 'fas fa-graduation-cap' }} text-{{ $edukasiGratis->warna ?? 'kvt' }}-400 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white mb-1">Daftar: {{ $edukasiGratis->judul }}</h1>
                    <p class="text-gray-400 text-sm">{{ $edukasiGratis->platform }} · {{ ucfirst($edukasiGratis->kategori) }}</p>
                </div>
            </div>
        </div>

        {{-- Alert --}}
        @if(session('gagal'))
        <div class="bg-red-500/10 border border-red-500/30 rounded-xl p-4 mb-6" data-aos="fade-up">
            <p class="text-red-400 text-sm"><i class="fas fa-times-circle mr-2"></i>{{ session('gagal') }}</p>
        </div>
        @endif

        @if(!$sudahDaftar)
        {{-- Prasyarat Section --}}
        <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-6 mb-8" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-white font-bold text-lg mb-4 flex items-center gap-2">
                <i class="fas fa-clipboard-list text-yellow-400"></i> Prasyarat Pendaftaran
            </h3>
            <div class="space-y-3">
                @foreach($prasyarat as $idx => $item)
                <label class="flex items-center gap-3 p-3 bg-kvt-800/30 rounded-xl cursor-pointer hover:bg-kvt-800/50 transition group prasyarat-item">
                    <input type="checkbox" name="prasyarat_checklist[]" value="{{ $idx }}"
                           class="w-5 h-5 rounded bg-kvt-800 border-kvt-600 text-kvt-500 focus:ring-kvt-500/50 prasyarat-check">
                    <span class="text-gray-300 text-sm group-hover:text-white transition">{{ $item }}</span>
                    <i class="fas fa-check text-green-400 ml-auto opacity-0 transition prasyarat-done"></i>
                </label>
                @endforeach
            </div>
            <div class="mt-4 flex items-center gap-2" id="prasyaratProgress">
                <div class="flex-1 h-2 bg-kvt-800 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-green-500 to-green-400 rounded-full transition-all duration-300" id="prasyaratBar" style="width: 0%"></div>
                </div>
                <span class="text-xs text-gray-400" id="prasyaratText">0/{{ count($prasyarat) }} terpenuhi</span>
            </div>
        </div>

        {{-- Aturan & Peringatan --}}
        @if(isset($aturan) && $aturan->count() > 0)
        <div class="bg-red-500/5 border border-red-500/20 rounded-2xl overflow-hidden mb-8" data-aos="fade-up" data-aos-delay="120">
            <div class="flex items-center gap-3 px-6 py-4 bg-red-500/10 border-b border-red-500/10">
                <i class="fas fa-exclamation-triangle text-red-400 text-lg"></i>
                <div>
                    <h3 class="text-red-400 font-bold text-base">Aturan & Peringatan Penting</h3>
                    <p class="text-gray-500 text-xs">Wajib dibaca sebelum melanjutkan pendaftaran</p>
                </div>
            </div>
            <div class="p-6 space-y-4">
                @php
                    $grouped = $aturan->groupBy('tipe');
                    $tipeConfig = \App\Models\AturanEdukasi::daftarTipe();
                @endphp

                @foreach(['tentang', 'larangan', 'peringatan', 'prosedur', 'tips'] as $tipe)
                    @if(isset($grouped[$tipe]))
                    @php $cfg = $tipeConfig[$tipe]; @endphp
                    <div>
                        <h4 class="text-{{ $cfg['warna'] }}-400 font-bold text-sm mb-2 flex items-center gap-2">
                            <i class="{{ $cfg['ikon'] }} text-sm"></i> {{ $cfg['label'] }}
                        </h4>
                        <div class="space-y-2">
                            @foreach($grouped[$tipe] as $rule)
                            <div class="flex items-start gap-2 p-3 bg-{{ $cfg['warna'] }}-500/5 rounded-xl border border-{{ $cfg['warna'] }}-500/10">
                                <i class="{{ $rule->ikon ?? $cfg['ikon'] }} text-{{ $cfg['warna'] }}-400 text-xs mt-1"></i>
                                <div>
                                    <span class="text-white text-sm font-semibold">{{ $rule->judul }}</span>
                                    <p class="text-gray-400 text-xs mt-0.5">{{ $rule->deskripsi }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                @endforeach

                <label class="flex items-center gap-3 p-3 bg-kvt-800/30 rounded-xl cursor-pointer hover:bg-kvt-800/50 transition mt-4">
                    <input type="checkbox" id="aturanAccepted" class="w-5 h-5 rounded bg-kvt-800 border-kvt-600 text-red-500 focus:ring-red-500/50">
                    <span class="text-gray-300 text-sm">Saya telah membaca dan menyetujui semua aturan & peringatan di atas</span>
                </label>
            </div>
        </div>
        @endif

        {{-- Form Pendaftaran --}}
        <form action="{{ route('pendaftaran-edukasi.simpan', $edukasiGratis) }}" method="POST" enctype="multipart/form-data" id="formPendaftaran">
            @csrf

            {{-- Hidden prasyarat --}}
            <div id="prasyaratHidden"></div>

            {{-- Section: Data Diri --}}
            <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-6 mb-6" data-aos="fade-up" data-aos-delay="150">
                <h3 class="text-white font-bold text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-user text-kvt-400"></i> Data Diri
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Nama Lengkap <span class="text-red-400">*</span></label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', auth()->user()->nama ?? auth()->user()->name ?? '') }}" required
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="Nama lengkap Anda">
                        @error('nama_lengkap') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Email <span class="text-red-400">*</span></label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}" required
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="email@example.com">
                        @error('email') <p class="text-red-400 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Telepon / WhatsApp</label>
                        <input type="text" name="telepon" value="{{ old('telepon') }}"
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Asal Institusi</label>
                        <input type="text" name="institusi" value="{{ old('institusi') }}"
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="Nama sekolah/universitas">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Jenjang Pendidikan</label>
                        <select name="jenjang" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition">
                            <option value="" class="bg-kvt-900">Pilih jenjang...</option>
                            @foreach($jenjangList as $j)
                            <option value="{{ $j }}" {{ old('jenjang') == $j ? 'selected' : '' }} class="bg-kvt-900">{{ $j }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-5">
                    <label class="block text-sm text-gray-400 mb-2">Motivasi / Alasan Mendaftar</label>
                    <textarea name="motivasi" rows="3"
                              class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 resize-none transition"
                              placeholder="Ceritakan mengapa Anda tertarik dengan program ini...">{{ old('motivasi') }}</textarea>
                </div>
            </div>

            {{-- Section: Lokasi --}}
            <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-6 mb-6" data-aos="fade-up" data-aos-delay="200">
                <h3 class="text-white font-bold text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-map-marker-alt text-red-400"></i> Lokasi
                </h3>
                <p class="text-gray-400 text-sm mb-4">Informasi lokasi digunakan untuk menampilkan pusat edukasi terdekat dan kegiatan offline di sekitar Anda.</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Kota</label>
                        <input type="text" name="lokasi_kota" id="lokasiKota" value="{{ old('lokasi_kota') }}"
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="Nama kota">
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Provinsi</label>
                        <input type="text" name="lokasi_provinsi" id="lokasiProvinsi" value="{{ old('lokasi_provinsi') }}"
                               class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-xl px-4 py-3 text-white text-sm placeholder-gray-500 outline-none focus:border-kvt-500 focus:ring-1 focus:ring-kvt-500/20 transition"
                               placeholder="Nama provinsi">
                    </div>
                </div>

                <input type="hidden" name="lokasi_lat" id="lokasiLat" value="{{ old('lokasi_lat') }}">
                <input type="hidden" name="lokasi_lng" id="lokasiLng" value="{{ old('lokasi_lng') }}">

                <button type="button" onclick="ambilLokasi()" id="btnLokasi"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-kvt-800/50 border border-kvt-700/30 rounded-xl text-sm text-gray-300 hover:text-white hover:bg-kvt-700/50 transition">
                    <i class="fas fa-crosshairs text-kvt-400"></i>
                    <span id="lokasiStatus">Deteksi Lokasi Otomatis</span>
                </button>

                <div id="lokasiMap" class="mt-4 h-48 bg-kvt-800/30 rounded-xl border border-kvt-700/20 hidden overflow-hidden relative">
                    <div class="absolute inset-0 flex items-center justify-center text-gray-500 text-sm" id="mapPlaceholder">
                        <i class="fas fa-map text-2xl text-kvt-600 mr-3"></i> Peta lokasi Anda akan tampil di sini
                    </div>
                </div>
            </div>

            {{-- Section: Dokumen & Kamera --}}
            <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-6 mb-6" data-aos="fade-up" data-aos-delay="250">
                <h3 class="text-white font-bold text-lg mb-5 flex items-center gap-2">
                    <i class="fas fa-camera text-purple-400"></i> Dokumen & Verifikasi
                </h3>
                <p class="text-gray-400 text-sm mb-5">Upload dokumen pendukung. Anda bisa menggunakan kamera langsung atau memilih file.</p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    {{-- Dokumen Identitas --}}
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-id-card text-kvt-400"></i>
                            <span class="text-sm font-semibold text-white">Identitas (KTM/KTP)</span>
                        </div>
                        <div class="aspect-[4/3] bg-kvt-900/50 rounded-lg overflow-hidden mb-3 relative" id="previewIdentitas">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-id-card text-3xl mb-2 text-kvt-600"></i>
                                <span class="text-xs">Belum ada</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <label class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-kvt-700/30 rounded-lg text-xs text-gray-300 hover:bg-kvt-700/50 cursor-pointer transition">
                                <i class="fas fa-upload"></i> File
                                <input type="file" name="dokumen_identitas" accept="image/*" class="hidden" onchange="previewFile(this, 'previewIdentitas')">
                            </label>
                            <button type="button" onclick="bukaKamera('identitas')" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-purple-500/20 rounded-lg text-xs text-purple-300 hover:bg-purple-500/30 transition">
                                <i class="fas fa-camera"></i> Kamera
                            </button>
                        </div>
                    </div>

                    {{-- Dokumen Pendukung --}}
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-file-alt text-green-400"></i>
                            <span class="text-sm font-semibold text-white">Dokumen Pendukung</span>
                        </div>
                        <div class="aspect-[4/3] bg-kvt-900/50 rounded-lg overflow-hidden mb-3 relative" id="previewPendukung">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-file-alt text-3xl mb-2 text-kvt-600"></i>
                                <span class="text-xs">Opsional</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <label class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-kvt-700/30 rounded-lg text-xs text-gray-300 hover:bg-kvt-700/50 cursor-pointer transition">
                                <i class="fas fa-upload"></i> File
                                <input type="file" name="dokumen_pendukung" accept="image/*,.pdf" class="hidden" onchange="previewFile(this, 'previewPendukung')">
                            </label>
                            <button type="button" onclick="bukaKamera('pendukung')" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-purple-500/20 rounded-lg text-xs text-purple-300 hover:bg-purple-500/30 transition">
                                <i class="fas fa-camera"></i> Kamera
                            </button>
                        </div>
                    </div>

                    {{-- Selfie Verifikasi --}}
                    <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                        <div class="flex items-center gap-2 mb-3">
                            <i class="fas fa-portrait text-yellow-400"></i>
                            <span class="text-sm font-semibold text-white">Foto Selfie</span>
                        </div>
                        <div class="aspect-[4/3] bg-kvt-900/50 rounded-lg overflow-hidden mb-3 relative" id="previewSelfie">
                            <div class="absolute inset-0 flex flex-col items-center justify-center text-gray-500">
                                <i class="fas fa-portrait text-3xl mb-2 text-kvt-600"></i>
                                <span class="text-xs">Opsional</span>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <label class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-kvt-700/30 rounded-lg text-xs text-gray-300 hover:bg-kvt-700/50 cursor-pointer transition">
                                <i class="fas fa-upload"></i> File
                                <input type="file" name="foto_selfie" accept="image/*" class="hidden" onchange="previewFile(this, 'previewSelfie')">
                            </label>
                            <button type="button" onclick="bukaKamera('selfie')" class="flex-1 flex items-center justify-center gap-1 px-3 py-2 bg-purple-500/20 rounded-lg text-xs text-purple-300 hover:bg-purple-500/30 transition">
                                <i class="fas fa-camera"></i> Kamera
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Submit --}}
            <div class="flex items-center justify-between gap-4" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('edukasi-gratis.tampilkan', $edukasiGratis) }}" class="px-6 py-3 bg-kvt-800/50 border border-kvt-700/30 rounded-xl text-sm text-gray-400 hover:text-white hover:bg-kvt-700/50 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <button type="submit" id="btnDaftar"
                        class="px-8 py-3 bg-gradient-to-r from-kvt-600 to-kvt-500 hover:from-kvt-500 hover:to-kvt-400 text-white rounded-xl text-sm font-bold transition shadow-lg shadow-kvt-500/20 hover:shadow-kvt-500/30 hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fas fa-paper-plane"></i> Kirim Pendaftaran
                </button>
            </div>
        </form>
        @endif

    </div>
</div>

{{-- Modal Kamera --}}
<div id="modalKamera" class="fixed inset-0 bg-black/80 backdrop-blur-sm z-50 hidden items-center justify-center">
    <div class="bg-kvt-900 border border-kvt-700/30 rounded-2xl p-6 max-w-lg w-full mx-4">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-white font-bold text-lg"><i class="fas fa-camera text-purple-400 mr-2"></i>Ambil Foto</h3>
            <button onclick="tutupKamera()" class="text-gray-500 hover:text-white transition"><i class="fas fa-times text-lg"></i></button>
        </div>
        <div class="aspect-[4/3] bg-black rounded-xl overflow-hidden mb-4 relative">
            <video id="kameraVideo" autoplay playsinline class="w-full h-full object-cover"></video>
            <canvas id="kameraCanvas" class="hidden"></canvas>
        </div>
        <div class="flex items-center justify-center gap-4">
            <button onclick="switchKamera()" class="w-12 h-12 bg-kvt-800/50 rounded-full flex items-center justify-center text-gray-400 hover:text-white transition">
                <i class="fas fa-sync-alt"></i>
            </button>
            <button onclick="ambilFoto()" class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center text-white shadow-lg shadow-purple-500/30 hover:scale-105 transition">
                <i class="fas fa-camera text-2xl"></i>
            </button>
            <button onclick="tutupKamera()" class="w-12 h-12 bg-kvt-800/50 rounded-full flex items-center justify-center text-gray-400 hover:text-white transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
</div>
@endsection

@push('skrip')
<script>
// ============= PRASYARAT =============
const totalPrasyarat = {{ count($prasyarat) }};
let checkedPrasyarat = 0;

document.querySelectorAll('.prasyarat-check').forEach(cb => {
    cb.addEventListener('change', function() {
        const item = this.closest('.prasyarat-item');
        const done = item.querySelector('.prasyarat-done');
        if (this.checked) {
            done.classList.remove('opacity-0');
            done.classList.add('opacity-100');
            item.classList.add('bg-green-500/5', 'border', 'border-green-500/20');
        } else {
            done.classList.add('opacity-0');
            done.classList.remove('opacity-100');
            item.classList.remove('bg-green-500/5', 'border', 'border-green-500/20');
        }
        checkedPrasyarat = document.querySelectorAll('.prasyarat-check:checked').length;
        const pct = Math.round((checkedPrasyarat / totalPrasyarat) * 100);
        document.getElementById('prasyaratBar').style.width = pct + '%';
        document.getElementById('prasyaratText').textContent = checkedPrasyarat + '/' + totalPrasyarat + ' terpenuhi';
    });
});

// Submit → inject prasyarat hidden
document.getElementById('formPendaftaran')?.addEventListener('submit', function(e) {
    // Cek aturan diterima
    const aturanCb = document.getElementById('aturanAccepted');
    if (aturanCb && !aturanCb.checked) {
        e.preventDefault();
        aturanCb.closest('label').classList.add('ring-2', 'ring-red-500/50');
        aturanCb.closest('label').scrollIntoView({ behavior: 'smooth', block: 'center' });
        alert('Anda harus menyetujui semua aturan & peringatan sebelum mendaftar.');
        return false;
    }
    const hidden = document.getElementById('prasyaratHidden');
    hidden.innerHTML = '';
    document.querySelectorAll('.prasyarat-check:checked').forEach((cb, i) => {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'prasyarat_status[' + i + ']';
        input.value = cb.value;
        hidden.appendChild(input);
    });
});

// ============= LOKASI / GEOLOCATION =============
function ambilLokasi() {
    const btn = document.getElementById('btnLokasi');
    const status = document.getElementById('lokasiStatus');
    status.textContent = 'Mendeteksi lokasi...';
    btn.classList.add('animate-pulse');

    if (!navigator.geolocation) {
        status.textContent = 'Geolokasi tidak didukung';
        btn.classList.remove('animate-pulse');
        return;
    }

    navigator.geolocation.getCurrentPosition(
        function(pos) {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;
            document.getElementById('lokasiLat').value = lat;
            document.getElementById('lokasiLng').value = lng;

            // Reverse geocode via Nominatim (free)
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&accept-language=id`)
                .then(r => r.json())
                .then(data => {
                    const addr = data.address || {};
                    document.getElementById('lokasiKota').value = addr.city || addr.town || addr.county || '';
                    document.getElementById('lokasiProvinsi').value = addr.state || '';
                    status.innerHTML = '<i class="fas fa-check-circle text-green-400 mr-1"></i> Lokasi terdeteksi';
                    btn.classList.remove('animate-pulse');

                    // Show map
                    const mapEl = document.getElementById('lokasiMap');
                    mapEl.classList.remove('hidden');
                    document.getElementById('mapPlaceholder').innerHTML = `
                        <div class="text-center">
                            <i class="fas fa-map-marker-alt text-red-400 text-3xl mb-2"></i>
                            <p class="text-gray-300 text-sm font-semibold">${addr.city || addr.town || 'Lokasi Anda'}</p>
                            <p class="text-gray-500 text-xs">${lat.toFixed(5)}, ${lng.toFixed(5)}</p>
                        </div>
                    `;
                })
                .catch(() => {
                    status.innerHTML = '<i class="fas fa-check-circle text-green-400 mr-1"></i> Koordinat didapat';
                    btn.classList.remove('animate-pulse');
                });
        },
        function(err) {
            status.textContent = 'Gagal: ' + err.message;
            btn.classList.remove('animate-pulse');
        },
        { enableHighAccuracy: true, timeout: 10000 }
    );
}

// ============= FILE PREVIEW =============
function previewFile(input, previewId) {
    const container = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            container.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// ============= KAMERA =============
let kameraStream = null;
let kameraTarget = null;
let facingMode = 'environment';

function bukaKamera(target) {
    kameraTarget = target;
    const modal = document.getElementById('modalKamera');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    startKamera();
}

function startKamera() {
    const video = document.getElementById('kameraVideo');
    navigator.mediaDevices.getUserMedia({ video: { facingMode: facingMode }, audio: false })
        .then(stream => {
            kameraStream = stream;
            video.srcObject = stream;
        })
        .catch(err => {
            alert('Gagal mengakses kamera: ' + err.message);
            tutupKamera();
        });
}

function switchKamera() {
    if (kameraStream) {
        kameraStream.getTracks().forEach(t => t.stop());
    }
    facingMode = facingMode === 'environment' ? 'user' : 'environment';
    startKamera();
}

function ambilFoto() {
    const video = document.getElementById('kameraVideo');
    const canvas = document.getElementById('kameraCanvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    canvas.toBlob(function(blob) {
        // Create file from blob
        const file = new File([blob], 'foto-' + kameraTarget + '.jpg', { type: 'image/jpeg' });
        const dt = new DataTransfer();
        dt.items.add(file);

        // Set to appropriate file input
        let inputName = '';
        let previewId = '';
        if (kameraTarget === 'identitas') {
            inputName = 'dokumen_identitas';
            previewId = 'previewIdentitas';
        } else if (kameraTarget === 'pendukung') {
            inputName = 'dokumen_pendukung';
            previewId = 'previewPendukung';
        } else {
            inputName = 'foto_selfie';
            previewId = 'previewSelfie';
        }

        const fileInput = document.querySelector(`input[name="${inputName}"]`);
        if (fileInput) {
            fileInput.files = dt.files;
        }

        // Preview
        const url = URL.createObjectURL(blob);
        document.getElementById(previewId).innerHTML = `<img src="${url}" class="w-full h-full object-cover">`;

        tutupKamera();
    }, 'image/jpeg', 0.85);
}

function tutupKamera() {
    if (kameraStream) {
        kameraStream.getTracks().forEach(t => t.stop());
        kameraStream = null;
    }
    const modal = document.getElementById('modalKamera');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
@endpush
