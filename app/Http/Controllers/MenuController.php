<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menuItems = Menu::all();

        foreach ($menuItems as $menuItem) {
            if ($menuItem->picture) {
                $menuItem->picture = 'data:image/jpeg;base64,' . base64_encode($menuItem->picture);
            }
        }
        return view('manageMenu.menu', compact('menuItems'));
    }

    public function staffMenu()
    {
        $menuItems = Menu::all();

        foreach ($menuItems as $menuItem) {
            if ($menuItem->picture) {
                $menuItem->picture = 'data:image/jpeg;base64,' . base64_encode($menuItem->picture);
            }
        }

        return view('manageMenu.staffmenu', compact('menuItems'));
    }



    public function show(Menu $menu)
    {
        return view('manageMenu.viewmenu', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
        ]);

        $menu->update([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('staff-menu')->with('success', 'Menu item updated successfully.');
    }

    public function addMenu()
    {
        return view('manageMenu.addmenu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Convert the uploaded image to binary data
        $imageBinary = file_get_contents($request->file('image')->getRealPath());

        // Save the data to the database
        Menu::create([
            'name' => $request->name,
            'price' => $request->price,
            'status' => $request->status,
            'picture' => $imageBinary, // Store binary image data in LONG BLOB column
        ]);

        return redirect()->route('staff-menu')->with('success', 'Menu item added successfully.');
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('staff-menu')->with('success', 'Menu item deleted successfully.');
    }
}