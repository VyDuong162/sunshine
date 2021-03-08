@extends('backend.layouts.master')
@section('title')
Loai San Pham
@endsection

@section('content')
    @if(Session::has('alert-success'))
    <div class="alert alert-success">
        {{ Session::get('alert') }}
    </div>
    @endif
<a href="{{ route('backend.Loai.create') }}" class="btn btn-primary">Them moi</a>
<h1>Danh sach loai</h1>
<table border="1" width="100%">
    <thead>
        <tr>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Ngày tạo</th>
            <th>Ngày cập nhật</th>
            <th>Trạng thái</th>
            <th>Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $stt =1;  
        ?>
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
        
            <td><a href="{{ route('backend.Loai.edit',['id' => $loai->l_ma]) }}" class="btn btn-success">Sửa</a>
            <form name="frmdelete" id="frmdelete" class="frmdelete" action="{{ route('backend.Loai.destroy',['id' => $loai->l_ma]) }}" method="post"
                data-id="{{$loai->l_ma}}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger">Xóa</button>
            </form>
        </td>
    </tr>
    <?php
        $stt++;
        ?>
    @endforeach
    </tbody>
</table>
{{ $dsloai->links() }}
@endsection
@section('custom-scripts')
<script>
    $('.frmdelete').submit(function(e){
        e.preventDefault();
        var id=$(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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
                    location.href="{{ route('backend.Loai.index') }}"
                }
            });
        }
        })
    });
</script>
@endsection




