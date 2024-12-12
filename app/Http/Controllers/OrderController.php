<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function showCartList()
    {
        // $menuItems = Order::all();
        return view('manageOrder.cartList');
    }

    public function showCofirmOrder()
    {
        // $menuItems = Order::all();
        return view('manageOrder.orderConfirmation');
    }

    public function showCustomization()
    {
        // $menuItems = Order::all();
        return view('manageOrder.orderCustomization');
    }
    public function showHistory()
    {
        // $menuItems = Order::all();
        return view('manageOrder.orderHistory');
    }
    public function showStatus()
    {
        // $menuItems = Order::all();
        return view('manageOrder.orderStatus');
    }

    
    
}