<?php

namespace Database\Factories;

use App\Models\PackageKegiatan;
use Illuminate\Database\Eloquent\Factories\Factory;


class CalonFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_lengkap' => fake()->name(),

            'umur' => fake()->numberBetween(20, 60),

            'alamat' => fake()->address(),

            'no_paspor' => strtoupper(fake()->bothify('??#######')),

            'no_kk' => fake()->numerify('################'),

            'no_ktp' => fake()->numerify('################'),

            'akta_kelahiran' => 'akta.pdf',

            'no_telepon' => fake()->phoneNumber(),

            'email' => fake()->unique()->safeEmail(),

            'jenis_perjalanan' => fake()->randomElement([
                'wisata',
                'umroh',
                'haji'
            ]),

            'tanggal_berangkat' => fake()->dateTimeBetween(
                'now',
                '+1 year'
            ),

            // sesuaikan dengan id package yang ada
            'package_kegiatan_id' => PackageKegiatan::inRandomOrder()->value('id'),

            'catatan' => fake()->sentence(),

            'created_at' => now(),

            'updated_at' => now(),
        ];
    }
}
