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
	
	public function getThongTin(){
		$id = auth()->user()->id;
		$user = User::find($id);
		return view('viewer.user-detail.user',['user'=>$user]);
	}

	public function postThongTin(Request $request){
		$id = auth()->user()->id;
		
		$user = User::find($id);
		$this->validate($request,
    		[
				'hoten'=>'required',
				'sdt'=>'required|numeric|digits:10',
				'diachi'=>'required',
    		],
    		[
				'hoten.required'=>'Bạn chưa nhập họ tên',
				'sdt.required'=>'Bạn chưa nhập số điện thoại',
				'diachi.required'=>'Bạn chưa nhập địa chỉ',
				'sdt.numeric'=>'SĐT phải là các con số',
                'sdt.digits'=>'SĐT chỉ được phép 10 số'
			]);
			
		$user->name = $request->hoten;
		$user->phone =$request->sdt;
		$user->address = $request->diachi;
		if($request->hasFile('hinhanh'))
        {
            $file = $request->file('hinhanh');
            $hinh = $file->getClientOriginalName();
            $file->move('pmhdv/images',$hinh);
            $user->avatar = $hinh;
        }
        

        $user->save();

	}
}
