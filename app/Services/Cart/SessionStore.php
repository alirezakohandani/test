<?php

namespace App\Services\Cart;

use App\Http\Controller\Front\CartInterface;
use App\Http\Controllers\Controller;
use Countable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SessionStore implements CartStore //Countable
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
    
        $carts = Session::get('shopping_cart2');
     
        $count = 1;

    if ($carts !== null) {
        for ($i=0; $i <sizeof($carts) ; $i++) { 
            if ($carts[$i]['id'] == $file_id) {
                $count = $carts[$i]['count'];
                $carts[$i] = array(
                    'id' => $file->id,
                    'type' => $file->type,
                    'title' => $file->title,
                    'description' => $file->price,
                    'price' => $file->price,
                    'thumb' => $file->thumb,
                    'link' => $file->link, 
                    'count' => $count + 1,
                );
                return Session::put('shopping_cart2', $carts);
            }
        }
    }
    
        $carts[] = array(
            'id' => $file->id,
            'type' => $file->type,
            'title' => $file->title,
            'description' => $file->price,
            'price' => $file->price,
            'thumb' => $file->thumb,
            'link' => $file->link, 
            'count' => $count,
        );
      
        Session::put('shopping_cart2', $carts);
    }

    /**
     * show cart PAGE
     * 
     * return void
     */
    public function show()
    {
      
        $files = Session::get('shopping_cart2');
       
        return [
            'files_in_cart' => null, 
            'files' => $files
        ];
       
    }

    public function destroy(Request $request)
    {
       $file_id = $request->id; 

      // $request->session()->forget('shopping_cart1.product' . $file_id);
       $carts = $request->session()->pull('shopping_cart2', []);

        for ($i=0; $i <count($carts) ; $i++) { 
            if (array_search($file_id, $carts[$i]) !==false) {
              unset($carts[$i]);
              $request->session()->put('shopping_cart2', $carts);
              break;
            } 

        }
    }
    public function clear()
    {
    
      return session()->forget('shopping_cart2');
       
    }
  

}
