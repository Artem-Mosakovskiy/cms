<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Categories extends AppModel
{
    protected $fillable = ['category_name', 'category_description'];

    protected $rules = [
      'category_name' => 'required',
      'category_description' => 'required'
    ];

    public function posts(){
        return $this->hasMany('App\Posts');
    }
}
