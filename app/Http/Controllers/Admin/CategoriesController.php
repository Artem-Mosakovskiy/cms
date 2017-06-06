<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\Http\Controllers\Controller;
use App\User;
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
        $categories  = Categories::orderBy('deleted')->get();
        return view('admin.categories.categories', [
            'categories' => $categories
        ]);
    }

    public function add(){
        return view('admin.categories.addCategory');
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
        return view('admin.categories.editCategory', [
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
        if(User::hasRole(1)){
            $category = Categories::findOrFail($id);

            if($category->deleted == 0){
                $category->deleted = 1;
            }
            else {
                $category->deleted = 0;
            }

            $category->save();
            return redirect('/admin/categories');
        }
        return Redirect::back();
    }
}
