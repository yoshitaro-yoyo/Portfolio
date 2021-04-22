<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        $user = User::find($order->user_id);
        $orderDetails = OrderDetail::all();
        return view('shopping.order_detail', compact('user', 'order', 'orderDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        foreach($order->orderDetails as $orderDetail){
            $orderDetail->shipment_status_id = 4;
            $orderDetail->timestamps = false;
            $orderDetail->save();
        }
        return redirect()->back();
    }
}
