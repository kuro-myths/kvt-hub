@extends('tata-letak.utama')
@section('judul', 'Edukasi Gratis - KVT Hub')

@push('styles')
<style>
    .edu-card {
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .edu-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 40px -12px rgba(0,0,0,0.4);
    }
    .edu-card.hidden-card {
        display: none;
    }
    .edu-card.show-card {
        animation: fadeInUp 0.35s ease forwards;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(16px) scale(0.97); }
        to { opacity: 1; transform: translateY(0) scale(1); }
    }
    .tab-btn {
        transition: all 0.25s ease;
        position: relative;
    }
    .tab-btn::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #6366f1, #a855f7);
        transition: all 0.3s ease;
        transform: translateX(-50%);
        border-radius: 2px;
    }
    .tab-btn.active::after {
        width: 60%;
    }
    .tab-btn.active {
        color: #fff;
        background: rgba(99, 102, 241, 0.15);
        border-color: rgba(99, 102, 241, 0.3);
    }
    .edu-icon {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    .edu-card:hover .edu-icon {
        transform: scale(1.1);
    }
    .count-badge {
        min-width: 20px;
        height: 20px;
        font-size: 11px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        padding: 0 6px;
        font-weight: 700;
        transition: all 0.3s ease;
    }
    .search-box {
        transition: all 0.3s ease;
    }
    .search-box:focus-within {
        border-color: rgba(99, 102, 241, 0.5);
        box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
    }
    .no-results {
        animation: fadeIn 0.4s ease;
    }
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
</style>
@endpush

@section('konten')
{{-- Hero --}}
<section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden pt-28 pb-12">
    <div class="absolute inset-0 bg-gradient-to-b from-kvt-950 via-[#0d1117] to-[#0d1117]"></div>
    <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[600px] h-[300px] bg-gradient-to-b from-indigo-500/10 to-transparent rounded-full blur-[80px]"></div>

    <div class="relative max-w-4xl mx-auto px-4 text-center" data-aos="fade-up">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-green-500/10 border border-green-500/20 text-green-400 text-xs font-semibold mb-5 backdrop-blur-sm">
            <span class="w-1.5 h-1.5 bg-green-400 rounded-full animate-pulse"></span> {{ $totalEdukasi }} Program Tersedia
        </div>
        <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight tracking-tight">
            Semua Program <span class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-400 bg-clip-text text-transparent">Edukasi Gratis</span>
        </h1>
        <p class="text-base md:text-lg text-gray-400 max-w-2xl mx-auto leading-relaxed">
            Temukan program yang cocok untuk kebutuhanmu
        </p>
    </div>
</section>

{{-- Main Content --}}
<section class="pb-20 bg-[#0d1117]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        {{-- Sticky Search + Filter Bar --}}
        <div class="sticky top-16 z-30 -mt-6 mb-8">
            <div class="bg-[#161b22]/95 backdrop-blur-xl border border-[#30363d] rounded-2xl p-4 shadow-2xl shadow-black/30">

                {{-- Search --}}
                <div class="search-box flex items-center bg-[#0d1117] border border-[#30363d] rounded-xl overflow-hidden mb-4">
                    <div class="pl-4 text-gray-500"><i class="fas fa-search text-sm"></i></div>
                    <input type="text" id="searchInput" placeholder="Cari program edukasi...  tekan / untuk fokus" class="flex-1 bg-transparent px-3 py-2.5 text-white text-sm placeholder-gray-500 focus:outline-none">
                    <div id="searchClear" class="pr-3 cursor-pointer text-gray-500 hover:text-gray-300 hidden transition">
                        <i class="fas fa-times text-sm"></i>
                    </div>
                </div>

                {{-- Category Tabs --}}
                <div class="flex flex-wrap gap-1.5" id="categoryTabs">
                    <button data-kategori="semua" class="tab-btn active px-3 py-1.5 rounded-lg text-xs font-semibold text-gray-400 border border-transparent hover:text-white hover:bg-white/5 flex items-center gap-1.5">
                        <i class="fas fa-th-large text-[10px]"></i> Semua
                        <span class="count-badge bg-indigo-500/20 text-indigo-400">{{ $totalEdukasi }}</span>
                    </button>
                    @foreach($kategoriList as $k => $label)
                    @php $jumlah = $semuaEdukasi->where('kategori', $k)->count(); @endphp
                    @if($jumlah > 0)
                    <button data-kategori="{{ $k }}" class="tab-btn px-3 py-1.5 rounded-lg text-xs font-semibold text-gray-400 border border-transparent hover:text-white hover:bg-white/5 flex items-center gap-1.5">
                        {{ $label }}
                        <span class="count-badge bg-gray-500/20 text-gray-500">{{ $jumlah }}</span>
                    </button>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Results Info --}}
        <div class="flex items-center justify-between mb-5">
            <p class="text-sm text-gray-500">
                Menampilkan <strong class="text-gray-300" id="resultCount">{{ $totalEdukasi }}</strong> program
            </p>
            <div class="flex items-center gap-2">
                <button id="viewGrid" class="w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-500/10 text-indigo-400 border border-indigo-500/20 text-xs" title="Grid">
                    <i class="fas fa-th"></i>
                </button>
                <button id="viewList" class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#161b22] text-gray-500 border border-[#30363d] text-xs hover:text-white transition" title="List">
                    <i class="fas fa-list"></i>
                </button>
            </div>
        </div>

        {{-- Programs Grid --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" id="programsGrid">
            @foreach($semuaEdukasi as $item)
            <a href="{{ route('edukasi-gratis.tampilkan', $item) }}"
               class="edu-card show-card group bg-[#161b22] border border-[#30363d] rounded-xl p-5 hover:border-[#484f58] block"
               data-kategori="{{ $item->kategori }}"
               data-judul="{{ strtolower($item->judul) }}"
               data-platform="{{ strtolower($item->platform) }}"
               data-deskripsi="{{ strtolower(Str::limit($item->deskripsi, 100)) }}"
               data-unggulan="{{ $item->unggulan ? '1' : '0' }}">

                <div class="flex items-start gap-3.5">
                    {{-- Icon --}}
                    <div class="edu-icon bg-{{ $item->warna ?? 'kvt' }}-500/10 text-{{ $item->warna ?? 'kvt' }}-400">
                        <i class="{{ $item->ikon ?? 'fas fa-graduation-cap' }}"></i>
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-0.5">
                            <h3 class="text-sm font-semibold text-gray-200 group-hover:text-indigo-400 transition truncate">{{ $item->judul }}</h3>
                            @if($item->unggulan)
                            <i class="fas fa-star text-[10px] text-amber-400 shrink-0" title="Unggulan"></i>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 mb-2">{{ $item->platform }}</p>
                        <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed">{{ $item->deskripsi }}</p>

                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#21262d]">
                            <span class="inline-flex items-center gap-1 text-[11px] px-2 py-0.5 rounded-full bg-{{ $item->warna ?? 'kvt' }}-500/10 text-{{ $item->warna ?? 'kvt' }}-400 font-medium">
                                {{ $kategoriList[$item->kategori] ?? $item->kategori }}
                            </span>
                            <div class="flex items-center gap-3 text-[11px] text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="far fa-eye"></i> {{ number_format($item->dilihat) }}
                                </span>
                                <span class="text-gray-600 group-hover:text-indigo-400 transition">
                                    <i class="fas fa-arrow-right text-[10px]"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- No Results --}}
        <div id="noResults" class="hidden no-results text-center py-20">
            <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-[#161b22] border border-[#30363d] flex items-center justify-center">
                <i class="fas fa-search text-xl text-gray-600"></i>
            </div>
            <h3 class="text-lg font-semibold text-gray-300 mb-2">Tidak ada hasil</h3>
            <p class="text-sm text-gray-500 mb-4">Coba kata kunci atau kategori lain</p>
            <button onclick="resetFilter()" class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-500/10 text-indigo-400 rounded-lg text-sm font-semibold hover:bg-indigo-500/20 transition border border-indigo-500/20">
                <i class="fas fa-redo text-xs"></i> Reset Filter
            </button>
        </div>

    </div>
</section>

{{-- CTA --}}
<section class="py-16 bg-[#0d1117]">
    <div class="max-w-3xl mx-auto px-4 text-center" data-aos="fade-up">
        <div class="bg-[#161b22] border border-[#30363d] rounded-2xl p-8 md:p-10">
            <div class="w-14 h-14 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mx-auto mb-5 shadow-lg shadow-indigo-500/20">
                <i class="fas fa-plus text-xl text-white"></i>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-white mb-3">Tahu program edukasi gratis lainnya?</h2>
            <p class="text-sm text-gray-400 mb-6 max-w-md mx-auto">Bantu komunitas dengan menyarankan program edukasi gratis yang belum terdaftar di sini.</p>
            <a href="{{ route('tentang') }}" class="inline-flex items-center gap-2 px-5 py-2.5 bg-indigo-600 hover:bg-indigo-500 text-white rounded-xl text-sm font-semibold transition">
                <i class="fas fa-paper-plane"></i> Sarankan Program
            </a>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const grid = document.getElementById('programsGrid');
    const cards = grid.querySelectorAll('.edu-card');
    const tabs = document.querySelectorAll('.tab-btn');
    const searchInput = document.getElementById('searchInput');
    const searchClear = document.getElementById('searchClear');
    const resultCount = document.getElementById('resultCount');
    const noResults = document.getElementById('noResults');
    const viewGrid = document.getElementById('viewGrid');
    const viewList = document.getElementById('viewList');

    let activeKategori = 'semua';
    let searchQuery = '';
    let isListView = false;

    // ── Filter Logic ──────────────────────────────────
    function filterCards() {
        let visibleCount = 0;
        const staggerDelay = 30;
        let visibleIndex = 0;

        cards.forEach(card => {
            const kategori = card.dataset.kategori;
            const judul = card.dataset.judul;
            const platform = card.dataset.platform;
            const deskripsi = card.dataset.deskripsi;

            const matchKategori = activeKategori === 'semua' || kategori === activeKategori;
            const matchSearch = !searchQuery ||
                judul.includes(searchQuery) ||
                platform.includes(searchQuery) ||
                deskripsi.includes(searchQuery);

            if (matchKategori && matchSearch) {
                card.classList.remove('hidden-card');
                card.classList.add('show-card');
                card.style.animationDelay = (visibleIndex * staggerDelay) + 'ms';
                visibleCount++;
                visibleIndex++;
            } else {
                card.classList.add('hidden-card');
                card.classList.remove('show-card');
                card.style.animationDelay = '0ms';
            }
        });

        resultCount.textContent = visibleCount;
        noResults.classList.toggle('hidden', visibleCount > 0);
        grid.classList.toggle('hidden', visibleCount === 0);
    }

    // ── Tab Click ─────────────────────────────────────
    tabs.forEach(tab => {
        tab.addEventListener('click', function() {
            tabs.forEach(t => {
                t.classList.remove('active');
                const badge = t.querySelector('.count-badge');
                if (badge) {
                    badge.classList.remove('bg-indigo-500/20', 'text-indigo-400');
                    badge.classList.add('bg-gray-500/20', 'text-gray-500');
                }
            });

            this.classList.add('active');
            const badge = this.querySelector('.count-badge');
            if (badge) {
                badge.classList.remove('bg-gray-500/20', 'text-gray-500');
                badge.classList.add('bg-indigo-500/20', 'text-indigo-400');
            }

            activeKategori = this.dataset.kategori;

            // Re-trigger animation
            cards.forEach(c => c.classList.remove('show-card'));
            requestAnimationFrame(() => filterCards());
        });
    });

    // ── Search Input ──────────────────────────────────
    let searchTimeout;
    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            searchQuery = this.value.toLowerCase().trim();
            searchClear.classList.toggle('hidden', !searchQuery);

            cards.forEach(c => c.classList.remove('show-card'));
            requestAnimationFrame(() => filterCards());
        }, 150);
    });

    searchClear.addEventListener('click', function() {
        searchInput.value = '';
        searchQuery = '';
        this.classList.add('hidden');
        cards.forEach(c => c.classList.remove('show-card'));
        requestAnimationFrame(() => filterCards());
        searchInput.focus();
    });

    // ── View Toggle ───────────────────────────────────
    viewGrid.addEventListener('click', function() {
        if (!isListView) return;
        isListView = false;
        grid.classList.remove('grid-cols-1', 'lg:grid-cols-1');
        grid.classList.add('md:grid-cols-2', 'lg:grid-cols-3');
        this.classList.replace('bg-[#161b22]', 'bg-indigo-500/10');
        this.classList.replace('text-gray-500', 'text-indigo-400');
        this.classList.replace('border-[#30363d]', 'border-indigo-500/20');
        viewList.classList.replace('bg-indigo-500/10', 'bg-[#161b22]');
        viewList.classList.replace('text-indigo-400', 'text-gray-500');
        viewList.classList.replace('border-indigo-500/20', 'border-[#30363d]');
    });

    viewList.addEventListener('click', function() {
        if (isListView) return;
        isListView = true;
        grid.classList.remove('md:grid-cols-2', 'lg:grid-cols-3');
        grid.classList.add('grid-cols-1', 'lg:grid-cols-1');
        this.classList.replace('bg-[#161b22]', 'bg-indigo-500/10');
        this.classList.replace('text-gray-500', 'text-indigo-400');
        this.classList.replace('border-[#30363d]', 'border-indigo-500/20');
        viewGrid.classList.replace('bg-indigo-500/10', 'bg-[#161b22]');
        viewGrid.classList.replace('text-indigo-400', 'text-gray-500');
        viewGrid.classList.replace('border-indigo-500/20', 'border-[#30363d]');
    });

    // ── Keyboard Shortcut ─────────────────────────────
    document.addEventListener('keydown', function(e) {
        if (e.key === '/' && document.activeElement !== searchInput) {
            e.preventDefault();
            searchInput.focus();
        }
        if (e.key === 'Escape' && document.activeElement === searchInput) {
            searchInput.blur();
        }
    });
});

function resetFilter() {
    document.getElementById('searchInput').value = '';
    document.getElementById('searchClear').classList.add('hidden');
    document.querySelector('.tab-btn[data-kategori="semua"]').click();
}
</script>
@endpush
