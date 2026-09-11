<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AgandaGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_group',
        'owner_id',
        'package_kegiatan_id',
        'status',
    ];

    /**
     * Pemilik group AGANDA.
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Paket perjalanan yang digunakan group.
     */
    public function packageKegiatan(): BelongsTo
    {
        return $this->belongsTo(
            PackageKegiatan::class,
            'package_kegiatan_id'
        );
    }

    /**
     * Anggota yang terdaftar dalam group.
     */
    public function members(): HasMany
    {
        return $this->hasMany(
            AgandaGroupMember::class,
            'group_id'
        );
    }

    /**
     * Riwayat komisi group.
     */
    public function commissions(): HasMany
    {
        return $this->hasMany(
            AgandaCommission::class,
            'group_id'
        );
    }

    /**
     * Riwayat reward group.
     */
    public function rewards(): HasMany
    {
        return $this->hasMany(
            AgandaReward::class,
            'group_id'
        );
    }
}