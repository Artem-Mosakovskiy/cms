<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;

class Posts extends Model
{
    public function comments(){
        return $this->hasMany('App\Comments');
    }
}
