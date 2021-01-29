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
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group(['prefix' => 'auth', 'namespace' => 'Auth', 'as' => 'auth.'], function() {
    Route::get('register', 'RegisterController@showRegisterForm')->name('register.form');
    Route::post('register', 'RegisterController@register')->name('register');
    Route::get('login', 'LoginController@showLoginForm')->name('login.form');
    Route::post('login', 'LoginController@login')->name('login');
    Route::get('logout', 'LoginController@logout')->name('logout');
    Route::get('send/email/verificarion', 'VerificationController@send')->name('send.verify.email');
    Route::get('login/magic', 'MagicController@show')->name('login.form.magic');
    Route::post('login/magic', 'MagicController@login')->name('login.magic');
    Route::get('login/magic/{token}', 'MagicController@check')->name('login.magic.check');
});    
Route::get('email/verify/{token}', 'Account\FinalVerificationController@verify')->name('email.verify');


// shop routes
Route::group(['prefix' => 'shop'], function() {
    Route::get('/', 'Front\ShopController@show')->name('shop');
    Route::get('/details/{id}', 'Front\ShopController@showDetails')->name('shop.show.details');
    Route::get('/search', 'Front\ShopController@search')->name('shop.search');
});

//shopping Cart routes
Route::group(['prefix' => 'cart', 'namespace' => 'Front', 'as' => 'cart.'], function () {
    
    Route::post('/', 'CartController@store')->name('store');  
    Route::get('/show', 'CartController@show')->name('show');  
    Route::post('/destroy', 'CartController@destroy')->name('destroy');
    Route::post('/clear', 'CartController@clear')->name('clear');
    Route::get('/checkout', 'CartController@checkoutForm')->name('checkout.form');
    Route::post('checkout', 'CartController@checkout')->name('checkout');
    
});

Route::any('payment/callback/', 'PaymentController@verify')->name('payment.verify');

// Route::get('test', function(Request $request){

//     // $value = $request->session()->flash('status', 'successfull');
//     $request->session()->forget('carts');
//     dd(session()->all());
// });

