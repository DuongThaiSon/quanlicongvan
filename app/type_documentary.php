<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_documentary extends Model
{
    //
    protected $table = "type_documentary";

    public function Comment()
    {
    	return $this->hasMany('App\document_send','id_type','id');
    }

    
}
