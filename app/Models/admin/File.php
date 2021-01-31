<?php

namespace App\Models\admin;

use App\Models\Order;
use App\traits\deletable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{

    use SoftDeletes;
    use deletable;

    protected  $fillable = [
       'type', 'title', 'description', 'price', 'thumb', 'link'
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
