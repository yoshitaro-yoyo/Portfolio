<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShipmentStatus extends Model
{
    protected $table = 'm_shipments_statuses';

    protected $fillable = ['shipment_status_name'];

    public function orderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
