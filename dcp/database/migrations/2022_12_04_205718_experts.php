a<?php

use Illuminate\Contracts\Support\CanBeEscapedWhenCastToString;
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
            $table->integer('role')->nullable();
            $table->string('experiences')->nullable();
            $table->rememberToken()->nullable();
            //$table->integer('user_id');
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
