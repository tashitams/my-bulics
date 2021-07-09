<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentDisciplinesTable extends Migration
{
    
    public function up()
    {
        Schema::create('student_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->string('title');
            $table->string('description');
            $table->string('staff_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('student_disciplines');
    }
}
