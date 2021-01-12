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

        if ($carts == null) {
             $carts[$file->id] = array(
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
         
                
        } else {
            if (isset($carts[$file_id])) {
                $file_count = $carts[$file_id]['count'] ;
                $carts[$file_id] = array(
                    'id' => $file->id,
                    'type' => $file->type,
                    'title' => $file->title,
                    'description' => $file->price,
                    'price' => $file->price,
                    'thumb' => $file->thumb,
                    'link' => $file->link, 
                    'count' => $count + $file_count,
                );
            
                return Session::put('shopping_cart2', $carts);
            }
            else {
                $carts[$file_id] = array(
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
        }
    }

    /**
     * show cart PAGE
     * 
     * return void
     */
    public function show()
    {
      
        $files = Session::get('shopping_cart2');
        
        $files_in_cart = array();
        
        $total_price = 0;
        foreach($files as $k => $v)
        {
    
            $file_in_cart[$k] = $v['count'];

            $total_price = $total_price + ($v['price'] * $v['count']);
        }

        return [
            'files_in_cart' => $file_in_cart, 
            'files' => $files,
            'total_price' => $total_price,
            
        ];
       
    }

    public function destroy(Request $request)
    {
       $file_id = $request->id; 
       
       $request->session()->forget('shopping_cart2.' . $file_id);
    }
    public function clear()
    {
    
      return session()->forget('shopping_cart2');
       
    }
  

}
