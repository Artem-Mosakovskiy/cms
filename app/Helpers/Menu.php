<?php

namespace App\Helpers;
class Menu
{
    public static function active($path){
        if(str_contains(strtolower(request()->path()), $path)){
            return 'current';
        }
        return '';
    }
}