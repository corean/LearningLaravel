<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Category;
use App\Post;
use App\Http\Requests\PostFormRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('backend.posts.index', compact('posts'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.create', compact('categories'));
    }
    public function edit($id)
    {
        $post = Post::whereId($id)->FirstOrFail();
        $categories = Category::all();
        $selectedCategories = $post->categories->lists('id')->toArray();
        return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories'));
    }
    public function store(PostFormRequest $request)
    {
        $post = new Post([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => Str::slug($request->get('title'), '-'),
        ]);
        $post->save();
        $post->categories()->sync($request->get('categories'));

        return redirect('/admin/posts/create')->with('status', 'The post has been created!');
    }
    public function update($id, PostFormRequest $request)
    {
        $post = Post::whereId($id)->firstOrFail();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->slug = Str::slug($request->get('title'), '-');

        $post->save();
        $post->categories()->sync($request->get('categories'));

        return redirect(action('Admin\PostsController@edit', $post->id))->with('status', 'The post has been updated!');
    }

}
