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
Route::group(['prefix' => 'admin/', 'namespace' => 'Admin'], function() {
    Route::get('/', 'DashboardController')->name('admin.dashboard');
    Route::get('file/upload', 'FileController@showFileForm')->name('admin.file.form');
    Route::post('file/upload', 'FileController@store')->name('admin.file.send');
    Route::post('file/upload/ajax', 'FileController@storeWithAjax')->name('admin.file.send.ajax');
    Route::get('manage', 'FileController@showMange')->name('admin.file.manage');
    Route::delete('manage/delete/{id}', 'FileController@delete')->name('admin.file.delete');
    Route::get('post/upload', 'PostController@showPostFrom')->name('admin.post.form');
    Route::post('post/upload', 'PostController@store')->name('admin.post.send');
});


