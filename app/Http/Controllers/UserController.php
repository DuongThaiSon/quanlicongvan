<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function postDangNhap(Request $request){
    	$this->validate($request,
    		[
    			'username'=>'required|email',
    			'pass'=>'required',
    		],
    		[
    			'username.required'=>'Bạn chưa nhập tài khoản',
    			'username.email'=>'Bạn nhập chưa đúng định dạng email',
    			'pass.required'=>'Bạn chưa nhập mật khẩu',
    		]);

		if(Auth::attempt(['email'=>$request->username,'password'=>$request->pass]))
		{
			 return redirect('viewer/congvanden/danhsach');      
		}
        else
        {

            return redirect('login')->with('thongbao','Sai thông tin tài khoản hoặc mật khẩu');
        }
    }
}
