<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\payment\Gateways\GatewayInterface;
use App\Services\payment\Gateways\Zarinpal;
use App\Services\payment\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }
 
    public function verify(Request $request)
    {
        $this->transaction->verify($request);

        return redirect()->route('shop')->with('success_payment', true);

    }
}
