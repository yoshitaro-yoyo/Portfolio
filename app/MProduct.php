<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MProduct extends Model
{
    // リレーション
    public function category()
    {
        return $this->belongsTo(MCategory::class);
    }
}
