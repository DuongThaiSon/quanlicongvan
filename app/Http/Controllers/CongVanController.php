<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\documentary;
use App\type_documentary;
use App\User;

class CongVanController extends Controller
{
    //
    public function getTaoMoi(){
        $id = Auth::user()->id;
        $type_documentarys = type_documentary::all();
        return view('viewer.congvan.taomoi',['type_documentarys'=>$type_documentarys]);
    }

    public function postTaoMoi(Request $request){
        $this->validate($request,
        [
			'tieude'=>'required|min:2|max:200',
		],
		[
			'tieude.required'=>'Hãy nhập tiêu đề',
			'tieude.min'=>'Tiêu đề từ 2 đến 200 ký tự',
			'tieude.max'=>'Tiêu đề từ 2 đến 200 ký tự',
			
        ]);
        $congvan = new documentary;
        $id = Auth::user()->id;
        $congvan->name = $request->tieude;
        $congvan->content = $request->noidung;
        $congvan->id_type = $request->loaicongvan;
        $congvan->id_user = $id;
        $file = $request->file('teptin');
		$tep = $file->getClientOriginalName();
		// $file->move('images/ha',$tep);
        $congvan->file = $tep;
        $congvan->storage = $request->file('teptin')->getSize();
        $congvan->save();
        return redirect('viewer/congvan/taomoi')->with('thongbao','Tạo mới thành công');

    }

    public function getDanhSach(){
        $id = Auth::user()->id;
        $congvans = documentary::where('id_user',$id)->get(); 
        return view('viewer.congvan.danhsach',['congvans'=>$congvans]);
    }
    public function getTimCongVan(Request $request){
        $id = Auth::user()->id;
        $congvantimkiems = documentary::where('name','like','%'.$request->timcongvan.'%')->get();

        return view('viewer.congvan.timkiemcongvan',['congvantimkiems'=>$congvantimkiems]);
   }
}
