<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class PostsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function showPosts(){
        $posts = Posts::with('user')->where('active', 1)->paginate(3);
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

    public function search(){
        $string = Input::get('string');
        $posts = Posts::like('title', $string)->paginate(3);
        return view('posts.index', [
            'posts' => $posts,
            'title' => 'Поиск'
        ]);
    }

    public function category($id){
        $posts = Posts::with('user')->where('category_id', $id)->paginate(2);
        $category = Categories::findOrFail($id);
        return view('posts.index', [
            'posts' => $posts,
            'title' => $category->category_name
        ]);
    }
}
