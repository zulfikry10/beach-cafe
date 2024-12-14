<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Order;
use App\Models\OrderItems;

class CartComposer
{
    public function compose(View $view)
    {
        $userId = 2; // Get the authenticated user ID
        $pendingOrder = Order::where('user_id', $userId)->where('order_status', 'pending')->first();

        $cartItemCount = $pendingOrder ? OrderItems::where('order_id', $pendingOrder->id)->count() : 0;

        $view->with('cartItemCount', $cartItemCount);
    }
}
