@extends('tata-letak.auth')

@section('judul', 'Daftar Pengajar - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-lg" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl backdrop-blur">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-chalkboard-teacher text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">Daftar Sebagai Pengajar</h1>
                <p class="text-gray-400 text-sm mt-1">Bergabung sebagai tenaga pengajar KVT Hub</p>
            </div>

            {{-- Info box --}}
            <div class="bg-yellow-500/10 border border-yellow-500/30 rounded-xl p-3 mb-6">
                <p class="text-yellow-400 text-xs"><i class="fas fa-info-circle mr-1"></i>
                    Pendaftaran pengajar memerlukan verifikasi dokumen oleh admin. Akun akan diaktifkan setelah dokumen disetujui.
                </p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('daftar.pengajar.simpan') }}" class="space-y-5" enctype="multipart/form-data">
                @csrf

                {{-- Data Diri --}}
                <p class="text-xs text-green-400 uppercase tracking-widest font-bold"><i class="fas fa-user mr-1.5"></i>Data Diri</p>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Nama Lengkap <span class="text-red-400">*</span></label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="Nama lengkap">
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Email <span class="text-red-400">*</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">No. HP <span class="text-red-400">*</span></label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Provinsi <span class="text-red-400">*</span></label>
                            <input type="text" name="provinsi" value="{{ old('provinsi') }}" required
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="Jawa Tengah">
                        </div>
                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Kota <span class="text-red-400">*</span></label>
                            <input type="text" name="kota_kabupaten" value="{{ old('kota_kabupaten') }}" required
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="Kebumen">
                        </div>
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Asal Instansi</label>
                        <input type="text" name="asal_instansi" value="{{ old('asal_instansi') }}"
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="Sekolah / Universitas / Lembaga">
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Bio / Tentang Diri</label>
                        <textarea name="bio" rows="3"
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition resize-none"
                            placeholder="Jelaskan pengalaman mengajar, bidang keahlian, dll.">{{ old('bio') }}</textarea>
                    </div>
                </div>

                {{-- Dokumen --}}
                <p class="text-xs text-green-400 uppercase tracking-widest font-bold mt-6"><i class="fas fa-file-alt mr-1.5"></i>Dokumen Verifikasi</p>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">KTP (Identitas) <span class="text-red-400">*</span></label>
                        <input type="file" name="dokumen_identitas" accept=".jpg,.jpeg,.png,.pdf" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-600 file:text-white hover:file:bg-green-500 transition">
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">CV (Curriculum Vitae) <span class="text-red-400">*</span></label>
                        <input type="file" name="dokumen_cv" accept=".pdf,.doc,.docx" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-600 file:text-white hover:file:bg-green-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Format PDF/DOC, maks 10MB</p>
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Ijazah Terakhir <span class="text-red-400">*</span></label>
                        <input type="file" name="dokumen_ijazah" accept=".jpg,.jpeg,.png,.pdf" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-green-600 file:text-white hover:file:bg-green-500 transition">
                    </div>

                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Sertifikat (Opsional)</label>
                        <input type="file" name="dokumen_sertifikat" accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-kvt-600 file:text-white hover:file:bg-kvt-500 transition">
                        <p class="text-xs text-gray-500 mt-1">Sertifikat mengajar, kompetensi, dll.</p>
                    </div>
                </div>

                {{-- Password --}}
                <p class="text-xs text-green-400 uppercase tracking-widest font-bold mt-6"><i class="fas fa-shield-alt mr-1.5"></i>Keamanan</p>

                <div class="space-y-4">
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Kata Sandi <span class="text-red-400">*</span></label>
                        <input type="password" name="password" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="Minimal 8 karakter">
                    </div>
                    <div>
                        <label class="text-sm text-gray-300 font-medium mb-1 block">Konfirmasi Kata Sandi <span class="text-red-400">*</span></label>
                        <input type="password" name="password_confirmation" required
                            class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                            placeholder="Ulangi kata sandi">
                    </div>
                </div>

                <button type="submit" class="w-full mt-2 bg-gradient-to-r from-green-500 to-green-600 hover:from-green-400 hover:to-green-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-green-500/30">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Pendaftaran
                </button>
            </form>

            <div class="mt-6 text-center text-sm">
                <span class="text-gray-500">Bukan pengajar?</span>
                <a href="{{ route('daftar') }}" class="text-kvt-400 hover:text-kvt-300 font-medium ml-1">Daftar sebagai Pelajar</a>
            </div>
            <div class="mt-2 text-center text-sm">
                <span class="text-gray-500">Sudah punya akun?</span>
                <a href="{{ route('masuk') }}" class="text-kvt-400 hover:text-kvt-300 font-medium ml-1">Masuk</a>
            </div>
        </div>
    </div>
</section>
@endsection
