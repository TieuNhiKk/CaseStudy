@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')
<div class="container">
    <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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
            <textarea name="title" class="form-control flex-column" placeholder="Tiêu đề">{{ old('title') }}</textarea>
            <input type="file" class="d-none" id="checkavatar" name="checkavatar" onchange="uploadImage(this, 'preview')">
            <input type="text" name="avatar" id="avatar" class="d-none" value="{{ old('avatar') }}">
            <img id="preview" src="{{ old('avatar') }}" alt="Click to upload" class="flex-column btn border ml-2"
                style="width: 150px; height:100px" onclick="checkavatar.click()" onchange="avatar.value=this.src">
        </div>
        <button type="submit" class="btn btn-success btn-lg my-4 btn-block">
            <i class="fa fa-save"></i>
        </button>
        <div class="mt-2 w-100">
            <textarea name="content" class="form-control" placeholder="Nội dung" onclick="ckedit(this.name)">{{ old('content') }}</textarea>
        </div>
    </form>
</div>
@endsection