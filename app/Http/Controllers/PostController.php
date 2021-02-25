<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('guests.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        // dd($post);
        return view('guests.show', compact('post'));
    }
}
