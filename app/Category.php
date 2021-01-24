<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'm_categories';

    protected $fillable = [
        'category_name',
    ];
}
