<?php

namespace Database\Factories;

use App\Models\PackageKegiatan;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalonFactory extends Factory
{
    public function definition(): array
    {
        $faker = FakerFactory::create('id_ID');

        return [
            'nama_lengkap' => $faker->name(),

            'umur' => $faker->numberBetween(20, 60),

            'alamat' => $faker->address(),

            'no_paspor' => strtoupper(
                $faker->bothify('??#######')
            ),

            'no_kk' => $faker->numerify('################'),

            'no_ktp' => $faker->numerify('################'),

            'akta_kelahiran' => 'akta.pdf',

            'no_telepon' => $faker->phoneNumber(),

            'email' => $faker->unique()->safeEmail(),

            'jenis_perjalanan' => $faker->randomElement([
                'wisata',
                'umroh',
                'haji',
            ]),

            'tanggal_berangkat' => $faker->dateTimeBetween(
                'now',
                '+1 year'
            ),

            'package_kegiatan_id' => PackageKegiatan::inRandomOrder()
                ->value('id'),

            'catatan' => $faker->sentence(),

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}