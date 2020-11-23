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
            'sale_status_id' => 1,
            'sale_status_name' => '在庫あり',
         ],
         [
             'sale_status_id' => 2,
             'sale_status_name' => '残りわずか',
         ],
         [
             'sale_status_id' => 3,
             'sale_status_name' => '入荷時期未定',
         ],
         [
             'sale_status_id' => 4,
             'sale_status_name' => '一時的に品切れ',
         ],
         [
             'sale_status_id' => 5,
             'sale_status_name' => '現在生産中止',
         ],
        ]);
    }
}
