@extends('tata-letak.dasbor')
@section('judul', 'Buat KRS - KVT Hub')
@section('judul-halaman', 'Buat KRS')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('pengguna.krs.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div>
                <h1 class="text-xl font-bold text-white">Buat KRS Semester {{ $jenjang->semester_aktif }}</h1>
                <p class="text-gray-400 text-sm">{{ $jenjang->kurikulum->nama ?? '-' }} {{ $jenjang->jurusan ? '• ' . $jenjang->jurusan : '' }}</p>
            </div>
        </div>

        <form action="{{ route('pengguna.krs.simpan') }}" method="POST" id="formKrs">
            @csrf
            <input type="hidden" name="jenjang_id" value="{{ $jenjang->id }}">

            @if($errors->any())
            <div class="bg-red-500/10 border border-red-500/30 text-red-400 px-4 py-3 rounded-xl mb-6 text-sm">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            {{-- Paket Semester --}}
            @if($paketSemester->isNotEmpty())
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 mb-6">
                <h2 class="text-sm font-bold text-white mb-3"><i class="fas fa-box text-kvt-400 mr-2"></i>Paket Semester (Opsional)</h2>
                <p class="text-xs text-gray-500 mb-3">Pilih paket untuk otomatis memilih mata pelajaran yang disarankan.</p>
                <div class="flex flex-wrap gap-2">
                    @foreach($paketSemester as $paket)
                    <button type="button" onclick="pilihPaket({{ json_encode($paket->mata_pelajaran_ids) }})"
                        class="bg-kvt-800/50 text-gray-300 px-4 py-2 rounded-lg text-xs font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">
                        {{ $paket->nama }} ({{ $paket->total_sks }} SKS)
                    </button>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- Mata Pelajaran --}}
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-sm font-bold text-white"><i class="fas fa-book text-green-400 mr-2"></i>Pilih Mata Pelajaran</h2>
                    <span class="text-xs text-gray-500">Total SKS: <span id="totalSks" class="text-kvt-400 font-bold">0</span></span>
                </div>

                @if($mataPelajaran->isEmpty())
                    <p class="text-gray-500 text-sm text-center py-6">Tidak ada mata pelajaran tersedia untuk semester ini.</p>
                @else
                    <div class="space-y-2">
                        @foreach($mataPelajaran as $mp)
                        @php
                            $sudahLulus = in_array($mp->id, $mataPelajaranLulus);
                        @endphp
                        <label class="flex items-center gap-3 p-3 rounded-xl {{ $sudahLulus ? 'bg-green-500/5 border border-green-500/20' : 'bg-kvt-800/30 border border-kvt-700/15' }} hover:bg-kvt-700/20 transition cursor-pointer">
                            @if($sudahLulus)
                                <span class="w-5 text-green-400 text-center"><i class="fas fa-check-circle"></i></span>
                            @else
                                <input type="checkbox" name="mata_pelajaran_ids[]" value="{{ $mp->id }}"
                                    data-sks="{{ $mp->sks }}" onchange="hitungSks()"
                                    class="rounded border-kvt-600 bg-kvt-800 text-kvt-500 focus:ring-kvt-500 accent-kvt-400">
                            @endif
                            <div class="flex-1">
                                <div class="flex items-center gap-2">
                                    <span class="text-sm font-medium {{ $sudahLulus ? 'text-green-400 line-through' : 'text-white' }}">{{ $mp->kode }} - {{ $mp->nama }}</span>
                                    @if($mp->wajib)
                                    <span class="text-[10px] bg-red-500/10 text-red-400 px-2 py-0.5 rounded-full">Wajib</span>
                                    @endif
                                </div>
                                <p class="text-xs text-gray-500 mt-0.5">
                                    {{ $mp->sks }} SKS •
                                    {{ $sudahLulus ? 'Sudah Lulus ✓' : ($mp->deskripsi ?? 'Tidak ada deskripsi') }}
                                </p>
                            </div>
                        </label>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Submit --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('pengguna.krs.index') }}" class="bg-kvt-800/50 text-gray-300 px-6 py-2.5 rounded-xl text-sm font-semibold hover:bg-kvt-700/50 transition border border-kvt-700/30">
                    Batal
                </a>
                <button type="submit" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg">
                    <i class="fas fa-paper-plane mr-1"></i>Ajukan KRS
                </button>
            </div>
        </form>
    </div>
</div>

@push('skrip')
<script>
function hitungSks() {
    let total = 0;
    document.querySelectorAll('input[name="mata_pelajaran_ids[]"]:checked').forEach(el => {
        total += parseInt(el.dataset.sks || 0);
    });
    document.getElementById('totalSks').textContent = total;
}

function pilihPaket(ids) {
    document.querySelectorAll('input[name="mata_pelajaran_ids[]"]').forEach(el => {
        el.checked = ids.includes(parseInt(el.value));
    });
    hitungSks();
}
</script>
@endpush
@endsection
