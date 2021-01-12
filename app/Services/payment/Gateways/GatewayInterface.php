<?php

namespace App\Services\payment\Gateways;

interface GatewayInterface
{
    public function pay();
    public function verify();
    public function getName():string;
}