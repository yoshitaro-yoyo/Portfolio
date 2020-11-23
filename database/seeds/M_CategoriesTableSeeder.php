<?php

use Illuminate\Database\Seeder;

class M_CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_categories')->insert([
         [
            'category_id' => 1,
            'category_name' => '菓子類',
         ],
         [
             'category_id' => 2,
             'category_name' => '果物類',
         ],
         [
             'category_id' => 3,
             'category_name' => '生鮮食品',
         ],
         [
             'category_id' => 4,
             'category_name' => '酒類',
         ],
         [
             'category_id' => 5,
             'category_name' => 'レトルト類',
         ],
         [
             'category_id' => 6,
             'category_name' => '玩具類',
         ],
        ]);
    }
}
