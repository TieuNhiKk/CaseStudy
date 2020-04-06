@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
<div class="container">
    <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <button type="submit" class="btn btn-success btn-lg btn-block my-2 sicky-top">
            <i class="fa fa-save"></i>
        </button>
        @error('title')
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @enderror
        @error('checkavatar')
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @enderror
        @error('content')
            <div class="alert alert-danger alert-dismissible" role="alert">
                {{ $message }}
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        @enderror
        <div class="d-flex flex-row">
            <textarea name="title" class="form-control flex-column @error('title') is-invalid @enderror">{{ $post->title }}</textarea>
            <input type="file" class="d-none" id="checkavatar" name="checkavatar" onchange="uploadImage(this, 'preview')" accept="image/*">
            <input type="text" name="avatar" id="avatar" class="d-none" value="{{ $post->avatar }}">
            <img id="preview" src="{{ $post->avatar }}" alt="Click to upload" class="flex-column btn border ml-2 @error('checkavatar') is-invalid @enderror" style="width: 150px; height:100px"
                 onclick="checkavatar.click()" onchange="avatar.value=this.src">
        </div>
        <div class="mt-2 w-100">
            <textarea name="content" class="@error('content') is-invalid @enderror" onload="ckedit(this.name)">{{ $post->content }}</textarea>
        </div>
    </form>
</div>
<script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
<script src="{{ asset('js/uploadImage.js') }}"></script>
@endsection