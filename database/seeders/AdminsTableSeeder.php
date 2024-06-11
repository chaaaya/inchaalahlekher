<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Admin Doe',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Ajoutez d'autres enregistrements si nécessaire
    }
}
