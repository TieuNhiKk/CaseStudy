<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@extends('layouts.app')
@section('content')
<div class="content">
    <div class="title m-b-md">
        <i class="fa fa-eye"></i>
    </div>
    <div class="links">
        <a href="/home">Trang chủ</a>
        <a href="/san-pham">Sản phẩm</a>
        <a href="/tin-tuc">Tin Tức</a>
        <a href="/phu-kien">Phụ Kiện</a>
    </div>
</div>
@endsection