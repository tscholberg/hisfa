<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrimeSiloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('primeSilo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('capacity');
            $table->integer('resource_id')->unsigned();
            $table->foreign('resource_id')->references('id')->on('resource');
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
        Schema::dropIfExists('primeSilo');
    }
}
