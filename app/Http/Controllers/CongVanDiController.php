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
		if($name[1] == "docx"){
			return response()->file(storage_path($congvandi->file_pdf));
		}
		if($name[1] == "pdf"){
			return response()->file(public_path('pmhdv/images/'.$congvandi->file_code));
		}
		if($name[1] == "jpg" ||$name[1] =="png"){
			return response()->file(public_path('pmhdv/images/'.$congvandi->file_pdf));
		}
		
	}

	public function getTimCongVanDi(){
		$id = Auth::user()->id;
        $loaicongvans = type_documentary::all();
        $lcv = $request->loaicongvan;
        $tg = $request->thoigian;
        $tcvd = $request->timcongvanden;
        if($lcv == "" && $tg == "" && $tcvd == ""){
            $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->get();
        }
        
          
        
        
      
      

        return view('viewer.page.timkiemcongvanden',['congvantimkiems'=>$congvantimkiems,'loaicongvans'=>$loaicongvans]);
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

			if($request->hasFile('teptin'))
			{
				$file = $request->file('teptin');
				$hinh = $file->getClientOriginalName();
				$name = str_random(8)."_". $hinh;
				$congvandi->storage = $file->getSize();
				while(file_exists("pmhdv/images".$name)){
					$name =Str::random(8)."_". $hinh;
				}
				
				$file->move('pmhdv/images',$name);
				
				$congvandi->file = $hinh;
				$name_pdf = explode(".",$name);
				$duoi = $file->getClientOriginalExtension('teptin');
			
				if($duoi == "docx"){
					
					
					$phpWord = new \PhpOffice\PhpWord\PhpWord();
					
					$objReader = \PhpOffice\PhpWord\IOFactory::createReader("Word2007");
					
					$phpWord = $objReader->load(public_path('pmhdv/images/'.$name));
					
					$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
					try {
					$objWriter->save(storage_path($name_pdf[0].'.html'));
					}catch(Exception $e)
					{}
						
					PDF::loadFile(storage_path($name_pdf[0].'.html'))->save(storage_path($name_pdf[0].".pdf"))->stream('download.pdf');
					
						$pdf = new \Spatie\PdfToImage\Pdf(storage_path($name_pdf[0].".pdf"));
						
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
				if($duoi == "jpg" ){
					
					$img = new \Imagick(public_path('pmhdv/images/'.$name));
					$img->setImageFormat('pdf');
			 
					$success = $img->writeImage('pmhdv/images/'.$name_pdf[0].".pdf");
					$congvandi->file_pdf = $name_pdf[0].".pdf";
				}
					
				$congvandi->file_code = $name;   
				     
			   
			}
			// dd($congvandi);
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

	public function getTestThem(){
		$id = Auth::user()->id;
		$majors = major::all();
		$type_documentarys = type_documentary::all();
		$users = User::all();
		return view('viewer.congvandi.testthem',['majors'=>$majors,'type_documentarys'=>$type_documentarys,'users'=>$users]);
	}
}
