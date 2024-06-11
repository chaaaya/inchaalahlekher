<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResposTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('respos')->insert([
            'name' => 'Jane Doe',
            'email' => 'jane.doe@example.com',
            'password' => bcrypt('password'),
            'numero_telephone' => '987654321',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
