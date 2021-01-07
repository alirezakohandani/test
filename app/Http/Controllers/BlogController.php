<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function show()
    {
        $posts = Post::all();
        
        dd($posts->tags()->get());

        return view('layouts.blog', [
            'posts' => $posts,
        ]);
    }
}
