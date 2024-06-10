<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakeholdersTable extends Migration
{
    public function up()
    {
        Schema::create('stakeholders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('stakeholders');
    }
}
