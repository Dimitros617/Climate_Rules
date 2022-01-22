<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationsTechnologies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nations_technologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('nation_id');
            $table->unsignedBigInteger('status_id');
            $table->integer('patent');
            $table->tinyInteger('first_try')->default(0);
            $table->string('chose_description',2048)->nullable();
            $table->string('chose_benefits',2048)->nullable();
            $table->string('chose_disadvantages',2048)->nullable();
            $table->string('chose_business',2048)->nullable();
            $table->string('chose_people',2048)->nullable();


            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('lobby_to_technologies');
            $table->foreign('nation_id')->references('id')->on('nations');
            $table->foreign('status_id')->references('id')->on('nations_technologies_status');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nations_technologies');
    }
}
