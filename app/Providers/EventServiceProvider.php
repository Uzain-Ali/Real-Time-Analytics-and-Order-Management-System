<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\OrderPlaced;
use App\Listeners\UpdateAnalytics;


class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        OrderPlaced::class => [
            UpdateAnalytics::class,
        ],
    ];


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
