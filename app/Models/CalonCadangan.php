<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CalonCadangan extends Model
{
    use HasFactory;

    protected $table = 'calon_cadangan';

    protected $fillable = [
        'nama_lengkap',
        'umur',
        'alamat',
        'no_paspor',
        'no_kk',
        'no_ktp',
        'akta_kelahiran',
        'no_telepon',
        'email',
        'jenis_perjalanan',
        'tanggal_berangkat',
        'package_kegiatan_id',
        'catatan',
        'registered_by',
        'calon_id',
        'status',
    ];

    protected $casts = [
        'tanggal_berangkat' => 'date',
    ];

    /**
     * Paket yang dipilih
     */
    public function packageKegiatan(): BelongsTo
    {
        return $this->belongsTo(
            PackageKegiatan::class,
            'package_kegiatan_id'
        );
    }

    /**
     * User yang mendaftarkan
     */
    public function registeredBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'registered_by'
        );
    }

    /**
     * Data calon utama
     */
    public function calon(): BelongsTo
    {
        return $this->belongsTo(
            Calon::class,
            'calon_id'
        );
    }
}