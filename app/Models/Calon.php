<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function packageKegiatan()
    {
        return $this->belongsTo(PackageKegiatan::class, 'package_kegiatan_id');
    }
}
