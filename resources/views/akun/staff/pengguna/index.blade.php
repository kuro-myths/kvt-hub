@extends('tata-letak.dasbor')

@section('judul', 'Data Pengguna - KVT Hub')
@section('judul-halaman', 'Data Pengguna')

@section('konten')
<section class="py-8 px-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-up">
            <div>
                <h1 class="text-2xl font-black text-white">Data Pengguna</h1>
                <p class="text-gray-400 text-sm mt-1">Kelola data siswa terdaftar</p>
            </div>
        </div>

        <div class="bg-kvt-900/50 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-kvt-700/30">
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">#</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Nama</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Email</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Level</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Bergabung</th>
                            <th class="text-left text-xs font-semibold text-gray-400 uppercase tracking-wider px-6 py-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-kvt-800/50">
                        @forelse($pengguna as $pg)
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
                                <td class="px-6 py-4">
                                    <span class="bg-amber-500/20 text-amber-400 text-xs px-2 py-1 rounded font-semibold">Lv.{{ $pg->level ?? 1 }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $pg->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('staff.pengguna.tampilkan', $pg) }}" class="text-kvt-400 hover:text-kvt-300 text-sm font-semibold">
                                        <i class="fas fa-eye mr-1"></i>Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12 text-gray-500">Belum ada data pengguna.</td>
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
