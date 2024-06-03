<?php
// database/seeders/OfferSeeder.php
// database/seeders/OfferSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    public function run()
    {
        Offer::create([
            'title' => 'Offre Spéciale Été',
            'description' => 'Profitez de notre offre spéciale pour l\'été avec des réductions incroyables sur tous les vols.',
            'price' => 199.99,
        ]);

        Offer::create([
            'title' => 'Offre Hiver',
            'description' => 'Voyagez en hiver avec des réductions sur les vols vers les destinations enneigées.',
            'price' => 149.99,
        ]);
    }
}
