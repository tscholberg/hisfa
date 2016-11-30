<?php

use Illuminate\Database\Seeder;

class LengteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lengtes')->insert([
            ['foamlength' => 'str : 4 meter'],
            ['foamlength' => '6 meter'],
            ['foamlength' => '8 meter']
        ]);
    }
}
