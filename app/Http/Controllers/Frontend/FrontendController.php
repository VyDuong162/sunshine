<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
use App\Mail\ContactMailer;
class FrontendController extends Controller
{
    /**
     * Action hiển thị view Trang chủ
     * GET /
     */
    public function thongke() {
        return view('frontend.pages.thongke');
    }
    public function index(Request $request)
    {
        // Query top 3 loại sản phẩm (có sản phẩm) mới nhất
        $ds_top3_newest_loaisanpham = DB::table('cusc_loai')
            ->join('cusc_sanpham', 'cusc_loai.l_ma', '=', 'cusc_sanpham.l_ma')
            ->orderBy('l_capNhat')->take(3)->get();

        // Query tìm danh sách sản phẩm
        $danhsachsanpham = $this->searchSanPham($request);
        // Hiển thị view `frontend.index` với dữ liệu truyền vào
        return view('frontend.index')
            ->with('ds_top3_newest_loaisanpham', $ds_top3_newest_loaisanpham)
            ->with('danhsachsanpham', $danhsachsanpham);
    }
    /**
     * Hàm query danh sách sản phẩm theo nhiều điều kiện
     */
  
    private function searchSanPham(Request $request)
    {
        $query = DB::table('cusc_sanpham')->select('*');
        // Kiểm tra điều kiện `searchByLoaiMa`
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        if ($searchByLoaiMa != null) {
        }

        $data = $query->get();
        return $data;
    }
     public function contact()
    {
        return view('frontend.pages.contact');
    }
    /** 
 * Action gởi email với các lời nhắn nhận được từ khách hàng 
 * POST /lien-he/goi-loi-nhan 
 */ 
    public function sendMailContactForm(Request $request)
    {
        $input = $request->all();
        Mail::to('dttvyd19388@cusc.ctu.edu.vn')->send(new ContactMailer($input));
        return $input;
    }
}
