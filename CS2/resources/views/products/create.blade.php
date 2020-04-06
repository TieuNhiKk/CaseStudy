@extends('layouts.app')
@section('title', 'Thêm sản phẩm')
@section('content')
<div class="container-fluid container-md">
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="checkavatar" id="checkavatar" class="d-none"
            onchange="uploadImage(this, 'preview')" accept="image/*">
        <input type="text" name="avatar" id="avatar" value="" class="d-none">
        <img src="" id="preview" class="border" alt="Click để tải ảnh" style="width:100px; height:100px"
            onclick="checkavatar.click()" onchange="avatar.value=this.src">
        <textarea name="content" onclick="ckedit(this.name)"></textarea>
    </form>
</div>
@endsection