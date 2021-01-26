{{-- View này sẽ kế thừa giao diện từ `frontend.layouts.master` --}}
@extends('frontend.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `frontend.layouts.master` --}}
@section('title')
Shop Hoa tươi - Sunshine
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-css` của view `frontend.layouts.master` --}}
@section('custom-css')
@endsection

{{-- Thay thế nội dung vào Placeholder `main-content` của view `frontend.layouts.master` --}}
@section('main-content')
<div class="container ">
    <h1 class="text-center">Thống kê số liệu</h1>
    <div id="thongke_sanpham"  ng-controller="thongKeSanPhamController">
        <h2>Thống kê về sản phẩm</h2>
        <div class="card">
            <div class="card-header">
                Top 3 sản phẩm mới nhất
            </div>
            <div class="card-body">
                <table class="table table-border">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Hình đại diện</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr ng-repeat="sp in danhsach_top3_sanpham_moinhat">
                            <td><% $index + 1 %></td>
                            <td>
                                <img ng-src="/storage/photos/<% sp.sp_hinh %>" height="120px" class="img-hinhdaidien"/></td>
                            </td>
                            <td><% sp.sp_ten %></td>
                            <td><% sp.sp_giaBan | number:0 %></td>
                        </tr>
                    </tbody>
                </table>        
            </div>
        </div>
    </div><br>
       
</div>
<div class="container">
   
        <div ng-controller="timKiemSanPhamController">
            <div class="card">
                <div class="card-header text-center"><h2>Tìm kiếm</h2></div>
                <div class="card-body">
                    <form name="frmTimKiem" novalidate>
                        <div class="form-group">
                            <label for="tensp">Tên sản phẩm</label>
                            <input type="text" name="tensp" id="tensp" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="giatusp">Tên sản phẩm</label>
                            <input type="text" name="giatusp" id="giatusp" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="giadensp">Tên sản phẩm</label>
                            <input type="text" name="giadensp" id="giadensp" class="form-control" >
                        </div>
                        <button type="submit" name="btntimkiem"  class="btn btn-primary" ng-click="timkiem()">Tìm kiếm</button>
                    </form> 
                </div>
            </div>
        
            <div class="card">
                <div class="card-header h2"> Kết quả tìm kiếm</div>
                <div class="card-body">
                    <table class="table table-border">
                        <tr ng-repeat="sp in data">
                            <td><% sp.sp_ten %></td>
                            <td><% sp.sp_giaBan | number:0 %></td>
                        </tr>
                    </table>
                </div>
            </div>
       </div>
      
</div>
@endsection

{{-- Thay thế nội dung vào Placeholder `custom-scripts` của view `frontend.layouts.master` --}}
@section('custom-scripts')
<script>
  // Khai báo controller `thongKeSanPhamController`
  app.controller('thongKeSanPhamController', function($scope, $http) {
    // Dữ liệu
    $scope.danhsach_top3_sanpham_moinhat = [];

    // sử dụng service $http của AngularJS để gởi request GET đến route `api.thongke.top3_sanpham_moinhat`
    $http({
        url: "{{ route('api.thongke.top3_sanpham_moinhat') }}",
        method: "GET"
    }).then(function successCallback(response) {
      // Nếu gởi request thành công thì chuyển dữ liệu sang cho AngularJS hiển thị
      $scope.danhsach_top3_sanpham_moinhat = response.data.result;
      console.log(response.data.result);
      console.log($scope.danhsach_top3_sanpham_moinhat);

    }, function errorCallback(response) {
        // Lấy dữ liệu không thành công, thông báo lỗi cho khách hàng biết
        swal('Có lỗi trong quá trình lấy dữ liệu!', 'Vui lòng thử lại sau vài phút.', 'error');
        console.log(response);
    });

  });
  app.controller('timKiemSanPhamController',function($scope,$http){
        $scope.data = [];
        $scope.timkiem = function(){
            console.log(1);
            var sendData ={
                'tensp' : $('#tensp').val(),
                'giatusp' : $('#giatusp').val(),
                'giadensp' : $('#giadensp').val(),
            }
            console.table(sendData);
            $http ({
                url: "{{ route('api.sanpham.timkiem') }}" + "?tensp="+$('#tensp').val() + "&giatusp="+$('#giatusp').val() + "&giadensp="+$('#giadensp').val(),
                method: "GET",
                // data:JSON.stringify(sendData)
            }).then (function successCallback(response){
                $scope.data= response.data.result;
                console.table($scope.data);
            }, function errorsCallback(response){

            });
        };
    });
</script>
@endsection