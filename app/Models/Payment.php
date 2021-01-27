<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'method_payment', 'gateway', 'refrence-code', 'amount', 'status'
    ];

    protected $attributes = [
        'status' => 0,
    ];

    public function isOnline()
    {
        return $this->method_payment;
    }
}
