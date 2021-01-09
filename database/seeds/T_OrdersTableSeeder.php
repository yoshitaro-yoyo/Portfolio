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
                'order_number' => '1',
            ],
            [
                'id' => 2,
                'user_id' => '2',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '2',
            ],
            [
                'id' => 3,
                'user_id' => '2',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '3',
            ],
            [
                'id' => 4,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '4',
            ],
            [
                'id' => 5,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '5',
            ],
            [
                'id' => 6,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '6',
            ],
            [
                'id' => 7,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '7',
            ],
            [
                'id' => 8,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '8',
            ],
            [
                'id' => 9,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '9',
            ],
            [
                'id' => 10,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '10',
            ],
            [
                'id' => 11,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '11',
            ],
            [
                'id' => 12,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '12',
            ],
            [
                'id' => 13,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '13',
            ],
            [
                'id' => 14,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '14',
            ],
            [
                'id' => 15,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '15',
            ],
            [
                'id' => 16,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '16',
            ],
            [
                'id' => 17,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '17',
            ],
            [
                'id' => 18,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '18',
            ],
            [
                'id' => 19,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '19',
            ],
            [
                'id' => 20,
                'user_id' => '1',
                'order_date' => date('Y-m-d H:i:s'),
                'order_number' => '20',
            ],
        ]);
    }
}
