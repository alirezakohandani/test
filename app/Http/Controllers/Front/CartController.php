<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Cart\CartStore;
use App\Services\payment\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
   protected $cart;

   public function __construct()
   {
      $this->middleware('auth');
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
      'number' => $data['files_in_cart'],
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

   public function checkoutForm()
   {
      return view('layouts.checkout');
   }

   public function checkout(Request $request, Transaction $transaction)
   {

      $request->validate([
         'method' => 'required',
         'gateway' => 'required_if:method,online'
      ]);

      $order = $transaction->checkout();
  
      if ($request->method == 'online') {
         
        return redirect()->away($order);
      }

      return redirect()->route('shop')->with('success_payment', true);

   }

}
