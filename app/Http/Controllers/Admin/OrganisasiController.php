<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Organisasi;
use App\Models\OrganisasiKegiatan;
use App\Models\OrganisasiPengurus;
use App\Models\OrganisasiGaleri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganisasiController extends Controller
{
    /**
     * Daftar semua organisasi (halaman utama admin).
     */
    public function index(Request $request)
    {
        $query = Organisasi::withCount(['anggota', 'kegiatan', 'pengurus', 'galeri']);

        if ($request->filled('cari')) {
            $query->where('nama', 'ilike', "%{$request->cari}%");
        }
        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        $organisasi = $query->latest()->paginate(15)->withQueryString();

        return view('akun.admin.organisasi', compact('organisasi'));
    }

    /**
     * Simpan organisasi baru.
     */
    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'tipe' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'kontak' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $data = $request->only([
            'nama',
            'singkatan',
            'deskripsi',
            'tipe',
            'kategori',
            'website',
            'kontak',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('organisasi/logo', 'public');
        }

        $data['aktif'] = $request->has('aktif');
        $data['unggulan'] = $request->has('unggulan');

        Organisasi::create($data);

        return back()->with('sukses', 'Organisasi berhasil ditambahkan!');
    }

    /**
     * Halaman detail/edit organisasi (tab-based).
     */
    public function detail(Organisasi $organisasi)
    {
        $organisasi->load(['kegiatan', 'pengurus', 'galeri']);
        return view('akun.admin.organisasi-detail', compact('organisasi'));
    }

    /**
     * Update informasi umum organisasi.
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'deskripsi' => 'nullable|string',
            'tentang' => 'nullable|string',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'tujuan' => 'nullable|string',
            'tipe' => 'required|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'website' => 'nullable|url|max:255',
            'kontak' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:50',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:500',
            'google_maps_embed' => 'nullable|string|max:1000',
            'tahun_berdiri' => 'nullable|integer|min:1900|max:' . date('Y'),
            'periode_kepengurusan' => 'nullable|string|max:50',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'gambar_struktur' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        $data = $request->only([
            'nama',
            'singkatan',
            'deskripsi',
            'tentang',
            'visi',
            'misi',
            'tujuan',
            'tipe',
            'kategori',
            'website',
            'kontak',
            'email',
            'telepon',
            'instagram',
            'facebook',
            'twitter',
            'youtube',
            'linkedin',
            'tiktok',
            'alamat',
            'google_maps_embed',
            'tahun_berdiri',
            'periode_kepengurusan',
        ]);

        if ($request->hasFile('logo')) {
            if ($organisasi->logo) {
                Storage::disk('public')->delete($organisasi->logo);
            }
            $data['logo'] = $request->file('logo')->store('organisasi/logo', 'public');
        }

        if ($request->hasFile('gambar_struktur')) {
            if ($organisasi->gambar_struktur) {
                Storage::disk('public')->delete($organisasi->gambar_struktur);
            }
            $data['gambar_struktur'] = $request->file('gambar_struktur')->store('organisasi/struktur', 'public');
        }

        $data['aktif'] = $request->has('aktif');
        $data['unggulan'] = $request->has('unggulan');

        $organisasi->update($data);

        return back()->with('sukses', 'Organisasi berhasil diperbarui!');
    }

    /**
     * Hapus organisasi.
     */
    public function hapus(Organisasi $organisasi)
    {
        if ($organisasi->logo) {
            Storage::disk('public')->delete($organisasi->logo);
        }
        if ($organisasi->gambar_struktur) {
            Storage::disk('public')->delete($organisasi->gambar_struktur);
        }
        $organisasi->delete();
        return redirect()->route('admin.organisasi.index')->with('sukses', 'Organisasi berhasil dihapus!');
    }

    // ========================================
    // KEGIATAN
    // ========================================

    public function simpanKegiatan(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'nullable|date',
            'lokasi' => 'nullable|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:3072',
        ]);

        $data = $request->only(['judul', 'deskripsi', 'tanggal', 'lokasi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('organisasi/kegiatan', 'public');
        }

        $organisasi->kegiatan()->create($data);

        return back()->with('sukses', 'Kegiatan berhasil ditambahkan!');
    }

    public function hapusKegiatan(Organisasi $organisasi, OrganisasiKegiatan $kegiatan)
    {
        if ($kegiatan->gambar) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }
        $kegiatan->delete();
        return back()->with('sukses', 'Kegiatan berhasil dihapus!');
    }

    // ========================================
    // PENGURUS
    // ========================================

    public function simpanPengurus(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'urutan' => 'nullable|integer|min:0',
            'periode' => 'nullable|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = $request->only(['nama', 'jabatan', 'urutan', 'periode']);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('organisasi/pengurus', 'public');
        }

        $organisasi->pengurus()->create($data);

        return back()->with('sukses', 'Pengurus berhasil ditambahkan!');
    }

    public function hapusPengurus(Organisasi $organisasi, OrganisasiPengurus $pengurus)
    {
        if ($pengurus->foto) {
            Storage::disk('public')->delete($pengurus->foto);
        }
        $pengurus->delete();
        return back()->with('sukses', 'Pengurus berhasil dihapus!');
    }

    // ========================================
    // GALERI
    // ========================================

    public function simpanGaleri(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only(['judul', 'keterangan']);
        $data['gambar'] = $request->file('gambar')->store('organisasi/galeri', 'public');

        $organisasi->galeri()->create($data);

        return back()->with('sukses', 'Foto galeri berhasil ditambahkan!');
    }

    public function hapusGaleri(Organisasi $organisasi, OrganisasiGaleri $galeri)
    {
        Storage::disk('public')->delete($galeri->gambar);
        $galeri->delete();
        return back()->with('sukses', 'Foto galeri berhasil dihapus!');
    }
}
