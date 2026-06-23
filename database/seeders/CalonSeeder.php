<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Calon;

class CalonSeeder extends Seeder
{
    public function run(): void
    {
        Calon::factory()->count(20)->create();
    }
}
