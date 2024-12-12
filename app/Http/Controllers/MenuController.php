<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = Menu::all();
        return view('manageMenu.menu', compact('menuItems'));
    }
}