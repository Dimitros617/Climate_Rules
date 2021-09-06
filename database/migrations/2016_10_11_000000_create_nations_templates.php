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
            $table->integer('economy',)->default('0');
            $table->integer('economy_level',)->default('0');
            $table->integer('tax',)->default('0');
            $table->integer('happiness',)->default('0');
            $table->integer('happiness_level',)->default('0');
            $table->integer('gasses',)->default('0');
            $table->integer('health',)->default('0');
            $table->integer('money',)->default('0');

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
