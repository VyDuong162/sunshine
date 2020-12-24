<h1>Danh sách sản phẩm</h1>
<table border="1" width="100%">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Trạng thái</th>
        <th>thuộc loại</th>
    </tr>
    @foreach($dssanpham as $sanpham)
    <tr>
        <td>{{$sanpham->sp_ma}}</td>
        <td>{{$sanpham->sp_ten}}</td>
        <td>{{$sanpham->sp_taoMoi}}</td>
        <td>{{$sanpham->sp_capNhat}}</td>
        <td>
            <?php
                $trangthaisanpham='';
                if($sanpham->sp_trangThai==2){
                    $trangthaisanpham= 'còn bán';
                }
                else
                $trangthaisanpham= 'khóa';
            ?>
            {{ $trangthaisanpham }}
        </td>
        <td>
            {{ $sanpham->loaisanpham->l_ten }}
        </td>
    </tr>
    @endforeach
</table>