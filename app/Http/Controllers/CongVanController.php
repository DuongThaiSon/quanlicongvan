<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\documentary;
use App\type_documentary;
use App\User;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;


class CongVanController extends Controller
{
    //
    public function getLuuTru(){
        $types = type_documentary::all();
        return view('viewer.luutru.luutru',['types'=>$types]);
    }

    public function getChiTiet($t){
        $id = auth()->user()->id;
        $congvans = documentary::orderBy('id', 'DESC')->where('id_user',$id)->where('id_type',$t)->get();
        return view('viewer.luutru.chitiet',['congvans'=>$congvans]);
    }
    public function getXem($cv){
        $congvan = documentary::find($cv);
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $objReader = \PhpOffice\PhpWord\IOFactory::createReader("Word2007");
        $phpWord = $objReader->load('download/'.$congvan->file);
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        try {
        $objWriter->save(storage_path('helloWorld.html'));
        }catch(Exception $e)
        {}
        return PDF::loadFile(storage_path('helloWorld.html'))->save(storage_path('helloWorldPdf.html'))->stream('download.pdf');

    }
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
        $congvans = documentary::orderBy('created_at', 'DESC')->where('id_user',$id)->get(); 
        return view('viewer.congvan.danhsach',['congvans'=>$congvans]);
    }
    public function getTimCongVan(Request $request){
        $id = Auth::user()->id;
        $congvantimkiems = documentary::where('name','like','%'.$request->timcongvan.'%')->get();

        return view('viewer.congvan.timkiemcongvan',['congvantimkiems'=>$congvantimkiems]);
   }
}
