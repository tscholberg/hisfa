<?php

use Illuminate\Database\Seeder;

class SiloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $table->string('name');
//        $table->float('capacity');
//        $table->foreign('resource_id')->references('id')->on('resource');
        DB::table('primeSilo')->insert([
            ['name' => 'P1', 'capacity' => '0.2', 'resource_id' => '1'],
            ['name' => 'P2', 'capacity' => '0.65', 'resource_id' => '2'],
            ['name' => 'P3', 'capacity' => '0.9', 'resource_id' => '4'],
            ['name' => 'P4', 'capacity' => '0.05', 'resource_id' => '3'],
            ['name' => 'P5', 'capacity' => '0.2', 'resource_id' => '5'],
            ['name' => 'P6', 'capacity' => '0.5', 'resource_id' => '1']
        ]);

        DB::table('wasteSilo')->insert([
            ['name' => 'A1', 'capacity' => '0.65', 'resource_id' => '2'],
            ['name' => 'A2', 'capacity' => '0.9', 'resource_id' => '4'],
            ['name' => 'A3', 'capacity' => '0.05', 'resource_id' => '3']
        ]);
    }
}
