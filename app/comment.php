<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";
    public function documentary_receive()
    {
    	return $this->belongsTo('App\documentary_receive','id_receive','id');
    }
    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
    
}
