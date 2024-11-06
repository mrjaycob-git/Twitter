<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        request() -> validate([
            "content" => 'required|min:1|max:255'
        ]);
        
        $post = new Post();
        $post->content = $request->input('content');
        $post->likes = 0;
        $post->save();
        return redirect() -> route("dashboard.index") -> with("success", "Post was created");
    }

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect() -> route("dashboard.index") -> with("success", "Post was deleted");
    }

    public function show($postId)
    {
        $post = Post::findOrFail($postId);
        return view('posts.show', compact('post'));
    }

    public function update(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $post->content = request()->input('content');
        $post->save();

        return redirect() -> route("dashboard.index") -> with("success", "Post was edited");
    }
}