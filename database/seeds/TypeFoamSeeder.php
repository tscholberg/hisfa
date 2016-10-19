<?php

use Illuminate\Database\Seeder;

class TypeFoamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeFoam')->insert([
            ['name' => 'P15'],
            ['name' => '60SE'],
            ['name' => 'P20'],
            ['name' => '100SE'],
            ['name' => 'P25'],
            ['name' => '150SE'],
            ['name' => 'P30'],
            ['name' => '200E'],
            ['name' => 'P35'],
            ['name' => '250E']
        ]);
    }
}
