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
        DB::table('typefoams')->insert([
            ['foamtype' => 'P15'],
            ['foamtype' => '60SE'],
            ['foamtype' => 'P20'],
            ['foamtype' => '100SE'],
            ['foamtype' => 'P25'],
            ['foamtype' => '150SE'],
            ['foamtype' => 'P30'],
            ['foamtype' => '200E'],
            ['foamtype' => 'P35'],
            ['foamtype' => '250E']
        ]);
    }
}
