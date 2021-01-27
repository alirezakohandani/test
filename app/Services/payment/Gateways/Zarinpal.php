<?php

namespace App\Services\payment\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;

class Zarinpal implements GatewayInterface
{

    /**
     * payment
     *
     * @return void
     */
    public function pay(Order $order) 
    {
        dd('ues');
    }

    /**
     * Verify Payment
     *
     * @return boolean
     */
    public function verify(Request $request) 
    {
        return true;
    }

    /**
     * return Gateway name
     *
     * @return string
     */
    public function getName():string
    {
        return 'zarinPal';
    }

}