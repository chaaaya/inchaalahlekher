<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OffersTableSeeder extends Seeder
{
    public function run()
    {
        Offer::factory()->count(50)->create();
    }
}
