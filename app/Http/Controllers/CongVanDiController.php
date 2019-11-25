<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\major;
use App\type_documentary;
use PDF;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use App\comment;
class CongVanDiController extends Controller
{
	//
	
	public function getDSCVDi(){
		$id = Auth::user()->id;
		$congvandis = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->paginate(12,['*'], 'page');
		$loaicongvans = type_documentary::all();
		
		return view("viewer.congvandi.danhsach",['congvandis'=>$congvandis,'loaicongvans'=>$loaicongvans]);
	}

	public function getXemCongVanDi($cvd){
		
		$congvandi = documentary_send::find($cvd);
		$name = explode(".",$congvandi->file_code);
		if($name[1] == "pdf"){
			return response()->file(public_path('pmhdv/images/'.$congvandi->file_code));
		}
		if($name[1] == "jpg" ||$name[1] =="PNG"||$name[1] == "docx" ||$name[1] =="png"){
			return response()->file(public_path('pmhdv/images/'.$congvandi->file_pdf));
		}
		
	}

	public function getTimCongVanDi(Request $request){
		$id = Auth::user()->id;
        $loaicongvans = type_documentary::all();
        $lcv = $request->loaicongvan;
        $tg = $request->thoigian;
        $tcvd = $request->timcongvandi;
        if($lcv == "" && $tg == "" && $tcvd == "")
            $congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->paginate(12,['*'], 'page');
		else if($tcvd== "" && $tg == "" && $lcv != "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('id_type',$lcv)->paginate(12,['*'], 'page');
		
		else if($tcvd== "" && $tg != "" && $lcv == "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->whereDate('send_date',$tg)->paginate(12,['*'], 'page');
		
		else if($tcvd!= "" && $tg == "" && $lcv == "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('name','like','%'.$tcvd.'%')->paginate(12,['*'], 'page');
		
		else if($tcvd!= "" && $tg == "" && $lcv != "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('name','like','%'.$tcvd.'%')->where('id_type',$lcv)->paginate(12,['*'], 'page');
		
		else if($tcvd!= "" && $tg != "" && $lcv == "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('name','like','%'.$tcvd.'%')->whereDate('send_date',$tg)->paginate(12,['*'], 'page');
		
		else if($tcvd== "" && $tg != "" && $lcv != "")
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('id_type',$lcv)->whereDate('send_date',$tg)->paginate(12,['*'], 'page');
		
		else
			$congvantimkiems = documentary_send::orderBy('id', 'DESC')->where('id_usersend',$id)->where('status',1)->where('name','like','%'.$tcvd.'%')->where('id_type',$lcv)->whereDate('send_date',$tg)->paginate(12,['*'], 'page');
		
        return view('viewer.congvandi.timkiemcongvandi',['congvantimkiems'=>$congvantimkiems,'loaicongvans'=>$loaicongvans]);
	}
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
			'tieude'=>'required|min:2|max:300',
			'noidung'=>'required|min:2|max:500',
			'nguoinhan'=>'required',
			'teptin'=>'required'
		],
		[
			'tieude.required'=>'Hãy nhập tiêu đề',
			'tieude.min'=>'Tiêu đề từ 2 đến 200 ký tự',
			'tieude.max'=>'Tiêu đề từ 2 đến 200 ký tự',
			'noidung.required'=>'Hãy nhập nội dung',
			'noidung.min'=>'Nội dung từ 2 đến 500 ký tự',
			'noidung.max'=>'Nội dung từ 2 đến 500 ký tự',
			'nguoinhan.required'=>'Hãy chọn người nhận',
			'teptin.required'=>'Hãy chọn file',
			
		]);
			$congvandi = new documentary_send;
			$congvandi->name = $request->tieude;
			$congvandi->content = $request->noidung;
			$congvandi->id_type = $request->loaicongvan;
			$congvandi->id_usersend=$id;
			$congvandi->status = 1;
			$congvandi->number_read = 0;
			$congvandi->approve = 0;
			$congvandi->approver = " ";

			if($request->hasFile('teptin'))
			{
				$file = $request->file('teptin');
				$name = $file->getClientOriginalName();
				$ten = explode(".",$name);
				
				$congvandi->storage = $file->getSize();
				while(file_exists( public_path() . '/pmhdv/images/'.$name)){
					
                    $name = $ten[0].str_random(3).".".$ten[1];
                    
				}
				
				$file->move('pmhdv/images',$name);
				
				
				$name_pdf = explode(".",$name);
				$duoi = $file->getClientOriginalExtension('teptin');
				
			
				if($duoi == "docx"){
					
					
					$phpWord = new \PhpOffice\PhpWord\PhpWord();
					
					$objReader = \PhpOffice\PhpWord\IOFactory::createReader("Word2007");
					
					$phpWord = $objReader->load(public_path('pmhdv/images/'.$name));
					
					$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
					try {
					$objWriter->save(public_path('pmhdv/images/'.$name_pdf[0].'.html'));
					}catch(Exception $e)
					{}
						
					PDF::loadFile(public_path('pmhdv/images/'.$name_pdf[0].'.html'))->save(public_path('pmhdv/images/'.$name_pdf[0].".pdf"));
					
						$pdf = new \Spatie\PdfToImage\Pdf(public_path('pmhdv/images/'.$name_pdf[0].".pdf"));
						
						$pdf->setPage(1)->saveImage(public_path('pmhdv/images'));
						
					rename(public_path('pmhdv/images/1.jpg'), public_path('pmhdv/images/'.$name_pdf[0].".jpg"));
					$congvandi->file_pdf = $name_pdf[0].".pdf";
					$congvandi->file_jpg = $name_pdf[0].".jpg";
					
					
				}
				if($duoi == "pdf"){
					$pdf = new \Spatie\PdfToImage\Pdf(public_path('pmhdv/images/'.$name_pdf[0].".pdf"));
					$pdf->setPage(1)->saveImage(public_path('pmhdv/images'));
					rename(public_path('pmhdv/images/1.jpg'), public_path('pmhdv/images/'.$name_pdf[0].".jpg"));
					$congvandi->file_jpg = $name_pdf[0].".jpg";
					
				}
				if($duoi == "jpg" ||$duoi == "PNG" || $duoi == "png"){
					
					
					$img = new \Imagick(public_path('pmhdv/images/'.$name));
					$img->setImageFormat('pdf');
			 
					$success = $img->writeImage('pmhdv/images/'.$name_pdf[0].".pdf");
					$congvandi->file_pdf = $name_pdf[0].".pdf";
					
				}
				
				$congvandi->file_code = $name;   
				     
			   
			}
			$congvandi->send_date = date('y-m-d');
			
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

	public function getXoa($id){
		$congvandi = documentary_send::find($id);
		$congvandi->status = 0;
		$congvandi->save();
		return back();
	}

	public function getTest(){
		$id = Auth::user()->id;
		$majors = major::all();
		$type_documentarys = type_documentary::all();
		$users = User::all();
		return view('viewer.congvandi.testthem',['majors'=>$majors,'type_documentarys'=>$type_documentarys,'users'=>$users]);
	}

	public function getChiTiet($id){		
		$congvandi = documentary_send::find($id);
		$congvanden = documentary_receive::where('id_send',$id)->where('status',1)->where('check_comment',1)->get();
		$songuoibinhluan = $congvanden->count();
		$congvandenxem = documentary_receive::where('id_send',$id)->where('status',1)->where('check_read',1)->get();
		$songuoixem = $congvandenxem->count();
		return view('viewer.congvandi.chitiet',['congvandi'=>$congvandi,'snbl'=>$songuoibinhluan,'congvanden'=>$congvanden,'congvandenxem'=>$congvandenxem,'snx'=>$songuoixem]);
	}
	
	public function getXemBinhLuan($id,$ids){
		$comment = comment::orderBy('id', 'ASC')->where('id_receive',$id)->get();
		$congvandi = documentary_send::find($ids);
		$congvanden = documentary_receive::where('id_send',$ids)->where('status',1)->where('check_comment',1)->get();
		$songuoibinhluan = $congvanden->count();
		$congvandenxem = documentary_receive::where('id_send',$ids)->where('status',1)->where('check_read',1)->get();
		$songuoixem = $congvandenxem->count();
		return view('viewer.congvandi.xembinhluan',['congvandi'=>$congvandi,'snbl'=>$songuoibinhluan,'congvanden'=>$congvanden,'congvandenxem'=>$congvandenxem,'snx'=>$songuoixem,'comment'=>$comment]);
	}
}
