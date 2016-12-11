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
            ['typefoam_id' => 1, 'units' => 31, 'lengthfoam_id' => 1],
            ['typefoam_id' => 1, 'units' => 41, 'lengthfoam_id' => 2],
            ['typefoam_id' => 1, 'units' => 11, 'lengthfoam_id' => 3],
            ['typefoam_id' => 2, 'units' => 41, 'lengthfoam_id' => 1],
            ['typefoam_id' => 2, 'units' => 41, 'lengthfoam_id' => 3],
            ['typefoam_id' => 3, 'units' => 15, 'lengthfoam_id' => 3],
            ['typefoam_id' => 4, 'units' => 19, 'lengthfoam_id' => 1]

        ]);
    }
}
