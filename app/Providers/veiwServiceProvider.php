<?php

namespace App\Providers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class veiwServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.cart', 'layouts.checkout'], function($view) {

            $files = Session::get('shopping_cart2');
            $total_price = 0;
            foreach ($files as $key => $value) {
               $total_price = $total_price + ($value['price'] * $value['count']);
            }

            $view->with('total_price', $total_price);
        });
    }
}
