<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post as ResourcesPost;
use App\Models\Post;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesPost::collection(Post::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $this->validator($request);
        
       return Post::create([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ResourcesPost(Post::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validator($request);
        
        $post = Post::findOrFail($id);
        $post->update($request->all());

        return response()->json([
            'message' => 'updated'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return response()->json([
            "message" => "delete was sucessfull",
        ], 200);
    }

    public function search(Request $request)
    {
      $parameter = $request->input('s');
      $posts = DB::table('posts')->select(['*'])
      ->where('description', 'LIKE', "%{$parameter}%")
      ->get();
      return response()->json([
        'test' => $posts,
      ]); 
    }

    public function searchWithQueryString($search)
    {
  
        $posts = DB::table('posts')->select(['*'])
        ->where('description', 'LIKE', "%{$search}%")->
        get();

        return ResourcesPost::collection($posts);
          
    }

    public function searchWithOutQueryString(Request $request)
    {
        $search = $request->input('search');
        
        $posts = DB::table('posts')->select(['*'])->where('description', 'LIKE', "%{$search}%")->get();
        
        return ResourcesPost::collection($posts);
    }
    protected function validator(Request $request)
    {   
        $request->validate([
            'user_id' => ['requierd'],
            'title' => ['requierd'],
            'description' => ['requierd'],
        ]);
    }
}
