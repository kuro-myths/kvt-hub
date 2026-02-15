@extends('tata-letak.utama')
@section('judul', 'Kelola Kurikulum - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white"><i class="fas fa-book-reader text-kvt-400 mr-2"></i>Kelola Kurikulum</h1>
                <p class="text-gray-400 text-sm mt-1">Manajemen kurikulum untuk semua jenjang pendidikan</p>
            </div>
            <a href="{{ route('admin.kurikulum.buat') }}" class="mt-4 md:mt-0 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg inline-block">
                <i class="fas fa-plus mr-1"></i>Tambah Kurikulum
            </a>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="kaca rounded-xl border border-kvt-700/20 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-xs text-gray-500 border-b border-kvt-700/15 bg-kvt-900/30">
                            <th class="px-5 py-3 text-left">Nama</th>
                            <th class="px-5 py-3 text-left">Jenjang</th>
                            <th class="px-5 py-3 text-center">Durasi</th>
                            <th class="px-5 py-3 text-center">SKS</th>
                            <th class="px-5 py-3 text-center">Mapel</th>
                            <th class="px-5 py-3 text-center">Status</th>
                            <th class="px-5 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($kurikulum as $k)
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="px-5 py-3 text-white font-medium">{{ $k->nama }}</td>
                            <td class="px-5 py-3">
                                <span class="text-xs bg-kvt-500/10 text-kvt-400 px-2 py-0.5 rounded-full uppercase">{{ str_replace('_', ' ', $k->jenjang) }}</span>
                            </td>
                            <td class="px-5 py-3 text-center text-gray-400">{{ $k->durasi_tahun }} tahun</td>
                            <td class="px-5 py-3 text-center text-gray-400">{{ $k->total_sks ?? '-' }}</td>
                            <td class="px-5 py-3 text-center text-kvt-400 font-semibold">{{ $k->mata_pelajaran_count }}</td>
                            <td class="px-5 py-3 text-center">
                                <span class="text-xs px-2 py-0.5 rounded-full {{ $k->status === 'aktif' ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-400' }}">
                                    {{ ucfirst($k->status) }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.kurikulum.edit', $k) }}" class="text-kvt-400 hover:text-kvt-300 text-xs"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.kurikulum.hapus', $k) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-300 text-xs"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="7" class="px-5 py-8 text-center text-gray-500">Belum ada kurikulum.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-kvt-700/15">
                {{ $kurikulum->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
