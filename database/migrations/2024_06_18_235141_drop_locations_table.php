<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropLocationsTable extends Migration
{
    /**
     * Exécute la migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('locations');
    }

    /**
     * Revert la migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modèle');
            $table->string('type');
            $table->integer('année');
            $table->string('couleur');
            $table->string('image')->nullable();
            $table->decimal('prix_par_jour', 10, 2);
            $table->boolean('disponible')->default(true);
            $table->timestamps();
            $table->unsignedBigInteger('aeroport_id');
            // Définir la clé étrangère si nécessaire
            // $table->foreign('aeroport_id')->references('id')->on('aeroports')->onDelete('cascade');
        });
    }
}
