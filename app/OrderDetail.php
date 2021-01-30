<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 't_orders_details';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'order_id',
        'shipment_status_id',
        'order_quantity',
    ];

    public function product()
    {
        return $this->belongsTo('App\Products');
    }

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function shipmentStatuses()
    {
        return $this->belongsTo('App\ShipmentStatus');
    }

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
