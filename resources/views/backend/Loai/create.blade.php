@extends('backend.layouts.master')
@section('title')
Loai San Pham
@endsection
@section('content')
<form name="frmcreate" id="frmcreate" action="{{ route('backend.Loai.store') }}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        Ten loai: <input type="text" name="l_ten" id="l_ten" value="{{old('l_ten')}}"><br>
    </div>
    <div class="form-group">
        <label for="trangthai">Trang thai:</label>
        <select name="l_trangthai" id="l_trangthai">
        <option value="1" {{ old( 'l_trangthai' ) == 1 ? 'selected' : '' }}>khoa</option>
        <option value="2" {{ old( 'l_trangthai' ) == 2 ? 'selected' : '' }}>kha dung</option>
        </select>
    </div>
    <button class="btn btn-primary">Lưu</button>
</form>
@endsection