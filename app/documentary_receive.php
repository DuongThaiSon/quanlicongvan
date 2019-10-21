<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentary_receive extends Model
{
    //
    protected $table = "documentary_receive";

    public function documentary_send()
    {
    	return $this->belongsTo('App\documentary_send','id_send','id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
