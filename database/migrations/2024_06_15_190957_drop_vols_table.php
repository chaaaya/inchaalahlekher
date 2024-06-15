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
        Schema::dropIfExists('vols');
    }
    
    public function down()
    {
        Schema::create('vols', function (Blueprint $table) {
            // Définir à nouveau la structure de la table vols si besoin est
        });
    }
    
};
