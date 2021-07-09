<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('email')->unique();
            $table->string('employee_id')->unique();
            $table->string('cid_no')->unique();
            $table->string('phone_no')->unique();
            $table->string('qualification');
            $table->string('address');
            $table->date('joining_date');
            $table->string('password');
            $table->text('school_role')->nullable();
            $table->enum('user_role', ['Principal', 'Teacher', 'Staff'])->default('Teacher');
            $table->string('profile_pic')->default('default.png');
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
