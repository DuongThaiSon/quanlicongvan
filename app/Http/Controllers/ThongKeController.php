<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\documentary_receive;
use App\documentary_send;
use App\type_documentary;
use Illuminate\Support\Facades\Auth;

class ThongKeController extends Controller
{
    //
    public function getThongKe(){
        $congvandis = documentary_send::where('id_usersend',auth()->user()->id)->get();
        $congvandens = documentary_receive::where('id_user',auth()->user()->id)->get();
        $congvandendadocs = documentary_receive::where('id_user',auth()->user()->id)->where('check_read',1)->get();
        return view('viewer.thongke.thongke',['congvandis'=>$congvandis,'congvandens'=>$congvandens,'congvandendadocs'=>$congvandendadocs]);
    }
    public function getThongKeCongVan(Request $request){
        $tgbd = $request->thoigianbatdau;
        $tgkt = $request->thoigianketthuc;
    
        $this->validate($request,
        [
            'thoigianbatdau'=>'required',
            'thoigianketthuc'=>'required',
		],
		[
            'thoigianbatdau.required'=>'Hãy nhập thời gian bắt đầu',
            'thoigianketthuc.required'=>'Hãy nhập thời gian kết thúc',
			
			
        ]);
        if($tgbd>$tgkt){
            return redirect('viewer/thongke')->with('thongbao','Thời gian kết thúc phải lớn hơn hoặc bằng thời gian bắt đầu');
        }
        else{
            $congvandis = documentary_send::where('id_usersend',auth()->user()->id)->where('send_date','>=',$tgbd)->where('send_date','<=',$tgkt)->get();
            $congvandens = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->where('documentary_receive.id_user',auth()->user()->id)->where('send_date','>=',$tgbd)->where('send_date','<=',$tgkt)->get();
            $congvandendadocs = documentary_send::join('documentary_receive','documentary_send.id', '=', 'documentary_receive.id_send')->where('documentary_receive.id_user',auth()->user()->id)->where('send_date','>=',$tgbd)->where('send_date','<=',$tgkt)->where('check_read',1)->get();
        }

        return view('viewer.thongke.congvan',['congvandis'=>$congvandis,'congvandens'=>$congvandens,'congvandendadocs'=>$congvandendadocs]);
        
    }
}
