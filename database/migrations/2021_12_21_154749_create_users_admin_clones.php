<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAdminClones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_admin_clones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('clone_user_id');
            $table->unsignedBigInteger('lobby_id');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('clone_user_id')->references('id')->on('users');
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
        Schema::dropIfExists('users_admin_clones');
    }
}
