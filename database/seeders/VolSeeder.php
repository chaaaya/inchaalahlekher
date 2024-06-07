<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vol;
use Illuminate\Support\Facades\DB;

class VolSeeder extends Seeder
{
    public function run()
    {
        // Désactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table 'vols'
        Vol::truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $vols = [
            [
                'numero_vol' => 'AF1234',
                'ville_depart' => 'Paris',
                'ville_arrivee' => 'New York',
                'heure_depart' => '2024-06-05 10:00:00',
                'heure_arrivee' => '2024-06-05 13:00:00',
                'compagnie' => 'Air France',
            ],
            [
                'numero_vol' => 'BA5678',
                'ville_depart' => 'London',
                'ville_arrivee' => 'Tokyo',
                'heure_depart' => '2024-06-05 12:00:00',
                'heure_arrivee' => '2024-06-06 08:00:00',
                'compagnie' => 'British Airways',
            ],
            [
                'numero_vol' => 'LH9101',
                'ville_depart' => 'Berlin',
                'ville_arrivee' => 'Dubai',
                'heure_depart' => '2024-06-06 14:00:00',
                'heure_arrivee' => '2024-06-06 22:00:00',
                'compagnie' => 'Lufthansa',
            ],
            [
                'numero_vol' => 'DL7890',
                'ville_depart' => 'Atlanta',
                'ville_arrivee' => 'Los Angeles',
                'heure_depart' => '2024-06-07 09:00:00',
                'heure_arrivee' => '2024-06-07 11:00:00',
                'compagnie' => 'Delta Airlines',
            ],
        ];

        foreach ($vols as $vol) {
            Vol::create($vol);
        }
    }
}
