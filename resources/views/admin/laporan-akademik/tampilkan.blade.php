@extends('tata-letak.utama')
@section('judul', 'Detail Laporan - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center gap-3 mb-6">
            <a href="{{ route('admin.laporan-akademik.index') }}" class="text-gray-400 hover:text-white transition"><i class="fas fa-arrow-left"></i></a>
            <div class="flex-1">
                <h1 class="text-xl font-bold text-white">{{ $laporan->judul }}</h1>
                <p class="text-xs text-gray-500 mt-1">
                    {{ ucfirst(str_replace('_', ' ', $laporan->tipe)) }} •
                    Oleh {{ $laporan->pembuat->name ?? '-' }} •
                    {{ $laporan->created_at->format('d M Y H:i') }}
                </p>
            </div>
            <a href="{{ route('admin.laporan-akademik.export', $laporan) }}" class="bg-green-500/10 text-green-400 px-5 py-2 rounded-xl text-sm font-semibold hover:bg-green-500/20 transition">
                <i class="fas fa-download mr-1"></i>Export CSV
            </a>
        </div>

        @if($laporan->deskripsi)
        <div class="kaca rounded-xl p-4 border border-kvt-700/20 mb-6">
            <p class="text-sm text-gray-300">{{ $laporan->deskripsi }}</p>
        </div>
        @endif

        {{-- Data Preview --}}
        <div class="kaca rounded-xl border border-kvt-700/20 overflow-hidden">
            <div class="p-4 border-b border-kvt-700/20 flex justify-between items-center">
                <h2 class="text-sm font-bold text-white"><i class="fas fa-table text-kvt-400 mr-2"></i>Data Laporan</h2>
                <span class="text-xs text-gray-500">{{ is_array($laporan->data) ? count($laporan->data) : 0 }} baris</span>
            </div>

            @php $data = $laporan->data ?? []; @endphp

            @if(!empty($data) && is_array($data))
                <div class="overflow-x-auto max-h-[600px] overflow-y-auto">
                    <table class="w-full text-xs">
                        <thead class="sticky top-0">
                            <tr class="text-gray-500 border-b border-kvt-700/15 bg-kvt-900/80">
                                <th class="px-3 py-2 text-left">#</th>
                                @if(isset($data[0]) && is_array($data[0]))
                                    @foreach(array_keys($data[0]) as $header)
                                    <th class="px-3 py-2 text-left">{{ ucfirst(str_replace('_', ' ', $header)) }}</th>
                                    @endforeach
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(array_slice($data, 0, 100) as $i => $row)
                            <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                                <td class="px-3 py-2 text-gray-500">{{ $i + 1 }}</td>
                                @if(is_array($row))
                                    @foreach($row as $val)
                                    <td class="px-3 py-2 text-gray-300 max-w-[200px] truncate">
                                        {{ is_array($val) ? json_encode($val) : $val }}
                                    </td>
                                    @endforeach
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if(count($data) > 100)
                <div class="p-3 text-center text-xs text-gray-500 border-t border-kvt-700/15">
                    Menampilkan 100 dari {{ count($data) }} baris. Export untuk melihat semua data.
                </div>
                @endif
            @else
                <div class="p-12 text-center text-gray-500">
                    <i class="fas fa-inbox text-3xl mb-3"></i>
                    <p>Tidak ada data dalam laporan ini.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
