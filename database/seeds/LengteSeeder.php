<?php

use Illuminate\Database\Seeder;

class LengteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lengtes')->insert([
            ['length' => 4],
            ['length' => 6],
            ['length' => 8],
            ['length' => 3.45]

        ]);
    }
}
