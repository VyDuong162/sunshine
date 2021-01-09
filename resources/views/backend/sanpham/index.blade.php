@extends('backend.layouts.master')
@section('title')
Danh sách Sản Phẩm
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
  @if(Session::has('alert-success'))
  <div class="alert alert-success">
      {{ Session::get('alert-success') }}
  </div>
  @endif
  <a href="{{ route('backend.sanpham.print') }}" class="btn btn-primary mb-2">In ấn</a>
  <a href="{{ route('backend.sanpham.excel') }}" class="btn btn-primary mb-2">Xuất Excel</a>
  <a href="{{ route('backend.sanpham.pdf') }}" class="btn btn-primary mb-2">Xuất PDF</a><br>
  <a href="{{ route('backend.sanpham.create') }}" class="btn btn-primary">Them moi</a>
  <h1>Danh sach San Pham</h1>
  <table border="1" width="100%" class="table table-bordered">
      <tr>
          <th>Mã sản phẩm</th>
          <th>Tên sản phẩm</th>
          <th>Giá</th>
          <th>Hình</th>
          <th>Thông tin</th>
          <th>Loại sản phẩm</th>
          <th>Chức năng</th>
      </tr>
      @foreach($dsSanPham as $sp)
      <tr>
          <td>{{$sp->sp_ma}}</td>
          <td>{{$sp->sp_ten}}</td>
          <td>{{$sp->sp_giaGoc}}</td>
          <td>
              <img height="120px" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}"></td>
          <td>{{$sp->sp_thongTin}}</td>
          <td>{{$sp->loaisanpham->l_ten}}</td>
          <td>
              <a href="{{ route('backend.sanpham.edit',['id' => $sp->sp_ma]) }}" class="btn btn-success">Sửa</a>
              <form name="frmdelete" id="frmdelete" class="frmdelete"  action="{{ route('backend.sanpham.destroy',['id' => $sp->sp_ma]) }}" method="post"
                  data-id="{{$sp->sp_ma}}">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger">Xóa</button>
              </form>
          </td>
      </tr>
      @endforeach
  </table>
@endsection
@section('custom-scripts')
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>
<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>
<script src="{{ asset('vendor/paper-css/paper.min.css') }}"></script>
<script src="{{ asset('vendor/normalize/normalize.min.css') }}"></script>
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
  $('.frmdelete').submit(function(e){
      e.preventDefault();
      var id=$(this).data('id');
      Swal.fire({
          title: 'Bạn chắc chắn muốn xóa?',
          text: "Không thể phục hồi dữ liệu sau khi xóa!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
      }).then((result) => {
      if (result.isConfirmed) {
          // Swal.fire(
          //'Deleted!',
          //'Your file has been deleted.',
          //'success'
          //)
          var sendData=(this).serialize;
          $.ajax({
              type: $(this).attr('method'),
              url: $(this).attr('action'),
              // dataType: "json",
              data: {
                  id:id,
                  _token:'{{ csrf_token() }}',
                  _method:$(this).find('[name="_method"]').val()
              },
              success: function(data,textStatus,jqXHR){
                  location.href="{{ route('backend.sanpham.index') }}"
              }
          });
      }
      })
  });
</script>
@endsection






