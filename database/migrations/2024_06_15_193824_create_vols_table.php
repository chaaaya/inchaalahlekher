<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vols', function (Blueprint $table) {
            $table->id();
            $table->string('numero_vol');
            $table->string('ville_depart');
            $table->string('ville_arrivee');
            $table->dateTime('heure_depart');
            $table->dateTime('heure_arrivee');
            $table->unsignedBigInteger('compagnie_id');
            $table->foreign('compagnie_id')->references('id')->on('compagnies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vols');
    }
}
