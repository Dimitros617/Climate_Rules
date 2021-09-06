<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('lobby_id')->nullable();
            $table->string('flag_image',100);
            $table->string('map_image',100);
            $table->string('name',40);
            $table->integer('economy',)->default('0');
            $table->integer('economy_level',)->default('0');
            $table->integer('tax',)->default('0');
            $table->integer('happiness',)->default('0');
            $table->integer('happiness_level',)->default('0');
            $table->integer('gasses',)->default('0');
            $table->integer('health',)->default('0');
            $table->integer('money',)->default('0');

            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('nations');
    }
}
