<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->boolean('has_completed_subscription_form')->default(false);
    });
}

public function down()
{
    Schema::table('clients', function (Blueprint $table) {
        $table->dropColumn('has_completed_subscription_form');
    });
}

};
