<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'method_payment', 'gateway', 'refrence_code', 'amount', 'status'
    ];

    protected $attributes = [
        'status' => 0,
    ];

}
