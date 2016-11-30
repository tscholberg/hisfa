<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('length');
            $table->integer('units');
            $table->integer('typefoam_id')->unsigned();
            $table->foreign('typefoam_id')->references('id')->on('typefoams');
            $table->integer('lengthfoam_id')->unsigned();
            $table->foreign('lengthfoam_id')->references('id')->on('lengtes');
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
        Schema::dropIfExists('blocks');
    }
}
