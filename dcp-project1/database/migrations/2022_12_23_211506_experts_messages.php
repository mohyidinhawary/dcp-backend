<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expert_id')->nullable();
           
            $table->string('subject');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('user_name');
            
           
            $table->text('description');
            $table->text('user_answer')->nullable();
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts_messages');
    }
};
