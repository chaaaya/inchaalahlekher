<?php

namespace Database\Seeders;

use App\Models\Aeroport;
use Illuminate\Database\Seeder;

class AeroportSeeder extends Seeder
{
    public function run()
    {
        Aeroport::factory()->count(10)->create();
    }
}
