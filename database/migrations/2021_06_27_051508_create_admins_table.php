<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('username')->unique();
            $table->string('password', 255);
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}