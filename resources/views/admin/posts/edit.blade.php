@extends('layouts.admin')

@section('content')
    @include('includes.tinyeditor')

    <h1>Edit Post</h1>
   <div class="row">
       <div class="col-sm-4">
            <img src="{{ $post->photo ? $post->photo->file : 'images/icon-pad.png' }}" alt="no picture" width="100%">
       </div>
       <div class="col-sm-8">
            <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}">
                </div>
        
                <div class="form-group">
                    <label for="category_id">Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $key=>$value)
                            @if ($post->category_id == $key)
                                <option value="{{ $key }}" selected>{{ $value }}</option> 
                            @else
                                <option value="{{ $key }}">{{ $value }}</option> 
                            @endif
                            
                        @endforeach
                    </select>
                </div>
        
                <div class="form-group">
                    <label for="photo_id">Photo</label>
                    <input type="file" name="photo_id" >
                </div>
        
                <div class="form-group">
                    <label for="body">Body</label>            
                    <textarea name="body" rows="3" class="form-control">{{ $post->body }}</textarea>
                </div>
        
        
        
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Update Post</button>
                </div>
            </form>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
       </div>

   </div>
    @include('includes.form-error')
@stop