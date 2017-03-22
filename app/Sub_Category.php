<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    protected $table = 'sub__categories';

    public function category(){
       return $this->belongsTo('App\Category');
    }
}
