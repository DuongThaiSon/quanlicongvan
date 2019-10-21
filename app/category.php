<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $table = "category";
    public function documentary_send()
    {
    	return $this->hasMany('App\documentary_send','id_category','id');
    }
}
