<?php

namespace App\Services\payment;

use App\Models\Front\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Services\payment\Gateways\GatewayInterface;
use App\Services\payment\Gateways\Zarinpal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Transaction
{
    private $request;
    private $gateway;

    public function __construct(Request $request, GatewayInterface $gateway)
    {
        $this->request = $request;
        $this->gateway = $gateway;
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
      
        if ($this->request->method == 'online') {
            switch ($this->request->gateway)
            {
                case 'zarinpal':
                    $zarinpal = new Zarinpal();
                    return $zarinpal->pay($order);
                    break;
                case 'saman';
                    // To Do    
            } 
            
            Session::put('shopping_cart2', null);
       
            return $order;
            
        }

    }
    public function verify(Request $request)
    {
        $result = $this->gateway->verify($request);
      
        $payment = Payment::where('order_id', $request['zarinpal/?order'])->first();

        $payment->gateway = 'zarinpal';

        $payment->refrence_code = $result['ref_id'];
       
        $payment->status = 1;

        $payment->save();

    }
 
}