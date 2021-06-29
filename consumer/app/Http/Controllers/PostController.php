<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show($slug)
    {
        return view('post', [
           'post' => Post::where('slug', '=', $slug)->first()
       ]);
    }

    public function store(Request $request)
    {
        Post::create($request->only([
           'title',
           'body',
           'slug',
       ]));

        return response()->json([
            "result" => "ok"
        ], 201);
    }

    public function update(Request $request, $postId)
    {
        $post = Post::find($postId);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->slug = $request->slug;
        $post->save();
 
        return response()->json(["result" => "ok"], 201);
    }

    public function destroy($postId)
    {
        $post = Post::find($postId);
        $post->delete();

        return response()->json(["result" => "ok"], 200);
    }
}
