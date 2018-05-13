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
Route::get('login',[
    'uses'=>'HomeController@getLogin',
    'as'=>'login'
]);
Route::post('login',[
    'uses'=>'HomeController@postLogin',
    'as'=>'login'
]);
Route::get('logout',[
    'uses'=>'HomeController@getLogout',
    'as'=>'logout'
]);
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('layout',[
        'uses' => 'HomeController@getLayout',
        'as' => 'trangchu'
    ]);
    Route::get('hosothanhvien',[
        'uses' => 'HomeController@getHoSoThanhVien',
        'as'=> 'ho-so-thanh-vien'
    ]);
    Route::post('hosothanhvien',[
        'uses' => 'HomeController@postHoSoThanhVien',
        'as'=> 'ho-so-thanh-vien'
    ]);
    Route::get('editthanhvien-{id}',[
        'uses'=>'HomeController@getEdit',
        'as'=>'thay-doi-thong-tin'
    ]);
    Route::post('editthanhvien-{id}',[
        'uses'=>'HomeController@postEdit',
        'as'=>'thay-doi-thong-tin'
    ]);
    Route::get('editthanhtich-{id}',[
        'uses'=>'HomeController@getEdittt',
        'as'=>'thay-doi-thanh-tich'
    ]);
    Route::post('editthanhtich-{id}',[
        'uses'=>'HomeController@postEdittt',
        'as'=>'thay-doi-thanh-tich'
    ]);

    Route::get('ghinhanthanhtich',[
        'uses' => 'HomeController@getGhiNhanThanhTich',
        'as'=> 'ghi-nhan-thanh-tich'
    ]);
    Route::post('ghinhanthanhtich',[
        'uses' => 'HomeController@postGhiNhanThanhTich',
        'as'=> 'ghi-nhan-thanh-tich'
    ]);
    Route::get('danhsachthanhvien',[
        'uses' => 'HomeController@getDanhSachThanhVien',
        'as' => 'danh-sach-thanh-vien'
    ]);
    Route::get('ghinhanketthuc',[
        'uses' => 'HomeController@getGhiNhanKetThuc',
        'as' => 'ghi-nhan-ket-thuc'
    ]);
    Route::post('ghinhanketthuc',[
        'uses' => 'HomeController@postGhiNhanKetThuc',
        'as' => 'ghi-nhan-ket-thuc'
    ]);
    Route::get('danhsachketthuc',[
        'uses'=>'HomeController@getDanhSachKetThuc',
        'as'=>'danh-sach-ket-thuc'
    ]);
    Route::get('editketthuc-{id}',[
        'uses' =>'HomeController@getEditKetThuc',
        'as' => 'thay-doi-ket-thuc'
    ]);
    Route::post('editketthuc-{id}',[
        'uses' =>'HomeController@postEditKetThuc',
        'as' => 'thay-doi-ket-thuc'
    ]);
    Route::get('tanggiamthanhvien',[
        'uses' => 'HomeController@getTangGiamThanhVien',
        'as' => 'tang-giam-thanh-vien'
    ]);
    Route::get('thanhtichthanhvien',[
        'uses' => 'HomeController@getThanhTichThanhVien',
        'as' =>'thanh-tich-thanh-vien'
    ]);
    Route::post('thanhtichthanhvien',[
        'uses' => 'HomeController@postThanhTichThanhVien',
        'as' =>'thanh-tich-thanh-vien'
    ]);
    Route::get('deleted-{id}',[
        'uses'=>'HomeController@getDeleted',
        'as'=>'deleted'
    ]);
    Route::get('delthanhtich-{id}',[
        'uses'=>'HomeController@getDelThanhTich',
        'as'=>'del-thanh-tich'
    ]);
    Route::get('delketthuc-{id}',[
        'uses'=>'HomeController@getDelKetThuc',
        'as'=>'del-ket-thuc'
    ]);
    Route::get('search',[
        'uses'=>'HomeController@getSearch',
        'as'=>'search'
    ]);
    Route::get('thongtinthanhvien-{id}',[
        'uses'=>'HomeController@getTTTV',
        'as'=>'thong-tin-thanh-vien'
    ]);
    Route::get('test',[
        'uses' =>'MainController@getTest',
        'as'=>'test'
    ]);
    Route::get('danhsachthanhtich',[
        'uses' =>'HomeController@getDanhSachThanhTich',
        'as'=>'danh-sach-thanh-tich'
    ]);
});