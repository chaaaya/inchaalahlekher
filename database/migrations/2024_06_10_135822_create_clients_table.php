<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('numero_telephone');
            $table->string('status')->default('pending');
            $table->string('subscription')->nullable();
            $table->timestamps();
        });

        // Insertion de données initiales
        DB::table('clients')->insert([
            'name' => 'Nom du client',
            'email' => 'client@example.com',
            'password' => bcrypt('motdepasse'),
            'numero_telephone' => '1234567890',
            'status' => 'pending',
            'subscription' => 'Plan standard',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('clients');
    }
}