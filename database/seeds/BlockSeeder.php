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
        DB::table('block')->insert([
            ['height' => '520', 'typeFoam_id' => '2'],
            ['height' => '502', 'typeFoam_id' => '2'],
            ['height' => '320', 'typeFoam_id' => '1'],
            ['height' => '200', 'typeFoam_id' => '1']

        ]);
    }
}
