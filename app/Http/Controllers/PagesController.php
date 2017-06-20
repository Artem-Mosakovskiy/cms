<?php

namespace App\Http\Controllers;

use App\Pages;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($slug){
        $page = Pages::whereSlug($slug)->first();
        if($page){
            return view('page', ['page' => $page]);
        }
        return redirect('/');
    }
}
