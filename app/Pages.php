<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    protected $fillable = ['description', 'keywords', 'content','title', 'slug'];
    public static function rules(){
        return [
            'description' => 'required',
            'keywords' => 'required',
            'content' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:pages',
        ];
    }

    public static function getPages(){
        return self::all();
    }
}
