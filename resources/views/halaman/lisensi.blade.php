@extends('tata-letak.utama')
@section('judul', 'Lisensi - KVT Hub')
@section('konten')

{{-- Hero --}}
<section class="relative min-h-[55vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-kvt-900 to-green-900/20"></div>
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 25% 45%, rgba(34,197,94,0.4) 0%, transparent 50%), radial-gradient(circle at 75% 55%, rgba(51,153,255,0.3) 0%, transparent 50%)"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-20 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-green-500/10 border border-green-500/20 rounded-full px-4 py-1.5 text-xs text-green-400 mb-6" data-aos="fade-down">
            <i class="fas fa-file-contract"></i> Lisensi & Ketentuan
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4" data-aos="fade-up">
            <span class="text-white">Lisensi & </span><span class="teks-gradien">Ketentuan</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-2xl mx-auto mb-4" data-aos="fade-up" data-aos-delay="100">
            Tiga jenis lisensi yang berlaku di KVT Hub, memastikan transparansi dan perlindungan untuk semua pihak.
        </p>
        <p class="text-gray-600 text-sm" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-clock mr-1"></i>Terakhir diperbarui: {{ now()->format('d F Y') }}
        </p>
    </div>
</section>

{{-- 3 Lisensi Utama --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in">Tiga Pilar Lisensi</h2>
        <p class="text-gray-400" data-aos="zoom-in" data-aos-delay="100">Setiap aspek platform dilindungi dengan lisensi yang jelas</p>
    </div>

    <div class="space-y-8">
        {{-- Kerja Sama --}}
        <div class="kaca rounded-2xl p-8 hover:border-blue-500/30 transition-all duration-300" data-aos="fade-right">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-cyan-500 rounded-2xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <h3 class="text-xl font-bold text-white">Lisensi Kerja Sama</h3>
                        <span class="text-xs bg-blue-500/20 text-blue-400 px-3 py-1 rounded-full font-semibold">Collaboration License</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Lisensi ini mengatur ketentuan kerja sama antara KVT Hub dengan pihak ketiga, memastikan hubungan yang saling menguntungkan.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 mt-0.5 flex-shrink-0"></i>Institusi pendidikan yang mengintegrasikan platform</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 mt-0.5 flex-shrink-0"></i>Organisasi penyedia konten pembelajaran</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 mt-0.5 flex-shrink-0"></i>Developer atau guru yang berkontribusi materi</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-blue-400 mt-0.5 flex-shrink-0"></i>Partner teknologi untuk pengembangan fitur</div>
                    </div>
                    <div class="mt-4 bg-blue-500/5 rounded-xl p-4 border border-blue-500/10">
                        <p class="text-gray-400 text-sm"><i class="fas fa-info-circle text-blue-400 mr-1"></i>Konten dalam kerja sama menjadi co-ownership antara pembuat dan KVT Hub untuk tujuan pendidikan.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Hak Cipta --}}
        <div class="kaca rounded-2xl p-8 hover:border-green-500/30 transition-all duration-300" data-aos="fade-left">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-500 rounded-2xl flex items-center justify-center shadow-lg shadow-green-500/20">
                        <i class="fas fa-copyright text-white text-2xl"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <h3 class="text-xl font-bold text-white">Lisensi Hak Cipta</h3>
                        <span class="text-xs bg-green-500/20 text-green-400 px-3 py-1 rounded-full font-semibold">Copyright License</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Semua konten, kode sumber, desain, dan materi dilindungi oleh hak cipta yang jelas.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-code text-green-400"></i>
                                <span class="text-white font-semibold text-sm">Kode Sumber</span>
                            </div>
                            <p class="text-gray-400 text-xs">MIT License &mdash; boleh dimodifikasi dan didistribusikan dengan menyertakan lisensi asli</p>
                        </div>
                        <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-book text-purple-400"></i>
                                <span class="text-white font-semibold text-sm">Materi Pembelajaran</span>
                            </div>
                            <p class="text-gray-400 text-xs">CC BY-NC-SA 4.0 &mdash; boleh digunakan non-komersial dengan atribusi</p>
                        </div>
                        <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-paint-brush text-pink-400"></i>
                                <span class="text-white font-semibold text-sm">Logo & Brand</span>
                            </div>
                            <p class="text-gray-400 text-xs">Hak eksklusif KVT Hub &mdash; tidak boleh digunakan tanpa izin tertulis</p>
                        </div>
                        <div class="bg-kvt-800/30 rounded-xl p-4 border border-kvt-700/20">
                            <div class="flex items-center gap-2 mb-2">
                                <i class="fas fa-user-edit text-cyan-400"></i>
                                <span class="text-white font-semibold text-sm">Konten Pengguna</span>
                            </div>
                            <p class="text-gray-400 text-xs">Hak cipta tetap milik pembuat, dengan lisensi non-eksklusif ke KVT Hub</p>
                        </div>
                    </div>
                    <div class="mt-4 bg-yellow-500/5 rounded-xl p-4 border border-yellow-500/10">
                        <p class="text-yellow-400/80 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>Pelanggaran hak cipta akan ditindak sesuai hukum yang berlaku.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sponsor --}}
        <div class="kaca rounded-2xl p-8 hover:border-yellow-500/30 transition-all duration-300" data-aos="fade-right">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-shrink-0">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-amber-500 rounded-2xl flex items-center justify-center shadow-lg shadow-yellow-500/20">
                        <i class="fas fa-medal text-white text-2xl"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <h3 class="text-xl font-bold text-white">Lisensi Sponsor</h3>
                        <span class="text-xs bg-yellow-500/20 text-yellow-400 px-3 py-1 rounded-full font-semibold">Sponsorship License</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">Ketentuan untuk pihak yang ingin mendukung KVT Hub melalui program sponsorship.</p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-yellow-400 mt-0.5 flex-shrink-0"></i>Sponsor berhak menampilkan logo dan brand di halaman yang disepakati</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-yellow-400 mt-0.5 flex-shrink-0"></i>Sponsor tidak memiliki kontrol atas konten editorial</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-yellow-400 mt-0.5 flex-shrink-0"></i>Dana sponsor untuk pengembangan platform dan beasiswa</div>
                        <div class="flex items-start gap-2 text-sm text-gray-500"><i class="fas fa-check-circle text-yellow-400 mt-0.5 flex-shrink-0"></i>Laporan transparan dan akses early-access ke fitur baru</div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('sponsor') }}" class="inline-flex items-center gap-2 text-kvt-400 hover:text-kvt-300 text-sm font-semibold transition">
                            <i class="fas fa-arrow-right"></i>Lihat paket sponsor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Ringkasan Lisensi --}}
<section class="bg-kvt-900/30 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-white mb-3" data-aos="fade-down">Ringkasan Singkat</h2>
            <p class="text-gray-400" data-aos="fade-down" data-aos-delay="100">Yang boleh dan tidak boleh dilakukan</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="zoom-in" data-aos-delay="200">
            <div class="kaca rounded-2xl p-8 border-green-500/20">
                <h3 class="text-green-400 font-bold text-lg mb-4"><i class="fas fa-check-circle mr-2"></i>Diperbolehkan</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5"></i>Fork dan modifikasi kode sumber dengan atribusi MIT</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5"></i>Gunakan materi pembelajaran untuk tujuan non-komersial</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5"></i>Berkontribusi sebagai developer atau kreator konten</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5"></i>Integrasikan dengan institusi pendidikan melalui kerja sama resmi</li>
                    <li class="flex items-start gap-2"><i class="fas fa-check text-green-400 mt-0.5"></i>Bagikan konten yang Anda buat di platform ke jejaring sosial</li>
                </ul>
            </div>
            <div class="kaca rounded-2xl p-8 border-red-500/20">
                <h3 class="text-red-400 font-bold text-lg mb-4"><i class="fas fa-times-circle mr-2"></i>Tidak Diperbolehkan</h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start gap-2"><i class="fas fa-times text-red-400 mt-0.5"></i>Menggunakan logo, brand, atau identitas visual KVT Hub tanpa izin</li>
                    <li class="flex items-start gap-2"><i class="fas fa-times text-red-400 mt-0.5"></i>Menjual atau memonetisasi materi CC BY-NC-SA secara komersial</li>
                    <li class="flex items-start gap-2"><i class="fas fa-times text-red-400 mt-0.5"></i>Mengklaim kode sumber sebagai karya sendiri</li>
                    <li class="flex items-start gap-2"><i class="fas fa-times text-red-400 mt-0.5"></i>Mendistribusikan ulang tanpa menyertakan lisensi asli</li>
                    <li class="flex items-start gap-2"><i class="fas fa-times text-red-400 mt-0.5"></i>Menggunakan platform untuk konten berbahaya atau ilegal</li>
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- Badge Lisensi --}}
<section class="max-w-7xl mx-auto px-4 py-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-white mb-3" data-aos="zoom-in-up">Badge Lisensi</h2>
        <p class="text-gray-400" data-aos="zoom-in-up" data-aos-delay="100">Standar lisensi yang kami gunakan</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6" data-aos="fade-up" data-aos-delay="200">
        <div class="kaca rounded-2xl p-6 text-center hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-14 h-14 bg-kvt-800/50 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                <i class="fas fa-balance-scale text-kvt-400 text-2xl"></i>
            </div>
            <h4 class="text-white font-bold mb-1">MIT License</h4>
            <p class="text-gray-500 text-xs">Kode sumber platform</p>
        </div>
        <div class="kaca rounded-2xl p-6 text-center hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-14 h-14 bg-kvt-800/50 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                <i class="fab fa-creative-commons text-orange-400 text-2xl"></i>
            </div>
            <h4 class="text-white font-bold mb-1">CC BY-NC-SA 4.0</h4>
            <p class="text-gray-500 text-xs">Materi pembelajaran</p>
        </div>
        <div class="kaca rounded-2xl p-6 text-center hover:border-kvt-500/30 transition-all duration-300 group hover:-translate-y-1">
            <div class="w-14 h-14 bg-kvt-800/50 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition">
                <i class="fas fa-shield-alt text-red-400 text-2xl"></i>
            </div>
            <h4 class="text-white font-bold mb-1">Proprietary</h4>
            <p class="text-gray-500 text-xs">Logo, brand & identitas</p>
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-br from-kvt-800/20 to-green-700/10 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in">
        <h2 class="text-2xl font-bold text-white mb-3">Ada Pertanyaan tentang Lisensi?</h2>
        <p class="text-gray-400 mb-6">Hubungi tim kami untuk klarifikasi atau informasi lebih lanjut.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="mailto:kerjasama@kvthub.id" class="bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                <i class="fas fa-envelope mr-2"></i>kerjasama@kvthub.id
            </a>
            <a href="https://github.com/kuro-myths/kvt-hub" target="_blank" class="bg-kvt-800/50 hover:bg-kvt-700/50 text-kvt-300 px-8 py-3 rounded-xl font-bold transition border border-kvt-700/50">
                <i class="fab fa-github mr-2"></i>Lihat di GitHub
            </a>
        </div>
        <p class="text-gray-600 text-sm mt-6">© {{ date('Y') }} KVT Hub. Semua hak dilindungi undang-undang.</p>
    </div>
</section>

@endsection
