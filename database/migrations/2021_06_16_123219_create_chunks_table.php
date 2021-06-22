<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChunksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chunks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('world_map_id');
            $table->bigInteger('x');
            $table->bigInteger('y');
            $table->float('danger_index');
            $table->timestamps();

            $table->foreign('world_map_id')->references('id')->on('world_maps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chunks');
    }
}
