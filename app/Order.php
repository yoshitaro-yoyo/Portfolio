<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 't_orders';

    protected $fillable = ['user_id','order_date','order_number'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
