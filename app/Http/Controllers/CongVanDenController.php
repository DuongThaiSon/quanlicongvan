<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use App\type_documentary;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\documentary;
use App\comment;

class CongVanDenController extends Controller
{
     public function getDSCVDen(){
     $id = Auth::user()->id;
     $congvandens = documentary_receive::orderBy('id', 'DESC')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
     $loaicongvans = type_documentary::all();
     return view('viewer.page.trangchu',['congvandens'=>$congvandens,'loaicongvans'=>$loaicongvans]);
 }

 public function getXemCongVanDen($cvd,$id){
   $chitiet = documentary_receive::find($id);
   $congvandi = documentary_send::find($cvd);

  if($chitiet->check_read == 0){
    $congvandi->number_read+=1;
    $chitiet->check_read = 1;
    $congvandi->save();
  }
  else
        $chitiet->check_read = 1;
  $chitiet->save();
  
  $name = explode(".",$congvandi->file_code);
  if($name[1] == "pdf"){
      return response()->file(public_path('pmhdv/images/'.$congvandi->file_code));
  }
  if($name[1] == "jpg" ||$name[1] =="png" ||$name[1] =="PNG" ||$name[1] =="docx"){
      return response()->file(public_path('pmhdv/images/'.$congvandi->file_pdf));
  }
  
  
 }

 public function getChiTiet($id){
      $chitiet = documentary_receive::find($id);
      $comment = comment::orderBy('id', 'ASC')->where('id_receive',$id)->get();
     
      $id_user = Auth::user()->id;
       $cvgui = documentary_send::find($chitiet->id_send);
      if($chitiet->check_read == 0){
          $cvgui->number_read+=1;
          $chitiet->check_read = 1;
          $chitiet->check_time = date('y-m-d');
          $cvgui->save();
      }
      else
             $chitiet->check_read = 1;
        $chitiet->save();

      
      return view('viewer.congvanden.chitiet',['chitiet'=>$chitiet,'comment'=>$comment]);
 }

  public function getTimCongVanDen(Request $request){
        $id = Auth::user()->id;
        $loaicongvans = type_documentary::all();
        $lcv = $request->loaicongvan;
        $tg = $request->thoigian;
        $tcvd = $request->timcongvanden;
        if($lcv == "" && $tg == "" && $tcvd == ""){
          $congvantimkiems = documentary_receive::orderBy('id', 'DESC')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
            
        }
        else if($tcvd== "" && $tg == "" && $lcv != ""){
           
            $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.id_type',$lcv)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd== "" && $tg != "" && $lcv == ""){
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_receive.id_user',$id)->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg == "" && $lcv == ""){
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.name','like','%'.$tcvd.'%')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg == "" && $lcv != ""){
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.name','like','%'.$tcvd.'%')->where('documentary_send.id_type',$lcv)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg != "" && $lcv == ""){
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.name','like','%'.$tcvd.'%')->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd== "" && $tg != "" && $lcv != ""){
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.id_type',$lcv)->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else{
          $congvantimkiems = documentary_receive::join('documentary_send','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_receive.id', 'DESC')->where('documentary_send.id_type',$lcv)->whereDate('documentary_send.send_date',$tg)->where('documentary_send.name','like','%'.$tcvd.'%')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        
       
      

        return view('viewer.page.timkiemcongvanden',['congvantimkiems'=>$congvantimkiems,'loaicongvans'=>$loaicongvans]);
    }
    

    public function getXoa($id){
      $congvanden = documentary_receive::find($id);
      
      $congvanden->status = 0;
      
      $congvanden->save();
      return redirect()->back();
    }

    public function getLuuTru($id){
      $congvanden = documentary_receive::find($id);
      $congvan = new documentary;
      $congvan->name = $congvanden->documentary_send->name;
      $congvan->id_type = $congvanden->documentary_send->id_type;
      $congvan->id_user = $congvanden->id_user;
      $congvan->create_date = $congvanden->documentary_send->send_date;
      $congvan->file_code = $congvanden->documentary_send->file_code;
      $congvan->file_pdf = $congvanden->documentary_send->file_pdf;
      $congvan->file_jpg = $congvanden->documentary_send->file_jpg;
      $congvan->storage =  $congvanden->documentary_send->storage;
      
      $congvan->save();

      return back()->with('thongbao','Lưu trữ thành công');
    }

    public function postBinhLuan($id,Request $request){
      $congvanden = documentary_send::find($id);
      $congvanden->check_comment = 1;
      $congvanden->save();
      $this->validate($request,
        [
            'binhluan'=>'required|max:300',            
        ],
        [
        'binhluan.required'=>'Hãy nhập bình luận',
        'binhluan.max'=>'Tiêu đề từ 2 đến 300 ký tự',
        ]);
      $comment = new comment;
      $comment->content = $request->binhluan;
      $comment->id_receive = $id;
      $comment->id_user = Auth::user()->id;
      $comment->save();
      return back();
    }
}
