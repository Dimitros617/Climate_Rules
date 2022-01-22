<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNationsMoneyBalances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nations_money_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nation_id_to');
            $table->unsignedBigInteger('nation_id_from')->nullable();
            $table->unsignedBigInteger('transaction_type');
            $table->integer('money_change');
            $table->string('description', 400);
            $table->string('reason', 50);
            $table->timestamps();


            $table->foreign('nation_id_to')->references('id')->on('nations');
            $table->foreign('nation_id_from')->references('id')->on('nations');
            $table->foreign('transaction_type')->references('id')->on('money_transaction_types');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nations_money_balances');
    }
}
