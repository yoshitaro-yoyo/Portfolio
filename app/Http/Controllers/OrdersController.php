<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->orderBy('order_date', 'desc')->paginate(15);
        return view('shopping.order_history', compact('orders'));
    }

    public function show()
    {
        $targetDate = today()->subMonth(3);
        $recentlyOrders = auth()->user()->orders()->where('order_date', '>', $targetDate)->orderBy('order_date', 'desc')->paginate(15);
        return view('shopping.search_order_history', compact('recentlyOrders'));
    }
}
