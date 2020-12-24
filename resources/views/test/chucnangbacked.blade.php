@extends('backend.layouts.master')
@section('title')
Trang backend
@endsection
@section('custom-css')
<style>
    h1{
        color:red;
    }
</style>
@endsection
@section('content')
<h1>Hello Backend</h1>
@endsection
@section('custom-script')
<script>
alert('hello !!');
</script>
@endsection



