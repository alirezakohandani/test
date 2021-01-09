<?php

namespace App\Services\Cart;

use App\Http\Controller\Front\CartInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SessionStore extends Controller
{
     /**
     * store products (files) in session
     * 
     * return void
     */
    public function store(Request $request)
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
    public function show()
    {
        $files = Session::get('cart');

       
        return [
            'files_in_cart' => null, 
            'files' => $files
        ];
       
    }

    public function destroy(Request $request)
    {

    }

}
