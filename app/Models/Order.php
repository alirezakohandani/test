<?php

namespace App\Models;

use App\Models\admin\File;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = 
    [
        'user_id',
        'order_code',
        'amount'
    ];

    public function files()
    {
        return $this->belongsToMany(File::class);    
    }
}
