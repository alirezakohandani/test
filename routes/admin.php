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
Route::group(['prefix' => 'admin/panel'], function() {
    Route::get('/', 'admin\FileController@showPanel')->name('admin.dashboard');
    Route::get('file/upload', 'admin\FileController@showFileForm')->name('admin.file.form');
    Route::post('file/upload', 'admin\FileController@store')->name('admin.file.send');
    Route::post('file/upload/ajax', 'admin\FileController@storeWithAjax')->name('admin.file.send.ajax');
    Route::get('manage', 'admin\FileController@showMange')->name('admin.file.manage');
    Route::post('manage/delete', 'admin\FileController@delete')->name('admin.file.delete');
    Route::get('post/upload', 'admin\PostController@showPostFrom')->name('admin.post.form');
    Route::post('post/upload', 'admin\PostController@store')->name('admin.post.send');
});

