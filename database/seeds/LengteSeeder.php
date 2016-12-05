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
            ['foamlength' => 4],
            ['foamlength' => 6],
            ['foamlength' => 8]
        ]);
    }
}
