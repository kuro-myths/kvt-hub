<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KunciAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
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

            $user = Auth::user();
            $user->update(['terakhir_login' => now()]);

            return redirect()->intended($this->dashboardUrl($user));
        }

        return back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
    }

    public function formDaftar()
    {
        return view('auth.daftar');
    }

    public function daftar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'peran' => 'required|in:siswa,guru',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => $request->peran,
        ]);

        Auth::login($user);

        return redirect()->route('dasbor');
    }

    public function keluar(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('beranda');
    }

    // Login Admin dengan kunci khusus
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

    // OAuth callbacks (placeholder - will work with Socialite)
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

    private function dashboardUrl($user): string
    {
        return match ($user->peran) {
            'admin' => route('admin.dasbor'),
            'guru' => route('dasbor'),
            'siswa' => route('dasbor'),
        };
    }
}
