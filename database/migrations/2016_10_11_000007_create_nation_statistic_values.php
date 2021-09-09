<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationStatisticValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nation_statistic_values', function (Blueprint $table) {
            $table->id();
            $table->integer('set');
            $table->unsignedBigInteger('lobby_id')->nullable();
            $table->unsignedBigInteger('statistics_type_id')->nullable();
            $table->integer('index');
            $table->integer('value');


            $table->foreign('statistics_type_id')->references('id')->on('statistics_types');
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
        Schema::dropIfExists('nation_statistic_values');
    }
}
