<?php

namespace Database\Seeders;

use App\Models\Calon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KaryawanMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $karyawan = User::updateOrCreate(
                ['email' => 'karyawan.seed@aganda.test'],
                [
                    'member_id' => 'AGD-KRY-001',
                    'name' => 'Karyawan Seeder',
                    'avatar' => null,
                    'email_verified_at' => now(),
                    'password' => Hash::make('password123'),
                    'phone' => '081234567801',
                    'address' => 'Padang, Sumatera Barat',
                    'role' => 'karyawan',
                    'parent_id' => null,
                ]
            );

            $paketExists = DB::table('package_kegiatans')
                ->where('id', 2)
                ->exists();

            if (!$paketExists) {
                throw new \RuntimeException(
                    'Paket kegiatan dengan ID 2 tidak ditemukan.'
                );
            }

            for ($i = 1; $i <= 20; $i++) {
                $number = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
                $email = "member{$number}.seed@aganda.test";
                $name = "Member {$i}";
                $phone = '08123456' . str_pad(
                    (string) ($i + 100),
                    4,
                    '0',
                    STR_PAD_LEFT
                );

                User::updateOrCreate(
                    ['email' => $email],
                    [
                        'member_id' => "AGD-MBR-{$number}",
                        'name' => $name,
                        'avatar' => null,
                        'email_verified_at' => now(),
                        'password' => Hash::make('password123'),
                        'phone' => $phone,
                        'address' => 'Padang, Sumatera Barat',
                        'role' => 'member',
                        'parent_id' => $karyawan->id,
                    ]
                );

                Calon::updateOrCreate(
                    ['email' => $email],
                    [
                        'nama_lengkap' => $name,
                        'alamat' => 'Padang, Sumatera Barat',
                        'no_telepon' => $phone,
                        'jenis_perjalanan' => 'umroh',
                        'package_kegiatan_id' => 2,
                    ]
                );
            }
        });
    }
}
