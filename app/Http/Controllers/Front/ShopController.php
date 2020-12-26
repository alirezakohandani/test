<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    
    public function show()
    {
        define('THUMB_ADDR', 'http://localhost/laravel_project/storage/app');
        $files = DB::table('files')->paginate(8);
        return view('layouts.shop', [
            'files' => $files,
            'address' => 'http://localhost/laravel_project/storage/app/'
        ]);
    }
}
