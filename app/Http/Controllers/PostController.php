<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);
        
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

    public function update(Request $request, $postId)
    {
        $post = Post::findOrFail($postId);
        $post->setcontent($request->content);
        $post->save();

        return redirect()->route('dashboard')->with('success', 'updatelo ta jak ektor kurvu');
    }

    public function show($postId)
    {
        $post = Post::findOrFail($postId);
        
        return view('posts.show', compact('post'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $posts = Post::where('content', 'LIKE', '%' . $query . '%')->get();

        return view('dashboard', compact('posts'))->with('success', 'Výsledky vyhľadávania pre "' . $query . '"');
    }
}
