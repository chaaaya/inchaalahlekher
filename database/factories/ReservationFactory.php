<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    protected $model = Reservation::class;

    public function definition()
    {
        return [
            'nom_passager' => $this->faker->name,
            'email_passager' => $this->faker->unique()->safeEmail,
            'numero_billet' => $this->faker->regexify('[A-Za-z0-9]{8}'),
            'date_reservation' => $this->faker->date,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
