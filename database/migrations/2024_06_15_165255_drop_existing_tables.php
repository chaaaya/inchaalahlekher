<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class DropExistingTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
    
        Schema::dropIfExists('aeroports');
        Schema::dropIfExists('compagnies');
        Schema::dropIfExists('aeroports_compagnies');
    
        Schema::enableForeignKeyConstraints();
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Vous pouvez inverser la suppression si nécessaire
        Schema::create('aeroports', function ($table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('ville');
            $table->string('pays');
            $table->timestamps();
        });

        Schema::create('compagnies', function ($table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('pays');
            $table->timestamps();
        });

        Schema::create('aeroports_compagnies', function ($table) {
            $table->bigInteger('aeroport_id')->unsigned();
            $table->integer('compagnie_id')->unsigned();
            $table->primary(['aeroport_id', 'compagnie_id']);
            $table->foreign('aeroport_id')->references('id')->on('aeroports')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('compagnie_id')->references('id')->on('compagnies')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }
}
