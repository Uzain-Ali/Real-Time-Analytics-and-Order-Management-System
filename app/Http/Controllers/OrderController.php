<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderPlaced;
use App\Models\Order;
use App\Models\User;

class OrderController extends Controller
{
    public function placeOrder(Request $request)
    {
        $user = auth()->user();
        $amount = 5000;

        // Step 1: Process payment 
        $payment = app('PaymentService');
        $msg = $payment->process($amount);

        // Step 2: Create order record
        $order = Order::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'status' => 'paid'
        ]);

        // Step 3: Fire OrderPlaced event
        event(new OrderPlaced($order));

        return response()->json([
            'message' => $msg,
            'order' => $order
        ]);

    }
}
