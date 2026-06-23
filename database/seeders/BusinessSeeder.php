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
                'judul' => 'Jagung Pakan Ternak',
                'deskripsi' => 'Penjualan jagung sebagai pakan ternak berkualitas tinggi.',
                'image' => 'images/pakan ternak.png',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
