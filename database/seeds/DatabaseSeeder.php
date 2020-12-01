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
            M_CategoriesTableSeeder::class, 
            M_Sales_StatusesTableSeeder::class, 
            M_Products_StatusesTableSeeder::class, 
            M_ProductsTableSeeder::class, 
            UsersClassificationsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}
