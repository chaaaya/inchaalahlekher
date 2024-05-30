<?php
// database/factories/VolFactory.php

use App\Models\Vol;
use Illuminate\Database\Eloquent\Factories\Factory;

class VolFactory extends Factory
{
    protected $model = Vol::class;

    public function definition()
    {
        return [
            'numero_vol' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'heure_depart' => $this->faker->dateTimeBetween('now', '+1 month'),
            'heure_arrivee' => $this->faker->dateTimeBetween('+1 month', '+2 months'),
            // Ajoutez d'autres champs selon votre besoin
        ];
    }
}
