<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Comments;
use App\Http\Controllers\Controller;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\File;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use PhpParser\Comment;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*Admin functions*/

    public function index()
    {
        $active = 1;
        if(Input::get('moderate') == true){
            $active = 0;
        }
        $posts  = Posts::with('user','category')->where('active', $active)->get();
        
        return view('admin.posts.posts', [
            'posts' => $posts,
            'title' => 'Статьи'
        ]);
    }

    public function add(){
        $categories = Categories::where('deleted' , 0)->pluck('category_name', 'id');

        return view('admin.posts.addPost', [
            'categories' => $categories->toArray()
        ]);
    }

    public function save(Request $request){

        $post = new Posts;

        if($post->validate($request->all())){

            $post = $post->create($request->all());
            if(User::hasRole(1)){
                $post->active = 1;
                $post->save();
            }

            return redirect('/admin/posts');
        }

        return Redirect::back()->withErrors($post->errors());


    }

    public function edit(Request $request){
        $post = Posts::findOrFail($request->id);

        $categories = Categories::where('deleted' , 0)->pluck('category_name', 'id');

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
        if(User::hasRole(1)){
            Posts::findOrFail($id)->delete();
            Comments::where('post_id', $id)->delete();
            return redirect('/admin/posts');
        }
        return Redirect::back();
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

    /* functions for moderatiing posts */
    public function activatePost($id){
        if(User::hasRole(1)){
            $post = Posts::findOrFail($id);
            $post->active = 1;
            $post->save();
            return redirect('/admin/posts');
        }
        return Redirect::back();
    }

    public function preview($id){
        $post = Posts::findOrFail($id);
        $categories = Categories::where('deleted' , 0)->pluck('category_name', 'id');

        return view('admin.posts.preview', [
            'post' => $post,
            'categories' => $categories->toArray()
        ]);
    }

}
