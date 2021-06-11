<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Ticket;
use App\Observers\OrderObserver;
use App\Observers\TicketObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Ticket::observe(TicketObserver::class);
        Order::observe(OrderObserver::class);
    }
}
