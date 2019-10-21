<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentary extends Model
{
    //
    protected $table = "documentary";

    public function type_documentary()
    {
    	return $this->belongsTo('App\type_documentary','id_type','id');
    }
    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
