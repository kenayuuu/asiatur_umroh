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
                'slug' => Str::slug('Paket Wisata Bali 2026'),
                'nama_paket' => 'Paket Wisata Bali 2026',
                'tanggal_berlangsung' => '2026-06-15',
                'destinasi' => 'Bali',
                'harga' => 3500000,
                'deposit' => 1000000,
                'kategori' => 'wisata',
                'image' => 'images/bali.jpg',
                'durasi' => '4 Hari 3 Malam',
                'deskripsi' => 'Liburan wisata ke Bali lengkap dengan hotel dan transportasi.',
                'rundown' => 'Hari 1 keberangkatan, Hari 2 tour Bali, Hari 3 belanja, Hari 4 pulang.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'slug' => Str::slug('Paket Umroh Ramadhan'),
                'nama_paket' => 'Paket Umroh Ramadhan',
                'tanggal_berlangsung' => '2026-03-10',
                'destinasi' => 'Mekkah & Madinah',
                'harga' => 35000000,
                'deposit' => 10000000,
                'kategori' => 'umroh',
                'image' => 'images/ramadhan.png',
                'durasi' => '12 Hari',
                'deskripsi' => 'Paket umroh spesial bulan Ramadhan.',
                'rundown' => 'Keberangkatan, ibadah umroh, city tour, kepulangan.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'slug' => Str::slug('Paket Haji Plus'),
                'nama_paket' => 'Paket Haji Plus',
                'tanggal_berlangsung' => '2026-05-20',
                'destinasi' => 'Arab Saudi',
                'harga' => 120000000,
                'deposit' => 30000000,
                'kategori' => 'haji',
                'image' => 'haji.jpg',
                'durasi' => '30 Hari',
                'deskripsi' => 'Program haji plus dengan fasilitas premium.',
                'rundown' => 'Manasik, keberangkatan, pelaksanaan haji, kepulangan.',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
