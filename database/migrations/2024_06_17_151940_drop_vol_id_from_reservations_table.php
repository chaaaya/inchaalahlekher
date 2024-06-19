<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropVolIdFromReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Vérifie si la colonne existe avant de la supprimer
            if (Schema::hasColumn('reservations', 'vol_id')) {
                $table->dropColumn('vol_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Ajoutez le code pour rétablir la colonne dans le sens inverse si nécessaire
            // Ceci est facultatif, selon vos besoins
        });
    }
}
