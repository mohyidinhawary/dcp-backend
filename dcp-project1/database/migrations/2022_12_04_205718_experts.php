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
            $table->float('rate')->nullable();
            $table->boolean('Medical_consulting')->nullable();
            $table->boolean('Professional_consulting')->nullable();
            $table->boolean('Psychological_consulting')->nullable();
            $table->boolean('Family_consulting')->nullable();
            $table->boolean('management_consulting')->nullable();
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

