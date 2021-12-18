<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnologiesStatisticsTypesChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technologies_statistics_types_changes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('technology_id');
            $table->unsignedBigInteger('statistic_type_id');
            $table->integer('index_move');


            $table->foreign('technology_id')->references('id')->on('technologies');
            $table->foreign('statistic_type_id')->references('id')->on('statistics_types');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technologies_statistics_types_changes');
    }
}
