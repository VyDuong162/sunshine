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

Route::get('/', function () {
    return view('welcome');
});
// route Hiển thị màn hình hello
Route::get('/hello', 'ExampleController@hello')->name('example.hello');
Route::get('/index', 'ExampleController@index')->name('example.index');
Route::get('/testdanhsachloai','LoaiController@getDanhSachLoai');
Route::get('/testdanhsachmau','MauController@getDanhSachMau');
Route::get('/testdanhsachsanpham','LoaiController@getDanhSachSanPham');
Route::get('/testchucnangbackend',function(){
    return view('test.chucnangbacked');
});
Route::get('backend/Loai','backend\LoaiController@index')->name('backend.Loai.index');
Route::get('backend/Loai/create','backend\LoaiController@create')->name('backend.Loai.create');
Route::post('backend/Loai/store','backend\LoaiController@store')->name('backend.Loai.store');
Route::get('backend/Loai/edit/{id}','backend\LoaiController@edit')->name('backend.Loai.edit');
Route::put('backend/Loai/update/{id}','backend\LoaiController@update')->name('backend.Loai.update');
Route::delete('backend/Loai/delete/{id}','backend\LoaiController@destroy')->name('backend.Loai.destroy');
Route::get('/backend/sanpham/print', 'backend\SanPhamController@print')->name('backend.sanpham.print');
Route::get('/backend/sanpham/excel', 'backend\SanPhamController@excel')->name('backend.sanpham.excel');
Route::get('/backend/sanpham/pdf', 'backend\SanPhamController@pdf')->name('backend.sanpham.pdf');
Route::resource('backend/sanpham','backend\SanPhamController',['as'=>'backend']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/testmatkhau',function(){
    return bcrypt('12345');
});