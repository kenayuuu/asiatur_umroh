<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgandaCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
        'calon_id',
        'amount',
        'status',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];


    /**
     * Group yang menghasilkan komisi.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(
            AgandaGroup::class,
            'group_id'
        );
    }

    /**
     * User yang menerima komisi.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }

    /**
     * Calon jamaah yang menghasilkan komisi.
     */
    public function calon(): BelongsTo
    {
        return $this->belongsTo(
            Calon::class,
            'calon_id'
        );
    }
}