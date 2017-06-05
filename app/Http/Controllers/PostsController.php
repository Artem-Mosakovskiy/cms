<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showPosts(){
        $posts = Posts::with('user')->paginate(2);
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function view($id){
        $post = Posts::with('user', 'comments')->findOrFail($id);

        return view('posts.view', [
            'post' => $post
        ]);
    }
}
