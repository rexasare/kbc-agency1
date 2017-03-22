<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';

    public function category(){
       return $this->belongsTo('App\Category');
    }

    public function sub_category(){
       return $this->belongsTo('App\Sub_Category');
    }
}
