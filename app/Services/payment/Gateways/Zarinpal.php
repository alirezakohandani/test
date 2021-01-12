<?php

namespace App\Services\payment\Gateways;

class Zarinpal implements GatewayInterface
{

    /**
     * payment
     *
     * @return void
     */
    public function pay() 
    {
        return true;
    }

    /**
     * Verify Payment
     *
     * @return boolean
     */
    public function verify() 
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
        return true;
    }

}