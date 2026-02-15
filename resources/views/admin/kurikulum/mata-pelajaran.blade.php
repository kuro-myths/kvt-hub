@extends('tata-letak.utama')
@section('judul', 'Mata Pelajaran - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-book text-green-400 mr-2"></i>Mata Pelajaran / Mata Kuliah</h1>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Filter & Add Form --}}
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 h-fit">
                <h2 class="text-sm font-bold text-white mb-4"><i class="fas fa-filter text-kvt-400 mr-2"></i>Filter & Tambah</h2>

                {{-- Filter --}}
                <form method="GET" class="mb-6">
                    <label class="text-xs text-gray-400 block mb-1">Filter Kurikulum</label>
                    <select name="kurikulum_id" onchange="this.form.submit()" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-sm focus:border-kvt-500">
                        <option value="">Semua Kurikulum</option>
                        @foreach($kurikulumList as $k)
                        <option value="{{ $k->id }}" {{ request('kurikulum_id') == $k->id ? 'selected' : '' }}>{{ $k->nama }}</option>
                        @endforeach
                    </select>
                </form>

                {{-- Add Form --}}
                <h3 class="text-xs font-semibold text-gray-400 mb-3 uppercase">Tambah Baru</h3>
                <form action="{{ route('admin.mata-pelajaran.simpan') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="text" name="kode" placeholder="Kode (cth: INF101)" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    <input type="text" name="nama" placeholder="Nama Mata Pelajaran" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 placeholder-gray-600">
                    <select name="kurikulum_id" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        <option value="">Pilih Kurikulum</option>
                        @foreach($kurikulumList as $k)
                        <option value="{{ $k->id }}">{{ $k->nama }}</option>
                        @endforeach
                    </select>
                    <div class="grid grid-cols-2 gap-2">
                        <input type="number" name="sks" placeholder="SKS" min="0" value="2" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        <input type="number" name="semester" placeholder="Semester" min="1" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                    </div>
                    <select name="tipe" required class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                        <option value="wajib">Wajib</option>
                        <option value="pilihan">Pilihan</option>
                        <option value="peminatan">Peminatan</option>
                        <option value="prasyarat">Prasyarat</option>
                    </select>
                    <textarea name="deskripsi" placeholder="Deskripsi (opsional)" rows="2" class="w-full bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500 resize-none placeholder-gray-600"></textarea>
                    <button type="submit" class="w-full bg-gradient-to-r from-kvt-500 to-ungu-500 text-white py-2 rounded-lg text-xs font-semibold hover:from-kvt-400 hover:to-ungu-400 transition">
                        <i class="fas fa-plus mr-1"></i>Tambah
                    </button>
                </form>
            </div>

            {{-- Table --}}
            <div class="lg:col-span-2 kaca rounded-xl border border-kvt-700/20 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-xs text-gray-500 border-b border-kvt-700/15 bg-kvt-900/30">
                                <th class="px-4 py-3 text-left">Kode</th>
                                <th class="px-4 py-3 text-left">Nama</th>
                                <th class="px-4 py-3 text-left">Kurikulum</th>
                                <th class="px-4 py-3 text-center">SKS</th>
                                <th class="px-4 py-3 text-center">Smt</th>
                                <th class="px-4 py-3 text-center">Tipe</th>
                                <th class="px-4 py-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mataPelajaran as $mp)
                            <tr class="border-b border-kvt-700/10 hover:bg-kvt-800/20 transition">
                                <td class="px-4 py-3 text-kvt-400 font-mono text-xs">{{ $mp->kode }}</td>
                                <td class="px-4 py-3 text-white">{{ $mp->nama }}</td>
                                <td class="px-4 py-3 text-gray-400 text-xs">{{ $mp->kurikulum->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-center text-gray-300">{{ $mp->sks }}</td>
                                <td class="px-4 py-3 text-center text-gray-400">{{ $mp->semester ?? '-' }}</td>
                                <td class="px-4 py-3 text-center">
                                    <span class="text-xs px-2 py-0.5 rounded-full
                                        {{ $mp->tipe === 'wajib' ? 'bg-red-500/10 text-red-400' : '' }}
                                        {{ $mp->tipe === 'pilihan' ? 'bg-blue-500/10 text-blue-400' : '' }}
                                        {{ $mp->tipe === 'peminatan' ? 'bg-purple-500/10 text-purple-400' : '' }}
                                    ">{{ ucfirst($mp->tipe) }}</span>
                                </td>
                                <td class="px-4 py-3 text-center">
                                    <form action="{{ route('admin.mata-pelajaran.hapus', $mp) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-300 text-xs"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="px-4 py-8 text-center text-gray-500">Belum ada mata pelajaran.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-kvt-700/15">{{ $mataPelajaran->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
