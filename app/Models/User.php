<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, MustVerifyEmailTrait;

    /**
     * Kolom yang boleh diisi mass assignment
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'email_verified_at',
        'otp_code',
        'otp_expires_at',
        'is_admin_created',
    ];

    /**
     * Kolom yang disembunyikan saat di-serialize
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'otp_expires_at' => 'datetime',
        'is_admin_created' => 'boolean',
        'password' => 'hashed', // otomatis hash password di Laravel 10+
    ];

    /**
     * Default attribute
     */
    protected $attributes = [
        'role' => 'pelanggan',
    ];

    /**
     * Cek apakah user adalah pelanggan
     */
    public function isPelanggan(): bool
    {
        return $this->role === 'pelanggan';
    }

    /**
     * Cek apakah user adalah admin konten
     */
    public function isAdminKonten(): bool
    {
        return $this->role === 'admin_konten';
    }

    /**
     * Cek apakah user adalah admin operasional
     */
    public function isAdminOperasional(): bool
    {
        return $this->role === 'admin_operasional';
    }

    /**
     * Cek apakah user adalah pimpinan
     */
    public function isPimpinan(): bool
    {
        return $this->role === 'pimpinan';
    }

    /**
     * Cek apakah user adalah super admin
     */
    public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    /**
     * Cek apakah user adalah admin.
     */
    public function isAdmin(): bool
    {
        return in_array($this->role, ['admin', 'admin_konten', 'admin_operasional', 'pimpinan', 'super_admin']);
    }

    /**
     * Cek apakah user adalah visitor.
     */
    public function isVisitor(): bool
    {
        return $this->role === 'user';
    }

    /**
     * Cek apakah user memiliki akses ke konten (admin konten atau super admin)
     */
    public function canManageContent(): bool
    {
        return in_array($this->role, ['admin_konten', 'super_admin']);
    }

    /**
     * Cek apakah user memiliki akses ke operasional (admin operasional atau super admin)
     */
    public function canManageOperational(): bool
    {
        return in_array($this->role, ['admin_operasional', 'super_admin']);
    }

    /**
     * Cek apakah user memiliki akses ke laporan (pimpinan atau super admin)
     */
    public function canViewReports(): bool
    {
        return in_array($this->role, ['pimpinan', 'super_admin']);
    }

    /**
     * Cek apakah user dapat mengelola pengguna (super admin saja)
     */
    public function canManageUsers(): bool
    {
        return $this->role === 'super_admin';
    }
}
