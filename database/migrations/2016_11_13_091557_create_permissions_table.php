<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('admin')->default(false);
            $table->boolean('view_dashboard')->default(false);
            $table->boolean('view_stock')->default(false);
            $table->boolean('manage_stock')->default(false);
            $table->boolean('view_waste_silos')->default(false);
            $table->boolean('manage_waste_silos')->default(false);
            $table->boolean('view_prime_silos')->default(false);
            $table->boolean('manage_prime_silos')->default(false);
            $table->boolean('manage_users')->default(false);
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
        Schema::dropIfExists('permissions');
    }
}
