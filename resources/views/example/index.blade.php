@extends('layouts.master')

@section('title')
Trang quản trị hệ thống
@endsection

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello, đây là nội dung từ view con (child view) được nhúng vào `section('content')`</h1>

</body>
</html>
@endsection