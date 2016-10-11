<?php

use Illuminate\Database\Seeder;

class typeFoam_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('typeFoam')->insert([
            'name' => str_random(3),
            'property' => str_random(10),
        ]);
    }
}
