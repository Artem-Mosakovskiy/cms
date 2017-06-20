<?php

namespace App\Http\Controllers\Admin;

use App\Pages;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(!User::hasRole(1)){
                return redirect()->back();
            }
            return $next($request);
        });
    }

    public function index()
    {
        $pages  = Pages::all();
        return view('admin.pages.pages', [
            'pages' => $pages,
        ]);
    }

    public function add(){
        return view('admin.pages.addPage');
    }

    public function save(Request $request){
        $this->validate($request, Pages::rules());

        $page = new Pages;
        $page = $page->create($request->except('_token'));

        Session::flash('message', 'Страница добавлена');
        return redirect('/admin/pages');
    }

    public function edit(Request $request){
        $page = Pages::findOrFail($request->id);

        return view('admin.pages.editPage', [
            'page' => $page
        ]);
    }

    public function update(Request $request){

        $post = Pages::findOrFail($request->id);

        $post->fill($request->all());
        $post->save();

        Session::flash('message', 'Страница обновлена');
        return redirect('/admin/pages');
    }

    public function delete($id){
        Pages::findOrFail($id)->delete();

        Session::flash('message', 'Страница удалена');
        return redirect('/admin/pages');
    }


}
