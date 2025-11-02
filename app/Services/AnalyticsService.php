<?php

namespace App\Services;

use App\Models\Dish;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;  

class AnalyticsService
{
    /**
     * Calculate top 5 dishes for each restaurant
     */
    public function getTopDishes()
    {
        return Dish::select('restaurant_id', 'name', 'popularity_score')
            ->orderByDesc('popularity_score')
            ->get()
            ->groupBy('restaurant_id')
            ->map->take(5);
    }

    /**
     * Calculate average delivery time (daily and weekly)
     */
    public function getAverageDeliveryTime()
    {
        $daily = Delivery::whereDate('created_at', Carbon::today())->avg('estimated_duration');
        $weekly = Delivery::whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])->avg('estimated_duration');

        return [
            'daily_average' => round($daily ?? 0, 2),
            'weekly_average' => round($weekly ?? 0, 2),
        ];
    }

    /**
     * Determine peak order hours
     */
    public function getPeakHours()
    {
        return Order::select(
            DB::raw('HOUR(order_time) as hour'),
            DB::raw('COUNT(*) as total_orders')
        )
            ->groupBy('hour')
            ->orderByDesc('total_orders')
            ->limit(5)
            ->get();
    }
}
