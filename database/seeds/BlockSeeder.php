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
            ['typefoam_id' => 2, 'height' => 520, 'length' => 8000 , 'units' => 1],
            ['typefoam_id' => 2,'height' => 502, 'length' => 6000, 'units' => 1],
            ['typefoam_id' => 1, 'height' => 320, 'length' => 4000, 'units' => 1],
            ['typefoam_id' => 1, 'height' => 200, 'length' => 5550, 'units' => 1]
        ]);
    }
}
