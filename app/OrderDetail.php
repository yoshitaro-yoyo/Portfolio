<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 't_orders_details';

    protected $fillable = [
        'product_id',
        'order_id',
        'shipment_status_id',
        'order_quantity',
    ];


    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function shipmentStatuses()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
