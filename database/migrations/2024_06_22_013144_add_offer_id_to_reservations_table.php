<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOfferIdToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Ajouter la colonne offer_id si elle n'existe pas déjà
            if (!Schema::hasColumn('reservations', 'offer_id')) {
                $table->unsignedBigInteger('offer_id')->nullable();
                $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            }
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropForeign(['offer_id']);
            $table->dropColumn('offer_id');
        });
    }
}
