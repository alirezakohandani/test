<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
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

        alert()->success('پست با موفقیت بارگذاری شد.');
        
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

    public function showManage()
    {

        $posts = Post::withTrashed()->orderBy('id', 'DESC')->get();
        return view('admin.posts.postManage', [
            'posts' => $posts,
        ]);
    }

    public function delete(Post $post)
    {
        $post->delete();
        alert()->error('پست با موفقیت حذف شد');
        return redirect()->back();
    }

    public function softDelete($id)
    {
        Post::withTrashed()->where('id', $id)->restore();

        return redirect()->back();
    }
}
