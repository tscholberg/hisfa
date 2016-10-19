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
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@hisfa.be',
            'password' => bcrypt('hisfa'),
            'admin' => true,
            'remember_token' => str_random(10)
        ]);
    }
}
