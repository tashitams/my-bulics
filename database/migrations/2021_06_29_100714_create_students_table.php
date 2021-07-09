<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('student_code')->unique();
            $table->string('cid_no')->unique()->nullable();
            $table->string('gender');
            $table->date('dob');
            $table->string('is_boarder')->default('Boarder');
            $table->string('village');
            $table->string('gewog');
            $table->string('dzongkhag');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('phone_no')->nullable();
            $table->foreignId('grade_id')->constrained();
            $table->string('profile_pic')->default('default.png');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
