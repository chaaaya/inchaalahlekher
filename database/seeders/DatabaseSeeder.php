<?php

namespace Database\Seeders;

use App\Models\aeroport;
use App\Models\compagnie;
use App\Models\reservation;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Utilisation de la factory UserFactory pour créer 5 utilisateurs
        User::factory()->count(5)->create();
        aeroport::factory()->count(5)->create();
        compagnie::factory()->count(5)->create();
        reservation::factory()->count(5)->create();

        // Appel des seeders supplémentaires
        $this->call([
            VolSeeder::class,
            OffersTableSeeder::class,
            UserSeeder::class,
            AeroportSeeder::class,
            CompagnieSeeder::class,
            ReservationsTableSeeder::class,
            LocationSeeder::class,
            HotelSeeder::class,
        ]);
    }
}
