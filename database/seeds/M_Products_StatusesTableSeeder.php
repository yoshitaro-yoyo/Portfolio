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
            'product_status_id' => 1, 
            'product_status_name' => '新品', 
        ], 
        [
            'product_status_id' => 2, 
            'product_status_name' => 'セール対象アイテム', 
        ], 
        [
            'product_status_id' => 3, 
            'product_status_name' => '訳あり', 
        ], 
        [
            'product_status_id' => 4, 
            'product_status_name' => '難あり', 
        ], 
        [
            'product_status_id' => 5, 
            'product_status_name' => '期限間近', 
        ], 
       ]);
    }
}
