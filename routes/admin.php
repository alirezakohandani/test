<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
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

//panel routes
Route::group(['prefix' => 'admin/', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
    Route::get('/', 'DashboardController')->name('dashboard');
    Route::get('file/upload', 'FileController@showFileForm')->name('file.form');
    Route::post('file/upload', 'FileController@store')->name('file.send');
    Route::post('file/upload/ajax', 'FileController@storeWithAjax')->name('file.send.ajax');
    Route::get('file/update/{id}', 'FileController@showUpdateForm')->name('file.form.update');
    Route::post('file/update', 'FileController@update')->name('file.update');
    Route::get('manage', 'FileController@showMange')->name('file.manage');
    Route::delete('manage/delete/{id}', 'FileController@delete')->name('file.delete');
    Route::get('post/upload', 'PostController@showPostFrom')->name('post.form');
    Route::post('post/upload', 'PostController@store')->name('post.send');
});

