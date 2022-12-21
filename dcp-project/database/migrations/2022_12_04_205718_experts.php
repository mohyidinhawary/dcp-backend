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
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->mediumText('photo')->nullable();
            $table->string('phone_number',20)->nullable();
            $table->string('address')->nullable();
            $table->string('experiences')->nullable();
            $table->string('experience_years',20);
            $table->integer('wallet')->nullable();
            $table->integer('session_price');
            $table->integer('role1')->nullable();
            $table->integer('role2')->nullable();
            $table->integer('role3')->nullable();
            $table->integer('role4')->nullable();
            $table->integer('role5')->nullable();
            $table->rememberToken()->nullable();
            //$table->integer('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experts');
    }
};
