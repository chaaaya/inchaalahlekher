<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('adresse');
            $table->string('ville');
            $table->string('pays');
            $table->string('image')->nullable();
            $table->string('lien')->nullable();
            $table->unsignedBigInteger('aeroport_id');
            $table->timestamps();

            // Clé étrangère vers la table 'aeroports'
            $table->foreign('aeroport_id')->references('id')->on('aeroports');
        });
    }

    /**
     * Revert la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
