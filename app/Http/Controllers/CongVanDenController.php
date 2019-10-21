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
        $congvandens = documentary_receive::where('id_user',$id)->get();
        return view('viewer.page.trangchu',['congvandens'=>$congvandens]);
   }

   public function getChiTiet($id){
        $chitiet = documentary_receive::find($id);
        return view('viewer.congvanden.chitiet',['chitiet'=>$chitiet]);
   }

   public function getTimCongVanDen(Request $request){
        $id = Auth::user()->id;
        $congvantimkiems = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->where('name','like','%'.$request->timcongvanden.'%')->where('documentary_receive.id_user',$id)->get();

        return view('viewer.page.timkiemcongvanden',['congvantimkiems'=>$congvantimkiems]);
   }
}
