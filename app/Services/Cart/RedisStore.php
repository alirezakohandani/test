<?php

namespace App\Services\Cart;

use App\Http\Controllers\Controller;
use App\Models\admin\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class RedisStore implements CartStore
{
    public function __construct()
    {
        $this->redis = Redis::connection('default');
    }
        /**
     * store products (files) in redis
     * 
     * return void
     */

    public function store(Request $request)
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

    public function show()
    {
        $files_in_cart = json_decode(Redis::get('cart:' . Auth::id()), true) ?? [];

        $files = array();

        foreach($files_in_cart as $k => $v)
        {
          $files[]  = File::find($k);
        }
        
        return [
            'files_in_cart' => $files_in_cart, 
            'files' => $files
        ];

    }
    public function destroy(Request $request)
    {
        $file_id = $request->id;
        
        $files_in_cart = json_decode(Redis::get('cart:' . Auth::id()), true) ?? [];

        unset($files_in_cart[$file_id]);

        Redis::set('cart:' . Auth::id(), json_encode($files_in_cart));
        
    }

    /**
     * clear all cart shopping 
     *
     * @return boolean
     */
    public function clear()
    {
        //To Do
         return true;
    }

}
