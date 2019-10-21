<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\major;
use App\type_documentary;
class CongVanDiController extends Controller
{
    //
	public function getThemCongVan(){
		$id = Auth::user()->id;
		$majors = major::all();
		$type_documentarys = type_documentary::all();
		$users = User::all();
		return view('viewer.congvandi.themcongvan',['majors'=>$majors,'type_documentarys'=>$type_documentarys,'users'=>$users]);
	}
	public function postThemCongVan(Request $request){
		$id = Auth::user()->id;
		$this->validate($request,
		[
			'tieude'=>'required|min:2|max:200',
			'noidung'=>'required|min:2|max:500',
		],
		[
			'tieude.required'=>'Hãy nhập tiêu đề',
			'tieude.min'=>'Tiêu đề từ 2 đến 200 ký tự',
			'tieude.max'=>'Tiêu đề từ 2 đến 200 ký tự',
			'noidung.required'=>'Hãy nhập nội dung',
			'noidung.min'=>'Nội dung từ 2 đến 500 ký tự',
			'noidung.max'=>'Nội dung từ 2 đến 500 ký tự',
			
		]);
			$congvandi = new documentary_send;
			$congvandi->name = $request->tieude;
			$congvandi->content = $request->noidung;
			$congvandi->id_type = $request->loaicongvan;
			$congvandi->id_category = 2;
			$congvandi->id_user=$id;
			$congvandi->status = 1;
			$congvandi->number_read = 0;
			$congvandi->approve = 0;
			$congvandi->approver = " ";
			
			
				$file = $request->file('teptin');
				$tep = $file->getClientOriginalName();
				// $file->move('images/ha',$tep);
				$congvandi->file = $tep;
			
			
			$congvandi->storage = $request->file('teptin')->getSize();
			$congvandi->promulgate_date = $request->ngaybanhanh;
			$congvandi->validity_date = $request->ngayhieuluc;
			$congvandi->expired_date = $request->ngayhethan;
			$congvandi->save();
			$users = $request->nguoinhan;
			foreach($users as $key => $value)
			{
				$congvanden = new documentary_receive;

				$congvanden->id_user= $value;
				$congvanden->id_send = $congvandi->id;
				
				$congvanden->save();
			}
			
			return redirect('viewer/congvandi/themmoi')->with('thongbao','Gửi thành công');
	}
}
