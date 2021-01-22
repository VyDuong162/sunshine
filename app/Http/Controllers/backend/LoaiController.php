<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Loai;
use Carbon\Carbon;
use Validator;
use App\Http\Requests\LoaiCreateRequest;
use Session;
class LoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhsachloai= Loai::paginate(3);
        return view('backend.Loai.index')
        ->with('dsloai',$danhsachloai);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Loai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoaiCreateRequest $request)
    {
        $l_ten= $request->l_ten;
        $l_trangthai=$request->l_trangthai;
        // Kiểm tra ràng buộc dữ liệu (validation)
        //$validator = Validator::make($request->all(), [
        //    'l_ten' => 'required|min:3|max:50|unique:cusc_loai',
        //    'l_trangthai' => 'required',
        //]);
        // Nếu kiểm tra ràng buộc dữ liệu thất bại -> tức là dữ liệu không hợp lệ
        // Chuyển hướng về view "Thêm mới" với,
        // - Thông báo lỗi vi phạm các quy luật.
        // - Dữ liệu cũ (người dùng đã nhập).
       //if ($validator->fails()) {
            //return redirect(route('backend.Loai.create'))
                   //     ->withErrors($validator)
                   //     ->withInput();
       // }
        $l =new Loai();
        $l->l_ten=$l_ten;
        $l->l_trangThai=$l_trangthai;
        $l->l_taoMoi=Carbon::now();
        $l->l_capNhat=Carbon::now();
        $l->save();
        Session::flash('alert-success','Thêm mới thành công!');
        return redirect(route('backend.Loai.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai=Loai::find($id);
        return view('backend.Loai.edit')
        ->with('loai',$loai);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $loai=Loai::find($id);
        $loai->l_ten=$request->l_ten;
        $loai->l_trangThai=$request->l_trangthai;
        $loai->l_taoMoi=Carbon::now();
        $loai->l_capNhat=Carbon::now();
        $loai->save();
        Session::flash('alert-success','Thay đổi thành công!');
        return redirect(route('backend.Loai.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai=Loai::find($id);
        $loai->delete();
       Session::flash('alert-success','Xóa thành công!');
        return redirect(route('backend.Loai.index')); 
    }
}
