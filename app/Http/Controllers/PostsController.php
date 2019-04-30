<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::paginate(3);
        
        $categories = Category::all();

        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments()->whereIsActive(1)->get();

        $categories = Category::all();

        return view('posts.show', compact('post', 'comments', 'categories'));
    }
}
