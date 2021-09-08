<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStartToNationStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_to_nation_statistics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nation_template_id')->nullable();
            $table->unsignedBigInteger('statistic_type_id')->nullable();
            $table->integer('index');


            $table->foreign('nation_template_id')->references('id')->on('nations_templates');
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
        Schema::dropIfExists('start_to_nation_statistics');
    }
}
