<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    public function run()
    {
        DB::table('locations')->insert([
            ['name' => 'Paris'],
            ['name' => 'Londres'],
            ['name' => 'New York'],
            ['name' => 'Tokyo'],
        ]);
    }
}
