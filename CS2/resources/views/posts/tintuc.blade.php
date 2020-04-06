@extends('layouts.user')
@section('title', 'Tin tức đồng hồ')
@section('header', 'true')
@section('content')
<style>
    .intro {
        height: 100px;
    }

    img.avatar {
        width: 20%;
        height: 100%;
    }

    a.post:hover {
        color: blue !important;
        background-color: chocolate !important;
    }
</style>
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach ($posts as $post)
            <a href="{{ route('xem-tin', $post) }}" class="card-link post text-dark">
                <div class="intro clearfix">
                    <img src="{{ $post->avatar }}" alt=" " class="float-left border avatar mr-2">
                    <h5>{{ $post->title }}</h5>
                </div>
            </a>
            <span class="badge badge-info">{{ $post->users->name . ' - ' . date_format(date_create($post->create_at), 'd/m/Y') }}</span>
            <hr>
            @endforeach
            {{ $posts->links('pagination.bootstrap') }}
        </div>
        <div class="col-lg-4 col-md-2 d-none d-md-block">
            @php
            $products = App\Product::paginate(10);
            @endphp
            <div class="clearfix">
                <ul class="float-right">
                    @foreach ($products as $p)
                    <li class="page-item">{{ $p->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection