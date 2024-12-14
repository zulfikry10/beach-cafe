<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Menu;
use Illuminate\View\View; //provider for add to cart function
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //show order customization
    public function showCustomization($application)
    {
        $menu = Menu::findOrFail($application); // Use get() to return a collection, even if it's a single record
        // $datas = Menu::All()->find($application);
        // $data = Ticket::with('location')->find($application);
        // dd($menu);
        return view('manageOrder.orderCustomization', compact('menu'));
    }

    //show update customization
    public function updateCustomization($orderId)
    {
        $menus = OrderItems::with(['order', 'menu'])
            ->where('order_id', $orderId)
            ->get();

        if ($menus->isEmpty()) {
            return redirect()->route('order.cart')->with('error', 'No items found for this order.');
        }

        return view('manageOrder.editOrderCustomization', compact('menus'));
    }

    //update customization
    public function update(Request $request, $orderId)
    {
        // Update the items in the order based on the form data
        foreach ($request->input('order_quantity', []) as $menuId => $quantity) {
            $orderItem = OrderItems::find($menuId);
            if ($orderItem) {
                $orderItem->order_portion = $request->input("order_portion.$menuId");
                $orderItem->order_remark = $request->input("order_remark.$menuId");
                $orderItem->order_quantity = $quantity;
                $orderItem->save();
            }
        }

        return redirect()->route('order.cart')->with('success', 'Order updated successfully!');
    }

    //store order to cart
    // dd($request->all());
    public function storeToCart(Request $request)
{
    $validated = $request->validate([
        'menu_id' => 'required|exists:menus,id', // Ensure menu item exists
        'order_quantity' => 'required|integer|min:1',
        'order_portion' => 'nullable|string',
        'order_remark' => 'nullable|string',
        'order_total' => 'nullable|string',
    ]);

    // Check if an active order exists for the user
    $userId = Auth::id(); // Assuming the user is authenticated
    $order = Order::firstOrCreate(
        ['user_id' => $userId, 'order_status' => 'pending'],
        ['order_date' => now(), 'order_time' => now(), 'order_total' => 0]
    );

    try {
        // Find the menu item and calculate the total price
        $menu = Menu::findOrFail($validated['menu_id']);
        $totalPrice = $menu->price * $validated['order_quantity'];

        // Create order item
        OrderItems::create([
            'menu_id' => $validated['menu_id'],
            'order_id' => $order->id,
            'order_quantity' => $validated['order_quantity'],
            'order_portion' => $validated['order_portion'],
            'order_remark' => $validated['order_remark'],
        ]);

        // Update the order total
        $order->order_total += $totalPrice;
        $order->save();

        return redirect()->back()->with('success', 'Successfully Added to Cart.');
    } catch (\Exception $e) {
        // Log the error and return a user-friendly message
        return redirect()->back()->withErrors('Something went wrong. Please try again.');
    }
}



    //show cart list
    public function showCartList()
    {
        // $userId = auth()->id(); // Get the authenticated user ID
        $userId = 2; // Get the authenticated user ID

        // Retrieve all items for all pending orders for the user
        $cartItems = OrderItems::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('order_status', 'pending');
        })
            ->with('menu') // Include menu details
            ->get();

        return view('manageOrder.cartList', compact('cartItems'));
    }

    //checkout process
    public function checkout(Request $request)
    {
        // Hardcoding the user ID for now; replace with auth()->id() for production
        $userId = 2;

        // Retrieve the pending order for the user
        $order = Order::where('user_id', $userId)->where('order_status', 'pending')->first();

        if (!$order) {
            return redirect()->back()->with('error', 'No pending order found.');
        }

        $orderTotal = 0;

        // Loop through the items sent in the request to update quantities
        foreach ($request->input('cartItems', []) as $itemId => $quantity) {
            $orderItem = OrderItems::find($itemId);

            if ($orderItem) {
                // Update the order item's quantity
                $orderItem->order_quantity = $quantity;
                $orderItem->save();

                // Calculate the total price for this item
                $orderTotal += $orderItem->menu->price * $quantity;
            }
        }

        // Update the order total and status
        $order->order_total = $orderTotal;
        $order->order_status = 'pending';
        $order->save();

        // Redirect to the confirmation page
        return redirect()->route('order.confirmation')->with('success', 'Order updated successfully!');
    }

    //show confirmation
    public function showOrderConfirmation()
    {
        $userId = 2;

        $cartItems = OrderItems::whereHas('order', function ($query) use ($userId) {
            $query->where('user_id', $userId)->where('order_status', 'pending');
        })
            ->with('menu') // Include menu details
            ->get();

        return view('manageOrder.orderConfirmation', compact('cartItems'));
    }


    public function confirmOrder(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order || $order->order_status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Order not found or already processed.',
            ], 400); // Use a 400 status code for client error
        }

        // Update the order status
        $order->order_status = 'success';
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Order placed successfully!',
        ], 200); // Use a 200 status code for success
    }


    public function orderStatus($orderId)
    {
        // Attempt to find the order items by the given order ID
        $items = OrderItems::with('order')->where('order_id', $orderId)->get();

        // Check if any items were found
        if ($items->isEmpty()) {
            // Handle case where no order items are found, e.g., order doesn't exist
            return redirect()->route('orders.index')->with('error', 'Order not found.');
        }

        return view('manageOrder.orderStatus', compact('items'));
    }


    //delete existing order
    public function destroyOrder($application)
    {
        $order = OrderItems::find($application);

        if ($order) {
            $order->delete();
        }

        return redirect()->route('order.cart');
    }


    public function showHistory()
    {
        $userId = 2; // Get the authenticated user's ID

        // Fetch orders with their items and related menu data
        $orders = Order::where('user_id', $userId)
            ->with('items.menu') // Eager load items and menus
            ->get();

        // Redirect if no orders are found
        if ($orders->isEmpty()) {
            return redirect()->route('order.cart')->with('error', 'No orders found.');
        }

        // Pass the orders to the view
        return view('manageOrder.orderHistory', compact('orders'));
    }

    public function reorder(Request $request, $orderId)
    {
        // Find the original order
        $originalOrder = Order::with('items.menu')->findOrFail($orderId);

        // Create a new order for the user
        $newOrder = Order::create([
            'user_id' => 2, // Get the logged-in user's ID
            'order_status' => 'Success', // Set default status
            'order_total' => $originalOrder->items->sum(fn($item) => $item->order_quantity * $item->menu->price),
            'order_date' => now(),
            'order_time' => now(),
        ]);


        // Clone the items from the original order to the new order
        foreach ($originalOrder->items as $item) {
            OrderItems::create([
                'order_id' => $newOrder->id,
                'menu_id' => $item->menu_id,
                'order_portion' => $item->order_portion,
                'order_quantity' => $item->order_quantity,
                'order_remark' => $item->order_remark,
                'price' => $item->menu->price,
            ]);
        }

        // Redirect back with a success message
        return redirect()->route('order.history')->with('success', 'Order has been successfully reordered!');
    }

    public function reorderDestroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order) {
            $order->delete();
        }

        return redirect()->route('order.history')->with('success', 'Order deleted successfully.');
    }

    //staff

    public function showOrderList()

    {
        // Fetch orders from most recent to oldest with pagination
        $orders = Order::with('items.menu')->orderBy('created_at', 'desc')->paginate(10);

        return view('manageOrder.staffOrderList', compact('orders'));
    }

    public function showOrder($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);

        return view('manageOrder.staffOrderDetails', compact('order'));
    }
}
