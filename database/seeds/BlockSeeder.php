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
            ['typefoam_id' => 1, 'length' => 8, 'units' => 31, 'lengthfoam_id' => 1],
            ['typefoam_id' => 2, 'length' => 6, 'units' => 41, 'lengthfoam_id' => 1],
            ['typefoam_id' => 3, 'length' => 4, 'units' => 15, 'lengthfoam_id' => 1],
            ['typefoam_id' => 4, 'length' => 4.6, 'units' => 19, 'lengthfoam_id' => 1]

        ]);
    }
}
