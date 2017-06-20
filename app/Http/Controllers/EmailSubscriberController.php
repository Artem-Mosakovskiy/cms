<?php

namespace App\Http\Controllers;

use App\EmailSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EmailSubscriberController extends Controller
{
    public function subscribe(Request $request){
        $subscriber = new EmailSubscriber;
        
        $this->validate($request, EmailSubscriber::rules());

        $subscriber->email = $request->email;
        $subscriber->user_name = $request->user_name;
        $subscriber->save();

        return response('Спасибо за подписку')->withCookie(cookie('subscribe', 'true', 60*24*30));
    }
}
