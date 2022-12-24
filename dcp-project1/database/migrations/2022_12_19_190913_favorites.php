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
        Schema::dropIfExists('favorites');
    }
};
