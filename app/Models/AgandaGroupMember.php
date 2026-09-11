<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgandaGroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'calon_id',
        'registered_by',
        'status',
    ];

    /**
     * Group tempat calon terdaftar.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(
            AgandaGroup::class,
            'group_id'
        );
    }

    /**
     * Data calon jamaah.
     */
    public function calon(): BelongsTo
    {
        return $this->belongsTo(
            Calon::class,
            'calon_id'
        );
    }

    /**
     * User yang mendaftarkan calon.
     */
    public function registeredBy(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'registered_by'
        );
    }
}