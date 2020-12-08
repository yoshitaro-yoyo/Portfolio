<?php

use Illuminate\Database\Seeder;

class T_OrdersDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_orders_details')->insert([
            [
                'id' => 1,
                'product_id' => 1,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_detail_number' => '20201120',
                'order_quantity' => 1,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'order_id' => 2,
                'shipment_status_id' => 2,
                'order_detail_number' => '20201121',
                'order_quantity' => 2,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'product_id' => 3,
                'order_id' => 3,
                'shipment_status_id' => 3,
                'order_detail_number' => '20201122',
                'order_quantity' => 3,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'product_id' => 4,
                'order_id' => 1,
                'shipment_status_id' => 1,
                'order_detail_number' => '20201124',
                'order_quantity' => 4,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'product_id' => 3,
                'order_id' => 2,
                'shipment_status_id' => 3,
                'order_detail_number' => '20201129',
                'order_quantity' => 10,
                'shipment_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
