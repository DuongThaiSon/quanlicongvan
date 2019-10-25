<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use Illuminate\Support\Facades\Auth;

class CongVanDenController extends Controller
{
     public function getDSCVDen(){
          $id = Auth::user()->id;
      $congvandens = documentary_receive::orderBy('created_at', 'DESC')->where('id_user',$id)->get();
      return view('viewer.page.trangchu',['congvandens'=>$congvandens]);
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
      $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->where('name','like','%'.$request->timcongvanden.'%')->where('documentary_receive.id_user',$id)->get();

      return view('viewer.page.timkiemcongvanden',['congvantimkiems'=>$congvantimkiems]);
 }
}
