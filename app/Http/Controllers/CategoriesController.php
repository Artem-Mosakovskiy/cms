<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories  = Categories::all();
        return view('admin.categories', [
            'categories' => $categories
        ]);
    }

    public function add(){
        return view('admin.addCategory');
    }

    public function save(Request $request){

        $category = new Categories;

        if($category->validate($request->all())){
            $category->create($request->all());
            return redirect('/admin/categories');
        }

        return Redirect::back()->withErrors($category->errors());


    }

    public function edit(Request $request){
        $category = Categories::findOrFail($request->id);
        return view('admin.editCategory', [
            'category' => $category
        ]);
    }

    public function update(Request $request){
        $category = Categories::findOrFail($request->id);

        if($category->validate($request->all())){
            $category->fill($request->all());
            $category->save();
            return redirect('/admin/categories');
        }
        return Redirect::back()->withErrors($category->errors())->withInput();
    }

    public function delete($id){
        Categories::findOrFail($id)->delete();
        return redirect('/admin/categories');
    }
}
