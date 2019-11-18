<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use App\type_documentary;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CongVanDenController extends Controller
{
     public function getDSCVDen(){
     $id = Auth::user()->id;
     $congvandens = documentary_receive::orderBy('id', 'DESC')->where('id_user',$id)->where('status',1)->paginate(12,['*'], 'page');
     $loaicongvans = type_documentary::all();
     return view('viewer.page.trangchu',['congvandens'=>$congvandens,'loaicongvans'=>$loaicongvans]);
 }

 public function getXemCongVanDen($cvd){
  $congvandi = documentary_send::find($cvd);
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
      $id_user = Auth::user()->id;
       $cvgui = documentary_send::find($chitiet->id_send);
      if($chitiet->check_read == 0){
          $cvgui->number_read+=1;
          $chitiet->check_read = 1;
          $cvgui->save();
      }
      else
             $chitiet->check_read = 1;
        $chitiet->save();
      return view('viewer.congvanden.chitiet',['chitiet'=>$chitiet]);
 }

  public function getTimCongVanDen(Request $request){
        $id = Auth::user()->id;
        $loaicongvans = type_documentary::all();
        $lcv = $request->loaicongvan;
        $tg = $request->thoigian;
        $tcvd = $request->timcongvanden;
        if($lcv == "" && $tg == "" && $tcvd == ""){
            $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd== "" && $tg == "" && $lcv != ""){
            $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_send.id_type',$lcv)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd== "" && $tg != "" && $lcv == ""){
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_receive.id_user',$id)->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg == "" && $lcv == ""){
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('name','like','%'.$tcvd.'%')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg == "" && $lcv != ""){
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('name','like','%'.$tcvd.'%')->where('documentary_send.id_type',$lcv)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd!= "" && $tg != "" && $lcv == ""){
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('name','like','%'.$tcvd.'%')->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else if($tcvd== "" && $tg != "" && $lcv != ""){
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_send.id_type',$lcv)->whereDate('documentary_send.send_date',$tg)->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        else{
          $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->orderBy('documentary_send.id', 'DESC')->where('documentary_send.id_type',$lcv)->whereDate('documentary_send.send_date',$tg)->where('name','like','%'.$tcvd.'%')->where('documentary_receive.id_user',$id)->where('documentary_receive.status',1)->paginate(12,['*'], 'page');
        }
        
      // dd($congvantimkiems[0]->User);
      

        return view('viewer.page.timkiemcongvanden',['congvantimkiems'=>$congvantimkiems,'loaicongvans'=>$loaicongvans]);
    }
    

    public function getXoa($id){
      $congvanden = documentary_receive::find($id);
      $congvanden->status = 0;
      $congvanden->save();
      return redirect()->back();
    }
}
