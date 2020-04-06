@extends('layouts.app')
@section('title', 'Quản lý sản phẩm')
@section('ckeditor', 'no')
@section('content')
<style>
    .index-avatar {
        width: 80px;
        height: 80px;
    }
</style>
<div class="container-fluid container-md">    
    <a href="{{ route('product.create') }}" class="btn btn-block btn-success sticky-top"><i class="fa fa-plus"></i></a>
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Tên SP</td>
                <td>Ảnh</td>
                <td>Giá gốc</td>
                <td>%</td>
                <td>Thương hiệu</td>
                <td>Chỉnh sửa</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>
                    <img src="{{ $product->avatar ?? null}}" class="index-avatar" onclick="showimg(this)">
                </td>
                <td>{{ number_format($product->price,0,'', ',') }}</td>
                <td>{{ $product->discounts->discount }}</td>
                <td>{{ $product->brands->name }}</td>
                <td class="clearfix">
                    <a href="{{ route('product.show', $product) }}"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('product.edit', $product) }}"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('product.destroy', $product) }}" onclick="event.preventDefault();delProduct(this)"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @empty
            <tr>
                Danh sách trống
            </tr>
            @endforelse
        </tbody>
    </table>
    <div id="myModal" class="modal py-5 px-5">
        <img class="modal-content" id="img01" onclick="closeimg()">
    </div>
</div>

<form id="formdelete" action="{{ route('product.destroy', $products[1]) }}" method="POST">
    @csrf
    @method('delete')
</form>
<script>
    function delProduct(a){
        let form =document.getElementById('formdelete');        
        form.action = a.href;
        form.submit();
    }
    
    function showimg(img) {
        if (/^(data:image)./i.test(img.src)) {
            document.getElementById(`myModal`).style.display = "block";
            document.getElementById(`img01`).src = img.src;
        }
        else{
            closeimg();
            alert('Chưa có ảnh');
        }
    }

    function closeimg() {
        document.getElementById('myModal').style.display = "none";
        document.getElementById(`img01`).src = null;
    }
</script>
@endsection