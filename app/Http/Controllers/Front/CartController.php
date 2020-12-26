<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
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
     * show cart page
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
}
