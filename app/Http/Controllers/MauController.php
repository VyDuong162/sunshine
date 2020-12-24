<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mau;
class MauController extends Controller
{
    public function getDanhSachMau(){
        $danhsachmau = Mau::all();
        return view('test.danhsachmau')
        ->with('dsmau',$danhsachmau);
    }
}
