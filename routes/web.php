<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('index', function () {
//     return view('viewer.page.trangchu');
// });

Route::get('login',function(){
	return view('login');
});	

Route::get('logout','UserController@getDangXuat');
Route::post('login','UserController@postDangNhap')->name('post-login');

Route::group(['prefix'=>'viewer'],function(){
	Route::group(['prefix'=>'congvandi'],function(){
		Route::get("danhsach",'CongVanDiController@getDSCVDi');

		Route::get('themmoi','CongVanDiController@getThemCongVan');

		Route::post('themmoi','CongVanDiController@postThemCongVan')->name('them-cv');

		Route::get('xemcongvandi/{cvd}','CongVanDiController@getXemCongVanDi')->name('get-xemcvdi');

		Route::get('timcongvandi','CongVanDiController@getTimCongVanDi')->name('get-timcvdi');

	});
	Route::group(['prefix'=>'congvanden'],function(){
		Route::get('danhsach','CongVanDenController@getDSCVDen');

		Route::get('chitiet/{id}','CongVanDenController@getChiTiet');

		Route::get('timcongvanden','CongVanDenController@getTimCongVanDen')->name('get-timcvden');

		Route::get('xemcongvanden/{cvd}','CongVanDenController@getXemCongVanDen')->name('get-xemcvden');
		

		Route::get('xoa/{id}','CongVanDenController@getXoa')->name('get-xoacvden');
	
	});

	Route::group(['prefix'=>'congvan'],function(){


		Route::get('taomoi','CongVanController@getTaoMoi');

		Route::post('taomoi','CongVanController@postTaoMoi')->name('post-taocv');

		Route::get('timcongvan','CongVanController@getTimCongVan')->name('get-timcv');

		Route::get('luutru','CongVanController@getLuuTru');

		Route::get('luutru/{t}','CongVanController@getChiTiet');

		Route::get('xem/{cv}','CongVanController@getXem');

		Route::get('xoa/{id}','CongVanController@getXoa')->name('get-xoacv');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('user/{idbophannhan}','AjaxController@getUser');
	});
	Route::group(['prefix'=>'user'],function(){

		Route::get('thongtincanhan','UserController@getThongTin');

		Route::post('thongtincanhan','UserController@postThongTin')->name('post-tt');

	});
});

Route::get('luutru',function(){
	return view('viewer.luutru.luutru');
});	
Route::get('luutru-detail',function(){
	return view('viewer.luutru.luutru-detail');
});	
Route::get('thongke',function(){
	return view('viewer.thongke.thongke');
});	
Route::get('user',function(){
	return view('viewer.user-detail.user');
});	

Route::get('testthem','CongVanDiController@getTestThem');



