<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            // ADMIN
            [
                'name' => 'Administrator',
                'email' => 'admin@asiatur.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin123'),
                'phone' => '081234567890',
                'address' => 'Batam, Kepulauan Riau',
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // USER 1
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'phone' => '081111111111',
                'address' => 'Padang, Sumatera Barat',
                'role' => 'user',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // USER 2
            [
                'name' => 'Siti Nurhaliza',
                'email' => 'siti@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'phone' => '082222222222',
                'address' => 'Batam, Kepulauan Riau',
                'role' => 'user',
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
