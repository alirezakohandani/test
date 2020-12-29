<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    private $redis;

    public function __construct()
    {
        $this->redis = Redis::connection('default');
    }
     /**
     * store products (files) in session
     * 
     * return void
     */
    public function storeWithSession(Request $request)
    {
       
        $file_id = $request->file_id;

        $file = DB::table('files')->select(['*'])->where('id', '=', $file_id)->first();
    
        $cart = Session::get('cart');
        $cart[] = array(
            'id' => $file->id,
            'type' => $file->type,
            'title' => $file->title,
            'description' => $file->price,
            'price' => $file->price,
            'thumb' => $file->thumb,
            'link' => $file->link, 
        );

        Session::put('cart', $cart);
        Session::flash('success','محصول به سبد خرید اضافه شد');
        return redirect()->back();

    }
    /**
     * show cart PAGE
     * 
     * return void
     */
    public function display()
    {
         return view('layouts.cart', [
             'carts' => Session::get('cart'),
             'address' => 'http://localhost/laravel_project/storage/app/',
         ]);
       
    }
    /**
     * store products (files) in redis
     * 
     * return void
     */

    public function storeWithRedis(Request $request)
    {
        $file_id = $request->input('file_id');

        $cart = json_decode(Redis::get('cart:' . Auth::id()), true) ?? [];

        if(isset($cart[$file_id])) {
             $cart[$file_id] =  $cart[$file_id]+1;
        } else {
            $cart[$file_id] = 1;
        }

        Redis::set('cart:' . Auth::id(), json_encode($cart));

    }
    /**
     * display products (files) in shopping cart
     * 
     * return void
     */

    public function displayWithRedis(Request $request)
    {
        $files_in_cart = json_decode(Redis::get('cart:' . Auth::id()), true) ?? [];

        $files = array();

        foreach($files_in_cart as $k => $v)
        {
          $files[]  = File::find($k);
        }
        
        return view('layouts.cart', [
            'carts' => $files,
            'address' => 'http://localhost/laravel_project/storage/app/',
            'number' => $files_in_cart
        ]);

    }
    public function deleteWithRedis(Request $request)
    {
        $file_id = $request->id;
        
        $files_in_cart = json_decode(Redis::get('cart:' . Auth::id()), true) ?? [];

       

        unset($files_in_cart[$file_id]);

      
        Redis::set('cart:' . Auth::id(), json_encode($files_in_cart));

        return redirect()->back()->with('deleteWithRedis', 'hazf shod');


        
        
    }

}
