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
        Schema::create('experts_details', function (Blueprint $table) {
            $table->id();
            $table->mediumText('photo')->nullable();
            $table->string('experiences');
            $table->text('details_of_experiences')->nullable();
            $table->string('phone_number',20);
            $table->string('address');
            $table->string('available_times_during_the_week');
            $table->string('type_of_Consulting');
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
        Schema::dropIfExists('experts_details');
    }
};
