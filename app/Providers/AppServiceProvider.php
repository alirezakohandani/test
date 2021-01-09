<?php

namespace App\Providers;

use App\Services\Cart\CartStore;
use App\Services\Cart\RedisStore;
use App\Services\Cart\SessionStore;
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
        switch (config('cart.driver')) {
            case 'redis':
                $this->app->bind(CartStore::class, RedisStore::class);
                break;
            case 'session':
                $this->app->bind(CartStore::class, SessionStore::class);
                break;
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
