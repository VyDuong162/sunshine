<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class ApiController extends Controller
{
    public function thongke_top3_sanpham_moinhat(){
        $result= $result=DB::table('cusc_sanpham')
        ->orderby('sp_taoMoi')
        ->take(3)
        ->get();
        return response()->json(array(
            'code'=> 200,
            'result'=> $result,
        ));
    }
    public function thongke_top3_sanpham_moinhat_v2(){
        $result=DB::table('cusc_sanpham')
        ->join('cusc_loai','cusc_loai.l_ma','=','cusc_sanpham.l_ma')
        ->orderby('l_capNhat')
        ->take(3)
        ->get();
        return response()->json(array(
            'code'=> 200,
            'result'=> $result,
            'msg'=> "Version2",
        ));
    }
    public function timkiem(Request $request){
      //  dd($request->all());
        $tensp=$request->tensp;
        $giatusp=$request->giatusp;
        $giadensp=$request->giadensp;
                                                //Sai chổ này nè
        $sql ="select * from cusc_sanpham where 1=1 ";
        if(!empty($tensp))
            $sql.="AND sp_ten LIKE '%$tensp%' ";
        if(!empty($giatusp))
            $sql.="AND sp_giaBan >= $giatusp ";
        if(!empty($giadensp))
            $sql.="AND sp_giaBan <= $giadensp ";
        $result=DB::select($sql);
        return response()->json(array(
            'code'=> 200,
            'result'=> $result,
        ));
    }
}
