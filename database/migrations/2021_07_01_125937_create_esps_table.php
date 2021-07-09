<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspsTable extends Migration
{
    
    public function up()
    {
        Schema::create('esps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('phone_no')->unique();
            $table->string('cid_no')->unique();
            $table->string('address');
            $table->date('joining_date');
            $table->string('profile_pic')->default('default.png');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('esps');
    }
}
