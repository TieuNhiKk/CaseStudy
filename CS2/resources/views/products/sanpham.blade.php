@extends('layouts.user')
@section('title', 'Trang sản hẩm')
@section('content')
<style>
    img:hover {
        opacity: 1;
    }

    .product {
        width: 100%;
        height: 150%;
        border: 1px black solid;
    }
    .xem-sp{
        text-align: center;
        color: darkslategray;
    }
    .xem-sp:hover{
        text-decoration: none;
        text-decoration-color: lightseagreen;
    }
</style>
<div class="container-fluid container-lg">
    <div class="row mb-2">
        @forelse ($products as $p)
        @php
        $price = ($p->price * ( $p->discounts->discount) / 100);
        @endphp
        <div class="col-6 col-lg-3 col-md-4 p-0 border w-100 bg-white p-0">
            <a href="{{ route('xem-sp', $p) }}" class="xem-sp">
                <div class="clearfix">                    
                <img src="{{ $p->avatar }}" alt="Denim Jeans" class="product float-none border-aqua m-0 p-0" height="300">
                </div>
                <h5>{{ $p->name }}</h5>
                <dl>
                    <dt>{{ $p->details->casesize }}</dt>
                    <dd><del>{{ number_format($p->price, 0,'', ',') }}₫</del></dd>
                </dl>
            </a>
            <p class="text-danger text-center lead mb-5">{{ number_format( $price, 0,'', ',') }}₫</i></p>
            <button class="btn btn-dark fixed-bottom position-absolute btn-block" style="bottom:0">Add to Cart</button>
        </div>
        @empty
        @endforelse
    </div>
    {{ $products->links('pagination.bootstrap') }}
</div>
@endsection