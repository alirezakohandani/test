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

Route::group(['prefix' => 'admin/panel'], function() {
    Route::get('/', 'admin\FileController@showPanel')->name('admin.dashboard');
    Route::get('file/upload', 'admin\FileController@showFileForm')->name('admin.file.form');
    Route::post('file/upload', 'admin\FileController@send')->name('admin.file.send');
    Route::get('manage', 'admin\FileController@showMange')->name('admin.file.manage');
    Route::post('manage/delete', 'admin\FileController@delete')->name('admin.file.delete');
});

