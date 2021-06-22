<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonstersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monsters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
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

            $table->string('image_url', 500);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monsters');
    }
}
