<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('m_users')->insert([
            [
                'id' => '1',
                'password' => Hash::make('1a2b3c4d5e'),
                'last_name' => '東京',
                'first_name' => '太郎',
                'zipcode' => '1638001',
                'prefecture' => '東京都',
                'municipality' => '新宿区',
                'address' => '2',
                'apartments' => '東マンション101',
                'email' => 'abcde@mail.com',
                'phone_number' => '0311111111',
                'user_classification_id' => '1',
                'company_name' => '東京株式会社',
                'delete_flag' => '0',
            ],
            [
                'id' => '2',
                'password' => Hash::make('6f7g8h9i0j'),
                'last_name' => '大阪',
                'first_name' => '次郎',
                'zipcode' => '5408570',
                'prefecture' => '大阪府',
                'municipality' => '大阪市中央区',
                'address' => '2-1',
                'apartments' => 'ハイツ西201',
                'email' => 'fghij@mail.com',
                'phone_number' => '0622222222',
                'user_classification_id' => '2',
                'company_name' => '株式会社大阪',
                'delete_flag' => '0',
            ],
            [
                'id' => '3',
                'password' => Hash::make('k1l2m3n4o5'),
                'last_name' => '沖縄',
                'first_name' => '花子',
                'zipcode' => '9008570',
                'prefecture' => '沖縄県',
                'municipality' => '那覇市',
                'address' => '345',
                'apartments' => 'アパートメント南303',
                'email' => 'klmno@mail.com',
                'phone_number' => '0983333333',
                'user_classification_id' => '3',
                'company_name' => '沖縄株式会社',
                'delete_flag' => '0',
            ],
        ]);
    }
}
