@extends('tata-letak.utama')
@section('judul', 'Kelola Organisasi - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-sitemap text-green-400 mr-2"></i>Kelola Organisasi</h1>
            <a href="{{ route('admin.organisasi.buat') }}" class="mt-3 md:mt-0 bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2 rounded-xl text-sm font-semibold hover:from-kvt-400 hover:to-ungu-400 transition shadow-lg inline-block">
                <i class="fas fa-plus mr-1"></i>Tambah Organisasi
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
                            <th class="px-5 py-3 text-left">Tipe</th>
                            <th class="px-5 py-3 text-left">Kategori</th>
                            <th class="px-5 py-3 text-center">Unggulan</th>
                            <th class="px-5 py-3 text-center">Status</th>
                            <th class="px-5 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($organisasi as $org)
                        <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                            <td class="px-5 py-3">
                                <div class="text-white font-medium">{{ $org->nama }}</div>
                                @if($org->singkatan)
                                <div class="text-xs text-gray-500">{{ $org->singkatan }}</div>
                                @endif
                            </td>
                            <td class="px-5 py-3">
                                <span class="text-xs px-2 py-0.5 rounded-full
                                    {{ $org->tipe === 'dalam' ? 'bg-blue-500/10 text-blue-400' : '' }}
                                    {{ $org->tipe === 'luar' ? 'bg-green-500/10 text-green-400' : '' }}
                                    {{ $org->tipe === 'mitra' ? 'bg-purple-500/10 text-purple-400' : '' }}
                                    {{ $org->tipe === 'sponsor' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                                ">{{ ucfirst($org->tipe) }}</span>
                            </td>
                            <td class="px-5 py-3 text-gray-400 text-xs">{{ ucfirst(str_replace('_', ' ', $org->kategori)) }}</td>
                            <td class="px-5 py-3 text-center">
                                @if($org->unggulan)
                                <i class="fas fa-star text-yellow-400"></i>
                                @else
                                <span class="text-gray-600">-</span>
                                @endif
                            </td>
                            <td class="px-5 py-3 text-center">
                                <span class="text-xs px-2 py-0.5 rounded-full {{ $org->aktif ? 'bg-green-500/10 text-green-400' : 'bg-gray-500/10 text-gray-400' }}">
                                    {{ $org->aktif ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-5 py-3 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.organisasi.edit', $org) }}" class="text-kvt-400 hover:text-kvt-300 text-xs"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.organisasi.hapus', $org) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-300 text-xs"><i class="fas fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="6" class="px-5 py-8 text-center text-gray-500">Belum ada organisasi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 border-t border-kvt-700/15">{{ $organisasi->links() }}</div>
        </div>
    </div>
</div>
@endsection
