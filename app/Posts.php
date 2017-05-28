<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comments;

class Posts extends AppModel
{
    protected $fillable = ['category_id', 'title', 'description', 'keywords', 'content', 'user_id'];

    protected $rules = [
        'category_id' => 'required|integer',
        'title' => 'required',
        'description' => 'required',
        'keywords' => 'required',
        'user_id' => 'required'
//        'content' => 'required'
    ];

    public function comments(){
        return $this->hasMany('App\Comments');
    }
}
