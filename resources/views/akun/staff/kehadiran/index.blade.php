@extends('tata-letak.dasbor')

@section('judul', 'Kehadiran - KVT Hub')
@section('judul-halaman', 'Kehadiran')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white">Data Kehadiran</h1>
                <p class="text-gray-400 text-sm mt-1">Kehadiran bulan {{ now()->translatedFormat('F Y') }}</p>
            </div>
            <a href="{{ route('staff.kehadiran.rekap') }}" class="bg-gradient-to-r from-indigo-500 to-indigo-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:from-indigo-400 hover:to-indigo-500 transition shadow-lg text-sm">
                <i class="fas fa-clipboard-list mr-2"></i>Lihat Rekap
            </a>
        </div>

        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-kvt-700/30">
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">#</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Siswa</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Tanggal</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Status</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-kvt-800/50">
                        @forelse($kehadiran as $kh)
                            <tr class="hover:bg-kvt-800/30 transition">
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration + ($kehadiran->currentPage() - 1) * $kehadiran->perPage() }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-kvt-400 to-kvt-600 flex items-center justify-center text-white font-bold text-xs">
                                            {{ strtoupper(substr($kh->user->name ?? '?', 0, 1)) }}
                                        </div>
                                        <span class="text-white font-semibold text-sm">{{ $kh->user->name ?? '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ \Carbon\Carbon::parse($kh->tanggal)->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $statusWarna = match($kh->status) {
                                            'hadir' => 'green',
                                            'izin' => 'yellow',
                                            'sakit' => 'orange',
                                            'alpa' => 'red',
                                            default => 'gray',
                                        };
                                    @endphp
                                    <span class="bg-{{ $statusWarna }}-500/20 text-{{ $statusWarna }}-400 text-xs px-3 py-1 rounded-full font-semibold">
                                        {{ ucfirst($kh->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $kh->keterangan ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12 text-gray-500">Belum ada data kehadiran bulan ini.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if($kehadiran->hasPages())
            <div class="mt-8">{{ $kehadiran->links() }}</div>
        @endif
    </div>
</section>
@endsection
