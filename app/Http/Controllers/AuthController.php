<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KunciAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    // ─── LOGIN ───

    public function formMasuk()
    {
        return view('auth.masuk');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->filled('ingat'))) {
            $request->session()->regenerate();

            /** @var \App\Models\User $user */
            $user = Auth::user();
            $user->update(['terakhir_login' => now()]);

            // Check verification status
            if ($user->butuhVerifikasi() && !$user->sudahTerverifikasi() && !$user->dibuat_oleh_admin) {
                return redirect()->route('verifikasi.status');
            }

            return redirect()->intended($this->dashboardUrl($user));
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
    }

    // ─── REGISTRATION ───

    public function formDaftar()
    {
        return view('auth.daftar');
    }

    public function daftar(Request $request)
    {
        // Base validation
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'peran' => 'required|in:siswa,mahasiswa,orang_tua,pengunjung',
            'no_hp' => 'nullable|string|max:20',
            'provinsi' => 'nullable|string|max:100',
            'kota_kabupaten' => 'nullable|string|max:100',
            'asal_instansi' => 'nullable|string|max:255',
        ];

        // Document validation based on role
        $peran = $request->input('peran');
        if (in_array($peran, ['mahasiswa', 'siswa', 'orang_tua'])) {
            $rules['dokumen_identitas'] = 'required|file|mimes:jpg,jpeg,png,pdf|max:5120';
        }
        // pengunjung → no document required

        $request->validate($rules, [
            'dokumen_identitas.required' => 'Dokumen identitas wajib diupload untuk peran ini.',
            'dokumen_identitas.mimes' => 'Format dokumen harus JPG, PNG, atau PDF.',
            'dokumen_identitas.max' => 'Ukuran dokumen maksimal 5MB.',
        ]);

        // Upload document if provided
        $dokumenPath = null;
        if ($request->hasFile('dokumen_identitas')) {
            $dokumenPath = $request->file('dokumen_identitas')
                ->store('dokumen/identitas', 'public');
        }

        // Determine initial verification status
        $statusVerifikasi = ($peran === 'pengunjung')
            ? User::STATUS_TERVERIFIKASI
            : User::STATUS_PENDING;

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => $peran,
            'no_hp' => $request->no_hp,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'asal_instansi' => $request->asal_instansi,
            'dokumen_identitas' => $dokumenPath,
            'status_verifikasi' => $statusVerifikasi,
            'aktif' => true,
        ]);

        Auth::login($user);

        if ($statusVerifikasi === User::STATUS_PENDING) {
            return redirect()->route('verifikasi.status')
                ->with('sukses', 'Akun berhasil dibuat! Menunggu verifikasi admin.');
        }

        return redirect()->route('dasbor')
            ->with('sukses', 'Selamat datang di KVT Hub!');
    }

    // ─── TEACHER APPLICATION ───

    public function formDaftarPengajar()
    {
        return view('auth.daftar-pengajar');
    }

    public function daftarPengajar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'no_hp' => 'required|string|max:20',
            'provinsi' => 'required|string|max:100',
            'kota_kabupaten' => 'required|string|max:100',
            'asal_instansi' => 'nullable|string|max:255',
            'dokumen_identitas' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'dokumen_cv' => 'required|file|mimes:pdf,doc,docx|max:10240',
            'dokumen_ijazah' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'dokumen_sertifikat' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:5120',
            'bio' => 'nullable|string|max:1000',
        ], [
            'dokumen_identitas.required' => 'KTP wajib diupload.',
            'dokumen_cv.required' => 'CV wajib diupload.',
            'dokumen_ijazah.required' => 'Ijazah wajib diupload.',
        ]);

        // Upload documents
        $paths = [];
        foreach (['dokumen_identitas', 'dokumen_cv', 'dokumen_ijazah', 'dokumen_sertifikat'] as $field) {
            if ($request->hasFile($field)) {
                $paths[$field] = $request->file($field)->store('dokumen/pengajar', 'public');
            }
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => 'pengajar',
            'no_hp' => $request->no_hp,
            'provinsi' => $request->provinsi,
            'kota_kabupaten' => $request->kota_kabupaten,
            'asal_instansi' => $request->asal_instansi,
            'bio' => $request->bio,
            'dokumen_identitas' => $paths['dokumen_identitas'] ?? null,
            'dokumen_cv' => $paths['dokumen_cv'] ?? null,
            'dokumen_ijazah' => $paths['dokumen_ijazah'] ?? null,
            'dokumen_sertifikat' => $paths['dokumen_sertifikat'] ?? null,
            'status_verifikasi' => User::STATUS_PENDING,
            'aktif' => false,
        ]);

        return redirect()->route('masuk')
            ->with('sukses', 'Pendaftaran pengajar berhasil! Akun Anda akan diaktifkan setelah diverifikasi admin.');
    }

    // ─── VERIFICATION STATUS PAGE ───

    public function statusVerifikasi()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        return view('auth.verifikasi-status', compact('user'));
    }

    // ─── LOGOUT ───

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda');
    }

    // ─── ADMIN LOGIN ───

    public function formMasukAdmin()
    {
        return view('auth.masuk-admin');
    }

    public function masukAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'kunci_admin' => 'required|string',
        ]);

        $kunci = KunciAdmin::where('kunci', $request->kunci_admin)
            ->where('digunakan', false)
            ->first();

        if (!$kunci) {
            return back()->withErrors(['kunci_admin' => 'Kunci admin tidak valid atau sudah digunakan.'])->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            /** @var \App\Models\User $user */
            $user = Auth::user();

            if ($user->peran !== 'admin') {
                Auth::logout();
                return back()->withErrors(['email' => 'Akun ini bukan akun admin.'])->withInput();
            }

            $kunci->update([
                'digunakan' => true,
                'digunakan_oleh' => $user->id,
                'digunakan_pada' => now(),
            ]);

            $user->update(['terakhir_login' => now()]);
            $request->session()->regenerate();

            return redirect()->route('admin.dasbor');
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
    }

    // ─── OAuth placeholders ───

    public function redirectKeGoogle()
    {
        return redirect()->route('masuk')->with('info', 'Integrasi Google OAuth akan segera hadir.');
    }

    public function callbackGoogle()
    {
        return redirect()->route('masuk');
    }

    public function redirectKeGithub()
    {
        return redirect()->route('masuk')->with('info', 'Integrasi GitHub OAuth akan segera hadir.');
    }

    public function callbackGithub()
    {
        return redirect()->route('masuk');
    }

    // ─── Helpers ───

    private function dashboardUrl($user): string
    {
        return match ($user->peran) {
            'admin' => route('admin.dasbor'),
            'pengajar' => route('pengajar.dasbor'),
            'staff' => route('staff.dasbor'),
            default => route('pengguna.dasbor'),
        };
    }
}
