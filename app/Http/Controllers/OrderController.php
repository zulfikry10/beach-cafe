<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        // $menuItems = Order::all();
        return view('manageOrder.cartList');
    }
}