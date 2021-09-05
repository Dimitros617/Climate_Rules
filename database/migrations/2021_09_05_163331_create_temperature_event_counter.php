<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperatureEventCounter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperature_event_counter', function (Blueprint $table) {
            $table->id();
            $table->float('temperature',);
            $table->tinyInteger('event',)->default('0');
            $table->unsignedBigInteger('difficulty')->nullable();

            $table->foreign('difficulty')->references('id')->on('difficulties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temperature_event_counter');
    }
}
