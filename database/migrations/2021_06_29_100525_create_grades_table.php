<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('name')->unique();
            $table->integer('boarder_boys');
            $table->integer('boarder_girls');
            $table->integer('dayscholar_boys');
            $table->integer('dayscholar_girls');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
