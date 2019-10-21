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
Route::post('login','UserController@postDangNhap')->name('post-login');

Route::group(['prefix'=>'viewer'],function(){
	Route::group(['prefix'=>'congvandi'],function(){
		// Route::get('danhsach','CongVanDiController@getDSCVDi');

		Route::get('themmoi','CongVanDiController@getThemCongVan');

		Route::post('themmoi','CongVanDiController@postThemCongVan')->name('them-cv');

	});
	Route::group(['prefix'=>'congvanden'],function(){
		Route::get('danhsach','CongVanDenController@getDSCVDen');

		Route::get('chitiet/{id}','CongVanDenController@getChiTiet');

		Route::get('timcongvanden','CongVanDenController@getTimCongVanDen')->name('get-timcvden');
		// Route::get('them','TheLoaiController@getThem');

		// Route::post('them','TheLoaiController@postThem');

		// Route::get('sua/{id}','TheLoaiController@getSua');

		// Route::post('sua/{id}','TheLoaiController@postSua');

		// Route::get('xoa/{id}','TheLoaiController@getXoa');
	
	});

	Route::group(['prefix'=>'congvan'],function(){

		Route::get('danhsach','CongVanController@getDanhSach');

		Route::get('taomoi','CongVanController@getTaoMoi');

		Route::post('taomoi','CongVanController@postTaoMoi')->name('post-taocv');

		Route::get('timcongvan','CongVanController@getTimCongVan')->name('get-timcv');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('user/{idbophannhan}','AjaxController@getUser');
	});
});


