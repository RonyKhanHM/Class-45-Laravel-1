<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard ()
{
    $allOrders = Order::count();
    $pendingOrders = Order::where('status', 'pending')->count();
    $confirmedOrders = Order::where('status', 'confirmed')->count();
    $delivaredOrders = Order::where('status', 'delivared')->count();
    $canceledOrders = Order::where('status', 'canceled')->count();
    return view ('backend.dashboard', compact('allOrders', 'pendingOrders', 'confirmedOrders', 'delivaredOrders', 'canceledOrders'));
}
}
