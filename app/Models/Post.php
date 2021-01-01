<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $fillable = [
        'user_id','title','description','image',
    ];

    /**
     * Get the user that owns the post.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the tag that owns the post.
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
