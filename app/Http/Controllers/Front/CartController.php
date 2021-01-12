<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Cart\CartStore;
use Illuminate\Http\Request;

class CartController extends Controller
{
   protected $cart;

   public function __construct()
   {
      $this->cart = app(CartStore::class);
   }

   public function store(Request $request)
   {
    
   $this->cart->store($request); 

   return redirect()->back()->with('successInsertStore', 'محصول به سبد خرید اضافه شد.'); 
  
   }

   public function show() {
  
     $data = $this->cart->show();

    if ($data === 0) {

       return redirect()->back()->with('emptyCart', 'سبد خرید خالی است.');
       
    }

     return view('layouts.cart', [
      'carts' => $data['files'],
      'address' => 'http://localhost/laravel_project/storage/app/',
      'number' => $data['files_in_cart'],
      'total_price' => $data['total_price'],
      'shipment' => 20000,

     
  ]);

   }
   public function destroy(Request $request)
   {
   
      $this->cart->destroy($request);

      return redirect()->back()->with('deleteWithRedis', 'محصول از سبد خرید حذف شد.');
   }

   public function clear()
   {
    
      $this->cart->clear();
      return redirect()->route('shop')->with('deleteCart', 'سبد خرید شما خالی است.');
   }
}
