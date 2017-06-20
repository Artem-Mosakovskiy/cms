<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Comments;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\In;

class PostsController extends Controller
{
    public $comments = [];
    public function __construct()
    {
        parent::__construct();
        $this->comments = Comments::take(3)->with('user', 'post')->get();
        View::share('comments', $this->comments);
        // sortByDesc('created_at')->take(3)
    }

    public function showPosts(Request $request){
        $posts = Posts::with('user', 'comments', 'category')->where('active', 1)->paginate(2);

        if($request->ajax()){
            return response()->json([
                'posts' => $posts,
            ]);
        }

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
        $posts = Posts::with('user', 'comments', 'category')->like('title', $string)->paginate(3);
        return view('posts.index', [
            'posts' => $posts,
            'title' => 'Поиск',
        ]);
    }

    public function category($id){
        $posts = Posts::with('user', 'comments', 'category')->where('category_id', $id)->paginate(3);
        $category = Categories::findOrFail($id);
        return view('posts.index', [
            'posts' => $posts,
            'title' => $category->category_name,
        ]);
    }
}
