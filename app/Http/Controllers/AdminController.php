<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        $locations = Location::all();

        return view('dashboard', compact('locations'));
    }

    public function orderList()
    {
        $orders = Order::with(['schedule', 'schedule.trip', 'schedule.bus', 'seat', 'location', 'user'])->get();
        return view('order-list', compact('orders'));
    }
}
