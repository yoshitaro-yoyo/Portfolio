<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 't_orders_details';

    protected $fillable = ['order_id','shipment_status_id','order_detail_number','order_quantity','shipment_date'];


    public function shipmentStatuses()
    {
        return $this->belongsTo(ShipmentStatus::class);
    }

}
