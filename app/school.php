<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class school extends Model
{
    //
    protected $table = "school";

    public function major()
    {
    	return $this->hasMany('App\major','id_school','id');
    }

}
