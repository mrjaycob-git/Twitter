<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $searchTerm = request()->get('search', '');
            $posts = $posts->where('content', 'like', '%' . $searchTerm . '%');
        }

        return view(
            'dashboard',
            [
                'posts' => $posts->paginate(5),
            ]
        );
    }
}
