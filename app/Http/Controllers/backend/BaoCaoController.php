<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class BaoCaoController extends Controller
{
    //
    public function donhang(){
        return view('backend.reports.donhang');
    }
    public function donhangData(Request $request){
        $paremeter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        $sql= <<<EOT
        SELECT dh_thoiGianDatHang as thoiGian
                , SUM(ctdh.ctdh_soLuong * ctdh.ctdh_donGia) as tongThanhTien
            FROM cusc_donhang dh
            JOIN cusc_chitietdonhang ctdh ON dh.dh_ma = ctdh.dh_ma
            WHERE dh.dh_thoiGianDatHang BETWEEN :tuNgay AND :denNgay
            GROUP BY dh.dh_thoiGianDatHang
EOT;
    
    $data = DB::select($sql,$paremeter);
    return response()->json(array(
        'code' => 200,
        'data' => $data
    ));
    }
}