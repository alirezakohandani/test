<?php

use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function() {
    Route::resource('posts', 'PostController');
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('search/{search}', 'postController@searchWithQueryString');
    Route::get('search', 'postController@search');
    Route::post('search', 'postController@searchWithOutQueryString');
});
Route::group(['middleware' => 'api','prefix' => 'auth/v1'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});