@extends('tata-letak.utama')

@section('judul', 'Riwayat Pendaftaran Edukasi - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950 pt-32 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">

        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-500 mb-8" data-aos="fade-up">
            <a href="{{ route('beranda') }}" class="hover:text-kvt-400 transition"><i class="fas fa-home"></i></a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <a href="{{ route('edukasi-gratis.index') }}" class="hover:text-kvt-400 transition">Edukasi Gratis</a>
            <i class="fas fa-chevron-right text-[8px]"></i>
            <span class="text-kvt-400">Riwayat Pendaftaran</span>
        </nav>

        {{-- Header --}}
        <div class="mb-10" data-aos="fade-up">
            <h1 class="text-3xl font-bold text-white mb-2">Riwayat Pendaftaran</h1>
            <p class="text-gray-400">Daftar semua program edukasi yang Anda daftarkan beserta status verifikasinya.</p>
        </div>

        {{-- Alert --}}
        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 rounded-xl p-4 mb-6" data-aos="fade-up">
            <p class="text-green-400 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</p>
        </div>
        @endif

        @if($pendaftaran->isEmpty())
        <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-12 text-center" data-aos="fade-up">
            <i class="fas fa-inbox text-5xl text-kvt-600 mb-4"></i>
            <h3 class="text-white font-bold text-xl mb-2">Belum Ada Pendaftaran</h3>
            <p class="text-gray-400 text-sm mb-6">Anda belum mendaftar pada program edukasi gratis manapun.</p>
            <a href="{{ route('edukasi-gratis.index') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-kvt-600 to-kvt-500 text-white rounded-xl font-semibold hover:-translate-y-0.5 transition shadow-lg shadow-kvt-500/20">
                <i class="fas fa-gift"></i> Jelajahi Program
            </a>
        </div>
        @else
        <div class="space-y-4">
            @foreach($pendaftaran as $item)
            @php $info = $item->status_info; @endphp
            <div class="bg-kvt-900/40 border border-kvt-700/20 rounded-2xl p-6 hover:border-kvt-700/40 transition" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex items-start gap-4">
                        <div class="w-14 h-14 bg-{{ $item->edukasiGratis->warna ?? 'kvt' }}-500/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $item->edukasiGratis->ikon ?? 'fas fa-graduation-cap' }} text-{{ $item->edukasiGratis->warna ?? 'kvt' }}-400 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-white font-bold text-lg">{{ $item->edukasiGratis->judul }}</h3>
                            <p class="text-gray-500 text-sm">{{ $item->edukasiGratis->platform }} · Didaftarkan {{ $item->created_at->diffForHumans() }}</p>
                            @if($item->lokasi_lengkap)
                            <p class="text-gray-500 text-xs mt-1"><i class="fas fa-map-marker-alt text-red-400 mr-1"></i>{{ $item->lokasi_lengkap }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex items-center gap-3 flex-shrink-0">
                        <span class="inline-flex items-center gap-2 px-4 py-2 bg-{{ $info['warna'] }}-500/15 text-{{ $info['warna'] }}-400 rounded-xl text-sm font-semibold border border-{{ $info['warna'] }}-500/20">
                            <i class="{{ $info['ikon'] }}"></i> {{ $info['label'] }}
                        </span>
                        <a href="{{ route('edukasi-gratis.tampilkan', $item->edukasiGratis) }}" class="w-10 h-10 bg-kvt-800/50 rounded-xl flex items-center justify-center text-gray-400 hover:text-white hover:bg-kvt-700/50 transition" title="Lihat Program">
                            <i class="fas fa-external-link-alt text-sm"></i>
                        </a>
                    </div>
                </div>

                @if($item->catatan_admin)
                <div class="mt-4 p-3 bg-kvt-800/30 rounded-xl border border-kvt-700/10">
                    <p class="text-sm text-gray-400"><i class="fas fa-comment-alt text-kvt-400 mr-2"></i><strong class="text-white">Catatan Admin:</strong> {{ $item->catatan_admin }}</p>
                </div>
                @endif

                @if($item->notifikasi_terakhir)
                <p class="mt-2 text-xs text-gray-500"><i class="fas fa-bell text-yellow-400 mr-1"></i> Notifikasi terakhir: {{ $item->notifikasi_terakhir->diffForHumans() }}</p>
                @endif
            </div>
            @endforeach
        </div>
        @endif

    </div>
</div>

{{-- Tips & Info --}}
<section class="py-16 bg-kvt-900/30">
    <div class="max-w-5xl mx-auto px-4 sm:px-6">
        <div class="text-center mb-10" data-aos="fade-up">
            <h2 class="text-2xl font-black text-white mb-2">Tips Pendaftaran</h2>
            <p class="text-gray-400 text-sm">Panduan agar pendaftaran Anda cepat diverifikasi</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            @php
            $tips = [
                ['icon'=>'fa-file-check','judul'=>'Lengkapi Dokumen','desc'=>'Pastikan semua dokumen yang diminta telah diunggah lengkap dan jelas terbaca.','color'=>'kvt'],
                ['icon'=>'fa-clock','judul'=>'Waktu Verifikasi','desc'=>'Proses verifikasi memakan waktu 1-3 hari kerja. Status akan diperbarui otomatis di halaman ini.','color'=>'amber'],
                ['icon'=>'fa-bell','judul'=>'Pantau Notifikasi','desc'=>'Aktifkan notifikasi email agar Anda mendapat update jika ada catatan dari admin.','color'=>'emerald'],
            ];
            @endphp
            @foreach($tips as $t)
            <div class="bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6 text-center hover:border-{{ $t['color'] }}-500/30 transition-all" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="w-14 h-14 bg-{{ $t['color'] }}-500/10 rounded-2xl flex items-center justify-center mx-auto mb-4">
                    <i class="fas {{ $t['icon'] }} text-{{ $t['color'] }}-400 text-xl"></i>
                </div>
                <h3 class="text-white font-bold mb-2">{{ $t['judul'] }}</h3>
                <p class="text-gray-500 text-sm">{{ $t['desc'] }}</p>
            </div>
            @endforeach
        </div>

        {{-- Status Legend --}}
        <div class="mt-12 bg-kvt-900/50 border border-kvt-700/20 rounded-2xl p-6" data-aos="fade-up">
            <h3 class="text-white font-bold text-sm mb-4"><i class="fas fa-info-circle text-kvt-400 mr-2"></i>Keterangan Status</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 bg-yellow-400 rounded-full"></span>
                    <div><span class="text-white text-sm font-semibold">Menunggu</span><p class="text-gray-500 text-[10px]">Belum diverifikasi</p></div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 bg-blue-400 rounded-full"></span>
                    <div><span class="text-white text-sm font-semibold">Diproses</span><p class="text-gray-500 text-[10px]">Sedang ditinjau admin</p></div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 bg-green-400 rounded-full"></span>
                    <div><span class="text-white text-sm font-semibold">Diterima</span><p class="text-gray-500 text-[10px]">Pendaftaran berhasil</p></div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-3 h-3 bg-red-400 rounded-full"></span>
                    <div><span class="text-white text-sm font-semibold">Ditolak</span><p class="text-gray-500 text-[10px]">Perlu perbaikan</p></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
