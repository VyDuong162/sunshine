<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sản phẩm</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style type="text/css">
        * {
            font-family: DejaVu Sans, sans-serif;
        }
    </style>
</head>

<body style="font-size: 10px">
    <div class="row">
        <table border="0" align="center" cellpadding="5" style="border-collapse: collapse;">
            <tr>
                <td colspan="6" align="center" style="font-size: 13px;" width="100">
                    <b>Công ty TNHH Sunshine</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>http://sunshine.com/</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center" style="font-size: 13px">
                    <b>(0292)3.888.999 # 01.222.888.999</b></td>
            </tr>
            <tr>
                <td colspan="6" align="center">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img src="{{ asset('img/logo-nentang.jpg') }}" /> --}}
                </td>
            </tr>
            <tr>
                <td colspan="6" class="caption" align="center" style="text-align: center; font-size: 20px">
                    <b>Danh sách sản phẩm</b>
                </td>
            </tr>
            <tr style="border: 1px thin #000">
                <th style="text-align: center">STT</th>
                <th style="text-align: center">Hình sản phẩm</th>
                <th style="text-align: center">Tên sản phẩm</th>
                <th style="text-align: center">Giá gốc</th>
                <th style="text-align: center">Giá bán</th>
                <th style="text-align: center">Loại sản phẩm</th>
            </tr>
            @foreach ($danhsachsanpham as $sp)
            <tr style="border: 1px thin #000">
                <td align="center" valign="middle" width="5">
                    {{ $loop->index + 1 }}
                </td>
                <td align="center" valign="middle" width="20" height="110">
                    {{-- Đây là khoảng trống dùng để chèn ảnh LOGO bằng Laravel Excel --}}
                    {{-- Khi hiển thị ảnh để xem trên WEB -> sử dụng đường dẫn URL bằng hàm asset() --}}
                    {{-- Khi xuất file Excel, muốn chèn hình ảnh phải sử dụng đường dẫn PATH bằng hàm public_path() --}}
                    
                    {{-- Nếu muốn debug để xem mẫu in, bỏ comment dòng dưới đây --}}
                    {{-- <img class="hinhSanPham" src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" width="100" height="100" /> --}}
                </td>
                <td align="left" valign="middle" width="30">{{ $sp->sp_ten }}</td>
                <td align="right" valign="middle" width="15">{{ $sp->sp_giaGoc }}</td>
                <td align="right" valign="middle" width="15">{{ $sp->sp_giaBan }}</td>
                @foreach ($danhsachloai as $l)
                    @if ($sp->l_ma == $l->l_ma)
                    <td align="left" width="15" valign="middle">{{ $l->l_ten }}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>