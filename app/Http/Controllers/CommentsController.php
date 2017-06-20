<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function ajaxAddComment(Request $request){
        $comment = new Comments;
        $comment->post_id = $request->id;
        $comment->user_id = Auth::id();
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json([
            'status' => 'success',
            'comment' => $comment,
            'user' => Auth::user()
        ]);
    }
}
