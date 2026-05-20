<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KunjunganSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kunjungans')->insert([
            [
                'tempat' => 'Masjid Raya Sumbar',
                'pimpinan' => 'Ustadz Rahman',
                'no_hp' => '081111111111',
                'tanggal' => '2026-02-12',
                'keterangan' => 'Sosialisasi program umroh.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'tempat' => 'Kantor Travel Batam',
                'pimpinan' => 'Bapak Hendra',
                'no_hp' => '082222222222',
                'tanggal' => '2026-04-20',
                'keterangan' => 'Kerja sama paket wisata.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
