@extends('layouts.user')
@section('title', 'Tin tức đồng hồ')
@section('content')
<style>
    img.avatar {
        min-width: 500px;
        min-height: 300px;
        width: 100%;
        height: 300px;
        margin: 0 25%;
    }
</style>
<div class="container">
    <div class="post-preview">
        <h2 class="title">&nbsp;&nbsp;&nbsp;&nbsp;{{ $post->title }}</h2>
        <p class="post-meta ml-2">
            {{ $post->users->name . ' - ' . date_format(date_create($post->create_at), 'd/m/Y') }}
        </p>
        <div class="text-center">
            <img src="{{ $post->avatar }}" alt="" class="mx-auto w-50 h-50" />
        </div>
        <p>
            {!! $post->content !!}
        </p>
    </div>
</div>
@endsection