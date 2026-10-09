<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        $name = fake()->name();

        return [
            'member_id' => 'AGD-' . strtoupper(fake()->unique()->bothify('########')),
            'name' => $name,
            'email' => fake()->unique()->safeEmail(),
            'avatar' => null,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password123'),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'role' => 'member',
            'parent_id' => null,
            'remember_token' => Str::random(10),
        ];
    }

    public function karyawan(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'karyawan',
            'parent_id' => null,
        ]);
    }

    public function memberDiBawah(int $parentId): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'member',
            'parent_id' => $parentId,
        ]);
    }
}
