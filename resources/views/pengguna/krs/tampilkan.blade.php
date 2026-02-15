@extends('tata-letak.utama')
@section('judul', 'Detail KRS - KVT Hub')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 py-8">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('pengguna.krs.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div class="flex-1">
                <h1 class="text-xl font-bold text-white">Detail KRS #{{ $krs->id }}</h1>
                <p class="text-gray-400 text-sm">{{ $krs->kurikulum->nama ?? '-' }} • Semester {{ $krs->semester }} • {{ $krs->tahun_ajaran }}</p>
            </div>
            <span class="text-xs font-semibold px-4 py-1.5 rounded-full
                {{ $krs->status === 'disetujui' ? 'bg-green-500/10 text-green-400' : '' }}
                {{ $krs->status === 'diajukan' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                {{ $krs->status === 'ditolak' ? 'bg-red-500/10 text-red-400' : '' }}
                {{ $krs->status === 'revisi' ? 'bg-orange-500/10 text-orange-400' : '' }}
            ">
                {{ ucfirst($krs->status) }}
            </span>
        </div>

        {{-- Info KRS --}}
        <div class="kaca rounded-xl p-5 border border-kvt-700/20 mb-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div>
                    <span class="text-xs text-gray-500 block">Total SKS</span>
                    <span class="text-lg font-bold text-white">{{ $krs->total_sks ?? 0 }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 block">Mata Pelajaran</span>
                    <span class="text-lg font-bold text-white">{{ $krs->detail->count() }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 block">Disetujui Oleh</span>
                    <span class="text-sm text-white">{{ $krs->penyetuju->name ?? '-' }}</span>
                </div>
                <div>
                    <span class="text-xs text-gray-500 block">Tanggal Diajukan</span>
                    <span class="text-sm text-white">{{ $krs->created_at->format('d M Y') }}</span>
                </div>
            </div>
            @if($krs->catatan)
            <div class="mt-4 bg-kvt-800/30 rounded-lg p-3">
                <span class="text-xs text-gray-500 block mb-1">Catatan:</span>
                <p class="text-sm text-gray-300">{{ $krs->catatan }}</p>
            </div>
            @endif
        </div>

        {{-- Daftar Mata Pelajaran --}}
        <div class="kaca rounded-xl border border-kvt-700/20 overflow-hidden">
            <div class="p-5 border-b border-kvt-700/20">
                <h2 class="text-sm font-bold text-white"><i class="fas fa-book text-kvt-400 mr-2"></i>Mata Pelajaran dalam KRS</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-xs text-gray-500 border-b border-kvt-700/15">
                            <th class="px-5 py-3 text-left">No</th>
                            <th class="px-5 py-3 text-left">Kode</th>
                            <th class="px-5 py-3 text-left">Nama</th>
                            <th class="px-5 py-3 text-center">SKS</th>
                            <th class="px-5 py-3 text-center">Wajib</th>
                            <th class="px-5 py-3 text-center">Status</th>
                            <th class="px-5 py-3 text-center">Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($krs->detail as $i => $detail)
                        @php $mp = $detail->mataPelajaran; @endphp
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="px-5 py-3 text-sm text-gray-400">{{ $i + 1 }}</td>
                            <td class="px-5 py-3 text-sm text-kvt-400 font-mono">{{ $mp->kode ?? '-' }}</td>
                            <td class="px-5 py-3 text-sm text-white">{{ $mp->nama ?? '-' }}</td>
                            <td class="px-5 py-3 text-sm text-gray-300 text-center">{{ $mp->sks ?? 0 }}</td>
                            <td class="px-5 py-3 text-center">
                                @if($mp->wajib ?? false)
                                <span class="text-red-400 text-xs"><i class="fas fa-check"></i></span>
                                @else
                                <span class="text-gray-600 text-xs">-</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <span class="text-xs font-semibold px-2 py-0.5 rounded-full
                                    {{ $detail->status === 'aktif' ? 'bg-green-500/10 text-green-400' : '' }}
                                    {{ $detail->status === 'batal' ? 'bg-red-500/10 text-red-400' : '' }}
                                ">{{ ucfirst($detail->status) }}</span>
                            </td>
                            <td class="px-5 py-3 text-center">
                                @if(isset($nilai[$mp->id]))
                                <span class="font-bold {{ $nilai[$mp->id]->huruf_mutu === 'A' ? 'text-green-400' : ($nilai[$mp->id]->huruf_mutu === 'E' ? 'text-red-400' : 'text-kvt-400') }}">
                                    {{ $nilai[$mp->id]->huruf_mutu }}
                                </span>
                                @else
                                <span class="text-gray-600 text-xs">-</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
