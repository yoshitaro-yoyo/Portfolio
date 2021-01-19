<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'm_products';

    protected $fillable = [
        'product_name',
        'category_id',
        'price',
    ];


    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
