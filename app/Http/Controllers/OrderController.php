<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\OrderPlaced;
use App\Events\OrderUpdated;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $order = Order::create([
            'restaurant_id' => $request->restaurant_id,
            'user_id' => auth()->id(),
            'total_cost' => $request->total_cost,
            'order_time' => now(),
            'status' => 'pending',
        ]);

        event(new OrderPlaced($order));

        return response()->json(['message' => 'Order created', 'order' => $order]);
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => $request->status]);

        event(new OrderUpdated($order));

        return response()->json(['message' => 'Order updated']);
    }

    public function activeOrders()
    {
        $orders = Order::where('status', '!=', 'completed')
            ->where('order_time', '<=', now()->subMinutes(30))
            ->get();

        return response()->json($orders);
    }

}
