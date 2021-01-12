<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * show products(file) in shop pages
     *
     * @return object
     */
    public function show()
    {
        define('THUMB_ADDR', 'http://localhost/laravel_project/storage/app/');
        $files = DB::table('files')->paginate(8);
        return view('layouts.shop', [
            'files' => $files,
            'address' => THUMB_ADDR,
        ]);
    }

     /**
     * show details products(file)
     *
     * @return object
     */
    public function showDetails(Request $request)
    {
        define('THUMB_ADDR', 'http://localhost/laravel_project/storage/app/');

        $file_id = $request->id;

        $file = File::where('id', $file_id)->first();
    
        return view('layouts.shopDetails', [
            'file' => $file,
            'address' => THUMB_ADDR,
        ]);
    }

    /**
     * Search products by description
     *
     * 
     * @return void 
     */
    public function search(Request $request)
    {
        $search = $request->input('s');
        $files = File::where('description', 'LIKE', "%{$search}%")->paginate(8);
        return view('layouts.shop', [
            'files' => $files,
            'address' => 'http://localhost/laravel_project/storage/app/',
        ]);
    }

    
}
