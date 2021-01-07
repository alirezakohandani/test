<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title'
    ];

    /**
     * Get the post that owns the tag
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
