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
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function saleStatus()
    {
        return $this->belongsTo('App\SaleStatus');
    }

    public function productStatus()
    {
        return $this->belongsTo('App\ProductStatus');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    public function searchByInputParameters($searchWord, $categoryId)
    {
        $query = $this->query();

        $query->when($searchWord, function($query) use ($searchWord) {
            return $query->where('product_name', 'like', '%' . self::escapeLike($searchWord) . '%');
        });
        $query->when($categoryId, function($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        });

        return $query->orderBy('category_id', 'asc')
        ->paginate(15);
    }

    // str_replaceでセキュリティ対策
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}
