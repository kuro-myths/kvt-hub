@extends('tata-letak.dasbor')
@section('judul', 'KHS & Transkrip - KVT Hub')
@section('judul-halaman', 'KHS & Transkrip')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

        {{-- Header --}}
        <div class="flex items-center gap-3 mb-8">
            <a href="{{ route('pengguna.krs.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div>
                <h1 class="text-2xl font-bold text-white"><i class="fas fa-chart-bar text-kvt-400 mr-2"></i>KHS & Transkrip Nilai</h1>
                <p class="text-gray-400 text-sm mt-1">Kartu Hasil Studi dan ringkasan akademik Anda</p>
            </div>
        </div>

        {{-- IPK Summary --}}
        @foreach($jenjangAktif as $jp)
        @php
            $nilaiJenjang = $nilaiSemua->filter(function($n) use ($jp) {
                return $n->mataPelajaran && $n->mataPelajaran->kurikulum_id === $jp->kurikulum_id;
            });
            $totalBobot = 0; $totalSks = 0;
            foreach($nilaiJenjang as $nj) {
                $sks = $nj->mataPelajaran->sks ?? 0;
                $bobot = match($nj->huruf_mutu) { 'A' => 4, 'B' => 3, 'C' => 2, 'D' => 1, default => 0 };
                $totalBobot += $bobot * $sks;
                $totalSks += $sks;
            }
            $ipk = $totalSks > 0 ? round($totalBobot / $totalSks, 2) : 0;
        @endphp
        <div class="kaca rounded-xl p-6 border border-kvt-700/20 mb-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h2 class="text-lg font-bold text-white">{{ $jp->kurikulum->nama ?? '-' }}</h2>
                    <p class="text-xs text-gray-500">Semester {{ $jp->semester_aktif }} {{ $jp->jurusan ? '• ' . $jp->jurusan : '' }}</p>
                </div>
                <div class="flex items-center gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold {{ $ipk >= 3 ? 'text-green-400' : ($ipk >= 2 ? 'text-yellow-400' : 'text-red-400') }}">{{ number_format($ipk, 2) }}</div>
                        <div class="text-xs text-gray-500">IPK</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-kvt-400">{{ $totalSks }}</div>
                        <div class="text-xs text-gray-500">SKS Lulus</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-purple-400">{{ $nilaiJenjang->count() }}</div>
                        <div class="text-xs text-gray-500">MK Selesai</div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Nilai Table --}}
        @if($nilaiJenjang->isNotEmpty())
        <div class="kaca rounded-xl border border-kvt-700/20 overflow-hidden mb-8">
            <div class="p-4 border-b border-kvt-700/20">
                <h3 class="text-sm font-bold text-white">Daftar Nilai - {{ $jp->kurikulum->nama ?? '-' }}</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-gray-500 border-b border-kvt-700/15 bg-kvt-900/30">
                            <th class="px-4 py-3 text-left">Kode</th>
                            <th class="px-4 py-3 text-left">Mata Pelajaran</th>
                            <th class="px-4 py-3 text-center">SKS</th>
                            <th class="px-4 py-3 text-center">Tugas</th>
                            <th class="px-4 py-3 text-center">UTS</th>
                            <th class="px-4 py-3 text-center">UAS</th>
                            <th class="px-4 py-3 text-center">Akhir</th>
                            <th class="px-4 py-3 text-center">Mutu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nilaiJenjang->sortBy(fn($n) => $n->mataPelajaran->semester ?? 0) as $n)
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="px-4 py-3 text-kvt-400 font-mono text-xs">{{ $n->mataPelajaran->kode ?? '-' }}</td>
                            <td class="px-4 py-3 text-white">{{ $n->mataPelajaran->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-center text-gray-400">{{ $n->mataPelajaran->sks ?? 0 }}</td>
                            <td class="px-4 py-3 text-center text-gray-300">{{ $n->nilai_tugas ?? '-' }}</td>
                            <td class="px-4 py-3 text-center text-gray-300">{{ $n->nilai_uts ?? '-' }}</td>
                            <td class="px-4 py-3 text-center text-gray-300">{{ $n->nilai_uas ?? '-' }}</td>
                            <td class="px-4 py-3 text-center text-white font-semibold">{{ $n->nilai_akhir ? number_format($n->nilai_akhir, 1) : '-' }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="font-bold text-lg {{ match($n->huruf_mutu) { 'A' => 'text-green-400', 'B' => 'text-blue-400', 'C' => 'text-yellow-400', 'D' => 'text-orange-400', default => 'text-red-400' } }}">
                                    {{ $n->huruf_mutu ?? '-' }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
        @endforeach

        @if($jenjangAktif->isEmpty())
        <div class="kaca rounded-xl p-12 text-center border border-kvt-700/20">
            <i class="fas fa-chart-bar text-5xl text-gray-600 mb-4"></i>
            <p class="text-gray-400 mb-4">Belum ada data nilai. Daftar jenjang pendidikan terlebih dahulu.</p>
            <a href="{{ route('pengguna.krs.pilih-jenjang') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-6 py-2 rounded-xl text-sm font-semibold">
                <i class="fas fa-graduation-cap mr-1"></i>Pilih Jenjang
            </a>
        </div>
        @endif
    </div>
</div>
@endsection
