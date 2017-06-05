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
//       'content' => 'required'
    ];

    public function comments(){
        return $this->hasMany('App\Comments', 'post_id', 'id')->orderBy('created_at', 'desc');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function  scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }
}
