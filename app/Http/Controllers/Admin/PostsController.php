<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use App\Posts;
use Illuminate\Support\Facades\File;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*Admin functions*/

    public function index()
    {
        $posts  = Posts::all();
        return view('admin.posts.posts', [
            'posts' => $posts,
            'title' => 'Статьи'
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

    public function search(){
        $string = Input::get('string');
        $posts = Posts::like('title', $string)->get();
        return view('admin.posts.posts', [
            'posts' => $posts,
            'title' => 'Поиск'
        ]);
    }

    public function ajaxUploadImg(Request $request)
    {
        if($request->isMethod('post')){
            if ($request->hasFile('user_photo')) {
                $file = $request->file('user_photo');

                $fileName = rand(1000, 100000) . $file->getClientOriginalName();

                $file->move('uploads/images/', $fileName);

                echo $request->root() . '/uploads/images/' . $fileName;
            }
        }
        exit;
    }

    public function ajaxDeleteImages(Request $request){

        foreach ($request->get('photos') as $src){
            $src = str_replace($request->root() . '/', '', $src);
            $src = public_path() . '/' . $src;

            if(File::isFile($src)){
                File::delete($src);
            }

        }
        echo 'success';
        exit;
    }
}
