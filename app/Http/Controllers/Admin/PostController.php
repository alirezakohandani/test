<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Show Insert Post From
     */
    public function showPostFrom()
    {
         return view('admin.posts.PostUpload');
    }

    public function store(Request $request)
    {   
        $this->validator($request);
        $posts = auth()->user()->posts()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'testttt',
        ]);
        
        $posts->tags()->attach($request->input('tags'));
        return redirect()->back();
    }

    protected function validator(Request $request)
    {
        return $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'image' => ['required'],
        ]);

    }
}
