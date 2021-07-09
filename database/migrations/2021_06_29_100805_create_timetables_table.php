<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimetablesTable extends Migration
{
    
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('grade_id')->constrained();
            $table->string('mon_1')->nullable();
            $table->string('mon_2')->nullable();
            $table->string('mon_3')->nullable();
            $table->string('mon_4')->nullable();
            $table->string('mon_5')->nullable();
            $table->string('mon_6')->nullable();
            $table->string('mon_7')->nullable();
            $table->string('tue_1')->nullable();
            $table->string('tue_2')->nullable();
            $table->string('tue_3')->nullable();
            $table->string('tue_4')->nullable();
            $table->string('tue_5')->nullable();
            $table->string('tue_6')->nullable();
            $table->string('tue_7')->nullable();
            $table->string('wed_1')->nullable();
            $table->string('wed_2')->nullable();
            $table->string('wed_3')->nullable();
            $table->string('wed_4')->nullable();
            $table->string('wed_5')->nullable();
            $table->string('wed_6')->nullable();
            $table->string('wed_7')->nullable();
            $table->string('thu_1')->nullable();
            $table->string('thu_2')->nullable();
            $table->string('thu_3')->nullable();
            $table->string('thu_4')->nullable();
            $table->string('thu_5')->nullable();
            $table->string('thu_6')->nullable();
            $table->string('thu_7')->nullable();
            $table->string('fri_1')->nullable();
            $table->string('fri_2')->nullable();
            $table->string('fri_3')->nullable();
            $table->string('fri_4')->nullable();
            $table->string('fri_5')->nullable();
            $table->string('fri_6')->nullable();
            $table->string('fri_7')->nullable();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('timetables');
    }
}
