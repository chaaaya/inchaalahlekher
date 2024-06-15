<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeignKeysInVolsTable extends Migration
{
    public function up()
    {
        Schema::table('vols', function (Blueprint $table) {
            // Suppression de la contrainte de clé étrangère sur compagnie_id
            $table->dropForeign(['compagnie_id']);
        });
    }

    public function down()
    {
        Schema::table('vols', function (Blueprint $table) {
            // Vous pouvez ajouter le code pour recréer la contrainte de clé étrangère ici si nécessaire
        });
    }}