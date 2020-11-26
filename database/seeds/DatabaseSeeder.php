<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            M_ShipmentsStatusesTableSeeder::class,
            T_OrdersDetailsTableSeeder::class,
            T_OrdersTableSeeder::class,
        ]);
    }
}
