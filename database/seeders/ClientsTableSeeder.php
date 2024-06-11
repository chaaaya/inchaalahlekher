<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   // database/seeders/ClientsTableSeeder.php
public function run()
{
    Client::create([
        'name' => 'Nom du client',
        'email' => 'client@example.com',
        'password' => bcrypt('password'),
        'numero_telephone' => '0123456789',
        'subscription' => 'basic',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Ajoutez d'autres données si nécessaire
}

}
