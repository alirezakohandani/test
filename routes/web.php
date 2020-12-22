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

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VerifyEmailController;
use App\Jobs\SendEmail;
use App\Mail\TopicCreated;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

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

// test route
Route::get('email', function() {

    //just test
    SendEmail::dispatch();
});



