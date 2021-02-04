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
            $totalPrice = array_reduce($files, function($totalPrice, $file) {

                return $totalPrice += $file['price'] * $file['count'];
               
            }, 0);
            return $view->with('total_price', $totalPrice);
        });
    }
}
