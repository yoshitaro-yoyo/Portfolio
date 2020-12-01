<?php

use Illuminate\Database\Seeder;

class M_Products_StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_products_statuses')->insert([
            [
                'id' => 1, 
                'product_status_name' => '新品', 
            ], 
            [
                'id' => 2, 
                'product_status_name' => 'セール対象アイテム', 
            ], 
            [
                'id' => 3, 
                'product_status_name' => '訳あり', 
            ], 
            [
                'id' => 4, 
                'product_status_name' => '難あり', 
            ], 
            [
                'id' => 5, 
                'product_status_name' => '期限間近', 
            ], 
        ]);
    }
}
