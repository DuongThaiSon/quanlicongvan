<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class major extends Model
{
    //
    protected $table = "major";

    public function User()
    {
    	return $this->hasMany('App\User','id_major','id');
    }

    public function school()
    {
    	return $this->belongsTo('App\school','id_school','id');
    }
}
