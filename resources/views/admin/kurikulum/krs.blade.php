@extends('tata-letak.utama')
@section('judul', 'Kelola KRS - Admin')

@section('konten')
<div class="min-h-screen bg-kvt-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-8">

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-xl font-bold text-white"><i class="fas fa-clipboard-list text-purple-400 mr-2"></i>Persetujuan KRS</h1>
            <form method="GET" class="flex gap-2">
                <select name="status" onchange="this.form.submit()" class="bg-kvt-800/50 border border-kvt-700/30 rounded-lg px-3 py-2 text-white text-xs focus:border-kvt-500">
                    <option value="">Semua Status</option>
                    <option value="diajukan" {{ request('status') == 'diajukan' ? 'selected' : '' }}>Diajukan</option>
                    <option value="disetujui" {{ request('status') == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </form>
        </div>

        @if(session('sukses'))
        <div class="bg-green-500/10 border border-green-500/30 text-green-400 px-4 py-3 rounded-xl mb-6 text-sm">
            <i class="fas fa-check-circle mr-2"></i>{{ session('sukses') }}
        </div>
        @endif

        <div class="space-y-3">
            @forelse($krsList as $krs)
            <div class="kaca rounded-xl p-5 border border-kvt-700/20 hover:border-kvt-500/30 transition">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-1">
                            <span class="text-white font-semibold">{{ $krs->pengguna->name ?? '-' }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full
                                {{ $krs->status === 'disetujui' ? 'bg-green-500/10 text-green-400' : '' }}
                                {{ $krs->status === 'diajukan' ? 'bg-yellow-500/10 text-yellow-400' : '' }}
                                {{ $krs->status === 'ditolak' ? 'bg-red-500/10 text-red-400' : '' }}
                            ">{{ ucfirst($krs->status) }}</span>
                        </div>
                        <p class="text-xs text-gray-500">
                            {{ $krs->kurikulum->nama ?? '-' }} • Semester {{ $krs->semester }} •
                            {{ $krs->total_sks ?? 0 }} SKS • {{ $krs->tahun_ajaran }} •
                            Diajukan {{ $krs->created_at->diffForHumans() }}
                        </p>
                    </div>

                    @if($krs->status === 'diajukan')
                    <div class="flex gap-2">
                        <form action="{{ route('admin.krs.setujui', $krs) }}" method="POST">
                            @csrf @method('PUT')
                            <button class="bg-green-500/10 text-green-400 hover:bg-green-500/20 px-4 py-2 rounded-lg text-xs font-semibold transition">
                                <i class="fas fa-check mr-1"></i>Setujui
                            </button>
                        </form>
                        <form action="{{ route('admin.krs.tolak', $krs) }}" method="POST" onsubmit="this.querySelector('[name=catatan]').value = prompt('Alasan penolakan:') || ''">
                            @csrf @method('PUT')
                            <input type="hidden" name="catatan" value="">
                            <button class="bg-red-500/10 text-red-400 hover:bg-red-500/20 px-4 py-2 rounded-lg text-xs font-semibold transition">
                                <i class="fas fa-times mr-1"></i>Tolak
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
            @empty
            <div class="kaca rounded-xl p-12 text-center border border-kvt-700/20">
                <p class="text-gray-500">Belum ada KRS yang diajukan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-6">{{ $krsList->links() }}</div>
    </div>
</div>
@endsection
