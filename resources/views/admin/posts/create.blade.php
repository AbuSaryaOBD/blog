@extends('layouts.admin')

@section('content')

    @include('includes.tinyeditor')

    <h1>Create Post</h1>
    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" class="form-control">
                @foreach ($categories as $key=>$value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photo_id">Photo</label>
            <input type="file" name="photo_id" >
        </div>

        <div class="form-group">
            <label for="body">Body</label>            
            <textarea name="body" rows="3" class="form-control"></textarea>
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-success">Create Post</button>
        </div>
    </form>
    @include('includes.form-error')
@stop