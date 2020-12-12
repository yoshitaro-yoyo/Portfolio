<?php

use Illuminate\Database\Seeder;

class M_ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_products')->insert([
            [
                'id' => 1, 
                'product_name' => '雪の恋人', 
                'category_id' => 1, 
                'price' => 1980, 
                'description' => '北海道に訪れた恋人たちの想い出', 
                'sale_status_id' => 1, 
                'product_status_id' => 1, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 1, 
                'delete_flag' => ''
            ], 
            [
                'id' => 2, 
                'product_name' => 'ハブマンゴー', 
                'category_id' => 2, 
                'price' => 8800, 
                'description' => '沖縄で育ったさー！おいしいさー！', 
                'sale_status_id' => 2, 
                'product_status_id' => 2, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 2, 
                'delete_flag' => ''
            ], 
            [
                'id' => 3, 
                'product_name' => '一本マグロ', 
                'category_id' => 3, 
                'price' => 1800000, 
                'description' => '日本海が育んだ巨大マグロ!!血抜きが甘くて血なまぐさいよ!', 
                'sale_status_id' => 3, 
                'product_status_id' => 3, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 3, 
                'delete_flag' => ''
            ], 
            [
                'id' => 4, 
                'product_name' => '風の森', 
                'category_id' => 4, 
                'price' => 2890, 
                'description' => '甘みと炭酸、味わいの両立、新しい日本酒', 
                'sale_status_id' => 4, 
                'product_status_id' => 4, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 1, 
                'delete_flag' => ''
            ], 
            [
                'id' => 5, 
                'product_name' => '十勝のバターハヤシライス', 
                'category_id' => 5, 
                'price' => 5800, 
                'description' => '生牛乳から作られたバターをふんだんに使用!10食セット☆', 
                'sale_status_id' => 5, 
                'product_status_id' => 5, 
                'regist_data' => date('Y-m-d H:i:s'), 
                'user_id' => 2, 
                'delete_flag' => ''
            ], 
            [
                'id' => 6, 
                'product_name' => '爆発マトリョーシカ', 
                'category_id' => 6, 
                'price' => 288000, 
                'description' => 'どこかにC-4爆弾が入ってますよ！*死人が出ました', 
                'sale_status_id' => 5, 
                'product_status_id' => 4, 
                'regist_date' => date('Y-m-d H:i:s'), 
                'user_id' => 3, 
                'delete_flag' => ''
            ], 
        ]);
    }
}
