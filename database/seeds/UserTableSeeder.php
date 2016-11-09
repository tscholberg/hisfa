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
            ),

            array(
                'id' => 2,
                'name' => 'Tom',
                'email' => 'tom@changeme.hisfa',
                'password' => bcrypt('hisfa'),
                'avatar' => 'default.png',
            ),

        ]);
    }
}
