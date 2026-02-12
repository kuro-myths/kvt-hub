@extends('tata-letak.utama')
@section('judul', 'Kelola Pengguna - Admin KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between mb-8" data-aos="fade-right">
            <div>
                <h1 class="text-2xl font-black text-white"><i class="fas fa-users-cog mr-3 text-kvt-400"></i>Kelola Pengguna</h1>
                <p class="text-gray-400 text-sm mt-1">Total {{ $pengguna->total() }} pengguna terdaftar</p>
            </div>
            <a href="{{ route('admin.dasbor') }}" class="text-gray-400 hover:text-white transition">
                <i class="fas fa-arrow-left mr-1"></i>Kembali
            </a>
        </div>

        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden" data-aos="fade-up">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-kvt-800/50 border-b border-kvt-700/30">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">#</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Nama</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Peran</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Level</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">XP</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-wider">Bergabung</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-kvt-700/20">
                        @forelse($pengguna as $user)
                            <tr class="hover:bg-kvt-800/30 transition">
                                <td class="px-6 py-4 text-gray-500 text-sm">{{ $loop->iteration + ($pengguna->currentPage() - 1) * $pengguna->perPage() }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-full flex items-center justify-center text-white font-bold text-xs">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <span class="text-white text-sm font-medium">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->email }}</td>
                                <td class="px-6 py-4">
                                    @php
                                        $warnaperan = match($user->peran) {
                                            'admin' => 'bg-red-500/20 text-red-400',
                                            'guru' => 'bg-green-500/20 text-green-400',
                                            default => 'bg-blue-500/20 text-blue-400',
                                        };
                                    @endphp
                                    <span class="text-xs px-2 py-1 rounded-full font-medium {{ $warnaperan }}">{{ ucfirst($user->peran) }}</span>
                                </td>
                                <td class="px-6 py-4 text-white text-sm font-bold">{{ $user->level }}</td>
                                <td class="px-6 py-4 text-kvt-400 text-sm">{{ number_format($user->xp_total) }}</td>
                                <td class="px-6 py-4">
                                    <span class="w-2 h-2 rounded-full inline-block {{ $user->aktif ? 'bg-green-400' : 'bg-gray-600' }}"></span>
                                    <span class="text-xs text-gray-400 ml-1">{{ $user->aktif ? 'Aktif' : 'Nonaktif' }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500 text-xs">{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500">Belum ada pengguna.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($pengguna->hasPages())
                <div class="px-6 py-4 border-t border-kvt-700/30">
                    {{ $pengguna->links() }}
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
