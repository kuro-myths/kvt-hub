@extends('tata-letak.auth')

@section('judul', 'Daftar - KVT Hub')

@section('konten')
<section class="min-h-screen flex items-center justify-center py-20 px-4">
    <div class="w-full max-w-lg" data-aos="fade-up">
        <div class="bg-kvt-900/80 border border-kvt-700/30 rounded-2xl p-8 shadow-2xl backdrop-blur">
            <div class="text-center mb-8">
                <div class="w-16 h-16 bg-gradient-to-br from-kvt-400 to-kvt-600 rounded-2xl flex items-center justify-center mx-auto mb-4 shadow-lg">
                    <i class="fas fa-user-plus text-2xl text-white"></i>
                </div>
                <h1 class="text-2xl font-black text-white">Buat Akun Baru</h1>
                <p class="text-gray-400 text-sm mt-1">Mulai petualangan belajarmu sekarang</p>
            </div>

            @if($errors->any())
                <div class="bg-red-500/10 border border-red-500/30 rounded-lg p-3 mb-6">
                    @foreach($errors->all() as $error)
                        <p class="text-red-400 text-sm"><i class="fas fa-exclamation-triangle mr-1"></i>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('daftar') }}" class="space-y-5" id="formDaftar" enctype="multipart/form-data">
                @csrf

                {{-- Step indicator --}}
                <div class="flex items-center justify-center gap-2 mb-2">
                    <div class="step-dot w-3 h-3 rounded-full bg-kvt-400 transition" id="dot1"></div>
                    <div class="w-8 h-0.5 bg-kvt-700/50 rounded"></div>
                    <div class="step-dot w-3 h-3 rounded-full bg-kvt-700/50 transition" id="dot2"></div>
                    <div class="w-8 h-0.5 bg-kvt-700/50 rounded"></div>
                    <div class="step-dot w-3 h-3 rounded-full bg-kvt-700/50 transition" id="dot3"></div>
                </div>

                {{-- ===== STEP 1: Data Diri ===== --}}
                <div id="step1">
                    <p class="text-xs text-kvt-400 uppercase tracking-widest font-bold mb-4"><i class="fas fa-user mr-1.5"></i>Data Diri</p>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Nama Lengkap <span class="text-red-400">*</span></label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="Nama lengkap kamu">
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Email <span class="text-red-400">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="email@contoh.com">
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">No. HP</label>
                            <input type="text" name="no_hp" value="{{ old('no_hp') }}"
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Asal Instansi / Sekolah</label>
                            <input type="text" name="asal_instansi" value="{{ old('asal_instansi') }}"
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="Contoh: SMA Negeri 1 Kebumen">
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-sm text-gray-300 font-medium mb-1 block">Provinsi</label>
                                <input type="text" name="provinsi" value="{{ old('provinsi') }}"
                                    class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                    placeholder="Jawa Tengah">
                            </div>
                            <div>
                                <label class="text-sm text-gray-300 font-medium mb-1 block">Kota / Kabupaten</label>
                                <input type="text" name="kota_kabupaten" value="{{ old('kota_kabupaten') }}"
                                    class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                    placeholder="Kebumen">
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="keStep(2)" class="w-full mt-5 bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/30">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>

                {{-- ===== STEP 2: Peran & Dokumen ===== --}}
                <div id="step2" class="hidden">
                    <p class="text-xs text-kvt-400 uppercase tracking-widest font-bold mb-4"><i class="fas fa-id-card mr-1.5"></i>Peran & Dokumen</p>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-2 block">Daftar Sebagai <span class="text-red-400">*</span></label>
                            <div class="grid grid-cols-2 gap-3">
                                <label class="cursor-pointer">
                                    <input type="radio" name="peran" value="siswa" class="hidden peer" {{ old('peran', 'siswa') === 'siswa' ? 'checked' : '' }} onchange="ubahPeran()">
                                    <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                        <i class="fas fa-user-graduate text-2xl text-kvt-400 mb-1"></i>
                                        <div class="text-sm font-medium text-white">Siswa</div>
                                        <div class="text-xs text-gray-500">Pelajar SD-SMA/SMK</div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="peran" value="mahasiswa" class="hidden peer" {{ old('peran') === 'mahasiswa' ? 'checked' : '' }} onchange="ubahPeran()">
                                    <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                        <i class="fas fa-graduation-cap text-2xl text-blue-400 mb-1"></i>
                                        <div class="text-sm font-medium text-white">Mahasiswa</div>
                                        <div class="text-xs text-gray-500">Diploma & Sarjana+</div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="peran" value="orang_tua" class="hidden peer" {{ old('peran') === 'orang_tua' ? 'checked' : '' }} onchange="ubahPeran()">
                                    <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                        <i class="fas fa-users text-2xl text-green-400 mb-1"></i>
                                        <div class="text-sm font-medium text-white">Orang Tua</div>
                                        <div class="text-xs text-gray-500">Wali & Pengawas</div>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="peran" value="pengunjung" class="hidden peer" {{ old('peran') === 'pengunjung' ? 'checked' : '' }} onchange="ubahPeran()">
                                    <div class="peer-checked:border-kvt-500 peer-checked:bg-kvt-500/10 border border-kvt-700/50 rounded-xl p-3 text-center transition hover:border-kvt-600/50">
                                        <i class="fas fa-eye text-2xl text-purple-400 mb-1"></i>
                                        <div class="text-sm font-medium text-white">Pengunjung</div>
                                        <div class="text-xs text-gray-500">Akses terbatas</div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        {{-- Dynamic document upload --}}
                        <div id="areaDokumen">
                            <div id="dokSiswa" class="space-y-2">
                                <label class="text-sm text-gray-300 font-medium mb-1 block">Upload Kartu Pelajar <span class="text-red-400">*</span></label>
                                <p class="text-xs text-gray-500 mb-2">Format: JPG, PNG, atau PDF. Maks 5MB.</p>
                                <input type="file" name="dokumen_identitas" accept=".jpg,.jpeg,.png,.pdf"
                                    class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-kvt-600 file:text-white hover:file:bg-kvt-500 transition">
                            </div>
                        </div>

                        <div class="bg-kvt-800/30 border border-kvt-700/30 rounded-xl p-3" id="infoDokumen">
                            <p class="text-xs text-gray-400"><i class="fas fa-info-circle text-kvt-400 mr-1"></i>
                                <span id="infoDokumenText">Siswa wajib upload kartu pelajar untuk verifikasi akun.</span>
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-5">
                        <button type="button" onclick="keStep(1)" class="flex-1 bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </button>
                        <button type="button" onclick="keStep(3)" class="flex-1 bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/30">
                            Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                        </button>
                    </div>
                </div>

                {{-- ===== STEP 3: Keamanan ===== --}}
                <div id="step3" class="hidden">
                    <p class="text-xs text-kvt-400 uppercase tracking-widest font-bold mb-4"><i class="fas fa-shield-alt mr-1.5"></i>Keamanan Akun</p>

                    <div class="space-y-4">
                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Kata Sandi <span class="text-red-400">*</span></label>
                            <div class="relative">
                                <input type="password" name="password" required id="inputPassword"
                                    class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition pr-12"
                                    placeholder="Minimal 8 karakter">
                                <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 hover:text-gray-300 transition">
                                    <i class="fas fa-eye" id="ikonPassword"></i>
                                </button>
                            </div>
                            <div class="mt-2 flex gap-1" id="passwordStrength">
                                <div class="h-1 flex-1 rounded bg-kvt-800"></div>
                                <div class="h-1 flex-1 rounded bg-kvt-800"></div>
                                <div class="h-1 flex-1 rounded bg-kvt-800"></div>
                                <div class="h-1 flex-1 rounded bg-kvt-800"></div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1" id="passwordHint">Gunakan kombinasi huruf, angka, & simbol</p>
                        </div>

                        <div>
                            <label class="text-sm text-gray-300 font-medium mb-1 block">Konfirmasi Kata Sandi <span class="text-red-400">*</span></label>
                            <input type="password" name="password_confirmation" required
                                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-kvt-500 focus:ring-2 focus:ring-kvt-500/20 transition"
                                placeholder="Ulangi kata sandi">
                        </div>

                        {{-- Persetujuan --}}
                        <div class="space-y-2">
                            <label class="flex items-start gap-2 cursor-pointer">
                                <input type="checkbox" name="setuju_syarat" required class="mt-1 w-4 h-4 rounded border-kvt-700 bg-kvt-800 text-kvt-500 focus:ring-kvt-500">
                                <span class="text-xs text-gray-400">Saya menyetujui <a href="#" class="text-kvt-400 hover:underline">Syarat & Ketentuan</a> serta <a href="#" class="text-kvt-400 hover:underline">Kebijakan Privasi</a> KVT Hub.</span>
                            </label>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-5">
                        <button type="button" onclick="keStep(2)" class="flex-1 bg-kvt-800/50 hover:bg-kvt-700/50 text-gray-300 py-3 rounded-xl font-semibold transition border border-kvt-700/50">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </button>
                        <button type="submit" class="flex-1 bg-gradient-to-r from-kvt-500 to-kvt-600 hover:from-kvt-400 hover:to-kvt-500 text-white py-3 rounded-xl font-semibold transition shadow-lg shadow-kvt-500/30">
                            <i class="fas fa-rocket mr-2"></i>Buat Akun
                        </button>
                    </div>
                </div>
            </form>

            {{-- OAuth --}}
            <div class="mt-6">
                <div class="relative">
                    <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-kvt-700/50"></div></div>
                    <div class="relative flex justify-center text-sm"><span class="px-4 bg-kvt-900 text-gray-500">atau daftar dengan</span></div>
                </div>
                <div class="mt-4 grid grid-cols-2 gap-3">
                    <a href="{{ route('auth.google') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-google text-red-400"></i><span class="text-sm text-gray-300">Google</span>
                    </a>
                    <a href="{{ route('auth.github') }}" class="flex items-center justify-center gap-2 bg-kvt-800/50 hover:bg-kvt-700/50 border border-kvt-700/50 rounded-xl py-3 transition">
                        <i class="fab fa-github text-gray-300"></i><span class="text-sm text-gray-300">GitHub</span>
                    </a>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('daftar.pengajar') }}" class="text-green-400 hover:text-green-300 text-sm font-medium transition">
                    <i class="fas fa-chalkboard-teacher mr-1"></i>Daftar sebagai Pengajar / Guru
                </a>
            </div>

            <div class="mt-3 text-center text-sm">
                <span class="text-gray-500">Sudah punya akun?</span>
                <a href="{{ route('masuk') }}" class="text-kvt-400 hover:text-kvt-300 font-medium ml-1">Masuk</a>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
function keStep(n) {
    document.querySelectorAll('[id^="step"]').forEach(el => el.classList.add('hidden'));
    document.getElementById('step' + n).classList.remove('hidden');
    for(let i = 1; i <= 3; i++) {
        const dot = document.getElementById('dot' + i);
        dot.className = 'step-dot w-3 h-3 rounded-full transition ' + (i <= n ? 'bg-kvt-400' : 'bg-kvt-700/50');
    }
}

function ubahPeran() {
    const peran = document.querySelector('input[name="peran"]:checked')?.value;
    const area = document.getElementById('areaDokumen');
    const info = document.getElementById('infoDokumenText');
    const infoBox = document.getElementById('infoDokumen');

    const labels = {
        siswa: { label: 'Upload Kartu Pelajar', info: 'Siswa wajib upload kartu pelajar untuk verifikasi akun.', required: true },
        mahasiswa: { label: 'Upload KTM (Kartu Tanda Mahasiswa)', info: 'Mahasiswa wajib upload KTM untuk verifikasi akun.', required: true },
        orang_tua: { label: 'Upload Kartu Keluarga (KK)', info: 'Orang tua wajib upload KK untuk verifikasi akun.', required: true },
        pengunjung: { label: '', info: 'Pengunjung tidak perlu upload dokumen. Akun langsung aktif.', required: false },
    };

    const cfg = labels[peran] || labels.siswa;

    if (cfg.required) {
        area.innerHTML = `
            <label class="text-sm text-gray-300 font-medium mb-1 block">${cfg.label} <span class="text-red-400">*</span></label>
            <p class="text-xs text-gray-500 mb-2">Format: JPG, PNG, atau PDF. Maks 5MB.</p>
            <input type="file" name="dokumen_identitas" accept=".jpg,.jpeg,.png,.pdf"
                class="w-full bg-kvt-800/50 border border-kvt-700/50 rounded-xl px-4 py-3 text-white file:mr-4 file:py-1 file:px-3 file:rounded-lg file:border-0 file:text-sm file:bg-kvt-600 file:text-white hover:file:bg-kvt-500 transition">
        `;
    } else {
        area.innerHTML = '<p class="text-sm text-gray-500 italic py-2"><i class="fas fa-check-circle text-green-400 mr-1"></i>Tidak perlu upload dokumen.</p>';
    }

    info.textContent = cfg.info;
    infoBox.className = peran === 'pengunjung'
        ? 'bg-green-500/10 border border-green-500/30 rounded-xl p-3'
        : 'bg-kvt-800/30 border border-kvt-700/30 rounded-xl p-3';
}

function togglePassword() {
    const input = document.getElementById('inputPassword');
    const icon = document.getElementById('ikonPassword');
    if(input.type === 'password') { input.type = 'text'; icon.className = 'fas fa-eye-slash'; }
    else { input.type = 'password'; icon.className = 'fas fa-eye'; }
}

document.getElementById('inputPassword')?.addEventListener('input', function() {
    const val = this.value;
    let strength = 0;
    if(val.length >= 8) strength++;
    if(/[a-z]/.test(val) && /[A-Z]/.test(val)) strength++;
    if(/\d/.test(val)) strength++;
    if(/[^a-zA-Z0-9]/.test(val)) strength++;
    const bars = document.querySelectorAll('#passwordStrength > div');
    const colors = ['bg-red-500', 'bg-orange-500', 'bg-yellow-500', 'bg-green-500'];
    const hints = ['Sangat Lemah', 'Lemah', 'Cukup Kuat', 'Kuat'];
    bars.forEach((bar, i) => {
        bar.className = 'h-1 flex-1 rounded ' + (i < strength ? colors[strength-1] : 'bg-kvt-800');
    });
    document.getElementById('passwordHint').textContent = strength > 0 ? hints[strength-1] : 'Gunakan kombinasi huruf, angka, & simbol';
});

// Initialize role UI
document.addEventListener('DOMContentLoaded', () => ubahPeran());
</script>
@endpush
@endsection
