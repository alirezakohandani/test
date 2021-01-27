<?php

namespace App\Services\payment;

use App\Models\Front\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Transaction
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function checkout()
    {
        $files = Session::get('shopping_cart2');


        $total_price = 0;
        foreach ($files as $key => $value) {
           $total_price = $total_price + ($value['price'] * $value['count']);
        }
        //crate Order
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'order_code' => rand(1000000, 100000000),
            'amount' => $total_price,
        ]);
        foreach ($files as $key => $value) {
            $order->files()->attach($key);
         }
         

        //create payment
        $payment = Payment::create([
            'order_id' => $order->id,
            'method_payment' => $this->request->method,
            'amount' => $order->amount,
        ]);
      
        if ($payment->isOnline()) {
            dd('onlineeeee');
        }
       
        Session::put('shopping_cart2', null);

        return $order;
        
        

    }
}