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
        Schema::dropIfExists('experts-avilableity');
        Schema::create('experts-avilableity', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expert_id')->nullable();
            $table->string('day');
            $table->date('date'); 
            $table->timeTz('from',$precision = 0);
            $table->timeTz('to',$precision = 0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('expert_id')->references('id')->on('experts')->onDelete("NO ACTION");
            $table->foreign('user_id')->references('id')->on('users')->onDelete("NO ACTION");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts-avilableity');
    }
};

