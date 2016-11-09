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
            ['typefoam_id' => 1, 'height' => 520, 'length' => 8000, 'units' => 31],
            ['typefoam_id' => 2, 'height' => 502, 'length' => 6000, 'units' => 41],
            ['typefoam_id' => 3, 'height' => 320, 'length' => 4000, 'units' => 15],
            ['typefoam_id' => 4, 'height' => 200, 'length' => 6000, 'units' => 19],
            ['typefoam_id' => 5, 'height' => 520, 'length' => 8000, 'units' => 21],
            ['typefoam_id' => 6, 'height' => 502, 'length' => 6000, 'units' => 71],
            ['typefoam_id' => 7, 'height' => 320, 'length' => 4000, 'units' => 13],
            ['typefoam_id' => 8, 'height' => 200, 'length' => 6000, 'units' => 81],
            ['typefoam_id' => 9, 'height' => 320, 'length' => 8000, 'units' => 13],
            ['typefoam_id' => 10, 'height' => 200, 'length' => 8000, 'units' => 81]
        ]);
    }
}
