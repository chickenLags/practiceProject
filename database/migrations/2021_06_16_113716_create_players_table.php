<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('level');

            $table->integer('hp');
            $table->integer('strength');
            $table->integer('vitality');
            $table->integer('agility');
            $table->integer('wisdom');
            $table->integer('spirit');
            $table->integer('hit_rate');
            $table->integer('luck');
            $table->integer('evasion');
            $table->integer('speed');

            $table->integer('x');
            $table->integer('y');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
    }
}
