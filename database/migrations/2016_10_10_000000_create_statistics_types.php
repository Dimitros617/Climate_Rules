<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistics_types', function (Blueprint $table) {
            $table->id();

            $table->increments('position');
            $table->string('name', 40);
            $table->string('code_name', 20);
            $table->string('unit', 10)->nullable();
            $table->string('icon', 5120);
            $table->tinyInteger('positive_value')->default('1');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistics_types');
    }
}
