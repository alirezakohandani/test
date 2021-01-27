<?php

namespace App\Models\admin;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected  $fillable = [
       'type', 'title', 'description', 'price', 'thumb', 'link'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
