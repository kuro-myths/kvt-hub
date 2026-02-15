<?php

namespace App\Http\Controllers;

use App\Models\Kurikulum;
use App\Models\MataPelajaran;
use App\Models\BobotNilai;
use App\Models\Krs;
use App\Models\Nilai;
use App\Models\Organisasi;
use App\Models\LaporanAkademik;
use App\Models\JenjangPengguna;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminKurikulumController extends Controller
{
    // ===== KURIKULUM CRUD =====
    public function kurikulumIndex()
    {
        $kurikulum = Kurikulum::withCount('mataPelajaran')
            ->orderByRaw("FIELD(jenjang, 'tk_paud','sd_mi','smp_mts','sma_ma','smk','d1','d2','d3','d4','s1','s2','s3','profesi','post_doktoral')")
            ->paginate(15);

        return view('admin.kurikulum.index', compact('kurikulum'));
    }

    public function kurikulumBuat()
    {
        $jenjangList = Kurikulum::JENJANG;
        return view('admin.kurikulum.form', compact('jenjangList'));
    }

    public function kurikulumSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|in:' . implode(',', array_keys(Kurikulum::JENJANG)),
            'deskripsi' => 'nullable|string',
            'durasi_tahun' => 'required|integer|min:1|max:10',
            'total_semester' => 'nullable|integer',
            'total_sks' => 'nullable|integer',
            'akreditasi' => 'nullable|string|max:10',
        ]);

        Kurikulum::create($request->all());

        return redirect()->route('admin.kurikulum.index')
            ->with('sukses', 'Kurikulum berhasil dibuat!');
    }

    public function kurikulumEdit(Kurikulum $kurikulum)
    {
        $jenjangList = Kurikulum::JENJANG;
        return view('admin.kurikulum.form', compact('kurikulum', 'jenjangList'));
    }

    public function kurikulumUpdate(Request $request, Kurikulum $kurikulum)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenjang' => 'required|in:' . implode(',', array_keys(Kurikulum::JENJANG)),
            'durasi_tahun' => 'required|integer|min:1|max:10',
        ]);

        $kurikulum->update($request->all());

        return redirect()->route('admin.kurikulum.index')
            ->with('sukses', 'Kurikulum berhasil diperbarui!');
    }

    public function kurikulumHapus(Kurikulum $kurikulum)
    {
        $kurikulum->delete();
        return redirect()->route('admin.kurikulum.index')
            ->with('sukses', 'Kurikulum berhasil dihapus!');
    }

    // ===== MATA PELAJARAN CRUD =====
    public function mataPelajaranIndex(Request $request)
    {
        $query = MataPelajaran::with('kurikulum');

        if ($request->kurikulum_id) {
            $query->where('kurikulum_id', $request->kurikulum_id);
        }

        $mataPelajaran = $query->orderBy('semester')->orderBy('kode')->paginate(20);
        $kurikulumList = Kurikulum::all();

        return view('admin.kurikulum.mata-pelajaran', compact('mataPelajaran', 'kurikulumList'));
    }

    public function mataPelajaranSimpan(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_pelajaran,kode',
            'nama' => 'required|string|max:255',
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'sks' => 'integer|min:0',
            'semester' => 'nullable|integer|min:1',
            'tipe' => 'required|in:wajib,pilihan,peminatan,prasyarat',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('admin.mata-pelajaran.index')
            ->with('sukses', 'Mata pelajaran berhasil ditambahkan!');
    }

    public function mataPelajaranHapus(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();
        return redirect()->route('admin.mata-pelajaran.index')
            ->with('sukses', 'Mata pelajaran berhasil dihapus!');
    }

    // ===== BOBOT NILAI CRUD =====
    public function bobotNilaiIndex(Request $request)
    {
        $kurikulumId = $request->kurikulum_id;
        $kurikulumList = Kurikulum::all();

        $bobotNilai = collect();
        if ($kurikulumId) {
            $bobotNilai = BobotNilai::where('kurikulum_id', $kurikulumId)
                ->orderByDesc('bobot')
                ->get();
        }

        return view('admin.kurikulum.bobot-nilai', compact('bobotNilai', 'kurikulumList', 'kurikulumId'));
    }

    public function bobotNilaiSimpan(Request $request)
    {
        $request->validate([
            'kurikulum_id' => 'required|exists:kurikulum,id',
            'huruf' => 'required|string|max:5',
            'bobot' => 'required|numeric|min:0|max:4',
            'batas_bawah' => 'required|integer|min:0|max:100',
            'batas_atas' => 'required|integer|min:0|max:100',
        ]);

        BobotNilai::create($request->all());

        return redirect()->route('admin.bobot-nilai.index', ['kurikulum_id' => $request->kurikulum_id])
            ->with('sukses', 'Bobot nilai berhasil ditambahkan!');
    }

    // ===== KRS MANAGEMENT (Admin approve/reject) =====
    public function krsIndex(Request $request)
    {
        $query = Krs::with(['pengguna', 'kurikulum']);

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $krsList = $query->latest()->paginate(20);

        return view('admin.kurikulum.krs', compact('krsList'));
    }

    public function krsSetujui(Krs $krs)
    {
        $krs->update([
            'status' => 'disetujui',
            'disetujui_oleh' => Auth::id(),
            'disetujui_pada' => now(),
        ]);

        return redirect()->back()->with('sukses', 'KRS berhasil disetujui!');
    }

    public function krsTolak(Request $request, Krs $krs)
    {
        $krs->update([
            'status' => 'ditolak',
            'catatan_pembimbing' => $request->catatan ?? 'Ditolak oleh admin.',
        ]);

        return redirect()->back()->with('sukses', 'KRS ditolak.');
    }

    // ===== NILAI MANAGEMENT =====
    public function nilaiIndex(Request $request)
    {
        $query = Nilai::with(['pengguna', 'mataPelajaran.kurikulum']);

        if ($request->kurikulum_id) {
            $query->whereHas('mataPelajaran', fn($q) => $q->where('kurikulum_id', $request->kurikulum_id));
        }

        $nilaiList = $query->latest()->paginate(20);
        $kurikulumList = Kurikulum::all();

        return view('admin.kurikulum.nilai', compact('nilaiList', 'kurikulumList'));
    }

    public function nilaiSimpan(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajaran,id',
            'tugas' => 'nullable|numeric|min:0|max:100',
            'uts' => 'nullable|numeric|min:0|max:100',
            'uas' => 'nullable|numeric|min:0|max:100',
            'praktik' => 'nullable|numeric|min:0|max:100',
            'partisipasi' => 'nullable|numeric|min:0|max:100',
        ]);

        $nilai = Nilai::updateOrCreate(
            [
                'user_id' => $request->user_id,
                'mata_pelajaran_id' => $request->mata_pelajaran_id,
            ],
            $request->only(['tugas', 'uts', 'uas', 'praktik', 'partisipasi'])
        );

        $nilai->hitungNilaiAkhir();

        return redirect()->route('admin.nilai.index')
            ->with('sukses', 'Nilai berhasil disimpan!');
    }

    // ===== ORGANISASI CRUD =====
    public function organisasiIndex()
    {
        $organisasi = Organisasi::orderBy('unggulan', 'desc')
            ->orderBy('nama')
            ->paginate(15);

        return view('admin.organisasi.index', compact('organisasi'));
    }

    public function organisasiBuat()
    {
        $tipeList = Organisasi::TIPE;
        $kategoriList = Organisasi::KATEGORI;
        return view('admin.organisasi.form', compact('tipeList', 'kategoriList'));
    }

    public function organisasiSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tipe' => 'required|in:' . implode(',', array_keys(Organisasi::TIPE)),
            'kategori' => 'required|in:' . implode(',', array_keys(Organisasi::KATEGORI)),
        ]);

        Organisasi::create($request->all());

        return redirect()->route('admin.organisasi.index')
            ->with('sukses', 'Organisasi berhasil dibuat!');
    }

    public function organisasiEdit(Organisasi $organisasi)
    {
        $tipeList = Organisasi::TIPE;
        $kategoriList = Organisasi::KATEGORI;
        return view('admin.organisasi.form', compact('organisasi', 'tipeList', 'kategoriList'));
    }

    public function organisasiUpdate(Request $request, Organisasi $organisasi)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $organisasi->update($request->all());

        return redirect()->route('admin.organisasi.index')
            ->with('sukses', 'Organisasi berhasil diperbarui!');
    }

    public function organisasiHapus(Organisasi $organisasi)
    {
        $organisasi->delete();
        return redirect()->route('admin.organisasi.index')
            ->with('sukses', 'Organisasi berhasil dihapus!');
    }

    // ===== LAPORAN AKADEMIK =====
    public function laporanIndex()
    {
        $laporan = LaporanAkademik::with(['kurikulum', 'pembuat'])
            ->latest()
            ->paginate(15);

        return view('admin.laporan-akademik.index', compact('laporan'));
    }

    public function laporanBuat()
    {
        $tipeList = LaporanAkademik::TIPE;
        $kurikulumList = Kurikulum::all();
        return view('admin.laporan-akademik.form', compact('tipeList', 'kurikulumList'));
    }

    public function laporanGenerate(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'tipe' => 'required|in:' . implode(',', array_keys(LaporanAkademik::TIPE)),
            'format' => 'required|in:excel,pdf,csv',
        ]);

        $data = [];

        switch ($request->tipe) {
            case 'rekap_nilai':
                $query = Nilai::with(['pengguna', 'mataPelajaran']);
                if ($request->kurikulum_id) {
                    $query->whereHas('mataPelajaran', fn($q) => $q->where('kurikulum_id', $request->kurikulum_id));
                }
                $data = $query->where('status', 'final')->get()->toArray();
                break;

            case 'statistik_kelulusan':
                $data = JenjangPengguna::with(['pengguna', 'kurikulum'])
                    ->where('status', 'lulus')
                    ->get()
                    ->toArray();
                break;

            case 'daftar_hadir':
                $data = \App\Models\Kehadiran::with('pengguna')
                    ->when($request->kurikulum_id, function ($q) use ($request) {
                        // Filter by kelas that belongs to kurikulum
                    })
                    ->latest('tanggal')
                    ->limit(500)
                    ->get()
                    ->toArray();
                break;

            default:
                $data = ['message' => 'Laporan custom - data akan digenerate sesuai kebutuhan'];
                break;
        }

        $laporan = LaporanAkademik::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'tipe' => $request->tipe,
            'kurikulum_id' => $request->kurikulum_id,
            'dibuat_oleh' => Auth::id(),
            'data' => $data,
            'format' => $request->format,
            'status' => 'selesai',
        ]);

        return redirect()->route('admin.laporan-akademik.index')
            ->with('sukses', 'Laporan berhasil digenerate! (' . count($data) . ' data)');
    }

    public function laporanTampilkan(LaporanAkademik $laporan)
    {
        return view('admin.laporan-akademik.tampilkan', compact('laporan'));
    }

    public function laporanExport(LaporanAkademik $laporan)
    {
        $data = $laporan->data ?? [];

        // Generate CSV
        $csvContent = '';
        if (!empty($data)) {
            $headers = array_keys(is_array($data[0]) ? $data[0] : (array)$data[0]);
            $csvContent .= implode(',', $headers) . "\n";
            foreach ($data as $row) {
                $values = array_map(function ($val) {
                    return '"' . str_replace('"', '""', is_array($val) ? json_encode($val) : (string)$val) . '"';
                }, is_array($row) ? $row : (array)$row);
                $csvContent .= implode(',', $values) . "\n";
            }
        }

        return response($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $laporan->judul . '.csv"',
        ]);
    }
}
