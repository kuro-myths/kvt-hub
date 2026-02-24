@extends('tata-letak.dasbor')
@section('judul', pathinfo($sanitized, PATHINFO_BASENAME) . ' - Repositori Admin')
@section('judul-halaman', 'Lihat File')

@section('konten')
@php
    use App\Http\Controllers\Admin\RepositoriController;
    $filename = pathinfo($sanitized, PATHINFO_BASENAME);
@endphp

<div class="max-w-7xl mx-auto px-4 py-8 space-y-6">

    {{-- Breadcrumb --}}
    <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 flex items-center gap-2 flex-wrap text-sm">
        <a href="{{ route('admin.repositori') }}" class="text-kvt-400 hover:text-white transition font-semibold flex items-center gap-1">
            <i class="fas fa-home"></i> root
        </a>
        @foreach($breadcrumbs as $crumb)
            <span class="text-gray-600">/</span>
            @if($loop->last)
                <span class="text-white font-semibold">{{ $crumb['name'] }}</span>
            @else
                <a href="{{ route('admin.repositori', ['path' => $crumb['path']]) }}" class="text-kvt-400 hover:text-white transition">{{ $crumb['name'] }}</a>
            @endif
        @endforeach
    </div>

    {{-- File Header --}}
    <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl overflow-hidden">
        <div class="px-5 py-4 bg-kvt-800/50 border-b border-kvt-700/30 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-gradient-to-br from-kvt-500 to-purple-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-file-code text-white"></i>
                </div>
                <div>
                    <h2 class="text-white font-bold text-lg">{{ $filename }}</h2>
                    <div class="text-gray-500 text-xs flex items-center gap-4 mt-0.5">
                        <span><i class="fas fa-code mr-1"></i>{{ strtoupper($language) }}</span>
                        @if(!$isBinary)
                            <span><i class="fas fa-align-left mr-1"></i>{{ number_format($lines) }} baris</span>
                        @endif
                        <span><i class="fas fa-hdd mr-1"></i>{{ RepositoriController::formatSize($size) }}</span>
                        <span><i class="fas fa-clock mr-1"></i>{{ $lastModified }}</span>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="toggleLineNumbers()" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-lg text-xs transition" title="Toggle nomor baris">
                    <i class="fas fa-list-ol mr-1"></i> Baris
                </button>
                <button onclick="toggleWordWrap()" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-lg text-xs transition" title="Toggle word wrap">
                    <i class="fas fa-text-width mr-1"></i> Wrap
                </button>
                <button onclick="copyContent()" class="px-3 py-2 bg-kvt-800 hover:bg-kvt-700 text-kvt-300 rounded-lg text-xs transition" title="Salin isi">
                    <i class="fas fa-copy mr-1"></i> Salin
                </button>
                <a href="{{ route('admin.repositori', ['path' => dirname($sanitized) === '.' ? '' : dirname($sanitized)]) }}" class="px-3 py-2 bg-kvt-600 hover:bg-kvt-500 text-white rounded-lg text-xs transition">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali
                </a>
            </div>
        </div>

        {{-- Code Content --}}
        <div class="relative">
            @if($isBinary)
                <div class="p-8 text-center text-gray-500">
                    <i class="fas fa-file-archive text-5xl mb-4 block text-gray-600"></i>
                    <p class="font-semibold text-lg mb-2">File Biner</p>
                    <p class="text-sm">File ini tidak dapat ditampilkan sebagai teks.</p>
                    <p class="text-sm mt-1">Ukuran: {{ RepositoriController::formatSize($size) }}</p>
                </div>
            @else
                <div id="codeContainer" class="overflow-x-auto">
                    <table class="w-full text-sm font-mono">
                        <tbody>
                            @foreach(explode("\n", $content) as $lineNum => $codeLine)
                            <tr class="hover:bg-kvt-800/30 transition-colors group">
                                <td class="line-number px-4 py-0 text-right text-gray-600 select-none border-r border-kvt-700/20 w-1 whitespace-nowrap text-xs sticky left-0 bg-kvt-950/80">{{ $lineNum + 1 }}</td>
                                <td class="code-line px-4 py-0 text-gray-300 whitespace-pre">{{ $codeLine }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

    {{-- File Info Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 text-center">
            <i class="fas fa-file-code text-kvt-400 text-xl mb-2 block"></i>
            <div class="text-white font-bold text-sm">.{{ $extension }}</div>
            <div class="text-gray-500 text-xs mt-1">Tipe File</div>
        </div>
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 text-center">
            <i class="fas fa-align-left text-green-400 text-xl mb-2 block"></i>
            <div class="text-white font-bold text-sm">{{ number_format($lines) }}</div>
            <div class="text-gray-500 text-xs mt-1">Total Baris</div>
        </div>
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 text-center">
            <i class="fas fa-hdd text-purple-400 text-xl mb-2 block"></i>
            <div class="text-white font-bold text-sm">{{ RepositoriController::formatSize($size) }}</div>
            <div class="text-gray-500 text-xs mt-1">Ukuran File</div>
        </div>
        <div class="bg-kvt-900/60 border border-kvt-700/30 rounded-xl p-4 text-center">
            <i class="fas fa-clock text-amber-400 text-xl mb-2 block"></i>
            <div class="text-white font-bold text-sm text-xs">{{ $lastModified }}</div>
            <div class="text-gray-500 text-xs mt-1">Terakhir Diubah</div>
        </div>
    </div>

</div>

@push('scripts')
<script>
let showLineNumbers = true;
let wordWrap = false;

function toggleLineNumbers() {
    showLineNumbers = !showLineNumbers;
    document.querySelectorAll('.line-number').forEach(el => {
        el.style.display = showLineNumbers ? '' : 'none';
    });
}

function toggleWordWrap() {
    wordWrap = !wordWrap;
    document.querySelectorAll('.code-line').forEach(el => {
        el.style.whiteSpace = wordWrap ? 'pre-wrap' : 'pre';
        el.style.wordBreak = wordWrap ? 'break-all' : 'normal';
    });
}

function copyContent() {
    const lines = [];
    document.querySelectorAll('.code-line').forEach(el => lines.push(el.textContent));
    navigator.clipboard.writeText(lines.join('\n')).then(() => {
        const btn = event.currentTarget;
        const orig = btn.innerHTML;
        btn.innerHTML = '<i class="fas fa-check mr-1 text-green-400"></i> Tersalin!';
        setTimeout(() => btn.innerHTML = orig, 2000);
    });
}
</script>
@endpush

@push('styles')
<style>
#codeContainer table { border-collapse: collapse; }
#codeContainer tr td { line-height: 1.65; }
.line-number { min-width: 3rem; }
code { font-family: 'JetBrains Mono', 'Fira Code', 'Cascadia Code', monospace !important; }
#codeContainer { max-height: 80vh; overflow-y: auto; }
</style>
@endpush
@endsection
