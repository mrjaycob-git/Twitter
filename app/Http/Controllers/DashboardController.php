<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class DashboardController extends Controller
{
    public function index() 
    {
        Post::create([
            'content' => 'Hello world',
            'likes' => 1,
        ]);

        return view(
            'dashboard',
            [
                "posts" => Post::orderBy('likes', 'DESC')->get()
            ]
        );
    }
}
