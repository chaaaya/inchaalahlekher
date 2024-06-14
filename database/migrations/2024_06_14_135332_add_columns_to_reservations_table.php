<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('departure_location')->after('vol_id');
            $table->string('arrival_location')->after('departure_location');
            $table->date('departure_date')->default(now())->after('arrival_location');
        });
    }

    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn('departure_location');
            $table->dropColumn('arrival_location');
            $table->dropColumn('departure_date');
        });
    }
}
