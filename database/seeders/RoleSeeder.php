<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Admin
        User::firstOrCreate(
            ['email' => 'admin@asiatur.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('12345678'),
                'phone' => '08111111111',
                'address' => 'Jl. Admin No.1, Padang',
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // Tambahan beberapa user untuk testing
        $usersData = [
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@example.com',
                'phone' => '08123456789',
                'address' => 'Jl. Merdeka No.10, Padang',
            ]
        ];

        foreach ($usersData as $data) {
            User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'name' => $data['name'],
                    'password' => Hash::make('password123'),
                    'phone' => $data['phone'],
                    'address' => $data['address'],
                    'role' => 'user',
                    'email_verified_at' => now(),
                ]
            );
        }

        $this->command->info('✅ RoleSeeder berhasil dijalankan!');
        $this->command->info('📧 Login menggunakan password: password123');
        $this->command->info('');
        $this->command->info('Admin : admin@asiatur.com');
        $this->command->info('User  : user@asiatur.com');
    }
}
