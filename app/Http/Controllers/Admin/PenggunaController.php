<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\In;

class PenggunaController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('cari')) {
            $cari = $request->cari;
            $query->where(function ($q) use ($cari) {
                $q->where('name', 'ilike', "%{$cari}%")
                    ->orWhere('email', 'ilike', "%{$cari}%");
            });
        }

        if ($request->filled('peran')) {
            $query->where('peran', $request->peran);
        }

        $pengguna = $query->latest()->paginate(15)->withQueryString();
        $totalPerPeran = User::selectRaw("peran, count(*) as total")->groupBy('peran')->pluck('total', 'peran');

        return view('akun.admin.pengguna', compact('pengguna', 'totalPerPeran'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'peran' => ['required', new In(User::SEMUA_PERAN)],
            'bio' => 'nullable|string|max:500',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'peran' => $request->peran,
            'bio' => $request->bio,
            'level' => 1,
            'xp' => 0,
            'xp_total' => 0,
            'aktif' => true,
            'status_verifikasi' => User::STATUS_TERVERIFIKASI,
            'dibuat_oleh_admin' => true,
        ]);

        return back()->with('sukses', 'Pengguna berhasil ditambahkan!');
    }

    public function update(Request $request, User $pengguna)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($pengguna->id)],
            'peran' => ['required', new In(User::SEMUA_PERAN)],
            'bio' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:6',
            'level' => 'nullable|integer|min:1|max:100',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'peran' => $request->peran,
            'bio' => $request->bio,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }
        if ($request->filled('level')) {
            $data['level'] = $request->level;
        }

        $pengguna->update($data);

        return back()->with('sukses', 'Data pengguna berhasil diperbarui!');
    }

    public function hapus(User $pengguna)
    {
        if ($pengguna->id === Auth::user()->id) {
            return back()->with('error', 'Tidak bisa menghapus akun sendiri!');
        }

        $pengguna->delete();
        return back()->with('sukses', 'Pengguna berhasil dihapus!');
    }

    public function toggleAktif(User $pengguna)
    {
        $pengguna->update(['aktif' => !$pengguna->aktif]);
        $status = $pengguna->aktif ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('sukses', "Pengguna berhasil {$status}!");
    }
}
