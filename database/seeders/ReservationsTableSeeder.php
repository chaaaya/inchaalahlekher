<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\reservation;

class ReservationsTableSeeder extends Seeder
{
    public function run()
    {
        reservation::factory()->count(50)->create();
    }
}
