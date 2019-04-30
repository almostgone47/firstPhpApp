<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Comment;
use App\Category;
use App\CommentReply;

class AdminController extends Controller
{
    public function index(){

        $users = User::count();
        $posts = Post::count();
        $categories = Category::count();
        $comments = Comment::count();
        $replies = CommentReply::count();

        return view('admin/index', compact('users', 'posts', 'categories', 'comments', 'replies'));

    }
}
