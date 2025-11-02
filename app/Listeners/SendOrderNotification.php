<?php

namespace App\Listeners;
use App\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use App\Notifications\OrderNotification;

class SendOrderNotification
{

    public function handle(OrderPlaced $event): void
    {
        $user = $event->order->user;

        if ($user) {
            $user->notify(new OrderNotification($event->order));
        } else {
            \Log::warning('No user found for order ID: ' . $event->order->id);
        }
    }
}
