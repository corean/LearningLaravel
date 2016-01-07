<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class blogController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('blog.index', compact('posts'));
    }
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->FirstOrFail();
        $comments = $post->comments()->get();
        return view('blog.show', compact('post','comments'));
    }
}
