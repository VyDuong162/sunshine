<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
Route::get('/v1/thongke/top3_sanpham_moinhat','Api\ApiController@thongke_top3_sanpham_moinhat')->name('api.thongke.top3_sanpham_moinhat');
Route::get('/v2/thongke/top3_sanpham_moinhat',[ApiController::class, 'thongke_top3_sanpham_moinhat_v2'])->name('api.thongke.v2.top3_sanpham_moinhat');
Route::get('/sanpham/timkiem', 'Api\ApiController@timkiem')->name('api.sanpham.timkiem');