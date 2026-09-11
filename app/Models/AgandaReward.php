<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AgandaReward extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
        'amount',
        'type',
        'status',
    ];

    protected $casts = [
        'amount' => 'integer',
    ];

    /**
     * Group yang menghasilkan reward.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(
            AgandaGroup::class,
            'group_id'
        );
    }

    /**
     * User yang menerima reward.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'user_id'
        );
    }
}