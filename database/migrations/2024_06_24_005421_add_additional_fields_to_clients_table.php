<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToClientsTable extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Colonnes pour les abonnés
            $table->date('date_naissance')->nullable();
            $table->enum('sexe', ['homme', 'femme', 'autre'])->nullable();
            $table->string('nationalite')->nullable();
            $table->string('numero_identite')->nullable();
            $table->date('expiration_identite')->nullable();
            $table->string('pays_delivrance_identite')->nullable();
            $table->text('adresse')->nullable();
// Peut-être déjà présent, ajustez si nécessaire
            $table->string('numero_carte_credit')->nullable();
            $table->date('expiration_carte_credit')->nullable();
            $table->string('cvv')->nullable();
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            // Supprimer les colonnes si la migration est annulée (rollback)
            $table->dropColumn([
                'date_naissance',
                'sexe',
                'nationalite',
                'numero_identite',
                'expiration_identite',
                'pays_delivrance_identite',
                'adresse',
               
                'numero_carte_credit',
                'expiration_carte_credit',
                'cvv',
            ]);
        });
    }
}
