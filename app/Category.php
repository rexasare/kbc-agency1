<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function ads(){
       return $this->hasMany('App\Category');
    }

    public function sub_category(){
         return $this->hasMany('App\Sub_Category');
    }


}
