<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class AppModel extends Model
{
    protected $rules = [];
    private $_errors;

    public function validate($data){

        $validator = Validator::make($data, $this->rules);
        //dd($validator->fails());
        if($validator->fails()){
            $this->_errors = $validator;
            return false;
        }
        return true;

    }

    public function errors(){
        return $this->_errors;
    }
}
