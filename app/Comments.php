<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends AppModel
{
    public function post(){
        return $this->belongsTo('App\Posts', 'post_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
