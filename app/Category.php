<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';

    public $timestamps = false;

    protected $fillable = ['id', 'category_name', ];
    
    //商品カテゴリー情報に関連するカテゴリーIDを取得する(1:1)
    public function products()
    {
        return $this->hasOne('Product::class');
    }
}
