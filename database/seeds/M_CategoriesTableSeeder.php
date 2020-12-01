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
                'id' => 1, 
                'category_name' => '菓子類', 
            ], 
            [
                'id' => 2, 
                'category_name' => '果物類', 
            ], 
            [
                'id' => 3, 
                'category_name' => '生鮮食品', 
            ], 
            [
                'id' => 4, 
                'category_name' => '酒類', 
            ], 
            [
                'id' => 5, 
                'category_name' => 'レトルト類', 
            ], 
            [
                'id' => 6, 
                'category_name' => '玩具類', 
            ], 
        ]);
    }
}
