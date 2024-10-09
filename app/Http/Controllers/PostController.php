<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $post = new Post();
        $post->setContent($request->content);
        $post->likes = 0;
        $post->save();

        return redirect()->route('dashboard')->with('success', 'Okrrrrrrrr');
    }

    public function destroy($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();
        return redirect()->route('dashboard')->with('success', 'Vymazalo ta jak rytmus komentare');
    }
}
