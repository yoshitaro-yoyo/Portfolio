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
        //$this->call(UsersTableSeeder::class);
        $this->call([
            UsersClassificationsTableSeeder::class,
            UsersTableSeeder::class,
            T_OrdersTableSeeder::class,
            M_CategoriesTableSeeder::class,
            M_Sales_StatusesTableSeeder::class,
            M_Products_StatusesTableSeeder::class,
            M_ProductsTableSeeder::class,
            M_ShipmentsStatusesTableSeeder::class,
            T_OrdersDetailsTableSeeder::class,
            T_purchasesTableSeeder::class,
        ]);
    }
}
