<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Magiclink extends Model
{
    protected $fillable = [
        'user_id',
        'link',
    ];
}
