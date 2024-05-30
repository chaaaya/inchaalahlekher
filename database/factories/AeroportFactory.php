<?php

namespace Database\Factories;

use App\Models\Aeroport;
use Illuminate\Database\Eloquent\Factories\Factory;

class AeroportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aeroport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->unique()->city,
            'ville' => $this->faker->city,
            'pays' => $this->faker->country,
            'compagnies' => json_encode([$this->faker->company]),
        ];
    }
}
