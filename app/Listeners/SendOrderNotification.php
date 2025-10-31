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
        // Send notification to the user
        $user->notify(new OrderNotification($event->order));
        }
}
