@extends('layouts.app')
@section('title', 'Show post')
@section('content')
<style>
    img.avatar {
        min-height: 300px;
        width: 50%;
        height: 50%;
        margin: 0 25%;
    }
</style>
<div class="container">
    <form action="{{ route('post.destroy', $post) }}" method="post" id="delete{{ $post->id }}">@csrf @method('delete')
    </form>
    <h3>{{ $post->title }}</h3>
    <div class="ml-5">
        <p class="text-secondary">{{ $post->users->name }} .
            <span>{{ date_format(date_create($post->create_at), 'd/m/Y') }}</span></p>
    </div>
    <img src="{{ $post->avatar }}" alt="{{ Str::limit($post->title,20) }}" class="border avatar">
    <p>{!! $post->content !!}</p>
    <div class="clearfix">
        <a href="{{ route('post.edit', $post) }}" class="float-none btn btn-lg btn-warning">
            <i class="fa fa-edit"></i>
        </a>
        <a href="{{ route('post.destroy', $post) }}" class="float-none btn btn-lg btn-danger"
            onclick="event.preventDefault();document.getElementById('delete{{ $post->id }}').submit()">
            <i class="fa fa-trash" onclick=""></i>
        </a>
    </div>
</div>
@endsection