<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
    Route::get('register', 'RegisterController@showRegisterForm')->name('auth.register.form');
    Route::post('register', 'RegisterController@register')->name('auth.register');
    Route::get('login', 'LoginController@showLoginForm')->name('auth.login.form');
    Route::post('login', 'LoginController@login')->name('auth.login');
    Route::get('logout', 'LoginController@logout')->name('auth.logout');
    Route::get('send/email/verificarion', 'VerificationController@send')->name('send.verify.email');
});    
Route::get('email/verify/{token}', 'Account\FinalVerificationController@verify')->name('email.verify');


// shop routes
Route::group(['prefix' => 'shop'], function() {
    Route::get('/', 'Front\ShopController@show')->name('shop');
    Route::get('/search', 'Front\ShopController@search')->name('shop.search');
});

//shopping Cart routes
Route::group(['prefix' => 'cart', 'namespace' => 'Front'], function () {
    
    Route::post('/redis', 'CartController@store')->name('cart.redis.store');  
    Route::get('/redis/show', 'CartController@show')->name('cart.redis.show');  
    Route::post('/redis/destroy', 'CartController@destroy')->name('cart.redis.destroy');
    
});

