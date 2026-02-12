@extends('tata-letak.utama')
@section('judul', 'Lisensi - KVT Hub')
@section('konten')
<section class="pt-24 pb-12 px-4">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12" data-aos="fade-up">
            <div class="w-16 h-16 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-file-contract text-2xl text-white"></i>
            </div>
            <h1 class="text-3xl font-black text-white">Lisensi & Ketentuan</h1>
            <p class="text-gray-400 mt-2">Tiga jenis lisensi yang berlaku di KVT Hub</p>
        </div>

        <div class="space-y-6">
            {{-- Lisensi Kerja Sama --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-handshake text-blue-400 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Lisensi Kerja Sama</h2>
                        <span class="text-xs bg-blue-500/20 text-blue-400 px-2 py-0.5 rounded-full">Collaboration License</span>
                    </div>
                </div>
                <div class="text-gray-400 space-y-3 text-sm leading-relaxed">
                    <p>Lisensi ini mengatur ketentuan kerja sama antara KVT Hub dengan pihak ketiga, termasuk:</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-500">
                        <li>Institusi pendidikan yang ingin mengintegrasikan platform KVT Hub</li>
                        <li>Organisasi yang ingin menyediakan konten pembelajaran</li>
                        <li>Developer atau guru yang ingin berkontribusi materi</li>
                        <li>Partner teknologi untuk pengembangan fitur</li>
                    </ul>
                    <p>Konten yang dibuat dalam kerja sama menjadi milik bersama (co-ownership) antara pembuat konten dan KVT Hub. Kedua pihak berhak menggunakan konten tersebut untuk tujuan pendidikan.</p>
                    <p>Hubungi <a href="mailto:kerjasama@kvthub.id" class="text-kvt-400 hover:underline">kerjasama@kvthub.id</a> untuk informasi lebih lanjut.</p>
                </div>
            </div>

            {{-- Lisensi Hak Cipta --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="100">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-copyright text-green-400 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Lisensi Hak Cipta</h2>
                        <span class="text-xs bg-green-500/20 text-green-400 px-2 py-0.5 rounded-full">Copyright License</span>
                    </div>
                </div>
                <div class="text-gray-400 space-y-3 text-sm leading-relaxed">
                    <p>Semua konten, kode sumber, desain, dan materi di platform KVT Hub dilindungi oleh hak cipta:</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-500">
                        <li>Kode sumber platform: MIT License — boleh dimodifikasi dan didistribusikan dengan menyertakan lisensi asli</li>
                        <li>Materi pembelajaran: Creative Commons BY-NC-SA 4.0 — boleh digunakan untuk tujuan non-komersial dengan atribusi</li>
                        <li>Logo, brand, dan identitas visual: Hak eksklusif KVT Hub — tidak boleh digunakan tanpa izin tertulis</li>
                        <li>Konten buatan pengguna: Hak cipta tetap milik pembuat, dengan lisensi non-eksklusif ke KVT Hub</li>
                    </ul>
                    <p class="text-yellow-400/80"><i class="fas fa-exclamation-triangle mr-1"></i>Pelanggaran hak cipta akan ditindak sesuai hukum yang berlaku.</p>
                </div>
            </div>

            {{-- Lisensi Sponsor --}}
            <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-12 bg-yellow-500/20 rounded-xl flex items-center justify-center">
                        <i class="fas fa-medal text-yellow-400 text-xl"></i>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-white">Lisensi Sponsor</h2>
                        <span class="text-xs bg-yellow-500/20 text-yellow-400 px-2 py-0.5 rounded-full">Sponsorship License</span>
                    </div>
                </div>
                <div class="text-gray-400 space-y-3 text-sm leading-relaxed">
                    <p>Ketentuan untuk pihak yang ingin menjadi sponsor KVT Hub:</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-500">
                        <li>Sponsor berhak menampilkan logo dan brand di halaman yang disepakati</li>
                        <li>Sponsor tidak memiliki kontrol atas konten editorial platform</li>
                        <li>Dana sponsor digunakan untuk pengembangan platform dan beasiswa siswa</li>
                        <li>Laporan penggunaan dana diberikan secara berkala kepada sponsor</li>
                        <li>Sponsor mendapat akses early-access ke fitur baru</li>
                    </ul>
                    <p>Tertarik menjadi sponsor? Kunjungi halaman <a href="{{ route('sponsor') }}" class="text-kvt-400 hover:underline">Sponsor</a> untuk detailnya.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-8 text-gray-600 text-sm">
            <p>Terakhir diperbarui: {{ now()->format('d F Y') }}</p>
            <p class="mt-1">© {{ date('Y') }} KVT Hub. Semua hak dilindungi undang-undang.</p>
        </div>
    </div>
</section>
@endsection
