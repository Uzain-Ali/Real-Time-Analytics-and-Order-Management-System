<?php

namespace App\Providers;
use App\Services\PaymentService;
use Illuminate\Support\Facades\Event;
use App\Events\OrderPlaced;
use App\Listeners\SendOrderNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('PaymentService', function ($app) {
            return new PaymentService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Event-Listener registration can be done here if not using EventServiceProvider
        Event::listen(
            OrderPlaced::class,
            [SendOrderNotification::class, 'handle']
        );
    }
}
