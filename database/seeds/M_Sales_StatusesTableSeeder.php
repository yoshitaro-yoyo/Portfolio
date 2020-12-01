<?php

use Illuminate\Database\Seeder;

class M_Sales_StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_sales_statuses')->insert([
            [
                'id' => 1, 
                'sale_status_name' => '在庫あり', 
            ], 
            [
                'id' => 2, 
                'sale_status_name' => '残りわずか', 
            ], 
            [
                'id' => 3, 
                'sale_status_name' => '入荷時期未定', 
            ], 
            [
                'id' => 4, 
                'sale_status_name' => '一時的に品切れ', 
            ], 
            [
                'id' => 5, 
                'sale_status_name' => '現在生産中止', 
            ], 
        ]);
    }
}
