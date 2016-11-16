<?php

use Illuminate\Database\Seeder;
use App\Log;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Log::class, 5)->create();
    }
}
