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
<div class="container">
    <section class="content">
        <div class="error-page">
            <h2 class="headline text-yellow"> 401 </h2>

            <div class="error-content">
                <h3><i class="fa fa-warning text-yellow"></i> Xin lỗi, chưa được phân quyền</h3>
            </div>
        </div>
    </section>
</div>
@endsection