<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageKegiatan extends Model
{
    use HasFactory;

    protected $table = 'package_kegiatans';

    protected $fillable = [
        'slug',
        'nama_paket',
        'tanggal_berlangsung',
        'destinasi',
        'harga',
        'deposit',
        'kategori',
        'image',
        'durasi',
        'deskripsi',
        'rundown',
        'is_active',
    ];

    protected $casts = [
        'tanggal_berlangsung' => 'date',
        'is_active' => 'boolean',
    ];

    public function calons()
    {
        return $this->hasMany(Calon::class, 'package_kegiatan_id');
    }

    // accessor biar bisa pakai: $business->image_url
    public function getImageUrlAttribute(): string
    {
        if (empty($this->image)) {
            return asset('images/asiatur2.png');
        }

        // kalau sudah full URL
        if (preg_match('/^https?:\/\//', $this->image)) {
            return $this->image;
        }

        // kalau path dari public/uploads/...
        return asset($this->image);
    }
}
