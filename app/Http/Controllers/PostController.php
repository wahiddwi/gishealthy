<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::paginate(10);
        return view('post.index', compact('post'));
    }

    public function artikelDetail($id)
    {
        $singlePost = Post::findOrFail($id);
        return view('post.singlePost', compact('singlePost'));
    }
}
