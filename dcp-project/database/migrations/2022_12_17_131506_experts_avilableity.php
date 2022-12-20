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
        Schema::create('experts-avilableity', function (Blueprint $table) {
            $table->id();
           
            
            $table->string('today');
            $table->date('date'); 
           $table->timeTz('from',$precision = 0);
           $table->timeTz('to',$precision = 0);
            $table->rememberToken();
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
        Schema::dropIfExists('experts-avilableity');
    }
    };

