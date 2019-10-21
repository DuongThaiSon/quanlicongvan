<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class documentary_send extends Model
{
    //
    protected $table = "documentary_send";

    public function documentary_receive()
    {
    	return $this->hasMany('App\documentary_receive','id_send','id');
    }

    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
    public function type_documentary()
    {
    	return $this->belongsTo('App\type_documentary','id_type','id');
    }
    public function category()
    {
        return $this->belongsTo('App\category','id_category','id');
    }
}
