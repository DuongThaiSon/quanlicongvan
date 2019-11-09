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
use Carbon\Carbon;


class CongVanController extends Controller
{
    //
    public function getLuuTru(){
        $types = type_documentary::all();
        return view('viewer.luutru.luutru',['types'=>$types]);
    }

    public function getChiTiet($t){
        $id = auth()->user()->id;
        $congvans = documentary::orderBy('id', 'DESC')->where('id_user',$id)->where('id_type',$t)->where('status',1)->paginate(12,['*'], 'page'); 
        return view('viewer.luutru.chitiet',['congvans'=>$congvans]);
    }
    public function getXem($cv){
        $congvan = documentary::find($cv);
        $name = explode(".",$congvan->file_code);
        if($name[1] == "docx"){
            return response()->file(storage_path($congvan->file_pdf));
        }
        if($name[1] == "pdf"){
            return response()->file(public_path('pmhdv/images/'.$congvan->file_code));
        }
        if($name[1] == "jpg" ||$name[1] =="png"){
            return response()->file(public_path('pmhdv/images/'.$congvan->file_pdf));
        }

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
            'teptin'=>'required',
		],
		[
			'tieude.required'=>'Hãy nhập tiêu đề',
			'tieude.min'=>'Tiêu đề từ 2 đến 200 ký tự',
            'tieude.max'=>'Tiêu đề từ 2 đến 200 ký tự',
            'teptin.required'=>'Hãy nhập file'
			
        ]);
        $congvan = new documentary;
        $id = Auth::user()->id;
        $congvan->name = $request->tieude;
        $congvan->content = $request->noidung;
        $congvan->id_type = $request->loaicongvan;
        $congvan->id_user = $id;
        if($request->hasFile('teptin'))
        {
            $file = $request->file('teptin');
            if($duoi != "jpg" && $duoi != "PNG" && $duoi != "docx" && $duoi != "pdf" && $duoi != "zip"){
                return back()->with("saifile","File chỉ có thể có định dạng là jpg, png, docx, pdf, zip");
            }
			$hinh = $file->getClientOriginalName();
            $name = str_random(8)."_". $hinh;
            $congvan->storage = $file->getSize();
			while(file_exists("pmhdv/images".$name)){
				$name =Str::random(8)."_". $hinh;
            }
            
            $file->move('pmhdv/images',$name);
            
            $congvan->file = $hinh;
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
                $congvan->file_pdf = $name_pdf[0].".pdf";
                $congvan->file_jpg = $name_pdf[0].".jpg";
             
               
            }
            if($duoi == "pdf"){
                $pdf = new \Spatie\PdfToImage\Pdf(public_path('pmhdv/images/'.$name_pdf[0].".pdf"));
                $pdf->setPage(1)->saveImage(public_path('pmhdv/images'));
                rename(public_path('pmhdv/images/1.jpg'), public_path('pmhdv/images/'.$name_pdf[0].".jpg"));
                $congvan->file_jpg = $name_pdf[0].".jpg";
            }
            if($duoi == "jpg" ){
                
                $img = new \Imagick(public_path('pmhdv/images/'.$name));
                $img->setImageFormat('pdf');
         
                $success = $img->writeImage('pmhdv/images/'.$name_pdf[0].".pdf");
                $congvan->file_pdf = $name_pdf[0].".pdf";
            }
            $congvan->create_date = date('y-m-d');
            $congvan->file_code = $name;         
           
        }
       
        $congvan->save();
        return redirect('viewer/congvan/taomoi')->with('thongbao','Tạo mới thành công');

    }

    
    public function getTimCongVan(Request $request){
        $id = Auth::user()->id;
        $tg = $request->thoigian;
        $tcv = $request->timcongvan;
        
        if($tg == "" && $tcv == "")
            $congvantimkiems = documentary::orderBy('id', 'DESC')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
        
        else if($tg == "" && $tcv != "")
            $congvantimkiems = documentary::orderBy('id', 'DESC')->where('name','like','%'.$tcv.'%')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
        
        else if($tg != "" && $tcv == "")
            $congvantimkiems = documentary::orderBy('id', 'DESC')->whereDate('create_date',$tg)->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
        
        else
            $congvantimkiems = documentary::orderBy('id', 'DESC')->whereDate('create_date',$tg)->where('name','like','%'.$tcv.'%')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
       

        return view('viewer.congvan.timkiemcongvan',['congvantimkiems'=>$congvantimkiems]);
   }
}
