<?php

use Illuminate\Database\Seeder;

class M_ShipmentsStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_shipments_statuses')->insert([
            [
                'id' => 1,
                'shipment_status_name' => '準備中',
            ],
            [
                'id' => 2,
                'shipment_status_name' => '準備完了',
            ],
            [
                'id' => 3,
                'shipment_status_name' => '発送済',
            ],
            [
                'id' => 4,
                'shipment_status_name' => 'キャンセル',
            ],
        ]);
    }
}
