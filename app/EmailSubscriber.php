<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailSubscriber extends Model
{
    protected static function rules (){
        return [
            'email' => 'required|email',
            'user_name' => 'required|string',
        ];
    }
}
