<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Calon extends Model
{
    use HasFactory;

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
    ];

    protected $casts = [
        'tanggal_berangkat' => 'date',
    ];

    /**
     * Paket yang dipilih calon
     */
    public function packageKegiatan(): BelongsTo
    {
        return $this->belongsTo(
            PackageKegiatan::class,
            'package_kegiatan_id'
        );
    }

    /**
     * Data pendaftaran awal dari website
     */
    public function calonCadangan(): HasMany
    {
        return $this->hasMany(
            CalonCadangan::class,
            'calon_id'
        );
    }

    /**
     * Akun user/member yang terkait dengan calon
     */
    public function user(): HasOne
    {
        return $this->hasOne(
            User::class,
            'calon_id'
        );
    }

    /**
     * Keanggotaan calon dalam AGANDA
     */
    public function agandaGroupMembers(): HasMany
    {
        return $this->hasMany(
            AgandaGroupMember::class,
            'calon_id'
        );
    }
}