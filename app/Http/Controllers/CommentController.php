<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $post = Post::findOrFail($postId);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->post()->associate($post);
        $comment->save();

        return redirect()->route('dashboard.index')->with('success', 'Comment added successfully!');
    }
}
