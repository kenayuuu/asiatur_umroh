<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalonSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('calons')->insert([
            [
                'nama_lengkap' => 'Ahmad Fauzi',
                'umur' => 30,
                'alamat' => 'Padang, Sumatera Barat',
                'no_paspor' => 'A1234567',
                'no_kk' => '1371010101010001',
                'no_ktp' => '1371010101010001',
                'akta_kelahiran' => 'akta_ahmad.pdf',
                'no_telepon' => '081234567890',
                'email' => 'ahmad@gmail.com',
                'jenis_perjalanan' => 'umroh',
                'tanggal_berangkat' => '2026-03-10',
                'package_kegiatan_id' => 2,
                'catatan' => 'Sudah melunasi deposit.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'nama_lengkap' => 'Siti Nurhaliza',
                'umur' => 27,
                'alamat' => 'Batam, Kepulauan Riau',
                'no_paspor' => 'B7654321',
                'no_kk' => '2171010101010002',
                'no_ktp' => '2171010101010002',
                'akta_kelahiran' => 'akta_siti.pdf',
                'no_telepon' => '082345678901',
                'email' => 'siti@gmail.com',
                'jenis_perjalanan' => 'wisata',
                'tanggal_berangkat' => '2026-06-15',
                'package_kegiatan_id' => 1,
                'catatan' => 'Request kamar hotel dekat pantai.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
