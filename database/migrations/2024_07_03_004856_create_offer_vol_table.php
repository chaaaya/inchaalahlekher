<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferVolTable extends Migration
{
    public function up()
    {
        Schema::create('offer_vol', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('offer_id');
            $table->unsignedBigInteger('vol_id');
            $table->timestamps();

            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');
            $table->foreign('vol_id')->references('id')->on('vols')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('offer_vol');
    }
}