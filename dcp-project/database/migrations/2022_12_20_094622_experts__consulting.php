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
        Schema::create('experts__consulting', function (Blueprint $table) {
            $table->id();
            $table->integer("expert_id")->unsigned();
            $table->string('expert_name');
           
            $table->rememberToken()->nullable();
            $table->integer('role1')->nullable();
            $table->integer('role2')->nullable();
            $table->integer('role3')->nullable();
            $table->integer('role4')->nullable();
            $table->integer('role5')->nullable();
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
        Schema::dropIfExists('experts__consulting');
    }
};
