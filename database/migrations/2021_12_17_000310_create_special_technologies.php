<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialTechnologies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_technologies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            //TODO link na ID_Události
            $table->string('name',100);
            $table->string('code',20);
            $table->string('description');
            $table->string('icon');
            $table->integer('coefficient');

            $table->timestamps();

            $table->foreign('technology_id')->references('id')->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_technologies');
    }
}
