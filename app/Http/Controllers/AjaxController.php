<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
class AjaxController extends Controller
{
    
    public function getUser($idbophannhan){
        $users = User::where('id_major',$idbophannhan)->get();
        foreach($users as $user){
            if(Auth::user()->id != $user->id)
            echo "<option value='".$user->id."'>".$user->name."</option>";
        }
    }
}
