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
        Schema::create('favorites', function (Blueprint $table) {
           
            $table->integer("user_id")->unsigned();
            $table->string('expert_name');
            $table->integer('role1')->nullable();
            $table->integer('role2')->nullable();
            $table->integer('role3')->nullable();
            $table->integer('role4')->nullable();
            $table->integer('role5')->nullable();
            $table->rememberToken()->nullable();
            
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
        Schema::dropIfExists('favorites');
    }
};
