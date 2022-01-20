<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationsTemplates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nations_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->integer('money')->default(0);
            $table->unsignedBigInteger('statistic_values_set');

            $table->foreign('statistic_values_set')->references('id')->on('nation_statistic_values_templates');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nations_templates');
    }
}
