<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //gebruikers admin en tom toevoegen

        DB::table('users')->insert([
            array(
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@changeme.hisfa',
                'password' => bcrypt('admin'),
                'avatar' => 'default.png',
                'admin' => true,
                'view_dashboard' => true,
                'view_stock' => true,
                'manage_stock' => true,
                'view_waste_silos' => true,
                'manage_waste_silos' => true,
                'view_prime_silos' => true,
                'manage_prime_silos' => true,
                'manage_users' => true,
            ),

            array(
                'id' => 2,
                'name' => 'Tom',
                'email' => 'tom@changeme.hisfa',
                'password' => bcrypt('hisfa'),
                'avatar' => 'default.png',
                'admin' => true,
                'view_dashboard' => true,
                'view_stock' => true,
                'manage_stock' => true,
                'view_waste_silos' => true,
                'manage_waste_silos' => true,
                'view_prime_silos' => true,
                'manage_prime_silos' => true,
                'manage_users' => true,
            ),

        ]);
    }
}
