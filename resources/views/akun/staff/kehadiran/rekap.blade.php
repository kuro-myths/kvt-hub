@extends('tata-letak.dasbor')

@section('judul', 'Rekap Kehadiran - KVT Hub')
@section('judul-halaman', 'Rekap Kehadiran')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white">Rekap Kehadiran</h1>
                <p class="text-gray-400 text-sm mt-1">Rekap kehadiran bulan {{ now()->translatedFormat('F Y') }}</p>
            </div>
            <a href="{{ route('staff.kehadiran.index') }}" class="text-gray-400 hover:text-white text-sm transition">
                <i class="fas fa-arrow-left mr-2"></i>Kembali
            </a>
        </div>

        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-kvt-700/30">
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">#</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Siswa</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Email</th>
                            <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Hadir</th>
                            <th class="text-center text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Persentase</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-kvt-800/50">
                        @forelse($pengguna as $pg)
                            @php
                                $hariKerja = now()->day; // approximate
                                $persen = $hariKerja > 0 ? round(($pg->hadir_count / $hariKerja) * 100) : 0;
                                $persenWarna = $persen >= 80 ? 'green' : ($persen >= 60 ? 'yellow' : 'red');
                            @endphp
                            <tr class="hover:bg-kvt-800/30 transition">
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration + ($pengguna->currentPage() - 1) * $pengguna->perPage() }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-white font-bold text-xs">
                                            {{ strtoupper(substr($pg->name, 0, 1)) }}
                                        </div>
                                        <span class="text-white font-semibold text-sm">{{ $pg->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ $pg->email }}</td>
                                <td class="px-6 py-4 text-center">
                                    <span class="text-white font-bold">{{ $pg->hadir_count }}</span>
                                    <span class="text-gray-600 text-xs">/ {{ $hariKerja }}</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span class="bg-{{ $persenWarna }}-500/20 text-{{ $persenWarna }}-400 text-xs px-3 py-1 rounded-full font-semibold">
                                        {{ $persen }}%
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12 text-gray-500">Belum ada data siswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($pengguna->hasPages())
            <div class="mt-8">{{ $pengguna->links() }}</div>
        @endif
    </div>
</section>
@endsection
