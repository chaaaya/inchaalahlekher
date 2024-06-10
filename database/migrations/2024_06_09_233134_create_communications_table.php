<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunicationsTable extends Migration
{
    public function up()
    {
        Schema::create('communications', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->text('message');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('communications');
    }
}
