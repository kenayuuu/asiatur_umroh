<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PackageKegiatanSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('package_kegiatans')->insert([
            [
                'slug' => Str::slug('paket-umroh-ramadhan'),
                'nama_paket' => 'Paket Umroh Full Ramadhan',
                'tanggal_berlangsung' => null,
                'destinasi' => 'Mekkah & Madinah',
                'harga' => 35000000,
                'deposit' => 10000000,
                'kategori' => 'umroh',
                'image' => 'uploads/packages/1781920027_6a35f11b3acc2.jpeg',
                'durasi' => '35 Hari',
                'deskripsi' => 'Ibadah Lebih Khusyuk Di Bulan Suci Bersama ASIATUR.
Berikut syarat-syarat untuk calom jamaah umroh ASIATUR :
1. Nama Lengkap
2. Umur
3. Alamat
4. No. Paspor
5. No KK
6. No KTP
7. Akta Kelahiran
8. No Telepon / Email',
                'rundown' => 'Rundown akan dibahas pada manasik.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'slug' => Str::slug('paket-haji-plus'),
                'nama_paket' => 'Paket Umroh Plus Turki',
                'tanggal_berlangsung' => null,
                'destinasi' => 'Mekkah, Madinah, Turki, Kuala Lumpur',
                'harga' => 38000000,
                'deposit' => 15000000,
                'kategori' => 'umroh',
                'image' => 'uploads/packages/1781920039_6a35f1276a41f.jpeg',
                'durasi' => '14 Hari',
                'deskripsi' => 'Kapan Lagi Pulang Umroh Mampir di Turki?
Yuk, Daftar Sekarang!

Berikut syarat-syarat untuk calon jamaah umroh ASIATUR :
1. Nama Lengkap
2. Umur
3. Alamat
4. No. Paspor
5. No KK
6. No KTP
7. Akta Kelahiran
8. No Telepon / Email',
                'rundown' => 'Rundown akan dibahas pada manasik.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
