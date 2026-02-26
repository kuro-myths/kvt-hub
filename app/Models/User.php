<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @method \Illuminate\Database\Eloquent\Relations\BelongsToMany kelasYangDiikuti()
 * @method \Illuminate\Database\Eloquent\Relations\HasMany kelasYangDiajar()
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // All available roles
    public const PERAN_ADMIN = 'admin';
    public const PERAN_STAFF = 'staff';
    public const PERAN_PENGAJAR = 'pengajar'; // Guru / Tenaga Pengajar
    public const PERAN_SISWA = 'siswa';
    public const PERAN_MAHASISWA = 'mahasiswa';
    public const PERAN_ORANG_TUA = 'orang_tua';
    public const PERAN_PENGUNJUNG = 'pengunjung';

    public const SEMUA_PERAN = [
        self::PERAN_ADMIN,
        self::PERAN_STAFF,
        self::PERAN_PENGAJAR,
        self::PERAN_SISWA,
        self::PERAN_MAHASISWA,
        self::PERAN_ORANG_TUA,
        self::PERAN_PENGUNJUNG,
    ];

    // Roles that can self-register
    public const PERAN_DAFTAR_MANDIRI = [
        self::PERAN_SISWA,
        self::PERAN_MAHASISWA,
        self::PERAN_ORANG_TUA,
        self::PERAN_PENGUNJUNG,
    ];

    // Roles that need admin to create
    public const PERAN_DIBUAT_ADMIN = [
        self::PERAN_ADMIN,
        self::PERAN_STAFF,
    ];

    // Verification statuses
    public const STATUS_PENDING = 'pending';
    public const STATUS_TERVERIFIKASI = 'terverifikasi';
    public const STATUS_DITOLAK = 'ditolak';

    protected $fillable = [
        'name',
        'email',
        'password',
        'peran',
        'avatar',
        'provider',
        'provider_id',
        'level',
        'xp',
        'xp_total',
        'kelas',
        'bio',
        'aktif',
        'terakhir_login',
        'no_hp',
        'provinsi',
        'kota_kabupaten',
        'asal_instansi',
        'status_verifikasi',
        'verified_at',
        'verified_by',
        'catatan_verifikasi',
        'dokumen_identitas',
        'dokumen_cv',
        'dokumen_ijazah',
        'dokumen_sertifikat',
        'dibuat_oleh_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'terakhir_login' => 'datetime',
            'verified_at' => 'datetime',
            'password' => 'hashed',
            'aktif' => 'boolean',
            'dibuat_oleh_admin' => 'boolean',
        ];
    }

    // === Role Checks ===
    public function adalahAdmin(): bool
    {
        return $this->peran === self::PERAN_ADMIN;
    }

    public function adalahPengajar(): bool
    {
        return $this->peran === self::PERAN_PENGAJAR;
    }

    public function adalahStaff(): bool
    {
        return $this->peran === self::PERAN_STAFF;
    }

    public function adalahSiswa(): bool
    {
        return $this->peran === self::PERAN_SISWA;
    }

    public function adalahMahasiswa(): bool
    {
        return $this->peran === self::PERAN_MAHASISWA;
    }

    public function adalahOrangTua(): bool
    {
        return $this->peran === self::PERAN_ORANG_TUA;
    }

    public function adalahPengunjung(): bool
    {
        return $this->peran === self::PERAN_PENGUNJUNG;
    }

    // Backward compat aliases
    public function adalahPengguna(): bool
    {
        return in_array($this->peran, [self::PERAN_SISWA, self::PERAN_MAHASISWA, self::PERAN_ORANG_TUA, self::PERAN_PENGUNJUNG]);
    }

    public function adalahTim(): bool
    {
        return in_array($this->peran, [self::PERAN_PENGAJAR, self::PERAN_STAFF]);
    }

    public function adalahGuru(): bool
    {
        return $this->adalahPengajar();
    }

    // === Verification Checks ===
    public function sudahTerverifikasi(): bool
    {
        return $this->status_verifikasi === self::STATUS_TERVERIFIKASI;
    }

    public function sedangMenungguVerifikasi(): bool
    {
        return $this->status_verifikasi === self::STATUS_PENDING;
    }

    public function verifikasiDitolak(): bool
    {
        return $this->status_verifikasi === self::STATUS_DITOLAK;
    }

    public function butuhVerifikasi(): bool
    {
        return in_array($this->peran, [self::PERAN_SISWA, self::PERAN_MAHASISWA, self::PERAN_ORANG_TUA]);
    }

    public function bisaAksesFitur(): bool
    {
        // Pengunjung & admin/staff/pengajar dibuat admin → langsung aktif
        if ($this->peran === self::PERAN_PENGUNJUNG || $this->dibuat_oleh_admin) {
            return true;
        }
        return $this->sudahTerverifikasi();
    }

    // === Verification Relationship ===
    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    // === Relationships ===
    public function kelasYangDiajar()
    {
        return $this->hasMany(Kelas::class, 'guru_id');
    }

    public function kelasYangDiikuti()
    {
        return $this->belongsToMany(Kelas::class, 'kelas_anggota')
            ->withPivot('status')
            ->withTimestamps();
    }

    public function materiProgres()
    {
        return $this->hasMany(MateriProgres::class);
    }

    public function kuisHasil()
    {
        return $this->hasMany(KuisHasil::class);
    }

    public function pencapaian()
    {
        return $this->belongsToMany(Pencapaian::class, 'pencapaian_pengguna')
            ->withPivot('diraih_pada')
            ->withTimestamps();
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class);
    }

    public function langganan()
    {
        return $this->hasMany(Langganan::class);
    }

    // === New Relationships (KRS, Kurikulum, Organisasi) ===
    public function krs()
    {
        return $this->hasMany(Krs::class);
    }

    public function jenjangAktif()
    {
        return $this->hasMany(JenjangPengguna::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function organisasi()
    {
        return $this->belongsToMany(Organisasi::class, 'organisasi_anggota')
            ->withPivot('jabatan', 'bergabung_pada', 'berakhir_pada', 'aktif')
            ->withTimestamps();
    }

    public function anakDidik()
    {
        return $this->hasMany(JenjangPengguna::class, 'wali_user_id');
    }

    // === Chat Sessions (Chatbot) ===
    public function chatSessions()
    {
        return $this->hasMany(ChatSession::class);
    }

    // XP & Level System
    public function tambahXP(int $jumlah): void
    {
        $this->xp += $jumlah;
        $this->xp_total += $jumlah;

        // Hitung level baru (max 100)
        $levelBaru = min(100, floor($this->xp_total / 100) + 1);
        $this->level = $levelBaru;

        $this->save();
    }

    public function xpUntukLevelBerikutnya(): int
    {
        if ($this->level >= 100) return 0;
        return ($this->level * 100) - $this->xp_total;
    }

    public function persenLevel(): float
    {
        if ($this->level >= 100) return 100;
        $xpLevel = ($this->level - 1) * 100;
        $xpDiLevel = $this->xp_total - $xpLevel;
        return min(100, ($xpDiLevel / 100) * 100);
    }

    public function getRangString(): string
    {
        return match (true) {
            $this->level >= 90 => 'Grandmaster',
            $this->level >= 80 => 'Master',
            $this->level >= 70 => 'Diamond',
            $this->level >= 60 => 'Platinum',
            $this->level >= 50 => 'Gold',
            $this->level >= 40 => 'Silver',
            $this->level >= 30 => 'Bronze',
            $this->level >= 20 => 'Iron',
            $this->level >= 10 => 'Apprentice',
            default => 'Novice',
        };
    }
}
