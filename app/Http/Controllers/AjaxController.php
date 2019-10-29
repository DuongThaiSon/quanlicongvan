<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Response;
class AjaxController extends Controller
{
    
    public function getUser($idbophannhan){
        $users = User::where('id_major',$idbophannhan)->get();
        $usersJson = json_encode($users);
        return Response::json($users);

    }
}
