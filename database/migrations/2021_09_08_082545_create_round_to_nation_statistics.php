<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoundToNationStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('round_to_nation_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nation_id')->nullable();
            $table->unsignedBigInteger('round_id')->nullable();
            $table->unsignedBigInteger('statistic_type_id')->nullable();
            $table->integer('index');
            $table->string('reason',40)->nullable();
            $table->timestamps();

            $table->foreign('nation_id')->references('id')->on('nations');
            $table->foreign('round_id')->references('id')->on('rounds');
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
        Schema::dropIfExists('round_to_nation_statistics');
    }
}
