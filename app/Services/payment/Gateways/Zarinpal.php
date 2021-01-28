<?php

namespace App\Services\payment\Gateways;

use App\Exceptions\PaymentException;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use SoapClient;

class Zarinpal implements GatewayInterface
{
    private $merchantId;
    private $callback;
    private $client;

    public function __construct()
    {
        $this->merchantId = config('payment.merchant_id');
        $this->callback = route('payment.verify', 'zarinpal');
        $this->client = new SoapClient('https://www.zarinpal.com/pg/services/WebGate/wsdl');
    }

    /**
     * payment
     *
     * @return void
     */
    public function pay(Order $order) 
    {

        $result = $this->client->PaymentRequest(
            [
                'MerchantID' => 'dfsdssf',
                'Amount' => 1000,
                'Description' => 'توضیحات در خصوص محصولات مختلف',
                'Email' => auth()->user()->email,
                'Mobile' => auth()->user()->cellphone,
                'CallbackURL' => $this->callback . '/?order=' . $order->id . '/',
            ]
        );
        
        if ($result->Status == 100) {

            $url = 'https://www.zarinpal.com/pg/StartPay/' . $result->Authority;
          
            return $url;
        }

        throw new PaymentException('zarinpal gateway connection error:' . $result->Status);

    }

    /**
     * Verify Payment
     *
     * @return boolean
     */
    public function verify(Request $request) 
    {
       
        if ($request->get('Status') == 'OK') {

            $result = $this->client->PaymentVerification([
                'MerchantID' => $this->merchantId,
                'Authority' => $request->get('Authority'),
                'Amount' => 1000,
            ]);
    
               
            if ($result->Status == 101) {

                return [
                    'order_id' => $request->get('zarinpal/?order'),
                    'ref_id' => $result->RefID,
                    'gateway' => 'zarinpal',
                ];
            }
    
        }
    }

}


