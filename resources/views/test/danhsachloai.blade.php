<h1>Danh sach loai</h1>
<table border="1" width="100%">
    <tr>
        <th>Mã loại</th>
        <th>Tên loại</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Trạng thái</th>
        <th>Số lượng sản phẩm</th>
    </tr>
    @foreach($dsloai as $loai)
    <tr>
        <td>{{$loai->l_ma}}</td>
        <td>{{$loai->l_ten}}</td>
        <td>{{$loai->l_taoMoi}}</td>
        <td>{{$loai->l_capNhat}}</td>
        <td>
            <?php
                $trangthailoai='';
                if($loai->l_trangThai==2){
                    $trangthailoai= 'còn bán';
                }
                else
                $trangthailoai= 'khóa';
            ?>
            {{ $trangthailoai }}
        </td>
        <td>
            {{ $loai->danhsachsanpham->count() }}
        </td>
    </tr>
    @endforeach
</table>