<?php

namespace App\Http\Controllers;

use App\User;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile(){
        $user = Auth::user();
        return view('user.profile', ['user' => $user]);
    }

    public function update(Request $request){
        $this->validate($request, [
            'email' => 'email'
        ]);

        Auth::user()->name = $request->name;
        Auth::user()->email = $request->email;
        Auth::user()->save();

        $request->session()->flash('success', 'Your account has been updated.');

        return back();
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        $hashedPassword = $user->password;

        if (Hash::check($request->old_password, $hashedPassword)) {


            $user->password = Hash::make($request->password);
            $user->save();

            $request->session()->flash('success', 'Your password has been changed.');

            return back();
        }

        return back()->WithErrors('Your password has not been changed.');


    }

    public function uploadPhoto(Request $request){
        $logoDirectoryPath = 'uploads/users/avatar/';

        if ($request->hasFile('userPhoto')) {
            $file = $request->file('userPhoto');
            $image_name = str_random(6) .'.'. $file->getClientOriginalExtension();

            $file->move($logoDirectoryPath, $image_name);

            Image::make(sprintf($logoDirectoryPath . '%s', $image_name))->crop((int)$request->width,
                (int)$request->height, (int)$request->x, (int)$request->y)->save();

            Auth::user()->photo = $image_name;
            Auth::user()->save();

            echo sprintf('/'.$logoDirectoryPath . '%s', $image_name);
            exit;
        }
    }
}
