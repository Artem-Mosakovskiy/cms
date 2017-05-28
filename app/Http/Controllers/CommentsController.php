<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{
    public function index()
    {
        $comments  = Comments::with('post', 'user')->get();

        return view('admin.comments.comments', [
            'comments' => $comments
        ]);
    }

    public function delete($id){
        Comments::findOrFail($id)->delete();
        return redirect('/admin/comments');
    }
}
