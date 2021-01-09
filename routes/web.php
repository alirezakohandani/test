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

//shoppingCart routes
Route::group(['prefix' => 'cart'], function () {
    Route::post('/', 'Front\CartController@storeWithSession')->name('cart');    
    Route::get('/display', 'Front\CartController@display')->name('cart.show');
    Route::post('/redis', 'Front\CartController@storewithRedis')->name('cart.redis');  
    Route::get('/redis/display', 'Front\CartController@displayWithRedis')->name('cart.show.redis');  
    Route::post('/redis/delete', 'Front\CartController@deleteWithRedis')->name('cart.redis.delete');
});

