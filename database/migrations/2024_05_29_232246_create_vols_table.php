<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('numero_vol')->unique();
            $table->dateTime('heure_depart');
            $table->dateTime('heure_arrivee');
            // Ajoutez d'autres colonnes nécessaires pour votre table vol
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vols');
    }
}

