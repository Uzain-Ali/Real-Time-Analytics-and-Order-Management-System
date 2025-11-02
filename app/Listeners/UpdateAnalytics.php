<?php

namespace App\Listeners;

use App\Events\OrderPlaced;
use App\Services\AnalyticsService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateAnalytics implements ShouldQueue
{
    protected $analyticsService;

    public function __construct(AnalyticsService $analyticsService)
    {
        $this->analyticsService = $analyticsService;
    }

    public function handle(OrderPlaced $event)
    {
        $order = $event->order;

        // Run analytics updates
        $topDishes = $this->analyticsService->getTopDishes();
        $deliveryStats = $this->analyticsService->getAverageDeliveryTime();
        $peakHours = $this->analyticsService->getPeakHours();

        \Log::info('Analytics updated for order #' . $order->id, [
            'top_dishes' => $topDishes,
            'avg_delivery' => $deliveryStats,
            'peak_hours' => $peakHours
        ]);
    }
}
