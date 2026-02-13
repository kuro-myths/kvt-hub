@extends('tata-letak.utama')
@section('judul', 'Admin Berita - KVT Hub')

@section('konten')
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-white"><i class="fas fa-newspaper text-kvt-400 mr-2"></i>Kelola Berita</h1>
            <p class="text-sm text-gray-500 mt-1">Total: {{ $berita->total() }} berita</p>
        </div>
        <a href="{{ route('admin.berita.buat') }}" class="bg-gradient-to-r from-kvt-500 to-ungu-500 text-white px-5 py-2.5 rounded-lg text-sm font-medium hover:from-kvt-400 hover:to-ungu-400 transition">
            <i class="fas fa-plus mr-1"></i> Tambah Berita
        </a>
    </div>

    @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg mb-4 text-sm"><i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}</div>
    @endif

    <div class="kaca-gelap rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-kvt-800/50 text-gray-400 text-left text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Kategori</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Ticker</th>
                        <th class="px-4 py-3">Dilihat</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-kvt-700/20">
                    @forelse($berita as $item)
                        <tr class="hover:bg-kvt-800/20 transition">
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    @if($item->unggulan)<i class="fas fa-star text-yellow-400 text-xs"></i>@endif
                                    <span class="text-white font-medium truncate max-w-[250px]">{{ $item->judul }}</span>
                                </div>
                            </td>
                            <td class="px-4 py-3"><span class="text-xs text-kvt-400 bg-kvt-800/50 px-2 py-0.5 rounded-full capitalize">{{ $item->kategori }}</span></td>
                            <td class="px-4 py-3">
                                @if($item->status === 'terbit')
                                    <span class="text-xs text-green-400 bg-green-500/10 px-2 py-0.5 rounded-full"><i class="fas fa-check-circle mr-1"></i>Terbit</span>
                                @elseif($item->status === 'draft')
                                    <span class="text-xs text-yellow-400 bg-yellow-500/10 px-2 py-0.5 rounded-full"><i class="fas fa-pencil-alt mr-1"></i>Draft</span>
                                @else
                                    <span class="text-xs text-gray-400 bg-gray-500/10 px-2 py-0.5 rounded-full"><i class="fas fa-archive mr-1"></i>Arsip</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if($item->tampil_ticker)<i class="fas fa-check text-green-400 text-xs"></i>@else<i class="fas fa-minus text-gray-600 text-xs"></i>@endif
                            </td>
                            <td class="px-4 py-3 text-gray-400">{{ number_format($item->dilihat) }}</td>
                            <td class="px-4 py-3 text-gray-500 text-xs">{{ $item->terbit_pada ? $item->terbit_pada->translatedFormat('d M Y') : '-' }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('berita.tampilkan', $item) }}" target="_blank" class="w-7 h-7 bg-kvt-800/50 rounded flex items-center justify-center text-gray-400 hover:text-white transition" title="Lihat"><i class="fas fa-external-link-alt text-xs"></i></a>
                                    <a href="{{ route('admin.berita.edit', $item) }}" class="w-7 h-7 bg-kvt-800/50 rounded flex items-center justify-center text-kvt-400 hover:text-white transition" title="Edit"><i class="fas fa-edit text-xs"></i></a>
                                    <form method="POST" action="{{ route('admin.berita.hapus', $item) }}" onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="w-7 h-7 bg-kvt-800/50 rounded flex items-center justify-center text-red-400 hover:text-red-300 transition" title="Hapus"><i class="fas fa-trash text-xs"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500">Belum ada berita</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6">{{ $berita->links() }}</div>
</div>
@endsection
