<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;

class Posts extends AppModel
{
    public function comments(){
        return $this->hasMany('App\Comments');
    }
}
