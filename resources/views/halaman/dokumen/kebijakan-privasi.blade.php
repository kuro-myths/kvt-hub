@extends('tata-letak.utama')
@section('judul', 'Kebijakan Privasi - KVT Hub')
@section('konten')

{{-- HERO --}}
<section class="relative min-h-[70vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-kvt-950 via-teal-900/30 to-kvt-900"></div>
    <div class="absolute inset-0"><div class="absolute top-20 right-20 w-80 h-80 bg-teal-500/10 rounded-full blur-3xl animate-pulse-slow"></div><div class="absolute bottom-10 left-10 w-64 h-64 bg-kvt-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div></div>
    <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(circle, #14B8A6 1px, transparent 1px); background-size: 40px 40px;"></div>
    <div class="relative max-w-7xl mx-auto px-4 py-24 text-center w-full">
        <div class="inline-flex items-center gap-2 bg-teal-800/30 border border-teal-600/30 rounded-full px-4 py-1.5 text-xs text-teal-300 mb-6" data-aos="fade-down">
            <i class="fas fa-shield-alt"></i> Perlindungan Data & Ketentuan Layanan
        </div>
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black mb-6" data-aos="fade-up">
            <span class="text-white">Kebijakan Privasi &</span><br>
            <span class="teks-gradien">Terms of Service</span>
        </h1>
        <p class="text-gray-400 text-lg max-w-3xl mx-auto mb-8" data-aos="fade-up" data-aos-delay="100">
            Kami berkomitmen melindungi privasi Anda. Dokumen ini menjelaskan bagaimana KVT Hub mengumpulkan, menggunakan, dan melindungi data pribadi sesuai standar GDPR & UU PDP Indonesia.
        </p>
        <div class="flex justify-center gap-8 pt-6 border-t border-kvt-800/50" data-aos="fade-up" data-aos-delay="200">
            <div><div class="text-2xl font-black text-white">100%</div><div class="text-xs text-gray-500">Terenkripsi</div></div>
            <div><div class="text-2xl font-black text-white">UU PDP</div><div class="text-xs text-gray-500">Compliant</div></div>
            <div><div class="text-2xl font-black text-white">GDPR</div><div class="text-xs text-gray-500">Aligned</div></div>
            <div><div class="text-2xl font-black text-white">24/7</div><div class="text-xs text-gray-500">DPO Support</div></div>
        </div>
    </div>
</section>

{{-- DAFTAR ISI & KEBIJAKAN PRIVASI --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        {{-- Sidebar TOC --}}
        <div class="lg:col-span-1" data-aos="fade-right">
            <div class="kaca rounded-2xl p-6 border-teal-500/20 sticky top-24">
                <h3 class="text-white font-bold text-lg mb-4"><i class="fas fa-list-ol text-teal-400 mr-2"></i>Daftar Isi</h3>
                @php
                $toc = [
                    ['id' => '#pengumpulan', 'label' => 'Pengumpulan Data', 'ikon' => 'fas fa-database'],
                    ['id' => '#penggunaan', 'label' => 'Penggunaan Data', 'ikon' => 'fas fa-cogs'],
                    ['id' => '#berbagi', 'label' => 'Berbagi Data', 'ikon' => 'fas fa-share-alt'],
                    ['id' => '#penyimpanan', 'label' => 'Retensi Data', 'ikon' => 'fas fa-clock'],
                    ['id' => '#keamanan', 'label' => 'Keamanan Data', 'ikon' => 'fas fa-lock'],
                    ['id' => '#hak-pengguna', 'label' => 'Hak Pengguna', 'ikon' => 'fas fa-user-shield'],
                    ['id' => '#cookie', 'label' => 'Kebijakan Cookie', 'ikon' => 'fas fa-cookie-bite'],
                    ['id' => '#tos', 'label' => 'Terms of Service', 'ikon' => 'fas fa-file-contract'],
                ];
                @endphp
                <nav class="space-y-2">
                    @foreach($toc as $item)
                    <a href="{{ $item['id'] }}" class="flex items-center gap-2 text-sm text-gray-400 hover:text-teal-400 transition py-1.5 px-2 rounded-lg hover:bg-teal-500/10">
                        <i class="{{ $item['ikon'] }} text-xs"></i>{{ $item['label'] }}
                    </a>
                    @endforeach
                </nav>
            </div>
        </div>

        {{-- Content --}}
        <div class="lg:col-span-3 space-y-12">
            {{-- Pengumpulan Data --}}
            <div id="pengumpulan" data-aos="fade-up">
                <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">BAGIAN 1</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Pengumpulan Data</h2>
                @php
                $dataCollected = [
                    ['kategori' => 'Data Identitas', 'ikon' => 'fas fa-id-card', 'warna' => 'blue', 'items' => ['Nama lengkap & username', 'Alamat email institusi/pribadi', 'Nomor telepon (opsional)', 'Foto profil']],
                    ['kategori' => 'Data Akademik', 'ikon' => 'fas fa-graduation-cap', 'warna' => 'green', 'items' => ['Riwayat kelas & kuis', 'Nilai & progress belajar', 'Sertifikat & pencapaian', 'Kehadiran']],
                    ['kategori' => 'Data Teknis', 'ikon' => 'fas fa-laptop-code', 'warna' => 'purple', 'items' => ['Alamat IP & browser agent', 'Cookie identifier', 'Log aktivitas platform', 'Preferensi pengaturan']],
                ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    @foreach($dataCollected as $dc)
                    <div class="kaca rounded-xl p-5 border-{{ $dc['warna'] }}-500/20">
                        <div class="w-10 h-10 bg-{{ $dc['warna'] }}-500/20 rounded-lg flex items-center justify-center mb-3"><i class="{{ $dc['ikon'] }} text-{{ $dc['warna'] }}-400"></i></div>
                        <h4 class="text-white font-bold mb-2">{{ $dc['kategori'] }}</h4>
                        <ul class="space-y-1.5">
                            @foreach($dc['items'] as $item)
                            <li class="text-gray-400 text-xs flex items-start gap-2"><i class="fas fa-circle text-[5px] text-{{ $dc['warna'] }}-400 mt-1.5"></i>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Penggunaan Data --}}
            <div id="penggunaan" data-aos="fade-up">
                <span class="text-xs bg-blue-500/10 text-blue-400 px-3 py-1 rounded-full">BAGIAN 2</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Penggunaan Data</h2>
                @php
                $penggunaan = [
                    ['tujuan' => 'Personalisasi Pembelajaran', 'desc' => 'Menyesuaikan materi, rekomendasi kelas, dan tingkat kesulitan kuis berdasarkan progres belajar Anda.', 'ikon' => 'fas fa-brain', 'warna' => 'indigo'],
                    ['tujuan' => 'Peningkatan Layanan', 'desc' => 'Menganalisis pola penggunaan untuk mengoptimalkan performa platform, fitur baru, dan UX design.', 'ikon' => 'fas fa-chart-line', 'warna' => 'cyan'],
                    ['tujuan' => 'Keamanan Akun', 'desc' => 'Deteksi aktivitas mencurigakan, verifikasi identitas, dan pencegahan akses tidak sah ke akun Anda.', 'ikon' => 'fas fa-shield-virus', 'warna' => 'red'],
                    ['tujuan' => 'Komunikasi', 'desc' => 'Mengirim notifikasi penting, update kelas, pengumuman, dan newsletter (dengan persetujuan).', 'ikon' => 'fas fa-envelope', 'warna' => 'amber'],
                ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($penggunaan as $p)
                    <div class="kaca rounded-xl p-5 border-{{ $p['warna'] }}-500/20 flex items-start gap-4">
                        <div class="w-10 h-10 bg-{{ $p['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $p['ikon'] }} text-{{ $p['warna'] }}-400"></i></div>
                        <div><h4 class="text-white font-bold text-sm mb-1">{{ $p['tujuan'] }}</h4><p class="text-gray-400 text-xs">{{ $p['desc'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Berbagi & Retensi --}}
            <div id="berbagi" data-aos="fade-up">
                <span class="text-xs bg-rose-500/10 text-rose-400 px-3 py-1 rounded-full">BAGIAN 3</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Berbagi & Retensi Data</h2>
                <div class="kaca rounded-xl p-6 border-rose-500/20 mb-4">
                    <h4 class="text-white font-bold mb-3"><i class="fas fa-handshake text-rose-400 mr-2"></i>Prinsip Berbagi Data</h4>
                    <p class="text-gray-400 text-sm mb-4">KVT Hub <strong class="text-white">tidak menjual</strong> data pribadi Anda kepada pihak ketiga. Data hanya dibagikan dalam kondisi berikut:</p>
                    @php
                    $berbagi = [
                        'Penyedia layanan hosting & infrastruktur cloud (encrypted at rest)',
                        'Lembaga pendidikan mitra (hanya data akademik, dengan consent)',
                        'Otoritas hukum jika diwajibkan oleh peraturan perundang-undangan',
                        'Layanan analitik anonim (Google Analytics, tanpa PII)',
                    ];
                    @endphp
                    <ul class="space-y-2">
                        @foreach($berbagi as $b)
                        <li class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check text-rose-400 text-xs mt-1"></i>{{ $b }}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="penyimpanan" class="kaca rounded-xl p-6 border-amber-500/20">
                    <h4 class="text-white font-bold mb-3"><i class="fas fa-clock text-amber-400 mr-2"></i>Retensi Data</h4>
                    @php
                    $retensi = [
                        ['data' => 'Data akun aktif', 'durasi' => 'Selama akun aktif + 30 hari setelah penghapusan', 'warna' => 'green'],
                        ['data' => 'Log aktivitas', 'durasi' => '12 bulan rolling', 'warna' => 'blue'],
                        ['data' => 'Data akademik', 'durasi' => '5 tahun (standar akreditasi)', 'warna' => 'purple'],
                        ['data' => 'Backup terenkripsi', 'durasi' => '90 hari rotasi', 'warna' => 'amber'],
                    ];
                    @endphp
                    <div class="space-y-3">
                        @foreach($retensi as $r)
                        <div class="flex items-center justify-between bg-kvt-800/30 rounded-lg p-3">
                            <span class="text-gray-300 text-sm font-medium">{{ $r['data'] }}</span>
                            <span class="text-xs bg-{{ $r['warna'] }}-500/10 text-{{ $r['warna'] }}-400 px-3 py-1 rounded-full">{{ $r['durasi'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Keamanan Data --}}
            <div id="keamanan" data-aos="fade-up">
                <span class="text-xs bg-emerald-500/10 text-emerald-400 px-3 py-1 rounded-full">BAGIAN 4</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Keamanan Data</h2>
                @php
                $keamanan = [
                    ['fitur' => 'AES-256 Encryption', 'desc' => 'Semua data tersimpan dengan enkripsi AES-256 at rest dan TLS 1.3 in transit.', 'ikon' => 'fas fa-key', 'warna' => 'teal'],
                    ['fitur' => 'Two-Factor Authentication', 'desc' => '2FA via TOTP (Google Authenticator) dan SMS OTP untuk keamanan login.', 'ikon' => 'fas fa-mobile-alt', 'warna' => 'blue'],
                    ['fitur' => 'SOC 2 Compliance', 'desc' => 'Infrastruktur kami mengikuti standar SOC 2 Type II untuk keamanan & availability.', 'ikon' => 'fas fa-certificate', 'warna' => 'green'],
                    ['fitur' => 'Regular Penetration Testing', 'desc' => 'Pengujian keamanan berkala oleh tim ethical hacker independen setiap kuartal.', 'ikon' => 'fas fa-bug', 'warna' => 'red'],
                ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($keamanan as $k)
                    <div class="kaca rounded-xl p-5 border-{{ $k['warna'] }}-500/20 flex items-start gap-4">
                        <div class="w-10 h-10 bg-{{ $k['warna'] }}-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400"></i></div>
                        <div><h4 class="text-white font-bold text-sm mb-1">{{ $k['fitur'] }}</h4><p class="text-gray-400 text-xs">{{ $k['desc'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Hak Pengguna --}}
            <div id="hak-pengguna" data-aos="fade-up">
                <span class="text-xs bg-violet-500/10 text-violet-400 px-3 py-1 rounded-full">BAGIAN 5</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Hak Pengguna (GDPR-aligned)</h2>
                @php
                $hakPengguna = [
                    ['hak' => 'Hak Akses (Right to Access)', 'desc' => 'Anda berhak meminta salinan lengkap data pribadi Anda yang kami simpan.', 'ikon' => 'fas fa-eye'],
                    ['hak' => 'Hak Koreksi (Right to Rectification)', 'desc' => 'Anda dapat memperbarui atau memperbaiki data pribadi yang tidak akurat.', 'ikon' => 'fas fa-edit'],
                    ['hak' => 'Hak Hapus (Right to Erasure)', 'desc' => 'Anda dapat meminta penghapusan data pribadi Anda dari sistem kami.', 'ikon' => 'fas fa-trash-alt'],
                    ['hak' => 'Hak Portabilitas (Right to Portability)', 'desc' => 'Anda dapat mengekspor data Anda dalam format JSON/CSV yang dapat dibaca mesin.', 'ikon' => 'fas fa-file-export'],
                    ['hak' => 'Hak Keberatan (Right to Object)', 'desc' => 'Anda dapat menolak pemrosesan data untuk tujuan pemasaran atau profiling.', 'ikon' => 'fas fa-hand-paper'],
                    ['hak' => 'Hak Pembatasan (Right to Restriction)', 'desc' => 'Anda dapat meminta pembatasan pemrosesan data dalam situasi tertentu.', 'ikon' => 'fas fa-ban'],
                ];
                @endphp
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($hakPengguna as $i => $h)
                    <div class="kaca rounded-xl p-5 border-violet-500/20 flex items-start gap-4">
                        <div class="w-8 h-8 bg-violet-500/20 rounded-lg flex items-center justify-center flex-shrink-0"><i class="{{ $h['ikon'] }} text-violet-400 text-sm"></i></div>
                        <div><h4 class="text-white font-bold text-sm mb-1">{{ $h['hak'] }}</h4><p class="text-gray-400 text-xs">{{ $h['desc'] }}</p></div>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Cookie Policy --}}
            <div id="cookie" data-aos="fade-up">
                <span class="text-xs bg-orange-500/10 text-orange-400 px-3 py-1 rounded-full">BAGIAN 6</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Kebijakan Cookie</h2>
                @php
                $cookies = [
                    ['jenis' => 'Essential Cookies', 'desc' => 'Diperlukan untuk fungsi dasar: login session, CSRF token, preferensi bahasa.', 'warna' => 'green', 'wajib' => true],
                    ['jenis' => 'Analytics Cookies', 'desc' => 'Melacak statistik pengunjung anonim untuk peningkatan UX (Google Analytics).', 'warna' => 'blue', 'wajib' => false],
                    ['jenis' => 'Functional Cookies', 'desc' => 'Menyimpan preferensi pengguna: tema gelap, layout dashboard, notifikasi.', 'warna' => 'purple', 'wajib' => false],
                    ['jenis' => 'Marketing Cookies', 'desc' => 'KVT Hub <strong>tidak menggunakan</strong> marketing/tracking cookies pihak ketiga.', 'warna' => 'red', 'wajib' => false],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($cookies as $c)
                    <div class="kaca rounded-xl p-4 border-{{ $c['warna'] }}-500/20 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 bg-{{ $c['warna'] }}-400 rounded-full"></div>
                            <div><h4 class="text-white font-bold text-sm">{{ $c['jenis'] }}</h4><p class="text-gray-400 text-xs">{!! $c['desc'] !!}</p></div>
                        </div>
                        <span class="text-xs px-2 py-1 rounded-full {{ $c['wajib'] ? 'bg-green-500/10 text-green-400' : 'bg-kvt-700/50 text-gray-400' }}">{{ $c['wajib'] ? 'Wajib' : 'Opsional' }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            {{-- Terms of Service --}}
            <div id="tos" data-aos="fade-up">
                <span class="text-xs bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full">BAGIAN 7</span>
                <h2 class="text-2xl md:text-3xl font-black text-white mt-4 mb-4">Terms of Service</h2>
                @php
                $tos = [
                    ['judul' => 'Penggunaan Platform', 'isi' => 'Pengguna wajib berusia minimal 13 tahun. Akun institusi harus memiliki otorisasi resmi dari lembaga pendidikan terkait.'],
                    ['judul' => 'Konten & Hak Cipta', 'isi' => 'Materi yang diunggah oleh pengguna menjadi tanggung jawab pengunggah. KVT Hub berhak menghapus konten yang melanggar HAKI.'],
                    ['judul' => 'Larangan', 'isi' => 'Dilarang menggunakan platform untuk aktivitas ilegal, menyebarkan malware, scraping data, atau penyalahgunaan akun.'],
                    ['judul' => 'Pembatasan Layanan', 'isi' => 'KVT Hub berhak membatasi atau menangguhkan akun yang melanggar ketentuan tanpa pemberitahuan terlebih dahulu.'],
                    ['judul' => 'Penyelesaian Sengketa', 'isi' => 'Sengketa diselesaikan melalui mediasi sebagaimana diatur dalam hukum Republik Indonesia.'],
                ];
                @endphp
                <div class="space-y-3">
                    @foreach($tos as $i => $t)
                    <div class="kaca rounded-xl p-5 border-cyan-500/20">
                        <h4 class="text-white font-bold text-sm mb-2"><span class="text-cyan-400 mr-2">{{ $i + 1 }}.</span>{{ $t['judul'] }}</h4>
                        <p class="text-gray-400 text-sm">{{ $t['isi'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KONTAK DPO & UPDATE --}}
<section class="bg-gradient-to-br from-teal-900/10 to-kvt-900/30 py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-12" data-aos="fade-up">
            <span class="text-xs bg-teal-500/10 text-teal-400 px-3 py-1 rounded-full">KONTAK & UPDATE</span>
            <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Data Protection Officer</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
            $kontak = [
                ['label' => 'Email DPO', 'value' => 'dpo@kvthub.id', 'ikon' => 'fas fa-envelope', 'warna' => 'teal'],
                ['label' => 'Respons Maksimal', 'value' => '30 hari kerja', 'ikon' => 'fas fa-clock', 'warna' => 'blue'],
                ['label' => 'Terakhir Diperbarui', 'value' => '15 Februari 2026', 'ikon' => 'fas fa-calendar-check', 'warna' => 'green'],
            ];
            @endphp
            @foreach($kontak as $k)
            <div class="kaca rounded-2xl p-6 border-{{ $k['warna'] }}-500/20 text-center" data-aos="fade-up">
                <div class="w-14 h-14 bg-{{ $k['warna'] }}-500/20 rounded-xl flex items-center justify-center mx-auto mb-3"><i class="{{ $k['ikon'] }} text-{{ $k['warna'] }}-400 text-xl"></i></div>
                <h4 class="text-gray-400 text-sm">{{ $k['label'] }}</h4>
                <p class="text-white font-bold text-lg mt-1">{{ $k['value'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- FITUR PER ROLE --}}
<section class="max-w-7xl mx-auto px-4 py-20">
    <div class="text-center mb-12" data-aos="fade-up">
        <span class="text-xs bg-green-500/10 text-green-400 px-3 py-1 rounded-full">FITUR PER PERAN</span>
        <h2 class="text-3xl md:text-4xl font-black text-white mt-4">Hak Privasi Berdasarkan Peran</h2>
    </div>
    @php
    $roles = [
        ['ikon' => 'fas fa-user', 'warna' => 'blue', 'gradien' => 'from-blue-500 to-cyan-500', 'peran' => 'Siswa / Pelajar', 'fitur' => ['Lihat & ekspor data pribadi', 'Kelola consent cookie', 'Hapus akun & data permanen', 'Download riwayat akademik', 'Kontrol visibilitas profil', 'Ajukan keberatan pemrosesan']],
        ['ikon' => 'fas fa-chalkboard-teacher', 'warna' => 'green', 'gradien' => 'from-green-500 to-emerald-500', 'peran' => 'Guru / Pengajar', 'fitur' => ['Akses data akademik siswa (consent)', 'Kelola retensi data kelas', 'Ekspor laporan terenkripsi', 'Atur privasi konten materi', 'Data Processing Agreement', 'Pelaporan insiden keamanan']],
        ['ikon' => 'fas fa-user-shield', 'warna' => 'red', 'gradien' => 'from-red-500 to-rose-500', 'peran' => 'Admin / DPO', 'fitur' => ['Kelola kebijakan privasi platform', 'Respons permintaan hak pengguna', 'Audit trail akses data', 'Konfigurasi retensi & penghapusan', 'Breach notification management', 'Compliance reporting dashboard']],
    ];
    @endphp
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($roles as $r)
        <div class="kaca rounded-2xl overflow-hidden border-{{ $r['warna'] }}-500/20 hover:border-{{ $r['warna'] }}-500/40 transition" data-aos="fade-up">
            <div class="bg-gradient-to-r {{ $r['gradien'] }} p-6 text-center">
                <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-3"><i class="{{ $r['ikon'] }} text-white text-2xl"></i></div>
                <h3 class="text-white font-bold text-xl">{{ $r['peran'] }}</h3>
            </div>
            <div class="p-6 space-y-3">
                @foreach($r['fitur'] as $f)
                <div class="flex items-start gap-2 text-sm text-gray-300"><i class="fas fa-check-circle text-{{ $r['warna'] }}-400 text-xs mt-1"></i>{{ $f }}</div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="bg-gradient-to-r from-teal-900/40 to-kvt-900/40 py-16">
    <div class="max-w-4xl mx-auto px-4 text-center" data-aos="zoom-in-up">
        <h2 class="text-3xl md:text-4xl font-black text-white mb-4">Punya Pertanyaan tentang Privasi Anda?</h2>
        <p class="text-gray-400 mb-8 max-w-xl mx-auto">Hubungi Data Protection Officer kami kapan saja. Kami berkomitmen merespons setiap permintaan dalam 30 hari kerja.</p>
        <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-teal-500 to-kvt-500 text-white px-10 py-4 rounded-xl font-semibold shadow-lg shadow-teal-500/30 hover:-translate-y-0.5 transition">
            <i class="fas fa-envelope-open-text"></i> Hubungi DPO
        </a>
    </div>
</section>

@endsection
