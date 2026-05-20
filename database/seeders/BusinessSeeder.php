<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('businesses')->insert([
            [
                'judul' => 'Rental Mobil',
                'deskripsi' => 'Layanan rental mobil untuk perjalanan wisata dan umroh.',
                'image' => 'rental_mobil.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Hotel Syariah',
                'deskripsi' => 'Penginapan nyaman dan aman untuk jamaah.',
                'image' => 'hotel_syariah.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
