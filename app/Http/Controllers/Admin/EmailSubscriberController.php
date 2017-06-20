<?php

namespace App\Http\Controllers\Admin;

use App\EmailSubscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class EmailSubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $subscribers = EmailSubscriber::all();
        return view('admin.subscribers.index', [
            'subscribers' => $subscribers
        ]);
    }
    
    public function delete($id){
        EmailSubscriber::findOrFail($id)->delete();

        Session::flash('message', 'Подписчик успешно удален');
        return redirect('/admin/subscribers');
    }

    public function mailIndex(){
        return view('admin.subscribers.send');
    }

    public function sendMail(Request $request){
        $emails = EmailSubscriber::pluck('email')->toArray();

        Mail::send('emails.subscribers', ['content' => $request->message], function ($message) use ($emails)
        {

            $message->from('blog@blog.com', 'Blog');
            $message->subject('Новости');
            $message->to($emails);

        });

        Session::flash('message', 'Письма отправлены');
        return redirect('/admin/subscribers');
    }
}
