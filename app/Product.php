<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table = 'm_products';
    public $timestamps = false;
    protected $fillable = [
        'product_name',
        'category_id',
        'price',
    ];

    //カテゴリーIDに関連する商品カテゴリー情報を取得する
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    //ユーザ情報にProduct情報を紐付ける
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
