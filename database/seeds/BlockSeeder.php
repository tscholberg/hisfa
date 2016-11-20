<?php

use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            ['typefoam_id' => 1, 'length' => 8000, 'units' => 31],
            ['typefoam_id' => 2, 'length' => 6000, 'units' => 41],
            ['typefoam_id' => 3, 'length' => 4000, 'units' => 15],
            ['typefoam_id' => 4, 'length' => 6000, 'units' => 19],
            ['typefoam_id' => 5, 'length' => 8000, 'units' => 21],
            ['typefoam_id' => 6, 'length' => 6000, 'units' => 71],
            ['typefoam_id' => 7, 'length' => 4000, 'units' => 13],
            ['typefoam_id' => 8, 'length' => 6000, 'units' => 81],
            ['typefoam_id' => 9, 'length' => 8000, 'units' => 13],
            ['typefoam_id' => 10, 'length' => 8000, 'units' => 81]
        ]);
    }
}
