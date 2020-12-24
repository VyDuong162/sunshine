<h1>Danh sach mau</h1>
<table border="1" width="100%">
    <tr>
        <th>Mã màu</th>
        <th>Tên màu</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Trạng thái</th>
    </tr>
    @foreach($dsmau as $mau)
    <tr>
        <td>{{$mau->m_ma}}</td>
        <td>{{$mau->m_ten}}</td>
        <td>{{$mau->m_taoMoi}}</td>
        <td>{{$mau->m_capNhat}}</td>
        <td>
        <?php
                $trangthaimau='';
                if($mau->m_trangThai==2){
                    $trangthaimau= 'còn bán';
                }
                else
                $trangthaimau= 'khóa';
            ?>
            {{ $trangthaimau }}
        </td>
    </tr>
    @endforeach
</table>