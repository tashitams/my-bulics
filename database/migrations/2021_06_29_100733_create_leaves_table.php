<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('leave_type');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('leave_days');
            $table->text('reason');
            $table->enum('leave_status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
