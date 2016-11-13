<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //opgelet: volgorde belangrijk.
        $this->call(UserTableSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(TypeFoamSeeder::class);
        $this->call(ResourceSeeder::class);
        $this->call(SiloSeeder::class);
        $this->call(BlockSeeder::class);
    }
}
