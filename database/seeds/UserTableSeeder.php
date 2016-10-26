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
                'name' => 'admin',
                'email' => 'admin@hisfa.be',
                'password' => bcrypt('admin'),
                'avatar' => 'default.png',
                'admin' => true,
                'remember_token' => str_random(10)
            ),

            array(
                'name' => 'tom',
                'email' => 'tom@hisfa.be',
                'password' => bcrypt('tom'),
                'avatar' => 'default.png',
                'admin' => true,
                'remember_token' => str_random(10)
            ),

        ]);
    }
}
