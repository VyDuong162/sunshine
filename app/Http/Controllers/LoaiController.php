<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loai;
use App\SanPham;
class LoaiController extends Controller
{
    public function getDanhSachLoai(){
        $danhsachloai= Loai::all();
        return view('test.danhsachloai')
        ->with('dsloai',$danhsachloai);
    } 
    public function getDanhSachSanPham(){
        $danhsachsanpham= SanPham::all();
        return view('test.danhsachsanpham')
        ->with('dssanpham',$danhsachsanpham);
    } 
}
