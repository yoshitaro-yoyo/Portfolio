<?php

use Illuminate\Database\Seeder;

class T_purchasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_purchases')->insert([
            [
                'purchase_price' => '1000', 
                'purchase_quantity' => '10', 
                'purchase_company' => 'じゃがりこ株式会社', 
                'order_date' => date('Y-m-d H:i:s'), 
                'purchase_date' => date('Y-m-d H:i:s'), 
                'product_id' => '1', 
            ], 
            [
                'purchase_price' => '2000', 
                'purchase_quantity' => '20', 
                'purchase_company' => 'じゃがりこ2株式会社', 
                'order_date' => date('Y-m-d H:i:s'), 
                'purchase_date' => date('Y-m-d H:i:s'), 
                'product_id' => '2', 
            ], 
            [
                'purchase_price' => '3000', 
                'purchase_quantity' => '30', 
                'purchase_company' => 'じゃがりこ3株式会社', 
                'order_date' => date('Y-m-d H:i:s'), 
                'purchase_date' => date('Y-m-d H:i:s'), 
                'product_id' => '3', 
            ], 
        ]);
    }
}
