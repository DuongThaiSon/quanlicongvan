<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role_user extends Model
{
    //
    protected $table = "role_user";


    public function role()
    {
    	return $this->belongsTo('App\role','id_role','id');
    }
    public function User()
    {
    	return $this->belongsTo('App\User','id_user','id');
    }
}
