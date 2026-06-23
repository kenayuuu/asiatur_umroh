<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'image',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

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
