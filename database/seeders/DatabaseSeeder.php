<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PackageKegiatanSeeder::class,
            CalonSeeder::class,
            KunjunganSeeder::class,
            BusinessSeeder::class,
            UserSeeder::class,
        ]);
    }
}
