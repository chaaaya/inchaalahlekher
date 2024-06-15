<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAeroportsCompagniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeroports_compagnies', function (Blueprint $table) {
            $table->unsignedBigInteger('aeroport_id');
            $table->unsignedBigInteger('compagnie_id');

            $table->primary(['aeroport_id', 'compagnie_id']);

            $table->foreign('aeroport_id')->references('id')->on('aeroports')->onDelete('cascade');
            $table->foreign('compagnie_id')->references('id')->on('compagnies')->onDelete('cascade');
            
            // Ajoutez d'autres colonnes si nécessaire pour la relation

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
        Schema::dropIfExists('aeroports_compagnies');
    }
}
