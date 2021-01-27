<?php

namespace App\Services\payment\Gateways;

use App\Models\Order;
use Illuminate\Http\Request;

interface GatewayInterface
{
    public function pay(Order $order);
    public function verify(Request $request);
    public function getName();
}