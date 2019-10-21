<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    //
    protected $table = "role";

    public function role_detail()
    {
    	return $this->hasMany('App\role_detail','id_role','id');
    }

    public function role_user()
    {
    	return $this->hasMany('App\role_user','id_role','id');
    }
}
