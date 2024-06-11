<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUsersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('users');
    }

    public function down()
    {
        // Si nécessaire, vous pouvez redéfinir la migration de suppression ici
    }
}
