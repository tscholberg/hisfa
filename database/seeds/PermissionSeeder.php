<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            array(
                'id' => 1,
                'user_id' => 1,
                'admin' => true,
                'view_dashboard' => true,
                'view_stock' => true,
                'manage_stock' => true,
                'view_waste_silos' => true,
                'manage_waste_silos' => true,
                'view_prime_silos' => true,
                'manage_prime_silos' => true,
                'manage_users' => true,
            ),

            array(
                'id' => 2,
                'user_id' => 2,
                'admin' => true,
                'view_dashboard' => true,
                'view_stock' => true,
                'manage_stock' => true,
                'view_waste_silos' => true,
                'manage_waste_silos' => true,
                'view_prime_silos' => true,
                'manage_prime_silos' => true,
                'manage_users' => true,
            ),

        ]);
    }
}
