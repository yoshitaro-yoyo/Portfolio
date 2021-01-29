<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';
    public $timestamps = false;
    protected $fillable = ['id', 'category_name', ];

    // m_categoriesテーブルから::pluckでcategory_nameとidを抽出
    public static function categoryList()
    {
        return self::pluck('category_name', 'id');
    }

    //商品カテゴリー情報に関連するカテゴリーIDを取得する
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
