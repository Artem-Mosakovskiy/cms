<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public $statuses = [];

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(!User::hasRole(1)){
                return redirect()->back();
            }
            return $next($request);
        });
        $this->statuses = DB::table('user_statuses')->pluck('status', 'id');
    }

    public function index(){
        $users = User::with('status')->where('id', '!=', Auth::id())->get();

        return view('admin.users.index',[
            'users' => $users,
            'statuses' => $this->statuses
        ]);
    }

    public function preview($id){
        $user = User::whereId($id)->first();
        return view('admin.users.preview',[
            'user' => $user,
            'statuses' => $this->statuses
        ]);
    }

    public function save(Request $request){
        $user = User::whereId($request->id)->first();

        $user->status_id = $request->status;
        $user->save();

        return redirect('/admin/users');
    }

    public function delete($id){
        User::findOrFail($id)->delete();
        return redirect('/admin/users');
    }
    
    public function ajaxGetUsers(Request $request){
        $users = User::where('users.id', '!=', Auth::id());

        if(!$request->status == 0){
            $users->where('users.status_id', $request->status);
        }

        $users->join('user_statuses','users.status_id', 'user_statuses.id')
            ->select('users.id', 'users.name', 'users.email', 'user_statuses.status');

        $titles[] = ['#', 'Имя', 'Email','Статус','Действия'];

        $actions = '/admin/users/preview/';

        return json_encode([
            'data' => $users->get(),
            'titles' => $titles,
            'actions' => $actions
        ]);
    }
}
