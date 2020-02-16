<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Driver;
use App\Truck;
use App\Customer;
use App\Order;

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

        view()->share('g_drivers', Driver::where('status', 1)->count());
        view()->share('g_trucks', Truck::all()->count());
        view()->share('g_customers', Customer::all()->count());
        view()->share('g_orders', Order::all()->count());

    }
}
