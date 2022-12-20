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
            
            $table->string('phone_number',20);
            $table->string('address');
            $table->text('experiences');
            $table->string('experience_years',20);
            $table->boolean('Medical_consultations');
            $table->boolean('Professional_consulting');
            $table->boolean('Psychological_counseling');
            $table->boolean('Family_counseling');
            $table->boolean('management_consulting');
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
