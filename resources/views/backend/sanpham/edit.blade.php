@extends('backend.layouts.master')
@section('title')
Them San Pham
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
<h1>Thêm sản phẩm</h1>
<form name="frmeidt" id="frmedit" action="{{  route('backend.sanpham.update',['id' => $sp->sp_ma]) }}" method="post" enctype="multipart/form-data" >
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">  
    <label for="sp_ten">Tên sản phẩm</label>
    <input type="text" class="form-control" id="sp_ten" name="sp_ten" value="{{ old('sp_ten',$sp->sp_ten) }}">
  </div>
  <div class="form-group">
        <label for="l_ma">Loại sản phẩm</label>
        <select name="l_ma" class="form-control">
            @foreach($danhsachloai as $loai)
                @if($loai->l_ma == $sp->l_ma)
                <option value="{{ $loai->l_ma }}" selected>{{ $loai->l_ten }}</option>
                @else
                <option value="{{ $loai->l_ma }}">{{ $loai->l_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
  <div class="form-group">
    <label for="sp_giaGoc">Giá gốc</label>
    <input type="text" class="form-control" id="sp_giaGoc" name="sp_giaGoc" value="{{ old('sp_giaGoc',$sp->sp_giaGoc) }}">
  </div>
  <div class="form-group">
    <label for="sp_giaGoc">Giá bán</label>
    <input type="text" class="form-control" id="sp_giaBan" name="sp_giaBan" value="{{ old('sp_giaBan',$sp->sp_giaBoc) }}">
  </div>
  <div class="form-group">
    <label>Hình đại diện</label>
    <div class="file-loading">  
      <input id="sp_hinh" type="file" name="sp_hinh">
    </div>
  </div>
  <div class="form-group">
    <label for="sp_thongTin">Thông tin</label>
    <input type="text" class="form-control" id="sp_thongTin" name="sp_thongTin" value="{{ old('sp_thongTin',$sp->sp_thongTin) }}">
  </div>
  <div class="form-group">
    <label for="sp_danhGia">Đánh giá</label>
    <input type="text" class="form-control" id="sp_danhGia" name="sp_danhGia" value="{{ old('sp_danhGia',$sp->sp_thongTin) }}">
  </div>
  <div class="form-group">
    <label for="sp_taoMoi">Ngày tạo mới</label>
    <input type="text" class="form-control" id="sp_taoMoi" name="sp_taoMoi" value="{{ old('sp_taoMoi',$sp->sp_taoMoi) }}">
  </div>
  <div class="form-group">
    <label for="sp_capNhat">Ngày cập nhật</label>
    <input type="text" class="form-control" id="sp_capNhat" name="sp_capNhat" value="{{ old('sp_capNhat',$sp->sp_capNhat) }}">
  </div>

  <div class="form-group">
    <label for="sp_trangThai">Trạng thái</label>
    <select name="sp_trangThai" class="form-control">
      <option value="1" {{ old('sp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
      <option value="2" {{ old('sp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<script>
$(function(){
    $(document).ready(function() {
        $("#sp_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('storage/photos/' . $sp->sp_hinh) }}"
            ],
            initialPreviewConfig: [
                {
                    caption: "{{ $sp->sp_hinh }}", 
                    size: {{ Storage::exists('public/photos/' . $sp->sp_hinh) ? Storage::size('public/photos/' . $sp->sp_hinh) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: 1
                },
            ]
        });
    });
}); 
</script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
  $(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá gốc
    $('#sp_giaGoc').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
    $('#sp_giaBan').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày tạo mới
    $('#sp_taoMoi').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày cập nhật
    $('#sp_capNhat').inputmask({
      alias: 'datetime',
      inputFormat: 'yyyy-mm-dd' // Định dạng Năm-Tháng-Ngày
    });
  });
</script>
@endsection