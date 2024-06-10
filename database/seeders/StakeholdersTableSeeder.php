<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Stakeholder;

class StakeholdersTableSeeder extends Seeder
{
    public function run()
    {
        // Création de quelques exemples de stakeholders
        Stakeholder::create([
            'name' => 'John Doe',
            'role' => 'Manager',
            'email' => 'john.doe@example.com',
        ]);

        Stakeholder::create([
            'name' => 'Jane Smith',
            'role' => 'Coordinator',
            'email' => 'jane.smith@example.com',
        ]);

        Stakeholder::create([
            'name' => 'Michael Johnson',
            'role' => 'Analyst',
            'email' => 'michael.johnson@example.com',
        ]);

        // Vous pouvez ajouter d'autres stakeholders selon vos besoins
    }
}
