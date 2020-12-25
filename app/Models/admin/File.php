<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected  $fillable = [
       'type', 'title', 'description', 'price', 'thumb', 'link'
    ];
}
