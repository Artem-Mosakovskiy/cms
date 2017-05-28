<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    public function index()
    {
        $posts  = Posts::all();
        return view('admin.posts.posts', [
            'posts' => $posts
        ]);
    }

    public function add(){
        $categories = Categories::pluck('category_name', 'id');

        return view('admin.posts.addPost', [
            'categories' => $categories->toArray()
        ]);
    }

    public function save(Request $request){

        $post = new Posts;

        if($post->validate($request->all())){
            $post->create($request->all());
            return redirect('/admin/posts');
        }

        return Redirect::back()->withErrors($post->errors());


    }

    public function edit(Request $request){
        $post = Posts::findOrFail($request->id);
        $categories = Categories::pluck('category_name', 'id');
        return view('admin.posts.editPost', [
            'post' => $post,
            'categories' => $categories->toArray()
        ]);
    }

    public function update(Request $request){
        $post = Posts::findOrFail($request->id);

        if($post->validate($request->all())){
            $post->fill($request->all());
            $post->save();
            return redirect('/admin/posts');
        }
        return Redirect::back()->withErrors($post->errors())->withInput();
    }

    public function delete($id){
        Posts::findOrFail($id)->delete();
        return redirect('/admin/posts');
    }
}
