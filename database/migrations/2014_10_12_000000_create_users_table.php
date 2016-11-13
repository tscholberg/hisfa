<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('avatar')->default('default.png');
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->boolean('view_dashboard')->default(false);
            $table->boolean('view_stock')->default(false);
            $table->boolean('manage_stock')->default(false);
            $table->boolean('view_waste_silos')->default(false);
            $table->boolean('manage_waste_silos')->default(false);
            $table->boolean('view_prime_silos')->default(false);
            $table->boolean('manage_prime_silos')->default(false);
            $table->boolean('manage_users')->default(false);
            $table->boolean('email_prime_silos_full')->default(false);
            $table->boolean('email_waste_silos_full')->default(false);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
