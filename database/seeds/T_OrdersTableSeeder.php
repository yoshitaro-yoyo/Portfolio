<?php

use Illuminate\Database\Seeder;

class T_OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('t_orders')->insert([
            [
                'id' => 1,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'user_id' => '2',
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 3,
                'user_id' => '3',
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 4,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 5,
                'user_id' => '2',
                'order_date' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
