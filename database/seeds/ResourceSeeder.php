<?php

use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert([
            ['name' => 'f21MB-n'],
            ['name' => 'RF23W-n'],
            ['name' => 'KSE-20'],
            ['name' => 'KSE-30'],
            ['name' => 'F21B-n']
        ]);
    }
}
