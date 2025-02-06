<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showAllOrders()
    {
        $orders = Order::with('orderDetails')->get();
        return view('backend.order.all-orders', compact('orders'));
    }
}
