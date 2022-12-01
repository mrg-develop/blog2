<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function posts() // lista todos los posts
    {

        return view('posts', [
            'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    public function post(Post $post) // abre un solo post 
    {
        return view('post', [
            'post' => $post
        ]);
    }

}
