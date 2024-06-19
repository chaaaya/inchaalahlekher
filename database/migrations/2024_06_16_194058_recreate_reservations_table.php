<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('reservations');

        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->date('date_naissance');
            $table->enum('sexe', ['Homme', 'Femme']);
            $table->string('nationalite');
            $table->string('num_identite');
            $table->date('date_expiration_identite');
            $table->string('pays_delivrance_identite');
            $table->date('date_depart');
            $table->date('date_retour')->nullable();
            $table->string('email');
            $table->string('telephone');
            $table->string('num_carte');
            $table->date('date_expiration_carte');
            $table->string('cvv');
            $table->string('nom_titulaire_carte');
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
        Schema::dropIfExists('reservations');
    }
}
