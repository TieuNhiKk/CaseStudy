@extends('layouts.app')
@section('title', 'Tin tức đồng hồ')
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
<div class="container-fluid container-lg">
    <a href="{{ route('post.create') }}" class="btn btn-block btn-success sticky-top"><i class="fa fa-plus"></i></a>
    <div class="row">
        <div class="col-lg-10 mx-auto">
            @forelse ($posts as $post)
            @if ($loop->first)
            <hr>
            @endif
            <div class="row">
                <div class="col-10">
                    <a href="{{ route('post.show', $post) }}" class="card-link post text-dark">
                        <div class="intro clearfix">
                            <img src="{{ $post->avatar }}" alt=" " class="float-left border avatar mr-2">
                            <h5>{{ $post->title }}</h5>
                        </div>
                    </a>
                    <span
                        class="badge badge-info">{{ $post->users->name . ' - ' . date_format(date_create($post->create_at), 'd/m/Y') }}</span>
                </div>
                <div class="col-2 my-auto">
                    <a href="{{ route('post.edit', $post) }}" class="btn btn-warning btn-block"><i class="fa fa-lg fa-edit"></i></a>
                    <a href="{{ route('post.destroy', $post) }}" class="btn btn-danger btn-block"><i class="fa fa-lg fa-trash"></i></a>
                </div>
            </div>
            <hr>
            @empty
            <div>
                Rỗng
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection