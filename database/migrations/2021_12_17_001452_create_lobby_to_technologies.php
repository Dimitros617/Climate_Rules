<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLobbyToTechnologies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lobby_to_technologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('lobby_id');
            $table->integer('round_show');
            $table->integer('round_hide')->nullable();
            $table->tinyInteger('certificate')->default('1');
            $table->tinyInteger('visibility')->default('1');


            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->foreign('lobby_id')->references('id')->on('lobbies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lobby_to_technologies');
    }
}
