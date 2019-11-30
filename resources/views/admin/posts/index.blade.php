@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>

    <table class="table table-dark">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Title</th>
            <th>User</th>
            <th>Category</th>
            <th>View</th>
            <th>Comments</th>
            <th>Created </th>
            <th>Updated</th>
          </tr>
        </thead>
        <tbody>
            @if ($posts)
                @foreach ($posts as $post)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <td><img src="{{ $post->photo ? $post->photo->file : 'images/icon-pad.png' }}" alt="no picture" height="50px"></td>
                        <td><a href="{{ route('posts.edit', $post->id) }}">{{ $post->title }}</a></td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->category ? $post->category->name : 'Uncategorized' }}</td>
                        
                        <td><a href="{{ route('home.post',$post->slug) }}" class="btn btn-success">View</a></td>
                        <td><a href="{{ route('comments.show',$post->id) }}" class="btn btn-info">Comments</a></td>
                        <td>{{ $post->created_at->diffForhumans() }}</td>
                        <td>{{ $post->updated_at->diffForhumans() }}</td>

                    </tr>
                @endforeach 
            @endif
        </tbody>
    </table>

      <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
          {{ $posts->render() }}
        </div>
      </div>
@endsection