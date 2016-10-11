<?php

use Illuminate\Database\Seeder;

class wasteSilo_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wasteSilo')->insert([
            'name' => str_random(1),
            'float' => 0.75,
            'typeFoam_id' => 1,
        ]);
    }
}
