<?php

namespace App\Services\payment\Gateways;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SoapClient;

class Zarinpal implements GatewayInterface
{
    private $merchantId;
    private $callback;

    public function __construct()
    {
        $this->merchantId = config('payment.merchant_id');
        $this->callback = route('payment.verify', 'zarinpal');
    }

    /**
     * payment
     *
     * @return void
     */
    public function pay(Order $order) 
    {
        $client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl');

        $result = $client->PaymentRequest(
            [
                'MerchantID' => $this->merchantId,
                'Amount' => $order->amount,
                'Description' => 'توضیحات در خصوص محصولات مختلف',
                'Email' => auth()->user()->email,
                'Mobile' => auth()->user()->cellphone,
                'CallbackURL' => $this->callback,
            ]
        );
        

        if ($result->Status == 100) {

            $url = 'https://www.zarinpal.com/pg/StartPay/' . $result->Authority;
          
            return $url;

        }

    }

    /**
     * Verify Payment
     *
     * @return boolean
     */
    public function verify(Request $request) 
    {
       
    }

}


