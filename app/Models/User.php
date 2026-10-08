<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyEmailTrait;
    protected $fillable = [
        'member_id',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'parent_id',
        'email_verified_at',
        'otp_code',
        'otp_expires_at',
        'is_admin_created',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'is_admin_created' => 'boolean',
        'password' => 'hashed', // otomatis hash password di Laravel 10+
    ];

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isKaryawan(): bool
    {
        return $this->role === 'karyawan';
    }

    public function isMember(): bool
    {
        return $this->role === 'member';
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(User::class, 'parent_id');
    }

    public function agandaGroups(): HasMany
    {
        return $this->hasMany(AgandaGroup::class, 'owner_id');
    }

    public function calon(): BelongsTo
    {
        return $this->belongsTo(
            Calon::class,
            'calon_id'
        );
    }

    protected static function booted(): void
    {
        static::creating(function (User $user) {
            if (empty($user->member_id)) {
                $nextId = (User::max('id') ?? 0) + 1;

                $user->member_id = 'AGD-' . str_pad(
                    $nextId,
                    6,
                    '0',
                    STR_PAD_LEFT
                );
            }
        });
    }
}
