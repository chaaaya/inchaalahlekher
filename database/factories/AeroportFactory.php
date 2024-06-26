<?php

namespace Database\Factories;

use App\Models\Aeroport;
use Illuminate\Database\Eloquent\Factories\Factory;

class AeroportFactory extends Factory
{
    /**
     * Le modèle correspondant à la factory.
     *
     * @var string
     */
    protected $model = Aeroport::class;

    /**
     * Définir l'état par défaut du modèle.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->company,
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'compagnies' => $this->faker->sentence(3),
        ];
    }
}
