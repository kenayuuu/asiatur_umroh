<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'nikena608@gmail.com',
            'password' => Hash::make('admin123'),
            'phone' => '081234567890',
            'address' => 'Batam, Kepulauan Riau',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // KARYAWAN
        User::create([
            'name' => 'Ahmad Fauzi',
            'email' => 'kenayuuu03@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '081111111111',
            'address' => 'Padang, Sumatera Barat',
            'role' => 'karyawan',
            'email_verified_at' => now(),
        ]);

        // MEMBER
        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti@gmail.com',
            'password' => Hash::make('password'),
            'phone' => '082222222222',
            'address' => 'Batam, Kepulauan Riau',
            'role' => 'member',
            'email_verified_at' => now(),
        ]);

        $this->command->info('✅ UserSeeder berhasil dijalankan!');
        $this->command->info('Admin    : nikena608@gmail.com / admin123');
        $this->command->info('Karyawan : kenayuuu03@gmail.com / password');
        $this->command->info('Member   : siti@gmail.com / password');
    }
}