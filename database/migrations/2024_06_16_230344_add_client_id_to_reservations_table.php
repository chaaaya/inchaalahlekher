<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClientIdToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Ajouter la colonne client_id pour la clé étrangère vers la table clients
            $table->unsignedBigInteger('client_id');

            // Déclarer la contrainte de clé étrangère
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère et la colonne client_id
            $table->dropForeign(['client_id']);
            $table->dropColumn('client_id');
        });
    }
}
